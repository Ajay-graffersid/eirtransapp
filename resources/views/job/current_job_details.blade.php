@extends('layouts.master')
 
@section('title')
View Reg .Details
 @endsection
 
@section('content')

<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="/resources/demos/style.css">

<link rel="stylesheet" href="{{asset('css/main.css')}}">
<link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">

<main class="main-content bgc-grey-100">
  <div id="mainContent">
    <div class="peer" style="float: right;">
      <!-- <a href="{!! asset('importCustomer') !!}"><button class="btn btn-primary">Import</button></a> -->
      <!-- <a href="{{ route('lanes.index') }}"><button class="btn btn-primary">Back</button></a> -->
    </div>
    <div class="container-fluid">
      <!-- <h4 class="c-grey-900 mT-10 mB-30">Add Lane</h4> -->
      <div class="row">
        <div class="col-md-12">
          @if(Session::get('msg'))
            <div class = "alert alert-success">
              <ul>
                <li> {{Session::get('msg')}}</li>
              </ul>
            </div>
          @endif
<!-- ***************************************************** -->
       
<section>
		<div class="container-fluid">
			<div class="row">
				<div class="cus-header full-width">
					<div class="container">
						<div class="row">
							<div class="col-xl-12 col-lg-12 col-md-12">
								<div class="header-box">
									<p class="header-first">Find out its true history today</p>
									<p class="header-second">Don't Regret it, Motor Check it</p>

									<div class="cus-ticket-box">
										<span class="ticket-icon"><img src="../assets/static/images/eu-stars.svg" width="25"></span>
										<form method='post' action="{{ route('check-Reg') }}">
                                            @csrf
										<input type="text" name="reg"  placeholder="ENTER REG"><button type="submit">Start Check</button>
										</form>
									</div>

									<p class="small-text">Get your FREE report now. Irish & UK vehicles accepted</p>
								</div>
							</div>
						</div>						
					</div>
				</div>
			</div>
		</div>
	</section>
              

         

<!-- ***********************************************************         -->
        </div>  <!--  ///end (  <div class="col-md-12">) -->
      </div>    <!-- ////end (<div class="row">) -->
    </div>
  </div>
</main>
 
 <style>
     .dataTables_wrapper {
    overflow: auto;
    padding-bottom: 5px;
}
 </style>
 

@endsection