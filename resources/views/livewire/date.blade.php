{{-- {{dd($kpi)}} --}}
{{-- @foreach ($kpi as $key => $kpis)
{{dd($kpis->kpimaster->date->id)}}
@endforeach --}}
{{-- @foreach ($date as $key => $dates)
{{dd($dates->kpimasters->id)}}
@endforeach --}}
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
              <div class="card shadow rounded">
                <div class="card-header pb-0">
                  <h6>HISTORY - DATE</h6>
                </div>
  
                  <div class="col-sm-auto p-3">
                      <div class="card">
                          <div class="m-3">
  
                          <form action="{{ route('date_save') }}" method="post">  
                            {{-- <form action="{{ url('/manager/update/kecekapan/'.$user->id.'/'.$kecekapan->id) }}" method="post"> --}}
                                  @csrf     
                                  
                                  <?php
                                  $yearArray = range(2021, 2050);
                                  ?>  
  
                              <div class="row">
  
                                  <div class="col-sm-4 pt-3 " >
                                    <div class="mb-4" class="@error('year') border border-danger rounded-3 @enderror">
                                          <label class="font-weight-bold" >Year</label><br>
                                          {{-- <input wire:model="year" type="text" id="year" name="year" class="form-control" > --}}
                                          <td style="word-break: break-all;" class="border-dark">
                                            {{-- <select class="form-select form-select-sm" id="year" name="year"> --}}
                                            <select class="form-select form-select-sm" wire:model="year" name="year" id="year" class="form-select custom-select" data-placeholder="Choose a Year" tabindex="1">
                                              <option selected value="">-- Please Choose --</option>
                                              <?php
                                                  foreach ($yearArray as $year) {
                                                      echo '<option value="'.$year.'">'.$year.'</option>';
                                                  }
                                              ?>
                                            </select>
                                          </td>
                                      </select>
                                      @error('year') <div class="text-danger">{{ $message }}</div> @enderror
                                    </div>
                                  </div>

                                  <div class="col-sm-4 pt-3 " >
                                      <div class="mb-4" class="@error('month') border border-danger rounded-3 @enderror">
                                            <label class="font-weight-bold" >Month</label><br>
                                            {{-- <input wire:model="month" type="text" id="month" name="month" class="form-control" > --}}
                                            <td style="word-break: break-all;" class="border-dark">
                                              {{-- <select class="form-select form-select-sm" id="month" name="month"> --}}
                                              <select class="form-select form-select-sm" wire:model="month" name="month" id="month" class="form-select custom-select" data-placeholder="Choose a Month" tabindex="1">
                                                <option selected value="">-- Please Choose --</option>
                                                <option value="January" >January</option>
                                                <option value="February" >February</option> 
                                                <option value="March" >March</option> 
                                                <option value="April" >April</option>
                                                <option value="May" >May</option>
                                                <option value="June" >June</option>
                                                <option value="July" >July</option>
                                                <option value="August" >August</option>
                                                <option value="September" >September</option>
                                                <option value="October" >October</option>
                                                <option value="November" >November</option>
                                                <option value="December" >December</option>
                                              </select>
                                            </td>
                                        </select>
                                        @error('month') <div class="text-danger">{{ $message }}</div> @enderror
                                      </div>
                                    </div>
                                  
                              </div>
                              <div class="row m-auto">
                                <div class="table-responsive">

                              <div class="p-3" style="text-align: right">
                                {{-- <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                                  Save
                              </button>                      --}}
                              <button type="submit" class="btn btn-success btn-sm" style="font-size: 10px"><i class="fas fa-save"></i> Save</button>
                              </div>
                            </div>
                  
  
                        </form>
  
                      </div>
                  </div>
              </div>     
          </div>
  
          <br>
  

        <div class="container-fluid py-4">
          <div class="row">
            <div class="col-12">
              <div class="card mb-4">
                <div class="card-header pb-0">
                  <h6>Your KPI History</h6>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                  <div class="table-responsive p-0">
                    <table class="table align-items-center mb-0">
                      <thead>
                        <tr>
                          <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                          <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Year</th>
                          <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Month</th>
                          <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Add KPI</th>
                          <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Add Kecekapan</th>
                          <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Add Nilai</th>
                          <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">View KPI Master</th>
                          <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Edit</th>
                          <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Delete</th>
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

                          <td class="align-middle text-center">
                            <a href="{{ url('employee/kpi/'.$dates->id.'/'.$dates->user_id.'/'.$dates->year.'/'.$dates->month) }}" class="btn btn-dark btn-sm" style="font-size: 10px" role="button"><i class="fa fa-edit"></i>&nbsp;Edit KPI</a>
                          </td>

                          <td class="align-middle text-center">
                            <a href="{{ url('employee/kecekapan/'.$dates->id.'/'.$dates->user_id.'/'.$dates->year.'/'.$dates->month) }}" class="btn btn-dark btn-sm" style="font-size: 10px" role="button"><i class="fa fa-edit"></i>&nbsp;Edit Kecekapan</a>
                          </td>

                          <td class="align-middle text-center">
                            <a href="{{ url('employee/nilai/'.$dates->id.'/'.$dates->user_id.'/'.$dates->year.'/'.$dates->month) }}" class="btn btn-dark btn-sm" style="font-size: 10px" role="button"><i class="fa fa-edit"></i>&nbsp;Edit Nilai</a>
                          </td>

                          <td class="align-middle text-center">
                            <a href="{{ url('employee/displaykpi/'.$dates->id.'/'.$dates->user_id.'/'.$dates->year.'/'.$dates->month) }}" class="btn btn-light btn-sm" style="font-size: 10px" role="button"><i class="fa fa-eye"></i>&nbsp;View KPI Master</a>
                          </td>

                          <td style="border:none">
                            <a href="{{ url('employee/edit/date/'.$dates->id.'/'.$dates->user_id.'/'.$dates->year.'/'.$dates->month) }}" class="btn btn-dark btn-sm" style="font-size: 10px" role="button"><i class="fa fa-edit"></i>&nbsp;Edit Date</a>
                            {{-- <button type="button" wire:click="selectItem({{$dates->id}} , 'update' )" class="btn btn-sm waves-effect waves-light btn-dark" style="font-size: 10px"><i class="fa fa-edit"></i> Edit Date</button> --}}
                          </td>

                          <td class="align-middle text-center">
                            <button type="button" wire:click="selectItem({{$dates->id}}, 'delete' )" class="btn btn-sm waves-effect waves-light btn-danger data-delete" style="font-size: 10px" data-form="{{$dates->id}}"><i class="fas fa-trash-alt"></i>&nbsp;Delete</button>
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