<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use Livewire\Attributes\Title;
#[Title("Reset Password | ShopEase")]

class ResetPasswordPage extends Component
{
    public function render()
    {
        return view('livewire.auth.reset-password-page');
    }
}
