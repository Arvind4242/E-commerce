<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Auth;

$total = 0;
if (Auth::check()) {
    $total = ProductController::cartItem();
}

?>

<nav class="navbar navbar-expand-lg bg-body-tertiary bg-dark">
    <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active btn btn-danger" aria-current="page" href="{{ route('home')}}">Home</a>
                </li>
                <br><br>
                <li class="nav-item">
                    <a class="nav-link active btn " aria-current="page" style="color:rgb(246, 2, 246)" href="{{ route('myOrders')}}">My Orders</a>
                </li>
                <li class="nav-item">
                    <form class="d-flex" role="search" action="{{ route('search') }}" method="GET">
                        <input class="form-control me-2" name="search" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </form>
                </li>
            </ul>

            @if (Auth::check())
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle hide-arrow p-0" href="javascript:void(0);" data-bs-toggle="dropdown">
                        <div class="avatar avatar-online">
                            <img src="{{ asset('assets/img/avatars/3.png') }}" alt class="rounded-circle">
                        </div>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end mt-3 py-2">
                        <li>
                            <a class="dropdown-item pb-2 mb-1" href="javascript:void(0);">
                                <div class="d-flex align-items-center">
                                    <div class="flex-shrink-0 me-2 pe-1">
                                        <div class="avatar avatar-online">
                                            <img src="{{ asset('assets/img/avatars/3.png') }}" alt class="rounded-circle">
                                        </div>
                                    </div>
                                    <div class="flex-grow-1">
                                        <h6 class="mb-0">{{ Auth::user()['name']}}</h6>
                                    </div>
                                </div>
                            </a>
                        </li>

                        <li>
                            <div class="dropdown-divider my-1"></div>
                        </li>
                        <li>
                            <a class="btn btn-success" href="{{ route('cartList')}}">Cart({{$total}})</a>
                        </li>
                        <li>
                            <div class="dropdown-divider my-1"></div>
                        </li>
                        <li>
                            <a class="btn btn-danger" href="{{ route('logout')}}">Logout</a>
                        </li>
                    </ul>
                </li>
            </ul>
            @else
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle hide-arrow p-0" href="javascript:void(0);" data-bs-toggle="dropdown">
                        <div class="avatar avatar-online">
                            <img src="{{ asset('assets/img/avatars/3.png') }}" alt class="rounded-circle">
                        </div>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end mt-3 py-2">
                        <li>
                            <div class="dropdown-divider my-1"></div>
                        </li>
                        <li>
                            <a class="btn btn-success" href="{{ route('register')}}">Register</a>
                        </li>
                        <li>
                            <div class="dropdown-divider my-1"></div>
                        </li>
                        <li>
                            <a class="btn btn-danger" href="{{ route('login')}}">Login</a>
                        </li>
                    </ul>
                </li>
            </ul>
            @endif

        </div>
    </div>
</nav>

