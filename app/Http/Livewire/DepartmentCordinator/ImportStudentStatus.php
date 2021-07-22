<?php

namespace App\Http\Livewire\DepartmentCordinator;

use App\Csv;
use App\Models\Academic;
use App\Models\Status;
use App\Models\Student;
use Illuminate\Support\Facades\DB;
use Validator;
use Livewire\Component;
use Livewire\WithFileUploads;

class ImportStudentStatus extends Component
{
    use WithFileUploads;

    protected $listeners = ['refreshTransactions' => '$refresh', 'show'];

    public $showModal = false;
    public $upload;
    public $columns;
    public $rowAdded;
    public $rowUploading = 0;

    public $academic_session;
    public $student_id_number;
    public $cum_unit;
    public $cum_prod;
    public $cgpa;
    public $gpa;
    public $student_status;
    public $no_carry_over;

    public $stdId;
    public $doneUpload = true;
    public $imported = [];
    public $missingstdIds = [];
    public $importedRecords;

    public $start = false;
    public $done = false;



    public function show()
    {
        $this->rowUploading++;
    }

    public $fieldColumnMap = [
        // 'academic_id' => '',
        'student_id_number' => '',
        'cum_unit' => '',
        'cum_prod' => '',
        'gpa' => '',
        'cgpa' => '',
        'student_status' => '',
        'no_carry_over' => '',
    ];

    protected $rules = [
        // 'fieldColumnMap.academic_id'  => 'required',
        'fieldColumnMap.student_id_number'  => 'required',
        'fieldColumnMap.cum_unit'  => 'required',
        'fieldColumnMap.cum_prod'  => 'required',
        'fieldColumnMap.gpa'  => 'required',
        'fieldColumnMap.cgpa'  => 'required',
        'fieldColumnMap.student_status'  => 'required',
        'fieldColumnMap.no_carry_over'  => 'required',
    ];

    protected $customAttributes = [
        // 'fieldColumnMap.academic_id' => 'academic_id',
        'fieldColumnMap.student_id_number' => 'student_id_number',
        'fieldColumnMap.cum_unit' => 'cum_unit',
        'fieldColumnMap.cum_prod' => 'cum_prod',
        'fieldColumnMap.gpa' => 'gpa',
        'fieldColumnMap.cgpa' => 'cgpa',
        'fieldColumnMap.student_status' => 'student_status',
        'fieldColumnMap.no_carry_over' => 'no_carry_over',
    ];

    // public function updatingRowAdded($value){
    //     $this->rowUploading++;
    // }

    public function updatingUpload($value)
    {

        // $this->emit('show');
        $this->done = false;
        $this->rowUploading = 0;
        Validator::make(
            ['upload' => $value],
            ['upload' => 'required|mimes:txt,csv'],
        )->validate();
    }

    public function updatedUpload()
    {
        $this->done = true;
        $this->columns = Csv::from($this->upload)->columns();
        $this->guessWhichColumnsMapToWhichFields();

        // $this->start = false;
    }

    public function import()
    {
        $this->validate();
        // $this->start = true;

        $importCount = 0;

        Csv::from($this->upload)
            ->eachRow(function ($row) use (&$importCount) {

                // dd( $this->extractFieldsFromRow($row));
                // Exam::create(
                //     $this->extractFieldsFromRow($row)
                // );
                $this->emit('show');
                $this->imported[] =  $this->extractFieldsFromRow($row);
                $importCount++;
            });
        $this->rowAdded = $importCount;

        //  $this->importedRecords = collect($this->imported);
        $this->reset([
            //  'academic_id',
            'student_id_number',
            'cum_unit',
            'cum_prod',
            'gpa',
            'cgpa',
            'student_status',
            'no_carry_over',
            'upload',
            'showModal',
        ]);
        $this->doneUpload = false;
        $this->done = false;

        $this->emit('refreshTransactions');

        $this->notify('Imported ' . $importCount . ' Records!');
    }

    public function extractFieldsFromRow($row)
    {

        $attributes = collect($this->fieldColumnMap)
            ->filter()
            ->mapWithKeys(function ($heading, $field) use ($row) {
                return [$field => $row[$heading]];
            })
            ->toArray();

        return $attributes;
        // return $attributes + ['status' => 'success', 'date_for_editing' => now()];
    }

    public function guessWhichColumnsMapToWhichFields()
    {

        $guesses = [

            'student_id_number'         => ['student_id_number'],
            'cum_unit'                  => ['cum_unit'],
            'cum_prod'                  => ['cum_prod'],
            'gpa'                       => ['gpa'],
            'cgpa'                      => ['cgpa'],
            'student_status'            => ['student_status'],
            'no_carry_over'             => ['no_carry_over'],

        ];

        foreach ($this->columns as $column) {
            $match = collect($guesses)->search(fn ($options) => in_array(strtolower($column), $options));
            if ($match) $this->fieldColumnMap[$match] = $column;
        }
    }

    public function uploadRecord()
    {
        $this->academic_session = Academic::whereStatus('active')->first();

        // dd($academic_session);
        DB::transaction(function () {

            foreach ($this->imported as $import) {

                $this->stdId = Student::whereStudentIdNumber($import['student_id_number'])->first();

                // $validatedData = $this->validate([
                    //     'name' => 'required|min:6',
                    //     'email' => 'required|email',
                // ]);

                if($this->stdId){

                    DB::table('statuses')->upsert([

                        'academic_id'       => $this->academic_session->id,
                        'student_id'        => $this->stdId->id,
                        'cum_unit'          => $import['cum_unit'],
                        'cum_prod'          => $import['cum_prod'],
                        'gpa'               => $import['gpa'],
                        'cgpa'              => $import['cgpa'],
                        'student_status'    => $import['student_status'],
                        'no_carry_over'     => $import['no_carry_over'],

                    ], ['academic_id','student_id'], ['cum_unit','cum_prod', 'gpa', 'cgpa','student_status','no_carry_over']);

                    if(($import['student_status'] === 'Proceed') || $import['student_status'] === 'proceed'){

                        $level = $this->stdId->level + 100;

                        Student::find($this->stdId->id)->update(['level' => $level]);
                    }

                }else{

                    $this->missingstdIds[] = $import['student_id_number'];
                }

                $this->done();
                $this->notify('Record Saved!');
            }
        });
        // dd($this->missingstdIds);
    }

    public function done()
    {
        $this->reset([
            //  'academic_id',
            'student_id_number',
            'cum_unit',
            'cum_prod',
            'gpa',
            'cgpa',
            'student_status',
            'no_carry_over',
            'upload',
            'showModal',
        ]);

        $this->imported = [];
        $this->missingstdIds = [];
        $this->doneUpload = true;
        $this->done = false;
    }


    public function render()
    {
        return view('livewire.department-cordinator.import-student-status');
    }
}
