@extends('masterlayout')
 
@section('title')
  Planner
 @endsection
 
@section('content')

<main class="main-content bgc-grey-100">
        <div id="mainContent">
             
          <div class="container-fluid">
            <h4 class="c-grey-900 mT-10 mB-30">Assign load to drivers </h4>
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
                  
                   <script>

  document.addEventListener('DOMContentLoaded', function() {

    /* initialize the external events
    -----------------------------------------------------------------*/

    var containerEl = document.getElementById('external-events-list');
    new FullCalendar.Draggable(containerEl, {
      itemSelector: '.fc-event',
      eventData: function(eventEl) {
        return {
          title: eventEl.innerText.trim()
        }
      }
    });

    //// the individual way to do it
    // var containerEl = document.getElementById('external-events-list');
    // var eventEls = Array.prototype.slice.call(
    //   containerEl.querySelectorAll('.fc-event')
    // );
    // eventEls.forEach(function(eventEl) {
    //   new FullCalendar.Draggable(eventEl, {
    //     eventData: {
    //       title: eventEl.innerText.trim(),
    //     }
    //   });
    // });

    /* initialize the calendar
    -----------------------------------------------------------------*/

    var calendarEl = document.getElementById('calendar');
    var calendar = new FullCalendar.Calendar(calendarEl, {
      headerToolbar: {
        left: 'prev,next today',
        center: 'title',
        right: 'timeGridWeek'
      },
      editable: true,
      droppable: true, // this allows things to be dropped onto the calendar
      drop: function(arg) {
        // is the "remove after drop" checkbox checked?
        if (document.getElementById('drop-remove').checked) {
          // if so, remove the element from the "Draggable Events" list
          arg.draggedEl.parentNode.removeChild(arg.draggedEl);
        }
      }
    });
    calendar.render();

  });

</script>
<style>

  body {
   
    font-family: Arial, Helvetica Neue, Helvetica, sans-serif;
  }
.fc-event-dot {
    background-color: #ed5929!important;
}
  #external-events {

    width: 370px;
    padding: 0 10px;
    border: 1px solid #ccc;
    background: #eee;
    text-align: left;
   MARGIN-LEFT: 0EM;
    MARGIN-TOP: 0EM;
    float:left;
  }

  #external-events h4 {
    font-size: 16px;
    margin-top: 0;
    padding-top: 1em;
  }

  #external-events .fc-event {
    margin: 3px 0;
    cursor: move;
  }

  #external-events p {
    margin: 1.5em 0;
    font-size: 11px;
    color: #666;
  }

  #external-events p input {
    margin: 0;
    vertical-align: middle;
  }

  #calendar-wrap {
    margin-left: 400px;
  }

  #calendar {
    max-width: 1100px;
    margin: 0 auto;
  }

