<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use DB;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function shipping_address()
    {
     
    //  $notification_details = DB::table('loadcontener')->get();
      
       $notification_details=DB::select('select *from carsfordelivery');       
       
      
      return view('shipping.shippingaddress',compact('notification_details'));
    
    }
    
    public function  viewshipinng(Request $request){
       
     $result=DB::select('select *from carsfordelivery where id=?',[$request->id]);
      
      return view('shipping.shipping_view',compact('result'));  
        
    }



  
    

}
