<?php

namespace App\Livewire\Partials;

use App\Helpers\CartMangement;
use Livewire\Attributes\On;
use Livewire\Component;

class Navbar extends Component
{
    public $cartCount = 0;
    public $cartItems = [];
    public $cartTotal = 0;

    protected $listeners = ['update-cart-count' => 'updateCartCount'];

    public function mount()
    {
        $this->updateCart();
    }

    public function updateCart()
    {
        $this->cartItems = CartMangement::getCartItemsFromCookie();
        $this->cartCount = count($this->cartItems);
        $this->cartTotal = CartMangement::calculateGrandTotal($this->cartItems);
    }

    public function updateCartCount($total_count)
    {
        $this->cartCount = $total_count;
        $this->updateCart();
    }

    public function removeFromCart($productId)
    {
        CartMangement::removeCartItem($productId);
        $this->updateCart();
    }

    public function render()
    {
        return view('livewire.partials.navbar');
    }
}
