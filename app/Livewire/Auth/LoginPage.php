<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use Livewire\Attributes\Title;
#[Title("Login | Shope Ease")]

class LoginPage extends Component
{
    public function render()
    {
        return view('livewire.auth.login-page');
    }
}
