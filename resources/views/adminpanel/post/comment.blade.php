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
                                <h5 class="card-title">Comments</h5>
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
                            
                            @foreach($comments as $index=>$comment)
                            <tbody>
                                <tr>
                                <td>{{$index+1}}</td>
                                <td>{{$comment->text}}</td>
                                
                                <td>
                                    <form action="{{url('admin/comment/'.$comment->id.'/show_hide')}}" method="post">
                                        @csrf
                                        <button type="submit" class="btn btn-sm {{$comment->status=='show'?'btn-success':'btn-danger'}}"><i class="fa fa-edit"></i>
                                        {{$comment->status=='show'?'hide':'show'}}
                                        </button>
                                    </form>
                                </td>
                                </tr>
                            </tbody>
                            @endforeach
                        </table>

                    </div>
                    
                    <div class="card-footer">
                        
                    </div>

                </div>
                
               
               
               
            </div>
        </div>
    </div>
@endsection