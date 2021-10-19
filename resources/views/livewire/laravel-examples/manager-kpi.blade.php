<body>

    <div class="wrapper">
        <!-- Page Content  -->
        <div id="content">
          <br>
            
          <div class="card m-3">
  
            <div class="card-header font-weight-bold" style="text-transform:uppercase" >Maklumat Pencapaian</div>
            <div class="table-responsive">
              <table  class="table table-bordered text-center">
                  <thead class="thead-dark">
                    <tr>
                      <th>No.</th>
                      <th rowspan="2">Fungsi</th>
                      <th rowspan="2">Objektif KPI</th>
                      <th rowspan="2">Metrik/Bukti</th>
                      <th rowspan="2">Link Bukti</th>
                      <th rowspan="2">(%)</th>
                      <th rowspan="2">Ukuran</th>
                      <th rowspan="2">Threshold</th>
                      <th rowspan="2">Base</th>
                      <th rowspan="2">Stretch</th>
                      <th rowspan="2">Pencapaian</th>
                      <th rowspan="2">Skor KPI</th>
                      <th rowspan="2">Skor Sebenar</th>
                      <th class="w-25" ><i class="fas fa-cogs"></i></th>
                    </tr>
                  </thead>
                  <tbody >
                      @foreach ($kpi as $key => $kpis)
                     
                        
                      <tr class="font-weight-bold">
                        
                        @php
                            $isAnswered = false;
                        @endphp
                          @foreach ($bukti as $buktis)
                          @if(auth()->user()->id == auth()->user()->id)
                            @php
                            $isAnswered = true;
                            @endphp
                            @break
                          @else
                            @php
                              $isAnswered = false;
                            @endphp
                          @endif
                        @endforeach
                        @if ($isAnswered)
                        <td class="border-dark">{{$key + 1}}</td>
                        <td class="border-dark">{{ $kpis -> fungsi }}</td>
                        <td class="border-dark">{{ $kpis -> objektif }}</td>
                        <td class="border-dark">{{ $kpis -> bukti }}</td>
                          <td class="border-dark">
                            <a href=" {{ $buktis->link }}"></i>Link Bukti</a>
                          </td>
                          <td class="border-dark">{{ $kpis -> peratus }}</td>
                          <td class="border-dark">{{ $kpis -> ukuran }}</td>
                          <td class="border-dark">{{ $kpis -> threshold }}</td>
                          <td class="border-dark">{{ $kpis -> base }}</td>
                          <td class="border-dark">{{ $kpis -> stretch }}</td>
                          <td class="border-dark">{{ $kpis -> pencapaian }}</td>
                          <td class="border-dark">{{ $kpis -> skor_KPI }}</td>
                          <td class="border-dark">{{ round($kpis -> skor_sebenar,2) }} %</td>
                         
                          <td class="border-dark">
                            <a href="{{ url('employee/edit/kpi/'.$kpis->id) }}" class="btn btn-primary btn-sm" style="font-size: 10px" role="button"><i class="fa fa-edit"></i>&nbsp;Edit Pencapaian</a>
                            <a href="{{ url('employee/bukti/edit/kpi/'.$kpis->id) }}" class="btn btn-warning btn-sm"  style="font-size: 10px" role="button"><i class="fa fa-edit"></i>&nbsp;Edit Bukti/Metrik</a>
                            <a href="{{ url('employee/delete/kpi/'.$kpis->id) }}" class="btn btn-danger btn-sm"  style="font-size: 10px" role="button"><i class="fa fa-trash"></i></a>
                          </td>
                          @else
                          You have no yet submitted any KPI
                      @endif
                      </tr>
  
                      @endforeach
                  </tbody> 
              </table>
            </div>
          </div>

          <div class="card m-3">

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
                      {{-- <th >Penilaian </th> --}}
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
                            {{-- <a href="{{ url('employee/bukti/edit/'.$kecekapans->id) }}" class="btn btn-warning btn-sm"  style="font-size: 10px" role="button"><i class="fa fa-edit"></i>&nbsp;Bukti/Metrik</a> --}}
                            <a href="{{ url('employee/delete/kecekapan/'.$kecekapans->id) }}" class="btn btn-danger btn-sm"  style="font-size: 10px" role="button"><i class="fa fa-trash"></i></a>
                          </td>
                          
                      </tr>
  
                      @endforeach
                  </tbody> 
              </table>
            </div>
          </div>

          <div class="card m-3">

            <div class="card-header font-weight-bold" style="text-transform:uppercase" >Maklumat Pencapaian</div>
            <div class="table-responsive">
              <table  class="table table-bordered text-center">
                  <thead class="thead-dark">
                    <tr>
                      <th>No.</th>
                      <th >Nilai Teras</th>
                      <th >Jangkaan Hasil</th>
                      <th >%</th>
                      <th >Ukuran</th>
                      <th >Skor Pekerja</th>
                      <th >Skor Penyelia</th>
                      <th >Skor Sebenar</th>
                      {{-- <th >Penilaian </th> --}}
                      <th class="w-25" ><i class="fas fa-cogs"></i></th>
                    </tr>
                  </thead>
                  <tbody >
                      <!-- Display Body --> 
                      @php($i = 1)
                      @foreach ($nilai as $nilais)
                        
                      <tr class="font-weight-bold">
                        
                          <td class="border-dark">{{ $i++  }}</td>
                          {{-- {{dd($nilais -> nilai_teras)}} --}}
                          <td class="border-dark">{{ $nilais -> nilai_teras }}</td>
                          <td class="border-dark">{{ $nilais -> jangkaan_hasil }}</td>
                          <td class="border-dark">{{  '20%' }}</td>
                          <td class="border-dark">{{ 'Percentage (%)' }}</td>
                          <td class="border-dark">{{ $nilais -> skor_pekerja }}</td>
                          <td class="border-dark">{{ $nilais -> skor_penyelia }}</td>
                          <td class="border-dark">{{ $nilais -> skor_sebenar }}</td>
  
                          <td class="border-dark">
                            <a href="{{ url('employee/edit/nilai/'.$nilais->id) }}" class="btn btn-primary btn-sm" style="font-size: 10px" role="button"><i class="fa fa-edit"></i>&nbsp;Pencapaian</a>
                            {{-- <a href="{{ url('employee/bukti/edit/'.$nilai->id) }}" class="btn btn-warning btn-sm"  style="font-size: 10px" role="button"><i class="fa fa-edit"></i>&nbsp;Bukti/Metrik</a> --}}
                            <a href="{{ url('employee/delete/nilai/'.$nilais->id) }}" class="btn btn-danger btn-sm"  style="font-size: 10px" role="button"><i class="fa fa-trash"></i></a>
                          </td>
                          
                      </tr>
  
                      @endforeach
                  </tbody> 
              </table>
            </div>
          </div>
  
        </div>
    </div>
  
   <!-- Master Pencapaian JS -->
  <script src="{{asset('assets/js/master.js')}}"></script>
  <script src="{{asset('assets/js/kecekapan.js')}}"></script>
  <script src="{{asset('assets/js/nilai.js')}}"></script>
  
  </body>
  