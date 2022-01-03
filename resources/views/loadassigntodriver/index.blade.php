@extends('layouts.master')
 @section('title')
  Planner
 @endsection
@section('content')

 <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
 <link rel="stylesheet" href="/resources/demos/style.css">

 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
 <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
 <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

  <script>
  $( function() {
    $( "#accordion" ).accordion();
  } );
  </script>

<main class="main-content bgc-grey-100">
        <div id="mainContent">
             
          <div class="container-fluid">
            <h4 class="c-grey-900 mT-10 mB-30">Assign load to drivers </h4>
            <div class="row">
              <div class="col-md-12">
                    @if(Session::get('msg'))
         <div class = "alert alert-success">
            <ul>
              
              
              
             <li> {{Session::get('msg')}}</li>
              
            </ul>
         </div>
      @endif
                <div class="bgc-white bd bdrs-3 p-20 mB-20"> 
                

                    


                
           <!--   <a href="{!! asset('planner/1') !!}">   <input type="button"  class="dis_btn"  value="Planner for Car Collection"></a>
                   <a href="{!! asset('planner/2') !!}"><input type="button" value="Planner For Car Delivery"></a> -->
               
                  
                
<style>




 input.dis_btn {

    background: #dddddd!important;
    color: #908e8e;
}

 .table-striped tbody tr:nth-of-type(odd) {
    background: none
}

 .table-bordered thead td, .table-bordered thead th {
   background:#f7f7f7;
}


input[type="button"] {
    background: #f14c17;
    border: 0;
    color: #fff;
    border-radius: 4px;
    padding: 7px;
    margin-bottom: 14px;
    margin-left: 0;
}
  body {
   
    font-family: Arial, Helvetica Neue, Helvetica, sans-serif;
  }
.fc-event-dot {
    background-color: #ed5929!important;
}
  #external-events {

    width: 370px;
    padding: 0 10px;
    border: 1px solid #ccc;
    background: #eee;
    text-align: left;
   MARGIN-LEFT: 0EM;
    MARGIN-TOP: 0EM;
    float:left;
  }

  #external-events h4 {
    font-size: 16px;
    margin-top: 0;
    padding-top: 1em;
  }

  #external-events .fc-event {
    margin: 3px 0;
    cursor: move;
  }

  #external-events p {
    margin: 1.5em 0;
    font-size: 11px;
    color: #666;
  }

  #external-events p input {
    margin: 0;
    vertical-align: middle;
  }

  #calendar-wrap {
    margin-left: 400px;
  }

.table td, .table th {
    padding: 12px;
    padding: 10PX;
    
}
  #calendar {
    max-width: 1100px;
    margin: 0 auto;
  }
  
  .color-group ul {
    list-style: none;
    margin:0px;
    padding:0px;
}


  .color-group ul li {
    display: inline-block;
}
  
  .color-group ul li p {
    display: inline-block;
}

.color-group ul li span.orange-color1 {
   width: 15px;
    height: 15px;
    border-radius: 100%;

    background-color:orange;
    display: inline-block;
}

.color-group ul li span.yellow-color2 {
        width: 15px;
    height: 15px;
    background-color:yellow;
    display: inline-block;
    border-radius: 100%;

}

.color-group{margin:15px 0px 0px 0px;}
.color-group ul li span.blue-color3{
    width: 15px;
    height: 15px;
    border-radius: 100%;

    background-color: blue;
    display: inline-block;
}

.color-group ul li span.green-color4 {
    width: 15px;
    height: 15px;
    border-radius: 100%;

    background-color: green;
    display: inline-block;
}

.color-group ul li {
    display: inline-block;
    margin-right: 20px;
}

  .color-group ul li p {
    display: inline-block;
    vertical-align: -webkit-baseline-middle;
    padding-left: 5px;
}

.box {
  width: 320px;
  padding: 10px;
  border: 1px solid gray;
  margin: 0;
}


</style>
</head>
<body>
  <div id='wrap'>
      
      
     
      
      
      


 <div id='external-events'>
      <h4>Load </h4>

      <div id="accordion" >
      @foreach($loads as $loadc)
    
           
    <h1 onclick="showhide(this)"> <span draggable="true" ondragstart="drag(event)" id="{{$loadc->id}}"  > <b>{{$loadc->loadnumber}} : {{$loadc->load_title}}</b></span></h1>
         
           <div class='fc-event fc-h-event fc-daygrid-event fc-daygrid-block-event sss' >
              
            
                <?php
                       
                       if(!empty($loadc->job_id)){
                           $expoid=explode(',',$loadc->job_id);   
                       }else{
                           $expoid=explode(',',$loadc->car_delivery_id);                   
                             }
                           
                         
                                    
                            
                            if($expoid)
                            {
                              foreach($expoid as $expjob_id) 
                              {
                              $job=DB::table('jobs')->where('id',$expjob_id)->first();
          
                              if(!empty($job))
                          {            
                            $customernames=DB::table('users')->where('id',$job->user_id)->first();
                            $lanname=DB::table('lanes')->where('id',$job->lane_id)->first();       
                            
                            }  
                                  
                                  
                                
                                
                                  ?>    
               @if($job)
             
            <div class='fc-event-main' >      
                
            
             
                <p>  Customer Name : @if(!empty($customernames)){{ $customernames->name }}@endif  </p>                
                    
                <p>  Make : {{ $job->make_model }} </p> 
              
                <p>  Model : {{ $job->model }}  </p> 
              
                <p>  Reg Number : {{ $job->reg }} </p>           
              
                  <p>  Collection Address :  {{ $job->collection_address }} </p>           
              
                  <p>   Lane :  @if(!empty($lanname)) {{ $lanname->lane_number }} @endif </p>              
                
               
             </div>
          
                 @endif
                         
                          <?php
                            }
                        }
                        ?>         
              
          
          
           </div>
         
         
         
         
         
         
           @endforeach
 
 
     </div>  <!-- accordin close -->
</div>       <!-- extrnal-events close -->

              

<!-- ***********************************************************************************************
       drivers
