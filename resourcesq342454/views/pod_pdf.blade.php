

 <input type="button" id="create_pdf" value="Generate PDF">  

<form class="form"   



<div class="main-wrapper">

<div class="header_top">
<div class="container">
  <div class="row">

			<div class="col-lg-4 col-md-4 col-sm-3 left-logo">

								<a href="">
								    <td><img src="{!! asset('/uploads').'/'.'logoadmin.png' !!}" width="150px" height="100px"> </img></td>
					</a>

			</div><!-- END LOGO -->

			<div class="col-lg-8 col-md-8 col-sm-9">
            <div  class="addresss_details">
            
            <p>Eirtrans Logistics Ltd Brownstown Road Newcastle Co Dublin</p>
            <p class="second_pa"> Tel: 01-6012791</p>
            <p>Email: collections@eirtrans.ie, Web:https://eirtrans.ie</p>
            </div>

			</div>
            
            <!-- END CONTACT -->

		</div>
    </div>
 </div>
       
      <table class="table table-bordered eitran_taable">
  <tbody>
       @foreach ($podlink as $podlink)
       
        @endforeach
        
        
    @foreach ($collected as $collected)
    @endforeach
    
    @foreach ($customerdetails as $customerdetails)
       
        @endforeach
        
       
    <tr>
    
      <td>Job No <br />  <b> {{$podlink->job_number}} </b></td>
          <td>Account Detail  <br />{{$customerdetails->customer_id}}</td>
       <td>Release Code  <br /></td>
        @foreach ($driver as $driver)
        @endforeach
         <td>Driver Name<br /> <b>{{$driver->name}} </b></td>
    </tr>
     


  </tbody>
</table>  
        
        
        <table class="table table-bordered eitran_taable">
  <tbody>

    <tr>
      <td>Modal No</td>
        <td colspan="2">{{$podlink->make_model}}</td>
        <td >Reg No: {{$podlink->reg}}</td>
        <td></td>
    </tr>

    
     <tr>
      <td>Collection Contact </td>
        <td colspan="2">{{$collected->name}}</td>
        <td >Tel:</td>
       <td></td>
    </tr>

  
     <tr>
      <td rowspan="2">Collection Address : </td>
      <td colspan="4">{{$podlink->collection_address}}</td>
    </tr>

    <tr><td colspan="4"></td> </tr>

 


 @foreach ($deliveredjob as $deliveredjob)
       
        @endforeach


     <tr>
      <td colspan="">Delivery Contact </td>
        <td  colspan="2">@if(!empty($deliveredjob->name)){{$deliveredjob->name}}@endif</td>
        <td >Tel :</td>
       <td colspan="2">@if(!empty($deliveredjob->email)){{$deliveredjob->email}}@endif</td>
    </tr>

  
     <tr>
      <td rowspan="2">Delivery Address : </td>
      <td colspan="4">{{$podlink->delivery_address}} </td>
    </tr>

    <tr><td colspan="4"></td> </tr>

  





  </tbody>
</table>

<div class="imgsect">
<div class="leftimg-sect">
    
    @foreach ($dentreport as $dentreport)
       
 @endforeach
    @if(!empty($dentreport->screenshot))
    <td>
        <div class="imgsect-2">
        <img src="{!! asset('/uploads').'/'.$dentreport->screenshot !!}" width="120px" height="160px"> </img>
        </div>
        </td>
        
   @endif
</div>
    
<div class="rightimg-sect">
    
<b class="damage">Damage Key:</b>
<ul>
    @foreach ($dentreport as $dentreport)
       
 @endforeach
<li>  @if(!empty($dentreport->type)){{$dentreport->type}}@endif</li>

<br />
<li style="color:red">Collection Damage  </li>
<li style="color:blue">Delivery Damage  </li>

</ul>
</div>  


</div>


 <div class="detail_car_pic">
 
  <div class="col-md-7 left-sect">
  <div class"head-_tb"><h3>DOCUMANTATION & MISCELLANEOUS</h3></div>

  <table class="table table-bordered eitran_taable inners">
  <tbody>


 @foreach ($jobdetails as $jobdetails)
 @endforeach
 
 
   <td><p>
                             <?php 
                                $tools = explode(', ,',$jobdetails->selecttool);
                                
                                foreach($tools as $tool){
                                    echo $tool;
                                    echo "<br>";
                                }
                             ?>
                         </p>
                              <p rowspan="2">Keys :  @if(!empty($jobdetails->car_key)){{$jobdetails->car_key}}@endif </p>
                         </td>
                        

  </tbody>
