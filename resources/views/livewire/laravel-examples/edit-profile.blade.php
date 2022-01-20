{{-- @extends('staff/layout/employee_template')
@section('title','Staff | Profile')
@section('content') --}}



<body>

<div class="container-fluid py-4">
    <div class="row">
        <form action="{{ url('employee/profile/update/'.Auth::user()->id) }}" method="post">   
        @csrf 
        <div class="col-12">
            @if (session('message'))
            <div class="alert alert-success alert-dismissible">
                <strong>{{ session('message') }}</strong>
            </div>	
            @endif 
            <div class="col-md-12 mb-lg-0 mb-4">
                <div class="card mt-4">
                  <div class="card-header pb-0 p-3">
                    <div class="row">
                      <div class="col-6 d-flex align-items-center">
                        <h6 class="mb-0">Profile Information</h6>
                      </div>
                    </div>
                  </div>
                  <div class="card-body p-3">
                    <div class="row">
                      <div class="col-md-6 mb-md-0">
                        <p>Name</p>  
                        <div class="card card-plain border-radius-lg align-items-center">
                            <input class="form-control form-control-lg" type="text" name="name" value="{{ Auth::user()->name }}">
                        </div>
                      </div>
                      <div class="col-md-6 mb-md-0">
                        <div class="row">
                          <p>ID No</p> 
                          <div class="card card-plain border-radius-lg align-items-center">
                            <input class="form-control form-control-lg" type="text" name="nostaff" value="{{ Auth::user()->nostaff }}">
                          </div>
                        </div>  
                      </div>
                    </div>
                  </div>
                  <div class="card-body p-3">
                    <div class="row">
                      <div class="col-md-6 mb-md-0">
                        <p>Position</p>  
                        <div class="card card-plain border-radius-lg align-items-center">
                            <input class="form-control form-control-lg" type="text" name="position" value="{{ Auth::user()->position }}">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="row">
                          <p>Department</p> 
                          <div class="card card-plain border-radius-lg align-items-center">
                            <select class="form-select form-select-lg" id="department" name="department">
                                <option selected class="bg-secondary text-white" value="{{ Auth::user()->department }}" >{{ Auth::user()->department }}</option>
                                    
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
                        </div>  
                      </div>
                    </div>
                  </div>
                  <div class="card-body p-3">
                    <div class="row">
                      <div class="col-md-6 mb-md-0">
                        <p>Unit Staff</p>  
                        <div class="card card-plain border-radius-lg align-items-center">
                            <input class="form-control form-control-lg" type="text" name="unit" value="{{ Auth::user()->unit }}">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="row">
                          <p>Email</p> 
                          <div class="card card-plain border-radius-lg align-items-center">
                            <input class="form-control form-control-lg" type="text" name="email" value="{{ Auth::user()->email }}">
                          </div>
                        </div>  
                      </div>
                    </div>
                  </div>
                  <div class="col-12 text-end mb-2 p-3">
                    <button class="btn bg-gradient-dark mb-0" type="submit" href="javascript:;"><i class="fas fa-plus"></i>&nbsp;&nbsp;Save</button>
                  </div>
                </div>
              </div>
        </div>
        </form>  
    </div>
</div>
</body>