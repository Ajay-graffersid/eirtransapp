@extends('masterlayout')
 
@section('title')
  Car Details
 @endsection
 
@section('content')

<main class="main-content bgc-grey-100" id="divToPrint">
    
        <div id="mainContent">
            
             <div id="mainContent">
             
          <div class="container-fluid">
          
            <div class="row">
              <div class="col-md-12">
                    @if(Session::get('msg'))
         <div class = "alert alert-success">
            <ul>
              
              
              
             <li> {{Session::get('msg')}}</li>
              
            </ul>
         </div>


      @endif
      
      
      <div class="bgc-white tbl bd bdrs-3 p-20 mB-20">
          
            <h4 class="c-grey-900 mT-10 mB-30">Job Details</h4>
            
             @foreach ($current_job_details as $current_job_details)
             
             
             @endforeach
          
             <table  class="table table-striped table-bordered" cellspacing="0" width="100%">
                      
                        <tr>
                            <td>Job No.</td>
                             <td class="de_de">{{ $current_job_details->job_number}}</td>
                          </tr>
                       <tr>
                            <td>Customer Name</td>
                          <td><?php
                            $name = DB::table('jobcustomer')->where('id',$current_job_details->customer)->first();
                             if(!empty($name))
                             {
                            echo $name->customer_name;
                             }
                          ?></td>
                            
                          </tr>
                     <tr>
                            <td>Make/Model</td>
                           <td class="de_de">{{ $current_job_details->make_model}}/ {{ $current_job_details->model}}</td>
                          </tr>
                          
                            <tr>
                            <td>Reg</td>
                            <td class="de_de">{{ $current_job_details->reg}}</td>
                          </tr>
                    
                     <tr>
                            <td>Collection Address</td>
                          <td class="de_de">{{ $current_job_details->	collection_address}}</td>
                          </tr>
                    
                     <tr>
                            <td>Delivery Address</td>
                            <td class="de_de">{{ $current_job_details->	delivery_address}}</td>
                          </tr>
                          
                          <tr>
                            <td>Booking Date</td>
                           <td class="de_de">{{ $current_job_details->	booking_date}}</td>
                          </tr>
                          
                          <tr>
                            <td>Lane</td>
                            <td><?php
                            $name = DB::table('lane')->where('id',$current_job_details->lan)->first();
                                 if(!empty($name))
                             {
                                echo $name->lane_number;
                             }
                          
                          ?></td>
                          </tr>
                           
                          <tr>
                            <td>Current Status</td>
                          <td>
                          @if($current_job_details->bookingstatus=='6')
                          <a href="" class="view_btn blue-btn">Job Collected</a>
                          @endif
                          @if($current_job_details->bookingstatus=='7')
                          <a href="" class="view_btn blue-btn">Job Collected</a>
                          <!--<a href="" class="view_btn green-btn">Load Collected</a>-->
                          @endif
                          @if($current_job_details->bookingstatus=='0')
                          <a href="" class="view_btn yellow-btn">In Progress</a>
                          @endif
                          @if($current_job_details->bookingstatus=='9')
                          <a href="" class="view_btn view_btn red-btn">Not Collected</a>
                          @endif
                            @if($current_job_details->split_job=='6')
                          <a href="" class="view_btn yellow-btn">In Progress</a>
                          @endif
                            @if($current_job_details->bookingstatus=='4')
                          <a href="" class="view_btn green-btn">Job Complete</a>
                          @endif
                           @if($current_job_details->bookingstatus=='3')
                          <a href="" class="view_btn yellow-btn">In Progress</a>
                          @endif
                           @if($current_job_details->bookingstatus=='10')
                          <a href="" class="view_btn red-btn">Not Deliver</a>
                          @endif
                          
                          </td>
                          </tr>
                 
                 </table>
          </div>
      
                <div class="bgc-white bd bdrs-3 p-20 mB-20">
                    
                    <table id="dataTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                      
                      <h4 class="c-grey-900 mT-10 mB-30">Job's Collected Journey</h4>
                    
                     <tbody>
                         
                         <tr>
                            <td>Created on</td>
                            <td class="de_de">{{$current_job_details->updated_at}}</td>
                            <td class="de_de">N/A</td>
                            <td class="de_de">By</td>
                            <td class="de_de">Test@gmail.com</td>
                          </tr>
                          
                        
                      @foreach ($loaddetails as $loaddetails)
                        <tr>
                            <td>Added in load</td>
                             <td class="de_de">{{$loaddetails->load_title}} - {{$loaddetails->loadnumber}}</td>
                             <td class="de_de">N/A</td>
                            <td class="de_de">By</td>
                           <td class="de_de">{{$loaddetails->updated_at}}</td>
                          </tr>
                         <tr>
                      @endforeach
                      
                      
                        <tr>
                        
                            <td>Assigned to </td>
                            @foreach ($loadsassign as $loadsassign)
                            <td><?php
                            $name = DB::table('driver')->where('id',$loadsassign->driverid)->first();
                             if(!empty($name))
                             {
                            echo $name->name;
                             }
                          ?></td>
                            <td class="de_de">N/A</td>
                             <td class="de_de">ON</td>
                             
                              <td class="de_de">{{$loadsassign->date}}</td>
                              @endforeach
                           
                         
                          </tr>
                          
                          
                          
                          
                          @foreach ($collecteddetails as $collecteddetails)
                          <tr>
                            <td>Collected on</td>
                          
                            @if(!empty($collecteddetails->datetime))
                            <td class="de_de">{{$collecteddetails->datetime}}</td>
                            @else
                              <td class="de_de">N/A</td>
                            @endif
                              @if(!empty($current_job_details->lan))
                              <td><?php
                            $name = DB::table('lane')->where('id',$current_job_details->lan)->first();
                           if(!empty($name))
                             {
                                echo $name->lane_number;
                             }
                          
                          ?></td>
                             @else
                              <td class="de_de">N/A</td>
                            @endif
                            <td class="de_de">By</td>
                             <td><?php
                            $name = DB::table('driver')->where('id',$collecteddetails->driverid)->first();
                             if(!empty($name))
                             {
                            echo $name->name;
                             }
                          ?></td>
                          </tr>
                          
                          @endforeach
                          
                          
                           @foreach ($jobdelivered as $jobdelivered)
                          <tr>
                            <td>Deliver to</td>
                            @if(!empty($jobdelivered->date_time))

                             <td><?php
                            $name = DB::table('jobcustomer')->where('id',$current_job_details->customer)->first();
                             if(!empty($name))
                             {
                            echo $name->customer_name;
                             }
                          ?></td>
                          
                            
                            <td class="de_de">{{$jobdelivered->date_time}}</td>
                            @else
                              <td class="de_de">N/A</td>
                            @endif
                            
                            <td class="de_de">By</td>
                             <td><?php
                            $name = DB::table('driver')->where('id',$jobdelivered->driver_id)->first();
                             if(!empty($name))
                             {
                            echo $name->name;
                             }
                          ?></td>
                          </tr>
                        
                          
                          @endforeach
                          
                          
                          
                      
                    </tbody>
                    
                    </table>
                      
                 
                  
                    <table id="dataTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        
                    <h4 class="c-grey-900 mT-10 mB-30 heading_ei">Collection from Customer</h4>
                    <thead>
                      <tr>
                        <th>Sr no.</th>
                        <th>Type</th>
                        <th>Details</th>
                        <th>Image</th>
                        <th>Screen Shot</th>
                      </tr>
                    </thead>
                      

                     <tbody>
                        <?php
                         $sr=1;
                        ?>
                      
                         @foreach ($jobs as $jobs)
                      <tr>
                        <td>{{ $sr++ }}</td>
                          
                        @if(!empty($jobs->type))
                       <td>{{ $jobs->type}}</td>
                        @else
                              <td class="de_de">N/A</td>
                        @endif
                          @if(!empty($jobs->details))
                       <td>{{ $jobs->details}}</td>
                        @else
                              <td class="de_de">N/A</td>
                        @endif
                          @if(!empty($jobs->image))
                      <td><img src="{!! asset('/uploads').'/'.$jobs->image !!}" width="150px" height="100px"> </img></td>
                       @else
                              <td class="de_de">N/A</td>
                        @endif
                          @if(!empty($jobs->screenshot))
                        <td><img src="{!! asset('/uploads').'/'.$jobs->screenshot !!}" width="150px" height="100px"> </img></td>
                        @endif
                       
                       
                    @endforeach

                      
                      </tr>
                     
                    </tbody>
                   
                  </table>
                  
                   <table id="dataTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                      
                      <h4 class="c-grey-900 mT-10 mB-30 heading_ei"> </h4>
                    <thead>
                      <tr>
                        <th>Car Key</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Note</th>
                        <th>Tool</th>
                        <th>Signature</th>

                      </tr>
                    </thead>
                     <tbody>
                       
                         @foreach ($jobdetails as $jobdetails)
                      <tr>
                       @if(!empty($jobdetails->car_key))
                       <td>{{ $jobdetails->car_key}}</td>
                        @else
                              <td class="de_de">N/A</td>
                       @endif
                       @if(!empty($jobdetails->name))
                       <td>{{ $jobdetails->name}}</td>
                        @else
                              <td class="de_de">N/A</td>
                       @endif
                       @if(!empty($jobdetails->email))
                       <td>{{ $jobdetails->email}}</td>
                        @else
                              <td class="de_de">N/A</td>
                       @endif
                        @if(!empty($jobdetails->note))
                       <td>{{ $jobdetails->note}}</td>
                        @else
                              <td class="de_de">N/A</td>
                       @endif
                       
                        @if(!empty($jobdetails->selecttool))
                       <td><p>
                             <?php 
                                $tools = explode(', ,',$jobdetails->selecttool);
                                
                                foreach($tools as $tool){
                                    echo $tool;
                                    echo "<br>";
                                }
                             ?>
                         </p>
                             
                         </td>
                       @endif
                          @if(!empty($jobdetails->signatureimage))
                      <td><img src="{!! asset('/uploads').'/'.$jobdetails->signatureimage !!}" width="150px" height="100px"> </img></td>
                       @endif
                        
                        
                      </tr>
                        @endforeach
                    </tbody>
                    
                                        <td colspan="7" style="text-align: center;"  >   <button onclick="printDiv('divToPrint')" class="print_bnt">Print</button> <button onclick="sendmailjobs({{$current_job_details->id}})" class="print_bnt">Email</button></td>

                    </table>

                  </table>

                  </table>
                </div>
              </div>
            </div>
          </div>
    
        </div>
         <div id="mainContent">
        </div>
      </main>
 
  <script>
		function printDiv(divName){
			var printContents = document.getElementById(divName).innerHTML;
			var originalContents = document.body.innerHTML;
			document.body.innerHTML = printContents;
			window.print();
			document.body.innerHTML = originalContents;
		}
		
		
		function sendmailjobs(id)
		{
		    
		     window.location.href='{!! asset("mailjobs")!!}/'+id;
		  
		     
		}
		
	</script>
	

 
 <style type="text/css" media="print" >
          .nonPrintable{display:none;} /*class for the element we don’t want to print*/
         </style>
 
 
 <style>
 
 .table-bordered td {
    color: #000;
    font-weight: 500!important;
    width: 147px;
}
 td.de_de{
     font-weight:400!important;
 }
 div#dataTable_filter {
    display: none;
}
 div#dataTable_length {
    display: none;
}
 
 button.print_bnt {
    background: #f14c17;
    color: #fff;
    font-size: 17px;
    padding: 6px 26px;
    border: none;
    border-radius: 5px;
}
 
 #dataTable_info, div#dataTable_paginate{
     display:none;
 }
 
 div#dataTable_length {
    margin-bottom: 13px;
}
.heading_ei{
    margin-bottom: 0px !important;
    padding-left: 5px;
    font-weight: 700;
    font-size: 14px !important;
    color: #000000 !important;
    BACKGROUND: #f2f2f2;
    PADDING: 7PX 18PX;
    BORDER-RADIUS: 0PX; 
}
     
 </style>
 
 

@endsection