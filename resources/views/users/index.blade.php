@extends('layouts.master')
 
@section('title')
  Customer Details
 @endsection
 
@section('content')

<main class="main-content bgc-grey-100">
  <div id="mainContent">
    <div class="peer" style="float: right;">
      <!-- <a href="{!! asset('importCustomer') !!}"><button class="btn btn-primary">Import</button></a> -->
      <a href="{{ route('users.create') }}"><button class="btn btn-primary">Create New User</button></a>
    </div>
    <div class="container-fluid">
      <h4 class="c-grey-900 mT-10 mB-30">Users Management</h4>
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
           
         
            <table class="table table-bordered">
            <tr>
            <th>No</th>
            <th>Name</th>
            <th>Email</th>
            <th>Roles</th>
            <th width="280px">Action</th>
            </tr>
            @foreach ($data as $key => $user)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>
                @if(!empty($user->getRoleNames()))
                    @foreach($user->getRoleNames() as $v)
                    <label class="badge badge-success">{{ $v }}</label>
                    @endforeach
                @endif
                </td>
                <td>
                <a class="btn btn-info" href="{{ route('users.show',$user->id) }}">Show</a>
                <a class="btn btn-primary" href="{{ route('users.edit',$user->id) }}">Edit</a>
                    {!! Form::open(['method' => 'DELETE','route' => ['users.destroy', $user->id],'style'=>'display:inline']) !!}
                        {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                    {!! Form::close() !!}
                </td>
            </tr>
            @endforeach
            </table>


           {!! $data->render() !!}




           
          </div>
        </div>
      </div>
    </div>
  </div>
</main>
 
 <style>
     .dataTables_wrapper {
    overflow: auto;
    padding-bottom: 5px;
}
 </style>
 

@endsection