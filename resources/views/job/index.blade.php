@extends('layouts.master')
 
@section('title')
  Job Details
 @endsection
 
@section('content')

<main class="main-content bgc-grey-100" id="divToPrint">
  <div id="mainContent">
    <div class="peer" style="float: right;">
      <a href="{{route('importJobs')}}"><button class="btn btn-primary">Import</button></a>
      <a href="{{route('job.create')}}"><button class="btn btn-primary">Add Job</button></a>
    </div>
    <div class="container-fluid">
      <h4 class="c-grey-900 mT-10 mB-30">Job Details</h4>
        <div class="row">
          <div class="col-md-12">
            @if(Session::get('msg'))
              <div class = "alert alert-success">
                <ul>
                  <li> {{Session::get('msg')}}</li>
                </ul>
              </div>
            @endif
            
               @if(Session::get('msg_error'))
              <div class = "alert alert-danger">
                <ul>
                  <li> {{Session::get('msg_error')}}</li>
                </ul>
              </div>
            @endif

            <div class="bgc-white bd bdrs-3 p-20 mB-20">
              <form action="{{ asset('searchjob_by_booking_date')}}" method="post"> 
                @csrf
                Search By Booking Date: <input type="date" name="booking_date"> 
                <input type="submit" value="search">
              </form><br/>
                
               Search By Location: <select onchange="getcardetailsbylocation(this.value)">
              <option value"">Select Location</option>
              <option value"UK">UK</option>
              <option value"Ireland">Ireland</option>
               
               </select> <a href="{!! asset('car_details/list') !!}">Refresh</a>
              
                 <td>
                      <div class="card-body" style="padding:0px; text-align:right; margin-top: -44px;">
               <br>@csrf 
                <a class="btn btn-info" href="{{ url('export') }}"> 
                 Export File</a> &nbsp;  <button class="ri_btn" onClick="printDiv('divToPrint')">Print</button> </br>
            
                </td></br>

                <table id="dataTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                  <thead>
                    <tr>
                      <th>Sr no.</th>
                      <th>Job No.</th>
                      <th>CUSTOMER NAME</th>
                      <!-- <th>Make</th> -->
                      <th>Model</th>
                      <th>Reg</th>
                      <th>Location</th>
                      <th>Collection Address</th>
                      <th>Delivery Address</th>
                      <th>Booking Date</th>
                      <th>Lane</th>
                       <th>EORI</th>
                       <th>Relese code</th>
                        <th>Comm Code</th>
                        <th>Weight</th>
                        <th>Curr</th>
                        <th>Value</th>
                        <th>Ship Imo</th>
                        <th>ETA</th>
                        <th>Bill Of Laden</th>
                        <th>Description</th>
                      <th>Rate</th>
                      <th>VIN Number</th>
                      
                      <!--<th>Status</th>-->
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $sr=1; ?>
                    @foreach ($jobs as $job)
                      <tr>
                        <td>{{ $sr++ }}</td>
                        <td>{{ $job->job_number }}</td>
                        <td>{{$job->user->name}}  </td>
                        <td>{{$job->make_model }}</td>
                        <!-- <td>{{$job->model }}</td> -->
                        <td>{{$job->reg }}</td>
                        <td>{{$job->location }}</td>
                        <td>{{$job->collection_address }}</td>
                        <td>{{$job->delivery_address }}</td>
                        <td>{{$job->booking_date }}</td>
                        <td>{{$job->lane->lane_type}}     </td>
                        
                        <td>{{$job->eori }}</td>
                        <td>{{$job->relese_code }}</td>
                          <td>{{$job->commcode }}</td>
                          <td>{{$job->weight }}</td>
                          <td>{{$job->curr }}</td>
                          <td>{{$job->value }}</td>
                          <td>{{$job->shipimo }}</td>
                          <td>{{$job->eta }}</td>
                          <td>{{$job->bill_of_laden }}</td>
                          <td>{{$job->description }}</td>
                        <td>{{$job->rate }}</td>
                        <td>{{$job->vin_number}}</td>


                        <td>
                         <form action="{{ route('job.destroy',$job->id) }}" method="POST">
        
                            <!-- <a class="btn btn-info" href="{{ route('job.show',$job->id) }}">Show</a> -->
            
                            <a class="btn btn-primary" href="{{ route('job.edit',$job->id) }}">Edit</a>
        
                            @csrf
                            @method('DELETE')
            
                            <button type="submit" class="btn btn-danger">Delete</button>
                         </form>
                    </td>

                        
                        <!--<td>{{ $job->status == 1 ? "Active" : "Inactive" }}</td>-->
                        <!-- <td> -->
                          <!-- <a href="{{ url('job_details/editJob').'/'.$job->id }}" class="btn btn-info editcol">Edit</a> -->
                          <!--<a href="{{ url('job_details/deleteJob').'/'.$job->id }}" class="btn btn-primary">Delete</a>-->
                        <!-- </td> -->
                      </tr>
                    @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
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
 
 
  <style>
     
     div#dataTable_length {
    margin-top: 18px;
}
      button.ri_btn {
    background: #f14c17;
    color: #fff;
    padding: 7px 19px;
    border-radius: 4px;
    border: 0;
}
      .dataTables_wrapper {margin-top: 2em; overflow-x: auto;}
 </style>
 
 <script>
    function getcardetailsbylocation(loc)
    {
         
    window.location.href='{!! asset("getjobdetailsbylocations")!!}/'+loc;
        
    }
 </script>

@endsection