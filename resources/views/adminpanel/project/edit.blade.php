@extends('adminpanel.master')
@section('title','project create')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                    <div class="card-title"><h5>Edit Project</h5></div>
                    </div>
                    <form action="{{url('admin/project/'.$project->id.'')}}" method="post">
                        @csrf @method('PATCH')
                    <div class="card-body">
                        
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" class="form-control @error('name')is-invalid @enderror" placeholder="Enter Project name" value="{{$project->name ?? old('name')}}">
                                @error('name')<span class="text-danger"><small>{{$message}}</small></span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="url">URL</label>
                                <input type="text" name="url" class="form-control @error('url')is-invalid @enderror" placeholder="Enter Url" value="{{$project->url??old('url')}}">
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