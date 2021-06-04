@extends('layout.master')
@section('content')
<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="pull-right">
                <a href="/addUser" class="btn btn-lg btn-success">Add User</a>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Customer Address</th>
                        <th scope="col">Order Status</th>
                        <th scope="col">Payment Status</th>
                        <th scope="col">Payment Method</th>
                        <th scope="col">Total Price</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $i=1;
                    @endphp
                    @foreach($orders as $row)
                    <tr>
                        <th scope="row">{{$i++}}</th>
                        <td>{{$row->name}}</td>
                        <td>{{$row->email}}</td>
                        <td>{{$row->address}}</td>
                        <td>{{$row->order_status}}</td>
                        <td>{{$row->payment_status}}</td>
                        <td>{{$row->payment_method}}</td>
                        <td>{{$row->total_price}}</td>
                        <td width='25%'>
                            <a href="{{url('orderDetails/'.$row->id)}}" class="btn btn-xs btn-info">
                                Details
                            </a>
                            <a href="{{url('approveOrder/'.$row->id)}}" class="btn btn-xs btn-success">
                                Approve Order
                            </a>
                            <a href="{{url('approvePayment/'.$row->id)}}" class="btn btn-xs btn-warning">
                                Approve Payment
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection