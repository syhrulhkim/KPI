
{{-- @extends('layouts/employee_template') --}}
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

            @if (session('weightage'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
              <strong>Sila semak semula butiran pencapaian!</strong>{{ session('weightage') }}.
            </div>	
            @endif
          </div>
  
          <!-- Pencapaian Content  -->
        
          <div class="col-md-auto">
                <div class="col-sm-auto p-3">
                    <div class="card">
                    <div class="card-header pb-0">
                      <h6>KAD SKOR 2021 - KPI</h6>
                    </div>
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
                                  <div class="mb-4" class="@error('fungsi') border border-danger rounded-3 @enderror">
                                      {{-- <label class="font-weight-bold" >Fungsi</label><br>
                                      <select  class="form-control-sm" id="fungsi" name="fungsi">
                                        <option selected value="">-- Sila Pilih --</option> --}}
                                        <label class="font-weight-bold" >Fungsi</label><br>

                                        <td style="word-break: break-all;" class="border-dark">
                                          <select class="form-select form-select-sm" id="fungsi" name="fungsi">
                                            {{-- <option selected disabled value=""></option> --}}
                                            <option selected value="">-- Sila Pilih --</option>
                                            @if (Auth::user()->position == 'Junior Non-Executive (NE1)' || Auth::user()->position == 'Senior Non-Executive (NE2)')
                                            @else
                                            <option value="Kad Skor Korporat" >Kad Skor Korporat</option>
                                            @endif
    
                                            <option value="Kewangan" >Kewangan</option>
    
                                            @if (Auth::user()->department == 'Human Resource (HR) & Administration')
                                            <option value="Pelanggan (Internal)" >Pelanggan (Internal)</option>
                                            @else
                                            @endif
    
                                            <option value="Pelanggan (Outer)" >Pelanggan (Outer)</option>
                                            <option value="Kecemerlangan Operasi" >Kecemerlangan Operasi</option> 
                                            <option value="Manusia & Proses (Training)" >Manusia & Proses (Training)</option> 
                                            <option value="Manusia & Proses (NCROFI)" >Manusia & Proses (NCROFI)</option> 
                                            <option value="Kolaborasi" >Kolaborasi</option>
                                          </select>
                                        </td>
                                        
                                        {{-- <option value="Kad Skor Korporat" >Kad Skor Korporat</option> --}}
                                        {{-- <option value="Kewangan" >Kewangan</option> --}}
                                        
                                        {{-- @if ($users2->position != 'Junior Non-Executive (NE1)' || $users2->position != 'Senior Non-Executive (NE2)')
                                        <option value="Kad Skor Korporat" >Kad Skor Korporat</option>
                                        @else
                                            
                                        @endif --}}
                                        {{-- @foreach ($Question->answer as $answer) --}}
                                        {{-- @if (Auth::user()->position == 'Junior Non-Executive (NE1)' || Auth::user()->position == 'Senior Non-Executive (NE2)')
                                        @else
                                        <option value="Kad Skor Korporat" >Kad Skor Korporat</option>
                                        @endif

                                        <option value="Kewangan" >Kewangan</option>

                                        @if (Auth::user()->department == 'Human Resource (HR) & Administration')
                                        <option value="Pelanggan (Internal)" >Pelanggan (Internal)</option>
                                        @else
                                        @endif

                                        <option value="Pelanggan (Outer)" >Pelanggan (Outer)</option>
                                        <option value="Kecemerlangan Operasi" >Kecemerlangan Operasi</option> 
                                        <option value="Manusia & Proses (Training)" >Manusia & Proses (Training)</option> 
                                        <option value="Manusia & Proses (NCROFI)" >Manusia & Proses (NCROFI)</option> 
                                        <option value="Kolaborasi" >Kolaborasi</option> --}}
                                    </select>
                                    @error('fungsi') <div class="text-danger">{{ $message }}</div> @enderror
                                  </div>

                                </div>

                                {{-- <div class="col-sm-4 pt-3 " >
                                  <div class="mb-4">
                                      <label class="font-weight-bold " >Objektif KPI</label>
                                      <input type="text" class="form-control form-control-sm" id="objektif" name="objektif">
                                  </div>
                                </div>       --}}
                                {{-- <div class="col-sm-4 pt-3 " >
                                  <div class="mb-4">
                                      <label class="font-weight-bold " >Link Bukti</label>
                                      <input type="text" class="form-control form-control-sm" id="link" name="link">
                                  </div>
                                </div>                        --}}

                                <div class="col-sm-4 pt-3 " >
                                  <div class="mb-4" class="@error('bukti') border border-danger rounded-3 @enderror">
                                      <label class="font-weight-bold " >Metrik / Bukti</label>
                                      <br><textarea name="bukti" id="bukti" cols="30" rows="10"></textarea>
                                      @error('bukti') <div class="text-danger">{{ $message }}</div> @enderror
                                  </div>
                                </div>
                                
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

                                          <td class="border-dark" class="@error('peratus') border border-danger rounded-3 @enderror">
                                            <input type="text" maxlength="3" class="input_ukuran w-75" id="peratus" name="peratus" onkeyup="masterClac();" min="0"  >
                                            @error('peratus') <div class="text-danger">{{ $message }}</div> @enderror
                                          </td>

                                          <td style="word-break: break-all;" class="border-dark" class="@error('peratus') border border-danger rounded-3 @enderror">
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
                                            @error('ukuran') <div class="text-danger">{{ $message }}</div> @enderror
                                          </td>

                                          <td class="border-dark" class="@error('threshold') border border-danger rounded-3 @enderror">
                                            <input type="text" maxlength="4" class="input_threshold w-75" id="threshold" name="threshold" onkeyup="masterClac();" min="0" >
                                            @error('threshold') <div class="text-danger">{{ $message }}</div> @enderror
                                          </td>
                                    
                                          <td class="border-dark" class="@error('base') border border-danger rounded-3 @enderror">
                                            <input type="text" maxlength="4" class="input_base w-75" id="base" name="base" onkeyup="masterClac();" min="0" >
                                            @error('base') <div class="text-danger">{{ $message }}</div> @enderror
                                          </td>
                                    
                                          <td class="border-dark" class="@error('stretch') border border-danger rounded-3 @enderror">
                                            <input type="text" maxlength="4" class="input_stretch w-75" id="stretch" name="stretch" onkeyup="masterClac();" min="0" >
                                            @error('stretch') <div class="text-danger">{{ $message }}</div> @enderror
                                          </td>
                                    
                                          <td class="border-dark" class="@error('pencapaian') border border-danger rounded-3 @enderror">
                                            <input type="text" maxlength="4"  class="input_pencapaian w-75" id="pencapaian" name="pencapaian" onkeyup="masterClac();" min="0" >
                                            @error('pencapaian') <div class="text-danger">{{ $message }}</div> @enderror
                                          </td>
                                    
                                          <td class="border-dark" class="@error('skor_KPI') border border-danger rounded-3 @enderror">
                                            <input type="text" class="form-control" id="skor_KPI" name="skor_KPI" value="0" readonly>
                                            @error('skor_KPI') <div class="text-danger">{{ $message }}</div> @enderror
                                          </td>
                                    
                                          <td class="border-dark" class="@error('skor_sebenar') border border-danger rounded-3 @enderror">
                                            <input type="text"  class="form-control"  id="skor_sebenar" name="skor_sebenar" value="0" readonly>
                                            @error('skor_sebenar') <div class="text-danger">{{ $message }}</div> @enderror
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
            <br>
          </div>
        </div>

    {{-- @if(empty($kadskor)) --}}
    {{-- {{dd($pelangganI)}} --}}
    {{-- @isset($) --}}
    @if ($kadskorcount == 0)
    @else
    {{-- {{dd('john')}} --}}
    {{-- {{dd($kadskor)}} --}}
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
              {{-- <h6>KAD SKOR 2021 - KPI</h6> --}}
              <h6>KAD SKOR KORPORAT</h6>
              @foreach ($kadskor as $key => $kadskors)
              {{-- <h6>Total Score = {{round($kadskors -> skor_sebenar,2)}}</h6> --}}
              @endforeach
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              {{-- <form action="{{ url('kpi_master_save1'.$kadskormaster->id) }}" method="post">  
                @csrf --}}
              <form action="{{ route('kpi_master_save1') }}" method="post">  
                @csrf
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Fungsi</th>
                      {{-- <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Objektif KPI</th> --}}
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Metrik/Bukti</th>
                      {{-- <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Link Bukti</th> --}}
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">%</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Ukuran</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Treshold</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Base</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Stretch</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Pencapaian</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Skor KPI</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Skor Sebenar</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Edit</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Delete</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($kadskor as $key => $kadskors)
                      <tr>
                        <td>    
                          <div class="d-flex px-2 py-1">
                            <div class="d-flex flex-column justify-content-center">
                              <p class="mb-0 text-sm" value="{{$key + 1}}">{{$key + 1}}</p>
                            </div>
                          </div>
                        </td>
                        <td>
                          <p class="text-xs font-weight-bold mb-0" value="{{ $kadskors -> fungsi }}">{{ $kadskors -> fungsi }}</p>
                        </td>
                        {{-- <td class="align-middle text-center">
                          <span class="text-secondary text-xs font-weight-bold" value="{{ $kadskors -> objektif }}">{{ $kadskors -> objektif }}</span>
                        </td> --}}
                        <td class="align-middle text-center">
                          <span class="text-secondary text-xs font-weight-bold" value="{{ $kadskors -> bukti }}}">{{ $kadskors -> bukti }}</span>
                        </td>
                        {{-- <td class="align-middle text-center">
                          <a href=" {{ $kadskors->link }}" style="color:blue;text-decoration:underline;font-size:13.5px"; >Link Bukti</a>
                        </td> --}}
                        <td class="align-middle text-center">
                          <span class="text-secondary text-xs font-weight-bold" value="{{ $kadskors -> peratus }}">{{ $kadskors -> peratus }}</span>
                        </td>
                        <td class="align-middle text-center">
                          <span class="text-secondary text-xs font-weight-bold" value="{{ $kadskors -> ukuran }}">{{ $kadskors -> ukuran }}</span>
                        </td>
                        <td class="align-middle text-center">
                          <span class="text-secondary text-xs font-weight-bold" value="{{ $kadskors -> threshold }}">{{ $kadskors -> threshold }}</span>
                        </td>
                        <td class="align-middle text-center">
                          <span class="text-secondary text-xs font-weight-bold" value="{{ $kadskors -> base }}">{{ $kadskors -> base }}</span>
                        </td>
                        <td class="align-middle text-center">
                          <span class="text-secondary text-xs font-weight-bold" value="{{ $kadskors -> stretch }}">{{ $kadskors -> stretch }}</span>
                        </td>
                        <td class="align-middle text-center">
                          <span class="text-secondary text-xs font-weight-bold" value="{{ $kadskors -> pencapaian }}">{{ $kadskors -> pencapaian }}</span>
                        </td>
                        <td class="align-middle text-center">
                          <span class="text-secondary text-xs font-weight-bold" value="{{ $kadskors -> skor_KPI }}">{{ $kadskors -> skor_KPI }}</span>
                        </td>
                        <td class="align-middle text-center">
                          <span class="text-secondary text-xs font-weight-bold" value="{{ round($kadskors -> skor_sebenar,2) }}">{{ round($kadskors -> skor_sebenar,2) }} %</span>
                        </td>
                        <td class="align-middle text-center">
                          <a href="{{ url('employee/edit/kpi/'.$kadskors->id) }}" class="btn btn-primary btn-sm" style="font-size: 10px" role="button"><i class="fa fa-edit"></i>&nbsp;Edit</a>
                        </td>
                        <td class="align-middle text-center">
                          <a href="{{ url('employee/delete/kpi/'.$kadskors->id) }}" class="btn btn-danger btn-sm"  style="font-size: 10px" role="button"><i class="fa fa-trash"></i>&nbsp;Delete</a>
                        </td>
                      </tr>
                    @endforeach
                  </tbody>

                  
                </table>

                @foreach ($kadskormaster as $kadskormasters)
                <div class="row">
                  <div class="col-sm-4 pt-3 " >
                    <div class="mb-4">
                        <label class="font-weight-bold " >Percentage KPI Master: </label>
                        <span class="text-secondary text-xs font-weight-bold" value="{{ $kadskormasters -> percent_master }}">{{ $kadskormasters -> percent_master }}</span>
                    </div>
                  </div> 
                  <div class="col-sm-4 pt-3 " >
                    <div class="mb-4">
                        <label class="font-weight-bold " >Link Bukti: </label>
                        <span class="text-secondary text-xs font-weight-bold" value="{{ $kadskormasters -> link }}">{{ $kadskormasters -> link }}</span>
                    </div>
                  </div> 
                  <div class="col-sm-4 pt-3 " >
                    <div class="mb-4">
                        <label class="font-weight-bold " >Objektif KPI: </label>
                        <span class="text-secondary text-xs font-weight-bold" value="{{ $kadskormasters -> objektif }}">{{ $kadskormasters -> objektif }}</span>
                    </div>
                  </div> 
                </div>
                @endforeach

                <div class="p-3" style="text-align: right">
                  {{-- <button type="submit" class="btn btn-sm btn-success" ><i class="fas fa-save"></i> Save</button>   --}}
                  {{-- <button type="submit" href="{{ url('employee/edit/kpimaster/'.$kadskormasters->id) }}" class="btn btn-sm btn-success" ><i class="fas fa-save"></i> Save</button>   --}}
                  {{-- {{dd($kadskormasters)}} --}}
                  {{-- {{dd($kadskormasters)}} --}}
                  @foreach ($kadskormaster as $kadskormasters)
                  <a href="{{ url('employee/edit/kpimaster1/'.$kadskormasters->id) }}" class="btn btn-primary btn-sm" style="font-size: 10px" role="button"><i class="fa fa-edit"></i>&nbsp;Edit</a>    
                  @endforeach                     
                </div>
                
              </div>
            </form>
            </div>
          </div>
        </div>
      </div>
    </div> 
    {{-- @endisset --}}
    {{-- @else --}}
    @endif

    @if ($kewangancount == 0)
    @else
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
              {{-- <h6>KAD SKOR 2021 - KPI</h6> --}}
              <h6>KEWANGAN</h6>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <form action="{{ route('kpi_master_save2') }}" method="post">  
                @csrf
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Fungsi</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Metrik/Bukti</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">%</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Ukuran</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Treshold</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Base</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Stretch</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Pencapaian</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Skor KPI</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Skor Sebenar</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Edit</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Delete</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($kewangan as $key => $kewangans)
                      <tr>
                        <td>    
                          <div class="d-flex px-2 py-1">
                            <div class="d-flex flex-column justify-content-center">
                              <p class="mb-0 text-sm" value="{{$key + 1}}">{{$key + 1}}</p>
                            </div>
                          </div>
                        </td>
                        <td>
                          <p class="text-xs font-weight-bold mb-0" value="{{ $kewangans -> fungsi }}">{{ $kewangans -> fungsi }}</p>
                        </td>
                        <td class="align-middle text-center">
                          <span class="text-secondary text-xs font-weight-bold" value="{{ $kewangans -> bukti }}}">{{ $kewangans -> bukti }}</span>
                        </td>
                        <td class="align-middle text-center">
                          <span class="text-secondary text-xs font-weight-bold" value="{{ $kewangans -> peratus }}">{{ $kewangans -> peratus }}</span>
                        </td>
                        <td class="align-middle text-center">
                          <span class="text-secondary text-xs font-weight-bold" value="{{ $kewangans -> ukuran }}">{{ $kewangans -> ukuran }}</span>
                        </td>
                        <td class="align-middle text-center">
                          <span class="text-secondary text-xs font-weight-bold" value="{{ $kewangans -> threshold }}">{{ $kewangans -> threshold }}</span>
                        </td>
                        <td class="align-middle text-center">
                          <span class="text-secondary text-xs font-weight-bold" value="{{ $kewangans -> base }}">{{ $kewangans -> base }}</span>
                        </td>
                        <td class="align-middle text-center">
                          <span class="text-secondary text-xs font-weight-bold" value="{{ $kewangans -> stretch }}">{{ $kewangans -> stretch }}</span>
                        </td>
                        <td class="align-middle text-center">
                          <span class="text-secondary text-xs font-weight-bold" value="{{ $kewangans -> pencapaian }}">{{ $kewangans -> pencapaian }}</span>
                        </td>
                        <td class="align-middle text-center">
                          <span class="text-secondary text-xs font-weight-bold" value="{{ $kewangans -> skor_KPI }}">{{ $kewangans -> skor_KPI }}</span>
                        </td>
                        <td class="align-middle text-center">
                          <span class="text-secondary text-xs font-weight-bold" value="{{ round($kewangans -> skor_sebenar,2) }}">{{ round($kewangans -> skor_sebenar,2) }} %</span>
                        </td>
                        <td class="align-middle text-center">
                          <a href="{{ url('employee/edit/kpi/'.$kewangans->id) }}" class="btn btn-primary btn-sm" style="font-size: 10px" role="button"><i class="fa fa-edit"></i>&nbsp;Edit</a>
                        </td>
                        <td class="align-middle text-center">
                          <a href="{{ url('employee/delete/kpi/'.$kewangans->id) }}" class="btn btn-danger btn-sm"  style="font-size: 10px" role="button"><i class="fa fa-trash"></i>&nbsp;Delete</a>
                        </td>
                      </tr>
                    @endforeach
                  </tbody>

                  
                </table>

                @foreach ($kewanganmaster as $kewanganmasters)
                <div class="row">
                  <div class="col-sm-4 pt-3 " >
                    <div class="mb-4">
                        <label class="font-weight-bold " >Percentage KPI Master: </label>
                        <span class="text-secondary text-xs font-weight-bold" value="{{ $kewanganmasters -> percent_master }}">{{ $kewanganmasters -> percent_master }}</span>
                    </div>
                  </div> 
                  <div class="col-sm-4 pt-3 " >
                    <div class="mb-4">
                        <label class="font-weight-bold " >Link Bukti: </label>
                        <span class="text-secondary text-xs font-weight-bold" value="{{ $kewanganmasters -> link }}">{{ $kewanganmasters -> link }}</span>
                    </div>
                  </div> 
                  <div class="col-sm-4 pt-3 " >
                    <div class="mb-4">
                        <label class="font-weight-bold " >Objektif KPI: </label>
                        <span class="text-secondary text-xs font-weight-bold" value="{{ $kewanganmasters -> objektif }}">{{ $kewanganmasters -> objektif }}</span>
                    </div>
                  </div> 
                </div>
                @endforeach

                <div class="p-3" style="text-align: right">
                  {{-- <button type="submit" class="btn btn-sm btn-success" ><i class="fas fa-save"></i> Save</button>   --}}
                  @foreach ($kewanganmaster as $kewanganmasters)
                  <a href="{{ url('employee/edit/kpimaster2/'.$kewanganmasters->id) }}" class="btn btn-primary btn-sm" style="font-size: 10px" role="button"><i class="fa fa-edit"></i>&nbsp;Edit</a>  
                  @endforeach                          
                </div>

              </div>
            </form>
            </div>
          </div>
        </div>
      </div>
    </div> 
    @endif 

    @if ($pelangganIcount == 0)
    @else
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
              {{-- <h6>KAD SKOR 2021 - KPI</h6> --}}
              <h6>PELANGGAN (INTERNAL)</h6>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <form action="{{ route('kpi_master_save3') }}" method="post">  
                @csrf
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Fungsi</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Metrik/Bukti</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">%</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Ukuran</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Treshold</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Base</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Stretch</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Pencapaian</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Skor KPI</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Skor Sebenar</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Edit</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Delete</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($pelangganI as $key => $pelangganIs)
                      <tr>
                        <td>    
                          <div class="d-flex px-2 py-1">
                            <div class="d-flex flex-column justify-content-center">
                              <p class="mb-0 text-sm" value="{{$key + 1}}">{{$key + 1}}</p>
                            </div>
                          </div>
                        </td>
                        <td>
                          <p class="text-xs font-weight-bold mb-0" value="{{ $pelangganIs -> fungsi }}">{{ $pelangganIs -> fungsi }}</p>
                        </td>
                        <td class="align-middle text-center">
                          <span class="text-secondary text-xs font-weight-bold" value="{{ $pelangganIs -> bukti }}}">{{ $pelangganIs -> bukti }}</span>
                        </td>
                        <td class="align-middle text-center">
                          <span class="text-secondary text-xs font-weight-bold" value="{{ $pelangganIs -> peratus }}">{{ $pelangganIs -> peratus }}</span>
                        </td>
                        <td class="align-middle text-center">
                          <span class="text-secondary text-xs font-weight-bold" value="{{ $pelangganIs -> ukuran }}">{{ $pelangganIs -> ukuran }}</span>
                        </td>
                        <td class="align-middle text-center">
                          <span class="text-secondary text-xs font-weight-bold" value="{{ $pelangganIs -> threshold }}">{{ $pelangganIs -> threshold }}</span>
                        </td>
                        <td class="align-middle text-center">
                          <span class="text-secondary text-xs font-weight-bold" value="{{ $pelangganIs -> base }}">{{ $pelangganIs -> base }}</span>
                        </td>
                        <td class="align-middle text-center">
                          <span class="text-secondary text-xs font-weight-bold" value="{{ $pelangganIs -> stretch }}">{{ $pelangganIs -> stretch }}</span>
                        </td>
                        <td class="align-middle text-center">
                          <span class="text-secondary text-xs font-weight-bold" value="{{ $pelangganIs -> pencapaian }}">{{ $pelangganIs -> pencapaian }}</span>
                        </td>
                        <td class="align-middle text-center">
                          <span class="text-secondary text-xs font-weight-bold" value="{{ $pelangganIs -> skor_KPI }}">{{ $pelangganIs -> skor_KPI }}</span>
                        </td>
                        <td class="align-middle text-center">
                          <span class="text-secondary text-xs font-weight-bold" value="{{ round($pelangganIs -> skor_sebenar,2) }}">{{ round($pelangganIs -> skor_sebenar,2) }} %</span>
                        </td>
                        <td class="align-middle text-center">
                          <a href="{{ url('employee/edit/kpi/'.$pelangganIs->id) }}" class="btn btn-primary btn-sm" style="font-size: 10px" role="button"><i class="fa fa-edit"></i>&nbsp;Edit</a>
                        </td>
                        <td class="align-middle text-center">
                          <a href="{{ url('employee/delete/kpi/'.$pelangganIs->id) }}" class="btn btn-danger btn-sm"  style="font-size: 10px" role="button"><i class="fa fa-trash"></i>&nbsp;Delete</a>
                        </td>
                      </tr>
                    @endforeach
                  </tbody>
                  
                </table>

                @foreach ($pelangganImaster as $pelangganImasters)
                <div class="row">
                  <div class="col-sm-4 pt-3 " >
                    <div class="mb-4">
                        <label class="font-weight-bold " >Percentage KPI Master: </label>
                        <span class="text-secondary text-xs font-weight-bold" value="{{ $pelangganImasters -> percent_master }}">{{ $pelangganImasters -> percent_master }}</span>
                    </div>
                  </div> 
                  <div class="col-sm-4 pt-3 " >
                    <div class="mb-4">
                        <label class="font-weight-bold " >Link Bukti: </label>
                        <span class="text-secondary text-xs font-weight-bold" value="{{ $pelangganImasters -> link }}">{{ $pelangganImasters -> link }}</span>
                    </div>
                  </div> 
                  <div class="col-sm-4 pt-3 " >
                    <div class="mb-4">
                        <label class="font-weight-bold " >Objektif KPI: </label>
                        <span class="text-secondary text-xs font-weight-bold" value="{{ $pelangganImasters -> objektif }}">{{ $pelangganImasters -> objektif }}</span>
                    </div>
                  </div> 
                </div>
                @endforeach

                <div class="p-3" style="text-align: right">
                  {{-- <button type="submit" class="btn btn-sm btn-success" ><i class="fas fa-save"></i> Save</button>  --}}
                  {{-- {{dd($pelangganImasters)}} --}}
                  @foreach ($pelangganImaster as $pelangganImasters)
                  <a href="{{ url('employee/edit/kpimaster3/'.$pelangganImasters->id) }}" class="btn btn-primary btn-sm" style="font-size: 10px" role="button"><i class="fa fa-edit"></i>&nbsp;Edit</a>   
                  @endforeach                         
                </div>
              </div>
            </form>
            </div>
          </div>
        </div>
      </div>
    </div> 
    @endif 

    @if ($pelangganIIcount == 0)
    @else
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
              {{-- <h6>KAD SKOR 2021 - KPI</h6> --}}
              <h6>PELANGGAN (OUTER)</h6>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <form action="{{ route('kpi_master_save4') }}" method="post">  
                @csrf
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Fungsi</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Metrik/Bukti</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">%</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Ukuran</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Treshold</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Base</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Stretch</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Pencapaian</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Skor KPI</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Skor Sebenar</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Edit</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Delete</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($pelangganII as $key => $pelangganIIs)
                      <tr>
                        <td>    
                          <div class="d-flex px-2 py-1">
                            <div class="d-flex flex-column justify-content-center">
                              <p class="mb-0 text-sm" value="{{$key + 1}}">{{$key + 1}}</p>
                            </div>
                          </div>
                        </td>
                        <td>
                          <p class="text-xs font-weight-bold mb-0" value="{{ $pelangganIIs -> fungsi }}">{{ $pelangganIIs -> fungsi }}</p>
                        </td>
                        <td class="align-middle text-center">
                          <span class="text-secondary text-xs font-weight-bold" value="{{ $pelangganIIs -> bukti }}}">{{ $pelangganIIs -> bukti }}</span>
                        </td>
                        <td class="align-middle text-center">
                          <span class="text-secondary text-xs font-weight-bold" value="{{ $pelangganIIs -> peratus }}">{{ $pelangganIIs -> peratus }}</span>
                        </td>
                        <td class="align-middle text-center">
                          <span class="text-secondary text-xs font-weight-bold" value="{{ $pelangganIIs -> ukuran }}">{{ $pelangganIIs -> ukuran }}</span>
                        </td>
                        <td class="align-middle text-center">
                          <span class="text-secondary text-xs font-weight-bold" value="{{ $pelangganIIs -> threshold }}">{{ $pelangganIIs -> threshold }}</span>
                        </td>
                        <td class="align-middle text-center">
                          <span class="text-secondary text-xs font-weight-bold" value="{{ $pelangganIIs -> base }}">{{ $pelangganIIs -> base }}</span>
                        </td>
                        <td class="align-middle text-center">
                          <span class="text-secondary text-xs font-weight-bold" value="{{ $pelangganIIs -> stretch }}">{{ $pelangganIIs -> stretch }}</span>
                        </td>
                        <td class="align-middle text-center">
                          <span class="text-secondary text-xs font-weight-bold" value="{{ $pelangganIIs -> pencapaian }}">{{ $pelangganIIs -> pencapaian }}</span>
                        </td>
                        <td class="align-middle text-center">
                          <span class="text-secondary text-xs font-weight-bold" value="{{ $pelangganIIs -> skor_KPI }}">{{ $pelangganIIs -> skor_KPI }}</span>
                        </td>
                        <td class="align-middle text-center">
                          <span class="text-secondary text-xs font-weight-bold" value="{{ round($pelangganIIs -> skor_sebenar,2) }}">{{ round($pelangganIIs -> skor_sebenar,2) }} %</span>
                        </td>
                        <td class="align-middle text-center">
                          <a href="{{ url('employee/edit/kpi/'.$pelangganIIs->id) }}" class="btn btn-primary btn-sm" style="font-size: 10px" role="button"><i class="fa fa-edit"></i>&nbsp;Edit</a>
                        </td>
                        <td class="align-middle text-center">
                          <a href="{{ url('employee/delete/kpi/'.$pelangganIIs->id) }}" class="btn btn-danger btn-sm"  style="font-size: 10px" role="button"><i class="fa fa-trash"></i>&nbsp;Delete</a>
                        </td>
                      </tr>
                    @endforeach
                  </tbody>

                  
                </table>

                @foreach ($pelangganIImaster as $pelangganIImasters)
                <div class="row">
                  <div class="col-sm-4 pt-3 " >
                    <div class="mb-4">
                        <label class="font-weight-bold " >Percentage KPI Master: </label>
                        <span class="text-secondary text-xs font-weight-bold" value="{{ $pelangganIImasters -> percent_master }}">{{ $pelangganIImasters -> percent_master }}</span>
                    </div>
                  </div> 
                  <div class="col-sm-4 pt-3 " >
                    <div class="mb-4">
                        <label class="font-weight-bold " >Link Bukti: </label>
                        <span class="text-secondary text-xs font-weight-bold" value="{{ $pelangganIImasters -> link }}">{{ $pelangganIImasters -> link }}</span>
                    </div>
                  </div> 
                  <div class="col-sm-4 pt-3 " >
                    <div class="mb-4">
                        <label class="font-weight-bold " >Objektif KPI: </label>
                        <span class="text-secondary text-xs font-weight-bold" value="{{ $pelangganIImasters -> objektif }}">{{ $pelangganIImasters -> objektif }}</span>
                    </div>
                  </div> 
                </div>
                @endforeach

                <div class="p-3" style="text-align: right">
                  {{-- <button type="submit" class="btn btn-sm btn-success" ><i class="fas fa-save"></i> Save</button>   --}}
                  @foreach ($pelangganIImaster as $pelangganIImasters)
                  <a href="{{ url('employee/edit/kpimaster4/'.$pelangganIImasters->id) }}" class="btn btn-primary btn-sm" style="font-size: 10px" role="button"><i class="fa fa-edit"></i>&nbsp;Edit</a> 
                  @endforeach                           
                </div>
              </div>
            </form>
            </div>
          </div>
        </div>
      </div>
    </div> 
    @endif 

    @if ($kecemerlangancount == 0)
    @else
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
              {{-- <h6>KAD SKOR 2021 - KPI</h6> --}}
              <h6>KECEMERLANGAN OPERASI</h6>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <form action="{{ route('kpi_master_save5') }}" method="post">  
                @csrf
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Fungsi</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Metrik/Bukti</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">%</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Ukuran</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Treshold</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Base</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Stretch</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Pencapaian</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Skor KPI</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Skor Sebenar</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Edit</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Delete</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($kecemerlangan as $key => $kecemerlangans)
                      <tr>
                        <td>    
                          <div class="d-flex px-2 py-1">
                            <div class="d-flex flex-column justify-content-center">
                              <p class="mb-0 text-sm" value="{{$key + 1}}">{{$key + 1}}</p>
                            </div>
                          </div>
                        </td>
                        <td>
                          <p class="text-xs font-weight-bold mb-0" value="{{ $kecemerlangans -> fungsi }}">{{ $kecemerlangans -> fungsi }}</p>
                        </td>
                        <td class="align-middle text-center">
                          <span class="text-secondary text-xs font-weight-bold" value="{{ $kecemerlangans -> bukti }}}">{{ $kecemerlangans -> bukti }}</span>
                        </td>
                        <td class="align-middle text-center">
                          <span class="text-secondary text-xs font-weight-bold" value="{{ $kecemerlangans -> peratus }}">{{ $kecemerlangans -> peratus }}</span>
                        </td>
                        <td class="align-middle text-center">
                          <span class="text-secondary text-xs font-weight-bold" value="{{ $kecemerlangans -> ukuran }}">{{ $kecemerlangans -> ukuran }}</span>
                        </td>
                        <td class="align-middle text-center">
                          <span class="text-secondary text-xs font-weight-bold" value="{{ $kecemerlangans -> threshold }}">{{ $kecemerlangans -> threshold }}</span>
                        </td>
                        <td class="align-middle text-center">
                          <span class="text-secondary text-xs font-weight-bold" value="{{ $kecemerlangans -> base }}">{{ $kecemerlangans -> base }}</span>
                        </td>
                        <td class="align-middle text-center">
                          <span class="text-secondary text-xs font-weight-bold" value="{{ $kecemerlangans -> stretch }}">{{ $kecemerlangans -> stretch }}</span>
                        </td>
                        <td class="align-middle text-center">
                          <span class="text-secondary text-xs font-weight-bold" value="{{ $kecemerlangans -> pencapaian }}">{{ $kecemerlangans -> pencapaian }}</span>
                        </td>
                        <td class="align-middle text-center">
                          <span class="text-secondary text-xs font-weight-bold" value="{{ $kecemerlangans -> skor_KPI }}">{{ $kecemerlangans -> skor_KPI }}</span>
                        </td>
                        <td class="align-middle text-center">
                          <span class="text-secondary text-xs font-weight-bold" value="{{ round($kecemerlangans -> skor_sebenar,2) }}">{{ round($kecemerlangans -> skor_sebenar,2) }} %</span>
                        </td>
                        <td class="align-middle text-center">
                          <a href="{{ url('employee/edit/kpi/'.$kecemerlangans->id) }}" class="btn btn-primary btn-sm" style="font-size: 10px" role="button"><i class="fa fa-edit"></i>&nbsp;Edit</a>
                        </td>
                        <td class="align-middle text-center">
                          <a href="{{ url('employee/delete/kpi/'.$kecemerlangans->id) }}" class="btn btn-danger btn-sm"  style="font-size: 10px" role="button"><i class="fa fa-trash"></i>&nbsp;Delete</a>
                        </td>
                      </tr>
                    @endforeach
                  </tbody>

                  
                </table>

                @foreach ($kecemerlanganmaster as $kecemerlanganmasters)
                <div class="row">
                  <div class="col-sm-4 pt-3 " >
                    <div class="mb-4">
                        <label class="font-weight-bold " >Percentage KPI Master: </label>
                        <span class="text-secondary text-xs font-weight-bold" value="{{ $kecemerlanganmasters -> percent_master }}">{{ $kecemerlanganmasters -> percent_master }}</span>
                    </div>
                  </div> 
                  <div class="col-sm-4 pt-3 " >
                    <div class="mb-4">
                        <label class="font-weight-bold " >Link Bukti: </label>
                        <span class="text-secondary text-xs font-weight-bold" value="{{ $kecemerlanganmasters -> link }}">{{ $kecemerlanganmasters -> link }}</span>
                    </div>
                  </div> 
                  <div class="col-sm-4 pt-3 " >
                    <div class="mb-4">
                        <label class="font-weight-bold " >Objektif KPI: </label>
                        <span class="text-secondary text-xs font-weight-bold" value="{{ $kecemerlanganmasters -> objektif }}">{{ $kecemerlanganmasters -> objektif }}</span>
                    </div>
                  </div> 
                </div>
                @endforeach

                <div class="p-3" style="text-align: right">
                  {{-- <button type="submit" class="btn btn-sm btn-success" ><i class="fas fa-save"></i> Save</button>    --}}
                  @foreach ($kecemerlanganmaster as $kecemerlanganmasters)
                  <a href="{{ url('employee/edit/kpimaster5/'.$kecemerlanganmasters->id) }}" class="btn btn-primary btn-sm" style="font-size: 10px" role="button"><i class="fa fa-edit"></i>&nbsp;Edit</a>    
                  @endforeach                     
                </div>
              </div>
            </form>
            </div>
          </div>
        </div>
      </div>
    </div> 
    @endif

    @if ($trainingcount == 0)
    @else
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
              {{-- <h6>KAD SKOR 2021 - KPI</h6> --}}
              <h6>MANUSIA & PROCESS (TRAINING)</h6>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <form action="{{ route('kpi_master_save6') }}" method="post">  
                @csrf
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Fungsi</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Metrik/Bukti</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">%</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Ukuran</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Treshold</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Base</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Stretch</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Pencapaian</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Skor KPI</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Skor Sebenar</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Edit</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Delete</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($training as $key => $trainings)
                      <tr>
                        <td>    
                          <div class="d-flex px-2 py-1">
                            <div class="d-flex flex-column justify-content-center">
                              <p class="mb-0 text-sm" value="{{$key + 1}}">{{$key + 1}}</p>
                            </div>
                          </div>
                        </td>
                        <td>
                          <p class="text-xs font-weight-bold mb-0" value="{{ $trainings -> fungsi }}">{{ $trainings -> fungsi }}</p>
                        </td>
                        <td class="align-middle text-center">
                          <span class="text-secondary text-xs font-weight-bold" value="{{ $trainings -> bukti }}}">{{ $trainings -> bukti }}</span>
                        </td>
                        <td class="align-middle text-center">
                          <span class="text-secondary text-xs font-weight-bold" value="{{ $trainings -> peratus }}">{{ $trainings -> peratus }}</span>
                        </td>
                        <td class="align-middle text-center">
                          <span class="text-secondary text-xs font-weight-bold" value="{{ $trainings -> ukuran }}">{{ $trainings -> ukuran }}</span>
                        </td>
                        <td class="align-middle text-center">
                          <span class="text-secondary text-xs font-weight-bold" value="{{ $trainings -> threshold }}">{{ $trainings -> threshold }}</span>
                        </td>
                        <td class="align-middle text-center">
                          <span class="text-secondary text-xs font-weight-bold" value="{{ $trainings -> base }}">{{ $trainings -> base }}</span>
                        </td>
                        <td class="align-middle text-center">
                          <span class="text-secondary text-xs font-weight-bold" value="{{ $trainings -> stretch }}">{{ $trainings -> stretch }}</span>
                        </td>
                        <td class="align-middle text-center">
                          <span class="text-secondary text-xs font-weight-bold" value="{{ $trainings -> pencapaian }}">{{ $trainings -> pencapaian }}</span>
                        </td>
                        <td class="align-middle text-center">
                          <span class="text-secondary text-xs font-weight-bold" value="{{ $trainings -> skor_KPI }}">{{ $trainings -> skor_KPI }}</span>
                        </td>
                        <td class="align-middle text-center">
                          <span class="text-secondary text-xs font-weight-bold" value="{{ round($trainings -> skor_sebenar,2) }}">{{ round($trainings -> skor_sebenar,2) }} %</span>
                        </td>
                        <td class="align-middle text-center">
                          <a href="{{ url('employee/edit/kpi/'.$trainings->id) }}" class="btn btn-primary btn-sm" style="font-size: 10px" role="button"><i class="fa fa-edit"></i>&nbsp;Edit</a>
                        </td>
                        <td class="align-middle text-center">
                          <a href="{{ url('employee/delete/kpi/'.$trainings->id) }}" class="btn btn-danger btn-sm"  style="font-size: 10px" role="button"><i class="fa fa-trash"></i>&nbsp;Delete</a>
                        </td>
                      </tr>
                    @endforeach
                  </tbody>

                  
                </table>

                @foreach ($trainingmaster as $trainingmasters)
                <div class="row">
                  <div class="col-sm-4 pt-3 " >
                    <div class="mb-4">
                        <label class="font-weight-bold " >Percentage KPI Master: </label>
                        <span class="text-secondary text-xs font-weight-bold" value="{{ $trainingmasters -> percent_master }}">{{ $trainingmasters -> percent_master }}</span>
                    </div>
                  </div> 
                  <div class="col-sm-4 pt-3 " >
                    <div class="mb-4">
                        <label class="font-weight-bold " >Link Bukti: </label>
                        <span class="text-secondary text-xs font-weight-bold" value="{{ $trainingmasters -> link }}">{{ $trainingmasters -> link }}</span>
                    </div>
                  </div> 
                  <div class="col-sm-4 pt-3 " >
                    <div class="mb-4">
                        <label class="font-weight-bold " >Objektif KPI: </label>
                        <span class="text-secondary text-xs font-weight-bold" value="{{ $trainingmasters -> objektif }}">{{ $trainingmasters -> objektif }}</span>
                    </div>
                  </div> 
                </div>
                @endforeach

                <div class="p-3" style="text-align: right">
                  {{-- <button type="submit" class="btn btn-sm btn-success" ><i class="fas fa-save"></i> Save</button>  --}}
                  @foreach ($trainingmaster as $trainingmasters)
                  <a href="{{ url('employee/edit/kpimaster6/'.$trainingmasters->id) }}" class="btn btn-primary btn-sm" style="font-size: 10px" role="button"><i class="fa fa-edit"></i>&nbsp;Edit</a>   
                  @endforeach                       
                </div>
              </div>
            </form>
            </div>
          </div>
        </div>
      </div>
    </div> 
    @endif

    @if ($ncrcount == 0)
    @else
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
              {{-- <h6>KAD SKOR 2021 - KPI</h6> --}}
              <h6>MANUSIA & PROCESS (NCROFI)</h6>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <form action="{{ route('kpi_master_save7') }}" method="post">  
                @csrf
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Fungsi</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Metrik/Bukti</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">%</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Ukuran</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Treshold</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Base</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Stretch</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Pencapaian</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Skor KPI</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Skor Sebenar</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Edit</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Delete</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($ncr as $key => $ncrs)
                      <tr>
                        <td>    
                          <div class="d-flex px-2 py-1">
                            <div class="d-flex flex-column justify-content-center">
                              <p class="mb-0 text-sm" value="{{$key + 1}}">{{$key + 1}}</p>
                            </div>
                          </div>
                        </td>
                        <td>
                          <p class="text-xs font-weight-bold mb-0" value="{{ $ncrs -> fungsi }}">{{ $ncrs -> fungsi }}</p>
                        </td>
                        <td class="align-middle text-center">
                          <span class="text-secondary text-xs font-weight-bold" value="{{ $ncrs -> bukti }}}">{{ $ncrs -> bukti }}</span>
                        </td>
                        <td class="align-middle text-center">
                          <span class="text-secondary text-xs font-weight-bold" value="{{ $ncrs -> peratus }}">{{ $ncrs -> peratus }}</span>
                        </td>
                        <td class="align-middle text-center">
                          <span class="text-secondary text-xs font-weight-bold" value="{{ $ncrs -> ukuran }}">{{ $ncrs -> ukuran }}</span>
                        </td>
                        <td class="align-middle text-center">
                          <span class="text-secondary text-xs font-weight-bold" value="{{ $ncrs -> threshold }}">{{ $ncrs -> threshold }}</span>
                        </td>
                        <td class="align-middle text-center">
                          <span class="text-secondary text-xs font-weight-bold" value="{{ $ncrs -> base }}">{{ $ncrs -> base }}</span>
                        </td>
                        <td class="align-middle text-center">
                          <span class="text-secondary text-xs font-weight-bold" value="{{ $ncrs -> stretch }}">{{ $ncrs -> stretch }}</span>
                        </td>
                        <td class="align-middle text-center">
                          <span class="text-secondary text-xs font-weight-bold" value="{{ $ncrs -> pencapaian }}">{{ $ncrs -> pencapaian }}</span>
                        </td>
                        <td class="align-middle text-center">
                          <span class="text-secondary text-xs font-weight-bold" value="{{ $ncrs -> skor_KPI }}">{{ $ncrs -> skor_KPI }}</span>
                        </td>
                        <td class="align-middle text-center">
                          <span class="text-secondary text-xs font-weight-bold" value="{{ round($ncrs -> skor_sebenar,2) }}">{{ round($ncrs -> skor_sebenar,2) }} %</span>
                        </td>
                        <td class="align-middle text-center">
                          <a href="{{ url('employee/edit/kpi/'.$ncrs->id) }}" class="btn btn-primary btn-sm" style="font-size: 10px" role="button"><i class="fa fa-edit"></i>&nbsp;Edit</a>
                        </td>
                        <td class="align-middle text-center">
                          <a href="{{ url('employee/delete/kpi/'.$ncrs->id) }}" class="btn btn-danger btn-sm"  style="font-size: 10px" role="button"><i class="fa fa-trash"></i>&nbsp;Delete</a>
                        </td>
                      </tr>
                    @endforeach
                  </tbody>

                  
                </table>

                @foreach ($ncrmaster as $ncrmasters)
                <div class="row">
                  <div class="col-sm-4 pt-3 " >
                    <div class="mb-4">
                        <label class="font-weight-bold " >Percentage KPI Master: </label>
                        <span class="text-secondary text-xs font-weight-bold" value="{{ $ncrmasters -> percent_master }}">{{ $ncrmasters -> percent_master }}</span>
                    </div>
                  </div> 
                  <div class="col-sm-4 pt-3 " >
                    <div class="mb-4">
                        <label class="font-weight-bold " >Link Bukti: </label>
                        <span class="text-secondary text-xs font-weight-bold" value="{{ $ncrmasters -> link }}">{{ $ncrmasters -> link }}</span>
                    </div>
                  </div> 
                  <div class="col-sm-4 pt-3 " >
                    <div class="mb-4">
                        <label class="font-weight-bold " >Objektif KPI: </label>
                        <span class="text-secondary text-xs font-weight-bold" value="{{ $ncrmasters -> objektif }}">{{ $ncrmasters -> objektif }}</span>
                    </div>
                  </div> 
                </div>
                @endforeach
                
                <div class="p-3" style="text-align: right">
                  {{-- <button type="submit" class="btn btn-sm btn-success" ><i class="fas fa-save"></i> Save</button>    --}}
                  @foreach ($ncrmaster as $ncrmasters)
                  <a href="{{ url('employee/edit/kpimaster7/'.$ncrmasters->id) }}" class="btn btn-primary btn-sm" style="font-size: 10px" role="button"><i class="fa fa-edit"></i>&nbsp;Edit</a>   
                  @endforeach                        
                </div>
              </div>
            </form>
            </div>
          </div>
        </div>
      </div>
    </div> 
    @endif

    @if ($kolaborasicount == 0)
    @else
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
              {{-- <h6>KAD SKOR 2021 - KPI</h6> --}}
              <h6>KOLABORASI</h6>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <form action="{{ route('kpi_master_save8') }}" method="post">  
                @csrf
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Fungsi</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Metrik/Bukti</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">%</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Ukuran</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Treshold</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Base</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Stretch</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Pencapaian</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Skor KPI</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Skor Sebenar</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Edit</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Delete</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($kolaborasi as $key => $kolaborasis)
                      <tr>
                        <td>    
                          <div class="d-flex px-2 py-1">
                            <div class="d-flex flex-column justify-content-center">
                              <p class="mb-0 text-sm" value="{{$key + 1}}">{{$key + 1}}</p>
                            </div>
                          </div>
                        </td>
                        <td>
                          <p class="text-xs font-weight-bold mb-0" value="{{ $kolaborasis -> fungsi }}">{{ $kolaborasis -> fungsi }}</p>
                        </td>
                        <td class="align-middle text-center">
                          <span class="text-secondary text-xs font-weight-bold" value="{{ $kolaborasis -> bukti }}}">{{ $kolaborasis -> bukti }}</span>
                        </td>
                        <td class="align-middle text-center">
                          <span class="text-secondary text-xs font-weight-bold" value="{{ $kolaborasis -> peratus }}">{{ $kolaborasis -> peratus }}</span>
                        </td>
                        <td class="align-middle text-center">
                          <span class="text-secondary text-xs font-weight-bold" value="{{ $kolaborasis -> ukuran }}">{{ $kolaborasis -> ukuran }}</span>
                        </td>
                        <td class="align-middle text-center">
                          <span class="text-secondary text-xs font-weight-bold" value="{{ $kolaborasis -> threshold }}">{{ $kolaborasis -> threshold }}</span>
                        </td>
                        <td class="align-middle text-center">
                          <span class="text-secondary text-xs font-weight-bold" value="{{ $kolaborasis -> base }}">{{ $kolaborasis -> base }}</span>
                        </td>
                        <td class="align-middle text-center">
                          <span class="text-secondary text-xs font-weight-bold" value="{{ $kolaborasis -> stretch }}">{{ $kolaborasis -> stretch }}</span>
                        </td>
                        <td class="align-middle text-center">
                          <span class="text-secondary text-xs font-weight-bold" value="{{ $kolaborasis -> pencapaian }}">{{ $kolaborasis -> pencapaian }}</span>
                        </td>
                        <td class="align-middle text-center">
                          <span class="text-secondary text-xs font-weight-bold" value="{{ $kolaborasis -> skor_KPI }}">{{ $kolaborasis -> skor_KPI }}</span>
                        </td>
                        <td class="align-middle text-center">
                          <span class="text-secondary text-xs font-weight-bold" value="{{ round($kolaborasis -> skor_sebenar,2) }}">{{ round($kolaborasis -> skor_sebenar,2) }} %</span>
                        </td>
                        <td class="align-middle text-center">
                          <a href="{{ url('employee/edit/kpi/'.$kolaborasis->id) }}" class="btn btn-primary btn-sm" style="font-size: 10px" role="button"><i class="fa fa-edit"></i>&nbsp;Edit</a>
                        </td>
                        <td class="align-middle text-center">
                          <a href="{{ url('employee/delete/kpi/'.$kolaborasis->id) }}" class="btn btn-danger btn-sm"  style="font-size: 10px" role="button"><i class="fa fa-trash"></i>&nbsp;Delete</a>
                        </td>
                      </tr>
                    @endforeach
                  </tbody>
                  
                </table>

                @foreach ($kolaborasimaster as $kolaborasimasters)
                <div class="row">
                  <div class="col-sm-4 pt-3 " >
                    <div class="mb-4">
                        <label class="font-weight-bold " >Percentage KPI Master: </label>
                        <span class="text-secondary text-xs font-weight-bold" value="{{ $kolaborasimasters -> percent_master }}">{{ $kolaborasimasters -> percent_master }}</span>
                    </div>
                  </div> 
                  <div class="col-sm-4 pt-3 " >
                    <div class="mb-4">
                        <label class="font-weight-bold " >Link Bukti: </label>
                        <span class="text-secondary text-xs font-weight-bold" value="{{ $kolaborasimasters -> link }}">{{ $kolaborasimasters -> link }}</span>
                    </div>
                  </div> 
                  <div class="col-sm-4 pt-3 " >
                    <div class="mb-4">
                        <label class="font-weight-bold " >Objektif KPI: </label>
                        <span class="text-secondary text-xs font-weight-bold" value="{{ $kolaborasimasters -> objektif }}">{{ $kolaborasimasters -> objektif }}</span>
                    </div>
                  </div> 
                </div>
                @endforeach

                <div class="p-3" style="text-align: right">
                  {{-- <button type="submit" class="btn btn-sm btn-success" ><i class="fas fa-save"></i> Save</button>  --}}
                  @foreach ($kolaborasimaster as $kolaborasimasters)
                  <a href="{{ url('employee/edit/kpimaster8/'.$kolaborasimasters->id) }}" class="btn btn-primary btn-sm" style="font-size: 10px" role="button"><i class="fa fa-edit"></i>&nbsp;Edit</a> 
                  @endforeach                          
                </div>
              </div>
            </form>
            </div>
          </div>
        </div>
      </div>
    </div> 
    @endif

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