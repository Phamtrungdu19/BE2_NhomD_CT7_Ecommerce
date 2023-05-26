<?php

namespace App\Http\Livewire\Frontend\Product;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\Livewire;

class View extends Component
{
    public $category, $product;
    public $quantityCount = 1;
    public function mount($category, $product)
    {
        $this->category = $category;
        $this->product = $product;
    }
    public function decrementQuantity()
    {
        if ($this->quantityCount == 0) {
            $this->quantityCount = 0;
        } else {
            $this->quantityCount--;
        }
    }
    public function addToCart(int $productId)
    {
        if (Auth::check()) {
            if ($this->product->where('id', $productId)->where('status', '0')->exists()) {
                if ($this->product->quantiny > 0) {
                    dd('DA');
                } else {
                    $this->dispatchBrowserEvent('message', [
                        'text' => 'Out of Stock',
                        'type' => 'warning',
                        'status' => 404
                    ]);
                }
            } else {
                $this->dispatchBrowserEvent('message', [
                    'text' => 'Product does not exists',
                    'type' => 'warning',
                    'status' => 404
                ]);
            }
        } else {
            $this->dispatchBrowserEvent('message', [
                'text' => 'Please Login to add to cart',
                'type' => 'info',
                'status' => 401
            ]);
        }
    }
    public function incrementQuantity()
    {
        $this->quantityCount++;
    }
    public function render()
    {
        return view('livewire.frontend.product.view', [
            'category' => $this->category,
            'product' => $this->product,
        ]);
    }
}