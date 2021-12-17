@extends('masterlayout')
 
 @section('title')
  Pods Details
 @endsection
 
@section('content')

<main class="main-content bgc-grey-100" id="divToPrint">
        <div id="mainContent">
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
      
         @if(Session::get('msg_error'))
         <div class = "alert alert-danger">
            <ul>
              
             <li> {{Session::get('msg_error')}}</li>
              
            </ul>
         </div>
      @endif
                <div class="bgc-white bd bdrs-3 p-20 mB-20">
                 
                    <td>
                      <div class="card-body" style="padding:0px; text-align:right; margin-top: -44px;">
               <br>@csrf 
                <a class="btn btn-info" href="{{ url('export') }}"> 
                 Export File</a> &nbsp;  <button class="ri_btn" onClick="printDiv('divToPrint')">Print</button> </br>
            
                </td></br>
                  <table id="dataTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                      <tr>
                        <th>Sr no.</th>
                        <th>Car Registration</th>
                        
                        <th>Delivery Date</th>
                        <th>POD Link</th>

                      </tr>
                    </thead>
                    
                    <tbody>
                        <?php
                         $sr=1;
                         
                        ?>
                        
                        @foreach ($poddetails as $pods)
                        
                        
                      <tr>
                        <td>{{$sr++ }}</td>
                        <?php
                          $cus= DB::select("select *from cardetails where id=?",[$pods->cardetails_id]);
                            ?>
                            
                        <td>@if(!empty($cus)){{$cus[0]->reg}}@endif</td> 	
                        
                        
                        
                        

                        
                        

                     @if(!empty($pods->deliver_date))
                        <td>{{$pods->deliver_date}}</td>
                        <td><a href="{{ url('podlink').'/'.$pods->cardetails_id}}"   class="view_btn cus-button">POD LINK</a></td> 
                        @else
                        <td>Date not found</td>
                        <td><a href=""   class="view_btn cus-button">""</a></td> 
                        @endif
                        <!--<td><a href="{{ url('poc_reportexport').'/'.$pods->cardetails_id }}" class="view_btn">POC PDF</a>    <a href="{{ url('pod_report_export').'/'.$pods->cardetails_id }}" class="view_btn">POD PDF</a></td>-->
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
 .table-striped tbody tr:nth-of-type(odd) { background: none}
 
     .table-bordered thead td, .table-bordered thead th {  background: #f7f7f7;}
       
     div#dataTable_length {
    margin-top: 18px;
}
      button.ri_btn {
    background: #f14c17;
    color: #fff;
    padding: 7px 19px;
    border-radius: 4px;
    border: 0;
      text-align: right;
}
     
 </style>

@endsection