<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Title;
#[Title("Categories | Shope Ease")]

class CategoriesPage extends Component
{
    public function render()
    {
        return view('livewire.categories-page');
    }
}
