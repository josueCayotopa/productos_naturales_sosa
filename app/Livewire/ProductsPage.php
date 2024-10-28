<?php

namespace App\Livewire;

use App\Helpers\CartMangement;
use App\Livewire\Partials\Navbar;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Title;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

#[Title('Products - Don Bide')]
class ProductsPage extends Component
{
    use LivewireAlert;

    use WithPagination;
    #[Url]
    public $selected_catefories = [];
    #[Url]
    public $selected_brands = [];
    #[Url]
    public $featured = [];
    #[Url]
    public $on_sale = [];
    #[Url]
    public $price_range = 4000;
    #[Url]
    public $sort = 'latest';

    // Añadir producto a carrito 
    public function addToCart($product_id)
    {
        $total_count = CartMangement::añadirArticuloCesta($product_id);
        $this->dispatch('update-cart-count', total_count: $total_count)->to(Navbar::class);
        $this->alert('success', 'Product added to the cart successfully', [
            'position' => 'bottom-end',

        ]);
    }
    public function render()

    {
        $productquery = Product::query()->where('is_active', 1);
        if (!empty($this->selected_catefories)) {
            $productquery->whereIn('category_id', $this->selected_catefories);
        }
        if (!empty($this->selected_brands)) {
            $productquery->whereIn('brand_id', $this->selected_brands);
        }
        if ($this->featured) {
            $productquery->where('is_featured', 1);
        }
        if ($this->on_sale) {
            $productquery->where('on_sale', 1);
        }
        if ($this->price_range) {
            $productquery->whereBetween('price', [0, $this->price_range]);
        }
        if ($this->sort == 'latest') {
            $productquery->latest();
        }
        if ($this->sort == 'price') {
            $productquery->orderBy('price');
        }


        return view(
            'livewire.products-page',
            [
                'products' => $productquery->paginate(6),
                'brands' => Brand::where('is_active', 1)->get(['id', 'name', 'slug']),
                'categories' => Category::where('is_active', 1)->get(['id', 'name', 'slug']),
            ]
        );
    }
}
