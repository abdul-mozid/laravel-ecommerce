@extends('layout.master')
@section('content')
<div class="content">
    <div class="row">
        <div class="col-md-12" align="center">
            <h3>Edit Product</h3>
        </div>
        <div class="col-md-6 col-md-offset-3">
            <form action="/updateProduct" method="POST">
                @csrf
                <input type="hidden" value="{{$data['id']}}" name="id"/>
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter Product Name" value="{{$data['name']}}" required>
                </div>
                <div class="form-group">
                    <label for="category">Category</label>
                    <input type="text" class="form-control" id="category" name="category" placeholder="Enter Product Category" value="{{$data['category']}}" required>
                </div>
                <div class="form-group">
                    <label for="price">Price</label>
                    <input type="number" class="form-control" id="price" name="price" placeholder="Enter Price" value="{{$data['price']}}" required>
                </div>
                <div class="form-group">
                    <label for="gallery">Photo</label>
                    <input type="text" class="form-control" id="gallery" name="gallery" placeholder="Enter Photo" value="{{$data['gallery']}}" required>
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control" id="description" name="description" required>{{$data['description']}}</textarea>
                </div>
                <input type="submit" class="btn btn-success" value="Update">
            </form>
        </div>
    </div>
</div>
@endsection