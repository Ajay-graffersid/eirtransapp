@extends('masterlayout')
 
@section('title')
  Customer Details
 @endsection
 
@section('content')

<main class="main-content bgc-grey-100">
  <div id="mainContent">
    <div class="peer" style="float: right;">
      <a href="{!! asset('importCustomer') !!}"><button class="btn btn-primary">Import</button></a>
      <a href="{!! asset('create/customer') !!}"><button class="btn btn-primary">Add Customer</button></a>
    </div>
    <div class="container-fluid">
      <h4 class="c-grey-900 mT-10 mB-30">Customer Details</h4>
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
            <table id="dataTable" class="table table-striped table-bordered" cellspacing="0" width="2000px">
              <thead>
                <tr>
                  <th>Sr no.</th>
                  <th>Customer ID</th>
                  <th>Name</th>
                  <th>Address</th>
                  <th>City</th>
                  <th>Country</th>
                  <th>County</th>
                  <th>Post Code</th>
                  <th>Contact</th>
                  <th>Email Address</th>
                  <th>TAN Number</th>
                  <th>EORI Number</th>
                  <th>Notes</th>
                  <th>Action</th>
                </tr>
              </thead>     
              <tbody>
                <?php $sr=1; ?>
                @foreach ($customers as $customer)
                <tr>
                  <td>{{ $sr++ }}</td> 
                  <td>{{ $customer->customer_id }}</td>
                  <td>{{ $customer->customer_name }}</td>
                  <td>{{ $customer->collectionaddress }}</td>
                  <td>{{ $customer->city }}</td>
                  <td>{{ $customer->country }}</td>
                  <td>{{ $customer->county }}</td>
                  <td>{{ $customer->post_code }}</td>
                  <td>{{ $customer->mobile}}</td>
                  <td>{{ $customer->email_address }}</td>
                  <td>{{ $customer->tan_number}}</td>
                  <td>{{ $customer->eori_number}}</td>
                  <td>{{ $customer->additional_comment }}</td>
                  <td style="width: 152px;" >
                    <a href="{{ url('customer/editCustomer').'/'.$customer->id }}" class="btn btn-info editcol" desibale>Edit</a>
                    <!--<a href="{{ url('customer/deleteCustomer').'/'.$customer->id }}" class="btn btn-primary">Delete</a>-->
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
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