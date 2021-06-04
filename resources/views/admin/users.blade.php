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
                        <th scope="col">Sl</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Is Active</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $index=>$user)
                    <tr>
                        <td>{{++$index}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td><span class="label {{($user->is_active==1) ? 'label-success' : 'label-danger'}}">{{($user->is_active==1) ? 'Yes' : 'No'}}</span></td>
                        <td>
                            <a href="{{url('editUser/'.$user->id)}}" class="btn btn-sm btn-success">Edit</a>
                            <a href="{{url('deleteUser/'.$user->id)}}" class="btn btn-sm btn-danger">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection