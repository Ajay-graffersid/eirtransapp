<table id="dataTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                      <tr>
                        <th>Job No</th>
                        <th>Customer</th>
                        <th>Make Model</th>
                        <th>Reg</th>
                        <th>Collection Address</th>
                        <th>Delivery Address</th>
                        <th>Lane</th>
                        <th>Book in Date</th>
                        <th>Rate</th>
                      </tr>
                    </thead>
                   
                    <tbody id="table_body"> 
                    @foreach ($jobs as $job)
                      <tr>
                        <td>
                          <div id="div1" ondrop="drop(event)" ondragover="allowDrop(event)">
                            <span style="color:blue" draggable="true" ondragstart="drag(event)" id="{{$job->id}}"><b>{{$job->job_number}} </b></span>
                          </div>
                        </td>
                        <td>{{$job->name}}</td>
                        <td>{{ $job->make_model }}</td>
                        <td>{{ $job->reg }}</td>
                        <td>{{ $job->collection_address }}</td>
                        <td>{{ $job->delivery_address }}</td>
                        <td>{{ $job->lane_id }}</td>
                        <td>{{ $job->booking_date }}</td>
                        <td>{{ $job->rate }}</td>
                      </tr>
                    @endforeach
                    </tbody>
                  </table>