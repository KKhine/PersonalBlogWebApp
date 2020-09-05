<?php

namespace App\Http\Controllers;
use App\{Skill,Project, Student,Category,Post,LikesDislike,Comment};
use Auth;

use Illuminate\Http\Request;

class UiController extends Controller
{
    public function index(){
        
        $projects=Project::all();
        $skill=Skill::paginate(5);
        $studentCount=Student::find(1);
        $posts=Post::latest()->take(3)->get();
        return view('uipannel.index',compact('skill','projects','studentCount','posts'));
    }
    public function postIndex(){
        $category=Category::all();
        $post=Post::all();
        return view("uipannel.post",compact('category','post'));
    }
    public function postDetail($id){
        if(!Auth::check()){
            return redirect()->route('login');
        };
        $post=Post::find($id);
        $category=Category::all();
        $likes=LikesDislike::where('post_id',$id)->where('type','like')->get();
        $dislikes=LikesDislike::where('post_id',$id)->where('type','dislike')->get();
        $likeStatus=LikesDislike::where('post_id',$id)->where('user_id',Auth::user()->id)->first();
        $comments=Comment::where('post_id',$id)->where('status','show')->get();
        return view('uipannel.post_detail',compact('post','category','likes','dislikes','likeStatus',"comments"));

    }
}
