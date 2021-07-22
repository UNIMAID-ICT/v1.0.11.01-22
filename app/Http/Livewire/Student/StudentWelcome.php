<?php

namespace App\Http\Livewire\Student;

use App\Models\Department;
use App\Models\School;
use App\Models\Student;
use App\Models\User;
use Livewire\Component;

class StudentWelcome extends Component
{


    public function render()
    {
       return view('livewire.student.student-welcome');
    }
}
