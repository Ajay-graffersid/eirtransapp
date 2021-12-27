@extends('layouts.master')
 
@section('title')
  Load Report
 @endsection
 
@section('content')

<main class="main-content bgc-grey-100">
        <div id="mainContent">
          <div class="container-fluid">
            <h4 class="c-grey-900 mT-10 mB-30">Load Report</h4>
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
                        <th>Driver Name</th>
                        <th>Load Details.</th>
                        <th>Collection Date</th>
                        <th>Delivery Date</th>
                        <th>Status</th>
                        <th>View</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $sr=1; ?>
                      @foreach ($jobs as $job)
                        <tr>
                          <td>{{ $sr++ }}</td>

                          <td>@if(!empty($job->driver->name)) {{$job->driver->name}}@endif</td>

                          <td>{{ $job->load_title}} - {{ $job->loadnumber}}</td>

                          <td>@if(!empty($job->Jobdelivered->date_time)) {{$job->Jobdelivered->date_time}}@endif</td>

                          <td> @if(!empty($job->Jobdelivered->date_time)) {{$job->Jobdelivered->date_time}}@endif</td>
                        
                           <td>
                            @if($job->status=='4')
                          <a href="" class="view_btn green-btn">Load Complete</a>
                          @endif
                          @if($job->status=='3')
                          <a href="" class="view_btn yellow-btn">In-Progress</a>
                          @endif
                           @if($job->status=='2')
                          <a href="" class="view_btn blue-btn">Load collected </a>
                          @endif
                          </td>
                          
                          <td><a href="{{ url('view_load_details').'/'.$job->id }}" class="view_btn cus-button">VIEW</a></td>
                        
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
     .cus-button{background: #838383 !important;}
     
 </style>

@endsection