{{-- @extends('staff/layout/staff_template')
@section('title','Staff | Bukti')

@section('content') --}}
{{-- {{dd('john')}} --}}
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
          
          <div class="m-3">

            @if (session('message'))
              <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{ session('message') }}</strong>.
              </div>	
            @endif


          </div>

          <!-- Pencapaian Content  -->
        
          <div class="col-md-auto">
              <div class="card shadow rounded">
                  <div class="card-header font-weight-bold" style="text-transform:uppercase" >Borang Bukti / Metrik</div>

                  <div class="col-sm-auto p-3">
                      <div class="card">
                          <div class="m-3">

                              <label class="col-form-label font-weight-bold " style="font-size: 1rem;">Tahun :</label>
                              <input class="font-weight-bold btn-sm btn btn-outline-secondary ml-2" style="width: 100px" id="tahun" name="tahun" value="{{ $kpi->tahun }}" readonly> 
                              
                              <label class="col-form-label font-weight-bold ml-3" style="font-size: 1rem;">Bulan :</label>
                              <input class="font-weight-bold btn-sm btn btn-outline-secondary ml-2" style="width: 100px" id="bulan" name="bulan" value="{{ $kpi->bulan }}" readonly>     
                              
                              {{-- <form action="{{ url('employee/bukti/update') }}/{{ Auth::user()->id }} " method="post">  --}}
                                <form action="{{ url('employee/bukti/update') }}/{{ $bukti->id }} " method="post">   
                                @csrf
                              
                                  <div class="row">
                                      
                                      <div class="col-sm-3 pt-3 " >
                                          <div class="mb-4">
                                              <label class="font-weight-bold " >Tajuk Objektif</label>
                                              <input class="font-weight-bold bg-light form-control form-control-sm" id="bukti" name="bukti" value="{{ $kpi->objektif }}" readonly> 
                                          </div>
                                        </div>

                                        <div class="col-sm-3 pt-3 " >
                                          <div class="mb-4">
                                              <label class="font-weight-bold" >Fungsi</label>
                                              <select  class="form-control form-control-sm" id="fungsi" name="fungsi">
                                                <option selected readonly value="{{ $bukti->fungsi }}">{{ $bukti->fungsi }}</option>
                                                <option value="">N/A</option>
                                                <option value="Kad Skor Korporat" >Kad Skor Korporat</option>
                                                <option value="Kewangan" >Kewangan</option>
                                                <option value="Pelanggan" >Pelanggan</option>
                                                <option value="Kecemerlangan Operasi" >Kecemerlangan Operasi</option> 
                                                <option value="Manusia & Proses" >Manusia & Proses</option> 
                                                <option value="Kolaborasi" >Kolaborasi</option>
                                            </select>
                                          </div>
                                        </div>
                                                 
                                      <div class="col-sm-6 pt-3" >
                                          <label class="font-weight-bold" >Bukti terperinci dalam satu fail.</label>
                                              <div class="input-group mb-4">
                                                  {{-- <div class="input-group-prepend">
                                                      <span class="input-group-text" id="basic-addon3"><i class="fas fa-link"></i></span>
                                                  </div> --}}
                                                  {{-- <input type="url" class="form-control form-control-sm " id="basic-url" name="link" placeholder="Google Drive Link" value="{{ $bukti->link }}"> --}}
                                                  <div class="col-md-4" id="fileupload">
                                                    <div class="form-group">
                                                        <label class="control-label" style="font-weight:500">file Upload</label>
                                                        <div
                                                            x-data="{ isUploading: false, progress: 0 }"
                                                            x-on:livewire-upload-start="isUploading = true"
                                                            x-on:livewire-upload-finish="isUploading = false"
                                                            x-on:livewire-upload-error="isUploading = false"
                                                            x-on:livewire-upload-progress="progress = $event.detail.progress">
                                                        <div wire:loading wire:target="file_path"><i class="mdi mdi-loading mdi-spin mdi-24px"></i></div>
                                                            <input type="file" wire:model="file_path" id="file_path" name="file_path" class="dropify" />
                                                            @error('file_path') <span class="error" style="color:red"><b>{{ $message }}</b></span> @enderror
                                                            <div x-show="isUploading">
                                                                <progress max="100" x-bind:value="progress"></progress>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                              </div>
                                      </div>

                                  </div>
                                  
                              
                              
                              <div class="row m-auto">

                                {{-- Score Bukti --}}
                                  <table class="table table-bordered sticky-top bg-light bg-gradient text-dark">
                                    <tr>
                                        <th class="w-25" >Gred : 
                                            <input class="font-weight-bold w-50 bg-light btn-sm btn btn-outline-secondary ml-2" id="grade" name="grade" readonly>
                                        </th>
                                        <th class="w-25" >Overall Score : 
                                            <input class="font-weight-bold w-50 bg-light btn-sm btn btn-outline-secondary ml-2" id="percentage-total" name="total_score" value="0" disabled>
                                        </th>
                                        <th class="w-25" >Total Weightage : 
                                            <input class="font-weight-bold w-50 bg-light btn-sm btn btn-outline-secondary ml-2" id="percentage-weightage" name="weightage" readonly>
                                        </th>
                                    </tr>
                                </table>

                                <div class="pb-2">
                                  <button type="button" class="btn btn-cancel" ><a href="{{ route('employee_master') }}"><i class="fas fa-arrow-alt-circle-left"></i> Kembali</a></button>
                                  {{-- <a href="{{ url('staff/bukti/edit/'.$markah->id) }}" class="btn btn-warning btn-sm"  style="font-size: 10px" role="button"><i class="fa fa-edit"></i>&nbsp;Tambah Bukti</a> --}}
                                  <button type="button" class="btn btn-add" data-toggle="modal" data-target="#tambah"><i class="fas fa-plus-square"></i> Tambah Bukti</button>
                                  <button type="submit" class="btn btn-hantar"><i class="fas fa-save"></i> Simpan Bukti</button>
                                </div>

                              

                                <!-- Modal -->
                                <div class="modal fade" id="tambah" tabindex="-1">
                                  <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                      </div>
                                      <div class="modal-body">
                                        {{ $kpi->tahun }}
                                        {{ $bukti->id }}
                                        <input type="text" class="form-control form-control-sm " id="basic-url" name="bukti" placeholder="Google Drive Link" value="{{ $bukti->bukti }}">
                                        <input type="text" class="form-control form-control-sm " id="basic-url" name="link" placeholder="Google Drive Link" value="{{ $bukti->link }}">
                                      </div>
                                      <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                      </div>
                                    </div>
                                  </div>
                                </div>

                              </form>

                                  <div class="table-responsive">
                                    <table class="table table-bordered text-center">
                                        <thead class="thead-dark">
                                            <tr>
                                              <th rowspan="2">Metrik / Bukti</th>
                                              <th rowspan="2">Ukuran</th>
                                              <th rowspan="2">Peratus (%)</th>
                                              <th colspan="3">KPI Targets</th>
                                              <th rowspan="2">Pencapaian</th>
                                              <th rowspan="2">Skor KPI</th>
                                              <th rowspan="2">Skor Sebenar</th>
                                              <th rowspan="2"><i class="fa fa-cogs" style="font-size: 20px; width: auto;"></i></th>
                                            </tr>
                                            <tr>
                                              <th scope="col" >Threshold</th>
                                              <th scope="col" >Base</th>
                                              <th scope="col" >Stretch</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <!-- Display Body -->
                                        </tbody>
                                    </table> 
                                  </div>  

                              </div>

                            </div>
 
                      </div>
                  </div>
              </div>     
          </div>
      </form>

</body>
{{-- @endsection --}}