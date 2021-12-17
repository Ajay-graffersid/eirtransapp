@extends('masterlayout')
 
@section('title')
  Truck Details
 @endsection
 
@section('content')

<main class="main-content bgc-grey-100">
        <div id="mainContent">
            <div class="peer" style="float: right;"><a href="{!! asset('create/truck') !!}"><button class="btn btn-primary">Add Truck</button></a></div>
          <div class="container-fluid">
            <h4 class="c-grey-900 mT-10 mB-30">Truck Details</h4>
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
                 
                  <table id="dataTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                      <tr>
                        <th>Sr no.</th>
                        <th>Truck Number</th>
                        <th>Status</th>
                        <th>Action</th>
                        

                      </tr>
                    </thead>
                   
                    <tbody>
                        <?php
                         $sr=1;
                        ?>
                        
                        @foreach ($trucks as $truck)
                      <tr>
                        <td>{{ $sr++ }}</td>
                        <td>{{ $truck->truck_number }}</td>
                       
                         @if($truck->truck_status=='0')
                         <td><a href="{{ url('truckstatusupdate').'/'.$truck->id }}" class="view_btn">Active</a></td> 
                         @else
                          <td><a href="{{ url('truckinctive').'/'.$truck->id }}" class="view_btn">Inactive</a></td>
                          @endif
                       

                        
                        <td >
                        <a href="{{ url('editTruck').'/'.$truck->id }}" class="btn btn-info editcol">Edit</a>
                        <a href="{{ url('deleteTruck').'/'.$truck->id }}" class="btn btn-primary">Delete</a>
                        </td>
                       
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
 
 
 

@endsection