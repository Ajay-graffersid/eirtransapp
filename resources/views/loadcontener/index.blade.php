@extends('layouts.master')
 
@section('title')
  Load Container List
 @endsection
 
@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.css">

<main class="main-content bgc-grey-100">
  <div id="mainContent">
      <div class="peer" style="float: right;"><a href="{{route('loadcontener.create')}}"><button class="btn btn-primary">Add Load Container</button></a></div> 
    <div class="container-fluid">
      <h4 class="c-grey-900 mT-10 mB-30">Load Container List</h4>
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
<!-- ************************Sweet alert ***********************************************           -->



@if(Session::has('msg'))
     <script type="text/javascript">
        swal({
            title:'Success!',
            text:"{{Session::get('msg')}}",
            timer:5000,
            type:'success'
        }).then((value) => {
          //location.reload();
        }).catch(swal.noop);
    </script>
    @endif
<!-- ************************sweet alert closet****************************************************************     -->

          <div class="bgc-white bd bdrs-3 p-20 mB-20"> 
            <table id="dataTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th>Sr no.</th>
                  <th>Load Number</th>
                  <th>Load Title</th>
                  <th>Action</th>             
                </tr>
              </thead>
              <tbody>
                <?php $sr=1; ?>
                @foreach ($data as $load)
                  <tr>
                    <td>{{ $sr++ }}</td>
                    <td>{{$load->loadnumber }}</td>
                    <td>{{$load->load_title }}</td>
                    <!-- <td> -->
                      <!-- <a href="{{ url('load/editLoadContainer/').'/'.$load->id }}" class="btn btn-info editcol">Edit</a> -->
                      <!--<a href="{{ url('load/deleteLoadContainer').'/'.$load->id }}" class="btn btn-primary">Delete</a>-->
                    <!-- </td> -->
                   
                    <td>
                         <form action="{{ route('loadcontener.destroy',$load->id) }}" method="POST">
        
                            <!-- <a class="btn btn-info" href="{{-- route('lanes.show',$load->id) --}}">Show</a> -->
            
                            <a class="btn btn-primary" href="{{ route('loadcontener.edit',$load->id) }}">Edit</a>
        
                            @csrf
                            @method('DELETE')
            
                            <button type="submit" class="btn btn-danger">Delete</button>
                         </form>
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
</main>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.css"> -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.js"></script>
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
  function drop(ev,ldid) {
    $.ajax({
      url: '{!! asset('carcollectionassigntoload') !!}',
      type: 'post',
      data: {_token: CSRF_TOKEN,car_collection: car_collection,ldid: ldid },
      success: function(response){
        alert(response);
        location.reload();
      }
    });
  }
</script> -->
@endsection

