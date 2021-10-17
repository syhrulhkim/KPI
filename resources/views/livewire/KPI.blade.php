@extends('layouts/employee_template')
{{-- @section('title','Staff | Master') --}}

{{-- @section('content') --}}

{{-- @foreach ($users as $object)
    {{ $object->role }}
    {{dd($object->role)}}
@endforeach --}}
{{-- {{dd($users)}} --}}
{{-- {{dd($employees)}} --}}
{{-- {{dd(auth()->user())}} --}}
<body>

  <div class="wrapper">
      <!-- Page Content  -->
      <div id="content">

          <nav class="navbar navbar-expand-lg navbar-light bg-light">
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
          </nav>
          
          <br>

          <div class="m-3">

            @if (session('message'))
              <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{ session('message') }}</strong>.
              </div>	
            @endif

            @if (session('weightage'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
              <strong>Sila semak semula butiran pencapaian!</strong>{{ session('weightage') }}.
            </div>	
            @endif

          </div>
          

          <!-- Pencapaian Content  -->
        
          <div class="col-md-auto">
            <div class="card shadow rounded">
                <div class="card-header font-weight-bold" style="text-transform:uppercase" >KAD SKOR 2021 - KPI</div>

                <div class="col-sm-auto p-3">
                    <div class="card">
                        <div class="m-3">

                        <form action="{{ route('kpi_save') }}" method="post">  
                                @csrf

                            <?php
                                // set start and end year range
                                $yearArray = range(2021, 2050);
                            ?>    
                            
                                 <!-- List Dropdown -->
                                 <label for="tahun" class="col-form-label font-weight-bold" style="font-size: 1rem;">Tahun :</label>
                                 <select class="form-control-sm" name="tahun">
                                   <option selected disabled value="">Pilih tahun</option>
                                     <?php
                                       foreach ($yearArray as $year) {
                                           // if you want to select a particular year
                                           echo '<option value="'.$year.'">'.$year.'</option>';
                                       }
                                     ?>
                                 </select>
                                 &nbsp;
                               <label for="bulan" class="col-form-label font-weight-bold" style="font-size: 1rem;">Bulan :</label>
                               <select class="form-control-sm" name="bulan">
                                 <option selected disabled value="">Pilih bulan</option>
                                 <option value="Januari">Januari</option>
                                 <option value="Februari">Februari</option>
                                 <option value="Mac">Mac</option>
                                 <option value="April">April</option>
                                 <option value="Mei">Mei</option>
                                 <option value="Jun">Jun</option>
                                 <option value="Julai">Julai</option>
                                 <option value="Ogos">Ogos</option>
                                 <option value="September">September</option>
                                 <option value="Oktober">Oktober</option>
                                 <option value="November">November</option>
                                 <option value="Disember">Disember</option>
                               </select> 

                            <div class="row">

                                <div class="col-sm-4 pt-3 " >
                                  <div class="mb-4">
                                      <label class="font-weight-bold" >Fungsi</label>
                                      <select  class="form-control form-control-sm" id="fungsi" name="fungsi">
                                        <option selected value="">N/A</option>
                                        {{-- <option value="Kad Skor Korporat" >Kad Skor Korporat</option> --}}
                                        {{-- <option value="Kewangan" >Kewangan</option> --}}
                                        
                                        {{-- @if ($users2->position != 'Junior Non-Executive (NE1)' || $users2->position != 'Senior Non-Executive (NE2)')
                                        <option value="Kad Skor Korporat" >Kad Skor Korporat</option>
                                        @else
                                            
                                        @endif --}}
                                        {{-- @foreach ($Question->answer as $answer) --}}
                                        @foreach ($users as $user)
                                        @if ($user->id == Auth::user()->id)
                                        @else
                                        <option value="Kad Skor Korporat" >Kad Skor Korporat</option>
                                        @endif
                                        <option value="Kewangan" >Kewangan</option>
                                        @foreach ($hrs as $hr)
                                        @if ($hr->id == Auth::user()->id)
                                        <option value="Pelanggan (Internal)" >Pelanggan (Internal)</option>
                                        @else
                                        @endif
                                        @endforeach
                                        <option value="Pelanggan (Outer)" >Pelanggan (Outer)</option>
                                        <option value="Kecemerlangan Operasi" >Kecemerlangan Operasi</option> 
                                        <option value="Manusia & Proses (Training)" >Manusia & Proses (Training)</option> 
                                        <option value="Manusia & Proses (NCR/OFI)" >Manusia & Proses (NCR/OFI)</option> 
                                        <option value="Kolaborasi" >Kolaborasi</option>
                                        @endforeach
                                    </select>
                                  </div>
                                </div>

                                <div class="col-sm-4 pt-3 " >
                                  <div class="mb-4">
                                      <label class="font-weight-bold " >Objektif KPI</label>
                                      <input type="text" class="form-control form-control-sm" id="objektif" name="objektif">
                                  </div>
                                </div>                            

                                <div class="col-sm-4 pt-3 " >
                                  <div class="mb-4">
                                      <label class="font-weight-bold " >Metrik / Bukti</label>
                                      <br><textarea name="bukti" id="bukti" cols="30" rows="10"></textarea>
                                  </div>
                                </div>
                                
                            </div>

                            
                          
                            <div class="row m-auto">
                            
                            
                              {{-- Score KPI --}}
                                <table class="table table-bordered sticky-top bg-light bg-gradient text-dark">
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
                              </table>
                              <div class="table-responsive">
                                <table class="table table-bordered text-center">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th rowspan="2">Peratus (%)</th>
                                            <th rowspan="2">Ukuran</th>
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

                                          <td class="font-weight-bold border-dark">
                                            <input type="text" maxlength="3" class="input_ukuran w-75" id="peratus" name="peratus" onkeyup="masterClac();" min="0"  >
                                          </td>

                                          <td style="word-break: break-all;" class="border-dark">
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
                                            </select>
                                          </td>

                                          <td class="font-weight-bold border-dark">
                                            <input type="text" maxlength="4" class="input_threshold w-75" id="threshold" name="threshold" onkeyup="masterClac();" min="0" >
                                          </td>
                                    
                                          <td class="font-weight-bold border-dark">
                                            <input type="text" maxlength="4" class="input_base w-75" id="base" name="base" onkeyup="masterClac();" min="0" >
                                          </td>
                                    
                                          <td class="font-weight-bold border-dark">
                                            <input type="text" maxlength="4" class="input_stretch w-75" id="stretch" name="stretch" onkeyup="masterClac();" min="0" >
                                          </td>
                                    
                                          <td class="font-weight-bold border-dark">
                                            <input type="text" maxlength="4"  class="input_pencapaian w-75" id="pencapaian" name="pencapaian" onkeyup="masterClac();" min="0" >
                                          </td>
                                    
                                          <td class="font-weight-bold border-dark">
                                            <input type="text" class="form-control " id="skor_KPI" name="skor_KPI" value="0" readonly>
                                          </td>
                                    
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
                              <button type="submit" class="btn btn-sm btn-success" ><i class="fas fa-save"></i> Simpan Pencapaian</button>                           
                            </div>

                          </div>

                      </form>

                    </div>
                </div>
            </div>     
        </div>

        <br>
          
        <div class="card m-3">

          <div class="card-header font-weight-bold" style="text-transform:uppercase" >Maklumat Pencapaian</div>
          <div class="table-responsive">
            <table  class="table table-bordered text-center">
                <thead class="thead-dark">
                  <tr>
                    <th>No.</th>
                    {{-- <th >Pencapaian</th> --}}
                    <th rowspan="2">Fungsi</th>
                    <th rowspan="2">Objektif KPI</th>
                    <th rowspan="2">Metrik/Bukti</th>
                    <th rowspan="2">Link Bukti</th>
                    <th rowspan="2">(%)</th>
                    <th rowspan="2">Ukuran</th>
                    {{-- <th rowspan="1" colspan="3">KPI Targets</th>
                    <th rowspan="1" colspan="1">Threshold</th>
                    <th rowspan="1" colspan="1">Base Target</th>
                    <th rowspan="1" colspan="1">Stretch</th> --}}
                    <th rowspan="2">Pencapaian</th>
                    <th rowspan="2">Skor KPI</th>
                    <th rowspan="2">Skor Sebenar</th>
                    {{-- <th >Grade</th> --}}
                    {{-- <th >Tahun / Bulan</th> --}}
                    {{-- <th >Created At</th> --}}
                    {{-- <th >Updated At</th> --}}
                   
                    {{-- <th >Penilaian </th> --}}
                    <th class="w-25" ><i class="fas fa-cogs"></i></th>
                  </tr>
                </thead>
                <tbody >
                    <!-- Display Body -->
                    {{-- {{dd($kpi)}}; --}}
                    {{-- @if (auth()->user()->id == $kpi->user_id)  --}}
                    @php($i = 1)
                    @foreach ($kpi as $kpis)
                      
                    <tr class="font-weight-bold">
                      
                        <td class="border-dark">{{ $i++  }}</td>
                        <td class="border-dark">{{ $kpis -> fungsi }}</td>
                        <td class="border-dark">{{ $kpis -> objektif }}</td>
                        <td class="border-dark">{{ $kpis -> bukti }}</td>
                        {{-- {{dd( $markah->bukti->link )}} --}}
                        @foreach ($bukti as $buktis)
                        <td class="border-dark">{{ $buktis->link }}</td>
                        @endforeach
                        {{-- <td class="text-center">{{$attemptquiz->answer->answer}}</td> --}}
                        <td class="border-dark">{{ $kpis -> peratus }}</td>
                        <td class="border-dark">{{ $kpis -> ukuran }}</td>
                        
                        <td class="border-dark">{{ $kpis -> pencapaian }}</td>
                        <td class="border-dark">{{ $kpis -> skor_KPI }}</td>
                        <td class="border-dark">{{ round($kpis -> skor_sebenar,2) }} %</td>
                        {{-- <td class="border-dark">{{ $markah -> created_at -> toDayDateTimeString() }}</td> --}}
                        {{-- <td class="border-dark">{{ $markah -> updated_at -> toDayDateTimeString() }}</td> --}}
                       
                        <td class="border-dark">
                          <a href="{{ url('employee/edit/'.$kpis->id) }}" class="btn btn-primary btn-sm" style="font-size: 10px" role="button"><i class="fa fa-edit"></i>&nbsp;Edit Pencapaian</a>
                          <a href="{{ url('employee/bukti/edit/'.$kpis->id) }}" class="btn btn-warning btn-sm"  style="font-size: 10px" role="button"><i class="fa fa-edit"></i>&nbsp;Edit Bukti/Metrik</a>
                          <a href="{{ url('employee/delete/'.$kpis->id) }}" class="btn btn-danger btn-sm"  style="font-size: 10px" role="button"><i class="fa fa-trash"></i></a>
                        </td>
                        
                    </tr>

                    @endforeach
                    {{-- @else
                    @endif --}}
                </tbody> 
            </table>
          </div>
        </div>

      </div>
  </div>

 <!-- Master Pencapaian JS -->
<script src="{{asset('assets/js/master.js')}}"></script>
{{-- <script src="{{asset('assets/js/penilaian.js')}}"></script>
<script src="{{asset('assets/js/app.js')}}"></script>
<script src="{{asset('assets/js/bukti.js')}}"></script>
<script src="{{asset('assets/js/form_bukti.js')}}"></script>
<script src="{{asset('assets/js/form_pencapaian.js')}}"></script>
<script src="{{asset('assets/js/graph.js')}}"></script>
<script src="{{asset('assets/js/main.js')}}"></script>
<script src="{{asset('assets/js/pencapaian.js')}}"></script> --}}

</body>
{{-- @endsection --}}