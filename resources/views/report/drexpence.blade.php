@extends('layouts.master')
 
@section('title')
  Driver Expence
 @endsection
 
@section('content')

<main class="main-content bgc-grey-100" id="divToPrint">
        <div id="mainContent">
             
          <div class="container-fluid">
            <h4 class="c-grey-900 mT-10 mB-30">Driver Expense List</h4>
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
                                  
                                  
    <form action="{{ url('searchbarexpenses')}}" method="post">
        @csrf 
        Search By Expenses Date: <input type="date" name="datatime"> 
    <input type="submit" value="search">
  </form>

             <td>
               <div class="card-body" style="padding:0px; text-align:right; margin-top: -44px;">
               <br> 
                <a class="btn btn-info" href="{{ url('driver_report_export') }}"> 
                 Export File</a></br>
            
             </td></br>
  <br/>

                  <table id="dataTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                      <tr>
                        <th>Sr no.</th>
                        <th> Driver Name</th>
                        <th> Type</th>
                        <th> Date</th>
                        <th> Amount</th>
                        <th> Des.</th>
                        <th> Expenses Image</th>
                        
                      </tr>
                    </thead>
                   
                    <tbody>
                        <?php
                         $sr=1;
                        ?>
                        
                        @foreach ($drexpences as $drexpence)
                      <tr>
                        <td>{{ $sr++ }}</td>
                         <td><?php
                            $name = DB::table('drivers')->where('id',$drexpence->driver_id)->first();
                             if(!empty($name))
                             {
                            echo $name->name;
                             }
                          ?></td>
                        <td>{{ $drexpence->expence_type}}</td>
                        <td>{{ $drexpence->datatime}}</td>
                        <td>{{ $drexpence->amount}}</td>
                        <td>{{ $drexpence->description}}</td>
                        <td><img src="{!! asset('/uploads').'/'.$drexpence->image !!}" width="150px" height="100px"> </img></td>
                       
                      </tr>
                        @endforeach
                    </tbody>
                      <td colspan="7" style="text-align: center;"  >   <button onclick="printDiv('divToPrint')" class="print_bnt">Print</button> </td>

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