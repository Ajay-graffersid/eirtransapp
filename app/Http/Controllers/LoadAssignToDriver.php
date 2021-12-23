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

class LoadAssignToDriver extends Controller
{
    
  
    public function index($date='')  {
          
            
       
           if($date=='1')
          {
          $datee = ''; 
         $load = DB::select('select * from loadconteners where  status=?  and job_id !=? ',[0,'']);
         $driver= DB::select('select *from drivers where driver_status=?',[0]); 
          $bt=1;
          }
  
          elseif ($date=='2')
          {
         $datee = '';  
         $load = DB::select('select * from loadconteners where  status=? and job_id !=? ',[0,'']);
            $driver= DB::select('select *from drivers where driver_status=?',[0]);
          $bt=2;
          }
          else
           {
            $bt=1;
         $datee = $date;
         $load = DB::select('select * from loadconteners where  status=?  and job_id != ?',[0,'']);
            $driver= DB::select('select *from drivers where driver_status=?',[0]);
           } 
        
      
         
  
       return view('loadassigntodriver.index',['loads'=>$load,'drivers'=>$driver,'searchdate'=>$datee,'buttontype'=>$bt]);      
       
       
     
        }

           
       public function loadassign(Request $request)  {
//   *************** this table use in this function and work like this*******************

         // loadconteners  set status 1 
         //loadassigns     fil this table
        //  jobs       set load_status 1
        // notifications   fill 

   //  *************** this table use in this function and work like this*******************
         $loadcontenerid= $request->input('loadcontener_id');

         // print_r($loadcontenerid);die;

         $driverid= $request->input('driver_id');

         $d= $request->input('d');          
          
         $m= $request->input('m');
         $y= $request->input('y');
         
           $date=$y.'-'.$m.'-'.$d;   
         
     
          
          $maindata=explode('.',$loadcontenerid);
         $loadcont_id=$maindata[0];
       
           if(!empty($maindata[1]))
           {
               $dragdriverid=$maindata[1];
               $dragday=$maindata[2];
               $dragmonth=$maindata[3];
               $dragyear=$maindata[4];
     
          
           }
       
      
       ///remove from loader//
         
         
            if(!empty($dragyear))
            {
            $dragdate=$dragyear.'-'.$dragmonth.'-'.$dragday;         
         
        
           $loadassign=DB::table('loadassigns')
           ->where('date',$dragdate)
           ->where('driver_id',$dragdriverid)->first();
          
           if(!empty($loadassign)) 
           {
            $loadid=$loadassign->loadcontener_id; 
            
            $loadassigns_id=$loadassign->id;
             $fid=explode(',',$loadid);
            $multi= array_diff($fid, [$loadcont_id] );
           
             $multiload=implode(',',$multi);
             
            
            
          
          
       DB::update('update loadassigns set loadcontener_id = ? where id = ?',[$multiload,$loadassigns_id]);
         
         
         //update jobcustomer//
         
       DB::update('update loadconteners set  status = ? where id = ?',['0',$loadcont_id]);
         
         
         }
         
        }     //end if($dragyear)
           
         
         
         //end remove
         
         
          
           $date=  date('Y-m-d', strtotime($date)); 

           $loadassign=DB::table('loadassigns')->where('date',$date)->where('driver_id',$driverid)->first();
      
      //   $checkload=DB::select('select *from loadsassign where   date=? and driverid=?',[$date,$driverid]);
        
     
        
        if($loadassign)
         {
             
            $loadid=$loadassign->loadcontener_id; 
            
            $loadassigns_id=$loadassign->id;
        
            if(!empty($loadid))
            {
            $multiload=$ml.','.$loadcont_id;
            }
            else
            {
             $multiload=  $loadcont_id; 
            }
          
            DB::update('update loadconteners set status = ? where id = ?',['1',$loadcont_id]);
          
           DB::update('update loadassigns set loadcontener_id = ? where id = ?',[$multiload,$loadassigns_id]);
        
             /////ubdate load ststus///
             
             $expl=explode(',' ,$multiload);
             
             foreach($expl as $exx){
                 
                 //get job//
                 
            // $kk   =  DB::select("select *from loadcontener where id=?",[$exx]);
            $kk= DB::table('loadconteners')->where('id',$exx)->first();
            
             $jobs_id =  $kk->job_id;
             
              $jj = explode(',',$jobs_id);
              
              foreach($jj as $j){              
                  
             DB::update('update jobs set load_status = ? where id = ?',[1,$j]);  

              }                                   
                 
             }
            
             
             
             
             //end
        
        
        
       
           $drivertoken=DB::table('drivers')->where('id',$driverid)->first();
                
             
         //   DB::insert('insert into notification (type,message,driver_id,datetime,read_unreadtype) values(?,?,?,?,?)',["New Load assign  successfully.","load_id,$jobcustomerid",$driverid,"0",0]);
              
         DB::table('notifications')->insert([
            'type' =>  'New Load assign  successfully',
            'message' =>  $loadcont_id,
            'driver_id' =>  $driverid,
            'datetime' =>  0,
            'read_unreadtype' => 0,
           
        ]);
           $dtok=$drivertoken->token;
            
              $serverKey = 'AAAAzVjTTD4:APA91bFd_f1mJCx-XZv6uZ3A37vKts4Ds6GmE1TZLM9xJ7-kOIGURhEdBgKcByTzYg98hO6IDsYuoZgPJWS4ZMUi2ORK65QxfYhTQk_WvdggbDhbWnHi6qoBDovhOsnqFQDLZf89cpsE';
	    $url = 'https://fcm.googleapis.com/fcm/send';
            
            
         	$tok = $dtok;
         	
         	 $jb='Load Assign on date '.$date;
		        $notification = array('title' =>"New Load Assign" , 'text' => $jb);
				$fields = array(
				    'to' => $tok,
				    'data' => $message = array(
				        "message" => 'load assign'
				        
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
                
            
            
              return  $msg="Load assign  successfully.";
        
        
         }
         
        
         else
         {
         
      //   DB::insert('insert into loadsassign (jobcustomerid,driverid,date) values(?,?,?)',[$jobcustomerid,$driverid,$date]);
      
        DB::table('loadassigns')->insert([
         'driver_id' =>  $driverid,
         'loadcontener_id' =>  $loadcont_id,
         'date' =>  $date,
       
        
     ]);
      
           /////ubdate load ststus///
             
           
                 
            // $kk   =  DB::select("select *from loadcontener where id=?",[$jobcustomerid]);
            $kk   =  DB::table('loadconteners')->where('id',$loadcont_id)->first();
            
             $job_id =  $kk->job_id;
             
              $jj = explode(',',$job_id);
              
              foreach($jj as $j){
                  
             DB::update('update jobs set load_status = ? where id = ?',[1,$j]);  
                  
              }
             
           
             
             //end
        
        
      
      
         DB::update('update loadconteners set status = ? where id = ?',['1',$loadcont_id]);
         DB::update('update loadconteners set load_date = ? where id = ?',[$date,$loadcont_id]);
         
         // $drivertoken=DB::select('select * from driver where id=?',[$driverid]);
         $drivertoken=DB::table('drivers')->where('id',$driverid)->first();

         DB::table('notifications')->insert([
            'type' =>  'New Load assign  successfully',
            'message' =>  $loadcont_id,
            'driver_id' =>  $driverid,
            'datetime' =>  0,
            'read_unreadtype' => 0,
           
        ]);
         
            
         // DB::insert('insert into notification (type,message,driver_id,datetime,read_unreadtype) values(?,?,?,?,?)',["New Load assign  successfully.","load_id,$jobcustomerid",$driverid,"0",0]);

           $serverKey = 'AAAAzVjTTD4:APA91bFd_f1mJCx-XZv6uZ3A37vKts4Ds6GmE1TZLM9xJ7-kOIGURhEdBgKcByTzYg98hO6IDsYuoZgPJWS4ZMUi2ORK65QxfYhTQk_WvdggbDhbWnHi6qoBDovhOsnqFQDLZf89cpsE';
	    $url = 'https://fcm.googleapis.com/fcm/send';
          
           $dtok=$drivertoken->token;
            
            $jb='Load Assign on date'.$date;
         	$tok = $dtok;
		        $notification = array('title' =>"New Load Assign" , 'text' =>$jb );
				$fields = array(
				    'to' => $tok,
				    'data' => $message = array(
				        "message" => 'load assign'
				        
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
         
         
         
          
       return   $msg=" Load assign  successfully..";
    
         }
   
      }



      public function removeload(Request $request,$id,$driverid,$date)
      {

//   *************** this table use in this function and work like this*******************

         // loadconteners  set status 0 
         //loadassigns     remove data this table
        //  jobs       set load_status 0
        // notifications   fill 

   //  *************** this table use in this function and work like this*******************


           $loadassigns_data=DB::select('select *from loadassigns where   date=? and driver_id=?',[$date,$driverid]);
          
           if(!empty($loadassigns_data)) 
           {
            $ml=$loadassigns_data[0]->loadcontener_id; 
            
            
            
            $loadassigns_id=$loadassigns_data[0]->id;
            $fid=explode(',',$ml);
            if(count($fid)==1)
            {
              
             
              DB::delete('delete from loadassigns where   date=? and driver_id=?',[$date,$driverid]);  
              
                
            }
            else{
                
            
            $multi= array_diff($fid, [$id] ) ;
           
             $multiload=implode(',',$multi);
             
             DB::update('update loadassigns set loadcontener_id = ? where id = ?',[$multiload,$idd]);
         
            }
         //update jobcustomer//
         
         DB::update('update loadconteners set  status = ? where id = ?',['0',$id]);
         
         
         
             /////ubdate load ststus///
          
                 
            $kk   =  DB::select("select *from loadconteners where id=?",[$id]);
            
             $job_id =  $kk[0]->job_id;
             
              $jj = explode(',',$job_id);
              
              foreach($jj as $j){
                  
             DB::update('update jobs set load_status = ? where id = ?',[0,$j]);  
                  
              }
                    
             //end
        
        
         
         
         
        
        //DB::delete("delete from loadsassign where jobcustomerid=?",[$id]);
          
          $drivertoken=DB::select('select * from drivers where id=?',[$driverid]);

              DB::table('notifications')->insert([
            'type' =>  'Load Removed  successfully',
            'message' => 'Load Removed  successfully',
            'driver_id' =>  $driverid,
            'datetime' =>  0,
            'read_unreadtype' => 0,
           
        ]);
             
             
          //  DB::insert('insert into notification (type,message,driver_id,datetime,read_unreadtype) values(?,?,?,?,?)',["Load Removed  successfully.","Load Removed  successfully.",$driverid,"0",0]);

            
           $dtok=$drivertoken[0]->token;
            
              $serverKey = 'AAAAzVjTTD4:APA91bFd_f1mJCx-XZv6uZ3A37vKts4Ds6GmE1TZLM9xJ7-kOIGURhEdBgKcByTzYg98hO6IDsYuoZgPJWS4ZMUi2ORK65QxfYhTQk_WvdggbDhbWnHi6qoBDovhOsnqFQDLZf89cpsE';
	    $url = 'https://fcm.googleapis.com/fcm/send';
            
            
         	$tok = $dtok;
         	
         	 $jb='Load Removed of assign date '.$date;
		        $notification = array('title' =>"Load remved" , 'text' => $jb);
				$fields = array(
				    'to' => $tok,
				    'data' => $message = array(
				        "message" => 'load assign'
				        
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
          
          
          
         $msg="Load removed successfully.";
         $request->session()->flash('msg', $msg);
          return redirect()->route('loadassigntodriver');
         
           }
      }




      public function viewassignload(Request $request)
      {
            // echo 'ajjjjjj';die;
        
          $loadid= $request->input('loadid');
            $driverid= $request->input('driverid');
            $d= $request->input('d');
            $m= $request->input('m');
            $y= $request->input('y');
            
            $date=$d.'-'.$m.'-'.$y;
            
             
        // $catchload=DB::table('loadconteners')
        // ->select('loadconteners.*','carsfordelivery.delivery')
        // ->leftJoin('carsfordelivery', 'carsfordelivery.loadcontener_id', '=', 'loadconteners.id')        
        // ->where('loadconteners.id', $loadid)->get();
       
       
        $catchload=DB::select(' SELECT loadconteners.*, carsfordelivery.delivery
        FROM loadconteners
        LEFT JOIN carsfordelivery ON loadconteners.id = carsfordelivery.loadcontener_id
        where loadconteners.id=?',[$loadid]);
     //
     // new query
   
   //   SELECT loadcontener.*, carsfordelivery.delivery
   // FROM loadcontener
   // LEFT JOIN carsfordelivery ON loadcontener.id = carsfordelivery.load_id
   // where loadcontener.id=? ;
    //      
           if(!empty($catchload[0]->job_id)){
                            $ml=$catchload[0]->job_id;  
                       }else{
                           $ml=$catchload[0]->car_delivery_id; 
               }
          
               
                $fid=explode(',',$ml);
                
                
                $userData=[];
                foreach($fid as $f)
                {

                  $job=Job::where('id',$f)->first();
              
              
                   array_push($userData, [
           'customer'   => $job->user->name,
           'make_model' => $job->make_model,
          'reg' => $job->reg,
           'collection_address' => $job->collection_address,
           'id' => $job->id,
           'lane' => $job->lane->lane_number,
            'jobnumber' => $job->job_number,
            'st' => $job->status,
            'delivery'=>$job->delivery_address,
       ]);
    
                
            } 
            
            
            
           $shipinginfo = DB::table('carsfordelivery')->where('loadcontener_id',$loadid)->first();
           if(!empty($shipinginfo))
           {
           $customer=$shipinginfo->customer;
           $carrier=$shipinginfo->carrier;
           $route=$shipinginfo->route;
           $registration=$shipinginfo->registration;
           $dateoftravel=$shipinginfo->dateoftravel;
           $day=$shipinginfo->day;
           $time=$shipinginfo->time;
            $lenght=$shipinginfo->lenght;
             $drivername=$shipinginfo->drivername;
              $contents=$shipinginfo->contents;
              $shippingref=$shipinginfo->shippingref;
               $mrnnumber=$shipinginfo->mrn_number;
               $pbnnumber=$shipinginfo->pbn_number;
               $cusref=$shipinginfo->cusref;
               $imo=$shipinginfo->imo;
               $eta=$shipinginfo->eta;
               $delivery=$shipinginfo->delivery;
               $btn=1;
           }
           else
           {
          $customer="";
           $carrier="";
           $route="";
           $registration="";
           $dateoftravel="";
           $day="";
           $time="";
            $lenght="";
             $drivername="";
              $contents="";
              $shippingref="";
              $mrnnumber="";
              $pbnnumber="";
              $cusref="";
              $imo="";
              $eta="";
              $btn=0;
              $delivery="";
               
           }
   
     
           return json_encode(array('data'=>$userData,'driverid'=>$driverid,'loadid'=>$loadid,'customer'=>$customer,'carrier'=>$carrier,'route'=>$route,'registration'=>$registration,'dateoftravel'=>$dateoftravel,'day'=>$day,'time'=>$time,'drivername'=>$drivername,'contents'=>$contents,'shippingref'=>$shippingref,'mrnnumber'=>$mrnnumber,'lengt'=>$lenght,'cusref'=>$cusref,'imo'=>$imo,'eta'=>$eta,'delivery'=>$delivery,'btn'=>$btn,'pbnnumber'=>$pbnnumber));
        
        
      
      
      }


      public function  pushingajob(Request $request)
      {
            //  echo 'ajay';die;
            // echo '<pre>';print_r($_POST);die;
           
             $jobid=$request->input('jobid');
             $drivid=$request->input('drivid');
             $loadid=$request->input('loadid');
             $loadinfo=DB::select("select *from loadconteners where id=?",[$loadid]);
             
               $users = DB::select('select * from jobs where id=?',[$jobid]); 
                    
              
             
             
            
             $ml=$loadinfo[0]->job_id; 
            
              $fid=explode(',',$ml);
              
               array_push($fid,$jobid);
              
              //  $multi= array_diff($fid, [$carcollection] ) ;
               
               $multiload=implode(',',$fid);
                
              
              
               DB::update('update loadconteners set job_id = ? where id = ?',[$multiload,$loadinfo[0]->id]);
             
             
               
              
            DB::update('update jobs set  status=? where id = ?',[1,$jobid]);
                DB::update('update jobs set  load_status=? where id = ?',[1,$jobid]);
           
              $jobinfo=DB::select("select *from jobs where id=?",[$jobid]);
            
            
        
             
              $drivertoken=DB::select('select * from drivers where id=?',[$drivid]);
              // echo '<pre>';print_r($drivertoken);die;
            
              $serverKey = 'AAAAzVjTTD4:APA91bFd_f1mJCx-XZv6uZ3A37vKts4Ds6GmE1TZLM9xJ7-kOIGURhEdBgKcByTzYg98hO6IDsYuoZgPJWS4ZMUi2ORK65QxfYhTQk_WvdggbDhbWnHi6qoBDovhOsnqFQDLZf89cpsE';
          $url = 'https://fcm.googleapis.com/fcm/send';
              
             $dtok=$drivertoken[0]->token;
                
             $jobnumber=$jobinfo[0]->job_number;
             $loadnumber=$loadinfo[0]->loadnumber;
             $loadtitle=$loadinfo[0]->load_title;
             
               $jb='One  Job '.' '.$jobnumber .' '.'added'.' '.'into load'.' '.$loadnumber.' '.$loadtitle;
               $tok = $dtok;
                $notification = array('title' =>"One Job Added" , 'text' => $jb, 'driverid' => $drivid, 'jobid' => $jobid);
            $fields = array(
                'to' => $tok,
                'data' => $message = array(
                    "message" => 'load assign'
                    
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
             return  $msg="Job added success!"; 
      
         
      
       }
       


       public function getCarCollectionData1($car_id){
        $ids = explode(',',$car_id);
        
     
        
        foreach($ids as $job_id){
            $cheklan= DB::select("select *from jobs where id=?",[$job_id]);
            if($cheklan[0]->lane_id==null){
                // $jobs[] = DB::table('cardetails')
                //       ->select('cardetails.*','jobcustomer.customer_name','jobcustomer.additional_comment')
                //       ->join('jobcustomer','cardetails.customer','=','jobcustomer.id')
                //       ->where('cardetails.id',$job_id)
                //       ->first();
                $jobs[]=Job::where('id',$job_id)->first();
            }else{
                // $jobs[] = DB::table('cardetails')
                //       ->select('cardetails.*','jobcustomer.customer_name','lane.lane_number','jobcustomer.additional_comment')
                //       ->join('jobcustomer','cardetails.customer','=','jobcustomer.id')
                //       ->join('lane','cardetails.lan','=','lane.id')
                //       ->where('cardetails.id',$job_id)
                //       ->first();
                      $jobs[]=Job::where('id',$job_id)->first();
            }
            
        }
        return $jobs;
    }
      
    
    public function savesipingd(Request $request)  {
  
      $driver_id= $request->input('driver_id');
  
     $dname = DB::select('select * from driver  where id=?',[$driver_id]);
     
      if(!empty($dname))
      {
      $drivername=$dname[0]->name;
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
    $drivername=  $drivername;
    $contents=  $request->input('contents');
    $shippingref= $request->input('shippingref');
    $customer= $request->input('customer');
     
      $cusref= $request->input('cusref');
    $mrnnumber= $request->input('mrnnumber');
    $pbnnumber= $request->input('pbnnumber');
    
    $imo= $request->input('imo');
    
    $eta= $request->input('eta');
    
  

  
   $chk= DB::select('select *from carsfordelivery where loadcontener_id=?',[$load]);
   
      if(empty($chk))
        {
          
        // DB::insert('insert into carsfordelivery (driver_id,load_id,delivery,carrier,route,registration,dateoftravel,day,time,lenght,drivername,contents,shippingref,customer,cusref,mrn_number,pbn_number,imo,eta) values(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)',[$driver_id,$load,$delivery,$carrier,$route,$registration,$dateoftravel,$day,$time,$lenght,$drivername,$contents,$shippingref,$customer,$cusref,$mrnnumber,$pbnnumber,$imo,$eta]);
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
      
      }
        else
        {
        DB::update('update carsfordelivery set  carrier = ?,cusref = ?, route = ?,registration=?,dateoftravel=?,day=?,time=?,lenght=?,drivername=?,contents=? ,shippingref=?,customer=?,mrn_number=?,pbn_number=? ,imo=?,eta=? where load_id = ?',[$carrier,$cusref,$route,$registration,$dateoftravel,$day,$time,$lenght,$drivername,$contents,$shippingref,$customer,$mrnnumber,$pbnnumber,$imo,$eta,$load]);          
        $result = DB::table('radcheck')
        ->where('loadcontener_id', $load)
        ->update(
          [
            // 'driver_id' =>$driver_id, 
            // 'loadcontener_id' =>$load,
            // 'delivery' =>$delivery,
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
      
      }
     
     $drivertoken=DB::select('select * from drivers where id=?',[$driver_id]);
      
       $loadinfo=DB::select("select *from loadconteners where id=?",[$load]);
        
        $loadtitle=$loadinfo[0]->load_title;
        $loadnumber=$loadinfo[0]->loadnumber;
      
       
        DB::insert('insert into notification (type,message,driver_id,datetime,read_unreadtype) values(?,?,?,?,?)',["Shipping address added","load_id,$load",$driver_id,"0",0]);
   
       
       
      $serverKey = 'AAAAzVjTTD4:APA91bFd_f1mJCx-XZv6uZ3A37vKts4Ds6GmE1TZLM9xJ7-kOIGURhEdBgKcByTzYg98hO6IDsYuoZgPJWS4ZMUi2ORK65QxfYhTQk_WvdggbDhbWnHi6qoBDovhOsnqFQDLZf89cpsE';
     $url = 'https://fcm.googleapis.com/fcm/send';
         
          $dtok=$drivertoken[0]->token;
           
          $jb='Shipping address has been added  for the Load'.' '.$loadnumber.''.$loadtitle;
          $tok = $dtok;
           $notification = array('title' =>"" , 'text' => $jb, 'driverid' => $driver_id, 'loadid' => $load);
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
    
     
     
     
     
     
      $loadcontener = DB::table('loadconteners')->where('id',$load)->first();
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
    
   $jobid= $this->getCarCollectionData1($loadcontener->job_id);
   
   
   
   //sending email to all users//
   
   
   $job_id= $loadcontener->job_id;
  
   $jobs=explode(',',$job_id);
    
   foreach($jobs as $job){
 
      //  $gett=DB::select("select *from  jobs where id=?",[$job]);
          $gett_job=DB::table('jobs')->where('id',$job)->first();
      
      //  $mailcuss=DB::select("select *from  users where id=?",[$gett_job->user_id]);
        $mailcuss=DB::table('users')->where('id',$gett_job->user_id)->first();

       $mailcus=$mailcuss->email_address;
       
       $mailarray=explode(',',$mailcus);
       if(count($mailarray)>0){
          $mailcus=$mailarray[0];
          $ccc=$mailarray;
       }else{
          $mailcus =$mailcuss->email;
          $ccc= $mailcuss[0]->email;  
       }
       
        // $podlink = DB::select('select * from  jobs where id=?',[$customerjobid]); 
        $podlink=DB::table('jobs')->where('id',$job)->first();
        // $collected = DB::select('select * from  collected where cardetails=?',[$customerjobid]);
        // $collected = DB::select('select * from  collected where job_id=?',[$customerjobid]);
        $collected = DB::select('select * from  collected where job_id=?',[$job]);
        // $collected=DB::table('collected')->where('job_id',$job)->first();
       
         if(count($collected)>0){
          //  $driver = DB::select('select * from driver where id=?',[$collected[0]->driverid]);   
           $driver = DB::select('select * from drivers where id=?',[$collected[0]->driver_id]);   
         }
        
 // ***************left to work********************************************************************************************
        
        
        
        $dentreport = DB::select('select * from dent where car_collection_id=? and dent_status=?',[$collected[0]->car_collection_id,0]);
 
       
        $jobdetails = DB::select('select * from completejobs where car_collection_id=? and status=?',[$customerjobid,0]);
        
        $customerdetails = DB::select('select * from  jobcustomer where id=?',[$podlink[0]->customer]);
         
        $deliveredjob = DB::select('select * from  singlejobdelivered where job_id=? and job_status=?',[$customerjobid,0]);
         
         
       
     
         
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
             'ccc'=>$ccc,
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
         $message->cc($data["ccc"]);
       
           
           });
      
      
       
       
       ///
    
  
   }//endalluseremail
   
   
   
   
   $users = DB::select('select * from carsfordelivery where driver_id=? and load_id=?',[$driver_id,$load]);
               $cusemail = DB::select('select * from  mail where id=?',[1]);
              
               $cusemail1 = DB::select('select * from  mail where id=?',[2]);
             
               // SELECT carsfordelivery.*, loadcontener.id,loadcontener.loadnumber
               // FROM loadcontener
               // RIGHT  JOIN carsfordelivery ON loadcontener.id = carsfordelivery.load_id
               // where load_id=?
              
 
               // $carsfordelivery = DB::select('select * from  carsfordelivery where load_id=?',[$load]);
               $carsfordelivery = DB::select('SELECT carsfordelivery.*, loadcontener.id,loadcontener.loadnumber
               FROM loadcontener
               RIGHT  JOIN carsfordelivery ON loadcontener.id = carsfordelivery.load_id
               where load_id=?',[$load]);

               if(!empty($carsfordelivery)){
                 // $carsfordelivery = DB::select('select * from  carsfordelivery where load_id=?',[$load]);
                 $carsfordelivery = DB::select('SELECT carsfordelivery.*, loadcontener.id,loadcontener.loadnumber
                 FROM loadcontener
                 RIGHT  JOIN carsfordelivery ON loadcontener.id = carsfordelivery.load_id
                 where load_id=?',[$load]);

                $emailto=$cusemail[0]->mail;

                $emailto1=$cusemail1[0]->mail;

                $em=explode(',',$emailto);   //customs@eirtrans.ie,collections@eirtrans.ie
                $em1=explode(',',$emailto1);  //accounts@eirtrans.ie,collections@eirtrans.ie
                 
                

               $data = array(
                     'jobs'=>$jobid,
                     'carsfordelivery'=>$carsfordelivery,
                     'emailto'=>$em1,
                     'loadnumber'=>$carsfordelivery[0]->loadnumber

                     //'emailto'=>'customs@eirtrans.ie'
                        );
                           Mail::send('collected_info_email', $data, function($message) use ($data) {
                            $message->to($data['emailto'], 'UK Load Report')->subject
                               // ('Customs  Report');
                               ($data['loadnumber']);
                            $message->from('info@eirtransapp.com','UK Load Report');
                            //$message->cc(['accounts@eirtrans.ie','customs@eirtrans.ie','collections@eirtrans.ie']);
                            
                         });
                  
          



                 $data = array(
                     'jobs'=>$jobid,
                     'carsfordelivery'=>$carsfordelivery,
                     'emailto'=>$em,
                     'shippingref'=>$carsfordelivery[0]->shippingref
                        );
                           Mail::send('collected_email', $data, function($message) use ($data) {
                            $message->to($data['emailto'], 'Customs Report')->subject
                               // ('Customs Report');
                               ($data['shippingref']);
                            $message->from('info@eirtransapp.com','Customs Report');
                           // $message->cc(['accounts@eirtrans.ie','customs@eirtrans.ie','collections@eirtrans.ie']);
                         });
                  }
          
 return redirect()->route('planner');
       
 }



 public function getpdfbyload($id)
 {
  
    $loadcontener = DB::table('loadconteners')->where('id',$id)->first();
   $data = [];
   if(!empty($loadcontener->job_id)){
       $data = array(
              'id'=>$loadcontener->id,
              'loadnumber'=>$loadcontener->loadnumber,
              'job_data'=>$this->getCarCollectionData1($loadcontener->job_id),
              'load_title'=>$loadcontener->load_title,
           );
   }else{
       $data = array(
              'id'=>$users->id,
              'loadnumber'=>$loadcontener->loadnumber,
              'job_data'=>$this->getCarCollectionData1($loadcontener->car_delivery_id),
              'load_title'=>$loadcontener->load_title,
          );
   }
   
  $jobs= $this->getCarCollectionData1($loadcontener->job_id);
  // $users = DB::select('select * from carsfordelivery where load_id=?',[$id]);
  $carsfordelivery = DB::select('select * from  carsfordelivery where loadcontener_id=?',[$id]);
  if(!empty($carsfordelivery)){
      
   $carsfordelivery = DB::select('select * from  carsfordelivery where loadcontener_id=?',[$id]);
        
                  
   return view('loadassigntodriver.shiping_withjob_pdf',compact('jobs','carsfordelivery'));

  }
  
if(empty($carsfordelivery)){
    $carsfordelivery = DB::select('select * from  carsfordelivery where loadcontener_id=?',[$id]);
   return view('loadassigntodriver.shiping_withjob_pdf',compact('jobs','carsfordelivery'));

  }  
  
  
 
 }





 public function jobeditonplanner($id='')
  {
    $customers=User::role('Customer')->get(); 

    
    $lanes = Lane::get();
   
    $jobs = Job::find($id);
    
    $invoices = Invoice::where('job_id',$id)->get();
    

     
    return view('loadassigntodriver.edit_jobplanner',compact('customers','lanes','jobs','invoices'));
  }



  public function updateJobplanner(Request $request)
  {   
    // echo $request->lan;die;
   
    $job = Job::find($request->id);
    $job->job_number = $request->job_number;
    $job->user_id = $request->customer_id;
    $job->make_model = $request->make_model;
    //  $job->model = $request->model;
    $job->reg = $request->reg;
    $job->location = $request->location;
    $job->collection_address = $request->collection_address;
    $job->delivery_address = $request->delivery_address;
    $job->booking_date = $request->booking_date;
    // $job->lane_id = $request->lan;
    $job->relese_code = $request->relese_code;
    $job->eori = $request->eori;
    $job->commcode = $request->commcode;
    $job->weight = $request->weight;
    $job->curr = $request->curr;
    $job->value = $request->value;
    $job->shipimo = $request->shipimo;
    $job->eta = $request->eta;
    $job->bill_of_laden = $request->bill_of_laden;
    $job->description = $request->description;
    $job->inv_ref = $request->inv_ref;
    
    $job->rate = $request->rate;
   

    if ($job->save()) {
        
        
     $imagess= $request->file('inv_file'); 
       if(!empty($imagess))
      {
       
       
       foreach($imagess as $imagee){

                   	$imagenamee = rand('1111','9999').time().'.'.$imagee->getClientOriginalExtension();
			        $destinationPath = public_path('uploads/new-inv');
			        
			       
			        $imagee->move($destinationPath, $imagenamee);

			          
                     $invoice = new Invoice;
                     $invoice->job_id = $job->id;
                     $invoice->inv_file = $imagenamee;
                     $invoice->save();
            
       }       
	   } 

      $msg="Job updated successfully..";
          $request->session()->flash('msg', $msg);
      
        return redirect()->route('loadassigntodriver');
             
    }else{
      $msg_error="Something went wrong!";
        $request->session()->flash('msg_error', $msg_error);
        return redirect('jobeditonplanner'.'/'.$request->id);
    }
  }




  public function  deljob(Request $request)
  {
        //  echo '<pre>';print_r($_POST);die;
//  ********************* working on this function*******************      
    // remove selected job_id from loadconteners
    //  set jobs table status 3 or 0
    //  set jobs load_status 1 or 0

//  ********************* working on this function*******************      
         
         $loadid=$request->input('loadid');
        
         $jobid=$request->input('jobid');
         $driverid=$request->input('driverid');
         
         $d= $request->input('d');
         $m= $request->input('m');
         $y= $request->input('y');
         
         $date=$d.'-'.$m.'-'.$y;
          
          
          
         $hold=DB::select('select * from jobs where id=?',[$jobid]);
         
         if($hold[0]->status == 1){         
           
         
         $loadinfo=DB::select("select *from loadconteners where id=?",[$loadid]);
          
         
         $catchload=DB::select('select *from loadconteners where  id=?',[$loadid]);
          
         $ml=$catchload[0]->job_id; 
          
         $fid=explode(',',$ml);
        
         
         $multi= array_diff($fid, [$jobid] ) ;
         $multiload=implode(',',$multi);
         DB::update('update loadconteners set job_id = ? where id = ?',[$multiload,$catchload[0]->id]);
         
         
         //update jobcustomer//
         
         
         $ch=DB::select('select * from jobs where id=?',[$jobid]);
            
            if($ch[0]->bookingstatus == 3  &&  $ch[0]->load_status == 1){
              
              
               
               DB::update('update jobs set status = ? where id = ?',['3',$jobid]); 
                
               DB::update('update jobs set load_status = ? where id = ?',['1',$jobid]); 
            }
            
             else{
                 
                  DB::update('update jobs set status = ?  where id = ?',[0,$jobid]);
            
                  DB::update('update jobs set load_status = ?  where id = ?',[0,$jobid]);
             }
         
       
          
          //notification//
          
          $jobinfo=DB::select("select *from jobs where id=?",[$jobid]);
        
        
    
         
          $drivertoken=DB::select('select * from drivers where id=?',[$driverid]);
        
          $serverKey = 'AAAAzVjTTD4:APA91bFd_f1mJCx-XZv6uZ3A37vKts4Ds6GmE1TZLM9xJ7-kOIGURhEdBgKcByTzYg98hO6IDsYuoZgPJWS4ZMUi2ORK65QxfYhTQk_WvdggbDhbWnHi6qoBDovhOsnqFQDLZf89cpsE';
	    $url = 'https://fcm.googleapis.com/fcm/send';
          
         $dtok=$drivertoken[0]->token;
            
         $jobnumber=$jobinfo[0]->job_number;
         $loadnumber=$loadinfo[0]->loadnumber;
         $loadtitle=$loadinfo[0]->load_title;
         
           $jb='One  Job '.' '.$jobnumber .' '.'Removed'.' '.'from load'.' '.$loadnumber.' '.$loadtitle;
         	$tok = $dtok;
		        $notification = array('title' =>"One Job Remove" , 'text' => $jb, 'driverid' => $drivid, 'jobid' => $jobid);
				$fields = array(
				    'to' => $tok,
				    'data' => $message = array(
				     "message" => 'load remove'
				        
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
                   
          //DB::delete("delete from loadsassign where jobcustomerid=?",[$id]);
         $msg="Success Job Remove ";
         $request->session()->flash('msg', $msg);
         return response()->json([
                 'msg' => 'remove',
                 
             ]);
          
         }
  
   }



   public function  updatelannumber(Request $request)
   {
          // echo '<pe>';print_r($_POST);die;
          $lannumber=$request->input('lannumber');
          $jobid=$request->input('jobid');
          $drivid=$request->input('drivid');
          $jobnumber=$request->input('jobnumber');
           $old_lan=$request->input('oldlannum');
           if(empty($old_lan))
           {
               $old_lan='-'; 
           }
          
         
          
          DB::update('update jobs set  old_lan = ?, lane_id = ?,status=? where id = ?',[$old_lan,$lannumber,5,$jobid]);
          
           $drivertoken=DB::select('select * from drivers where id=?',[$drivid]);
         
           $serverKey = 'AAAAzVjTTD4:APA91bFd_f1mJCx-XZv6uZ3A37vKts4Ds6GmE1TZLM9xJ7-kOIGURhEdBgKcByTzYg98hO6IDsYuoZgPJWS4ZMUi2ORK65QxfYhTQk_WvdggbDhbWnHi6qoBDovhOsnqFQDLZf89cpsE';
       $url = 'https://fcm.googleapis.com/fcm/send';
           
            $dtok=$drivertoken[0]->token;
             
            $jb='Lane changed For Job Number'.$jobnumber;
            $tok = $dtok;
             $notification = array('title' =>"" , 'text' => $jb, 'driverid' => $drivid, 'jobid' => $jobid);
         $fields = array(
             'to' => $tok,
             'data' => $message = array(
                 "message" => 'load assign'
                 
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
            //  curl_setopt($ch, CURLOPT_POSTFIEviewassignloadLDS, json_encode($fields));
             $result = curl_exec($ch);
 
             curl_close($ch);
             
             
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
         
         
         
         
         
         return  $msg="Lane Updated Success!"; 
   
      
   
    }
 
       
     
     
     

   
   
   
   

}
