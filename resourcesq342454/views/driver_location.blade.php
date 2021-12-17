@extends('masterlayout')
 
@section('title')
  Driver Expence
 @endsection
 
@section('content')

<main class="main-content bgc-grey-100">
        <div id="mainContent">
             
          <div class="container-fluid">
            <h4 class="c-grey-900 mT-10 mB-30">Driver Location List</h4>
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
                                  
                                  

      <td>
                      <div class="card-body" style="padding:0px; text-align:right; margin-top: -44px;">
               <br>@csrf 
               
                </td></br>
  <br/>

                  <table id="dataTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                      <tr>
                        <th>Sr no.</th>
                        <th> Driver Name</th>
                        <th> Address</th>
                        <th> Lat</th>
                        <th> Long</th>
                      </tr>
                    </thead>
                   
                    <tbody>
                        <?php
                         $sr=1;
                        ?>
                        
                        @foreach ($driver_location as $driver_location)
                      <tr>
                        <td>{{ $sr++ }}</td>
                        <td><?php
                            $name = DB::table('driver')->where('id',$driver_location->driverid)->first();
                             if(!empty($name))
                             {
                            echo $name->name;
                             }
                          ?></td>
                        <td>{{ $driver_location->address}}</td>
                        <td>{{ $driver_location->lat_location}}</td>
                        <td>{{ $driver_location->long_location}}</td>
                       
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
     
     div#dataTable_length {
    margin-top: 18px;
}
      button.ri_btn {
    background: #f14c17;
    color: #fff;
    padding: 7px 19px;
    border-radius: 4px;
    border: 0;
}
     
 </style>


@endsection