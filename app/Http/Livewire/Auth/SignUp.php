<?php

namespace App\Http\Livewire\Auth;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class SignUp extends Component
{
    public $name = '';
    public $email = '';
    public $nostaff = '';
    public $position = '';
    public $department = '';
    public $unit = '';
    // public $grade = '';
    public $hr = '';
    public $role = '';
    public $password = '';

    protected $rules = [
        'name' => 'required|min:3',
        'email' => 'required|email:rfc,dns|unique:users',
        'password' => 'required|min:6',
        'nostaff' => 'required|min:3',
        'position' => 'required|min:3',
        'department' => 'required|min:3',
        'unit' => 'required|min:3'
    ];

    public function mount() {
        if(auth()->user()){
            redirect('/firstpage');
        }
    }

    public function register() {
        $this->validate();
        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'nostaff' => $this->nostaff,
            'position' => $this->position,
            'department' => $this->department,
            'unit' => $this->unit,
            // 'hr' => $this->hr,
            // 'grade' => $this->grade,
            'role' => 'employee',
            'status' => 'Not Submitted',
            'password' => Hash::make($this->password)
        ]);

        auth()->login($user);

        return redirect('/firstpage');
    }

    public function render()
    {
        return view('livewire.auth.sign-up');
    }
}
