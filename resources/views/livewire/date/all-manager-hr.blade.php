@section('content')
<div>
    @extends('layouts.app')
    <div>
      <div class="container-fluid py-4">
        <div class="row">
          <div class="col-12">
            <div class="col-md-12">
              <div class="card mt-4">
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card mb-4">
              <div class="card-header pb-0">
                <h6><strong>KPI HISTORY</strong></h6>
              </div>
              <div class="card-body px-0 pt-0 pb-2">
                <div class="p-0">
                  <table class="table align-items-center justify-content-center mb-0">
                    <thead>
                      <tr>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Years</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2 ">Months</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">View</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2" style="text-align: center">Status</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                      @php($i = 1)
                      @foreach ($date as $key => $dates)
                      <tr>
                        <td>
                          <div class="d-flex px-2">
                            <div>
                              <img src="../assets/img/small-logos/logo-spotify.svg" class="avatar avatar-sm rounded-circle me-2" alt="spotify">
                            </div>
                            <div class="my-auto">
                              <h6 class="mb-0 text-sm" value="{{ $dates -> year }}">{{ $dates -> year }}</h6>
                            </div>
                          </div>
                        </td>
                        <td>
                          <p class="text-sm font-weight-bold mb-0" value="{{ $dates -> month }}">{{ $dates -> month }}</p>
                        </td>
                        <td>
                          <div class="mt-3 d-flex">
                              <a href="{{ url('manager-hr/view/kpi/'.$user_id.'/'.$dates->id.'/'.$user_id.'/'.$dates->year.'/'.$dates->month) }}" type="button" class="btn bg-gradient-secondary w-auto me-2">View KPI Master</a>
                          </div>
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
                        <td class="align-middle">
                        </td>
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
    </div>
    @endsection