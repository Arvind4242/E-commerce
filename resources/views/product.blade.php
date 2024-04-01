@extends('master')

@section('content')
<div class="custom-product">

    <div id="carouselExampleDark" class="carousel carousel-dark slide">
        <h1 class="text-center" style="background-color: rgb(0, 167, 155)">Trending Products</h1>
        @php
          use App\Models\Product;
          $data = Product::take(4)->get();
        @endphp

        <div class="carousel-indicators">
            @foreach ($data as $key => $item)
            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="{{ $key }}" class="{{ $key == 0 ? 'active' : '' }}" aria-label="Slide {{ $key + 1 }}"></button>
           @endforeach
        </div>

        <div class="carousel-inner">
            @if (session()->has('success'))
              <p class="alert alert-success">{{ session()->get('success')}}</p>
            @endif

            @foreach ($data as $key => $item)
                <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                    <a href="{{ route('detail',$item['id'])}}">
                    <img src="{{ $item['gallery'] }}" class="img-slider w-100" >
                    <div class="carousel-caption d-none d-md-block">
                        <h5>{{ $item['name'] }}</h5>
                        <p>{{ $item['description'] }}</p>
                    </div>
                  </a>
                </div>
            @endforeach
</div>
</div>
<div class="trending-wrapper">
    <h1 class="text-center" style="background-color: rgb(0, 167, 155)">More Products</h1>
    <div class="">
        @foreach ($data as $item)
            <div class="trending-item">
                <a href="{{ route('detail',$item['id'])}}">
                <img src="{{ $item['gallery'] }}" class="trending-img" >
                <div class="">
                    <h5>{{ $item['name'] }}</h5>
                </div>
              </a>
            </div>
        @endforeach
</div>
@endsection








