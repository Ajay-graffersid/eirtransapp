<?php

namespace App\Http\Controllers;

use App\Models\Driver;
use Illuminate\Http\Request;
use DB;

class DriverController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $driver = Driver::all();
     return view('driver.index',['drivers'=>$driver]);
   
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('driver.create');
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
            'mobile' => 'required|unique:drivers,mobile',
            'name' => 'required',
            'pincode' => 'required',
        ]);
      
        $name= $request->input('name');
	    $pincode= $request->input('pincode');
	    $mobile= $request->input('mobile');
	  
      
      DB::insert('insert into drivers (name,pincode,mobile,token,ip,deviceid,type,driver_status) values(?,?,?,?,?,?,?,?)',[$name,$pincode,$mobile,0,0,0,0,0]);
      
      $msg="Driver create successfully..";
      
      $request->session()->flash('msg', $msg);
		 
	  	 return redirect()->route('driver.index');
		 
		 
	  
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Driver  $driver
     * @return \Illuminate\Http\Response
     */
    public function show(Driver $driver)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Driver  $driver
     * @return \Illuminate\Http\Response
     */
    public function edit(Driver $driver)
    {
        return view('driver.edit',compact('driver'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Driver  $driver
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Driver $driver)
    {
        $request->validate([
            'mobile' => 'required|unique:drivers,mobile',
            'name' => 'required',
            'pincode' => 'required',
        ]);
        
        Driver::where('id', $driver->id)
       ->update([
           'name' => $request->name,
           'pincode' => $request->pincode,
           'mobile' => $request->mobile,
        ]);
    
        return redirect()->route('driver.index')
                        ->with('msg','driver updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Driver  $driver
     * @return \Illuminate\Http\Response
     */
    public function destroy(Driver $driver)
    {
        $driver->delete();
    
        return redirect()->route('driver.index')
                        ->with('msg','Lane deleted successfully');
    }


    public function driverstatusupdate(Request $request,$id)
  {
    //  $lane = Lane::find($request->id);
     $users = DB::update('update  drivers set driver_status = ? where id = ?',[1,$request->id]);
     return redirect()->route('driver.index');

  }
  
  public function driverinctive(Request $request,$id)
  {
    //  $lane = Lane::find($request->id);
     $users = DB::update('update drivers set driver_status = ? where id = ?',[0,$request->id]);
     return redirect()->route('driver.index');

  }
  
}
