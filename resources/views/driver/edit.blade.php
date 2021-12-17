@extends('layouts.master')
 
@section('title')
  Driver Edit
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
                <h6 class="c-grey-900">Edit Driver</h6>
                <div class="mT-30">
                <form action="{{ route('driver.update',$driver->id) }}" method="POST">
                
                          @csrf
                         @method('PUT')
                       
                    <div class="form-group row">
                        
                        <label for="exampleInputEmail1" class="col-sm-2 col-form-label">name</label>
                            <div class="col-sm-10">
                        <input  required type="text" name="name"
                        class="form-control" id="exampleInputEmail1" value="{{$driver->name}}" aria-describedby="emailHelp"
                        placeholder="Enter driver name">
                           </div>
                        </div>
                        
                        
                    <div class="form-group row">
                        
                        <label for="exampleInputPassword1" class="col-sm-2 col-form-label">pincode</label>
                         <div class="col-sm-10">
                        <input type="text" required name="pincode"
                        class="form-control" id="exampleInputPassword1" value="{{$driver->pincode}}" placeholder="enter pincode">
                        </div>    </div>
                        
                        
                        <div class="form-group row">
                            
    <label for="exampleInputPassword1" class="col-sm-2 col-form-label">Mobile No.</label>
                   <div class="col-sm-10">
                    <input type="text"
                        class="form-control" required  id="exampleInputPassword1" value="{{$driver->mobile}}" placeholder="enter mobile no." name="mobile"></div>
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