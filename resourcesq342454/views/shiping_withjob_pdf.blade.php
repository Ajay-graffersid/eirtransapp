

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
      
        
       
       <thead>

                    <tr>

                      <th>Sr no.</th>

                      <th>Vin Number</th>

                      <th>Job No.</th>

                      <th>CUSTOMER NAME</th>
                      
                      <th>Description</th>

                      <th>Model</th>

                      <th>Car Reg</th>

                      <th>Collection Address</th>

                      <th>Lane</th>

                    </tr>

                  </thead>
     
                 <tbody>

                    <?php $sr=1; ?>

                    @foreach ($jobs as $jobs)

                     @if($jobs->status==0)
                    
                     <tr bgcolor="red">
                         
                     @else
                      <tr>
                      @endif
                        <td>{{ $sr++ }}</td>

                        <td>{{$jobs->vin_number}}</td>

                        <td>{{$jobs->job_number}}  </td>

                        <td>{{$jobs->customer_name}}@if(!empty($jobs->additional_comment)) / {{$jobs->additional_comment}} @endif</td>
                        <td>{{$jobs->description}}</td>

                        <td>{{$jobs->make_model }}/{{$jobs->model }}</td>

                        <td>{{$jobs->reg }}</td>

                        <td>{{$jobs->collection_address }}</td>

                        <td>{{$jobs->lan }}</td>

                      </tr>

                    @endforeach

                </tbody>
                
                
                

  </tbody>
  
  
</table> 

@if(count($carsfordelivery)>0)
  
  <table class="table table-bordered eitran_taable">
  <tbody>
      <td>Shiping Details<br />
      
          @foreach ($carsfordelivery as $carsfordelivery)

             

             

             @endforeach
       
    <tr>
        
     
                          <tr>

                            <td>Shipping Ref : {{$carsfordelivery->	shippingref }}</td>

                             

                          </tr>
                          
                          
                          
                            <tr>

                            <td>EORI No : {{$carsfordelivery->	mrn_number }}</td>


                          </tr>
                          
                           <tr>

                            <td>Route/Carrier : {{$carsfordelivery->	route }} / {{$carsfordelivery->	carrier }}</td>


                          </tr>
                          
                          <tr>

                            <td>Registration : {{$carsfordelivery->	registration }}</td>


                          </tr>
                          
                           <tr>

                            <td>Date of Travel : {{$carsfordelivery->	dateoftravel }}</td>


                          </tr>
                          
                            <tr>

                            <td>Time : {{$carsfordelivery->	time }}</td>


                          </tr>
      
        
         
    </tr>
     


  </tbody>
</table>  
    
    
@endif    
    
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
