<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use DB;
use App\Models\Job;
use Illuminate\Http\Request;

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

    public function mastersearch(Request $request)  {
  
      $reg= $request->input('reg');
         
        if(!empty($reg))
        {
              //  $jobs = DB::select('select * from jobs where reg=?',[$reg]);
               $jobs = Job::where('reg',$reg)->get();
        }
        else
        {
          $jobs = Job::get();
            //  $jobs = DB::select('select * from cardetails');
         
        }
        
        
      
     return view('master_searh',compact('jobs')); 
        
        
    }


    public function getinvoice(Request $request)
    {
            $jobid= $request->input('jobid');
        
        
            $userData=[];
            $fid=DB::select("select *from invoices where job_id=?",[$jobid]);
             foreach($fid as $f)
             {
              
                array_push($userData, [
            'inv_file'   => $f->inv_file,
         
              ]);
 
              } 
         
         
         
        
  
        return json_encode(array('data'=>$userData));
     
     
   
   
   }



  
    

}
