<?php

namespace App\Http\Livewire\Admin;

use App\Csv;
use App\Models\Student;
use Validator;
use Livewire\Component;
use Livewire\WithFileUploads;

class ImportStudents extends Component
{
    use WithFileUploads;

    protected $listeners = ['refreshTransactions' => '$refresh', 'generated'];



    public $showModal = false;
    public $upload;
    public $columns;
    public $rowAdded;
    public $rowUploading = 0;
    public $start = false;
    public $done = false;


    // public $user_id;
    public $department_id;
    public $student_id_number;
    public $title;
    public $fullname;
    public $gender;
    public $marital_stutus;
    public $telephone;
    public $email;
    public $photo;
    public $nin;
    public $date_of_birth;
    public $country;
    public $state;
    public $lga;
    public $address;
    public $blood_group;
    public $disability;
    public $medical_condition;
    public $access_token;
    public $payment_token;
    public $level;

    public $releaseBtn = true;


    public function generated(){
        $this->releaseBtn = false;
    }

    public $fieldColumnMap = [
        // 'school_id' => '',
        // 'department_id' => '',
        // 'user_id' => '',
        'department_id' => '',
        'student_id_number' => '',
        'title' => '',
        'fullname' => '',
        'gender' => '',
        // 'marital_stutus' => '',
        // 'telephone' => '',
        // 'email' => '',
        // 'photo' => '',
        // 'nin' => '',
        // 'date_of_birth' => '',
        'country' => '',
        'state' => '',
        'lga' => '',
        'level' => '',
        // 'address' => '',
        // 'blood_group' => '',
        // 'disability' => '',
        // 'medical_condition' => '',
        // 'access_token' => '',
        // 'payment_token' => '',
    ];

    protected $rules = [
        // 'fieldColumnMap.user_id' => 'required',
        'fieldColumnMap.department_id' => 'required',
        'fieldColumnMap.student_id_number' => 'required',
        'fieldColumnMap.title' => 'required',
        'fieldColumnMap.fullname' => 'required',
        'fieldColumnMap.gender' => 'required',
        // 'fieldColumnMap.marital_stutus' => 'required',
        // 'fieldColumnMap.telephone' => 'required',
        // 'fieldColumnMap.email' => 'required',
        // 'fieldColumnMap.photo' => 'required',
        // 'fieldColumnMap.nin' => 'required',
        // 'fieldColumnMap.date_of_birth' => 'required',
        'fieldColumnMap.country' => 'required',
        'fieldColumnMap.state' => 'required',
        'fieldColumnMap.lga' => 'required',
        'fieldColumnMap.level' => 'required',
        // 'fieldColumnMap.address' => 'required',
        // 'fieldColumnMap.blood_group' => 'required',
        // 'fieldColumnMap.disability' => 'required',
        // 'fieldColumnMap.medical_condition' => 'required',
        // 'fieldColumnMap.access_token' => 'required',
        // 'fieldColumnMap.payment_token' => 'required',
    ];

    protected $customAttributes = [
        // 'fieldColumnMap.user_id' => 'user_id',
        'fieldColumnMap.department_id' => 'department_id',
        'fieldColumnMap.student_id_number' => 'student_id_number',
        'fieldColumnMap.title' => 'title',
        'fieldColumnMap.fullname' => 'fullname',
        'fieldColumnMap.gender' => 'gender',
        'fieldColumnMap.country' => 'country',
        'fieldColumnMap.state' => 'state',
        'fieldColumnMap.lga' => 'lga',
        'fieldColumnMap.level' => 'level',
        // 'fieldColumnMap.marital_stutus' => 'marital_stutus',
        // 'fieldColumnMap.telephone' => 'telephone',
        // 'fieldColumnMap.email' => 'email',
        // 'fieldColumnMap.photo' => 'photo',
        // 'fieldColumnMap.nin' => 'nin',
        // 'fieldColumnMap.date_of_birth' => 'date_of_birth',

        // 'fieldColumnMap.address' => 'address',
        // 'fieldColumnMap.blood_group' => 'blood_group',
        // 'fieldColumnMap.disability' => 'disability',
        // 'fieldColumnMap.medical_condition' => 'medical_condition',
        // 'fieldColumnMap.access_token' => 'access_token',
        // 'fieldColumnMap.payment_token' => 'payment_token',
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
                Student::upsert(
                   [ $this->extractFieldsFromRow($row) ],  [ $this->extractFieldsFromRow($row)]
                );

                $importCount++;

                $this->rowUploading++;
            });
         $this->rowAdded = $importCount;

         $this->reset([
            //  'user_id',
             'department_id',
             'student_id_number',
             'title',
             'fullname',
             'gender',
             'marital_stutus',
             'telephone',
             'email',
             'photo',
             'nin',
             'date_of_birth',
             'country',
             'state',
             'lga',
             'address',
             'blood_group',
             'disability',
             'medical_condition',
             'access_token',
             'payment_token',
             'level',
             'showModal',
             'upload',
             'rowUploading',
         ]);

        $this->emit('refreshTransactions');

        $this->notify('Imported '.$importCount.' Records!');
        $this->start = false;
        $this->done = true;
    }

    public function done()
    {
        $this->reset([

            // 'user_id',
            'department_id',
            'student_id_number',
            'title',
            'fullname',
            'gender',
            'marital_stutus',
            'telephone',
            'email',
            'photo',
            'nin',
            'date_of_birth',
            'country',
            'state',
            'lga',
            'address',
            'blood_group',
            'disability',
            'medical_condition',
            'access_token',
            'payment_token',
            'level',
            'showModal',
            'upload',

         ]);

         $this->imported = [];
         $this->doneUpload = true;
         $this->done = false;

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

            // 'department_id'     => ['department_id'],
            // 'user_id' => ['user_id'],
            'department_id'             => ['department_id'],
            'student_id_number'         => ['student_id_number'],
            'title'        => ['title'],
            'fullname'           => ['fullname'],
            'gender'           => ['gender'],
            'marital_stutus'           => ['marital_stutus'],
            'telephone'           => ['telephone'],
            'email'           => ['email'],
            'photo'           => ['photo'],
            'nin'           => ['nin'],
            'date_of_birth'           => ['date_of_birth'],
            'country'           => ['country'],
            'state'           => ['state'],
            'lga'           => ['lga'],
            'address'           => ['address'],
            'blood_group'           => ['blood_group'],
            'disability'           => ['disability'],
            'medical_condition'           => ['medical_condition'],
            'access_token'           => ['access_token'],
            'payment_token'           => ['payment_token'],
            'level'           => ['level'],
        ];

        foreach ($this->columns as $column) {
            $match = collect($guesses)->search(fn($options) => in_array(strtolower($column), $options));
            if ($match) $this->fieldColumnMap[$match] = $column;
        }
    }

}
