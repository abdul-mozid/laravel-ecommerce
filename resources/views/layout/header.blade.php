<?php

use App\Http\Controllers\ProductController;

$items = 0;
if (session()->has('user')) {
    $items = ProductController::cartItem();
}
?>
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Brand</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li class="active"><a href="{{url('/')}}">Home <span class="sr-only">(current)</span></a></li>
                @if(!session()->has('user'))
                <li><a href="{{url('login')}}">Login</a></li>
                @endif
                @if(!session()->has('adminUser'))
                <li><a href="{{url('adminLogin')}}">Admin Login</a></li>
                @endif
                @if(session()->has('adminUser'))
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{session('adminUser')->name}}<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="/adminDashboard">Dashboard</a></li>
                        <li><a href="/products">Products</a></li>
                        <li><a href="/users">Users</a></li>
                        <li><a href="/orders">Orders</a></li>
                        <li><a class="dropdown-item" href="/logout">Logout</a></li>
                    </ul>
                </li>
                @endif
            </ul>
            <form action="/search" method="POST" class="navbar-form navbar-left">
                @csrf
                <div class="form-group">
                    <input type="text" class="form-control search-box" name="search_query" placeholder="Search">
                </div>
                <button type="submit" class="btn btn-default">Submit</button>
            </form>
            <ul class="nav navbar-nav navbar-right">
                @if(session()->has('user'))
                <li><a href="{{url('viewCart')}}">Cart({{$items}})</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> {{session('user')->name}} <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="{{url('orderList')}}">My Orders</a></li>
                        <li><a class="dropdown-item" href="/logout">Logout</a></li>
                    </ul>
                </li>
                @endif
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>