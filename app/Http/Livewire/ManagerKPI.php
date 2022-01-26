<?php

namespace App\Http\Livewire;

use App\Models\KPI_;
use App\Models\KPIAll_;
use App\Models\Kecekapan_;
use App\Models\KPIMaster_;
use App\Models\Nilai_;
use App\Models\User;
use App\Models\Date_;
use Illuminate\Http\Request;
use Livewire\Component;

class ManagerKPI extends Component
{
    public $id_date;
    public $year;
    public $month;
    public $model_id;
    public $action;

    public function mount($date_id, $user_id, $year, $month)
    { 
        $this->date_id = $date_id;
        $this->user_id = $user_id;
        $this->year = $year;
        $this->month = $month;
    }

    protected $listeners = [
        'delete',
    ];
    
    public function selectItem($model_id, $action)
    {
        // dd('johnselectItem');
        $this->id_date = $model_id;
        $this->action = $action;
        // dd( $this->id_date = $model_id);
    }

    public function delete()
    {
        // dd('johndelete');
        // $date = Date_::find($this->id_date);
        // 'message_manager' == '';

        if (auth()->user()->role == "manager") {
            Date_::find($this->id_date)->update([
            'message_manager'=> '',
            'manager_id'=> '',
            ]);
        } else if(auth()->user()->role == "hr"){
            Date_::find($this->id_date)->update([
            'message_hr'=> '',
            'hr_id'=> '',
            ]);
        }

        return redirect()->back()->with('message', 'Your message to this employee has been deleted!');
    }

    // public function index($id, $date_id, $user_id, $year, $month)
    // {

    //     $kadskor = KPI_::where('user_id', '=', $id)->where('fungsi', '=', 'Kad Skor Korporat')->where('year', '=', $year)->where('month', '=', $month)->orderBy('bukti','asc')->get();
    //     $kewangan = KPI_::where('user_id', '=', $id)->where('fungsi', '=', 'Kewangan')->where('year', '=', $year)->where('month', '=', $month)->orderBy('bukti','asc')->get();
    //     $pelangganI = KPI_::where('user_id', '=', $id)->where('fungsi', '=', 'Pelanggan (Internal)')->where('year', '=', $year)->where('month', '=', $month)->orderBy('bukti','asc')->get();
    //     $pelangganII = KPI_::where('user_id', '=', $id)->where('fungsi', '=', 'Pelanggan (External)')->where('year', '=', $year)->where('month', '=', $month)->orderBy('bukti','asc')->get();
    //     $kecemerlangan = KPI_::where('user_id', '=', $id)->where('fungsi', '=', 'Kecemerlangan Operasi')->where('year', '=', $year)->where('month', '=', $month)->orderBy('bukti','asc')->get();
    //     $training = KPI_::where('user_id', '=', $id)->where('fungsi', '=', 'Manusia & Proses (Training)')->where('year', '=', $year)->where('month', '=', $month)->orderBy('bukti','asc')->get();
    //     $ncr = KPI_::where('user_id', '=', $id)->where('fungsi', '=', 'Manusia & Proses (NCROFI)')->where('year', '=', $year)->where('month', '=', $month)->orderBy('bukti','asc')->get();
    //     $kolaborasi = KPI_::where('user_id', '=', $id)->where('fungsi', '=', 'Kolaborasi')->where('year', '=', $year)->where('month', '=', $month)->orderBy('bukti','asc')->get();

    //     $kadskorcount = $kadskor->count();
    //     $kewangancount = $kewangan->count();
    //     $pelangganIcount = $pelangganI->count();
    //     $pelangganIIcount = $pelangganII->count();
    //     $kecemerlangancount = $kecemerlangan->count();
    //     $trainingcount = $training->count();
    //     $ncrcount = $ncr->count();
    //     $kolaborasicount = $kolaborasi->count();

    //     $kpi = KPI_::where('user_id', '=', $id)->where('year', '=', $year)->where('month', '=', $month)->orderBy('created_at','desc')->get();
    //     $kpimaster = KPIMaster_::where('user_id', '=', $id)->where('year', '=', $year)->where('month', '=', $month)->orderBy('created_at','desc')->get();
    //     $user = User::where('id', '=', $id)->get();
    //     $kecekapan = Kecekapan_::where('user_id', '=', $id)->where('year', '=', $year)->where('month', '=', $month)->orderBy('created_at','desc')->get();
    //     $nilai = Nilai_::where('user_id', '=', $id)->where('year', '=', $year)->where('month', '=', $month)->orderBy('created_at','desc')->get();
    //     $kpiall = KPIAll_::where('user_id', '=', $id)->where('year', '=', $year)->where('month', '=', $month)->get();
    //     $date = Date_::where('user_id', '=', $id)->where('year', '=', $year)->where('month', '=', $month)->get();
    //     $weightage_master = KpiAll_::where('user_id', '=', $id)->where('year', '=', $year)->where('month', '=', $month)->value('weightage_master');
    //     $kecekapanscount2 = Kecekapan_::where('user_id', '=', $id)->where('year', '=', $year)->where('month', '=', $month)->count();
    //     $nilaiscount2 = Nilai_::where('user_id', '=', $id)->where('year', '=', $year)->where('month', '=', $month)->count();
    //     $kecekapan_master = $kecekapanscount2 * 20;
    //     $nilai_master = $nilaiscount2 * 20;

