<?php

namespace App\Http\Controllers;

use App\Models\KPI_;
use App\Models\Kecekapan_;
use App\Models\Nilai_;
use App\Models\User;

class HRKPI extends Controller
{

    public function index($id)
    {
        $kpi = KPI_::where('user_id', '=', $id)->orderBy('created_at','desc')->get();
        $userNE = User::whereIn('position', ['Junior Non-Executive (NE1)','Senior Non-Executive (NE2)'])->Where('role' , 'employee')->get();
        $user = User::where('id', '=', $id)->get();
        $id = $id;
        $hrs = User::Where('hr' , 'yes')->orWhere('role' , 'admin')->get();
        $kecekapan = Kecekapan_::where('user_id', '=', $id)->orderBy('created_at','desc')->get();
        $nilai = Nilai_::where('user_id', '=', $id)->orderBy('created_at','desc')->get();
        return view('livewire.hr-kpi', compact('kpi', 'userNE', 'hrs', 'kecekapan', 'nilai', 'user' , 'id'));
    }
    
    public function changeup($id)
    {
    $update = User::find($id)->update([
        'status'=> 'Completed',
        ]);

        return redirect()->back()->with('message', 'The kpi has been completed!');
    }

    public function changedown($id)
    {
    $update = User::find($id)->update([
        'status'=> 'Appraised By Manager',
        ]);
        return redirect()->back()->with('fail', 'You have undo the completed kpi!');
    }
}
