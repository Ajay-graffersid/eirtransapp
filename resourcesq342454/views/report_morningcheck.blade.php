@extends('masterlayout')
 
@section('title')
  Morning Check Report
 @endsection
 
@section('content')

<main class="main-content bgc-grey-100" id="divToPrint">
        <div id="mainContent">
          <div class="container-fluid">
            <h4 class="c-grey-900 mT-10 mB-30">Morning Check Report</h4>
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
                    
                                                        <form action="{{ url('searchbarmorningcheck')}}" method="post"> Search By Morning Date: <input type="date" name="datatime"> <input type="submit" value="search"></form>
<td>
                      <div class="card-body" style="padding:0px; text-align:right; margin-top: -44px;">
               <br>@csrf 
                <a class="btn btn-info" href="{{ url('export') }}"> 
                 Export File</a> &nbsp;  <button class="ri_btn" onClick="printDiv('divToPrint')">Print</button> </br>
            
                </td>
                </br>
                 
                  <table id="dataTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                      <tr>
                        <th>Sr no.</th>
                        <th>Driver Name</th>
                        <th>Truck Number</th>
                        <th>Mobile</th>
                        <th>Date</th>
                        <th>View</th>
                        
                      </tr>
                    </thead>
                   <tbody>
                      <?php $sr=1; ?>
                      @foreach ($todaymorningcheck as $report)
                        <tr>
                          <td>{{ $sr++ }}</td>
                          <td>{{ $report->drivername }}</td>
                          <td>{{$report->truck_number }}</td>
                          <td>{{$report->mobile }}</td>
                           <td>{{$report->currenttdate }}</td>
                          <td><a href="{{ URL('/iitemlistt/'.$report->driver_id )}} "   class="view_btn">view more</a></td>
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
      
      
       <script>

 
  
  
  function printDiv(divName){
			var printContents = document.getElementById(divName).innerHTML;
			var originalContents = document.body.innerHTML;
			document.body.innerHTML = printContents;
			window.print();
			document.body.innerHTML = originalContents;
		}
		
	
 
 </script>
 
 
 
 <style>
 button.ri_btn {
    background: #f14c17;
    color: #fff;
    padding: 7px 19px;
    border-radius: 4px;
    border: 0;
      text-align: right;
}
 input[type="submit"]{
   background-color: #c14117!important;
    border-color: #c14118!important;
    border: none;
    color: #fff;
    padding: 5px 16px;
    border-radius: 4px;
    font-weight: 500;
 }
     .dataTables_wrapper {margin-top: 2em;}
     
 </style>


@endsection