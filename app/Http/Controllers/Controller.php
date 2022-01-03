<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use DB;
use App\Models\Job;
use App\Models\Loadcontener;
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


      public function viewnotification_details()
      {
        
      //  $notification_details = DB::table('loadcontener')->get();
        
          $notification_details = Loadcontener::where('status', '=', 2)
                  ->where('type', '=', 2)
                  ->where('shipping_type', '=', 1)
                  ->get();

        return view('notification.notification_details',compact('notification_details'));
      
      }
        
        
     public function addshippingadd($id,$idd)  {   
    
    return view('notification.shippingform',['loadid'=>$id,'driver_id'=>$idd]);
   
   
  }


//   public function getCarCollectionData1($car_id){
//     $ids = explode('.',$car_id);
    
//   //  echo "<pre>";
//   //  print_r($ids);die;
    
//     foreach($ids as $job_id){
//         $cheklan= DB::select("select *from cardetails where id=?",[$job_id]);
//         if($cheklan[0]->lan==null){
//             $jobs[] = DB::table('cardetails')
//                   ->select('cardetails.*','jobcustomer.customer_name','jobcustomer.additional_comment')
//                   ->join('jobcustomer','cardetails.customer','=','jobcustomer.id')
//                   ->where('cardetails.id',$job_id)
//                   ->first();
//         }else{
//             $jobs[] = DB::table('cardetails')
//                   ->select('cardetails.*','jobcustomer.customer_name','lane.lane_number','jobcustomer.additional_comment')
//                   ->join('jobcustomer','cardetails.customer','=','jobcustomer.id')
//                   ->join('lane','cardetails.lan','=','lane.id')
//                   ->where('cardetails.id',$job_id)
//                   ->first();
//         }
        
