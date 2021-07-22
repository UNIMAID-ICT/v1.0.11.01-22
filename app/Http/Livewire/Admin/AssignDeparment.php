<?php

namespace App\Http\Livewire\Admin;

use App\Models\School;
use App\Models\Student;
use Livewire\Component;

class AssignDeparment extends Component
{
    public $student_id = '16/11/01/003';
    public $name;
    public $fac_id;
    public $dept_id;
    public $schools;
    public function getFaculity()
    {
        
    }

    public function getDept()
    {
        
    }

    public function render()
    {
        $this->name = Student::whereStudentIdNumber($this->student_id)->first();
        $this->fac_id = substr($this->student_id, 3, 2);
        $this->dept_id = substr($this->student_id, 6, 2);
        $this->schools = School::with(['departments' => 
        function ($query) {
            $query->where('dept_no', $this->dept_id);
        }])->where('school_no', $this->fac_id)->get();

        
        return view('livewire.admin.assign-deparment');
    }
}
