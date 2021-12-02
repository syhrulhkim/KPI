{{-- @extends('staff/layout/staff_template') --}}
{{-- @section('title','Staff | Pencapaian') --}}

@section('content')
<div>
  @extends('layouts.app')
<body>

    <div class="wrapper">
        <!-- Page Content  -->
        <div id="content">

            {{-- <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">

                    <button type="button" id="sidebarCollapse" class="btn btn-dark">
                        <i class="fas fa-align-left"></i>
                        <span>Menu</span>
                    </button>

                    <ul class="nav navbar-nav ml-auto">
                      <li class="nav-item active">
                        <a class="nav-link font-weight-bold" style="text-transform:uppercase" >{{ Auth::user()->name }}</a>
                      </li>
                  </ul>


                </div>
            </nav> --}}
           
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
                    <div class="card-header font-weight-bold" style="text-transform:uppercase" >Borang Pencapaian</div>
  
                    <div class="col-sm-auto p-3">
                        <div class="card">
                            <div class="m-3">
  
                            <form action="{{ url('/manager/update/nilai/'.$user->id.'/'.$nilai->id.'/'.$date_id.'/'.$user_id.'/'.$year.'/'.$month) }}" method="post">  
                                    @csrf
  
                                <?php
                                    // set start and end year range
                                    $yearArray = range(2021, 2050);
                                ?>
                                    <!-- List Dropdown -->
                                  {{-- <label for="year" class="col-form-label font-weight-bold" style="font-size: 1rem;">Year :</label>
                                  <input class="font-weight-bold btn-sm btn btn-outline-secondary ml-2" style="width: 100px" id="year" name="year" value="{{ $kecekapan->year }}" readonly>

                                  &nbsp;
                                  <label for="month" class="col-form-label font-weight-bold" style="font-size: 1rem;">Month :</label>
                                  <input class="font-weight-bold btn-sm btn btn-outline-secondary ml-2" style="width: 100px" id="month" name="month" value="{{ $kecekapan->month }}" readonly> --}}
    
                                
                                <div class="row">
  
                                  <div class="col-sm-4 pt-3 " >
                                    <div class="mb-4">
                                      <td class="font-weight-bold border-dark">
                                        <label class="font-weight-bold" >Nilai Teras</label>
                                        <input type="text" class="form-control " id="nilai_teras" name="nilai_teras" value="{{ $nilai->nilai_teras }}" readonly>
                                      </td>
                                    </div>
                                  </div>

                                      {{-- <div class="col-sm-4 pt-3 " >
                                        <div class="mb-4">
                                            <label class="font-weight-bold " >Jangkaan Hasil</label>
                                            <input type="text" class="form-control form-control-sm" id="jangkaan_hasil" name="jangkaan_hasil" value="{{ $nilai->jangkaan_hasil }}" >
                                        </div>
                                      </div> --}}
  
                                </div>
                              
                                <div class="row m-auto">
                                
                                
                                  {{-- Score KPI --}}
                                    {{-- <table class="table table-bordered sticky-top bg-light bg-gradient text-dark">
                                      <tr>
                                          <th class="w-25" >Gred : 
                                              <input class="font-weight-bold w-50 bg-light btn-sm btn btn-outline-secondary ml-2" id="grade" name="grade" value="{{ $nilai->grade }}" readonly>
                                          </th>
                                          <th class="w-25" >Overall Score : 
                                              <input class="font-weight-bold w-50 bg-light btn-sm btn btn-outline-secondary ml-2" id="percentage-total" name="total_score" value="{{ $nilai->total_score }}" readonly>
                                          </th>
                                          <th class="w-25" >Total Weightage : 
                                              <input class="font-weight-bold w-50 bg-light btn-sm btn btn-outline-secondary ml-2" id="percentage-weightage" name="weightage" value="{{ $nilai->weightage }}" readonly>
                                          </th>
                                      </tr>
                                  </table> --}}
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
                                                <input type="text" class="form-control " id="peratus" name="peratus" value="{{ $nilai->peratus }}" readonly>
                                              </td>
                                            </div>

                                            <div class="mb-4">
                                              <td class="font-weight-bold border-dark">
                                                <input type="text" class="form-control " id="ukuran" name="ukuran" value="{{ $nilai->ukuran }}" readonly>
                                              </td>
                                            </div>

                                            
                                      
                                            {{-- <td class="font-weight-bold border-dark">
                                              <input type="text" maxlength="4"  class="input_pencapaian w-75" id="ukuran" name="ukuran" onkeyup="masterClac();" value="{{ $kecekapan->ukuran }}" min="0" >
                                            </td> --}}
                                      
  
                                              <td class="font-weight-bold border-dark">
                                                <input type="text"  pattern="[0-4]+" maxlength="1"  class="input_base w-75" id="skor_penyelia" name="skor_penyelia" onkeyup="masterClac();" value="{{ $nilai->skor_penyelia }}" min="0" >
                                              </td>
                                      
                                            <td class="font-weight-bold border-dark">
                                              <input type="text"  class="form-control"  id="skor_sebenar" name="skor_sebenar" value="{{ $nilai->skor_sebenar }}" readonly>
                                            </td>


                                          </tr>
                                      </tbody>
                                    </table>
                                </div>    
                                </div>
  
                                <div class="p-3" style="text-align: right">
                                  <button type="submit" class="btn btn-sm btn-success" ><i class="fas fa-save"></i> Save</button>   
                                  <button type="button" class="btn btn-cancel" ><a href="{{ route('dashboard-manager') }}"><i class="fas fa-window-close"></i> Back</a></button>                        
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
<script src="{{asset('assets/js/nilai.js')}}"></script>

  </body>

</div>
  @endsection