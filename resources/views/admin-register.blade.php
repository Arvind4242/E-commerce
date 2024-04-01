@extends('master')

@section('content')
<div class="container custom-login">
    <div class="row">
        <div class="col-sm-4 col-sm-offset-4">
            <h1>Add Products</h1>

            @if (session()->has('success'))
                <p class="alert alert-success">{{ session()->get('success')}}</p>
            @endif

            @if (session()->has('error'))
            <div class="alert alert-danger">
            <p>{{ session()->get('error')}}</p>
            </div>
            @endif
            <form action="{{ route('ad-register.post') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label  class="form-label">Product Name</label>
                    <input type="text" name="name" class="form-control" placeholder="">
                  </div>
                <div class="mb-3">
                  <label  class="form-label">Price</label>
                  <input type="text" name="price" class="form-control" placeholder="">
                </div>
                <div class="form-label">
                    <label for="basic-default-phone">Add Image</label>
                    <input type="file" class="form-control phone-mask" name="gallery" />

                </div>

                <div class="mb-3">
                    <label  class="form-label">Product Category</label>
                    <input type="text" name="category" class="form-control" placeholder="">
                </div>
                <div class="mb-3">
                    <label  class="form-label">Description</label>
                    <input type="text" name="description" class="form-control" placeholder="" >
                </div>
                <button type="submit" class="btn btn-primary">Add</button>
              </form>
        </div>
    </div>
</div>
@endsection
