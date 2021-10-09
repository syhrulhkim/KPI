<div>
    @livewire('laravel-examples.user-management-admin-form-wire')
    <div>
        {{-- <div class="alert alert-secondary mx-4" role="alert">
            <span class="text-white"><strong>Add, Edit, Delete features are not functional!</strong> This is a
                <strong>PRO</strong> feature!
                Click <strong><a href="https://demos.creative-tim.com/soft-ui-dashboard-laravel-pro/dashboard-default" target="_blank"
                        class="text-white">here</a></strong>
                to see the PRO
                product!</span>
        </div> --}}
    
        <div class="row">
            <div class="col-12">
                <div class="card mb-4 mx-4">
                    <div class="card-header pb-0">
                        <div class="d-flex flex-row justify-content-between">
                            <div>
                                <h5 class="mb-0">All Moderator & HR & Manager</h5>
                            </div>
                            {{-- <a href="#" class="btn bg-gradient-primary btn-sm mb-0" type="button">+&nbsp; New User</a> --}}
                        </div>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            ID
                                        </th>
                                        {{-- <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Photo
                                        </th> --}}
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Name
                                        </th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Email
                                        </th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            role
                                        </th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Creation Date
                                        </th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Action
                                        </th>
                                        {{-- <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Action
                                        </th> --}}
                                    </tr>
                                </thead>
                                @foreach ($users as $key => $user)
                                <tbody>
                                    <tr>
                                        <td class="ps-4">
                                           
                                            {{-- questions.push('Q{{$key + 1}}'); --}}
                                            <p class="text-xs font-weight-bold mb-0">{{$key+1}}</p>
                                           
                                        </td>
                                        <td>
                                            {{-- <div>
                                                <img src="../assets/img/team-2.jpg" class="avatar avatar-sm me-3">
                                            </div> --}}
                                        
                                             <p class="text-xs font-weight-bold mb-0" value="{{$user->id}}">{{$user->name}}</p>
                                      
                                        </td>
                                        <td class="text-center">
                                          
                                            <p class="text-xs font-weight-bold mb-0" value="{{$user->id}}">{{$user->email}}</p>
                                      
                                        </td>
                                        <td class="text-center">
                                          
                                            <p class="text-xs font-weight-bold mb-0" value="{{$user->id}}">{{$user->role}}</p>
                                 
                                        </td>
                                        <td class="text-center">
                                       
                                            <p class="text-xs font-weight-bold mb-0" value="{{$user->id}}">{{$user->created_at}}</p>
                                       
                                        </td>
                                        {{-- <td class="text-center">
                                            <span class="text-secondary text-xs font-weight-bold">16/06/18</span>
                                        </td> --}}
                                        <td class="text-center">
                                     
                                            <table style="border:none">
                                                <tr>
                                                    <td style="border:none">
                                                        <button type="button" wire:click="selectItem({{$user->id}} , 'update' )" class="btn btn-sm waves-effect waves-light btn-warning"> <i class="fas fa-user-edit text-secondary"></i></button>
                                                    </td>
                                                    <td style="border:none">
                                                        <button type="button" wire:click="selectItem({{$user->id}} , 'delete' )" class="btn btn-sm waves-effect waves-light btn-danger data-delete" data-form="{{$user->id}}"><i class="fas fa-trash-alt"></i></button>
                                                    </td>
                                                </tr>
                                            </table>
                                       
                                        </td>
                                    </tr>
                                    {{-- <tr>
                                        <td class="ps-4">
                                            <p class="text-xs font-weight-bold mb-0">2</p>
                                        </td>
                                        <td>
                                            <div>
                                                <img src="/assets/img/team-1.jpg" class="avatar avatar-sm me-3">
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <p class="text-xs font-weight-bold mb-0">Creator</p>
                                        </td>
                                        <td class="text-center">
                                            <p class="text-xs font-weight-bold mb-0">creator@softui.com</p>
                                        </td>
                                        <td class="text-center">
                                            <p class="text-xs font-weight-bold mb-0">Creator</p>
                                        </td>
                                        <td class="text-center">
                                            <span class="text-secondary text-xs font-weight-bold">05/05/20</span>
                                        </td>
                                        <td class="text-center">
                                            <a href="#" class="mx-3" data-bs-toggle="tooltip"
                                                data-bs-original-title="Edit user">
                                                <i class="fas fa-user-edit text-secondary"></i>
                                            </a>
                                            <span>
                                                <i class="cursor-pointer fas fa-trash text-secondary"></i>
                                            </span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="ps-4">
                                            <p class="text-xs font-weight-bold mb-0">3</p>
                                        </td>
                                        <td>
                                            <div>
                                                <img src="/assets/img/team-3.jpg" class="avatar avatar-sm me-3">
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <p class="text-xs font-weight-bold mb-0">Member</p>
                                        </td>
                                        <td class="text-center">
                                            <p class="text-xs font-weight-bold mb-0">member@softui.com</p>
                                        </td>
                                        <td class="text-center">
                                            <p class="text-xs font-weight-bold mb-0">Member</p>
                                        </td>
                                        <td class="text-center">
                                            <span class="text-secondary text-xs font-weight-bold">23/06/20</span>
                                        </td>
                                        <td class="text-center">
                                            <a href="#" class="mx-3" data-bs-toggle="tooltip"
                                                data-bs-original-title="Edit user">
                                                <i class="fas fa-user-edit text-secondary"></i>
                                            </a>
                                            <span>
                                                <i class="cursor-pointer fas fa-trash text-secondary"></i>
                                            </span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="ps-4">
                                            <p class="text-xs font-weight-bold mb-0">4</p>
                                        </td>
                                        <td>
                                            <div>
                                                <img src="/assets/img/team-4.jpg" class="avatar avatar-sm me-3">
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <p class="text-xs font-weight-bold mb-0">Peterson</p>
                                        </td>
                                        <td class="text-center">
                                            <p class="text-xs font-weight-bold mb-0">peterson@softui.com</p>
                                        </td>
                                        <td class="text-center">
                                            <p class="text-xs font-weight-bold mb-0">Member</p>
                                        </td>
                                        <td class="text-center">
                                            <span class="text-secondary text-xs font-weight-bold">26/10/17</span>
                                        </td>
                                        <td class="text-center">
                                            <a href="#" class="mx-3" data-bs-toggle="tooltip"
                                                data-bs-original-title="Edit user">
                                                <i class="fas fa-user-edit text-secondary"></i>
                                            </a>
                                            <span>
                                                <i class="cursor-pointer fas fa-trash text-secondary"></i>
                                            </span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="ps-4">
                                            <p class="text-xs font-weight-bold mb-0">5</p>
                                        </td>
                                        <td>
                                            <div>
                                                <img src="/assets/img/marie.jpg" class="avatar avatar-sm me-3">
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <p class="text-xs font-weight-bold mb-0">Marie</p>
                                        </td>
                                        <td class="text-center">
                                            <p class="text-xs font-weight-bold mb-0">marie@softui.com</p>
                                        </td>
                                        <td class="text-center">
                                            <p class="text-xs font-weight-bold mb-0">Creator</p>
                                        </td>
                                        <td class="text-center">
                                            <span class="text-secondary text-xs font-weight-bold">23/01/21</span>
                                        </td>
                                        <td class="text-center">
                                            <a href="#" class="mx-3" data-bs-toggle="tooltip"
                                                data-bs-original-title="Edit user">
                                                <i class="fas fa-user-edit text-secondary"></i>
                                            </a>
                                            <span>
                                                <i class="cursor-pointer fas fa-trash text-secondary"></i>
                                            </span>
                                        </td>
                                    </tr> --}}
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card mb-4 mx-4">
                    <div class="card-header pb-0">
                        <div class="d-flex flex-row justify-content-between">
                            <div>
                                <h5 class="mb-0">All Employee</h5>
                            </div>
                        </div>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            ID
                                        </th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Name
                                        </th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Email
                                        </th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            role
                                        </th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Creation Date
                                        </th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Action
                                        </th>
                                    </tr>
                                </thead>
                                @foreach ($employees as $key => $employee)
                                <tbody>
                                    <tr>
                                        <td class="ps-4">
                                        
                                            <p class="text-xs font-weight-bold mb-0">{{$key+1}}</p>
                                           
                                        </td>
                                        <td>

                                         <p class="text-xs font-weight-bold mb-0" value="{{$employee->id}}">{{$employee->name}}</p>
                                      
                                        </td>
                                        <td class="text-center">
                                          
                                            <p class="text-xs font-weight-bold mb-0" value="{{$employee->id}}">{{$employee->email}}</p>
                                      
                                        </td>
                                        <td class="text-center">
                                          
                                            <p class="text-xs font-weight-bold mb-0" value="{{$employee->id}}">{{$employee->role}}</p>
                                 
                                        </td>
                                        <td class="text-center">
                                       
                                            <p class="text-xs font-weight-bold mb-0" value="{{$employee->id}}">{{$employee->created_at}}</p>
                                       
                                        </td>

                                        <td class="text-center">
                                     
                                            <table style="border:none">
                                                <tr>
                                                    <td style="border:none">
                                                        <button type="button" wire:click="selectItem({{$employee->id}} , 'update' )" class="btn btn-sm waves-effect waves-light btn-warning"> <i class="fas fa-user-edit text-secondary"></i></button>
                                                    </td>
                                                    <td style="border:none">
                                                        <button type="button" wire:click="selectItem({{$employee->id}} , 'delete' )" class="btn btn-sm waves-effect waves-light btn-danger data-delete" data-form="{{$employee->id}}"><i class="fas fa-trash-alt"></i></button>
                                                        {{-- {{dd($employee->id)}}; --}}
                                                    </td>
                                                    
                                                </tr>
                                            </table>
                                       
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
    @push('scripts')
    
    {{-- START SECTION - SCRIPT FOR DELETE BUTTON  --}}
    <script>
        // console.log('john');
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
    {{-- END SECTION - SCRIPT FOR DELETE BUTTON  --}}
    
    @endpush
    </div>