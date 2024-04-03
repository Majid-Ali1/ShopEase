<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use Livewire\Attributes\Title;
#[Title("Register | Shope Ease")]

class RegisterPage extends Component
{
    public function render()
    {
        return view('livewire.auth.register-page');
    }
}
