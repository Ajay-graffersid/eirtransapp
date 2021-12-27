<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Loadassign;
use App\Models\Loadcontener;
use App\Models\Job;
use App\Models\Lane;
use App\Models\User;
use App\Models\Invoice;
use DB;
use Response;

class ReportController extends Controller
{
    public function viewpocpoddetails()
    {
        $user = auth()->user();
        $v=$user->roles()->get(); 
        // $v= $user->getRoleNames();
        $role= $v[0]->name;  
        // echo $role;echo $user->id;die;
     
        // $login= session()->get('login');
 
         if($role=='Customer'){
 
        //    $login_id = session()->get('login_id');
         
              $poddetails=DB::table('pods')
                  ->select('pods.*','jobs.reg','jobs.customer','users.name')
                  ->leftjoin('jobs','jobs.id','=','pods.job_id') 
                  ->leftjoin('users','users.id','=','jobs.user_id') 
                  ->where('jobs.user_id', $user->id)->get(); 
                
 
         }else{
       
         $poddetails=DB::table('pods')
         ->select('pods.*','jobs.reg','users.name')
         ->leftjoin('jobs','jobs.id','=','pods.job_id') 
         ->leftjoin('users','users.id','=','jobs.user_id')
         ->get(); 
    //    echo '<pre>';print_r($poddetails);die;
 
         } 
      
           return view('report.pocpoddetails',['poddetails'=>$poddetails]);
    
    }


    public function poc($id='')
    {
     
      $podlink = DB::select('select * from  jobs where id=?',[$id]);
      $collected = DB::select('select * from  collecteds where job_id=?',[$id]);
    //   $collected = DB::select('select * from  collected where cardetails=?',[$id]);
      $driver = DB::select('select * from driver where id=?',[$collected[0]->driver_id]);
      $dentreport = DB::select('select * from dent where job_id=? and dent_status=?',[$collected[0]->job_id,0]);
        
      $deliveredjob = DB::select('select * from  singlejobdelivered where job_id=? and job_status=?',[$id,0]);
    
      $jobdetails = DB::select('select * from completejobs where job_id=? and status=?',[$id,0]);
      $customerdetails = DB::select('select * from  users where id=?',[$podlink[0]->user_id]);
      
      return view('report.poc',compact('podlink','driver','dentreport','deliveredjob','jobdetails','collected','customerdetails')); 
        
    }


    public function podlink($id='')
    {
       
    $podlink = DB::select('select * from  jobs where id=?',[$id]);
    $collected = DB::select('select * from  collected where job_id=?',[$id]);
    $driver = DB::select('select * from driver where id=?',[$collected[0]->driver_id]);
    $deliveredjob = DB::select('select * from  singlejobdelivered where job_id=? and job_status=?',[$id,1]);
    $dentreport = DB::select('select * from dentdelivered where job_id=? and dent_status=?',[$collected[0]->job_id,1]);
        
    
     $jobdetails = DB::select('select * from  singlejobdelivered where job_id=? and job_status=?',[$id,1]);
     $customerdetails = DB::select('select * from  users where id=?',[$podlink[0]->user_id]);
      
   return view('report.podlink',compact('podlink','driver','dentreport','deliveredjob','jobdetails','collected','customerdetails'));     
   
    }



    
    public function viewcarreport_details($lane='')
    {

      // echo $lane;die;
     $lanes =  DB::select("select *from lanes");
     $customer_id = 0;
     $bookingdate1 = 0;
     $bookingdate2= 0;
     $status= 0;
 
     $user = auth()->user();
    $v=$user->roles()->get(); 
    // $v= $user->getRoleNames();
     $role= $v[0]->name;  
  
    $login_id = $user->id;
  
     
    
     
     if(!empty($lane)){
 
       $login= session()->get('login');
 
       if($role=='Customer'){
      
         $jobs =Job::where('bookingstatus','!=',0)
                 ->where('lane_id',$lane)
                 ->where('user_id',$login_id)->get();
          
         $customers = DB::select('select * from users  where id =?',[$login_id]);   
 
       }else{
      
          $jobs =Job::where('bookingstatus','!=',0)
      ->where('lane_id',$lane)
      ->get();
      
       $customers = User::role('Customer')->orderBy('name', 'ASC')->get();  
       } 
            return view('report.job_report',compact('jobs','lanes','customers','customer_id','bookingdate1','bookingdate2','status'));
    
      }else{
         
      
       if($role=='Customer'){      
        $jobs =Job::where('bookingstatus','!=',0)
        ->where('user_id',$login_id)->get();
 
        $customers = User::role('Customer')->orderBy('name', 'ASC')->get();  
          
       }else{     
     
      $jobs =Job::where('bookingstatus','!=',0)->get();

      $customers = User::role('Customer')->orderBy('name', 'ASC')->get();  
       }
          
         return view('report.job_report',compact('jobs','lanes','customers','customer_id','bookingdate1','bookingdate2','status'));
     }
  
    } 