</style>
</head>
<body>
  <div id='wrap'>
      
      
      <div class="dataTables_length" id="dataTable_length">
          
          <label> <select name="dataTable_length" aria-controls="dataTable" class=""><option value="10">select driver</option>
             @foreach($drivers as $drv)
             <option value="10">{{$drv->name}}</option>
             @endforeach
          </select> </label>
      
      </div>
      

    <div id='external-events'>
      <h4>load </h4>

      <div id='external-events-list'>
       
         @foreach($loads as $load)
        <div class='fc-event fc-h-event fc-daygrid-event fc-daygrid-block-event'>
          <div class='fc-event-main'>
             
          <p>  customer name : {{$load->customer_name}} </p> 
      
             
               <p>  make_model : {{$load->make_model}}
           </p> 
        
        
           <p>  reg_number : {{$load->reg_number}}
       </p> 
        
        
           <p>  collectionaddress :  {{$load->collectionaddress}}
          </p> 
        
        
           <p>  	lane : {{$load->customer_name}}
           </p> 
            
            
                <p>  	mobile :{{$load->mobile}} 
           </p> 
            
            
              </div>
        </div>
      
        @endforeach
      </div>

      <p>
        <input type='checkbox' id='drop-remove' />
        <label for='drop-remove'>remove after drop</label>
      </p>
    </div>

    <div id='calendar-wrap'>
    
    <div class="fc fc-media-screen fc-direction-ltr fc-theme-standard">
   <div class="fc-header-toolbar fc-toolbar fc-toolbar-ltr">
      <div class="fc-toolbar-chunk">
         <div class="fc-button-group"><button class="fc-prev-button fc-button fc-button-primary" type="button" aria-label="prev"><span class="fc-icon fc-icon-chevron-left"></span></button><button class="fc-next-button fc-button fc-button-primary" type="button" aria-label="next"><span class="fc-icon fc-icon-chevron-right"></span></button></div>
         <button disabled="" class="fc-today-button fc-button fc-button-primary" type="button">today</button>
      </div>
      <div class="fc-toolbar-chunk">
         <h2 class="fc-toolbar-title">Nov 8 – 14, 2020</h2>
      </div>
      <div class="fc-toolbar-chunk"><button class="fc-timeGridWeek-button fc-button fc-button-primary fc-button-active" type="button">week</button></div>
   </div>
   <div class="fc-view-harness fc-view-harness-active" style="height: 562.222px;">
      <div class="fc-timegrid fc-timeGridWeek-view fc-view">
         <table class="fc-scrollgrid  fc-scrollgrid-liquid">
            <thead>
               <tr class="fc-scrollgrid-section fc-scrollgrid-section-header ">
                  <td>
                     <div class="fc-scroller-harness">
                        <div class="fc-scroller" style="overflow: hidden scroll;">
                           <table class="fc-col-header " style="width: 740px;">
                              <colgroup>
                                 <col style="width: 51px;">
                              </colgroup>
                              <tbody>
                                 <tr>
                                    <th class="fc-timegrid-axis">
                                       <div class="fc-timegrid-axis-frame"></div>
                                    </th>
                                    <th class="fc-col-header-cell fc-day fc-day-sun fc-day-past" data-date="2020-11-08">
                                       <div class="fc-scrollgrid-sync-inner"><a class="fc-col-header-cell-cushion ">Sun 11/8</a></div>
                                    </th>
                                    <th class="fc-col-header-cell fc-day fc-day-mon fc-day-past" data-date="2020-11-09">
                                       <div class="fc-scrollgrid-sync-inner"><a class="fc-col-header-cell-cushion ">Mon 11/9</a></div>
                                    </th>
                                    <th class="fc-col-header-cell fc-day fc-day-tue fc-day-past" data-date="2020-11-10">
                                       <div class="fc-scrollgrid-sync-inner"><a class="fc-col-header-cell-cushion ">Tue 11/10</a></div>
                                    </th>
                                    <th class="fc-col-header-cell fc-day fc-day-wed fc-day-today " data-date="2020-11-11">
                                       <div class="fc-scrollgrid-sync-inner"><a class="fc-col-header-cell-cushion ">Wed 11/11</a></div>
                                    </th>
                                    <th class="fc-col-header-cell fc-day fc-day-thu fc-day-future" data-date="2020-11-12">
                                       <div class="fc-scrollgrid-sync-inner"><a class="fc-col-header-cell-cushion ">Thu 11/12</a></div>
                                    </th>
                                    <th class="fc-col-header-cell fc-day fc-day-fri fc-day-future" data-date="2020-11-13">
                                       <div class="fc-scrollgrid-sync-inner"><a class="fc-col-header-cell-cushion ">Fri 11/13</a></div>
                                    </th>
                                    <th class="fc-col-header-cell fc-day fc-day-sat fc-day-future" data-date="2020-11-14">
                                       <div class="fc-scrollgrid-sync-inner"><a class="fc-col-header-cell-cushion ">Sat 11/14</a></div>
                                    </th>
                                 </tr>
                              </tbody>
                           </table>
                        </div>
                     </div>
                  </td>
               </tr>
            </thead>
            <tbody>
               <tr class="fc-scrollgrid-section fc-scrollgrid-section-body ">
                  <td>
                     <div class="fc-scroller-harness">
                        <div class="fc-scroller" style="overflow: hidden scroll;">
                           <div class="fc-daygrid-body fc-daygrid-body-unbalanced fc-daygrid-body-natural" style="width: 740px;">
                              <table class="fc-scrollgrid-sync-table" style="width: 740px;">
                                 <colgroup>
                                    <col style="width: 51px;">
                                 </colgroup>
                                 <tbody>
                                    <tr>
                                       <td class="fc-timegrid-axis fc-scrollgrid-shrink">
                                          <div class="fc-timegrid-axis-frame fc-scrollgrid-shrink-frame fc-timegrid-axis-frame-liquid"><span class="fc-timegrid-axis-cushion fc-scrollgrid-shrink-cushion fc-scrollgrid-sync-inner">drivers</span></div>
                                       </td>
                                       <td class="fc-daygrid-day fc-day fc-day-sun fc-day-past" data-date="2020-11-08">
                                          <div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                             <div class="fc-daygrid-day-events"></div>
                                             <div class="fc-daygrid-day-bg"></div>
                                          </div>
                                       </td>
                                       <td class="fc-daygrid-day fc-day fc-day-mon fc-day-past" data-date="2020-11-09">
                                          <div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                             <div class="fc-daygrid-day-events"></div>
                                             <div class="fc-daygrid-day-bg"></div>
                                          </div>
                                       </td>
                                       <td class="fc-daygrid-day fc-day fc-day-tue fc-day-past" data-date="2020-11-10">
                                          <div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                             <div class="fc-daygrid-day-events"></div>
                                             <div class="fc-daygrid-day-bg"></div>
                                          </div>
                                       </td>
                                       <td class="fc-daygrid-day fc-day fc-day-wed fc-day-today " data-date="2020-11-11">
                                          <div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                             <div class="fc-daygrid-day-events"></div>
                                             <div class="fc-daygrid-day-bg"></div>
                                          </div>
                                       </td>
                                       <td class="fc-daygrid-day fc-day fc-day-thu fc-day-future" data-date="2020-11-12">
                                          <div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                             <div class="fc-daygrid-day-events"></div>
                                             <div class="fc-daygrid-day-bg"></div>
                                          </div>
                                       </td>
                                       <td class="fc-daygrid-day fc-day fc-day-fri fc-day-future" data-date="2020-11-13">
                                          <div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                             <div class="fc-daygrid-day-events"></div>
                                             <div class="fc-daygrid-day-bg"></div>
                                          </div>
                                       </td>
                                       <td class="fc-daygrid-day fc-day fc-day-sat fc-day-future" data-date="2020-11-14">
                                          <div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                                             <div class="fc-daygrid-day-events"></div>
                                             <div class="fc-daygrid-day-bg"></div>
                                          </div>
                                       </td>
                                    </tr>
                                 </tbody>
                              </table>
                           </div>
                        </div>
                     </div>
                  </td>
               </tr>
               <tr class="fc-scrollgrid-section">
                  <td class="fc-timegrid-divider fc-cell-shaded"></td>
               </tr>
               <tr class="fc-scrollgrid-section fc-scrollgrid-section-body  fc-scrollgrid-section-liquid">
                  <td>
                     <div class="fc-scroller-harness fc-scroller-harness-liquid">
                        <div class="fc-scroller fc-scroller-liquid-absolute" style="overflow: hidden scroll;">
                           <div class="fc-timegrid-body" style="width: 740px;">
                              <div class="fc-timegrid-slots">
                                 <table class="" style="width: 740px;">
                                    <colgroup>
                                       <col style="width: 51px;">
                                    </colgroup>
                                    <tbody>
                                       <tr>
                                          <td class="fc-timegrid-slot fc-timegrid-slot-label fc-scrollgrid-shrink" data-time="00:00:00">
                                             <div class="fc-timegrid-slot-label-frame fc-scrollgrid-shrink-frame">
                                                <div class="fc-timegrid-slot-label-cushion fc-scrollgrid-shrink-cushion">12am</div>
                                             </div>
                                          </td>
                                          <td class="fc-timegrid-slot fc-timegrid-slot-lane " data-time="00:00:00"></td>
                                       </tr>
                                       <tr>
                                          <td class="fc-timegrid-slot fc-timegrid-slot-label fc-timegrid-slot-minor" data-time="00:30:00"></td>
                                          <td class="fc-timegrid-slot fc-timegrid-slot-lane fc-timegrid-slot-minor" data-time="00:30:00"></td>
                                       </tr>
                                       <tr>
                                          <td class="fc-timegrid-slot fc-timegrid-slot-label fc-scrollgrid-shrink" data-time="01:00:00">
                                             <div class="fc-timegrid-slot-label-frame fc-scrollgrid-shrink-frame">
                                                <div class="fc-timegrid-slot-label-cushion fc-scrollgrid-shrink-cushion">1am</div>
                                             </div>
                                          </td>
                                          <td class="fc-timegrid-slot fc-timegrid-slot-lane " data-time="01:00:00"></td>
                                       </tr>
                                       <tr>
                                          <td class="fc-timegrid-slot fc-timegrid-slot-label fc-timegrid-slot-minor" data-time="01:30:00"></td>
                                          <td class="fc-timegrid-slot fc-timegrid-slot-lane fc-timegrid-slot-minor" data-time="01:30:00"></td>
                                       </tr>
                                       <tr>
                                          <td class="fc-timegrid-slot fc-timegrid-slot-label fc-scrollgrid-shrink" data-time="02:00:00">
                                             <div class="fc-timegrid-slot-label-frame fc-scrollgrid-shrink-frame">
                                                <div class="fc-timegrid-slot-label-cushion fc-scrollgrid-shrink-cushion">2am</div>
                                             </div>
                                          </td>
                                          <td class="fc-timegrid-slot fc-timegrid-slot-lane " data-time="02:00:00"></td>
                                       </tr>
                                       <tr>
                                          <td class="fc-timegrid-slot fc-timegrid-slot-label fc-timegrid-slot-minor" data-time="02:30:00"></td>
                                          <td class="fc-timegrid-slot fc-timegrid-slot-lane fc-timegrid-slot-minor" data-time="02:30:00"></td>
                                       </tr>
                                       <tr>
                                          <td class="fc-timegrid-slot fc-timegrid-slot-label fc-scrollgrid-shrink" data-time="03:00:00">
                                             <div class="fc-timegrid-slot-label-frame fc-scrollgrid-shrink-frame">
                                                <div class="fc-timegrid-slot-label-cushion fc-scrollgrid-shrink-cushion">3am</div>
                                             </div>
                                          </td>
                                          <td class="fc-timegrid-slot fc-timegrid-slot-lane " data-time="03:00:00"></td>
                                       </tr>
                                       <tr>
                                          <td class="fc-timegrid-slot fc-timegrid-slot-label fc-timegrid-slot-minor" data-time="03:30:00"></td>
                                          <td class="fc-timegrid-slot fc-timegrid-slot-lane fc-timegrid-slot-minor" data-time="03:30:00"></td>
                                       </tr>
                                       <tr>
                                          <td class="fc-timegrid-slot fc-timegrid-slot-label fc-scrollgrid-shrink" data-time="04:00:00">
                                             <div class="fc-timegrid-slot-label-frame fc-scrollgrid-shrink-frame">
                                                <div class="fc-timegrid-slot-label-cushion fc-scrollgrid-shrink-cushion">4am</div>
                                             </div>
                                          </td>
                                          <td class="fc-timegrid-slot fc-timegrid-slot-lane " data-time="04:00:00"></td>
                                       </tr>
                                       <tr>
                                          <td class="fc-timegrid-slot fc-timegrid-slot-label fc-timegrid-slot-minor" data-time="04:30:00"></td>
                                          <td class="fc-timegrid-slot fc-timegrid-slot-lane fc-timegrid-slot-minor" data-time="04:30:00"></td>
                                       </tr>
                                       <tr>
                                          <td class="fc-timegrid-slot fc-timegrid-slot-label fc-scrollgrid-shrink" data-time="05:00:00">
                                             <div class="fc-timegrid-slot-label-frame fc-scrollgrid-shrink-frame">
                                                <div class="fc-timegrid-slot-label-cushion fc-scrollgrid-shrink-cushion">5am</div>
                                             </div>
                                          </td>
                                          <td class="fc-timegrid-slot fc-timegrid-slot-lane " data-time="05:00:00"></td>
                                       </tr>
                                       <tr>
                                          <td class="fc-timegrid-slot fc-timegrid-slot-label fc-timegrid-slot-minor" data-time="05:30:00"></td>
                                          <td class="fc-timegrid-slot fc-timegrid-slot-lane fc-timegrid-slot-minor" data-time="05:30:00"></td>
                                       </tr>
                                       <tr>
                                          <td class="fc-timegrid-slot fc-timegrid-slot-label fc-scrollgrid-shrink" data-time="06:00:00">
                                             <div class="fc-timegrid-slot-label-frame fc-scrollgrid-shrink-frame">
                                                <div class="fc-timegrid-slot-label-cushion fc-scrollgrid-shrink-cushion">6am</div>
                                             </div>
                                          </td>
                                          <td class="fc-timegrid-slot fc-timegrid-slot-lane " data-time="06:00:00"></td>
                                       </tr>
                                       <tr>
                                          <td class="fc-timegrid-slot fc-timegrid-slot-label fc-timegrid-slot-minor" data-time="06:30:00"></td>
                                          <td class="fc-timegrid-slot fc-timegrid-slot-lane fc-timegrid-slot-minor" data-time="06:30:00"></td>
                                       </tr>
                                       <tr>
                                          <td class="fc-timegrid-slot fc-timegrid-slot-label fc-scrollgrid-shrink" data-time="07:00:00">
                                             <div class="fc-timegrid-slot-label-frame fc-scrollgrid-shrink-frame">
                                                <div class="fc-timegrid-slot-label-cushion fc-scrollgrid-shrink-cushion">7am</div>
                                             </div>
                                          </td>
                                          <td class="fc-timegrid-slot fc-timegrid-slot-lane " data-time="07:00:00"></td>
                                       </tr>
                                       <tr>
                                          <td class="fc-timegrid-slot fc-timegrid-slot-label fc-timegrid-slot-minor" data-time="07:30:00"></td>
                                          <td class="fc-timegrid-slot fc-timegrid-slot-lane fc-timegrid-slot-minor" data-time="07:30:00"></td>
                                       </tr>
                                       <tr>
                                          <td class="fc-timegrid-slot fc-timegrid-slot-label fc-scrollgrid-shrink" data-time="08:00:00">
                                             <div class="fc-timegrid-slot-label-frame fc-scrollgrid-shrink-frame">
                                                <div class="fc-timegrid-slot-label-cushion fc-scrollgrid-shrink-cushion">8am</div>
                                             </div>
                                          </td>
                                          <td class="fc-timegrid-slot fc-timegrid-slot-lane " data-time="08:00:00"></td>
                                       </tr>
                                       <tr>
                                          <td class="fc-timegrid-slot fc-timegrid-slot-label fc-timegrid-slot-minor" data-time="08:30:00"></td>
                                          <td class="fc-timegrid-slot fc-timegrid-slot-lane fc-timegrid-slot-minor" data-time="08:30:00"></td>
                                       </tr>
                                       <tr>
                                          <td class="fc-timegrid-slot fc-timegrid-slot-label fc-scrollgrid-shrink" data-time="09:00:00">
                                             <div class="fc-timegrid-slot-label-frame fc-scrollgrid-shrink-frame">
                                                <div class="fc-timegrid-slot-label-cushion fc-scrollgrid-shrink-cushion">9am</div>
                                             </div>
                                          </td>
                                          <td class="fc-timegrid-slot fc-timegrid-slot-lane " data-time="09:00:00"></td>
                                       </tr>
                                       <tr>
                                          <td class="fc-timegrid-slot fc-timegrid-slot-label fc-timegrid-slot-minor" data-time="09:30:00"></td>
                                          <td class="fc-timegrid-slot fc-timegrid-slot-lane fc-timegrid-slot-minor" data-time="09:30:00"></td>
                                       </tr>
                                       <tr>
                                          <td class="fc-timegrid-slot fc-timegrid-slot-label fc-scrollgrid-shrink" data-time="10:00:00">
                                             <div class="fc-timegrid-slot-label-frame fc-scrollgrid-shrink-frame">
                                                <div class="fc-timegrid-slot-label-cushion fc-scrollgrid-shrink-cushion">10am</div>
                                             </div>
                                          </td>
                                          <td class="fc-timegrid-slot fc-timegrid-slot-lane " data-time="10:00:00"></td>
                                       </tr>
                                       <tr>
                                          <td class="fc-timegrid-slot fc-timegrid-slot-label fc-timegrid-slot-minor" data-time="10:30:00"></td>
                                          <td class="fc-timegrid-slot fc-timegrid-slot-lane fc-timegrid-slot-minor" data-time="10:30:00"></td>
                                       </tr>
                                       <tr>
                                          <td class="fc-timegrid-slot fc-timegrid-slot-label fc-scrollgrid-shrink" data-time="11:00:00">
                                             <div class="fc-timegrid-slot-label-frame fc-scrollgrid-shrink-frame">
                                                <div class="fc-timegrid-slot-label-cushion fc-scrollgrid-shrink-cushion">11am</div>
                                             </div>
                                          </td>
                                          <td class="fc-timegrid-slot fc-timegrid-slot-lane " data-time="11:00:00"></td>
                                       </tr>
                                       <tr>
                                          <td class="fc-timegrid-slot fc-timegrid-slot-label fc-timegrid-slot-minor" data-time="11:30:00"></td>
                                          <td class="fc-timegrid-slot fc-timegrid-slot-lane fc-timegrid-slot-minor" data-time="11:30:00"></td>
                                       </tr>
                                       <tr>
                                          <td class="fc-timegrid-slot fc-timegrid-slot-label fc-scrollgrid-shrink" data-time="12:00:00">
                                             <div class="fc-timegrid-slot-label-frame fc-scrollgrid-shrink-frame">
                                                <div class="fc-timegrid-slot-label-cushion fc-scrollgrid-shrink-cushion">12pm</div>
                                             </div>
                                          </td>
                                          <td class="fc-timegrid-slot fc-timegrid-slot-lane " data-time="12:00:00"></td>
                                       </tr>
                                       <tr>
                                          <td class="fc-timegrid-slot fc-timegrid-slot-label fc-timegrid-slot-minor" data-time="12:30:00"></td>
                                          <td class="fc-timegrid-slot fc-timegrid-slot-lane fc-timegrid-slot-minor" data-time="12:30:00"></td>
                                       </tr>
                                       <tr>
                                          <td class="fc-timegrid-slot fc-timegrid-slot-label fc-scrollgrid-shrink" data-time="13:00:00">
                                             <div class="fc-timegrid-slot-label-frame fc-scrollgrid-shrink-frame">
                                                <div class="fc-timegrid-slot-label-cushion fc-scrollgrid-shrink-cushion">1pm</div>
                                             </div>
                                          </td>
                                          <td class="fc-timegrid-slot fc-timegrid-slot-lane " data-time="13:00:00"></td>
                                       </tr>
                                       <tr>
                                          <td class="fc-timegrid-slot fc-timegrid-slot-label fc-timegrid-slot-minor" data-time="13:30:00"></td>
                                          <td class="fc-timegrid-slot fc-timegrid-slot-lane fc-timegrid-slot-minor" data-time="13:30:00"></td>
                                       </tr>
                                       <tr>
                                          <td class="fc-timegrid-slot fc-timegrid-slot-label fc-scrollgrid-shrink" data-time="14:00:00">
                                             <div class="fc-timegrid-slot-label-frame fc-scrollgrid-shrink-frame">
                                                <div class="fc-timegrid-slot-label-cushion fc-scrollgrid-shrink-cushion">2pm</div>
                                             </div>
                                          </td>
                                          <td class="fc-timegrid-slot fc-timegrid-slot-lane " data-time="14:00:00"></td>
                                       </tr>
                                       <tr>
                                          <td class="fc-timegrid-slot fc-timegrid-slot-label fc-timegrid-slot-minor" data-time="14:30:00"></td>
                                          <td class="fc-timegrid-slot fc-timegrid-slot-lane fc-timegrid-slot-minor" data-time="14:30:00"></td>
                                       </tr>
                                       <tr>
                                          <td class="fc-timegrid-slot fc-timegrid-slot-label fc-scrollgrid-shrink" data-time="15:00:00">
                                             <div class="fc-timegrid-slot-label-frame fc-scrollgrid-shrink-frame">
                                                <div class="fc-timegrid-slot-label-cushion fc-scrollgrid-shrink-cushion">3pm</div>
                                             </div>
                                          </td>
                                          <td class="fc-timegrid-slot fc-timegrid-slot-lane " data-time="15:00:00"></td>
                                       </tr>
                                       <tr>
                                          <td class="fc-timegrid-slot fc-timegrid-slot-label fc-timegrid-slot-minor" data-time="15:30:00"></td>
                                          <td class="fc-timegrid-slot fc-timegrid-slot-lane fc-timegrid-slot-minor" data-time="15:30:00"></td>
                                       </tr>
                                       <tr>
                                          <td class="fc-timegrid-slot fc-timegrid-slot-label fc-scrollgrid-shrink" data-time="16:00:00">
                                             <div class="fc-timegrid-slot-label-frame fc-scrollgrid-shrink-frame">
                                                <div class="fc-timegrid-slot-label-cushion fc-scrollgrid-shrink-cushion">4pm</div>
                                             </div>
                                          </td>
                                          <td class="fc-timegrid-slot fc-timegrid-slot-lane " data-time="16:00:00"></td>
                                       </tr>
                                       <tr>
                                          <td class="fc-timegrid-slot fc-timegrid-slot-label fc-timegrid-slot-minor" data-time="16:30:00"></td>
                                          <td class="fc-timegrid-slot fc-timegrid-slot-lane fc-timegrid-slot-minor" data-time="16:30:00"></td>
                                       </tr>
                                       <tr>
                                          <td class="fc-timegrid-slot fc-timegrid-slot-label fc-scrollgrid-shrink" data-time="17:00:00">
                                             <div class="fc-timegrid-slot-label-frame fc-scrollgrid-shrink-frame">
                                                <div class="fc-timegrid-slot-label-cushion fc-scrollgrid-shrink-cushion">5pm</div>
                                             </div>
                                          </td>
                                          <td class="fc-timegrid-slot fc-timegrid-slot-lane " data-time="17:00:00"></td>
                                       </tr>
                                       <tr>
                                          <td class="fc-timegrid-slot fc-timegrid-slot-label fc-timegrid-slot-minor" data-time="17:30:00"></td>
                                          <td class="fc-timegrid-slot fc-timegrid-slot-lane fc-timegrid-slot-minor" data-time="17:30:00"></td>
                                       </tr>
                                       <tr>
                                          <td class="fc-timegrid-slot fc-timegrid-slot-label fc-scrollgrid-shrink" data-time="18:00:00">
                                             <div class="fc-timegrid-slot-label-frame fc-scrollgrid-shrink-frame">
                                                <div class="fc-timegrid-slot-label-cushion fc-scrollgrid-shrink-cushion">6pm</div>
                                             </div>
                                          </td>
                                          <td class="fc-timegrid-slot fc-timegrid-slot-lane " data-time="18:00:00"></td>
                                       </tr>
                                       <tr>
                                          <td class="fc-timegrid-slot fc-timegrid-slot-label fc-timegrid-slot-minor" data-time="18:30:00"></td>
                                          <td class="fc-timegrid-slot fc-timegrid-slot-lane fc-timegrid-slot-minor" data-time="18:30:00"></td>
                                       </tr>
                                       <tr>
                                          <td class="fc-timegrid-slot fc-timegrid-slot-label fc-scrollgrid-shrink" data-time="19:00:00">
                                             <div class="fc-timegrid-slot-label-frame fc-scrollgrid-shrink-frame">
                                                <div class="fc-timegrid-slot-label-cushion fc-scrollgrid-shrink-cushion">7pm</div>
                                             </div>
                                          </td>
                                          <td class="fc-timegrid-slot fc-timegrid-slot-lane " data-time="19:00:00"></td>
                                       </tr>
                                       <tr>
                                          <td class="fc-timegrid-slot fc-timegrid-slot-label fc-timegrid-slot-minor" data-time="19:30:00"></td>
                                          <td class="fc-timegrid-slot fc-timegrid-slot-lane fc-timegrid-slot-minor" data-time="19:30:00"></td>
                                       </tr>
                                       <tr>
                                          <td class="fc-timegrid-slot fc-timegrid-slot-label fc-scrollgrid-shrink" data-time="20:00:00">
                                             <div class="fc-timegrid-slot-label-frame fc-scrollgrid-shrink-frame">
                                                <div class="fc-timegrid-slot-label-cushion fc-scrollgrid-shrink-cushion">8pm</div>
                                             </div>
                                          </td>
                                          <td class="fc-timegrid-slot fc-timegrid-slot-lane " data-time="20:00:00"></td>
                                       </tr>
                                       <tr>
                                          <td class="fc-timegrid-slot fc-timegrid-slot-label fc-timegrid-slot-minor" data-time="20:30:00"></td>
                                          <td class="fc-timegrid-slot fc-timegrid-slot-lane fc-timegrid-slot-minor" data-time="20:30:00"></td>
                                       </tr>
                                       <tr>
                                          <td class="fc-timegrid-slot fc-timegrid-slot-label fc-scrollgrid-shrink" data-time="21:00:00">
                                             <div class="fc-timegrid-slot-label-frame fc-scrollgrid-shrink-frame">
                                                <div class="fc-timegrid-slot-label-cushion fc-scrollgrid-shrink-cushion">9pm</div>
                                             </div>
                                          </td>
                                          <td class="fc-timegrid-slot fc-timegrid-slot-lane " data-time="21:00:00"></td>
                                       </tr>
                                       <tr>
                                          <td class="fc-timegrid-slot fc-timegrid-slot-label fc-timegrid-slot-minor" data-time="21:30:00"></td>
                                          <td class="fc-timegrid-slot fc-timegrid-slot-lane fc-timegrid-slot-minor" data-time="21:30:00"></td>
                                       </tr>
                                       <tr>
                                          <td class="fc-timegrid-slot fc-timegrid-slot-label fc-scrollgrid-shrink" data-time="22:00:00">
                                             <div class="fc-timegrid-slot-label-frame fc-scrollgrid-shrink-frame">
                                                <div class="fc-timegrid-slot-label-cushion fc-scrollgrid-shrink-cushion">10pm</div>
                                             </div>
                                          </td>
                                          <td class="fc-timegrid-slot fc-timegrid-slot-lane " data-time="22:00:00"></td>
                                       </tr>
                                       <tr>
                                          <td class="fc-timegrid-slot fc-timegrid-slot-label fc-timegrid-slot-minor" data-time="22:30:00"></td>
                                          <td class="fc-timegrid-slot fc-timegrid-slot-lane fc-timegrid-slot-minor" data-time="22:30:00"></td>
                                       </tr>
                                       <tr>
                                          <td class="fc-timegrid-slot fc-timegrid-slot-label fc-scrollgrid-shrink" data-time="23:00:00">
                                             <div class="fc-timegrid-slot-label-frame fc-scrollgrid-shrink-frame">
                                                <div class="fc-timegrid-slot-label-cushion fc-scrollgrid-shrink-cushion">11pm</div>
                                             </div>
                                          </td>
                                          <td class="fc-timegrid-slot fc-timegrid-slot-lane " data-time="23:00:00"></td>
                                       </tr>
                                       <tr>
                                          <td class="fc-timegrid-slot fc-timegrid-slot-label fc-timegrid-slot-minor" data-time="23:30:00"></td>
                                          <td class="fc-timegrid-slot fc-timegrid-slot-lane fc-timegrid-slot-minor" data-time="23:30:00"></td>
                                       </tr>
                                    </tbody>
                                 </table>
                              </div>
                              <div class="fc-timegrid-cols">
                                 <table style="width: 740px;">
                                    <colgroup>
                                       <col style="width: 51px;">
                                    </colgroup>
                                    <tbody>
                                       <tr>
                                          <td class="fc-timegrid-col fc-timegrid-axis">
                                             <div class="fc-timegrid-col-frame">
                                                <div class="fc-timegrid-now-indicator-container"></div>
                                             </div>
                                          </td>
                                          <td class="fc-timegrid-col fc-day fc-day-sun fc-day-past" data-date="2020-11-08">
                                             <div class="fc-timegrid-col-frame">
                                                <div class="fc-timegrid-col-bg"></div>
                                                <div class="fc-timegrid-col-events"></div>
                                                <div class="fc-timegrid-col-events"></div>
                                                <div class="fc-timegrid-now-indicator-container"></div>
                                             </div>
                                          </td>
                                          <td class="fc-timegrid-col fc-day fc-day-mon fc-day-past" data-date="2020-11-09">
                                             <div class="fc-timegrid-col-frame">
                                                <div class="fc-timegrid-col-bg"></div>
                                                <div class="fc-timegrid-col-events"></div>
                                                <div class="fc-timegrid-col-events"></div>
                                                <div class="fc-timegrid-now-indicator-container"></div>
                                             </div>
                                          </td>
                                          <td class="fc-timegrid-col fc-day fc-day-tue fc-day-past" data-date="2020-11-10">
                                             <div class="fc-timegrid-col-frame">
                                                <div class="fc-timegrid-col-bg"></div>
                                                <div class="fc-timegrid-col-events"></div>
                                                <div class="fc-timegrid-col-events"></div>
                                                <div class="fc-timegrid-now-indicator-container"></div>
                                             </div>
                                          </td>
                                          <td class="fc-timegrid-col fc-day fc-day-wed fc-day-today " data-date="2020-11-11">
                                             <div class="fc-timegrid-col-frame">
                                                <div class="fc-timegrid-col-bg"></div>
                                                <div class="fc-timegrid-col-events"></div>
                                                <div class="fc-timegrid-col-events"></div>
                                                <div class="fc-timegrid-now-indicator-container"></div>
                                             </div>
                                          </td>
                                          <td class="fc-timegrid-col fc-day fc-day-thu fc-day-future" data-date="2020-11-12">
                                             <div class="fc-timegrid-col-frame">
                                                <div class="fc-timegrid-col-bg"></div>
                                                <div class="fc-timegrid-col-events"></div>
                                                <div class="fc-timegrid-col-events"></div>
                                                <div class="fc-timegrid-now-indicator-container"></div>
                                             </div>
                                          </td>
                                          <td class="fc-timegrid-col fc-day fc-day-fri fc-day-future" data-date="2020-11-13">
                                             <div class="fc-timegrid-col-frame">
                                                <div class="fc-timegrid-col-bg"></div>
                                                <div class="fc-timegrid-col-events"></div>
                                                <div class="fc-timegrid-col-events"></div>
                                                <div class="fc-timegrid-now-indicator-container"></div>
                                             </div>
                                          </td>
                                          <td class="fc-timegrid-col fc-day fc-day-sat fc-day-future" data-date="2020-11-14">
                                             <div class="fc-timegrid-col-frame">
                                                <div class="fc-timegrid-col-bg"></div>
                                                <div class="fc-timegrid-col-events"></div>
                                                <div class="fc-timegrid-col-events"></div>
                                                <div class="fc-timegrid-now-indicator-container"></div>
                                             </div>
                                          </td>
                                       </tr>
                                    </tbody>
                                 </table>
                              </div>
                           </div>
                        </div>
                     </div>
                  </td>
               </tr>
            </tbody>
         </table>
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
#external-events p {
    margin: 0px 0;
    font-size: 11px;
    color: #fff;
    padding: 0px 8px;
}     
     
 </style>
 

@endsection