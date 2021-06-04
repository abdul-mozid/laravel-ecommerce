@extends('layout.master')
@section('content')
<div class="content">
    <div class="row">
        <div class='col-md-12' align='center'>
            <h2>Product Cart</h2>
        </div>
        <div class="col-md-12">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Sl</th>
                        <th scope="col">Product Image</th>
                        <th scope="col">Product Name</th>
                        <th scope="col">Price</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Total Price</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $i=1;
                    @endphp
                    @forelse($products as $product)
                    <tr>
                        <th scope="row">{{$i++}}</th>
                        <td><img src='{{$product->gallery}}' style="height:80px;width:100px;"/></td>
                        <td>{{$product->name}}</td>
                        <td>{{$product->price}}</td>
                        <td>{{$product->quantity}}</td>
                        <td>{{$product->price*$product->quantity}}</td>
                        <td><a href='{{url('/removeCartProduct/'.$product->cart_id)}}' class="btn btn-xs btn-danger"><span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span></a></td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" align="center">
                            <h3 class="text-danger">Cart Empty</h3>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
            <div class="pull-right">
                <a href="{{url('order')}}" class="btn btn-lg btn-success">Checkout</a>
            </div>
        </div>
    </div>
</div>
@endsection