    public function searchbycarbookingg(Request $request)  {
  
      $bookingdate1= $request->input('booking_date1');
      
      $bookingdate2= $request->input('booking_date2');
      
      $customer_id= $request->input('customer_id');
      $status= $request->input('status');
     
      $lanes =  DB::select("select *from lanes");

      // $login= session()->get('login');

      
        $user = auth()->user();
        $v=$user->roles()->get(); 
        // $v= $user->getRoleNames();
          $role= $v[0]->name;  
      
        // $login_id = $user->id;

      if($role=='Customer'){
      
        $login_id = $user->id;
      }
      
        
      
         
        if(!empty($bookingdate1) && !empty($bookingdate2) && empty($customer_id) && empty($status))
        {
          $jobs =Job::where('bookingstatus','!=',0)->where('booking_date','>=',$bookingdate1)->where('booking_date','<=',$bookingdate2)->get();
              //  $jobs = DB::select('select * from jobs where booking_date >= ? and booking_date <= ?',[$bookingdate1,$bookingdate2]);
        }
        else if(!empty($bookingdate1) && !empty($bookingdate2) && !empty($customer_id) && empty($status)){
          $jobs =Job::where('bookingstatus','!=',0)->where('booking_date','>=',$bookingdate1)->where('booking_date','<=',$bookingdate2)->where('user_id',$customer_id)->get();
         
            
        }
        else if(!empty($bookingdate1) && !empty($bookingdate2) && empty($customer_id) && !empty($status)){
          $jobs =Job::where('bookingstatus',$status)->where('booking_date','>=',$bookingdate1)->where('booking_date','<=',$bookingdate2)->get();
         
            
        }

        else if(empty($bookingdate1) && empty($bookingdate2) && !empty($customer_id) && !empty($status)){          
        
          $jobs =Job::where('bookingstatus',$status)->where('user_id',$customer_id)->get(); 
        }

        else if(empty($bookingdate1) && empty($bookingdate2) && !empty($customer_id) && empty($status)){          
       
          $jobs =Job::where('bookingstatus','!=',0)->where('user_id',$customer_id)->get();   
        }
        else if(empty($bookingdate1) && empty($bookingdate2) && empty($customer_id) && !empty($status)){
          
        
          $jobs =Job::where('bookingstatus',$status)->get();   
            
        }
       


        else
        {
          $jobs =Job::where('bookingstatus',4)->get();  
          
        }
        
        $customers = User::role('Customer')->orderBy('name', 'ASC')->get();  
       
       return view('report.job_report',compact('jobs','customers','lanes','customer_id','bookingdate1','bookingdate2','status')); 
        
        
    }



