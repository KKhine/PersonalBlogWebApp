<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Skill;
use Illuminate\Auth\Events\Validated;

class skillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
       $skill=Skill::paginate(5);
    
        
         
        return view('adminpanel.skill.index')->with('skills',$skill);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('adminpanel.skill.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $request->validate(['name'=>'required',
        'percent'=>'required']);
        
        
        Skill::create([
            'name'=>$request->name,
            'percent'=>$request->percent
        ]);
        return redirect('admin/skill')->with('successMsg','You have successfully created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $skill=Skill::find($id);
        return view('adminpanel.skill.edit',compact('skill'));
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
        $skill=Skill::find($id);
        // dd('yes');
        // Validated
        $request->validate(['name'=>'required',
        'percent'=>'required']);
        
        $skill->update(['name'=>$request->name,
        'percent'=>$request->percent]);
        return redirect('admin/skill')->with('successMsg','You have successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   
        // dd('id').$id;
        $skill=Skill::find($id);
        $skill->delete();
        return redirect('admin/skill')->with('successMsg','You have successfully deleted!');
       
    }
}
