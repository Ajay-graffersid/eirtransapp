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
                            <td class="de_de">{{ $current_job_details->customer}}</td>
                            
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
                          <a href="" class="view_btn">Not Collected</a>
                          @endif
                            @if($current_job_details->bookingstatus=='3')
                          <a href="" class="view_btn green-btn">Job Complete</a>
                          @endif
                          
                          </td>
                          </tr>
                          
                          
                          
                 
                 </table>
          
          
          
          
          </div>
      
                <div class="bgc-white bd bdrs-3 p-20 mB-20">
                    
                      
                  <table id="dataTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                      
                      <h4 class="c-grey-900 mT-10 mB-30">Job's Journey</h4>
                    
                     <tbody>
                         
                         <tr>
                            <td>Created on</td>
                            <td class="de_de">{{$current_job_details->updated_at}}</td>
                            <td class="de_de">By</td>
                            
                             <td><?php
                            $name = DB::table('admin')->where('id',1)->first();
                                 if(!empty($name))
                             {
                                echo $name->email;
                             }
                          ?></td>
                          </tr>
                          
                          @foreach ($loaddetails as $loaddetails)
                        @endforeach
                         @foreach ($driver as $driver)
                     
                        @endforeach
                        
                         <tr>
                            <td>Added in load</td>
                             <td class="de_de">{{$loaddetails->load_title}} - {{$loaddetails->loadnumber}}</td>
                            <td class="de_de">By</td>
                           <td class="de_de">{{$loaddetails->updated_at}}</td>
                          </tr>
                         <tr>
                          
                          
                        @foreach ($loadsassign as $loadsassign)
                        @endforeach
                        
                         <tr>
                            <td>Assigned to </td>
                            <td class="de_de">{{$driver->name}}</td>
                             <td class="de_de">ON</td>
                             <td class="de_de">{{$loadsassign->date}}</td>
                         
                          </tr>
                      
                    </tbody>
                  


 <table id="dataTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                      <tr>
                        <th>Name</th>
                        <th>Reason</th>
                        <th>Signature</th>
                      

                      </tr>
                    </thead>
                    
                     <tbody>
                        @foreach ($jobdetails as $jobdetails)
                      <tr>
                        <td>{{ $jobdetails->name}}</td>
                        <td>{{ $jobdetails->reason}}</td>
                        
                       <td><img src="{!! asset('/uploads').'/'.$jobdetails->signature !!}" width="150px" height="100px"> </img></td>
                      
                      </tr>
                        @endforeach
                     
                    </tbody>
                     <td colspan="7" style="text-align: center;"  >   <button onclick="printDiv('divToPrint')" class="print_bnt">Print</button></td>

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