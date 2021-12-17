@extends('layouts.master')
 
@section('title')
 Create new job
 @endsection
 
@section('content')

<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="/resources/demos/style.css">

<link rel="stylesheet" href="{{asset('css/main.css')}}">
<link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">

<main class="main-content bgc-grey-100">
  <div id="mainContent">
    <div class="peer" style="float: right;">
      <!-- <a href="{!! asset('importCustomer') !!}"><button class="btn btn-primary">Import</button></a> -->
       <a href="{{ route('job.index') }}"><button class="btn btn-primary">Back</button></a>
    </div>
    <div class="container-fluid">
      <h4 class="c-grey-900 mT-10 mB-30">Create Job</h4>
      <div class="row">
        <div class="col-md-12">
          @if(Session::get('msg'))
            <div class = "alert alert-success">
              <ul>
                <li> {{Session::get('msg')}}</li>
              </ul>
            </div>
          @endif
<!-- ***************************************************** -->
       
<form method='post' action="{!! asset('job_details/saveNewJob') !!}" enctype="multipart/form-data">
                    {{csrf_field()}}

                    <div class="form-group row">    
                      <label for="job_number" class="col-sm-2 col-form-label">Job Number</label>
                      <div class="col-sm-10">
                        <input type="text" name="job_number" value="{{$job_number}}" class="form-control" id="job_number" aria-describedby="emailHelp" readonly>
                      </div>
                    </div>

                    <div class="form-group row">    
                      <label for="customer_id" class="col-sm-2 col-form-label">Customer</label>
                      <div class="col-sm-10">
                          
                        <select id="customer_id" class="form-control" name="customer_id" required>
                            <option value=""> Please Select </option>
                           @foreach ($customers as $customer)
                            <option value="{{$customer->id}}"> {{$customer->customer_name}} </option>
                           @endforeach
                        </select>
                      </div>
                    </div>
                    
                     
                    <div class="form-group row">    
                      <label for="reg" class="col-sm-2 col-form-label">Car Reg</label>
                      <div class="col-sm-10">
                        <input type="text" name="reg" id="regg" class="form-control"  aria-describedby="emailHelp" required ></br> <input type="button" id="reg"  value="SEARCH">
                      </div>
                     
                    </div>
                 
                    <div class="form-group row">    
                      <label for="make_model" class="col-sm-2 col-form-label">Make</label>
                      <div class="col-sm-10">
                        <input type="text" name="make_model" class="form-control" id="make_model" aria-describedby="emailHelp" required>
                      </div>
                    </div>
                    
                      <div class="form-group row">    
                      <label for="make_model" class="col-sm-2 col-form-label">Model</label>
                      <div class="col-sm-10">
                        <input type="text" name="model" class="form-control" id="model" aria-describedby="emailHelp" required>
                      </div>
                    </div>
                    
                     <div class="form-group row">    
                      <label for="vin_number" class="col-sm-2 col-form-label">VIN Number</label>
                      <div class="col-sm-10">
                        <input type="text" name="vin_number" class="form-control" id="vinnumber" aria-describedby="emailHelp" required>
                      </div>
                    </div>



                    <div class="form-group row">    
                      <label for="location" class="col-sm-2 col-form-label">Location</label>
                      <div class="col-sm-10">
                       
                       <select name="location" required>
                           <option value="">Select Location</option> 
                           <option value="UK">UK</option> 
                           <option value="Ireland">Ireland</option> 
                       </select>
                       
                      </div>
                    </div>

                    <div class="form-group row">    
                      <label for="collection_address" class="col-sm-2 col-form-label">Collection Address</label>
                      <div class="col-sm-10">
                        <input type="text" name="collection_address" class="form-control" id="collection_address" aria-describedby="emailHelp" required>
                      </div>
                    </div>

                    <div class="form-group row">    
                      <label for="delivery_address" class="col-sm-2 col-form-label">Delivery Address</label>
                      <div class="col-sm-10">
                        <input type="text" name="delivery_address" class="form-control" id="delivery_address" aria-describedby="emailHelp" required>
                      </div>
                    </div>

                    <div class="form-group row">    
                      <label for="booking_date" class="col-sm-2 col-form-label">Booking Date</label>
                      <div class="col-sm-10">
                        <input type="date" name="booking_date" class="form-control" id="booking_date"  aria-describedby="emailHelp" required>
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="lan"class="col-sm-2 col-form-label" >Lane</label>
                      <div class="col-sm-10">
                        <select id="lan" class="form-control" name="lan" required>
                          <option value="">Select Lane</option>
                          @foreach ($lanes as $lane)
                           
                            <option value="{{$lane->id}}"> {{$lane->lane_type}} </option>
                          @endforeach
                        </select>
                      </div> 
                    </div> 


                    <div class="form-group row">    
                      <label for="relese_code" class="col-sm-2 col-form-label">Release Code</label>
                      <div class="col-sm-10">
                        <input type="text" name="relese_code" min="0" class="form-control" id="relese_code" aria-describedby="emailHelp"  value="">
                      </div>
                    </div>
                    
                     <div class="form-group row">    
                      <label for="eori" class="col-sm-2 col-form-label">EORI</label>
                      <div class="col-sm-10">
                        <input type="text" name="eori" min="0" class="form-control" id="eori" aria-describedby="emailHelp"  value="">
                      </div>
                    </div>
                    
                    
                    <div class="form-group row">    
                      <label for="commcode" class="col-sm-2 col-form-label">COMM CODE</label>
                      <div class="col-sm-10">
                        <input type="text" name="commcode" min="0" class="form-control" id="commcode" aria-describedby="emailHelp"  value="">
                      </div>
                    </div>
                    
                     <div class="form-group row">    
                      <label for="weight" class="col-sm-2 col-form-label">Weight</label>
                      <div class="col-sm-10">
                        <input type="text" name="weight" min="0" class="form-control" id="weight" aria-describedby="emailHelp"  value="">
                      </div>
                    </div>
                    
                     <div class="form-group row">    
                      <label for="curr" class="col-sm-2 col-form-label">Currency</label>
                      <div class="col-sm-10">
                        <input type="text" name="curr" min="0" class="form-control" id="curr" aria-describedby="emailHelp"  value="£" readonly>
                      </div>
                    </div>
                    
                    
                    <div class="form-group row">    
                      <label for="value" class="col-sm-2 col-form-label">Value</label>
                      <div class="col-sm-10">
                        <input type="text" name="value" min="0" class="form-control" id="value" aria-describedby="emailHelp"  value="">
                      </div>
                    </div>
                    
                     <div class="form-group row">    
                      <label for="shipimo" class="col-sm-2 col-form-label">Ship IMO</label>
                      <div class="col-sm-10">
                        <input type="text" name="shipimo" min="0" class="form-control" id="shipimo" aria-describedby="emailHelp"  value="">
                      </div>
                    </div>
                    
                    <div class="form-group row">    
                      <label for="eta" class="col-sm-2 col-form-label">ETA</label>
                      <div class="col-sm-10">
                        <input type="date" name="eta" min="0" class="form-control" id="eta"  aria-describedby="emailHelp">
                      </div>
                    </div>
                    
                
                    
                    <div class="form-group row">    
                      <label for="bill_of_laden" class="col-sm-2 col-form-label">Bill of Laden</label>
                      <div class="col-sm-10">
                        <input type="text" name="bill_of_laden" min="0" class="form-control" id="bill_of_laden" aria-describedby="emailHelp"  value="">
                      </div>
                    </div>
                    
                    
                     <div class="form-group row">    
                      <label for="description" class="col-sm-2 col-form-label">Description</label>
                      <div class="col-sm-10">
                        <input type="text" name="description" min="0" class="form-control" id="description" aria-describedby="emailHelp"  value="">
                      </div>
                    </div>
                    
                     <div class="form-group row">    
                      <label for="inv_ref" class="col-sm-2 col-form-label">Invoice Ref.</label>
                      <div class="col-sm-10">
                        <input type="text" name="inv_ref" min="0" class="form-control" id="inv_ref" aria-describedby="emailHelp"  value="">
                      </div>
                    </div>
                    
                    
                     <div class="form-group row">    
                      <label for="inv_ref" class="col-sm-2 col-form-label">Invoice</label>
                      <div class="col-sm-10">
                        <input type="file" name="inv_file[]"  class="form-control" id="inv_file" aria-describedby="emailHelp" multiple>
                      </div>
                    </div>
                    
                    
                    

                    <div class="form-group row">    
                      <label for="rate" class="col-sm-2 col-form-label">Rate</label>
                      <div class="col-sm-10">
                        <input type="text" name="rate" min="0" class="form-control" id="rate" aria-describedby="emailHelp"  value="">
                      </div>
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                  </form>
              

         

<!-- ***********************************************************         -->
        </div>  <!--  ///end (  <div class="col-md-12">) -->
      </div>    <!-- ////end (<div class="row">) -->
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