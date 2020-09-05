@extends('adminpanel.master')
@section('title','skill create')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                    <div class="card-title"><h5>Edit Skill</h5></div>
                    </div>
                    <form action="{{url('admin/skill/'.$skill->id.'')}}" method="post">
                        @csrf @method('PATCH')
                    <div class="card-body">
                        
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" class="form-control @error('name')is-invalid @enderror" placeholder="Enter skill name" value="{{$skill->name ?? old('name')}}">
                                @error('name')<span class="text-danger"><small>{{$message}}</small></span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="percent">Percent</label>
                                <input type="text" name="percent" class="form-control @error('percent')is-invalid @enderror" placeholder="Enter skill percent" value="{{$skill->percent??old('percent')}}">
                                @error('percent')<span class="text-danger"><small>{{$message}}</small></span>
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