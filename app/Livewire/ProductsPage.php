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

    public $selected_categories = [];
    public $selected_brands = [];
    public $min_price = 0;
    public $max_price = 1000;
    public $sort = 'latest';

    protected $queryString = [
        'selected_categories',
        'selected_brands',
        'min_price',
        'max_price',
        'sort',
    ];

    public function updatingSelectedCategories()
    {
        $this->resetPage();
    }

    public function updatingSelectedBrands()
    {
        $this->resetPage();
    }

    public function updatingMinPrice()
    {
        $this->resetPage();
    }

    public function updatingMaxPrice()
    {
        $this->resetPage();
    }

    public function updatingSort()
    {
        $this->resetPage();
    }

    public function addToCart($product_id)
    {
        CartMangement::añadirArticuloCesta($product_id);
        $this->emit('cartUpdated');
    }

    public function render()
    {
        $query = Product::query()->where('is_active', 1);

        if (!empty($this->selected_categories)) {
            $query->whereIn('category_id', $this->selected_categories);
        }

        if (!empty($this->selected_brands)) {
            $query->whereIn('brand_id', $this->selected_brands);
        }

        $query->whereBetween('price', [$this->min_price, $this->max_price]);

        switch ($this->sort) {
            case 'featured':
                $query->where('is_featured', 1);
                break;
            case 'on_sale':
                $query->where('on_sale', 1);
                break;
            case 'price_asc':
                $query->orderBy('price', 'asc');
                break;
            case 'price_desc':
                $query->orderBy('price', 'desc');
                break;
            case 'latest':
            default:
                $query->latest();
                break;
        }

        $products = $query->paginate(6);

        return view('livewire.products-page', [
            'products' => $products,
            'categories' => Category::where('is_active', 1)->get(),
            'brands' => Brand::where('is_active', 1)->get(),
        ]);
    }
}
