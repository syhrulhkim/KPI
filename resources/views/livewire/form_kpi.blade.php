{{-- @extends('staff/layout/staff_template') --}}
@section('title','Staff | Pencapaian')

{{-- @section('content') --}}

<body>

    <div class="wrapper">
        <!-- Page Content  -->
        <div id="content">

            <nav class="navbar navbar-expand-lg navbar-light bg-light">
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
            </nav>
           
            @if (session('message'))
              <div class="alert alert-success" role="alert">
                <h4 class="alert-heading">Well done!</h4>
                {{ session('message') }}
              </div>	
            @endif

            @error('weightage')
            <div class="alert alert-danger" role="alert">
              <h4 class="alert-heading">Alert!</h4>
              <span class="text-danger">Sila semak semula butiran pencapaian</span>
            </div>
            @enderror
z

             <!-- Pencapaian Content  -->

            <div class="col-md-auto">
                <div class="card shadow rounded">
                    <div class="card-header font-weight-bold" style="text-transform:uppercase" >Borang Pencapaian</div>
  
                    <div class="col-sm-auto p-3">
                        <div class="card">
                            <div class="m-3">
  
                            <form action="{{ url('staff/update/'.$kpi->id) }}" method="post">  
                                    @csrf
  
                                <?php
                                    // set start and end year range
                                    $yearArray = range(2021, 2050);
                                ?>
                                    <!-- List Dropdown -->
                                  <label for="tahun" class="col-form-label font-weight-bold" style="font-size: 1rem;">Tahun :</label>
                                  <input class="font-weight-bold btn-sm btn btn-outline-secondary ml-2" style="width: 100px" id="tahun" name="tahun" value="{{ $kpi->tahun }}" readonly>

                                  &nbsp;
                                  <label for="bulan" class="col-form-label font-weight-bold" style="font-size: 1rem;">Bulan :</label>
                                  <input class="font-weight-bold btn-sm btn btn-outline-secondary ml-2" style="width: 100px" id="bulan" name="bulan" value="{{ $kpi->bulan }}" readonly>
    
  
                                <div class="row">
  
                                    <div class="col-sm-4 pt-3 " >
                                      <div class="mb-4">
                                          <label class="font-weight-bold " >Objektif</label>
                                          <input type="text" class="form-control form-control-sm" id="objektif" name="objektif" value="{{ $kpi->objektif }}" >
                                      </div>
                                    </div>
  
                                    <div class="col-sm-4 pt-3 " >
                                      <div class="mb-4">
                                          <label class="font-weight-bold" >Fungsi</label>
                                          <select  class="form-control form-control-sm" id="fungsi" name="fungsi">
                                            <option selected readonly value="{{ $kpi->fungsi }}">{{ $kpi->fungsi }}</option>
                                            <option value="N/A">N/A</option>
                                            <option value="Kad Skor Korporat" >Kad Skor Korporat</option>
                                            <option value="Kewangan" >Kewangan</option>
                                            <option value="Pelanggan" >Pelanggan</option>
                                            <option value="Kecemerlangan Operasi" >Kecemerlangan Operasi</option> 
                                            <option value="Manusia & Proses" >Manusia & Proses</option> 
                                            <option value="Kolaborasi" >Kolaborasi</option>
                                        </select>
                                      </div>
                                    </div>
  
                                    <div class="col-sm-4 pt-3 " >
                                      <div class="mb-4">
                                          <label class="font-weight-bold" >Tajuk Metrik/Bukti</label>
                                          <textarea name="bukti" id="bukti" cols="30" rows="10">{{ $kpi->bukti }}</textarea>
                                      </div>
                                    </div>
  
                                </div>
                              
                                <div class="row m-auto">
                                
                                
                                  {{-- Score KPI --}}
                                    <table class="table table-bordered sticky-top bg-light bg-gradient text-dark">
                                      <tr>
                                          <th class="w-25" >Gred : 
                                              <input class="font-weight-bold w-50 bg-light btn-sm btn btn-outline-secondary ml-2" id="grade" name="grade" value="{{ $kpi->grade }}" readonly>
                                          </th>
                                          <th class="w-25" >Overall Score : 
                                              <input class="font-weight-bold w-50 bg-light btn-sm btn btn-outline-secondary ml-2" id="percentage-total" name="total_score" value="{{ $kpi->total_score }}" readonly>
                                          </th>
                                          <th class="w-25" >Total Weightage : 
                                              <input class="font-weight-bold w-50 bg-light btn-sm btn btn-outline-secondary ml-2" id="percentage-weightage" name="weightage" value="{{ $kpi->weightage }}" readonly>
                                          </th>
                                      </tr>
                                  </table>
                                  <div class="table-responsive">
                                    <table class="table table-bordered text-center">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th rowspan="2">Ukuran</th>
                                                <th rowspan="2">Peratus (%)</th>
                                                <th colspan="3">KPI Targets</th>
                                                <th rowspan="2">Pencapaian</th>
                                                <th rowspan="2">Skor KPI</th>
                                                <th rowspan="2">Skor Sebenar</th>
                                            </tr>
                                            <tr>
                                                <th scope="col" >Threshold</th>
                                                <th scope="col" >Base</th>
                                                <th scope="col" >Stretch</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                          <tr>

                                            <td style="word-break: break-all;" class="border-dark">
                                              <select class="form-select form-select-sm" id="ukuran" name="ukuran">
                                                <option selected readonly value="{{ $kpi->ukuran }}">{{ $kpi->ukuran }}</option>
                                                <option value="N/A">N/A</option>
                                                <option value="Quantity" >Quantity</option>
                                                <option value="Ratio" >Ratio</option>
                                                <option value="Rating" >Rating</option>
                                                <option value="Percentage (%)" >Percentage(%)</option>  
                                                <option value="Date (dd/mm/yyyy)"  >Date (dd/mm/yyyy)</option> 
                                                <option value="Month/Year"  >Month/Year</option> 
                                                <option value="Quarter"  >Quarter</option>
                                                <option value="Hours" >Hours</option> 
                                                <option value="RM (billion)" >RM (billion)</option>
                                                <option value="RM (million)" >RM (million)</option> 
                                                <option value="RM (*000)" >RM (*000)</option>
                                                <option value="KM/Miles" >KM/Miles</option>
                                              </select>
                                            </td>

                                            <td class="font-weight-bold border-dark">
                                              <input type="text" maxlength="3" class="input_ukuran w-75" id="peratus" name="peratus" onkeyup="masterClac();" value="{{ $kpi->peratus }}" min="0"  >
                                            </td>

                                            <td class="font-weight-bold border-dark">
                                              <input type="text" maxlength="4" class="input_threshold w-75" id="threshold" name="threshold" onkeyup="masterClac();" value="{{ $kpi->threshold }}" min="0" >
                                            </td>
                                      
                                            <td class="font-weight-bold border-dark">
                                              <input type="text" maxlength="4" class="input_base w-75" id="base" name="base" onkeyup="masterClac();" value="{{ $kpi->base }}" min="0" >
                                            </td>
                                      
                                            <td class="font-weight-bold border-dark">
                                              <input type="text" maxlength="4" class="input_stretch w-75" id="stretch" name="stretch" onkeyup="masterClac();" value="{{ $kpi->stretch }}" min="0" >
                                            </td>
                                      
                                            <td class="font-weight-bold border-dark">
                                              <input type="text" maxlength="4"  class="input_pencapaian w-75" id="pencapaian" name="pencapaian" onkeyup="masterClac();" value="{{ $kpi->pencapaian }}" min="0" >
                                            </td>
                                      
                                            <td class="font-weight-bold border-dark">
                                              <input type="text" class="form-control " id="skor_KPI" name="skor_KPI" value="{{ $kpi->skor_KPI }}" readonly>
                                            </td>
                                      
                                            <td class="font-weight-bold border-dark">
                                              <input type="text"  class="form-control"  id="skor_sebenar" name="skor_sebenar" value="{{ $kpi->skor_sebenar }}" readonly>
                                            </td>


                                          </tr>
                                      </tbody>
                                    </table>
                                </div>    
                                </div>
  
                                <div class="p-3" style="text-align: right">
                                  <button type="submit" class="btn btn-sm btn-success" ><i class="fas fa-save"></i> Kemaskini Pencapaian</button>   
                                  {{-- <button type="button" class="btn btn-cancel" ><a href="{{ route('staff_master') }}"><i class="fas fa-window-close"></i> Batal</a></button>                         --}}
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
    <script src="{{asset('js/master.js')}}"></script>

  </body>
  {{-- @endsection --}}