*********************************************************************************************** -->
    <div id='calendar-wrap'>
    
    
    <?php
 
   
   
      
       
      
      
    if(!empty($searchdate))
    {

      $dd1=date('Y-m-d', strtotime($searchdate. ' + 0 days'));

      
    
       $dd2=date('Y-m-d', strtotime($searchdate. ' + 1 days'));
    
       $dd3=date('Y-m-d', strtotime($searchdate. ' + 2 days'));
  
       $dd4=date('Y-m-d', strtotime($searchdate. ' + 3 days'));
      
        $dd5=date('Y-m-d', strtotime($searchdate. ' + 4 days'));
        
         $dd6=date('Y-m-d', strtotime($searchdate. ' + 5 days'));
          
           $dd7=date('Y-m-d', strtotime($searchdate. ' + 6 days'));

    }
    else
    {
          $date1 = strtotime("-3 day");
       
          $dd1=date('Y-m-d', $date1);
          echo $dd1;
           $date2 = strtotime("-2 day");
          $dd2=date('Y-m-d',$date2);
            $date3 = strtotime("-1day");
           $dd3=date('Y-m-d', $date3);
         
           $date4 = strtotime("+0 day");
          $dd4=date('Y-m-d', $date4);
           $date5 = strtotime("+1 day");
           $dd5=date('Y-m-d', $date5);
              $date6 = strtotime("+2 day");
           $dd6=date('Y-m-d', $date6);
         $date7 = strtotime("+3 day");
           $dd7=date('Y-m-d', $date7);
        echo $dd7;
    
     }
    
    $dmy1=explode('-',$dd1);
   
    $d1=$dmy1[2];
    
     $m1=$dmy1[1];
    $y1=$dmy1[0];
    


    $dmy2=explode('-',$dd2);
   
    $d2=$dmy2[2];
    
    
    
     $m2=$dmy2[1];
    $y2=$dmy2[0];
    
 
      
   $dmy3=explode('-',$dd3);
   
    $d3=$dmy3[2];
    
     $m3=$dmy3[1];
    $y3=$dmy3[0];
    
   

   $dmy4=explode('-',$dd4);
   
    $d4=$dmy4[2];
    
     $m4=$dmy4[1];
    $y4=$dmy4[0];
    

   
   
    $dmy5=explode('-',$dd5);
   
    $d5=$dmy5[2];
    
     $m5=$dmy5[1];
    $y5=$dmy5[0];
   
   
  
   
    $dmy6=explode('-',$dd6);
   
    $d6=$dmy6[2];
    
     $m6=$dmy6[1];
    $y6=$dmy6[0];
   
   
  
   
     $dmy7=explode('-',$dd7);
   
    $d7=$dmy7[2];
    
     $m7=$dmy7[1];
    $y7=$dmy7[0];
      
      
   
    ?>
      
     Planner History By Date:<input type="date"  onchange="searchplaanerbydate(this.value)"> 
      
      <a href="{!! asset('/loadassigntodriver') !!}">Today Planner</a>
      <div class="color-group">
    <ul>
        <li><span class="orange-color1"></span><p>Assign to driver</p></li>
         <li><span class="yellow-color2"></span><p>In Progress</p></li>
         <li><span class="blue-color3"></span><p>Collected</p></li>
         <li><span class="green-color4"></span><p>Complete</p></li>
    </ul>
</div>

     <table id="dataTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                      <tr>
                        <th>Driver</th>
                        <th>{{$dd1}}</th>
                          <th>{{$dd2}}</th>
                            <th>{{$dd3}}</th>
                              <th>{{$dd4}}</th>
                                <th>{{$dd5}}</th>
                                  <th>{{$dd6}}</th>
                                    <th>{{$dd7}}</th>
                        
                      </tr>
                    </thead>
                   
                    <tbody>
                        <?php
                         $sr=1;
                       
                        ?>
                        
                       @foreach($drivers as $drv) 
                        
                         <?php
                         $countp=0;
                         $pld=array();
                         $loddetails= DB::select("select * from loadassigns where driver_id=? and date >= ? and date <= ?",[$drv->id,$dd1,$dd7]);
                            
                             $checkpending= DB::select("select * from loadassigns where driver_id=?",[$drv->id]); 
                              
                               if(!empty($checkpending))
                               {
                              foreach($checkpending as $checkp)
                                  {
                                      $checkped=$checkp->loadcontener_id;
                                   
                                       $expoidcp=explode(',',$checkped);
                                   
                                         foreach($expoidcp as $cp) 
                                         {
                                       
                                       
                                          $checkstatuscp= DB::select("select * from loadconteners where id=?",[$cp]);
                                            
                                            if(!empty($checkstatuscp))
                                            {
                                                
                                           $status=$checkstatuscp[0]->status;
                                             
                                                 if($status!=4)
                                                  {
                                                      $countp++;
                                                      $pld[]=$cp;
                                                  }
                                            
                                              }
                                  
                                        }
                                       
                                
                                   }
                               }
                                 

                          
                           if(!empty($loddetails))
                           {
                             
                              
                        
                                 foreach($loddetails as $lodss)
                              {
                          
                               
                               
                               if($lodss->date==$dd1)
                               {
                          
                              $ldid1=$lodss->loadcontener_id;
                              
                              $divid1=$lodss->driver_id;
                               }
                            
                            if($lodss->date==$dd2)
                            {
                             
                              $ldid2=$lodss->loadcontener_id;
                              $divid2=$lodss->driver_id;
                              
                            }
                              
                             if($lodss->date==$dd3)
                             {
                             
                              $ldid3=$lodss->loadcontener_id;
                               $divid3=$lodss->driver_id;
                              
                             }
                              
                             if($lodss->date==$dd4)
                             {
                             
                              $ldid4=$lodss->loadcontener_id;
                               $divid4=$lodss->driver_id;
                             }
                              
                              if($lodss->date==$dd5)
                              {
                             
                              $ldid5=$lodss->loadcontener_id;
                               $divid5=$lodss->driver_id;
                              }
                              
                               if($lodss->date==$dd6)
                               {
                             
                              $ldid6=$lodss->loadcontener_id;
                               $divid6=$lodss->driver_id;
                               }
                              if($lodss->date==$dd7)
                              {
                             
                               $ldid7=$lodss->loadcontener_id;
                               $divid7=$lodss->driver_id;
                               
                              }          
                               
                               
                                
                           
                              }
                          
                             
                             
                             
                             
                           }
                           
                     
                      
                        
                         ?>
                        
                         
                       
                        
                         
                          <input type="hidden"   value="">
                      <tr>
  <!--************************** driver columns in table ************************************* -->
                        <td>{{$drv->name}}<br>
                            @if(!empty($countp) && $countp!=0) <font color='red'>Total Pending Loads:<b>{{$countp}}</b></font>
                            
                            
                                                            
                            @endif </span><br>
                            @if(!empty($pld))  
                                 
                              @foreach($pld as $pl)
                                   <?php
                                    // $lodnums= DB::select("select * from loadconteners where id=?",[$pl]);
                                       $lodnums=DB::table('loadconteners')->where('id',$pl)->first();
                                      ?>
                                 <li><u><a  ondblclick='getplannerdetailspending({{$pl}},{{$drv->id}})' ><span>{{$lodnums->loadnumber}}</span></a></u></li>
                             
                              @endforeach
                               
                            
                            @endif</td>

  <!--************************** driver columns in table  end************************************* -->   
  <!-- ****************************************first date columns start ************************************* -->                 
                        
                        <td><div id="div1" <?php if($dd1 >= date("Y-m-d") ){?> ondrop="drop(event,{{$drv->id}},{{$d1}},{{$m1}},{{$y1}})" <?php }?> ondragover="allowDrop(event)"> 
                        @if(!empty($ldid1)&& $divid1==$drv->id) 
                                <?php

                                $expoid=explode(',',$ldid1);
                                  if($expoid)
                                  {
                                    foreach($expoid as $exp) 
                                    {
                                       
                                       
                                        //   $checkstatus= DB::select("select * from loadconteners where id=?",[$exp]);
                                          $checkstatus=DB::table('loadconteners')->where('id',$exp)->first();
                                            
                                            if(!empty($checkstatus))
                                            {
                                           $status=$checkstatus->status;
                                           $ldtype=$checkstatus->shipping_type;
                                            
                                            
                                              }
                                         
                                       
                                      ?>  
                                     
                                     
                                     @if($status==1)  
                                     <span style="background-color:orange;" draggable="true" ondragstart="drag(event)" id="{{$exp}}.{{$drv->id}}.{{$d1}}.{{$m1}}.{{$y1}}"> 
                                     @endif 
                                      @if($status==2)  <span style="background-color:blue;"> @endif
                                      @if($status==3)  
                                     <span style="background-color:yellow;color: #000;"> @endif 
                                      @if($status==4) <span style="background-color:green;"> @endif 
                                        
                                     {{$checkstatus->loadnumber}} &nbsp; 
                                      {{$checkstatus->load_title}} &nbsp;  
                                      @if($status==1) <a href=" {{ URL('/removeassignload/'.$exp.'/'.$drv->id.'/'.$dd1)}}"><i style="font-size:10px" class="fa">&#xf00d;</i></a> @endif 
                                     <i class="fa fa-user-circle" aria-hidden="true" ondblclick="getplannerdetails({{$exp}},{{$drv->id}},{{$d1}},{{$m1}},{{$y1}},{{$ldtype}},{{$status}})"></i></span><br>
                                        
                                  <?php
                                    }
                                  }
                                
                               
                                 ?>
                        
                        
                        
                         @endif</div>                        
                        </td>
