@extends('uipannel.master')
@section('title','index')
@section('content')
<!-- ABOUT ME -->
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="aboutme">
                <div class="row">
                    <div class="col-md-5" id="aboutMe">
                    <h3 class="text-center">ABOUT ME</h3>
                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Delectus sit, aut quam eos quo voluptatem porro alias quaerat beatae esse veritatis eius ex recusandae explicabo, quod, debitis minus deleniti! Tenetur.</p>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolor harum excepturi quidem expedita, debitis aut voluptatibus repudiandae nulla sed ex illo ipsum doloremque ducimus vitae voluptate quaerat eaque placeat eos.</p>
                    <br>
                    <div class="row">
                        <div class="col-md-6 mb-1">
                            <div class="total-project">
                                <i class="fas fa-project-diagram fontawsome"></i>
                                <br>
                                <strong>{{count($projects)}}</strong>
                                <p>Total Projects</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="total-student">
                                <i class="fas fa-users fontawsome"></i><br>
                                <strong>
                                    @if($studentCount)
                                    {{$studentCount->student_count}}
                                @endif
                                </strong>
                                <P>Total Students</P>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-7" id="skills">
                        <h3 class="text-center">My Skills</h3>
                        @foreach($skill as $skills)
                        <div class="row mb-3">
                            <div class="col-md-9">
                                <div class="progress mt-2">
                                    <div class="progress-bar" style="width: {{$skills->percent}}%">{{$skills->percent}}%</div>
                                </div>
                            </div>
                            <div class="col-md-3">{{$skills->name}}</div>
                        </div>
                        @endforeach
                        {{$skill->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div><br><br><br>
<!-- PROJECTS -->
<div class="project">
    <h3 class="text-center">Projects</h3>
    <div class="row ">
        @foreach($projects as $projects)
        <div class="col-md-4 mb-1">
            <a href="{{$projects->url}}" target="blank">
                <div class="sample-project">
                    <i class="fas fa-project-diagram fontawsome"></i><br>
                    <strong>{{$projects->name}}</strong>
                </div>
            </a>
        </div>
        @endforeach
    </div>
</div>
<!-- LATEST POST -->
<br><br>
<div class="latest-post">
    <h3 class="text-center">Latest Post</h3><br>
    <p>Click the following link and explore my project.</p><br>
    
    <div class="row">
        @foreach($posts as $post)
        <div class="col-sm-6 col-md-4">
            <a href="{{url('post/'.$post->id.'/detail')}}" target="blank">
                <img src="{{asset('storage/post_images/'.$post->image)}}" alt=""><br><br>
                <small>{{date('d/M/Y',$post->created_date)}}</small>
                <h6 class="mt-2">{{$post->title}}</h6>
                <p>{{$post->content}}</p>
            </a>
          
        </div>
        @endforeach
    </div>
</div>
</div>

@endsection