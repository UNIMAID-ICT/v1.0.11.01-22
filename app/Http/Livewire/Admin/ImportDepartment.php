<?php

namespace App\Http\Livewire\Admin;

use App\Csv;
use App\Models\Department;
use Validator;
use Livewire\Component;
use Livewire\WithFileUploads;

class ImportDepartment extends Component
{
    use WithFileUploads;

    protected $listeners = ['refreshTransactions' => '$refresh'];

    public $showModal = false;
    public $upload;
    public $columns;
    public $rowAdded;
    public $rowUploading = 0;

    public $school_id;
    public $dept_title;
    // public $dept_code;
    public $dept_no;
    public $start = false;
    public $done = false;

    public $fieldColumnMap = [       
        'school_id' => '',
        'dept_title' => '',
        // 'dept_code' => '',
        'dept_no' => '',        
    ];

    protected $rules = [        
        'fieldColumnMap.school_id' => 'required',
        'fieldColumnMap.dept_title' => 'required',
        // 'fieldColumnMap.dept_code' => 'required',
        'fieldColumnMap.dept_no' => 'required',
    ];

    protected $customAttributes = [        
        'fieldColumnMap.school_id' => 'school_id',
        'fieldColumnMap.dept_title' => 'dept_title',
        // 'fieldColumnMap.dept_code' => 'dept_code',
        'fieldColumnMap.dept_no' => 'dept_no',
    ];

    public function updatingRowAdded($value){
        $this->rowUploading++;
    }

    public function updatingUpload($value)
    {
        $this->start = true;
        Validator::make(
            ['upload' => $value],
            ['upload' => 'required|mimes:txt,csv'],
        )->validate();
    }

    public function updatedUpload()
    {
        $this->done = true;
        $this->start = false;
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
                Department::create(
                    $this->extractFieldsFromRow($row)
                );

                $importCount++;
               
                
            });
         $this->rowAdded = $importCount;
         $this->reset([
            // 'school_id', 'dept_title','dept_code', 'dept_no', 'showModal',
         ]);

        $this->emit('refreshTransactions');   
        $this->emit('imported_dept');   
        
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
            'school_id'      => ['school_id'],
            'dept_title'     => ['dept_title'],
            // 'dept_code'      => ['dept_code'],
            'dept_no'        => ['dept_no'],
        ];

        foreach ($this->columns as $column) {
            $match = collect($guesses)->search(fn($options) => in_array(strtolower($column), $options));
            if ($match) $this->fieldColumnMap[$match] = $column;
        }
    }


    public function render()
    {
        return view('livewire.admin.import-department');
    }
}
