<?php

namespace App\Http\Livewire\Student;

use App\Models\Department;
use App\Models\DepartmentUser;
use App\Models\Student;
use Livewire\Component;
use Livewire\WithPagination;

class StudentOperation extends Component
{
    use WithPagination;

    public $search;

    public $student_id;

    public $student_carryovers;

    public $cor_department;

    public $department;

    public $showStudentCarryOverModal = false;

    public $ca;

    public $exam;

    public $total;

    public $remark;

    public $course_name;


    public function updatedExam($value){

          $this->total =  $this->ca + $value;

    }

    public function openCarryOverModel(){
        $this->showStudentCarryOverModal = true;
    }

    public function done(){
        $this->showStudentCarryOverModal = false;
    }

    public function updatedSearch($value){
        $this->student_id = $value;
    }

    public function render()
    {
        $this->cor_department = DepartmentUser::whereUserId(auth()->id())->first();

        $this->department = Department::whereId($this->cor_department->department_id)->first();
        return view('livewire.student.student-operation', ['level_students' => Student::search('student_id_number', $this->student_id)
                                                            ->whereDepartmentId($this->cor_department->department_id)->whereLevel($this->cor_department->cor_level)
                                                            ->paginate(25)]);
    }
}
