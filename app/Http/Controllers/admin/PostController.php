<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;
use App\Category;
use Illuminate\Support\Facades\File;
use App\Comment;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts=Post::paginate(5);
        return view('adminpanel.post.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=Category::all();
        return view('adminpanel.post.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'category_id'=>'required',
            'image'=>'required|image|mimes:png,jpeg,jpg',
            'title'=>'required',
            'content'=>'required'
        ]);
        $image=$request->image;
        $imageName=uniqid().'_'.$image->getClientoriginalName();
        $image->storeAs('public/post_images',$imageName);
        // dd($imageName);
        Post::create([
            'category_id'=>$request->category_id,
            'image'=>$imageName,
            'title'=>$request->title,
            'content'=>$request->content
        ]);
         return redirect()->route('post.index')->with('successMsg','You have successfully created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // dd($id);
        $comments=Comment::where('post_id',$id)->get();
        return view('adminpanel.post.comment',compact('comments'));
    }
    
    public function showHideComment($id){
        
        $comment=Comment::findOrFail($id);
        $status=$comment->status=='show'?'hide':'show';
        
            $comment->update([
                'status'=>$status
            ]);
        
        return back()->with('successMsg','Status has been changed successfully!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post=Post::find($id);
        $categories=Category::all();
        return view('adminpanel.post.edit',compact('post','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post=Post::find($id);
        $request->validate([
            'category_id'=>'required',
            'image'=>'nullable|image|mimes:png,jpeg,jpg',
            'title'=>'required',
            'content'=>'required'
        ]);
        
        if($request->hasFile('image')){
            
            $postImage=$post->image;
            File::delete('storage/post_images/'.$post->image);
            
            $image=$request->image;
            $imageName=uniqid().'_'.$image->getClientoriginalName();
            $image->storeAs('public/post_images',$imageName);
           
            $post->update([
                'category_id'=>$request->category_id,
                'image'=>$imageName,
                'title'=>$request->title,
                'content'=>$request->content
            ]);
        
        }else{
            $post->update([
                'category_id'=>$request->category_id,
                'title'=>$request->title,
                'content'=>$request->content
            ]);
        };
        return redirect('admin/post')->with('successMsg','You have successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post=Post::find($id);
        $postImage=$post->image;
        File::delete('storage/post_images/'.$post->image);
        
        $post->delete();
        return redirect('admin/post')->with('successMsg','You have successfully deleted!');
    }
}
