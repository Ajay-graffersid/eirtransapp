@extends('layouts.master')
 
 @section('title')
  Pods Details
 @endsection
 
@section('content')

<main class="main-content bgc-grey-100" id="divToPrint">
        <div id="mainContent">
          <div class="container-fluid">
            <h4 class="c-grey-900 mT-10 mB-30">Pods Details</h4>
            <div class="row">
              <div class="col-md-12">
                    @if(Session::get('msg'))
         <div class = "alert alert-success">
            <ul>
              
             <li> {{Session::get('msg')}}</li>
              
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
                <div class="bgc-white bd bdrs-3 p-20 mB-20">
                 
                    <td>
                      <div class="card-body" style="padding:0px; text-align:right; margin-top: -44px;">
               <br>@csrf 
                <a class="btn btn-info" href="{{ url('export') }}"> 
                 Export File</a> &nbsp;  <button class="ri_btn" onClick="printDiv('divToPrint')">Print</button> </br>
            
                </td></br>
                  <table id="dataTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                      <tr>
                        <th>Sr no.</th>
                        <th>Customer </th>
                        <th>Car Registration</th>
                        <th>Collection Date</th>
                        <th>Delivery Date</th>
                        <th>POC Link</th>
                        <th>POD Link</th>
                        <th>Email Client</th>
                        
                      </tr>
                    </thead>
                    
                    <tbody>
                        <?php
                         $sr=1;
                         
                        ?>
                        
                        @foreach ($poddetails as $pods)
                        
                        
                      <tr>
                        <td>{{$sr++ }}</td>
                        <?php

                           
                            ?>
                            
                     
                        <td>{{$pods->name}}</td>
                        <td>{{$pods->reg}}</td> 	
                        
                        
                        
                        
                       <td>{{$pods->collection_date}}</td> 
                       
                        
                        

                     @if(!empty($pods->deliver_date))
                        <td>{{$pods->deliver_date}}</td>
                        <td><a href="{{ url('poc').'/'.$pods->job_id }}"   class="view_btn cus-button">POC LINK</a></td>
                        <td><a href="{{ url('podlink').'/'.$pods->job_id}}"   class="view_btn cus-button">POD LINK</a></td> 
                        @else
                        <td>Date not found</td>
                        <td><a href="{{ url('poc').'/'.$pods->job_id }}"   class="view_btn cus-button">POC LINK</a></td>
                        <td><a href=""   class="view_btn cus-button">POD LINK</a></td> 
                        @endif
                       
                        <td><input type="button" value="Email Client"  onclick="getplannerdetails({{$pods->job_id}})" /></td>
                        <!--
                        href="{{ url('mailpocpod').'/'.$pods->job_id}}"
                        <td><a href="{{ url('poc_reportexport').'/'.$pods->job_id }}" class="view_btn">POC PDF</a>    <a href="{{ url('pod_report_export').'/'.$pods->job_id }}" class="view_btn">POD PDF</a></td>-->
                    </tr>
                       
                     @endforeach
                    </tbody>
                  
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </main>
      
              <div id="boxes">    
            <div id="mask"> 
           
                <div id="dialog" class="window"> 
               
                    <div id="headerBorder">Send Email
                    <!--<button onclick="getpdf()">PDF</button>-->
                 
                    
                    <div id="close" class="close">[X]</div>    
                    </div>    
              <!-- for pushing a job-->
                 
         <form method='post' action="{!! asset('mailpocpod') !!}" enctype="multipart/form-data" >    
        <table class="table">
       <thead>
          
        <tr>
            <td>Email</td>
            <td><input type="text" name="email" class="form-control" placeholder="Enter Email" ></td>
            <input type="hidden" name="job_id" id="job_id" value="">
		   
             
        </tr>
        <tr>
            <td colspan="2">
                <input type="submit" value="submit">
            </td>
        </tr>
        
    </table>
   </form> 
   
    
   </div>    
            </div>    
        </div>
        
      </main>
 
 
 <style>
 
 #external-events {

    height: 619px;
    overflow: auto;
}
.leb {
    COLOR: \#000;
    COLOR: #000;
    FONT-SIZE: 16PX;
    font-weight: 600;
}
 #headerBorder {
    height: auto !important;
    width: 100%;
    background-color: #f14c17 !important;
    color: white;
    font-size: 18px;
    padding-top: 9px!important;
    margin-bottom: 20px;
    padding: 11px;font-weight: 700;
    border-radius: 5px;
}
 div#dialog {
    top: 4% !important;
}
 
 #boxes #dialog {
 
    height: auto;
 }
 div#mask {
    opacity: 1 !important;
    background: #000000ab;
}
 
 #div1 span {
    color: #fff;
    padding: 1px;
    width: 100%;
    display: inline-block;
    margin-bottom: 4px;
}
 
#external-events p {
    margin: 0px 0;
       font-size: 11px;
    color: #fff;
    padding: 0px 8px;
    background: #f14c17;
   
}     
     
 </style>
