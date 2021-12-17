@extends('layouts.master')
 
@section('title')
  Expence Type List
 @endsection
 
@section('content')

<main class="main-content bgc-grey-100">
    
    
     <div id="mainContent">
             <div class="peer" style="float: right;"><a href="{{ route('expence_type.create') }}"><button class="btn btn-primary">Add Expense Type</button></a></div>
          <div class="container-fluid">
            <h4 class="c-grey-900 mT-10 mB-30">Expence Type List</h4>
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
                        <th> Name</th>
                        <th> Status</th>
                        <th> Action</th>
                        
                      </tr>
                    </thead>
                   
                    <tbody>
                        <?php
                         $sr=1;
                        ?>
                        
                        @foreach ($expences as $expence)
                      <tr>
                        <td>{{ $sr++ }}</td>
                        <td>{{ $expence->name }}</td>
                      @if($expence->status=='0')
                         <td><a href="{{ url('expensestatusupdate').'/'.$expence->id }}" class="view_btn">Active</a></td> 
                         @else
                         <td><a href="{{ url('expenseinctive').'/'.$expence->id }}" class="view_btn">Inactive</a></td> 
                          @endif
                        
                        
                        <!-- <td>
                        <a href="{{ url('editExpenseType').'/'.$expence->id }}" class="btn btn-info editcol">Edit</a>
                        <a href="{{ url('deleteExpenseType').'/'.$expence->id }}" class="btn btn-primary">Delete</a>
                        </td> -->

                        <td>
                         <form action="{{ route('expence_type.destroy',$expence->id) }}" method="POST">
        
                            <!-- <a class="btn btn-info" href="{{ route('expence_type.show',$expence->id) }}">Show</a> -->
            
                            <a class="btn btn-primary" href="{{ route('expence_type.edit',$expence->id) }}">Edit</a>
        
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
 
 
 

@endsection