</table>

  </div>
       <div class="col-md-5 right-sect" >
  <div class"head-_tb"><h3>NOTES</h3></div>

  <textarea  rows="8" style="resize:none; margin-bottom:10px;"></textarea>
  </div>
    </form> 
    
    
    
    <table class="table table-bordered eitran_taable">
        <tr><style>

  .image-container {
    max-height: 374px;
    overflow: hidden;
}
.sd{    width: 519px;
    margin-top: -8em;}
</style>
             <td>Photo Fuel Document </td>
                 <td><a href="{{ url('collect_damage').'/'.$podlink->id}}"></a></td>

                            </tr>
   



  </table>
  
  
  
  
  @foreach ($deliveredjob as $deliveredjob)
       
        @endforeach

  <table class="table table-bordered eitran_taable">
      
       <tr>
         <td colspan="2" >Signature By</td>
                  <td colspan="2" >@if(!empty($deliveredjob->cus_signature))<img src="{!! asset('/uploads').'/'.$deliveredjob->cus_signature !!}" width="150px" height="50px"> </img>@endif </td>
                </tr>

 <tr>
        <td>Date </td>
                  <td>@if(!empty($deliveredjob->date_time)){{$deliveredjob->date_time}}@endif  </td>
                          <td>Time </td>
                  <td> </td>
                                  </tr>


  </table>
  
  
  
   <p>** I confirm that all business and personal items have been remove from the vehicle also that I agree
      with tha started mileage and vehicle condition. I have read and agreed the terms and conditions of Eirtrans
      Logistics Ltd. vehicle movement policy.   
      </p>
    
    
    <style>  
    
.imgsect-2 {
    height: 150px;
    overflow: hidden;
}
    
    .rightimg-sect ul {
    list-style: none;
    margin: 0px;
    padding: 0px;
}
    
.right-sect textarea {
    width: 95%;
}
    .imgsect-2 img {
    width: 200px;
    width: 180px;
    height: 315px;
    max-width: 100%;
}

    
    .left-logo {
    float: left;
    width: 30%;
}

.rightimg-sect {
       border: 1px solid #ccc;
    float: right;
    width: 53%;
    padding: 10px;
    height: 150px;
    margin-left: 10px;
}

.addresss_details {
    float: right;
}

.leftimg-sect {
    float: left;
    border: 1px solid #ccc;
    width: 39%;
    clear: both;
    height: 152px;
    padding: 10px;
}

.imgsect {
    float: left;
    clear: both;
    width: 100%;
    margin-top: 10px;
}

    .clear{clear:both;}
    
.right-sect {
    /* margin-top: 20px; */
    /* position: relative; */
    /* top: 17px; */
    float: right;
    /* right: -10px; */
    width: 53%;
}
    
.left-sect {
    width: 46%;
    float: left;
    clear: both;
}

    .header_top {
    margin-bottom: 10px;
}
    
    td {
    font-size: 14px;
}
    
    div h3 {
    font-size: 14px;
}
    
    td p {
    font-size: 13px;
}
    
    .addresss_details p {
    font-size: 14px;
    padding: 0px;
    margin: 0px;
}
        table {  
            font-family: arial, sans-serif;  
            border-collapse: collapse;  
            width: 100%;  
        }  
  
        td, th {  
            border: 1px solid #dddddd;  
            text-align: left;  
            padding: 8px;  
        }  
  
        /*tr:nth-child(even) {  */
        /*    background-color: #dddddd;  */
        /*}  */
    </style>  
    
   
    <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script>  
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.5/jspdf.min.js"></script>
   
   
   <script>  
    (function () {  
        var  
         form = $('.form'),  
         cache_width = form.width(),  
         a4 = [595.28, 841.89]; // for a4 size paper width and height  
  
        $('#create_pdf').on('click', function () {  
            $('body').scrollTop(0);  
            createPDF();  
        });  
        //create pdf  
        function createPDF() {  
            getCanvas().then(function (canvas) {  
                var  
                 img = canvas.toDataURL("image/jpg"),  
                 doc = new jsPDF({  
                     unit: 'px',  
                     format: 'a4'  
                 });  
                doc.addImage(img,  20, 20);  
                doc.save('POC.pdf');  
                form.width(cache_width);  
            });  
        }  
  
        // create canvas object  
        function getCanvas() {  
            form.width((a4[0] * 1.33333) - 80).css('max-width', 'none');  
            return html2canvas(form, {  
                imageTimeout: 2000,  
                removeContainer: true  
            });  
        }  
  
    }());  
</script>  
