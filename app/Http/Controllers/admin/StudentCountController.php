<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Student;

class StudentCountController extends Controller
{
    public function index(){
        
         $student= Student::all();
         $studentcount=Student::find(1);
        return view('adminpanel.student-count.index',compact('student','studentcount'));
    }

    public function store(Request $request){
        // dd('name');
        $request->validate(['count'=>'required']);
        
        Student::create([
            'student_count'=>$request->count
            
        ]);
        return back()->with('successMsg','You have successfully created!');
    }

    public function update(Request $request,$id){
        
        $student=Student::find($id);
        $request->validate(['count'=>'required']);
        
        $student->update([
            'student_count'=>$student->student_count+$request->count
        ]);
        return back();
    }
    
}
