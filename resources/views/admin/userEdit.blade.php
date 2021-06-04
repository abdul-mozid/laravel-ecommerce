@extends('layout.master')
@section('content')
<div class="content">
    <div class="row">
        <div class="col-md-12" align="center">
            <h3>Edit Product</h3>
        </div>
        <div class="col-md-6 col-md-offset-3">
            <form action="/updateUser" method="POST">
                @csrf
                <input type="hidden" value="{{$data['id']}}" name="id"/>
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter Product Name" value="{{$data['name']}}" required>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" class="form-control" id="email" name="email" placeholder="Enter Email" value="{{$data['email']}}" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password" required>
                </div>
                <div class="form-group">
                    <label for="gallery">Is Active</label>
                    <select class="form-control" name="is_active" required>
                        <option value="">Select</option>
                        <option value="1">Yes</option>
                        <option value="0">No</option>
                    </select>
                </div>
                <input type="submit" class="btn btn-success" value="Update">
            </form>
        </div>
    </div>
</div>
@endsection