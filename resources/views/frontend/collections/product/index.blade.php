@extends('layouts.app')

@section('title')
    {{ $category->meta_title }}
@endsection
@section('meta_keyword')
    {{ $category->meta_keyword }}
@endsection
@section('meta_description')
    {{ $category->meta_description }}
@endsection

@section('content')
    <div>
        <div class="row">
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header"><h4>Brands</h4></div>
                    <div class="card-body">
                        <label class="d-block">
                            <input type="checkbox"/>Mi
                        </label>
                    </div>
                </div>
            </div>
            <div class="col-md-9">

        <div class="row">
            <div class="container">
                <div class="col-md-12">
                    <h4 class="mb-4">Our Products</h4>
                </div>
                @forelse($products as $productsItem)
                    <div class="col-md-3">
                        <div class="product-card">
                            <div class="product-card-img">
                                @if ($productsItem->quantity > 0)
                                    <label class="stock bg-success">In Stock</label>
                                @else
                                    <label class="stock bg-danger">Out of Stock</label>
                                @endif
                                @if ($producItem->productImages->cont() > 0)
                                    <a
                                        href="{{ url('/collections/' . $productItem->category->slug . '/' . $productItem->slug) }}">
                                        <img src="{{ asset($productItem->productImages[0]->image) }}"
                                            alt="{{ $productItem->name }}">
                                    </a>
                                @endif
                            </div>
                            <div class="produrct-crad-body">
                                <p class="product-brand">{{ $productItem->bran }}</p>
                                <h5 class="product-name">
                                    <a
                                        href="{{ url('/collections/' . $productItem->category->slug . '/' . $productItem->slug) }}">
                                        {{ $productItem->name }}
                                    </a>
                                </h5>
                                <div>
                                    <samp class="selling-price">${{ $productItem->selling_price }}</samp>
                                    <samp class="selling-price">${{ $productItem->priginal_price }}</samp>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- @else
                        <label class="stock bg-success">Out of Stock</label>
                        @endif
                        @if ($productsItem->productsImages->count() > 0)
                        <a href="{{url('/collections/'.$productsItem->category->slug.'/'.$productsItem->slug)}}">
                            <img src="{{asset($productsItem->productsImages[0]->image) }}"
                                alt="{{$productsItem->name}}">
                            @endif
                    </div>
                    <div class="product-card-body">
                        <p class="product-brand">{{$productsItem->brand}}</p>
                        <h5 class="product-name">
                            <a href="{{url('/collections/'.$productsItem->category->slug.'/'.$productsItem->slug)}}">
                                {{$productsItem->name}}
                            </a>
                        </h5>
                        <div>
                            <span class="selling-price">${{$productsItem->selling_price }}</span>
                            <span class="original-price">${{$productsItem->original_price }}</span>
                        </div>
                        <div class="mt-2">
                            <a href="" class="btn btn1">Add To Cart</a>
                            <a href="" class="btn btn1"> <i class="fa fa-heart"></i> </a>
                            <a href="" class="btn btn1"> View </a>
                        </div>
                    </div>
                </div>
            </div> --}}
                @empty
                    <div class="col-md-12">
                        <div class="p-2">
                            <h4>No Products Available for {{ $category->name }}</h4>
                        </div>
                @endforelse
            </div>
        </div>
    </div>
@endsection
