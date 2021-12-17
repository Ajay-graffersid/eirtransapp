@extends('masterlayout')
 
@section('title')
  Setting
 @endsection
 
@section('content')

<style type="text/css">
  .checkbox-grid li {
    display: block;
    float: left;
    width: 25%
  }
</style>

<main class="main-content bgc-grey-100"  id="output-text" >
        <div id="mainContent">
             <div class="peer" style="float: right;"><a href="{!! asset('addNewUser') !!}"><button class="btn btn-primary">Create new User</button></a></div>
             
          <div class="container-fluid">
            <h4 class="c-grey-900 mT-10 mB-30">Setting</h4>
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
                        <th>Name</th>
                        <th>Email</th>
                        <th>Mobile</th>
                        <th>Password</th>
                        <th>Roll</th>
                        <th>Status</th>
                        <th width="280px">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $sr=1; ?>
                      @foreach ($setting_view_details as $user)
                        <tr>
                          <td>{{ $sr++ }}</td>
                          <td>{{$user->name }}</td>
                          <td>{{$user->email }}</td>
                          <td>{{$user->mobile }}</td>
                          <td>{{$user->password }}</td>
                          <td>{{$user->roll == 1 ? "Admin" : "User" }}</td>
                            @if($user->status=='1')
                              <td>
                                <a href="" class="view_btn">Active</a>
                              </td> 
                            @else
                              <td>
                                <a href="" class="view_btn">Inactive</a>
                              </td> 
                            @endif
                          <td>
                            <a href="{{ url('editUser').'/'.$user->id }}" class="btn btn-info editcol">Edit</a>
                            <a href="{{ url('deleteUser').'/'.$user->id }}" class="btn btn-primary">Delete</a>
                          </td>
                        </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
        
        
         <form action="{!! asset('/updatemailss') !!}" method="post">
                               {{csrf_field()}}
          <div id="mainContent">
           
          <div class="container-fluid">
            <h4 class="c-grey-900 mT-10 mB-30">Customs Mail Setting</h4>
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
                       <th>Customs Email</th>
                       <th>Action</th>
                       
                      </tr>
                    </thead>
                    <tbody>
                      

                      
                      @foreach($mails as $mail)
                    
                     <tr>
                      
                        <td>
                          
                          <?php
                          $i=1;
                          $em=explode(',',$mail->mail)
                          ?>


                         <div id="variants_data">
                              @foreach ($em as $ml)
                                <?php
                                $i++;
                                ?>
                                 <div class="row" id="removeDataDiv">

                                    

                                   

                                    <div class="col-sm-3">
                                       <div class="form-group" >
                                          <div class="col-sm-12">
                                          <input type="hidden" name="id" value="1">  
                                         <input type="text"  name="mail[]" value={{$ml}}>
                                          </div>
                                       </div>
                                    </div>
                                     @if($i != 2)
                                     <div class="col-sm-2">
                                       <div class="form-group" >
                                          <div class="col-sm-12">
                                             <button type="button" class="btn btn-danger removeRow"><i class="fa fa-minus" aria-hidden="true"></i></button>
                                          </div>
                                       </div>
                                    </div>
                                    @endif 
                                 </div>
                              @endforeach
                           </div>
                        

                        <div id="addDiv">
                           <div class="row">

                              <div class="col-sm-2">
                                 <div class="form-group" >
                                    <div class="col-sm-12">
                                       <button type="button" class="btn btn-primary addCF"><i class="fa fa-plus" aria-hidden="true"></i></button>
                                    </div>
                                 </div>
                              </div>

                           </div>
                       </div>
                         




                         <!--  <input type="text"  name="mail" value={{$mail->mail}}> -->
                           

                         </td>
                        
                        <td><input type="submit" value="submit"></td>
                   
                   
                           
                      </tr>
                          
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
        </form>  





        
          <form action="{!! asset('/updatemailss') !!}" method="post">
                               {{csrf_field()}}

          <div id="mainContent">
           
          <div class="container-fluid">
            <h4 class="c-grey-900 mT-10 mB-30">Load Report Mail Setting</h4>
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
                       <th>Load Report Email</th>
                       <th>Action</th>
                       
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($loadmails as $mail)
                     <tr>
                      
                        <td>
                          
                          <?php
                          $i=1;
                          $em=explode(',',$mail->mail)
                          ?>


                         <div id="variants_data">
                              @foreach ($em as $ml)
                                <?php
                                 $i++;  
                                  ?>
                                 <div class="row" id="removeDataDiv1">

                                    

                                   

                                    <div class="col-sm-3">
                                       <div class="form-group" >
                                          <div class="col-sm-12">
                                          <input type="hidden" name="id" value="2">  
                                         <input type="text"  name="mail[]" value={{$ml}}>
                                          </div>
                                       </div>
                                    </div>
                                        @if($i != 2)           
                                      <div class="col-sm-2">
                                       <div class="form-group" >
                                          <div class="col-sm-12">
                                             <button type="button" class="btn btn-danger removeRow1"><i class="fa fa-minus" aria-hidden="true"></i></button>
                                          </div>
                                       </div>
                                    </div>
                                    @endif

                                 </div>
                              @endforeach
                           </div>
                        

                        <div id="addDiv1">
                           <div class="row">

                              <div class="col-sm-2">
                                 <div class="form-group" >
                                    <div class="col-sm-12">
                                       <button type="button" class="btn btn-primary addCF1"><i class="fa fa-plus" aria-hidden="true"></i></button>
                                    </div>
                                 </div>
                              </div>

                           </div>
                       </div>
                         




                         <!--  <input type="text"  name="mail" value={{$mail->mail}}> -->
                           

                         </td>
                        
                        <td><input type="submit" value="submit"></td>
                        
                   
                           
                      </tr>
                      
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>

        </form>
         



        
        <div id="mainContent">
           
          <div class="container-fluid">
            <h4 class="c-grey-900 mT-10 mB-30">Change colour / font</h4>
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
                        <th>Colour</th>
                        <th>font</th>
                       
                      </tr>
                    </thead>
                    <tbody>
                     <tr>
                          <td> <a href="" class="btn btn-info editcol">#000000</a></td>
                           <td>
                               
                              <select id="input-font" class="input"
        onchange="changeFontStyle (this);"> 
  
        <option value="Times New Roman" 
            selected="selected"> 
            Times New Roman 
        </option> 
        <option value="Arial">Arial</option> 
        <option value="monospace">monospace</option> 
      
    </select>  
                               
                           </td>
                           
                           </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
        
        
        
        <div id="mainContent">
           
          <div class="container-fluid">
            <h4 class="c-grey-900 mT-10 mB-30">Backup</h4>
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
                   <tbody>
                     <tr>
                    <td> <a href="backup_db" class="btn btn-info editcol">Eirtrans App Backup</a></td> </tr>
                    
                    <td> <a href="folder_image" class="btn btn-info editcol">Eirtrans App Image</a></td> </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
        
        
        
      </main>
 
 
   <script> 
        var changeFontStyle = function (font) { 
            document.getElementById( 
                "output-text").style.fontFamily 
                        = font.value; 
        } 
    </script> 
 
 
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script type="text/javascript">
  
   $(".addCF").click(function(){
      $("#addDiv").append('<div class="row" id="removeDiv"><div class="col-sm-3"><div class="form-group" ><div class="col-sm-12"> <input type="text"  name="mail[]" ></div></div></div><div class="col-sm-2"><div class="form-group" ><div class="col-sm-12"><button type="button" class="btn btn-danger removeCF" id="removeCF"><i class="fa fa-minus" aria-hidden="true"></i></button></div></div></div></div>');
   });

   $("#addDiv").on('click','.removeCF',function(){
      $(this).closest('div #removeDiv').remove();
   });

   $(".removeRow").on('click',function(){
      $(this).closest('div #removeDataDiv').remove();
   });



$(".addCF1").click(function(){
      $("#addDiv1").append('<div class="row" id="removeDiv1"><div class="col-sm-3"><div class="form-group" ><div class="col-sm-12"> <input type="text"  name="mail[]" ></div></div></div><div class="col-sm-2"><div class="form-group" ><div class="col-sm-12"><button type="button" class="btn btn-danger removeCF1" id="removeCF1"><i class="fa fa-minus" aria-hidden="true"></i></button></div></div></div></div>');
   });

   $("#addDiv1").on('click','.removeCF1',function(){
      $(this).closest('div #removeDiv1').remove();
   });

   $(".removeRow1").on('click',function(){
      $(this).closest('div #removeDataDiv1').remove();
   });

</script>


@endsection