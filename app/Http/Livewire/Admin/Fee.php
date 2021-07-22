<?php

namespace App\Http\Livewire\Admin;

use App\Models\Assets;
use App\Models\Department;
use App\Models\DepartmentUser;
use App\Models\Fee as ModelsFee;
use App\Models\School;
use App\Models\SchoolUser;
use Livewire\Component;

class Fee extends Component
{
    public $school;
    public $deptschool;
    public $school_id;
    public $fee_type;
    public $student_type;
    public $level;
    public $department_id;
    public $departments;
    public $amount;

    public function saveFee(){
        $this->school_id = $this->school->school_id;

        if(($this->department_id === "SELECT DEPARTMENT") || ($this->department_id === ''))
        {
            $this->department_id = null;
        }

        $data = $this->validate([
            'school_id'     => 'required',
            'fee_type'      => 'required|in:'.collect(Assets::FEE_TYPE)->keys()->implode(','),
            'student_type'  => 'required|in:'.collect(Assets::STUDENT_TYPE)->keys()->implode(','),
            'level'         => 'required|in:'.collect(Assets::FEE_LEVEL)->keys()->implode(','),
            'department_id' => 'nullable',
            'amount'        => 'required|numeric',
        ]);


        ModelsFee::create($data);

        $this->emit('fee_set');
        $this->dispatchBrowserEvent('notify', 'Record Saved Successfully');
        $this->fee_type = '';
        $this->student_type = '';
        $this->level = '';
        $this->department_id = '';
        $this->amount = '';
        $this->resetValidation();
    }

    public function render()
    {


        $this->school = SchoolUser::whereUserId(auth()->id())->first();


        $this->departments = Department::whereSchoolId($this->school->school_id)->get();


        $this->deptschool = School::whereId($this->school->school_id)->first();

        return view('livewire.admin.fee');
    }
}
