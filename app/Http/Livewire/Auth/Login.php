<?php

namespace App\Http\Livewire\Auth;

use Livewire\Component;
use App\Models\User;

class Login extends Component
{
    public $ic = '';
    public $password = '';
    public $remember_me = false;

    protected $rules = [
        'ic' => 'required|min:12',
        'password' => 'required',
    ];

    public function mount() {
        if(auth()->user()){
            redirect('/homepage');
        }
        $this->fill(['ic' => '', 'password' => '']);
    }

    public function login() {
        $credentials = $this->validate();
        if(auth()->attempt(['ic' => $this->ic, 'password' => $this->password], $this->remember_me)) {
            $user = User::where(["ic" => $this->ic])->first();
            auth()->login($user, $this->remember_me);
            return redirect()->intended('/homepage'); 
        }
        else{
            return $this->addError('ic', trans('auth.failed'));
        }
    }

    public function render()
    {
        return view('livewire.auth.login');
    }
}
