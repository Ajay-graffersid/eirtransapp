@extends('layouts.master')
 
@section('title')
  Add Job
 @endsection
 
@section('content')

<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="/resources/demos/style.css">

 <main class="main-content bgc-grey-100">
        <div id="mainContent">
        <div class="peer" style="float: right;">
      <!-- <a href="{!! asset('importCustomer') !!}"><button class="btn btn-primary">Import</button></a> -->
       <a href="{{ route('job.index') }}"><button class="btn btn-primary">Back</button></a>
    </div>
          <div class="row gap-20 ">
            <div class="masonry-item col-md-7" style=" ">
              @if (count($errors) > 0)
               <div class = "alert alert-danger">
                  <ul>
                     @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                     @endforeach
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
              <div class="bgc-white p-20 bd">
                <h6 class="c-grey-900">Add Job</h6>
                <div class="mT-30">
                  <form method='post' action="{{route('job.store')}}" enctype="multipart/form-data">
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
                            <option value="{{$customer->id}}"{{ (Request::old("customer_id") == $customer->id ? "selected":"") }}> {{$customer->name}} </option>
                           @endforeach
                        </select>
                      </div>
                    </div>
                    
                     
                    <div class="form-group row">    
                      <label for="reg" class="col-sm-2 col-form-label">Car Reg</label>
                      <div class="col-sm-10">
                        <input type="text" name="reg" id="regg" class="form-control"  value="{{ Request::old('reg') }}" aria-describedby="emailHelp" required >
                      <!-- </br> <input type="button" id="reg"  value="SEARCH"> -->
                      </div>
                     
                    </div>
                 
                    <div class="form-group row">    
                      <label for="make_model" class="col-sm-2 col-form-label">Model</label>
                      <div class="col-sm-10">
                        <input type="text" name="make_model" class="form-control"  value="{{ Request::old('make_model') }}" id="make_model" aria-describedby="emailHelp" required>
                      </div>
                    </div>
                    
                      <!-- <div class="form-group row">    
                      <label for="make_model" class="col-sm-2 col-form-label">Model</label>
                      <div class="col-sm-10">
                        <input type="text" name="model" class="form-control" id="model" aria-describedby="emailHelp" required>
                      </div>
                    </div> -->
                    
                     <div class="form-group row">    
                      <label for="vin_number" class="col-sm-2 col-form-label">VIN Number</label>
                      <div class="col-sm-10">
                        <input type="text" name="vin_number" class="form-control"  value="{{ Request::old('vin_number') }}" id="vinnumber" aria-describedby="emailHelp" required>
                      </div>
                    </div>



                    <div class="form-group row">    
                      <label for="location" class="col-sm-2 col-form-label">Location</label>
                      <div class="col-sm-10">
                       
                       <select name="location" required class="form-control">
                           <option value="">Select Location</option> 
                           <option value="UK" @if (old('location') == 'UK') selected="selected" @endif>UK</option> 
                           <option value="Ireland" @if (old('location') == 'Ireland') selected="selected" @endif>Ireland</option> 
                       </select>
                       
                      </div>
                    </div>

                    <div class="form-group row">    
                      <label for="collection_address" class="col-sm-2 col-form-label">Collection Address</label>
                      <div class="col-sm-10">
                        <input type="text" name="collection_address" class="form-control" value="{{ Request::old('collection_address') }}" id="collection_address" aria-describedby="emailHelp" required>
                      </div>
                    </div>

                    <div class="form-group row">    
                      <label for="delivery_address" class="col-sm-2 col-form-label">Delivery Address</label>
                      <div class="col-sm-10">
                        <input type="text" name="delivery_address" class="form-control" value="{{ Request::old('delivery_address') }}" id="delivery_address" aria-describedby="emailHelp" required>
                      </div>
                    </div>

                    <div class="form-group row">    
                      <label for="booking_date" class="col-sm-2 col-form-label">Booking Date</label>
                      <div class="col-sm-10">
                        <input type="date" name="booking_date" class="form-control" value="{{ Request::old('booking_date') }}" id="booking_date"  aria-describedby="emailHelp" required>
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="lan"class="col-sm-2 col-form-label" >Lane</label>
                      <div class="col-sm-10">
                        <select id="lan" class="form-control" name="lane_id" required>
                          <option value="">Select Lane</option>
                          @foreach ($lanes as $lane)
                           
                            <option value="{{$lane->id}}" {{ (Request::old("lane_id") == $lane->id ? "selected":"") }}> {{$lane->lane_type}} </option>
                          @endforeach
                        </select>
                      </div> 
                    </div> 


                    <div class="form-group row">    
                      <label for="relese_code" class="col-sm-2 col-form-label">Release Code</label>
                      <div class="col-sm-10">
                        <input type="text" name="relese_code" min="0" class="form-control" value="{{ Request::old('relese_code') }}" id="relese_code" aria-describedby="emailHelp"    >
                      </div>
                    </div>
                    
                     <div class="form-group row">    
                      <label for="eori" class="col-sm-2 col-form-label">EORI</label>
                      <div class="col-sm-10">
                        <input type="text" name="eori" min="0" class="form-control" value="{{ Request::old('eori') }}" id="eori" aria-describedby="emailHelp"    >
                      </div>
                    </div>
                    
                    
                    <div class="form-group row">    
                      <label for="commcode" class="col-sm-2 col-form-label">COMM CODE</label>
                      <div class="col-sm-10">
                        <input type="text" name="commcode" min="0" class="form-control" value="{{ Request::old('commcode') }}" id="commcode" aria-describedby="emailHelp"    >
                      </div>
                    </div>
                    
                     <div class="form-group row">    
                      <label for="weight" class="col-sm-2 col-form-label">Weight</label>
                      <div class="col-sm-10">
                        <input type="text" name="weight" min="0" class="form-control" value="{{ Request::old('weight') }}" id="weight" aria-describedby="emailHelp"    >
                      </div>
                    </div>
                    
                     <div class="form-group row">    
                      <label for="curr" class="col-sm-2 col-form-label">Currency</label>
                      <div class="col-sm-10">
                        <input type="text" name="curr" min="0" class="form-control"  id="curr" aria-describedby="emailHelp"  value="£" readonly>
                      </div>
                    </div>
                    
                    
                    <div class="form-group row">    
                      <label for="value" class="col-sm-2 col-form-label">Value</label>
                      <div class="col-sm-10">
                        <input type="text" name="value" min="0" class="form-control"  value="{{ Request::old('value') }}" id="value" aria-describedby="emailHelp"    >
                      </div>
                    </div>
                    
                     <div class="form-group row">    
                      <label for="shipimo" class="col-sm-2 col-form-label">Ship IMO</label>
                      <div class="col-sm-10">
                        <input type="text" name="shipimo" min="0" class="form-control" value="{{ Request::old('shipimo') }}" id="shipimo" aria-describedby="emailHelp"    >
                      </div>
                    </div>
                    
                    <div class="form-group row">    
                      <label for="eta" class="col-sm-2 col-form-label">ETA</label>
                      <div class="col-sm-10">
                        <input type="date" name="eta" min="0" class="form-control" value="{{ Request::old('eta') }}" id="eta"  aria-describedby="emailHelp">
                      </div>
                    </div>
                    
                
                    
                    <div class="form-group row">    
                      <label for="bill_of_laden" class="col-sm-2 col-form-label">Bill of Laden</label>
                      <div class="col-sm-10">
                        <input type="text" name="bill_of_laden" min="0" class="form-control" value="{{ Request::old('bill_of_laden') }}" id="bill_of_laden" aria-describedby="emailHelp"    >
                      </div>
                    </div>
                    
                    
                     <div class="form-group row">    
                      <label for="description" class="col-sm-2 col-form-label">Description</label>
                      <div class="col-sm-10">
                        <input type="text" name="description" min="0" class="form-control" value="{{ Request::old('description') }}" id="description" aria-describedby="emailHelp"    >
                      </div>
                    </div>
                    
                     <div class="form-group row">    
                      <label for="inv_ref" class="col-sm-2 col-form-label">Invoice Ref.</label>
                      <div class="col-sm-10">
                        <input type="text" name="inv_ref" min="0" class="form-control" value="{{ Request::old('inv_ref') }}" id="inv_ref" aria-describedby="emailHelp"    >
                      </div>
                    </div>
                    
                    
                     <div class="form-group row">    
                      <label for="inv_ref" class="col-sm-2 col-form-label">Invoice</label>
                      <div class="col-sm-10">
                        <input type="file" name="inv_file[]"  class="form-control" value="{{ Request::old('inv_file[]') }}" id="inv_file" aria-describedby="emailHelp" multiple>
                      </div>
                    </div>
                    
                    
                    

                    <div class="form-group row">    
                      <label for="rate" class="col-sm-2 col-form-label">Rate</label>
                      <div class="col-sm-10">
                        <input type="text" name="rate" min="0" class="form-control" value="{{ Request::old('rate') }}" id="rate" aria-describedby="emailHelp"    >
                      </div>
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </main>

<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
  /*$(function() {
    $( "#booking_date" ).datepicker({
      dateFormat: "yy-mm-dd"
    });
  });*/
  
  $('#customer_id').on('change',function(){
      var cust_id = $(this).val();
      
      
      var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
      //return false;
      $.ajax({
        url: '{!! asset('getDeliveryAddress') !!}',
        type: 'post',
        data: {_token: CSRF_TOKEN,cust_id: cust_id},
        success: function(response){
          $('#delivery_address').val(response.collection_address);
           $('#commcode').val(response.mobile);
            $('#eori').val(response.eori_number);
        }
      });
  });
  
  
  
  $('#reg').on('click',function(){
      var reg = $(regg).val();
     
      
      var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
      //return false;
     $.ajax({
        url: '{!! asset('getMoterRegCheck') !!}',
        type: 'post',
        data: {_token: CSRF_TOKEN,reg: reg},
        success: function(response){
           $('#make_model').val(response.make);
           $('#model').val(response.model);
           $('#vinnumber').val(response.vin);
         
        }
      });
      
      
  });
  
</script>

@endsection