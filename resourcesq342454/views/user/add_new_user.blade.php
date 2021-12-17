@extends('masterlayout')
 
@section('title')
  Add User
 @endsection
 
@section('content')

<style type="text/css">
  .checkbox-grid li {
    display: block;
    float: left;
    width: 25%
  }
</style>

<!-- <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="/resources/demos/style.css"> -->

 <main class="main-content bgc-grey-100">
        <div id="mainContent">
          <div class="row gap-20 ">
            <div class="masonry-item col-md-10" style=" ">
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
                <h6 class="c-grey-900">Create User</h6>
                <div class="mT-30">
                  <form method='post' action="{!! asset('saveNewUser') !!}">
                    {{csrf_field()}}

                    <div class="form-group row">    
                      <label for="name" class="col-sm-2 col-form-label">Name</label>
                      <div class="col-sm-10">
                        <input type="text" name="name" class="form-control" id="name" required>
                      </div>
                    </div>

                    <div class="form-group row">    
                      <label for="email" class="col-sm-2 col-form-label">Email</label>
                      <div class="col-sm-10">
                        <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" required>
                      </div>
                    </div>

                    <div class="form-group row">    
                      <label for="mobile" class="col-sm-2 col-form-label">Mobile</label>
                      <div class="col-sm-10">
                        <input type="text" name="mobile" class="form-control" id="mobile" maxlength="10" aria-describedby="emailHelp" required>
                      </div>
                    </div>

                    <div class="form-group row">    
                      <label for="password" class="col-sm-2 col-form-label">Password</label>
                      <div class="col-sm-10">
                        <input type="password" name="password" class="form-control" id="password" aria-describedby="emailHelp" required>
                      </div>
                    </div>

                    <div class="form-group row">    
                      <label class="col-sm-2 col-form-label">Roles</label>
                      <div class="col-sm-10">
                        <div class="row">
                          <ul class="checkbox-grid">
                            @foreach($roles as $key => $value)
                            <li>
                              <input type="checkbox" name="rules[]" id="text{{$key}}" value="{{$key}}">&nbsp;<label for="text">{{$value}}</label>
                            </li>
                            @endforeach
                          </ul>
                        </div>
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

<!-- <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
  $(function() {
    $( "#booking_date" ).datepicker({
      dateFormat: "yy-mm-dd"
    });
  });
</script> -->

@endsection