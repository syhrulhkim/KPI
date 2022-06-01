<?php

namespace App\Http\Livewire\UserManagement;
use App\Models\User;
use App\Models\KPIAll_;

use Livewire\Component;

class ViewProfile extends Component
{
    public User $user;
    public $showSuccesNotification  = false;
    public $showDemoNotification = false;
    protected $rules = [
        'user.name' => 'max:40|min:3',
        'user.email' => 'email:rfc,dns',
        'user.phone' => 'max:10',
        'user.about' => 'max:200',
        'user.location' => 'min:3'
    ];

    public function mount() { 
        $this->user = auth()->user();
    }

    public function save() {
        if(env('IS_DEMO')) {
           $this->showDemoNotification = true;
        } else {
            $this->validate();
            $this->user->save();
            $this->showSuccesNotification = true;
        }
    }
    
    public function render()
    {
        $year = KPIALL_::where('user_id', '=', auth()->user()->id)->orderBy('year','desc')->pluck('year')->first();
        $month = KPIALL_::where('user_id', '=', auth()->user()->id)->orderBy('month','desc')->pluck('month')->first();
        $kpialls = KPIAll_::where('user_id', '=', auth()->user()->id)->where('year', '=', $year)->where('month', '=', $month)->get();
        $kpiall = KPIAll_::where('user_id', '=', auth()->user()->id)->get();
        $userdata = User::where('id', '=', auth()->user()->id)->first();

        return view('livewire.user-management.view-profile', compact('kpiall','kpialls','userdata'));
    }
}
