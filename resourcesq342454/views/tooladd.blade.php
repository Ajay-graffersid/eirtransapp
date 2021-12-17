@extends('masterlayout')
 
@section('title')
  Tool Create
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
              <h6 class="c-grey-900">Add Tool</h6>
              <div class="mT-30">
                <form method='post' action="{!! asset('saveTool') !!}">
                  <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
                  <div class="form-group row">
                    <label for="exampleInputEmail1" class="col-sm-2 col-form-label" >Name</label>
                    <div class="col-sm-10">
                      <input type="text"  required  name="type" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter  Name">
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