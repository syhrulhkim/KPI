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
                <div class="card-header font-weight-bold" style="text-transform:uppercase" >KAD SKOR 2021 - Kecekapan Teras</div>

                <div class="col-sm-auto p-3">
                    <div class="card">
                        <div class="m-3">

                        <form action="{{ route('kecekapan_save') }}" method="post">  
                                @csrf

                            <?php
                                // set start and end year range
                                $yearArray = range(2021, 2050);
                            ?>              

                            <div class="row">

                                {{-- <div class="col-sm-4 pt-3 " >
                                  <div class="mb-4">
                                      <label class="font-weight-bold" >Kecekapan Teras</label><br>
                                      <select  class="form-control-sm" id="kecekapan_teras" name="kecekapan_teras">
                                        <option selected value="">-- Sila Pilih --</option>
                                        <option value="Kepimpinan Organisasi" >Kepimpinan Organisasi</option>
                                        <option value="Keupayaan Inovatif" >Keupayaan Inovatif</option> 
                                        <option value="Pengurusan Pelanggan" >Pengurusan Pelanggan</option> 
                                        <option value="Pengurusan Pemegang Berkepentingan" >Pengurusan Pemegang Berkepentingan</option>
                                        <option value="Ketangkasan Dalam Organisasi" >Ketangkasan Dalam Organisasi</option>
                                    </select>
                                  </div>
                                </div> --}}

                                <div class="col-sm-4 pt-3 " >
                                  <div class="mb-4" class="@error('kecekapan_teras') border border-danger rounded-3 @enderror">
                                        <label class="font-weight-bold" >Kecekapan Teras</label><br>
                                        <td style="word-break: break-all;" class="border-dark">
                                          <select class="form-select form-select-sm" id="kecekapan_teras" name="kecekapan_teras">
                                            <option selected value="">-- Sila Pilih --</option>
                                            <option value="Kepimpinan Organisasi" >Kepimpinan Organisasi</option>
                                            <option value="Keupayaan Inovatif" >Keupayaan Inovatif</option> 
                                            <option value="Pengurusan Pelanggan" >Pengurusan Pelanggan</option> 
                                            <option value="Pengurusan Pemegang Berkepentingan" >Pengurusan Pemegang Berkepentingan</option>
                                            <option value="Ketangkasan Dalam Organisasi" >Ketangkasan Dalam Organisasi</option>
                                          </select>
                                        </td>
                                    </select>
                                    @error('kecekapan_teras') <div class="text-danger">{{ $message }}</div> @enderror
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
                                            <input type="text" maxlength="1"  class="form-control" id="skor_pekerja" name="skor_pekerja" onkeyup="masterClac();" min="0" >
                                            @error('skor_pekerja') <div class="text-danger">{{ $message }}</div> @enderror
                                          </td>
                                          @else
                                          @endif

                                          @if ((Auth::user()->role == "manager") || (Auth::user()->role == "admin"))
                                          <td style="word-break: break-all;" class="border-dark" class="@error('skor_penyelia') border border-danger rounded-3 @enderror">
                                            <input type="text" maxlength="1"  class="form-control" id="skor_penyelia" name="skor_penyelia" onkeyup="masterClac();" min="0" >
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

                            </div>    
                              <caption>**pastikan maklumat profil lengkap sebelum hantar</caption><br>
                              <caption>**maklumat pencapaian ini terus hantar ke pengurus jabatan</caption>
                            </div>

                            <div class="p-3" style="text-align: right">
                              <button type="submit" class="btn btn-sm btn-success" ><i class="fas fa-save"></i> Save</button>                           
                            </div>

                          </div>

                      </form>

                    </div>
                </div>
            </div>     
        </div>

        <br>
          
        {{-- <div class="card m-3">
          @if (Auth::user()->role == "employee")

          <div class="card-header font-weight-bold" style="text-transform:uppercase" >Maklumat Pencapaian</div>
          <div class="table-responsive">
            <table  class="table table-bordered text-center">
                <thead class="thead-dark">
                  <tr>
                    <th>No.</th>
                    <th >Kecekapan Teras</th>
                    <th >Jangkaan Hasil</th>
                    <th >%</th>
                    <th >Ukuran</th>
                    <th >Skor Pekerja</th>
                    <th >Skor Penyelia</th>
                    <th >Skor Sebenar</th>
                    <th class="w-25" ><i class="fas fa-cogs"></i></th>
                  </tr>
                </thead>
                <tbody >
                    <!-- Display Body --> 
                    @php($i = 1)
                    @foreach ($kecekapan as $kecekapans)
                      
                    <tr class="font-weight-bold">
                      
                        <td class="border-dark">{{ $i++  }}</td>
                        <td class="border-dark">{{ $kecekapans -> kecekapan_teras }}</td>
                        <td class="border-dark">{{ $kecekapans -> jangkaan_hasil }}</td>
                        <td class="border-dark">{{  '20%' }}</td>
                        <td class="border-dark">{{ 'Percentage (%)' }}</td>
                        <td class="border-dark">{{ $kecekapans -> skor_pekerja }}</td>
                        <td class="border-dark">{{ $kecekapans -> skor_penyelia }}</td>
                        <td class="border-dark">{{ $kecekapans -> skor_sebenar }}</td>

                        <td class="border-dark">
                          <a href="{{ url('employee/edit/kecekapan/'.$kecekapans->id) }}" class="btn btn-primary btn-sm" style="font-size: 10px" role="button"><i class="fa fa-edit"></i>&nbsp;Pencapaian</a>
                        
                          <a href="{{ url('employee/delete/kecekapan/'.$kecekapans->id) }}" class="btn btn-danger btn-sm"  style="font-size: 10px" role="button"><i class="fa fa-trash"></i></a>
                        </td>
                        
                    </tr>

                    @endforeach
                </tbody> 
            </table>
          </div>
          @else
          @endif
        </div>
       
        <div class="card m-3">
          @if (Auth::user()->role == "manager")

          <div class="card-header font-weight-bold" style="text-transform:uppercase" >Maklumat Pencapaian</div>
          <div class="table-responsive">
            <table  class="table table-bordered text-center">
                <thead class="thead-dark">
                  <tr>
                    <th>No.</th>
                    <th >Kecekapan Teras</th>
                    <th >Jangkaan Hasil</th>
                    <th >%</th>
                    <th >Ukuran</th>
                    <th >Skor Pekerja</th>
                    <th >Skor Penyelia</th>
                    <th >Skor Sebenar</th>

                    <th class="w-25" ><i class="fas fa-cogs"></i></th>
                  </tr>
                </thead>
                <tbody >
                    <!-- Display Body --> 
                   
                    @php($i = 1)
                    @foreach ($users as $userss)
                      
                    <tr class="font-weight-bold">
                        <td class="border-dark">{{ $i++  }}</td>
                        <td class="border-dark">{{ $userss -> kecekapan_teras }}</td>

                        <td class="border-dark">{{ $userss -> jangkaan_hasil }}</td>
                        <td class="border-dark">{{  '20%' }}</td>
                        <td class="border-dark">{{ 'Percentage (%)' }}</td>
                        <td class="border-dark">{{ $userss -> skor_pekerja }}</td>
                        <td class="border-dark">{{ $userss -> skor_penyelia }}</td>
                        <td class="border-dark">{{ $userss -> skor_sebenar }}</td>

                        <td class="border-dark">
                          <a href="{{ url('employee/edit/kecekapan/'.$userss->id) }}" class="btn btn-primary btn-sm" style="font-size: 10px" role="button"><i class="fa fa-edit"></i>&nbsp;Pencapaian</a>
                         
                          <a href="{{ url('employee/delete/kecekapan/'.$userss->id) }}" class="btn btn-danger btn-sm"  style="font-size: 10px" role="button"><i class="fa fa-trash"></i></a>
                        </td>
                        
                    </tr>

                    @endforeach
                    
                </tbody> 
            </table>
          </div>
          @else
          @endif
        </div> --}}

        @if (Auth::user()->role == "employee")
        <div class="container-fluid py-4">
          <div class="row">
            <div class="col-12">
              <div class="card mb-4">
                <div class="card-header pb-0">
                  {{-- <h6>KAD SKOR 2021 - KPI</h6> --}}
                  <h6>Maklumat Pencapaian</h6>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                  <div class="table-responsive p-0">
                    <table class="table align-items-center mb-0">
                      <thead>
                        <tr>
                          <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                          <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Kecekapan Teras</th>
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
                        @foreach ($kecekapan as $key => $kecekapans)
                          <tr>
                            <td>    
                              <div class="d-flex px-2 py-1">
                                <div class="d-flex flex-column justify-content-center">
                                  <p class="mb-0 text-sm" value="{{$key + 1}}">{{$key + 1}}</p>
                                </div>
                              </div>
                            </td>
                            <td>
                              <p class="text-xs font-weight-bold mb-0" value="{{ $kecekapans -> kecekapan_teras }}">{{ $kecekapans -> kecekapan_teras }}</p>
                            </td>

                            @if ($kecekapans -> kecekapan_teras == "Kepimpinan Organisasi")
                            <td class="text-xs font-weight-bold mb-0">
                              <span class="text-secondary text-xs font-weight-bold" value="">Pekerja yang sedar dan menyesuaikan diri dengan strategi organisasi
                                <br>
                                Pemimpin yang bertindak selaras dengan strategi organisasi
                                <br>
                                Pengurus yang dapat mengembangkan dan memperkasakan pekerja bawahannya
                                <br>
                                Budaya organisasi yang mencerminkan nilainya
                                <br>
                                Pemimpin yang bertindak selaras dengan strategi organisasi</span>
                            </td>
                            @else
                            @endif 
  
                            @if ($kecekapans -> kecekapan_teras == "Keupayaan Inovatif")
                            <td class="text-xs font-weight-bold mb-0">
                              <span class="text-secondary text-xs font-weight-bold" value="">Pekerja yang berupaya memberi idea dan memberi penyelesaian untuk menyelesaikan masalah
                                <br>
                                Amalan kerja yang dikemas kini lebih sesuai dengan jangkaan masa kini
                                <br>
                                Penerimaan untuk organisasi, dan semua bahagiannya, perlu berubah dan terus meningkat
                                <br>
                                Pemimpin yang bertindak selaras dengan strategi organisasi</span>
                            </td>
                            @else
                            @endif 
  
                            @if ($kecekapans -> kecekapan_teras == "Pengurusan Pelanggan")
                            <td class="text-xs font-weight-bold mb-0">
                              <span class="text-secondary text-xs font-weight-bold" value="">Amalan organisasi yang lebih sesuai dengan keperluan pelanggan moden
                                <br>
                                Pekerja yang memahami dan bertindak mengikut kehendak pelanggan tepat pada masanya
                                <br>
                                Penciptaan produk dan perkhidmatan masa depan yang lebih mencerminkan keperluan pelanggan
                                <br>
                                Pemimpin yang bertindak selaras dengan strategi organisasi</span>
                            </td>
                            @else
                            @endif 
  
                            @if ($kecekapans -> kecekapan_teras == "Pengurusan Pemegang Berkepentingan")
                            <td class="text-xs font-weight-bold mb-0">
                              <span class="text-secondary text-xs font-weight-bold" value="">Pekerja yang lebih empati dengan pihak berkepentingan mereka
                                <br>
                                Pembinaan hubungan positif dengan pihak berkepentingan
                                <br>
                                Pembentukan perkongsian strategik yang membantu mencapai objektif organisasi
                                <br>
                                Pengurus yang mendorong pekerja bawahan mereka membina rangkaian profesional mereka sendiri
                                <br>
                                Pemimpin yang bertindak selaras dengan strategi organisasi</span>
                            </td>
                            @else
                            @endif 
  
                            @if ($kecekapans -> kecekapan_teras == "Ketangkasan Dalam Organisasi")
                            <td class="text-xs font-weight-bold mb-0">
                              <span class="text-secondary text-xs font-weight-bold" value="">Pekerja yang berpengetahuan dan serba boleh
                                <br>
                                Penghargaan dan penerapan budaya bimbingan dalam organisasi
                                <br>
                                Amalan organisasi yang boleh menyesuaikan diri dengan masalah di pasaran
                                <br>
                                Organisasi yang menekankan dan mendorong pembelajaran dan perkembangan berterusan
                                <br>
                                Pemimpin yang bertindak selaras dengan strategi organisasi</span>
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
                              <span class="text-secondary text-xs font-weight-bold" value="{{ $kecekapans -> skor_pekerja }}}">{{ $kecekapans -> skor_pekerja }}</span>
                            </td>
                            <td class="align-middle text-center">
                              <span class="text-secondary text-xs font-weight-bold" value="{{ $kecekapans -> skor_penyelia }}">{{ $kecekapans -> skor_penyelia }}</span>
                            </td>
                            <td class="align-middle text-center">
                              <span class="text-secondary text-xs font-weight-bold" value="{{ $kecekapans -> skor_sebenar }}">{{ $kecekapans -> skor_sebenar }}</span>
                            </td>
                            <td class="align-middle text-center">
                              <a href="{{ url('employee/edit/kecekapan/'.$kecekapans->id) }}" class="btn btn-primary btn-sm" style="font-size: 10px" role="button"><i class="fa fa-edit"></i>&nbsp;Edit</a>
                            </td>
                            <td class="align-middle text-center">
                              <a href="{{ url('employee/delete/kecekapan/'.$kecekapans->id) }}" class="btn btn-danger btn-sm"  style="font-size: 10px" role="button"><i class="fa fa-trash"></i>&nbsp;Delete</a>
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
                  <h6>Maklumat Pencapaian</h6>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                  <div class="table-responsive p-0">
                    <table class="table align-items-center mb-0">
                      <thead>
                        <tr>
                          <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                          <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Kecekapan Teras</th>
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
                              <p class="text-xs font-weight-bold mb-0" value="{{ $userss -> kecekapan_teras }}">{{ $userss -> kecekapan_teras }}</p>
                            </td>

                            @if ($userss -> kecekapan_teras == "Kepimpinan Organisasi")
                            <td class="text-xs font-weight-bold mb-0">
                              <span class="text-secondary text-xs font-weight-bold" value="">Pekerja yang sedar dan menyesuaikan diri dengan strategi organisasi
                                <br>
                                Pemimpin yang bertindak selaras dengan strategi organisasi
                                <br>
                                Pengurus yang dapat mengembangkan dan memperkasakan pekerja bawahannya
                                <br>
                                Budaya organisasi yang mencerminkan nilainya
                                <br>
                                Pemimpin yang bertindak selaras dengan strategi organisasi</span>
                            </td>
                            @else
                            @endif 
  
                            @if ($userss -> kecekapan_teras == "Keupayaan Inovatif")
                            <td class="text-xs font-weight-bold mb-0">
                              <span class="text-secondary text-xs font-weight-bold" value="">Pekerja yang berupaya memberi idea dan memberi penyelesaian untuk menyelesaikan masalah
                                <br>
                                Amalan kerja yang dikemas kini lebih sesuai dengan jangkaan masa kini
                                <br>
                                Penerimaan untuk organisasi, dan semua bahagiannya, perlu berubah dan terus meningkat
                                <br>
                                Pemimpin yang bertindak selaras dengan strategi organisasi</span>
                            </td>
                            @else
                            @endif 
  
                            @if ($userss -> kecekapan_teras == "Pengurusan Pelanggan")
                            <td class="text-xs font-weight-bold mb-0">
                              <span class="text-secondary text-xs font-weight-bold" value="">Amalan organisasi yang lebih sesuai dengan keperluan pelanggan moden
                                <br>
                                Pekerja yang memahami dan bertindak mengikut kehendak pelanggan tepat pada masanya
                                <br>
                                Penciptaan produk dan perkhidmatan masa depan yang lebih mencerminkan keperluan pelanggan
                                <br>
                                Pemimpin yang bertindak selaras dengan strategi organisasi</span>
                            </td>
                            @else
                            @endif 
  
                            @if ($userss -> kecekapan_teras == "Pengurusan Pemegang Berkepentingan")
                            <td class="text-xs font-weight-bold mb-0">
                              <span class="text-secondary text-xs font-weight-bold" value="">Pekerja yang lebih empati dengan pihak berkepentingan mereka
                                <br>
                                Pembinaan hubungan positif dengan pihak berkepentingan
                                <br>
                                Pembentukan perkongsian strategik yang membantu mencapai objektif organisasi
                                <br>
                                Pengurus yang mendorong pekerja bawahan mereka membina rangkaian profesional mereka sendiri
                                <br>
                                Pemimpin yang bertindak selaras dengan strategi organisasi</span>
                            </td>
                            @else
                            @endif 
  
                            @if ($userss -> kecekapan_teras == "Ketangkasan Dalam Organisasi")
                            <td class="text-xs font-weight-bold mb-0">
                              <span class="text-secondary text-xs font-weight-bold" value="">Pekerja yang berpengetahuan dan serba boleh
                                <br>
                                Penghargaan dan penerapan budaya bimbingan dalam organisasi
                                <br>
                                Amalan organisasi yang boleh menyesuaikan diri dengan masalah di pasaran
                                <br>
                                Organisasi yang menekankan dan mendorong pembelajaran dan perkembangan berterusan
                                <br>
                                Pemimpin yang bertindak selaras dengan strategi organisasi</span>
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
                              <span class="text-secondary text-xs font-weight-bold" value="{{ $userss -> skor_pekerja }}}">{{ $userss -> skor_pekerja }}</span>
                            </td>
                            <td class="align-middle text-center">
                              <span class="text-secondary text-xs font-weight-bold" value="{{ $userss -> skor_penyelia }}">{{ $userss -> skor_penyelia }}</span>
                            </td>
                            <td class="align-middle text-center">
                              <span class="text-secondary text-xs font-weight-bold" value="{{ $userss -> skor_sebenar }}">{{ $userss -> skor_sebenar }}</span>
                            </td>
                            <td class="align-middle text-center">
                              <a href="{{ url('employee/edit/kecekapan/'.$userss->id) }}" class="btn btn-primary btn-sm" style="font-size: 10px" role="button"><i class="fa fa-edit"></i>&nbsp;Edit</a>
                            </td>
                            <td class="align-middle text-center">
                              <a href="{{ url('employee/delete/kecekapan/'.$userss->id) }}" class="btn btn-danger btn-sm"  style="font-size: 10px" role="button"><i class="fa fa-trash"></i>&nbsp;Delete</a>
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

 <!-- Master Pencapaian JS -->
<script src="{{asset('assets/js/kecekapan.js')}}"></script>
{{-- <script src="{{asset('assets/js/master.js')}}"></script> --}}

</body>
{{-- @endsection --}}