
  <?php 
   
   $login= session()->get('login');

   $user = auth()->user();
  $v=$user->roles()->get(); 
  // $v= $user->getRoleNames();
   $role= $v[0]->name;
  
   

  $login_id = $user->id;

   if($role=='Customer'){
    
    $user = DB::table('users')->where('id',$login_id)->first();    

   }else{

    $user = DB::table('users')->where('id',$login_id)->first();
   }
?>

<?php
    //$notification_details=DB::select('select *from loadcontener where status=? and type=? and shipping_type=?',[2,2,1]);
    $notification_details = App\models\Loadcontener::where('status', '=', 2)
              ->where('type', '=', 2)
               ->where('shipping_type', '=', 1)
              ->get();

          $count=0; 
      foreach($notification_details as $d)
      {
          $chk= DB::select('select *from carsfordelivery where loadcontener_id=?',[$d->id]);
              if(empty($chk))
              {
                $count++;                            
                
              }

      }
                ?>

<div class="header navbar">
        <div class="header-container">
          <ul class="nav-left">
            <li><a id="sidebar-toggle" class="sidebar-toggle" href="javascript:void(0);"><i class="ti-menu"></i></a>
            </li>
        
        <!--<li class="search-box"><a class="search-toggle1 no-pdd-right" href="javascript:void(0);">  <input type="search" class="" placeholder=" Search" aria-controls="dataTable" style="height:33px; border-radius:5px; border: 1px solid #000;"  > </a></li>-->
                  
         <!--<li></li><form action="{{ url('searchbycarbooking')}}" method="post"> Search By Booking Date: <input type="date" name="booking_date"> <input type="submit" value="Search"></form><-->

         <li style="margin-top: 13px;"><form action="{{ url('mastersearch')}}" method="post"> @csrf <input type="search" name="reg" class="" placeholder=" Search" aria-controls="dataTable" style="height:33px; border-radius:5px; border: 1px solid #000;"  > <input type="submit" value="Search"></form></li>

        
          </ul>
          <ul class="nav-right">
        <!--<li class="notifications dropdown"><span class="counter bgc-red">3</span> <a href="#" class="dropdown-toggle no-after" data-toggle="dropdown"><i class="ti-face-smile"></i></a>-->
        <!--  <ul class="dropdown-menu">-->
        <!--    <li class="pX-20 pY-15 ta-c bdT"><span><a href="{!! asset('chating/list') !!}" class="c-grey-600 cH-blue fsz-sm td-n">Chating <i class="ti-angle-right fsz-xs mL-10"></i></a></span></li>-->
            
            
        <!--  </ul>-->
        <!--</li>-->
        <?php
          $noti_count =$count;  
           ?>
      <li class="notifications dropdown">
        <?php if($noti_count > 0){ ?>
          <span class="counter bgc-red">{{$noti_count}}</span> 
        <?php } ?><a href="#" class="dropdown-toggle no-after" data-toggle="dropdown"><i class="ti-bell"></i></a>
          <ul class="dropdown-menu">
            <li class="pX-20 pY-15 bdB"><i class="ti-bell pR-10"></i> <span class="fsz-sm fw-600 c-grey-900">Notifications</span></li>
            <li>
              <ul class="ovY-a pos-r scrollable lis-n p-0 m-0 fsz-sm">

           <?php
     $notification_details=DB::select('select *from loadconteners where status=? and type=?',[2,2]);
          $count=0; $i=0;
      foreach($notification_details as $d)
      {
          $chk= DB::select('select *from carsfordelivery where loadcontener_id=?',[$d->id]);
                           if(empty($chk))
                           {
                             $count++;
                             $i++;
                            
                             ?>
                <li>
                  <a href="{!! asset('notification_details/list') !!}" class="peers fxw-nw td-n p-20 bdB c-grey-800 cH-blue bgcH-grey-100 green_mark">
                    <div class="peer mR-15"><img class="w-3r bdrs-50p" src="../../../randomuser.me/api/portraits/men/1.jpg" alt=""></div>
                    <div class="peer peer-greed"><span><span class="c-grey-600 txt_white">Load {{$d->loadnumber}} &nbsp; {{$d->load_title}} has been collected</span></span>
                      <p class="m-0"><small class="fsz-xs">{{$d->updated_at}}</small></p>
                    </div>
                  </a>
                </li>
              <?php 
                               
                 }
          
             }
              ?>
                
             
              

              </ul>
            </li>
                
            <li class="pX-20 pY-15 ta-c bdT"><span><a href="{!! asset('notification_details/list') !!}" class="c-grey-600 cH-blue fsz-sm td-n">View All
                      Notifications <i class="ti-angle-right fsz-xs mL-10"></i></a></span></li>
              </ul>
            </li>
           
        
           
           
            <li class="dropdown"><a href="#" class="dropdown-toggle no-after peers fxw-nw ai-c lh-1"
                data-toggle="dropdown">
                <div class="peer mR-10"><img class="w-2r bdrs-50p" src="../../../randomuser.me/api/portraits/men/10.jpg"
                    alt=""></div>
                <div class="peer">   <span class="fsz-sm c-grey-900">{{$role}}</span></div>
              </a>
              <ul class="dropdown-menu fsz-sm">
              @if($role == 'Admin')
                <li><a href="{{ route('roles.index') }}" class="d-b td-n pY-5 bgcH-grey-100 c-grey-700"><i class="ti-settings mR-10"></i>
                    <span>Create Role</span></a></li>
                <!-- <li><a href="{{ route('users.index') }}" class="d-b td-n pY-5 bgcH-grey-100 c-grey-700"><i class="ti-settings mR-10"></i>
                    <span>Create User</span></a></li>    -->
               @endif 
                <li><a href="{!! asset('myprofile_details/list')!!}" class="d-b td-n pY-5 bgcH-grey-100 c-grey-700"><i class="ti-user mR-10"></i>
                    <span>Profile</span></a></li>
                <li role="separator" class="divider"></li>
                <li><a href="{{ route('logout') }}" class="d-b td-n pY-5 bgcH-grey-100 c-grey-700"><i class="ti-power-off mR-10"></i>
                    <span>Logout</span></a></li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
      
      <style>
 
.green_mark2 {
    background: #ffeb3b2b;
}
          .green_mark {
    background: #36671857;
            }
            .green_mark1{  background:#ff00006b;}
          
      </style>
      
  
   