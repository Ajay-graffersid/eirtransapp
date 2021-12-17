@extends('masterlayout')
 
@section('title')
  Load Builder Details
 @endsection
 
@section('content')

<main class="main-content bgc-grey-100">
        <div id="mainContent">
             <div class="peer" style="float: right;"><a href="{!! asset('create/customer') !!}"><button class="btn btn-primary">Add Load Builder</button></a></div>
          <div class="container-fluid">
            <h4 class="c-grey-900 mT-10 mB-30">Load Builder Details</h4>
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
                        <th>Customer</th>
                        <th>Car</th>
                        <th>Reg</th>
                        <th>Location for Collection</th>
                        <th>Lane</th>
                        <th>Date</th>
                        <th>Load number</th>
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