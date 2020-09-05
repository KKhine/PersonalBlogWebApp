@extends('uipannel.master')
@section('title','post detail')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            
            <div class="post-detail">
                
                <img src="{{asset('storage/post_images/'.$post->image)}}" alt="">
                <div><strong><i class="fa fa-calendar" aria-hidden="true"></i> Posted On:</strong>{{$post->created_at}}</div>
                <div><strong><i class="fa fa-user" aria-hidden="true"></i> Author:</strong>K Khine</div>
                <div><strong><i class="fa fa-list" aria-hidden="true"></i> Category:</strong>{{$post->category->name}}</div><br>
                <h5>{{$post->title}}</h5>
                <p>{{$post->content}}</p>
                <form method="POST" >
                    @csrf
                    <div>
                        <span>{{$likes->count()}} Like</span>&nbsp;&nbsp;
                        <span>{{$dislikes->count()}} Dislike</span>&nbsp;&nbsp;
                        <span>{{$comments->count()}} Comment</span>
                    </div>
                    <button type="submit" formaction="{{url('/post/like/'.$post->id)}}" class="btn btn-sm btn-success" 
                        @if($likeStatus)
                            @if($likeStatus->type=='like')
                            disabled
                            @endif
                        @endif>
                        <i class="fa fa-thumbs-up" aria-hidden="true"></i>Like
                    </button>
                    <button type="submit" formaction="{{url('/post/dislike/'.$post->id)}}" class="btn btn-sm btn-danger"
                        @if($likeStatus)
                            @if($likeStatus->type=='dislike')
                            disabled
                            @endif
                        @endif>
                        <i class="fa fa-thumbs-down" aria-hidden="true"></i>Dislike
                    </button>
                   
                    <button type="button" class="btn btn-sm btn-info" data-toggle="collapse" data-target="#commentId">
                        <i class="fa fa-comment" aria-hidden="true"></i>Comment
                    </button>
                </form>
                <div class="collapse comment-section mt-2" id="commentId">
                    <form action="{{url('/post/comment/'.$post->id)}}" method="post">
                        @csrf
                        <textarea name="text" cols="23" rows="3" placeholder="Comment here..." required></textarea><br>
                        <button class="btn btn-sm btn-info mt-2"><i class="fa fa-paper-plane" aria-hidden="true"></i>Submit
                        </button>
                        <br><br>
                        @foreach($comments as $comment)
                        <div>
                            <img src="{{asset('images/user.jpg')}}" alt=""><strong>{{$comment->user->name}}</strong>
                            <div class="message-box">{{$comment->text}}</div><br>
                        </div>
                        @endforeach
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
