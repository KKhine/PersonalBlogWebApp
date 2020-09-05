@extends('uipannel.master')
@section('title','post')

@section('content')

    <!-- BLOG -->
    <div class="container">
        <div class="row">
           <div class="col-md-8">
               @foreach($post as $post)
               <div class="blog">
                   <img src="{{asset('storage/post_images/'.$post->image)}}" alt="" style="border: 1px solid gray;height:400px"><br><br>
                   <h5>{{$post->title}}</h5>
                   <p style="text-align: justify">
                       {{$post->content}}
                   </p>
                    <a href="{{url('post/'.$post->id.'/detail')}}">
                        <button class="btn-info btn btn-sm">Read More <i class="fa fa-caret-down" aria-hidden="true"></i>
                        </button>
                    </a>
                </div>
                @endforeach
            </div>
            
            <!-- SIDE BAR -->
            <div class="col-md-4">
                <div class="sidebar">
                    <form action="">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search...">
                            <button class="btn btn-success"><i class="fa fa-search"></i>
                                Search</button>
                        </div>
                    </form><hr>
                    <h5>Categories</h5>
                    @foreach($category as $category)
                    <ul>
                        <li><a href="">{{$category->name}}</a></li>
                    </ul>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
        

@endsection
        
        