@extends('adminpanel.master')
@section('title','index')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">
                        <h3>User Data</h3><br>
                    </div>
                    <div class="card-body">
                        @if (Session('successMsg'))
                        <div class="alert alert-success alert-dismissible show fade">
                            <div>{{Session('successMsg')}}</div>
                            <button class="close" data-dismiss='alert'>&times;</button>
                        </div>
                         @endif
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                <tr>
                                    <td>{{$user->id}}</td>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->status}}</td>
                                    <td>
                                        <form action="{{url('admin/user/'.$user->id.'/delete')}}" method="post">
                                            @csrf
                                            <a href="{{url('admin/user/'.$user->id.'/edit')}}" class="btn btn btn-success btn btn-sm"><i class="fa fa-edit">
                                                Edit</i></a>
                                                <button class="btn btn btn-danger btn btn-sm" onclick="return confirm('Are you sure want to delete?')">
                                                    <i class="fa fa-trash" aria-hidden="true"> Delete</i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                    </div>
                    <div class="card-footer">
                        {{$users->links()}}
                    </div>
                </div>
            </div>
            
            
            
        </div>
    </div>
</div>
@endsection