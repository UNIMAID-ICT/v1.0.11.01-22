<?php

namespace App\Http\Livewire\Admin;

use App\Models\Role;
use Livewire\Component;

class SuperAdmin extends Component
{
    public function render()
    {
        return view('livewire.admin.super-admin');
    }
}
