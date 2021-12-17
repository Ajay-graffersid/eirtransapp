<?php

namespace App\Http\Controllers;

use App\Models\Expence_type;
use Illuminate\Http\Request;
use DB;


class ExpenceTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $expences = DB::select('select * from expence_types');
        return view('expencetype.index',['expences'=>$expences]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('expencetype.create');
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
            'name' => 'required|unique:expence_types,name',
           
        ]);
      
        $name= $request->input('name');
            
        DB::table('expence_types')->insert(
            ['name' =>$name ]
        );	 
        
      
      $msg="Expence_types added successfully.";
      
      $request->session()->flash('msg', $msg);
		 
	  	 return redirect()->route('expence_type.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Expence_type  $expence_type
     * @return \Illuminate\Http\Response
     */
    public function show(Expence_type $expence_type)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Expence_type  $expence_type
     * @return \Illuminate\Http\Response
     */
    public function edit(Expence_type $expence_type)
    {
        return view('expencetype.edit',compact('expence_type'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Expence_type  $expence_type
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Expence_type $expence_type)
    {
        $request->validate([
            'name' => 'required|unique:expence_types,name',
           
        ]);
        
        Expence_type::where('id', $expence_type->id)
       ->update([
           'name' => $request->name,
          
        ]);
    
        return redirect()->route('expence_type.index')
                        ->with('msg','expence_type updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Expence_type  $expence_type
     * @return \Illuminate\Http\Response
     */
    public function destroy(Expence_type $expence_type)
    {
        $expence_type->delete();
    
        return redirect()->route('expence_type.index')
                        ->with('msg','expence_type deleted successfully');
    }


    public function expensestatusupdate(Request $request,$id)
    {
    //    $lane = Lane::find($request->id);
       $users = DB::update('update  expence_types set status = ? where id = ?',[1,$request->id]);
       return redirect()->route('expence_type.index');
  
    }
    
    public function expenseinctive(Request $request,$id)
    {
    //    $lane = Lane::find($request->id);
       $users = DB::update('update expence_types set status = ? where id = ?',[0,$request->id]);
       return redirect()->route('expence_type.index');
  
    }
}
