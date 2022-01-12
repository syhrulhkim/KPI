{{-- @section('content')
  @extends('layouts.app') --}}
  <div>
  <style>
  .table-responsive {
    overflow-x: hidden;
    overflow-y: hidden;
  }

  td.good{
    border-bottom: hidden;
  }
  thead,
  tbody,
  tfoot,
  tr,
  th {
    border-color: black;
    border-style: solid;
    border-width: 0;
  }
  .solid {
    border-style: solid;
  }

  </style>
  <body>


{{------------------------------------------- Start Testing ---------------------------------------}}  
  <div class="container-fluid py-4">
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

    @if (session('fail2'))
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
      <strong>{{ session('fail2') }}</strong>
    </div>	
    @endif
    
    <div class="row">
      <div class="col-12">
        @if ($weightage_master > 100) 
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
          <strong>{{ session('fail2') }}Employee total weightage for KPI Master exceed 100%. Please check back.</strong>
        </div>
        @else
        @endif
        @if ($weightage_master < 100) 
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
          <strong>{{ session('fail2') }}Employee total weightage for KPI Master is lower than 100%. Please check back.</strong>
        </div>
        @else
        @endif
        <div class="card mb-4">
          <div class="card-header pb-0">
            @if ($weightage_master == NULL) 
            <h6>KAD SKOR - KPI <span style="color:red;">(Current total weightage = 0)</span></h6>
            @else
            <h6>KAD SKOR - KPI <span style="color:red;">(Current total weightage = {{$weightage_master}})</span></h6>
            @endif
          </div>
          <div class="card-body px-0 pt-0 pb-2">
            <div class="p-0">
              <table style="width: 100%" class="a table align-items-center justify-content-center mb-0">
                <thead>
                  <tr>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Fungsi</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 px-2">Objektif KPI</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 px-2">Metrik / Bukti</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center ps-2 px-2">Link File</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center ps-2 px-2">Link Bukti</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center ps-2 px-2">%</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center ps-2 px-2">Ukuran</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center ps-2 px-5">KPI Target</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center ps-2 px-2">Skor KPI</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center ps-2 px-2">Skor Sebenar</th>
                  </tr>
                </thead>
                <tbody>
                  @php($i = 1)
                  @foreach ($kadskor as $key => $kpis)
                    <tr>
                      @if ($key == 0)
                        <td rowspan="{{ $kadskorcount }}">
                          <p class="text-xs font-weight-bold mb-0 px-3" value="{{ $kpis -> fungsi }}">{{ $kpis -> fungsi }}</p>
                        </td>
                        <td rowspan="{{ $kadskorcount }}" class="text-xs font-weight-bold mb-0">
                          <span class="text-secondary text-xs font-weight-bold" value="{{ $kpis->kpimasters->objektif }}">{{ $kpis->kpimasters->objektif }}</span>
                        </td>
                      @else
                      @endif
                      @if ($loop->last)
                        <td class="text-xs font-weight-bold">
                          <span class="text-secondary text-xs font-weight-bold" value="{{ $kpis -> bukti }}">{{ $kpis -> bukti }}</span>
                        </td>
                        <td class="text-xs font-weight-bold">
                          @if ($kpis->bukti_path == '')
                          <a href=" {{ URL::to(''.$kpis->bukti_path.'') }}" style="color:blue;text-decoration:underline;font-size:13.5px"; target="_blank"></a>
                          @else
                          <a href=" {{ URL::to(''.$kpis->bukti_path.'') }}" style="color:blue;text-decoration:underline;font-size:13.5px"; target="_blank">View</a>
                          @endif
                        </td>
                      @else
                        <td class="text-xs font-weight-bold good">
                          <span class="text-secondary text-xs font-weight-bold" value="{{ $kpis -> bukti }}">{{ $kpis -> bukti }}</span>
                        </td>
                        <td class="text-xs font-weight-bold good">
                          @if ($kpis->bukti_path == '')
                          <a href=" {{ URL::to(''.$kpis->bukti_path.'') }}" style="color:blue;text-decoration:underline;font-size:13.5px"; target="_blank"></a>
                          @else
                          <a href=" {{ URL::to(''.$kpis->bukti_path.'') }}" style="color:blue;text-decoration:underline;font-size:13.5px"; target="_blank">View</a>
                          @endif
                        </td>
                      @endif
                        
                      @if ($key == 0)
                        <td rowspan="{{ $kadskorcount }}" class="align-middle text-center">
                          @if ($kpis->kpimasters->link == '')
                          -
                          @else
                          <a href="{{ $kpis->kpimasters->link }}" style="color:blue;text-decoration:underline;font-size:13.5px"; target="_blank">View</a>
                          @endif
                        </td>
                        <td rowspan="{{ $kadskorcount }}" class="align-middle text-center">
                          <span class="text-secondary text-xs font-weight-bold" value="{{ $kpis->kpimasters -> percent_master }}">{{ $kpis->kpimasters->percent_master }}</span>
                        </td>
                        <td rowspan="{{ $kadskorcount }}" class="align-middle text-center">
                          <span class="text-secondary text-xs font-weight-bold" value="">Percentage (%)</span>
                        </td>
                        <td rowspan="{{ $kadskorcount }}" class="align-middle text-center mt-2">
                          <div class="d-flex align-items-center justify-content-center">
                            <span class="me-2 text-xs font-weight-bold" value="{{$kpis->kpimasters -> pencapaian }}">{{ $kpis->kpimasters -> pencapaian }}/100</span>
                            <div>
                          @if ((($kpis->kpimasters->pencapaian)*100) >= 100)
                            <div class="progress">
                              <div class="progress-bar bg-gradient-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"></div>
                            </div>
                          @elseif((($kpis->kpimasters->pencapaian)*100) >= 90)
                            <div class="progress">
                              <div class="progress-bar bg-gradient-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 90%;"></div>
                            </div>
                          @elseif((($kpis->kpimasters->pencapaian)*100) >= 80)
                            <div class="progress">
                              <div class="progress-bar bg-gradient-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 80%;"></div>
                            </div>
                          @elseif((($kpis->kpimasters->pencapaian)*100) >= 70)
                            <div class="progress">
                              <div class="progress-bar bg-gradient-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 70%;"></div>
                            </div>
                          @elseif((($kpis->kpimasters->pencapaian)*100) >= 60)
                            <div class="progress">
                              <div class="progress-bar bg-gradient-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;"></div>
                            </div>
                          @elseif((($kpis->kpimasters->pencapaian)*100) >= 50)
                            <div class="progress">
                              <div class="progress-bar bg-gradient-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 50%;"></div>
                            </div>
                          @elseif((($kpis->kpimasters->pencapaian)*100) >= 40)
                            <div class="progress">
                              <div class="progress-bar bg-gradient-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 40%;"></div>
                            </div>
                          @elseif((($kpis->kpimasters->pencapaian)*100) >= 30)
                            <div class="progress">
                              <div class="progress-bar bg-gradient-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 30%;"></div>
                            </div>
                          @elseif((($kpis->kpimasters->pencapaian)*100) >= 20)
                            <div class="progress">
                              <div class="progress-bar bg-gradient-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 20%;"></div>
                            </div>
                          @elseif((($kpis->kpimasters->pencapaian)*100) >= 10)
                            <div class="progress">
                              <div class="progress-bar bg-gradient-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 10%;"></div>
                            </div>
                          @elseif((($kpis->kpimasters->pencapaian)*100) <= 10)
                            <div class="progress">
                              <div class="progress-bar bg-gradient-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 5%;"></div>
                            </div>
                          @elseif((($kpis->kpimasters->pencapaian)*100) == 00)
                            <div class="progress">
                              <div class="progress-bar bg-gradient-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>
                            </div>
                          @endif
                        </div>
                      </div>
                        </td>
                        <td rowspan="{{ $kadskorcount }}" class="align-middle text-center">
                          <span class="text-secondary text-xs font-weight-bold" value="{{ $kpis->kpimasters -> skor_KPI }}">{{ $kpis->kpimasters -> skor_KPI }}</span>
                        </td>
                        <td rowspan="{{ $kadskorcount }}" class="align-middle text-center">
                          <span class="text-secondary text-xs font-weight-bold" value="{{ round($kpis->kpimasters -> skor_sebenar,2) }}">{{ round($kpis->kpimasters -> skor_sebenar,2) }} %</span>
                        </td>
                      @else
                      @endif
                    </tr>
                  @endforeach
                  @foreach ($kewangan as $key => $kpis)
                    <tr>
                      @if ($key == 0)
                        <td rowspan="{{ $kewangancount }}">
                          <p class="text-xs font-weight-bold mb-0 px-3" value="{{ $kpis -> fungsi }}">{{ $kpis -> fungsi }}</p>
                        </td>
                        <td rowspan="{{ $kewangancount }}" class="text-xs font-weight-bold mb-0 test">
                          <span class="text-secondary text-xs font-weight-bold" value="{{ $kpis->kpimasters -> objektif }}">{{ $kpis->kpimasters -> objektif }}</span>
                        </td>
                      @else
                      @endif
                      @if ($loop->last)
                        <td class="text-xs font-weight-bold">
                          <span class="text-secondary text-xs font-weight-bold" value="{{ $kpis -> bukti }}">{{ $kpis -> bukti }}</span>
                        </td>
                        <td class="text-xs font-weight-bold">
                          @if ($kpis->bukti_path == '')
                          <a href=" {{ URL::to(''.$kpis->bukti_path.'') }}" style="color:blue;text-decoration:underline;font-size:13.5px"; target="_blank"></a>
                          @else
                          <a href=" {{ URL::to(''.$kpis->bukti_path.'') }}" style="color:blue;text-decoration:underline;font-size:13.5px"; target="_blank">View</a>
                          @endif
                        </td>
                      @else
                        <td class="text-xs font-weight-bold good">
                          <span class="text-secondary text-xs font-weight-bold" value="{{ $kpis -> bukti }}">{{ $kpis -> bukti }}</span>
                        </td>
                        <td class="text-xs font-weight-bold good">
                          @if ($kpis->bukti_path == '')
                          <a href=" {{ URL::to(''.$kpis->bukti_path.'') }}" style="color:blue;text-decoration:underline;font-size:13.5px"; target="_blank"></a>
                          @else
                          <a href=" {{ URL::to(''.$kpis->bukti_path.'') }}" style="color:blue;text-decoration:underline;font-size:13.5px"; target="_blank">View</a>
                          @endif
                        </td>
                      @endif
                      @if ($key == 0)
                        <td rowspan="{{ $kewangancount }}" class="align-middle text-center">
                          @if ($kpis->kpimasters->link == '')
                          -
                          @else
                          <a href=" {{ $kpis->kpimasters->link }}" style="color:blue;text-decoration:underline;font-size:13.5px"; target="_blank">View</a>
                          @endif
                        </td>
                        <td rowspan="{{ $kewangancount }}" class="align-middle text-center">
                          <span class="text-secondary text-xs font-weight-bold" value="{{ $kpis->kpimasters -> percent_master }}">{{ $kpis->kpimasters -> percent_master }}</span>
                        </td>
                        <td rowspan="{{ $kewangancount }}" class="align-middle text-center">
                          <span class="text-secondary text-xs font-weight-bold" value="">Percentage (%)</span>
                        </td>
                        <td rowspan="{{ $kewangancount }}" class="align-middle text-center mt-2">
                          <div class="d-flex align-items-center justify-content-center">
                            <span class="me-2 text-xs font-weight-bold" value="{{$kpis->kpimasters -> pencapaian }}">{{ $kpis->kpimasters -> pencapaian }}/100</span>
                            <div>
                          @if ((($kpis->kpimasters->pencapaian)*100) >= 100)
                            <div class="progress">
                              <div class="progress-bar bg-gradient-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"></div>
                            </div>
                          @elseif((($kpis->kpimasters->pencapaian)*100) >= 90)
                            <div class="progress">
                              <div class="progress-bar bg-gradient-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 90%;"></div>
                            </div>
                          @elseif((($kpis->kpimasters->pencapaian)*100) >= 80)
                            <div class="progress">
                              <div class="progress-bar bg-gradient-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 80%;"></div>
                            </div>
                          @elseif((($kpis->kpimasters->pencapaian)*100) >= 70)
                            <div class="progress">
                              <div class="progress-bar bg-gradient-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 70%;"></div>
                            </div>
                          @elseif((($kpis->kpimasters->pencapaian)*100) >= 60)
                            <div class="progress">
                              <div class="progress-bar bg-gradient-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;"></div>
                            </div>
                          @elseif((($kpis->kpimasters->pencapaian)*100) >= 50)
                            <div class="progress">
                              <div class="progress-bar bg-gradient-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 50%;"></div>
                            </div>
                          @elseif((($kpis->kpimasters->pencapaian)*100) >= 40)
                            <div class="progress">
                              <div class="progress-bar bg-gradient-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 40%;"></div>
                            </div>
                          @elseif((($kpis->kpimasters->pencapaian)*100) >= 30)
                            <div class="progress">
                              <div class="progress-bar bg-gradient-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 30%;"></div>
                            </div>
                          @elseif((($kpis->kpimasters->pencapaian)*100) >= 20)
                            <div class="progress">
                              <div class="progress-bar bg-gradient-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 20%;"></div>
                            </div>
                          @elseif((($kpis->kpimasters->pencapaian)*100) >= 10)
                            <div class="progress">
                              <div class="progress-bar bg-gradient-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 10%;"></div>
                            </div>
                          @elseif((($kpis->kpimasters->pencapaian)*100) <= 10)
                            <div class="progress">
                              <div class="progress-bar bg-gradient-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 5%;"></div>
                            </div>
                          @elseif((($kpis->kpimasters->pencapaian)*100) == 00)
                            <div class="progress">
                              <div class="progress-bar bg-gradient-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>
                            </div>
                          @endif
                          </div>
                        </div>
                        </td>
                        <td rowspan="{{ $kewangancount }}" class="align-middle text-center">
                          <span class="text-secondary text-xs font-weight-bold" value="{{ $kpis->kpimasters -> skor_KPI }}">{{ $kpis->kpimasters -> skor_KPI }}</span>
                        </td>
                        <td rowspan="{{ $kewangancount }}" class="align-middle text-center">
                          <span class="text-secondary text-xs font-weight-bold" value="{{ round($kpis->kpimasters -> skor_sebenar,2) }}">{{ round($kpis->kpimasters -> skor_sebenar,2) }} %</span>
                        </td>
                      @else
                      @endif
                    </tr>
                  @endforeach
                  @foreach ($pelangganI as $key => $kpis)
                    <tr>
                      @if ($key == 0)
                        <td rowspan="{{ $pelangganIcount }}">
                          <p class="text-xs font-weight-bold mb-0 px-3" value="{{ $kpis -> fungsi }}">{{ $kpis -> fungsi }}</p>
                        </td>
                        <td rowspan="{{ $pelangganIcount }}" class="text-xs font-weight-bold mb-0">
                          <span class="text-secondary text-xs font-weight-bold" value="{{ $kpis->kpimasters -> objektif }}">{{ $kpis->kpimasters -> objektif }}</span>
                        </td>
                      @else
                      @endif
                      @if ($loop->last)
                        <td class="text-xs font-weight-bold">
                          <span class="text-secondary text-xs font-weight-bold" value="{{ $kpis -> bukti }}">{{ $kpis -> bukti }}</span>
                        </td>
                        <td class="text-xs font-weight-bold">
                          @if ($kpis->bukti_path == '')
                          <a href=" {{ URL::to(''.$kpis->bukti_path.'') }}" style="color:blue;text-decoration:underline;font-size:13.5px"; target="_blank"></a>
                          @else
                          <a href=" {{ URL::to(''.$kpis->bukti_path.'') }}" style="color:blue;text-decoration:underline;font-size:13.5px"; target="_blank">View</a>
                          @endif
                        </td>
                      @else
                        <td class="text-xs font-weight-bold good">
                          <span class="text-secondary text-xs font-weight-bold" value="{{ $kpis -> bukti }}">{{ $kpis -> bukti }}</span>
                        </td>
                        <td class="text-xs font-weight-bold good">
                          @if ($kpis->bukti_path == '')
                          <a href=" {{ URL::to(''.$kpis->bukti_path.'') }}" style="color:blue;text-decoration:underline;font-size:13.5px"; target="_blank"></a>
                          @else
                          <a href=" {{ URL::to(''.$kpis->bukti_path.'') }}" style="color:blue;text-decoration:underline;font-size:13.5px"; target="_blank">View</a>
                          @endif
                        </td>
                      @endif
                      @if ($key == 0)
                        <td rowspan="{{ $pelangganIcount }}" class="align-middle text-center">
                          @if ($kpis->kpimasters->link == '')
                          -
                          @else
                          <a href=" {{ $kpis->kpimasters->link }}" style="color:blue;text-decoration:underline;font-size:13.5px"; target="_blank">View</a>
                          @endif
                        </td>
                        <td rowspan="{{ $pelangganIcount }}" class="align-middle text-center">
                          <span class="text-secondary text-xs font-weight-bold" value="{{ $kpis->kpimasters -> percent_master }}">{{ $kpis->kpimasters -> percent_master }}</span>
                        </td>
                        <td rowspan="{{ $pelangganIcount }}" class="align-middle text-center">
                          <span class="text-secondary text-xs font-weight-bold" value="">Percentage (%)</span>
                        </td>
                        <td rowspan="{{ $pelangganIcount }}" class="align-middle text-center mt-2">
                          <div class="d-flex align-items-center justify-content-center">
                            <span class="me-2 text-xs font-weight-bold" value="{{$kpis->kpimasters -> pencapaian }}">{{ $kpis->kpimasters -> pencapaian }}/100</span>
                            <div>
                          @if ((($kpis->kpimasters->pencapaian)*100) >= 100)
                            <div class="progress">
                              <div class="progress-bar bg-gradient-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"></div>
                            </div>
                          @elseif((($kpis->kpimasters->pencapaian)*100) >= 90)
                            <div class="progress">
                              <div class="progress-bar bg-gradient-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 90%;"></div>
                            </div>
                          @elseif((($kpis->kpimasters->pencapaian)*100) >= 80)
                            <div class="progress">
                              <div class="progress-bar bg-gradient-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 80%;"></div>
                            </div>
                          @elseif((($kpis->kpimasters->pencapaian)*100) >= 70)
                            <div class="progress">
                              <div class="progress-bar bg-gradient-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 70%;"></div>
                            </div>
                          @elseif((($kpis->kpimasters->pencapaian)*100) >= 60)
                            <div class="progress">
                              <div class="progress-bar bg-gradient-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;"></div>
                            </div>
                          @elseif((($kpis->kpimasters->pencapaian)*100) >= 50)
                            <div class="progress">
                              <div class="progress-bar bg-gradient-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 50%;"></div>
                            </div>
                          @elseif((($kpis->kpimasters->pencapaian)*100) >= 40)
                            <div class="progress">
                              <div class="progress-bar bg-gradient-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 40%;"></div>
                            </div>
                          @elseif((($kpis->kpimasters->pencapaian)*100) >= 30)
                            <div class="progress">
                              <div class="progress-bar bg-gradient-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 30%;"></div>
                            </div>
                          @elseif((($kpis->kpimasters->pencapaian)*100) >= 20)
                            <div class="progress">
                              <div class="progress-bar bg-gradient-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 20%;"></div>
                            </div>
                          @elseif((($kpis->kpimasters->pencapaian)*100) >= 10)
                            <div class="progress">
                              <div class="progress-bar bg-gradient-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 10%;"></div>
                            </div>
                          @elseif((($kpis->kpimasters->pencapaian)*100) <= 10)
                            <div class="progress">
                              <div class="progress-bar bg-gradient-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 5%;"></div>
                            </div>
                          @elseif((($kpis->kpimasters->pencapaian)*100) == 00)
                            <div class="progress">
                              <div class="progress-bar bg-gradient-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>
                            </div>
                          @endif
                          </div>
                        </div>
                        </td>
                        <td rowspan="{{ $pelangganIcount }}" class="align-middle text-center">
                          <span class="text-secondary text-xs font-weight-bold" value="{{ $kpis->kpimasters -> skor_KPI }}">{{ $kpis->kpimasters -> skor_KPI }}</span>
                        </td>
                        <td rowspan="{{ $pelangganIcount }}" class="align-middle text-center">
                          <span class="text-secondary text-xs font-weight-bold" value="{{ round($kpis->kpimasters -> skor_sebenar,2) }}">{{ round($kpis->kpimasters -> skor_sebenar,2) }} %</span>
                        </td>
                      @else
                      @endif
                    </tr>
                  @endforeach
                  @foreach ($pelangganII as $key => $kpis)
                    <tr>
                      @if ($key == 0)
                        <td rowspan="{{ $pelangganIIcount }}">
                          <p class="text-xs font-weight-bold mb-0 px-3" value="{{ $kpis -> fungsi }}">{{ $kpis -> fungsi }}</p>
                        </td>
                        <td rowspan="{{ $pelangganIIcount }}" class="text-xs font-weight-bold mb-0">
                          <span class="text-secondary text-xs font-weight-bold" value="{{ $kpis->kpimasters -> objektif }}">{{ $kpis->kpimasters -> objektif }}</span>
                        </td>
                      @else
                      @endif
                      @if ($loop->last)
                        <td class="text-xs font-weight-bold">
                          <span class="text-secondary text-xs font-weight-bold" value="{{ $kpis -> bukti }}">{{ $kpis -> bukti }}</span>
                        </td>
                        <td class="text-xs font-weight-bold">
                          @if ($kpis->bukti_path == '')
                          <a href=" {{ URL::to(''.$kpis->bukti_path.'') }}" style="color:blue;text-decoration:underline;font-size:13.5px"; target="_blank"></a>
                          @else
                          <a href=" {{ URL::to(''.$kpis->bukti_path.'') }}" style="color:blue;text-decoration:underline;font-size:13.5px"; target="_blank">View</a>
                          @endif
                        </td>
                      @else
                        <td class="text-xs font-weight-bold good">
                          <span class="text-secondary text-xs font-weight-bold" value="{{ $kpis -> bukti }}">{{ $kpis -> bukti }}</span>
                        </td>
                        <td class="text-xs font-weight-bold good">
                          @if ($kpis->bukti_path == '')
                          <a href=" {{ URL::to(''.$kpis->bukti_path.'') }}" style="color:blue;text-decoration:underline;font-size:13.5px"; target="_blank"></a>
                          @else
                          <a href=" {{ URL::to(''.$kpis->bukti_path.'') }}" style="color:blue;text-decoration:underline;font-size:13.5px"; target="_blank">View</a>
                          @endif
                        </td>
                      @endif
                      @if ($key == 0)
                        <td rowspan="{{ $pelangganIIcount }}" class="align-middle text-center">
                          @if ($kpis->kpimasters->link == '')
                          -
                          @else
                          <a href=" {{ $kpis->kpimasters->link }}" style="color:blue;text-decoration:underline;font-size:13.5px"; target="_blank">View</a>
                          @endif
                        </td>
                        <td rowspan="{{ $pelangganIIcount }}" class="align-middle text-center">
                          <span class="text-secondary text-xs font-weight-bold" value="{{ $kpis->kpimasters -> percent_master }}">{{ $kpis->kpimasters -> percent_master }}</span>
                        </td>
                        <td rowspan="{{ $pelangganIIcount }}" class="align-middle text-center">
                          <span class="text-secondary text-xs font-weight-bold" value="">Percentage (%)</span>
                        </td>
                        <td rowspan="{{ $pelangganIIcount }}" class="align-middle text-center mt-2">
                          <div class="d-flex align-items-center justify-content-center">
                            <span class="me-2 text-xs font-weight-bold" value="{{$kpis->kpimasters -> pencapaian }}">{{ $kpis->kpimasters -> pencapaian }}/100</span>
                            <div>
                          @if (($kpis->kpimasters->pencapaian) >= 100)
                            <div class="progress">
                              <div class="progress-bar bg-gradient-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"></div>
                            </div>
                          @elseif(($kpis->kpimasters->pencapaian) >= 90)
                            <div class="progress">
                              <div class="progress-bar bg-gradient-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 90%;"></div>
                            </div>
                          @elseif(($kpis->kpimasters->pencapaian) >= 80)
                            <div class="progress">
                              <div class="progress-bar bg-gradient-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 80%;"></div>
                            </div>
                          @elseif(($kpis->kpimasters->pencapaian) >= 70)
                            <div class="progress">
                              <div class="progress-bar bg-gradient-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 70%;"></div>
                            </div>
                          @elseif(($kpis->kpimasters->pencapaian) >= 60)
                            <div class="progress">
                              <div class="progress-bar bg-gradient-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;"></div>
                            </div>
                          @elseif(($kpis->kpimasters->pencapaian) >= 50)
                            <div class="progress">
                              <div class="progress-bar bg-gradient-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 50%;"></div>
                            </div>
                          @elseif(($kpis->kpimasters->pencapaian) >= 40)
                            <div class="progress">
                              <div class="progress-bar bg-gradient-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 40%;"></div>
                            </div>
                          @elseif(($kpis->kpimasters->pencapaian) >= 30)
                            <div class="progress">
                              <div class="progress-bar bg-gradient-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 30%;"></div>
                            </div>
                          @elseif(($kpis->kpimasters->pencapaian) >= 20)
                            <div class="progress">
                              <div class="progress-bar bg-gradient-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 20%;"></div>
                            </div>
                          @elseif(($kpis->kpimasters->pencapaian) >= 10)
                            <div class="progress">
                              <div class="progress-bar bg-gradient-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 10%;"></div>
                            </div>
                          @elseif(($kpis->kpimasters->pencapaian) <= 10)
                            <div class="progress">
                              <div class="progress-bar bg-gradient-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 5%;"></div>
                            </div>
                          @elseif(($kpis->kpimasters->pencapaian) == 00)
                            <div class="progress">
                              <div class="progress-bar bg-gradient-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>
                            </div>
                          @endif
                          </div>
                        </div>
                        </td>
                        <td rowspan="{{ $pelangganIIcount }}" class="align-middle text-center">
                          <span class="text-secondary text-xs font-weight-bold" value="{{ $kpis->kpimasters -> skor_KPI }}">{{ $kpis->kpimasters -> skor_KPI }}</span>
                        </td>
                        <td rowspan="{{ $pelangganIIcount }}" class="align-middle text-center">
                          <span class="text-secondary text-xs font-weight-bold" value="{{ round($kpis->kpimasters -> skor_sebenar,2) }}">{{ round($kpis->kpimasters -> skor_sebenar,2) }} %</span>
                        </td>
                      @else
                      @endif
                    </tr>
                  @endforeach
                  @foreach ($kecemerlangan as $key => $kpis)
                    <tr>
                      @if ($key == 0)
                        <td rowspan="{{ $kecemerlangancount }}">
                          <p class="text-xs font-weight-bold mb-0 px-3" value="{{ $kpis -> fungsi }}">{{ $kpis -> fungsi }}</p>
                        </td>
                        <td rowspan="{{ $kecemerlangancount }}" class="text-xs font-weight-bold mb-0">
                          <span class="text-secondary text-xs font-weight-bold" value="{{ $kpis->kpimasters -> objektif }}">{{ $kpis->kpimasters -> objektif }}</span>
                        </td>
                      @else
                      @endif
                      @if ($loop->last)
                        <td class="text-xs font-weight-bold">
                          <span class="text-secondary text-xs font-weight-bold" value="{{ $kpis -> bukti }}">{{ $kpis -> bukti }}</span>
                        </td>
                        <td class="text-xs font-weight-bold">
                          @if ($kpis->bukti_path == '')
                          <a href=" {{ URL::to(''.$kpis->bukti_path.'') }}" style="color:blue;text-decoration:underline;font-size:13.5px"; target="_blank"></a>
                          @else
                          <a href=" {{ URL::to(''.$kpis->bukti_path.'') }}" style="color:blue;text-decoration:underline;font-size:13.5px"; target="_blank">View</a>
                          @endif
                        </td>
                      @else
                        <td class="text-xs font-weight-bold good">
                          <span class="text-secondary text-xs font-weight-bold" value="{{ $kpis -> bukti }}">{{ $kpis -> bukti }}</span>
                        </td>
                        <td class="text-xs font-weight-bold good">
                          @if ($kpis->bukti_path == '')
                          <a href=" {{ URL::to(''.$kpis->bukti_path.'') }}" style="color:blue;text-decoration:underline;font-size:13.5px"; target="_blank"></a>
                          @else
                          <a href=" {{ URL::to(''.$kpis->bukti_path.'') }}" style="color:blue;text-decoration:underline;font-size:13.5px"; target="_blank">View</a>
                          @endif
                        </td>
                      @endif
                      @if ($key == 0)
                        <td rowspan="{{ $kecemerlangancount }}" class="align-middle text-center">
                          @if ($kpis->kpimasters->link == '')
                          -
                          @else
                          <a href=" {{ $kpis->kpimasters->link }}" style="color:blue;text-decoration:underline;font-size:13.5px"; target="_blank">View</a>
                          @endif
                        </td>
                        <td rowspan="{{ $kecemerlangancount }}" class="align-middle text-center">
                          <span class="text-secondary text-xs font-weight-bold" value="{{ $kpis->kpimasters -> percent_master }}">{{ $kpis->kpimasters -> percent_master }}</span>
                        </td>
                        <td rowspan="{{ $kecemerlangancount }}" class="align-middle text-center">
                          <span class="text-secondary text-xs font-weight-bold" value="">Percentage (%)</span>
                        </td>
                        <td rowspan="{{ $kecemerlangancount }}" class="align-middle text-center mt-2">
                          <div class="d-flex align-items-center justify-content-center">
                            <span class="me-2 text-xs font-weight-bold" value="{{$kpis->kpimasters -> pencapaian }}">{{ $kpis->kpimasters -> pencapaian }}/100</span>
                            <div>
                          @if (($kpis->kpimasters->pencapaian) >= 100)
                            <div class="progress">
                              <div class="progress-bar bg-gradient-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"></div>
                            </div>
                          @elseif(($kpis->kpimasters->pencapaian) >= 90)
                            <div class="progress">
                              <div class="progress-bar bg-gradient-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 90%;"></div>
                            </div>
                          @elseif(($kpis->kpimasters->pencapaian) >= 80)
                            <div class="progress">
                              <div class="progress-bar bg-gradient-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 80%;"></div>
                            </div>
                          @elseif(($kpis->kpimasters->pencapaian) >= 70)
                            <div class="progress">
                              <div class="progress-bar bg-gradient-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 70%;"></div>
                            </div>
                          @elseif(($kpis->kpimasters->pencapaian) >= 60)
                            <div class="progress">
                              <div class="progress-bar bg-gradient-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;"></div>
                            </div>
                          @elseif(($kpis->kpimasters->pencapaian) >= 50)
                            <div class="progress">
                              <div class="progress-bar bg-gradient-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 50%;"></div>
                            </div>
                          @elseif(($kpis->kpimasters->pencapaian) >= 40)
                            <div class="progress">
                              <div class="progress-bar bg-gradient-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 40%;"></div>
                            </div>
                          @elseif(($kpis->kpimasters->pencapaian) >= 30)
                            <div class="progress">
                              <div class="progress-bar bg-gradient-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 30%;"></div>
                            </div>
                          @elseif(($kpis->kpimasters->pencapaian) >= 20)
                            <div class="progress">
                              <div class="progress-bar bg-gradient-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 20%;"></div>
                            </div>
                          @elseif(($kpis->kpimasters->pencapaian) >= 10)
                            <div class="progress">
                              <div class="progress-bar bg-gradient-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 10%;"></div>
                            </div>
                          @elseif(($kpis->kpimasters->pencapaian) <= 10)
                            <div class="progress">
                              <div class="progress-bar bg-gradient-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 5%;"></div>
                            </div>
                          @elseif(($kpis->kpimasters->pencapaian) == 00)
                            <div class="progress">
                              <div class="progress-bar bg-gradient-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>
                            </div>
                          @endif
                          </div>
                        </div>
                        </td>
                        <td rowspan="{{ $kecemerlangancount }}" class="align-middle text-center">
                          <span class="text-secondary text-xs font-weight-bold" value="{{ $kpis->kpimasters -> skor_KPI }}">{{ $kpis->kpimasters -> skor_KPI }}</span>
                        </td>
                        <td rowspan="{{ $kecemerlangancount }}" class="align-middle text-center">
                          <span class="text-secondary text-xs font-weight-bold" value="{{ round($kpis->kpimasters -> skor_sebenar,2) }}">{{ round($kpis->kpimasters -> skor_sebenar,2) }} %</span>
                        </td>
                      @else
                      @endif
                    </tr>
                  @endforeach
                  @foreach ($training as $key => $kpis)
                    <tr>
                      @if ($key == 0)
                        <td rowspan="{{ $trainingcount }}">
                          <p class="text-xs font-weight-bold mb-0 px-3" value="{{ $kpis -> fungsi }}">{{ $kpis -> fungsi }}</p>
                        </td>
                        <td rowspan="{{ $trainingcount }}" class="text-xs font-weight-bold mb-0">
                          <span class="text-secondary text-xs font-weight-bold" value="{{ $kpis->kpimasters -> objektif }}">{{ $kpis->kpimasters -> objektif }}</span>
                        </td>
                      @else
                      @endif
                      @if ($loop->last)
                        <td class="text-xs font-weight-bold">
                          <span class="text-secondary text-xs font-weight-bold" value="{{ $kpis -> bukti }}">{{ $kpis -> bukti }}</span>
                        </td>
                        <td class="text-xs font-weight-bold">
                          @if ($kpis->bukti_path == '')
                          <a href=" {{ URL::to(''.$kpis->bukti_path.'') }}" style="color:blue;text-decoration:underline;font-size:13.5px"; target="_blank"></a>
                          @else
                          <a href=" {{ URL::to(''.$kpis->bukti_path.'') }}" style="color:blue;text-decoration:underline;font-size:13.5px"; target="_blank">View</a>
                          @endif
                        </td>
                      @else
                        <td class="text-xs font-weight-bold good">
                          <span class="text-secondary text-xs font-weight-bold" value="{{ $kpis -> bukti }}">{{ $kpis -> bukti }}</span>
                        </td>
                        <td class="text-xs font-weight-bold good">
                          @if ($kpis->bukti_path == '')
                          <a href=" {{ URL::to(''.$kpis->bukti_path.'') }}" style="color:blue;text-decoration:underline;font-size:13.5px"; target="_blank"></a>
                          @else
                          <a href=" {{ URL::to(''.$kpis->bukti_path.'') }}" style="color:blue;text-decoration:underline;font-size:13.5px"; target="_blank">View</a>
                          @endif
                        </td>
                      @endif
                      @if ($key == 0)
                        <td rowspan="{{ $trainingcount }}" class="align-middle text-center">
                          @if ($kpis->kpimasters->link == '')
                          -
                          @else
                          <a href=" {{ $kpis->kpimasters->link }}" style="color:blue;text-decoration:underline;font-size:13.5px"; target="_blank">View</a>
                          @endif
                        </td>
                        <td rowspan="{{ $trainingcount }}" class="align-middle text-center">
                          <span class="text-secondary text-xs font-weight-bold" value="{{ $kpis->kpimasters -> percent_master }}">{{ $kpis->kpimasters -> percent_master }}</span>
                        </td>
                        <td rowspan="{{ $trainingcount }}" class="align-middle text-center">
                          <span class="text-secondary text-xs font-weight-bold" value="">Percentage (%)</span>
                        </td>
                        <td rowspan="{{ $trainingcount }}" class="align-middle text-center mt-2">
                          <div class="d-flex align-items-center justify-content-center">
                            <span class="me-2 text-xs font-weight-bold" value="{{$kpis->kpimasters -> pencapaian }}">{{ $kpis->kpimasters -> pencapaian }}/100</span>
                            <div>
                          @if (($kpis->kpimasters->pencapaian) >= 100)
                            <div class="progress">
                              <div class="progress-bar bg-gradient-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"></div>
                            </div>
                          @elseif(($kpis->kpimasters->pencapaian) >= 90)
                            <div class="progress">
                              <div class="progress-bar bg-gradient-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 90%;"></div>
                            </div>
                          @elseif(($kpis->kpimasters->pencapaian) >= 80)
                            <div class="progress">
                              <div class="progress-bar bg-gradient-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 80%;"></div>
                            </div>
                          @elseif(($kpis->kpimasters->pencapaian) >= 70)
                            <div class="progress">
                              <div class="progress-bar bg-gradient-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 70%;"></div>
                            </div>
                          @elseif(($kpis->kpimasters->pencapaian) >= 60)
                            <div class="progress">
                              <div class="progress-bar bg-gradient-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;"></div>
                            </div>
                          @elseif(($kpis->kpimasters->pencapaian) >= 50)
                            <div class="progress">
                              <div class="progress-bar bg-gradient-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 50%;"></div>
                            </div>
                          @elseif(($kpis->kpimasters->pencapaian) >= 40)
                            <div class="progress">
                              <div class="progress-bar bg-gradient-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 40%;"></div>
                            </div>
                          @elseif(($kpis->kpimasters->pencapaian) >= 30)
                            <div class="progress">
                              <div class="progress-bar bg-gradient-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 30%;"></div>
                            </div>
                          @elseif(($kpis->kpimasters->pencapaian) >= 20)
                            <div class="progress">
                              <div class="progress-bar bg-gradient-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 20%;"></div>
                            </div>
                          @elseif(($kpis->kpimasters->pencapaian) >= 10)
                            <div class="progress">
                              <div class="progress-bar bg-gradient-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 10%;"></div>
                            </div>
                          @elseif(($kpis->kpimasters->pencapaian) <= 10)
                            <div class="progress">
                              <div class="progress-bar bg-gradient-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 5%;"></div>
                            </div>
                          @elseif(($kpis->kpimasters->pencapaian) == 00)
                            <div class="progress">
                              <div class="progress-bar bg-gradient-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>
                            </div>
                          @endif
                          </div>
                        </div>
                        </td>
                        <td rowspan="{{ $trainingcount }}" class="align-middle text-center">
                          <span class="text-secondary text-xs font-weight-bold" value="{{ $kpis->kpimasters -> skor_KPI }}">{{ $kpis->kpimasters -> skor_KPI }}</span>
                        </td>
                        <td rowspan="{{ $trainingcount }}" class="align-middle text-center">
                          <span class="text-secondary text-xs font-weight-bold" value="{{ round($kpis->kpimasters -> skor_sebenar,2) }}">{{ round($kpis->kpimasters -> skor_sebenar,2) }} %</span>
                        </td>
                      @else
                      @endif
                    </tr>
                  @endforeach
                  @foreach ($ncr as $key => $kpis)
                    <tr>
                      @if ($key == 0)
                        <td rowspan="{{ $ncrcount }}">
                          <p class="text-xs font-weight-bold mb-0 px-3" value="{{ $kpis -> fungsi }}">{{ $kpis -> fungsi }}</p>
                        </td>
                        <td rowspan="{{ $ncrcount }}" class="text-xs font-weight-bold mb-0">
                          <span class="text-secondary text-xs font-weight-bold" value="{{ $kpis->kpimasters -> objektif }}">{{ $kpis->kpimasters -> objektif }}</span>
                        </td>
                      @else
                      @endif
                      @if ($loop->last)
                        <td class="text-xs font-weight-bold">
                          <span class="text-secondary text-xs font-weight-bold" value="{{ $kpis -> bukti }}">{{ $kpis -> bukti }}</span>
                        </td>
                        <td class="text-xs font-weight-bold">
                          @if ($kpis->bukti_path == '')
                          <a href=" {{ URL::to(''.$kpis->bukti_path.'') }}" style="color:blue;text-decoration:underline;font-size:13.5px"; target="_blank"></a>
                          @else
                          <a href=" {{ URL::to(''.$kpis->bukti_path.'') }}" style="color:blue;text-decoration:underline;font-size:13.5px"; target="_blank">View</a>
                          @endif
                        </td>
                      @else
                        <td class="text-xs font-weight-bold good">
                          <span class="text-secondary text-xs font-weight-bold" value="{{ $kpis -> bukti }}">{{ $kpis -> bukti }}</span>
                        </td>
                        <td class="text-xs font-weight-bold good">
                          @if ($kpis->bukti_path == '')
                          <a href=" {{ URL::to(''.$kpis->bukti_path.'') }}" style="color:blue;text-decoration:underline;font-size:13.5px"; target="_blank"></a>
                          @else
                          <a href=" {{ URL::to(''.$kpis->bukti_path.'') }}" style="color:blue;text-decoration:underline;font-size:13.5px"; target="_blank">View</a>
                          @endif
                        </td>
                      @endif
                      @if ($key == 0)
                        <td rowspan="{{ $ncrcount }}" class="align-middle text-center">
                          @if ($kpis->kpimasters->link == '')
                          -
                          @else
                          <a href=" {{ $kpis->kpimasters->link }}" style="color:blue;text-decoration:underline;font-size:13.5px"; target="_blank">View</a>
                          @endif
                        </td>
                        <td rowspan="{{ $ncrcount }}" class="align-middle text-center">
                          <span class="text-secondary text-xs font-weight-bold" value="{{ $kpis->kpimasters -> percent_master }}">{{ $kpis->kpimasters -> percent_master }}</span>
                        </td>
                        <td rowspan="{{ $ncrcount }}" class="align-middle text-center">
                          <span class="text-secondary text-xs font-weight-bold" value="">Percentage (%)</span>
                        </td>
                        <td rowspan="{{ $ncrcount }}" class="align-middle text-center mt-2">
                          <div class="d-flex align-items-center justify-content-center">
                            <span class="me-2 text-xs font-weight-bold" value="{{$kpis->kpimasters -> pencapaian }}">{{ $kpis->kpimasters -> pencapaian }}/100</span>
                            <div>
                          @if (($kpis->kpimasters->pencapaian) >= 100)
                            <div class="progress">
                              <div class="progress-bar bg-gradient-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"></div>
                            </div>
                          @elseif(($kpis->kpimasters->pencapaian) >= 90)
                            <div class="progress">
                              <div class="progress-bar bg-gradient-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 90%;"></div>
                            </div>
                          @elseif(($kpis->kpimasters->pencapaian) >= 80)
                            <div class="progress">
                              <div class="progress-bar bg-gradient-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 80%;"></div>
                            </div>
                          @elseif(($kpis->kpimasters->pencapaian) >= 70)
                            <div class="progress">
                              <div class="progress-bar bg-gradient-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 70%;"></div>
                            </div>
                          @elseif(($kpis->kpimasters->pencapaian) >= 60)
                            <div class="progress">
                              <div class="progress-bar bg-gradient-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;"></div>
                            </div>
                          @elseif(($kpis->kpimasters->pencapaian) >= 50)
                            <div class="progress">
                              <div class="progress-bar bg-gradient-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 50%;"></div>
                            </div>
                          @elseif(($kpis->kpimasters->pencapaian) >= 40)
                            <div class="progress">
                              <div class="progress-bar bg-gradient-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 40%;"></div>
                            </div>
                          @elseif(($kpis->kpimasters->pencapaian) >= 30)
                            <div class="progress">
                              <div class="progress-bar bg-gradient-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 30%;"></div>
                            </div>
                          @elseif(($kpis->kpimasters->pencapaian) >= 20)
                            <div class="progress">
                              <div class="progress-bar bg-gradient-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 20%;"></div>
                            </div>
                          @elseif(($kpis->kpimasters->pencapaian) >= 10)
                            <div class="progress">
                              <div class="progress-bar bg-gradient-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 10%;"></div>
                            </div>
                          @elseif(($kpis->kpimasters->pencapaian) <= 10)
                            <div class="progress">
                              <div class="progress-bar bg-gradient-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 5%;"></div>
                            </div>
                          @elseif(($kpis->kpimasters->pencapaian) == 00)
                            <div class="progress">
                              <div class="progress-bar bg-gradient-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>
                            </div>
                          @endif
                          </div>
                        </div>
                        </td>
                        <td rowspan="{{ $ncrcount }}" class="align-middle text-center">
                          <span class="text-secondary text-xs font-weight-bold" value="{{ $kpis->kpimasters -> skor_KPI }}">{{ $kpis->kpimasters -> skor_KPI }}</span>
                        </td>
                        <td rowspan="{{ $ncrcount }}" class="align-middle text-center">
                          <span class="text-secondary text-xs font-weight-bold" value="{{ round($kpis->kpimasters -> skor_sebenar,2) }}">{{ round($kpis->kpimasters -> skor_sebenar,2) }} %</span>
                        </td>
                      @else
                      @endif
                    </tr>
                  @endforeach
                  @foreach ($kolaborasi as $key => $kpis)
                    <tr>
                      @if ($key == 0)
                        <td rowspan="{{ $kolaborasicount }}">
                          <p class="text-xs font-weight-bold mb-0 px-3" value="{{ $kpis -> fungsi }}">{{ $kpis -> fungsi }}</p>
                        </td>
                        <td rowspan="{{ $kolaborasicount }}" class="text-xs font-weight-bold mb-0">
                          <span class="text-secondary text-xs font-weight-bold" value="{{ $kpis->kpimasters -> objektif }}">{{ $kpis->kpimasters -> objektif }}</span>
                        </td>
                      @else
                      @endif
                      @if ($loop->last)
                        <td class="text-xs font-weight-bold">
                          <span class="text-secondary text-xs font-weight-bold" value="{{ $kpis -> bukti }}">{{ $kpis -> bukti }}</span>
                        </td>
                        <td class="text-xs font-weight-bold">
                          @if ($kpis->bukti_path == '')
                          <a href=" {{ URL::to(''.$kpis->bukti_path.'') }}" style="color:blue;text-decoration:underline;font-size:13.5px"; target="_blank"></a>
                          @else
                          <a href=" {{ URL::to(''.$kpis->bukti_path.'') }}" style="color:blue;text-decoration:underline;font-size:13.5px"; target="_blank">View</a>
                          @endif
                        </td>
                      @else
                        <td class="text-xs font-weight-bold good">
                          <span class="text-secondary text-xs font-weight-bold" value="{{ $kpis -> bukti }}">{{ $kpis -> bukti }}</span>
                        </td>
                        <td class="text-xs font-weight-bold good">
                          @if ($kpis->bukti_path == '')
                          <a href=" {{ URL::to(''.$kpis->bukti_path.'') }}" style="color:blue;text-decoration:underline;font-size:13.5px"; target="_blank"></a>
                          @else
                          <a href=" {{ URL::to(''.$kpis->bukti_path.'') }}" style="color:blue;text-decoration:underline;font-size:13.5px"; target="_blank">View</a>
                          @endif
                        </td>
                      @endif
                      @if ($key == 0)
                        <td rowspan="{{ $kolaborasicount }}" class="align-middle text-center">
                          @if ($kpis->kpimasters->link == '')
                          -
                          @else
                          <a href=" {{ $kpis->kpimasters->link }}" style="color:blue;text-decoration:underline;font-size:13.5px"; target="_blank">View</a>
                          @endif
                        </td>
                        <td rowspan="{{ $kolaborasicount }}" class="align-middle text-center">
                          <span class="text-secondary text-xs font-weight-bold" value="{{ $kpis->kpimasters -> percent_master }}">{{ $kpis->kpimasters -> percent_master }}</span>
                        </td>
                        <td rowspan="{{ $kolaborasicount }}" class="align-middle text-center">
                          <span class="text-secondary text-xs font-weight-bold" value="">Percentage (%)</span>
                        </td>
                        <td rowspan="{{ $kolaborasicount }}" class="align-middle text-center mt-2">
                          <div class="d-flex align-items-center justify-content-center">
                            <span class="me-2 text-xs font-weight-bold" value="{{$kpis->kpimasters -> pencapaian }}">{{ $kpis->kpimasters -> pencapaian }}/100</span>
                            <div>
                          @if (($kpis->kpimasters->pencapaian) >= 100)
                            <div class="progress">
                              <div class="progress-bar bg-gradient-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"></div>
                            </div>
                          @elseif(($kpis->kpimasters->pencapaian) >= 90)
                            <div class="progress">
                              <div class="progress-bar bg-gradient-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 90%;"></div>
                            </div>
                          @elseif(($kpis->kpimasters->pencapaian) >= 80)
                            <div class="progress">
                              <div class="progress-bar bg-gradient-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 80%;"></div>
                            </div>
                          @elseif(($kpis->kpimasters->pencapaian) >= 70)
                            <div class="progress">
                              <div class="progress-bar bg-gradient-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 70%;"></div>
                            </div>
                          @elseif(($kpis->kpimasters->pencapaian) >= 60)
                            <div class="progress">
                              <div class="progress-bar bg-gradient-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;"></div>
                            </div>
                          @elseif(($kpis->kpimasters->pencapaian) >= 50)
                            <div class="progress">
                              <div class="progress-bar bg-gradient-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 50%;"></div>
                            </div>
                          @elseif(($kpis->kpimasters->pencapaian) >= 40)
                            <div class="progress">
                              <div class="progress-bar bg-gradient-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 40%;"></div>
                            </div>
                          @elseif(($kpis->kpimasters->pencapaian) >= 30)
                            <div class="progress">
                              <div class="progress-bar bg-gradient-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 30%;"></div>
                            </div>
                          @elseif(($kpis->kpimasters->pencapaian) >= 20)
                            <div class="progress">
                              <div class="progress-bar bg-gradient-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 20%;"></div>
                            </div>
                          @elseif(($kpis->kpimasters->pencapaian) >= 10)
                            <div class="progress">
                              <div class="progress-bar bg-gradient-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 10%;"></div>
                            </div>
                          @elseif(($kpis->kpimasters->pencapaian) <= 10)
                            <div class="progress">
                              <div class="progress-bar bg-gradient-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 5%;"></div>
                            </div>
                          @elseif(($kpis->kpimasters->pencapaian) == 00)
                            <div class="progress">
                              <div class="progress-bar bg-gradient-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>
                            </div>
                          @endif
                          </div>
                        </div>
                        </td>
                        <td rowspan="{{ $kolaborasicount }}" class="align-middle text-center">
                          <span class="text-secondary text-xs font-weight-bold" value="{{ $kpis->kpimasters -> skor_KPI }}">{{ $kpis->kpimasters -> skor_KPI }}</span>
                        </td>
                        <td rowspan="{{ $kolaborasicount }}" class="align-middle text-center">
                          <span class="text-secondary text-xs font-weight-bold" value="{{ round($kpis->kpimasters -> skor_sebenar,2) }}">{{ round($kpis->kpimasters -> skor_sebenar,2) }} %</span>
                        </td>
                      @else
                      @endif
                    </tr>
                  @endforeach
                  <tr>
                  </tr>
                </tbody>  
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
    @if ($kecekapan_master < 100) 
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
      <strong>{{ session('fail2') }}Employee total weightage for Kecekapan Master is lower than 100%. Please check back.</strong>
    </div>
    @else
    @endif
    @if ($kecekapan_master > 100) 
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
      <strong>{{ session('fail2') }}Employee total weightage for Kecekapan Master exceed 100%. Please check back.</strong>
    </div>
    @else
    @endif
    <div class="row">
      <div class="col-12">
        <div class="card mb-4">
          <div class="card-header pb-0">
            <h6>KAD SKOR - Kecekapan Teras <span style="color:red;">(Current total weightage = {{$kecekapan_master}})</span></h6>
          </div>
          <div class="card-body px-0 pt-0 pb-2">
            <div class="p-0">
              <table class="table align-items-center justify-content-center mb-0">
                <thead>
                  <tr>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Kecekapan Teras</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Jangkaan Hasil</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">%</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Ukuran</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Skor<br>Pekerja</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Skor<br>Penyelia</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Skor<br>Sebenar</th>
                          @if (Auth::user()->role == "manager")
                          {{-- <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Edit</th> --}}
                          <th></th>
                          @else 
                          @endif
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($kecekapan as $key => $kecekapans)
                          <tr>
                            <td>
      
                              <div class="d-flex px-3 py-1">
                                <div class="d-flex flex-column justify-content-center"> 
                                  <p class="text-xs font-weight-bold mb-0" value="{{ $kecekapans -> kecekapan_teras }}">{{ $kecekapans -> kecekapan_teras }}</p>
                                </div>
                              </div> 
                            </td>
      
                            @if ($kecekapans -> kecekapan_teras == "Kepimpinan Organisasi")
                            <td class="text-xs font-weight-bold mb-0">
                              <h6 class="text-secondary text-xs font-weight-bold boxes" value="">
                                Pekerja yang sedar dan menyesuaikan diri dengan strategi organisasi
                                <br>
                                Pemimpin yang bertindak selaras dengan strategi organisasi
                                <br>
                                Pengurus yang dapat mengembangkan dan memperkasakan pekerja bawahannya
                                <br>
                                Budaya organisasi yang mencerminkan nilainya
                                <br>
                                Pemimpin yang bertindak selaras dengan strategi organisasi</h6>
                            </td>
                            @else
                            @endif 
      
                            @if ($kecekapans -> kecekapan_teras == "Keupayaan Inovatif")
                            <td class="text-xs font-weight-bold mb-0">
                              <h6 class="text-secondary text-xs font-weight-bold boxes" value="">
                                Pekerja yang berupaya memberi idea dan memberi penyelesaian untuk menyelesaikan masalah
                                <br>
                                Amalan kerja yang dikemas kini lebih sesuai dengan jangkaan masa kini
                                <br>
                                Penerimaan untuk organisasi, dan semua bahagiannya, perlu berubah dan terus meningkat
                                <br>
                                Pemimpin yang bertindak selaras dengan strategi organisasi</h6>
                            </td>
                            @else
                            @endif 
      
                            @if ($kecekapans -> kecekapan_teras == "Pengurusan Pelanggan")
                            <td class="text-xs font-weight-bold mb-0">
                              <h6 class="text-secondary text-xs font-weight-bold boxes" value="">
                                Amalan organisasi yang lebih sesuai dengan keperluan pelanggan moden
                                <br>
                                Pekerja yang memahami dan bertindak mengikut kehendak pelanggan tepat pada masanya
                                <br>
                                Penciptaan produk dan perkhidmatan masa depan yang lebih mencerminkan keperluan pelanggan
                                <br>
                                Pemimpin yang bertindak selaras dengan strategi organisasi</h6>
                            </td>
                            @else
                            @endif 
      
                            @if ($kecekapans -> kecekapan_teras == "Pengurusan Pemegang Berkepentingan")
                            <td class="text-xs font-weight-bold mb-0">
                              <h6 class="text-secondary text-xs font-weight-bold boxes" value="">
                                Pekerja yang lebih empati dengan pihak berkepentingan mereka
                                <br>
                                Pembinaan hubungan positif dengan pihak berkepentingan
                                <br>
                                Pembentukan perkongsian strategik yang membantu mencapai objektif organisasi
                                <br>
                                Pengurus yang mendorong pekerja bawahan mereka membina rangkaian profesional mereka sendiri
                                <br>
                                Pemimpin yang bertindak selaras dengan strategi organisasi</h6>
                            </td>
                            @else
                            @endif 
      
                            @if ($kecekapans -> kecekapan_teras == "Ketangkasan Dalam Organisasi")
                            <td class="text-xs font-weight-bold mb-0">
                              <h6 class="text-secondary text-xs font-weight-bold boxes" value="">
                                Pekerja yang berpengetahuan dan serba boleh
                                <br>
                                Penghargaan dan penerapan budaya bimbingan dalam organisasi
                                <br>
                                Amalan organisasi yang boleh menyesuaikan diri dengan masalah di pasaran
                                <br>
                                Organisasi yang menekankan dan mendorong pembelajaran dan perkembangan berterusan
                                <br>
                                Pemimpin yang bertindak selaras dengan strategi organisasi</h6>
                            </td>
                            @else
                            @endif 
      
                            <td class="align-middle text-center">
                              <span class="text-secondary text-xs font-weight-bold" value="{{  '20%' }}">{{  '20%' }}</span>
                            </td>
                            <td class="align-middle text-center">
                              <span class="text-secondary text-xs font-weight-bold" value="{{ 'Percentage (%)' }}">{{ 'Percentage (%)' }}</span>
                            </td>
                            <td class="align-middle text-center">
                              <span class="text-secondary text-xs font-weight-bold" value="{{ $kecekapans -> skor_pekerja }}">{{ $kecekapans -> skor_pekerja }}</span>
                            </td>
                            <td class="align-middle text-center">
                              <span class="text-secondary text-xs font-weight-bold" value="{{ $kecekapans -> skor_penyelia }}">{{ $kecekapans -> skor_penyelia }}</span>
                            </td>
                            <td class="align-middle text-center">
                              <span class="text-secondary text-xs font-weight-bold" value="{{ $kecekapans -> skor_sebenar }}">{{ $kecekapans -> skor_sebenar }}</span>
                            </td>
                            {{-- @if (Auth::user()->role == "manager")
                            <td class="align-middle text-center">
                              <a href="{{ url('manager/edit/kecekapan/'.$user_id.'/'.$kecekapans->id.'/'.$date_id.'/'.$user_id.'/'.$year.'/'.$month) }}" class="btn btn-dark btn-sm" style="font-size: 10px" role="button"><i class="fa fa-edit"></i>&nbsp;Edit</a>
                            </td>
                            @else 
                            @endif --}}
                            {{-- <td class="align-middle text-center">
                              <a href="{{ url('manager/delete/kecekapan/'.$kecekapans->id) }}" class="btn btn-danger btn-sm"  style="font-size: 10px" role="button"><i class="fa fa-trash"></i></a>
                            </td> --}}
                            @if (Auth::user()->role == "manager")
                            <td class="align-middle">
                              <div class="col-lg-6 col-5 my-auto text-middle">
                                <div class="dropdown float-lg-start pe-4">
                                  <a class="cursor-pointer" id="dropdownTable" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fa fa-ellipsis-v text-secondary"></i>
                                  </a>
                                  <ul class="dropdown-menu px-2 py-3 ms-n4 ms-n5" aria-labelledby="dropdownTable">
                                    <li><a href="{{ url('manager/edit/kecekapan/'.$user_id.'/'.$kecekapans->id.'/'.$date_id.'/'.$user_id.'/'.$year.'/'.$month) }}" class="dropdown-item border-radius-md" role="button">Edit</a></li>
                                  </ul>
                                </div>
                              </div>
                            </td>
                            @else 
                            @endif
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div> 
            @if ($nilai_master > 120) 
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
              <strong>{{ session('fail2') }}Employee total weightage for Nilai Master exceed 120%. Please check back.</strong>
            </div>
            @else
            @endif
            @if ($nilai_master < 120) 
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
              <strong>{{ session('fail2') }}Employee total weightage for Nilai Master is lower than 120%. Please check back.</strong>
            </div>
            @else
            @endif
            <div class="col-12">
              <div class="card mb-4">
                <div class="card-header pb-0">
                  <h6>KAD SKOR - Nilai Teras <span style="color:red;">(Current total weightage = {{$nilai_master}})</span></h6>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                  <div class="p-0">
                    <table id="data" class="table align-items-center mb-0">
                      <thead>
                        <tr>
                          <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nilai Teras</th>
                          <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Jangkaan Hasil</th>
                          <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">%</th>
                          <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Ukuran</th>
                          <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Skor Pekerja</th>
                          <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Skor Penyelia</th>
                          <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Skor Sebenar</th>
                          @if (Auth::user()->role == "manager")
                          {{-- <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Edit</th> --}}
                          <th></th>
                          @else 
                          @endif
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($nilai as $key => $nilais)
                          <tr>
                            <td>   
                              <div class="d-flex px-3 py-1">
                                <div class="d-flex flex-column justify-content-center"> 
                                  <p class="text-xs font-weight-bold mb-0" value="{{ $nilais -> nilai_teras }}">{{ $nilais -> nilai_teras }}</p>
                                </div>
                              </div>  
                            </td>
        
                            @if ($nilais -> nilai_teras == "Kepimpinan")
                            <td class="text-xs font-weight-bold mb-0">
                              <span class="text-secondary text-xs font-weight-bold" value="">
                                Kami adalah pemimpin yang bertanggungjawab.
                                <br>
                                Kami memberikan contoh yang baik.
                                <br>
                                Kami melaksanakan setiap apa yang diperkatakan.
                                <br>
                                Kami menjadi inspirasi untuk berubah lebih baik.</span>
                            </td>
                            @else
                            @endif
        
                            @if ($nilais -> nilai_teras == "Perkembangan")
                            <td class="text-xs font-weight-bold mb-0">
                              <span class="text-secondary text-xs font-weight-bold" value="">
                                Kami ambil peduli dengan peningkatan hidup sendiri.
                                <br>
                                Kami sentiasa menambah dan meningkatkan ilmu pengetahuan.
                                <br>
                                Kami memupuk sikap ingin sentiasa berjaya.
                                <br>
                                Kami sentiasa memperbaiki dan memajukan diri di setiap saat.</span>
                            </td>
                            @else
                            @endif
        
                            @if ($nilais -> nilai_teras == "Keputusan")
                            <td class="text-xs font-weight-bold mb-0">
                              <span class="text-secondary text-xs font-weight-bold" value="">
                                Kami membantu menggilap potensi orang lain.
                                <br>
                                Kami memastikan pelanggan mencapai keputusan cemerlang.
                                <br>
                                Kami komited dengan hasil usaha yang dilakukan.
                                <br>
                                Kami berusaha untuk memberikan yang terbaik.</span>
                            </td>
                            @else
                            @endif
        
                            @if ($nilais -> nilai_teras == "Sumbangan")
                            <td class="text-xs font-weight-bold mb-0">
                              <span class="text-secondary text-xs font-weight-bold" value="">
                                Kami menghulurkan bantuan dengan sepenuh semangat dan jiwa kami.
                                <br>
                                Kami membantu mengatasi kelemahan dan membina kekuatan pelanggan.
                                <br>
                                Kami komited untuk memberi manfaat dan menyebarkan kebaikan.
                                <br>
                                Kami bertanggungjawab dengan orang sekeliling dan persekitaran.</span>
                            </td>
                            @else
                            @endif
        
                            @if ($nilais -> nilai_teras == "Rohani")
                            <td class="text-xs font-weight-bold mb-0">
                              <span class="text-secondary text-xs font-weight-bold" value="">
                                Kami adalah hamba Allah.
                                <br>
                                Kami membantu orang untuk mendapat kehidupan yang lebih baik.
                                <br>
                                Kami bangkit berjaya dengan memajukan orang lain.
                                <br>
                                Kami sentiasa beriman dan percaya dengan Qada’ dan Qadar.</span>
                            </td>
                            @else
                            @endif
        
                            @if ($nilais -> nilai_teras == "Keluarga")
                            <td class="text-xs font-weight-bold mb-0">
                              <span class="text-secondary text-xs font-weight-bold" value="">
                                Kami sangat menyayangi keluarga kami.
                                <br>
                                Kami berusaha untuk berikan yang terbaik kepada keluarga kami.
                                <br>
                                Kami tidak akan mengabaikan keluarga kami.
                                <br>
                                Kami percaya kebahagiaan keluarga adalah kebahagiaan kami.</span>
                            </td>
                            @else
                            @endif
                            <td class="align-middle text-center">
                              <span class="text-secondary text-xs font-weight-bold" value="{{  '20%' }}">{{  '20%' }}</span>
                            </td>
                            <td class="align-middle text-center">
                              <span class="text-secondary text-xs font-weight-bold" value="{{ 'Percentage (%)' }}">{{ 'Percentage (%)' }}</span>
                            </td>
                            <td class="align-middle text-center" style="max-width: 10px">
                              <span class="text-secondary text-xs font-weight-bold" value="{{ $nilais -> skor_pekerja }}">{{ $nilais -> skor_pekerja }}</span>
                            </td>
                            <td class="align-middle text-center" style="max-width: 10px">
                              <span class="text-secondary text-xs font-weight-bold" value="{{ $nilais -> skor_penyelia }}">{{ $nilais -> skor_penyelia }}</span>
                            </td>
                            <td class="align-middle text-center">
                              <span class="text-secondary text-xs font-weight-bold" value="{{ $nilais -> skor_sebenar }}">{{ $nilais -> skor_sebenar }}</span>
                            </td>
                            {{-- @if (Auth::user()->role == "manager")
                            <td class="align-middle text-center">
                              <a href="{{ url('manager/edit/nilai/'.$user_id.'/'.$nilais->id.'/'.$date_id.'/'.$user_id.'/'.$year.'/'.$month) }}" class="btn btn-dark btn-sm" style="font-size: 10px" role="button"><i class="fa fa-edit"></i>&nbsp;Edit</a>
                            </td>
                            @else 
                            @endif --}}

                            {{-- <td class="align-middle text-center">
                              <a href="{{ url('manager/delete/nilai/'.$nilais->id) }}" class="btn btn-danger btn-sm"  style="font-size: 10px" role="button"><i class="fa fa-trash"></i></a>
                            </td> --}}

                            @if (Auth::user()->role == "manager")
                            <td class="align-middle">
                              <div class="col-lg-6 col-5 my-auto text-middle">
                                <div class="dropdown float-lg-start pe-4">
                                  <a class="cursor-pointer" id="dropdownTable" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fa fa-ellipsis-v text-secondary"></i>
                                  </a>
                                  <ul class="dropdown-menu px-2 py-3 ms-n4 ms-n5" aria-labelledby="dropdownTable">
                                    <li><a href="{{ url('manager/edit/nilai/'.$user_id.'/'.$nilais->id.'/'.$date_id.'/'.$user_id.'/'.$year.'/'.$month) }}" class="dropdown-item border-radius-md" role="button">Edit</a></li>
                                  </ul>
                                </div>
                              </div>
                            </td>
                            @else 
                            @endif

                          </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>

              <div class="col-12">
                <div class="row">
                  <div class="col-6">
                    <div class="card">
                      <div class="card-body pt-4 p-3">
                        <ul class="list-group">
                          <li class="list-group-item border-0 d-flex p-4 mb-2 bg-gray-100 border-radius-lg">
                            <div class="d-flex flex-column">
                              @if (!$kpiall->isEmpty())
                                <h6 class="mb-3 text-sm">Jumlah Markah</h6>
                                <span class="mb-2 text-xs">KPI : 
                                @foreach ($kpiall as $key => $kpialls)
                                <span class="text-dark font-weight-bold ms-sm-2">{{ $kpialls -> total_score_master }}%</span></span>
                                @endforeach
                                <span class="mb-2 text-xs">Skor Akhir: 
                                @foreach ($kpiall as $key => $kpialls) 
                                <span class="text-dark ms-sm-2 font-weight-bold">{{ round($kpialls -> total_score_all,2) }}%</span></span>
                                @endforeach
                                <span class="mb-2 text-xs">Kecekapan Teras: 
                                @foreach ($kpiall as $key => $kpialls) 
                                <span class="text-dark ms-sm-2 font-weight-bold">{{ $kpialls -> total_score_kecekapan }}%</span></span>
                                @endforeach
                                <span class="mb-2 text-xs">Nilai Teras: 
                                @foreach ($kpiall as $key => $kpialls)  
                                <span class="text-dark ms-sm-2 font-weight-bold">{{ $kpialls -> total_score_nilai }}%</span></span>
                                @endforeach
                                <span class="text-xs">Grade: 
                                @foreach ($kpiall as $key => $kpialls)   
                                <span class="text-dark ms-sm-2 font-weight-bold">{{ $kpialls -> grade_all }}</span></span>
                                @endforeach
                              @else
                                <h6 class="mb-3 text-sm">Jumlah Markah</h6>
                                <span class="mb-2 text-xs">KPI : <br>
                                <span class="mb-2 text-xs">Skor Akhir: <br>
                                <span class="mb-2 text-xs">Kecekapan Teras: <br>
                                <span class="mb-2 text-xs">Nilai Teras: <br>
                                <span class="text-xs">Grade: <br>
                              @endif
                              
                            </div>
                            <div class="ms-auto text-end">
                              <div class="col-12 text-end ">
                                @if (Auth::user()->role == "manager")
                                @foreach ($date as $dates)
                                  @if ($dates->status == 'Submitted')
                                    <button class="btn bg-gradient-info mb-0" href="{{ url('manager/changeup/kpi/'. $date_id) }}" class="btn btn-dark btn-sm"role="button"><i class="fa fa-edit"></i>&nbsp;Sign & Appraise</button>
                                  @elseif ($dates->status == 'Signed By Manager')
                                    <button class="btn bg-gradient-danger mb-0" href="{{ url('manager/changedown/kpi/'. $date_id) }}" class="btn btn-dark btn-sm"  role="button"><i class="fa fa-edit"></i>&nbsp;Undo Sign & Undo Appraise</button>
                                  @else
                                  @endif
                                @endforeach
                                @else
                                @endif
                                @if (Auth::user()->role == "hr")
                                @foreach ($date as $dates)
                                  @if ($dates->status == 'Signed By Manager')
                                    <a class="btn bg-gradient-info mb-0" href="{{ url('hr/changeup/kpi/'. $date_id) }}" class="btn btn-dark btn-sm"role="button"><i class="fa fa-edit"></i>&nbsp;Sign & Complete</a>
                                  @elseif ($dates->status == 'Completed')
                                    <a class="btn bg-gradient-danger mb-0" href="{{ url('hr/changedown/kpi/'. $date_id) }}" class="btn btn-dark btn-sm"  role="button"><i class="fa fa-edit"></i>&nbsp;Undo Sign & Undo Complete</a>
                                  @else
                                  @endif
                                @endforeach
                                @else
                                @endif
                              </div>
                            </div>
                          </li>
                        </ul>
                      </div>
                    </div>
                  </div>

                  @if (Auth::user()->role == "manager")
                  <div class="col-3">
                    <div class="card p-0 shadow-lg">
                      <div class="card card-plain">
                          <div class="card-body pb-2">
                            <div class="form-group mb-0 mt-md-0 mt-4">
                              <form action="{{ url('manager/messageup/kpi/'. $date_id) }}" method="post">
                                @csrf
                                @foreach ($date as $dates)
                                @if ($dates->message_manager == '')
                                  <label>Write Your Message To This Employee (Optional)</label>
                                  <textarea class="form-control card card-body border card-plain border-radius-lg d-flex align-items-center flex-row" name="message_manager" id="message_manager" cols="60" rows="3" placeholder="Type your message here..."></textarea>
                                @else
                                  <label>This is your message to Employee</label>
                                  <pre class="align-center" style="color: red;" value="{{ $dates -> message_manager }}">{{ $dates -> message_manager }}</pre>
                                @endif 

                            <div class="ms-auto text-end">
                              <div class="col-12 text-center ">
                                  @if ($dates->message_manager == '')
                                    <button class="btn bg-gradient-primary mt-2 mb-0" type="submit" href="javascript:;"><i class="fas fa-plus"></i>&nbsp;&nbsp;Submit Message</button>
                                  @else
                                  <a style="color: red;" wire:click="selectItem({{$dates->id}}, 'delete' )" class="data-delete" data-form="{{$dates->id}}">
                                    <i class="fa fa-trash text-secondary text-sm" style="color: red;" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete"></i>
                                  </a>
                                  @endif
                                @endforeach
                              </div>
                            </div>
                              </form>  
                            </div>
                          </div>
                      </div>
                    </div>
                  </div>
                  @else
                  @endif 

                  @if (Auth::user()->role == "manager")
                  <div class="col-3">
                    <div class="card p-0 shadow-lg">
                      <div class="card card-plain">
                          <div class="card-body pb-2">
                            <div class="form-group mb-2 mt-md-0 mt-4">
                              @if ($dates->message_hr == '')
                              @else
                              <label>HR message to this employee</label>
                              {{-- <label>HR message to this employee from {{Auth::user()->name}}</label> --}}
                              {{-- <label>HR message to this employee from {{$dates->hr_id}}</label> --}}
                              <span class="align-center" style="color: blue;" value="{{ $dates -> message_hr }}">{{ $dates -> message_hr }}</span>  
                              @endif
                            </div>
                          </div>      
                      </div>
                    </div>
                  </div>  
                  @else
                  @endif    

                  {{--------------------------------------------------- MANAGER SECTION UPPPPP --------------------------------------------------}}

                  @if (Auth::user()->role == "hr")
                  <div class="col-3">
                    <div class="card p-0 shadow-lg">
                      <div class="card card-plain">
                          <div class="card-body pb-2">
                            <div class="form-group mb-0 mt-md-0 mt-4">
                              <form action="{{ url('hr/messageup/kpi/'. $date_id) }}" method="post">
                                @csrf
                                @foreach ($date as $dates)
                                @if ($dates->message_hr == '')
                                  <label>Write Your Message To This Employee (Optional)</label>
                                  <textarea class="form-control card card-body border card-plain border-radius-lg d-flex align-items-center flex-row" name="message_hr" id="message_hr" cols="60" rows="3" placeholder="Type your message here..."></textarea>
                                @else
                                  <label>This is your message to Employee</label>
                                  <pre class="align-center" style="color: blue;" value="{{ $dates -> message_hr }}">{{ $dates -> message_hr }}</pre>
                                @endif 

                            <div class="ms-auto text-end">
                              <div class="col-12 text-center ">
                                  @if ($dates->message_hr == '')
                                    <button class="btn bg-gradient-primary mt-2 mb-0" type="submit" href="javascript:;"><i class="fas fa-plus"></i>&nbsp;&nbsp;Submit Message</button>
                                  @else
                                  <a style="color: red;" wire:click="selectItem({{$dates->id}}, 'delete' )" class="data-delete" data-form="{{$dates->id}}">
                                    <i class="fa fa-trash text-secondary text-sm"  data-bs-toggle="tooltip" data-bs-placement="top" title="Delete"></i>
                                  </a>
                                  @endif
                                @endforeach
                              </div>
                            </div>
                              </form>  
                            </div>
                          </div>
                      </div>
                    </div>
                  </div>
                  @else
                  @endif 

                  @if (Auth::user()->role == "hr")
                  <div class="col-3">
                    <div class="card p-0 shadow-lg">
                      <div class="card card-plain">
                          <div class="card-body pb-2">
                            <div class="form-group mb-2 mt-md-0 mt-4">
                              @if ($dates->message_manager == '')
                              @else
                              <label>Manager message to this employee</label>
                              <span class="align-center" style="color: red;" value="{{ $dates -> message_manager }}">{{ $dates -> message_manager }}</span>  
                              @endif
                            </div>
                          </div>      
                      </div>
                    </div>
                  </div>  
                  @else
                  @endif    
                </div>   
              </div>
            </div>  
          </div>

          @push('scripts')
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
          @endpush
          </body>
            
            <!-- Master Pencapaian JS -->
            <script src="{{asset('assets/js/master.js')}}"></script>
            <script src="{{asset('assets/js/kecekapan.js')}}"></script>
            <script src="{{asset('assets/js/nilai.js')}}"></script>
            
          {{-- @endsection --}}
        </div>