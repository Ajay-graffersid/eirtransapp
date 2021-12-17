
@extends('masterlayout')
 
@section('title')
  Planner
 @endsection
 
@section('content')

<main class="main-content bgc-grey-100">
        <div id="mainContent">
             
          <div class="container-fluid">
            <h4 class="c-grey-900 mT-10 mB-30">Assign Load To Drivers For Delivery </h4>
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
                
                
                   <a href="{!! asset('planner') !!}">   <input type="button" value="Planner For Car Collection"></a>
                   <a href="{!! asset('plannerdelivery') !!}"><input type="button" class="dis_btn"  value="Planner For Car Delivery" disabled='disabled'></a> 
               
                  
                
<style>
.fc-event {
  
    border: 0px solid #3a87ad!important;
}
.fc-event-main {
    MARGIN-BOTTOM: 5PX;
}

#external-events .fc-event { BACKGROUND: #FFF;}

.fc-event-main p {margin: 0px 0; font-size: 13px!important;color: #fff !important; padding: 0px 8px !important;}

input.dis_btn {background: #dddddd!important; color: #908e8e;}

#external-events p {background: #f14c17;}
body { font-family: Arial, Helvetica Neue, Helvetica, sans-serif; }

.fc-event-dot {background-color: #ed5929!important;}

  #external-events { width: 370px; padding: 0 10px; border: 1px solid #ccc; background: #eee;  text-align: left; MARGIN-LEFT: 0EM; MARGIN-TOP: 0EM; float:left;}

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

  #calendar {
    max-width: 1100px;
    margin: 0 auto;
  }

</style>
</head>
<body>
  <div id='wrap'>
      
      
      <div class="dataTables_length" id="dataTable_length">
          
          
      </div>
      
      
      


    <div id='external-events'>
      <h4>load </h4>

      <div id='external-events-list'>
     
 
         @foreach($loads as $loadc)
        
        <div class='fc-event fc-h-event fc-daygrid-event fc-daygrid-block-event'>
           
             <p>
  
  <span draggable="true" ondragstart="drag(event)" id="{{$loadc->id}}" style="color:blue"> <b>{{$loadc->loadnumber}}</b></span>
 <!-- <img src="img_w3slogo.gif" draggable="true" ondragstart="drag(event)" id="drag1" width="88" height="31">-->
</p>
             <?php
                        
                        
                        if(!empty($loadc->car_collection_id)){
                        $expoid=explode('.',$loadc->car_collection_id);   
                    }else{
                        $expoid=explode('.',$loadc->car_delivery_id);
                    }
                    
                                 
                                 
                                 if($expoid)
                                 {
                                    foreach($expoid as $exp) 
                                    {
                                       
                                      $car_for_collection= DB::select('select *from  cardetails  where id=?',[$exp]);
                                       
                                         if(!empty($car_for_collection))
										 {
                                     $customernames= DB::select('select *from jobcustomer where id=?',[$car_for_collection[0]->customer]);
                                         }
                                       
                                       
                                     
                                     
                                      ?>    
            @if($car_for_collection)
          
          <div class='fc-event-main'>
              
         <table style=" width: 100%; background: #f14c17;" class="prss">
            
            <tbody>
                <tr>
                    <td style="width: 100px;">Customer Name</td>
                    <td>:</td>
                    <td>@if(!empty($customernames)){{ $customernames[0]->customer_name }}@endif</td>
                </tr>
                
                <tr>
                    <td style="width: 100px;">Make_model</td>
                    <td>:</td>
                    <td>{{ $car_for_collection[0]->make_model }}</td>
                    
                </tr>
                
                <tr>
                    <td style="width: 100px;">Reg_number</td>
                    <td>:</td>
                    <td>{{ $car_for_collection[0]->reg }}</td>
                </tr>
                
               <tr>
                   <td style="width: 100px;">Collectionaddress</td>
                   <td>:</td>
                   <td> {{ $car_for_collection[0]->collection_address }}</td>
               </tr>
                
                
                <tr>
                    <td style="width: 100px;">Lane</td>
                    <td>:</td>
                    <td>{{ $car_for_collection[0]->lan }}</td>
                </tr>
                
                
            </tbody>
            
        
        </table>
    
   
            
              </div>
       
              @endif
                      
                       <?php
                         }
                     }
                     ?>
                     
           
       
       
        </div>
      
      
      
      
      
      
        @endforeach
      </div>

     
    </div>

    <div id='calendar-wrap'>
    
    
    <?php
   $date1 = strtotime("+0 day");
   $dd1=date('d-m-y', $date1);
   
    $dmy1=explode('-',$dd1);
   
    $d1=$dmy1[0];
    
     $m1=$dmy1[1];
    $y1=$dmy1[2];
    
 
    $date2 = strtotime("+1 day");
      $dd2=date('d-m-y', $date2);
    
     $dmy2=explode('-',$dd2);
   
    $d2=$dmy2[0];
    
     $m2=$dmy2[1];
    $y2=$dmy2[2];
    
 
   
    $date3 = strtotime("+2 day");
   $dd3=date('d-m-y', $date3);
   
    $dmy3=explode('-',$dd3);
   
    $d3=$dmy3[0];
    
     $m3=$dmy3[1];
    $y3=$dmy3[2];
    
   
   
    $date4 = strtotime("+3 day");
   $dd4=date('d-m-y', $date4);
   
    $dmy4=explode('-',$dd4);
   
    $d4=$dmy4[0];
    
     $m4=$dmy4[1];
    $y4=$dmy4[2];
    
   
    $date5 = strtotime("+4 day");
   $dd5=date('d-m-y', $date5);
   
    $dmy5=explode('-',$dd5);
   
    $d5=$dmy5[0];
    
     $m5=$dmy5[1];
    $y5=$dmy5[2];
   
    $date6 = strtotime("+5 day");
   $dd6=date('d-m-y', $date6);
   
    $dmy6=explode('-',$dd6);
   
    $d6=$dmy6[0];
    
     $m6=$dmy6[1];
    $y6=$dmy6[2];
   
    $date7 = strtotime("+6day");
   $dd7=date('d-m-y', $date7);
   
     $dmy7=explode('-',$dd7);
   
    $d7=$dmy7[0];
    
     $m7=$dmy7[1];
    $y7=$dmy7[2];
    
  
   
    ?>
    
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
                         $loddetails= DB::select("select * from loadsassign where driverid=? and date >= ? and date <= ?",[$drv->id,$dd1,$dd7]);
                         
                          
                           if(!empty($loddetails))
                           {
                             
                             
                             
                              foreach($loddetails as $lodss)
                              {
                          
                               
                               
                               if($lodss->date==$dd1)
                               {
                          
                            $ldid1=$lodss->jobcustomerid;
                              
                              $divid1=$lodss->driverid;
                               }
                            
                            if($lodss->date==$dd2)
                            {
                             
                              $ldid2=$lodss->jobcustomerid;
                              $divid2=$lodss->driverid;
                              
                            }
                              
                             if($lodss->date==$dd3)
                             {
                             
                              $ldid3=$lodss->jobcustomerid;
                               $divid3=$lodss->driverid;
                              
                             }
                              
                             if($lodss->date==$dd4)
                             {
                             
                              $ldid4=$lodss->jobcustomerid;
                               $divid4=$lodss->driverid;
                             }
                              
                              if($lodss->date==$dd5)
                              {
                             
                              $ldid5=$lodss->jobcustomerid;
                               $divid5=$lodss->driverid;
                              }
                              
                               if($lodss->date==$dd6)
                               {
                             
                              $ldid6=$lodss->jobcustomerid;
                               $divid6=$lodss->driverid;
                               }
                              if($lodss->date==$dd7)
                              {
                             
                              $ldid7=$lodss->jobcustomerid;
                               $divid7=$lodss->driverid;
                               
                              }				   
                               
                               
                                
                           
                              }
                          
                             
                             
                             
                             
                           }
                           
                     
                         
                        
                         ?>
                        
                         
                       
                        
                         
                          <input type="hidden"   value="">
                      <tr>
                         
                        <td>{{$drv->name}}</span></td>
                        <td><div id="div1" ondrop="drop(event,{{$drv->id}},{{$d1}},{{$m1}},{{$y1}})" ondragover="allowDrop(event)"> @if(!empty($ldid1)&& $divid1==$drv->id) 
                                <?php
                                $expoid=explode('.',$ldid1);
                                  if($expoid)
                                  {
                                    foreach($expoid as $exp) 
                                    {
                                       
                                         $checkstatus= DB::select("select * from loadcontener where id=?",[$exp]);
                                         
                                         $status=$checkstatus[0]->status;
                                         
                                          $ldtype=$checkstatus[0]->type;
                                       
                                      ?>  
                                       <input type="hidden" id="{{$d1}}" value="{{$ldtype}}">
                                     
                                         @if($status==1)  <span style="background-color:orange;"> @endif  @if($status==2)  <span style="background-color:blue;"> @endif @if($status==3)  <span style="background-color:yellow;"> @endif  @if($status==4)  <span style="background-color:green;"> @endif @if($status==1 or $status==3) <a href=" {{ URL('/removecardeliverassing/'.$exp.'/'.$drv->id.'/'.$dd1)}}"><i style="font-size:10px" class="fa">&#xf00d;</i></a> @endif <i class="fa fa-user-circle" aria-hidden="true" onclick="getplannerdetails({{$exp}},{{$drv->id}},{{$d1}},{{$m1}},{{$y1}},{{$ldtype}})"></i>{{$checkstatus[0]->load_title}}</span><br>
                                        
                                  <?php
                                    }
                                  }
                                
                               
                                 ?>
                        
                        
                        
                         @endif</div></td>
                        <td><div id="div1" ondrop="drop(event,{{$drv->id}},{{$d2}},{{$m2}},{{$y2}})" ondragover="allowDrop(event)"> @if(!empty($ldid2) && $divid2==$drv->id) <?php
                                $expoid=explode('.',$ldid2);
                                  if($expoid)
                                  {
                                    foreach($expoid as $exp) 
                                    {
                                       
                                         $checkstatus= DB::select("select * from loadcontener where id=?",[$exp]);
                                         
                                         $status=$checkstatus[0]->status;
                                     
                                     $ldtype=$checkstatus[0]->type;
                                       
                                      ?>  
                                       <input type="hidden" id="{{$d2}}" value="{{$ldtype}}">
                                     
                                        @if($status==1)  <span style="background-color:orange;"> @endif  @if($status==2)  <span style="background-color:blue;"> @endif @if($status==3)  <span style="background-color:yellow;"> @endif  @if($status==4)  <span style="background-color:green;"> @endif @if($status==1 or $status==3)<a href=" {{ URL('/removecardeliverassing/'.$exp.'/'.$drv->id.'/'.$dd2)}}"><i style="font-size:10px" class="fa">&#xf00d;</i></a> @endif <i class="fa fa-user-circle" aria-hidden="true" onclick="getplannerdetails({{$exp}},{{$drv->id}},{{$d2}},{{$m2}},{{$y2}},{{$ldtype}})"></i>{{$checkstatus[0]->load_title}}</span><br>
                                        
                                  <?php
                                    }
                                  }
                                
                               
                                 ?> @endif</div></td>
                        <td><div id="div1" ondrop="drop(event,{{$drv->id}},{{$d3}},{{$m3}},{{$y3}})" ondragover="allowDrop(event)"> @if(!empty($ldid3) && $divid3==$drv->id) <?php
                                $expoid=explode('.',$ldid3);
                                  if($expoid)
                                  {
                                    foreach($expoid as $exp) 
                                    {
                                        $checkstatus= DB::select("select * from loadcontener where id=?",[$exp]);
                                         
                                         $status=$checkstatus[0]->status;
                                     
                                       
                                      $ldtype=$checkstatus[0]->type;
                                       
                                      ?>  
                                       <input type="hidden" id="{{$d3}}" value="{{$ldtype}}">
                                            @if($status==1)  <span style="background-color:orange;"> @endif  @if($status==2)  <span style="background-color:blue;"> @endif @if($status==3)  <span style="background-color:yellow;"> @endif  @if($status==4)  <span style="background-color:green;"> @endif @if($status==1 or $status==3)<a href=" {{ URL('/removecardeliverassing/'.$exp.'/'.$drv->id.'/'.$dd3)}}"><i style="font-size:10px" class="fa">&#xf00d;</i></a> @endif <i class="fa fa-user-circle" aria-hidden="true" onclick="getplannerdetails({{$exp}},{{$drv->id}},{{$d3}},{{$m3}},{{$y3}},{{$ldtype}})"></i>{{$checkstatus[0]->load_title}}</span><br>
                                        
                                  <?php
                                    }
                                  }
                                
                               
                                 ?>
                             @endif</div></td>
                        <td><div id="div1" ondrop="drop(event,{{$drv->id}},{{$d4}},{{$m4}},{{$y4}})" ondragover="allowDrop(event)">@if(!empty($ldid4) && $divid4==$drv->id) <?php
                                $expoid=explode('.',$ldid4);
                                  if($expoid)
                                  {
                                    foreach($expoid as $exp) 
                                    {
                                         $checkstatus= DB::select("select * from loadcontener where id=?",[$exp]);
                                         
                                         $status=$checkstatus[0]->status;
                                       
                                    $ldtype=$checkstatus[0]->type;
                                       
                                      ?>  
                                       <input type="hidden" id="{{$d4}}" value="{{$ldtype}}">
                                           @if($status==1)  <span style="background-color:orange;"> @endif  @if($status==2)  <span style="background-color:blue;"> @endif @if($status==3)  <span style="background-color:yellow;"> @endif  @if($status==4)  <span style="background-color:green;"> @endif @if($status==1 or $status==3)<a href=" {{ URL('/removecardeliverassing/'.$exp.'/'.$drv->id.'/'.$dd3)}}"><i style="font-size:10px" class="fa">&#xf00d;</i></a>@endif  <i class="fa fa-user-circle" aria-hidden="true" onclick="getplannerdetails({{$exp}},{{$drv->id}},{{$d4}},{{$m4}},{{$y4}},{{$ldtype}})"></i>{{$checkstatus[0]->load_title}}</span><br>
                                        
                                  <?php
                                    }
                                  }
                                
                               
                                 ?> @endif</div></td>
                        <td><div id="div1" ondrop="drop(event,{{$drv->id}},{{$d5}},{{$m5}},{{$y5}})" ondragover="allowDrop(event)">@if(!empty($ldid5) && $divid5==$drv->id) <?php
                                $expoid=explode('.',$ldid5);
                                  if($expoid)
                                  {
                                    foreach($expoid as $exp) 
                                    {
                                      
                                        $checkstatus= DB::select("select * from loadcontener where id=?",[$exp]);
                                         
                                         $status=$checkstatus[0]->status; 
                                      $ldtype=$checkstatus[0]->type;
                                       
                                      ?>  
                                       <input type="hidden" id="{{$d5}}" value="{{$ldtype}}">
                                      @if($status==1)  <span style="background-color:orange;"> @endif  @if($status==2)  <span style="background-color:blue;"> @endif @if($status==3)  <span style="background-color:yellow;"> @endif  @if($status==4)  <span style="background-color:green;"> @endif @if($status==1 or $status==3)<a href=" {{ URL('/removecardeliverassing/'.$exp.'/'.$drv->id.'/'.$dd5)}}"><i style="font-size:10px" class="fa">&#xf00d;</i></a>@endif  <i class="fa fa-user-circle" aria-hidden="true" onclick="getplannerdetails({{$exp}},{{$drv->id}},{{$d5}},{{$m5}},{{$y5}},{{$ldtype}})"></i>{{$checkstatus[0]->load_title}}</span><br>
                                        
                                  <?php
                                    }
                                  }
                                
                               
                                 ?> @endif</div></td>
                        <td><div id="div1" ondrop="drop(event,{{$drv->id}},{{$d6}},{{$m6}},{{$y6}})" ondragover="allowDrop(event)">@if(!empty($ldid6)&& $divid6==$drv->id)<?php
                                $expoid=explode('.',$ldid6);
                                  if($expoid)
                                  {
                                    foreach($expoid as $exp) 
                                    {
                                       $checkstatus= DB::select("select * from loadcontener where id=?",[$exp]);
                                         
                                         $status=$checkstatus[0]->status; 
                                       
                                      $ldtype=$checkstatus[0]->type;
                                       
                                      ?>  
                                       <input type="hidden" id="{{$d6}}" value="{{$ldtype}}">
                                         @if($status==1)  <span style="background-color:orange;"> @endif  @if($status==2)  <span style="background-color:blue;"> @endif @if($status==3)  <span style="background-color:yellow;"> @endif  @if($status==4)  <span style="background-color:green;"> @endif @if($status==1 or $status==3)<a href=" {{ URL('/removecardeliverassing/'.$exp.'/'.$drv->id.'/'.$dd6)}}"><i style="font-size:10px" class="fa">&#xf00d;</i></a> @endif <i class="fa fa-user-circle" aria-hidden="true" onclick="getplannerdetails({{$exp}},{{$drv->id}},{{$d6}},{{$m6}},{{$y6}},{{$ldtype}})"></i>{{$checkstatus[0]->load_title}}</span><br>
                                        
                                  <?php
                                    }
                                  }
                                
                               
                                 ?> @endif</div></td>
                        <td><div id="div1" ondrop="drop(event,{{$drv->id}},{{$d7}},{{$m7}},{{$y7}})" ondragover="allowDrop(event)">@if(!empty($ldid7)&& $divid7==$drv->id)<?php
                                $expoid=explode('.',$ldid7);
                                  if($expoid)
                                  {
                                    foreach($expoid as $exp) 
                                    {
                                       
                                        $checkstatus= DB::select("select * from loadcontener where id=?",[$exp]);
                                         
                                         $status=$checkstatus[0]->status; 
                                       $ldtype=$checkstatus[0]->type;
                                       
                                      ?>  
                                       <input type="hidden" id="{{$d7}}" value="{{$ldtype}}">
                                         @if($status==1)  <span style="background-color:orange;"> @endif  @if($status==2)  <span style="background-color:blue;"> @endif @if($status==3)  <span style="background-color:yellow;"> @endif  @if($status==4)  <span style="background-color:green;"> @endif @if($status==1 or $status==3)<a href=" {{ URL('/removecardeliverassing/'.$exp.'/'.$drv->id.'/'.$dd7)}}"><i style="font-size:10px" class="fa">&#xf00d;</i></a>@endif  <i class="fa fa-user-circle" aria-hidden="true" onclick="getplannerdetails({{$exp}},{{$drv->id}},{{$d7}},{{$m7}},{{$y7}},{{$ldtype}})"></i>{{$checkstatus[0]->load_title}}</span><br>
                                        
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
                    <div id="headerBorder">load details    
                    <div id="close" class="close">[X]</div>    
                    </div>    
        <table class="prateekl table table-bordered table-sm">
       <thead>
        <tr>
            <th>No</th>
            <th>customer</th>
            <th>make_model</th>
            <th>reg</th>
		    <th>collection_address</th>
            
        </tr>
       </thead>
       <tbody id="bodyData">
       
       
       </tbody>
       
       
       
   <!--    
       <thead>
        <tr>
            <th>carrier</th>
            <td></td>
            </tr>
            <tr></tr>
            <th>route</th>
            <th>registration</th>
            <th>dateoftravel</th>
		    <th>lenght</th>
           <th> shippingref</th>
        </tr>
       </thead>
        <tr>
            <th><input type="text" name="carrier"></th>
            <th><input type="text" name="route"></th>
            <th><input type="text" name="registration"></th>
            <th><input type="text" name="dateoftravel"></th>
		    <th><input type="text" name="lenght"></th>
           <th><input type="text" name="shippingref"></th>
           
        </tr>
        <tr><input type="submit" value="submit"></tr>
       <tbody>
       
       
       
       </tbody>
       -->
       
     
       
    </table>
    <form method='post' action="{!! asset('/savesiping') !!}" id="tt" >
                       <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
                    <div class="form-group"><label for="exampleInputEmail1">carrier</label><input type="text" name="carrier"
                        class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                        placeholder="Enter item name" size="4"></div>
                        
                         <div class="form-group"><label for="exampleInputEmail1">route</label><input type="text" name="route"
                        class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                        placeholder="Enter item name" size="4"></div>
                        
                         <div class="form-group"><label for="exampleInputEmail1">registration</label><input type="text" name="registration"
                        class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                        placeholder="Enter item name" size="4"></div>
                        
                         <div class="form-group"><label for="exampleInputEmail1">dateoftravel</label><input type="text" name="dateoftravel"
                        class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                        placeholder="Enter item name" size="4"></div>
                   
                    <div class="form-group"><label for="exampleInputEmail1">day</label><input type="text" name="day"
                        class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                        placeholder="Enter item name" size="4"></div>
                   
                    <div class="form-group"><label for="exampleInputEmail1">time</label><input type="text" name="time"
                        class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                        placeholder="Enter item name" size="4"></div>
                        
                        <div class="form-group"><label for="exampleInputEmail1">lenght</label><input type="text" name="lenght"
                        class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                        placeholder="Enter item name" size="4"></div>
                   
                        <input type="text"  id="did" name="driver_id">
                        
                        <input type="text" name="load" id="llid">
                        
                        
                        
                   
                          
                          <button type="submit" class="btn btn-primary">Submit</button>
                  </form>
   </div>    
            </div>    
        </div>    
        
      </main>
 
 <style>
 
  table.prss>tbody>tr>td {
    padding: 4px;
    font-size: 13px;
    font-weight:800;
}

 .fc-event, .fc-event-dot {
    background-color: #fff;
}

 input#did, input#llid {
    border: 1px solid #cac8c8;
    border-radius: 4px;
    padding: 6px;
}
 
 
 
 .table td, .table th {
    padding: 12px;
    padding: 10PX;
    
 }
 
 
 .prateekl>thead>tr>th {
    background: #e6e6e6;

}


#external-events p {
    margin: 0px 0;
    font-size: 11px;
    color: #fff;
    padding: 0px 8px;
}     
     
 </style>
<style>


#div1 span {
    color: #fff;
    padding: 1px;
    width: 100%;
    display: inline-block;
    margin-bottom: 4px;
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


#div1 {
  width: auto;
  height: auto;
  padding: 10px;
  border: 1px solid #000;
}
div#mask {
    opacity: 1 !important;
    background: #000000c4;
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
           border: 3px solid #fff;      
           border-radius: 10px;      
           -webkit-border-radius: 10px;      
           -moz-border-radius: 10px;      
       }      
     div#dialog {
    top: 2% !important;

}
       #boxes #dialog {      
           padding: 10px;      
           width: 580px;      
           height: auto;      
           background-color: #ffffff;      
           background-repeat: no-repeat;      
              
       }      
       
      #headerBorder {
    height: auto;
    width: 100%;
    background-color: #ea501e;
    color: white;
    font-size: 17px;
    padding-top: 0;
    margin-bottom: 16px;
    padding: 6px 16px;
    border-radius: 3px;
}
       #close{      
           position:relative;      
           float:right;      
           text-decoration:none;      
           padding-right:5px;       
           cursor:pointer;      
       }     
