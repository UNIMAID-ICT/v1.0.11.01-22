<?php

namespace App\Http\Livewire\AdminDisplay;

use App\Models\Program;
use Livewire\Component;

class DisplayCourse extends Component
{
    protected $listeners = ['refreshTransactions' => '$refresh'];

    public function render()
    {
        return view('livewire.admin-display.display-course', ['programs' => Program::with('courses')->get()]);
    }
}
