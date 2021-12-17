@extends('masterlayout')
 
@section('title')
   Customer Edit
@endsection
 
@section('content')

 <main class="main-content bgc-grey-100">
        <div id="mainContent">
          <div class="row gap-20 ">
              
             
              
            <div class="masonry-item col-md-7" style="">
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
          <h6 class="c-grey-900">Customer Edit</h6>
          <div class="mT-30">
            <form method='post' action="{!! asset('customer/updateCustomer') !!}">
              <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
              <input type = "hidden" name = "id" value = "{{$data->id}}">
                
                <div class="form-group row">             
                  <label for="exampleInputEmail1" class="col-sm-2 col-form-label">Customer Name</label>
                  <div class="col-sm-10">
                    <input type="text" name="customer_name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$data->customer_name}}" placeholder="Enter name" required>
                  </div>    
                </div>

                <div class="form-group row">             
                  <label for="exampleInputEmail1" class="col-sm-2 col-form-label">Customer Password</label>
                  <div class="col-sm-10">
                    <input type="text" name="password" class="form-control" id="password" aria-describedby="emailHelp" value="{{$data->password}}" placeholder="Enter name" required>
                  </div>    
                </div>
                
                  <div class="form-group row">             
                  <label for="tannumber" class="col-sm-2 col-form-label">TAN Number</label>
                  <div class="col-sm-10">
                    <input type="text" name="tan_number" class="form-control" id="tan_number" aria-describedby="emailHelp" value="{{$data->tan_number}}" placeholder="Enter TAN number" required>
                  </div>      
                </div>
                
                   <div class="form-group row">             
                  <label for="eorinumber" class="col-sm-2 col-form-label">EORI Number</label>
                  <div class="col-sm-10">
                    <input type="text" name="eori_number" class="form-control" id="eori_number" aria-describedby="emailHelp" placeholder="Enter EORI number" value="{{$data->eori_number}}" required>
                  </div>      
                </div>
                
                
                
                   
                <div class="form-group row">
                  <label for="exampleInputEmail1" class="col-sm-2 col-form-label">Email</label>
                  <div class="col-sm-10">
                        <?php
                             $dd=explode(',',$data->email_address);
                        
                            ?>
                            @foreach($dd as $d)
                  <div class="row" id="removeDataDiv">

                                   
                                    <div class="form-group" >
                                    <div class="col-sm-12">
                                       <input type="text" name="email[]"  value="{{$d}}" placeholder="email"  class="form-control" autocomplete="off" required>
                                    </div>
                                 </div>

                                    <div class="col-sm-2">
                                       <div class="form-group" >
                                          <div class="col-sm-12">
                                             <button type="button" class="btn btn-danger removeRow"><i class="fa fa-minus" aria-hidden="true"></i></button>
                                          </div>
                                       </div>
                                    </div>

                                 </div> 
                      
                      @endforeach

                       <div id="addDiv">
                           <div class="row">

                              <div class="col-sm-2">
                                 <div class="form-group" >
                                    <div class="col-sm-12">
                                       <button type="button" class="btn btn-primary addCF"><i class="fa fa-plus" aria-hidden="true"></i></button>
                                    </div>
                                 </div>
                              </div>

                           </div>
                       </div>
                    </div>    
                </div>
                   
                <div class="form-group row">
                  <label for="exampleInputEmail1" class="col-sm-2 col-form-label">Customer Address</label>  
                  <div class="col-sm-10">
                    <input type="text" name="collectionaddress" class="form-control" value="{{$data->collectionaddress}}" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter name" required>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="city" class="col-sm-2 col-form-label">City</label>    
                  <div class="col-sm-10">
                    <input type="text" name="city" class="form-control" id="city" value="{{$data->city}}" aria-describedby="emailHelp" placeholder="Enter city" required>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="county" class="col-sm-2 col-form-label">County</label>    
                  <div class="col-sm-10">
                    <input type="text" name="county" class="form-control" value="{{$data->county}}" id="county" aria-describedby="emailHelp" placeholder="Enter county" required>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="country" class="col-sm-2 col-form-label">Country</label>    
                  <div class="col-sm-10">
                    <input type="text" name="country" class="form-control" id="country" value="{{$data->country}}" aria-describedby="emailHelp" placeholder="Enter country" required>
                  </div>
                </div>
                   
                <div class="form-group row">
                  <label for="exampleInputEmail1" class="col-sm-2 col-form-label">Post Code</label>      
                  <div class="col-sm-10">
                    <input type="text" name="post_code" class="form-control" value="{{$data->post_code}}" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter name" required>
                  </div>
                </div>
                   
                <div class="form-group row">        
                  <label for="exampleInputEmail1" class="col-sm-2 col-form-label">Customer Contact</label>     
                  <div class="col-sm-10">
                    <input type="text" name="mobile" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$data->mobile}}" placeholder="Enter name" required>
                  </div>
                </div>
                   
                <div class="form-group row">        
                  <label for="exampleInputEmail1" class="col-sm-2 col-form-label">Notes</label>
                  <div class="col-sm-10">
                    
                    <textarea rows="8" cols="50" placeholder="Enter Notes"   name="additional_comment" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"   required >{{$data->additional_comment}}</textarea>
                    
                
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
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    
  <script type="text/javascript">
  
 

    $(".addCF").click(function(){
      $("#addDiv").append('<div class="row" id="removeDiv"><div class="col-sm-12"><div class="form-group" ><div class="col-sm-12"><input type="text" name="email[]" id="email" placeholder="email"  class="form-control" autocomplete="off" required></div></div></div><div class="col-sm-2"><div class="form-group" ><div class="col-sm-12"><button type="button" class="btn btn-danger removeCF" id="removeCF"><i class="fa fa-minus" aria-hidden="true"></i></button></div></div></div></div>');
   });

   $("#addDiv").on('click','.removeCF',function(){
      $(this).closest('div #removeDiv').remove();
   });

   $(".removeRow").on('click',function(){
      $(this).closest('div #removeDataDiv').remove();
   });
</script>


@endsection