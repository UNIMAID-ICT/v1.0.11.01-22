<?php

namespace App\Http\Livewire\DepartmentCordinator;

use App\Models\Assets;
use App\Models\Course;
use App\Models\Department;
use App\Models\DepartmentUser;
use App\Models\School;
use App\Models\SchoolUser;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CreateSubsidiary extends Component
{

    public $schools;

    public $course;

    public $courses;

    public $programme;    

    public $departments;

    public $semester;

    public $level;

    public function updatedProgramme($value)
    {
        $this->courses = Course::whereProgramId($value)->get();
    }

    public function createSub(){
        
        $this->validate([
            'programme' => 'required',
            'course'     => 'required',
            'semester'   => 'required|in:'.collect(Assets::SEMESTER)->keys()->implode(','),
            'level'   => 'required|in:'.collect(Assets::LEVEL)->keys()->implode(','),
        ]);

        $cor_id = Course::find($this->course);
        $dept_id = Department::find($this->departments->id);

        $cor_id->departments()->save($dept_id, [
            'semester_offer' => $this->semester,
            'level' => $this->level
        ]);

        $this->course = '';
        $this->programme = '';
        $this->semester = '';
        $this->level = '';

        $this->emit('course_set', '');
        $this->dispatchBrowserEvent('notify', 'Course Added Successfully');
    }

    public function render(){
        // $scl = SchoolUser::whereUserId(Auth::id())->first();
        // $this->schools = School::whereId($scl->school_id)->first();
        $depart = DepartmentUser::whereUserId(Auth::id())->first();
        $this->departments = Department::whereId($depart->department_id)->first();
        
        return view('livewire.department-cordinator.create-subsidiary');
    }
}