<!-- ****************************************first date columns end ************************************* -->
                        <td><div id="div1" <?php if($dd2 >= date("Y-m-d") ){?> ondrop="drop(event,{{$drv->id}},{{$d2}},{{$m2}},{{$y2}})" <?php } ?>ondragover="allowDrop(event)"> 
                        @if(!empty($ldid2) && $divid2==$drv->id) <?php
                                $expoid=explode(',',$ldid2);
                                  if($expoid)
                                  {
                                    foreach($expoid as $exp) 
                                    {
                                      
                                        // $checkstatus= DB::select("select * from loadconteners where id=?",[$exp]);
                                        $checkstatus=DB::table('loadconteners')->where('id',$exp)->first();
                                         
                                            if(!empty($checkstatus))
                                            {
                                           $status=$checkstatus->status;
                                             
                                            $ldtype=$checkstatus->shipping_type;  
                                            }
                                      ?>    
                                   
                                     
                                      @if(!empty($checkstatus) && $status==1)  <span style="background-color:orange;" draggable="true" ondragstart="drag(event)" id="{{$exp}}.{{$drv->id}}.{{$d2}}.{{$m2}}.{{$y2}}"> @endif 
                                      @if(!empty($checkstatus) && $status==2)  <span style="background-color:blue;"> @endif
                                      @if(!empty($checkstatus) && $status==3)  <span style="background-color:yellow;color: #000;"> @endif 
                                      @if(!empty($checkstatus) && $status==4)  <span style="background-color:green;"> @endif 
                                     {{$checkstatus->loadnumber}} &nbsp; {{$checkstatus->load_title}}
                                      @if($status==1)<a href=" {{ URL('/removeassignload/'.$exp.'/'.$drv->id.'/'.$dd2)}}"><i style="font-size:10px" class="fa">&#xf00d;</i></a>@endif 
                                      <i class="fa fa-user-circle" aria-hidden="true" ondblclick="getplannerdetails({{$exp}},{{$drv->id}},{{$d2}},{{$m2}},{{$y2}},{{$ldtype}},{{$status}})"></i></span><br>
                                        
                                  <?php
                                    }
                                  }
                                
                               
                                 ?> @endif</div></td>
                        <td><div id="div1"  <?php if($dd3 >= date("Y-m-d") ){?> ondrop="drop(event,{{$drv->id}},{{$d3}},{{$m3}},{{$y3}})" <?php } ?> ondragover="allowDrop(event)"> @if(!empty($ldid3) && $divid3==$drv->id) <?php
                                $expoid=explode(',',$ldid3);
                                  if($expoid)
                                  {
                                    foreach($expoid as $exp) 
                                    {
                                       
                                        //   $checkstatus= DB::select("select * from loadconteners where id=?",[$exp]);
                                        $checkstatus=DB::table('loadconteners')->where('id',$exp)->first();
                                           
                                            if(!empty($checkstatus))
                                            {
                                             $status=$checkstatus->status; 
                                             $ldtype=$checkstatus->shipping_type;
                                            }
                                       
                                      ?> 
                                       
                                   @if($status==1)  <span style="background-color:orange;" draggable="true" ondragstart="drag(event)" id="{{$exp}}.{{$drv->id}}.{{$d3}}.{{$m3}}.{{$y3}}"> @endif  @if($status==2)  <span style="background-color:blue;"> @endif @if($status==3)  <span style="background-color:yellow;color: #000;"> @endif  @if($status==4)  <span style="background-color:green;"> @endif {{$checkstatus->loadnumber}} &nbsp; {{$checkstatus->load_title}} @if($status==1)<a href=" {{ URL('/removeassignload/'.$exp.'/'.$drv->id.'/'.$dd3)}}"><i style="font-size:10px" class="fa">&#xf00d;</i></a> @endif <i class="fa fa-user-circle" aria-hidden="true" ondblclick="getplannerdetails({{$exp}},{{$drv->id}},{{$d3}},{{$m3}},{{$y3}},{{$ldtype}},{{$status}})"></i></span><br>
                                        
                                  <?php
                                    }
                                  }
                                
                               
                                 ?>
                             @endif</div></td>
                        <td><div id="div1" ondrop="drop(event,{{$drv->id}},{{$d4}},{{$m4}},{{$y4}})" ondragover="allowDrop(event)">@if(!empty($ldid4) && $divid4==$drv->id) <?php
                                $expoid=explode(',',$ldid4);
                                  if($expoid)
                                  {
                                    foreach($expoid as $exp) 
                                    {
                                        
                                        //   $checkstatus= DB::select("select * from loadconteners where id=?",[$exp]);
                                          $checkstatus=DB::table('loadconteners')->where('id',$exp)->first();
                                         
                                             if(!empty($checkstatus))
                                            {
                                           $status=$checkstatus->status; 
                                           $ldtype=$checkstatus->shipping_type;
                                            }
                                      ?> 
                                     
                                    @if($status==1)  <span style="background-color:orange;" draggable="true" ondragstart="drag(event)" id="{{$exp}}.{{$drv->id}}.{{$d4}}.{{$m4}}.{{$y4}}"> @endif  @if($status==2)  <span style="background-color:blue;"> @endif @if($status==3)  <span style="background-color:yellow;color: #000;"> @endif  @if($status==4)  <span style="background-color:green;"> @endif {{$checkstatus->loadnumber}} &nbsp; {{$checkstatus->load_title}}@if($status==1)<a href=" {{ URL('/removeassignload/'.$exp.'/'.$drv->id.'/'.$dd4)}}"><i style="font-size:10px" class="fa">&#xf00d;</i></a> @endif <i class="fa fa-user-circle" aria-hidden="true" ondblclick="getplannerdetails({{$exp}},{{$drv->id}},{{$d4}},{{$m4}},{{$y4}},{{$ldtype}},{{$status}})"></i></span><br>
                                        
                                  <?php
                                    }
                                  }
                                
                               
                                 ?> @endif</div></td>
                        <td><div id="div1" ondrop="drop(event,{{$drv->id}},{{$d5}},{{$m5}},{{$y5}})" ondragover="allowDrop(event)">@if(!empty($ldid5) && $divid5==$drv->id) <?php
                                $expoid=explode(',',$ldid5);
                                  if($expoid)
                                  {
                                    foreach($expoid as $exp) 
                                    {
                                        // $checkstatus= DB::select("select * from loadconteners where id=?",[$exp]);
                                        $checkstatus=DB::table('loadconteners')->where('id',$exp)->first();
                                             if(!empty($checkstatus))
                                            {
                                            $status=$checkstatus->status; 
                                            $ldtype=$checkstatus->shipping_type;
                                            }
                                      ?> 
                                     
                                     @if($status==1)  <span style="background-color:orange;" draggable="true" ondragstart="drag(event)" id="{{$exp}}.{{$drv->id}}.{{$d5}}.{{$m5}}.{{$y5}}"> @endif  @if($status==2)  <span style="background-color:blue;"> @endif @if($status==3)  <span style="background-color:yellow;color: #000;"> @endif  @if($status==4)  <span style="background-color:green;"> @endif {{$checkstatus->loadnumber}} &nbsp; {{$checkstatus->load_title}} @if($status==1)<a href=" {{ URL('/removeassignload/'.$exp.'/'.$drv->id.'/'.$dd5)}}"><i style="font-size:10px" class="fa">&#xf00d;</i></a> @endif <i class="fa fa-user-circle" aria-hidden="true" ondblclick="getplannerdetails({{$exp}},{{$drv->id}},{{$d5}},{{$m5}},{{$y5}},{{$ldtype}},{{$status}})"></i></span><br>
                                        
                                  <?php
                                    }
                                  }
                                
                               
                                 ?> @endif</div></td>
                        <td><div id="div1" ondrop="drop(event,{{$drv->id}},{{$d6}},{{$m6}},{{$y6}})" ondragover="allowDrop(event)">@if(!empty($ldid6)&& $divid6==$drv->id)<?php
                                $expoid=explode(',',$ldid6);
                                  if($expoid)
                                  {
                                    foreach($expoid as $exp) 
                                    {
                                        //  $checkstatus= DB::select("select * from loadconteners where id=?",[$exp]);
                                        $checkstatus=DB::table('loadconteners')->where('id',$exp)->first();
                                           
                                           if(!empty($checkstatus))
                                           {
                                           $status=$checkstatus->status; 
                                            $ldtype=$checkstatus->shipping_type;
                                          }
                                       
                                      ?> 
                                       
                                      @if($status==1)  <span style="background-color:orange;" draggable="true" ondragstart="drag(event)" id="{{$exp}}.{{$drv->id}}.{{$d6}}.{{$m6}}.{{$y6}}"> @endif  @if($status==2)  <span style="background-color:blue;"> @endif @if($status==3)  <span style="background-color:yellow;color: #000;"> @endif  @if($status==4)  <span style="background-color:green;"> @endif {{$checkstatus->loadnumber}} &nbsp; {{$checkstatus->load_title}} @if($status==1)<a href=" {{ URL('/removeassignload/'.$exp.'/'.$drv->id.'/'.$dd6)}}"><i style="font-size:10px" class="fa">&#xf00d;</i></a> @endif <i class="fa fa-user-circle" aria-hidden="true" ondblclick="getplannerdetails({{$exp}},{{$drv->id}},{{$d6}},{{$m6}},{{$y6}},{{$ldtype}},{{$status}})"></i></span><br>
                                        
                                  <?php
                                    }
                                  }
                                
                               
                                 ?> @endif</div></td>
                        <td><div id="div1" ondrop="drop(event,{{$drv->id}},{{$d7}},{{$m7}},{{$y7}})" ondragover="allowDrop(event)">@if(!empty($ldid7)&& $divid7==$drv->id)<?php
                                $expoid=explode(',',$ldid7);
                                  if($expoid)
                                  {
                                    foreach($expoid as $exp) 
                                    {
                                       
                                        // $checkstatus= DB::select("select * from loadconteners where id=?",[$exp]);
                                        $checkstatus=DB::table('loadconteners')->where('id',$exp)->first();
                                         if(!empty($checkstatus))
                                         {
                                           $status=$checkstatus->status; 
                                           $ldtype=$checkstatus->shipping_type;
                                         }
                                       
                                      ?> 
                                     
                                         @if($status==1)  <span style="background-color:orange;" draggable="true" ondragstart="drag(event)" id="{{$exp}}.{{$drv->id}}.{{$d7}}.{{$m7}}.{{$y7}}"> @endif  @if($status==2)  <span style="background-color:blue;"> @endif @if($status==3)  <span style="background-color:yellow;color: #000;"> @endif  @if($status==4)  <span style="background-color:green;"> @endif {{$checkstatus->loadnumber}} &nbsp; {{$checkstatus->load_title}} @if($status==1)<a href=" {{ URL('/removeassignload/'.$exp.'/'.$drv->id.'/'.$dd7)}}"><i style="font-size:10px" class="fa">&#xf00d;</i></a>@endif  <i class="fa fa-user-circle" aria-hidden="true" ondblclick="getplannerdetails({{$exp}},{{$drv->id}},{{$d7}},{{$m7}},{{$y7}},{{$ldtype}},{{$status}})"></i></span><br>
                                        
                                  <?php
                                    }
                                  }
                                
                               
                                 ?> @endif</div></td>
                       
                      </tr>
                        @endforeach
                     
                    </tbody>
                  </table>

      
  </div>
                   
                   
                   
                </div>
              </div>
            </div>
          </div>
        </div>
        
       <div id="boxes">    
            <div id="mask"> 
           
                <div id="dialog" class="window"> 
               
                    <div id="headerBorder">Load details
                    <button onclick="getpdf()">PDF</button>
                 
                    
                    <div id="close" class="close">[X]</div>    
                    </div>    
        <form id="pp" style="display: none;">
              <input type="hidden" id="jobid" name="jobid" value="">
            <input type="hidden" id="drivid" name="drivid" value="">
            <input type="hidden" id="lannum" name="lannum" value="">
            
            <?php   $lanes= DB::select("select * from lanes");    ?>
            <b>Change Lane For Job No:</b><span id="jobnumber"></span> &nbsp; <select id="lannumber">
                  @foreach($lanes as $la)
                <option value="{{$la->id}}">{{$la->lane_number}} &nbsp; {{$la->lane_type}}</option>
                    @endforeach
                  
                    </select> 
                    <input type="button" value="submit" onclick="updatelane()"> 
          </form>

