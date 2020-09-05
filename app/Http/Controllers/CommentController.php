<?php

namespace App\Http\Controllers;
use App\Comment;
use Auth;
use App\Post;

use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function commentIndex(Request $request,$postId){
        $request->validate(['text'=>'required']);
        Comment::create([
            'post_id'=>$postId,
            'user_id'=>Auth::user()->id,
            'text'=>$request->text 
        ]);
            return back();
    }
}
