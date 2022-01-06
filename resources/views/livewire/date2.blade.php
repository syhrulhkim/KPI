@section('content')
<div>
    @extends('layouts.app')
<div>
    <body>
        <div class="wrapper">
          <div id="content">
              <br>
              <div class="m-3">
    
                @if (session('message'))
                  <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>{{ session('message') }}</strong>
                  </div>	
                @endif
    
                @if (session('fail'))
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                  <strong>{{ session('fail') }}</strong>
                </div>	
                @endif
    
              </div>
            
              <div class="col-md-auto">
    
            <br>
    

          <div class="container-fluid py-4">
            <div class="row">
              <div class="col-12">
                <div class="card mb-4">
                  <div class="card-header pb-0">
                    @foreach ($user as $users)
                    <h6>{{$users->name}} KPI History</h6>
                    @endforeach
                  </div>
                  <div class="card-body px-0 pt-0 pb-2">
                    <div class="p-0">
                      <table class="table align-items-center mb-0">
                        <thead>
                          <tr>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Year</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Month</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"></th>
                            {{-- <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Edit</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Delete</th> --}}
                          </tr>
                        </thead>
                        <tbody>
                          @php($i = 1)
                          @foreach ($date as $key => $dates)
                          <tr>

                            <td>    
                              <div class="d-flex px-2 py-1">
                                <div class="d-flex flex-column justify-content-center">
                                  <p class="mb-0 text-sm" value="{{$key + 1}}">{{$key + 1}}</p>
                                </div>
                              </div>
                            </td>

                            <td>
                              <p class="text-xs font-weight-bold mb-0" value="{{ $dates -> year }}">{{ $dates -> year }}</p>
                            </td>

                            <td>
                              <p class="text-xs font-weight-bold mb-0" value="{{ $dates -> month }}">{{ $dates -> month }}</p>
                            </td>

                            <td>
                              <div class="justify-content-center d-flex px-2 py-1">
                                <div class="d-flex flex-column justify-content-center">

                                  
                                  @if ($dates->status == "Not Submitted")
                                  <span class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark"></strong>&nbsp;<span class="badge badge-sm bg-gradient-secondary">{{$dates->status}}</span></span>
                                  @else 
                                  @endif
        
                                  @if ($dates->status == "Submitted")
                                  <span class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark"></strong>&nbsp;<span class="badge badge-sm bg-gradient-info">{{$dates->status}}</span></span>
                                  @else 
                                  @endif
        
                                  @if ($dates->status == "Signed By Manager")
                                  <span class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark"></strong>&nbsp;<span class="badge badge-sm bg-gradient-dark">{{$dates->status}}</span></span>
                                  @else 
                                  @endif
        
                                  @if ($dates->status == "Completed")
                                  <span class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark"></strong>&nbsp;<span class="badge badge-sm bg-gradient-success">{{$dates->status}}</span></span>
                                  @else 
                                  @endif
                               
        
                                </div>
                              </div>
                            </td>

                            {{-- <td class="align-middle text-center">
                              <a href="{{ url('manager-hr/view/kpi/'.$user_id.'/'.$dates->id.'/'.$user_id.'/'.$dates->year.'/'.$dates->month) }}" class="btn btn-light btn-sm" style="font-size: 10px" role="button"><i class="fa fa-eye"></i>&nbsp;View KPI Master</a>
                            </td> --}}

                            <td class="align-middle">
                              <div class="col-lg-6 col-5 my-auto text-middle">
                                <div class="dropdown float-lg-start pe-4">
                                  <a class="cursor-pointer" id="dropdownTable" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fa fa-ellipsis-v text-secondary"></i>
                                  </a>
                                  <ul class="dropdown-menu px-2 py-3 ms-n4 ms-n5" aria-labelledby="dropdownTable">
                                    <li> <a href="{{ url('manager-hr/view/kpi/'.$user_id.'/'.$dates->id.'/'.$user_id.'/'.$dates->year.'/'.$dates->month) }}" class="dropdown-item border-radius-md" role="button">View KPI Master</a></li>
                                  </ul>
                                </div>
                              </div>
                            </td>

                            {{-- <td style="border:none">
                              <button type="button" wire:click="selectItem({{$dates->id}} , 'update' )" class="btn btn-sm waves-effect waves-light btn-warning"> <i class="fas fa-user-edit text-secondary"></i></button>
                            </td>

                            <td class="align-middle text-center">
                              <button type="button" wire:click="selectItem({{$dates->id}}, 'delete' )" class="btn btn-sm waves-effect waves-light btn-danger data-delete" style="font-size: 10px" data-form="{{$dates->id}}"><i class="fas fa-trash-alt"></i>&nbsp;Delete</button>
                            </td> --}}

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
        </div>
      </div>
    </div>
      @push('scripts')
        
      <script>
        document.addEventListener('livewire:load', function () {
      
      
          $(document).on("click", ".data-delete", function (e) 
              {
                  e.preventDefault();
                  swal({
                  title: "Are you sure?",
                  text: "Once deleted, you will not be able to recover!",
                  icon: "warning",
                  buttons: true,
                  dangerMode: true,
                  })
                  .then((willDelete) => {
                  if (willDelete) {
                      e.preventDefault();
                      Livewire.emit('delete')
                  } 
                  });
              });
        })
      </script>
      
      @endpush
    
    </body>
  </div>
    </div>
    @endsection