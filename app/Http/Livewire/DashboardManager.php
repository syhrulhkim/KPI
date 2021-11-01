<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;

class DashboardManager extends Component
{
    public function render()
    {
        $userdepartment = auth()->user()->department;
        // dd($userdepartment);
        $users = User::where([['department', '=', $userdepartment] , ['role', '=', 'employee']])->orderBy('created_at','desc')->get();
        // $leaderboards = Leaderboard::where([[ 'id_users', '=', auth()->user()->id] ,[ 'id_createquizzes', '=', $this->id_createquizzes ]])->get();
        // $users = User::where('role', 'manager')->orWhere('role', 'hr')->orWhere('role', 'moderaor')->get();
        $userscount = $users->count();

        return view('livewire.dashboard-manager')->with(compact('users', 'userscount', 'userdepartment'));
    }
}
