@extends('master')

@section('content')
<div class="">

    <h5>Result for Products</h5>
    <div class="custom-product">
        <div class="col-sm-4">
            <a href="#">Filter</a>
        </div>
        <div class="col-sm-4">
            <div class="">
                @foreach ($products as $item)
                    <div class="searched-item">
                        <a href="{{ route('detail',$item['id'])}}">
                        <img src="{{ $item['gallery'] }}" class="trending-img" >
                        <div class="">
                            <h5>{{ $item['name'] }}</h5>
                        </div>
                      </a>
                    </div>
                @endforeach
        </div>

        </div>
    </div>
@endsection








