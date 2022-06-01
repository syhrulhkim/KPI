<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\KPIAll_;

class DashboardHR extends Component
{
    public function render()
    {
        $marketingemp = User::where([['department', '=', 'Marketing'] , ['role', '!=', 'admin']])->orWhere([['department', '=', 'Marketing'] , ['role', '!=', 'moderator']])->orderBy('created_at','desc')->get();
        $salesemp = User::where([['department', '=', 'Sales'] , ['role', '!=', 'admin']])->orWhere([['department', '=', 'Sales'] , ['role', '!=', 'moderator']])->orderBy('created_at','desc')->get();
        $ceoemp = User::where([['department', '=', 'CEO Office'] , ['role', '!=', 'admin']])->orWhere([['department', '=', 'CEO Office'] , ['role', '!=', 'moderator']])->orderBy('created_at','desc')->get();
        $rndemp = User::where([['department', '=', 'Research & Development (R&D)'] , ['role', '!=', 'admin']])->orWhere([['department', '=', 'Research & Development (R&D)'] , ['role', '!=', 'moderator']])->orderBy('created_at','desc')->get();
        $hncemp = User::where([['department', '=', 'High Network Client (HNC)'] , ['role', '!=', 'admin']])->orWhere([['department', '=', 'High Network Client (HNC)'] , ['role', '!=', 'moderator']])->orderBy('created_at','desc')->get();
        $operationemp = User::where([['department', '=', 'Operation'] , ['role', '!=', 'admin']])->orWhere([['department', '=', 'Operation'] , ['role', '!=', 'moderator']])->orderBy('created_at','desc')->get();
        $hremp = User::where([['department', '=', 'Human Resource (HR) & Administration'] , ['role', '!=', 'admin']])->orWhere([['department', '=', 'Human Resource (HR) & Administration'] , ['role', '!=', 'moderator']])->orderBy('created_at','desc')->get();
        $afemp = User::where([['department', '=', 'Account & Finance (A&F)'] , ['role', '!=', 'admin']])->orWhere([['department', '=', 'Account & Finance (A&F)'] , ['role', '!=', 'moderator']])->orderBy('created_at','desc')->get();

        $userscount = User::where('role', '!=', 'admin')->orWhere('role', '!=', 'moderator')->count();
        $marketingempcount = $marketingemp->count();
        $salesempcount = $salesemp->count();
        $ceoempcount = $ceoemp->count();
        $rndempcount = $rndemp->count();
        $hncempcount = $hncemp->count();
        $operationempcount = $operationemp->count();
        $hrempcount = $hremp->count();
        $afempcount = $afemp->count();

        return view('livewire.dashboard.all-hr')->with(compact('marketingemp','salesemp','ceoemp','rndemp','operationemp','hremp','afemp','userscount', 'marketingempcount', 'salesempcount', 'ceoempcount', 'rndempcount', 'operationempcount', 'hrempcount', 'afempcount', 'hncemp', 'hncempcount'));
    }
}
