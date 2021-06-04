@extends('layout.master')
@section('content')
<div class="content">
    <div class="row">
        <div class="col-md-12">
            <h3>Customer Information</h3>
        </div>
        <form action="{{url('confirmOrder')}}" method="POST">
            @csrf
            <div class="col-md-12">
                <div class="form-group">
                    <label for="exampleInputEmail1">Customer Name</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Customer Name" value="{{$userInformation->name}}" readonly="yes">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Customer Email</label>
                    <input type="email" class="form-control" id="exampleInputPassword1" placeholder="Customer Email" value="{{$userInformation->email}}" readonly="yes">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Customer Address</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" name="customer_address" placeholder="Customer Address" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputFile">Payment Method</label>
                    <div class="checkbox">
                        <label>
                            <input type="radio" name="payment_method" value="Check" required> Check
                            <input type="radio" name="payment_method" value="Payment Gateway"> Payment Gateway
                            <input type="radio" name="payment_method" value="Cash on Delivery"> Cash on Delivery
                        </label>
                    </div>
                </div>
            </div>
            <div class='col-md-12'>
                <h3>Product Information</h3>
            </div>
            <hr/>
            <div class="col-md-12">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Sl</th>
                            <th scope="col">Product Name</th>
                            <th scope="col">Price</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Total Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $i=1;
                        $total_quantity=0;
                        $total_price=0;
                        @endphp
                        @forelse($products as $product)
                        <tr>
                            <th scope="row">{{$i++}}</th>
                            <td>{{$product->name}}</td>
                            <td>{{$product->price}}</td>
                            <td>{{$product->quantity}}@php $total_quantity=$total_quantity+$product->quantity @endphp</td>
                            <td align="right">{{$product->price*$product->quantity}}  @php $total_price=$total_price+($product->price*$product->quantity) @endphp/=</td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" align="center">
                                <h3 class="text-danger">Cart Empty</h3>
                            </td>
                        </tr>
                        @endforelse
                        <tr>
                            <td colspan="3">Total</td>
                            <td>{{$total_quantity}}</td>
                            <td align="right">{{$total_price}}/=</td>
                        </tr>
                    </tbody>
                </table>
                <a href="{{url('viewCart')}}" class="btn btn-lg btn-warning">Back To Cart</a>
                <button type="submit" name="save" class="btn btn-lg btn-success">Confirm Order</button>
            </div>
        </form>
    </div>
</div>
@endsection