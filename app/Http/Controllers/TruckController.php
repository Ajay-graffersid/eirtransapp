<?php

namespace App\Http\Controllers;

use App\Models\Truck;
use Illuminate\Http\Request;
use DB;

class TruckController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $truck = DB::select('select * from trucks');
        return view('truck.index',['trucks'=>$truck]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('truck.create');
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
            'truck_number' => 'required|unique:trucks,truck_number',
           
        ]);
      
        // $name= $request->input('truck_number');
            
        DB::table('trucks')->insert(
            [
                'truck_number' =>$request->truck_number ,
                'truck_status' =>0 ,
                'date_time' =>0 ,
                'truck_pickstatus' =>0 ,
                
           ]
        );	 
        
      
      $msg="truck added successfully.";
      
      $request->session()->flash('msg', $msg);
		 
	  	 return redirect()->route('truck.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Truck  $truck
     * @return \Illuminate\Http\Response
     */
    public function show(Truck $truck)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Truck  $truck
     * @return \Illuminate\Http\Response
     */
    public function edit(Truck $truck)
    {
        // $truck = Truck::where('id',$id)->first();

        return view('truck.edit',compact('truck'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Truck  $truck
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Truck $truck)
    {
        $request->validate([
            'truck_number' => 'required|unique:trucks,truck_number',
           
        ]);
        
        Truck::where('id', $truck->id)
       ->update([
           'truck_number' => $request->truck_number,
          
        ]);
    
        return redirect()->route('truck.index')
                        ->with('msg','truck updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Truck  $truck
     * @return \Illuminate\Http\Response
     */
    public function destroy(Truck $truck)
    {
        $truck->delete();
    
        return redirect()->route('truck.index')
                        ->with('msg','truck deleted successfully');
    }


    
   public function truckstatusupdate(Request $request,$id)
   {
    //   $lane = Lane::find($request->id);
      $users = DB::update('update  trucks set truck_status = ? where id = ?',[1,$request->id]);
      return redirect()->route('truck.index');
 
   }
   
   public function truckinctive(Request $request,$id)
   {
    //   $lane = Lane::find($request->id);
      $users = DB::update('update trucks set truck_status = ? where id = ?',[0,$request->id]);
      return redirect()->route('truck.index');
 
   }
      
}
