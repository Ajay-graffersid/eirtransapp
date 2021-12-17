<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">

<html>
<head>
	
	<meta http-equiv="content-type" content="text/html; charset=utf-8"/>
	<title></title>
	<meta name="generator" content="LibreOffice 6.0.7.3 (Linux)"/>
	<meta name="created" content="2021-01-05T16:30:12.956213363"/>
	<meta name="changed" content="2021-01-05T17:48:28.580175464"/>
	
	<style type="text/css">
		body,div,table,thead,tbody,tfoot,tr,th,td,p { font-family:"Liberation Sans"; font-size:x-small }
		a.comment-indicator:hover + comment { background:#ffd; position:absolute; display:block; border:1px solid black; padding:0.5em;  } 
		a.comment-indicator { background:red; display:inline-block; border:1px solid black; width:0.5em; height:0.5em;  } 
		comment { display:none;  } 
		table.outer-box {
    margin: 0 auto;
}
.img-outer2 img {
    max-width: 100%;
    margin-top: -73px;
}

.img-outer2 {    overflow: hidden;
    height: 200px;
}
	</style>
	
</head>

<body>
<table class="outer-box" cellspacing="0" border="0">
	<colgroup width="155"></colgroup>
	<colgroup width="111"></colgroup>
	<colgroup width="141"></colgroup>
	<colgroup width="177"></colgroup>
	<colgroup width="185"></colgroup>
	<tr>
		<td rowspan=5 height="85" align="left"><br><img src="https://eirtrans.ie/wp-content/uploads/2018/02/Eirtrans-logo.jpg" width=146 height=76 hspace=4 vspace=6>
		</td>
		<td style="border-top: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=3 align="left"><br></td>
		<td align="left"><br></td>
	</tr>
	<tr>
		<td style="border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=3 align="center"><b>Eirtrans Logistics Ltd. Brownstown Road, Newcastle Co Dublin</b></td>
		<td align="left"><br></td>
	</tr>
	<tr>
		<td style="border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=3 align="center"><b>Tel: 01-6012791</b></td>
		<td align="left"><br></td>
	</tr>
	<tr>
		<td style="border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=3 align="center"><b><font color="#111111">Email: collections@eirtrans.ie, Web:<a href="https://eirtrans.ie/">https://eirtrans.ie</a></font></b></td>
		<td align="left"><br></td>
	</tr>
	<tr>
		<td align="center"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
	</tr>
	
 
        
        
    @foreach ($collected as $collected)
    @endforeach
    
    @foreach ($customerdetails as $customerdetails)
       
        @endforeach
	<tr>
		<td height="17" align="left"><br></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left"><b>Job No</b></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left"><b>Account Detail</b></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left"><b>Release Code</b></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left"><b>Driver Name</b></td>
	</tr>
	<tr>
		<td height="17" align="left"><br></td>
		 @foreach ($podlink as $podlink)
       
  @endforeach
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left"><br> {{$podlink->job_number}}</td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left"><br>{{$customerdetails->customer_id}}</td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left"><br></td>
		@foreach ($driver as $driver)
        @endforeach
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left"><br>{{$driver->name}}</td>
	</tr>
	<tr>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" height="17" align="left"><b>Model No:</b></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left"><br></vr>{{$podlink->make_model}}</td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left">Reg No: {{$podlink->reg}}</td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left"><br></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left"><br></td>
	</tr>
	<tr>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" height="17" align="left"><b>Collection Contact:</b></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left"><br>{{$collected->name}}</td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left">Tel:</td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left"><br></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left"><br></td>
	</tr>
	<tr>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" height="17" align="left"><b>Collection Address:</b></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left">{{$podlink->collection_address}}</td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left"><br></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left"><br></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left"><br></td>
	</tr>

	<tr> @foreach ($deliveredjob as $deliveredjob)
       
        @endforeach
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" height="17" align="left"><b>Delivery Contact:</b></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left"><br>@if(!empty($deliveredjob->name)){{$deliveredjob->name}}@endif</td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left">Tel :@if(!empty($deliveredjob->email)){{$deliveredjob->email}}@endif</td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left"><br></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left"><br></td>
	</tr>
	<tr>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" height="17" align="left"><b>Delivery Address:</b></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left">{{$podlink->delivery_address}} </td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left"><br></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left"><br></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left"><br></td>
	</tr>

	<tr>

    
  @if(!empty($dentreport[0]->screenshot))
       		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=3 rowspan=16  align="left">
       		<div class="img-outer2">
       		<img src="{!! asset('/uploads').'/'.$dentreport[0]->screenshot !!}" width=340  hspace=7 vspace=13>
 </div>
   @endif
 
		</td>
	
		<td style="border-top: 1px solid #000000; border-left: 1px solid #000000" align="left"><b>Damage Key:</b><br>@foreach ($dentreport as $dentreport)@if(!empty($dentreport->type))<li>{{$dentreport->type}}@endif</li>@endforeach</td></br>
         
		<td style="border-top: 1px solid #000000; border-right: 1px solid #000000" align="left"> </td>
	</tr>
	<tr>
		<td style="border-left: 1px solid #000000" align="left"><font color="#CE181E">Collection Damage</font></td>
		<td style="border-right: 1px solid #000000" align="left"><br></td>
	</tr>
	<tr>
		<td style="border-left: 1px solid #000000" align="left"><font color="#21409A">Delivery Damage</font></td>
		<td style="border-right: 1px solid #000000" align="left"><br></td>
	</tr>
	
	<tr>
		<td style="border-left: 1px solid #000000" align="left">Photo Fuel Document :  <a href="{{ url('collect_damage').'/'.$podlink->id}}">CLICK HERE</a> </td>
		<td style="border-right: 1px solid #000000" align="left"><br></td>
	</tr>
	
	<tr>
		<td style="border-left: 1px solid #000000" rowspan=12 align="left"><br></td>
		<td style="border-bottom: 1px solid #000000; border-right: 1px solid #000000" rowspan=13 align="left"><br></td>
	</tr>
	<tr>
		</tr>
	<tr>
		</tr>
	<tr>
		</tr>
	<tr>
		</tr>
	<tr>
		</tr>
	<tr>
		</tr>
	<tr>
		</tr>
	<tr>
		</tr>
	<tr>
		</tr>
	<tr>
		</tr>
	<tr>
		</tr>
	<tr>
		<td style="border-bottom: 1px solid #000000; border-left: 1px solid #000000" align="left"><br></td>
		</tr>
	<tr>
		<td height="17" align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
	</tr>
	
	
	<tr>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=3 height="17" align="left"><b>DOCUMANTATION &amp; MISCELLANEOUS</b></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=2 align="left"><b>NOTES</b></td>
		</tr>
		@foreach ($jobdetails as $jobdetails)
 @endforeach
	<tr>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=3 height="122" align="left"><br><p>
                             <?php 
                                $tools = explode(', ,',$deliveredjob->selecttool);
                                
                                foreach($tools as $tool){
                                    echo $tool;
                                    echo "<br>";
                                }
                             ?>
                         </p>Keys : @if(!empty($jobdetails->carkey)){{$jobdetails->carkey}}@endif </td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=2 align="left"><br>{{$customerdetails->additional_comment}}</td>
		</tr>
	<tr>
		<td height="10" align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
	</tr>
	<!--<tr>
		<td height="17" align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left">Photo Fuel Document</td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left"><a href="{{ url('collect_damage').'/'.$podlink->id}}">CLICK HERE</a></td>
	</tr>-->
	<tr>
		<td height="10" align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
	</tr>
	<!--<tr>
		<td height="17" align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" colspan=2 align="left">Photo Fuel Document</td>
		</tr>-->
	<tr>
		<td height="17" align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td style="border-top: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" rowspan=2 align="left" valign=middle>Signature By</td>
	
		<td style="border-top: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" rowspan=2 align="left"><br><img src="{!! asset('/uploads').'/'.$deliveredjob->cus_signature !!}" width="150px" height="50px"> </img></td>
	</tr>
	<tr>
		<td height="17" align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		</tr>
	<tr>
		<td height="17" align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left">Date : @if(!empty($jobdetails->date_time)){{$jobdetails->date_time}}@endif</td>
		<td style="border-top: 1px solid #000000; border-bottom: 1px solid #000000; border-left: 1px solid #000000; border-right: 1px solid #000000" align="left">Time</td>
	</tr>
	<tr>
		<td height="17" align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
	</tr>
	<tr>
		<td height="38" align="left"><br></td>
		<td align="left"><br></td>
		<td align="left"><br></td>
		<td colspan=2 align="left">**  I confirm that all business and personal items have been remove from the vehicle also that I agree
      with the started mileage and vehicle condition. I have read and agreed the terms and conditions of Eirtrans
      Logistics Ltd. vehicle movement policy.</td>
		</tr>
		<td colspan="7" style="text-align: center;"  ><button onClick="window.print()">Print</button></td>

</table>
</body>

</html>
