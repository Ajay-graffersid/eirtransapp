@extends('masterlayout')
 
@section('title')
  create load
 @endsection
 
@section('content')


<style>
#div1, #div2 {
  float: left;
  width: 100px;
  height: 35px;
  margin: 10px;
  padding: 10px;
  border: 1px solid black;
}


input.dis_btn{
    cursor: unset;
}

.dis_btns{
        cursor: unset;
}
#mainContents{
    overflow: hidden;
    background: #efefef;
}
.main-left,.main-right{
  float: left;
  width: 50%;
  overflow: auto;
}
.left-inner-content{
    padding-left: 10px;
    padding-right: 5px;
}
.right-inner-content{
    padding-left: 5px;
    padding-right: 10px;
}
.left-inner-content,.right-inner-content{
}
.left-inner-main,.right-inner-main{
  background: #FFF;
  overflow: auto;
  padding: 0 10px;
}
.left-inner-main div,.right-inner-main div{
  height: initial;
}
#mainContentHolder{
  position: relative;  width: 100%;
  overflow:auto;
  padding-top:4em;
}
#draggable{
 position: absolute;
    z-index: 3;
    width: auto;
    cursor: col-resize;
    background: #f14c17;
    HEIGHT: auto !important;
    TOP: -1EM;
    line-height: 42px;
    font-size: 19px;
    padding: 12px;
    padding-top: 26px;
    padding-bottom: 0;
    font-weight: 600;
}
.custom-scrollbar-css{
    overflow-x: scroll;
  
    width: 100% !important;
}

table#dataTable {
    overflow-x: scroll;
    display: inline-block;
    width: 100%;
    height: 500px;
}










</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
function allowDrop(ev) {
  ev.preventDefault();
}

function drag(ev) {
  ev.dataTransfer.setData("text", ev.target.id);
}

function drop(ev,ldid) {
  ev.preventDefault();
  var data = ev.dataTransfer.getData("text");
  ev.target.appendChild(document.getElementById(data));
  
var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

// Add record
  

    var car_collection = data;
    var ldid = ldid;
    
    
  
    
      $.ajax({
        url: '{!! asset('cardeliveryassignload') !!}',
        type: 'post',
        data: {_token: CSRF_TOKEN,car_collection: car_collection,ldid: ldid },
        success: function(response){

        

          // Empty the input fields
          alert(response);
          $( "#main-right" ).load(window.location.href + " #main-right" );
          location.reload();
        }
      });
  



  
  
  
  
  
 
}
</script>











