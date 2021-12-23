@extends('layouts.master')
 
@section('title')
  Morning Check Details
 @endsection
 
@section('content')

<main class="main-content bgc-grey-100"  id="divToPrint">
        <div id="mainContent">
             
          <div class="container-fluid">
            <h4 class="c-grey-900 mT-10 mB-30">Morning Check Details</h4>
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
                        <th>Driver</th>
                        <th>Truck Number</th>
                        <th>Items</th>
                        <th>General</th>
                        <th>Trailer Id</th>
                        <th>Mileage</th>
                        <th>Date</th>
                         
                      </tr>
                    </thead>
                   
                    <tbody>
                        <?php $sr=1; ?>
                        @foreach ($items as $item)
                        <?php 
                            $item_data = json_decode($item->selectitem);

                            // echo "<pre>";
                            // print_r($item_data);die;
                        ?>
                      <tr>
                        <td>{{ $sr++ }}</td>
                        <td><?php 
                            $driver = DB::table('drivers')->where('id',$item->driver_id)->first();
                            if(!empty($driver)){
                                echo $driver->name;
                            }
                        ?></td>
                        <td>{{ $item->trucknumber }}</td>
                         <td>
                          @foreach($item_data->selectitem as $key => $select_items)
                            <p>
                              {{$select_items->item}}: {{$select_items->type}} / Remarks: {{$select_items->remarks}}
                            </p>
                          @endforeach
                          </td>
                          <td>{{ $item->general }}</td>
                          <td>{{ $item->trailerid }}</td>
                           <td>{{ $item->mileage }}</td>
                            <td>{{ $item->datetime }}</td>
                       
                      </tr>
                        @endforeach
                        
                        <td colspan="8" style="text-align: center;"  >   <button onclick="printDiv('divToPrint')">Print</button></td>
                     
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
 
 
 <style type="text/css" media="print" >
          .nonPrintable{display:none;} /*class for the element we don’t want to print*/
         </style>
 

@endsection