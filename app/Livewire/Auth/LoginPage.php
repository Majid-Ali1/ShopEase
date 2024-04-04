<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use Livewire\Attributes\Title;
#[Title("Login | ShopEase")]

class LoginPage extends Component
{
    public function render()
    {
        return view('livewire.auth.login-page');
    }
}
