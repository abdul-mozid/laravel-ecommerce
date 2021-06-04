@extends('layout.master')
@section('content')
<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="pull-right">
                <a href="/addProduct" class="btn btn-lg btn-success">Add Product</a>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Sl</th>
                        <th scope="col">Product Name</th>
                        <th scope="col">Price</th>
                        <th scope="col">Category</th>
                        <th scope="col">Photo</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $index=>$product)
                    <tr>
                        <td>{{++$index}}</td>
                        <td>{{$product->name}}</td>
                        <td>{{$product->price}}</td>
                        <td>{{$product->category}}</td>
                        <td><img src="{{$product->gallery}}" style="height: 60px; width: 100px;"/></td>
                        <td>
                            <a href="{{url('editProduct/'.$product->id)}}" class="btn btn-sm btn-success">Edit</a>
                            <a href="{{url('deleteProduct/'.$product->id)}}" class="btn btn-sm btn-danger">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection