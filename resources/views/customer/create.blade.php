@extends('layouts.master')
 
@section('title')
   Add Customer
@endsection
 
@section('content')

<style>
.enter-mail-id{
    display: block;
    width: 100%;
    padding: .375rem .75rem;
    font-size: 14px;
    line-height: 1.5;
    color: #495057;
    border-radius: .25rem;
    border: solid #000 1px;
}
    span.email-ids {
    float: left;
    /* padding: 4px; */
    border: 1px solid #ccc;
    margin-right: 5px;
    margin-bottom: 5px;
    background: #f5f5f5;
    padding: 3px 10px;
    border-radius: 5px;
}
span.cancel-email {
    border: 1px solid #ccc;
    width: 18px;
    display: block;
    float: right;
    text-align: center;
    margin-left: 20px;
    border-radius: 49%;
    height: 18px;
    line-height: 15px;
    margin-top: 1px;    cursor: pointer;
}
.email-id-row {
    border: 1px solid #ccc;
}
.email-id-row input {
    border: 0; outline:0;
}
span.to-input {
    display: block;
    float: left;
    padding-right: 11px;
}
.email-id-row {
    padding-top: 6px;
    padding-bottom: 7px;
    /*margin-top: 23px;*/
}
</style>

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
          <h6 class="c-grey-900">Add Customer</h6>
            <div class="mT-30">
              <form method='post' action="{{route('customer.store')}}" id="quickForm"> 
                <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
                <div class="form-group row">             
                  <label for="customer_name" class="col-sm-2 col-form-label">Customer Name</label>
                  <div class="col-sm-10">
                    <input type="text" name="name" class="form-control" id="name" aria-describedby="emailHelp" placeholder="Enter name" >
                  </div>      
                </div>   
                 
                <div class="form-group row">             
                  <label for="exampleInputEmail1" class="col-sm-2 col-form-label">Customer Password</label>
                  <div class="col-sm-10">
                    <input type="text" name="password" class="form-control" id="password" aria-describedby="emailHelp" value="" placeholder="Enter password" required>
                  </div>    
                </div>
                
                  
                   <div class="form-group row">             
                  <label for="customer_name" class="col-sm-2 col-form-label">TAN Number</label>
                  <div class="col-sm-10">
                    <input type="text" name="tan_number" class="form-control" id="tan_number" aria-describedby="emailHelp" placeholder="Enter TAN number" required>
                  </div>      
                </div>
                
                   <div class="form-group row">             
                  <label for="customer_name" class="col-sm-2 col-form-label">EORI Number</label>
                  <div class="col-sm-10">
                    <input type="text" name="eori_number" class="form-control" id="eori_number" aria-describedby="emailHelp" placeholder="Enter EORI number" required>
                  </div>      
                </div>
                <div class="form-group row">             
                  <label for="email_address" class="col-sm-2 col-form-label">Emails</label>
                  <div class="col-sm-10">                      
                      
                
                    <div id="addDiv">
                           <div class="row">

                              <div class="">
                                 <div class="form-group" >
                                    <div class="col-sm-12">
                                       <input type="text" name="email[]"   placeholder="email"  class="form-control" autocomplete="off" required >
                                    </div>
                                 </div>
                              </div>

                             

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
                  <label for="collectionaddress" class="col-sm-2 col-form-label">Customer Address</label>    
                  <div class="col-sm-10">
                    <input type="text" name="address" class="form-control" id="address" aria-describedby="emailHelp" placeholder="Enter Address" required>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="city" class="col-sm-2 col-form-label">City</label>    
                  <div class="col-sm-10">
                    <input type="text" name="city" class="form-control" id="city" aria-describedby="emailHelp" placeholder="Enter city" required>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="county" class="col-sm-2 col-form-label">County</label>    
                  <div class="col-sm-10">
                    <input type="text" name="county" class="form-control" id="county" aria-describedby="emailHelp" placeholder="Enter county" required>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="country" class="col-sm-2 col-form-label">Country</label>    
                  <div class="col-sm-10">
                    <input type="text" name="country" class="form-control" id="country" aria-describedby="emailHelp" placeholder="Enter country" required>
                  </div>
                </div>

                <div class="form-group row">        
                  <label for="post_code" class="col-sm-2 col-form-label">Post Code</label>        
                  <div class="col-sm-10">
                    <input type="text" name="post_code" class="form-control" id="post_code" aria-describedby="emailHelp" placeholder="Enter post code" required>
                  </div>
                </div>
                   
                <div class="form-group row">
                  <label for="mobile" class="col-sm-2 col-form-label">Customer Contact</label>     
                  <div class="col-sm-10">
                    <input type="text" name="mobile" class="form-control" id="mobile" aria-describedby="emailHelp" placeholder="Customer Contact" required>
                  </div>
                </div>
                
                <div class="form-group row">        
                  <label for="additional_comment" class="col-sm-2 col-form-label">Notes</label>
                  <div class="col-sm-10">
                      
                   <textarea rows="8" cols="50" placeholder="Enter name" name="additional_comment" class="form-control" id="additional_comment" aria-describedby="emailHelp"
                    placeholder="Enter name" required></textarea>
                      
               
                 
               
                 
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
  
  $(function () {
   	$('#quickForm').validate({
      	rules: {
         	
            name:{
            required: true
          },

          password:{
            required: true
          },

        //   email:{
        //     required: true,
        //      email: true,
        //   },

          mobile: {
            	required: true
         	},
         
         	
      	},
      	messages: {

            name: {
            	required: "Please enter customer name",
         	}, 

             password: {
            	required: "Please enter password",
         	}, 

            //  email: {
            // 	required: "Please enter valid email",
         	// },
        	
          mobile: {
            	required: "Please enter contact number",
         	},

            
              
         	
      },
      errorElement: 'span',
      errorPlacement: function (error, element) {
         error.addClass('invalid-feedback');
         element.closest('.form-group').append(error);
      },
      highlight: function (element, errorClass, validClass) {
         $(element).addClass('is-invalid');
      },
      unhighlight: function (element, errorClass, validClass) {
         $(element).removeClass('is-invalid');
      }
   });
});

   $(".addCF").click(function(){
      $("#addDiv").append('<div class="row" id="removeDiv"><div><div class="form-group" ><div class="col-sm-12"><input type="text" name="email[]" id="email" placeholder="email"  class="form-control" autocomplete="off" required></div></div></div><div class="col-sm-2"><div class="form-group" ><div class="col-sm-12"><button type="button" class="btn btn-danger removeCF" id="removeCF"><i class="fa fa-minus" aria-hidden="true"></i></button></div></div></div></div>');
   });

   $("#addDiv").on('click','.removeCF',function(){
      $(this).closest('div #removeDiv').remove();
   });
</script>


@endsection