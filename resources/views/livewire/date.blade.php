<div>
<div class="container-fluid py-4">
  <div class="row">
    <div class="col-12">
      <div class="col-md-12">
        <div class="card mt-4">
          <div class="card-header pb-0 p-3">
            <div class="row">
              <div class="col-12 text-end">
                <form action="{{ route('date_save') }}" method="post">  
                <button type="submit" class="btn bg-gradient-dark mb-0" href="javascript:;"><i class="fas fa-plus"></i>&nbsp;&nbsp;Save</button>
              </div>
            </div>
          </div>
          <div class="card-body p-3">
            <div class="row">
              <div class="col-md-6 mb-md-0 mb-4">
                  @csrf
                  <div class="mb-0" class="@error('year') @enderror">
                    <select class="form-select card card-body border card-plain border-radius-lg d-flex align-items-center flex-row" wire:model="year" name="year" id="year" class="custom-select" data-placeholder="Choose a Year" tabindex="1">
                      <option selected value="">-- Choose Years --</option>
                      <?php
                        $yearArray = range(2021, 2050);
                      ?>
                      <?php
                          foreach ($yearArray as $year) {
                            echo '<option value="'.$year.'">'.$year.'</option>';
                          }
                      ?>
                    </select>
                    @error('year') <div class="text-danger">{{ $message }}</div> @enderror
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="mb-4" class="@error('month') border border-danger rounded-3 @enderror">
                      <td style="word-break: break-all;" class="border-dark">
                        <select class="form-select card card-body border card-plain border-radius-lg d-flex align-items-center flex-row" wire:model="month" name="month" id="month" class="form-select custom-select" data-placeholder="Choose a Month" tabindex="1">
                          <option selected value="">-- Choose Months --</option>
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
                </form>  
            </div>
          </div>
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
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Add</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">View</th>
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
                      <div class="dropdown">
                        <button class="btn bg-gradient-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa fa-edit"></i>
                          Add
                        </button>
                        <ul class="dropdown-menu px-2 py-3" aria-labelledby="dropdownMenuButton">
                          <li><a href="{{ url('employee/kpi/'.$dates->id.'/'.$dates->user_id.'/'.$dates->year.'/'.$dates->month) }}" class="dropdown-item border-radius-md" href="javascript:;">Edit KPI</a></li>
                          <li><a href="{{ url('employee/kecekapan/'.$dates->id.'/'.$dates->user_id.'/'.$dates->year.'/'.$dates->month) }}" class="dropdown-item border-radius-md" href="javascript:;">Edit KECEKAPAN</a></li>
                          <li><a href="{{ url('employee/nilai/'.$dates->id.'/'.$dates->user_id.'/'.$dates->year.'/'.$dates->month) }}" class="dropdown-item border-radius-md" href="javascript:;">Edit NILAI</a></li>
                        </ul>
                      </div>
                    </div>
                  </td>
                  <td>
                    <div class="mt-3 d-flex">
                        <a href="{{ url('employee/displaykpi/'.$dates->id.'/'.$dates->user_id.'/'.$dates->year.'/'.$dates->month) }}" type="button" class="btn bg-gradient-secondary w-auto me-2">View KPI Master</a>
                    </div>
                  </td>
                  <td class="align-middle">
                    <div class="col-lg-6 col-5 my-auto text-middle">
                      <div class="dropdown float-lg-start pe-4">
                        <a class="cursor-pointer" id="dropdownTable" data-bs-toggle="dropdown" aria-expanded="false">
                          <i class="fa fa-ellipsis-v text-secondary"></i>
                        </a>
                        <ul class="dropdown-menu px-2 py-3 ms-n4 ms-n5" aria-labelledby="dropdownTable">
                          {{-- <li><a href="{{ url('employee/edit/date/'.$dates->id.'/'.$dates->user_id.'/'.$dates->year.'/'.$dates->month) }}" class="btn btn-dark btn-sm" style="font-size: 10px" role="button"><i class="fa fa-edit"></i>&nbsp;Edit Date</a></li> --}}
                          {{-- <li><button type="button" wire:click="selectItem({{$dates->id}}, 'delete' )" class="btn btn-sm waves-effect waves-light btn-danger data-delete" style="font-size: 10px" data-form="{{$dates->id}}"><i class="fas fa-trash-alt"></i>&nbsp;Delete</button></li> --}}
                          <li><a href="{{ url('employee/edit/date/'.$dates->id.'/'.$dates->user_id.'/'.$dates->year.'/'.$dates->month) }}" class="dropdown-item border-radius-md" role="button">Edit</a></li>
                          <li><button type="button" wire:click="selectItem({{$dates->id}}, 'delete' )" class="dropdown-item border-radius-md data-delete" style="color: red;"  data-form="{{$dates->id}}">Delete</button></li>
                        </ul>
                      </div>
                    </div>
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