<main class="main-content bgc-grey-100">
        <div id="mainContent">
            @if(Session::get('msg'))
         <div class = "alert alert-success">
            <ul>
              
              
              
             <li> {{Session::get('msg')}}</li>
              
            </ul>
         </div>
      @endif
          <div class="container-fluid">
            <h4 class="c-grey-900 mT-10 mB-30">Load Builder</h4>
                
         <a href="{!! asset('loadbuilder/create') !!}">   <input type="button" class="dis_btn" value="Car For Collection" style="background: #ED9992 !important;"></a>
            <a href="{{ url('car_for_delivery/list').'/'.'0' }}"><input type="button" class="dis_btn" value="Car For Delivery" class="dis_btnsss" style="background: #9AE89D !important;"></a>        
        
                 <!--  <a href="{!! asset('car_for_delivery/list') !!}"><input type="button"  value="Car For Delivery"  disabled='disabled' class="dis_btns" style="background: #367f39 !important;"></a> -->
               
          <input type="button" value="Pending Not Deliverd"  disabled='disabled' class="dis_btns" style="background: #367f39 !important;"> 
               
                              <div class="mainContents" style=" ">

   <div id="mainContent" class="mainContent">

     <div id="mainContentHolder">
       <div id="draggable"  data-toggle="popover" data-toggle="popover" data-trigger="hover" data-content="Move Here" ><i class="fa fa-columns" aria-hidden="true"></i></div>
      
      
      
      <div class="main-left">

        <div class="left-inner-content">
          <div class="left-inner-main custom-scrollbar-css">
              <div class="bgc-whitAe bdS bdrAs-3 p-20 mB-20 col-md-6a">
                     
                        <div class="bS" style=" BACKGROUND: white; PADDING: 13PX;">  
                    
                             
                     <div class="btnnew" style="margin-bottom:25px;">
                              
                            </div>
                            <div id="ajax_body">
                              <table id="dataTable" class="custom-scrollbar-css table table-striped table-bordered" cellspacing="0" width="100%" >
                                  <thead>
                                    <tr>
                                     
                                      <th>Customer</th>
                                      <th>Make</th>
                                      <th>Reg</th>
                                      <th>Collection Address</th>
                                      <th>Delivery Address</th>
                                      <th>Lane</th>
                                      <th>Book in Date</th>
                                      <th>Rate</th>
                                       <th>Job No.</th>
                                    </tr>
                                  </thead>
                                  <tbody> 
                                
                                    @foreach($car_for_collection as $car_for_collection)
                                        
                            
                                    
                                      <?php
                                          $customernames= DB::select('select *from jobcustomer where id=?',[$car_for_collection->customer]);
                                          $lanname=DB::select("select *from lane where id=?",[$car_for_collection->lan]);
                                          
                                      ?>
                                      <tr>
                                        
                                        <td>@if(!empty($customernames)){{$customernames[0]->customer_name }}@endif</td>
                                        <td>{{ $car_for_collection->make_model }}</td>
                                        <td>{{ $car_for_collection->reg }}</td>
                                        <td>{{ $car_for_collection->collection_address }}</td>
                                        <td>{{ $car_for_collection->delivery_address }}</td>
                                        <td>@if(!empty($lanname)){{ $lanname[0]->lane_number}}@endif</td>
                                        <td>{{ $car_for_collection->booking_date }}</td>
                                        <td>{{ $car_for_collection->rate }}</td>
                                        <td>
                                          <div id="div1" ondrop="drop(event)" ondragover="allowDrop(event)">
                                          <span style="color:blue" draggable="true" ondragstart="drag(event)" id="{{$car_for_collection->id}}"><b>{{$car_for_collection->job_number}} </b></span>
                                          </div>
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
               </div>
               
               
                     <div class="main-right" id="main-right">
        <div class="right-inner-content">
          <div class="right-inner-main custom-scrollbar-css">
                <div class="bgc-whitAe bdS bdrAs-3 p-20 mB-20 col-md-6a">
                    
                        <div class="bS" style=" BACKGROUND: white; PADDING: 13PX;">   
                    
                    <?php
                    $ii=0;
                    ?>
                @foreach($loadcontener as $loadc)
                     
                        <?php
                     $ii++;
                      ?>
                  
                     <h6><div id="div2" ondrop="drop(event,{{$loadc->id}})" ondragover="allowDrop(event)">{{$loadc->load_title}} {{$loadc->loadnumber}}</div></h6>
                  <table id="dataTable" class="custom-scrollbar-css table-striped table-bordered" cellspacing="0" width="100%" style="height:auto;">
                    <thead>
                      <tr>
                        
                   
                        <th>Customer</th>
                        <th>Make</th>
                        <th>Model</th>
                        <th>Reg</th>
                        <th>Collection Address</th>
                         <th>Deliver Address</th>
                      
                       <th>Book In Date</th>
                        <th>Lane</th>
                     
                 
                      </tr>
                    </thead>
                   
                    <tbody class="{{$loadc->id}}">
                       <input type="hidden" id={{$ii}} value="{{$loadc->id}}">
                        <?php
                        
                        
                      $expoid=explode('.',$loadc->car_collection_id);
                                 
                              
                              
                                 
                                 if($expoid)
                                 {
                                    foreach($expoid as $exp) 
                                    {
                                       
                                      $car_for_collection= DB::select('select *from cardetails where id=?',[$exp]);
                                        
									     if(!empty($car_for_collection))
										 {
                                     $customernames= DB::select('select *from jobcustomer where id=?',[$car_for_collection[0]->customer]);
                                       $lanname=  DB::select('select *from lane where id=?',[$car_for_collection[0]->lan]);
                                         }
                                     
                                      ?>  
                          
                        @if($car_for_collection)
                      <tr id="{{$exp}}">
                       
                   
                         <td><a href=" {{ URL('/removependingjob/'.$loadc->id.'/'.$car_for_collection[0]->id)}}"><i style="font-size:10px" class="fa">&#xf00d;</i></a> @if(!empty($customernames)){{ $customernames[0]->customer_name }}@endif</td>
                          <td>{{ $car_for_collection[0]->make_model }}</td>
                           <td>{{ $car_for_collection[0]->model }}</td>
                           <td>{{ $car_for_collection[0]->reg }}</td>
                            <td>{{ $car_for_collection[0]->collection_address }}</td>
                          <td>{{ $car_for_collection[0]->delivery_address }}</td>
                       <td>{{ $car_for_collection[0]->booking_date }}</td>
                         <td>@if(!empty($lanname)){{ $lanname[0]->lane_number }}@endif</td>
                        
                         
                      </tr>
                       @endif
                      
                       <?php
                         }
                     }
                     ?>
                     
                    </tbody>
                  </table>
               @endforeach
                </div>
                        </div>
                        </div>
                        </div>
                        </div>
               
               
               </div>
               </div>
               </div>
               </div>
               
               
               
               
               
               
               
               
               
               
               
               
               
               
               
               
               
          
              
              
              </div>
            </div>
          </div>
      
      </main>
 
 
 
 <style>
  input.dis_btn {

    background: #f2683c!important;
    color: #fff !important;
}

