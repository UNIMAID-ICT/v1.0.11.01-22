<?php

namespace App\Http\Livewire\Admin;

use App\Csv;
use App\Models\Program;
use Validator;
use Livewire\Component;
use Livewire\WithFileUploads;

class ImportProgram extends Component
{
    use WithFileUploads;

    protected $listeners = ['refreshTransactions' => '$refresh'];

    public $showModal = false;
    public $upload;
    public $columns;
    public $rowAdded;
    public $rowUploading = 0;

    public $department_id;
    public $pro_title;
    public $pro_code;
    // public $pro_no;
    public $start = false;
    public $done = false;


    public $fieldColumnMap = [
        'department_id' => '',
        'pro_title' => '',
        'pro_code' => '',
        // 'pro_no' => '',
    ];

    protected $rules = [
        'fieldColumnMap.department_id' => 'required',
        'fieldColumnMap.pro_title' => 'required',
        'fieldColumnMap.pro_code' => 'required',
        // 'fieldColumnMap.pro_no' => 'required',
    ];

    protected $customAttributes = [
        'fieldColumnMap.department_id' => 'department_id',
        'fieldColumnMap.pro_title' => 'pro_title',
        'fieldColumnMap.pro_code' => 'pro_code',
        // // 'fieldColumnMap.pro_no' => 'pro_no',
    ];

    // public function updatingRowAdded($value){
    //     $this->rowUploading++;
    // }

    public function updatingUpload($value)
    {
        // $this->start = true;
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
                Program::create(
                    $this->extractFieldsFromRow($row)
                );

                $importCount++;


            });
         $this->rowAdded = $importCount;
         $this->reset([
            'department_id', 'pro_title','pro_code', 'showModal', 'upload',
         ]);

        $this->emit('refreshTransactions');
        $this->emit('imported_pro');

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
            'department_id'      => ['department_id'],
            'pro_title'     => ['pro_title'],
            'pro_code'      => ['pro_code'],
            // // 'pro_no'        => ['pro_no'],
        ];

        foreach ($this->columns as $column) {
            $match = collect($guesses)->search(fn($options) => in_array(strtolower($column), $options));
            if ($match) $this->fieldColumnMap[$match] = $column;
        }
    }

}
