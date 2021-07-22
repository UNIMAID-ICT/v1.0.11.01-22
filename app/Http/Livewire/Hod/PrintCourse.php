<?php

namespace App\Http\Livewire\Hod;

use App\Models\Department;
use App\Models\DepartmentUser;
use Livewire\Component;

class PrintCourse extends Component
{
    public $department;

    public $level;

    public $first = "FIRST";
    public $second = "SECOND";

    public $student_courses;


    public function updatedLevel($value){

        $depart = DepartmentUser::whereUserId(auth()->id())->first();

        $this->department = Department::whereId($depart->department_id)->first();

        $this->student_courses  = Department::with(['subsidiries' => function($query) use($value){
            $query->whereLevel($value)->get();
        }])->whereId($depart->department_id)->get();
    }



    public function render()
    {
      return view('livewire.hod.print-course');
    }
}
