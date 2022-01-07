{{-- @extends('layouts.employee_template') --}}
{{-- @section('title','Staff | Pencapaian') --}}

@section('content')
  @extends('layouts.app')
{{------------------------------------------------ Start Testing  ------------------------------------------------}}
<div class="wrapper">
  <div id="content">
  @if (session('message'))
  <div class="alert alert-success" role="alert">
    <h4 class="alert-heading">Well done!</h4>
    {{ session('message') }}
  </div>	
  @endif

  @error('weightage')
  <div class="alert alert-danger" role="alert">
  <h4 class="alert-heading">Alert!</h4>
  <span class="text-danger">Please check back your entered information</span>
  </div>
  @enderror

{{------------------------------------------------- End Testing ------------------------------------------------}}
<div class="wrapper">
  <div id="content">
      @if (session('message'))
        <div class="alert alert-success" role="alert">
          <h4 class="alert-heading">Well done!</h4>
          {{ session('message') }}
        </div>	
      @endif

      @error('weightage')
      <div class="alert alert-danger" role="alert">
        <h4 class="alert-heading">Alert!</h4>
        <span class="text-danger">Please check back your entered information</span>
      </div>
      @enderror

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

<div class="container-fluid py-4">
  <div class="row">
    <div class="col-lg-12">
      <div class="row">
        <div class="col-md-12 mb-lg-0 mb-4">
          <div class="card mt-4">
            <div class="card-header pb-0 p-3">
              <div class="row">
                <div class="col-6 d-flex align-items-center">
                </div>
              </div>
            </div>
            <form action="{{ url('employee/update/kpi/'.$kpi->id.'/'.$date_id.'/'.$user_id.'/'.$year.'/'.$month) }}" method="post">
            @csrf  
            <div class="card-body p-3">
              <div class="row">
                {{-- <div class="col-md-6 mb-md-0 mb-4">
                    @csrf
                    <div class="mb-0" class="@error('year') @enderror">
                      <input class="form-control card card-body border card-plain border-radius-lg d-flex align-items-center flex-row" wire:model="year" name="year" id="year" class="custom-select" value="{{ $kpi->year }}" tabindex="1">
                    </input>
                      @error('year') <div class="text-danger">{{ $message }}</div> @enderror
                      </div>
                    </div>
  
                    <div class="col-md-6">
                      <div class="mb-4" class="@error('month') border border-danger rounded-3 @enderror">
                        <td style="word-break: break-all;" class="border-dark">
                          <input class="form-control card card-body border card-plain border-radius-lg d-flex align-items-center flex-row" wire:model="month" name="month" id="month" class="form-select custom-select" value="{{ $kpi->month }}" tabindex="1">
                        </input>
                        </td>
                      </select>
                      @error('month') <div class="text-danger">{{ $message }}</div> @enderror
                      </div> 
                    </div> --}}
                  </form>  
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="mb-4" class="@error('fungsi') border border-danger rounded-3 @enderror">
                    <label class="font-weight-bold" >Fungsi</label>
                      <input type="text" class="form-control card card-body border card-plain border-radius-lg d-flex align-items-center flex-row" id="fungsi" name="fungsi" value="{{ $kpi->fungsi }}" readonly>
                    </select>
                    @error('fungsi') <div class="text-danger">{{ $message }}</div> @enderror
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="mb-4" class="@error('bukti') border border-danger rounded-3 @enderror">
                    <label class="font-weight-bold" >Tajuk Metrik/Bukti</label>
                      <textarea class="form-control card card-body border card-plain border-radius-lg d-flex align-items-center flex-row" name="bukti" id="bukti" cols="60" rows="10">{{ $kpi->bukti }}</textarea>
                      @error('bukti') <div class="text-danger">{{ $message }}</div> @enderror
                  </div>
                </div>
              </div>
              <div class="table-responsive">
                <table class="text-center">
                  <thead class="thead-dark">
                    <tr>
                      <th rowspan="2">(%)</th>
                      <th rowspan="2">Ukuran</th>
                      <th colspan="3">KPI Targets</th>
                      <th rowspan="2">Pencapaian</th>
                      <th rowspan="2">Skor KPI</th>
                      <th rowspan="2">Skor Sebenar</th>
                    </tr>
                    <tr class="table table-bordered">
                      <th scope="col" >Threshold</th>
                      <th scope="col" >Base</th>
                      <th scope="col" >Stretch</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td class="font-weight-bold border-dark"  class="@error('peratus') border border-danger rounded-3 @enderror">
                        <input type="text" pattern="[0-9]+" maxlength="3" class="form-control" id="peratus" name="peratus" onkeyup="masterClac();" value="{{ $kpi->peratus }}" min="0"  >
                        @error('peratus') <div class="text-danger">{{ $message }}</div> @enderror
                      </td>

                      <td style="word-break: break-all;" class="border-dark" class="@error('peratus') border border-danger rounded-3 @enderror">
                        <select class="form-select" id="ukuran" name="ukuran">
                          <option selected readonly value="{{ $kpi->ukuran }}">{{ $kpi->ukuran }}</option>
                          <option value="Unit">Unit</option>
                          <option value="Quantity" >Quantity</option>
                          <option value="Ratio" >Ratio</option>
                          <option value="Rating" >Rating</option>
                          <option value="Percentage (%)" >Percentage(%)</option>  
                          <option value="Date (dd/mm/yyyy)"  >Date (dd/mm/yyyy)</option>
                          <option value="Hours" >Hours</option> 
                          <option value="RM (billion)" >RM (billion)</option>
                          <option value="RM (million)" >RM (million)</option> 
                          <option value="RM (*000)" >RM (*000)</option>
                        </select>
                        @error('ukuran') <div class="text-danger">{{ $message }}</div> @enderror
                      </td>

                      <td class="border-dark" class="@error('threshold') border border-danger rounded-3 @enderror">
                        <input type="text" pattern="[0-9]+" maxlength="6" class="form-control" id="threshold" name="threshold" onkeyup="masterClac();" value="{{ $kpi->threshold }}" min="0" >
                        @error('threshold') <div class="text-danger">{{ $message }}</div> @enderror
                      </td>
                
                      <td class="border-dark" class="@error('base') border border-danger rounded-3 @enderror">
                        <input type="text" pattern="[0-9]+" maxlength="6" class="form-control" id="base" name="base" onkeyup="masterClac();" value="{{ $kpi->base }}" min="0" >
                        @error('base') <div class="text-danger">{{ $message }}</div> @enderror
                      </td>
                
                      <td class="border-dark" class="@error('stretch') border border-danger rounded-3 @enderror">
                        <input type="text" pattern="[0-9]+" maxlength="6" class="form-control" id="stretch" name="stretch" onkeyup="masterClac();" value="{{ $kpi->stretch }}" min="0" >
                        @error('stretch') <div class="text-danger">{{ $message }}</div> @enderror
                      </td>
                
                      <td class="border-dark" class="@error('stretch') border border-danger rounded-3 @enderror">
                        <input type="text" pattern="^\d*(\.\d{0,2})?$" maxlength="7" class="form-control" id="pencapaian" name="pencapaian" onkeyup="masterClac();" value="{{ $kpi->pencapaian }}" min="0" >
                        @error('pencapaian') <div class="text-danger">{{ $message }}</div> @enderror
                      </td>
                
                      <td class="border-dark" class="@error('skor_KPI') border border-danger rounded-3 @enderror">
                        <input type="text" class="form-control " id="skor_KPI" name="skor_KPI" value="{{ $kpi->skor_KPI }}" readonly>
                        @error('skor_KPI') <div class="text-danger">{{ $message }}</div> @enderror
                      </td>
                
                      <td class="border-dark" class="@error('skor_sebenar') border border-danger rounded-3 @enderror">
                        <input type="text"  class="form-control"  id="skor_sebenar" name="skor_sebenar" value="{{ $kpi->skor_sebenar }}" readonly>
                        @error('skor_sebenar') <div class="text-danger">{{ $message }}</div> @enderror
                      </td>

                    </tr>
                </tbody>
                </table>
              <div class="mt-2" style="text-align: right">
                <div class="col-12 text-end">
                  <button class="btn bg-gradient-dark mb-0" type="submit" href="javascript:;"><i class="fas fa-plus"></i>&nbsp;&nbsp;UPDATE</button>
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
</div>       

   <!-- Calculation JS -->
   <script src="{{asset('assets/js/master.js')}}"></script>
  <script src="{{url('assets/js/core/bootstrap.min.js')}}"></script>
 

  @endsection
