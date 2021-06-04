@extends('layout.master')
@section('content')
<div class="content">
    <div class="row">
        <div class="col-md-12 product-details">
            <img src="{{$product['gallery']}}"/>
            <h3>{{$product['name']}}</h3>
            <hr/>
            <h3>Price: {{$product['price']}}/=</h3>
            <hr/>
            <p>{{$product['description']}}</p>
            <hr/>
            <p>Category: {{$product['category']}}</p>
            <hr/>
            <form action='/addToCart' method="POST">
                @csrf
                <input type='hidden' name='product_id' value='{{$product['id']}}'/>
                <button class="btn btn-primary">Add to Cart</button>
            </form>
            <button class="btn btn-success">Buy Now</button>
        </div>
    </div>
</div>
@endsection