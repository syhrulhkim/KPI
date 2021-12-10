@section('content')
@extends('layouts.app')
<div>
{{-- @extends('staff/layout/staff_template') --}}
{{-- @section('title','Staff | Master') --}}

{{-- @section('content') --}}

<body>
  <div class="wrapper">
      <!-- Page Content  -->
      <div id="content">
          {{-- <nav class="navbar navbar-expand-lg navbar-light bg-light">
              <div class="container-fluid ">
                 <!-- Board Score -->
                  <button type="button" id="sidebarCollapse" class="btn btn-dark">
                      <i class="fas fa-align-left"></i>
                      <span>Menu</span>
                  </button>
                   <!-- User -->
                  <ul class="nav navbar-nav ml-4">
                    <li class="nav-item active">
                      <a class="nav-link font-weight-bold" style="text-transform:uppercase" >{{ Auth::user()->name }}</a>
                    </li>
                  </ul>
              </div>
          </nav> --}}
          
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

          <!-- Pencapaian Content  -->
          <div class="col-md-auto">
            <div class="card shadow rounded">
                {{-- <div class="card-header font-weight-bold" style="text-transform:uppercase" >KAD SKOR 2021 - Nilai Teras</div> --}}
                <div class="card-header pb-0">
                  <h6>KAD SKOR 2021 - NILAI TERAS</h6>
                </div>
                <div class="col-sm-auto p-3">
                    <div class="card">
                        <div class="m-3">
                        {{-- <form action="{{ route('nilai_save') }}" method="post">   --}}
                          <form action="{{ url('employee/save/nilai/'.$year.'/'.$month) }}" method="post">
                                @csrf
                            <?php
                                // set start and end year range
                                $yearArray = range(2021, 2050);
                            ?>              
                            <div class="row">

                                {{-- <div class="col-sm-4 pt-3 " >
                                  <div class="mb-4">
                                      <label class="font-weight-bold" >Nilai Teras</label><br>
                                      <select  class="form-control-sm" id="nilai_teras" name="nilai_teras">
                                        <option selected value="">-- Please Choose --</option>
                                        <option value="Kepimpinan " >Kepimpinan </option>
                                        <option value="Perkembangan" >Perkembangan</option> 
                                        <option value="Keputusan" >Keputusan</option> 
                                        <option value="Sumbangan" >Sumbangan</option>
                                        <option value="Rohani" >Rohani</option>
                                        <option value="Keluarga" >Keluarga</option>
                                    </select>
                                  </div>
                                </div> --}}

                                <div class="col-sm-4 pt-3 " >
                                  <div class="mb-4" class="@error('nilai_teras') border border-danger rounded-3 @enderror">
                                        <label class="font-weight-bold" >Nilai Teras</label><br>
                                        <td style="word-break: break-all;" class="border-dark">
                                          <select class="form-select form-select-sm" id="nilai_teras" name="nilai_teras">
                                            <option selected value="">-- Please Choose --</option>
                                            <option value="Kepimpinan " >Kepimpinan </option>
                                            <option value="Perkembangan" >Perkembangan</option> 
                                            <option value="Keputusan" >Keputusan</option> 
                                            <option value="Sumbangan" >Sumbangan</option>
                                            <option value="Rohani" >Rohani</option>
                                            <option value="Keluarga" >Keluarga</option>
                                          </select>
                                        </td>
                                    </select>
                                    @error('nilai_teras') <div class="text-danger">{{ $message }}</div> @enderror
                                  </div>
                                </div>

                                {{-- <div class="col-sm-4 pt-3 " >
                                  <div class="mb-4">
                                      <label class="font-weight-bold " >Jangkaan Hasil</label>
                                      <input type="text" class="form-control form-control-sm" id="jangkaan_hasil" name="jangkaan_hasil">
                                  </div>
                                </div> --}}
                                {{-- <div class="col-sm-4 pt-3 " >
                                  <div class="mb-4">
                                      <label class="font-weight-bold " >Objektif KPI</label>
                                      <input type="text" class="form-control form-control-sm" id="objektif" name="objektif">
                                  </div>
                                </div>   --}}
                                
                            </div>
                            <div class="row m-auto">
                            
                              {{-- Score KPI --}}
                                {{-- <table class="table table-bordered sticky-top bg-light bg-gradient text-dark">
                                  <tr>
                                      <th class="w-25" >Gred : 
                                          <input class="font-weight-bold w-50 btn-sm btn btn-outline-secondary ml-2" id="grade" name="grade" value="NO GRADE" readonly>
                                      </th>
                                      <th class="w-25" >Total Score : 
                                          <input class="font-weight-bold w-50 bg-light btn-sm btn btn-outline-secondary ml-2" id="percentage-total" name="total_score" value="0" readonly>
                                      </th>
                                      <th class="w-25" >Total Weightage : 
                                          <input class="font-weight-bold w-50 bg-light btn-sm btn btn-outline-secondary ml-2" id="percentage-weightage" name="weightage" readonly>
                                      </th>
                                  </tr>
                              </table> --}}

                              <div class="table-responsive">
                                <table class="table table-bordered text-center">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th rowspan="2">(%)</th>
                                            <th rowspan="2">Ukuran</th>
                                            {{-- <th colspan="3">KPI Targets</th> --}}
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

                                          {{-- <td class="font-weight-bold border-dark"> --}}
                                            {{-- <input type="text" maxlength="3" class="input_ukuran w-75" id="peratus" name="peratus" onkeyup="masterClac();" min="0"  > --}}
                                            {{-- <input class="font-weight-bold w-500 btn-sm btn btn-outline-secondary ml-2" id="peratus" name="peratus" value="20" onkeyup="masterClac();" min="0" selected readonly>
                                          </td>

                                          <td class="font-weight-bold border-dark">
                                            <input class="font-weight-bold w-500 btn-sm btn btn-outline-secondary ml-2" id="ukuran" name="ukuran" value="Percentage" selected readonly>
                                          </td> --}}

                                          <td class="font-weight-bold border-dark">
                                            {{-- <input type="text" maxlength="3" class="input_ukuran w-75" id="peratus" name="peratus" onkeyup="masterClac();" min="0"  > --}}
                                            <input type="text"  class="form-control" id="peratus" name="peratus" value="20" onkeyup="masterClac();" min="0" selected readonly>
                                          </td>

                                          <td class="font-weight-bold border-dark">
                                            <input type="text"  class="form-control" id="ukuran" name="ukuran" value="Percentage" selected readonly>
                                          </td>

                                          {{-- <td style="word-break: break-all;" class="border-dark">
                                            <select class="form-select form-select-sm" id="ukuran" name="ukuran">
                                              <option selected disabled value=""></option>
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
                                              <option value="Percentage" selected>Percentage </option>
                                            </select>
                                          </td> --}}

                                          {{-- <td class="font-weight-bold border-dark">
                                            <input type="text" maxlength="4" class="input_threshold w-75" id="threshold" name="threshold" onkeyup="masterClac();" min="0" >
                                          </td>
                                    
                                          <td class="font-weight-bold border-dark">
                                            <input type="text" maxlength="4" class="input_base w-75" id="base" name="base" onkeyup="masterClac();" min="0" >
                                          </td>
                                    
                                          <td class="font-weight-bold border-dark">
                                            <input type="text" maxlength="4" class="input_stretch w-75" id="stretch" name="stretch" onkeyup="masterClac();" min="0" >
                                          </td> --}}
                                          
                                          @if ((Auth::user()->role == "employee") || (Auth::user()->role == "admin"))
                                          <td style="word-break: break-all;" class="border-dark" class="@error('skor_pekerja') border border-danger rounded-3 @enderror">
                                            <input type="text" pattern="[0-4]+" maxlength="1" class="form-control" id="skor_pekerja" name="skor_pekerja" onkeyup="masterClac();" min="0" >
                                            @error('skor_pekerja') <div class="text-danger">{{ $message }}</div> @enderror
                                          </td>
                                          @else
                                          @endif

                                          @if ((Auth::user()->role == "manager") || (Auth::user()->role == "admin"))
                                          <td style="word-break: break-all;" class="border-dark" class="@error('skor_penyelia') border border-danger rounded-3 @enderror">
                                            <input type="text" pattern="[0-4]+" maxlength="1" class="form-control" id="skor_penyelia" name="skor_penyelia" onkeyup="masterClac();" min="0" >
                                            @error('skor_penyelia') <div class="text-danger">{{ $message }}</div> @enderror
                                          </td>
                                          @else
                                          @endif

                                          <td class="font-weight-bold border-dark">
                                            <input type="text"  class="form-control"  id="skor_sebenar" name="skor_sebenar" value="0" readonly>
                                          </td>

                                        </tr>
                                    </tbody>
                                </table>

                            <div class="p-3" style="text-align: right">
                              {{-- <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                                Save
                            </button>                        --}}
                            <button type="submit" class="btn btn-success btn-sm" style="font-size: 10px"><i class="fas fa-save"></i> Save</button>
                            </div>
                          </div>
                      </form>
                    </div>
                </div>
            </div>     
        </div>

        <br>
          
        @if (Auth::user()->role == "employee")
        <div class="container-fluid py-4">
          <div class="row">
            <div class="col-12">
              <div class="card mb-4">
                <div class="card-header pb-0">
                  {{-- <h6>KAD SKOR 2021 - KPI</h6> --}}
                  <h6>Performance Information</h6>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                  <div class="table-responsive p-0">
                    <table class="table align-items-center mb-0">
                      <thead>
                        <tr>
                          <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                          <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Nilai Teras</th>
                          <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Jangkaan Hasil</th>
                          <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">%</th>
                          <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Ukuran</th>
                          <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Skor Pekerja</th>
                          <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Skor Penyelia</th>
                          <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Skor Sebenar</th>
                          <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Edit</th>
                          <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Delete</th>
                        </tr>
                      </thead>
                      <tbody>
                        @php($i = 1)
                        @foreach ($nilai as $key => $nilais)
                          <tr>
                            <td>    
                              <div class="d-flex px-2 py-1">
                                <div class="d-flex flex-column justify-content-center">
                                  <p class="mb-0 text-sm" value="{{$key + 1}}">{{$key + 1}}</p>
                                </div>
                              </div>
                            </td>
                            <td>
                              <p class="text-xs font-weight-bold mb-0" value="{{ $nilais -> nilai_teras }}">{{ $nilais -> nilai_teras }}</p>
                            </td>

                            @if ($nilais -> nilai_teras == "Kepimpinan")
                            <td class="text-xs font-weight-bold mb-0">
                              <span class="text-secondary text-xs font-weight-bold" value="">
                                1. Kami adalah pemimpin yang bertanggungjawab.
                                <br>
                                2. Kami memberikan contoh yang baik.
                                <br>
                                3. Kami melaksanakan setiap apa yang diperkatakan.
                                <br>
                                4. Kami menjadi inspirasi untuk berubah lebih baik.</span>
                            </td>
                            @else
                            @endif

                            @if ($nilais -> nilai_teras == "Perkembangan")
                            <td class="text-xs font-weight-bold mb-0">
                              <span class="text-secondary text-xs font-weight-bold" value="">
                                1. Kami ambil peduli dengan peningkatan hidup sendiri.
                                <br>
                                2. Kami sentiasa menambah dan meningkatkan ilmu pengetahuan.
                                <br>
                                3. Kami memupuk sikap ingin sentiasa berjaya.
                                <br>
                                4. Kami sentiasa memperbaiki dan memajukan diri di setiap saat.</span>
                            </td>
                            @else
                            @endif

                            @if ($nilais -> nilai_teras == "Keputusan")
                            <td class="text-xs font-weight-bold mb-0">
                              <span class="text-secondary text-xs font-weight-bold" value="">
                                1. Kami membantu menggilap potensi orang lain.
                                <br>
                                2. Kami memastikan pelanggan mencapai keputusan cemerlang.
                                <br>
                                3. Kami komited dengan hasil usaha yang dilakukan.
                                <br>
                                4. Kami berusaha untuk memberikan yang terbaik.</span>
                            </td>
                            @else
                            @endif

                            @if ($nilais -> nilai_teras == "Sumbangan")
                            <td class="text-xs font-weight-bold mb-0">
                              <span class="text-secondary text-xs font-weight-bold" value="">
                                1. Kami menghulurkan bantuan dengan sepenuh semangat dan jiwa kami.
                                <br>
                                2. Kami membantu mengatasi kelemahan dan membina kekuatan pelanggan.
                                <br>
                                3. Kami komited untuk memberi manfaat dan menyebarkan kebaikan.
                                <br>
                                4. Kami bertanggungjawab dengan orang sekeliling dan persekitaran.</span>
                            </td>
                            @else
                            @endif

                            @if ($nilais -> nilai_teras == "Rohani")
                            <td class="text-xs font-weight-bold mb-0">
                              <span class="text-secondary text-xs font-weight-bold" value="">
                                1. Kami adalah hamba Allah.
                                <br>
                                2. Kami membantu orang untuk mendapat kehidupan yang lebih baik.
                                <br>
                                3. Kami bangkit berjaya dengan memajukan orang lain.
                                <br>
                                4. Kami sentiasa beriman dan percaya dengan Qada’ dan Qadar.</span>
                            </td>
                            @else
                            @endif

                            @if ($nilais -> nilai_teras == "Keluarga")
                            <td class="text-xs font-weight-bold mb-0">
                              <span class="text-secondary text-xs font-weight-bold" value="">
                                1. Kami sangat menyayangi keluarga kami.
                                <br>
                                2. Kami berusaha untuk berikan yang terbaik kepada keluarga kami.
                                <br>
                                3. Kami tidak akan mengabaikan keluarga kami.
                                <br>
                                4. Kami percaya kebahagiaan keluarga adalah kebahagiaan kami.</span>
                            </td>
                            @else
                            @endif

                            <td class="align-middle text-center">
                              <span class="text-secondary text-xs font-weight-bold" value="{{ '20%' }}">{{ '20%' }}</span>
                            </td>
                            <td class="align-middle text-center">
                              <span class="text-secondary text-xs font-weight-bold" value="{{ 'Percentage (%)' }}">{{ 'Percentage (%)' }}</span>
                            </td>
                            <td class="align-middle text-center">
                              <span class="text-secondary text-xs font-weight-bold" value="{{ $nilais -> skor_pekerja }}}">{{ $nilais -> skor_pekerja }}</span>
                            </td>
                            <td class="align-middle text-center">
                              <span class="text-secondary text-xs font-weight-bold" value="{{ $nilais -> skor_penyelia }}">{{ $nilais -> skor_penyelia }}</span>
                            </td>
                            <td class="align-middle text-center">
                              <span class="text-secondary text-xs font-weight-bold" value="{{ $nilais -> skor_sebenar }}">{{ $nilais -> skor_sebenar }}</span>
                            </td>
                            <td class="align-middle text-center">
                              <a href="{{ url('employee/edit/nilai/'.$nilais->id.'/'.$date_id.'/'.$user_id.'/'.$year.'/'.$month) }}" class="btn btn-dark btn-sm" style="font-size: 10px" role="button"><i class="fa fa-edit"></i>&nbsp;Edit</a>
                            </td>

                            {{-- <td class="align-middle text-center">
                              <a href="{{ url('employee/delete/nilai/'.$nilais->id) }}" class="btn btn-danger btn-sm"  style="font-size: 10px" role="button"><i class="fa fa-trash"></i>&nbsp;Delete</a>
                            </td> --}}

                            <td style="border:none">
                              <button type="button" wire:click="selectItem({{$nilais->id}} , 'delete' )" class="btn btn-sm waves-effect waves-light btn-danger data-delete" style="font-size: 10px" data-form="{{$nilais->id}}"><i class="fas fa-trash-alt"></i>&nbsp;Delete</button>
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
        @else
        @endif 

        @if (Auth::user()->role == "manager")
        <div class="container-fluid py-4">
          <div class="row">
            <div class="col-12">
              <div class="card mb-4">
                <div class="card-header pb-0">
                  {{-- <h6>KAD SKOR 2021 - KPI</h6> --}}
                  <h6>Performance Information</h6>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                  <div class="table-responsive p-0">
                    <table class="table align-items-center mb-0">
                      <thead>
                        <tr>
                          <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                          <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Nilai Teras</th>
                          <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Jangkaan Hasil</th>
                          <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">%</th>
                          <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Ukuran</th>
                          <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Skor Pekerja</th>
                          <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Skor Penyelia</th>
                          <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Skor Sebenar</th>
                          <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Edit</th>
                          <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Delete</th>
                        </tr>
                      </thead>
                      <tbody>
                        @php($i = 1)
                        @foreach ($users as $key => $userss)
                          <tr>
                            <td>    
                              <div class="d-flex px-2 py-1">
                                <div class="d-flex flex-column justify-content-center">
                                  <p class="mb-0 text-sm" value="{{$key + 1}}">{{$key + 1}}</p>
                                </div>
                              </div>
                            </td>
                            <td>
                              <p class="text-xs font-weight-bold mb-0" value="{{ $userss -> nilai_teras }}">{{ $userss -> nilai_teras }}</p>
                            </td>
                            
                            @if ($userss -> nilai_teras == "Kepimpinan")
                            <td class="text-xs font-weight-bold mb-0">
                              <span class="text-secondary text-xs font-weight-bold" value="">
                                1. Kami adalah pemimpin yang bertanggungjawab.
                                <br>
                                2. Kami memberikan contoh yang baik.
                                <br>
                                3. Kami melaksanakan setiap apa yang diperkatakan.
                                <br>
                                4. Kami menjadi inspirasi untuk berubah lebih baik.</span>
                            </td>
                            @else
                            @endif
  
                            @if ($userss -> nilai_teras == "Perkembangan")
                            <td class="text-xs font-weight-bold mb-0">
                              <span class="text-secondary text-xs font-weight-bold" value="">
                                1. Kami ambil peduli dengan peningkatan hidup sendiri.
                                <br>
                                2. Kami sentiasa menambah dan meningkatkan ilmu pengetahuan.
                                <br>
                                3. Kami memupuk sikap ingin sentiasa berjaya.
                                <br>
                                4. Kami sentiasa memperbaiki dan memajukan diri di setiap saat.</span>
                            </td>
                            @else
                            @endif
  
                            @if ($userss -> nilai_teras == "Keputusan")
                            <td class="text-xs font-weight-bold mb-0">
                              <span class="text-secondary text-xs font-weight-bold" value="">
                                1. Kami membantu menggilap potensi orang lain.
                                <br>
                                2. Kami memastikan pelanggan mencapai keputusan cemerlang.
                                <br>
                                3. Kami komited dengan hasil usaha yang dilakukan.
                                <br>
                                4. Kami berusaha untuk memberikan yang terbaik.</span>
                            </td>
                            @else
                            @endif
  
                            @if ($userss -> nilai_teras == "Sumbangan")
                            <td class="text-xs font-weight-bold mb-0">
                              <span class="text-secondary text-xs font-weight-bold" value="">
                                1. Kami menghulurkan bantuan dengan sepenuh semangat dan jiwa kami.
                                <br>
                                2. Kami membantu mengatasi kelemahan dan membina kekuatan pelanggan.
                                <br>
                                3. Kami komited untuk memberi manfaat dan menyebarkan kebaikan.
                                <br>
                                4. Kami bertanggungjawab dengan orang sekeliling dan persekitaran.</span>
                            </td>
                            @else
                            @endif
  
                            @if ($userss -> nilai_teras == "Rohani")
                            <td class="text-xs font-weight-bold mb-0">
                              <span class="text-secondary text-xs font-weight-bold" value="">
                                1. Kami adalah hamba Allah.
                                <br>
                                2. Kami membantu orang untuk mendapat kehidupan yang lebih baik.
                                <br>
                                3. Kami bangkit berjaya dengan memajukan orang lain.
                                <br>
                                4. Kami sentiasa beriman dan percaya dengan Qada’ dan Qadar.</span>
                            </td>
                            @else
                            @endif
  
                            @if ($userss -> nilai_teras == "Keluarga")
                            <td class="text-xs font-weight-bold mb-0">
                              <span class="text-secondary text-xs font-weight-bold" value="">
                                1. Kami sangat menyayangi keluarga kami.
                                <br>
                                2. Kami berusaha untuk berikan yang terbaik kepada keluarga kami.
                                <br>
                                3. Kami tidak akan mengabaikan keluarga kami.
                                <br>
                                4. Kami percaya kebahagiaan keluarga adalah kebahagiaan kami.</span>
                            </td>
                            @else
                            @endif

                            <td class="align-middle text-center text-sm">
                              <span class="badge badge-sm bg-gradient-success" value="{{ '20%' }}">{{ '20%' }}</span>
                            </td>
                            <td class="align-middle text-center text-sm">
                              <span class="badge badge-sm bg-gradient-success" value="{{ 'Percentage (%)' }}">{{ 'Percentage (%)' }}</span>
                            </td>
                            <td class="align-middle text-center">
                              <span class="text-secondary text-xs font-weight-bold" value="{{ $userss -> skor_pekerja }}}">{{ $userss -> skor_pekerja }}</span>
                            </td>
                            <td class="align-middle text-center">
                              <span class="text-secondary text-xs font-weight-bold" value="{{ $userss -> skor_penyelia }}">{{ $userss -> skor_penyelia }}</span>
                            </td>
                            <td class="align-middle text-center">
                              <span class="text-secondary text-xs font-weight-bold" value="{{ $userss -> skor_sebenar }}">{{ $userss -> skor_sebenar }}</span>
                            </td>
                            <td class="align-middle text-center">
                              <a href="{{ url('employee/edit/nilai/'.$userss->id.'/'.$date_id.'/'.$user_id.'/'.$year.'/'.$month) }}" class="btn btn-dark btn-sm" style="font-size: 10px" role="button"><i class="fa fa-edit"></i>&nbsp;Edit</a>
                            </td>

                            {{-- <td class="align-middle text-center">
                              <a href="{{ url('employee/delete/nilai/'.$userss->id) }}" class="btn btn-danger btn-sm"  style="font-size: 10px" role="button"><i class="fa fa-trash"></i>&nbsp;Delete</a>
                            </td> --}}
                            
                            <td style="border:none">
                              <button type="button" wire:click="selectItem({{$userss->id}} , 'delete' )" class="btn btn-sm waves-effect waves-light btn-danger data-delete" style="font-size: 10px" data-form="{{$userss->id}}"><i class="fas fa-trash-alt"></i>Delete</button>
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
        @else
        @endif 

      </div>
  </div>
  @push('scripts')
    
  {{-- START SECTION - SCRIPT FOR DELETE BUTTON  --}}
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
  {{-- END SECTION - SCRIPT FOR DELETE BUTTON  --}}
  
  @endpush
 <!-- Master Pencapaian JS -->
<script src="{{asset('assets/js/nilai.js')}}"></script>
{{-- <script src="{{asset('assets/js/master.js')}}"></script> --}}

</body>
{{-- @endsection --}}
</div>
@endsection