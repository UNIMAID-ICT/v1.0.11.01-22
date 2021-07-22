<?php

namespace App\Http\Livewire\Nav;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class SideBar extends Component
{
    public $userName;

    public function render()
    {
        // $this->userName = User::all();
        // dd($this->userName);
        return view('livewire.nav.side-bar');
    }
}