</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> --> <!-- jQuery CDN -->
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
  
  //alert(data);
  //alert(driverid);  
  ev.target.appendChild(document.getElementById(data));

  

<!-- Script -->

var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

// Add record
  

    var loadid = data;
  
    var driverid = driverid;
    var d = d;
    var m= m;
    var y = y;
   
     
    
    
      $.ajax({
        url: '{!! asset('loadassign') !!}',
        type: 'post',
        data: {_token: CSRF_TOKEN,loadid: loadid,driverid: driverid,d: d,m: m,y:y },
        success: function(response){

        

          // Empty the input fields
          alert(response);
          location.reload();
        }
      });
  







   
    
}




  function getplannerdetails(lodid,driverid,d,m,y,type) {
      
     
     
    var loadid = lodid;
    var driverid = driverid;
    var d = d;
    var m= m;
    var y = y;
     
     
       
        $.ajax({
            url: "{!! asset('viewdeliverassignload') !!}",
            type: "POST",
            data:{ 
                _token:'{{ csrf_token() }}',loadid: loadid,driverid: driverid,d: d,m: 'm',y:'y' 
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
                    bodyData+="<td>"+ i++ +"</td><td>"+row.customer+"</td><td>"+row.make_model+"</td><td>"+row.reg+"</td>"
                    +"<td>"+row.collection_address+"</td>";
                    bodyData+="</tr>";
                    
                })
               
                 
                      
               
               
                $("#bodyData").append(bodyData);
                 if(type==1)
                 {
                 $("#tt").hide();
                  } 
                document.getElementById("did").value =driverid ;
                document.getElementById("llid").value =loadid ;
           
                
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


</script>
@endsection