<style>
#div1 {
  width: auto;
  height: auto;
  padding: 10px;
  border: 1px solid #000;
}

#mask {      
           position: absolute;      
           padding-left: 60px;      
           padding-top: 80px;      
           padding-bottom: 80px;      
           padding-right: 50px;       
           left: 0;      
           top: 0;      
           z-index: 9999;      
           background-color: #808080;      
           display: none;      
       }      
     
       #boxes .window {      
           position: absolute;      
           left: 0;      
           top: 0;      
           width: 580px;      
           height: 300px;      
           display: none;      
           z-index: 9999;      
           padding: 20px;      
           background-color: white;      
           border: 3px solid #79BBFD;      
           border-radius: 10px;      
           -webkit-border-radius: 10px;      
           -moz-border-radius: 10px;      
       }      
     input#did {
    border: 1px solid #000;
    border-radius: 3px;
    height: 31px;    width: 40%;
}

input#llid{    width: 41%;
    border: 1px solid #000;
    border-radius: 3px;
    height: 31px;
}

       #boxes #dialog {      
        padding: 20px;
    width: 621px;
    height: auto;
    background-color: #ffffff;
    background-repeat: no-repeat;
    margin-top: 20px; 
       }      
       #headerBorder{      
            height:auto;       
            width:100%;       
            background-color:#0026ff;      
            color:white;       
            font-size:18px;       
            padding-top:3px;      
             margin-bottom:20px;      
       }      
       #close{      
           position:relative;      
           float:right;      
           text-decoration:none;      
           padding-right:5px;       
           cursor:pointer;      
       }     
</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>  <!-- jQuery CDN -->
<script>
function allowDrop(ev) {
  ev.preventDefault();
}

function drag(ev) {
  ev.dataTransfer.setData("text", ev.target.id);
}

function drop(ev,driverid,d,m,y) {
  
   
  ev.preventDefault();
  var data = ev.dataTransfer.getData("text");
  
 
  ev.target.appendChild(document.getElementById(data));



<!-- Script -->

var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

// Add record
  

    var loadid = data;
    
   var driverid = driverid;
    var d = d;
    var m=  m;
    var y = y;
   
    
    
      $.ajax({
        url: '{!! asset('loadassign') !!}',
        type: 'post',
        data: {_token: CSRF_TOKEN,loadid: loadid,driverid: driverid,d: d,m: m,y:y},
        success: function(response){

        

          // Empty the input fields
          alert(response);
          location.reload();
        }
      });
  







   
    
}




  function getplannerdetails(id) {
      
   $('#job_id').val(id);
     
     
    
    var id = '#dialog';    
        var clgName = $('#cllg').val();    
        $("#clg").val(clgName);    
       var maskHeight = $(document).height();    
        var maskWidth = $(document).width();    
        $('#mask').css({ 'width': maskWidth, 'height': maskHeight })    
        $('#mask').fadeIn(1000);    
        $('#mask').fadeTo("slow", 0.8);    
        var winH = $(window).height();    
        var winW = $(window).width();    
        $(id).css('top', winH / 2 - $(id).height() / 2);    
        $(id).css('left', winW / 2 - $(id).width() / 2);    
        $(id).fadeIn(2000);    
        $('.window .close').click(function (e) {    
            e.preventDefault();    
            $('#mask').hide();    
            $('#bodyData').empty();
            $('.window').hide();    
        });    
                
           
           



  }


  function searchplaanerbydate(date)
  {
      window.location.href='{!! asset("planner")!!}/'+date;
  }


  
 
 
 function getpdf()
 {
    
    
var load_id = $('#llid').val(); 
    
var driver_id = $('#did').val(); 
  window.location.href='{!! asset("getpdfbyload")!!}/'+load_id;

 }
 
 
 
 
 
 
</script>
<style>
    .ui-state-active, .ui-widget-content .ui-state-active, .ui-widget-header .ui-state-active, a.ui-button:active, .ui-button:active, .ui-button.ui-state-active:hover {
    border: 1px solid #f14c17;
    background: #f14c17;
    }
</style>

 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 <style>
 button.ri_btn {
    background: #f14c17;
    color: #fff;
    padding: 7px 19px;
    border-radius: 4px;
    border: 0;
      text-align: right;
}
 input[type="submit"]{
   background-color: #c14117!important;
    border-color: #c14118!important;
    border: none;
    color: #fff;
    padding: 5px 16px;
    border-radius: 4px;
    font-weight: 500;
 }
     .dataTables_wrapper {margin-top: 2em;}
     
 </style>

      
      
      
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
 .table-striped tbody tr:nth-of-type(odd) { background: none}
 
     .table-bordered thead td, .table-bordered thead th {  background: #f7f7f7;}
       
     div#dataTable_length {
    margin-top: 18px;
}
      button.ri_btn {
    background: #f14c17;
    color: #fff;
    padding: 7px 19px;
    border-radius: 4px;
    border: 0;
      text-align: right;
}
     
 </style>

@endsection