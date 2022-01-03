{{--------------------------------------------------- Start Testing ---------------------------------------------------}}

<div>
  <div>
    <div class="container-fluid">
        <div class="page-header min-height-250 border-radius-xl mt-4" style="background-image: url('../assets/img/curved-images/curved0.jpg'); background-position-y: 50%;">
          <span class="mask bg-gradient-primary opacity-6"></span>
        </div>
        <div class="card card-body blur shadow-blur mx-4 mt-n6 overflow-hidden">
          <div class="row gx-4">
            <div class="col-auto">
              <div class="avatar avatar-xl position-relative">
                <img src="../assets/img/profileavatar.png" alt="profile_image" class="w-70 border-radius-lg shadow-sm">
              </div>
            </div>
            <div class="col-auto my-auto">
              <div class="h-100">
                <h5 class="mb-1">
                    {{ Auth::user()->name }}
                </h5>
                <p class="mb-0 font-weight-bold text-sm">
                    {{ Auth::user()->role }}
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
   </div>  
</div>
{{---------------------------------------------------- End Testing ----------------------------------------------------}}


<div class="container-fluid py-4">
    <div class="row">
      <div class="col-12 col-xl-4">
        <div class="card h-100">
          <div class="card-header pb-0 p-3">
            <div class="row">
              <div class="col-md-8 d-flex align-items-center">
                <h6 class="mb-0">Profile Information</h6>
              </div>
              <div class="col-md-4 text-end">
                <a href="javascript:;">
                  <i class="fas fa-user-edit text-secondary text-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit Profile"></i>
                </a>
              </div>
            </div>
          </div>
          <div class="card-body p-3">
            <p class="text-sm">
              Hi, I’m {{ Auth::user()->name }}, My staff number is {{ Auth::user()->nostaff }} and i'm {{ Auth::user()->unit }} at {{ Auth::user()->department }}.
            </p>
            <hr class="horizontal gray-light my-4">
            <ul class="list-group">
              <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong class="text-dark">Full Name:</strong> &nbsp; {{ Auth::user()->name }}</li>
              <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">No Staff:</strong> &nbsp; {{ Auth::user()->nostaff }}</li>
              <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Position:</strong> &nbsp; {{ Auth::user()->position }}</li>
              <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Department:</strong> &nbsp; {{ Auth::user()->department }}</li>
              <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Unit:</strong> &nbsp; {{ Auth::user()->unit }}</li>
              <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Email:</strong> &nbsp; {{ Auth::user()->email}}</li>
            </ul>
          </div>
        </div>
      </div>
      <div class="col-lg-5 ms-auto text-center mt-lg-0">
        <img src="../assets/img/shapes/waves-white.svg" class="position-absolute h-100 w-50 top-0 d-lg-block d-none" alt="waves">
        <div class="position-relative d-flex align-items-center justify-content-center h-100">
          @foreach ($kpialls as $key => $kpiall)
          {{-- {{ dd($kpiall->grade_all) }} --}}
            @if ($kpiall->grade_all == 'PLATINUM')
              <img class="w-100 position-relative z-index-2" src="../assets/img/platinum.png" alt="platinum">
            @elseif($kpiall->grade_all == 'HIGH GOLD' && $kpiall->grade_all == 'MID GOLD' && $kpiall->grade_all == 'LOW GOLD')
              <img class="w-100 position-relative z-index-2" src="../assets/img/gold.png" alt="gold">
            @elseif($kpiall->grade_all == 'HIGH SILVER' && $kpiall->grade_all == 'MID SILVER' && $kpiall->grade_all == 'LOW SILVER')
              <img class="w-100 position-relative z-index-2" src="../assets/img/silver.png" alt="silver">
            @else
              <img class="w-100 position-relative z-index-2" src="../assets/img/bronze.png" alt="bronze">
            @endif
          @endforeach
          {{-- <img class="w-100 position-relative z-index-2 pt-4" src="../assets/img/illustrations/rocket-white.png" alt="rocket"> --}}
        </div>
      </div>
      <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
        <div class="card">
          <div class="card-body p-3">
            <div class="row">
              <div class="col-8">
                <div class="numbers">
                  <p class="text-sm mb-0 text-capitalize font-weight-bold">KPI</p>
                  @foreach ($kpialls as $key => $kpiall)  
                  <h5 class="font-weight-bolder mb-4">
                    {{ $kpiall -> total_score_master }}%
                  </h5>
                  @endforeach
                </div>
              </div>
              <div class="col-4 text-end">
                <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                  <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
                </div>
              </div>
              <div class="col-8">
                <div class="numbers">
                  <p class="text-sm mb-0 text-capitalize font-weight-bold">Skor Akhir</p>
                  @foreach ($kpialls as $key => $kpiall)  
                  <h5 class="font-weight-bolder mb-4">
                    {{ round($kpiall -> total_score_all,2) }}%
                  </h5>
                  @endforeach
                </div>
              </div>
              <div class="col-4 text-end">
                <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                  <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
                </div>
              </div>
              <div class="col-8">
                <div class="numbers">
                  <p class="text-sm mb-0 text-capitalize font-weight-bold">Kecekapan Teras</p>
                  @foreach ($kpialls as $key => $kpiall)  
                  <h5 class="font-weight-bolder mb-4">
                    {{ $kpiall -> total_score_kecekapan }}%
                  </h5>
                  @endforeach
                </div>
              </div>
              <div class="col-4 text-end">
                <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                  <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
                </div>
              </div>
              <div class="col-8">
                <div class="numbers">
                  <p class="text-sm mb-0 text-capitalize font-weight-bold">Nilai Teras</p>
                  @foreach ($kpialls as $key => $kpiall)  
                  <h5 class="font-weight-bolder mb-0">
                    {{ $kpiall -> total_score_nilai }}%
                  </h5>
                  @endforeach
                </div>
              </div>
              <div class="col-4 text-end">
                <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                  <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>    