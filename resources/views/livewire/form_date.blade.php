<div>
@section('content')
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
                <div class="card shadow rounded">
                  <div class="card-header pb-0">
                    <h6>HISTORY - DATE</h6>
                  </div>
    
                    <div class="col-sm-auto p-3">
                        <div class="card">
                            <div class="m-3">

                                <form action="{{ url('employee/update/date/'.$date_id.'/'.$user_id.'/'.$year.'/'.$month) }}" method="post">  

                                    @csrf     
                                    
                                    <?php
                                    $yearArray = range(2021, 2050);
                                    ?>  
    
                                <div class="row">
    
                                    <div class="col-sm-4 pt-3 " >
                                      <div class="mb-4" class="@error('year') border border-danger rounded-3 @enderror">
                                            <label class="font-weight-bold" >Year</label><br>
                                            
                                            <td style="word-break: break-all;" class="border-dark">
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
                                              <td style="word-break: break-all;" class="border-dark">
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
                                <button type="submit" class="btn btn-success btn-sm" style="font-size: 10px"><i class="fas fa-save"></i> Save</button>
                                </div>
                              </div>
                    
    
                          </form>
    
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