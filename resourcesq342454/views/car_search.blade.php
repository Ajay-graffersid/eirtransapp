@extends('masterlayout')
 
@section('title')
  Car Details
 @endsection
 
@section('content')

<main class="main-content bgc-grey-100">
    
    
     <div id="mainContent">
          <div class="container-fluid">
            <h4 class="c-grey-900 mT-10 mB-30">Car Details</h4>
            <div class="row">
              <div class="col-md-12">
                    @if(Session::get('msg'))
         <div class = "alert alert-success">
            <ul>
              
             <li> {{Session::get('msg')}}</li>
              
            </ul>
         </div>
               @endif
</br>
                <div class="bgc-white bd bdrs-3 p-20 mB-20">
                       <td>
                      <div class="card-body" style="padding:0px; text-align:right; margin-top: -44px;">
               <br>@csrf 
                <a class="btn btn-info" href="{{ url('export') }}"> 
                 Export File</a> &nbsp;  <button class="ri_btn" onClick="window.print()">Print</button> </br>
            
                </td></br>
                 
                 
                  <table id="dataTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                      <tr>
                        <th> Sr no.</th>
                        <th> Customer</th>
                        <th> Job Number</th>
                        <th> Make Model</th>
                        <th> Reg</th>
                        <th> Location</th>
                        <th> Status</th>
                        <th> View Details</th>

                        
                      </tr>
                    </thead>
                   
                    <tbody>
                        <?php
                         $sr=1;
                        ?>
                        
                        @foreach ($car_search as $car_search)
                      <tr>
                       <td>{{ $sr++ }}</td>
                       <td>{{ $car_search->customer_name}}</td>
                       <td>{{ $car_search->job_number}}</td>
                       <td>{{ $car_search->make_model}}</td>
                       <td>{{ $car_search->reg}}</td>
                       <td>{{ $car_search->location}}</td>
                       
                        @if($car_search->status=='4')
                         <td><a class="view_btn">Delivery</a></td> 
                         @else
                         <td><a class="view_btn">Pending</a></td> 
                          @endif
                        <td >
                        <a href="" class="btn btn-info editcol">View</a>

                        
                       
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
     
     div#dataTable_length {
    margin-top: 18px;
}
      button.ri_btn {
    background: #f14c17;
    color: #fff;
    padding: 7px 19px;
    border-radius: 4px;
    border: 0;
      text-align: right;
}
     
 </style>

@endsection