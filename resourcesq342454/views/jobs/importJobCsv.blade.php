@extends('masterlayout')
 
@section('title')
  Import Jobs CSV
 @endsection
 
@section('content')

<main class="main-content bgc-grey-100">
  <div id="mainContent">
    <div class="row gap-20 ">
      <div class="masonry-item col-md-10" style=" ">
        @if (count($errors) > 0)
         <div class = "alert alert-danger">
            <ul>
               @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
               @endforeach
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

        <div class="bgc-white p-20 bd">
          <h6 class="c-grey-900">Import Csv For Jobs</h6>
          <div class="mT-30">
            <div class="form-group row">    
              <label for="job_number" class="col-sm-2 col-form-label">Download Sample</label>
              <div class="col-sm-10">
                <a href="{{url('/assets/static/jobs_csv.csv')}}" download><button type="button" class="btn btn-primary">Download</button> </a>
              </div>
            </div>
            <form method='post' action="{!! asset('importJobsCsv') !!}" enctype="multipart/form-data">
              {{csrf_field()}}

              <div class="form-group row">    
                <label for="csv" class="col-sm-2 col-form-label">CSV</label>
                <div class="col-sm-10">
                  <input type="file" name="csv" class="form-control" id="csv" aria-describedby="emailHelp" required>
                </div>
              </div>

              <button type="submit" class="btn btn-primary">Submit</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>

@endsection