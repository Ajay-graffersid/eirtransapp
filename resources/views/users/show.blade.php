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
      <h4 class="c-grey-900 mT-10 mB-30">Show User</h4>
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
          <div class="form-group">
            <strong>Name:</strong>
            {{ $user->name }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Email:</strong>
            {{ $user->email }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Roles:</strong>
            @if(!empty($user->getRoleNames()))
                @foreach($user->getRoleNames() as $v)
                    <label class="badge badge-success" id="roll">{{ $v }}</label>
                @endforeach
            @endif
        </div>
    </div>
<!-- ******************************* -->
    <div class="col-xs-12 col-sm-12 col-md-12 hd">
        <div class="form-group">
            <strong>customer_no:</strong>
            {{ $user->customer_no }}
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12 hd">
        <div class="form-group">
            <strong>address:</strong>
            {{ $user->address }}
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12 hd">
        <div class="form-group">
            <strong>city:</strong>
            {{ $user->city }}
        </div>
    </div>


    <div class="col-xs-12 col-sm-12 col-md-12 hd">
        <div class="form-group">
            <strong>country:</strong>
            {{ $user->country }}
        </div>
    </div>



    <div class="col-xs-12 col-sm-12 col-md-12 hd">
        <div class="form-group">
            <strong>county:</strong>
            {{ $user->county }}
        </div>
    </div>



    <div class="col-xs-12 col-sm-12 col-md-12 hd">
        <div class="form-group">
            <strong>post_code:</strong>
            {{ $user->post_code }}
        </div>
    </div>



    <div class="col-xs-12 col-sm-12 col-md-12 hd">
        <div class="form-group">
            <strong>mobile:</strong>
            {{ $user->mobile }}
        </div>
    </div>



    <div class="col-xs-12 col-sm-12 col-md-12 hd">
        <div class="form-group">
            <strong>additional_comment:</strong>
            {{ $user->additional_comment }}
        </div>
    </div>



    <div class="col-xs-12 col-sm-12 col-md-12 hd">
        <div class="form-group">
            <strong>latitude:</strong>
            {{ $user->latitude }}
        </div>
    </div>



    <div class="col-xs-12 col-sm-12 col-md-12 hd">
        <div class="form-group">
            <strong>longitude:</strong>
            {{ $user->longitude }}
        </div>
    </div>



    <div class="col-xs-12 col-sm-12 col-md-12 hd">
        <div class="form-group">
            <strong>tan_number:</strong>
            {{ $user->tan_number }}
        </div>
    </div>



    <div class="col-xs-12 col-sm-12 col-md-12 hd">
        <div class="form-group">
            <strong>eori_number:</strong>
            {{ $user->eori_number }}
        </div>
    </div>


    <div class="col-xs-12 col-sm-12 col-md-12 hd">
        <div class="form-group">
            <strong>created_at:</strong>
            {{ date('d-m-Y',strtotime($user->created_at)) }}
        </div>
    </div>



<!-- **************************************************** -->
           
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
      var val=jQuery("#roll").html();

      //  alert(val);

       if(val=='Admin' || val=="User"){
      //  alert('admin');
      //  $('input').attr('required', false);
     
      $('.hd').hide();
     }else{
      $('.hd').show();
     
     }
     
});

</script>
 

@endsection