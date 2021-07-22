<?php

namespace App\Http\Livewire\AdminDisplay;

use App\Models\Department;
use App\Models\School;
use Livewire\Component;

class DisplayDepartment extends Component
{
    protected $listeners = ['imported_dept' => '$refresh'];
    

    public function render()
    {
        // $this->departments = School::with('departments')->get();
        // dd($this->departments);
        
        return view('livewire.admin-display.display-department', ['faculties' => School::with('departments')->get()]);
    }
}
