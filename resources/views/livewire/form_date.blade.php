<div>
@section('content')
  @extends('layouts.app')
<div>
    <body>
        <div class="wrapper">
          <div id="content">    
              <div class="container-fluid py-4">
                <div class="row">
                  <div class="col-12">
                    <div class="col-md-12">
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
    
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                      <strong>Warning ! If you want to edit date, status of this KPI will set to default (Not Submitted)</strong>
                    </div>	
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
                      <div class="card">
                        <div class="card-header pb-0 p-3">
                          <div class="row">
                            <div class="col-12 text-end">
                              <form action="{{ url('employee/update/date/'.$date_id.'/'.$user_id.'/'.$year.'/'.$month) }}" method="post">  
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
                                <div class="col-12 text-end">
                                  <button type="submit" class="btn bg-gradient-dark mb-0" href="javascript:;"><i class="fas fa-plus"></i>&nbsp;&nbsp;Update</button>
                                </div>
                              </form>  
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>  
            </div>
          <br>
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
    @endsection
  </div>