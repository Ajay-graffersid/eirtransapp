<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class Dashboard extends Controller
{
    public function dah()
    {
         
      $ldate = date('Y-m-d');
      $todymorningcheck = DB::select('select * from todaymorningchecks where currenttdate = ?',[$ldate]);
     //$todayjob= DB::select('select * from createtodayjob');
     
       $jobs = DB::select('select * from loadconteners');
      
      
      $morningcount= DB::select('select * from morningtruckaccepts');
      
      $jobcount= DB::select('select * from completejobs');
      
      $expencecount= DB::select('select * from expences');
      
       $morncont=count($morningcount);
       $jbcount=count($jobcount);
       $expcount=count($expencecount);
        
       return view('dashboard.dashboard',['todymorningchecks'=>$todymorningcheck,'jobs'=>$jobs,'morncont'=>$morncont,'jbcount'=>$jbcount,'expcount'=>$expcount]);  
 
    }
}
