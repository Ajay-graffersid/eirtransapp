@extends('masterlayout')
 
@section('title')
  Job Report
 @endsection
 
@section('content')

<main class="main-content bgc-grey-100">
        <div id="mainContent">
          <div class="container-fluid">
            <h4 class="c-grey-900 mT-10 mB-30">Job Report</h4>
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
                    
                <form action="{{ url('searchbycarbooking')}}" method="post"> Search By Booking Date: 
                  <select id="customer_id"  name="customer_id" >
                            <option value=""> Please Select Customer </option>
                           @foreach ($customers as $customer)
                            <option value="{{$customer->id}}"  @if($customer->id == $customer_id ) selected @endif> {{$customer->customer_name}} </option>
                           @endforeach
                        </select>
                         <input type="date" id="booking_date1" @if(!empty($bookingdate1)) value="{{$bookingdate1}}" @endif name="booking_date1">
                          To <input type="date" @if(!empty($bookingdate2)) value="{{$bookingdate2}}" @endif id="booking_date2" name="booking_date2">

                          <select id="status" name="status">
                        <option value=""> Please Select Stauts </option>
                        <option value="4"<?php if($status==4){echo 'selected';} ?>> Job Complete </option>
                        <option value="3" <?php if($status==3){echo 'selected';} ?>> In Progress </option>
                        <option value="7"<?php if($status==7){echo 'selected';} ?>>  Collected </option>
                        <option value="9"<?php if($status==9){echo 'selected';} ?>>  Not Collected </option>
                        <option value="10"<?php if($status==10){echo 'selected';} ?>>  Not Deliver </option>
                        </select>
                        
                          <input type="submit" value="Search">
                        
                       
                
                        <div class="main-left">

                     <div class="btnnew" style="margin-bottom:25px;">
                               <select class="drop_her" id="lane_btn" onchange="jobsearchbylane()">
                                   <option value="0">Select Lane </option>
                                   @foreach($lanes as $lane)
                                    <option value="{{$lane->id}}">{{$lane->lane_type}}</option>
                                   
                                 @endforeach
                               </select>
                               
                            </div>
                
                </form>
                 
                <td>
                      <div class="card-body" style="padding:0px; text-align:right; margin-top: -44px;">
               <br>@csrf 
                <a class="btn btn-info" onclick="exportjobreport()"> 
                 Export File</a> &nbsp;  <button class="ri_btn" onClick="window.print()">Print</button> </br>
            
                </td>
                 
               
        </div>
                  
                  <table id="dataTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                      <tr>
                        <th>Sl. No.</th>
                        <th>Job No.</th>
                        <th>Customer Name</th>
                        <th>Make/Model</th>
                        <th>Reg</th>
                        <th>Location</th>
                        <th>Collection Address</th>
                        <th>Delivery Address</th>
                        <th>Booking Date</th>
                        <th>Lane</th>
                        <th>VIN Number</th>
                        <th>EORI</th>
                        <th>Comm Code</th>
                        <th>Weight</th>
                        <th>Curr</th>
                        <th>Value</th>
                        <th>Ship Imo</th>
                        <th>ETA</th>
                        <th>Bill Of Laden</th>
                        <th>Description</th>
                        <th>Inv Ref</th>
                        <th>Invoice</th>
                        <th>Rate</th>
                        <th>Status</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $sr=1; ?>
                      @foreach ($jobs as $job)
                        <tr>
                          <td>{{ $sr++ }}</td>
                          <td>{{ $job->job_number }}</td>
                          <td><?php
                            $name = DB::table('jobcustomer')->where('id',$job->customer)->first();
                            $checkinv = DB::table('invoices')->where('job_id',$job->id)->first();
                             if(!empty($name))
                             {
                            echo $name->customer_name;
                             }
                          ?></td>
                          <td>{{$job->make_model}} / {{$job->model}}</td>
                          <td>{{$job->reg }}</td>
                          <td>{{$job->location }}</td>
                          <td>{{$job->collection_address }}</td>
                          <td>{{$job->delivery_address }}</td>
                          <td>{{$job->booking_date }}</td>
                          <td><?php
                            $name = DB::table('lane')->where('id',$job->lan)->first();
                                 if(!empty($name))
                             {
                                echo $name->lane_number;
                             }
                          
                          ?></td>
                          <td>{{$job->vin_number }}</td>
                          <td>{{$job->eori }}</td>
                          <td>{{$job->commcode }}</td>
                          <td>{{$job->weight }}</td>
                          <td>{{$job->curr }}</td>
                          <td>{{$job->value }}</td>
                          <td>{{$job->shipimo }}</td>
                          <td>{{$job->eta }}</td>
                          <td>{{$job->bill_of_laden }}</td>
                          <td>{{$job->description }}</td>
                          <td>{{$job->inv_ref }}</td>
                          <td>@if(!empty($checkinv))<i class="fa fa-download" aria-hidden="true" onclick="getplannerdetails({{$job->id}})"></i>@endif</td>
                          <td>{{$job->rate }}</td>
                          <td>
                          @if($job->bookingstatus=='6')
                          <a href="" class="view_btn blue-btn">Job Collected</a>
                          @endif
                          @if($job->bookingstatus=='7')
                          <a href="" class="view_btn blue-btn">Job Collected</a>
                          <!--<a href="" class="view_btn green-btn">Load Collected</a>-->
                          @endif
                          <!--@if($job->bookingstatus=='0')-->
                          <!--<a href="" class="view_btn yellow-btn">In Progress</a>-->
                          <!--@endif-->
                          @if($job->bookingstatus=='9')
                          <a href="" class="view_btn red-btn">Not Collected</a>
                          @endif
                            @if($job->split_job=='6')
                          <a href="" class="view_btn yellow-btn">In Progress</a>
                          @endif
                           @if($job->bookingstatus=='4')
                          <a href="" class="view_btn green-btn">Job Complete</a>
                          @endif
                           @if($job->bookingstatus=='3')
                          <a href="" class="view_btn yellow-btn">In Progress</a>
                          @endif
                          @if($job->bookingstatus=='10')
                          <a href="" class="view_btn red-btn">Not Deliver</a>
                          @endif
                          </td>
                           <td>  @if($job->bookingstatus=='9') <a href="{{ url('view_job_notcolleectedreport/list').'/'.$job->id }}" class="btn btn-info editcol">View</a> @endif @if($job->bookingstatus=='3')<a href="{{ url('view_job_report/list').'/'.$job->id }}" class="btn btn-info editcol">View</a> @endif @if($job->bookingstatus=='7')<a href="{{ url('view_job_report/list').'/'.$job->id }}" class="btn btn-info editcol">View</a> @endif @if($job->bookingstatus!='9' and $job->bookingstatus!='3' and $job->bookingstatus!='7'and $job->bookingstatus!='0'and $job->bookingstatus!='2')<a href="{{ url('view_job_report/list').'/'.$job->id }}" class="btn btn-info editcol">View</a> @endif  </td>
                      </tr>
                      @endforeach
              </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
         <div id="boxes">    
            <div id="mask"> 
           
                <div id="dialog" class="window"> 
               
                    <div id="headerBorder">Invoice
                    <!--<button onclick="getpdf()">PDF</button>-->
                 
                    
                    <div id="close" class="close">[X]</div>    
                    </div>    
              <!-- for pushing a job-->
                 
              
        <table class="table table-bordered table-sm">
       <thead>
        <tr>
            <th>Sr No</th>
            <th>Invoice</th>
            
		   
             
        </tr>
       </thead>
       <tbody id="bodyData">

       </tbody>  
    </table>
  
   
    
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
 
 #boxes #dialog {
 
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
 $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

