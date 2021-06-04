@extends('layout.master')
@section('content')
<div class="content">
    <div class="row">
        <div class="col-md-12" align="center">
            <h2>Order List</h2>
        </div>
        <div class="col-md-12">
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
                    @forelse($data as $row)
                    <tr>
                        <th scope="row">{{$i++}}</th>
                        <td>{{$row->name}}</td>
                        <td>{{$row->email}}</td>
                        <td>{{$row->address}}</td>
                        <td>{{$row->order_status}}</td>
                        <td>{{$row->payment_status}}</td>
                        <td>{{$row->payment_method}}</td>
                        <td>{{$row->total_price}}</td>
                        <td>
                            <a href="{{url('orderDetails/'.$row->id)}}" class="btn btn-xs btn-info">
                                <span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>
                            </a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="9" align="center">
                            <h3 class="text-danger">Cart Empty</h3>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection