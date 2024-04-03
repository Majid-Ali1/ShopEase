<?php

namespace App\Livewire;

use App\Models\Brand;
use App\Models\Product;
use Livewire\Attributes\Url;
use Livewire\Component;
use App\Models\Category;
use Livewire\WithPagination;
use Livewire\Attributes\Title;
#[Title("Products | Shope Ease")]

class ProductsPage extends Component
{
    use WithPagination;
    #[Url]
    public $selected_categories = [];

    #[Url]
    public $selected_brands = [];

    public function render()
    {
        $productQuery = Product::query()->where('is_active', 1);

        if (!empty($this->selected_categories)) {
            $productQuery->whereIn('category_id', $this->selected_categories);
        }
        
        if (!empty($this->selected_brands)) {
            $productQuery->whereIn('brand_id', $this->selected_brands);
        }
        
        $brand = Brand::where('is_active', 1)->get();
        $category = Category::where('is_active', 1)->get();
        return view('livewire.products-page', [
            'products' => $productQuery->paginate(6),
            'brands' => $brand,
            'categories' => $category,
        ]);
    }
}
