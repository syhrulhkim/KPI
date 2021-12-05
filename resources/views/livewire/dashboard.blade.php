  <div class="container-fluid py-4">
    
    <div class="row">
      <div class="col-12">
        <div class="card mb-4">
          <div class="card-header pb-0">
            <h6>Employee Details</h6>
            <p><strong>{{$userscount}} employees</strong> in this company</p>
            <p><strong>{{$ceoempcount}} employees</strong> in CEO Office department</p>
          </div>
          <div class="card-body px-0 pt-0 pb-2">
            <div class="table-responsive p-0">
              <table class="table align-items-center mb-0">
                <thead>
                  <tr>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Name</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Position</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Staff Number</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Department</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Unit</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Grade</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">KPI</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($ceoemp as $ceoemps)
                  <tr>
                    <td>    
                      <div class="d-flex px-2 py-1">
                        <div>
                          <img src="../assets/img/profileavatar.png" class="avatar avatar-sm me-3" alt="user1">
                        </div>
                        
                        <div class="d-flex flex-column justify-content-center">
                          <h6 class="mb-0 text-sm" value="{{$ceoemps->id}}">{{$ceoemps->name}}</h6>
                          {{-- <p class="text-xs text-secondary mb-0">roles</p> --}}
                        </div>
                      </div>
                    </td>
                    <td>
                      <p class="text-xs font-weight-bold mb-0" value="{{$ceoemps->id}}">{{$ceoemps->position}}</p>
                      {{-- <p class="text-xs text-secondary mb-0">Momentum Internet</p> --}}
                    </td>
                    <td class="align-middle text-center">
                      <span class="text-secondary text-xs font-weight-bold" value="{{$ceoemps->id}}">{{$ceoemps->nostaff}}</span>
                    </td>
                    <td class="align-middle text-center">
                      <span class="text-secondary text-xs font-weight-bold" value="{{$ceoemps->id}}">{{$ceoemps->department}}</span>
                    </td>
                    <td class="align-middle text-center">
                      <span class="text-secondary text-xs font-weight-bold" value="{{$ceoemps->id}}">{{$ceoemps->unit}}</span>
                    </td>
                    <td class="align-middle text-center">
                      <span class="text-secondary text-xs font-weight-bold" value="{{$ceoemps->id}}">{{$ceoemps->grade}}</span>
                    </td>
                    <div class="d-flex flex-column justify-content-center">
                      {{-- <td>
                        <div class="d-flex px-2 py-1">
                          <div class="d-flex flex-column justify-content-center">
                            @if ($ceoemps->status == "Not Submitted")
                            <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark"></strong>&nbsp;<span class="badge badge-sm bg-gradient-secondary">{{$ceoemps->status}}</span></li>
                            @else 
                            @endif

                            @if ($ceoemps->status == "Submitted")
                            <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark"></strong>&nbsp;<span class="badge badge-sm bg-gradient-info">{{$ceoemps->status}}</span></li>
                            @else 
                            @endif

                            @if ($ceoemps->status == "Signed By Manager")
                            <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark"></strong>&nbsp;<span class="badge badge-sm bg-gradient-dark">{{$ceoemps->status}}</span></li>
                            @else 
                            @endif

                            @if ($ceoemps->status == "Completed")
                            <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark"></strong>&nbsp;<span class="badge badge-sm bg-gradient-success">{{$ceoemps->status}}</span></li>
                            @else 
                            @endif
                          </div>
                        </div>
                      </td> --}}
                    </div>
                    <div class="d-flex flex-column justify-content-center">
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div>
                          </div>
                          <div class="d-flex flex-column justify-content-center">
                            {{-- <a href="{{ url('hr/view/kpi/'.$ceoemps->id) }}" class="btn btn-primary btn-sm" style="font-size: 10px" role="button"><i class="fa fa-eye"></i>&nbsp;View</a> --}}
                            <a href="{{ url('add-date/'.$ceoemps->id) }}" class="btn btn-light btn-sm" style="font-size: 10px" role="button"><i class="fa fa-eye"></i>&nbsp;View</a>
                          </div>
                        </div>
                      </td>
                    </div>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-12">
        <div class="card mb-4">
          <div class="card-header pb-0">
            <p><strong>{{$hrempcount}} employees</strong> in Human Resource (HR) & Administration department</p>
          </div>
          <div class="card-body px-0 pt-0 pb-2">
            <div class="table-responsive p-0">
              <table class="table align-items-center mb-0">
                <thead>
                  <tr>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Name</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Position</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Staff Number</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Department</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Unit</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Grade</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">KPI</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($hremp as $hremps)
                  <tr>
                    <td>    
                      <div class="d-flex px-2 py-1">
                        <div>
                          <img src="../assets/img/profileavatar.png" class="avatar avatar-sm me-3" alt="user1">
                        </div>
                        
                        <div class="d-flex flex-column justify-content-center">
                          <h6 class="mb-0 text-sm" value="{{$hremps->id}}">{{$hremps->name}}</h6>
                          {{-- <p class="text-xs text-secondary mb-0">roles</p> --}}
                        </div>
                      </div>
                    </td>
                    <td>
                      <p class="text-xs font-weight-bold mb-0" value="{{$hremps->id}}">{{$hremps->position}}</p>
                      {{-- <p class="text-xs text-secondary mb-0">Momentum Internet</p> --}}
                    </td>
                    <td class="align-middle text-center">
                      <span class="text-secondary text-xs font-weight-bold" value="{{$hremps->id}}">{{$hremps->nostaff}}</span>
                    </td>
                    <td class="align-middle text-center">
                      <span class="text-secondary text-xs font-weight-bold" value="{{$hremps->id}}">{{$hremps->department}}</span>
                    </td>
                    <td class="align-middle text-center">
                      <span class="text-secondary text-xs font-weight-bold" value="{{$hremps->id}}">{{$hremps->unit}}</span>
                    </td>
                    <td class="align-middle text-center">
                      <span class="text-secondary text-xs font-weight-bold" value="{{$hremps->id}}">{{$hremps->grade}}</span>
                    </td>
                    <div class="d-flex flex-column justify-content-center">
                      {{-- <td>
                        <div class="d-flex px-2 py-1">
                          <div class="d-flex flex-column justify-content-center">
                            @if ($hremps->status == "Not Submitted")
                            <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark"></strong>&nbsp;<span class="badge badge-sm bg-gradient-secondary">{{$hremps->status}}</span></li>
                            @else 
                            @endif

                            @if ($hremps->status == "Submitted")
                            <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark"></strong>&nbsp;<span class="badge badge-sm bg-gradient-info">{{$hremps->status}}</span></li>
                            @else 
                            @endif

                            @if ($hremps->status == "Signed By Manager")
                            <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark"></strong>&nbsp;<span class="badge badge-sm bg-gradient-dark">{{$hremps->status}}</span></li>
                            @else 
                            @endif

                            @if ($hremps->status == "Completed")
                            <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark"></strong>&nbsp;<span class="badge badge-sm bg-gradient-success">{{$hremps->status}}</span></li>
                            @else 
                            @endif
                          </div>
                        </div>
                      </td> --}}
                    </div>
                    <div class="d-flex flex-column justify-content-center">
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div>
                          </div>
                          <div class="d-flex flex-column justify-content-center">
                            {{-- <a href="{{ url('hr/view/kpi/'.$hremps->id) }}" class="btn btn-primary btn-sm" style="font-size: 10px" role="button"><i class="fa fa-eye"></i>&nbsp;View</a> --}}
                            <a href="{{ url('add-date/'.$hremps->id) }}" class="btn btn-light btn-sm" style="font-size: 10px" role="button"><i class="fa fa-eye"></i>&nbsp;View</a>
                          </div>
                        </div>
                      </td>
                    </div>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-12">
        <div class="card mb-4">
          <div class="card-header pb-0">
            <p><strong>{{$afempcount}} employees</strong> in Account & Finance (A&F) department</p>
          </div>
          <div class="card-body px-0 pt-0 pb-2">
            <div class="table-responsive p-0">
              <table class="table align-items-center mb-0">
                <thead>
                  <tr>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Name</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Position</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Staff Number</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Department</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Unit</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Grade</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">KPI</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($afemp as $afemps)
                  <tr>
                    <td>    
                      <div class="d-flex px-2 py-1">
                        <div>
                          <img src="../assets/img/profileavatar.png" class="avatar avatar-sm me-3" alt="user1">
                        </div>
                        
                        <div class="d-flex flex-column justify-content-center">
                          <h6 class="mb-0 text-sm" value="{{$afemps->id}}">{{$afemps->name}}</h6>
                          {{-- <p class="text-xs text-secondary mb-0">roles</p> --}}
                        </div>
                      </div>
                    </td>
                    <td>
                      <p class="text-xs font-weight-bold mb-0" value="{{$afemps->id}}">{{$afemps->position}}</p>
                      {{-- <p class="text-xs text-secondary mb-0">Momentum Internet</p> --}}
                    </td>
                    <td class="align-middle text-center">
                      <span class="text-secondary text-xs font-weight-bold" value="{{$afemps->id}}">{{$afemps->nostaff}}</span>
                    </td>
                    <td class="align-middle text-center">
                      <span class="text-secondary text-xs font-weight-bold" value="{{$afemps->id}}">{{$afemps->department}}</span>
                    </td>
                    <td class="align-middle text-center">
                      <span class="text-secondary text-xs font-weight-bold" value="{{$afemps->id}}">{{$afemps->unit}}</span>
                    </td>
                    <td class="align-middle text-center">
                      <span class="text-secondary text-xs font-weight-bold" value="{{$afemps->id}}">{{$afemps->grade}}</span>
                    </td>
                    <div class="d-flex flex-column justify-content-center">
                      {{-- <td>
                        <div class="d-flex px-2 py-1">
                          <div class="d-flex flex-column justify-content-center">
                            @if ($afemps->status == "Not Submitted")
                            <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark"></strong>&nbsp;<span class="badge badge-sm bg-gradient-secondary">{{$afemps->status}}</span></li>
                            @else 
                            @endif

                            @if ($afemps->status == "Submitted")
                            <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark"></strong>&nbsp;<span class="badge badge-sm bg-gradient-info">{{$afemps->status}}</span></li>
                            @else 
                            @endif

                            @if ($afemps->status == "Signed By Manager")
                            <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark"></strong>&nbsp;<span class="badge badge-sm bg-gradient-dark">{{$afemps->status}}</span></li>
                            @else 
                            @endif

                            @if ($afemps->status == "Completed")
                            <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark"></strong>&nbsp;<span class="badge badge-sm bg-gradient-success">{{$afemps->status}}</span></li>
                            @else 
                            @endif
                          </div>
                        </div>
                      </td> --}}
                    </div>
                    <div class="d-flex flex-column justify-content-center">
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div>
                          </div>
                          <div class="d-flex flex-column justify-content-center">
                            {{-- <a href="{{ url('hr/view/kpi/'.$afemps->id) }}" class="btn btn-primary btn-sm" style="font-size: 10px" role="button"><i class="fa fa-eye"></i>&nbsp;View</a> --}}
                            <a href="{{ url('add-date/'.$afemps->id) }}" class="btn btn-light btn-sm" style="font-size: 10px" role="button"><i class="fa fa-eye"></i>&nbsp;View</a>
                          </div>
                        </div>
                      </td>
                    </div>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>

    
    <div class="row">
      <div class="col-12">
        <div class="card mb-4">
          <div class="card-header pb-0">
            <p><strong>{{$salesempcount}} employees</strong> in Sales department</p>
          </div>
          <div class="card-body px-0 pt-0 pb-2">
            <div class="table-responsive p-0">
              <table class="table align-items-center mb-0">
                <thead>
                  <tr>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Name</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Position</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Staff Number</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Department</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Unit</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Grade</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">KPI</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($salesemp as $salesemps)
                  <tr>
                    <td>    
                      <div class="d-flex px-2 py-1">
                        <div>
                          <img src="../assets/img/profileavatar.png" class="avatar avatar-sm me-3" alt="user1">
                        </div>
                        
                        <div class="d-flex flex-column justify-content-center">
                          <h6 class="mb-0 text-sm" value="{{$salesemps->id}}">{{$salesemps->name}}</h6>
                          {{-- <p class="text-xs text-secondary mb-0">roles</p> --}}
                        </div>
                      </div>
                    </td>
                    <td>
                      <p class="text-xs font-weight-bold mb-0" value="{{$salesemps->id}}">{{$salesemps->position}}</p>
                      {{-- <p class="text-xs text-secondary mb-0">Momentum Internet</p> --}}
                    </td>
                    <td class="align-middle text-center">
                      <span class="text-secondary text-xs font-weight-bold" value="{{$salesemps->id}}">{{$salesemps->nostaff}}</span>
                    </td>
                    <td class="align-middle text-center">
                      <span class="text-secondary text-xs font-weight-bold" value="{{$salesemps->id}}">{{$salesemps->department}}</span>
                    </td>
                    <td class="align-middle text-center">
                      <span class="text-secondary text-xs font-weight-bold" value="{{$salesemps->id}}">{{$salesemps->unit}}</span>
                    </td>
                    <td class="align-middle text-center">
                      <span class="text-secondary text-xs font-weight-bold" value="{{$salesemps->id}}">{{$salesemps->grade}}</span>
                    </td>
                    <div class="d-flex flex-column justify-content-center">
                      {{-- <td>
                        <div class="d-flex px-2 py-1">
                          <div class="d-flex flex-column justify-content-center">
                          @if ($salesemps->status == "Not Submitted")
                          <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark"></strong>&nbsp;<span class="badge badge-sm bg-gradient-secondary">{{$salesemps->status}}</span></li>
                          @else 
                          @endif

                          @if ($salesemps->status == "Submitted")
                          <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark"></strong>&nbsp;<span class="badge badge-sm bg-gradient-info">{{$salesemps->status}}</span></li>
                          @else 
                          @endif

                          @if ($salesemps->status == "Signed By Manager")
                          <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark"></strong>&nbsp;<span class="badge badge-sm bg-gradient-dark">{{$salesemps->status}}</span></li>
                          @else 
                          @endif

                          @if ($salesemps->status == "Completed")
                          <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark"></strong>&nbsp;<span class="badge badge-sm bg-gradient-success">{{$salesemps->status}}</span></li>
                          @else 
                          @endif
                        </div>
                        </div>
                      </td> --}}
                    </div>
                    <div class="d-flex flex-column justify-content-center">
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div>
                          </div>
                          <div class="d-flex flex-column justify-content-center">
                            {{-- <a href="{{ url('hr/view/kpi/'.$salesemps->id) }}" class="btn btn-primary btn-sm" style="font-size: 10px" role="button"><i class="fa fa-eye"></i>&nbsp;View</a> --}}
                            <a href="{{ url('add-date/'.$salesemps->id) }}" class="btn btn-light btn-sm" style="font-size: 10px" role="button"><i class="fa fa-eye"></i>&nbsp;View</a>
                          </div>
                        </div>
                      </td>
                    </div>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>

      <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
              <p><strong>{{$marketingempcount}} employees</strong> in Marketing department</p>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Name</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Position</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Staff Number</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Department</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Unit</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Grade</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">KPI</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($marketingemp as $marketingemps)
                    <tr>
                      <td>    
                        <div class="d-flex px-2 py-1">
                          {{-- <div>
                            <img src="../assets/img/profileavatars.png" class="avatar avatar-sm me-3" alt="user1">
                          </div> --}}
                          <div>
                            <img src="../assets/img/profileavatar.png" class="avatar avatar-sm me-3" alt="user1">
                          </div>
                          
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm" value="{{$marketingemps->id}}">{{$marketingemps->name}}</h6>
                            {{-- <p class="text-xs text-secondary mb-0">roles</p> --}}
                          </div>
                        </div>
                      </td>
                      <td>
                        <p class="text-xs font-weight-bold mb-0" value="{{$marketingemps->id}}">{{$marketingemps->position}}</p>
                        {{-- <p class="text-xs text-secondary mb-0">Momentum Internet</p> --}}
                      </td>
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold" value="{{$marketingemps->id}}">{{$marketingemps->nostaff}}</span>
                      </td>
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold" value="{{$marketingemps->id}}">{{$marketingemps->department}}</span>
                      </td>
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold" value="{{$marketingemps->id}}">{{$marketingemps->unit}}</span>
                      </td>
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold" value="{{$marketingemps->id}}">{{$marketingemps->grade}}</span>
                      </td>
                      <div class="d-flex flex-column justify-content-center">
                        {{-- <td>
                          <div class="d-flex px-2 py-1">
                            <div class="d-flex flex-column justify-content-center">
                            @if ($marketingemps->status == "Not Submitted")
                            <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark"></strong>&nbsp;<span class="badge badge-sm bg-gradient-secondary">{{$marketingemps->status}}</span></li>
                            @else 
                            @endif

                            @if ($marketingemps->status == "Submitted")
                            <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark"></strong>&nbsp;<span class="badge badge-sm bg-gradient-info">{{$marketingemps->status}}</span></li>
                            @else 
                            @endif

                            @if ($marketingemps->status == "Signed By Manager")
                            <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark"></strong>&nbsp;<span class="badge badge-sm bg-gradient-dark">{{$marketingemps->status}}</span></li>
                            @else 
                            @endif

                            @if ($marketingemps->status == "Completed")
                            <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark"></strong>&nbsp;<span class="badge badge-sm bg-gradient-success">{{$marketingemps->status}}</span></li>
                            @else 
                            @endif
                          </div>
                          </div>
                        </td> --}}
                      </div>
                      <div class="d-flex flex-column justify-content-center">
                        <td>
                          <div class="d-flex px-2 py-1">
                            <div>
                            </div>
                            <div class="d-flex flex-column justify-content-center">
                              {{-- <a href="{{ url('hr/view/kpi/'.$marketingemps->id) }}" class="btn btn-primary btn-sm" style="font-size: 10px" role="button"><i class="fa fa-eye"></i>&nbsp;View</a> --}}
                              <a href="{{ url('add-date/'.$marketingemps->id) }}" class="btn btn-light btn-sm" style="font-size: 10px" role="button"><i class="fa fa-eye"></i>&nbsp;View</a>
                            </div>
                          </div>
                        </td>
                      </div>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
      
      <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
              <p><strong>{{$operationempcount}} employees</strong> in Operation department</p>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Name</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Position</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Staff Number</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Department</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Unit</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Grade</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">KPI</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($operationemp as $operationemps)
                    <tr>
                      <td>    
                        <div class="d-flex px-2 py-1">
                          <div>
                            <img src="../assets/img/profileavatar.png" class="avatar avatar-sm me-3" alt="user1">
                          </div>
                          
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm" value="{{$operationemps->id}}">{{$operationemps->name}}</h6>
                            {{-- <p class="text-xs text-secondary mb-0">roles</p> --}}
                          </div>
                        </div>
                      </td>
                      <td>
                        <p class="text-xs font-weight-bold mb-0" value="{{$operationemps->id}}">{{$operationemps->position}}</p>
                        {{-- <p class="text-xs text-secondary mb-0">Momentum Internet</p> --}}
                      </td>
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold" value="{{$operationemps->id}}">{{$operationemps->nostaff}}</span>
                      </td>
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold" value="{{$operationemps->id}}">{{$operationemps->department}}</span>
                      </td>
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold" value="{{$operationemps->id}}">{{$operationemps->unit}}</span>
                      </td>
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold" value="{{$operationemps->id}}">{{$operationemps->grade}}</span>
                      </td>
                      <div class="d-flex flex-column justify-content-center">
                        {{-- <td>
                          <div class="d-flex px-2 py-1">
                            <div class="d-flex flex-column justify-content-center">
                              @if ($operationemps->status == "Not Submitted")
                              <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark"></strong>&nbsp;<span class="badge badge-sm bg-gradient-secondary">{{$operationemps->status}}</span></li>
                              @else 
                              @endif
  
                              @if ($operationemps->status == "Submitted")
                              <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark"></strong>&nbsp;<span class="badge badge-sm bg-gradient-info">{{$operationemps->status}}</span></li>
                              @else 
                              @endif
  
                              @if ($operationemps->status == "Signed By Manager")
                              <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark"></strong>&nbsp;<span class="badge badge-sm bg-gradient-dark">{{$operationemps->status}}</span></li>
                              @else 
                              @endif
  
                              @if ($operationemps->status == "Completed")
                              <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark"></strong>&nbsp;<span class="badge badge-sm bg-gradient-success">{{$operationemps->status}}</span></li>
                              @else 
                              @endif
                            </div>
                          </div>
                        </td> --}}
                      </div>
                      <div class="d-flex flex-column justify-content-center">
                        <td>
                          <div class="d-flex px-2 py-1">
                            <div>
                            </div>
                            <div class="d-flex flex-column justify-content-center">
                              {{-- <a href="{{ url('hr/view/kpi/'.$operationemps->id) }}" class="btn btn-primary btn-sm" style="font-size: 10px" role="button"><i class="fa fa-eye"></i>&nbsp;View</a> --}}
                              <a href="{{ url('add-date/'.$operationemps->id) }}" class="btn btn-light btn-sm" style="font-size: 10px" role="button"><i class="fa fa-eye"></i>&nbsp;View</a>
                            </div>
                          </div>
                        </td>
                      </div>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>

            <div class="row">
              <div class="col-12">
                <div class="card mb-4">
                  <div class="card-header pb-0">
                    <p><strong>{{$rndempcount}} employees</strong> in R&D department</p>
                  </div>
                  <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                      <table class="table align-items-center mb-0">
                        <thead>
                          <tr>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Name</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Position</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Staff Number</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Department</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Unit</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Grade</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">KPI</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($rndemp as $rndemps)
                          <tr>
                            <td>    
                              <div class="d-flex px-2 py-1">
                                <div>
                                  <img src="../assets/img/profileavatar.png" class="avatar avatar-sm me-3" alt="user1">
                                </div>
                                
                                <div class="d-flex flex-column justify-content-center">
                                  <h6 class="mb-0 text-sm" value="{{$rndemps->id}}">{{$rndemps->name}}</h6>
                                  {{-- <p class="text-xs text-secondary mb-0">roles</p> --}}
                                </div>
                              </div>
                            </td>
                            <td>
                              <p class="text-xs font-weight-bold mb-0" value="{{$rndemps->id}}">{{$rndemps->position}}</p>
                              {{-- <p class="text-xs text-secondary mb-0">Momentum Internet</p> --}}
                            </td>
                            <td class="align-middle text-center">
                              <span class="text-secondary text-xs font-weight-bold" value="{{$rndemps->id}}">{{$rndemps->nostaff}}</span>
                            </td>
                            <td class="align-middle text-center">
                              <span class="text-secondary text-xs font-weight-bold" value="{{$rndemps->id}}">{{$rndemps->department}}</span>
                            </td>
                            <td class="align-middle text-center">
                              <span class="text-secondary text-xs font-weight-bold" value="{{$rndemps->id}}">{{$rndemps->unit}}</span>
                            </td>
                            <td class="align-middle text-center">
                              <span class="text-secondary text-xs font-weight-bold" value="{{$rndemps->id}}">{{$rndemps->grade}}</span>
                            </td>
                            <div class="d-flex flex-column justify-content-center">
                              {{-- <td>
                                <div class="d-flex px-2 py-1">
                                  <div class="d-flex flex-column justify-content-center">
                                    @if ($rndemps->status == "Not Submitted")
                                    <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark"></strong>&nbsp;<span class="badge badge-sm bg-gradient-secondary">{{$rndemps->status}}</span></li>
                                    @else 
                                    @endif
        
                                    @if ($rndemps->status == "Submitted")
                                    <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark"></strong>&nbsp;<span class="badge badge-sm bg-gradient-info">{{$rndemps->status}}</span></li>
                                    @else 
                                    @endif
        
                                    @if ($rndemps->status == "Signed By Manager")
                                    <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark"></strong>&nbsp;<span class="badge badge-sm bg-gradient-dark">{{$rndemps->status}}</span></li>
                                    @else 
                                    @endif
        
                                    @if ($rndemps->status == "Completed")
                                    <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark"></strong>&nbsp;<span class="badge badge-sm bg-gradient-success">{{$rndemps->status}}</span></li>
                                    @else 
                                    @endif
                                  </div>
                                </div>
                              </td> --}}
                            </div>
                            <div class="d-flex flex-column justify-content-center">
                              <td>
                                <div class="d-flex px-2 py-1">
                                  <div>
                                  </div>
                                  <div class="d-flex flex-column justify-content-center">
                                    {{-- <a href="{{ url('hr/view/kpi/'.$rndemps->id) }}" class="btn btn-primary btn-sm" style="font-size: 10px" role="button"><i class="fa fa-eye"></i>&nbsp;View</a> --}}
                                    <a href="{{ url('add-date/'.$rndemps->id) }}" class="btn btn-light btn-sm" style="font-size: 10px" role="button"><i class="fa fa-eye"></i>&nbsp;View</a>
                                  </div>
                                </div>
                              </td>
                            </div>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>

      </div>

  <!--   Core JS Files   -->
  <script src="../assets/js/plugins/chartjs.min.js"></script>
  <script src="../assets/js/plugins/Chart.extension.js"></script>
  <script>
    var ctx = document.getElementById("chart-bars").getContext("2d");

    new Chart(ctx, {
      type: "bar",
      data: {
        labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
        datasets: [{
          label: "Sales",
          tension: 0.4,
          borderWidth: 0,
          pointRadius: 0,
          backgroundColor: "#fff",
          data: [450, 200, 100, 220, 500, 100, 400, 230, 500],
          maxBarThickness: 6
        }, ],
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        legend: {
          display: false,
        },
        tooltips: {
          enabled: true,
          mode: "index",
          intersect: false,
        },
        scales: {
          yAxes: [{
            gridLines: {
              display: false,
            },
            ticks: {
              suggestedMin: 0,
              suggestedMax: 500,
              beginAtZero: true,
              padding: 0,
              fontSize: 14,
              lineHeight: 3,
              fontColor: "#fff",
              fontStyle: 'normal',
              fontFamily: "Open Sans",
            },
          }, ],
          xAxes: [{
            gridLines: {
              display: false,
            },
            ticks: {
              display: false,
              padding: 20,
            },
          }, ],
        },
      },
    });

    var ctx2 = document.getElementById("chart-line").getContext("2d");

    var gradientStroke1 = ctx2.createLinearGradient(0, 230, 0, 50);

    gradientStroke1.addColorStop(1, 'rgba(253,235,173,0.4)');
    gradientStroke1.addColorStop(0.2, 'rgba(245,57,57,0.0)');
    gradientStroke1.addColorStop(0, 'rgba(255,214,61,0)'); //purple colors

    var gradientStroke2 = ctx2.createLinearGradient(0, 230, 0, 50);

    gradientStroke2.addColorStop(1, 'rgba(20,23,39,0.4)');
    gradientStroke2.addColorStop(0.2, 'rgba(245,57,57,0.0)');
    gradientStroke2.addColorStop(0, 'rgba(255,214,61,0)'); //purple colors


    new Chart(ctx2, {
      type: "line",
      data: {
        labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
        datasets: [{
            label: "Mobile apps",
            tension: 0.4,
            borderWidth: 0,
            pointRadius: 0,
            borderColor: "#fbcf33",
            borderWidth: 3,
            backgroundColor: gradientStroke1,
            data: [50, 40, 300, 220, 500, 250, 400, 230, 500],
            maxBarThickness: 6

          },
          {
            label: "Websites",
            tension: 0.4,
            borderWidth: 0,
            pointRadius: 0,
            borderColor: "#f53939",
            borderWidth: 3,
            backgroundColor: gradientStroke2,
            data: [30, 90, 40, 140, 290, 290, 340, 230, 400],
            maxBarThickness: 6

          },
        ],
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        legend: {
          display: false,
        },
        tooltips: {
          enabled: true,
          mode: "index",
          intersect: false,
        },
        scales: {
          yAxes: [{
            gridLines: {
              borderDash: [2],
              borderDashOffset: [2],
              color: '#dee2e6',
              zeroLineColor: '#dee2e6',
              zeroLineWidth: 1,
              zeroLineBorderDash: [2],
              drawBorder: false,
            },
            ticks: {
              suggestedMin: 0,
              suggestedMax: 500,
              beginAtZero: true,
              padding: 10,
              fontSize: 11,
              fontColor: '#adb5bd',
              lineHeight: 3,
              fontStyle: 'normal',
              fontFamily: "Open Sans",
            },
          }, ],
          xAxes: [{
            gridLines: {
              zeroLineColor: 'rgba(0,0,0,0)',
              display: false,
            },
            ticks: {
              padding: 10,
              fontSize: 11,
              fontColor: '#adb5bd',
              lineHeight: 3,
              fontStyle: 'normal',
              fontFamily: "Open Sans",
            },
          }, ],
        },
      },
    });
  </script>
