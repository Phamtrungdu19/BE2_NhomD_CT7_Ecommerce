<div>
    <div class="py-3 py-md-5 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-md-5 mt-3">
                    <div class="bg-white border">

                        @if($product->productsImages)
                            @php
                                $image = $product->productsImages[0];
                            @endphp
                            <img src="{{asset("$image->image")}}" class="w-100" alt="Img">

                        @else
                            NO Image
                        @endif
                    </div>
                </div>
                <div class="col-md-7 mt-3">
                    <div class="product-view">
                        <h4 class="product-name">

                            {{$product->name}}

                            <label class="label-stock bg-success">In Stock</label>
                        </h4>
                        <hr>
                        <p class="product-path">
                            Home / {{$product->category->name}} / {{$product->name}}
                        </p>
                        <div>
                            <span class="selling-price">{{$product->selling_price}}</span>
                            <span class="original-price">{{$product->original_price}}</span>
                        </div>
                        <div class="mt-2">
                            <div class="input-group">
                                <span class="btn btn1" wire:loading.attr="disabled"  wire:click="decrementQuantity"><i class="fa fa-minus">-</i></span>
                                <input type="text" wire:loading.attr="disabled"  wire:model="quantityCount" value="{{$quantityCount}}" class="input-quantity" />
                                <span class="btn btn1" wire:loading.attr="disabled"  wire:click="incrementQuantity"><i class="fa fa-plus">+</i></span>
                            </div>
                        </div>
                        <div class="mt-2">
                            <button type="button" wire:loading.attr="disabled" wire:click="addToCart({{$product->id}})" class="btn btn1" >
                                 <i class="fa fa-shopping-cart"></i> Add To Cart
                                </button>
                            <a href="" class="btn btn1"> <i class="fa fa-heart"></i> Add To Wishlist </a>
                        </div>
                       

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 mt-3">
                    <div class="card">
                        <div class="card-header bg-white">
                            <h4>Mô Tả</h4>
                        </div>
                        <div class="card-body">
                            <p>
                                {{ $product->meta_description }}
                            </p>
                        </div>
                        <div class="mt-3">
                            <h5 class="mb-0">{{$product->small_description}}</h5>
                            <p class="pro-description">
                                {{$product->description}}
                            </p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
