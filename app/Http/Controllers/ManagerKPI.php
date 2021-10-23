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
    public function index($id)
    {
        // $alluser = User::all();
        // $employee = $alluser->id->$id;
        // $bukti = Bukti::where([[ 'kpi_id', '=', '19' ]])->get();
        // $userdepartment = auth()->user()->department;
        // dd($userdepartment);
        // $users = User::where([['department', '=', $userdepartment] , ['role', '=', 'employee']])->orderBy('created_at','desc')->get();
        $kpi = KPI_::where('user_id', '=', $id)->orderBy('created_at','desc')->get();
        // dd($kpi);
        $users = User::whereIn('position', ['Junior Non-Executive (NE1)','Senior Non-Executive (NE2)'])->Where('role' , 'employee')->get();
        // dd($users);
        $hrs = User::Where('hr' , 'yes')->orWhere('role' , 'admin')->get();
        // dd($hrs);
        $kecekapan = Kecekapan_::where('user_id', '=', $id)->orderBy('created_at','desc')->get();
        // dd($kecekapan);
        $nilai = Nilai_::where('user_id', '=', $id)->orderBy('created_at','desc')->get();
        // dd($nilai);
        return view('livewire.manager-kpi', compact('kpi', 'users', 'hrs', 'kecekapan', 'nilai'));
    }
}
