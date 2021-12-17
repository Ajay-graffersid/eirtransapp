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
                      <tbody> 
                        @foreach ($car_for_collection as $car_for_collection)
                          <tr>
                            <td>
                              <div id="div1" ondrop="drop(event)" ondragover="allowDrop(event)">
                                <span style="color:blue" draggable="true" ondragstart="drag(event)" id="{{$car_for_collection->id}}"><b>{{$car_for_collection->job_number}} </b></span>
                              </div>
                            </td>
                            <td>{{ $car_for_collection->customer_name }}</td>
                            <td>{{ $car_for_collection->make_model }}</td>
                            <td>{{ $car_for_collection->reg }}</td>
                            <td>{{ $car_for_collection->collection_address }}</td>
                            <td>{{ $car_for_collection->delivery_address }}</td>
                            <td>{{ $car_for_collection->lane_number }}</td>
                            <td>{{ $car_for_collection->booking_date }}</td>
                            <td>{{ $car_for_collection->rate }}</td>
                          </tr>
                        @endforeach
                      </tbody>
                    </table>