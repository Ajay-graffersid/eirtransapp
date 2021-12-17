@extends('masterlayout')
 
@section('title')
  Load Container List
 @endsection
 
@section('content')

<main class="main-content bgc-grey-100">
  <div id="mainContent">
      <div class="peer" style="float: right;"><a href="{!! asset('load/addLoadContainer') !!}"><button class="btn btn-primary">Add Load Container</button></a></div> 
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
                    <td>
                      <a href="{{ url('load/editLoadContainer/').'/'.$load->id }}" class="btn btn-info editcol">Edit</a>
                      <!--<a href="{{ url('load/deleteLoadContainer').'/'.$load->id }}" class="btn btn-primary">Delete</a>-->
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

