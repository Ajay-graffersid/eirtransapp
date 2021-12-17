@extends('masterlayout')
 
@section('title')
  Pods Details
 @endsection
 
@section('content')

<main class="main-content bgc-grey-100">
        <div id="mainContent">
            <div class="peer" style="float: right;"><a href="{!! asset('create/job') !!}"><button class="btn btn-primary">Add Job</button></a></div>
          <div class="container-fluid">
            <h4 class="c-grey-900 mT-10 mB-30">Pods Details</h4>
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
                 
                  <table id="dataTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                      <tr>
                        <th>Sr no.</th>
                        <th>CUSTOMER NAME</th>
                        <th>Collection Date</th>
                        <th>Delivery Date</th>
                        <th>POC Link</th>
                        <th>POD Link</th>
                        <th>POD Link</th>
                        <th>Email Client</th>
                        
                      </tr>
                    </thead>
                   
                  
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </main>
 
 
 

@endsection