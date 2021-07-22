<?php

namespace App\Http\Livewire\Admin;

use App\Csv;
use App\Models\Course;
use App\Models\Exam;
use App\Models\Student;
use Illuminate\Support\Collection;
use Validator;
use Livewire\Component;
use Livewire\WithFileUploads;

class UploadResult extends Component
{
    use WithFileUploads;

    protected $listeners = ['refreshTransactions' => '$refresh', 'show'];

    public $showModal = false;
    public $upload;
    public $columns;
    public $rowAdded;
    public $rowUploading = 0;

    // public $academic_id;
    public $student_id_number;
    public $course_code;
    public $semester;
    public $ca;
    public $exam;
    public $total;
    public $remark;

    public $stdId;
    public $doneUpload = true;
    public $imported = [];
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
        'course_code' => '',
        'semester' => '',        
        'ca' => '',        
        'exam' => '',        
        'total' => '',        
        'remark' => '',        
    ];

    protected $rules = [        
        // 'fieldColumnMap.academic_id'  => 'required',
        'fieldColumnMap.student_id_number'  => 'required',
        'fieldColumnMap.course_code'  => 'required',
        'fieldColumnMap.semester'  => 'required',
        'fieldColumnMap.ca'  => 'required',
        'fieldColumnMap.exam'  => 'required',
        'fieldColumnMap.total'  => 'required',
        'fieldColumnMap.remark'  => 'required',
    ];

    protected $customAttributes = [        
        // 'fieldColumnMap.academic_id' => 'academic_id',
        'fieldColumnMap.student_id_number' => 'student_id_number',
        'fieldColumnMap.course_code' => 'course_code',
        'fieldColumnMap.semester' => 'semester',
        'fieldColumnMap.ca' => 'ca',
        'fieldColumnMap.exam' => 'exam',
        'fieldColumnMap.total' => 'total',
        'fieldColumnMap.remark' => 'remark',
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
             'course_code', 
             'semester', 
             'ca', 
             'exam', 
             'total', 
             'remark', 
             'upload', 
             'showModal',
         ]);
         $this->doneUpload = false;
         $this->done = false;

        $this->emit('refreshTransactions');   
        
        $this->notify('Imported '.$importCount.' Records!');
        
        
    }

    public function extractFieldsFromRow($row)
    {
        
        $attributes = collect($this->fieldColumnMap)
            ->filter()
            ->mapWithKeys(function($heading, $field) use ($row) {
                return [$field => $row[$heading]];
            })
            ->toArray();

        return $attributes;
        // return $attributes + ['status' => 'success', 'date_for_editing' => now()];
    }

    public function guessWhichColumnsMapToWhichFields()
    {
        
        $guesses = [
            'academic_id'        => ['academic_id'],
            'student_id_number'         => ['student_id_number'],
            'course_code'          => ['course_code'],
            'semester'           => ['semester'],
            'ca'                 => ['ca'],
            'exam'               => ['exam'],
            'total'              => ['total'],
            'remark'             => ['remark'],
            
        ];

        foreach ($this->columns as $column) {
            $match = collect($guesses)->search(fn($options) => in_array(strtolower($column), $options));
            if ($match) $this->fieldColumnMap[$match] = $column;
        }
    }

    public function uploadRecord()
    {
       foreach($this->imported as $import){
           $this->stdId = Student::whereStudentIdNumber($import['student_id_number'])->first();
           $course_id = Course::whereCourseCode($import['course_code'])->first();
        //    dd($course_id);

           Exam::create([
               'student_id' => $this->stdId->id,
               'course_id' => $course_id->id,
                'ca'       => $import['ca'],
                'exam'     => $import['exam'],
                'total'    => $import['total'],
               'remark'    => $import['remark'],
           ]);

           $this->done();
           $this->notify('Record Saved!');
       }
    }

    public function done()
    {
        $this->reset([
            //  'academic_id',
             'student_id_number',
             'course_code', 
             'semester', 
             'ca', 
             'exam', 
             'total', 
             'remark', 
             'upload', 
             'showModal',
         ]);

         $this->imported = [];
         $this->doneUpload = true;
         $this->done = false;
        
    }


}
