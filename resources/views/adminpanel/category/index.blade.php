@extends('adminpanel.master')
@section('title','category index')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-6">
                                <h5 class="card-title">Category</h5>
                            </div>
                            <div class="col-md-6">
                            <a href="{{url('admin/category/create')}}" class="btn btn-info btn-sm float-right mb-3"><i class="fa fa-plus-circle"></i>Add New</a>
                            </div>
                        </div>
                    </div>
                    
                    <div class="card-body">
                        @if(Session('successMsg'))
                        <div class="alert alert-success alert-dismissible show fade">
                        <div>{{Session('successMsg')}}</div>
                        <button class="close" data-dismiss='alert'>&times;</button>
                        </div>
                        @endif
                        <table class="table table-border table-hover">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Category Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            @foreach($category as $category)
                            <tbody>
                                <tr>
                                <td>{{$category->id}}</td>
                                <td>{{$category->name}}</td>
                                <td>
                                    <form action="{{url('admin/category/'.$category->id.'')}}" method="post">
                                        @csrf @method('DELETE')
                                        <a href="{{url('admin/category/'.$category->id.'/edit')}}" class="btn btn-info btn-sm"><i class="fa fa-edit">Edit</i></a>
                                        <button class="btn btn-danger btn-sm" onclick="return confirm('Are you sure want to delete?')"><i class="fa fa-trash">Delete</i>
                                        </button>
                                    </form>
                                </td>
                                </tr>
                            </tbody>
                            @endforeach
                        </table>

                    </div>
                    
                    <div class="card-footer">
                        {{-- {{$category->links()}} --}}
                    </div>

                </div>
                
               
               
               
            </div>
        </div>
    </div>
@endsection