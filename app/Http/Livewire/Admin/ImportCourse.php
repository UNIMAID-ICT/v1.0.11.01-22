<?php

namespace App\Http\Livewire\Admin;

use App\Csv;
use App\Models\Course;
use Validator;
use Livewire\Component;
use Livewire\WithFileUploads;

class ImportCourse extends Component
{
    use WithFileUploads;

    protected $listeners = ['refreshTransactions' => '$refresh'];

    public $showModal = false;
    public $upload;
    public $columns;
    public $rowAdded;
    public $rowUploading = 0;

    public $start = false;
    public $done = false;

    public $program_id;
    public $course_title;
    public $course_code;
    public $units;
    public $level;
    public $semester;
    public $mode;
    public $elective;
    public $pre_requisite;

    public $fieldColumnMap = [
        'program_id' => '',
        'course_code' => '',
        'course_title' => '',
        'units' => '',
        // 'level' => '',
        // 'semester' => '',
        'mode' => '',
        'elective' => '',
        'pre_requisite' => '',
    ];

    protected $rules = [
        // 'fieldColumnMap.department_id' => 'required',
        'fieldColumnMap.program_id' => 'required',
        'fieldColumnMap.course_code' => 'required',
        'fieldColumnMap.course_title' => 'required',
        'fieldColumnMap.units' => 'required',
        // 'fieldColumnMap.level' => 'required',
        // 'fieldColumnMap.semester' => 'required',
        'fieldColumnMap.mode' => 'required',
        'fieldColumnMap.elective' => 'required',
        'fieldColumnMap.pre_requisite' => 'required',
    ];

    protected $customAttributes = [
        // 'fieldColumnMap.department_id' => 'department_id',
        'fieldColumnMap.program_id'           => 'program_id',
        'fieldColumnMap.course_code'          => 'course_code',
        'fieldColumnMap.course_title'         => 'course_title',
        'fieldColumnMap.units'                => 'units',
        // 'fieldColumnMap.level'                => 'level',
        // 'fieldColumnMap.semester'             => 'semester',
        'fieldColumnMap.mode'                 => 'mode',
        'fieldColumnMap.elective'             => 'elective',
        'fieldColumnMap.pre_requisite'        => 'pre_requisite',
    ];

    public function updatingUpload($value)
    {
        $this->done = true;
        Validator::make(
            ['upload' => $value],
            ['upload' => 'required|mimes:txt,csv'],
        )->validate();
    }

    public function updatedUpload()
    {
        $this->columns = Csv::from($this->upload)->columns();

        $this->guessWhichColumnsMapToWhichFields();
    }

    public function import()
    {
        $this->validate();

        $importCount = 0;
        $this->start = true;
        $this->done = false;

        Csv::from($this->upload)
            ->eachRow(function ($row) use (&$importCount) {
                Course::create(
                    $this->extractFieldsFromRow($row)
                );

                $importCount++;

                $this->rowUploading++;
            });

        $this->emit('refreshTransactions');
         $this->rowAdded = $importCount;
         $this->reset([
            'program_id', 'course_code','course_title', 'units','mode','elective','pre_requisite', 'showModal',
         ]);



        $this->notify('Imported '.$importCount.' Records!');
        $this->start = false;
        $this->done = true;
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

            'program_id'      => ['program_id'],
            'course_code'     => ['course_code'],
            'course_title'    => ['course_title'],
            'units'           => ['units'],
            // 'level'           => ['level'],
            // 'semester'        => ['semester'],
            'mode'            => ['mode'],
            'elective'        => ['elective'],
            'pre_requisite'   => ['pre_requisite'],

        ];

        foreach ($this->columns as $column) {
            $match = collect($guesses)->search(fn($options) => in_array(strtolower($column), $options));
            if ($match) $this->fieldColumnMap[$match] = $column;
        }
    }

    public function render()
    {
        return view('livewire.admin.import-course');
    }
}
