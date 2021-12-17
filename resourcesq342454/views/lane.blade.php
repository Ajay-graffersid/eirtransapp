@extends('masterlayout')
 
@section('title')
  Lane List
 @endsection
 
@section('content')

<main class="main-content bgc-grey-100">
        <div id="mainContent">
             <div class="peer" style="float: right;"><a href="{!! asset('create/laneadd') !!}"><button class="btn btn-primary">Add New Lane</button></a></div>
          <div class="container-fluid">
            <h4 class="c-grey-900 mT-10 mB-30">Lane List</h4>
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
                        <th>Lane Name</th>
                        <th>Lane Number</th>
                        <th>Status</th>
                        <th>Action</th>
                        
                      </tr>
                    </thead>
                   
                    <tbody>
                        <?php
                         $sr=1;
                        ?>
                        
                        @foreach ($lane as $lane)
                      <tr>
                        <td>{{ $sr++ }}</td>
                        <td>{{ $lane->lane_type}}</td>
                        <td>{{ $lane->lane_number}}</td>
                          @if($lane->status=='0')
                         <td><a href="{{ url('lanestatusupdate').'/'.$lane->id }}" class="view_btn">Active</a></td> 
                         @else
                         <td><a href="{{ url('laneinctive').'/'.$lane->id }}" class="view_btn">Inactive</a></td> 
                          @endif
                         
                        <td >
                        <a href="{{ url('editLane').'/'.$lane->id }}" class="btn btn-info editcol">Edit</a>
                        <!--<a href="{{ url('deleteEdit').'/'.$lane->id }}" class="btn btn-primary">Delete</a>-->
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
 .editcol { background: #72777a; border-color: #72777a;}
 a.btn.btn-info.editcol:hover { background: #72777a;}
 </style>
 

@endsection