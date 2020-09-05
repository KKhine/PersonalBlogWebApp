@extends('adminpanel.master')
@section('title','Project create')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                    <div class="card-title">Create New Project</div>
                    </div>
                    <form action="{{url('admin/project')}}" method="post">
                        @csrf
                    <div class="card-body">
                        
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" class="form-control @error('name')is-invalid @enderror" placeholder="Enter Project name" value="{{old('name')}}">
                                @error('name')<span class="text-danger"><small>{{$message}}</small></span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="url">URL</label>
                                <input type="text" name="url" class="form-control @error('percent')is-invalid @enderror" placeholder="Enter URL" value="{{old('url')}}">
                                @error('url')<span class="text-danger"><small>{{$message}}</small></span>
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