@extends('layouts.master')
 
@section('title')
  Lanes list
 @endsection
 
@section('content')

<main class="main-content bgc-grey-100">
  <div id="mainContent">
    <div class="peer" style="float: right;">
      <!-- <a href="{!! asset('importCustomer') !!}"><button class="btn btn-primary">Import</button></a> -->
      <a href="{{ route('lanes.create') }}"><button class="btn btn-primary">Add New Lane</button></a>
    </div>
    <div class="container-fluid">
      <h4 class="c-grey-900 mT-10 mB-30">Lane List</h4>
      <div class="row">
        <div class="col-md-12">
          @if(Session::get('success'))
            <div class = "alert alert-success">
              <ul>
                <li> {{Session::get('success')}}</li>
              </ul>
            </div>
          @endif

        <div class="bgc-white bd bdrs-3 p-20 mB-20">
          <table id="dataTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                      <tr>
                        <th>Sr no.</th>
                        <th>Lane Name</th>
                        <th>Lane Number</th>
                        <th>Status</th>
                        <th>Action</th>
                        
                      </tr>
                    </thead>
                   
                    <tbody>
                        <?php
                         $sr=1;
                        ?>
                        
                        @foreach ($lanes as $lane)
                      <tr>
                        <td>{{ $sr++ }}</td>
                        <td>{{ $lane->lane_type}}</td>
                        <td>{{ $lane->lane_number}}</td>
                          @if($lane->status=='0')
                         <td><a href="{{ url('lane-active').'/'.$lane->id }}" class="view_btn">Active</a></td> 
                         @else
                         <td><a href="{{ url('lane-inactive').'/'.$lane->id }}" class="view_btn">Inactive</a></td> 
                          @endif
                         
                      
                         
                        <td>
                         <form action="{{ route('lanes.destroy',$lane->id) }}" method="POST">
        
                            <!-- <a class="btn btn-info" href="{{ route('lanes.show',$lane->id) }}">Show</a> -->
            
                            <a class="btn btn-primary" href="{{ route('lanes.edit',$lane->id) }}">Edit</a>
        
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
 
 <style>
     .dataTables_wrapper {
    overflow: auto;
    padding-bottom: 5px;
}
 </style>
 

@endsection