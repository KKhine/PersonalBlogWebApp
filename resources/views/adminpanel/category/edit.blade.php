@extends('adminpanel.master')
@section('title','Category edit')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                    <div class="card-title">Edit Category</div>
                    </div>
                    <form action="{{url('admin/category/'.$category->id.' ')}}" method="post">

                        @csrf @method('PATCH')
                    <div class="card-body">
                        
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" class="form-control @error('name')is-invalid @enderror"  value="{{$category->name ?? old('name')}}">
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