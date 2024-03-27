<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Title;
#[Title("Product Detail | Shope Ease")]

class ProductDetailPage extends Component
{
    public function render()
    {
        return view('livewire.product-detail-page');
    }
}
