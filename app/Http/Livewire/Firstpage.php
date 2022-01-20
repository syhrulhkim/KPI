<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;

class Firstpage extends Component
{
    public function render()
    {
        $users = User::orderBy('created_at','desc')->get();
        $userscount = $users->count();
        return view('livewire.firstpage')->with(compact('users', 'userscount'));
    }
}
