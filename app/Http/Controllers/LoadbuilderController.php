<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\Lane;
use App\Models\Loadcontener;
use DB;

class LoadbuilderController extends Controller
{
    public function loadbuldercreates(Type $var = null){
    
      $jobs=Job::where('status',0)->get();

      $city = DB::table('users')->select('city')->groupBy('city')->get();
      $county = DB::table('users')->select('county')->groupBy('county')->get();
      $country = DB::table('users')->select('country')->groupBy('country')->get();
      
      $jobcollectionadd = DB::table('jobs')->select('collection_address')->where('status',0)->groupBy('collection_address')->get();
      
      $loadcontener = DB::select('select * from loadconteners where  status=?',[0]);

      return view('loadbuilder.create',['jobs'=>$jobs,'loadcontener'=>$loadcontener,'city'=>$city,'county'=>$county,'country'=>$country,'jobcollectionadd'=>$jobcollectionadd]);
    }



    public function viewcar_for_delivery($lane)
    {
    
    // echo $lane;die;
        
      if($lane!=0)
      {
   
      //  $car_for_collection = DB::select("select *from cardetails where status=? or status=? and lan=?",[6,3,$lane]);
            $jobs=Job::where('status',3)
            ->orWhere('status',6)
            ->where('lane_id',$id)
            ->get();

      }
       else
       {
         
          //  $car_for_collection = DB::select("select *from cardetails where status=? or status=? ",[6,3]);  
          $jobs=Job::where('status',3)
          ->orWhere('status',6)         
          ->get();
     
       }          
  
                                             
     $loadcontener = DB::select('select * from loadconteners where  status=? ',[0]);
 
     $lanes = Lane::where('id','!=',9)->get();

     $city = DB::table('users')->select('city')->groupBy('city')->get();
     $county = DB::table('users')->select('county')->groupBy('county')->get();
     $country = DB::table('users')->select('country')->groupBy('country')->get();
     
     $jobcollectionadd = DB::table('jobs')->select('collection_address')->where('status',0)->groupBy('collection_address')->get();
         
    //  return view('loadbuilder.create',['jobs'=>$jobs,'loadcontener'=>$loadcontener,'lanes'=>$lanes,'laneid'=>$lane]);
     return view('loadbuilder.create',['jobs'=>$jobs,'loadcontener'=>$loadcontener,'city'=>$city,'county'=>$county,'country'=>$country,'jobcollectionadd'=>$jobcollectionadd,'lanes'=>$lanes,'laneid'=>$lane]);
    
    }



    public function pendingdeliverjob()
    {
    
         
    // $car_for_collection = DB::select("select *from cardetails where status=?",[7]);  

       $jobs=Job::where('status',7)->get();   
                 
     $loadcontener = DB::select('select * from loadconteners where  status=? ',[0]);
     $city = DB::table('users')->select('city')->groupBy('city')->get();
     $county = DB::table('users')->select('county')->groupBy('county')->get();
     $country = DB::table('users')->select('country')->groupBy('country')->get();
     
     $jobcollectionadd = DB::table('jobs')->select('collection_address')->where('status',0)->groupBy('collection_address')->get();  
         
   
    //  return view('loadbuilder.create',['jobs'=>$jobs,'loadcontener'=>$loadcontener]);
     return view('loadbuilder.create',['jobs'=>$jobs,'loadcontener'=>$loadcontener,'city'=>$city,'county'=>$county,'country'=>$country,'jobcollectionadd'=>$jobcollectionadd]);
    
    }



    public function  get_job_by_location($location)
    { 

      // echo $location;die;
      //$car_for_collection = DB::select('select * from cardetails where status!=?',[1]);


         $jobs=Job::where('status',0)
         ->where('location',$location)
         ->get();   

         $loadcontener = DB::select('select * from loadconteners where  status=?',[0]);

         $city = DB::table('users')->select('city')->groupBy('city')->get();
         $county = DB::table('users')->select('county')->groupBy('county')->get();
         $country = DB::table('users')->select('country')->groupBy('country')->get();
         
         $jobcollectionadd = DB::table('jobs')->select('collection_address')->where('status',0)->groupBy('collection_address')->get();
    
           
     
         return view('loadbuilder.create',['jobs'=>$jobs,'loadcontener'=>$loadcontener,'city'=>$city,'county'=>$county,'country'=>$country,'jobcollectionadd'=>$jobcollectionadd]);

    }


