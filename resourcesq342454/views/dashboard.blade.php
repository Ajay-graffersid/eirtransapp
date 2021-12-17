@extends('masterlayout')
 
@section('title')
  Dashboard
 @endsection
 
@section('content')

<link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.6.1/fullcalendar.min.css">

<style>

.table td, .table th {
    padding: 12px;
    padding: 17px 3px;
}
#calendar {
    width: 700px;
    margin: 0 auto;
}
.fc-row.fc-widget-header>table>thead>tr>th {
    background: #f15a29;
    color: #fff;
    padding: 10px;
}

span.fc-title {
    color: #fff;
}

.response {
    height: 60px;
}
.fc-view, .fc-view>table {
    position: relative;
    z-index: 1;
    BACKGROUND: #fbd9d9;
    COLOR: #000;
    FONT-WEIGHT: 600;
}

.success {
    background: #cdf3cd;
    padding: 10px 60px;
    border: #c3e6c3 1px solid;
    display: inline-block;
}
</style>

<style>
    .peer.peer-greed i {
    color: #f15a29;
      font-size: 29px;
}
.peer.peer-greed.two i {
    color: #22a912;
    font-size: 29px;
}

.peer.peer-greed.three i {
  color: #3069e8;
    font-size: 29px;
}

.peer.peer-greed.four i {
  color: #ffc106;
    font-size: 29px;
}


