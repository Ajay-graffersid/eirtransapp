@extends('layouts.master')
 
@section('title')
  Job Report
 @endsection
 
@section('content')

<main class="main-content bgc-grey-100" id="divToPrint">
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
                          <td>{{$job->user->name}}</td>
                          <td>{{$job->make_model}} / {{$job->model}}</td>
                          <td>{{$job->reg }}</td>
                          <td>{{$job->location }}</td>
                          <td>{{$job->collection_address }}</td>
                          <td>{{$job->delivery_address }}</td>
                          <td>{{$job->booking_date }}</td>
                          <td>{{$job->lane->lane_number}}</td>
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
                           <td>  @if($job->bookingstatus=='9') <a href="{{ url('view_job_notcolleectedreport/list').'/'.$job->id }}" class="btn btn-info editcol">View</a> @endif @if($job->bookingstatus=='3')<a href="{{ url('view_job_report/list').'/'.$job->id }}" class="btn btn-info editcol">View</a> @endif @if($job->bookingstatus=='7')<a href="{{ url('view_job_report/list').'/'.$job->id }}" class="btn btn-info editcol">View</a> @endif @if($job->bookingstatus!='9' and $job->bookingstatus!='3' and $job->bookingstatus!='7'and $job->bookingstatus!='0')<a href="{{ url('view_job_report/list').'/'.$job->id }}" class="btn btn-info editcol">View</a> @endif  </td>
                      </tr>
                      @endforeach
              </tbody>
                  </table>
                  
                  
                   <div class="bgc-white tbl bd bdrs-3 p-20 mB-20">
          
            <h4 class="c-grey-900 mT-10 mB-30">Shipping Details</h4>
            
           
             <table  class="table table-striped table-bordered" cellspacing="0" width="100%">
                 
                 
                 @foreach ($shiping as $shiping)
       
                      
                        <tr>
                            <td>Shipping Ref</td>
                             <td class="de_de">{{$shiping->shippingref}}</td>
                          </tr>
                          
                          
                           
                          
                            <tr>
                            <td>Route/Carrier</td>
                             <td class="de_de">{{$shiping->route}}</td>
                          </tr>
                          
                          
                          
                            <tr>
                            <td>Registration</td>
                             <td class="de_de">{{$shiping->registration}}</td>
                          </tr>
                          
                          
                            <tr>
                            <td>Date of Travel </td>
                             <td class="de_de">{{$shiping->dateoftravel}}</td>
                          </tr>
                          
                          
                             <tr>
                            <td>Time </td>
                             <td class="de_de">{{$shiping->time}}</td>
                          </tr>
                            @endforeach

                         
                          <td colspan="7" style="text-align: center;"  >   <button onclick="printDiv('divToPrint')" class="print_bnt">Print</button> </td>

                 </table>
          </div> 
                  
                  

                </div>
              </div>
            </div>
          </div>
        </div>
      </main>
      
      

 
 <script>

  function jobsearchbylane()
  {
    
     var lane = $('#lane_btn').val();
       
    
      
  window.location.href='{!! asset("jobsearchbylane")!!}/'+lane;   
             
  }
  
  
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