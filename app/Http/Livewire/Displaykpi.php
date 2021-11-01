<?php

namespace App\Http\Livewire;
// namespace App\Models\KPI_;

use App\Models\Displaykpi_;
use App\Models\KPI_;
use App\Models\Kecekapan_;
use App\Models\Nilai_;
use App\Models\User;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Carbon;
use Livewire\Component;

class Displaykpi extends Component
{
    public function changeup($id)
    {
        // dd('john');
    $update = User::find($id)->update([
        'status'=> 'Submitted',
        ]);

        return redirect()->back()->with('message', 'The kpi has been submitted kpi!');
    }

    public function changedown($id)
    {
        // dd('johndown');
    $update = User::find($id)->update([
        'status'=> 'Not Submitted',
        ]);
        return redirect()->back()->with('fail', 'You have undo the submitted kpi!');
    }
    
        public function render()
    {
        $displaykpi = Displaykpi_::latest()->get();

        // 'user_id'=> Auth::user()->id,
        // 'created_at'=> Carbon::now(),
        // 'updated_at'=> Carbon::now(),

        // 'grade'=> $request->grade,
        // 'weightage'=> $request->weightage,

        // 'total_score'=> $request->total_score,
        // 'tahun'=> $request->tahun,
        // 'bulan'=> $request->bulan,

        // 'fungsi'=> $request->fungsi,
        // 'objektif'=> $request->objektif,
        
        // 'bukti'=> $request->bukti,
        // 'ukuran'=> $request->ukuran,

        // 'peratus'=> $request->peratus,
        // 'threshold'=> $request->threshold,

        // 'base'=> $request->base,
        // 'stretch'=> $request->stretch,
 
        // 'pencapaian'=> $request->pencapaian,
        // 'skor_KPI'=> $request->skor_KPI,
        // 'skor_sebenar'=> $request->skor_sebenar,

        $kpi = KPI_::where('user_id', '=', auth()->user()->id)->where('fungsi', '=', 'Kad Skor Korporat')->orderBy('created_at','desc')->get();
        $kpi2 = KPI_::where('user_id', '=', auth()->user()->id)->where('fungsi', '=', 'Kewangan')->orderBy('created_at','desc')->get();
        $kpi3 = KPI_::where('user_id', '=', auth()->user()->id)->where('fungsi', '=', 'Pelanggan (Internal)')->orderBy('created_at','desc')->get();
        $kpi4 = KPI_::where('user_id', '=', auth()->user()->id)->where('fungsi', '=', 'Pelanggan (Outer)')->orderBy('created_at','desc')->get();
        $kpi5 = KPI_::where('user_id', '=', auth()->user()->id)->where('fungsi', '=', 'Kecemerlangan Operasi')->orderBy('created_at','desc')->get();
        $kpi6 = KPI_::where('user_id', '=', auth()->user()->id)->where('fungsi', '=', 'Manusia & Proses (Training)')->orderBy('created_at','desc')->get();
        $kpi7 = KPI_::where('user_id', '=', auth()->user()->id)->where('fungsi', '=', 'Manusia & Proses (NCR/OFI)')->orderBy('created_at','desc')->get();
        $kpi8 = KPI_::where('user_id', '=', auth()->user()->id)->where('fungsi', '=', 'Kolaborasi')->orderBy('created_at','desc')->get();
        // $kpifungsi = KPI_::where('user_id', '=', auth()->user()->id)->where('fungsi', '=', 'Kad Skor Korporat')->orderBy('created_at','desc')->get();
        $users = User::whereIn('position', ['Junior Non-Executive (NE1)','Senior Non-Executive (NE2)'])->Where('role' , 'employee')->get();
        $hrs = User::Where('hr' , 'yes')->orWhere('role' , 'admin')->get();
        $user = User::where('id', '=', auth()->user()->id)->get();
        $kecekapan = Kecekapan_::where('user_id', '=', auth()->user()->id)->orderBy('created_at','desc')->get();

        $nilai = Nilai_::where('user_id', '=', auth()->user()->id)->orderBy('created_at','desc')->get();

        return view('livewire.display-kpi', compact('kpi', 'users', 'hrs', 'kecekapan', 'nilai', 'displaykpi', 'user', 'kpi2', 'kpi3', 'kpi4', 'kpi5', 'kpi6', 'kpi7', 'kpi8'));


        // return view('livewire.display-kpi', compact('displaykpi'));
    }
}