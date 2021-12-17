
  <?php 
   
  //  $login= session()->get('login');

  $user = auth()->user();
  $v=$user->roles()->get(); 
  // $v= $user->getRoleNames();
   $role= $v[0]->name;
  
   $login_id= $user->id;

   if($role=='Customer'){

    
    $user = DB::table('customer')->where('id',$login_id)->first();    

   }else{
  
  $user = DB::table('users')->where('id',$login_id)->first();
   }
?>
    

<div class="header navbar">
        <div class="header-container">
          <ul class="nav-left">
             <li><a id="sidebar-toggle" class="sidebar-toggle" href="javascript:void(0);"><i class="ti-menu"></i></a> </li>        
      
             <li style="margin-top: 13px;"><form action="{{ url('mastersearch')}}" method="post"> <input type="search" name="type" class="" placeholder=" Search" aria-controls="dataTable" style="height:33px; border-radius:5px; border: 1px solid #000;"  > <input type="submit" value="Search"></form></li>
         </ul>

          <ul class="nav-right"> ///  1 ul
       
        
            <li class="notifications dropdown">  ////// 1 li
            
              <span class="counter bgc-red"></span> 
                <a href="#" class="dropdown-toggle no-after" data-toggle="dropdown"><i class="ti-bell"></i></a>
                    <ul class="dropdown-menu">  2n ul
                          <li class="pX-20 pY-15 bdB"><i class="ti-bell pR-10"></i> <span class="fsz-sm fw-600 c-grey-900">Notifications </span></li>
                            <li> 2n li
                                  <ul class="ovY-a pos-r scrollable lis-n p-0 m-0 fsz-sm"> 3rd ul

                                            
                                          <li>  3 rd li
                                            <a href="{!! asset('notification_details/list') !!}" class="peers fxw-nw td-n p-20 bdB c-grey-800 cH-blue bgcH-grey-100 green_mark">
                                              <div class="peer mR-15"><img class="w-3r bdrs-50p" src="../../../randomuser.me/api/portraits/men/1.jpg" alt=""></div>
                                              <div class="peer peer-greed"><span><span class="c-grey-600 txt_white">Load  has been collected</span></span>
                                                <p class="m-0"><small class="fsz-xs"></small></p>
                                              </div>
                                            </a>
                                          </li> 3 rd li close
                                        
                                          
                                                  

                                    </ul>  3rd ul colse
                              </li> 2nd li close
                            
                                  <li class="pX-20 pY-15 ta-c bdT"><span><a href="{!! asset('notification_details/list') !!}" class="c-grey-600 cH-blue fsz-sm td-n">View All
                                  Notifications <i class="ti-angle-right fsz-xs mL-10"></i></a></span></li>

                    </ul> 2 nd ul close
             </li>   is li close
           
        
           
           
                <li class="dropdown"><a href="#" class="dropdown-toggle no-after peers fxw-nw ai-c lh-1"
                    data-toggle="dropdown">
                    <div class="peer mR-10"><img class="w-2r bdrs-50p" src="../../../randomuser.me/api/portraits/men/10.jpg"
                        alt=""></div>
                    <div class="peer">   <span class="fsz-sm c-grey-900"></span></div>
                  </a>
                  <ul class="dropdown-menu fsz-sm">
                    @if($user->roll == 1)
                    <li><a href="{!! asset('setting_view_details/list')!!}" class="d-b td-n pY-5 bgcH-grey-100 c-grey-700"><i class="ti-settings mR-10"></i>
                        <span>Setting</span></a></li>
                    @endif
                    <li><a href="{!! asset('myprofile_details/list')!!}" class="d-b td-n pY-5 bgcH-grey-100 c-grey-700"><i class="ti-user mR-10"></i>
                        <span>Profile</span></a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="{!! asset('logout') !!}" class="d-b td-n pY-5 bgcH-grey-100 c-grey-700"><i class="ti-power-off mR-10"></i>
                        <span>Logout</span></a></li>
                  </ul>
                </li>
          </ul> i st ul close
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
      
  
   