</style>
  
 
    <div id="output-text"> 
 <main class="main-content bgc-grey-100">
               <div id="mainContent">
                  <div class="row gap-20 masonry pos-r">
                     <div class="masonry-sizer col-md-6"></div>
                     <div class="masonry-item w-100">
                        <div class="row gap-20">
                           <div class="col-md-3">
                              <div class="layers bd bgc-white p-20" style="background: #fbd9d9 !important;">
                                 <div class="layer w-100 mB-10">
                                    <a href="{!! asset('viewMorningCheckReport') !!}"> <h6 class="lh-1" style="font-size: 16px;">Morning Check</h6></a>
                                 </div>
                                 <div class="layer w-100">
                                    <div class="peers ai-sb fxw-nw">
                                         <div class="peer peer-greed">
                          <i class="fa fa-file"></i>       </span>
                              </div>
                                         
                                         
                                         
                                       <div class="peer"><span class="d-ib lh-0 va-m fw-600 bdrs-10em pX-15 pY-15 bgc-green-50 c-green-500">{{$morncont}}</span></div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           
                           <div class="col-md-3">
                               
                              <div class="layers bd bgc-white p-20" style="    background: #e8f7c9 !important;" >
                                 <div class="layer w-100 mB-10">
                                   <a href="{!! asset('/jobchecklist') !!}"> <h6 class="lh-1" style="font-size: 16px;">Jobs</h6></a>
                                 </div>
                                 <div class="layer w-100">
                                    <div class="peers ai-sb fxw-nw">
                                            <div class="peer peer-greed two">
                         <i class="fa fa-suitcase"></i></div>
                                            
                                       <div class="peer"><span class="d-ib lh-0 va-m fw-600 bdrs-10em pX-15 pY-15 bgc-red-50 c-red-500">{{$jbcount}}</span></div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-3">
                              <div class="layers bd bgc-white p-20" style="background: #c9e3f7 !important;">
                                 <div class="layer w-100 mB-10">
                                       <a href="{!! asset('drexpence/list') !!}"> <h6 class="lh-1" style="font-size: 16px;">Expenses</h6></a>
                                 </div>
                                 <div class="layer w-100">
                                    <div class="peers ai-sb fxw-nw">
                                        <div class="peer peer-greed three">  <i class="fa fa-money"></i> </div>
                                       <div class="peer"><span class="d-ib lh-0 va-m fw-600 bdrs-10em pX-15 pY-15 bgc-purple-50 c-purple-500">{{$expcount}}</span></div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           
                           
                           
                            <div class="col-md-3">
                              <div class="layers bd bgc-white p-20" style="background: #f6f7c9 !important;">
                                 <div class="layer w-100 mB-10">
                                     <a href="{{url('planner')}}"><h6 class="lh-1" style="font-size: 16px;">Today Planner</h6></a>
                                 </div>
                                 <div class="layer w-100">
                                    <div class="peers ai-sb fxw-nw">
                                        <div class="peer peer-greed four"> <i class="fa fa-calendar"></i> </div>
                                       <div class="peer"><span class="d-ib lh-0 va-m fw-600 bdrs-10em pX-15 pY-15  c-purple-500" style="background: #FFC107 !important;" >{{$expcount}}</span></div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                         
                        </div>
                     </div>
                  
                  
                    
                   <div class="masonry-item col-md-6">
                        <div class="bd bgc-white">
                        
                           <div class="layers">
                               <div class="layer w-100 p-20">
                                 <h6 class="lh-1">Morning Check</h6>
                              </div>
                              <div class="layer w-100">
                                
                                 <div class="table-responsive p-20">
                                    <table class="table">
                                       <thead>
                                          <tr>
                                               <th class="bdwT-0">Sr No.</th>
                                             <th class="bdwT-0">Driver Name</th>
                                             <th class="bdwT-0">Mobile Number</th>
                                             <th class="bdwT-0">Truck Number</th>
                                             <th class="bdwT-0">Date</th>
                                             <th class="bdwT-0">View</th>
                                             
                                          </tr>
                                       </thead>
                                       <tbody>
                                              <?php
                         $sr=1;
                        ?>
                        
                             @foreach ($todymorningchecks as $todymorningcheck)
                                          <tr>
                                      <td class="fw-600">{{ $sr++ }}</td>
                                             <td>{{$todymorningcheck->drivername }}</td>
                                             <td>{{$todymorningcheck->mobile }}</td>
                                              <td>{{$todymorningcheck->truck_number }}</td>
                                              <td>{{$todymorningcheck->currenttdate }}</td>
                                            
                                          
            <td><a href=" {{ URL('/iitemlistt/'.$todymorningcheck->driver_id )}}"   class="view_btn">view more</a></td> 
                                          </tr>
                                @endforeach 
                                       </tbody>
                                    </table>
                                    
                                  
                                 </div>
                              </div>
                           </div>
                        </div>
                        
                         <div class="bd bgc-white" style="margin-top:15px;">
                        
                           <div class="layers">
                               <div class="layer w-100 p-20">
                                 <h6 class="lh-1">Job Check</h6>
                              </div>
                              <div class="layer w-100">
                                
                                 <div class="table-responsive p-20">
                                 <table id="dataTable" class="table cus-table">
                    <thead>
                      <tr>
                        <th>Sl. No.</th>
                        <th>Driver Name</th>
                        <th>Load Details.</th>
                        <th>Collection Date</th>
                        <th>Delivery Date</th>
                        <th>Status</th>
                        <th>View</th>
                      </tr>
                    </thead>
                    
                  </table>
                                    
                                    
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>  
                     
                     
                     
                       <div class="masonry-item col-md-6">
                        <div class="bgc-white p-20 bd">
                         
                           <div class="bgc-white p-20 bd" id='calendar'></div>
                        </div>
                     </div>
                   
                     
                  </div>
               </div>
            </main>

</div>

<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.2.1/jquery.min.js"></script>
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.12.0/moment.min.js"></script>
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.6.1/fullcalendar.min.js"></script>
<style>
    #calendar {
    width: 100%;
    }
    .fc-icon-left-single-arrow:after {
    top: -8px;
}
.fc-icon-right-single-arrow:after {
    top: -40%;
}
.fc-toolbar .fc-left {
    float: left;
    width: 241px;
}
    .fc-day-grid-container.fc-scroller {
    height: auto !important;
}

.fc .fc-row .fc-content-skeleton table, .fc .fc-row .fc-content-skeleton td, .fc .fc-row .fc-helper-skeleton td {
    background: 0 0;
    border-color: transparent;
    color: #000;
}
</style>