<!-- /****************************************jobs status(0,3,6,7)showpushingform for pushing Add Job a job *************************************--> 

       <span style="float:right;"  id="pushjoblink" onclick="showpushingform()"> <b><u>Add Job</u></b></span><br>
          <form id="pushing" style="display: none;">
        
       <?php   $jobs= DB::select("select * from jobs where status=? or status=? or status=? or status=?",[0,3,6,7]);?>
       <b>Jobs:</b> &nbsp; <select id="pushingjobid">
              <option value="">Please Select Job</option>
             @foreach($jobs as $la)
           <option value="{{$la->id}}">Job No:&nbsp; {{$la->job_number}} &nbsp;Reg No: &nbsp;{{$la->reg}}</option>
               @endforeach
             
              </select> <input type="button" value="submit" onclick="pushingjob()"> </form>

    <!-- /*************************************************for pushing a job*************************************--> 
             
              
        <table class="table table-bordered table-sm">
       <thead>
        <tr>
            <th>Sr No</th>
            <th>Job No</th>
            <th>Customer</th>
            <th>Make</th>
            <th>Reg</th>
        <th>Collection Address</th>
        <th>Delivery Address</th>
        <th>Lane</th>
        <th>Action</th>
             
        </tr>
       </thead>
       <tbody id="bodyData">

       </tbody>  
    </table>
  
    <!-- ****************************  tt  savesiping  form start ***************************************************** -->
    <form method='post' action="{!! asset('/savesiping') !!}" id="tt" style="display: none;">
        
                       <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
                  
                  
                   

          <div class="form-group row">
                        
                        <label for="exampleInputEmail1"  class="col-sm-2 col-form-label leb"> Shipping Ref</label>
                    
                    
                    <div class="col-md-10">                    
                    <input type="text" name="shippingref"
                        class="form-control" id="shippingref" aria-describedby="emailHelp"
                        size="4" required></div></div>
                        
                        
                        
                          <div class="form-group row">
                        
                        <label for="exampleInputEmail1"  class="col-sm-2 col-form-label leb"> PBN Number</label>
                    
                    
                    <div class="col-md-10">                    
                    <input type="text" name="pbnnumber"
                        class="form-control" id="pbnnumber" aria-describedby="emailHelp"
                        size="4" required></div></div>
                        
                        
                           <div class="form-group row">
                        
                        <label for="exampleInputEmail1"  class="col-sm-2 col-form-label leb"> MRN Number</label>
                    
                    
                    <div class="col-md-10">                    
                    <input type="text" name="mrnnumber"
                        class="form-control" id="mrnnumber" aria-describedby="emailHelp"
                        size="4" required></div></div>

                 
             <div class="form-group row">
                        
                        <label for="exampleInputEmail1"  class="col-sm-2 col-form-label leb"> Customer Ref</label>
                    
                    
                    <div class="col-md-10">                    
                    <input type="text" name="cusref"
                        class="form-control" id="cusref" aria-describedby="emailHelp"
                        size="4" required></div></div>

  
  
  
  
            <div class="form-group row">
                        
                        <label for="exampleInputEmail1"  class="col-sm-2 col-form-label leb">Carrier</label>
                    
                    
                    <div class="col-md-10">                    
                    <input type="text" name="carrier"
                        class="form-control" id="carrier" aria-describedby="emailHelp"
                        size="4" required></div></div>

                        
                        
                        
                         <div class="form-group row">
                             
                             <label for="exampleInputEmail1" class="col-sm-2 col-form-label leb">Route</label>
                               <div class="col-md-10">    
                             <input type="text" name="route"
                        class="form-control" id="route" aria-describedby="emailHelp"
                        placeholder="" required  size="4"></div> </div>
                        
                         <div class="form-group row">
                             
                             <label for="exampleInputEmail1" class="col-sm-2 col-form-label leb">Registration</label>
                             
                               <div class="col-md-10">    
                             <input type="text" name="registration"
                        class="form-control" id="registration" required aria-describedby="emailHelp"
                       size="4"></div></div>
                        
                        
                         <div class="form-group row">
                             <label class="col-sm-2 col-form-label leb" for="exampleInputEmail1">Date of Travel</label>
                         
                            <div class="col-md-10">
                         <input type="date" name="dateoftravel"
                        class="form-control" id="dateoftravel"  required aria-describedby="emailHelp"
                       size="4"></div></div>
                        
                   
                    <div class="form-group row">
                        
                        <label for="exampleInputEmail1" class="col-sm-2 col-form-label leb">Day</label>
                       
                       
                        <div class="col-md-10">

                        <input type="text" name="day"
                        class="form-control" id="day" aria-describedby="emailHelp"
                       size="4" required ></div></div>
                
                        
                   
                    <div class="form-group row"><label for="exampleInputEmail1" class="col-sm-2 col-form-label leb">Time</label>
                    
                      <div class="col-md-10">
                    <input type="time" name="time"
                        class="form-control"  required id="time" aria-describedby="emailHelp"
                        size="4">  </div> 
                        </div>
                        
                        
                        <div class="form-group row">
                            
                            <label for="exampleInputEmail1" class="col-sm-2 col-form-label leb">Length</label>
                        
                         <div class="col-md-10">
                        <input type="text" name="lenght"
                        class="form-control" id="lenght" aria-describedby="emailHelp"
                       size="4" required></div></div>
                       
                       
                        <div class="form-group row">
                            
                            <label for="exampleInputEmail1" class="col-sm-2 col-form-label leb">IMO Number</label>
                        
                         <div class="col-md-10">
                        <input type="text" name="imo"
                        class="form-control" id="imo" aria-describedby="emailHelp"
                       size="4" required></div></div>
                       
                       <div class="form-group row">
                            
                            <label for="exampleInputEmail1" class="col-sm-2 col-form-label leb">ETA</label>
                        
                         <div class="col-md-10">
                        <input type="text" name="eta"
                        class="form-control" id="eta" aria-describedby="emailHelp"
                       size="4" required></div></div>
                       
                       
                       
                       
                        <div class="form-group row">
                            
                            <label for="exampleInputEmail1" class="col-sm-2 col-form-label leb">Driver Name</label>
                        
                         <div class="col-md-10">
                        <input type="text" name="drivername"
                        class="form-control" id="drivername" aria-describedby="emailHelp"
                       size="4" required></div></div>
                   
                   
                    <div class="form-group row">
                            
                            <label for="exampleInputEmail1" class="col-sm-2 col-form-label leb">Customer Name</label>
                        
                         <div class="col-md-10">
                        <input type="text" name="customer"
                        class="form-control" id="customer" aria-describedby="emailHelp"
                       size="4" required></div></div>
                    
                    <div class="form-group row">
                            
                            <label for="exampleInputEmail1" class="col-sm-2 col-form-label leb">Contents</label>
                        
                         <div class="col-md-10">
                        <input type="text" name="contents"
                        class="form-control" id="contents" aria-describedby="emailHelp"
                       size="4" required></div></div>
                   
                   
                   
                     <div class="form-group">
                          <label for="exampleInputEmail1" class="col-sm-2 col-form-label leb"></label>
                          
                        <input type="hidden"  id="did" name="driver_id">
                        
                        <input type="hidden" name="load" id="llid">
                        
                        </div>
                        
                    <div class="form-group" style="text-align:center;">
                          
                          <button id="red" type="submit" class="btn btn-primary" style="padding: 8px 53px;  margin-top: 17px;">Submit</button>
                          <button id="green" type="submit" class="btn btn-success" style="padding: 8px 53px;  margin-top: 17px;">Submit</button> 
                   </div>
           </form>

            <!-- ****************************  tt  savesiping  form end ***************************************************** -->
   </div>    
            </div>    
        </div>    
   
   
     
       
   
        
      </main>
 
 <style>
 
 #external-events {

    height: 619px;
    overflow: auto;
}
.leb {
    COLOR: \#000;
    COLOR: #000;
    FONT-SIZE: 16PX;
    font-weight: 600;
}
 #headerBorder {
    height: auto !important;
    width: 100%;
    background-color: #f14c17 !important;
    color: white;
    font-size: 18px;
    padding-top: 9px!important;
    margin-bottom: 20px;
    padding: 11px;font-weight: 700;
    border-radius: 5px;
}
 div#dialog {
    top: 4% !important;
}
.window{
    left: 50% !important;
    transform: translateX(-50%);
}
 
 #boxes #dialog {
     width: 800px !important;
     height: auto;
 }
 div#mask {
    opacity: 1 !important;
    background: #000000ab;
}
 
 #div1 span {
    color: #fff;
    padding: 1px;
    width: 100%;
    display: inline-block;
    margin-bottom: 4px;
}
 
#external-events p {
    margin: 0px 0;
       font-size: 11px;
    color: #fff;
    padding: 0px 8px;
    background: #f14c17;
   
}     
     
 </style>
<style>
#div1 {
  width: auto;
  height: auto;
  padding: 10px;
  border: 1px solid #000;
}

#mask {      
           position: absolute;      
           padding-left: 60px;      
           padding-top: 80px;      
           padding-bottom: 80px;      
           padding-right: 50px;       
           left: 0;      
           top: 0;      
           z-index: 9999;      
           background-color: #808080;      
           display: none;      
       }      
     
       #boxes .window {      
           position: absolute;      
           left: 0;      
           top: 0;      
           width: 580px;      
           height: 300px;      
           display: none;      
           z-index: 9999;      
           padding: 20px;      
           background-color: white;      
           border: 3px solid #79BBFD;      
           border-radius: 10px;      
           -webkit-border-radius: 10px;      
           -moz-border-radius: 10px;      
       }      
     input#did {
    border: 1px solid #000;
    border-radius: 3px;
    height: 31px;    width: 40%;
}

input#llid{    width: 41%;
    border: 1px solid #000;
    border-radius: 3px;
    height: 31px;
}

       #boxes #dialog {      
        padding: 20px;
    width: 621px;
    height: auto;
    background-color: #ffffff;
    background-repeat: no-repeat;
    margin-top: 20px; 
       }      
       #headerBorder{      
           height:auto;       
           width:100%;       
           background-color:#0026ff;      
            color:white;       
            font-size:18px;       
            padding-top:3px;      
             margin-bottom:20px;      
       }      
       #close{      
           position:relative;      
           float:right;      
           text-decoration:none;      
           padding-right:5px;       
           cursor:pointer;      
       }     
</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>  <!-- jQuery CDN -->
<script>
function allowDrop(ev) {
  ev.preventDefault();
}

function drag(ev) {
  ev.dataTransfer.setData("text", ev.target.id);
}

function drop(ev,driverid,d,m,y) {
  
   
  ev.preventDefault();
  var data = ev.dataTransfer.getData("text");
    // alert(data);
 
  ev.target.appendChild(document.getElementById(data));



<!-- Script -->

  //  var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

// Add record
  

    var loadid = data;
    
   var driverid = driverid;
    var d = d;
    var m=  m;
    var y = y;
   
    // data: {_token: CSRF_TOKEN,loadid: loadid,driverid: driverid,d: d,m: m,y:y},
    
      $.ajax({
        url: '{!! asset('loadassign') !!}',
        type: 'post',
       
        data: {
        "_token": "{{ csrf_token() }}",
        "driver_id": driverid,
        "loadcontener_id":loadid,
        "d":d,
        "m":m,
        "y":y
        },
        success: function(response){

     

          // Empty the input fields
          alert(response);
          location.reload();
        }
      });
  







   
    
}




  function getplannerdetails(lodid,driverid,d,m,y,type,status) {

    alert(status);
      
    var loadid = lodid;
    var driverid = driverid;
    var d = d;
    var m= m;
    var y = y;
   
   
       
        $.ajax({
            url: "{!! asset('viewassignload') !!}",
            type: "POST",
            data:{ 
                _token:'{{ csrf_token() }}',loadid: loadid,driverid: driverid,d: d,m: m,y:y 
            },
            cache: false,
            dataType: 'json',
            success: function(dataResult){
              
               
                var resultData = dataResult.data;
                var driverid = dataResult.driverid;
                 var loadid = dataResult.loadid;
                 
                 var bodyData = '';
                var i=1;
                $.each(resultData,function(index,row){                     
                   
                    bodyData+="<tr>"
                    bodyData+="<td>"+ i++ +"</td><td>"+row.jobnumber+"</td><td>"+row.customer+"</td><td>"+row.make_model+"</td><td>"+row.reg+"</td>"
                    +"<td>"+row.collection_address+"</td>"+"<td>"+row.delivery+"</td>"+"<td>"+row.lane+"</td>"+"<td class='sp1'><span onclick='splitjob("+row.id+","+row.jobnumber+","+driverid+","+row.lane+")'>Split Job</span></td>"+"<td><span   onclick='deljob("+row.id+","+loadid+","+driverid+","+d+","+m+","+y+","+row.st+")'><font class='deljob' color='red'>X</font></span> &nbsp;&nbsp; <span   onclick='editjob("+row.id+")'><img src='{!! asset('assets/static/images/edit.png') !!}' style='width: 40%;' ></span></td>";
                    bodyData+="</tr>";
                    
                })
                
                
               
                $("#bodyData").append(bodyData);
                   
                
                  
                
                 if(type==1)    //loadconteners  shipping_type  
                 {
                    
                      $("#tt").show();  <!-- //****** tt  savesiping   ************ -->
                   
                    
                 }else
                 {
                     $("#tt").hide(); 
                    
                 }
                 
                 if(status==2)         //loadconteners  status 
                 {
                   $("#sp").show(); 
                   $(".sp1").show();
                  
                   
                 }
                 else
                 {
                    
                   $("#sp").hide(); 
                   $(".sp1").hide();
                   
                 }
                  
                  
                    if(status==1 || status == 3 )            //loadconteners  status 
                 {
                   $("#pushjoblink").show(); 
                  
                 }
                 else
                 {
                    
    
                    $("#pushjoblink").hide(); 
                 }
                  
                    $("#pushing").hide(); 
                  
                  
                  
             document.getElementById("did").value =driverid ;  
               document.getElementById("llid").value =loadid ;
                    if(dataResult.shippingref!='')
                    {
                                                                    
                document.getElementById("carrier").value =dataResult.carrier;
          
                 document.getElementById("route").value =dataResult.route;
                 document.getElementById("registration").value =dataResult.registration;
                   document.getElementById("dateoftravel").value =dataResult.dateoftravel;
                   document.getElementById("day").value =dataResult.day;
                    document.getElementById("time").value =dataResult.time;
                     document.getElementById("lenght").value =dataResult.lengt ;
                  
                     document.getElementById("contents").value =dataResult.contents;
                    document.getElementById("shippingref").value =dataResult.shippingref;
                    document.getElementById("mrnnumber").value =dataResult.mrnnumber;
                    
                    document.getElementById("pbnnumber").value =dataResult.pbnnumber;
                    
                    
                     document.getElementById("customer").value =dataResult.customer;
                      document.getElementById("cusref").value =dataResult.cusref;
                       document.getElementById("imo").value =dataResult.imo;
                       document.getElementById("eta").value =dataResult.eta;
                        document.getElementById("drivername").value =dataResult.drivername;
                     
                    }
             
             if(dataResult.btn == 1){
                 $('#green').show();
                 $('#red').hide();
             }else{
                 $('#red').show();
                 $('#green').hide();
             }
             
             
              if(status == 1 || status == 3)
                 {
                   $("#red").hide(); 
                   $("#green").hide();
                  
                 }
             
             
             
             
      var id = '#dialog';    
        var clgName = $('#cllg').val();    
        $("#clg").val(clgName);    
       var maskHeight = $(document).height();    
        var maskWidth = $(document).width();    
        $('#mask').css({ 'width': maskWidth, 'height': maskHeight })    
        $('#mask').fadeIn(1000);    
        $('#mask').fadeTo("slow", 0.8);    
        var winH = $(window).height();    
        var winW = $(window).width();    
        $(id).css('top', winH / 2 - $(id).height() / 2);    
        $(id).css('left', winW / 2 - $(id).width() / 2);    
        $(id).fadeIn(2000);    
        $('.window .close').click(function (e) {    
            e.preventDefault();    
            $('#mask').hide();    
            $('#bodyData').empty();
            $('.window').hide();    
        });    
                
           
            }
        

        });



  }


  function searchplaanerbydate(date)
  {
      window.location.href='{!! asset("loadassigntodriver")!!}/'+date;
  }


  function splitjob(jobid,jobnumber,drivid,lannumber)
  {
    
     $('#drivid').val(drivid);
     $('#jobid').val(jobid);
     $('#lannum').val(lannumber);
     
     $('#jobnumber').text(jobnumber);
     $('#pp').show();
  }
  
   function updatelane()
  {
     
     var jobid = $('#jobid').val(); 
     
     var lannumber = $('#lannumber').val();
     
      var jobnumber= $('#jobnumber').text();
      
      
      var drivid = $('#drivid').val();
    
    //   alert(jobid);
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

// Add record
  
   $.ajax({
        url: '{!! asset('updatelannumber') !!}',
        type: 'post',
        // data: {_token: CSRF_TOKEN,jobid: jobid,lannumber: lannumber,drivid: drivid,jobnumber: jobnumber},
        data: {
        "_token": "{{ csrf_token() }}",
        "jobid": jobid,
        "lannumber":lannumber,
        "drivid":drivid,
        "jobnumber":jobnumber
     
        },    
        success: function(response){
        

          // Empty the input fields
          alert(response);
          $('#pp').hide();
          location.reload();
          
        }
      });
  
 }
 
 
 function deljob(jobid,loadid,driverid,d,m,y,st){
   
    
    if(st !=1 ){
         
     alert("You Can't Delete In-Progress Job");
         
     }
     else{
         
     
   
    if(confirm('Do You Want To Remove Job'))
    {
     var jobid = jobid; 
     
     var loadid =loadid;
     
     var driverid =driverid;
     
    
      
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

// Add record
  
   $.ajax({
        url: '{!! asset('deljob') !!}',
        type: 'post',
      
         data: {
        "_token": "{{ csrf_token() }}",
        "jobid": jobid,
        "loadid":loadid,
        "driverid":driverid,
        "d":d,
        "m":d,
        "y":y
        },    
        success: function(response){            
 
         }
      });
      location.reload();
    }
     
 
         
     }         
}
 


 function editjob(jobid){
   
  window.location.href='{!! asset("jobeditonplanner")!!}/'+jobid; 
            
}

 
 
 
 
 
  
  function showpushingform()
  {
      $('#pushing').show();
  }
  function pushingjob()
  {
     
     var jobid = $('#pushingjobid').val(); 
     
     var loadid = $('#llid').val();
     
      var drivid = $('#did').val();
     
       if(jobid=='')
       {
            alert('Please Select job');
            return false;
            exist();
       }
  
      
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

// Add record
  
   $.ajax({
        url: '{!! asset('pushingajob') !!}',
        type: 'post',
        data: {_token: CSRF_TOKEN,jobid: jobid,loadid: loadid,drivid: drivid},

        data: {
        "_token": "{{ csrf_token() }}",
        "jobid": jobid,
        "loadid":loadid,
        "driverid":drivid
      
        },    
        success: function(response){

        

          // Empty the input fields
          alert(response);
          $('#pushing').hide();
          location.reload();
          
        }
      });
  
 }
 
 
 
 
 
 ///getdetailspendingloaddetails///
 
 
 
 function getplannerdetailspending(lodid,driverid) {
      

     
     
    var loadid = lodid;
    var driverid = driverid;
    var d = 1;
    var m= 2;
    var y = 3;
   
   
       
        $.ajax({
            url: "{!! asset('viewassignload') !!}",
            type: "POST",
            data:{ 
                _token:'{{ csrf_token() }}',loadid: loadid,driverid: driverid,d: d,m: m,y:y 
            },
            cache: false,
            dataType: 'json',
            success: function(dataResult){
                
                
                
                  
              
                  
               
                var resultData = dataResult.data;
                var driverid = dataResult.driverid;
                 var loadid = dataResult.loadid;
                 
                  
                
                 
              
                
                var bodyData = '';
                var i=1;
                $.each(resultData,function(index,row){
                        
                    bodyData+="<tr>"
                    bodyData+="<td>"+ i++ +"</td><td>"+row.jobnumber+"</td><td>"+row.customer+"</td><td>"+row.make_model+"</td><td>"+row.reg+"</td>"
                    +"<td>"+row.collection_address+"</td>"+"<td>"+row.lane+"</td>"+"<td>-</td>";
                    bodyData+="</tr>";
                    
                })
                
                
               
                $("#bodyData").append(bodyData);
                   
                 
                   $("#pushjoblink").hide(); 
                
                     
                  
           
     var id = '#dialog';    
        var clgName = $('#cllg').val();    
        $("#clg").val(clgName);    
       var maskHeight = $(document).height();    
        var maskWidth = $(document).width();    
        $('#mask').css({ 'width': maskWidth, 'height': maskHeight })    
        $('#mask').fadeIn(1000);    
        $('#mask').fadeTo("slow", 0.8);    
        var winH = $(window).height();    
        var winW = $(window).width();    
        $(id).css('top', winH / 2 - $(id).height() / 2);    
        $(id).css('left', winW / 2 - $(id).width() / 2);    
        $(id).fadeIn(2000);    
        $('.window .close').click(function (e) {    
            e.preventDefault();    
            $('#mask').hide();    
            $('#bodyData').empty();
            $('.window').hide();    
        });    
                
           
            }
        

        });



  }


 
 
 function getpdf()
 {
    
    
 var load_id = $('#llid').val(); 
    
  var driver_id = $('#did').val(); 
  window.location.href='{!! asset("getpdfbyload")!!}/'+load_id;

 } 

 function showhide(dis){
   alert(dis);
   $(".sss").slideToggle();



 }
 
 
</script>
<style>
    .ui-state-active, .ui-widget-content .ui-state-active, .ui-widget-header .ui-state-active, a.ui-button:active, .ui-button:active, .ui-button.ui-state-active:hover {
    border: 1px solid #f14c17;
    background: #f14c17;
    }
</style>

@endsection