select.drop_her {
    border: 1px solid #000;
    padding: 3px;
    border-radius: 3px;
    font-size: 16px;
    background: #f14c17;
    color: #fff;
}
 .table-bordered thead td, .table-bordered thead th {
    border-bottom-width: 2px;
    FONT-WEIGHT: 500;
    padding: 9px;
}
 
 
.custom-scrollbar-js,
.custom-scrollbar-css {
  width: 5px;
}


.custom-scrollbar-css {
  overflow-x: scroll;  width: 5px;
}


.custom-scrollbar-css::-webkit-scrollbar {
  width: 5px;
  height:5px;
}


.custom-scrollbar-css::-webkit-scrollbar-track {
  background: #eee; 
}

.custom-scrollbar-css::-webkit-scrollbar-thumb {
  border-radius: 1rem;
  background-color:#bfbfbf;
  background-image: #bfbfbf;
}

  .table-bordered, .table-bordered td, .table-bordered th {
    border: 1px solid #e9ecef;
    FONT-WEIGHT: 300;
    FONT-SIZE: 14PX;
    WIDTH: 100%;
}
  .table-bordered thead td, .table-bordered thead th {
    border-bottom-width: 2px;
    FONT-WEIGHT: 500;
     background:#f7f7f7;
}

table#dataTable {
    overflow-x: scroll;

    width: 100%;
 
}

 .table-striped tbody tr:nth-of-type(odd) {
    background: none
}

button.lane_btn {
    background: #e8e5e4;
    border: 0;
    color: #2b1a1a;
    border-radius: 4px;
    padding: 4px 4PX;
    margin-bottom: 14px;
    margin-left: 0;
}

input[type="button"] {
    background: #f14c17;
    border: 0;
    color: #fff;
    border-radius: 4px;
    padding: 7px;
    margin-bottom: 14px;
    margin-left: 0;
}   
 </style>
 
 
 
  <script>
$(document).ready(function(){
    $('[data-toggle="popover"]').popover();   
});
</script>
 
   <script type="text/javascript">
      $( document ).ready(function() {
        var lastPosition = null;
        resizeWindow();
        $( window ).resize(function() {
          resizeWindow()
      });

      function calculatepercent(position) {
        var a = position;
        var b = $(".mainContent").width();
        var c = $(".mainContent").width() - position;

       
        $('div.main-left').width((returnPerCalc(a,b) + .4) + '%');
        $('div.main-right').width((returnPerCalc(c,b) - .5) + '%');
      };

      function returnPerCalc(a,b){
        var c = a/b;
        var d = c*100;
        return d;
      };

      $( "#draggable" ).draggable({ 
        axis: "x",
        start: function(a) {
          calculatepercent(a.target.offsetLeft);
        },
        drag: function(b) {
          calculatepercent(b.target.offsetLeft);
        },
        stop: function(c) {
          calculatepercent(c.target.offsetLeft);
          lastPosition = c.target.offsetLeft;
        }
      });

      function resizeWindow(){
   $("#mainContent").height($(".mainContent").height() - $(".header").height());
          $("#mainContentHolder,.left-inner-main,.right-inner-main,#draggable").height($(".mainContent").height() - ($(".header").height() + 10));

          // Convert the width from px to %
var percent = $("div.main-left").width() / $(".mainContent").width() * 100;

          // Get the left postion of drag bar div incase window resized
   var position = (lastPosition != null)?((percent * $(".mainContent").width())/100):(($(".mainContent").width()/2));

          $("#draggable").css({
           'left' : position-5
        });
      };
    });
    </script>
 
 
 
 <script src="https://code.jquery.com/jquery-1.12.4.js"></script>



<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

   <?php
   

     for($i=1; $i<=$ii; $i++)

    {
      ?>
    
   
 <script type="text/javascript">
  var aa = "<?php echo $i ?>";

    var uu=$('#'+aa).val();

       
    $('.'+uu ).sortable({
        delay: 100,
        stop: function() {

          var aa = "<?php echo $i ?>";

           var uu=$('#'+aa).val();
            var selectedRow = new Array();
            $('.'+uu+'>tr').each(function() {
                selectedRow.push($(this).attr("id"));
            });
          



          // alert(selectedRow);


           

           var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            
           var jobid = selectedRow;
// Add record
             
            var lodid= uu;
             
  
   $.ajax({
        url: '{!! asset('updatesorting') !!}',
        type: 'post',
          

        data: {_token: CSRF_TOKEN,jobid: jobid,lodid: lodid},
        success: function(response){

        

          // Empty the input fields
          alert(response);
       
          
        }
      });


        

        }
    });
</script>

<style>

  div#div2 {
    margin-bottom: 21px;
    width: 127px;
    line-height: 12px;    margin-top: 19px;
}
h6 {
    display: block;
    padding: 0px;
    line-height: 3em;
}
.right-inner-main.custom-scrollbar-css {
    height: 600px !important;
}
footer.bdT.ta-c.p-30.lh-0.fsz-sm.c-grey-600{
  display: none;
}
</style>

<?php
}

?>


@endsection