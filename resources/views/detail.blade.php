@extends('master')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-sm-6">
            <img class="detail-img" src="{{ $product['gallery']}}">
        </div>
        <div class="col-sm-6">
            <button class="btn btn-primary">
                <a style="color: white" href="{{ route('home')}}">Go back</a>
            </button>
            <h2>Name : {{ $product['name'] }}</h2>
            <h2 style="color: red;">Price : {{ $product['price'] }}</h2>
            <h4>Category : {{ $product['category'] }}</h4>
            <h5 >Description: {{ $product['description'] }}</h5>
            <br><br>
            <form action="{{ route('add.cart') }}" method="POST">
                @csrf
                <input type="hidden" name="product_id" value="{{  $product['id'] }}">
                <button  class="btn btn-success">Add to Cart</button>
            </form>
            <br><br>
        </div>
    </div>
</div>
@endsection








