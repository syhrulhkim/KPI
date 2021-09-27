<?php

namespace App\Http\Livewire\LaravelExamples;
use App\Models\User;

use Livewire\Component;

class UserManagement extends Component
{
    public function render()
    {
        $users = User::orderBy('created_at','desc')->get();
        $userscount = $users->count();

        return view('livewire.laravel-examples.user-management')->with(compact('userscount', 'users'));
    }
}
