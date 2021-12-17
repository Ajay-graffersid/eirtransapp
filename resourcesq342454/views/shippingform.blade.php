@extends('masterlayout')
 
@section('title')
  Add Shipping Address
 @endsection
 
@section('content')

  <main class="main-content bgc-grey-100">
    <div id="mainContent">
      <div class="row gap-20 ">
        <div class="masonry-item col-md-7" style="">
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
              <h6 class="c-grey-900">Shipping</h6>
              <div class="mT-30">
                 <form method='post' action="{!! asset('/savesipingd') !!}" id="tt" >
        
                       <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
                  
                  
                   

  <div class="form-group row">
                        
                        <label for="exampleInputEmail1"  class="col-sm-2 col-form-label leb"> Shipping Ref</label>
                    
                    
                    <div class="col-md-10">                    
                    <input type="text" name="shippingref"
                        class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                        size="4" required></div></div>

 
                  
                  
                  <div class="form-group row">
                        
                        <label for="exampleInputEmail1"  class="col-sm-2 col-form-label leb"> Customer Ref</label>
                    
                    
                    <div class="col-md-10">                    
                    <input type="text" name="cusref"
                        class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                        size="4" required></div></div>
                        
                       
                         <div class="form-group row">
                        
                        <label for="exampleInputEmail1"  class="col-sm-2 col-form-label leb"> PBN Number</label>
                    
                    
                    <div class="col-md-10">                    
                    <input type="text" name="pbnnumber"
                        class="form-control" id="pbnnumber" aria-describedby="emailHelp"
                        size="4" required></div></div>
                  
                  
                
                    <div class="form-group row">
                        
                        <label for="exampleInputEmail1"  class="col-sm-2 col-form-label leb">Customer</label>
                    
                    
                    <div class="col-md-10">                    
                    <input type="text" name="customer"
                        class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                        size="4" required></div></div>

 
                  
                  
                  
                  
                  
                  
                  
                    <div class="form-group row">
                        
                        <label for="exampleInputEmail1"  class="col-sm-2 col-form-label leb">Carrier</label>
                    
                    
                    <div class="col-md-10">                    
                    <input type="text" name="carrier"
                        class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                        size="4" required></div></div>

                        
                        
                        
                         <div class="form-group row">
                             
                             <label for="exampleInputEmail1" class="col-sm-2 col-form-label leb">Route</label>
                               <div class="col-md-10">    
                             <input type="text" name="route"
                        class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                        placeholder="Enter item name" size="4" required></div> </div>
                        
                         <div class="form-group row">
                             
                             <label for="exampleInputEmail1" class="col-sm-2 col-form-label leb">Registration</label>
                             
                               <div class="col-md-10">    
                             <input type="text" name="registration"
                        class="form-control" required id="exampleInputEmail1" aria-describedby="emailHelp"
                       size="4"></div></div>
                        
                        
                         <div class="form-group row">
                             <label class="col-sm-2 col-form-label leb" for="exampleInputEmail1">Date of Travel</label>
                         
                            <div class="col-md-10">
                         <input type="date" required name="dateoftravel"
                        class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                       size="4"></div></div>
                        
                   
                    <div class="form-group row">
                        
                        <label for="exampleInputEmail1" class="col-sm-2 col-form-label leb">Day</label>
                       
                       
                        <div class="col-md-10">

                        <input type="text" name="day"
                        class="form-control" required id="exampleInputEmail1" aria-describedby="emailHelp"
                       size="4"></div></div>
                        
                        
                   
                    <div class="form-group row"><label for="exampleInputEmail1" class="col-sm-2 col-form-label leb">Time</label>
                    
                      <div class="col-md-10">
                    <input type="time" name="time"
                        class="form-control" id="exampleInputEmail1" required aria-describedby="emailHelp"
                        size="4">  </div> 
                        </div>
                        
                        
                        
                            <div class="form-group row"><label for="exampleInputEmail1" class="col-sm-2 col-form-label leb">Contents</label>
                    
                      <div class="col-md-10">
                    <input type="text"  required name="contents"
                        class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                        size="4">  </div> 
                        </div>
                
                        
                        
                        
                    <div class="form-group row">
                            
                            <label for="exampleInputEmail1" class="col-sm-2 col-form-label leb">Length</label>
                        
                         <div class="col-md-10">
                        <input type="text" name="lenght"
                        class="form-control" required id="exampleInputEmail1" aria-describedby="emailHelp"
                       size="4"></div></div>
                  
                   
                          <div class="form-group row">
                        
                        <label for="exampleInputEmail1"  class="col-sm-2 col-form-label leb"> MRN Number</label>
                    
                    
                    <div class="col-md-10">                    
                    <input type="text" name="mrnnumber"
                        class="form-control" id="mrnnumber" aria-describedby="emailHelp"
                        size="4" required></div></div>
                        
                     <div class="form-group row">
                        
                        <label for="exampleInputEmail1"  class="col-sm-2 col-form-label leb"> IMO Number</label>
                    
                    
                    <div class="col-md-10">                    
                    <input type="text" name="imo"
                        class="form-control" id="imo" aria-describedby="emailHelp"
                        size="4" required></div></div>
                        
                        <div class="form-group row">
                        
                        <label for="exampleInputEmail1"  class="col-sm-2 col-form-label leb"> ETA</label>
                    
                    
                    <div class="col-md-10">                    
                    <input type="text" name="eta"
                        class="form-control" id="eta" aria-describedby="emailHelp"
                        size="4" required></div></div>
                     
                     <div class="form-group">
                          <label for="exampleInputEmail1" class="col-sm-2 col-form-label leb"></label>
                          
                        <input type="hidden"  id="did" name="driver_id" value="{{$driver_id}}">
                        
                        <input type="hidden" name="load" id="llid" value="{{$loadid}}">
                        
                        </div>
                        
                     

                        
                    <div class="form-group" style="text-align:center;">
                          
                          <button type="submit" class="btn btn-primary" style="padding: 8px 53px;  margin-top: 17px;">Submit</button>   </div>
                  </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>

@endsection