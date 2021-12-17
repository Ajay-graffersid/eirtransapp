@extends('masterlayout')
@section('title')
  Notification Details
@endsection
 
@section('content')

<main class="main-content bgc-grey-100">
        <div id="mainContent">
           
          <div class="container-fluid">
            <h4 class="c-grey-900 mT-10 mB-30">Notification Details</h4>
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
                 
                  <table id="dataTable" class="table table-striped table-bordered text-left" cellspacing="0" width="100%">
                    <thead>
                      <tr>
                        <th>Sr no.</th>
                        <th>Load Number</th>
                        <th>Load Name</th>
                        <th>Truck Image</th>
                        <th>Screenshot</th>
                        <th>Action</th>
                       
                
                      </tr>
                    </thead>
                    <tbody>
                      <?php $sr=1; ?>
                      @foreach ($notification_details as $noti)
                           
                           <?php
                          $chk= DB::select('select *from carsfordelivery where load_id=?',[$noti->id]);
                           if(empty($chk))
                           {
                              $chks= DB::select('select *from finaltruck_screenshot where load_id=?',[$noti->id]);  
                               ?>
                          
                       
                        <tr>
                          <td>{{ $sr++ }}</td>
                          <td>{{$noti->loadnumber }}</td>
                          <td>{{$noti->load_title }}</td>
                        
                          
                          
                           
                          <td> @if(!empty($chks))<img src="{!! asset('/uploads').'/'.$chks[0]->image!!}" width="150px" height="100px"> </img>  @endif</td>
                          <td> @if(!empty($chks))<img src="{!! asset('/uploads').'/'.$chks[0]->screenshot !!}" width="150px" height="100px"> </img>@endif</td>
                          
                        
                          
                          
                         
                          <td> <a href="{{ url('addshipinng').'/'.$noti->id.'/'.$noti->driver_id }}" class="btn btn-primary">Add Shipping Address</a></td>
                        
                        </tr>
                       <?php
                         }
                          
                           ?>
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