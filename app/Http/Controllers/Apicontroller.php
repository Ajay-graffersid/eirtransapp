<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class Apicontroller extends Controller
{
    public function index(Request $request) {
         
        //   return $request->all();
       
	   $name= $request->input('name');
	   $pincode= $request->input('pincode');
	   $token= $request->input('token');
	   $ip= $request->input('ip');
	   $deviceid= $request->input('deviceid');
	   $type= $request->input('type');
	   $appversion= $request->input('appversion');
	   //18807fbb4bea34f1  18807fbb4bea34f1
       $users = DB::select('select * from drivers where name=? and pincode=?',[$name,$pincode]);
       
    //   return  $users;

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
}
