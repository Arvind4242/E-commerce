@extends('master')

@section('content')
<div class="row custom-product">
    <div class="col-sm-10">
        <div class="trending-wrapper">
            <a class="btn btn-success" href="{{ route('order')}}">Order Now</a>
            <h4>Cart Items</h4>
            @foreach ($products as $item)
            <div class="row searched-item card-list-divider">
                <div class="col-md-3">
                    <div class="searched-item">
                        <img src="{{ $item->gallery }}" class="trending-img img-fluid" alt="Product Image">
                        <div class="mt-2">
                            <h5 class="text-center">{{ $item->category }}</h5>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 my-4">
                    <div class="searched-item">
                        <div class="">
                            <h5>{{ $item->name }}</h5>
                            <p>{{ $item->description }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="searched-item">
                        <div class="text-right">
                            <a href="/remove/{{$item->cart_id}}" class="btn btn-danger">Remove from Cart</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <a class="btn btn-success" href="{{ route('order')}}">Order Now</a>
    </div>
</div>
@endsection
