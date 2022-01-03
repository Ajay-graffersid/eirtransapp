<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class Apicontroller extends Controller
{

  public function getAllDrivers(Request $request) {
     
       $users = DB::table('drivers')->get();
      
       return response()->json([
            'message' => "all Drivers",
          'response' => 1,
          'data' =>$users,
     ]);
  }


    public function loginDriver(Request $request) {
      
	   $name= $request->input('name');
	   $pincode= $request->input('pincode');
	   $token= $request->input('token');
	   $ip= $request->input('ip');
	   $deviceid= $request->input('deviceid');
	   $type= $request->input('type');
	   $appversion= $request->input('appversion');
	   //18807fbb4bea34f1  18807fbb4bea34f1
       $users = DB::select('select * from drivers where name=? and pincode=?',[$name,$pincode]);
       
      if(count($users)>0) {
          
          $request->session()->put('login','1');
            //  return Session::get('login');
          if($users[0]->deviceid==$deviceid){
              $update = DB::update('update drivers set token = ? ,ip = ?,deviceid = ?,type = ?,appversion=? where pincode = ? AND name=?',[$token,$ip,$deviceid,$type,$appversion,$pincode,$name]);
		         return response()->json([
                "message" => "Login Successfully.",
                "response" => 1,
                "data" =>$users
                ], 200);
             
          }else{
          $update = DB::update('update drivers set token = ? ,ip = ?,deviceid = ?,type = ?,appversion=? where pincode = ? AND name=?',[$token,$ip,$deviceid,$type,$appversion,$pincode,$name]);
		         return response()->json([
                "message" => "Login Successfully.",
                "response" => 1,
                "data" =>$users
                ], 200);
          }
	   }
	   else
	   {
		  return response()->json([
        "message" => "Wrong login details . Please enter the correct login details.",
        "response" => 0
        
      ]);
	   }
   }

  public function getTurck(Request $request) {
     $date_time= $request->input('date_time');
     $update = DB::update('update trucks set truck_pickstatus = ? , date_time = ? where date_time != ?',[0,0,$date_time]); 
     $users = DB::select('select * from trucks where truck_status=0 && truck_pickstatus=0');
     return response()->json([
        "message" => "all truck details",
        "response" => 1,
        "data" =>$users
      ], 200);
   }

  public function getAllTruckAccesories() {
      $users = DB::select('select * from items');
     return response()->json([
        "message" => "all item details",
        "response" => 1,
        "data" =>$users
      ], 200);
     
  }

  public function createMorningAccepted(Request $request){
        //   print_r( $request->all());die;
        // print_r  ($request->input('selectitem'));die;
         $select=json_encode($request->input('selectitem'));
          
          $data=array(
            'general' =>$request->input('general'),
            'trailerid' => $request->input('trailerid'),
            'mileage'=>$request->input('mileage'),
            'truck_id'=>$request->input('truck_id'),
            'trucknumber'=>$request->input('trucknumber'),
            'datetime'=>$request->input('datetime'),
            'driver_id'=>$request->input('driver_id'),
            'nil'=>$request->input('nil'),
            'selectitem'=>$select,
        );
      
        $res= DB::table('morningtruckaccepts')->insertGetId($data); 
        //   $id= $res->id;
          return response()->json([
        "message" => "New morning  Successfully.",
        "response" => 1,
          "id"=>$res,
          'res'=>$data
      ], 200);
  }

  public function getDriverAssignToLoader(Request $request) {
   
     $date= $request->input('date');
     $driverid= $request->input('driverid');
     $users = DB::table('loadassigns')->where('driver_id',$driverid)->where('date','<=',$date)->get();
     $data = [];
     // print_r($users);
     // die();
     foreach($users as $userDataaa){
        $data[] = array(
                // 'assign_id'   => $userDataaa->id,
                // 'id'   => $userDataaa->driverid,
                // 'jobcustomerid'   => $userDataaa->jobcustomerid,
                'loads' => $this->getLoadsData($userDataaa->loadcontener_id) 
            );
     }
     
     return response()->json([
         
          'message' => "assigne to driver load contener",
        'response' => 1,
        'data' =>$data,
  
   ]);   
  }

  public function getJobsByLoadContainer(Request $request) {
     $id= $request->input('id');

     // echo $id;
     // die();
     $load = DB::table('loadconteners')->where('loadnumber',$id)->first();
     // print_r($load[0]->job_id);
     // die();
     $data = [];
     if(!empty($load->job_id)){
      //return "if part";
         $data = array(
                'id'=>$load->id,
                'loadnumber'=>$load->loadnumber,
                'car_collection_data'=>$this->getCarCollectionData($load->job_id),
                'load_title'=>$load->load_title,
             );
         
     }else{
      //return "else part";
         $data = array(
                'id'=>$load->id,
                'loadnumber'=>$load->loadnumber,
                'car_collection_data'=>$this->getCarCollectionData($load->car_delivery_id),
                'load_title'=>$load->load_title,
            );
         
     }
     
     return response()->json([
        "message" => "customer dtails",
        "response" => 1,
        "data" =>$data
      ], 200);
  }

  public function creatcrashreport(Request $request) {
   
       $driver_id= $request->input('driver_id');
     $type= $request->input('type');
     $customer_id= $request->input('customer_id');
     //$car_collection_id='225';
     $car_collection_id= $request->input('car_collection_id');
     $job_id= $request->input('job_id');
     $details= $request->input('details');
     $screenshot= $request->input('screenshot');
      
     $file = $request->file('image');
       $image_path= $file->getClientOriginalName();
       $image= $file->getClientOriginalName();
     
      //Move Uploaded File
      $destinationPath = 'uploads';
      $file->move($destinationPath,$file->getClientOriginalName());
      
       $cardetails = DB::select('select * from cardetails where id=?',[$car_collection_id]);
           
           if($cardetails[0]->status==1 && $cardetails[0]->lan_status==1){
                DB::insert('insert into dent (driver_id,type,customer_id,car_collection_id,job_id,details,image,image_path,screenshot,dent_status) values(?,?,?,?,?,?,?,?,?,?)',[$driver_id,$type,$customer_id,$car_collection_id,$job_id,$details,$image,$image_path,$screenshot,'if3']);
      
               return response()->json([
                "message" => "Collect Car Dent Successfully.",
                "response" => 1
                
              ], 200);    
              
                
           }else{
        //         echo "<pre>";
        //   print_r($cardetails[0]->status); 
        //   die;
                        
            DB::insert('insert into dent (driver_id,type,customer_id,car_collection_id,job_id,details,image,image_path,screenshot,dent_status) values(?,?,?,?,?,?,?,?,?,?)',[$driver_id,$type,$customer_id,$car_collection_id,$job_id,$details,$image,$image_path,$screenshot,'else3']);
          
           return response()->json([
            "message" => "Collect Car Dent Successfully.",
            "response" => 1
            
          ], 200);
         }
   }

  public function createmorningcheck(Request $request) {
     $driver_id= $request->input('driver_id');
     $truck_number= $request->input('truck_number');
     $currenttdate= $request->input('currenttdate');
     $mobile= $request->input('mobile');
     $drivername= $request->input('drivername');
     $truck_id= $request->input('id');
     $truck_pickstatus= $request->input('truck_pickstatus');
     
     $update = DB::update('update truck set date_time = ? ,truck_pickstatus = ? where id = ?',[$currenttdate,$truck_pickstatus,$truck_id]); 
      
      DB::insert('insert into todaymorningcheck (driver_id,truck_number,currenttdate,mobile,drivername) values(?,?,?,?,?)',[$driver_id,$truck_number,$currenttdate,$mobile,$drivername]);
      
      $msg="Today Morningcheck successfully";
     return json_encode($msg) ;  
     
   }

    public function allToolType() {
      $users = DB::select('select * from tools');
     return response()->json([
        "message" => "all tool details",
        "response" => 1,
        "data" =>$users
      ], 200);
    }

   public function getLoadsData($load_id)
    {
          $loads = explode(',',$load_id);
          $ldate = date('Y-m-d');
          $loadDatas=[];
          
          
          foreach($loads as $load){
              $loadData = DB::table('loadconteners')->where('id',$load)->where('status','!=', 4)->first();
              
               if(!empty($loadData)){
                $loadDatas[] = $loadData;
               }
            
              }
       
        return $loadDatas;
    }

    public function getCarCollectionData($car_id){
      $ids = explode(',',$car_id);
      //print_r($ids);
      //die();
      foreach($ids as $job_id){
          $cheklan= DB::select("select * from jobs where id=?",[$job_id]);
          // print_r($cheklan);
          // die('check lane');
          if($cheklan[0]->lane_id==null){
              $jobs[] = DB::table('jobs')
                    ->select('jobs.*','users.name')
                    ->join('users','jobs.user_id','=','users.id')
                    ->where('jobs.id',$job_id)
                    ->get();
          }else{
              $jobs[] = DB::table('jobs')
                    ->select('jobs.*','users.name','lanes.lane_number')
                    ->join('users','jobs.user_id','=','users.id')
                    ->join('lanes','jobs.lane_id','=','lanes.id')
                    ->where('jobs.id',$job_id)
                    ->get();
          }
      }
      return $jobs;
  }
  

   


    










}

