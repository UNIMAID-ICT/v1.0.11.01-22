<?php

namespace App\Http\Livewire\Admin;

use App\Models\Assets;
use App\Models\Course;
use App\Models\CourseDepartment;
use App\Models\Department;
use Livewire\Component;

class CourseCombination extends Component
{
    public $schools;

    public $departmentCourse;

    public $department;

    public $department_id;

    public $programs;

    public $programme;

    public $course;

    public $courses;

    public $semester;

    public $level;



    public function updatedDepartment($value)
    {
        $this->department_id = $value;

    }

    public function updatedProgramme($value)
    {
        $this->courses = Course::whereProgramId($value)->get();
    }

    public function createSub(){

        $this->validate([
            'department' => 'required',
            'programme'  => 'required',
            'course'     => 'required',
            'semester'   => 'required|in:'.collect(Assets::SEMESTER)->keys()->implode(','),
            'level'      => 'required|in:'.collect(Assets::LEVEL)->keys()->implode(','),
        ]);

        $cor_id = Course::find($this->course);
        $dept_id = Department::find($this->department_id);

        $cor_id->departments()->save($dept_id, [
            'semester_offer' => $this->semester,
            'level' => $this->level
        ]);

        $this->course = '';
        // $this->programme = '';
        $this->semester = '';
        $this->level = '';

        $this->emit('course_set');
        $this->dispatchBrowserEvent('notify', 'Course Added Successfully');
    }

    public function mount(){
    }

    public function render()
    {
       return view('livewire.admin.course-combination');
    }
}
