{{-- @extends('staff/layout/staff_template') --}}
{{-- @section('title','Staff | Pencapaian') --}}

@section('content')
<div>
  @extends('layouts.app')
<body>

{{------------------------------------------------ Testing ------------------------------------------------}}

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
            <form action="{{ url('employee/update/kecekapan/'.$kecekapan->id.'/'.$date_id.'/'.$user_id.'/'.$year.'/'.$month) }}" method="post">
            @csrf  
              <div class="row">
                <div class="col-md-6">
                  <div class="mb-4" class="@error('fungsi') border border-danger rounded-3 @enderror">
                    <label class="font-weight-bold" >Kecekapan Teras</label>
                      <input type="text" class="form-control card-body card-plain border-radius-lg d-flex align-items-center flex-row" id="fungsi" name="fungsi" value="{{ $kecekapan->kecekapan_teras }}" readonly>
                    </select>
                    @error('fungsi') <div class="text-danger">{{ $message }}</div> @enderror
                  </div>
                </div>
              </div>
              <div class="align-middle">
                <table class="text-center">
                  <thead class="thead-dark">
                    <tr>
                      <th rowspan="2">(%)</th>
                      <th rowspan="2">Ukuran</th>
                      @if ((Auth::user()->role == "employee") || (Auth::user()->role == "admin"))
                      <th rowspan="2">Skor Pekerja</th>
                      @else
                      @endif
                      @if ((Auth::user()->role == "manager") || (Auth::user()->role == "admin"))
                      <th rowspan="2">Skor Penyelia</th>
                      @else
                      @endif
                      <th rowspan="2">Skor Sebenar</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td class="font-weight-bold border-dark"  class="@error('peratus') border border-danger rounded-3 @enderror">
                        <input type="text" pattern="[0-9]+" maxlength="3" class="form-control" id="peratus" name="peratus" onkeyup="masterClac();" value="{{ $kecekapan->peratus }}" min="0"  >
                        @error('peratus') <div class="text-danger">{{ $message }}</div> @enderror
                      </td>

                      <td style="word-break: break-all;" class="border-dark" class="@error('skor_pekerja') border border-danger rounded-3 @enderror">
                        <input type="text" class="form-control " pattern="[0-4]+" maxlength="1" id="skor_pekerja" name="skor_pekerja" value="{{ $kecekapan->skor_pekerja }}">
                        @error('skor_pekerja') <div class="text-danger">{{ $message }}</div> @enderror
                      </td>

                      <td class="border-dark" class="@error('skor_KPI') border border-danger rounded-3 @enderror">
                        <input type="text" class="form-control " id="skor_KPI" name="skor_KPI" value="{{ $kecekapan->peratus }}" readonly>
                        @error('skor_KPI') <div class="text-danger">{{ $message }}</div> @enderror
                      </td>
                
                      <td class="border-dark" class="@error('skor_sebenar') border border-danger rounded-3 @enderror">
                        <input type="text"  class="form-control"  id="skor_sebenar" name="skor_sebenar" value="{{ $kecekapan->skor_sebenar }}" readonly>
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

{{------------------------------------------------ End Testing ------------------------------------------------}}

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

            <!-- Pencapaian Content  -->
            <div class="col-md-auto">
                <div class="card shadow rounded">
                    <div class="card-header font-weight-bold" style="text-transform:uppercase" >Performance Form</div>
                    <div class="col-sm-auto p-3">
                        <div class="card">
                            <div class="m-3">
                            <form action="{{ url('employee/update/kecekapan/'.$kecekapan->id.'/'.$date_id.'/'.$user_id.'/'.$year.'/'.$month) }}" method="post">  
                                    @csrf
                                <?php
                                    // set start and end year range
                                    $yearArray = range(2021, 2050);
                                ?>
                                <div class="row">
                                  <div class="col-sm-4 pt-3 " >
                                    <div class="mb-4">
                                      <td class="font-weight-bold border-dark">
                                        <label class="font-weight-bold" >Kecekapan Teras</label>
                                        <input type="text" class="form-control " id="kecekapan_teras" name="kecekapan_teras" value="{{ $kecekapan->kecekapan_teras }}" readonly>
                                      </td>
                                    </div>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="table-responsive">
                                    <table class="table table-bordered text-center">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th rowspan="2">(%)</th>
                                                <th rowspan="2">Ukuran</th>
                                                @if ((Auth::user()->role == "employee") || (Auth::user()->role == "admin"))
                                                <th rowspan="2">Skor Pekerja</th>
                                                @else
                                                @endif
                                                @if ((Auth::user()->role == "manager") || (Auth::user()->role == "admin"))
                                                <th rowspan="2">Skor Penyelia</th>
                                                @else
                                                @endif
                                                <th rowspan="2">Skor Sebenar</th>
                                                {{-- <th rowspan="2">Skor Sebenar</th> --}}
                                            </tr>
                                        </thead>
                                        <tbody>
                                          <tr>
                                              <div class="mb-4">
                                                <td class="font-weight-bold border-dark">
                                                  <input type="text" class="form-control " id="peratus" name="peratus" value="{{ $kecekapan->peratus }}" readonly>
                                                </td>
                                              </div>

                                            <div class="mb-4">
                                              <td class="font-weight-bold border-dark">
                                                <input type="text" class="form-control " id="ukuran" name="ukuran" value="{{ $kecekapan->ukuran }}" readonly>
                                              </td>
                                            </div>
                                      
                                            <td style="word-break: break-all;" class="border-dark" class="@error('skor_pekerja') border border-danger rounded-3 @enderror">
                                              <input type="text" class="form-control " pattern="[0-4]+" maxlength="1" id="skor_pekerja" name="skor_pekerja" value="{{ $kecekapan->skor_pekerja }}">
                                              @error('skor_pekerja') <div class="text-danger">{{ $message }}</div> @enderror
                                            </td>

                                            <td class="font-weight-bold border-dark">
                                              <input type="text"  class="form-control"  id="skor_sebenar" name="skor_sebenar" value="{{ $kecekapan->skor_sebenar }}" readonly>
                                            </td>

                                          </tr>
                                      </tbody>
                                    </table>
                                </div>    
                                </div>
  
                                <div class="p-3" style="text-align: right">
                                <button type="submit" class="btn btn-success btn-sm" style="font-size: 10px"><i class="fas fa-save"></i> Save</button>
                                </div>
                              </div>
                          </form>
                        </div>
                    </div>
                </div>     
            </div>
        </div>
    </div>
</form>
<!-- Calculation JS -->
<script src="{{asset('assets/js/kecekapan.js')}}"></script>

  </body>
  @endsection
</div>