@extends('layout.master')
@section('content')
<div class="content">
    <div class="row">
        <div class="col-md-12" align="center">
            <h3>Admin Login</h3>
        </div>
        <div class='col-md-6 offset-3'>
            <br/>
            @if(session()->has('f_data'))
            <div class="alert {{session('f_class')}}" role="alert">
                {{session('f_data')}}
            </div>
            @endif
        </div>
        <div class="col-md-6 col-md-offset-3">
            <form action="/adminLogin" method="POST">
                @csrf
                <div class="form-group">
                    <label for="email">Email address</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                </div>
                <button type="submit" class="btn btn-success">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection