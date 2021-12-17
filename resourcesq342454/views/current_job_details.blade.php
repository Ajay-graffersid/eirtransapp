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
										<form method='post' action="{!! asset('current_job_details/motorcheckReg') !!}">
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
              
              
              
              <!--<div class="bgc-white p-20 bd">-->
              <!--  <h6 class="c-grey-900">View Reg .Details</h6>-->
              <!--  <div class="mT-30">-->
              <!--    <form method='post' action="{!! asset('current_job_details/motorcheckReg') !!}">-->
              <!--      {{csrf_field()}}-->



              <!--      <div class="form-group row">    -->
              <!--        <label for="reg" class="col-sm-2 col-form-label">Car Reg</label>-->
              <!--        <div class="col-sm-10">-->
              <!--          <input type="text" name="reg" class="form-control" id="reg" aria-describedby="emailHelp" required>-->
              <!--        </div>-->
              <!--      </div>-->

              <!--      <button type="submit" class="btn btn-primary">Submit</button>-->
              <!--    </form>-->
              <!--  </div>-->
              <!--</div>-->
            </div>
          </div>
        </div>
      </main>

<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>


@endsection