    public function  get_job_by_collectonaddress($collection_address)
    {
       // echo $collection_address;die;
      //$car_for_collection = DB::select('select * from cardetails where status!=?',[1]);    

              $jobs=Job::where('status',0)
              ->where('location',$collection_address)
              ->orwhere('collection_address',$collection_address)
              ->get();   
      
              $loadcontener = DB::select('select * from loadconteners where  status=?',[0]);

            $city = DB::table('users')->select('city')->groupBy('city')->get();
            $county = DB::table('users')->select('county')->groupBy('county')->get();
            $country = DB::table('users')->select('country')->groupBy('country')->get();
            
            $jobcollectionadd = DB::table('jobs')->select('collection_address')->where('status',0)->groupBy('collection_address')->get();

     
    
            return view('loadbuilder.create',['jobs'=>$jobs,'loadcontener'=>$loadcontener,'city'=>$city,'county'=>$county,'country'=>$country,'jobcollectionadd'=>$jobcollectionadd]);
  
    }
   
    


    public function  createsloadbulderAjaxData($city='',$county='',$country='')
    {   

      // echo 'aajjaja';die;

          // $record=Job::where('status',0)->get();   

      $record = DB::table('Jobs')
                              ->select('Jobs.*','users.name','users.city','users.county','users.country','users.name')
                              ->join('users','jobs.user_id','=','users.id')
                              ->where('jobs.status',0);

      if ((!empty($city) || $city != '') && $city != 'all') {
        $record->where('users.city','LIKE','%'.$city.'%');
      }

      if ((!empty($county) || $county != '') && $county != 'all') {
        $record->where('users.county','LIKE','%'.$county.'%');
      }

      if ((!empty($country) || $country != '') && $country != 'all') {
        $record->where('users.country','LIKE','%'.$country.'%');
      }
      $jobs = $record->get();

      // echo '<pre>';print_r($car_for_collection);die;

      return view('loadbuilder.createloadAjaxData',compact('jobs'));
    }



    public function jobassign_to_load(Request $request)  {
  
                   
      $job_id= $request->input('job_id');

  // for status jobs       
         $job=Job::find($job_id);
        $status= $job->status;
        // $status= 2;
        // echo $status;die;
  // 
      $loadcontener_id= $request->input('loadcontener_id');     
    
        $checkload=Loadcontener::where('id',$loadcontener_id)->first();     
     
     
     if($checkload->job_id)
      {
          
         $ml=$checkload->job_id; 
     
        
         $multiload=$ml.','.$job_id;
         
        
      
          Job::where('id', $job_id)->update(['old_status' =>$status,'status' => 1]);           
          
        DB::update('update loadconteners set job_id = ? where id = ?',[$multiload,$loadcontener_id]);     
     
           return  $msg="Job added to load.";
     
     
      }
      
     
      else
      {
      
    
     Job::where('id', $job_id)->update(['old_status' =>$status,'status' => 1]);
     
      DB::update('update loadconteners set job_id = ? where id = ?',[$job_id,$loadcontener_id]);

      
   
    return   $msg="Job added to load";
 
      }

   }

   public function removejob_toload(Request $request,$loadid,$job_id)
   {
             
           $job=Job::find($job_id);
           $old_status= $job->old_status;

    
          $catchload=Loadcontener::where('id',$loadid)->first();
       
         $ml=$catchload->job_id; 
       
          $fid=explode(',',$ml);
        
           $multi= array_diff($fid, [$job_id] );
        
         
          $multiload=implode(',',$multi);
          
         
        
        
        DB::update('update loadconteners set job_id = ? where id = ?',[$multiload,$catchload->id]);
        
      
      //update jobs//
      
      //  DB::update('update jobs set status = ? where id = ?',[0,$job_id]);
       Job::where('id', $job_id)->update(['old_status' =>"",'status' =>$old_status ]);
      
     
       //DB::delete("delete from loadsassign where jobcustomerid=?",[$id]);
      $msg="!Success Load Remove ";
      $request->session()->flash('msg', $msg);
     
       return redirect()->route('loadbuldercreates');
      //  return redirect()->route('car_for_delivery',['id' => 0]);
      
   }

   

    
}
