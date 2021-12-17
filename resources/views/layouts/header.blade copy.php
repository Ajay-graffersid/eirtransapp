<?php 
    
   $login= session()->get('login');

   if($login==3){

    $login_id = session()->get('login_id');
    $user = DB::table('jobcustomer')->where('id',$login_id)->first();

  
    $user_roles = explode(',', $user->rules);
    
   }else{
  
  $login_id = session()->get('login_id');
  $user = DB::table('admin')->where('id',$login_id)->first();
  $user_roles = explode(',', $user->rules);
   
   }
?>


<!-- @if($user->roll == 1 || ($user->roll != 1 && in_array(1,$user_roles)))
          
          <li class="nav-item mT-30 active ">
            <a class="sidebar-link" href="{!! asset('/dashboard') !!}" default> <span class="icon-holder"><img src="{!! asset('assets/static/images/home1.png') !!}" alt=""style="width: 77%;" > </span><span class="title">Dashboard</span></a>
          </li>
        @endif

        @if($user->roll == 1 || ($user->roll != 1 && in_array(5,$user_roles)))
          <li class="nav-item">
            <a class="sidebar-link " href="{{ url('customer/list') }}" >
                <span class="icon-holder">   <img src="{!! asset('assets/static/images/icon2.png') !!}" alt=""style="width: 84%;" > </span><span class="title">Customers</span>
            </a>
          </li>
        @endif  -->


<style>

.c-grey-700, .cH-grey-700:hover {
    color: #000000!important;
}
.btn-info {
    color: #fff;
    background-color: #f14c17!important;
    border-color: #f14c17!important;
}
input[type="submit"] {
    background-color: #c14117!important;
    border-color: #c14118!important;
    border: none;
    color: #fff;
    padding: 5px 16px;
    border-radius: 4px;
    font-weight: 500;
}
body, h1, h2, h3, h4, h5, h6 {
    color: #000!important;
}
.table td, .table th {
    padding: 12px;
    padding: .75rem;
    vertical-align: top;
    border-top: 1px solid #000000;
    color: #000;
}

.btn-info.focus, .btn-info:focus {
  
    box-shadow: none!important;
}
.btn-info:not([disabled]):not(.disabled).active, .btn-info:not([disabled]):not(.disabled):active, .show>.btn-info.dropdown-toggle {

    box-shadow:none!important;
}

button:focus {
    outline: 1px dotted;
    outline: 0px auto -webkit-focus-ring-color;
    border: 0 !important;
}


.dataTables_wrapper .dataTables_length select{
        background: #c14117 !important;
        color:#fff !important;
}
.dataTables_wrapper .dataTables_filter input {
    border: 1px solid rgb(0 0 0)!important;
}
     .table-bordered thead td, .table-bordered thead th {
          
    background: #f14c17!important;
    color:#fff !important;

}
.table-bordered, .table-bordered td, .table-bordered th {
    border: 1px solid #000!important;
}
.table {
    border: none!important;
}
input.dis_btn {
    background: #dddddd!important;
    color: #908e8e !important;
    box-shadow: 0px 1px 4px #a29797 inset;
}
   .table-bordered td{color: #000;
  
    font-weight: 500!important;
}
   table.dataTable.no-footer {
    padding-bottom: 7px;
}
table#dataTable {

    border: none !important;
}
    
</style>

