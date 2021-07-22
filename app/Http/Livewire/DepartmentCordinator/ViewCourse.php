<?php

namespace App\Http\Livewire\DepartmentCordinator;


use App\Models\Department;
use App\Models\DepartmentUser;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ViewCourse extends Component
{
    public $departments;

    public function render()
    {
        $this->faculty = DepartmentUser::whereUserId(Auth::id())->first(); 
        
        $this->departments = Department::with('programs')->whereId($this->faculty->department_id)->get();
        return view('livewire.department-cordinator.view-course');
    }
}
