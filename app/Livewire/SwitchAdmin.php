<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class SwitchAdmin extends Component
{
    public $user;
    public $isChecked;

    public function mount(User $user)
    {
        $this->user = $user;
        $this->isChecked = $user->admin == 1;
    }

    public function render()
    {
        return view('livewire.switch-admin');
    }

    public function updatedIsChecked($value)
    {
        $this->user->admin = $value ? 1 : 0;
        $this->user->save();
    }
}

