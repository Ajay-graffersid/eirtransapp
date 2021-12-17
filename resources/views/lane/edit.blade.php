@extends('layouts.master')
 
@section('title')
  Edit Lame
 @endsection
 
@section('content')

<main class="main-content bgc-grey-100">
  <div id="mainContent">
    <div class="peer" style="float: right;">
      <!-- <a href="{!! asset('importCustomer') !!}"><button class="btn btn-primary">Import</button></a> -->
      <a href="{{ route('lanes.index') }}"><button class="btn btn-primary">Back</button></a>
    </div>
    <div class="container-fluid">
      <h4 class="c-grey-900 mT-10 mB-30">Edit Lane</h4>
      <div class="row">
        <div class="col-md-12">
          @if(Session::get('success'))
            <div class = "alert alert-success">
              <ul>
                <li> {{Session::get('success')}}</li>
              </ul>
            </div>
          @endif
          
          @foreach ($errors->all() as $error)
       
       <div class="alert alert-success">
         <li>{{$error}}</li>         
       </div>
        @endforeach

          <div class="bgc-white p-20 bd">
                <h6 class="c-grey-900">Edit Lane</h6>
                <div class="mT-30">
                  <!-- <form method='post' action="{{route('lanes.store')}}"> -->
                  <form action="{{ route('lanes.update',$lane->id) }}" method="POST">
                       <!-- <input type = "hidden" name = "_token" value = "<?php //echo csrf_token(); ?>"> -->
                       
                        @csrf
                         @method('PUT')
                       
                       <div class="form-group row">
                           <label for="exampleInputEmail1" class="col-sm-2 col-form-label">Name</label>
                           
                           <div class="col-sm-10">
                               
                               <input type="text" name="lane_type" value="{{$lane->lane_type}}"
                        class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                        placeholder="Enter Lane" required>
                               
                               </div>
                               </div>
                               
                               
                         <div class="form-group row">
                           <label for="exampleInputEmail1" class="col-sm-2 col-form-label">Lane Number</label>
                           
                           <div class="col-sm-10">
                               
                     <input type="number" name="lane_number" value="{{$lane->lane_number}}"
                        class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                        placeholder="Enter Lane Number" required>
                               
                               </div>
                               </div>
                       
                       
                      
                       
                      
                          
                          <button type="submit" class="btn btn-primary">Submit</button>
                  </form>
                </div>
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