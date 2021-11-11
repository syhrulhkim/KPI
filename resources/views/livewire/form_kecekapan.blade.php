{{-- @extends('staff/layout/staff_template') --}}
{{-- @section('title','Staff | Pencapaian') --}}

{{-- @section('content') --}}
<div>
  @extends('layouts.app')
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


             <!-- Pencapaian Content  -->

            <div class="col-md-auto">
                <div class="card shadow rounded">
                    <div class="card-header font-weight-bold" style="text-transform:uppercase" >Borang Pencapaian</div>
  
                    <div class="col-sm-auto p-3">
                        <div class="card">
                            <div class="m-3">
  
                            <form action="{{ url('employee/update/kecekapan/'.$kecekapan->id) }}" method="post">  
                                    @csrf
  
                                <?php
                                    // set start and end year range
                                    $yearArray = range(2021, 2050);
                                ?>
                                    <!-- List Dropdown -->
                                  {{-- <label for="tahun" class="col-form-label font-weight-bold" style="font-size: 1rem;">Tahun :</label>
                                  <input class="font-weight-bold btn-sm btn btn-outline-secondary ml-2" style="width: 100px" id="tahun" name="tahun" value="{{ $kecekapan->tahun }}" readonly>

                                  &nbsp;
                                  <label for="bulan" class="col-form-label font-weight-bold" style="font-size: 1rem;">Bulan :</label>
                                  <input class="font-weight-bold btn-sm btn btn-outline-secondary ml-2" style="width: 100px" id="bulan" name="bulan" value="{{ $kecekapan->bulan }}" readonly> --}}
    
                                
                                <div class="row">
  
                                    <div class="col-sm-4 pt-3 " >
                                        <div class="mb-4">
                                            <label class="font-weight-bold" >Kecekapan Teras</label>
                                            <select  class="form-control form-control-sm" id="kecekapan_teras" name="kecekapan_teras">
                                              <option selected readonly value="{{ $kecekapan->kecekapan_teras }}">{{ $kecekapan->kecekapan_teras }}</option>
                                              {{-- <option value="">N/A</option> --}}
                                              <option value="Kepimpinan Organisasi" >Kepimpinan Organisasi</option>
                                              <option value="Keupayaan Inovatif" >Keupayaan Inovatif</option> 
                                              <option value="Pengurusan Pelanggan" >Pengurusan Pelanggan</option> 
                                              <option value="Pengurusan Pemegang Berkepentingan" >Pengurusan Pemegang Berkepentingan</option>
                                              <option value="Ketangkasan Dalam Organisasi" >Ketangkasan Dalam Organisasi</option>
                                          </select>
                                        </div>
                                      </div>

                                      {{-- <div class="col-sm-4 pt-3 " >
                                        <div class="mb-4">
                                            <label class="font-weight-bold " >Jangkaan Hasil</label>
                                            <input type="text" class="form-control form-control-sm" id="jangkaan_hasil" name="jangkaan_hasil">
                                            <input type="text" class="form-control form-control-sm" id="jangkaan_hasil" name="jangkaan_hasil" value="{{ $kecekapan->jangkaan_hasil }}" >
                                        </div>
                                      </div> --}}
  
                                </div>
                              
                                <div class="row m-auto">
                                
                                
                                  {{-- Score KPI --}}
                                    <table class="table table-bordered sticky-top bg-light bg-gradient text-dark">
                                      <tr>
                                          <th class="w-25" >Gred : 
                                              <input class="font-weight-bold w-50 bg-light btn-sm btn btn-outline-secondary ml-2" id="grade" name="grade" value="{{ $kecekapan->grade }}" readonly>
                                          </th>
                                          <th class="w-25" >Overall Score : 
                                              <input class="font-weight-bold w-50 bg-light btn-sm btn btn-outline-secondary ml-2" id="percentage-total" name="total_score" value="{{ $kecekapan->total_score }}" readonly>
                                          </th>
                                          <th class="w-25" >Total Weightage : 
                                              <input class="font-weight-bold w-50 bg-light btn-sm btn btn-outline-secondary ml-2" id="percentage-weightage" name="weightage" value="{{ $kecekapan->weightage }}" readonly>
                                          </th>
                                      </tr>
                                  </table>
                                  <div class="table-responsive">
                                    <table class="table table-bordered text-center">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th rowspan="2">(%)</th>
                                                <th rowspan="2">Ukuran</th>
                                                <th rowspan="2">Skor Pekerja</th>
                                                <th rowspan="2">Skor Penyelia</th>
                                                <th rowspan="2">Skor Sebenar</th>
                                                {{-- <th rowspan="2">Skor Sebenar</th> --}}
                                            </tr>
                                        </thead>
                                        <tbody>
                                          <tr>

                                            <td class="font-weight-bold border-dark">
                                              <input type="text" maxlength="3" class="input_ukuran w-75" id="peratus" name="peratus" value="{{ $kecekapan->peratus }}" min="0"  >
                                            </td>

                                            <td style="word-break: break-all;" class="border-dark">
                                              <select class="form-select form-select-sm" id="ukuran" name="ukuran">
                                                <option selected readonly value="{{ $kecekapan->ukuran }}">{{ $kecekapan->ukuran }}</option>
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

                                            
                                      
                                            {{-- <td class="font-weight-bold border-dark">
                                              <input type="text" maxlength="4"  class="input_pencapaian w-75" id="ukuran" name="ukuran" onkeyup="masterClac();" value="{{ $kecekapan->ukuran }}" min="0" >
                                            </td> --}}
                                      
                                            <td class="font-weight-bold border-dark">
                                              <input type="text" class="form-control " id="skor_pekerja" name="skor_pekerja" value="{{ $kecekapan->skor_pekerja }}">
                                            </td>

                                            <td class="font-weight-bold border-dark">
                                              <input type="text" class="form-control " id="skor_penyelia" name="skor_penyelia" value="{{ $kecekapan->skor_penyelia }}" readonly>
                                            </td>

                                            {{-- <td class="font-weight-bold border-dark">
                                              <input type="text" maxlength="4" class="input_base w-75" id="skor_penyelia" name="skor_penyelia" onkeyup="masterClac();" value="{{ $kecekapan->skor_penyelia }}" min="0" >
                                            </td> --}}
                                      
                                            <td class="font-weight-bold border-dark">
                                              <input type="text"  class="form-control"  id="skor_sebenar" name="skor_sebenar" value="{{ $kecekapan->skor_sebenar }}" readonly>
                                            </td>


                                          </tr>
                                      </tbody>
                                    </table>
                                </div>    
                                </div>
  
                                <div class="p-3" style="text-align: right">
                                  <button type="submit" class="btn btn-sm btn-success" ><i class="fas fa-save"></i> Kemaskini Pencapaian</button>   
                                  {{-- {{dd('john')}} --}}
                                  <button type="button" class="btn btn-cancel" ><a href="{{ route('create-kecekapan') }}"><i class="fas fa-window-close"></i> Batal</a></button>                        
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
  {{-- @endsection --}}
</div>