<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class CreateStudent extends Component
{
    public $createCourse;

    public function render()
    {
        return view('livewire.admin.create-student');
    }
}
