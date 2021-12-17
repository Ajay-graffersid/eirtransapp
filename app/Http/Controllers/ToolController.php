<?php

namespace App\Http\Controllers;

use App\Models\Tool;
use Illuminate\Http\Request;
use DB;

class ToolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tools = DB::select('select * from tools');
        return view('tools.index',['tools'=>$tools]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tools.create');
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
            'name' => 'required|unique:tools,name',
           
        ]);
      
        $name= $request->input('name');
            
        DB::table('tools')->insert(
            ['name' =>$name ]
        );	 
        
      
      $msg="tool added successfully.";
      
      $request->session()->flash('msg', $msg);
		 
	  	 return redirect()->route('tool.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tool  $tool
     * @return \Illuminate\Http\Response
     */
    public function show(Tool $tool)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tool  $tool
     * @return \Illuminate\Http\Response
     */
    public function edit(Tool $tool)
    {
        return view('tools.edit',compact('tool'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tool  $tool
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tool $tool)
    {
        $request->validate([
            'name' => 'required|unique:tools,name',
           
        ]);
        
        Tool::where('id', $tool->id)
       ->update([
           'name' => $request->name,
          
        ]);
    
        return redirect()->route('tool.index')
                        ->with('msg','tool updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tool  $tool
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tool $tool)
    {
        $tool->delete();
    
        return redirect()->route('tool.index')
                        ->with('msg','tool deleted successfully');
    }


    public function toolstatusupdate(Request $request,$id)
    {
    //    $lane = Tool::find($request->id);
       $users = DB::update('update  tools set status = ? where id = ?',[1,$request->id]);
       return redirect()->route('tool.index');
  
    }
    
    public function toolinctive(Request $request,$id)
    {
    //    $lane = Lane::find($request->id);
       $users = DB::update('update tools set status = ? where id = ?',[0,$request->id]);
       return redirect()->route('tool.index');
  
    }
}
