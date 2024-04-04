<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Title;
#[Title("Orders | ShopEase")]

class MyOrdersPage extends Component
{
    public function render()
    {
        return view('livewire.my-orders-page');
    }
}
