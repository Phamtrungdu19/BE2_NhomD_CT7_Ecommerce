<div>
    <div class="py-3 py-md-5 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-md-5 mt-3">
                    <div class="bg-white border">
<<<<<<< HEAD
                        @if($product->productItem)             @if ($product->productItem)
                            <img src="{{ asset($product->productItem->image) }}" class="w-100" alt="Img">
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
                                <span class="btn btn1"><i class="fa fa-minus"></i></span>
                                <input type="text" value="1" class="input-quantity" />
                                <span class="btn btn1"><i class="fa fa-plus"></i></span>
                            </div>
                        </div>
                        <div class="mt-2">
                            <a href="" class="btn btn1"> <i class="fa fa-shopping-cart"></i> Add To Cart</a>
                            <a href="" class="btn btn1"> <i class="fa fa-heart"></i> Add To Wishlist </a>
                        </div>
                        <div class="mt-3">
                            <h5 class="mb-0">{{$product->small_description}}</h5>
                            <p>
                                {{$product->description}}
                            </p>
                        </div>
=======
                            Home / {{ $product->category->name }} / {{ $product->name }}
                        </p>
                        <div>
                            <span class="selling-price">{{ $product->selling_price }}</span>
                            <span class="original-price">{{ $product->original_price }}</span>
                        </div>
                        @if ($product->productColors)
                            @foreach ($product->productsColors as $colorItem)
                                <input type="radio" name="colorSelection"
                                    value="{{ $colorItem->id }}" />{{ $colItem->color->name }}
                            @endforeach
                            <div class="mt-2">
                                <div class="input-group">
                                    <span class="btn btn1"><i class="fa fa-minus"></i></span>
                                    <input type="text" value="1" class="input-quantity" />
                                    <span class="btn btn1"><i class="fa fa-plus"></i></span>
                                </div>
                            </div>
                            <div class="mt-2">
                                <a href="" class="btn btn1"> <i class="fa fa-shopping-cart"></i> Add To Cart</a>
                                <a href="" class="btn btn1"> <i class="fa fa-heart"></i> Add To Wishlist </a>
                            </div>
                            <div class="mt-3">
                                <h5 class="mb-0">{{ $product->small_description }}</h5>
                                <p>
                                    {{ $product->description }}
                                </p>
                            </div>
                        @endif
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
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>