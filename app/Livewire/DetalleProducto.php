<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;

class DetalleProducto extends Component
{
    public $product;

    public function mount($product)
    {
        $this->product = $product;
    }

    public function render()
    {
        return view('livewire.detalle-producto');
    }
}