<?php 
  $login_id = session()->get('login_id');
  $user = DB::table('admin')->where('id',$login_id)->first();
  
  if ($user->roll == 1) { ?>

<script>
$(document).ready(function () {
    var calendar = $('#calendar').fullCalendar({
        today: true,
        editable: true,
        events: "{{ url('getCalendarEvents') }}",
        displayEventTime: false,
        eventRender: function (event, element, view) {
            if (event.allDay === 'true') {
                event.allDay = true;
            } else {
                event.allDay = false;
            }
        },
        selectable: true,
        selectHelper: true,
        eventColor: '#af340c',
        select: function (start, end, allDay) {
            var title = prompt('Event Title:');

            if (title) {
                //var start = $.fullCalendar.formatDate(start, "Y-MM-DD HH:mm:ss");
                var start = $.fullCalendar.moment(start, 'DD.MM.YYYY').format('YYYY-MM-DD HH:mm:ss');
                //var end = $.fullCalendar.formatDate(end, "Y-MM-DD HH:mm:ss");
                var end = $.fullCalendar.moment(end, 'DD.MM.YYYY').format('YYYY-MM-DD HH:mm:ss');

                $.ajax({
                    url: '{{url("addCalendarEvents")}}',
                    data: 'title=' + title + '&start=' + start + '&end=' + end,
                    type: "POST",
                    success: function (data) {
                        //alert('Event assigned successfully.');
                        location.reload();
                        //displayMessage("Added Successfully");
                    }
                });
                calendar.fullCalendar('renderEvent',
                        {
                            title: title,
                            start: start,
                            end: end,
                            allDay: allDay
                        },
                true
                        );
            }
            calendar.fullCalendar('unselect');
        },
        
        editable: true,
        eventDrop: function (event, delta) {
                    //var start = $.fullCalendar.formatDate(start, "Y-MM-DD HH:mm:ss");
                var start = $.fullCalendar.moment(event.start, 'DD.MM.YYYY').format('YYYY-MM-DD HH:mm:ss');
                //var end = $.fullCalendar.formatDate(end, "Y-MM-DD HH:mm:ss");
                var end = $.fullCalendar.moment(event.end, 'DD.MM.YYYY').format('YYYY-MM-DD HH:mm:ss');
                    $.ajax({
                        url: '{{url("editCalendarEvents")}}',
                        data: 'title=' + event.title + '&start=' + start + '&end=' + end + '&id=' + event.id,
                        type: "POST",
                        success: function (response) {
                            //alert('Event updated successfully.');
                            location.reload();
                            //displayMessage("Updated Successfully");
                        }
                    });
                },
        eventClick: function (event) {
            var deleteMsg = confirm("Do you really want to delete?");
            if (deleteMsg) {
                $.ajax({
                    type: "POST",
                    url: "{{url('deleteCalendarEvents')}}",
                    data: "&id=" + event.id,
                    success: function (response) {
                        if(parseInt(response) > 0) {
                            $('#calendar').fullCalendar('removeEvents', event.id);
                            //alert("Deleted Successfully");
                            location.reload();
                            //displayMessage("Deleted Successfully");
                        }
                    }
                });
            }
        }

    });

  function displayMessage(message) {
    $(".response").html("<div class='success'>"+message+"</div>");
    setInterval(function() { $(".success").fadeOut(); }, 3000);
  }
});
</script> 

<?php }else{ ?>

<script>
  $(document).ready(function () {
    var calendar = $('#calendar').fullCalendar({
        editable: true,
        events: "{{ url('getCalendarEvents') }}",
        displayEventTime: false,
        eventRender: function (event, element, view) {
            if (event.allDay === 'true') {
                event.allDay = true;
            } else {
                event.allDay = false;
            }
        },
        selectable: true,
        selectHelper: true,
        eventColor: '#af340c',
    });
  });
</script> 

<?php } ?>

   <script> 
        var changeFontStyle = function (font) { 
            document.getElementById( 
                "output-text").style.fontFamily 
                        = font.value; 
        } 
    </script> 
  


<style>

    .c-green-500, .cH-green-500:hover {
    color: #ffffff!important;
}

.bgc-green-50, .bgcH-green-50:hover {
    background-color: #f15a29!important;
}

.c-red-500, .cH-red-500:hover {
    color: #ffffff!important;
}

.bgc-red-50, .bgcH-red-50:hover {
    background-color: #22a911!important;
}

.c-purple-500, .cH-purple-500:hover {
    color: #ffffff!important;
}

.bgc-purple-50, .bgcH-purple-50:hover {
    background-color: #3069e8!important;
}
    
    
</style>
       <script> 
        var changeFontStyle = function (font) { 
            document.getElementById( 
                "output-text").style.fontFamily 
                        = font.value; 
        } 
    </script> 
                 

@endsection