<main class="main-content bgc-grey-100" id="divToPrint">
    
        <div id="mainContent">
            
             <div id="mainContent">
             
          <div class="container-fluid">
          
            <div class="row">
              <div class="col-md-12">
                    @if(Session::get('msg'))
         <div class = "alert alert-success">
            <ul>
              
              
              
             <li> {{Session::get('msg')}}</li>
              
            </ul>
         </div>


      @endif
      
      
      <div class="bgc-white tbl bd bdrs-3 p-20 mB-20">
          
            <h4 class="c-grey-900 mT-10 mB-30">Job Details</h4>
            
             @foreach ($current_job_details as $current_job_details)
             
             @endforeach
          
             <table  class="table table-striped table-bordered" cellspacing="0" width="100%">
                      
                        <tr>
                            <td>Job No.</td>
                             <td class="de_de">{{ $current_job_details->job_number}}</td>
                          </tr>
                       <tr>
                            <td>Customer Name</td>
                          <td><?php
                            $name = DB::table('jobcustomer')->where('id',$current_job_details->customer)->first();
                             if(!empty($name))
                             {
                            echo $name->customer_name;
                             }
                          ?></td>
                            
                          </tr>
                     <tr>
                            <td>Make/Model</td>
                           <td class="de_de">{{ $current_job_details->make_model}}/ {{ $current_job_details->model}}</td>
                          </tr>
                          
                            <tr>
                            <td>Reg</td>
                            <td class="de_de">{{ $current_job_details->reg}}</td>
                          </tr>
                    
                     <tr>
                            <td>Collection Address</td>
                          <td class="de_de">{{ $current_job_details->	collection_address}}</td>
                          </tr>
                    
                     <tr>
                            <td>Delivery Address</td>
                            <td class="de_de">{{ $current_job_details->	delivery_address}}</td>
                          </tr>
                          
                          <tr>
                            <td>Booking Date</td>
                           <td class="de_de">{{ $current_job_details->	booking_date}}</td>
                          </tr>
                          
                          <tr>
                            <td>Lane</td>
                            <td><?php
                            $name = DB::table('lane')->where('id',$current_job_details->lan)->first();
                                 if(!empty($name))
                             {
                                echo $name->lane_number;
                             }
                          
                          ?></td>
                          </tr>
                           
                          <tr>
                            <td>Current Status</td>
                          <td>
                          @if($current_job_details->bookingstatus=='6')
                          <a href="" class="view_btn blue-btn">Job Collected</a>
                          @endif
                          @if($current_job_details->bookingstatus=='7')
                          <a href="" class="view_btn blue-btn">Job Collected</a>
                          <!--<a href="" class="view_btn green-btn">Load Collected</a>-->
                          @endif
                          @if($current_job_details->bookingstatus=='0')
                          <a href="" class="view_btn yellow-btn">In Progress</a>
                          @endif
                          @if($current_job_details->bookingstatus=='9')
                          <a href="" class="view_btn">Not Collected</a>
                          @endif
                            @if($current_job_details->split_job=='6')
                          <a href="" class="view_btn yellow-btn">In Progress</a>
                          @endif
                            @if($current_job_details->bookingstatus=='4')
                          <a href="" class="view_btn green-btn">Job Complete</a>
                          @endif
                           @if($current_job_details->bookingstatus=='3')
                          <a href="" class="view_btn yellow-btn">In Progress</a>
                          @endif
                          
                          </td>
                          </tr>
                 
                 </table>
          </div>
      
                <div class="bgc-white bd bdrs-3 p-20 mB-20">
                    
                      
                  <table id="dataTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                      
                      <h4 class="c-grey-900 mT-10 mB-30">Job's Journey</h4>
                    
                     <tbody>
                         
                         <tr>
                            <td>Created on</td>
                            <td class="de_de">{{$current_job_details->updated_at}}</td>
                            <td class="de_de">By</td>
                            <td class="de_de">Test@gmail.com</td>
                          </tr>
                          
                          @foreach ($loaddetails as $loaddetails)
                        @endforeach
                        
                        
                         @foreach ($driver as $driver)
                     
                        @endforeach
                        
                         <tr>
                            <td>Added in load</td>
                             <td class="de_de">{{$loaddetails->load_title}} - {{$loaddetails->loadnumber}}</td>
                            <td class="de_de">By</td>
                           <td class="de_de">{{$loaddetails->updated_at}}</td>
                          </tr>
                         <tr>
                          
                          
                          
                        @foreach ($loadsassign as $loadsassign)
                        @endforeach
                        
                         <tr>
                            <td>Assigned to </td>
                            <td class="de_de">{{$driver->name}}</td>
                             <td class="de_de">ON</td>
                             <td class="de_de">{{$loadsassign->date}}</td>
                         
                          </tr>
                       
                      
                         @foreach ($collecteddetails as $collecteddetails)
                      
                      
                         <tr>
                            <td>Collected on</td>
                            @if(!empty($collecteddetails->date_time))
                            <td class="de_de">{{$collecteddetails->date_time}}</td>
                            @else
                              <td class="de_de">N/A</td>
                            @endif
                             
                            <td class="de_de">By</td>
                             <td class="de_de">{{$driver->name}}</td>
                          </tr>
                         
                         
                         @foreach ($jobdelivered1 as $jobdelivered12)
                         @endforeach
                         <tr>
                            <td>Delivered on</td>
                             @if(!empty($jobdelivered12->date_time))
                               <td class="de_de">{{$jobdelivered12->date_time}}</td>
                                @else
                              <td class="de_de">N/A</td>
                             @endif
                           
                            <td class="de_de">By</td>
                            <td class="de_de">{{$driver->name}}</td>
                          </tr>
                          
                          @endforeach
                      
                          
                      
                    </tbody>
                    
                    <table id="dataTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        
                        <h4 class="c-grey-900 mT-10 mB-30 heading_ei"> Car Damage Details</h4>
                    <thead>
                      <tr>
                        <th>Sr no.</th>
                        <th>Type</th>
                        <th>Details</th>
                        <th>Image</th>
                        <th>Screen Shot</th>
                      </tr>
                    </thead>
                    
                     <tbody>
                        <?php
                         $sr=1;
                        ?>
                        
                        @foreach ($jobs as $jobs)
                      <tr>
                        <td>{{ $sr++ }}</td>
                        <td>{{ $jobs->type}}</td>
                        <td>{{ $jobs->details}}</td>
                        <td><img src="{!! asset('/uploads').'/'.$jobs->image !!}" width="150px" height="100px"> </img></td>
                        <td><img src="{!! asset('/uploads').'/'.$jobs->screenshot !!}" width="150px" height="100px"> </img></td>
                      
                      </tr>
                        @endforeach
                     
                    </tbody>
                   
                  </table>
                  
                  
                  <table id="dataTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                      
                      <h4 class="c-grey-900 mT-10 mB-30 heading_ei"> Car Collection Details</h4>
                    <thead>
                      <tr>
                        <th>Car Key</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Note</th>
                        <th>Tool</th>
                        <th>Signature</th>

                      </tr>
                    </thead>
                     <tbody>
                        @foreach ($jobdetails as $jobdetails)
                      <tr>
                         <td>{{ $jobdetails->car_key}}</td>
                        <td>{{ $jobdetails->name}}</td>
                         <td>{{ $jobdetails->email}}</td>
                         <td>{{ $jobdetails->note}}</td>
                         <td><p>
                             <?php 
                                $tools = explode(', ,',$jobdetails->selecttool);
                                
                                foreach($tools as $tool){
                                    echo $tool;
                                    echo "<br>";
                                }
                             ?>
                         </p>
                             
                         </td>
                        <td><img src="{!! asset('/uploads').'/'.$jobdetails->signatureimage !!}" width="150px" height="100px"> </img></td>
                      </tr>
                        @endforeach
                    </tbody>
                    
                    
                    
                     <table id="dataTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                      
                      <h4 class="c-grey-900 mT-10 mB-30 heading_ei">Car Delivery Details</h4>
                    <thead>
                      <tr>

                        <th>Name</th>
                        <th>Phone No.</th>
                        <th>Date</th>
                        <th>Signature</th>


                      </tr>
                    </thead>
                    
                    @foreach ($jobdelivered1 as $jobdelivered1)
                     <tbody>
                         
                          <tr>
                            @if(!empty($jobdelivered1->name))
                            <td class="de_de">{{$jobdelivered1->name}}</td>
                            @else
                              <td class="de_de">N/A</td>
                            @endif
                             @if(!empty($jobdelivered1->email))
                            <td class="de_de">{{$jobdelivered1->email}}</td>
                            @else
                              <td class="de_de">N/A</td>
                            @endif
                             @if(!empty($jobdelivered1->date_time))
                            <td class="de_de">{{$jobdelivered1->date_time}}</td>
                            @else
                              <td class="de_de">N/A</td>
                            @endif
                            
                             @if(!empty($jobdelivered1->cus_signature))
                            <td><img src="{!! asset('/uploads').'/'.$jobdelivered1->cus_signature !!}" width="150px" height="100px"> </img></td>
                            @else
                              <td class="de_de">N/A</td>
                            @endif
                            
                          </tr>
                         @endforeach

                    
                    </tbody>
                
                     <td colspan="7" style="text-align: center;"  >   <button onclick="printDiv('divToPrint')" class="print_bnt">Print</button> <button onclick="sendmailjobs({{$current_job_details->id}})" class="print_bnt">Email</button></td>

                  </table>

                  </table>
                </div>
              </div>
            </div>
          </div>
    
        </div>
         <div id="mainContent">
        </div>
      </main>
 
