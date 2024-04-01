@extends('master')

@section('content')
<div class="container custom-login">
    <div class="row">
        <div class="col-sm-4 col-sm-offset-4">
            @if (session()->has('success'))
                <p class="alert alert-danger">{{ session()->get('success')}}</p>
            @endif
            @if (session()->has('error'))
            <div class="alert alert-danger">
            <p>{{ session()->get('error')}}</p>
            </div>
            @endif
            <form action="{{ route('register.post') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label  class="form-label">Name</label>
                    <input type="text" name="name" class="form-control" placeholder="Enter your name">
                  </div>
                <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label">Email address</label>
                  <input type="email" name="email" class="form-control" placeholder="Enter your email">
                </div>
                <div class="mb-3">
                  <label for="exampleInputPassword1" class="form-label">Password</label>
                  <input type="password" name="password" class="form-control" placeholder="Enter your password">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Confirm Password</label>
                    <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm password">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Address</label>
                    <input type="text" name="address" class="form-control" placeholder="Enter your address" >
                </div>
                <div class="mb-3">
                    <label  class="form-label">Gender</label>
                    <input type="radio" name="gender" value="male" >Male
                    <input type="radio" name="gender" value="female" >Female
                </div>
                <button type="submit" class="btn btn-primary">Register</button>
              </form>
        </div>
    </div>
</div>
@endsection

