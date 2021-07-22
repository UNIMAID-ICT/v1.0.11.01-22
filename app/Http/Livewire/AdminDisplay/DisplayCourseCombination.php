<?php

namespace App\Http\Livewire\AdminDisplay;

use App\Models\CourseDepartment;
use App\Models\Department;
use Livewire\Component;

class DisplayCourseCombination extends Component
{
    protected $listeners = ['course_set' => '$refresh'];

    public $student_courses;

    public $approved_courses;

    public $departmentId;

    public $sortField = 'dept_title';

    public $sortDirection = 'desc';


    // public function course_set()
    // {
    //     $this->render();
    // }

    public function mount($id)
    {
        $this->departmentId = $id;
    }

    public function removeRecord($course_id , $department_id)
    {
        CourseDepartment::whereCourseId($course_id)->whereDepartmentId($department_id)->first()->delete();

        $this->emit('course_set', '');
    }

    public function render()
    {
        // $this->approved_courses = CourseDepartment::with('subsidiries')->whereDepartmentId()->get
        $this->student_courses = Department::with('courses')->whereId($this->departmentId)->get();

        return view('livewire.admin-display.display-course-combination');
    }
}
