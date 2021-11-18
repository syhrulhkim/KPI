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
                      @foreach ($kpi as $key => $kpis)
                        <tr>
                          <td>    
                            <div class="d-flex px-2 py-1">
                              <div class="d-flex flex-column justify-content-center">
                                <p class="mb-0 text-sm" value="{{$key + 1}}">{{$key + 1}}</p>
                              </div>
                            </div>
                          </td>
                          <td>
                            <p class="text-xs font-weight-bold mb-0" value="{{ $kpis -> fungsi }}">{{ $kpis -> fungsi }}</p>
                          </td>
                          <td class="align-middle text-center">
                            <span class="text-secondary text-xs font-weight-bold" value="{{ $kpis -> objektif }}">{{ $kpis -> objektif }}</span>
                          </td>
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
              @foreach ($user as $users)
              @if ($users->status == 'Signed By Manager' || $users->status == 'Completed')
              <a href="{{ url('hr/changeup/kpi/'. $id) }}" class="btn btn-primary btn-sm" style="font-size: 10px" role="button"><i class="fa fa-edit"></i>&nbsp;Completed ?</a>
              <a href="{{ url('hr/changedown/kpi/'. $id) }}" class="btn btn-primary btn-sm" style="font-size: 10px" role="button"><i class="fa fa-edit"></i>&nbsp;Undo Completed ?</a>
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
  </div>  
  @endsection