@extends('masterlayout')
 
@section('title')
  Car Collection Details
 @endsection
 
@section('content')

<main class="main-content bgc-grey-100">
        <div id="mainContent">
             <div class="peer" style="float: right;"><a href="{!! asset('create/customer') !!}"><button class="btn btn-primary">Add Car Collection</button></a></div>
          <div class="container-fluid">
            <h4 class="c-grey-900 mT-10 mB-30">Car Collection Details</h4>
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
                        <th>Date</th>
                        <th>Customer</th>
                        <th>Make Model</th>
                        <th>Reg</th>
                        <th>Collection Address</th>
                        <th>Delivery Address</th>
                        <th>Lane</th>
                        <th>Book in Date</th>
                        <th>Rate</th>
                      </tr>
                    </thead>
                   
                    <tbody>
                        <?php
                         $sr=1;
                        ?>
                        @foreach ($car_for_collection as $car_for_collection)
                      <tr>
                        <td>{{ $sr++ }}</td> 
                        <td>{{ $car_for_collection->date }}</td>
                         <td>{{ $car_for_collection->customer }}</td>
                          <td>{{ $car_for_collection->make_model }}</td>
                           <td>{{ $car_for_collection->reg }}</td>
                            <td>{{ $car_for_collection->collection_address }}</td>
                      
                         <td>{{ $car_for_collection->deliver_address }}</td>
                         <td>{{ $car_for_collection->lane }}</td>
                         <td>{{ $car_for_collection->book_in_date }}</td>
                          <td>{{ $car_for_collection->rate }}</td>
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