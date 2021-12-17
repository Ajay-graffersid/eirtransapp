@extends('masterlayout')
 
@section('title')
  Master jobs search
 @endsection
 
@section('content')

<main class="main-content bgc-grey-100">
        <div id="mainContent">
          <div class="container-fluid">
            <h4 class="c-grey-900 mT-10 mB-30">Master jobs search</h4>
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
                    
              
                 
               
        </div>
                  
                  <table id="dataTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                      <tr>
                        <th>Sl. No.</th>
                        <th>Job No.</th>
                        <th>Customer Name</th>
                        <th>Make/Model</th>
                        <th>Reg</th>
                        <th>Location</th>
                        <th>Collection Address</th>
                        <th>Delivery Address</th>
                        <th>Booking Date</th>
                        <th>Lane</th>
                        <th>Rate</th>
                        <th>Invoice</th>
                        <th>Status</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $sr=1; ?>
                      @foreach ($jobs as $job)
                        <tr>
                          <td>{{ $sr++ }}</td>
                          <td>{{ $job->job_number }}</td>
                          <td><?php
                            $name = DB::table('jobcustomer')->where('id',$job->customer)->first();
                            echo $name->customer_name;
                          ?></td>
                          <td>{{$job->make_model }}</td>
                          <td>{{$job->reg }}</td>
                          <td>{{$job->location }}</td>
                          <td>{{$job->collection_address }}</td>
                          <td>{{$job->delivery_address }}</td>
                          <td>{{$job->booking_date }}</td>
                          <td><?php
                            $name = DB::table('lane')->where('id',$job->lan)->first();
                            $checkinv = DB::table('invoices')->where('job_id',$job->id)->first();
                            if(!empty( $name->lane_number)){
                                echo $name->lane_number;
                            }
                            
                          ?></td>
                          <td>{{$job->rate }}</td>
                          <td>@if(!empty($checkinv))<i class="fa fa-download" aria-hidden="true" onclick="getplannerdetails({{$job->id}})"></i>@endif</td>
                          <td>
                          @if($job->bookingstatus=='6')
                          <a href="" class="view_btn blue-btn">Job Collected</a>
                          @endif
                          @if($job->bookingstatus=='7' && $job->status=='2')
                          <a href="" class="view_btn blue-btn">Job Collected</a>
                          <!--<a href="" class="view_btn green-btn">Load Collected</a>-->
                          @endif
                          @if($job->bookingstatus=='0')
                          @endif
                          @if($job->bookingstatus=='9')
                          <a href="" class="view_btn">Not Collected</a>
                          @endif
                            @if($job->bookingstatus=='4')
                          <a href="" class="view_btn green-btn">Job Complete</a>
                          @endif
                             @if($job->split_job=='6')
                          <a href="" class="view_btn yellow-btn">In Progress</a>
                          @endif
                          
                           @if($job->status=='1' && $job->load_status=='1')
                          <span>Job Assigned to driver</span>
                          @endif
                          
                          @if($job->status=='0' && $job->load_status=='0')
                          <span>Job in car for collection</span>
                          @endif
                          
                          @if($job->status=='1' && $job->load_status=='0')
                          <span>Job in load builder</span>
                          @endif
                           @if($job->status=='3' && $job->load_status=='1')
                          <span>Job in car for delivery</span>
                          @endif
                          {{$job->id}}
                          </td>
                          <td>  @if($job->bookingstatus=='9') <a href="{{ url('view_job_notcolleectedreport/list').'/'.$job->id }}" class="btn btn-info editcol">View</a> @endif @if($job->bookingstatus!='9' and $job->bookingstatus!='0' and $job->bookingstatus!='2'  )<a href="{{ url('view_job_report/list').'/'.$job->id }}" class="btn btn-info editcol">View</a> @endif  </td>
  
                          <!--{{ url('job_details/editJob').'/'.$job->id }}-->
                        </tr>
                      @endforeach
              </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
        
        <div id="boxes">    
            <div id="mask"> 
           
                <div id="dialog" class="window"> 
               
                    <div id="headerBorder">Invoice
                    <!--<button onclick="getpdf()">PDF</button>-->
                 
                    
                    <div id="close" class="close">[X]</div>    
                    </div>    
              <!-- for pushing a job-->
                 
              
        <table class="table table-bordered table-sm">
       <thead>
        <tr>
            <th>Sr No</th>
            <th>Invoice</th>
            
		   
             
        </tr>
       </thead>
       <tbody id="bodyData">

       </tbody>  
    </table>
  
   
    
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
      

     
     
    var jobid = id;
    
   
       
        $.ajax({
            url: "{!! asset('getinvoice') !!}",
            type: "POST",
            data:{ 
                _token:'{{ csrf_token() }}',jobid: jobid 
            },
            cache: false,
            dataType: 'json',
            success: function(dataResult){
                var resultData = dataResult.data;
                var bodyData = '';
                var i=1;
                $.each(resultData,function(index,row){
                        
                    bodyData+="<tr>"
                    bodyData+="<td>"+ i++ +"</td><td><a href="+'https://eirtransapp.com/public/uploads/inv/'+row.inv_file+" download="+row.inv_file+">"+row.inv_file+"</a></td>";
                    bodyData+="</tr>";
                    
                })
                
                
               
                $("#bodyData").append(bodyData);
                   
                 
                  
                
                 
                 
                 
                  
                  
                   
                    $("#pushing").hide(); 
                  
                  
                  
             
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

@endsection