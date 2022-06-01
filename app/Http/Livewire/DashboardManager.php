<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\KPIAll_;

class DashboardManager extends Component
{
    public function render()
    {
        $userdepartment = auth()->user()->department;
        $users = User::where([['department', '=', $userdepartment] , ['role', '=', 'employee']])->orderBy('created_at','desc')->get();
        $userscount = $users->count();
        return view('livewire.dashboard.all-manager')->with(compact('users', 'userscount', 'userdepartment'));
    }
}
