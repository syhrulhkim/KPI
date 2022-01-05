@section('content')
<div>
    @extends('layouts.app')
      <div class="wrapper">
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
              <div class="col-md-auto">
                  <div class="card shadow rounded">
                      <div class="card-header font-weight-bold" style="text-transform:uppercase" >Performance Form</div>
    
                      <div class="col-sm-auto p-3">
                          <div class="card">
                              <div class="m-3">
                                {{-- {{dd($fungsi)}} --}}
                              <form action="{{ url('employee/update/kpimaster/'.$kpimasters->id.'/'.$fungsi.'/'.$date_id.'/'.$user_id.'/'.$year.'/'.$month) }}" method="post">  
                                      @csrf
      
                                  <div class="row">
                                      <div class="col-sm-4 pt-3 " >
                                        <div class="mb-4" class="@error('percent_master') border border-danger rounded-3 @enderror">
                                            <label class="font-weight-bold " >Percentage KPI Master</label>
                                            <input type="text" class="form-control form-control-sm" id="percent_master" name="percent_master" value="{{ $kpimasters->percent_master }}" >
                                            @error('percent_master') <div class="text-danger">{{ $message }}</div> @enderror
                                        </div>
                                      </div>
                                      <div class="col-sm-4 pt-3 " >
                                        <div class="mb-4" class="@error('link') border border-danger rounded-3 @enderror">
                                            <label class="font-weight-bold " >Link Bukti (Leave blank if does not have any bukti)</label>
                                            <input type="text" class="form-control form-control-sm" id="link" name="link" value="{{ $kpimasters->link }}" >
                                            @error('link') <div class="text-danger">{{ $message }}</div> @enderror
                                        </div>
                                      </div>
                                      <div class="col-sm-4 pt-3 " >
                                        <div class="mb-4" class="@error('objektif') border border-danger rounded-3 @enderror">
                                            <label class="font-weight-bold " >Objektif KPI</label>
                                            <input type="text" class="form-control form-control-sm" id="objektif" name="objektif" value="{{ $kpimasters->objektif }}" >
                                            @error('objektif') <div class="text-danger">{{ $message }}</div> @enderror
                                        </div>
                                      </div>
                                  </div>
    
                                  <div class="p-3" style="text-align: right">
                                    {{-- <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                                      Save
                                  </button> --}}
                                  <button type="submit" class="btn btn-success btn-sm" style="font-size: 10px"><i class="fas fa-save"></i> Save</button>
                                    {{-- <button type="button" class="btn btn-cancel" ><a href="{{ route('add-date') }}"><i class="fas fa-window-close"></i>Back</a></button>   --}}
                                    {{-- <button type="button" class="btn btn-cancel" ><a href="{{ url('/employee/kpi/'.$date_id.'/'.$user_id.'/'.$year.'/'.$month) }}"><i class="fas fa-window-close"></i> Back</a></button>      --}}
                                    {{-- <button type="button" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150"><a style="color:white" href="{{ url('/employee/kpi/'.$date_id.'/'.$user_id.'/'.$year.'/'.$month) }}">
                                      Back </a>
                                  </button>                  --}}
                                  </div>
                                </form>
                                </div>
                          </div>
                      </div>
                  </div>     
              </div>
          </div>
      </div>
     {{-- <script src="{{url('assets/js/core/bootstrap.min.js')}}"></script> --}}
</div>
@endsection