function exportjobreport1() {
     alert('ajau');
   var customer_id = $('#customer_id').val();
   var booking_date1 = $('#booking_date1').val();
   var booking_date2 = $('#booking_date2').val();
   var status = $('#status').val();
 


      if(customer_id !='')
    {
      alert('ha');
    window.location.href='{!! asset("jobs_report_export")!!}/'+customer_id+'/'+booking_date1+'/'+booking_date2;
    }else{
       
       alert('na');
      var customer_id ='00'; 
       
     window.location.href='{!! asset("jobs_report_export")!!}/'+customer_id+'/'+booking_date1+'/'+booking_date2;    
    }
}


function exportjobreport(){
   
  // alert('aaaaaaaaaaaaa');
   var customer_id = $('#customer_id').val();
   var booking_date1 = $('#booking_date1').val();
   var booking_date2 = $('#booking_date2').val();
   var status = $('#status').val();

 
$.ajax({
         type:'POST',
         url:"{{ url('jobs_report_export') }}",
         data:{customer_id:customer_id,status:status,booking_date1:booking_date1,booking_date2:booking_date2},
         success:function(data){
            // alert(data);
            // alert(data.success);
         }
      });
}

 
 
</script>
<style>
    .ui-state-active, .ui-widget-content .ui-state-active, .ui-widget-header .ui-state-active, a.ui-button:active, .ui-button:active, .ui-button.ui-state-active:hover {
    border: 1px solid #f14c17;
    background: #f14c17;
    }
</style>

 
 
 <style>
 button.ri_btn {
    background: #f14c17;
    color: #fff;
    padding: 7px 19px;
    border-radius: 4px;
    border: 0;
      text-align: right;
}
 input[type="submit"]{
   background-color: #c14117!important;
    border-color: #c14118!important;
    border: none;
    color: #fff;
    padding: 5px 16px;
    border-radius: 4px;
    font-weight: 500;
 }
     .dataTables_wrapper {margin-top: 2em;}
     
 </style>

 
 <script>

  function jobsearchbylane()
  {
    
     var lane = $('#lane_btn').val();
       
    
      
  window.location.href='{!! asset("jobsearchbylane")!!}/'+lane;   
             
  }

 
 
 </script>

 
 <style>
 button.ri_btn {
    background: #f14c17;
    color: #fff;
    padding: 7px 19px;
    border-radius: 4px;
    border: 0;
      text-align: right;
}
 input[type="submit"]{
   background-color: #c14117!important;
    border-color: #c14118!important;
    border: none;
    color: #fff;
    padding: 5px 16px;
    border-radius: 4px;
    font-weight: 500;
 }
     .dataTables_wrapper {margin-top: 2em; overflow-x: auto;}
     
 </style>

 

@endsection