<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Title;
#[Title("Order Detail | ShopEase")]

class MyOrderDetailPage extends Component
{
    public function render()
    {
        return view('livewire.my-order-detail-page');
    }
}
