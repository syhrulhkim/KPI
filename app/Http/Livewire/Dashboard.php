<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;

class Dashboard extends Component
{
    public function render()
    {
        $marketingemp = User::where([['department', '=', 'Marketing'] , ['role', '=', 'employee']])->orderBy('created_at','desc')->get();
        $salesemp = User::where([['department', '=', 'Sales'] , ['role', '=', 'employee']])->orderBy('created_at','desc')->get();
        $codemp = User::where([['department', '=', 'COD'] , ['role', '=', 'employee']])->orderBy('created_at','desc')->get();
        $rndemp = User::where([['department', '=', 'R&D'] , ['role', '=', 'employee']])->orderBy('created_at','desc')->get();
        $operationemp = User::where([['department', '=', 'Operation'] , ['role', '=', 'employee']])->orderBy('created_at','desc')->get();

        $userscount = User::where('role', '=', 'employee')->count();
        $marketingempcount = User::where([['department', '=', 'Marketing'] , ['role', '=', 'employee']])->count();
        $salesempcount = User::where([['department', '=', 'Sales'] , ['role', '=', 'employee']])->count();
        $codempcount = User::where([['department', '=', 'COD'] , ['role', '=', 'employee']])->count();
        $rndempcount = User::where([['department', '=', 'R&D'] , ['role', '=', 'employee']])->count();
        $operationempcount = User::where([['department', '=', 'Operation'] , ['role', '=', 'employee']])->count();

        return view('livewire.dashboard')->with(compact('marketingemp','salesemp','codemp','rndemp','operationemp','userscount', 'marketingempcount', 'salesempcount', 'codempcount', 'rndempcount', 'operationempcount'));
    }
}
