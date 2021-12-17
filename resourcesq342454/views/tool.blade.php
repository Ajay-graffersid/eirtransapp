@extends('masterlayout')
 
@section('title')
  Tool List
 @endsection
 
@section('content')

<main class="main-content bgc-grey-100">
        <div id="mainContent">
             <div class="peer" style="float: right;"><a href="{!! asset('addTool') !!}"><button class="btn btn-primary">Add New Tool</button></a></div>
          <div class="container-fluid">
            <h4 class="c-grey-900 mT-10 mB-30">Tool List</h4>
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
                        <th>Item Name</th>
                        <th>Status</th>
                        <th>Action</th>
                        
                      </tr>
                    </thead>
                   
                    <tbody>
                        <?php
                         $sr=1;
                        ?>
                        
                        @foreach ($tools as $tool)
                      <tr>
                        <td>{{ $sr++ }}</td>
                        <td>{{ $tool->type }}</td>
                        <!--<td>{{ $tool->status }}</td>-->
                        @if($tool->status=='0')
                         <td><a href="{{ url('toolstatusupdate').'/'.$tool->id }}" class="view_btn">Active</a></td> 
                         @else
                         <td><a href="{{ url('toolinctive').'/'.$tool->id }}" class="view_btn">Inactive</a></td> 
                          @endif

                        <td >
                        <a href="{{ url('editTool').'/'.$tool->id }}" class="btn btn-info editcol">Edit</a>
                        <!--<a href="{{ url('deleteTool').'/'.$tool->id }}" class="btn btn-primary">Delete</a>-->
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
 
 
 

@endsection