<?php

namespace App\Http\Livewire\Frontend\Checkout;

use App\Models\Cart;
use Livewire\Component;
use Illuminate\Http\Request;
use Validator;
use App\Http\Requests;
use App\Models\Order;
use App\Models\Orderitem;
use Illuminate\Auth\Events\Validated;
use Illuminate\Support\Str;

class CheckoutShow extends Component
{
    public $carts, $totalProductAdmount = 0;

    public $fullname, $email, $phone, $pincode, $address, $payment_mode = NULL, $payment_id = NULL;

    public function rules()
    {
        return [
            'fullname' => 'required|string|max:121',
            'email' => 'required|email|max:121',
            'phone' => 'required|string|max:11|min:10',
            'pincode' => 'required|string|max:6|min:6',
            'address' => 'required|string|max:500',
        ];
    }
    public function placeOrder()
    {
        $this->validate();
        $order = Order::create([
            'user_id' => auth()->user()->id,
            'tracking_no' => 'E-com' . Str::random(10),
            'fullname' => $this->fullname,
            'email' => $this->email,
            'phone' => $this->phone,
            'pincode' => $this->pincode,
            'address' => $this->address,
            'status_message' => 'inprogress',
            'payment_mode' => $this->payment_mode,
            'payment_id',
        ]);
        foreach ($this->carts as $cartItem) {
            $orderItems = Orderitem::create([
                'order_id' => $order->id,
                'product_id' => $cartItem->product_id,
                'quantity' => $cartItem->quantity,
                'price' => $cartItem->product->selling_price,
            ]);
        }
        return $order;
    }
    public function codOrder()
    {
        $this->payment_mode = 'Cash on Delivery';
        $codOrder = $this->placeOrder();
        if ($codOrder) {
            Cart::where('user_id', auth()->user()->id)->delete();
            $this->dispatchBrowserEvent('message', [
                'text' => 'Order place successfull',
                'type' => 'success',
                'status' => 200
            ]);
        } else {
            $this->dispatchBrowserEvent('message', [
                'text' => 'Order place successfull',
                'type' => 'Error',
                'status' => 500
            ]);
        }
    }
    public function totalProductAdmount()
    {
        $this->carts = Cart::where('user_id', auth()->user()->id)->get();
        foreach ($this->carts as $cartItem) {
            if ($cartItem->product) {
                $this->totalProductAdmount += $cartItem->product->selling_price * $cartItem->quantity;
            }
        }
        return $this->totalProductAdmount;
    }
    public function render()
    {
        $this->totalProductAdmount = $this->totalProductAdmount();
        return view('livewire.frontend.checkout.checkout-show', [
            'totalProductAdmount' => $this->totalProductAdmount
        ]);
    }
}
