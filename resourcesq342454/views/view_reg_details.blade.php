@extends('masterlayout')
 
@section('title')
 View Reg .Details
 @endsection
 
@section('content')

<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="/resources/demos/style.css">

<link rel="stylesheet" href="../css/main.css">
<link rel="stylesheet" href="../css/bootstrap.min.css">

 <main class="main-content bgc-grey-100">
        <div id="mainContent">
          <div class="row gap-20 ">
            <div class="masonry-item col-md-12" style=" ">
              @if (count($errors) > 0)
               <div class = "alert alert-danger">
                  <ul>
                     @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                     @endforeach
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
              
             <section class="mt-5">
		<div class="container">
			<div class="row">
			    
             
				<div class="col-xl-3">
					<div class="reg-bpx">
						<span class="ticket-icon"><img src="../assets/static/images/eu-stars.svg" width="25"> <br> UK</span>
						<span class="reg-num">{{$reg}}</span>
					</div>
				</div>

				<div class="col-xl-7">
					<div class="cus-details-box">
					     	<p class="bmw-bold"><b>VIN :</b> {{$vin}}</p>
							<p class="bmw-bold">{{$make}} {{$model}}, {{$modelYear}}</p>
					</div>

					<ul class="color-list">
						<li>Body: <span>{{$doors}} Door Estate</span></li>
						<li>Engine Number: <span>{{$engineNumber}}</span></li>
						<li>Engine CC: <span>{{$engineCC}}</span></li>
						<li>Fuel <span>{{$fuel}}</span></li>
					</ul>

					<p class="bmw-text">We have <span>important records</span> for this <span>{{$make}}</span>.</p>
				</div>

				<div class="col-xl-3">
					<div class="car-img">
					<img src="5ES-4.jpeg" alt="" width="150">
					<!--<p>Image is for illustrative purposes only</p>-->
				</div>
				</div>
			</div>
		</div>
	</section>
              
            
            </div>
          </div>
        </div>
      </main>

<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>


@endsection