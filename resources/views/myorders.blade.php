@extends('master')

@section('content')
<div class="row custom-product">
    <div class="col-sm-10">
        <div class="trending-wrapper">
            <h4>My Orders</h4>
            @foreach ($order as $item)
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
                            <h5>Name :{{ $item->name }}</h5>
                            <h5>Address : {{ $item->address }}</h5>
                            <h5>Payment Method :{{ $item->payment_method }}</h5>
                            <h5>Delivery Status :{{ $item->status }}</h5>
                            <h5>Payment Status :{{ $item->payment_status }}</h5>
                        </div>
                    </div>
                </div>

            </div>
            @endforeach
        </div>

    </div>
</div>
@endsection
