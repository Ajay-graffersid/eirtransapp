@extends('layouts.master')
 @section('title')
  Load Container Create
 @endsection
 
@section('content')

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
                <h6 class="c-grey-900">Create Load Container</h6>
                <div class="mT-30">
                  <form method='post' action="{{route('loadcontener.store')}}">
                    <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
                    <div class="form-group row">    
                      <label for="loadnumber" class="col-sm-2 col-form-label">Load Number</label>
                      <div class="col-sm-10">
                        <input type="text" name="loadnumber" class="form-control" id="loadnumber" aria-describedby="emailHelp" value="{{$load_number}}" readonly>
                      </div>
                    </div>

                    <div class="form-group row">    
                      <label for="load_title" class="col-sm-2 col-form-label">Load Title</label>
                      <div class="col-sm-10">
                        <input type="text" name="load_title" class="form-control" id="load_title" aria-describedby="emailHelp" required>
                      </div>
                    </div>
                   
                     
                       <div class="form-group row">    
                      <label for="load_title" class="col-sm-2 col-form-label">Do You want shipping address?</label>
                      <div class="col-sm-10">
                         <select required name="shipping_type" class="form-control">
                     
                             <option value="0">No</option>
                             <option value="1">Yes</option>
                         </select>
                       
                       
                      </div>
                    </div>
                  
                     
                    <!--   <div class="form-group row">    -->
                    <!--  <label for="load_title" class="col-sm-2 col-form-label">Delivery to client?</label>-->
                    <!--  <div class="col-sm-10">-->
                    <!--     <select required name="delivery_type" class="form-control">-->
                     
                    <!--         <option value="1">Yes</option>-->
                    <!--         <option value="0">No</option>-->
                    <!--     </select>-->
                       
                       
                    <!--  </div>-->
                    <!--</div>-->
                     
                     
                      <input type="hidden" name="load_type" value="1">
                   
                    <input type="hidden" name="type" value="1">
                  

                    <button type="submit" class="btn btn-primary">Submit</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </main>
 
 
 

@endsection