<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Title;
#[Title("Checkout | ShopEase")]

class CheckoutPage extends Component
{
    public function render()
    {
        return view('livewire.checkout-page');
    }
}
