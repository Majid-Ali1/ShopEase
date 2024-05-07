<?php

namespace App\Livewire;

use App\Models\Brand;
use App\Models\Product;
use Livewire\Component;
use App\Models\Category;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Url;
use Livewire\WithPagination;
use Livewire\Attributes\Title;
use App\Helpers\CartManagement;
use App\Livewire\Partials\Navbar;
#[Title("Products | ShopEase")]

class ProductsPage extends Component
{
    use LivewireAlert;
    
    use WithPagination;
    #[Url]
    public $selected_categories = [];

    #[Url]
    public $selected_brands = [];
    
    #[Url]
    public $featured;
    
    #[Url]
    public $on_sale;
    
    #[Url]
    public $sort = 'latest';

    public $price_range = 1000000;

    // add product to cart method
    public function addToCart($product_id){
        // dd($product_id);
        $total_count = CartManagement::addItemsToCart($product_id);

        $this->alert('success', 'Product added to cart successfully!', [
            'position' => 'center',
            'timer' => 3000,
            'toast' => true,
            'timerProgressBar' => true,
        ]);
        
        $this->dispatch('update-cart-amount', total_count: $total_count)->to(Navbar::class);

        
    }

    public function render()
    {
        $productQuery = Product::query()->where('is_active', 1);

        if (!empty($this->selected_categories)) {
            $productQuery->whereIn('category_id', $this->selected_categories);
        }
        
        if (!empty($this->selected_brands)) {
            $productQuery->whereIn('brand_id', $this->selected_brands);
        }

        if ($this->featured) {
            $productQuery->where('is_featured', 1);
        }

        if ($this->on_sale) {
            $productQuery->where('on_sale', 1);
        }

        if ($this->price_range) {
            $productQuery->whereBetween('price', [0, $this->price_range]);
        }

        if ($this->sort == "latest") {
            $productQuery->latest();
        }

        if ($this->sort == "price") {
            $productQuery->orderBy("price");
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
