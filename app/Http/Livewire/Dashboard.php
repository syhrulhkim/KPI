<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\KPIAll_;

class Dashboard extends Component
{
    public function render()
    {
        $marketingemp = User::where([['department', '=', 'Marketing'] , ['role', '=', 'employee']])->orderBy('created_at','desc')->get();
        $salesemp = User::where([['department', '=', 'Sales'] , ['role', '=', 'employee']])->orderBy('created_at','desc')->get();
        $ceoemp = User::where([['department', '=', 'CEO Office'] , ['role', '=', 'employee']])->orderBy('created_at','desc')->get();
        $rndemp = User::where([['department', '=', 'Research & Development (R&D)'] , ['role', '=', 'employee']])->orderBy('created_at','desc')->get();
        $operationemp = User::where([['department', '=', 'Operation'] , ['role', '=', 'employee']])->orderBy('created_at','desc')->get();
        $hremp = User::where([['department', '=', 'Human Resource (HR) & Administration'] , ['role', '=', 'employee']])->orderBy('created_at','desc')->get();
        $afemp = User::where([['department', '=', 'Account & Finance (A&F)'] , ['role', '=', 'employee']])->orderBy('created_at','desc')->get();
        $userscount = User::where('role', '=', 'employee')->count();
        $marketingempcount = User::where([['department', '=', 'Marketing'] , ['role', '=', 'employee']])->count();
        $salesempcount = User::where([['department', '=', 'Sales'] , ['role', '=', 'employee']])->count();
        $ceoempcount = User::where([['department', '=', 'CEO Office'] , ['role', '=', 'employee']])->count();
        $rndempcount = User::where([['department', '=', 'Research & Development (R&D)'] , ['role', '=', 'employee']])->count();
        $operationempcount = User::where([['department', '=', 'Operation'] , ['role', '=', 'employee']])->count();
        $hrempcount = User::where([['department', '=', 'Human Resource (HR) & Administration'] , ['role', '=', 'employee']])->count();
        $afempcount = User::where([['department', '=', 'Account & Finance (A&F)'] , ['role', '=', 'employee']])->count();

        return view('livewire.dashboard')->with(compact('marketingemp','salesemp','ceoemp','rndemp','operationemp','hremp','afemp','userscount', 'marketingempcount', 'salesempcount', 'ceoempcount', 'rndempcount', 'operationempcount', 'hrempcount', 'afempcount'));
    }
}
