
<!doctype html>
<html lang="" class="page-home">


<head>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>



  <style>
  
 .header_top {padding-top: 15px;}
    .addresss_details p { font-weight: 600; font-size:16px;}
   .addresss_details { text-align: center; margin-top: 1em;}
   p.second_pa {font-size: 19px;}
   .eitran_taable>tbody>tr>td {    border: 1px solid #000; font-weight: 600;font-size: 16px;    width: 16%;}
   .table_section{padding-top: 20px;}
   
    </style>


</head>


<body>
<div class="main-wrapper">

<div class="header_top">
<div class="container">
  <div class="row">

			<div class="col-sm-4 col-lg-4">

								<a href="">
						<img src="https://eirtrans.ie/wp-content/uploads/2018/02/Eirtrans-logo.jpg" alt="Eirtrans" id="logo" data-height-percentage="100" data-actual-width="208" data-actual-height="93">
					</a>

			</div><!-- END LOGO -->

			<div class="col-sm-8 col-lg-8">
            <div  class="addresss_details">
            
            <p>Eirtrans Logistics Ltd Brownstown Road Newcastle Co Dublin</p>
            <p class="second_pa"> Tel: 01-6012791</p>
            <p>Email: collections@eirtrans.ie, Web:https://eirtrans.ie</p>
            </div>

			</div>
            
            <!-- END CONTACT -->

		</div>
    </div>
 </div>

    <div class="table_section">
    <div class="container">
  <div class="row">

 
    <table id="dataTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                  <thead>
                    <tr>
                      <th>Sr no.</th>
                      <th>Job No.</th>
                      <th>CUSTOMER NAME</th>
                      <th>Make</th>
                      <th>Model</th>
                      <th>Reg</th>
                      <th>Location</th>
                      <th>Collection Address</th>
                      <th>Delivery Address</th>
                      <th>Booking Date</th>
                      <th>Lane</th>
                      <th>Rate</th>
                      <th>Vin Number</th>
                      <!--<th>Status</th>-->
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $sr=1; ?>
                    @foreach ($jobs as $jobs)
                    
                      <tr>
                        <td>{{ $sr++ }}</td>
                        <td>{{ $jobs->job_number }}</td>
                         <td>{{$jobs->customer }}</td>
                        <td>{{$jobs->make_model }}</td>
                        <td>{{$jobs->model }}</td>
                        <td>{{$jobs->reg }}</td>
                        <td>{{$jobs->location }}</td>
                        <td>{{$jobs->collection_address }}</td>
                        <td>{{$jobs->delivery_address }}</td>
                        <td>{{$jobs->booking_date }}</td>
                        <td>{{$jobs->lan }}</td>
                        <td>{{$jobs->rate }}</td>
                        <td>{{$jobs->vin_number}}</td>
                      </tr>
                    @endforeach
                </tbody>
                  
                 </table>
                  
               

</div>


</div>
    </div>



</div>


</body></html>
