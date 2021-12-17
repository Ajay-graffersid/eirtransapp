<?php

namespace App\Http\Controllers;

use App\Models\Lane;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Validator;

class LaneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lanes = DB::select('select * from lanes');
        return view('lane.index',['lanes'=>$lanes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('lane.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {    
        $validator = Validator::make($request->all(), [
            'lane_type' => 'required|unique:lanes,lane_type',
           
        ]);

        if ($validator->fails()) {
            return redirect('lanes/create')
                        ->withErrors($validator)
                        ->withInput();
        }else{
      
        $lane_type= $request->input('lane_type');
         $lane_number= $request->input('lane_number');       
            
	 
        DB::insert('insert into lanes (lane_type,status,lane_number) values(?,?,?)',[$lane_type,0,$lane_number]);
      
      $msg="Lane added successfully.";
      
      $request->session()->flash('success', $msg);
		 
	  	 return redirect()->route('lanes.index');
		
	  
    }
}

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Lane  $lane
     * @return \Illuminate\Http\Response
     */
    public function show(Lane $lane)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Lane  $lane
     * @return \Illuminate\Http\Response
     */
    public function edit(Lane $lane)
    {
        return view('lane.edit',compact('lane'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Lane  $lane
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lane $lane)
    {

        $request->validate([
            'lane_type' => 'required|unique:lanes,lane_type',
            'lane_number' => 'required',
        ]);
        
        Lane::where('id', $lane->id)
       ->update([
           'lane_type' => $request->lane_type,
           'lane_number' => $request->lane_number
        ]);
    
        return redirect()->route('lanes.index')
                        ->with('success','Lane updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Lane  $lane
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lane $lane)
    {
        // echo $lane;die;
        $lane->delete();
    
        return redirect()->route('lanes.index')
                        ->with('success','Lane deleted successfully');
    }

    public function laneactive(Request $request,$id)
  {
       Lane::where('id', $id)
     ->update([
         'status' => 1,        
      ]);
     
     return redirect()->route('lanes.index');

  }

  public function laneinactive(Request $request,$id)
  {
       Lane::where('id', $id)
     ->update([
         'status' => 0,        
      ]);
     
     return redirect()->route('lanes.index');

  }
}
