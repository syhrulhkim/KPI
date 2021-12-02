<?php

namespace App\Http\Livewire;
// namespace App\Models\KPI_;

use App\Models\Displaykpi_;
use App\Models\KPI_;
use App\Models\KPIAll_;
use App\Models\KPIMaster_;
use App\Models\Kecekapan_;
use App\Models\Nilai_;
use App\Models\User;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Carbon;
use Livewire\Component;
use App\Models\Date_;

class Displaykpi extends Component
{
    public function changeup($date_id)
    {
        // dd('john');
    Date_::find($date_id)->update([
        'status'=> 'Submitted',
        ]);

        return redirect()->back()->with('message', 'The kpi has been submitted kpi!');
    }

    public function changedown($date_id)
    {
        // dd('johndown');
    Date_::find($date_id)->update([
        'status'=> 'Not Submitted',
        ]);
        return redirect()->back()->with('message', 'You have undo the submitted kpi!');
    }

    public function view_all($id, $user_id, $year, $month) 
    {
        $kadskor = KPI_::where('user_id', '=', auth()->user()->id)->where('fungsi', '=', 'Kad Skor Korporat')->where('year', '=', $year)->where('month', '=', $month)->orderBy('bukti','asc')->get();
        $kewangan = KPI_::where('user_id', '=', auth()->user()->id)->where('fungsi', '=', 'Kewangan')->where('year', '=', $year)->where('month', '=', $month)->orderBy('bukti','asc')->get();
        $pelangganI = KPI_::where('user_id', '=', auth()->user()->id)->where('fungsi', '=', 'Pelanggan (Internal)')->where('year', '=', $year)->where('month', '=', $month)->orderBy('bukti','asc')->get();
        $pelangganII = KPI_::where('user_id', '=', auth()->user()->id)->where('fungsi', '=', 'Pelanggan (Outer)')->where('year', '=', $year)->where('month', '=', $month)->orderBy('bukti','asc')->get();
        $kecemerlangan = KPI_::where('user_id', '=', auth()->user()->id)->where('fungsi', '=', 'Kecemerlangan Operasi')->where('year', '=', $year)->where('month', '=', $month)->orderBy('bukti','asc')->get();
        $training = KPI_::where('user_id', '=', auth()->user()->id)->where('fungsi', '=', 'Manusia & Proses (Training)')->where('year', '=', $year)->where('month', '=', $month)->orderBy('bukti','asc')->get();
        $ncr = KPI_::where('user_id', '=', auth()->user()->id)->where('fungsi', '=', 'Manusia & Proses (NCROFI)')->where('year', '=', $year)->where('month', '=', $month)->orderBy('bukti','asc')->get();
        $kolaborasi = KPI_::where('user_id', '=', auth()->user()->id)->where('fungsi', '=', 'Kolaborasi')->where('year', '=', $year)->where('month', '=', $month)->orderBy('bukti','asc')->get();

        $kadskorcount = $kadskor->count();
        $kewangancount = $kewangan->count();
        $pelangganIcount = $pelangganI->count();
        $pelangganIIcount = $pelangganII->count();
        $kecemerlangancount = $kecemerlangan->count();
        $trainingcount = $training->count();
        $ncrcount = $ncr->count();
        $kolaborasicount = $kolaborasi->count();

        // $kadskormaster = KPIMaster_::where('fungsi', '=', 'Kad Skor Korporat')->Where('user_id', '=', auth()->user()->id)->where('year', '=', $year)->where('month', '=', $month)->orderBy('created_at','desc')->get();
        // $kewanganmaster = KPIMaster_::where('fungsi', '=', 'Kewangan')->Where('user_id', '=', auth()->user()->id)->where('year', '=', $year)->where('month', '=', $month)->orderBy('created_at','desc')->get();
        // $pelangganImaster = KPIMaster_::where('fungsi', '=', 'Pelanggan (Internal)')->Where('user_id', '=', auth()->user()->id)->where('year', '=', $year)->where('month', '=', $month)->orderBy('created_at','desc')->get();
        // $pelangganIImaster = KPIMaster_::where('fungsi', '=', 'Pelanggan (Outer)')->Where('user_id', '=', auth()->user()->id)->where('year', '=', $year)->where('month', '=', $month)->orderBy('created_at','desc')->get();
        // $kecemerlanganmaster = KPIMaster_::where('fungsi', '=', 'Kecemerlangan Operasi')->Where('user_id', '=', auth()->user()->id)->where('year', '=', $year)->where('month', '=', $month)->orderBy('created_at','desc')->get();
        // $trainingmaster = KPIMaster_::where('fungsi', '=', 'Manusia & Proses (Training)')->Where('user_id', '=', auth()->user()->id)->where('year', '=', $year)->where('month', '=', $month)->orderBy('created_at','desc')->get();
        // $ncrmaster = KPIMaster_::where('fungsi', '=', 'Manusia & Proses (NCROFI)')->Where('user_id', '=', auth()->user()->id)->where('year', '=', $year)->where('month', '=', $month)->orderBy('created_at','desc')->get();
        // $kolaborasimaster = KPIMaster_::where('fungsi', '=', 'Kolaborasi')->Where('user_id', '=', auth()->user()->id)->where('year', '=', $year)->where('month', '=', $month)->orderBy('created_at','desc')->get();

        // $kadskormastercount = $kadskormaster->count();
        // $kewanganmastercount = $kewanganmaster->count();
        // $pelangganImastercount = $pelangganImaster->count();
        // $pelangganIImastercount = $pelangganIImaster->count();
        // $kecemerlanganmastercount = $kecemerlanganmaster->count();
        // $trainingmastercount = $trainingmaster->count();
        // $ncrmastercount = $ncrmaster->count();
        // $kolaborasimastercount = $kolaborasimaster->count();

        $users = User::whereIn('position', ['Junior Non-Executive (NE1)','Senior Non-Executive (NE2)'])->Where('role' , 'employee')->get();
        $hrs = User::Where('department' , 'Human Resource (HR) & Administration')->orWhere('role' , 'admin')->get();
        $user = User::where('id', '=', auth()->user()->id)->get();
        $kecekapan = Kecekapan_::where('user_id', '=', auth()->user()->id)->where('year', '=', $year)->where('month', '=', $month)->orderBy('created_at','desc')->get();
        $displaykpi = Displaykpi_::latest()->where('year', '=', $year)->where('month', '=', $month)->get();
        $nilai = Nilai_::where('user_id', '=', auth()->user()->id)->where('year', '=', $year)->where('month', '=', $month)->orderBy('created_at','desc')->get();
        $kpiall = KPIAll_::where('user_id', '=', auth()->user()->id)->where('year', '=', $year)->where('month', '=', $month)->get();
        $weightage_master = KpiAll_::where('user_id', '=', Auth::user()->id)->where('year', '=', $year)->where('month', '=', $month)->value('weightage_master');
        $date = Date_::where('user_id', '=', auth()->user()->id)->where('year', '=', $year)->where('month', '=', $month)->get();

        return view('livewire.display-kpi', compact('users', 'hrs', 'kecekapan', 'nilai', 'displaykpi', 'user', 'kadskor', 'kewangan', 
        'pelangganI', 'pelangganII', 'kecemerlangan', 'training', 'ncr', 'kolaborasi', 'kadskorcount', 'kewangancount', 'pelangganIcount', 
        'pelangganIIcount', 'kecemerlangancount', 'trainingcount', 'ncrcount', 'kolaborasicount', 'kpiall', 'weightage_master', 'date'));
    }
    
