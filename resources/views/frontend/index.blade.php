@extends('layouts.app')

@section('title','Home page')

@section('content')

<div id="carouselExampleCaptions" style="padding-top: 0px" class="carousel slide" data-bs-ride="false">
    <div class="carousel-inner">
        @foreach ($sliders as $key => $slidersItem)
        <div class="carousel-item {{$key == 0 ? 'active':''}}">
            @if($slidersItem->image)
            <img src="{{asset($slidersItem->image)}}" class="d-block" style="width:100% ; height:100%;" alt="...">
            <div class="carousel-caption d-none d-md-block">
                <div class="custom-carousel-content">
                    <h1>{{$slidersItem->title}}</h1>
                </div>
            </div>
            @endif
        </div>@auth
            
        @endauth
        @endforeach
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>



@endsection
