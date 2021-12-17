<div style="font-family: 'calibri'; width: 50%; margin: 0 auto; display: block;">
  <table cellpadding="10" cellspacing="0" border="1" bordercolor="#ccc" width="100%" style="text-align: center; padding: 15px;">

  <tr>
    <td colspan="9">
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
    <th>Invoice</th>
    
  </tr>
     <?php $i=0; ?>
     @foreach($invoices as $inv)
      <?php  $i++ ;?>
      <tr>
    <td style="color: #666; text-align: left;"><?=$i?></td>
    <td style="color: #666; text-align: left;"><a href="https://eirtransapp.com/public/uploads/inv/{{$inv->inv_file}}" download="{{$inv->inv_file}}">{{$inv->inv_file}}</a></td>
    
  </tr>
   @endforeach
</table>


</div>

