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
                        <td class="align-middle text-center">
                          <span class="text-secondary text-xs font-weight-bold" value="{{ $kpis -> objektif }}">{{ $kpis -> objektif }}</span>
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
                        <td class="align-middle text-center">
                          <span class="text-secondary text-xs font-weight-bold" value="{{ $kpis -> objektif }}">{{  NULL }}</span>
                        </td>
                        @endif
                        {{-- <td class="align-middle text-center text-sm">
                          <span class="badge badge-sm bg-gradient-success" value="{{ $kpis -> objektif }}">{{ $kpis -> objektif }}</span>
                        </td> --}}
                        <td class="align-middle text-center">
                          <span class="text-secondary text-xs font-weight-bold" value="{{ $kpis -> bukti }}}">{{ $kpis -> bukti }}</span>
                        </td>
                        <td class="align-middle text-center">
                          <a href=" {{ $kpis->link }}" style="color:blue;text-decoration:underline;font-size:13.5px"; >Link Bukti</a>
                        </td>
                        <td class="align-middle text-center">
                          <span class="text-secondary text-xs font-weight-bold" value="{{ $kpis -> peratus }}">{{ $kpis -> peratus }}</span>
                        </td>
                        <td class="align-middle text-center">
                          <span class="text-secondary text-xs font-weight-bold" value="{{ $kpis -> ukuran }}">{{ $kpis -> ukuran }}</span>
                        </td>
                        <td class="align-middle text-center">
                          <span class="text-secondary text-xs font-weight-bold" value="{{ $kpis -> threshold }}">{{ $kpis -> threshold }}</span>
                        </td>
                        <td class="align-middle text-center">
                          <span class="text-secondary text-xs font-weight-bold" value="{{ $kpis -> base }}">{{ $kpis -> base }}</span>
                        </td>
                        <td class="align-middle text-center">
                          <span class="text-secondary text-xs font-weight-bold" value="{{ $kpis -> stretch }}">{{ $kpis -> stretch }}</span>
                        </td>
                        <td class="align-middle text-center">
                          <span class="text-secondary text-xs font-weight-bold" value="{{ $kpis -> pencapaian }}">{{ $kpis -> pencapaian }}</span>
                        </td>
                        <td class="align-middle text-center">
                          <span class="text-secondary text-xs font-weight-bold" value="{{ $kpis -> skor_KPI }}">{{ $kpis -> skor_KPI }}</span>
                        </td>
                        <td class="align-middle text-center">
                          <span class="text-secondary text-xs font-weight-bold" value="{{ round($kpis -> skor_sebenar,2) }}">{{ round($kpis -> skor_sebenar,2) }} %</span>
                        </td>
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
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold" value="{{ $kpis -> objektif }}">{{ $kpis -> objektif }}</span>
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
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold" value="{{ $kpis -> objektif }}">{{  NULL }}</span>
                      </td>
                      @endif
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold" value="{{ $kpis -> bukti }}}">{{ $kpis -> bukti }}</span>
                      </td>
                      <td class="align-middle text-center">
                        <a href=" {{ $kpis->link }}" style="color:blue;text-decoration:underline;font-size:13.5px"; >Link Bukti</a>
                      </td>
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold" value="{{ $kpis -> peratus }}">{{ $kpis -> peratus }}</span>
                      </td>
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold" value="{{ $kpis -> ukuran }}">{{ $kpis -> ukuran }}</span>
                      </td>
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold" value="{{ $kpis -> threshold }}">{{ $kpis -> threshold }}</span>
                      </td>
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold" value="{{ $kpis -> base }}">{{ $kpis -> base }}</span>
                      </td>
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold" value="{{ $kpis -> stretch }}">{{ $kpis -> stretch }}</span>
                      </td>
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold" value="{{ $kpis -> pencapaian }}">{{ $kpis -> pencapaian }}</span>
                      </td>
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold" value="{{ $kpis -> skor_KPI }}">{{ $kpis -> skor_KPI }}</span>
                      </td>
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold" value="{{ round($kpis -> skor_sebenar,2) }}">{{ round($kpis -> skor_sebenar,2) }} %</span>
                      </td>
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
                    <td class="align-middle text-center">
                      <span class="text-secondary text-xs font-weight-bold" value="{{ $kpis -> objektif }}">{{ $kpis -> objektif }}</span>
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
                    <td class="align-middle text-center">
                      <span class="text-secondary text-xs font-weight-bold" value="{{ $kpis -> objektif }}">{{  NULL }}</span>
                    </td>
                    @endif
                    <td class="align-middle text-center">
                      <span class="text-secondary text-xs font-weight-bold" value="{{ $kpis -> bukti }}}">{{ $kpis -> bukti }}</span>
                    </td>
                    <td class="align-middle text-center">
                      <a href=" {{ $kpis->link }}" style="color:blue;text-decoration:underline;font-size:13.5px"; >Link Bukti</a>
                    </td>
                    <td class="align-middle text-center">
                      <span class="text-secondary text-xs font-weight-bold" value="{{ $kpis -> peratus }}">{{ $kpis -> peratus }}</span>
                    </td>
                    <td class="align-middle text-center">
                      <span class="text-secondary text-xs font-weight-bold" value="{{ $kpis -> ukuran }}">{{ $kpis -> ukuran }}</span>
                    </td>
                    <td class="align-middle text-center">
                      <span class="text-secondary text-xs font-weight-bold" value="{{ $kpis -> threshold }}">{{ $kpis -> threshold }}</span>
                    </td>
                    <td class="align-middle text-center">
                      <span class="text-secondary text-xs font-weight-bold" value="{{ $kpis -> base }}">{{ $kpis -> base }}</span>
                    </td>
                    <td class="align-middle text-center">
                      <span class="text-secondary text-xs font-weight-bold" value="{{ $kpis -> stretch }}">{{ $kpis -> stretch }}</span>
                    </td>
                    <td class="align-middle text-center">
                      <span class="text-secondary text-xs font-weight-bold" value="{{ $kpis -> pencapaian }}">{{ $kpis -> pencapaian }}</span>
                    </td>
                    <td class="align-middle text-center">
                      <span class="text-secondary text-xs font-weight-bold" value="{{ $kpis -> skor_KPI }}">{{ $kpis -> skor_KPI }}</span>
                    </td>
                    <td class="align-middle text-center">
                      <span class="text-secondary text-xs font-weight-bold" value="{{ round($kpis -> skor_sebenar,2) }}">{{ round($kpis -> skor_sebenar,2) }} %</span>
                    </td>
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
                  <td class="align-middle text-center">
                    <span class="text-secondary text-xs font-weight-bold" value="{{ $kpis -> objektif }}">{{ $kpis -> objektif }}</span>
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
                  <td class="align-middle text-center">
                    <span class="text-secondary text-xs font-weight-bold" value="{{ $kpis -> objektif }}">{{  NULL }}</span>
                  </td>
                  @endif
                  <td class="align-middle text-center">
                    <span class="text-secondary text-xs font-weight-bold" value="{{ $kpis -> bukti }}}">{{ $kpis -> bukti }}</span>
                  </td>
                  <td class="align-middle text-center">
                    <a href=" {{ $kpis->link }}" style="color:blue;text-decoration:underline;font-size:13.5px"; >Link Bukti</a>
                  </td>
                  <td class="align-middle text-center">
                    <span class="text-secondary text-xs font-weight-bold" value="{{ $kpis -> peratus }}">{{ $kpis -> peratus }}</span>
                  </td>
                  <td class="align-middle text-center">
                    <span class="text-secondary text-xs font-weight-bold" value="{{ $kpis -> ukuran }}">{{ $kpis -> ukuran }}</span>
                  </td>
                  <td class="align-middle text-center">
                    <span class="text-secondary text-xs font-weight-bold" value="{{ $kpis -> threshold }}">{{ $kpis -> threshold }}</span>
                  </td>
                  <td class="align-middle text-center">
                    <span class="text-secondary text-xs font-weight-bold" value="{{ $kpis -> base }}">{{ $kpis -> base }}</span>
                  </td>
                  <td class="align-middle text-center">
                    <span class="text-secondary text-xs font-weight-bold" value="{{ $kpis -> stretch }}">{{ $kpis -> stretch }}</span>
                  </td>
                  <td class="align-middle text-center">
                    <span class="text-secondary text-xs font-weight-bold" value="{{ $kpis -> pencapaian }}">{{ $kpis -> pencapaian }}</span>
                  </td>
                  <td class="align-middle text-center">
                    <span class="text-secondary text-xs font-weight-bold" value="{{ $kpis -> skor_KPI }}">{{ $kpis -> skor_KPI }}</span>
                  </td>
                  <td class="align-middle text-center">
                    <span class="text-secondary text-xs font-weight-bold" value="{{ round($kpis -> skor_sebenar,2) }}">{{ round($kpis -> skor_sebenar,2) }} %</span>
                  </td>
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
                <td class="align-middle text-center">
                  <span class="text-secondary text-xs font-weight-bold" value="{{ $kpis -> objektif }}">{{ $kpis -> objektif }}</span>
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
                <td class="align-middle text-center">
                  <span class="text-secondary text-xs font-weight-bold" value="{{ $kpis -> objektif }}">{{  NULL }}</span>
                </td>
                @endif
                <td class="align-middle text-center">
                  <span class="text-secondary text-xs font-weight-bold" value="{{ $kpis -> bukti }}}">{{ $kpis -> bukti }}</span>
                </td>
                <td class="align-middle text-center">
                  <a href=" {{ $kpis->link }}" style="color:blue;text-decoration:underline;font-size:13.5px"; >Link Bukti</a>
                </td>
                <td class="align-middle text-center">
                  <span class="text-secondary text-xs font-weight-bold" value="{{ $kpis -> peratus }}">{{ $kpis -> peratus }}</span>
                </td>
                <td class="align-middle text-center">
                  <span class="text-secondary text-xs font-weight-bold" value="{{ $kpis -> ukuran }}">{{ $kpis -> ukuran }}</span>
                </td>
                <td class="align-middle text-center">
                  <span class="text-secondary text-xs font-weight-bold" value="{{ $kpis -> threshold }}">{{ $kpis -> threshold }}</span>
                </td>
                <td class="align-middle text-center">
                  <span class="text-secondary text-xs font-weight-bold" value="{{ $kpis -> base }}">{{ $kpis -> base }}</span>
                </td>
                <td class="align-middle text-center">
                  <span class="text-secondary text-xs font-weight-bold" value="{{ $kpis -> stretch }}">{{ $kpis -> stretch }}</span>
                </td>
                <td class="align-middle text-center">
                  <span class="text-secondary text-xs font-weight-bold" value="{{ $kpis -> pencapaian }}">{{ $kpis -> pencapaian }}</span>
                </td>
                <td class="align-middle text-center">
                  <span class="text-secondary text-xs font-weight-bold" value="{{ $kpis -> skor_KPI }}">{{ $kpis -> skor_KPI }}</span>
                </td>
                <td class="align-middle text-center">
                  <span class="text-secondary text-xs font-weight-bold" value="{{ round($kpis -> skor_sebenar,2) }}">{{ round($kpis -> skor_sebenar,2) }} %</span>
                </td>
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
              <td class="align-middle text-center">
                <span class="text-secondary text-xs font-weight-bold" value="{{ $kpis -> objektif }}">{{ $kpis -> objektif }}</span>
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
              <td class="align-middle text-center">
                <span class="text-secondary text-xs font-weight-bold" value="{{ $kpis -> objektif }}">{{  NULL }}</span>
              </td>
              @endif
              <td class="align-middle text-center">
                <span class="text-secondary text-xs font-weight-bold" value="{{ $kpis -> bukti }}}">{{ $kpis -> bukti }}</span>
              </td>
              <td class="align-middle text-center">
                <a href=" {{ $kpis->link }}" style="color:blue;text-decoration:underline;font-size:13.5px"; >Link Bukti</a>
              </td>
              <td class="align-middle text-center">
                <span class="text-secondary text-xs font-weight-bold" value="{{ $kpis -> peratus }}">{{ $kpis -> peratus }}</span>
              </td>
              <td class="align-middle text-center">
                <span class="text-secondary text-xs font-weight-bold" value="{{ $kpis -> ukuran }}">{{ $kpis -> ukuran }}</span>
              </td>
              <td class="align-middle text-center">
                <span class="text-secondary text-xs font-weight-bold" value="{{ $kpis -> threshold }}">{{ $kpis -> threshold }}</span>
              </td>
              <td class="align-middle text-center">
                <span class="text-secondary text-xs font-weight-bold" value="{{ $kpis -> base }}">{{ $kpis -> base }}</span>
              </td>
              <td class="align-middle text-center">
                <span class="text-secondary text-xs font-weight-bold" value="{{ $kpis -> stretch }}">{{ $kpis -> stretch }}</span>
              </td>
              <td class="align-middle text-center">
                <span class="text-secondary text-xs font-weight-bold" value="{{ $kpis -> pencapaian }}">{{ $kpis -> pencapaian }}</span>
              </td>
              <td class="align-middle text-center">
                <span class="text-secondary text-xs font-weight-bold" value="{{ $kpis -> skor_KPI }}">{{ $kpis -> skor_KPI }}</span>
              </td>
              <td class="align-middle text-center">
                <span class="text-secondary text-xs font-weight-bold" value="{{ round($kpis -> skor_sebenar,2) }}">{{ round($kpis -> skor_sebenar,2) }} %</span>
              </td>
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
            <td class="align-middle text-center">
              <span class="text-secondary text-xs font-weight-bold" value="{{ $kpis -> objektif }}">{{ $kpis -> objektif }}</span>
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
            <td class="align-middle text-center">
              <span class="text-secondary text-xs font-weight-bold" value="{{ $kpis -> objektif }}">{{  NULL }}</span>
            </td>
            @endif
            <td class="align-middle text-center">
              <span class="text-secondary text-xs font-weight-bold" value="{{ $kpis -> bukti }}}">{{ $kpis -> bukti }}</span>
            </td>
            <td class="align-middle text-center">
              <a href=" {{ $kpis->link }}" style="color:blue;text-decoration:underline;font-size:13.5px"; >Link Bukti</a>
            </td>
            <td class="align-middle text-center">
              <span class="text-secondary text-xs font-weight-bold" value="{{ $kpis -> peratus }}">{{ $kpis -> peratus }}</span>
            </td>
            <td class="align-middle text-center">
              <span class="text-secondary text-xs font-weight-bold" value="{{ $kpis -> ukuran }}">{{ $kpis -> ukuran }}</span>
            </td>
            <td class="align-middle text-center">
              <span class="text-secondary text-xs font-weight-bold" value="{{ $kpis -> threshold }}">{{ $kpis -> threshold }}</span>
            </td>
            <td class="align-middle text-center">
              <span class="text-secondary text-xs font-weight-bold" value="{{ $kpis -> base }}">{{ $kpis -> base }}</span>
            </td>
            <td class="align-middle text-center">
              <span class="text-secondary text-xs font-weight-bold" value="{{ $kpis -> stretch }}">{{ $kpis -> stretch }}</span>
            </td>
            <td class="align-middle text-center">
              <span class="text-secondary text-xs font-weight-bold" value="{{ $kpis -> pencapaian }}">{{ $kpis -> pencapaian }}</span>
            </td>
            <td class="align-middle text-center">
              <span class="text-secondary text-xs font-weight-bold" value="{{ $kpis -> skor_KPI }}">{{ $kpis -> skor_KPI }}</span>
            </td>
            <td class="align-middle text-center">
              <span class="text-secondary text-xs font-weight-bold" value="{{ round($kpis -> skor_sebenar,2) }}">{{ round($kpis -> skor_sebenar,2) }} %</span>
            </td>
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
          <td class="align-middle text-center">
            <span class="text-secondary text-xs font-weight-bold" value="{{ $kpis -> objektif }}">{{ $kpis -> objektif }}</span>
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
          <td class="align-middle text-center">
            <span class="text-secondary text-xs font-weight-bold" value="{{ $kpis -> objektif }}">{{  NULL }}</span>
          </td>
          @endif
          <td class="align-middle text-center">
            <span class="text-secondary text-xs font-weight-bold" value="{{ $kpis -> bukti }}}">{{ $kpis -> bukti }}</span>
          </td>
          <td class="align-middle text-center">
            <a href=" {{ $kpis->link }}" style="color:blue;text-decoration:underline;font-size:13.5px"; >Link Bukti</a>
          </td>
          <td class="align-middle text-center">
            <span class="text-secondary text-xs font-weight-bold" value="{{ $kpis -> peratus }}">{{ $kpis -> peratus }}</span>
          </td>
          <td class="align-middle text-center">
            <span class="text-secondary text-xs font-weight-bold" value="{{ $kpis -> ukuran }}">{{ $kpis -> ukuran }}</span>
          </td>
          <td class="align-middle text-center">
            <span class="text-secondary text-xs font-weight-bold" value="{{ $kpis -> threshold }}">{{ $kpis -> threshold }}</span>
          </td>
          <td class="align-middle text-center">
            <span class="text-secondary text-xs font-weight-bold" value="{{ $kpis -> base }}">{{ $kpis -> base }}</span>
          </td>
          <td class="align-middle text-center">
            <span class="text-secondary text-xs font-weight-bold" value="{{ $kpis -> stretch }}">{{ $kpis -> stretch }}</span>
          </td>
          <td class="align-middle text-center">
            <span class="text-secondary text-xs font-weight-bold" value="{{ $kpis -> pencapaian }}">{{ $kpis -> pencapaian }}</span>
          </td>
          <td class="align-middle text-center">
            <span class="text-secondary text-xs font-weight-bold" value="{{ $kpis -> skor_KPI }}">{{ $kpis -> skor_KPI }}</span>
          </td>
          <td class="align-middle text-center">
            <span class="text-secondary text-xs font-weight-bold" value="{{ round($kpis -> skor_sebenar,2) }}">{{ round($kpis -> skor_sebenar,2) }} %</span>
          </td>
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
                          <td class="align-middle text-center">
                            <span class="text-secondary text-xs font-weight-bold" value="{{ $kecekapans -> jangkaan_hasil }}">{{ $kecekapans -> jangkaan_hasil }}</span>
                          </td>
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
                          {{-- <td class="align-middle text-center">
                            <a href="{{ url('employee/edit/kecekapan/'.$kecekapans->id) }}" class="btn btn-primary btn-sm" style="font-size: 10px" role="button"><i class="fa fa-edit"></i>&nbsp;Pencapaian</a>
                          </td>
                          <td class="align-middle text-center">
                            <a href="{{ url('employee/delete/kecekapan/'.$kecekapans->id) }}" class="btn btn-danger btn-sm"  style="font-size: 10px" role="button"><i class="fa fa-trash"></i></a>
                          </td> --}}
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
                          <td class="align-middle text-center">
                            <span class="text-secondary text-xs font-weight-bold" value="{{ $nilais -> jangkaan_hasil }}">{{ $nilais -> jangkaan_hasil }}</span>
                          </td>
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
                          {{-- <td class="align-middle text-center">
                            <a href="{{ url('employee/edit/nilai/'.$nilais->id) }}" class="btn btn-primary btn-sm" style="font-size: 10px" role="button"><i class="fa fa-edit"></i>&nbsp;Pencapaian</a>
                          </td>
                          <td class="align-middle text-center">
                            <a href="{{ url('employee/delete/nilai/'.$nilais->id) }}" class="btn btn-danger btn-sm"  style="font-size: 10px" role="button"><i class="fa fa-trash"></i></a>
                          </td> --}}
                        </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            @foreach ($user as $userss)
            @if ($userss->status == 'Not Submitted' || $userss->status == 'Submitted')
            <a href="{{ url('employee/changeup/kpi/'. Auth()->user()->id) }}" class="btn btn-primary btn-sm" style="font-size: 10px" role="button"><i class="fa fa-edit"></i>&nbsp;Submitted ?</a>
            {{-- @endforeach --}}
          
            <a href="{{ url('employee/changedown/kpi/'. Auth()->user()->id) }}" class="btn btn-primary btn-sm" style="font-size: 10px" role="button"><i class="fa fa-edit"></i>&nbsp;Undo Submitted ?</a>
            @else
            @endif
            @endforeach
          </div>
        </div>
  
   <!-- Master Pencapaian JS -->
  <script src="{{asset('assets/js/master.js')}}"></script>
  <script src="{{asset('assets/js/kecekapan.js')}}"></script>
  <script src="{{asset('assets/js/nilai.js')}}"></script>
  
  </body>
  