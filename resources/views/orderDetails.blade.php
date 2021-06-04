@extends('layout.master')
@section('content')
<div class="content">
    <div class="row">
        <div class="col-md-12" align="center">
            <img src="{{url('images/bd_logo.png')}}"/>
            <h4>Janani Shop</h4>
            <h6>Sawrapara, Mirpur, Kafrul</h6>
        </div>
        <div class="col-md-12 hidden-print">
            <div class="pull-right">
                <a href="#" class="btn btn-warning btn-sm" onclick="window.print()">Print</a>
            </div>
            <h3>Order Information</h3>
        </div>
        <div class="col-md-12">
            <table class="table">
                @foreach($order as $o)
                <tr style="font-weight: bold;">
                    <td>Name: {{$o->name}}</td>
                    <td>Email: {{$o->email}}</td>
                    <td>Address: {{$o->address}}</td>
                </tr>
                <tr style="font-weight: bold;">
                    <td>Order Status: <span class="{{($o->order_status=='Pending')?'text-danger':'text-success'}}">{{$o->order_status}}</span></td>
                    <td>Payment Status: <span class="{{($o->payment_status=='Pending')?'text-danger':'text-success'}}">{{$o->payment_status}}</span></td>
                    <td>Payment Method: {{$o->payment_method}}</td>
                </tr>
                @endforeach
            </table>
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
                    @foreach($products as $product)
                    <tr>
                        <th scope="row">{{$i++}}</th>
                        <td>{{$product->product_name}}</td>
                        <td>{{$product->price}}</td>
                        <td>{{$product->quantity}}@php $total_quantity=$total_quantity+$product->quantity @endphp</td>
                        <td align="right">{{$product->price*$product->quantity}}  @php $total_price=$total_price+($product->price*$product->quantity) @endphp/=</td>
                    </tr>
                    @endforeach
                    <tr style="font-weight: bold;">
                        <td colspan="4" align="right">Sub Total</td>
                        <td align="right">{{$total_price}}/=</td>
                    </tr>
                    <tr style="font-weight: bold;">
                        <td colspan="4" align="right">Delivery Cost</td>
                        <td align="right">100/=</td>
                    </tr>
                    <tr style="font-weight: bold;">
                        <td colspan="4" align="right">Total</td>
                        <td align="right">{{$total_price+100}}/=</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection