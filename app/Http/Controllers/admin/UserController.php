<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function index(){
        $user=User::paginate(5);
        return view('adminpanel.user.index')->with('users',$user);
    }

    public function edit($id){

        $user= User::find($id);
        return view('adminpanel.user.edit',compact('user'));
    }
    
    public function update(Request $request,$id){
        $user=User::find($id);
        $user->update(['name'=>$request->name,
        'email'=>$request->email,
        'status'=>$request->status,
        ]);
        // return $user;
        return redirect('admin/user/')->with('successMsg','You have updated successfully!');
    }

    public function delete($id){

        $user=User::find($id);
        $user->delete();
        return redirect('admin/user/')->with('successMsg','You have deleted successfully!');

    }
}

