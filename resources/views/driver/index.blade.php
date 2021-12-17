@extends('layouts.master')
 
@section('title')
  Driver List
 @endsection
 
@section('content')

<main class="main-content bgc-grey-100">
        <div id="mainContent">
            <div class="peer" style="float: right;"><a href="{{route('driver.create')}}"><button class="btn btn-primary">Add Driver</button></a></div> 
          <div class="container-fluid">
            <h4 class="c-grey-900 mT-10 mB-30">Drivers List</h4>
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
                        <th>Name</th>
                        <th>Pin code</th>
                        <th>Mobile</th>
                        <th>Version</th>
                        <th>Status</th>
                        <th>Action</th>
                        
                      </tr>
                    </thead>
                   
                    <tbody>
                        <?php
                         $sr=1;
                        ?>
                        
                        @foreach ($drivers as $driver)
                      <tr>
                        <td>{{ $sr++ }}</td>
                        <td>{{$driver->name }}</td>
                        <td>{{$driver->pincode }}</td>
                        <td>{{$driver->mobile }}</td>
                        <td>{{$driver->appversion }}</td>
                        
                         <!--<td>{{$driver->driver_status }}</td>-->
                          @if($driver->driver_status=='0')
                         <td><a href="{{ url('driverstatusupdate').'/'.$driver->id }}" class="view_btn">Active</a></td> 
                         @else
                          <td><a href="{{ url('driverinctive').'/'.$driver->id }}" class="view_btn">Inactive</a></td> 
                          @endif
                       

                        <td>
                         <form action="{{ route('driver.destroy',$driver->id) }}" method="POST">
        
                            <!-- <a class="btn btn-info" href="{{ route('driver.show',$driver->id) }}">Show</a> -->
            
                            <a class="btn btn-primary" href="{{ route('driver.edit',$driver->id) }}">Edit</a>
        
                            @csrf
                            @method('DELETE')
            
                            <button type="submit" class="btn btn-danger">Delete</button>
                         </form>
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