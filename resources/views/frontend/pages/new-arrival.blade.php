@extends('layouts.app')

@section('title','New Arrivals Product')

@section('content')

<div class="py-3 py-md-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4 class="mb-4">New Arrivals</h4>
            </div>
            @forelse($newArivalProduct as $productsItem)
            <div class="col-md-3">

                <div class="product-card">
                    <div class="product-card-img">

                        @if($productsItem->productsImages->count()>0)
                        <a href="{{url('/collections/'.$productsItem->category->slug.'/'.$productsItem->slug)}}">
                            <img src="{{asset($productsItem->productsImages[0]->image) }}" alt="{{$productsItem->name}}"
                                style="height: 180px;"></a>
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
                        <!-- <div class="mt-2">
                            <a href="" class="btn btn1">Add To Cart</a>
                            <a href="" class="btn btn1"> <i class="fa fa-heart"></i> </a>
                            <a href="" class="btn btn1"> View </a>
                        </div> -->
                    </div>
                </div>

            </div>
            @empty
            <div class="col-md-12">
                <h5>No Products Arrivals</h5>
            </div>
            @endforelse
            <div class="text-more">
                <a href="{{url('collections')}}" class="btn btn-warning px-3">View More</a>
            </div>
        </div>
    </div>
</div>

@endsection
