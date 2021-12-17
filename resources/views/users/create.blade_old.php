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
      <h4 class="c-grey-900 mT-10 mB-30">Create New User</h4>
      <div class="row">
        <div class="col-md-12">
          @if(Session::get('msg'))
            <div class = "alert alert-success">
              <ul>
                <li> {{Session::get('msg')}}</li>
              </ul>
            </div>
          @endif
          <div class="bgc-white bd bdrs-3 p-20 mB-20">
           
         
          {!! Form::open(array('route' => 'users.store','method'=>'POST')) !!}
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Name:</strong>
            {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Email:</strong>
            {!! Form::text('email', null, array('placeholder' => 'Email','class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Password:</strong>
            {!! Form::password('password', array('placeholder' => 'Password','class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Confirm Password:</strong>
            {!! Form::password('confirm-password', array('placeholder' => 'Confirm Password','class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Role:</strong>
            {!! Form::select('roles[]', $roles,[], array('class' => 'form-control','multiple')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>
{!! Form::close() !!}




           
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
 

@endsection