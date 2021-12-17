<?php

namespace App\Http\Controllers;

use App\Models\Loadcontener;
use Illuminate\Http\Request;

class LoadcontenerController extends Controller
{
  
    public function index()
    {

        $data = Loadcontener::where('status','!=',4)->orderBy('id', 'DESC')->get();

		return view('loadcontener.index',compact('data'));
      		
		
		
    }

   
    public function create()
    {
        $list_count = Loadcontener::count();
		$load_number = date('y').$list_count.'672';

        return view('loadcontener.create',compact('load_number'));
    }

   
    public function store(Request $request)
    { 

        $request->validate([
          
            'loadnumber' => 'required',
            'load_title' => 'required',
        ]);

        // echo '<pre>';print_r($_POST);die;
        $load = new Loadcontener();
		$load->loadnumber = $request->loadnumber;
        $load->load_title = $request->load_title;
        $load->shipping_type = $request->shipping_type;
        $load->load_type = $request->load_type;
        $load->type = $request->type;        
		$load->delivery_type = "1";
        $load->status = 0;
		
        
		$load->job_id = $request->job_id != '' ? $request->job_id : "";
		// $load->car_delivery_id = $request->car_delivery_id != '' ? $request->car_delivery_id : "";
		// $load->driver_id = $request->driver_id != '' ? $request->driver_id : "";
		// $load->status = 0;
		// $load->type = $request->type != '' ? $request->type : "";

		if ($load->save()) {
			$msg="Load contaniner created successfully..";
      		$request->session()->flash('msg', $msg);
	  	 	// return redirect('loadContainer');
               return redirect()->route('loadcontener.index');
		}
    }

    
    public function show(Loadcontener $loadcontener)
    {
        //
    }

   
    public function edit(Loadcontener $loadcontener)
    {
        // $data = LoadContainer::find($id);

		return view('loadcontener.edit',compact('loadcontener'));
        // return view('loadcontener.edit',compact('loadcontener'));
    }

   
    public function update(Request $request, Loadcontener $loadcontener)
    {
        $request->validate([
            'loadnumber' => 'required',
            'load_title' => 'required',
        ]);
        
        Loadcontener::where('id', $loadcontener->id)
       ->update([
           'loadnumber' => $request->loadnumber,
           'load_title' => $request->load_title,
           'shipping_type' => $request->shipping_type,
           'delivery_type' => 1
        ]);


        return redirect()->route('loadcontener.index')
        ->with('msg','loadcontener updated successfully');
       

        
	
    }

   
    public function destroy(Loadcontener $loadcontener)
    {
        $loadcontener->delete();
    
        return redirect()->route('loadcontener.index')
                        ->with('msg','loadcontener deleted successfully');
    }
}
