<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Category;
use Livewire\Attributes\Title;
#[Title("Categories | ShopEase")]

class CategoriesPage extends Component
{
    public function render()
    {
        $category = Category::where('is_active', 1)->get();
        return view('livewire.categories-page', [
            'categories' => $category,
        ]);
    }
}
