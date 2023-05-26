<div>
  <h4>Cart Pages</h4>
  <div class="py-3 py-md-5 bg-light">
    <div class="container">

        <div class="row">
            <div class="col-md-12">
                <div class="shopping-cart">

                    <div class="cart-header d-none d-sm-none d-mb-block d-lg-block">
                        <div class="row">
                            <div class="col-md-6">
                                <h4>Products</h4>
                            </div>
                            <div class="col-md-1">
                                <h4>Price</h4>
                            </div>
                            <div class="col-md-2">
                                <h4>Quantity</h4>
                            </div>
                            <div class="col-md-1">
                                <h4> Total Price</h4>
                            </div>
                            <div class="col-md-2">
                                <h4>Remove</h4>
                            </div>
                        </div>
                    </div>


                @forelse ($cart as $cartItem )
                     @if($cartItem->product)
                     <div class="cart-item">
                        <div class="row">
                            <div class="col-md-6 my-auto">
                                <a href="{{url('collections/'. $cartItem->product->category->slug.'/'.$cartItem->product->slug)}}">
                                    <label class="product-name">
                                        <img src="{{asset($cartItem->product->productsImages[0]->image)}}" style="width: 50px; height: 50px" alt="">
                                        {{ $cartItem->product->name}}
                                    </label>

                                </a>
                            </div>
                            <div class="col-md-1 my-auto">
                                <label class="price">{{ $cartItem->product->selling_price}} </label>
                            </div>
                            <div class="col-md-2 col-7 my-auto">
                                <div class="quantity" >
                                    <div class="input-group">
                                        <button wire:loading.attr="disabled" wire:click="decrementQuantity({{$cartItem->id}})" class="btn btn1"><i class="fa fa-minus">-</i></button>
                                        <input type="text" value="{{$cartItem->quantity}}" class="input-quantity" />
                                        <button  wire:loading.attr="disabled" wire:click="incrementQuantity({{$cartItem->id}}) class="btn btn1"><i class="fa fa-plus">+</i></button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-1 my-auto">
                                <label class="total">{{ $cartItem->product->selling_price*$cartItem->quantity}} </label>
                            </div>
                            <div class="col-md-2 col-5 my-auto">
                                <div class="remove">
                                    <button type="button" wire:loading.attr="disabled"  wire:click="removeCartItem({{$cartItem->id}})" class="btn btn-danger btn-sm">
                                        <i class="fa fa-trash"></i> Remove
                                    </button>
                                </div>
                            </div>
                        </div>

                </div>
                     @endif

                        @empty
                <div>No Cart Items available</div>
                        @endforelse
            </div>
        </div>

    </div>
</div>
</div>