      public function jobs_report_export(Request $request)
      {
      
      $customer_id=$request->customer_id;
      $status=$request->status;
      $booking_date1=$request->booking_date1;
      $booking_date2=$request->booking_date2;
        

        // echo $request->customer_id;die;
           
        //  if($customer_id == 00){
          
        //   $customer_id ='';   
        //  }
            
          
      // $headers = [
      //       'Cache-Control' => 'must-revalidate, post-check=0, pre-check=0', 
      //       'Content-type' => 'text/csv', 
      //       'Content-Disposition' => 'attachment; filename=jobs_'.date('Ymd').'.csv', 
      //       'Expires' => '0', 
      //       'Pragma' => 'public'
      //   ];

      //   $headers = array(
      //     "Content-type"        => "text/csv",
      //     "Content-Disposition" => "attachment; filename=$fileName",
      //     "Pragma"              => "no-cache",
      //     "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
      //     "Expires"             => "0"
      // );
        
        
        
        ////new////
        
             
               
              
        
       if(empty($customer_id) && empty($status) && !empty($booking_date1) && !empty($booking_date2))
        {              
               $list  = Job::join('users','jobs.user_id','=','users.id')
                        ->join('lanes','jobs.lane_id','=','lanes.id')
                        ->select('jobs.job_number','users.name','jobs.make_model','jobs.reg','lanes.lane_number','jobs.rate','jobs.rate','jobs.collection_address','jobs.delivery_address','jobs.booking_date','jobs.bookingstatus')
                        ->where('jobs.booking_date','>=',$booking_date1)
                        ->where('jobs.booking_date','<=',$booking_date2)
                        // ->where('jobs.bookingstatus','!=',0)
                        ->get();
                        // ->toArray();

              // $list=Job::where('booking_date','>=',$booking_date1)->where('booking_date','<=',$booking_date2)->where('bookingstatus','!=',0)->get()->toArray();
                       
              
        }
        else if(!empty($booking_date1) && !empty($booking_date2) && !empty($customer_id) && !empty($status)){
          
          // $list=Job::where('booking_date','>=',$booking_date1)->where('booking_date','<=',$booking_date2)->where('bookingstatus','!=',0)->where('user_id',$customer_id)->get()->toArray();
               $list  = Job::join('users','jobs.user_id','=','users.id')
                         ->join('lanes','jobs.lane_id','=','lanes.id')
                         ->select('jobs.job_number','users.name','jobs.make_model','jobs.reg','lanes.lane_number','jobs.rate','jobs.rate','jobs.collection_address','jobs.delivery_address','jobs.booking_date','jobs.bookingstatus')
                        ->where('jobs.booking_date','>=',$booking_date1)
                        ->where('jobs.booking_date','<=',$booking_date2)
                        ->where('jobs.bookingstatus','=',$status)
                        ->where('jobs.customer','=',$customer_id)
                        ->get();
                        // ->toArray();
             
             
            
        }
        else if(empty($booking_date1) && empty($booking_date2) && !empty($customer_id) && empty($status)){
          
          // $list=Job::where('bookingstatus','!=',0)->where('user_id',$customer_id)->get()->toArray();
            
            $list  =  Job::join('users','jobs.user_id','=','users.id')
                      ->join('lanes','jobs.lane_id','=','lanes.id')
                      ->select('jobs.job_number','users.name','jobs.make_model','jobs.reg','lanes.lane_number','jobs.rate','jobs.rate','jobs.collection_address','jobs.delivery_address','jobs.booking_date','jobs.bookingstatus')
                        // ->where('cardetails.bookingstatus','!=',0)
                        ->where('jobs.customer',$customer_id)
                        ->get();
                        // ->toArray();
          
             
              
              
        
        }

        else if(empty($booking_date1) && empty($booking_date2) && empty($customer_id) && !empty($status)){
          
          //  echo 'status if';die;
        
          // $list=Job::where('bookingstatus',$status)->get()->toArray();
          $list  = Job::join('users','jobs.user_id','=','users.id')
                   ->join('lanes','jobs.lane_id','=','lanes.id')
                   ->select('jobs.job_number','users.name','jobs.make_model','jobs.reg','lanes.lane_number','jobs.rate','jobs.rate','jobs.collection_address','jobs.delivery_address','jobs.booking_date','jobs.bookingstatus')
                       ->where('jobs.bookingstatus',$status)
                      ->get();
                      // ->toArray();
        
                      
            
      
      }
        else
        {
            //  $list=Job::where('bookingstatus','!=',0)->get()->toArray();
             $list  =  Job::join('users','jobs.user_id','=','users.id')
                      ->join('lanes','jobs.lane_id','=','lanes.id')
                      ->select('jobs.job_number','users.name','jobs.make_model','jobs.reg','lanes.lane_number','jobs.rate','jobs.rate','jobs.collection_address','jobs.delivery_address','jobs.booking_date','jobs.bookingstatus')
                        // ->where('cardetails.bookingstatus','=',4)
                        ->get();
                        // ->toArray();
       
         
       
        }
        
              
        
        //endnew///
        
              
        $fileName = 'tasks.csv';
        
        if(count($list)>0)
        {

          $headers = array(
            "Content-type"        => "text/csv",
            "Content-Disposition" => "attachment; filename=$fileName",
            "Pragma"              => "no-cache",
            "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
            "Expires"             => "0"
        );

        $columns = array('job_number', 'name', 'make_model', 'reg', 'lane_number','rate','collection_address','delivery_address','booking_date','bookingstatus');

        $callback = function() use($list, $columns) {
            $file = fopen('php://output', 'w');
            fputcsv($file, $columns);

            foreach ($list as $task) {
                $row['job_number']  = $task->job_number;
                $row['name']  = $task->name;
                $row['make_model']    = $task->make_model;
                $row['reg']  = $task->reg;
                $row['lane_number']  = $task->lane_number;
                $row['rate']  = $task->rate;
                $row['collection_address']  = $task->collection_address;
                $row['delivery_address']  = $task->delivery_address;
                $row['booking_date']  = $task->booking_date;
                $row['bookingstatus']  = $task->bookingstatus;

                fputcsv($file, array($row['job_number'], $row['name'], $row['make_model'], $row['reg'], $row['lane_number'],$row['rate'],$row['collection_address'],$row['delivery_address'],$row['booking_date'],$row['bookingstatus']));
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);






      //   # add headers for each column in the CSV download
      //  $ee= array_unshift($list, array_keys($list[0]));
        
      //   $callback = function() use ($list)
      //   {
      //       $FH = fopen('php://output', 'w');
        
      //         foreach($list as $key => $row){
              
      //           if($row->bookingstatus=='4'){
      //             $row->bookingstatus='Job Complete';
      //         }

      //         // $questions[$key]['answers'] = $answers_model->get_answers_by_question_id($question['question_id']);
              
      //           fputcsv($FH, $row);
      //       }
      //       fclose($FH);
      //   };

       
        
      //   return Response::stream($callback, 200, $headers);
        }
        else{
            
              $msg="Data Not Found!";
         $request->session()->flash('msg', $msg);
          return redirect()->route('job_report');
            
         
        }
        
    }




    public function viewMorningCheckReport()
    {
     
      $todaymorningcheck = DB::select('select * from todaymorningchecks');
      return view('report.morningcheck',['todaymorningcheck'=>$todaymorningcheck]);
    
    }
    


    public function searchbarmorningcheck(Request $request)  {
  
      $datatimee= $request->input('datatime');
      
     // echo($datatimee);
     // die;
         
        if(!empty($datatimee))
        {
               $drexpence = DB::select('select * from expences where datatime=?',[$datatimee]);
        }
        else
        {
             $drexpence = DB::select('select * from expences');
        }
      
     return view('report.drexpence',['drexpences'=>$drexpence]);
        
        
        
        
    }



    public function searchbarexpenses(Request $request)  {
  
      $datatimee= $request->input('datatime');
      
    //   echo($datatimee);
    //   die;
         
        if(!empty($datatimee))
        {
               $drexpence = DB::select('select * from expences where datatime=?',[$datatimee]);
        }
        else
        {
             $drexpence = DB::select('select * from expences');
        }
      
     return view('report.drexpence',['drexpences'=>$drexpence]);
        
        
        
        
    }
    



    public function itemmorning(Request $request,$id)
   
   
   {
    
  
      $item = DB::select('select * from morningtruckaccepts where driver_id=?',[$id]);
     return view('report.itemtable',['items'=>$item]);
   
    }





    public function jobchecklist()  {
      
       $loaddetails = Loadcontener::all();

      
                     
       //$driver = DB::select('select * from driver where id=?',[$loaddetails[0]->driver_id]);
      
  
  
       return view('report.jobchecklist',['jobs'=>$loaddetails]);
     
      }








        
   public function view_load_details($id='')
   {
       
      $loadcontener = DB::table('loadconteners')->where('id',$id)->first();
      
      $data = [];
      if(!empty($loadcontener->job_id)){
          $data = array(
                 'id'=>$loadcontener->id,
                 'loadnumber'=>$loadcontener->loadnumber,
                 'car_collection_data'=>$this->getCarCollectionData1($loadcontener->job_id),
                 'load_title'=>$loadcontener->load_title,
              );
      }else{
          $data = array(
                 'id'=>$loadcontener->id,
                 'loadnumber'=>$loadcontener->loadnumber,
                 'car_collection_data'=>$this->getCarCollectionData1($loadcontener->car_delivery_id),
                 'load_title'=>$loadcontener->load_title,
             );
      }
      $jobs= $this->getCarCollectionData1($loadcontener->job_id);
      $shiping = DB::table('carsfordelivery')->where('loadcontener_id',$id)->get();
      //echo "<pre>";
      //print_r($shiping);die;
     
       return view('report.view_load_details',compact('jobs','shiping'));
    
   }


   public function getCarCollectionData1($car_id){
    $ids = explode(',',$car_id);
  
    
    foreach($ids as $job_id){
      
        $jobs= Job::where('id',$job_id)->get();
       
        
    }
    return $jobs;
}




public function view_job_report($id='') {
  $collecteddetails = DB::select('select * from collecteds where job_id=?',[$id]);
  $jobs = DB::select('select * from dents where job_id=?  and 	dent_status=?',[$id,0]);
   $deliverydentimage = DB::select('select * from dentdelivereds where job_id=? and dent_status=?',[$id,0]);

  $dent1 = DB::select('select * from dents where job_id=?  and dent_status=?',[$id,1]);
  $deliverydentimage1 = DB::select('select * from dentdelivereds where job_id=? and dent_status=?',[$id,1]);

  $jobdetails = DB::select('select * from completejobs where job_id=? and status=?',[$id,0]);
  $jobdetails1 = DB::select('select * from completejobs where job_id=? and status=?',[$id,1]);
  $driver = DB::select('select * from drivers where id=?',[$jobdetails[0]->driver_id]);

  $loaddetails = DB::select('select * from loadconteners where id=?',[$jobdetails[0]->job_id]);

 
  $jobdelivered = DB::select('select * from singlejobdelivereds where job_id=?  and job_status=?',[$id,0]);
  $first_delivered = DB::select('select * from singlejobdelivereds where job_id=?  and job_status=?',[$id,0]);
  $jobdelivered1 = DB::select('select * from singlejobdelivereds where job_id=?  and job_status=?',[$id,1]);
  
  
  $first_delivered_details = DB::select('select * from singlejobdelivereds where job_id=?  and job_status=?',[$id,1]);
 //  $seconddetails_delivered = DB::select('select * from singlejobdelivered where job_id=?  and job_status=?',[$id,1]);
  
  $current_job_details = DB::select('select * from jobs where id=?',[$id]);
  $loadsassign = DB::select('select * from loadsassign where driverid=?',[$collecteddetails[0]->driver_id]);
   if(!empty($collecteddetails[1]->driver_id) && !empty($jobdetails[1]->job_id)){
       $loaddetails1 = DB::select('select * from loadconteners where id=?',[$jobdetails[1]->job_id]);
            $loadsassign1 = DB::select('select * from loadassigns where driverid=?',[$collecteddetails[1]->driverid]);
                 return view('view_job_report',compact('current_job_details','driver','loaddetails','loaddetails1','jobs','dent1','jobdetails','jobdetails1','collecteddetails','jobdelivered1','jobdelivered','first_delivered','loadsassign','loadsassign1','deliverydentimage','deliverydentimage1','first_delivered_details'));


   }else{
    return view('view_job_report',compact('current_job_details','driver','loaddetails','jobs','dent1','jobdetails','jobdetails1','collecteddetails','jobdelivered','jobdelivered1','first_delivered','loadsassign','deliverydentimage','deliverydentimage1','first_delivered_details'));

   }
   

  }

   
  
    
    
    

    
    
}
