@extends('adminpanel.master')
@section('title','post index')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-6">
                                <h5 class="card-title">Post</h5>
                            </div>
                            <div class="col-md-6">
                            <a href="{{url('admin/post/create')}}" class="btn btn-info btn-sm float-right mb-3"><i class="fa fa-plus-circle"></i>Add New</a>
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
                                    <th>Category</th>
                                    <th>Image</th>
                                    <th>Title</th>
                                    <th>Content</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            @foreach($posts as $post)
                            <tbody>
                                <tr>
                                <td>{{$post->id}}</td>
                                <td>{{$post->category->name}}</td>
                                <td>
                                    <img src="{{asset('storage/post_images/'.$post->image)}}" alt="not found" width="100px">
                                </td>
                                <td>{{$post->title}}</td>
                                <td><textarea name="text" id="" cols="30" rows="3" readonly>{{$post->content}}</textarea></td>
                                <td>
                                    <form action="{{url('admin/post/'.$post->id)}}" method="post">
                                        @csrf @method('DELETE')
                                        <a href="{{url('admin/post/'.$post->id.'/edit')}}" class="btn btn-info btn-sm"><i class="fa fa-edit">Edit</i></a>
                                        <button class="btn btn-danger btn-sm" onclick="return confirm('Are you sure want to delete?')"><i class="fa fa-trash">Delete</i>
                                        </button>
                                        <a href="{{url('admin/post/'.$post->id)}}" class="btn btn-success btn-sm"><i class="fa fa-comments">Comments</i></a>
                                    </form>
                                </td>
                                </tr>
                            </tbody>
                            @endforeach
                        </table>

                    </div>
                    
                    <div class="card-footer">
                        {{$posts->links()}}
                    </div>

                </div>
                
               
               
               
            </div>
        </div>
    </div>
@endsection