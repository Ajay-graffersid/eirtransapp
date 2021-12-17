@extends('layouts.master')
 
@section('title')
  Load Container Edit
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
                <h6 class="c-grey-900">Edit Load Container</h6>
                <div class="mT-30">
                  <form method='post' action="{{ route('loadcontener.update',$loadcontener->id) }}">
                        @csrf
                         @method('PUT')
                 
                    <div class="form-group row">    
                      <label for="loadnumber" class="col-sm-2 col-form-label">Load Number</label>
                      <div class="col-sm-10">
                        <input type="text" name="loadnumber" class="form-control" id="loadnumber" aria-describedby="emailHelp" value="{{$loadcontener->loadnumber}}" readonly>
                      </div>
                    </div>

                    <div class="form-group row">    
                      <label for="load_title" class="col-sm-2 col-form-label">Load Title</label>
                      <div class="col-sm-10">
                        <input type="text" name="load_title" class="form-control" id="load_title" value="{{$loadcontener->load_title}}" aria-describedby="emailHelp" required>
                      </div>
                    </div>
                    
             
               <div class="form-group row">    
                      <label for="load_title" class="col-sm-2 col-form-label">Do You want shipping address?</label>
                      <div class="col-sm-10">
                         <select name="shipping_type" class="form-control" required>
                     
                             <option value="0" @if($loadcontener->shipping_type==0) {{'selected'}} @endif>No</option>
                             <option value="1" @if($loadcontener->shipping_type==1) {{'selected'}} @endif)>Yes</option>
                         </select>
                       
                       
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
@endsection