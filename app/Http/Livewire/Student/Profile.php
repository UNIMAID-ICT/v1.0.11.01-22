<?php

namespace App\Http\Livewire\Student;

use App\Models\Student;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Profile extends Component
{
    public $stdId;

    public $user;

    public function mount(){
        $this->user = User::whereId(auth()->id())->first();
    }

    public function render()
    {
        $this->stdId = Student::whereStudentIdNumber($this->user->name)->first();

        return view('livewire.student.profile');
    }
}
