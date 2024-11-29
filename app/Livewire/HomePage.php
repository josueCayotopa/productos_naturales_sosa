<?php

namespace App\Livewire;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Livewire\Attributes\Title;
use Livewire\Component;


#[Title('Home Page - DonBide')]
class HomePage extends Component
{
    public function render()
    {
        // se utiliza como controlador  , se declaran las instancias y se envian a la vista 

        $brands = Brand::where('is_active', 1)->get();
        $categories = Category::where('is_active', 1)->get();
        $produts_onsale=Product::where('on_sale', 1)->get();
        $produts_featured=Product::where('is_featured', 1)->get();
        return view('livewire.home-page',
    ['brands'=>$brands,
    'categories'=>$categories,
    'produts_onsale'=>$produts_onsale,
    'productos_destacado'=>$produts_featured,
]);
    }
}
