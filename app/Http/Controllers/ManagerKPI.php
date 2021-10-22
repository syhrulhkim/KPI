<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\KPI_;
use App\Models\Kecekapan_;
use App\Models\Nilai_;
use App\Models\User;
use Auth;
use Illuminate\Support\Carbon;

class ManagerKPI extends Controller
{
    public function index()
    {
        // $bukti = Bukti::where([[ 'kpi_id', '=', '19' ]])->get();
        $kpi = KPI_::where('user_id', '=', auth()->user()->id)->orderBy('created_at','desc')->get();
        $users = User::whereIn('position', ['Junior Non-Executive (NE1)','Senior Non-Executive (NE2)'])->Where('role' , 'employee')->get();
        $hrs = User::Where('hr' , 'yes')->orWhere('role' , 'admin')->get();

        $kecekapan = Kecekapan_::where('user_id', '=', auth()->user()->id)->orderBy('created_at','desc')->get();

        $nilai = Nilai_::where('user_id', '=', auth()->user()->id)->orderBy('created_at','desc')->get();

        return view('livewire.manager-kpi', compact('kpi', 'users', 'hrs', 'kecekapan', 'nilai'));
    }
}
