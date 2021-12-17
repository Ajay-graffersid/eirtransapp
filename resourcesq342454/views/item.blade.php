@extends('masterlayout')
 
@section('title')
  Item List
 @endsection
 
@section('content')

<main class="main-content bgc-grey-100">
        <div id="mainContent">
             <div class="peer" style="float: right;"><a href="{!! asset('create/item') !!}"><button class="btn btn-primary">Add Item</button></a></div>
          <div class="container-fluid">
            <h4 class="c-grey-900 mT-10 mB-30">Item List</h4>
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
                        
                        @foreach ($items as $item)
                      <tr>
                        <td>{{ $sr++ }}</td>
                        <td>{{ $item->name }}</td>
                        <!--<td>{{ $item->status }}</td>-->
                        @if($item->status=='0')
                         <td><a href="{{ url('itemstatusupdate').'/'.$item->id }}" class="view_btn">Active</a></td> 
                         @else
                         <td><a href="{{ url('iteminctive').'/'.$item->id }}" class="view_btn">Inactive</a></td> 
                          @endif

                        <td >
                        <a href="{{ url('editItem').'/'.$item->id }}" class="btn btn-info editcol">Edit</a>
                        <!--<a href="{{ url('deleteItem').'/'.$item->id }}" class="btn btn-primary">Delete</a>-->
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