//     }
//     return $jobs;
// }


  public function savesipingd(Request $request)  {
  
    $driver_id= $request->input('driver_id');
     
    // $dname = DB::select('select * from driver  where id=?',[$driver_id]);
      $dname=Driver::where('id',$driver_id)->first();
     if(!empty($dname))
     {
     $drivername=$dname->name;
     }
     else
     {
        $drivername='Not Found';  
     }
   $load= $request->input('load');
   $delivery= 'dd';
   $carrier= $request->input('carrier');
   $route= $request->input('route');
   $registration= $request->input('registration');
   $dateoftravel= $request->input('dateoftravel');
   $day= $request->input('day');
   $time= $request->input('time');
   $lenght= $request->input('lenght');
  // $drivername= 'ee';
   $contents= $request->input('contents');
   $shippingref= $request->input('shippingref');
   $customer= $request->input('customer');
   $cusref= $request->input('cusref');
   $mrnnumber= $request->input('mrnnumber');
   $pbnnumber= $request->input('pbnnumber');
   $imo= $request->input('imo');
   $eta= $request->input('eta');

   DB::table('carsfordelivery')->insert(
    [
    'driver_id' =>$driver_id, 
    'loadcontener_id' =>$load,
    'delivery' =>$delivery,
    'carrier' =>$carrier,
    'route' =>$route,
    'registration' =>$registration,
    'dateoftravel' =>$dateoftravel,
    'day' =>$day,
    'time' =>$time,
    'lenght' =>$lenght,
    'drivername' =>$drivername,
    'contents' =>$contents,
    'shippingref' =>$shippingref,
    'customer' =>$customer,
   // 'date' => 0,
    'cusref' => $cusref,
    'mrn_number' =>$mrnnumber,
    'pbn_number' =>$pbnnumber,
    'imo' =>$imo,
    'eta' =>$eta,
    ]
);
   
    // DB::insert('insert into carsfordelivery (driver_id,load_id,delivery,carrier,route,registration,dateoftravel,day,time,lenght,drivername,contents,shippingref,customer,cusref,mrn_number,pbn_number,imo,eta) values(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)',[$driver_id,$load,$delivery,$carrier,$route,$registration,$dateoftravel,$day,$time,$lenght,$drivername,$contents,$shippingref,$customer,$cusref,$mrnnumber,$pbnnumber,$imo,$eta]);
    
      
    //  $drivertoken=DB::select('select * from driver where id=?',[$driver_id]);
    $drivertoken=Driver::where('id',$driver_id)->first();
     
      // $loadinfo=DB::select("select *from loadcontener where id=?",[$load]);
        $loadinfo=Loadcontener::where('id',$load)->first();
       
       $loadtitle=$loadinfo->load_title;
       $loadnumber=$loadinfo->loadnumber;
     
      
     $serverKey = 'AAAAzVjTTD4:APA91bFd_f1mJCx-XZv6uZ3A37vKts4Ds6GmE1TZLM9xJ7-kOIGURhEdBgKcByTzYg98hO6IDsYuoZgPJWS4ZMUi2ORK65QxfYhTQk_WvdggbDhbWnHi6qoBDovhOsnqFQDLZf89cpsE';
    $url = 'https://fcm.googleapis.com/fcm/send';
        
         $dtok=$drivertoken->token;
          
         $jb='Shipping address has been added  for the Load'.' '.$loadnumber.''.$loadtitle;
         $tok = $dtok;
          $notification = array('title' =>"Shipping address has been added" , 'text' => $jb, 'driverid' => $driver_id, 'loadid' => $load);
      $fields = array(
          'to' => $tok,
          'data' => $message = array(
              "message" => 'Shipping address has been added'
              
          ),
          'notification' => $notification
      );
          $headers = array(
              'Authorization: key='.$serverKey,
              'Content-type: Application/json'
          );
          $ch = curl_init();
          curl_setopt($ch, CURLOPT_URL, $url);
          curl_setopt($ch, CURLOPT_POST, true);
          curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
          curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
          curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
          curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
          curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
          $result = curl_exec($ch);

          curl_close($ch);
       
      
      
      
  // DB::insert('insert into notification (type,message,driver_id,datetime,read_unreadtype) values(?,?,?,?,?)',["Shipping address added","load_id,$load",$driver_id,"0",0]);
  DB::table('notifications')->insert([
    'type' =>  'Shipping address added',
    'message' => $load,
    'driver_id' =>  $driver_id,
    'datetime' =>  0,
    'read_unreadtype' => 0,
   
]);
      
      
       $msg=" Shipping Add Successfully..";
       
       
       
         $loadcontener = DB::table('loadconteners')->where('id',$load)->first();
   $data = [];
   if(!empty($loadcontener->job_id)){
       $data = array(
              'id'=>$loadcontener->id,
              'loadnumber'=>$loadcontener->loadnumber,
              'car_collection_data'=>getCarCollectionData1($loadcontener->job_id),
              'load_title'=>$loadcontener->load_title,
           );
   }else{
       $data = array(
              'id'=>$loadcontener->id,
              'loadnumber'=>$loadcontener->loadnumber,
              'car_collection_data'=>getCarCollectionData1($loadcontener->car_delivery_id),
              'load_title'=>$loadcontener->load_title,
          );
   }
   
  $jobid= getCarCollectionData1($loadcontener->job_id);
  
  
  // working lefttt*******************************
  //sending email to all users//
  
  
  $alluserss= $loadcontener->job_id;
 
  $allusers=explode(',',$alluserss);
   
  foreach($allusers as $customerjobid){
      

      $gett=DB::select("select *from  jobs where id=?",[$customerjobid]);
     
      $mailcuss=DB::select("select *from  users where id=?",[$gett[0]->user_id]);
    
      $mailcus1=$mailcuss[0]->email_address;
      
      $mailarray=explode(',',$mailcus1);
      
      if(count($mailarray) > 0){
          
          $mailcc=$mailarray;
          $mailcus=$mailarray[0];
          
      }
      else{
          $mailcc=$mailcus1;
          $mailcus=$mailcus1;  
      }
      
      
     
      
      
      /////
      
       $podlink = DB::select('select * from  jobs where id=?',[$customerjobid]);
       $collected = DB::select('select * from  collecteds where job_id=?',[$customerjobid]);
       $driver = DB::select('select * from drivers where id=?',[$collected[0]->driver_id]);
       $dentreport = DB::select('select * from dents where job_id=? and dent_status=?',[$collected[0]->job_id,0]);
        
       $deliveredjob = DB::select('select * from  singlejobdelivereds where job_id=? and job_status=?',[$customerjobid,0]);
    
       $jobdetails = DB::select('select * from completejobs where job_id=? and status=?',[$customerjobid,0]);
       $customerdetails = DB::select('select * from  users where id=?',[$podlink[0]->user_id]);
        
       ///send mail to customer//
   $invoices=DB::select("select *from invoices where job_id=?",[$customerjobid]); 
   $data = array(
             'podlink'=>$podlink,
             'driver'=>$driver,
             'dentreport'=>$dentreport,
             'driver'=>$driver,
             'deliveredjob'=>$deliveredjob,
             'jobdetails'=>$jobdetails,
             'collected'=>$collected,
             'customerdetails'=>$customerdetails,
             'emailto'=>$mailcus,
             'invoices'=>$invoices,
             'mailcc'=>$mailcc,
         );
   
      //code for pdf download//
  // $pdf = PDF::loadView('poc', $data);
   
  
  //return $pdf->download('poc.pdf');
  
  
  
        $pdf = PDF::loadView('poc', $data);

              
        Mail::send('invoice_mail', $data, function ($message) use ($data,$pdf) {
          $message->to($data["emailto"])
          
           ->subject("POC Report")
           
           ->attachData($pdf->output(), "poc.pdf");
         $message->from('info@eirtransapp.com','POC Report');
         $message->cc($data["mailcc"]);
          
          });   
     
      
      
 
 
  }//endalluseremail
  
 
 
  $users = DB::select('select * from carsfordelivery where driver_id=? and loadcontener_id=?',[$driver_id,$load]);
  
              $cusemail = DB::select('select * from  mails where id=?',[1]);

              $cusemail1 = DB::select('select * from  mails where id=?',[2]);
             
              $carsfordelivery = DB::select('select * from  carsfordelivery where loadcontener_id=?',[$load]);
              if(!empty($carsfordelivery)){
                $carsfordelivery = DB::select('select * from  carsfordelivery where loadcontener_id=?',[$load]);
    
                $emailto=$cusemail[0]->mail;

                $emailto1=$cusemail1[0]->mail;

                $em1 = explode(',', $emailto1);

                $em = explode(',', $emailto);
                $data = array(
                    'jobs'=>$jobid,
                    'carsfordelivery'=>$carsfordelivery,
                    'emailto'=>$em,
                    'shippingref'=>$carsfordelivery->shippingref
                       );
                          Mail::send('collected_email', $data, function($message) use ($data) {
                           $message->to($data['emailto'], 'Customs Report')->subject
                           ($data['shippingref']);
                           $message->from('info@eirtransapp.com','Customs Report');
                          // $message->cc(['accounts@eirtrans.ie','customs@eirtrans.ie','collections@eirtrans.ie']);
                        });
                        
             
                        
             $data = array(
                    'jobs'=>$jobid,
                    'carsfordelivery'=>$carsfordelivery,
                    'emailto'=>$em1
                    //'emailto'=>'customs@eirtrans.ie'
                       );
                          Mail::send('collected_info_email', $data, function($message) use ($data) {
                           $message->to($data['emailto'], 'UK Load Report')->subject
                              ('UK Load Report');
                           $message->from('info@eirtransapp.com','UK Load Report');
                           //$message->cc(['accounts@eirtrans.ie','customs@eirtrans.ie','collections@eirtrans.ie']);
                           
                        });
                 }
         
       
    $request->session()->flash('msg', $msg);
      return redirect()->route('notification_details');
  
      
  }



  
    

}
