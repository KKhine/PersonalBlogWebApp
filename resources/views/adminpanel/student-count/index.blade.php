@extends('adminpanel.master')
@section('title','project index')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-6">
                                <h5 class="card-title">Total Students</h5>
                            </div>
                            {{-- <div class="col-md-6">
                            <a href="{{url('admin/student/create')}}" class="btn btn-info btn-sm float-right mb-3"><i class="fa fa-plus-circle"></i>Add New</a>
                            </div> --}}
                        </div>
                    </div>
                    
                    <div class="card-body">
                        @if(Session('successMsg'))
                        <div class="alert alert-success alert-dismissible show fade">
                        <div>{{Session('successMsg')}}</div>
                        <button class="close" data-dismiss='alert'>&times;</button>
                        </div>
                        @endif
                        @if($student->count() < 1)
                        <form action="{{url('admin/student/store')}}" method="post">
                            @csrf
                            <div class="input-group">
                                <input type="number" name="count" class="form-control @error('count')is-invalid @enderror"  style="border-radius: 4px 0 0 4px">
                                <button class="btn btn-primary" style="border-radius: 0 4px 4px 0">Create</button>
                            </div>
                            @error('count')
                                <small  class="text-danger">{{$message}}</small>
                                @enderror
                        </form>
                        @endif
                        
                        <br>
                        <table class="table table-bordered table-hover" class="col md-6">
                            <thead>
                               
                                <tr>
                                    <th>Count</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            
                            <tbody>
                             <tr>
                                <td>{{ $studentcount->student_count }}</td>
                                <td><button class="btn btn-primary" id="addBtn"><i class="fa fa-plus-circle">Add More Student</i></button>
                                    <form action="{{url('admin/student/'.$studentcount->id.'/update')}}" method="POST" 
                                        class="col-md-6" id="addForm" style="display:none">
                                        @csrf
                                        <div class="input-group">
                                            <input type="number" name="count" class="form-control @error('count')is-invalid @enderror" style="border-radius: 4px 0 0 4px" placeholder="Enter Student Count">
                                            <button type="submit" class="btn btn-primary" style="border-radius: 0 4px 4px 0" >Add</button>
                                            
                                        </div>
                                        @error('count')<small class="text-danger">{{$message}}</small>@enderror
                                    </form>
                                    
                                </td>
                                
                            </tr>
                         </tbody>
                        
                        </table>

                    </div>
                    
                    <div class="card-footer">
                        {{-- {{$projects->links()}} --}}
                    </div>

                </div>
                
               
               
               
            </div>
        </div>
    </div>
@endsection

@section('javascript')
<script>
   $(document).ready(function(){
    $("#addBtn").click(function(){
        $("#addForm").css('display','block');
        $(this).css('display','none');
    });
   });
</script>
@endsection