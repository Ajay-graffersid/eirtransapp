@extends('layouts.master')
 
@section('title')
  Edit Job
 @endsection
 
@section('content')

<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="/resources/demos/style.css">

<style>
    .invoice-wrapper{
        display: flex;
        background-color: #e6e6e6;
        margin: 5px 10px 0 0;
        padding: 8px 10px 8px 10px;
        border-radius: 4px;
    }
    .invoice-wrapper a{
        color: #636363;
    }
    .invoice-wrapper img{
        margin: 0 0 0 10px;
    }
</style>

 <main class="main-content bgc-grey-100">
        <div id="mainContent">
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
                <h6 class="c-grey-900">Edit Job</h6>
                <div class="mT-30">
                  <form method='post' action="{!! asset('/updateJobplanner') !!}" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <input type="hidden" name="id" value="{{$jobs->id}}">

                    <div class="form-group row">    
                      <label for="job_number" class="col-sm-2 col-form-label">Job Number</label>
                      <div class="col-sm-10">
                        <input type="text" name="job_number" value="{{$jobs->job_number}}" class="form-control" id="job_number" aria-describedby="emailHelp" readonly>
                      </div>
                    </div>

                    <div class="form-group row">    
                      <label for="customer_id" class="col-sm-2 col-form-label">Customer</label>
                      <div class="col-sm-10">
                        <select id="customer_id" class="form-control" name="customer_id" required>
                           @foreach ($customers as $customer)
                            <option value="{{$customer->id}}" <?php if($jobs->user_id == $customer->id){echo "selected";} ?> > {{$customer->name}} </option>
                           @endforeach
                        </select>
                      </div>
                    </div>

                    <!-- <div class="form-group row">    
                      <label for="make_model" class="col-sm-2 col-form-label">Make</label>
                      <div class="col-sm-10">
                        <input type="text" name="make_model" class="form-control" value="{{$jobs->make_model}}" id="make_model" aria-describedby="emailHelp" required>
                      </div>
                    </div>
                     -->
                     <div class="form-group row">    
                      <label for="make_model" class="col-sm-2 col-form-label">Model</label>
                      <div class="col-sm-10">
                        <input type="text" name="make_model" class="form-control" value="{{$jobs->make_model}}" id="model" aria-describedby="emailHelp" required>
                      </div>
                    </div>
                    
                    
                    
                     <div class="form-group row">    
                      <label for="vin_number" class="col-sm-2 col-form-label">VIN Number</label>
                      <div class="col-sm-10">
                           <input type="text" name="vin_number" class="form-control" value="{{$jobs->vin_number}}" id="model" aria-describedby="emailHelp" required>
                      </div>
                    </div>
                    
                    
                    

                    <div class="form-group row">    
                      <label for="reg" class="col-sm-2 col-form-label">Registration</label>
                      <div class="col-sm-10">
                        <input type="text" name="reg" class="form-control" id="reg" value="{{$jobs->reg}}" aria-describedby="emailHelp" required>
                      </div>
                    </div>

                    <div class="form-group row">    
                      <label for="location" class="col-sm-2 col-form-label">Location</label>
                      <div class="col-sm-10">
                      
                        
                        
                           <select  class="form-control" id="location" name="location" required>
                            <option value="">Select Location</option>
                        
                          <option value="UK" <?php if($jobs->location == 'UK'){echo "selected";} ?> > UK </option>
                          <option value="Ireland" <?php if($jobs->location == 'Ireland'){echo "selected";} ?> > Ireland </option>
                         
                        </select>
                     
                      </div>
                    </div>

                    <div class="form-group row">    
                      <label for="collection_address" class="col-sm-2 col-form-label">Collection Address</label>
                      <div class="col-sm-10">
                        <input type="text" name="collection_address" class="form-control" id="collection_address" value="{{$jobs->collection_address}}" aria-describedby="emailHelp" required>
                      </div>
                    </div>

                    <div class="form-group row">    
                      <label for="delivery_address" class="col-sm-2 col-form-label">Delivery Address</label>
                      <div class="col-sm-10">
                        <input type="text" name="delivery_address" class="form-control" id="delivery_address" aria-describedby="emailHelp" value="{{$jobs->delivery_address}}" required>
                      </div>
                    </div>

                    <div class="form-group row">    
                      <label for="booking_date" class="col-sm-2 col-form-label">Booking Date</label>
                      <div class="col-sm-10">
                        <input type="text" name="booking_date" class="form-control" id="booking_date" aria-describedby="emailHelp" value="{{$jobs->booking_date}}" required readonly>
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="lan"class="col-sm-2 col-form-label" >Lane</label>
                      <div class="col-sm-10">
                        <select id="lan" class="form-control" name="lan" disabled="" >
                            <option value="">Select Lane</option>
                          @foreach ($lanes as $lane)
                            <option value="{{$lane->id}}" <?php if($jobs->lane_id == $lane->id){echo "selected";} ?> > {{$lane->lane_type}} </option>
                          @endforeach
                        </select>
                      </div> 
                    </div> 
                    
                    <div class="form-group row">    
                      <label for="eori" class="col-sm-2 col-form-label">EORI</label>
                      <div class="col-sm-10">
                        <input type="text" name="eori" min="0" class="form-control" id="eori" aria-describedby="emailHelp"  value="{{$jobs->eori}}">
                      </div>
                    </div>
                    
                    
                    <div class="form-group row">    
                      <label for="commcode" class="col-sm-2 col-form-label">COMM CODE</label>
                      <div class="col-sm-10">
                        <input type="text" name="commcode" min="0" class="form-control" id="commcode" aria-describedby="emailHelp"  value="{{$jobs->commcode}}">
                      </div>
                    </div>
                    
                     <div class="form-group row">    
                      <label for="weight" class="col-sm-2 col-form-label">WEIGHT</label>
                      <div class="col-sm-10">
                        <input type="text" name="weight" min="0" class="form-control" id="weight" aria-describedby="emailHelp"  value="{{$jobs->weight}}">
                      </div>
                    </div>
                    
                     <div class="form-group row">    
                      <label for="curr" class="col-sm-2 col-form-label">CURR</label>
                      <div class="col-sm-10">
                        <input type="text" name="curr" min="0" class="form-control" id="curr" aria-describedby="emailHelp"  value="{{$jobs->curr}}">
                      </div>
                    </div>
                    
                    
                    <div class="form-group row">    
                      <label for="value" class="col-sm-2 col-form-label">VALUE</label>
                      <div class="col-sm-10">
                        <input type="text" name="value" min="0" class="form-control" id="value" aria-describedby="emailHelp"  value="{{$jobs->value}}">
                      </div>
                    </div>
                    
                     <div class="form-group row">    
                      <label for="shipimo" class="col-sm-2 col-form-label">SHIP IMO</label>
                      <div class="col-sm-10">
                        <input type="text" name="shipimo" min="0" class="form-control" id="shipimo" aria-describedby="emailHelp"  value="{{$jobs->shipimo}}">
                      </div>
                    </div>
                    
                     <div class="form-group row">    
                      <label for="eta" class="col-sm-2 col-form-label">ETA</label>
                      <div class="col-sm-10">
                        <input type="text" name="eta" min="0" class="form-control" id="eta" aria-describedby="emailHelp"  value="{{$jobs->eta}}">
                      </div>
                    </div>
                    
                    <div class="form-group row">    
                      <label for="bill_of_laden" class="col-sm-2 col-form-label">BILL OF LADEN</label>
                      <div class="col-sm-10">
                        <input type="text" name="bill_of_laden" min="0" class="form-control" id="bill_of_laden" aria-describedby="emailHelp"  value="{{$jobs->bill_of_laden}}">
                      </div>
                    </div>
                    
                    
                     <div class="form-group row">    
                      <label for="description" class="col-sm-2 col-form-label">DESCRIPTION</label>
                      <div class="col-sm-10">
                        <input type="text" name="description" min="0" class="form-control" id="description" aria-describedby="emailHelp"  value="{{$jobs->description}}">
                      </div>
                    </div>
                    
                     <div class="form-group row">    
                      <label for="inv_ref" class="col-sm-2 col-form-label">Inv Ref</label>
                      <div class="col-sm-10">
                        <input type="text" name="inv_ref" min="0" class="form-control" id="inv_ref" aria-describedby="emailHelp"  value="{{$jobs->inv_ref}}">
                      </div>
                    </div>
                    
                    <div class="form-group row">    
                      <label for="inv_ref" class="col-sm-2 col-form-label">Invoice </label>
                      <div class="col-sm-10">
                        <input type="file" name="inv_file[]"  class="form-control" id="inv_file" aria-describedby="emailHelp" >
                        
                        
                        @if (!empty($invoices))
                             @foreach($invoices as $inv)
                             <span class="invoice-wrapper">
                                 <a href="{{ asset("public/uploads/inv") }}/{{ $inv->inv_file }}" download="{{ $inv->inv_file }}">{{ $inv->inv_file }}</a>
                             
                             <a href="{{ url('invoice/delete').'/'.$inv->id }}"><img src="https://eirtransapp.com/test/assets/static/images/trash.svg" width="16"></a></span>
                             
                             
                            @endforeach
                            <br>
                      @endif
                      </div>
                      

                    </div>

                    <div class="form-group row">    
                      <label for="rate" class="col-sm-2 col-form-label">Rate</label>
                      <div class="col-sm-10">
                        <input type="text" name="rate" min="0" class="form-control" id="rate" aria-describedby="emailHelp" value="{{$jobs->rate}}">
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
<script>
  $(function() {
    $( "#booking_date" ).datepicker({
      dateFormat: "yy-mm-dd"
    });
  });
</script> 


@endsection