    //     return view('livewire.manager-kpi', compact('kpi', 'kpimaster', 'user', 'kecekapan' , 'nilai', 'kpiall', 'kadskor', 'kewangan', 
    //     'pelangganI', 'pelangganII', 'kecemerlangan', 'training', 'ncr', 'kolaborasi', 'id', 'date_id', 'user_id', 'year', 'month', 'date', 
    //     'weightage_master', 'kadskorcount', 'kewangancount', 'pelangganIcount', 'pelangganIIcount', 'kecemerlangancount', 'trainingcount',
    //     'ncrcount', 'kolaborasicount', 'kecekapan_master', 'nilai_master'));
    // }
    
    public function changeupmanager($date_id)
    {
        Date_::find($date_id)->update([
        'status'=> 'Signed By Manager',
        ]);

        return redirect()->back()->with('message', 'The kpi has been signed & appraised!');
    }

    public function changedownmanager($date_id)
    {
        Date_::find($date_id)->update([
        'status'=> 'Submitted',
        ]);
        return redirect()->back()->with('message', 'You have undo the signed & undo the appraised kpi!');
    }

    public function messageupmanager(Request $request, $date_id)
    {
        Date_::find($date_id)->update([
        'message_manager'=> $request->message_manager,
        'manager_id'=> auth()->user()->id,
        ]);
        // dd($request->message_manager);

        return redirect()->back()->with('message', 'Your message has been submitted!');
    }

    // public function messagedownmanager($date_id)
    // {
    //     Date_::find($date_id)->update([
    //     'message_manager'=> 'Submitted',
    //     ]);
    //     return redirect()->back()->with('message', 'Your message to this employee has been deleted!');
    // }

    public function changeuphr($date_id)
    {
        Date_::find($date_id)->update([
        'status'=> 'Completed',
        ]);

        return redirect()->back()->with('message', 'The kpi has been signed & completed!');
    }

    public function changedownhr($date_id)
    {
        Date_::find($date_id)->update([
        'status'=> 'Signed By Manager',
        ]);
        return redirect()->back()->with('message', 'You have undo the signed & undo the completed kpi!');
    }

    public function messageuphr(Request $request, $date_id)
    {
        Date_::find($date_id)->update([
        'message_hr'=> $request->message_hr,
        'hr_id'=> auth()->user()->id,
        ]);

        return redirect()->back()->with('message', 'Your message has been submitted!');
    }

