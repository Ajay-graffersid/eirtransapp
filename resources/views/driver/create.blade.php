@extends('layouts.master')
 
@section('title')
  Add Driver
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
        
           @if(isset($msg_error))
         <div class = "alert alert-danger">
            <ul>
              
                  <li>{{$msg_error}}</li>
              
            </ul>
         </div>
      @endif
       
              <div class="bgc-white p-20 bd">
                <h6 class="c-grey-900">Add Driver</h6>
                <div class="mT-30">
                  <form method='post' action="{{route('driver.store') }}">
                       <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
                       
                    <div class="form-group row">
                        
                        <label for="exampleInputEmail1" class="col-sm-2 col-form-label">Name</label>
                            <div class="col-sm-10">
                        <input type="text" name="name"
                        class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                        placeholder="Enter Driver Name">
                           </div>
                        </div>
                        
                        
                    <div class="form-group row">
                        
                        <label for="exampleInputPassword1" class="col-sm-2 col-form-label">Pincode</label>
                         <div class="col-sm-10">
                        <input type="text" name="pincode"
                        class="form-control" id="exampleInputPassword1" placeholder="Enter Pincode">
                        </div>    </div>
                        
                        
                        <div class="form-group row">
                            
               <label for="exampleInputPassword1" class="col-sm-2 col-form-label">Mobile No.</label>
                   <div class="col-sm-10">
                    <input type="number"
                        class="form-control" id="exampleInputPassword1" placeholder="Enter Mobile No." name="mobile"></div>
                        </div>
                        
                          
                          <button type="submit" class="btn btn-primary">Submit</button>
                  </form>
                </div>
              </div>
            </div>
         



            

      

          </div>
        </div>
      </main>
 
 
 

@endsection