{{-- <!DOCTYPE html>
<html lang="en-us">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
   
    
  <div
  class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
  <svg width="12px" height="12px" viewBox="0 0 46 42" version="1.1"
      xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
      <title>customer-support</title>
      <g id="Basic-Elements" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
          <g id="Rounded-Icons" transform="translate(-1717.000000, -291.000000)" fill="#FFFFFF"
              fill-rule="nonzero">
              <g id="Icons-with-opacity" transform="translate(1716.000000, 291.000000)">
                  <g id="customer-support" transform="translate(1.000000, 0.000000)">
                      <path class="color-background"
                          d="M45,0 L26,0 C25.447,0 25,0.447 25,1 L25,20 C25,20.379 25.214,20.725 25.553,20.895 C25.694,20.965 25.848,21 26,21 C26.212,21 26.424,20.933 26.6,20.8 L34.333,15 L45,15 C45.553,15 46,14.553 46,14 L46,1 C46,0.447 45.553,0 45,0 Z"
                          id="Path" opacity="0.59858631"></path>
                      <path class="color-foreground"
                          d="M22.883,32.86 C20.761,32.012 17.324,31 13,31 C8.676,31 5.239,32.012 3.116,32.86 C1.224,33.619 0,35.438 0,37.494 L0,41 C0,41.553 0.447,42 1,42 L25,42 C25.553,42 26,41.553 26,41 L26,37.494 C26,35.438 24.776,33.619 22.883,32.86 Z"
                          id="Path"></path>
                      <path class="color-foreground"
                          d="M13,28 C17.432,28 21,22.529 21,18 C21,13.589 17.411,10 13,10 C8.589,10 5,13.589 5,18 C5,22.529 8.568,28 13,28 Z"
                          id="Path"></path>
                  </g>
              </g>
          </g>
      </g>
  </svg>
</div>
</head> --}}
@extends('layouts.app')
{{-- <body> --}}



  <div class="wrapper">
      <!-- Page Content  -->
      <div id="content">
        <br>
          
        <div class="card m-3">

          <div class="card-header font-weight-bold" style="text-transform:uppercase" >KAD SKOR 2021 - KPI</div>
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
                    <th rowspan="2">Threshold</th>
                    <th rowspan="2">Base</th>
                    <th rowspan="2">Stretch</th>
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
                   
                    {{-- @foreach ($kpi as $kpis) --}}
                    @foreach ($kpi as $key => $kpis)
                   
                      
                    <tr class="font-weight-bold">
                      
                      <td class="border-dark">{{$key + 1}}</td>
                      <td class="border-dark">{{ $kpis -> fungsi }}</td>
                      <td class="border-dark">{{ $kpis -> objektif }}</td>
                      <td class="border-dark">{{ $kpis -> bukti }}</td>
                        <td class="border-dark">
                          <a href=" {{ $kpis->link }}"></i>Link Bukti</a>
                        </td>
                        {{-- <td class="text-center">{{$attemptquiz->answer->answer}}</td> --}}
                        <td class="border-dark">{{ $kpis -> peratus }}</td>
                        <td class="border-dark">{{ $kpis -> ukuran }}</td>
                        <td class="border-dark">{{ $kpis -> threshold }}</td>
                        <td class="border-dark">{{ $kpis -> base }}</td>
                        <td class="border-dark">{{ $kpis -> stretch }}</td>
                        <td class="border-dark">{{ $kpis -> pencapaian }}</td>
                        <td class="border-dark">{{ $kpis -> skor_KPI }}</td>
                        <td class="border-dark">{{ round($kpis -> skor_sebenar,2) }} %</td>
                        {{-- <td class="border-dark">{{ $markah -> created_at -> toDayDateTimeString() }}</td> --}}
                        {{-- <td class="border-dark">{{ $markah -> updated_at -> toDayDateTimeString() }}</td> --}}
                       
                        <td class="border-dark">
                          <a href="{{ url('employee/edit/kpi/'.$kpis->id) }}" class="btn btn-primary btn-sm" style="font-size: 10px" role="button"><i class="fa fa-edit"></i>&nbsp;Edit Pencapaian</a>
                          {{-- <a href="{{ url('employee/bukti/edit/kpi/'.$kpis->id) }}" class="btn btn-warning btn-sm"  style="font-size: 10px" role="button"><i class="fa fa-edit"></i>&nbsp;Edit Bukti/Metrik</a> --}}
                          <a href="{{ url('employee/delete/kpi/'.$kpis->id) }}" class="btn btn-danger btn-sm"  style="font-size: 10px" role="button"><i class="fa fa-trash"></i></a>
                        </td>
                    </tr>

                    @endforeach
                    {{-- @else
                    @endif --}}
                </tbody> 
            </table>
          </div>
        </div>

        <div class="card m-3">

          <div class="card-header font-weight-bold" style="text-transform:uppercase" >KAD SKOR 2021 - Kecekapan Teras</div>
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

          <div class="card-header font-weight-bold" style="text-transform:uppercase" >KAD SKOR 2021 - Nilai Teras</div>
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

{{-- </body>
</html> --}}
