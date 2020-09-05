@extends('adminpanel.master')
@section('title','Category create')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                    <div class="card-title">Post Create Form</div>
                    </div>
                    <form action="{{url('admin/post/'.$post->id.'')}}" method="post" enctype="multipart/form-data">
                        @csrf @method('PATCH')
                    <div class="card-body">
                        <div class="form-group">
                            <label for="category">Category</label>
                            <select name="category_id" id="" class="form-control" class="@error('category_id')is-invalid @enderror">
                                <option value="">Select Category</option>
                                @foreach($categories as $category)
                                <option value="{{$category->id}}"
                                {{$post->category_id==$category->id?'selected':''}}
                                >{{$category->name}}</option>
                                @endforeach
                            </select>
                            @error('category_id')<span class="text-danger"><small>{{$message}}</small></span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="name">Image</label>
                            <input type="file" name="image" class="@error('image')is-invalid @enderror mb-2"><br>
                            <img src="{{asset('storage/post_images/'.$post->image)}}" alt="" style="width: 100px;border:1px solid gray">
                            @error('image')<span class="text-danger"><small>{{$message}}</small></span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="name">Title</label>
                            <input type="text" name="title" class="form-control @error('title')is-invalid @enderror" placeholder="" value="{{$post->title ?? old('title')}}">
                            @error('title')<span class="text-danger"><small>{{$message}}</small></span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="name">Content</label>
                            <textarea name="content"  rows="4" class="form-control" placeholder="...">{{$post->content ??old('content')}}</textarea>
                            
                            @error('content')<span class="text-danger"><small>{{$message}}</small></span>
                            @enderror
                        </div>
                        
                            
                            
                    </div>
                    
                    <div class="card-footer">
                        <button class="btn btn-success">Submit</button>
                    
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
@endsection