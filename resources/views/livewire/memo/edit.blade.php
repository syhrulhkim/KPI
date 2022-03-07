@section('content')
  @extends('layouts.app')
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
                                        <div class="col-6 d-flex align-items-center"><h6>MEMO</h6></div>
                                    </div>
                                </div>
                                <form action="{{ url('/hr/update/memo/'.$id) }}" method="post" enctype="multipart/form-data">
                                @csrf  
                                @foreach ($memo as $memos)
                                <div class="card-body p-3">
                                  <div class="row">
                                    <label class="font-weight-bold">Title</label>
                                    <div class="card card-plain border-radius-lg align-items-center">
                                        <input class="form-control form-control-lg" type="text" name="title" value="{{ $memos->title }}" required>
                                    </div>
                                    <div class="col-md-4 mt-2" id="memoupload">
                                        <div class="form-group">
                                            <label class="font-weight-bold">Memo Upload</label>
                                            <div
                                                x-data="{ isUploading: false, progress: 0 }"
                                                x-on:livewire-upload-start="isUploading = true"
                                                x-on:livewire-upload-finish="isUploading = false"
                                                x-on:livewire-upload-error="isUploading = false"
                                                x-on:livewire-upload-progress="progress = $event.detail.progress">
                                            <div wire:loading wire:target="memo_path"><i class="mdi mdi-loading mdi-spin mdi-24px"></i></div>
                                                <input type="file" wire:model="memo_path" id="memo_path" name="memo_path" class="dropify" value="{{ $memos->memo_path }}"/>
                                                @error('memo_path') <span class="error" style="color:red"><b>{{ $message }}</b></span> @enderror
                                                <div x-show="isUploading">
                                                    <progress max="100" x-bind:value="progress"></progress>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="font-weight-bold" >Description</label>
                                        <textarea class="form-control card card-body border card-plain border-radius-lg d-flex align-items-center flex-row" name="description" id="description" cols="60" rows="10" placeholder="Type your description here..." required>{{ $memos->description }}</textarea>
                                    </div>
                                    <div class="mt-2" style="text-align: right">
                                        <div class="col-12 text-end">
                                          <button class="btn bg-gradient-dark mb-0" type="submit" href="javascript:;"><i class="fas fa-plus"></i>&nbsp;&nbsp;SAVE</button>
                                        </div>
                                    </div>
                                  </div>
                                </div>
                                @endforeach
                              </form>     
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
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
    @endsection

    
    
    