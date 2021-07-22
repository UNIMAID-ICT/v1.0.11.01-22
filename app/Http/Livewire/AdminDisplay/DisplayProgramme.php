<?php

namespace App\Http\Livewire\AdminDisplay;

use App\Models\Department;
use Livewire\Component;

class DisplayProgramme extends Component
{
    protected $listeners = ['imported_pro' => '$refresh'];
    
    public function render()
    {        
        return view('livewire.admin-display.display-programme', ['departments' => Department::with('programs')->get()]);
    }
}
