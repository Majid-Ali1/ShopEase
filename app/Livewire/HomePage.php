<?php

namespace App\Livewire;

use App\Models\Brand;
use Livewire\Component;
use App\Models\Category;
use Livewire\Attributes\Title;
#[Title("Home Page | Shope Ease")]
class HomePage extends Component
{
    public function render()
    {
        $brand = Brand::where('is_active', 1)->get();
        $category = Category::where('is_active', 1)->get();
        return view('livewire.home-page', [
            'brands' => $brand,
            'categories' => $category,
        ]);
    }
}
