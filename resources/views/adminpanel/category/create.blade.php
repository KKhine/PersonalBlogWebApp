@extends('adminpanel.master')
@section('title','Category create')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                    <div class="card-title">Create Category</div>
                    </div>
                    <form action="{{url('admin/category ')}}" method="post">
                        @csrf
                    <div class="card-body">
                        
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" class="form-control @error('name')is-invalid @enderror" placeholder="Enter Category" value="{{old('name')}}">
                                @error('name')<span class="text-danger"><small>{{$message}}</small></span>
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