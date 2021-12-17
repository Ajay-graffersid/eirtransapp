@extends('masterlayout')
 
@section('title')
  Truck Edit
 @endsection
 
@section('content')

 <main class="main-content bgc-grey-100">
        <div id="mainContent">
          <div class="row gap-20 ">
              
             
              
            <div class="masonry-item col-md-10" style="    margin: 0 auto;">
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
                <h6 class="c-grey-900">Edit Truck</h6>
                <div class="mT-30">
                  <form method='post' action="{!! asset('updateTruck') !!}">
                       <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
                       <input type = "hidden" name = "id" value = "{{$truck->id}}">
                    <div class="form-group"><label for="exampleInputEmail1">Truck Number</label><input type="text" name="truck_number"
                        class="form-control" id="exampleInputEmail1" value="{{$truck->truck_number}}" aria-describedby="emailHelp"
                        placeholder="Enter Truck Number" required ></div>
                        
                        
                          
                          <button type="submit" class="btn btn-primary">Submit</button>
                  </form>
                </div>
              </div>
            </div>
         



            

      

          </div>
        </div>
      </main>
 
 
 

@endsection