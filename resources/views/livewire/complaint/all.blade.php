<div>
    <div>
        <style>
            .solid {border-style: solid;}
            input[type=file]::file-selector-button {
            border: 2px solid #ffffff;
            padding: .2em .4em;
            border-radius: .7em;
            background-color: #252f40;
            border-color: #252f40;
            color: white;
            transition: 1s;
            }
      
            input[type=file]::file-selector-button:hover {
            background-color: #000000;
            border: 2px solid #000000;
            }
        </style>  
        <body>
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-md-12 mb-lg-0 mb-4">
                            @if (session('message'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert"><strong>{{ session('message') }}</strong></div>	
                            @endif
                            @if (session('fail'))
                                <div class="alert alert-warning alert-dismissible fade show" role="alert"><strong>{{ session('fail') }}</strong></div>
                            @endif
                            <div class="card mt-4">
                                <div class="card-header pb-0 p-3">
                                    <div class="row">
                                        <div class="col-6 d-flex align-items-center"><h6>Aduan Kerosakan</h6></div>
                                    </div>
                                </div>
                                <form action="{{ url('/pro/create/complaint') }}" method="post" enctype="multipart/form-data">
                                @csrf  
                                <div class="card-body p-3">
                                  <div class="row">
                                    <div class="row">
                                      <div class="col-md-6 mb-md-0">
                                        <div class="row">
                                          <label class="font-weight-bold">Lokasi Kerosakan</label>
                                          <div class="card card-plain border-radius-lg align-items-center">
                                            <select class="form-select form-select-lg" id="location" name="location">
                                                <option value="Kluang">Kluang</option>
                                                <option value="Johor Bahru">Johor Bahru</option>
                                                <option value="Shah Alam">Shah Alam</option>
                                            </select>
                                          </div>
                                        </div>  
                                      </div>
                                      <div class="col-md-6">
                                        <div class="row">
                                          <label class="font-weight-bold">Sila nyatakan aras bangunan pejabat</label>
                                          <div class="card card-plain border-radius-lg align-items-center">
                                              <input class="form-control form-control-lg" type="text" name="level" value="" required>
                                          </div>
                                        </div>  
                                      </div>

                                      <div class="col-md-6 mb-md-0">
                                        <label class="font-weight-bold">Sekiranya di Kluang, sila pilih bangunan pejabat (Optional)</label>
                                        <br>
                                          <input type="checkbox" id="office" name="office[]" value="Pejabat 1"><label for="office">Bangunan Pejabat 1</label><br>
                                          <input type="checkbox" id="office" name="office[]" value="Pejabat 2"><label for="office">Bangunan Pejabat 2</label><br>
                                          <input type="checkbox" id="office" name="office[]" value="Pejabat 3"><label for="office">Bangunan Pejabat 3</label><br>
                                      </div>
                                      <div class="col-md-6 mb-md-0">
                                        <label class="font-weight-bold">Kategori Aduan Kerosakan</label>
                                        <br>
                                          <input type="checkbox" id="category" name="category[]" value="Kebocoran Tangki / Saluran Tersumbat"><label for="category">Kebocoran Tangki / Saluran Tersumbat</label><br>
                                          <input type="checkbox" id="category" name="category[]" value="Paip rosak"><label for="category">Paip rosak</label><br>
                                          <input type="checkbox" id="category" name="category[]" value="Penghawa Dingin"><label for="category">Penghawa Dingin</label><br>
                                          <input type="checkbox" id="category" name="category[]" value="Gangguan elektrik"><label for="category">Gangguan elektrik</label><br>
                                          <input type="checkbox" id="category" name="category[]" value="Telefon / talian terputus"><label for="category">Telefon / talian terputus</label><br>
                                          <input type="checkbox" id="category" name="category[]" value="Kerosakan pintu , tangga, ceiling"><label for="category">Kerosakan pintu , tangga, ceiling</label><br>
                                          <input type="checkbox" id="category" name="category[]" value="Lain-lain kerosakan"><label for="category">Lain-lain kerosakan</label><br>
                                      </div>
                                      <div class="col-md-6">
                                        <label class="font-weight-bold" >Description</label>
                                        <textarea class="form-control card card-body border card-plain border-radius-lg d-flex align-items-center flex-row" name="description" id="description" cols="60" rows="10" placeholder="Type your description here..."></textarea>
                                      </div>
                                    </div>

                                    </div>
                                    <div class="mt-2" style="text-align: right">
                                        <div class="col-12 text-end">
                                          <button class="btn bg-gradient-dark mb-0" type="submit" href="javascript:;"><i class="fas fa-plus"></i>&nbsp;&nbsp;SAVE</button>
                                        </div>
                                    </div>
                                  </div>
                                </div>
                              </form>     
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
        @if (auth()->user()->role == 'admin'|| auth()->user()->role == 'pro')
        <div class="container-fluid py-4">
            <div class="row">
              <div class="col-md-12">
                <div class="card ">
                  <div class="card-header pb-0">
                    <h6>All Complaint</h6>
                  </div>
                  <div class="card-body px-0 pt-0 pb-2">
                    <div class="p-0">
                      <table class="table align-items-center mb-0">
                        <thead>
                          <tr>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Name</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Position</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Department</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Date</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Location</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Level</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Office (Kluang)</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Category</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Description</th>
                            @if (auth()->user()->role == 'admin' || auth()->user()->role == 'pro')
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"></th>
                            @endif
                          </tr>
                        </thead>
                        <tbody>
                          @php($i = 1)
                          @foreach ($complaint as $key => $complaints)
                            <tr>
                              <td>    
                                <div class="d-flex px-2 py-1">
                                  <div class="d-flex flex-column justify-content-center">
                                    <p class="mb-0 text-sm" value="{{$key + 1}}">{{$key + 1}}</p>
                                  </div>
                                </div>
                              </td>
                              <td>
                                <p class="text-xs font-weight-bold mb-0" value="{{ $complaints->user->name }}">{{ $complaints->user->name }}</p>
                              </td>
                              <td>
                                <p class="text-xs font-weight-bold mb-0" value="{{ $complaints->user->position }}">{{ $complaints->user->position }}</p>
                              </td>
                              <td>
                                <p class="text-xs font-weight-bold mb-0" value="{{ $complaints->user->department }}">{{ $complaints->user->department }}</p>
                              </td>
                              <td>
                                <p class="text-xs font-weight-bold mb-0" value="{{date('j F Y', strtotime($complaints->updated_at))}}">{{date('j F Y', strtotime($complaints->updated_at))}}</p>
                              </td>
                              <td>
                                <p class="text-xs font-weight-bold mb-0" value="{{ $complaints->location }}">{{ $complaints->location }}</p>
                              </td>
                              <td>
                                <p class="text-xs font-weight-bold mb-0" value="{{ $complaints->level }}">{{  $complaints->level }}</p>
                              </td>
                              <td>
                                <?php $offices = json_decode($complaints->office); ?>
                                <ul>
                                @foreach ($offices as $officess)
                                  <li><p class="text-xs font-weight-bold mb-0" value="{{ $officess }}">{{ $officess }}</p></li>
                                @endforeach
                                </ul>
                              </td>
                              <td>
                                <?php $categorys = json_decode($complaints->category); ?>
                                <ul>
                                @foreach ($categorys as $categoryss)
                                  <li><p class="text-xs font-weight-bold mb-0" value="{{ $categoryss }}">{{ $categoryss }}</p></li>
                                @endforeach
                                </ul>
                              </td>
                              <td>
                                <pre class="text-xs font-weight-bold mb-0" value="{{ $complaints->description }}">{{  $complaints->description }}</pre>
                              </td>
                              <td class="align-middle">
                                <div class="col-lg-6 col-5 my-auto text-middle">
                                  <div class="dropdown float-lg-start pe-4">
                                    <a class="cursor-pointer" id="dropdownTable" data-bs-toggle="dropdown" aria-expanded="false">
                                      <i class="fa fa-ellipsis-v text-secondary"></i>
                                    </a>
                                    <ul class="dropdown-menu px-2 py-3 ms-n4 ms-n5" aria-labelledby="dropdownTable">
                                      <li><button type="button" wire:click="selectItem({{$complaints->id}})" class="dropdown-item border-radius-md data-delete" style="color: red;" data-form="{{$complaints->id}}">Delete</button></li>
                                    </ul>
                                  </div>
                                </div>
                              </td>
                            </tr>
                          @endforeach
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div> 
          @endif
    
          @push('scripts')
          <script>
            document.addEventListener('livewire:load', function () {
              $(document).on("click", ".data-delete", function (e) 
                  {
                      e.preventDefault();
                      swal({
                      title: "Are you sure?",
                      text: "Once deleted, you will not be able to recover!",
                      icon: "warning",
                      buttons: true,
                      dangerMode: true,
                      })
                      .then((willDelete) => {
                      if (willDelete) {
                          e.preventDefault();
                          Livewire.emit('delete')
                      } 
                      });
                  });
            })
          </script>
          @endpush
    
        </body>
    </div>
    </div>
    
    
    