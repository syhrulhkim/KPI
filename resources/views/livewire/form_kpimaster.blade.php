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
                <span class="text-danger">Sila semak semula butiran pencapaian</span>
              </div>
              @enderror
              <div class="col-md-auto">
                  <div class="card shadow rounded">
                      <div class="card-header font-weight-bold" style="text-transform:uppercase" >Borang Pencapaian</div>
    
                      <div class="col-sm-auto p-3">
                          <div class="card">
                              <div class="m-3">
    
                              <form action="{{ url('employee/update/kpimaster/'.$kpimaster->id) }}" method="post">  
                                      @csrf
      
                                  <div class="row">
                                      <div class="col-sm-4 pt-3 " >
                                        <div class="mb-4">
                                            <label class="font-weight-bold " >Percentage KPI Master</label>
                                            <input type="text" class="form-control form-control-sm" id="percent_master" name="percent_master" value="{{ $kpimaster->percent_master }}" >
                                        </div>
                                      </div>
                                      <div class="col-sm-4 pt-3 " >
                                        <div class="mb-4">
                                            <label class="font-weight-bold " >Link Bukti</label>
                                            <input type="text" class="form-control form-control-sm" id="link" name="link" value="{{ $kpimaster->link }}" >
                                        </div>
                                      </div>
                                      <div class="col-sm-4 pt-3 " >
                                        <div class="mb-4">
                                            <label class="font-weight-bold " >Objektif KPI</label>
                                            <input type="text" class="form-control form-control-sm" id="objektif" name="objektif" value="{{ $kpimaster->objektif }}" >
                                        </div>
                                      </div>
                                  </div>
    
                                  <div class="p-3" style="text-align: right">
                                    <button type="submit" class="btn btn-sm btn-success" ><i class="fas fa-save"></i>Save</button>   
                                    <button type="button" class="btn btn-cancel" ><a href="{{ route('add-kpi') }}"><i class="fas fa-window-close"></i>Back</a></button>                        
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