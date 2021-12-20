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
      
      return view('poc',compact('podlink','driver','dentreport','deliveredjob','jobdetails','collected','customerdetails')); 
        
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
      
   return view('podlink',compact('podlink','driver','dentreport','deliveredjob','jobdetails','collected','customerdetails'));     
   

        
    }
}