    // public function messagedownhr($date_id)
    // {
    //     Date_::find($date_id)->update([
    //     'message_hr'=> 'Submitted',
    //     ]);
    //     return redirect()->back()->with('message', 'Your message to this employee has been deleted!');
    // }
    public function render()
    {
        $date_id = $this->date_id;
        $user_id = $this->user_id;
        $year = $this->year;
        $month = $this->month;

        $kadskor = KPI_::where('user_id', '=', $user_id)->where('fungsi', '=', 'Kad Skor Korporat')->where('year', '=', $year)->where('month', '=', $month)->orderBy('bukti','asc')->get();
        $kewangan = KPI_::where('user_id', '=', $user_id)->where('fungsi', '=', 'Kewangan')->where('year', '=', $year)->where('month', '=', $month)->orderBy('bukti','asc')->get();
        $pelangganI = KPI_::where('user_id', '=', $user_id)->where('fungsi', '=', 'Pelanggan (Internal)')->where('year', '=', $year)->where('month', '=', $month)->orderBy('bukti','asc')->get();
        $pelangganII = KPI_::where('user_id', '=', $user_id)->where('fungsi', '=', 'Pelanggan (External)')->where('year', '=', $year)->where('month', '=', $month)->orderBy('bukti','asc')->get();
        $kecemerlangan1 = KPI_::where('user_id', '=', $user_id)->where('fungsi', '=', 'Kecemerlangan Operasi1')->where('year', '=', $year)->where('month', '=', $month)->orderBy('bukti','asc')->get();
        $kecemerlangan2 = KPI_::where('user_id', '=', $user_id)->where('fungsi', '=', 'Kecemerlangan Operasi2')->where('year', '=', $year)->where('month', '=', $month)->orderBy('bukti','asc')->get();
        $kecemerlangan3 = KPI_::where('user_id', '=', $user_id)->where('fungsi', '=', 'Kecemerlangan Operasi3')->where('year', '=', $year)->where('month', '=', $month)->orderBy('bukti','asc')->get();
        $kecemerlangan4 = KPI_::where('user_id', '=', $user_id)->where('fungsi', '=', 'Kecemerlangan Operasi4')->where('year', '=', $year)->where('month', '=', $month)->orderBy('bukti','asc')->get();
        $kecemerlangan5 = KPI_::where('user_id', '=', $user_id)->where('fungsi', '=', 'Kecemerlangan Operasi5')->where('year', '=', $year)->where('month', '=', $month)->orderBy('bukti','asc')->get();
        $training = KPI_::where('user_id', '=', $user_id)->where('fungsi', '=', 'Manusia & Proses (Training)')->where('year', '=', $year)->where('month', '=', $month)->orderBy('bukti','asc')->get();
        $ncr = KPI_::where('user_id', '=', $user_id)->where('fungsi', '=', 'Manusia & Proses (NCROFI)')->where('year', '=', $year)->where('month', '=', $month)->orderBy('bukti','asc')->get();
        $kolaborasi = KPI_::where('user_id', '=', $user_id)->where('fungsi', '=', 'Kolaborasi')->where('year', '=', $year)->where('month', '=', $month)->orderBy('bukti','asc')->get();

        $kadskorcount = $kadskor->count();
        $kewangancount = $kewangan->count();
        $pelangganIcount = $pelangganI->count();
        $pelangganIIcount = $pelangganII->count();
        $kecemerlangan1count = $kecemerlangan1->count();
        $kecemerlangan2count = $kecemerlangan2->count();
        $kecemerlangan3count = $kecemerlangan3->count();
        $kecemerlangan4count = $kecemerlangan4->count();
        $kecemerlangan5count = $kecemerlangan5->count();
        $trainingcount = $training->count();
        $ncrcount = $ncr->count();
        $kolaborasicount = $kolaborasi->count();

        $kpi = KPI_::where('user_id', '=', $user_id)->where('year', '=', $year)->where('month', '=', $month)->orderBy('created_at','desc')->get();
        $kpimaster = KPIMaster_::where('user_id', '=', $user_id)->where('year', '=', $year)->where('month', '=', $month)->orderBy('created_at','desc')->get();
        $user = User::where('id', '=', $user_id)->get();
        $kecekapan = Kecekapan_::where('user_id', '=', $user_id)->where('year', '=', $year)->where('month', '=', $month)->orderBy('created_at','desc')->get();
        $nilai = Nilai_::where('user_id', '=', $user_id)->where('year', '=', $year)->where('month', '=', $month)->orderBy('created_at','desc')->get();
        $kpiall = KPIAll_::where('user_id', '=', $user_id)->where('year', '=', $year)->where('month', '=', $month)->get();
        $date = Date_::where('user_id', '=', $user_id)->where('year', '=', $year)->where('month', '=', $month)->get();
        $weightage_master = KpiAll_::where('user_id', '=', $user_id)->where('year', '=', $year)->where('month', '=', $month)->value('weightage_master');
        $kecekapanscount2 = Kecekapan_::where('user_id', '=', $user_id)->where('year', '=', $year)->where('month', '=', $month)->count();
        $nilaiscount2 = Nilai_::where('user_id', '=', $user_id)->where('year', '=', $year)->where('month', '=', $month)->count();
        $kecekapan_master = $kecekapanscount2 * 20;
        $nilai_master = $nilaiscount2 * 20;

        return view('livewire.manager-kpi', compact('kpi', 'kpimaster', 'user', 'kecekapan' , 'nilai', 'kpiall', 'kadskor', 'kewangan', 
        'pelangganI', 'pelangganII', 'kecemerlangan1', 'kecemerlangan2', 'kecemerlangan3', 'kecemerlangan4', 'kecemerlangan5', 'training', 'ncr', 'kolaborasi', 'date_id', 'user_id', 'year', 'month', 'date', 
        'weightage_master', 'kadskorcount', 'kewangancount', 'pelangganIcount', 'pelangganIIcount', 'kecemerlangan1count', 'kecemerlangan2count', 'kecemerlangan3count', 'kecemerlangan4count', 'kecemerlangan5count', 'trainingcount',
        'ncrcount', 'kolaborasicount', 'kecekapan_master', 'nilai_master'));

    }
}