        public function render()
    {
        // dd($year);
        $displaykpi = Displaykpi_::latest()->get();

        // 'user_id'=> Auth::user()->id,
        // 'created_at'=> Carbon::now(),
        // 'updated_at'=> Carbon::now(),

        // 'grade'=> $request->grade,
        // 'weightage'=> $request->weightage,

        // 'total_score'=> $request->total_score,
        // 'year'=> $request->year,
        // 'month'=> $request->month,

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

        $kadskor = KPI_::where('user_id', '=', auth()->user()->id)->where('fungsi', '=', 'Kad Skor Korporat')->orderBy('bukti','asc')->get();
        $kewangan = KPI_::where('user_id', '=', auth()->user()->id)->where('fungsi', '=', 'Kewangan')->orderBy('bukti','asc')->get();
        $pelangganI = KPI_::where('user_id', '=', auth()->user()->id)->where('fungsi', '=', 'Pelanggan (Internal)')->orderBy('bukti','asc')->get();
        $pelangganII = KPI_::where('user_id', '=', auth()->user()->id)->where('fungsi', '=', 'Pelanggan (Outer)')->orderBy('bukti','asc')->get();
        $kecemerlangan = KPI_::where('user_id', '=', auth()->user()->id)->where('fungsi', '=', 'Kecemerlangan Operasi')->orderBy('bukti','asc')->get();
        $training = KPI_::where('user_id', '=', auth()->user()->id)->where('fungsi', '=', 'Manusia & Proses (Training)')->orderBy('bukti','asc')->get();
        $ncr = KPI_::where('user_id', '=', auth()->user()->id)->where('fungsi', '=', 'Manusia & Proses (NCROFI)')->orderBy('bukti','asc')->get();
        $kolaborasi = KPI_::where('user_id', '=', auth()->user()->id)->where('fungsi', '=', 'Kolaborasi')->orderBy('bukti','asc')->get();

        $kadskorcount = $kadskor->count();
        $kewangancount = $kewangan->count();
        $pelangganIcount = $pelangganI->count();
        $pelangganIIcount = $pelangganII->count();
        $kecemerlangancount = $kecemerlangan->count();
        $trainingcount = $training->count();
        $ncrcount = $ncr->count();
        $kolaborasicount = $kolaborasi->count();

        // $kpifungsi = KPI_::where('user_id', '=', auth()->user()->id)->where('fungsi', '=', 'Kad Skor Korporat')->orderBy('created_at','desc')->get();
        $users = User::whereIn('position', ['Junior Non-Executive (NE1)','Senior Non-Executive (NE2)'])->Where('role' , 'employee')->get();
        $hrs = User::Where('hr' , 'yes')->orWhere('role' , 'admin')->get();
        $user = User::where('id', '=', auth()->user()->id)->get();
        $kecekapan = Kecekapan_::where('user_id', '=', auth()->user()->id)->orderBy('created_at','desc')->get();

        $nilai = Nilai_::where('user_id', '=', auth()->user()->id)->orderBy('created_at','desc')->get();

        $kadskormaster = KPIMaster_::where('fungsi', '=', 'Kad Skor Korporat')->Where('user_id', '=', auth()->user()->id)->orderBy('created_at','desc')->get();
        $kewanganmaster = KPIMaster_::where('fungsi', '=', 'Kewangan')->Where('user_id', '=', auth()->user()->id)->orderBy('created_at','desc')->get();
        $pelangganImaster = KPIMaster_::where('fungsi', '=', 'Pelanggan (Internal)')->Where('user_id', '=', auth()->user()->id)->orderBy('created_at','desc')->get();
        $pelangganIImaster = KPIMaster_::where('fungsi', '=', 'Pelanggan (Outer)')->Where('user_id', '=', auth()->user()->id)->orderBy('created_at','desc')->get();
        $kecemerlanganmaster = KPIMaster_::where('fungsi', '=', 'Kecemerlangan Operasi')->Where('user_id', '=', auth()->user()->id)->orderBy('created_at','desc')->get();
        $trainingmaster = KPIMaster_::where('fungsi', '=', 'Manusia & Proses (Training)')->Where('user_id', '=', auth()->user()->id)->orderBy('created_at','desc')->get();
        $ncrmaster = KPIMaster_::where('fungsi', '=', 'Manusia & Proses (NCROFI)')->Where('user_id', '=', auth()->user()->id)->orderBy('created_at','desc')->get();
        $kolaborasimaster = KPIMaster_::where('fungsi', '=', 'Kolaborasi')->Where('user_id', '=', auth()->user()->id)->orderBy('created_at','desc')->get();

        $kadskormastercount = KPIMaster_::where('fungsi', '=', 'Kad Skor Korporat')->Where('user_id', '=', auth()->user()->id)->orderBy('created_at','desc')->count();
        $kewanganmastercount = KPIMaster_::where('fungsi', '=', 'Kewangan')->Where('user_id', '=', auth()->user()->id)->orderBy('created_at','desc')->count();
        $pelangganImastercount = KPIMaster_::where('fungsi', '=', 'Pelanggan (Internal)')->Where('user_id', '=', auth()->user()->id)->orderBy('created_at','desc')->count();
        $pelangganIImastercount = KPIMaster_::where('fungsi', '=', 'Pelanggan (Outer)')->Where('user_id', '=', auth()->user()->id)->orderBy('created_at','desc')->count();
        $kecemerlanganmastercount = KPIMaster_::where('fungsi', '=', 'Kecemerlangan Operasi')->Where('user_id', '=', auth()->user()->id)->orderBy('created_at','desc')->count();
        $trainingmastercount = KPIMaster_::where('fungsi', '=', 'Manusia & Proses (Training)')->Where('user_id', '=', auth()->user()->id)->orderBy('created_at','desc')->count();
        $ncrmastercount = KPIMaster_::where('fungsi', '=', 'Manusia & Proses (NCROFI)')->Where('user_id', '=', auth()->user()->id)->orderBy('created_at','desc')->count();
        $kolaborasimastercount = KPIMaster_::where('fungsi', '=', 'Kolaborasi')->Where('user_id', '=', auth()->user()->id)->orderBy('created_at','desc')->count();

        $kpiall = KPIAll_::where('user_id', '=', auth()->user()->id)->get();
        $weightage_master = KpiAll_::where('user_id', '=', Auth::user()->id)->value('weightage_master');
        // $kecekapanall = KPIAll_::where('user_id', '=', auth()->user()->id)->get();
        // $nilaiall = KPIAll_::where('user_id', '=', auth()->user()->id)->get();
        // $skorakhir = KPIAll_::where('user_id', '=', auth()->user()->id)->get();

        return view('livewire.display-kpi', compact('kadskor', 'users', 'hrs', 'kecekapan', 'nilai', 'displaykpi', 'user', 'kewangan', 'pelangganI', 'pelangganII', 'kecemerlangan', 'training', 'ncr', 'kolaborasi', 'kadskorcount', 'kewangancount', 'pelangganIcount', 'pelangganIIcount', 'kecemerlangancount', 'trainingcount', 'ncrcount', 'kolaborasicount', 'kpiall', 'weightage_master'));


        // return view('livewire.display-kpi', compact('displaykpi'));
    }
}