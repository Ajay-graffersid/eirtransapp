<div style="font-family: 'calibri'; width: 50%;">
  <table cellpadding="10" cellspacing="0" border="1" bordercolor="#ccc" width="100%" style="text-align: center; padding: 15px;">

  <tr>
    <td colspan="11">
      <img src="https://eirtrans.ie/wp-content/uploads/2018/02/Eirtrans-logo.jpg" alt="logo">
      <p style="color: #666;">Eirtrans Logistics Ltd. Brownstown Road Newcastle Co Dublin</p>

        <ul style="list-style-type: none;">
          <li style="margin: 0 0 5px 0; font-size: 17px;">Tel: <a href="tel:01-6012791" style="color: #000; text-decoration: none;">01-6012791</a></li>
          <li style="margin: 0 0 5px 0; font-size: 17px;">Email: <a href="mailto:collections@eirtrans.ie" style="color: #000; text-decoration: none;">collections@eirtrans.ie</a></li>
          <li style="margin: 0 0 5px 0; font-size: 17px;">Web: <a href="https://eirtrans.ie" target="_blank" style="color: #000; text-decoration: none;">www.eirtrans.ie</a></li>
      </ul>
    </td>

  </tr>
  
  <tr style="background-color: #d4d4d4;">
    <th>Sr. No.</th>
    <th>Vin Number</th>
    <th>Job No.</th>
    <th>Customer Name</th>
    <th>Description</th>
    <th>Model</th>
    <th>Car Reg</th>
    <th>Collection Address</th>
    <th>Delivery Address</th>
    <th>Lane</th>
    <th>Booking Date</th>
    <th>EORI</th>
    <th>COMM Code</th>
   
    
    <th>Weight</th>
    
     <th>Currency</th>
     <th>Value</th>
    
    <th>Ship IMO</th>
    <th>ETA</th>
    <th>Bill of Laden</th>
    <th>Invoice Ref</th>
    <th>Rate</th>
    <th>Invoice</th>
  </tr>

   <?php $sr=1; ?>
    @foreach ($jobs as $jobs)
    @if($jobs->status==0)
     <tr bgcolor="red">
     @else
    <tr>
    @endif
    <td style="color: #666; text-align: left;">{{ $sr++ }}</td>
    <td style="color: #666; text-align: left;">{{$jobs->vin_number}}</td>
    <td style="color: #666; text-align: left;">{{$jobs->job_number}}</td>
    
    <td style="color: #666; text-align: left;"><?php
                            $name = DB::table('jobcustomer')->where('id',$jobs->customer)->first();
                             if(!empty($name))
                             {
                            echo $name->customer_name;
                             }
                          ?> @if(!empty($jobs->additional_comment)) / {{$jobs->additional_comment}} @endif</td>
    <td style="color: #666; text-align: left;">{{$jobs->description }}</td>
    <td style="color: #666; text-align: left;">{{$jobs->make_model }}/{{$jobs->model }}</td>
    <td style="color: #666; text-align: left;">{{$jobs->reg }}</td>
    <td style="color: #666; text-align: left;">{{$jobs->collection_address }}</td>
    <td style="color: #666; text-align: left;">{{$jobs->delivery_address }}</td>
    
    
    <td style="color: #666; text-align: left;"><?php
                            $name = DB::table('lane')->where('id',$jobs->lan)->first();
                             if(!empty($name))
                             {
                            echo $name->lane_type;
                             }
                          ?></td>
                          
          <td style="color: #666; text-align: left;">{{$jobs->booking_date }}</td>
          <td style="color: #666; text-align: left;">{{$jobs->eori}}</td>
           <td style="color: #666; text-align: left;">{{$jobs->commcode}}</td> 
           <td style="color: #666; text-align: left;">{{$jobs->weight}}</td>
           
           <td style="color: #666; text-align: left;">{{$jobs->curr}}</td>
           <td style="color: #666; text-align: left;">{{$jobs->value}}</td>
           
            <td style="color: #666; text-align: left;">{{$jobs->shipimo}}</td> 
           <td style="color: #666; text-align: left;">{{$jobs->eta}}</td> 
          <td style="color: #666; text-align: left;">{{$jobs->bill_of_laden}}</td> 
          <td style="color: #666; text-align: left;">{{$jobs->inv_ref}}</td> 
          <td style="color: #666; text-align: left;">{{$jobs->rate}}</td>
    <td style="color: #666; text-align: left;">
                       <?php
                  $checkinv = DB::table('invoices')->where('job_id',$jobs->id)->first();
                      ?> 
 @if(!empty($checkinv))  <a href="{{ url('getinvoicemail').'/'.$jobs->id }}" class="btn btn-info editcol"> Download Invoice</a>@endif
                 </td>                      
   
  </tr>
  @endforeach
</table>


 



</div>

