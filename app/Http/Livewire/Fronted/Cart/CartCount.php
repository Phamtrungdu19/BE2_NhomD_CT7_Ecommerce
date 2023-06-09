<?php

namespace App\Http\Livewire\Fronted\Cart;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use App\Models\Cart;

class CartCount extends Component
{
    public $cartCount;

    protected $listeners = ['CartAdded' => 'checkCartCount'];

    public function  checkCartCount()
    {
        if (Auth::check()) {
            return $this->cartCount = Cart::where('user_id', auth()->user()->id)->count();
        } else {
            return $this->cartCount = 0;
        }
    }
    public function render()
    {
        $this->cartCount = $this->checkCartCount();
        return view('livewire.fronted.cart.cart-count', [
            'cartCount' => $this->cartCount
        ]);
    }
}
