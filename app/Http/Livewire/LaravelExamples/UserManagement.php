<?php

namespace App\Http\Livewire\LaravelExamples;
use App\Models\User;

use Livewire\Component;

class UserManagement extends Component
{
    public function render()
    {
        // $users = User::orderBy('created_at','desc')->get();
        $users = User::where('role', 'admin')->orWhere('role', 'manager')->orWhere('role', 'admin')->get();
        // dd( $users);
        // $attemptQuizzes = AttemptQuiz::where( [[ 'id_createquizzes', '=', $this->id_createquizzes ], ['id_question', '=', $question->id], ['status_answer', '=', '1']] )->get();
        $userscount = $users->count();

        return view('livewire.laravel-examples.user-management')->with(compact('userscount', 'users'));
    }
}
