{{-- @extends('layouts.employee_template') --}}
{{-- @section('title','Staff | Pencapaian') --}}

@section('content')


  @extends('layouts.app')
  {{-- @extends('layouts.base') --}}
  {{-- @extends('layouts.navbars.auth.nav-profile')
  @extends('layouts.navbars.auth.nav')
  @extends('layouts.navbars.auth.sidebar')
  @extends('layouts.navbars.guest.login')
  @extends('layouts.navbars.guest.sign-up')

  @extends('layouts.footers.guest.with-socials')
  @extends('layouts.footers.guest.description')
  @extends('layouts.footers.auth.footer') --}}


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
                    <div class="card-header font-weight-bold" style="text-transform:uppercase" >Performance Form</div>
  
                    <div class="col-sm-auto p-3">
                        <div class="card">
                            <div class="m-3">
  
                            <form action="{{ url('employee/update/kpi/'.$kpi->id.'/'.$date_id.'/'.$user_id.'/'.$year.'/'.$month) }}" method="post">  
                                    @csrf
  
                                <?php
                                    // set start and end year range
                                    $yearArray = range(2021, 2050);
                                ?>
                                    <!-- List Dropdown -->
                                  <label for="year" class="col-form-label font-weight-bold" style="font-size: 1rem;">Year :</label>
                                  <input class="font-weight-bold btn-sm btn btn-outline-secondary ml-2" style="width: 100px" id="year" name="year" value="{{ $kpi->year }}" readonly>

                                  &nbsp;
                                  <label for="month" class="col-form-label font-weight-bold" style="font-size: 1rem;">Month :</label>
                                  <input class="font-weight-bold btn-sm btn btn-outline-secondary ml-2" style="width: 100px" id="month" name="month" value="{{ $kpi->month }}" readonly>
    
  
                                <div class="row">
  
                                    {{-- <div class="col-sm-4 pt-3 " >
                                      <div class="mb-4">
                                          <label class="font-weight-bold " >Objektif</label>
                                          <input type="text" class="form-control form-control-sm" id="objektif" name="objektif" value="{{ $kpi->objektif }}" >
                                      </div>
                                    </div> --}}
  
                                    {{-- <div class="col-sm-4 pt-3 " >
                                      <div class="mb-4" class="@error('fungsi') border border-danger rounded-3 @enderror">
                                            <label class="font-weight-bold" >Fungsi</label><br>
    
                                            <td style="word-break: break-all;" class="border-dark">
                                              <select class="form-select form-select-sm" id="fungsi" name="fungsi">
                                                <option selected class="bg-secondary text-white" value="{{ $kpi->fungsi }}" >{{ $kpi->fungsi }}</option>

                                                @if ($kpi->fungsi != "Kad Skor Korporat")
                                                @if (Auth::user()->position == 'Junior Non-Executive (NE1)' || Auth::user()->position == 'Senior Non-Executive (NE2)')
                                                @else
                                                <option value="Kad Skor Korporat" >Kad Skor Korporat</option>
                                                @endif
                                                @else
                                                @endif
        
                                                @if ($kpi->fungsi != "Kewangan")
                                                <option value="Kewangan" >Kewangan</option>
                                                @else
                                                @endif

                                                @if ($kpi->fungsi != "Pelanggan (Internal)")
                                                @if (Auth::user()->department == 'Human Resource (HR) & Administration')
                                                <option value="Pelanggan (Internal)" >Pelanggan (Internal)</option>
                                                @else
                                                @endif
                                                @else
                                                @endif
                                                
                                                @if ($kpi->fungsi != "Pelanggan (Outer)")
                                                <option value="Pelanggan (Outer)" >Pelanggan (Outer)</option>
                                                @else
                                                @endif

                                                @if ($kpi->fungsi != "Kecemerlangan Operasi")
                                                <option value="Kecemerlangan Operasi" >Kecemerlangan Operasi</option>
                                                @else
                                                @endif

                                                @if ($kpi->fungsi != "Manusia & Proses (Training)")
                                                <option value="Manusia & Proses (Training)" >Manusia & Proses (Training)</option> 
                                                @else
                                                @endif

                                                @if ($kpi->fungsi != "Manusia & Proses (NCROFI)")
                                                <option value="Manusia & Proses (NCROFI)" >Manusia & Proses (NCROFI)</option> 
                                                @else
                                                @endif

                                                @if ($kpi->fungsi != "Kolaborasi")
                                                <option value="Kolaborasi" >Kolaborasi</option>
                                                @else
                                                @endif
                                                
                                              </select>
                                            </td>
                                        </select>
                                        @error('fungsi') <div class="text-danger">{{ $message }}</div> @enderror
                                      </div>
    
                                    </div> --}}

                                    <div class="col-sm-4 pt-3 " >
                                      <div class="mb-4">
                                        <td class="font-weight-bold border-dark">
                                          <label class="font-weight-bold" >Fungsi</label>
                                          <input type="text" class="form-control " id="fungsi" name="fungsi" value="{{ $kpi->fungsi }}" readonly>
                                        </td>
                                      </div>
                                    </div>
  
                                    <div class="col-sm-4 pt-3 " >
                                      <div class="mb-4" class="@error('bukti') border border-danger rounded-3 @enderror">
                                          <label class="font-weight-bold" >Tajuk Metrik/Bukti</label>
                                          <textarea name="bukti" id="bukti" cols="30" rows="10">{{ $kpi->bukti }}</textarea>
                                          @error('bukti') <div class="text-danger">{{ $message }}</div> @enderror
                                      </div>
                                    </div>

                                    {{-- <div class="col-sm-4 pt-3 " >
                                      <div class="mb-4">
                                          <label class="font-weight-bold " >Link Bukti</label>
                                          <input type="text" class="form-control form-control-sm" id="link" name="link" value="{{ $kpi->link }}" >
                                      </div>
                                    </div> --}}
  
                                </div>
                              
                                <div class="row m-auto">
                                
                                
                                  {{-- Score KPI --}}
                                    {{-- <table class="table table-bordered sticky-top bg-light bg-gradient text-dark">
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

                                            <td class="font-weight-bold border-dark"  class="@error('peratus') border border-danger rounded-3 @enderror">
                                              <input type="text" pattern="[0-9]+" maxlength="3" class="input_ukuran w-75" id="peratus" name="peratus" onkeyup="masterClac();" value="{{ $kpi->peratus }}" min="0"  >
                                              @error('peratus') <div class="text-danger">{{ $message }}</div> @enderror
                                            </td>

                                            <td style="word-break: break-all;" class="border-dark" class="@error('peratus') border border-danger rounded-3 @enderror">
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
                                              @error('ukuran') <div class="text-danger">{{ $message }}</div> @enderror
                                            </td>



                                            <td class="border-dark" class="@error('threshold') border border-danger rounded-3 @enderror">
                                              <input type="text" pattern="[0-9]+" maxlength="3" class="input_threshold w-75" id="threshold" name="threshold" onkeyup="masterClac();" value="{{ $kpi->threshold }}" min="0" >
                                              @error('threshold') <div class="text-danger">{{ $message }}</div> @enderror
                                            </td>
                                      
                                            <td class="border-dark" class="@error('base') border border-danger rounded-3 @enderror">
                                              <input type="text" pattern="[0-9]+" maxlength="3" class="input_base w-75" id="base" name="base" onkeyup="masterClac();" value="{{ $kpi->base }}" min="0" >
                                              @error('base') <div class="text-danger">{{ $message }}</div> @enderror
                                            </td>
                                      
                                            <td class="border-dark" class="@error('stretch') border border-danger rounded-3 @enderror">
                                              <input type="text" pattern="[0-9]+" maxlength="3" class="input_stretch w-75" id="stretch" name="stretch" onkeyup="masterClac();" value="{{ $kpi->stretch }}" min="0" >
                                              @error('stretch') <div class="text-danger">{{ $message }}</div> @enderror
                                            </td>
                                      
                                            <td class="border-dark" class="@error('stretch') border border-danger rounded-3 @enderror">
                                              <input type="text" pattern="^\d*(\.\d{0,2})?$" maxlength="4" class="input_pencapaian w-75" id="pencapaian" name="pencapaian" onkeyup="masterClac();" value="{{ $kpi->pencapaian }}" min="0" >
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
                                </div>    
                                </div>
  
                                <div class="p-3" style="text-align: right">
                                  {{-- <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                                    Save
                                </button>  --}}
                                <button type="submit" class="btn btn-success btn-sm" style="font-size: 10px"><i class="fas fa-save"></i> Save</button>
                                  {{-- <button type="button" class="btn btn-cancel" ><a href="{{ route('add-date') }}"><i class="fas fa-window-close"></i> Back</a></button>  --}}
                                  {{-- <button type="button" class="btn btn-cancel" ><a href="{{ url('/employee/kpi/'.$date_id.'/'.$user_id.'/'.$year.'/'.$month) }}"><i class="fas fa-window-close"></i> Back</a></button>    --}}
                                  {{-- <button type="button" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150"><a style="color:white" href="{{ url('/employee/kpi/'.$date_id.'/'.$user_id.'/'.$year.'/'.$month) }}">
                                    Back </a>
                                </button>                       --}}
                                </div>
                              </form>
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