<div class="sidebar">
      <div class="sidebar-inner">
        <div class="sidebar-logo">
          <div class="peers ai-c fxw-nw">
            <div class="peer peer-greed"><a class="sidebar-link td-n" href="{!! asset('/dashboard') !!}" class="td-n">
                <div class="peers ai-c fxw-nw">
                  <div class="peer">
                    <div class="logo">
                        <img src="{!! asset('assets/static/images/logoadmin.png') !!}" alt=""style="width: 100%;" >
                        </div>
                  </div>
                  
                </div>
              </a></div>
            <div class="peer">
              <div class="mobile-toggle sidebar-toggle"><a href="#" class="td-n"><i
                    class="ti-arrow-circle-left"></i></a></div>
            </div>
          </div>
        </div>
        <ul class="sidebar-menu scrollable pos-r" id="menuu">

          @if($user->roll == 1 || ($user->roll != 1 && in_array(1,$user_roles)))
          
            <li class="nav-item mT-30 active ">
              <a class="sidebar-link" href="{!! asset('/dashboard') !!}" default> <span class="icon-holder"><img src="{!! asset('assets/static/images/home1.png') !!}" alt=""style="width: 77%;" > </span><span class="title">Dashboard</span></a>
            </li>
          @endif

          @if($user->roll == 1 || ($user->roll != 1 && in_array(5,$user_roles)))
            <li class="nav-item">
              <a class="sidebar-link " href="{{ asset('user.index') }}" >
                  <span class="icon-holder">   <img src="{!! asset('assets/static/images/icon2.png') !!}" alt=""style="width: 84%;" > </span><span class="title">Customers</span>
              </a>
            </li>
          @endif 

          @if($user->roll == 1 || ($user->roll != 1 && in_array(2,$user_roles)))
            <li class="nav-item">
              <a class="sidebar-link" href="{!! asset('lane/list') !!}"><span class="icon-holder">
                 <img src="{!! asset('assets/static/images/icon3.png') !!}" alt=""style="width: 84%;" >      </span><span class="title">Lanes</span></a>
            </li>
          @endif 
          
          
           @if($user->roll == 1 || ($user->roll != 1 && in_array(6,$user_roles)))
            <li class="nav-item">
              <a class="sidebar-link" href="{!! asset('current_job_details/list') !!}"><span class="icon-holder"><img src="{!! asset('assets/static/images/icon4.png') !!}" alt=""style="width: 84%;" > </span><span class="title">Verify car reg.</span>   </a>
            </li>
          @endif

          @if($user->roll == 1 || ($user->roll != 1 && in_array(6,$user_roles)))
            <li class="nav-item">
              <a class="sidebar-link" href="{!! asset('car_details/list') !!}"><span class="icon-holder"><img src="{!! asset('assets/static/images/icon4.png') !!}" alt=""style="width: 84%;" > </span><span class="title">Cars For Collection</span>   </a>
            </li>
          @endif

          @if($user->roll == 1 || ($user->roll != 1 && in_array(4,$user_roles)))
            <li class="nav-item">
              <a class="sidebar-link" href="{!! asset('loadContainer') !!}"><span class="icon-holder"> <img src="{!! asset('assets/static/images/icon1.png') !!}" alt=""style="width: 84%;" > </span><span class="title">Load Name</span>
              </a>
            </li>
          @endif

          @if($user->roll == 1 || ($user->roll != 1 && in_array(3,$user_roles)))
            <li class="nav-item">
              <a class="sidebar-link" href="{!! asset('loadbuilder/create') !!}"><span class="icon-holder"><img src="{!! asset('assets/static/images/icon01.png') !!}" alt=""style="width: 84%;" > </span><span class="title">Load Builder</span>
              </a>
            </li>
          @endif

          @if($user->roll == 1 || ($user->roll != 1 && in_array(15,$user_roles)))
            <li class="nav-item">
              <a class="sidebar-link" href="{!! asset('planner') !!}"><span class="icon-holder"> <img src="{!! asset('assets/static/images/icon5.png') !!}" alt=""style="width: 84%;" >   </span><span class="title">Planner</span>
              </a>
            </li>
          @endif 
          @if($user->roll == 1 || ($user->roll != 1 && in_array(19,$user_roles)))
          <li class="nav-item">
              <a class="sidebar-link" href="{!! asset('shipping_address') !!}"><span class="icon-holder"> <img src="{!! asset('assets/static/images/icon5.png') !!}" alt=""style="width: 84%;" >   </span><span class="title">Shipping Address</span>
              </a>
            </li>
           @endif
          @if($user->roll == 1 || ($user->roll != 1 && in_array(11,$user_roles)))      
            <li class="nav-item">
              <a class="sidebar-link" href="{!! asset('item/list') !!}"><span class="icon-holder"><img src="{!! asset('assets/static/images/icon6.png') !!}" alt=""style="width: 84%;" > </span><span class="title">Item</span>
              </a>
            </li>
          @endif 
            
          @if($user->roll == 1 || ($user->roll != 1 && in_array(12,$user_roles)))     
            <li class="nav-item">
              <a class="sidebar-link" href="{!! asset('tool/list') !!}"><span class="icon-holder"><img src="{!! asset('assets/static/images/icon7.png') !!}" alt=""style="width: 84%;" > </span><span class="title">Tools</span>
              </a>
            </li>
          @endif 
          
          <!-- @if($user->roll == 1 || ($user->roll != 1 && in_array(7,$user_roles))) 
            <li class="nav-item">
              <a class="sidebar-link" href="{!! asset('car_for_collection/list') !!}"><span class="icon-holder"><i class="c-brown-500 ti-user"></i> </span><span class="title">Car For Collection</span>
              </a>
            </li>
          @endif  -->    
                  
          @if($user->roll == 1 || ($user->roll != 1 && in_array(8,$user_roles)))
            <!--<li class="nav-item">-->
            <!--  <a class="sidebar-link" href="{!! asset('job/list') !!}"><span class="icon-holder"><i class="c-brown-500 ti-bag"></i> -->
            <!--      </span><span class="title">Load List</span>-->
            <!--  </a>-->
            <!--</li>-->
          @endif
          
            @if($user->roll == 1 || ($user->roll != 1 && in_array(17,$user_roles)))
            <li class="nav-item">
              <a class="sidebar-link" href="{!! asset('expence/list') !!}"><span class="icon-holder"><img src="{!! asset('assets/static/images/icon8.png') !!}" alt=""style="width: 84%;" > </span><span class="title">Expense Type</span>
              </a>
            </li>
          @endif
          
          @if($user->roll == 1 || ($user->roll != 1 && in_array(9,$user_roles)))
            <li class="nav-item">
              <a class="sidebar-link" href="{!! asset('driver/list') !!}"><span class="icon-holder"><img src="{!! asset('assets/static/images/icon9.png') !!}" alt=""style="width: 84%;" > </span><span class="title">Drivers</span>
              </a>
            </li>
          @endif
                 
          @if($user->roll == 1 || ($user->roll != 1 && in_array(10,$user_roles))) 
            <li class="nav-item">
              <a class="sidebar-link" href="{!! asset('truck/list') !!}"><span class="icon-holder"><img src="{!! asset('assets/static/images/icon10.png') !!}" alt=""style="width: 84%;" > </span><span class="title">Trucks</span>
              </a>
            </li>
          @endif

          @if($user->roll == 1 || ($user->roll != 1 && in_array(13,$user_roles)))
            <!--<li class="nav-item">-->
            <!--  <a class="sidebar-link" href="{!! asset('car_for_delivery/list') !!}"><span class="icon-holder"><i class="c-brown-500 ti-star"></i> </span><span class="title">Cars for Delivery</span>-->
            <!--  </a>-->
            <!--</li>-->
          @endif 
    
          @if($user->roll == 1 || ($user->roll != 1 && in_array(14,$user_roles)))
            <li class="nav-item">
              <a class="sidebar-link" href="{!! asset('pocpoddetails/list') !!}"><span class="icon-holder"><img src="{!! asset('assets/static/images/icon11.png') !!}" alt=""style="width: 84%;" > </span><span class="title">Cars Collected Report</span>
              </a>
            </li>
             <!-- <li class="nav-item">
              <a class="sidebar-link" href="{!! asset('pocdetails/list') !!}"><span class="icon-holder"><img src="{!! asset('assets/static/images/icon11.png') !!}" alt=""style="width: 84%;" > </span><span class="title">POC Report</span>
              </a>
            </li>
              <li class="nav-item">
              <a class="sidebar-link" href="{!! asset('poddetails/list') !!}"><span class="icon-holder"><img src="{!! asset('assets/static/images/icon11.png') !!}" alt=""style="width: 84%;" > </span><span class="title">POD Report</span>
              </a>
            </li>-->
          @endif               
               
          @if($user->roll == 1 || ($user->roll != 1 && in_array(16,$user_roles)))          
          
            <li class="nav-item">
              <a class="sidebar-link" href="{!! asset('job_report/list') !!}"><span class="icon-holder"><img src="{!! asset('assets/static/images/icon4.png') !!}" alt=""style="width: 84%;" > </span><span class="title">Job Reports</span>
              </a>
            </li> 
           @endif
           @if($user->roll == 1 || ($user->roll != 1 && in_array(20,$user_roles))) 
            <li class="nav-item">
              <a class="sidebar-link" href="{!! asset('viewMorningCheckReport') !!}"><span class="icon-holder"><img src="{!! asset('assets/static/images/icon12.png') !!}" alt=""style="width: 84%;" > </span><span class="title">Morning Check Reports</span>
              </a>
            </li> 

            @endif
            @if($user->roll == 1 || ($user->roll != 1 && in_array(21,$user_roles)))   
            <li class="nav-item">
              <a class="sidebar-link" href="{!! asset('jobchecklist') !!}"><span class="icon-holder"><img src="{!! asset('assets/static/images/icon4.png') !!}" alt=""style="width: 84%;" > </span><span class="title">Load Reports</span>
              </a>
            </li> 
            @endif
            @if($user->roll == 1 || ($user->roll != 1 && in_array(22,$user_roles)))  
             <li class="nav-item">
              <a class="sidebar-link" href="{!! asset('drexpence/list') !!}"><span class="icon-holder"><img src="{!! asset('assets/static/images/icon13.png') !!}" alt=""style="width: 84%;" > </span><span class="title">Expenses Reports</span>
              </a>
            </li> 
            @endif
             <!-- <li class="nav-item"> -->
              <!--<a class="sidebar-link" href="{!! asset('car_search/list') !!}"><span class="icon-holder"><img src="{!! asset('assets/static/images/icon14.png') !!}" alt=""style="width: 84%;" > </span><span class="title">Car Reports</span>-->
              <!-- </a> -->
            <!-- </li>  -->
        
        
          
          @if($user->roll == 1 || ($user->roll != 1 && in_array(18,$user_roles)))     
            <!--<li class="nav-item">-->
            <!--  <a class="sidebar-link" href="{!! asset('drexpence/list') !!}"><span class="icon-holder"><i class="c-brown-500  fa fa-money"></i> </span><span class="title">Driver Expense</span>-->
            <!--  </a>-->
            <!--</li>-->
          @endif      
   
        </ul>
      </div>
    </div>
    
    
  
    
 