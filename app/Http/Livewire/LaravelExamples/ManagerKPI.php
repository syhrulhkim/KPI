<?php

namespace App\Http\Livewire\LaravelExamples;

use Livewire\Component;
use App\Models\KPI_;
use App\Models\Kecekapan_;
use App\Models\Nilai_;
use App\Models\User;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Carbon;

class ManagerKPI extends Component
{
    public function render()
    {
        // // $bukti = Bukti::where([[ 'kpi_id', '=', '19' ]])->get();
        // $kpi = KPI_::where('user_id', '=', auth()->user()->id)->orderBy('created_at','desc')->get();
        // $users = User::whereIn('position', ['Junior Non-Executive (NE1)','Senior Non-Executive (NE2)'])->Where('role' , 'employee')->get();
        // $hrs = User::Where('hr' , 'yes')->orWhere('role' , 'admin')->get();

        // $kecekapan = Kecekapan_::where('user_id', '=', auth()->user()->id)->orderBy('created_at','desc')->get();

        // $nilai = Nilai_::where('user_id', '=', auth()->user()->id)->orderBy('created_at','desc')->get();

        // return view('livewire.laravel-examples.manager-kpi', compact('kpi', 'users', 'hrs', 'kecekapan', 'nilai'));

        return view('livewire.laravel-examples.manager-kpi');
    }
}
