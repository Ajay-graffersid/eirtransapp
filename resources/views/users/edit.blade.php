@extends('layouts.master')
 
@section('title')
  Customer Details
 @endsection
 
@section('content')

<main class="main-content bgc-grey-100">
  <div id="mainContent">
    <div class="peer" style="float: right;">
      <!-- <a href="{!! asset('importCustomer') !!}"><button class="btn btn-primary">Import</button></a> -->
      <a href="{{ route('users.index') }}"><button class="btn btn-primary">Back</button></a>
    </div>
    <div class="container-fluid">
      <h4 class="c-grey-900 mT-10 mB-30">Edit User</h4>
      <div class="row">
        <div class="col-md-12">
          @if(Session::get('success'))
            <div class = "alert alert-success">
              <ul>
                <li> {{Session::get('success')}}</li>
              </ul>
            </div>
          @endif 

      
                          
     
                
          @foreach ($errors->all() as $error)
       
          <div class="alert alert-success">
            <li>{{$error}}</li>         
          </div>
           @endforeach

          <div class="bgc-white bd bdrs-3 p-20 mB-20">
           
             <?php 
            $ro=session::get( 'ro' );
              print_r($ro[0]);
             ?>

    <form method='post' action="{{route('users.update',$user->id)}}" id="quickForm"> 

                <!-- <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>"> -->
                @csrf
               @method('PUT')
                  
                <div class="form-group row">             
                  <label for="customer_name" class="col-sm-2 col-form-label">User Role</label>
                  <div class="col-sm-10">
                  <!-- {!! Form::select('roles[]', $roles,[], array('class' => 'form-control','multiple')) !!} -->
                  <select name="roles[]" class="form-control" id="rolesss" onchange="chnage(this.value)">
                  @foreach ($roles as $role)
                    <?php if(session::get( 'ro' )) {
                       $ro=session::get( 'ro' ); ?>
                      
                <option value="{{$role}}"<?php if($role==$ro[0]){echo 'selected';} ?>>{{$role}} </option>
                       
                  <?php  }else{?>

                    <option value="{{$role}}"<?php if($role==$userRole){echo 'selected';} ?>>{{$role}} </option>
                <?php  }
                       
                    ?>
                  
                
                  @endforeach
                  </select>
                  </div>      
                </div>  


                <div class="form-group row">             
                  <label for="Name" class="col-sm-2 col-form-label"> Name</label>
                  <div class="col-sm-10">
                  {!! Form::text('name', $user->name, array('placeholder' => 'Name','class' => 'form-control')) !!}
                  </div>      
                </div>  
                
                <div class="form-group row">             
                  <label for="Email" class="col-sm-2 col-form-label">Email</label>
                  <div class="col-sm-10">
                  {!! Form::text('email', $user->email, array('placeholder' => 'Email','class' => 'form-control')) !!}
                  </div>      
                </div>  
                 
                <div class="form-group row">             
                  <label for="Password" class="col-sm-2 col-form-label">Password</label>
                  <div class="col-sm-10">
                  {!! Form::password('password', array('placeholder' => 'Password','class' => 'form-control')) !!}
                  </div>    
                </div>


                <div class="form-group row">             
                  <label for="confirm-password" class="col-sm-2 col-form-label">Confirm Password</label>
                  <div class="col-sm-10">
                  {!! Form::password('confirm-password', array('placeholder' => 'Confirm Password','class' => 'form-control')) !!}
                  </div>    
                </div>
                
                  
                <div class="form-group row " >             
                  <label for="customer_name" class="col-sm-2 col-form-label">TAN Number</label>
                  <div class="col-sm-10">
                    <input type="text" name="tan_number" value="{{$user->tan_number}}" class="form-control" id="tan_number" aria-describedby="emailHelp" placeholder="Enter TAN number" required>
                  </div>      
                </div>
                
                   <div class="form-group row hd">             
                  <label for="customer_name" class="col-sm-2 col-form-label">EORI Number</label>
                  <div class="col-sm-10">
                    <input type="text" name="eori_number" class="form-control" value="{{$user->eori_number}}" id="eori_number" aria-describedby="emailHelp" placeholder="Enter EORI number" required>
                  </div>      
                </div>
                <!-- <div class="form-group row hd">             
                  <label for="email_address" class="col-sm-2 col-form-label">Emails</label>
                  <div class="col-sm-10">                      
                      
                
                    <div id="addDiv" hd>
                           <div class="row">

                              <div class="">
                                 <div class="form-group" >
                                    <div class="col-sm-12">
                                       <input type="text" name="email[]"   placeholder="email"  class="form-control" autocomplete="off" required >
                                    </div>
                                 </div>
                              </div>

                             

                              <div class="col-sm-2">
                                 <div class="form-group" >
                                    <div class="col-sm-12">
                                       <button type="button" class="btn btn-primary addCF"><i class="fa fa-plus" aria-hidden="true"></i></button>
                                    </div>
                                 </div>
                              </div>

                           </div>
                       </div>
                  </div>      
                </div>    -->
                   
                <div class="form-group row hd">
                  <label for="collectionaddress" class="col-sm-2 col-form-label">Customer Address</label>    
                  <div class="col-sm-10">
                    <input type="text" name="address" value="{{$user->address}}" class="form-control" id="address" aria-describedby="emailHelp" placeholder="Enter Address" required>
                  </div>
                </div>

                <div class="form-group row hd">
                  <label for="city" class="col-sm-2 col-form-label">City</label>    
                  <div class="col-sm-10">
                    <input type="text" name="city"  value="{{$user->city}}" class="form-control" id="city" aria-describedby="emailHelp" placeholder="Enter city" required>
                  </div>
                </div>

                <div class="form-group row hd">
                  <label for="county" class="col-sm-2 col-form-label">County</label>    
                  <div class="col-sm-10">
                    <input type="text" name="county" value="{{$user->county}}" class="form-control" id="county" aria-describedby="emailHelp" placeholder="Enter county" required>
                  </div>
                </div>

                <div class="form-group row hd">
                  <label for="country" class="col-sm-2 col-form-label">Country</label>    
                  <div class="col-sm-10 hd">
                    <input type="text" name="country" value="{{$user->country}}" class="form-control" id="country" aria-describedby="emailHelp" placeholder="Enter country" required>
                  </div>
                </div>

                <div class="form-group row hd">        
                  <label for="post_code" class="col-sm-2 col-form-label">Post Code</label>        
                  <div class="col-sm-10 hd">
                    <input type="text" name="post_code" value="{{$user->post_code}}" class="form-control" id="post_code" aria-describedby="emailHelp" placeholder="Enter post code" required>
                  </div>
                </div>
                   
                <div class="form-group row hd">
                  <label for="mobile" class="col-sm-2 col-form-label">Customer Contact</label>     
                  <div class="col-sm-10">
                    <input type="text" name="mobile" value="{{$user->mobile}}" class="form-control" id="mobile" aria-describedby="emailHelp" placeholder="Customer Contact" required>
                  </div>
                </div>

                <div class="form-group row hd">
                  <label for="longitude" class="col-sm-2 col-form-label">Longitude</label>     
                  <div class="col-sm-10">
                    <input type="text" name="longitude" value="{{$user->longitude}}" class="form-control" id="longitude" aria-describedby="emailHelp" placeholder="longitude" required>
                  </div>
                </div>


                <div class="form-group row hd">
                  <label for="latitude" class="col-sm-2 col-form-label">Latitude</label>     
                  <div class="col-sm-10">
                    <input type="text" name="latitude" value="{{$user->latitude}}" class="form-control" id="latitude" aria-describedby="emailHelp" placeholder="latitude" required>
                  </div>
                </div>
                
                <div class="form-group row hd ">        
                  <label for="additional_comment"  class="col-sm-2 col-form-label">Notes</label>
                  <div class="col-sm-10">
                      
                   <textarea rows="8" cols="50" placeholder="Enter name" name="additional_comment" class="form-control" id="additional_comment" aria-describedby="emailHelp"
                    placeholder="Enter name" required>{{$user->additional_comment}}</textarea>
                      
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
 
 <style>
     .dataTables_wrapper {
    overflow: auto;
    padding-bottom: 5px;
}
 </style>
 <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>
 <script type="text/javascript">
   
   jQuery(document).ready(function() {
      var val=jQuery("#rolesss").val();

      //  alert(val);

       if(val=='Admin' || val=="User"){
      //  alert('admin');
      //  $('input').attr('required', false);
       $('input').removeAttr('required');
       $('#additional_comment').removeAttr('required');
      $('.hd').hide();
     }else{
      $('.hd').show();
      $("input").prop('required',true);
      $('#additional_comment').prop('required');
     }
     
});
  

    function chnage(val){
    //  alert(val);
     if(val=='Admin' || val=="User"){
      //  alert('admin');
      //  $('input').attr('required', false);
       $('input').removeAttr('required');
       $('#additional_comment').removeAttr('required');
      $('.hd').hide();
     }else{
      $('.hd').show();
      $("input").prop('required',true);
      $('#additional_comment').prop('required');
     }

    }

 </script>>  
 

@endsection