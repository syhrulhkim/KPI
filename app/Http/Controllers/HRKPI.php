<?php

namespace App\Http\Controllers;

use App\Models\KPI_;
use App\Models\KPIAll_;
use App\Models\Kecekapan_;
use App\Models\KPIMaster_;
use App\Models\Nilai_;
use App\Models\User;

class HRKPI extends Controller
{

    public function index($id)
    {
        $kpi = KPI_::where('user_id', '=', $id)->orderBy('created_at','desc')->get();
        $userNE = User::whereIn('position', ['Junior Non-Executive (NE1)','Senior Non-Executive (NE2)'])->Where('role' , 'employee')->get();
        $user = User::where('id', '=', $id)->get();
        // $id = $id;
        $hrs = User::Where('hr' , 'yes')->orWhere('role' , 'admin')->get();
        $kecekapan = Kecekapan_::where('user_id', '=', $id)->orderBy('created_at','desc')->get();
        $nilai = Nilai_::where('user_id', '=', $id)->orderBy('created_at','desc')->get();
        $kpimaster = KPIMaster_::where('user_id', '=', $id)->orderBy('created_at','desc')->get();

        $kadskor = KPI_::where('user_id', '=', $id)->where('fungsi', '=', 'Kad Skor Korporat')->orderBy('bukti','asc')->get();
        $kewangan = KPI_::where('user_id', '=', $id)->where('fungsi', '=', 'Kewangan')->orderBy('bukti','asc')->get();
        $pelangganI = KPI_::where('user_id', '=', $id)->where('fungsi', '=', 'Pelanggan (Internal)')->orderBy('bukti','asc')->get();
        $pelangganII = KPI_::where('user_id', '=', $id)->where('fungsi', '=', 'Pelanggan (Outer)')->orderBy('bukti','asc')->get();
        $kecemerlangan = KPI_::where('user_id', '=', $id)->where('fungsi', '=', 'Kecemerlangan Operasi')->orderBy('bukti','asc')->get();
        $training = KPI_::where('user_id', '=', $id)->where('fungsi', '=', 'Manusia & Proses (Training)')->orderBy('bukti','asc')->get();
        $ncr = KPI_::where('user_id', '=', $id)->where('fungsi', '=', 'Manusia & Proses (NCROFI)')->orderBy('bukti','asc')->get();
        $kolaborasi = KPI_::where('user_id', '=', $id)->where('fungsi', '=', 'Kolaborasi')->orderBy('bukti','asc')->get();

        $kadskorcount = $kadskor->count();
        $kewangancount = $kewangan->count();
        $pelangganIcount = $pelangganI->count();
        $pelangganIIcount = $pelangganII->count();
        $kecemerlangancount = $kecemerlangan->count();
        $trainingcount = $training->count();
        $ncrcount = $ncr->count();
        $kolaborasicount = $kolaborasi->count();

        $kpiall = KPIAll_::where('user_id', '=', $id)->get();
        $weightage_master = KpiAll_::where('user_id', '=', $id)->value('weightage_master');
        
        return view('livewire.hr-kpi', compact('kpi', 'userNE', 'hrs', 'kecekapan', 'nilai', 'user' , 'id', 'kpimaster', 'kadskor', 'kewangan',
        'pelangganI', 'pelangganII', 'kecemerlangan', 'training', 'ncr', 'kolaborasi', 'kadskorcount', 'kewangancount', 'pelangganIcount',
        'pelangganIIcount', 'kecemerlangancount', 'trainingcount', 'ncrcount', 'kolaborasicount', 'kpiall', 'weightage_master'));
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
        'status'=> 'Signed By Manager',
        ]);
        return redirect()->back()->with('message', 'You have undo the completed kpi!');
    }
}
