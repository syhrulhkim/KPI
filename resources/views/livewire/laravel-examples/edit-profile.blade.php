{{-- @extends('staff/layout/employee_template')
@section('title','Staff | Profile')

@section('content') --}}

<body>

    <div class="wrapper">
        
        <!-- Page Content  -->
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

                      
          <div class="m-3">
              @if (session('message'))
                <div class="alert alert-success alert-dismissible">
                    {{-- <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> --}}
                    {{-- <strong>Well done!</strong>  {{ session('message') }} --}}
                    <strong>{{ session('message') }}</strong>
                </div>	
            @endif  
          </div>
          

          <!-- Profile Content  -->
          
             <div class="col-md-auto">
                <div class="card shadow rounded">
                    <div class="card-header font-weight-bold" style="text-transform:uppercase" >Profile Information</div>

                    <div class="col-sm-auto p-3">
                        <div class="card">
                            <div class="m-3">

                                <form action="{{ url('employee/profile/update/'.Auth::user()->id) }}" method="post">   
                                    @csrf

                                <div class="row">
                                        <div class="col-md-6 pt-3 " >
                                            
                                            
                                            {{-- <div class="mb-3">
                                                <label class="font-weight-bold" >Full Name</label>
                                                <input type="text" class="form-control form-control-sm" value="{{ Auth::user()->name }}" disabled>
                                            </div>

                                            <div class="mb-3">
                                                <label class="font-weight-bold" >Staff Email</label>
                                                <input type="text" class="form-control form-control-sm" value="{{ Auth::user()->email }}" disabled>
                                            </div> --}}

                                            <div class="mb-3">
                                                <label class="font-weight-bold" >Name</label>
                                                <input type="text" class="form-control form-control-sm" name="name" value="{{ Auth::user()->name }}" >
                                            </div>

                                            <div class="mb-3">
                                                <label class="font-weight-bold" >Position</label>
                                                <input type="text" class="form-control form-control-sm" name="position" value="{{ Auth::user()->position }}" >
                                            </div>

                                            {{-- Admin Input --}}
                                            {{-- <div class="mb-3">
                                                <label class="font-weight-bold" >Grade Staff</label>
                                                <input type="text" class="form-control form-control-sm" value="{{ Auth::user()->grade }}" disabled>
                                            </div> --}}

                                            <div class="mb-3">
                                                <label class="font-weight-bold" >Unit Staff</label>
                                                <input type="text" class="form-control form-control-sm" name="unit" value="{{ Auth::user()->unit }}">
                                            </div>
                                                
                                        </div>
                        
                                        <div class="col-md-6 pt-3" >
                                            
                                                {{-- Admin Input --}}
                                                <div class="mb-3">
                                                    <label class="font-weight-bold" >No Staff</label>
                                                    <input type="text" class="form-control form-control-sm" name="nostaff" value="{{ Auth::user()->nostaff }}" >
                                                </div>



                                                <div class="mb-3">
                                                    <label class="font-weight-bold" >Department</label>
                                                        {{-- <td style="word-break: break-all;" class="border-dark"> --}}
                                                            <select class="form-select form-select-sm" id="department" name="department">
                                                        <option selected class="bg-secondary text-white" value="{{ Auth::user()->department }}" >{{ Auth::user()->department }}</option>
                                                        {{-- <option value="BAHAGIAN PENYELIDIKAN & PEMBANGUNAN">BAHAGIAN PENYELIDIKAN & PEMBANGUNAN</option>
                                                        <option value="BAHAGIAN PEJABAT KORPORAT">BAHAGIAN PEJABAT KORPORAT</option>
                                                        <option value="BAHAGIAN PEMASARAN">BAHAGIAN PEMASARAN</option>
                                                        <option value="BAHAGIAN OPERASI">BAHAGIAN OPERASI</option>
                                                        <option value="BAHAGIAN JUALAN">BAHAGIAN JUALAN</option> --}}
                                                        {{-- <option value="">-- Choose Department --</option> --}}

                                                        
                                                        @if (Auth::user()->department != "CEO Office")
                                                        <option value="CEO Office">CEO Office</option>
                                                        @else
                                                        @endif

                                                        @if (Auth::user()->department != "Human Resource (HR) & Administration")
                                                        <option value="Human Resource (HR) & Administration">Human Resource (HR) & Administration</option>
                                                        @else
                                                        @endif

                                                        @if (Auth::user()->department != "Finance & Admin (F&A)")
                                                        <option value="Finance & Admin (F&A)">Finance & Admin (F&A)</option>
                                                        @else
                                                        @endif

                                                        @if (Auth::user()->department != "Sales")
                                                        <option value="Sales">Sales</option>
                                                        @else
                                                        @endif

                                                        @if (Auth::user()->department != "Marketing")
                                                        <option value="Marketing">Marketing</option>
                                                        @else
                                                        @endif
                                                        

                                                        @if (Auth::user()->department != "Operation")
                                                        <option value="Operation">Operation</option>
                                                        @else
                                                        @endif

                                                        @if (Auth::user()->department != "Research & Development (R&D)")
                                                        <option value="Research & Development (R&D)">Research & Development (R&D)</option>
                                                        @else
                                                        @endif

                                                    </select>
                                                </div>



                                                
                                                <div class="mb-3">
                                                    <label class="font-weight-bold" >Email</label>
                                                    <input type="text" class="form-control form-control-sm" name="email" value="{{ Auth::user()->email }}" >
                                                </div>
                                                                                        
                                        </div>

                                        <div class="pl-3">
                                            <button type="submit" class="btn btn-success btn-sm"><i class="fas fa-save"></i> Save</button> 
                                            {{-- <p class="m-2">**Sebarang masalah dan maklumat sila berhubung pada Jabatan R&D.</p>                          --}}
                                        </div>

                                        

                                    </div>
                               </div>

                            </form>


                        </div>
                    </div>
                </div>     
            
            
            </div> 
          <br>
                        
        </div>
    </div>
</body>
{{-- 
@endsection --}}
