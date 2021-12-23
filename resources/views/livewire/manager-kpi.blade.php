@section('content')
<div>
  @extends('layouts.app')
  <style>
  .table-responsive {
    // Other values...
    overflow-x: hidden;
    overflow-y: hidden;
    // Other values...
  }
  </style>
  
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
  
      <div class="container-fluid py-4">
        <div class="row">
          <div class="col-12">
            <div class="card mb-4">
              <div class="card-header pb-0">
                <h6>KAD SKOR 2021 - KPI</h6>
              </div>
              <div class="card-body px-0 pt-0 pb-2">
                <div class="table-responsive p-0">
                  <table class="table align-items-center mb-0">
                    <thead>
                      <tr>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Fungsi</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Objektif KPI</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Metrik/Bukti</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Link Bukti</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">%</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Ukuran</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Treshold</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Base</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Stretch</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Pencapaian</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Skor KPI</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Skor Sebenar</th>
                        {{-- <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Edit</th> --}}
                      </tr>
                    </thead>
                    <tbody>
                      @php($i = 1)
  
                      @foreach ($kadskor as $key => $kpis)
                        <tr>
                          @if ($key == 0)
                          {{-- <td class="border-dark">{{ $i++  }}</td> --}}
                          {{-- <td>    
                            <div class="d-flex px-2 py-1">
                              <div class="d-flex flex-column justify-content-center">
                                <p class="mb-0 text-sm" value="{{$key + 1}}">{{$key + 1}}</p>
                              </div>
                            </div>
                          </td> --}}
                          <td>    
                            <div class="d-flex px-2 py-1">
                              <div class="d-flex flex-column justify-content-center">
                                <h6 class="mb-0 text-sm">{{ $i++  }}</h6>
                              </div>
                            </div>
                          </td>
                          <td>
                            <p class="text-xs font-weight-bold mb-0" value="{{ $kpis -> fungsi }}">{{ $kpis -> fungsi }}</p>
                          </td>
                          <td class="text-xs font-weight-bold mb-0">
                            <span class="text-secondary text-xs font-weight-bold" value="{{ $kpis->kpimasters -> objektif }}">{{ $kpis->kpimasters -> objektif }}</span>
                          </td>
                          @else
                          <td>    
                            <div class="d-flex px-2 py-1">
                              <div class="d-flex flex-column justify-content-center">
                                <p class="mb-0 text-sm" value="{{$key + 1}}">{{NULL}}</p>
                              </div>
                            </div>
                          </td>
                          <td>
                            <p class="text-xs font-weight-bold mb-0" value="{{ $kpis -> fungsi }}">{{ NULL }}</p>
                          </td>
                          <td class="text-xs font-weight-bold mb-0">
                            <span class="text-secondary text-xs font-weight-bold" value="{{ $kpis->kpimasters -> objektif }}">{{  NULL }}</span>
                          </td>
                          @endif
                          {{-- <td class="align-middle text-center text-sm">
                            <span class="badge badge-sm bg-gradient-success" value="{{ $kpis -> objektif }}">{{ $kpis -> objektif }}</span>
                          </td> --}}
                          <td class="text-xs font-weight-bold mb-0">
                            <span class="text-secondary text-xs font-weight-bold" value="{{ $kpis -> bukti }}}">{{ $kpis -> bukti }}</span>
                          </td>
                          @if ($key == 0)
                          <td class="align-middle text-center">
                            <a href=" {{ $kpis->kpimasters -> link }}" style="color:blue;text-decoration:underline;font-size:13.5px"; target="_blank">Link Bukti</a>
                          </td>
                          <td class="align-middle text-center">
                            <span class="text-secondary text-xs font-weight-bold" value="{{ $kpis->kpimasters -> percent_master }}">{{ $kpis->kpimasters -> percent_master }}</span>
                          </td>
                          <td class="align-middle text-center">
                            <span class="text-secondary text-xs font-weight-bold" value="">Percentage (%)</span>
                          </td>
                          <td class="align-middle text-center">
                            <span class="text-secondary text-xs font-weight-bold" value="">30</span>
                          </td>
                          <td class="align-middle text-center">
                            <span class="text-secondary text-xs font-weight-bold" value="">65</span>
                          </td>
                          <td class="align-middle text-center">
                            <span class="text-secondary text-xs font-weight-bold" value="">100</span>
                          </td>
                          <td class="align-middle text-center">
                            <span class="text-secondary text-xs font-weight-bold" value="{{ $kpis->kpimasters -> pencapaian }}">{{ $kpis->kpimasters -> pencapaian }}</span>
                          </td>
                          <td class="align-middle text-center">
                            <span class="text-secondary text-xs font-weight-bold" value="{{ $kpis->kpimasters -> skor_KPI }}">{{ $kpis->kpimasters -> skor_KPI }}</span>
                          </td>
                          <td class="align-middle text-center">
                            <span class="text-secondary text-xs font-weight-bold" value="{{ round($kpis->kpimasters -> skor_sebenar,2) }}">{{ round($kpis->kpimasters -> skor_sebenar,2) }} %</span>
                          </td>
                          @else
                          <td class="align-middle text-center">
                            <a href="" style="color:blue;text-decoration:underline;font-size:13.5px"; ></a>
                          </td>
                          <td class="align-middle text-center">
                            <span class="text-secondary text-xs font-weight-bold" value="{{ $kpis->kpimasters -> percent_master }}">{{ NULL }}</span>
                          </td>
                          <td class="align-middle text-center">
                            <span class="text-secondary text-xs font-weight-bold" value=""></span>
                          </td>
                          <td class="align-middle text-center">
                            <span class="text-secondary text-xs font-weight-bold" value="">{{ NULL }}</span>
                          </td>
                          <td class="align-middle text-center">
                            <span class="text-secondary text-xs font-weight-bold" value="">{{ NULL }}</span>
                          </td>
                          <td class="align-middle text-center">
                            <span class="text-secondary text-xs font-weight-bold" value="">{{ NULL }}</span>
                          </td>
                          <td class="align-middle text-center">
                            <span class="text-secondary text-xs font-weight-bold" value="{{ $kpis->kpimasters -> pencapaian }}">{{ NULL }}</span>
                          </td>
                          <td class="align-middle text-center">
                            <span class="text-secondary text-xs font-weight-bold" value="{{ $kpis->kpimasters -> skor_KPI }}">{{ NULL }}</span>
                          </td>
                          <td class="align-middle text-center">
                            <span class="text-secondary text-xs font-weight-bold" value="{{ round($kpis->kpimasters -> skor_sebenar,2) }}">{{ NULL }}</span>
                          </td>
                          @endif
  
                          {{-- <td class="align-middle text-center">
                            <a href="{{ url('employee/edit/kpi/'.$kpis->id) }}" class="btn btn-primary btn-sm" style="font-size: 10px" role="button"><i class="fa fa-edit"></i>&nbsp;Edit Pencapaian</a>
                          </td>
                          <td class="align-middle text-center">
                            <a href="{{ url('employee/delete/kpi/'.$kpis->id) }}" class="btn btn-danger btn-sm"  style="font-size: 10px" role="button"><i class="fa fa-trash"></i></a>
                          </td> --}}

                        </tr>
                      @endforeach
                      @foreach ($kewangan as $key => $kpis)
                      <tr>
                        @if ($key == 0)
                        <td>    
                          <div class="d-flex px-2 py-1">
                            <div class="d-flex flex-column justify-content-center">
                              <h6 class="mb-0 text-sm">{{ $i++  }}</h6>
                            </div>
                          </div>
                        </td>
                        <td>
                          <p class="text-xs font-weight-bold mb-0" value="{{ $kpis -> fungsi }}">{{ $kpis -> fungsi }}</p>
                        </td>
                        <td class="text-xs font-weight-bold mb-0">
                          <span class="text-secondary text-xs font-weight-bold" value="{{ $kpis->kpimasters -> objektif }}">{{ $kpis->kpimasters -> objektif }}</span>
                        </td>
                        @else
                        <td>    
                          <div class="d-flex px-2 py-1">
                            <div class="d-flex flex-column justify-content-center">
                              <p class="mb-0 text-sm" value="{{$key + 1}}">{{NULL}}</p>
                            </div>
                          </div>
                        </td>
                        <td>
                          <p class="text-xs font-weight-bold mb-0" value="{{ $kpis -> fungsi }}">{{ NULL }}</p>
                        </td>
                        <td class="text-xs font-weight-bold mb-0">
                          <span class="text-secondary text-xs font-weight-bold" value="{{ $kpis->kpimasters -> objektif }}">{{  NULL }}</span>
                        </td>
                        @endif
                        <td class="text-xs font-weight-bold mb-0">
                          <span class="text-secondary text-xs font-weight-bold" value="{{ $kpis -> bukti }}}">{{ $kpis -> bukti }}</span>
                        </td>
                        @if ($key == 0)
                        <td class="align-middle text-center">
                          <a href=" {{ $kpis->kpimasters -> link }}" style="color:blue;text-decoration:underline;font-size:13.5px"; target="_blank">Link Bukti</a>
                        </td>
                        <td class="align-middle text-center">
                          <span class="text-secondary text-xs font-weight-bold" value="{{ $kpis->kpimasters -> percent_master }}">{{ $kpis->kpimasters -> percent_master }}</span>
                        </td>
                        <td class="align-middle text-center">
                          <span class="text-secondary text-xs font-weight-bold" value="">Percentage (%)</span>
                        </td>
                        <td class="align-middle text-center">
                          <span class="text-secondary text-xs font-weight-bold" value="">30</span>
                        </td>
                        <td class="align-middle text-center">
                          <span class="text-secondary text-xs font-weight-bold" value="">65</span>
                        </td>
                        <td class="align-middle text-center">
                          <span class="text-secondary text-xs font-weight-bold" value="">100</span>
                        </td>
                        <td class="align-middle text-center">
                          <span class="text-secondary text-xs font-weight-bold" value="{{ $kpis->kpimasters -> pencapaian }}">{{ $kpis->kpimasters -> pencapaian }}</span>
                        </td>
                        <td class="align-middle text-center">
                          <span class="text-secondary text-xs font-weight-bold" value="{{ $kpis->kpimasters -> skor_KPI }}">{{ $kpis->kpimasters -> skor_KPI }}</span>
                        </td>
                        <td class="align-middle text-center">
                          <span class="text-secondary text-xs font-weight-bold" value="{{ round($kpis->kpimasters -> skor_sebenar,2) }}">{{ round($kpis->kpimasters -> skor_sebenar,2) }} %</span>
                        </td>
                        @else
                        <td class="align-middle text-center">
                          <a href="" style="color:blue;text-decoration:underline;font-size:13.5px"; ></a>
                        </td>
                        <td class="align-middle text-center">
                          <span class="text-secondary text-xs font-weight-bold" value="{{ $kpis->kpimasters -> percent_master }}">{{ NULL }}</span>
                        </td>
                        <td class="align-middle text-center">
                          <span class="text-secondary text-xs font-weight-bold" value=""></span>
                        </td>
                        <td class="align-middle text-center">
                          <span class="text-secondary text-xs font-weight-bold" value="">{{ NULL }}</span>
                        </td>
                        <td class="align-middle text-center">
                          <span class="text-secondary text-xs font-weight-bold" value="">{{ NULL }}</span>
                        </td>
                        <td class="align-middle text-center">
                          <span class="text-secondary text-xs font-weight-bold" value="">{{ NULL }}</span>
                        </td>
                        <td class="align-middle text-center">
                          <span class="text-secondary text-xs font-weight-bold" value="{{ $kpis->kpimasters -> pencapaian }}">{{ NULL }}</span>
                        </td>
                        <td class="align-middle text-center">
                          <span class="text-secondary text-xs font-weight-bold" value="{{ $kpis->kpimasters -> skor_KPI }}">{{ NULL }}</span>
                        </td>
                        <td class="align-middle text-center">
                          <span class="text-secondary text-xs font-weight-bold" value="{{ round($kpis->kpimasters -> skor_sebenar,2) }}">{{ NULL }}</span>
                        </td>
                        @endif
  
                      </tr>
                    @endforeach
                    @foreach ($pelangganI as $key => $kpis)
                    <tr>
                      @if ($key == 0)
                      <td>    
                        <div class="d-flex px-2 py-1">
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm">{{ $i++  }}</h6>
                          </div>
                        </div>
                      </td>
                      <td>
                        <p class="text-xs font-weight-bold mb-0" value="{{ $kpis -> fungsi }}">{{ $kpis -> fungsi }}</p>
                      </td>
                      <td class="text-xs font-weight-bold mb-0">
                        <span class="text-secondary text-xs font-weight-bold" value="{{ $kpis->kpimasters -> objektif }}">{{ $kpis->kpimasters -> objektif }}</span>
                      </td>
                      @else
                      <td>    
                        <div class="d-flex px-2 py-1">
                          <div class="d-flex flex-column justify-content-center">
                            <p class="mb-0 text-sm" value="{{$key + 1}}">{{NULL}}</p>
                          </div>
                        </div>
                      </td>
                      <td>
                        <p class="text-xs font-weight-bold mb-0" value="{{ $kpis -> fungsi }}">{{ NULL }}</p>
                      </td>
                      <td class="text-xs font-weight-bold mb-0">
                        <span class="text-secondary text-xs font-weight-bold" value="{{ $kpis->kpimasters -> objektif }}">{{  NULL }}</span>
                      </td>
                      @endif
                      <td class="text-xs font-weight-bold mb-0">
                        <span class="text-secondary text-xs font-weight-bold" value="{{ $kpis -> bukti }}}">{{ $kpis -> bukti }}</span>
                      </td>
                      @if ($key == 0)
                      <td class="align-middle text-center">
                        <a href=" {{ $kpis->kpimasters -> link }}" style="color:blue;text-decoration:underline;font-size:13.5px"; target="_blank">Link Bukti</a>
                      </td>
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold" value="{{ $kpis->kpimasters -> percent_master }}">{{ $kpis->kpimasters -> percent_master }}</span>
                      </td>
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold" value="">Percentage (%)</span>
                      </td>
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold" value="">30</span>
                      </td>
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold" value="">65</span>
                      </td>
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold" value="">100</span>
                      </td>
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold" value="{{ $kpis->kpimasters -> pencapaian }}">{{ $kpis->kpimasters -> pencapaian }}</span>
                      </td>
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold" value="{{ $kpis->kpimasters -> skor_KPI }}">{{ $kpis->kpimasters -> skor_KPI }}</span>
                      </td>
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold" value="{{ round($kpis->kpimasters -> skor_sebenar,2) }}">{{ round($kpis->kpimasters -> skor_sebenar,2) }} %</span>
                      </td>
                      @else
                      <td class="align-middle text-center">
                        <a href="" style="color:blue;text-decoration:underline;font-size:13.5px"; ></a>
                      </td>
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold" value="{{ $kpis->kpimasters -> percent_master }}">{{ NULL }}</span>
                      </td>
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold" value=""></span>
                      </td>
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold" value="">{{ NULL }}</span>
                      </td>
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold" value="">{{ NULL }}</span>
                      </td>
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold" value="">{{ NULL }}</span>
                      </td>
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold" value="{{ $kpis->kpimasters -> pencapaian }}">{{ NULL }}</span>
                      </td>
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold" value="{{ $kpis->kpimasters -> skor_KPI }}">{{ NULL }}</span>
                      </td>
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold" value="{{ round($kpis->kpimasters -> skor_sebenar,2) }}">{{ NULL }}</span>
                      </td>
                      @endif
  
                    </tr>
                  @endforeach
                  @foreach ($pelangganII as $key => $kpis)
                  <tr>
                    @if ($key == 0)
                    <td>    
                      <div class="d-flex px-2 py-1">
                        <div class="d-flex flex-column justify-content-center">
                          <h6 class="mb-0 text-sm">{{ $i++  }}</h6>
                        </div>
                      </div>
                    </td>
                    <td>
                      <p class="text-xs font-weight-bold mb-0" value="{{ $kpis -> fungsi }}">{{ $kpis -> fungsi }}</p>
                    </td>
                    <td class="text-xs font-weight-bold mb-0">
                      <span class="text-secondary text-xs font-weight-bold" value="{{ $kpis->kpimasters -> objektif }}">{{ $kpis->kpimasters -> objektif }}</span>
                    </td>
                    @else
                    <td>    
                      <div class="d-flex px-2 py-1">
                        <div class="d-flex flex-column justify-content-center">
                          <p class="mb-0 text-sm" value="{{$key + 1}}">{{NULL}}</p>
                        </div>
                      </div>
                    </td>
                    <td>
                      <p class="text-xs font-weight-bold mb-0" value="{{ $kpis -> fungsi }}">{{ NULL }}</p>
                    </td>
                    <td class="text-xs font-weight-bold mb-0">
                      <span class="text-secondary text-xs font-weight-bold" value="{{ $kpis->kpimasters -> objektif }}">{{  NULL }}</span>
                    </td>
                    @endif
                    <td class="text-xs font-weight-bold mb-0">
                      <span class="text-secondary text-xs font-weight-bold" value="{{ $kpis -> bukti }}}">{{ $kpis -> bukti }}</span>
                    </td>
                    @if ($key == 0)
                    <td class="align-middle text-center">
                      <a href=" {{ $kpis->kpimasters -> link }}" style="color:blue;text-decoration:underline;font-size:13.5px"; target="_blank">Link Bukti</a>
                    </td>
                    <td class="align-middle text-center">
                      <span class="text-secondary text-xs font-weight-bold" value="{{ $kpis->kpimasters -> percent_master }}">{{ $kpis->kpimasters -> percent_master }}</span>
                    </td>
                    <td class="align-middle text-center">
                      <span class="text-secondary text-xs font-weight-bold" value="">Percentage (%)</span>
                    </td>
                    <td class="align-middle text-center">
                      <span class="text-secondary text-xs font-weight-bold" value="">30</span>
                    </td>
                    <td class="align-middle text-center">
                      <span class="text-secondary text-xs font-weight-bold" value="">65</span>
                    </td>
                    <td class="align-middle text-center">
                      <span class="text-secondary text-xs font-weight-bold" value="">100</span>
                    </td>
                    <td class="align-middle text-center">
                      <span class="text-secondary text-xs font-weight-bold" value="{{ $kpis->kpimasters -> pencapaian }}">{{ $kpis->kpimasters -> pencapaian }}</span>
                    </td>
                    <td class="align-middle text-center">
                      <span class="text-secondary text-xs font-weight-bold" value="{{ $kpis->kpimasters -> skor_KPI }}">{{ $kpis->kpimasters -> skor_KPI }}</span>
                    </td>
                    <td class="align-middle text-center">
                      <span class="text-secondary text-xs font-weight-bold" value="{{ round($kpis->kpimasters -> skor_sebenar,2) }}">{{ round($kpis->kpimasters -> skor_sebenar,2) }} %</span>
                    </td>
                    @else
                    <td class="align-middle text-center">
                      <a href="" style="color:blue;text-decoration:underline;font-size:13.5px"; ></a>
                    </td>
                    <td class="align-middle text-center">
                      <span class="text-secondary text-xs font-weight-bold" value="{{ $kpis->kpimasters -> percent_master }}">{{ NULL }}</span>
                    </td>
                    <td class="align-middle text-center">
                      <span class="text-secondary text-xs font-weight-bold" value=""></span>
                    </td>
                    <td class="align-middle text-center">
                      <span class="text-secondary text-xs font-weight-bold" value="">{{ NULL }}</span>
                    </td>
                    <td class="align-middle text-center">
                      <span class="text-secondary text-xs font-weight-bold" value="">{{ NULL }}</span>
                    </td>
                    <td class="align-middle text-center">
                      <span class="text-secondary text-xs font-weight-bold" value="">{{ NULL }}</span>
                    </td>
                    <td class="align-middle text-center">
                      <span class="text-secondary text-xs font-weight-bold" value="{{ $kpis->kpimasters -> pencapaian }}">{{ NULL }}</span>
                    </td>
                    <td class="align-middle text-center">
                      <span class="text-secondary text-xs font-weight-bold" value="{{ $kpis->kpimasters -> skor_KPI }}">{{ NULL }}</span>
                    </td>
                    <td class="align-middle text-center">
                      <span class="text-secondary text-xs font-weight-bold" value="{{ round($kpis->kpimasters -> skor_sebenar,2) }}">{{ NULL }}</span>
                    </td>
                    @endif
  
                  </tr>
                @endforeach
                @foreach ($kecemerlangan as $key => $kpis)
                <tr>
                  @if ($key == 0)
                  <td>    
                    <div class="d-flex px-2 py-1">
                      <div class="d-flex flex-column justify-content-center">
                        <h6 class="mb-0 text-sm">{{ $i++  }}</h6>
                      </div>
                    </div>
                  </td>
                  <td>
                    <p class="text-xs font-weight-bold mb-0" value="{{ $kpis -> fungsi }}">{{ $kpis -> fungsi }}</p>
                  </td>
                  <td class="text-xs font-weight-bold mb-0">
                    <span class="text-secondary text-xs font-weight-bold" value="{{ $kpis->kpimasters -> objektif }}">{{ $kpis->kpimasters -> objektif }}</span>
                  </td>
                  @else
                  <td>    
                    <div class="d-flex px-2 py-1">
                      <div class="d-flex flex-column justify-content-center">
                        <p class="mb-0 text-sm" value="{{$key + 1}}">{{NULL}}</p>
                      </div>
                    </div>
                  </td>
                  <td>
                    <p class="text-xs font-weight-bold mb-0" value="{{ $kpis -> fungsi }}">{{ NULL }}</p>
                  </td>
                  <td class="text-xs font-weight-bold mb-0">
                    <span class="text-secondary text-xs font-weight-bold" value="{{ $kpis->kpimasters -> objektif }}">{{  NULL }}</span>
                  </td>
                  @endif
                  <td class="text-xs font-weight-bold mb-0">
                    <span class="text-secondary text-xs font-weight-bold" value="{{ $kpis -> bukti }}}">{{ $kpis -> bukti }}</span>
                  </td>
                  @if ($key == 0)
                  <td class="align-middle text-center">
                    <a href=" {{ $kpis->kpimasters -> link }}" style="color:blue;text-decoration:underline;font-size:13.5px"; target="_blank">Link Bukti</a>
                  </td>
                  <td class="align-middle text-center">
                    <span class="text-secondary text-xs font-weight-bold" value="{{ $kpis->kpimasters -> percent_master }}">{{ $kpis->kpimasters -> percent_master }}</span>
                  </td>
                  <td class="align-middle text-center">
                    <span class="text-secondary text-xs font-weight-bold" value="">Percentage (%)</span>
                  </td>
                  <td class="align-middle text-center">
                    <span class="text-secondary text-xs font-weight-bold" value="">30</span>
                  </td>
                  <td class="align-middle text-center">
                    <span class="text-secondary text-xs font-weight-bold" value="">65</span>
                  </td>
                  <td class="align-middle text-center">
                    <span class="text-secondary text-xs font-weight-bold" value="">100</span>
                  </td>
                  <td class="align-middle text-center">
                    <span class="text-secondary text-xs font-weight-bold" value="{{ $kpis->kpimasters -> pencapaian }}">{{ $kpis->kpimasters -> pencapaian }}</span>
                  </td>
                  <td class="align-middle text-center">
                    <span class="text-secondary text-xs font-weight-bold" value="{{ $kpis->kpimasters -> skor_KPI }}">{{ $kpis->kpimasters -> skor_KPI }}</span>
                  </td>
                  <td class="align-middle text-center">
                    <span class="text-secondary text-xs font-weight-bold" value="{{ round($kpis->kpimasters -> skor_sebenar,2) }}">{{ round($kpis->kpimasters -> skor_sebenar,2) }} %</span>
                  </td>
                  @else
                  <td class="align-middle text-center">
                    <a href="" style="color:blue;text-decoration:underline;font-size:13.5px"; ></a>
                  </td>
                  <td class="align-middle text-center">
                    <span class="text-secondary text-xs font-weight-bold" value="{{ $kpis->kpimasters -> percent_master }}">{{ NULL }}</span>
                  </td>
                  <td class="align-middle text-center">
                    <span class="text-secondary text-xs font-weight-bold" value=""></span>
                  </td>
                  <td class="align-middle text-center">
                    <span class="text-secondary text-xs font-weight-bold" value="">{{ NULL }}</span>
                  </td>
                  <td class="align-middle text-center">
                    <span class="text-secondary text-xs font-weight-bold" value="">{{ NULL }}</span>
                  </td>
                  <td class="align-middle text-center">
                    <span class="text-secondary text-xs font-weight-bold" value="">{{ NULL }}</span>
                  </td>
                  <td class="align-middle text-center">
                    <span class="text-secondary text-xs font-weight-bold" value="{{ $kpis->kpimasters -> pencapaian }}">{{ NULL }}</span>
                  </td>
                  <td class="align-middle text-center">
                    <span class="text-secondary text-xs font-weight-bold" value="{{ $kpis->kpimasters -> skor_KPI }}">{{ NULL }}</span>
                  </td>
                  <td class="align-middle text-center">
                    <span class="text-secondary text-xs font-weight-bold" value="{{ round($kpis->kpimasters -> skor_sebenar,2) }}">{{ NULL }}</span>
                  </td>
                  @endif
  
                </tr>
              @endforeach
              @foreach ($training as $key => $kpis)
              <tr>
                @if ($key == 0)
                <td>    
                  <div class="d-flex px-2 py-1">
                    <div class="d-flex flex-column justify-content-center">
                      <h6 class="mb-0 text-sm">{{ $i++  }}</h6>
                    </div>
                  </div>
                </td>
                <td>
                  <p class="text-xs font-weight-bold mb-0" value="{{ $kpis -> fungsi }}">{{ $kpis -> fungsi }}</p>
                </td>
                <td class="text-xs font-weight-bold mb-0">
                  <span class="text-secondary text-xs font-weight-bold" value="{{ $kpis->kpimasters -> objektif }}">{{ $kpis->kpimasters -> objektif }}</span>
                </td>
                @else
                <td>    
                  <div class="d-flex px-2 py-1">
                    <div class="d-flex flex-column justify-content-center">
                      <p class="mb-0 text-sm" value="{{$key + 1}}">{{NULL}}</p>
                    </div>
                  </div>
                </td>
                <td>
                  <p class="text-xs font-weight-bold mb-0" value="{{ $kpis -> fungsi }}">{{ NULL }}</p>
                </td>
                <td class="text-xs font-weight-bold mb-0">
                  <span class="text-secondary text-xs font-weight-bold" value="{{ $kpis->kpimasters -> objektif }}">{{  NULL }}</span>
                </td>
                @endif
                <td class="text-xs font-weight-bold mb-0">
                  <span class="text-secondary text-xs font-weight-bold" value="{{ $kpis -> bukti }}}">{{ $kpis -> bukti }}</span>
                </td>
                @if ($key == 0)
                <td class="align-middle text-center">
                  <a href=" {{ $kpis->kpimasters -> link }}" style="color:blue;text-decoration:underline;font-size:13.5px"; target="_blank">Link Bukti</a>
                </td>
                <td class="align-middle text-center">
                  <span class="text-secondary text-xs font-weight-bold" value="{{ $kpis->kpimasters -> percent_master }}">{{ $kpis->kpimasters -> percent_master }}</span>
                </td>
                <td class="align-middle text-center">
                  <span class="text-secondary text-xs font-weight-bold" value="">Percentage (%)</span>
                </td>
                <td class="align-middle text-center">
                  <span class="text-secondary text-xs font-weight-bold" value="">30</span>
                </td>
                <td class="align-middle text-center">
                  <span class="text-secondary text-xs font-weight-bold" value="">65</span>
                </td>
                <td class="align-middle text-center">
                  <span class="text-secondary text-xs font-weight-bold" value="">100</span>
                </td>
                <td class="align-middle text-center">
                  <span class="text-secondary text-xs font-weight-bold" value="{{ $kpis->kpimasters -> pencapaian }}">{{ $kpis->kpimasters -> pencapaian }}</span>
                </td>
                <td class="align-middle text-center">
                  <span class="text-secondary text-xs font-weight-bold" value="{{ $kpis->kpimasters -> skor_KPI }}">{{ $kpis->kpimasters -> skor_KPI }}</span>
                </td>
                <td class="align-middle text-center">
                  <span class="text-secondary text-xs font-weight-bold" value="{{ round($kpis->kpimasters -> skor_sebenar,2) }}">{{ round($kpis->kpimasters -> skor_sebenar,2) }} %</span>
                </td>
                @else
                <td class="align-middle text-center">
                  <a href="" style="color:blue;text-decoration:underline;font-size:13.5px"; ></a>
                </td>
                <td class="align-middle text-center">
                  <span class="text-secondary text-xs font-weight-bold" value="{{ $kpis->kpimasters -> percent_master }}">{{ NULL }}</span>
                </td>
                <td class="align-middle text-center">
                  <span class="text-secondary text-xs font-weight-bold" value=""></span>
                </td>
                <td class="align-middle text-center">
                  <span class="text-secondary text-xs font-weight-bold" value="">{{ NULL }}</span>
                </td>
                <td class="align-middle text-center">
                  <span class="text-secondary text-xs font-weight-bold" value="">{{ NULL }}</span>
                </td>
                <td class="align-middle text-center">
                  <span class="text-secondary text-xs font-weight-bold" value="">{{ NULL }}</span>
                </td>
                <td class="align-middle text-center">
                  <span class="text-secondary text-xs font-weight-bold" value="{{ $kpis->kpimasters -> pencapaian }}">{{ NULL }}</span>
                </td>
                <td class="align-middle text-center">
                  <span class="text-secondary text-xs font-weight-bold" value="{{ $kpis->kpimasters -> skor_KPI }}">{{ NULL }}</span>
                </td>
                <td class="align-middle text-center">
                  <span class="text-secondary text-xs font-weight-bold" value="{{ round($kpis->kpimasters -> skor_sebenar,2) }}">{{ NULL }}</span>
                </td>
                @endif
  
              </tr>
            @endforeach
            @foreach ($ncr as $key => $kpis)
            <tr>
              @if ($key == 0)
              <td>    
                <div class="d-flex px-2 py-1">
                  <div class="d-flex flex-column justify-content-center">
                    <h6 class="mb-0 text-sm">{{ $i++  }}</h6>
                  </div>
                </div>
              </td>
              <td>
                <p class="text-xs font-weight-bold mb-0" value="{{ $kpis -> fungsi }}">{{ $kpis -> fungsi }}</p>
              </td>
              <td class="text-xs font-weight-bold mb-0">
                <span class="text-secondary text-xs font-weight-bold" value="{{ $kpis->kpimasters -> objektif }}">{{ $kpis->kpimasters -> objektif }}</span>
              </td>
              @else
              <td>    
                <div class="d-flex px-2 py-1">
                  <div class="d-flex flex-column justify-content-center">
                    <p class="mb-0 text-sm" value="{{$key + 1}}">{{NULL}}</p>
                  </div>
                </div>
              </td>
              <td>
                <p class="text-xs font-weight-bold mb-0" value="{{ $kpis -> fungsi }}">{{ NULL }}</p>
              </td>
              <td class="text-xs font-weight-bold mb-0">
                <span class="text-secondary text-xs font-weight-bold" value="{{ $kpis->kpimasters -> objektif }}">{{  NULL }}</span>
              </td>
              @endif
              <td class="text-xs font-weight-bold mb-0">
                <span class="text-secondary text-xs font-weight-bold" value="{{ $kpis -> bukti }}}">{{ $kpis -> bukti }}</span>
              </td>
              @if ($key == 0)
              <td class="align-middle text-center">
                <a href=" {{ $kpis->kpimasters -> link }}" style="color:blue;text-decoration:underline;font-size:13.5px"; target="_blank">Link Bukti</a>
              </td>
              <td class="align-middle text-center">
                <span class="text-secondary text-xs font-weight-bold" value="{{ $kpis->kpimasters -> percent_master }}">{{ $kpis->kpimasters -> percent_master }}</span>
              </td>
              <td class="align-middle text-center">
                <span class="text-secondary text-xs font-weight-bold" value="">Percentage (%)</span>
              </td>
              <td class="align-middle text-center">
                <span class="text-secondary text-xs font-weight-bold" value="">30</span>
              </td>
              <td class="align-middle text-center">
                <span class="text-secondary text-xs font-weight-bold" value="">65</span>
              </td>
              <td class="align-middle text-center">
                <span class="text-secondary text-xs font-weight-bold" value="">100</span>
              </td>
              <td class="align-middle text-center">
                <span class="text-secondary text-xs font-weight-bold" value="{{ $kpis->kpimasters -> pencapaian }}">{{ $kpis->kpimasters -> pencapaian }}</span>
              </td>
              <td class="align-middle text-center">
                <span class="text-secondary text-xs font-weight-bold" value="{{ $kpis->kpimasters -> skor_KPI }}">{{ $kpis->kpimasters -> skor_KPI }}</span>
              </td>
              <td class="align-middle text-center">
                <span class="text-secondary text-xs font-weight-bold" value="{{ round($kpis->kpimasters -> skor_sebenar,2) }}">{{ round($kpis->kpimasters -> skor_sebenar,2) }} %</span>
              </td>
              @else
              <td class="align-middle text-center">
                <a href="" style="color:blue;text-decoration:underline;font-size:13.5px"; ></a>
              </td>
              <td class="align-middle text-center">
                <span class="text-secondary text-xs font-weight-bold" value="{{ $kpis->kpimasters -> percent_master }}">{{ NULL }}</span>
              </td>
              <td class="align-middle text-center">
                <span class="text-secondary text-xs font-weight-bold" value=""></span>
              </td>
              <td class="align-middle text-center">
                <span class="text-secondary text-xs font-weight-bold" value="">{{ NULL }}</span>
              </td>
              <td class="align-middle text-center">
                <span class="text-secondary text-xs font-weight-bold" value="">{{ NULL }}</span>
              </td>
              <td class="align-middle text-center">
                <span class="text-secondary text-xs font-weight-bold" value="">{{ NULL }}</span>
              </td>
              <td class="align-middle text-center">
                <span class="text-secondary text-xs font-weight-bold" value="{{ $kpis->kpimasters -> pencapaian }}">{{ NULL }}</span>
              </td>
              <td class="align-middle text-center">
                <span class="text-secondary text-xs font-weight-bold" value="{{ $kpis->kpimasters -> skor_KPI }}">{{ NULL }}</span>
              </td>
              <td class="align-middle text-center">
                <span class="text-secondary text-xs font-weight-bold" value="{{ round($kpis->kpimasters -> skor_sebenar,2) }}">{{ NULL }}</span>
              </td>
              @endif
  
            </tr>
          @endforeach
          @foreach ($kolaborasi as $key => $kpis)
          <tr>
            @if ($key == 0)
            <td>    
              <div class="d-flex px-2 py-1">
                <div class="d-flex flex-column justify-content-center">
                  <h6 class="mb-0 text-sm">{{ $i++  }}</h6>
                </div>
              </div>
            </td>
            <td>
              <p class="text-xs font-weight-bold mb-0" value="{{ $kpis -> fungsi }}">{{ $kpis -> fungsi }}</p>
            </td>
            <td class="text-xs font-weight-bold mb-0">
              <span class="text-secondary text-xs font-weight-bold" value="{{ $kpis->kpimasters -> objektif }}">{{ $kpis->kpimasters -> objektif }}</span>
            </td>
            @else
            <td>    
              <div class="d-flex px-2 py-1">
                <div class="d-flex flex-column justify-content-center">
                  <p class="mb-0 text-sm" value="{{$key + 1}}">{{NULL}}</p>
                </div>
              </div>
            </td>
            <td>
              <p class="text-xs font-weight-bold mb-0" value="{{ $kpis -> fungsi }}">{{ NULL }}</p>
            </td>
            <td class="text-xs font-weight-bold mb-0">
              <span class="text-secondary text-xs font-weight-bold" value="{{ $kpis->kpimasters -> objektif }}">{{  NULL }}</span>
            </td>
            @endif
            <td class="text-xs font-weight-bold mb-0">
              <span class="text-secondary text-xs font-weight-bold" value="{{ $kpis -> bukti }}}">{{ $kpis -> bukti }}</span>
            </td>
            @if ($key == 0)
            <td class="align-middle text-center">
              <a href=" {{ $kpis->kpimasters -> link }}" style="color:blue;text-decoration:underline;font-size:13.5px"; target="_blank">Link Bukti</a>
            </td>
            <td class="align-middle text-center">
              <span class="text-secondary text-xs font-weight-bold" value="{{ $kpis->kpimasters -> percent_master }}">{{ $kpis->kpimasters -> percent_master }}</span>
            </td>
            <td class="align-middle text-center">
              <span class="text-secondary text-xs font-weight-bold" value="">Percentage (%)</span>
            </td>
            <td class="align-middle text-center">
              <span class="text-secondary text-xs font-weight-bold" value="">30</span>
            </td>
            <td class="align-middle text-center">
              <span class="text-secondary text-xs font-weight-bold" value="">65</span>
            </td>
            <td class="align-middle text-center">
              <span class="text-secondary text-xs font-weight-bold" value="">100</span>
            </td>
            <td class="align-middle text-center">
              <span class="text-secondary text-xs font-weight-bold" value="{{ $kpis->kpimasters -> pencapaian }}">{{ $kpis->kpimasters -> pencapaian }}</span>
            </td>
            <td class="align-middle text-center">
              <span class="text-secondary text-xs font-weight-bold" value="{{ $kpis->kpimasters -> skor_KPI }}">{{ $kpis->kpimasters -> skor_KPI }}</span>
            </td>
            <td class="align-middle text-center">
              <span class="text-secondary text-xs font-weight-bold" value="{{ round($kpis->kpimasters -> skor_sebenar,2) }}">{{ round($kpis->kpimasters -> skor_sebenar,2) }} %</span>
            </td>
            @else
            <td class="align-middle text-center">
              <a href="" style="color:blue;text-decoration:underline;font-size:13.5px"; ></a>
            </td>
            <td class="align-middle text-center">
              <span class="text-secondary text-xs font-weight-bold" value="{{ $kpis->kpimasters -> percent_master }}">{{ NULL }}</span>
            </td>
            <td class="align-middle text-center">
              <span class="text-secondary text-xs font-weight-bold" value=""></span>
            </td>
            <td class="align-middle text-center">
              <span class="text-secondary text-xs font-weight-bold" value="">{{ NULL }}</span>
            </td>
            <td class="align-middle text-center">
              <span class="text-secondary text-xs font-weight-bold" value="">{{ NULL }}</span>
            </td>
            <td class="align-middle text-center">
              <span class="text-secondary text-xs font-weight-bold" value="">{{ NULL }}</span>
            </td>
            <td class="align-middle text-center">
              <span class="text-secondary text-xs font-weight-bold" value="{{ $kpis->kpimasters -> pencapaian }}">{{ NULL }}</span>
            </td>
            <td class="align-middle text-center">
              <span class="text-secondary text-xs font-weight-bold" value="{{ $kpis->kpimasters -> skor_KPI }}">{{ NULL }}</span>
            </td>
            <td class="align-middle text-center">
              <span class="text-secondary text-xs font-weight-bold" value="{{ round($kpis->kpimasters -> skor_sebenar,2) }}">{{ NULL }}</span>
            </td>
            @endif
          </tr>
        @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
                </div>
              </div>
            <div class="col-12">
              <div class="card mb-4">
                <div class="card-header pb-0">
                  <h6>KAD SKOR 2021 - Kecekapan Teras</h6>
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
                              <div class="d-flex px-2 py-1">
                                <div class="d-flex flex-column justify-content-center">
                                  <h6 class="mb-0 text-sm" value="{{ $key + 1  }}">{{ $key + 1  }}</h6>
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
                              <a href="{{ url('manager/edit/kecekapan/'.$id.'/'.$kecekapans->id.'/'.$date_id.'/'.$user_id.'/'.$year.'/'.$month) }}" class="btn btn-dark btn-sm" style="font-size: 10px" role="button"><i class="fa fa-edit"></i>&nbsp;Edit</a>
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
                                    <li><a href="{{ url('manager/edit/kecekapan/'.$id.'/'.$kecekapans->id.'/'.$date_id.'/'.$user_id.'/'.$year.'/'.$month) }}" class="dropdown-item border-radius-md" role="button">Edit</a></li>
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
            <div class="col-12">
              <div class="card mb-4">
                <div class="card-header pb-0">
                  <h6>KAD SKOR 2021 - Nilai Teras</h6>
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
                              <div class="d-flex px-2 py-1">
                                <div class="d-flex flex-column justify-content-center">
                                  <h6 class="mb-0 text-sm" value="{{ $key + 1  }}">{{ $key + 1  }}</h6>
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
                              <span class="text-secondary text-xs font-weight-bold" value="{{  '20%' }}">{{  '20%' }}</span>
                            </td>
                            <td class="align-middle text-center">
                              <span class="text-secondary text-xs font-weight-bold" value="{{ 'Percentage (%)' }}">{{ 'Percentage (%)' }}</span>
                            </td>
                            <td class="align-middle text-center">
                              <span class="text-secondary text-xs font-weight-bold" value="{{ $nilais -> skor_pekerja }}">{{ $nilais -> skor_pekerja }}</span>
                            </td>
                            <td class="align-middle text-center">
                              <span class="text-secondary text-xs font-weight-bold" value="{{ $nilais -> skor_penyelia }}">{{ $nilais -> skor_penyelia }}</span>
                            </td>
                            <td class="align-middle text-center">
                              <span class="text-secondary text-xs font-weight-bold" value="{{ $nilais -> skor_sebenar }}">{{ $nilais -> skor_sebenar }}</span>
                            </td>
                            {{-- @if (Auth::user()->role == "manager")
                            <td class="align-middle text-center">
                              <a href="{{ url('manager/edit/nilai/'.$id.'/'.$nilais->id.'/'.$date_id.'/'.$user_id.'/'.$year.'/'.$month) }}" class="btn btn-dark btn-sm" style="font-size: 10px" role="button"><i class="fa fa-edit"></i>&nbsp;Edit</a>
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
                                    <li><a href="{{ url('manager/edit/nilai/'.$id.'/'.$nilais->id.'/'.$date_id.'/'.$user_id.'/'.$year.'/'.$month) }}" class="dropdown-item border-radius-md" role="button">Edit</a></li>
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
                <div class="card mb-4">
                  <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                      <table style="width:100%" class="table align-items-center mb-0">
                        <tr>
                          <td>KPI</td>
                          @foreach ($kpiall as $key => $kpialls)
                          <td>{{ $kpialls -> total_score_master }}%</td>
                          @endforeach
                          <td rowspan="2">SKOR AKHIR :</td>
                          @foreach ($kpiall as $key => $kpialls)
                          <td rowspan="2">{{ round($kpialls -> total_score_all,2) }}%</td>
                          @endforeach
                        </tr>
                        <tr>
                          <td>KECEKAPAN TERAS :</td>
                          @foreach ($kpiall as $key => $kpialls)
                          <td>{{ $kpialls -> total_score_kecekapan }}%</td>
                          @endforeach
                        </tr>
                        <tr>
                          <td>NILAI TERAS :</td>
                          @foreach ($kpiall as $key => $kpialls)
                          <td>{{ $kpialls -> total_score_nilai }}%</td>
                          @endforeach
                          <td rowspan="1">GRADE :</td>
                          @foreach ($kpiall as $key => $kpialls)
                          <td rowspan="1">{{ $kpialls -> grade_all }}</td>
                          @endforeach
                        </tr>
                    </table>
                  </div>
                </div>
              </div>
            </div>

            @if (Auth::user()->role == "manager")
              @foreach ($date as $dates)
                {{-- @if ($dates->status == 'Submitted' || $dates->status == 'Signed By Manager') --}}
                  {{-- <a href="{{ url('manager/changeup/kpi/'. $date_id) }}" class="btn btn-dark btn-sm" style="font-size: 10px" role="button"><i class="fa fa-edit"></i>&nbsp;Sign & Appraised</a>
                  <a href="{{ url('manager/changedown/kpi/'. $date_id) }}" class="btn btn-dark btn-sm" style="font-size: 10px" role="button"><i class="fa fa-edit"></i>&nbsp;Undo Sign & Appraised</a> --}}
                  <div class="row">
                    <div class="col-md-7">
                      <div class="card">
                        <div class="card-body pt-4 p-3">
                          <ul class="list-group">
                            <li class="list-group-item border-0 d-flex p-4 mb-2 bg-gray-100 border-radius-lg">
                              <div class="d-flex flex-column">
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
                              </div>
                              <div class="ms-auto text-end">
                                <div class="col-12 text-end">
                                  @foreach ($date as $dates)
                                    {{-- @if ($dates->status == 'Submitted' || $dates->status == 'Signed By Manager') --}}
                                    @if ($dates->status == 'Submitted')
                                      <a class="btn bg-gradient-info mb-0" href="{{ url('manager/changeup/kpi/'. $date_id) }}" class="btn btn-dark btn-sm"role="button"><i class="fa fa-edit"></i>&nbsp;Sign & Appraised</a>
                                    @elseif ($dates->status == 'Signed By Manager')
                                      <a class="btn bg-gradient-danger mb-0" href="{{ url('manager/changedown/kpi/'. $date_id) }}" class="btn btn-dark btn-sm"  role="button"><i class="fa fa-edit"></i>&nbsp;Undo Sign & Appraised</a>
                                    @else
                                    @endif
                                  @endforeach
                                </div>
                              </div>
                            </li>
                          </ul>
                        </div>
                      </div>
                    </div>
                  </div>
                {{-- @else
                @endif --}}
              @endforeach
            @else
            @endif 

            @if (Auth::user()->role == "hr")
              @foreach ($date as $dates)
              {{-- @if ($dates->status == 'Signed By Manager' || $dates->status == 'Completed')
                <a href="{{ url('hr/changeup/kpi/'. $date_id) }}" class="btn btn-dark btn-sm" style="font-size: 10px" role="button"><i class="fa fa-edit"></i>&nbsp;Sign & Complete</a>
                <a href="{{ url('hr/changedown/kpi/'. $date_id) }}" class="btn btn-dark btn-sm" style="font-size: 10px" role="button"><i class="fa fa-edit"></i>&nbsp;Undo Sign & Complete</a>
              @else
              @endif --}}

              <div class="row">
                <div class="col-md-7">
                  <div class="card">
                    <div class="card-body pt-4 p-3">
                      <ul class="list-group">
                        <li class="list-group-item border-0 d-flex p-4 mb-2 bg-gray-100 border-radius-lg">
                          <div class="d-flex flex-column">
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
                          </div>
                          <div class="ms-auto text-end">
                            <div class="col-12 text-end">
                              @foreach ($date as $dates)
                                {{-- @if ($dates->status == 'Signed By Manager' || $dates->status == 'Completed') --}}
                                  @if ($dates->status == 'Signed By Manager')
                                    <a class="btn bg-gradient-info mb-0" href="{{ url('hr/changeup/kpi/'. $date_id) }}" class="btn btn-dark btn-sm"role="button"><i class="fa fa-edit"></i>&nbsp;Sign & Complete</a>
                                  @elseif ($dates->status == 'Completed')
                                    <a class="btn bg-gradient-danger mb-0" href="{{ url('hr/changedown/kpi/'. $date_id) }}" class="btn btn-dark btn-sm"  role="button"><i class="fa fa-edit"></i>&nbsp;Undo Sign & Complete</a>
                                  @else
                                  @endif
                              @endforeach
                            </div>
                          </div>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
              @endforeach
            @else
            @endif 

            </div>
          </div>
    
     <!-- Master Pencapaian JS -->
    <script src="{{asset('assets/js/master.js')}}"></script>
    <script src="{{asset('assets/js/kecekapan.js')}}"></script>
    <script src="{{asset('assets/js/nilai.js')}}"></script>
    
    </body>

  </div>
  @endsection