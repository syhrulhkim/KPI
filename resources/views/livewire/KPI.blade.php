<div>
  <style>
.solid {border-style: solid;}
input[type=file]::file-selector-button {
  border: 2px solid #ffffff;
  padding: .2em .4em;
  border-radius: .7em;
  background-color: #252f40;
  border-color: #252f40;
  color: white;
  transition: 1s;
}

input[type=file]::file-selector-button:hover {
  background-color: #000000;
  border: 2px solid #000000;
}
  </style>  
<body>
{{--------------------------------------------------------------------------Start Testing -------------------------------------------------------------------------------}}
<div class="container-fluid py-4">
  <div class="row">
    <div class="col-lg-12">
      <div class="row">
        <div class="col-md-12 mb-lg-0 mb-4">
          {{-- <div class="m-3"> --}}
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

            @if ($weightage_master > 100) 
              <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Your Percentage for KPI Master exceed 100%. Please check back.</strong>
              </div>
            @else
            @endif

            @if ($status == 'Submitted' || $status == 'Signed By Manager' || $status == 'Completed') 
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
              <strong>Warning ! If you want to add, edit or delete any KPI, status of this KPI will set to default (Not Submitted)</strong>
            </div>
            @else
            @endif

          <div class="card mt-4">
            <div class="card-header pb-0 p-3">
              <div class="row">
                <div class="col-6 d-flex align-items-center">
                  @if ($weightage_master == 0 || $weightage_master == NULL) 
                  <h6>KAD SKOR - KPI <span style="color:red;">(Current total weightage = 0)</span></h6>
                  @else
                  <h6>KAD SKOR - KPI <span style="color:red;">(Current total weightage = {{$weightage_master}})</span></h6>
                  @endif
                </div>
              </div>
            </div>
            <form action="{{ url('/employee/save/kpi/'.$date_id.'/'.$user_id.'/'.$year.'/'.$month) }}" method="post" enctype="multipart/form-data">
            @csrf  
            <div class="card-body p-3">
              <div class="row">
                
                <div class="col-md-6">
                  <div class="mb-4" class="@error('fungsi') border border-danger rounded-3 @enderror">
                    <label class="font-weight-bold" >Fungsi</label>
                        <td style="word-break: break-all;" class="border-dark">
                          <select class="form-select card card-body border card-plain border-radius-lg d-flex align-items-center flex-row" id="fungsi" name="fungsi">
                            <option selected value="">-- Please Choose --</option>
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
                    </select>
                    @error('fungsi') <div class="text-danger">{{ $message }}</div> @enderror
                    <div class="col-md-4 mt-2" id="buktiupload">
                      <div class="form-group">
                          <label class="control-label" style="font-weight:500">Bukti Upload (Optional)</label>
                          <div
                              x-data="{ isUploading: false, progress: 0 }"
                              x-on:livewire-upload-start="isUploading = true"
                              x-on:livewire-upload-finish="isUploading = false"
                              x-on:livewire-upload-error="isUploading = false"
                              x-on:livewire-upload-progress="progress = $event.detail.progress">
                          <div wire:loading wire:target="bukti_path"><i class="mdi mdi-loading mdi-spin mdi-24px"></i></div>
                              <input type="file" wire:model="bukti_path" id="bukti_path" name="bukti_path" class="dropify" />
                              @error('bukti_path') <span class="error" style="color:red"><b>{{ $message }}</b></span> @enderror
                              <div x-show="isUploading">
                                  <progress max="100" x-bind:value="progress"></progress>
                              </div>
                          </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="mb-4" class="@error('bukti') border border-danger rounded-3 @enderror">
                    <label class="font-weight-bold" >Tajuk Metrik/Bukti</label>
                      <textarea class="form-control card card-body border card-plain border-radius-lg d-flex align-items-center flex-row" name="bukti" id="bukti" cols="60" rows="10" placeholder="Type your bukti here..."></textarea>
                      @error('bukti') <div class="text-danger">{{ $message }}</div> @enderror
                  </div>
                </div>
              </div>
              <div class="table-responsive">
                <table class="text-center">
                  <thead class="thead-dark">
                    <tr>
                      <th rowspan="2">(%)</th>
                      <th rowspan="2">Ukuran</th>
                      <th colspan="3">KPI Targets</th>
                      <th rowspan="2">Pencapaian</th>
                      <th rowspan="2">Skor KPI</th>
                      <th rowspan="2">Skor Sebenar</th>
                    </tr>
                    <tr class="table table-bordered">
                      <th scope="col" >Threshold</th>
                      <th scope="col" >Base</th>
                      <th scope="col" >Stretch</th>
                    </tr>
                  </thead>
                  <tbody>
                      <tr>
                        <td class="border-dark" class="@error('peratus') border border-danger rounded-3 @enderror">
                          <input type="text" class="form-control" pattern="[0-9]+" maxlength="3" class="input_ukuran w-75" id="peratus" name="peratus" onkeyup="masterClac();" min="0"  >
                          @error('peratus') <div class="text-danger">{{ $message }}</div> @enderror
                        </td>

                        <td style="word-break: break-all;" class="border-dark" class="@error('peratus') border border-danger rounded-3 @enderror">
                          <select class="form-select " id="ukuran" name="ukuran">
                            <option selected disabled value=""></option>
                            <option value="Unit">Unit</option>
                            <option value="Quantity" >Quantity</option>
                            <option value="Ratio" >Ratio</option>
                            <option value="Rating" >Rating</option>
                            <option value="Percentage (%)" >Percentage(%)</option>  
                            <option value="Date (dd/mm/yyyy)"  >Date (dd/mm/yyyy)</option> 
                            <option value="Hours" >Hours</option> 
                            <option value="RM (billion)" >RM (billion)</option>
                            <option value="RM (million)" >RM (million)</option> 
                            <option value="RM (*000)" >RM (*000)</option>
                          </select>
                          @error('ukuran') <div class="text-danger">{{ $message }}</div> @enderror
                        </td>

                        <td class="border-dark" class="@error('threshold') border border-danger rounded-3 @enderror">
                          <input type="text" class="form-control" pattern="[0-9]+" maxlength="6" class="input_threshold w-75" id="threshold" name="threshold" onkeyup="masterClac();" min="0" >
                          @error('threshold') <div class="text-danger">{{ $message }}</div> @enderror
                        </td>
                  
                        <td class="border-dark" class="@error('base') border border-danger rounded-3 @enderror">
                          <input type="text" class="form-control" pattern="[0-9]+" maxlength="6" class="input_base w-75" id="base" name="base" onkeyup="masterClac();" min="0" >
                          @error('base') <div class="text-danger">{{ $message }}</div> @enderror
                        </td>
                  
                        <td class="border-dark" class="@error('stretch') border border-danger rounded-3 @enderror">
                          <input type="text" class="form-control" pattern="[0-9]+" maxlength="6" class="input_stretch w-75" id="stretch" name="stretch" onkeyup="masterClac();" min="0" >
                          @error('stretch') <div class="text-danger">{{ $message }}</div> @enderror
                        </td>
                  
                        <td class="border-dark" class="@error('pencapaian') border border-danger rounded-3 @enderror">
                          <input type="text" class="form-control" pattern="^\d*(\.\d{0,2})?$" maxlength="7" class="input_pencapaian w-75" id="pencapaian" name="pencapaian" onkeyup="masterClac();" min="0" >
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
              <div class="mt-2" style="text-align: right">
                <div class="col-12 text-end">
                  <button class="btn bg-gradient-dark mb-0" type="submit" href="javascript:;"><i class="fas fa-plus"></i>&nbsp;&nbsp;SAVE</button>
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

  @if ($kadskorcount == 0) {{--ADA--}}
  @else
  <div class="row">
    <div class="col-12">
      <div class="card mt-4">
        <div class="card-header pb-0">
          @if ($weightage_kadskor == 0 || $weightage_kadskor == NULL)
          <h6>KAD SKOR KORPORAT <span style="color:red;">(Current weightage = 0)</span></h6>
          @else
          <h6>KAD SKOR KORPORAT <span style="color:red;">(Current weightage = {{$weightage_kadskor}})</span></h6>
          @endif
          @foreach ($kadskor as $key => $kadskors)
          @endforeach
        </div>
        <div class="card-body px-0 pt-0 pb-2">
          <div class="p-0">
            <table class="table align-items-center justify-content-center mb-0">
              <thead>
                <tr>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                  {{-- <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Fungsi</th> --}}
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Metrik / Bukti</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">File Bukti</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">%</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Ukuran</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder text-center opacity-7 ps-2">KPI Target</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Skor KPI</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Skor Sebenar</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                @foreach ($kadskor as $key => $kadskors)
                <tr>
                  <td>    
                    <div class="d-flex px-3">
                      <div class="my-auto">
                        <h6 class="mb-0 text-sm" value="{{$key + 1}}">{{$key + 1}}</h6>
                      </div>
                    </div>
                  </td>
                  <td>
                    <pre class="text-sm font-weight-bold mb-0" value="{{ $kadskors -> bukti }}">{{ $kadskors -> bukti }}</pre>
                  </td>
                  <td>
                    @if ($kadskors->bukti_path == '')
                    {{-- {{ URL::to(''.$kadskors->bukti_path.'') }} --}}
                    <a href=" {{ URL::to(''.$kadskors->bukti_path.'') }}" style="color:blue;text-decoration:underline;font-size:13.5px"; target="_blank"></a>
                    @else
                    <a href=" {{ URL::to(''.$kadskors->bukti_path.'') }}" style="color:blue;text-decoration:underline;font-size:13.5px"; target="_blank">View</a>
                    @endif
                  </td>
                  <td>
                    <span class="text-center text-sm font-weight-bold mb-0" value="{{ $kadskors -> peratus }}">{{ $kadskors -> peratus }}</span>
                  </td>
                  <td>
                    <span class="text-center text-sm font-weight-bold mb-0" value="{{ $kadskors -> ukuran }}">{{ $kadskors -> ukuran }}</span>
                  </td>
                  <td class="align-middle text-center">
                    <div class="d-flex align-items-center justify-content-center">
                      <span class="me-2 text-xs font-weight-bold" value="{{ $kadskors -> pencapaian }}">{{ $kadskors -> pencapaian }}/{{ $kadskors -> stretch }}</span>
                      <div>
                        @if ((($kadskors->pencapaian/$kadskors->stretch)*100) >= 100)
                          <div class="progress">
                            <div class="progress-bar bg-gradient-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"></div>
                          </div>
                        @elseif((($kadskors->pencapaian/$kadskors->stretch)*100) >= 90)
                          <div class="progress">
                            <div class="progress-bar bg-gradient-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 90%;"></div>
                          </div>
                        @elseif((($kadskors->pencapaian/$kadskors->stretch)*100) >= 80)
                          <div class="progress">
                            <div class="progress-bar bg-gradient-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 80%;"></div>
                          </div>
                        @elseif((($kadskors->pencapaian/$kadskors->stretch)*100) >= 70)
                          <div class="progress">
                            <div class="progress-bar bg-gradient-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 70%;"></div>
                          </div>
                        @elseif((($kadskors->pencapaian/$kadskors->stretch)*100) >= 60)
                          <div class="progress">
                            <div class="progress-bar bg-gradient-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;"></div>
                          </div>
                        @elseif((($kadskors->pencapaian/$kadskors->stretch)*100) >= 50)
                          <div class="progress">
                            <div class="progress-bar bg-gradient-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 50%;"></div>
                          </div>
                        @elseif((($kadskors->pencapaian/$kadskors->stretch)*100) >= 40)
                          <div class="progress">
                            <div class="progress-bar bg-gradient-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 40%;"></div>
                          </div>
                        @elseif((($kadskors->pencapaian/$kadskors->stretch)*100) >= 30)
                          <div class="progress">
                            <div class="progress-bar bg-gradient-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 30%;"></div>
                          </div>
                        @elseif((($kadskors->pencapaian/$kadskors->stretch)*100) >= 20)
                          <div class="progress">
                            <div class="progress-bar bg-gradient-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 20%;"></div>
                          </div>
                        @elseif((($kadskors->pencapaian/$kadskors->stretch)*100) >= 10)
                          <div class="progress">
                            <div class="progress-bar bg-gradient-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 10%;"></div>
                          </div>
                        @elseif((($kadskors->pencapaian/$kadskors->stretch)*100) <= 10)
                          <div class="progress">
                            <div class="progress-bar bg-gradient-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 5%;"></div>
                          </div>
                        @elseif((($kadskors->pencapaian/$kadskors->stretch)*100) == 00)
                          <div class="progress">
                            <div class="progress-bar bg-gradient-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>
                          </div>
                        @endif
                      </div>
                    </div>
                  </td>
                  <td>
                    <span class="text-center text-sm font-weight-bold mb-0" value="{{ $kadskors -> skor_KPI }}">{{ $kadskors -> skor_KPI }}</span>
                  </td>
                  <td>
                    <span class="text-center text-sm font-weight-bold mb-0" value="{{ round($kadskors -> skor_sebenar,2) }} ">{{ round($kadskors -> skor_sebenar,2) }} %</span>
                  </td>
                  <td class="align-middle">
                    <div class="col-lg-6 col-5 my-auto text-middle">
                      <div class="dropdown float-lg-start pe-4">
                        <a class="cursor-pointer" id="dropdownTable" data-bs-toggle="dropdown" aria-expanded="false">
                          <i class="fa fa-ellipsis-v text-secondary"></i>
                        </a>
                        <ul class="dropdown-menu px-2 py-3 ms-n4 ms-n5" aria-labelledby="dropdownTable">
                          <li><a href="{{ url('employee/edit/kpi/'.$kadskors->id.'/'.$date_id.'/'.$user_id.'/'.$year.'/'.$month) }}" class="dropdown-item border-radius-md" role="button">Edit</a></li>
                          <li><button type="button" wire:click="selectItem({{$kadskors->kpimasters->kpiall->id}} , {{$kadskors->kpimasters->id}} , {{$kadskors->id}})" class="dropdown-item border-radius-md data-delete" style="color: red;"  data-form="{{$kadskors->id}}">Delete</button></li>
                        </ul>
                      </div>
                    </div>
                  </td>
                </tr>
                <tr>
                </tr>
                @endforeach
              </tbody>
            </table>
            @foreach ($kadskormaster as $kadskormasters)
            <div class="card-body pt-4 p-3">
              <ul class="list-group">
                <li class="list-group-item border-0 d-flex p-4 mb-2 bg-gray-100 border-radius-lg">
                  <div class="d-flex flex-column">
                    <span class="mb-2 text-xs">Percentage KPI Master :<span class="text-dark font-weight-bold ms-sm-1">{{ $kadskormasters -> percent_master }}</span></span>
                    <span class="mb-2 text-xs">Link Bukti :<span class="text-dark ms-sm-1 font-weight-bold">
                      @if ($kadskormasters->link == '')
                      <a href=" {{ $kadskormasters -> link }}" style="color:blue;text-decoration:underline;font-size:13.5px"; target="_blank"></a>
                      @else
                      <a href=" {{ $kadskormasters -> link }}" style="color:blue;text-decoration:underline;font-size:13.5px"; target="_blank">{{ $kadskormasters -> link }}</a>
                      @endif
                      </span></span>
                    <span class="text-xs">Objektif KPI :<span class="text-dark ms-sm-1 font-weight-bold">{{ $kadskormasters -> objektif }}</span></span>
                  </div>
                  <div class="ms-auto text-end">
                    <a href="{{ url('employee/edit/kpimaster1/'.$kadskormasters->id.'/'.$date_id.'/'.$user_id.'/'.$year.'/'.$month) }}" class="btn btn-link text-dark px-3 mb-0" href="javascript:;"><i class="fas fa-pencil-alt text-dark me-2" aria-hidden="true"></i>Edit</a>
                    {{-- <td rowspan="3" class="float-end"><a href="{{ url('employee/edit/kpimaster1/'.$kadskormasters->id.'/'.$date_id.'/'.$user_id.'/'.$year.'/'.$month) }}" class="btn btn-dark btn-sm" style="font-size: 10px" role="button"><i class="fa fa-edit"></i>&nbsp;Edit KPI Master</a></td> --}}
                  </div>
                </li>
              </ul>
            </div>
            @endforeach  
          </div>
        </div>
      </div>
    </div>
  </div>
  @endif

  @if ($kewangancount == 0) {{--ADA--}}
  @else
  <div class="row">
    <div class="col-12">
      <div class="card mt-4">
        <div class="card-header pb-0">
          @if ($weightage_kewangan == 0 || $weightage_kewangan == NULL)
          <h6>KEWANGAN <span style="color:red;">(Current weightage = 0)</span></h6>
          @else
          <h6>KEWANGAN <span style="color:red;">(Current weightage = {{$weightage_kewangan}})</span></h6>
          @endif

        </div>
        <div class="card-body px-0 pt-0 pb-2">
          <div class="p-0">
            <table class="table align-items-center justify-content-center mb-0">
              <thead>
                <tr>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Metrik / Bukti</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">File Bukti</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">%</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Ukuran</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder text-center opacity-7 ps-2">KPI Target</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Skor KPI</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Skor Sebenar</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                @foreach ($kewangan as $key => $kewangans)
                <tr>
                  <td>    
                    <div class="d-flex px-3">
                      <div class="my-auto">
                        <h6 class="mb-0 text-sm" value="{{$key + 1}}">{{$key + 1}}</h6>
                      </div>
                    </div>
                  </td>
                  <td>
                    <pre class="text-sm font-weight-bold mb-0" value="{{ $kewangans -> bukti }}">{{ $kewangans -> bukti }}</pre>
                  </td>
                  <td>
                    @if ($kewangans->bukti_path == '')
                    <a href=" {{ URL::to(''.$kewangans->bukti_path.'') }}" style="color:blue;text-decoration:underline;font-size:13.5px"; target="_blank"></a>
                    @else
                    <a href=" {{ URL::to(''.$kewangans->bukti_path.'') }}" style="color:blue;text-decoration:underline;font-size:13.5px"; target="_blank">View</a>
                    @endif
                  </td>
                  <td>
                    <span class="text-center text-sm font-weight-bold mb-0" value="{{ $kewangans -> peratus }}">{{ $kewangans -> peratus }}</span>
                  </td>
                  <td>
                    <span class="text-center text-sm font-weight-bold mb-0" value="{{ $kewangans -> ukuran }}">{{ $kewangans -> ukuran }}</span>
                  </td>
                  <td class="align-middle text-center">
                    <div class="d-flex align-items-center justify-content-center">
                      <span class="me-2 text-xs font-weight-bold" value="{{ $kewangans -> pencapaian }}">{{ $kewangans -> pencapaian }}/{{ $kewangans -> stretch }}</span>
                      <div>
                        @if ((($kewangans->pencapaian/$kewangans->stretch)*100) >= 100)
                          <div class="progress">
                            <div class="progress-bar bg-gradient-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"></div>
                          </div>
                        @elseif((($kewangans->pencapaian/$kewangans->stretch)*100) >= 90)
                          <div class="progress">
                            <div class="progress-bar bg-gradient-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 90%;"></div>
                          </div>
                        @elseif((($kewangans->pencapaian/$kewangans->stretch)*100) >= 80)
                          <div class="progress">
                            <div class="progress-bar bg-gradient-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 80%;"></div>
                          </div>
                        @elseif((($kewangans->pencapaian/$kewangans->stretch)*100) >= 70)
                          <div class="progress">
                            <div class="progress-bar bg-gradient-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 70%;"></div>
                          </div>
                        @elseif((($kewangans->pencapaian/$kewangans->stretch)*100) >= 60)
                          <div class="progress">
                            <div class="progress-bar bg-gradient-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;"></div>
                          </div>
                        @elseif((($kewangans->pencapaian/$kewangans->stretch)*100) >= 50)
                          <div class="progress">
                            <div class="progress-bar bg-gradient-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 50%;"></div>
                          </div>
                        @elseif((($kewangans->pencapaian/$kewangans->stretch)*100) >= 40)
                          <div class="progress">
                            <div class="progress-bar bg-gradient-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 40%;"></div>
                          </div>
                        @elseif((($kewangans->pencapaian/$kewangans->stretch)*100) >= 30)
                          <div class="progress">
                            <div class="progress-bar bg-gradient-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 30%;"></div>
                          </div>
                        @elseif((($kewangans->pencapaian/$kewangans->stretch)*100) >= 20)
                          <div class="progress">
                            <div class="progress-bar bg-gradient-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 20%;"></div>
                          </div>
                        @elseif((($kewangans->pencapaian/$kewangans->stretch)*100) >= 10)
                          <div class="progress">
                            <div class="progress-bar bg-gradient-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 10%;"></div>
                          </div>
                        @elseif((($kewangans->pencapaian/$kewangans->stretch)*100) <= 10)
                          <div class="progress">
                            <div class="progress-bar bg-gradient-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 5%;"></div>
                          </div>
                        @elseif((($kewangans->pencapaian/$kewangans->stretch)*100) == 00)
                          <div class="progress">
                            <div class="progress-bar bg-gradient-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>
                          </div>
                        @endif
                      </div>
                    </div>
                  </td>
                  <td>
                    <span class="text-center text-sm font-weight-bold mb-0" value="{{ $kewangans -> skor_KPI }}">{{ $kewangans -> skor_KPI }}</span>
                  </td>
                  <td>
                    <span class="text-center text-sm font-weight-bold mb-0" value="{{ round($kewangans -> skor_sebenar,2) }} ">{{ round($kewangans -> skor_sebenar,2) }} %</span>
                  </td>
                  {{-- <td class="align-middle">
                    <button class="btn btn-link text-secondary mb-0">
                      <i class="fa fa-ellipsis-v text-xs"></i>
                    </button>
                  </td> --}}
                  <td class="align-middle">
                    <div class="col-lg-6 col-5 my-auto text-middle">
                      <div class="dropdown float-lg-start pe-4">
                        <a class="cursor-pointer" id="dropdownTable" data-bs-toggle="dropdown" aria-expanded="false">
                          <i class="fa fa-ellipsis-v text-secondary"></i>
                        </a>
                        <ul class="dropdown-menu px-2 py-3 ms-n4 ms-n5" aria-labelledby="dropdownTable">
                          <li><a href="{{ url('employee/edit/kpi/'.$kewangans->id.'/'.$date_id.'/'.$user_id.'/'.$year.'/'.$month) }}" class="dropdown-item border-radius-md" role="button">Edit</a></li>
                          <li><button type="button" wire:click="selectItem({{$kewangans->kpimasters->kpiall->id}} , {{$kewangans->kpimasters->id}} , {{$kewangans->id}})" class="dropdown-item border-radius-md data-delete" style="color: red;"  data-form="{{$kewangans->id}}">Delete</button></li>
                        </ul>
                      </div>
                    </div>
                  </td>
                </tr>
                <tr>
                </tr>
                @endforeach
              </tbody>
            </table>
            @foreach ($kewanganmaster as $kewanganmasters)
            <div class="card-body pt-4 p-3">
              <ul class="list-group">
                <li class="list-group-item border-0 d-flex p-4 mb-2 bg-gray-100 border-radius-lg">
                  <div class="d-flex flex-column">
                    <span class="mb-2 text-xs">Percentage KPI Master :<span class="text-dark font-weight-bold ms-sm-1">{{ $kewanganmasters -> percent_master }}</span></span>
                    <span class="mb-2 text-xs">Link Bukti :<span class="text-dark ms-sm-1 font-weight-bold">
                      @if ($kewanganmasters->link == '')
                      <a href=" {{ $kewanganmasters -> link }}" style="color:blue;text-decoration:underline;font-size:13.5px"; target="_blank"></a>
                      @else
                      <a href=" {{ $kewanganmasters -> link }}" style="color:blue;text-decoration:underline;font-size:13.5px"; target="_blank">{{ $kewanganmasters -> link }}</a>
                      @endif
                      </span></span>
                    <span class="text-xs">Objektif KPI :<span class="text-dark ms-sm-1 font-weight-bold">{{ $kewanganmasters -> objektif }}</span></span>
                  </div>
                  <div class="ms-auto text-end">
                    <a href="{{ url('employee/edit/kpimaster2/'.$kewanganmasters->id.'/'.$date_id.'/'.$user_id.'/'.$year.'/'.$month) }}" class="btn btn-link text-dark px-3 mb-0" href="javascript:;"><i class="fas fa-pencil-alt text-dark me-2" aria-hidden="true"></i>Edit</a>
                  </div>
                </li>
              </ul>
            </div>
            @endforeach  
          </div>
        </div>
      </div>
    </div>
  </div>
  @endif

  @if ($pelangganIcount == 0) {{--ADA--}}
  @else
  <div class="row">
    <div class="col-12">
      <div class="card mt-4">
        <div class="card-header pb-0">
          @if ($weightage_pelangganI == 0 || $weightage_pelangganI == NULL)
          <h6>PELANGGAN (INTERNAL) <span style="color:red;">(Current weightage = 0)</span></h6>
          @else
          <h6>PELANGGAN (INTERNAL) <span style="color:red;">(Current weightage = {{$weightage_pelangganI}})</span></h6>
          @endif

        </div>
        <div class="card-body px-0 pt-0 pb-2">
          <div class="p-0">
            @csrf
            <table class="table align-items-center justify-content-center mb-0">
              <thead>
                <tr>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Metrik / Bukti</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">File Bukti</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">%</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Ukuran</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder text-center opacity-7 ps-2">KPI Target</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Skor KPI</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Skor Sebenar</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                @foreach ($pelangganI as $key => $pelangganIs)
                <tr>
                  <td>    
                    <div class="d-flex px-3">
                      <div class="my-auto">
                        <h6 class="mb-0 text-sm" value="{{$key + 1}}">{{$key + 1}}</h6>
                      </div>
                    </div>
                  </td>
                  <td>
                    <pre class="text-sm font-weight-bold mb-0" value="{{ $pelangganIs -> bukti }}">{{ $pelangganIs -> bukti }}</pre>
                  </td>
                  <td>
                    @if ($pelangganIs->bukti_path == '')
                    <a href=" {{ URL::to(''.$pelangganIs->bukti_path.'') }}" style="color:blue;text-decoration:underline;font-size:13.5px"; target="_blank"></a>
                    @else
                    <a href=" {{ URL::to(''.$pelangganIs->bukti_path.'') }}" style="color:blue;text-decoration:underline;font-size:13.5px"; target="_blank">View</a>
                    @endif
                  </td>
                  <td>
                    <span class="text-center text-sm font-weight-bold mb-0" value="{{ $pelangganIs -> peratus }}">{{ $pelangganIs -> peratus }}</span>
                  </td>
                  <td>
                    <span class="text-center text-sm font-weight-bold mb-0" value="{{ $pelangganIs -> ukuran }}">{{ $pelangganIs -> ukuran }}</span>
                  </td>
                  <td class="align-middle text-center">
                    <div class="d-flex align-items-center justify-content-center">
                      <span class="me-2 text-xs font-weight-bold" value="{{ $pelangganIs -> pencapaian }}">{{ $pelangganIs -> pencapaian }}/{{ $pelangganIs -> stretch }}</span>
                      <div>
                        @if ((($pelangganIs->pencapaian/$pelangganIs->stretch)*100) >= 100)
                          <div class="progress">
                            <div class="progress-bar bg-gradient-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"></div>
                          </div>
                        @elseif((($pelangganIs->pencapaian/$pelangganIs->stretch)*100) >= 90)
                          <div class="progress">
                            <div class="progress-bar bg-gradient-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 90%;"></div>
                          </div>
                        @elseif((($pelangganIs->pencapaian/$pelangganIs->stretch)*100) >= 80)
                          <div class="progress">
                            <div class="progress-bar bg-gradient-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 80%;"></div>
                          </div>
                        @elseif((($pelangganIs->pencapaian/$pelangganIs->stretch)*100) >= 70)
                          <div class="progress">
                            <div class="progress-bar bg-gradient-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 70%;"></div>
                          </div>
                        @elseif((($pelangganIs->pencapaian/$pelangganIs->stretch)*100) >= 60)
                          <div class="progress">
                            <div class="progress-bar bg-gradient-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;"></div>
                          </div>
                        @elseif((($pelangganIs->pencapaian/$pelangganIs->stretch)*100) >= 50)
                          <div class="progress">
                            <div class="progress-bar bg-gradient-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 50%;"></div>
                          </div>
                        @elseif((($pelangganIs->pencapaian/$pelangganIs->stretch)*100) >= 40)
                          <div class="progress">
                            <div class="progress-bar bg-gradient-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 40%;"></div>
                          </div>
                        @elseif((($pelangganIs->pencapaian/$pelangganIs->stretch)*100) >= 30)
                          <div class="progress">
                            <div class="progress-bar bg-gradient-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 30%;"></div>
                          </div>
                        @elseif((($pelangganIs->pencapaian/$pelangganIs->stretch)*100) >= 20)
                          <div class="progress">
                            <div class="progress-bar bg-gradient-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 20%;"></div>
                          </div>
                        @elseif((($pelangganIs->pencapaian/$pelangganIs->stretch)*100) >= 10)
                          <div class="progress">
                            <div class="progress-bar bg-gradient-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 10%;"></div>
                          </div>
                        @elseif((($pelangganIs->pencapaian/$pelangganIs->stretch)*100) <= 10)
                          <div class="progress">
                            <div class="progress-bar bg-gradient-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 5%;"></div>
                          </div>
                        @elseif((($pelangganIs->pencapaian/$pelangganIs->stretch)*100) == 00)
                          <div class="progress">
                            <div class="progress-bar bg-gradient-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>
                          </div>
                        @endif
                      </div>
                    </div>
                  </td>
                  <td>
                    <span class="text-center text-sm font-weight-bold mb-0" value="{{ $pelangganIs -> skor_KPI }}">{{ $pelangganIs -> skor_KPI }}</span>
                  </td>
                  <td>
                    <span class="text-center text-sm font-weight-bold mb-0" value="{{ round($pelangganIs -> skor_sebenar,2) }} ">{{ round($pelangganIs -> skor_sebenar,2) }} %</span>
                  </td>
                  {{-- <td class="align-middle">
                    <button class="btn btn-link text-secondary mb-0">
                      <i class="fa fa-ellipsis-v text-xs"></i>
                    </button>
                  </td> --}}
                  <td class="align-middle">
                    <div class="col-lg-6 col-5 my-auto text-middle">
                      <div class="dropdown float-lg-start pe-4">
                        <a class="cursor-pointer" id="dropdownTable" data-bs-toggle="dropdown" aria-expanded="false">
                          <i class="fa fa-ellipsis-v text-secondary"></i>
                        </a>
                        <ul class="dropdown-menu px-2 py-3 ms-n4 ms-n5" aria-labelledby="dropdownTable">
                          <li><a href="{{ url('employee/edit/kpi/'.$pelangganIs->id.'/'.$date_id.'/'.$user_id.'/'.$year.'/'.$month) }}" class="dropdown-item border-radius-md" role="button">Edit</a></li>
                          <li><button type="button" wire:click="selectItem({{$pelangganIs->kpimasters->kpiall->id}} , {{$pelangganIs->kpimasters->id}} , {{$pelangganIs->id}})" class="dropdown-item border-radius-md data-delete" style="color: red;"  data-form="{{$pelangganIs->id}}">Delete</button></li>
                        </ul>
                      </div>
                    </div>
                  </td>
                </tr>
                <tr>
                </tr>
                @endforeach
              </tbody>
            </table>
            @foreach ($pelangganImaster as $pelangganImasters)
            <div class="card-body pt-4 p-3">
              <ul class="list-group">
                <li class="list-group-item border-0 d-flex p-4 mb-2 bg-gray-100 border-radius-lg">
                  <div class="d-flex flex-column">
                    <span class="mb-2 text-xs">Percentage KPI Master :<span class="text-dark font-weight-bold ms-sm-1">{{ $pelangganImasters -> percent_master }}</span></span>
                    <span class="mb-2 text-xs">Link Bukti :<span class="text-dark ms-sm-1 font-weight-bold">
                      @if ($pelangganImasters->link == '')
                      <a href=" {{ $pelangganImasters -> link }}" style="color:blue;text-decoration:underline;font-size:13.5px"; target="_blank"></a>
                      @else
                      <a href=" {{ $pelangganImasters -> link }}" style="color:blue;text-decoration:underline;font-size:13.5px"; target="_blank">{{ $pelangganImasters -> link }}</a>
                      @endif
                      </span></span>
                    <span class="text-xs">Objektif KPI :<span class="text-dark ms-sm-1 font-weight-bold">{{ $pelangganImasters -> objektif }}</span></span>
                  </div>
                  <div class="ms-auto text-end">
                    <a href="{{ url('employee/edit/kpimaster3/'.$pelangganImasters->id.'/'.$date_id.'/'.$user_id.'/'.$year.'/'.$month) }}" class="btn btn-link text-dark px-3 mb-0" href="javascript:;"><i class="fas fa-pencil-alt text-dark me-2" aria-hidden="true"></i>Edit</a>
                  </div>
                </li>
              </ul>
            </div>
            @endforeach  
          </div>
        </div>
      </div>
    </div>
  </div>
  @endif

  @if ($pelangganIIcount == 0) {{--ADA--}}
  @else
  <div class="row">
    <div class="col-12">
      <div class="card mt-4">
        <div class="card-header pb-0">
          @if ($weightage_pelangganII == 0 || $weightage_pelangganII == NULL)
          <h6>PELANGGAN (OUTER) <span style="color:red;">(Current weightage = 0)</span></h6>
          @else
          <h6>PELANGGAN (OUTER) <span style="color:red;">(Current weightage = {{$weightage_pelangganII}})</span></h6>
          @endif

        </div>
        <div class="card-body px-0 pt-0 pb-2">
          <div class="p-0">
            @csrf
            <table class="table align-items-center justify-content-center mb-0">
              <thead>
                <tr>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Metrik / Bukti</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">File Bukti</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">%</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Ukuran</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder text-center opacity-7 ps-2">KPI Target</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Skor KPI</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Skor Sebenar</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                @foreach ($pelangganII as $key => $pelangganIIs)
                <tr>
                  <td>    
                    <div class="d-flex px-3">
                      <div class="my-auto">
                        <h6 class="mb-0 text-sm" value="{{$key + 1}}">{{$key + 1}}</h6>
                      </div>
                    </div>
                  </td>
                  <td>
                    <pre class="text-sm font-weight-bold mb-0" value="{{ $pelangganIIs -> bukti }}">{{ $pelangganIIs -> bukti }}</pre>
                  </td>
                  <td>
                    @if ($pelangganIIs->bukti_path == '')
                    <a href=" {{ URL::to(''.$pelangganIIs->bukti_path.'') }}" style="color:blue;text-decoration:underline;font-size:13.5px"; target="_blank"></a>
                    @else
                    <a href=" {{ URL::to(''.$pelangganIIs->bukti_path.'') }}" style="color:blue;text-decoration:underline;font-size:13.5px"; target="_blank">View</a>
                    @endif
                  </td>
                  <td>
                    <span class="text-center text-sm font-weight-bold mb-0" value="{{ $pelangganIIs -> peratus }}">{{ $pelangganIIs -> peratus }}</span>
                  </td>
                  <td>
                    <span class="text-center text-sm font-weight-bold mb-0" value="{{ $pelangganIIs -> ukuran }}">{{ $pelangganIIs -> ukuran }}</span>
                  </td>
                  <td class="align-middle text-center">
                    <div class="d-flex align-items-center justify-content-center">
                      <span class="me-2 text-xs font-weight-bold" value="{{ $pelangganIIs -> pencapaian }}">{{ $pelangganIIs -> pencapaian }}/{{ $pelangganIIs -> stretch }}</span>
                      <div>
                        @if ((($pelangganIIs->pencapaian/$pelangganIIs->stretch)*100) >= 100)
                          <div class="progress">
                            <div class="progress-bar bg-gradient-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"></div>
                          </div>
                        @elseif((($pelangganIIs->pencapaian/$pelangganIIs->stretch)*100) >= 90)
                          <div class="progress">
                            <div class="progress-bar bg-gradient-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 90%;"></div>
                          </div>
                        @elseif((($pelangganIIs->pencapaian/$pelangganIIs->stretch)*100) >= 80)
                          <div class="progress">
                            <div class="progress-bar bg-gradient-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 80%;"></div>
                          </div>
                        @elseif((($pelangganIIs->pencapaian/$pelangganIIs->stretch)*100) >= 70)
                          <div class="progress">
                            <div class="progress-bar bg-gradient-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 70%;"></div>
                          </div>
                        @elseif((($pelangganIIs->pencapaian/$pelangganIIs->stretch)*100) >= 60)
                          <div class="progress">
                            <div class="progress-bar bg-gradient-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;"></div>
                          </div>
                        @elseif((($pelangganIIs->pencapaian/$pelangganIIs->stretch)*100) >= 50)
                          <div class="progress">
                            <div class="progress-bar bg-gradient-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 50%;"></div>
                          </div>
                        @elseif((($pelangganIIs->pencapaian/$pelangganIIs->stretch)*100) >= 40)
                          <div class="progress">
                            <div class="progress-bar bg-gradient-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 40%;"></div>
                          </div>
                        @elseif((($pelangganIIs->pencapaian/$pelangganIIs->stretch)*100) >= 30)
                          <div class="progress">
                            <div class="progress-bar bg-gradient-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 30%;"></div>
                          </div>
                        @elseif((($pelangganIIs->pencapaian/$pelangganIIs->stretch)*100) >= 20)
                          <div class="progress">
                            <div class="progress-bar bg-gradient-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 20%;"></div>
                          </div>
                        @elseif((($pelangganIIs->pencapaian/$pelangganIIs->stretch)*100) >= 10)
                          <div class="progress">
                            <div class="progress-bar bg-gradient-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 10%;"></div>
                          </div>
                        @elseif((($pelangganIIs->pencapaian/$pelangganIIs->stretch)*100) <= 10)
                          <div class="progress">
                            <div class="progress-bar bg-gradient-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 5%;"></div>
                          </div>
                        @elseif((($pelangganIIs->pencapaian/$pelangganIIs->stretch)*100) == 00)
                          <div class="progress">
                            <div class="progress-bar bg-gradient-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>
                          </div>
                        @endif
                      </div>
                    </div>
                  </td>
                  <td>
                    <span class="text-center text-sm font-weight-bold mb-0" value="{{ $pelangganIIs -> skor_KPI }}">{{ $pelangganIIs -> skor_KPI }}</span>
                  </td>
                  <td>
                    <span class="text-center text-sm font-weight-bold mb-0" value="{{ round($pelangganIIs -> skor_sebenar,2) }} ">{{ round($pelangganIIs -> skor_sebenar,2) }} %</span>
                  </td>
                  {{-- <td class="align-middle">
                    <button class="btn btn-link text-secondary mb-0">
                      <i class="fa fa-ellipsis-v text-xs"></i>
                    </button>
                  </td> --}}
                  <td class="align-middle">
                    <div class="col-lg-6 col-5 my-auto text-middle">
                      <div class="dropdown float-lg-start pe-4">
                        <a class="cursor-pointer" id="dropdownTable" data-bs-toggle="dropdown" aria-expanded="false">
                          <i class="fa fa-ellipsis-v text-secondary"></i>
                        </a>
                        <ul class="dropdown-menu px-2 py-3 ms-n4 ms-n5" aria-labelledby="dropdownTable">
                          <li><a href="{{ url('employee/edit/kpi/'.$pelangganIIs->id.'/'.$date_id.'/'.$user_id.'/'.$year.'/'.$month) }}" class="dropdown-item border-radius-md" role="button">Edit</a></li>
                          <li><button type="button" wire:click="selectItem({{$pelangganIIs->kpimasters->kpiall->id}} , {{$pelangganIIs->kpimasters->id}} , {{$pelangganIIs->id}})" class="dropdown-item border-radius-md data-delete" style="color: red;"  data-form="{{$pelangganIIs->id}}">Delete</button></li>
                        </ul>
                      </div>
                    </div>
                  </td>
                </tr>
                <tr>
                </tr>
                @endforeach
              </tbody>
            </table>
            @foreach ($pelangganIImaster as $pelangganIImasters)
            <div class="card-body pt-4 p-3">
              <ul class="list-group">
                <li class="list-group-item border-0 d-flex p-4 mb-2 bg-gray-100 border-radius-lg">
                  <div class="d-flex flex-column">
                    <span class="mb-2 text-xs">Percentage KPI Master :<span class="text-dark font-weight-bold ms-sm-1">{{ $pelangganIImasters -> percent_master }}</span></span>
                    <span class="mb-2 text-xs">Link Bukti :<span class="text-dark ms-sm-1 font-weight-bold">
                      @if ($pelangganIImasters->link == '')
                      <a href=" {{ $pelangganIImasters -> link }}" style="color:blue;text-decoration:underline;font-size:13.5px"; target="_blank"></a>
                      @else
                      <a href=" {{ $pelangganIImasters -> link }}" style="color:blue;text-decoration:underline;font-size:13.5px"; target="_blank">{{ $pelangganIImasters -> link }}</a>
                      @endif
                      </span></span>
                    <span class="text-xs">Objektif KPI :<span class="text-dark ms-sm-1 font-weight-bold">{{ $pelangganIImasters -> objektif }}</span></span>
                  </div>
                  <div class="ms-auto text-end">
                    <a href="{{ url('employee/edit/kpimaster4/'.$pelangganIImasters->id.'/'.$date_id.'/'.$user_id.'/'.$year.'/'.$month) }}" class="btn btn-link text-dark px-3 mb-0" href="javascript:;"><i class="fas fa-pencil-alt text-dark me-2" aria-hidden="true"></i>Edit</a>
                  </div>
                </li>
              </ul>
            </div>
            @endforeach  
          </div>
        </div>
      </div>
    </div>
  </div>
  @endif

  @if ($kecemerlangancount == 0) {{-- ADA --}}
  @else
  <div class="row">
    <div class="col-12">
      <div class="card mt-4">
        <div class="card-header pb-0">
          @if ($weightage_kecemerlangan == 0 || $weightage_kecemerlangan == NULL)
          <h6>KECEMERLANGAN OPERASI <span style="color:red;">(Current weightage = 0)</span></h6>
          @else
          <h6>KECEMERLANGAN OPERASI <span style="color:red;">(Current weightage = {{$weightage_kecemerlangan}})</span></h6>
          @endif

        </div>
        <div class="card-body px-0 pt-0 pb-2">
          <div class="p-0">
            @csrf
            <table class="table align-items-center justify-content-center mb-0">
              <thead>
                <tr>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Metrik / Bukti</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">File Bukti</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">%</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Ukuran</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder text-center opacity-7 ps-2">KPI Target</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Skor KPI</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Skor Sebenar</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                @foreach ($kecemerlangan as $key => $kecemerlangans)
                <tr>
                  <td>    
                    <div class="d-flex px-3">
                      <div class="my-auto">
                        <h6 class="mb-0 text-sm" value="{{$key + 1}}">{{$key + 1}}</h6>
                      </div>
                    </div>
                  </td>
                  <td>
                    <pre class="text-sm font-weight-bold mb-0" value="{{ $kecemerlangans -> bukti }}">{{ $kecemerlangans -> bukti }}</pre>
                  </td>
                  <td>
                    @if ($kecemerlangans->bukti_path == '')
                    <a href=" {{ URL::to(''.$kecemerlangans->bukti_path.'') }}" style="color:blue;text-decoration:underline;font-size:13.5px"; target="_blank"></a>
                    @else
                    <a href=" {{ URL::to(''.$kecemerlangans->bukti_path.'') }}" style="color:blue;text-decoration:underline;font-size:13.5px"; target="_blank">View</a>
                    @endif
                  </td>
                  <td>
                    <span class="text-center text-sm font-weight-bold mb-0" value="{{ $kecemerlangans -> peratus }}">{{ $kecemerlangans -> peratus }}</span>
                  </td>
                  <td>
                    <span class="text-center text-sm font-weight-bold mb-0" value="{{ $kecemerlangans -> ukuran }}">{{ $kecemerlangans -> ukuran }}</span>
                  </td>
                  <td class="align-middle text-center">
                    <div class="d-flex align-items-center justify-content-center">
                      <span class="me-2 text-xs font-weight-bold" value="{{ $kecemerlangans -> pencapaian }}">{{ $kecemerlangans -> pencapaian }}/{{ $kecemerlangans -> stretch }}</span>
                      <div>
                        @if ((($kecemerlangans->pencapaian/$kecemerlangans->stretch)*100) >= 100)
                          <div class="progress">
                            <div class="progress-bar bg-gradient-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"></div>
                          </div>
                        @elseif((($kecemerlangans->pencapaian/$kecemerlangans->stretch)*100) >= 90)
                          <div class="progress">
                            <div class="progress-bar bg-gradient-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 90%;"></div>
                          </div>
                        @elseif((($kecemerlangans->pencapaian/$kecemerlangans->stretch)*100) >= 80)
                          <div class="progress">
                            <div class="progress-bar bg-gradient-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 80%;"></div>
                          </div>
                        @elseif((($kecemerlangans->pencapaian/$kecemerlangans->stretch)*100) >= 70)
                          <div class="progress">
                            <div class="progress-bar bg-gradient-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 70%;"></div>
                          </div>
                        @elseif((($kecemerlangans->pencapaian/$kecemerlangans->stretch)*100) >= 60)
                          <div class="progress">
                            <div class="progress-bar bg-gradient-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;"></div>
                          </div>
                        @elseif((($kecemerlangans->pencapaian/$kecemerlangans->stretch)*100) >= 50)
                          <div class="progress">
                            <div class="progress-bar bg-gradient-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 50%;"></div>
                          </div>
                        @elseif((($kecemerlangans->pencapaian/$kecemerlangans->stretch)*100) >= 40)
                          <div class="progress">
                            <div class="progress-bar bg-gradient-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 40%;"></div>
                          </div>
                        @elseif((($kecemerlangans->pencapaian/$kecemerlangans->stretch)*100) >= 30)
                          <div class="progress">
                            <div class="progress-bar bg-gradient-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 30%;"></div>
                          </div>
                        @elseif((($kecemerlangans->pencapaian/$kecemerlangans->stretch)*100) >= 20)
                          <div class="progress">
                            <div class="progress-bar bg-gradient-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 20%;"></div>
                          </div>
                        @elseif((($kecemerlangans->pencapaian/$kecemerlangans->stretch)*100) >= 10)
                          <div class="progress">
                            <div class="progress-bar bg-gradient-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 10%;"></div>
                          </div>
                        @elseif((($kecemerlangans->pencapaian/$kecemerlangans->stretch)*100) <= 10)
                          <div class="progress">
                            <div class="progress-bar bg-gradient-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 5%;"></div>
                          </div>
                        @elseif((($kecemerlangans->pencapaian/$kecemerlangans->stretch)*100) == 00)
                          <div class="progress">
                            <div class="progress-bar bg-gradient-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>
                          </div>
                        @endif
                      </div>
                    </div>
                  </td>
                  <td>
                    <span class="text-center text-sm font-weight-bold mb-0" value="{{ $kecemerlangans -> skor_KPI }}">{{ $kecemerlangans -> skor_KPI }}</span>
                  </td>
                  <td>
                    <span class="text-center text-sm font-weight-bold mb-0" value="{{ round($kecemerlangans -> skor_sebenar,2) }} ">{{ round($kecemerlangans -> skor_sebenar,2) }} %</span>
                  </td>
                  {{-- <td class="align-middle">
                    <button class="btn btn-link text-secondary mb-0">
                      <i class="fa fa-ellipsis-v text-xs"></i>
                    </button>
                  </td> --}}
                  <td class="align-middle">
                    <div class="col-lg-6 col-5 my-auto text-middle">
                      <div class="dropdown float-lg-start pe-4">
                        <a class="cursor-pointer" id="dropdownTable" data-bs-toggle="dropdown" aria-expanded="false">
                          <i class="fa fa-ellipsis-v text-secondary"></i>
                        </a>
                        <ul class="dropdown-menu px-2 py-3 ms-n4 ms-n5" aria-labelledby="dropdownTable">
                          <li><a href="{{ url('employee/edit/kpi/'.$kecemerlangans->id.'/'.$date_id.'/'.$user_id.'/'.$year.'/'.$month) }}" class="dropdown-item border-radius-md" role="button">Edit</a></li>
                          <li><button type="button" wire:click="selectItem({{$kecemerlangans->kpimasters->kpiall->id}} , {{$kecemerlangans->kpimasters->id}} , {{$kecemerlangans->id}})" class="dropdown-item border-radius-md data-delete" style="color: red;"  data-form="{{$kecemerlangans->id}}">Delete</button></li>
                        </ul>
                      </div>
                    </div>
                  </td>
                </tr>
                <tr>
                </tr>
                @endforeach
              </tbody>
            </table>
            @foreach ($kecemerlanganmaster as $kecemerlanganmasters)
            <div class="card-body pt-4 p-3">
              <ul class="list-group">
                <li class="list-group-item border-0 d-flex p-4 mb-2 bg-gray-100 border-radius-lg">
                  <div class="d-flex flex-column">
                    <span class="mb-2 text-xs">Percentage KPI Master :<span class="text-dark font-weight-bold ms-sm-1">{{ $kecemerlanganmasters -> percent_master }}</span></span>
                    <span class="mb-2 text-xs">Link Bukti :<span class="text-dark ms-sm-1 font-weight-bold">
                      @if ($kecemerlanganmasters->link == '')
                      <a href=" {{ $kecemerlanganmasters -> link }}" style="color:blue;text-decoration:underline;font-size:13.5px"; target="_blank"></a>
                      @else
                      <a href=" {{ $kecemerlanganmasters -> link }}" style="color:blue;text-decoration:underline;font-size:13.5px"; target="_blank">{{ $kecemerlanganmasters -> link }}</a>
                      @endif
                      </span></span>
                    <span class="text-xs">Objektif KPI :<span class="text-dark ms-sm-1 font-weight-bold">{{ $kecemerlanganmasters -> objektif }}</span></span>
                  </div>
                  <div class="ms-auto text-end">
                    <a href="{{ url('employee/edit/kpimaster5/'.$kecemerlanganmasters->id.'/'.$date_id.'/'.$user_id.'/'.$year.'/'.$month) }}" class="btn btn-link text-dark px-3 mb-0" href="javascript:;"><i class="fas fa-pencil-alt text-dark me-2" aria-hidden="true"></i>Edit</a>
                  </div>
                </li>
              </ul>
            </div>
            @endforeach  
          </div>
        </div>
      </div>
    </div>
  </div>
  @endif

  @if ($trainingcount == 0)
  @else
  <div class="row">
    <div class="col-12">
      <div class="card mt-4">
        <div class="card-header pb-0">
          @if ($weightage_training == 0 || $weightage_training == NULL)
          <h6>MANUSIA & PROCESS (TRAINING) <span style="color:red;">(Current weightage = 0)</span></h6>
          @else
          <h6>MANUSIA & PROCESS (TRAINING) <span style="color:red;">(Current weightage = {{$weightage_training}})</span></h6>
          @endif
        </div>
        <div class="card-body px-0 pt-0 pb-2">
          <div class="p-0">
            @csrf
            <table class="table align-items-center justify-content-center mb-0">
              <thead>
                <tr>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Metrik / Bukti</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">File Bukti</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">%</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Ukuran</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder text-center opacity-7 ps-2">KPI Target</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Skor KPI</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Skor Sebenar</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                @foreach ($training as $key => $trainings)
                <tr>
                  <td>    
                    <div class="d-flex px-3">
                      <div class="my-auto">
                        <h6 class="mb-0 text-sm" value="{{$key + 1}}">{{$key + 1}}</h6>
                      </div>
                    </div>
                  </td>
                  <td>
                    <pre class="text-sm font-weight-bold mb-0" value="{{ $trainings -> bukti }}">{{$trainings -> bukti }}</pre>
                  </td>
                  <td>
                    @if ($trainings->bukti_path == '')
                    <a href=" {{ URL::to(''.$trainings->bukti_path.'') }}" style="color:blue;text-decoration:underline;font-size:13.5px"; target="_blank"></a>
                    @else
                    <a href=" {{ URL::to(''.$trainings->bukti_path.'') }}" style="color:blue;text-decoration:underline;font-size:13.5px"; target="_blank">View</a>
                    @endif
                  </td>
                  <td>
                    <span class="text-center text-sm font-weight-bold mb-0" value="{{ $trainings -> peratus }}">{{ $trainings -> peratus }}</span>
                  </td>
                  <td>
                    <span class="text-center text-sm font-weight-bold mb-0" value="{{ $trainings -> ukuran }}">{{ $trainings -> ukuran }}</span>
                  </td>
                  <td class="align-middle text-center">
                    <div class="d-flex align-items-center justify-content-center">
                      <span class="me-2 text-xs font-weight-bold" value="{{ $trainings -> pencapaian }}">{{ $trainings -> pencapaian }}/{{ $trainings -> stretch }}</span>
                      <div>
                        @if ((($trainings->pencapaian/$trainings->stretch)*100) >= 100)
                          <div class="progress">
                            <div class="progress-bar bg-gradient-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"></div>
                          </div>
                        @elseif((($trainings->pencapaian/$trainings->stretch)*100) >= 90)
                          <div class="progress">
                            <div class="progress-bar bg-gradient-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 90%;"></div>
                          </div>
                        @elseif((($trainings->pencapaian/$trainings->stretch)*100) >= 80)
                          <div class="progress">
                            <div class="progress-bar bg-gradient-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 80%;"></div>
                          </div>
                        @elseif((($trainings->pencapaian/$trainings->stretch)*100) >= 70)
                          <div class="progress">
                            <div class="progress-bar bg-gradient-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 70%;"></div>
                          </div>
                        @elseif((($trainings->pencapaian/$trainings->stretch)*100) >= 60)
                          <div class="progress">
                            <div class="progress-bar bg-gradient-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;"></div>
                          </div>
                        @elseif((($trainings->pencapaian/$trainings->stretch)*100) >= 50)
                          <div class="progress">
                            <div class="progress-bar bg-gradient-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 50%;"></div>
                          </div>
                        @elseif((($trainings->pencapaian/$trainings->stretch)*100) >= 40)
                          <div class="progress">
                            <div class="progress-bar bg-gradient-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 40%;"></div>
                          </div>
                        @elseif((($trainings->pencapaian/$trainings->stretch)*100) >= 30)
                          <div class="progress">
                            <div class="progress-bar bg-gradient-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 30%;"></div>
                          </div>
                        @elseif((($trainings->pencapaian/$trainings->stretch)*100) >= 20)
                          <div class="progress">
                            <div class="progress-bar bg-gradient-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 20%;"></div>
                          </div>
                        @elseif((($trainings->pencapaian/$trainings->stretch)*100) >= 10)
                          <div class="progress">
                            <div class="progress-bar bg-gradient-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 10%;"></div>
                          </div>
                        @elseif((($trainings->pencapaian/$trainings->stretch)*100) <= 10)
                          <div class="progress">
                            <div class="progress-bar bg-gradient-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 5%;"></div>
                          </div>
                        @elseif((($trainings->pencapaian/$trainings->stretch)*100) == 00)
                          <div class="progress">
                            <div class="progress-bar bg-gradient-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>
                          </div>
                        @endif
                      </div>
                    </div>
                  </td>
                  <td>
                    <span class="text-center text-sm font-weight-bold mb-0" value="{{ $trainings -> skor_KPI }}">{{ $trainings -> skor_KPI }}</span>
                  </td>
                  <td>
                    <span class="text-center text-sm font-weight-bold mb-0" value="{{ round($trainings -> skor_sebenar,2) }} ">{{ round($trainings -> skor_sebenar,2) }} %</span>
                  </td>
                  {{-- <td class="align-middle">
                    <button class="btn btn-link text-secondary mb-0">
                      <i class="fa fa-ellipsis-v text-xs"></i>
                    </button>
                  </td> --}}
                  <td class="align-middle">
                    <div class="col-lg-6 col-5 my-auto text-middle">
                      <div class="dropdown float-lg-start pe-4">
                        <a class="cursor-pointer" id="dropdownTable" data-bs-toggle="dropdown" aria-expanded="false">
                          <i class="fa fa-ellipsis-v text-secondary"></i>
                        </a>
                        <ul class="dropdown-menu px-2 py-3 ms-n4 ms-n5" aria-labelledby="dropdownTable">
                          <li><a href="{{ url('employee/edit/kpi/'.$trainings->id.'/'.$date_id.'/'.$user_id.'/'.$year.'/'.$month) }}" class="dropdown-item border-radius-md" role="button">Edit</a></li>
                          <li><button type="button" wire:click="selectItem({{$trainings->kpimasters->kpiall->id}} , {{$trainings->kpimasters->id}} , {{$trainings->id}})" class="dropdown-item border-radius-md data-delete" style="color: red;"  data-form="{{$trainings->id}}">Delete</button></li>
                        </ul>
                      </div>
                    </div>
                  </td>
                </tr>
                <tr>
                </tr>
                @endforeach
              </tbody>
            </table>
            @foreach ($trainingmaster as $trainingmasters)
            <div class="card-body pt-4 p-3">
              <ul class="list-group">
                <li class="list-group-item border-0 d-flex p-4 mb-2 bg-gray-100 border-radius-lg">
                  <div class="d-flex flex-column">
                    <span class="mb-2 text-xs">Percentage KPI Master :<span class="text-dark font-weight-bold ms-sm-1">{{ $trainingmasters -> percent_master }}</span></span>
                    <span class="mb-2 text-xs">Link Bukti :<span class="text-dark ms-sm-1 font-weight-bold">
                      @if ($trainingmasters->link == '')
                      <a href=" {{ $trainingmasters -> link }}" style="color:blue;text-decoration:underline;font-size:13.5px"; target="_blank"></a>
                      @else
                      <a href=" {{ $trainingmasters -> link }}" style="color:blue;text-decoration:underline;font-size:13.5px"; target="_blank">{{ $trainingmasters -> link }}</a>
                      @endif
                      </span></span>
                    <span class="text-xs">Objektif KPI :<span class="text-dark ms-sm-1 font-weight-bold">{{ $trainingmasters -> objektif }}</span></span>
                  </div>
                  <div class="ms-auto text-end">
                    <a href="{{ url('employee/edit/kpimaster6/'.$trainingmasters->id.'/'.$date_id.'/'.$user_id.'/'.$year.'/'.$month) }}" class="btn btn-link text-dark px-3 mb-0" href="javascript:;"><i class="fas fa-pencil-alt text-dark me-2" aria-hidden="true"></i>Edit</a>
                  </div>
                </li>
              </ul>
            </div>
            @endforeach  
          </div>
        </div>
      </div>
    </div>
  </div>
  @endif

  @if ($ncrcount == 0) {{-- ADA --}}
  @else
  <div class="row">
    <div class="col-12">
      <div class="card mt-4">
        <div class="card-header pb-0">
          @if ($weightage_ncr == 0 || $weightage_ncr == NULL)
          <h6>MANUSIA & PROCESS (NCROFI) <span style="color:red;">(Current weightage = 0)</span></h6>
          @else
          <h6>MANUSIA & PROCESS (NCROFI) <span style="color:red;">(Current weightage = {{$weightage_ncr}})</span></h6>
          @endif
        </div>
        <div class="card-body px-0 pt-0 pb-2">
          <div class="p-0">
            @csrf
            <table class="table align-items-center justify-content-center mb-0">
              <thead>
                <tr>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Metrik / Bukti</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">File Bukti</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">%</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Ukuran</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder text-center opacity-7 ps-2">KPI Target</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Skor KPI</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Skor Sebenar</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                @foreach ($ncr as $key => $ncrs)
                <tr>
                  <td>    
                    <div class="d-flex px-3">
                      <div class="my-auto">
                        <h6 class="mb-0 text-sm" value="{{$key + 1}}">{{$key + 1}}</h6>
                      </div>
                    </div>
                  </td>
                  <td>
                    <pre class="text-sm font-weight-bold mb-0" value="{{ $ncrs -> bukti }}">{{ $ncrs -> bukti }}</pre>
                  </td>
                  <td>
                    @if ($ncrs->bukti_path == '')
                    <a href=" {{ URL::to(''.$ncrs->bukti_path.'') }}" style="color:blue;text-decoration:underline;font-size:13.5px"; target="_blank"></a>
                    @else
                    <a href=" {{ URL::to(''.$ncrs->bukti_path.'') }}" style="color:blue;text-decoration:underline;font-size:13.5px"; target="_blank">View</a>
                    @endif
                  </td>
                  <td>
                    <span class="text-center text-sm font-weight-bold mb-0" value="{{ $ncrs -> peratus }}">{{ $ncrs -> peratus }}</span>
                  </td>
                  <td>
                    <span class="text-center text-sm font-weight-bold mb-0" value="{{ $ncrs -> ukuran }}">{{ $ncrs -> ukuran }}</span>
                  </td>
                  <td class="align-middle text-center">
                    <div class="d-flex align-items-center justify-content-center">
                      <span class="me-2 text-xs font-weight-bold" value="{{ $ncrs -> pencapaian }}">{{ $ncrs -> pencapaian }}/{{ $ncrs -> stretch }}</span>
                      <div>
                        @if ((($ncrs->pencapaian/$ncrs->stretch)*100) >= 100)
                          <div class="progress">
                            <div class="progress-bar bg-gradient-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"></div>
                          </div>
                        @elseif((($ncrs->pencapaian/$ncrs->stretch)*100) >= 90)
                          <div class="progress">
                            <div class="progress-bar bg-gradient-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 90%;"></div>
                          </div>
                        @elseif((($ncrs->pencapaian/$ncrs->stretch)*100) >= 80)
                          <div class="progress">
                            <div class="progress-bar bg-gradient-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 80%;"></div>
                          </div>
                        @elseif((($ncrs->pencapaian/$ncrs->stretch)*100) >= 70)
                          <div class="progress">
                            <div class="progress-bar bg-gradient-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 70%;"></div>
                          </div>
                        @elseif((($ncrs->pencapaian/$ncrs->stretch)*100) >= 60)
                          <div class="progress">
                            <div class="progress-bar bg-gradient-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;"></div>
                          </div>
                        @elseif((($ncrs->pencapaian/$ncrs->stretch)*100) >= 50)
                          <div class="progress">
                            <div class="progress-bar bg-gradient-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 50%;"></div>
                          </div>
                        @elseif((($ncrs->pencapaian/$ncrs->stretch)*100) >= 40)
                          <div class="progress">
                            <div class="progress-bar bg-gradient-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 40%;"></div>
                          </div>
                        @elseif((($ncrs->pencapaian/$ncrs->stretch)*100) >= 30)
                          <div class="progress">
                            <div class="progress-bar bg-gradient-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 30%;"></div>
                          </div>
                        @elseif((($ncrs->pencapaian/$ncrs->stretch)*100) >= 20)
                          <div class="progress">
                            <div class="progress-bar bg-gradient-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 20%;"></div>
                          </div>
                        @elseif((($ncrs->pencapaian/$ncrs->stretch)*100) >= 10)
                          <div class="progress">
                            <div class="progress-bar bg-gradient-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 10%;"></div>
                          </div>
                        @elseif((($ncrs->pencapaian/$ncrs->stretch)*100) <= 10)
                          <div class="progress">
                            <div class="progress-bar bg-gradient-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 5%;"></div>
                          </div>
                        @elseif((($ncrs->pencapaian/$ncrs->stretch)*100) == 00)
                          <div class="progress">
                            <div class="progress-bar bg-gradient-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>
                          </div>
                        @endif
                      </div>
                    </div>
                  </td>
                  <td>
                    <span class="text-center text-sm font-weight-bold mb-0" value="{{ $ncrs -> skor_KPI }}">{{ $ncrs -> skor_KPI }}</span>
                  </td>
                  <td>
                    <span class="text-center text-sm font-weight-bold mb-0" value="{{ round($ncrs -> skor_sebenar,2) }} ">{{ round($ncrs -> skor_sebenar,2) }} %</span>
                  </td>
                  {{-- <td class="align-middle">
                    <button class="btn btn-link text-secondary mb-0">
                      <i class="fa fa-ellipsis-v text-xs"></i>
                    </button>
                  </td> --}}
                  <td class="align-middle">
                    <div class="col-lg-6 col-5 my-auto text-middle">
                      <div class="dropdown float-lg-start pe-4">
                        <a class="cursor-pointer" id="dropdownTable" data-bs-toggle="dropdown" aria-expanded="false">
                          <i class="fa fa-ellipsis-v text-secondary"></i>
                        </a>
                        <ul class="dropdown-menu px-2 py-3 ms-n4 ms-n5" aria-labelledby="dropdownTable">
                          <li><a href="{{ url('employee/edit/kpi/'.$ncrs->id.'/'.$date_id.'/'.$user_id.'/'.$year.'/'.$month) }}" class="dropdown-item border-radius-md" role="button">Edit</a></li>
                          <li><button type="button" wire:click="selectItem({{$ncrs->kpimasters->kpiall->id}} , {{$ncrs->kpimasters->id}} , {{$ncrs->id}})" class="dropdown-item border-radius-md data-delete" style="color: red;"  data-form="{{$ncrs->id}}">Delete</button></li>
                        </ul>
                      </div>
                    </div>
                  </td>
                </tr>
                <tr>
                </tr>
                @endforeach
              </tbody>
            </table>
            @foreach ($ncrmaster as $ncrmasters)
            <div class="card-body pt-4 p-3">
              <ul class="list-group">
                <li class="list-group-item border-0 d-flex p-4 mb-2 bg-gray-100 border-radius-lg">
                  <div class="d-flex flex-column">
                    <span class="mb-2 text-xs">Percentage KPI Master :<span class="text-dark font-weight-bold ms-sm-1">{{ $ncrmasters -> percent_master }}</span></span>
                    <span class="mb-2 text-xs">Link Bukti :<span class="text-dark ms-sm-1 font-weight-bold">
                      @if ($ncrmasters->link == '')
                      <a href=" {{ $ncrmasters -> link }}" style="color:blue;text-decoration:underline;font-size:13.5px"; target="_blank"></a>
                      @else
                      <a href=" {{ $ncrmasters -> link }}" style="color:blue;text-decoration:underline;font-size:13.5px"; target="_blank">{{ $ncrmasters -> link }}</a>
                      @endif
                      </span></span>
                    <span class="text-xs">Objektif KPI :<span class="text-dark ms-sm-1 font-weight-bold">{{ $ncrmasters -> objektif }}</span></span>
                  </div>
                  <div class="ms-auto text-end">
                    <a href="{{ url('employee/edit/kpimaster7/'.$ncrmasters->id.'/'.$date_id.'/'.$user_id.'/'.$year.'/'.$month) }}" class="btn btn-link text-dark px-3 mb-0" href="javascript:;"><i class="fas fa-pencil-alt text-dark me-2" aria-hidden="true"></i>Edit</a>
                  </div>
                </li>
              </ul>
            </div>
            @endforeach  
          </div>
        </div>
      </div>
    </div>
  </div>
  @endif

  @if ($kolaborasicount == 0) {{--ADA--}}
  @else
  <div class="row">
    <div class="col-12">
      <div class="card mt-4">
        <div class="card-header pb-0">
          @if ($weightage_kolaborasi == 0 || $weightage_kolaborasi == NULL)
          <h6>KOLABORASI <span style="color:red;">(Current weightage = 0)</span></h6>
          @else
          <h6>KOLABORASI <span style="color:red;">(Current weightage = {{$weightage_kolaborasi}})</span></h6>
          @endif
        </div>
        <div class="card-body px-0 pt-0 pb-2">
          <div class="p-0">
            @csrf
            <table class="table align-items-center justify-content-center mb-0">
              <thead>
                <tr>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Metrik / Bukti</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">File Bukti</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">%</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Ukuran</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder text-center opacity-7 ps-2">KPI Target</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Skor KPI</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Skor Sebenar</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                @foreach ($kolaborasi as $key => $kolaborasis)
                <tr>
                  <td>    
                    <div class="d-flex px-3">
                      <div class="my-auto">
                        <h6 class="mb-0 text-sm" value="{{$key + 1}}">{{$key + 1}}</h6>
                      </div>
                    </div>
                  </td>
                  <td>
                    {{-- <pre class="text-sm font-weight-bold mb-0" style="width: 80%;max-width: 400px;overflow: hidden;" value="{{ $kolaborasis -> bukti }}">{{ $kolaborasis -> bukti }}</pre> --}}
                    <pre class="text-sm font-weight-bold mb-0" value="{{ $kolaborasis -> bukti }}">{{ $kolaborasis -> bukti }}</pre>
                  </td>
                  <td>
                    @if ($kolaborasis->bukti_path == '')
                    <a href=" {{ URL::to(''.$kolaborasis->bukti_path.'') }}" style="color:blue;text-decoration:underline;font-size:13.5px"; target="_blank"></a>
                    @else
                    <a href=" {{ URL::to(''.$kolaborasis->bukti_path.'') }}" style="color:blue;text-decoration:underline;font-size:13.5px"; target="_blank">View</a>
                    @endif
                  </td>
                  <td>
                    <span class="text-center text-sm font-weight-bold mb-0" value="{{ $kolaborasis -> peratus }}">{{ $kolaborasis -> peratus }}</span>
                  </td>
                  <td>
                    <span class="text-center text-sm font-weight-bold mb-0" value="{{ $kolaborasis -> ukuran }}">{{ $kolaborasis -> ukuran }}</span>
                  </td>
                  <td class="align-middle text-center">
                    <div class="d-flex align-items-center justify-content-center">
                      <span class="me-2 text-xs font-weight-bold" value="{{ $kolaborasis -> pencapaian }}">{{ $kolaborasis -> pencapaian }}/{{ $kolaborasis -> stretch }}</span>
                      <div>
                        @if ((($kolaborasis->pencapaian/$kolaborasis->stretch)*100) >= 100)
                          <div class="progress">
                            <div class="progress-bar bg-gradient-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"></div>
                          </div>
                        @elseif((($kolaborasis->pencapaian/$kolaborasis->stretch)*100) >= 90)
                          <div class="progress">
                            <div class="progress-bar bg-gradient-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 90%;"></div>
                          </div>
                        @elseif((($kolaborasis->pencapaian/$kolaborasis->stretch)*100) >= 80)
                          <div class="progress">
                            <div class="progress-bar bg-gradient-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 80%;"></div>
                          </div>
                        @elseif((($kolaborasis->pencapaian/$kolaborasis->stretch)*100) >= 70)
                          <div class="progress">
                            <div class="progress-bar bg-gradient-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 70%;"></div>
                          </div>
                        @elseif((($kolaborasis->pencapaian/$kolaborasis->stretch)*100) >= 60)
                          <div class="progress">
                            <div class="progress-bar bg-gradient-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;"></div>
                          </div>
                        @elseif((($kolaborasis->pencapaian/$kolaborasis->stretch)*100) >= 50)
                          <div class="progress">
                            <div class="progress-bar bg-gradient-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 50%;"></div>
                          </div>
                        @elseif((($kolaborasis->pencapaian/$kolaborasis->stretch)*100) >= 40)
                          <div class="progress">
                            <div class="progress-bar bg-gradient-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 40%;"></div>
                          </div>
                        @elseif((($kolaborasis->pencapaian/$kolaborasis->stretch)*100) >= 30)
                          <div class="progress">
                            <div class="progress-bar bg-gradient-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 30%;"></div>
                          </div>
                        @elseif((($kolaborasis->pencapaian/$kolaborasis->stretch)*100) >= 20)
                          <div class="progress">
                            <div class="progress-bar bg-gradient-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 20%;"></div>
                          </div>
                        @elseif((($kolaborasis->pencapaian/$kolaborasis->stretch)*100) >= 10)
                          <div class="progress">
                            <div class="progress-bar bg-gradient-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 10%;"></div>
                          </div>
                        @elseif((($kolaborasis->pencapaian/$kolaborasis->stretch)*100) <= 10)
                          <div class="progress">
                            <div class="progress-bar bg-gradient-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 5%;"></div>
                          </div>
                        @elseif((($kolaborasis->pencapaian/$kolaborasis->stretch)*100) == 00)
                          <div class="progress">
                            <div class="progress-bar bg-gradient-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>
                          </div>
                        @endif
                      </div>
                    </div>
                  </td>
                  <td>
                    <span class="text-center text-sm font-weight-bold mb-0" value="{{ $kolaborasis -> skor_KPI }}">{{ $kolaborasis -> skor_KPI }}</span>
                  </td>
                  <td>
                    <span class="text-center text-sm font-weight-bold mb-0" value="{{ round($kolaborasis -> skor_sebenar,2) }} ">{{ round($kolaborasis -> skor_sebenar,2) }} %</span>
                  </td>
                  {{-- <td class="align-middle">
                    <button class="btn btn-link text-secondary mb-0">
                      <i class="fa fa-ellipsis-v text-xs"></i>
                    </button>
                  </td> --}}
                  <td class="align-middle">
                    <div class="col-lg-6 col-5 my-auto text-middle">
                      <div class="dropdown float-lg-start pe-4">
                        <a class="cursor-pointer" id="dropdownTable" data-bs-toggle="dropdown" aria-expanded="false">
                          <i class="fa fa-ellipsis-v text-secondary"></i>
                        </a>
                        <ul class="dropdown-menu px-2 py-3 ms-n4 ms-n5" aria-labelledby="dropdownTable">
                          <li><a href="{{ url('employee/edit/kpi/'.$kolaborasis->id.'/'.$date_id.'/'.$user_id.'/'.$year.'/'.$month) }}" class="dropdown-item border-radius-md" role="button">Edit</a></li>
                          <li><button type="button" wire:click="selectItem({{$kolaborasis->kpimasters->kpiall->id}} , {{$kolaborasis->kpimasters->id}} , {{$kolaborasis->id}})" class="dropdown-item border-radius-md data-delete" style="color: red;"  data-form="{{$kolaborasis->id}}">Delete</button></li>
                        </ul>
                      </div>
                    </div>
                  </td>
                </tr>
                <tr>
                </tr>
                @endforeach
              </tbody>
            </table>
            @foreach ($kolaborasimaster as $kolaborasimasters)
            <div class="card-body pt-4 p-3">
              <ul class="list-group">
                <li class="list-group-item border-0 d-flex p-4 mb-2 bg-gray-100 border-radius-lg">
                  <div class="d-flex flex-column">
                    <span class="mb-2 text-xs">Percentage KPI Master :<span class="text-dark font-weight-bold ms-sm-1">{{ $kolaborasimasters -> percent_master }}</span></span>
                    <span class="mb-2 text-xs">Link Bukti :<span class="text-dark ms-sm-1 font-weight-bold">
                      @if ($kolaborasimasters->link == '')
                      <a href=" {{ $kolaborasimasters -> link }}" style="color:blue;text-decoration:underline;font-size:13.5px"; target="_blank"></a>
                      @else
                      <a href=" {{ $kolaborasimasters -> link }}" style="color:blue;text-decoration:underline;font-size:13.5px"; target="_blank">{{ $kolaborasimasters -> link }}</a>
                      @endif
                      </span></span>
                    <span class="text-xs">Objektif KPI :<span class="text-dark ms-sm-1 font-weight-bold">{{ $kolaborasimasters -> objektif }}</span></span>
                  </div>
                  <div class="ms-auto text-end">
                    <a href="{{ url('employee/edit/kpimaster8/'.$kolaborasimasters->id.'/'.$date_id.'/'.$user_id.'/'.$year.'/'.$month) }}" class="btn btn-link text-dark px-3 mb-0" href="javascript:;"><i class="fas fa-pencil-alt text-dark me-2" aria-hidden="true"></i>Edit</a>
                  </div>
                </li>
              </ul>
            </div>
            @endforeach  
          </div>
        </div>
      </div>
    </div>
  </div>
  @endif
  
{{--------------------------------------------------------------------------End Testing -------------------------------------------------------------------------------}}

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
</div>
{{-- @endsection --}}