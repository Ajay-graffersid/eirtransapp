@extends('layouts.master')
 
@section('title')
  Customer Details
 @endsection
 
@section('content')

<main class="main-content bgc-grey-100">
  <div id="mainContent">
    <div class="peer" style="float: right;">
      <!-- <a href="{!! asset('importCustomer') !!}"><button class="btn btn-primary">Import</button></a> -->
      <a href="{{ route('roles.index') }}"><button class="btn btn-primary">Back</button></a>
    </div>
    <div class="container-fluid">
      <h4 class="c-grey-900 mT-10 mB-30">Show Role</h4>
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
            {{ $role->name }}
        </div>
        </div>
          <div class="form-group">
            <strong>Permissions:</strong>
            @if(!empty($rolePermissions))
                @foreach($rolePermissions as $v)
                    <label class="label label-success">{{ $v->name }},</label>
                @endforeach
            @endif
        </div>




           
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