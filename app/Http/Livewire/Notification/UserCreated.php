<?php

namespace App\Http\Livewire\Notification;

use Livewire\Component;

class UserCreated extends Component
{
    public $notifications;

    public function mount(){
         $this->notifications = auth()->user()->unreadNotifications;
    }

    public function render()
    {
         $this->notifications = auth()->user()->unreadNotifications;
        return view('livewire.notification.user-created');
    }
}
