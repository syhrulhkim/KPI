<?php

namespace App\Http\Livewire;
// namespace App\Models\KPI_;

use DB;
use Auth;
use App\Models\KPI_;
use App\Models\User;
use Ramsey\Uuid\Uuid;
use Livewire\Component;
use App\Models\KPIMaster_;
use App\Models\Kecekapan_;
use App\Models\Nilai_;
use App\Models\KPIAll_;
use Illuminate\Http\Request;
use Livewire\WithFileUploads;
use Illuminate\Support\Carbon;
use App\Models\Date_;

class KPI extends Component
{
    use WithFileUploads;
    public $id_kpi;
    public $action;
    public $name;
    public $model_id;
    public $bukti_path;

    protected $listeners = [
        'delete'
    ];

    public function selectItem($id_kpiall , $id_kpimaster , $id_kpi)
    {
        // dd('john');
        $this->id_kpi = $id_kpi;
        $this->id_kpimaster = $id_kpimaster;
        $this->id_kpiall = $id_kpiall;
        // $this->action = $action;
    }

    public function delete()
    {
        $date_id = $this->date_id;
        $user_id = $this->user_id;
        $year = $this->year;
        $month = $this->month;
        // dd('john123');
        $kpi = KPI_::find($this->id_kpi);
        $fungsi = KPI_::find($this->id_kpi)->value('fungsi');
        // dd($this->id_kpimaster);
        $kpi->delete();
        // dd($fungsi);

        Date_::find($date_id)->update([
            'status'=> 'Not Submitted',
        ]);

        $count_KPI = KPI_::where('fungsi', '=', $fungsi)->where('user_id', '=', auth()->user()->id)->where('year', '=', $year)->where('month', '=', $month)->count();
        if ($count_KPI == 0) {
            $kpimaster = KPIMaster_::find($this->id_kpimaster);
            $kpimaster->delete();
            $weightage = KPIMaster_::where('user_id', '=', Auth::user()->id)->where('year', '=', $year)->where('month', '=', $month)->sum('percent_master');
            KPIAll_::find($this->id_kpiall)->update([
                'weightage_master'=> $weightage,
                'updated_at'=> Carbon::now(),
            ]);
        }
        return redirect()->back()->with('message', 'Kpi deleted successfully');
    }

    public function mount($date_id, $user_id, $year, $month)
    { 
        $this->date_id = $date_id;
        $this->user_id = $user_id;
        $this->year = $year;
        $this->month = $month;
    }

    // public $fungsi = '';
    // public $bukti = '';
    // protected $rules = [
    //     'fungsi' => 'required|min:3',
    //     'bukti' => 'required|min:3',
    // ];
    // use WithFileUploads;
    // public $file_path;
    // public function kpi() {
    //     $kpi = KPI_::latest()->get();
    //     // $kpi2 = KPI_::where('user_id', '=', auth()->user()->id)->orderBy('created_at','desc')->get();
    //     // return view('livewire.create-kpi', compact('kpi', 'kpi2') );
    //     return view('livewire.add-kpi', compact('kpi') );
    // }
    // public function kpi_master_save1(Request $request){
    //     // dd($request->fungsi);
    //     $kadskormastercount = KPIMaster_::where('fungsi', '=', 'Kad Skor Korporat')->Where('user_id', '=', auth()->user()->id)->orderBy('created_at','desc')->count();
    //     // $kadskormaster = KPIMaster_::where('fungsi', '=', 'Kad Skor Korporat')->Where('user_id', '=', auth()->user()->id)->orderBy('created_at','desc')->get();
    //     if ($kadskormastercount == 0) {
    //     // dd('john');
    //     KPIMaster_::insert([
    //         'user_id'=> Auth::user()->id,
    //         'created_at'=> Carbon::now(),
    //         'updated_at'=> Carbon::now(),
    //         'objektif'=> $request->objektif,
    //         'link'=> $request->link,
    //         'percent_master'=> $request->percent_master,
    //         'fungsi'=> 'Kad Skor Korporat',
    //         ]);
    //         return redirect()->back()->with('message', 'KPI Master untuk Kad Skor Korporat berjaya ditambah!');
    //     }
    //     return redirect()->back()->with('fail', 'You already have add KPI Master untuk Kad Skor Korporat!');
    // }

    public function kpi_master_edit1($id, $date_id, $user_id, $year, $month) {
        $kadskormastercount = KPIMaster_::where('fungsi', '=', 'Kad Skor Korporat')->Where('user_id', '=', auth()->user()->id)->where('year', '=', $year)->where('month', '=', $month)->orderBy('created_at','desc')->count();
        $fungsi = 'Kad Skor Korporat';
        $status = Date_::where('user_id', '=', Auth::user()->id)->where('year', '=', $year)->where('month', '=', $month)->value('status');
        if ($kadskormastercount == 1) {
            $kpimasters = KPIMaster_::find($id);
            return view('livewire.form_kpimaster' , compact('kpimasters', 'fungsi', 'date_id', 'user_id', 'year', 'month', 'status'));
        }
    }

    // public function kpi_master_save2(Request $request){
    //     $kewanganmastercount = KPIMaster_::where('fungsi', '=', 'Kewangan')->Where('user_id', '=', auth()->user()->id)->orderBy('created_at','desc')->count();
    //     if ($kewanganmastercount == 0) {
    //     KPIMaster_::insert([
    //         'user_id'=> Auth::user()->id,
    //         'created_at'=> Carbon::now(),
    //         'updated_at'=> Carbon::now(),
    //         'objektif'=> $request->objektif,
    //         'link'=> $request->link,
    //         'percent_master'=> $request->percent_master,
    //         'fungsi'=> 'Kewangan',
    //         ]);
    //         return redirect()->back()->with('message', 'KPI Master untuk Kewangan berjaya ditambah!');
    //     }
    //     return redirect()->back()->with('fail', 'You already have add KPI Master untuk Kad Skor Korporat!');
    // }

    public function kpi_master_edit2($id, $date_id, $user_id, $year, $month) {
        $kewangan1mastercount = KPIMaster_::where('fungsi', '=', 'Kewangan1')->Where('user_id', '=', auth()->user()->id)->where('year', '=', $year)->where('month', '=', $month)->orderBy('created_at','desc')->count();
        $fungsi = 'Kewangan1';
        $status = Date_::where('user_id', '=', Auth::user()->id)->where('year', '=', $year)->where('month', '=', $month)->value('status');
        if ($kewangan1mastercount == 1) {
            $kpimasters = KPIMaster_::find($id);
            return view('livewire.form_kpimaster' , compact('kpimasters', 'fungsi', 'date_id', 'user_id', 'year', 'month', 'status'));
        }
    }
    
    public function kpi_master_edit13($id, $date_id, $user_id, $year, $month) {
        $kewangan2mastercount = KPIMaster_::where('fungsi', '=', 'Kewangan2')->Where('user_id', '=', auth()->user()->id)->where('year', '=', $year)->where('month', '=', $month)->orderBy('created_at','desc')->count();
        $fungsi = 'Kewangan2';
        $status = Date_::where('user_id', '=', Auth::user()->id)->where('year', '=', $year)->where('month', '=', $month)->value('status');
        if ($kewangan2mastercount == 1) {
            $kpimasters = KPIMaster_::find($id);
            return view('livewire.form_kpimaster' , compact('kpimasters', 'fungsi', 'date_id', 'user_id', 'year', 'month', 'status'));
        }
    }

    public function kpi_master_edit14($id, $date_id, $user_id, $year, $month) {
        $kewangan3mastercount = KPIMaster_::where('fungsi', '=', 'Kewangan3')->Where('user_id', '=', auth()->user()->id)->where('year', '=', $year)->where('month', '=', $month)->orderBy('created_at','desc')->count();
        $fungsi = 'Kewangan3';
        $status = Date_::where('user_id', '=', Auth::user()->id)->where('year', '=', $year)->where('month', '=', $month)->value('status');
        if ($kewangan3mastercount == 1) {
            $kpimasters = KPIMaster_::find($id);
            return view('livewire.form_kpimaster' , compact('kpimasters', 'fungsi', 'date_id', 'user_id', 'year', 'month', 'status'));
        }
    }

    public function kpi_master_edit15($id, $date_id, $user_id, $year, $month) {
        $kewangan4mastercount = KPIMaster_::where('fungsi', '=', 'Kewangan4')->Where('user_id', '=', auth()->user()->id)->where('year', '=', $year)->where('month', '=', $month)->orderBy('created_at','desc')->count();
        $fungsi = 'Kewangan4';
        $status = Date_::where('user_id', '=', Auth::user()->id)->where('year', '=', $year)->where('month', '=', $month)->value('status');
        if ($kewangan4mastercount == 1) {
            $kpimasters = KPIMaster_::find($id);
            return view('livewire.form_kpimaster' , compact('kpimasters', 'fungsi', 'date_id', 'user_id', 'year', 'month', 'status'));
        }
    }

    public function kpi_master_edit16($id, $date_id, $user_id, $year, $month) {
        $kewangan5mastercount = KPIMaster_::where('fungsi', '=', 'Kewangan5')->Where('user_id', '=', auth()->user()->id)->where('year', '=', $year)->where('month', '=', $month)->orderBy('created_at','desc')->count();
        $fungsi = 'Kewangan5';
        $status = Date_::where('user_id', '=', Auth::user()->id)->where('year', '=', $year)->where('month', '=', $month)->value('status');
        if ($kewangan5mastercount == 1) {
            $kpimasters = KPIMaster_::find($id);
            return view('livewire.form_kpimaster' , compact('kpimasters', 'fungsi', 'date_id', 'user_id', 'year', 'month', 'status'));
        }
    }

    public function kpi_master_edit17($id, $date_id, $user_id, $year, $month) {
        $kewangan6mastercount = KPIMaster_::where('fungsi', '=', 'Kewangan6')->Where('user_id', '=', auth()->user()->id)->where('year', '=', $year)->where('month', '=', $month)->orderBy('created_at','desc')->count();
        $fungsi = 'Kewangan6';
        $status = Date_::where('user_id', '=', Auth::user()->id)->where('year', '=', $year)->where('month', '=', $month)->value('status');
        if ($kewangan6mastercount == 1) {
            $kpimasters = KPIMaster_::find($id);
            return view('livewire.form_kpimaster' , compact('kpimasters', 'fungsi', 'date_id', 'user_id', 'year', 'month', 'status'));
        }
    }

    public function kpi_master_edit18($id, $date_id, $user_id, $year, $month) {
        $kewangan7mastercount = KPIMaster_::where('fungsi', '=', 'Kewangan7')->Where('user_id', '=', auth()->user()->id)->where('year', '=', $year)->where('month', '=', $month)->orderBy('created_at','desc')->count();
        $fungsi = 'Kewangan7';
        $status = Date_::where('user_id', '=', Auth::user()->id)->where('year', '=', $year)->where('month', '=', $month)->value('status');
        if ($kewangan7mastercount == 1) {
            $kpimasters = KPIMaster_::find($id);
            return view('livewire.form_kpimaster' , compact('kpimasters', 'fungsi', 'date_id', 'user_id', 'year', 'month', 'status'));
        }
    }

    public function kpi_master_edit19($id, $date_id, $user_id, $year, $month) {
        $kewangan8mastercount = KPIMaster_::where('fungsi', '=', 'Kewangan8')->Where('user_id', '=', auth()->user()->id)->where('year', '=', $year)->where('month', '=', $month)->orderBy('created_at','desc')->count();
        $fungsi = 'Kewangan8';
        $status = Date_::where('user_id', '=', Auth::user()->id)->where('year', '=', $year)->where('month', '=', $month)->value('status');
        if ($kewangan8mastercount == 1) {
            $kpimasters = KPIMaster_::find($id);
            return view('livewire.form_kpimaster' , compact('kpimasters', 'fungsi', 'date_id', 'user_id', 'year', 'month', 'status'));
        }
    }

    public function kpi_master_edit20($id, $date_id, $user_id, $year, $month) {
        $kewangan9mastercount = KPIMaster_::where('fungsi', '=', 'Kewangan9')->Where('user_id', '=', auth()->user()->id)->where('year', '=', $year)->where('month', '=', $month)->orderBy('created_at','desc')->count();
        $fungsi = 'Kewangan9';
        $status = Date_::where('user_id', '=', Auth::user()->id)->where('year', '=', $year)->where('month', '=', $month)->value('status');
        if ($kewangan9mastercount == 1) {
            $kpimasters = KPIMaster_::find($id);
            return view('livewire.form_kpimaster' , compact('kpimasters', 'fungsi', 'date_id', 'user_id', 'year', 'month', 'status'));
        }
    }

    public function kpi_master_edit21($id, $date_id, $user_id, $year, $month) {
        $kewangan10mastercount = KPIMaster_::where('fungsi', '=', 'Kewangan10')->Where('user_id', '=', auth()->user()->id)->where('year', '=', $year)->where('month', '=', $month)->orderBy('created_at','desc')->count();
        $fungsi = 'Kewangan10';
        $status = Date_::where('user_id', '=', Auth::user()->id)->where('year', '=', $year)->where('month', '=', $month)->value('status');
        if ($kewangan10mastercount == 1) {
            $kpimasters = KPIMaster_::find($id);
            return view('livewire.form_kpimaster' , compact('kpimasters', 'fungsi', 'date_id', 'user_id', 'year', 'month', 'status'));
        }
    }

    // public function kpi_master_save3(Request $request){
    //     $pelangganImastercount = KPIMaster_::where('fungsi', '=', 'Pelanggan (Internal)')->Where('user_id', '=', auth()->user()->id)->orderBy('created_at','desc')->count();
    //     if ($pelangganImastercount == 0) {
    //     KPIMaster_::insert([
    //         'user_id'=> Auth::user()->id,
    //         'created_at'=> Carbon::now(),
    //         'updated_at'=> Carbon::now(),
    //         'objektif'=> $request->objektif,
    //         'link'=> $request->link,
    //         'percent_master'=> $request->percent_master,
    //         'fungsi'=> 'Pelanggan (Internal)',
    //         ]);
    //         return redirect()->back()->with('message', 'KPI Master untuk Pelanggan (Internal) berjaya ditambah!');
    //     }
    //     return redirect()->back()->with('fail', 'You already have add KPI Master untuk Kad Skor Korporat!');
    // }

    public function kpi_master_edit3($id, $date_id, $user_id, $year, $month) {
        $pelangganImastercount = KPIMaster_::where('fungsi', '=', 'Pelanggan (Internal)')->Where('user_id', '=', auth()->user()->id)->where('year', '=', $year)->where('month', '=', $month)->orderBy('created_at','desc')->count();
        $fungsi = 'Pelanggan (Internal)';
        $status = Date_::where('user_id', '=', Auth::user()->id)->where('year', '=', $year)->where('month', '=', $month)->value('status');
        if ($pelangganImastercount == 1) {
            $kpimasters = KPIMaster_::find($id);
            return view('livewire.form_kpimaster' , compact('kpimasters', 'fungsi', 'date_id', 'user_id', 'year', 'month', 'status'));
        }
    }

    // public function kpi_master_save4(Request $request){
    //     $pelangganIImastercount = KPIMaster_::where('fungsi', '=', 'Pelanggan (External)')->Where('user_id', '=', auth()->user()->id)->orderBy('created_at','desc')->count();
    //     if ($pelangganIImastercount == 0) {
    //     KPIMaster_::insert([
    //         'user_id'=> Auth::user()->id,
    //         'created_at'=> Carbon::now(),
    //         'updated_at'=> Carbon::now(),
    //         'objektif'=> $request->objektif,
    //         'link'=> $request->link,
    //         'percent_master'=> $request->percent_master,
    //         'fungsi'=> 'Pelanggan (External)',
    //         ]);
    //         return redirect()->back()->with('message', 'KPI Master untuk Pelanggan (External) berjaya ditambah!');
    //     }
    //     return redirect()->back()->with('fail', 'You already have add KPI Master untuk Kad Skor Korporat!');
    // }

    public function kpi_master_edit4($id, $date_id, $user_id, $year, $month) {
        $pelangganIImastercount = KPIMaster_::where('fungsi', '=', 'Pelanggan (External)')->Where('user_id', '=', auth()->user()->id)->where('year', '=', $year)->where('month', '=', $month)->orderBy('created_at','desc')->count();
        $fungsi = 'Pelanggan (External)';
        $status = Date_::where('user_id', '=', Auth::user()->id)->where('year', '=', $year)->where('month', '=', $month)->value('status');
        if ($pelangganIImastercount == 1) {
            $kpimasters = KPIMaster_::find($id);
            return view('livewire.form_kpimaster' , compact('kpimasters', 'fungsi', 'date_id', 'user_id', 'year', 'month', 'status'));
        }
    }

    // public function kpi_master_save5(Request $request){
    //     $kecemerlanganmastercount = KPIMaster_::where('fungsi', '=', 'Kecemerlangan Operasi')->Where('user_id', '=', auth()->user()->id)->orderBy('created_at','desc')->count();
    //     if ($kecemerlanganmastercount == 0) {
    //     KPIMaster_::insert([
    //         'user_id'=> Auth::user()->id,
    //         'created_at'=> Carbon::now(),
    //         'updated_at'=> Carbon::now(),
    //         'objektif'=> $request->objektif,
    //         'link'=> $request->link,
    //         'percent_master'=> $request->percent_master,
    //         'fungsi'=> 'Kecemerlangan Operasi',
    //         ]);
    //         return redirect()->back()->with('message', 'KPI Master untuk Kecemerlangan Operasi berjaya ditambah!');
    //     }
    //     return redirect()->back()->with('fail', 'You already have add KPI Master untuk Kad Skor Korporat!');
    // }

    public function kpi_master_edit5($id, $date_id, $user_id, $year, $month) {
        $kecemerlangan1mastercount = KPIMaster_::where('fungsi', '=', 'Kecemerlangan Operasi1')->Where('user_id', '=', auth()->user()->id)->where('year', '=', $year)->where('month', '=', $month)->orderBy('created_at','desc')->count();
        $fungsi = 'Kecemerlangan Operasi1';
        $status = Date_::where('user_id', '=', Auth::user()->id)->where('year', '=', $year)->where('month', '=', $month)->value('status');
        if ($kecemerlangan1mastercount == 1) {
            $kpimasters = KPIMaster_::find($id);
            return view('livewire.form_kpimaster' , compact('kpimasters', 'fungsi', 'date_id', 'user_id', 'year', 'month', 'status'));
        }
    }
    public function kpi_master_edit9($id, $date_id, $user_id, $year, $month) {
        $kecemerlangan2mastercount = KPIMaster_::where('fungsi', '=', 'Kecemerlangan Operasi2')->Where('user_id', '=', auth()->user()->id)->where('year', '=', $year)->where('month', '=', $month)->orderBy('created_at','desc')->count();
        $fungsi = 'Kecemerlangan Operasi2';
        $status = Date_::where('user_id', '=', Auth::user()->id)->where('year', '=', $year)->where('month', '=', $month)->value('status');
        if ($kecemerlangan2mastercount == 1) {
            $kpimasters = KPIMaster_::find($id);
            return view('livewire.form_kpimaster' , compact('kpimasters', 'fungsi', 'date_id', 'user_id', 'year', 'month', 'status'));
        }
    }
    public function kpi_master_edit10($id, $date_id, $user_id, $year, $month) {
        $kecemerlangan3mastercount = KPIMaster_::where('fungsi', '=', 'Kecemerlangan Operasi3')->Where('user_id', '=', auth()->user()->id)->where('year', '=', $year)->where('month', '=', $month)->orderBy('created_at','desc')->count();
        $fungsi = 'Kecemerlangan Operasi3';
        $status = Date_::where('user_id', '=', Auth::user()->id)->where('year', '=', $year)->where('month', '=', $month)->value('status');
        if ($kecemerlangan3mastercount == 1) {
            $kpimasters = KPIMaster_::find($id);
            return view('livewire.form_kpimaster' , compact('kpimasters', 'fungsi', 'date_id', 'user_id', 'year', 'month', 'status'));
        }
    }
    public function kpi_master_edit11($id, $date_id, $user_id, $year, $month) {
        $kecemerlangan4mastercount = KPIMaster_::where('fungsi', '=', 'Kecemerlangan Operasi4')->Where('user_id', '=', auth()->user()->id)->where('year', '=', $year)->where('month', '=', $month)->orderBy('created_at','desc')->count();
        $fungsi = 'Kecemerlangan Operasi4';
        $status = Date_::where('user_id', '=', Auth::user()->id)->where('year', '=', $year)->where('month', '=', $month)->value('status');
        if ($kecemerlangan4mastercount == 1) {
            $kpimasters = KPIMaster_::find($id);
            return view('livewire.form_kpimaster' , compact('kpimasters', 'fungsi', 'date_id', 'user_id', 'year', 'month', 'status'));
        }
    }
    public function kpi_master_edit12($id, $date_id, $user_id, $year, $month) {
        $kecemerlangan5mastercount = KPIMaster_::where('fungsi', '=', 'Kecemerlangan Operasi5')->Where('user_id', '=', auth()->user()->id)->where('year', '=', $year)->where('month', '=', $month)->orderBy('created_at','desc')->count();
        $fungsi = 'Kecemerlangan Operasi5';
        $status = Date_::where('user_id', '=', Auth::user()->id)->where('year', '=', $year)->where('month', '=', $month)->value('status');
        if ($kecemerlangan5mastercount == 1) {
            $kpimasters = KPIMaster_::find($id);
            return view('livewire.form_kpimaster' , compact('kpimasters', 'fungsi', 'date_id', 'user_id', 'year', 'month', 'status'));
        }
    }

    // public function kpi_master_save6(Request $request){
    //     $trainingmastercount = KPIMaster_::where('fungsi', '=', 'Manusia & Proses (Training)')->Where('user_id', '=', auth()->user()->id)->orderBy('created_at','desc')->count();
    //     if ($trainingmastercount == 0) {
    //     KPIMaster_::insert([
    //         'user_id'=> Auth::user()->id,
    //         'created_at'=> Carbon::now(),
    //         'updated_at'=> Carbon::now(),
    //         'objektif'=> $request->objektif,
    //         'link'=> $request->link,
    //         'percent_master'=> $request->percent_master,
    //         'fungsi'=> 'Manusia & Proses (Training)',
    //         ]);
    //         return redirect()->back()->with('message', 'KPI Master untuk Manusia & Proses (Training) berjaya ditambah!');
    //     }
    //     return redirect()->back()->with('fail', 'You already have add KPI Master untuk Kad Skor Korporat!');
    // }

    public function kpi_master_edit6($id, $date_id, $user_id, $year, $month) {
        $trainingmastercount = KPIMaster_::where('fungsi', '=', 'Manusia & Proses (Training)')->Where('user_id', '=', auth()->user()->id)->where('year', '=', $year)->where('month', '=', $month)->orderBy('created_at','desc')->count();
        $fungsi = 'Manusia & Proses (Training)';
        $status = Date_::where('user_id', '=', Auth::user()->id)->where('year', '=', $year)->where('month', '=', $month)->value('status');
        if ($trainingmastercount == 1) {
            $kpimasters = KPIMaster_::find($id);
            return view('livewire.form_kpimaster' , compact('kpimasters', 'fungsi', 'date_id', 'user_id', 'year', 'month', 'status'));
        }
    }

    // public function kpi_master_save7(Request $request){
    //     $ncrmastercount = KPIMaster_::where('fungsi', '=', 'Manusia & Proses (NCROFI)')->Where('user_id', '=', auth()->user()->id)->orderBy('created_at','desc')->count();
    //     if ($ncrmastercount == 0) {
    //     KPIMaster_::insert([
    //         'user_id'=> Auth::user()->id,
    //         'created_at'=> Carbon::now(),
    //         'updated_at'=> Carbon::now(),
    //         'objektif'=> $request->objektif,
    //         'link'=> $request->link,
    //         'percent_master'=> $request->percent_master,
    //         'fungsi'=> 'Manusia & Proses (NCROFI)',
    //         ]);
    //         return redirect()->back()->with('message', 'KPI Master untuk Manusia & Proses (NCROFI) berjaya ditambah!');
    //     }
    //     return redirect()->back()->with('fail', 'You already have add KPI Master untuk Kad Skor Korporat!');
    // }

    public function kpi_master_edit7($id, $date_id, $user_id, $year, $month) {
        $ncrmastercount = KPIMaster_::where('fungsi', '=', 'Manusia & Proses (NCROFI)')->Where('user_id', '=', auth()->user()->id)->where('year', '=', $year)->where('month', '=', $month)->orderBy('created_at','desc')->count();
        $fungsi = 'Manusia & Proses (NCROFI)';
        $status = Date_::where('user_id', '=', Auth::user()->id)->where('year', '=', $year)->where('month', '=', $month)->value('status');
        if ($ncrmastercount == 1) {
            $kpimasters = KPIMaster_::find($id);
            return view('livewire.form_kpimaster' , compact('kpimasters', 'fungsi', 'date_id', 'user_id', 'year', 'month', 'status'));
        }
    }

    // public function kpi_master_save8(Request $request){
    //     $kolaborasimastercount = KPIMaster_::where('fungsi', '=', 'Kolaborasi')->Where('user_id', '=', auth()->user()->id)->orderBy('created_at','desc')->count();
    //     if ($kolaborasimastercount == 0) {
    //     KPIMaster_::insert([
    //         'user_id'=> Auth::user()->id,
    //         'created_at'=> Carbon::now(),
    //         'updated_at'=> Carbon::now(),
    //         'objektif'=> $request->objektif,
    //         'link'=> $request->link,
    //         'percent_master'=> $request->percent_master,
    //         'fungsi'=> 'Kolaborasi',
    //         ]);
    //         return redirect()->back()->with('message', 'KPI Master untuk Kolaborasi berjaya ditambah!');
    //     }
    //     return redirect()->back()->with('fail', 'You already have add KPI Master untuk Kad Skor Korporat!');
    // }

    public function kpi_master_edit8($id, $date_id, $user_id, $year, $month) {
        $kolaborasimastercount = KPIMaster_::where('fungsi', '=', 'Kolaborasi')->Where('user_id', '=', auth()->user()->id)->where('year', '=', $year)->where('month', '=', $month)->orderBy('created_at','desc')->count();
        $fungsi = 'Kolaborasi';
        $status = Date_::where('user_id', '=', Auth::user()->id)->where('year', '=', $year)->where('month', '=', $month)->value('status');
        // dd($fungsi);
        if ($kolaborasimastercount == 1) {
            $kpimasters = KPIMaster_::find($id);
            return view('livewire.form_kpimaster' , compact('kpimasters', 'fungsi', 'date_id', 'user_id', 'year', 'month', 'status'));
        }
    }

    public function kpi_master_update(Request $request, $id, $fungsi, $date_id, $user_id, $year, $month) {
        $validatedData = $request->validate([
            'percent_master' => ['required'],
            // 'link' => ['required'],
            'objektif' => ['required'],
            'updated_at'=> Carbon::now(),
        ]);

        Date_::find($date_id)->update([
            'status'=> 'Not Submitted',
        ]);

        // dd($request->fungsi);
        $kpimasters = KPIMaster_::where('fungsi', '=', $request->fungsi)->where('user_id', '=', Auth::user()->id)->where('year', '=', $year)->where('month', '=', $month)->get();
        $kpimasters_id = count($kpimasters) > 0 ? $kpimasters->sortByDesc('created_at')->first()->id : '0';

        // $fungsi = $fungsi;
        // dd($fungsi);
        $total_score = KPI_::where('fungsi', $request->fungsi)->where('user_id', '=', Auth::user()->id)->where('year', '=', $year)->where('month', '=', $month)->sum('skor_sebenar');
        // dd($total_score);
        // dd($request->fungsi);
        // dd($total_score);
        $skor_kpi = 0;
        $skor_sebenar = 0;
        if ($total_score < 30 ) {
            $skor_kpi = 0;
            $skor_sebenar = 0;
        }
        elseif ($total_score >= 30 && $total_score < 65) {
            $value1 = $total_score - 30;
            $value2 = 65 - 30;

            $skor_kpi = ((($value1/$value2)*35)+30);
            $skor_sebenar = (($request->percent_master/100)*$skor_kpi);
        }
        elseif ($total_score >= 65 && $total_score < 100) {
            $value1 = $total_score - 65;
            $value2 = 100 - 65;

            $skor_kpi = ((($value1/$value2)*35)+65);
            $skor_sebenar = (($request->percent_master/100)*$skor_kpi);
        }
        elseif ($total_score >= 100) {
            $skor_kpi = 100;
            $skor_sebenar = (($request->percent_master/100)*$skor_kpi);
        }

        if (KPIAll_::where('user_id', '=', Auth::user()->id)->where('year', '=', $year)->where('month', '=', $month)->count() == 1) {
            $kpiall = KPIAll_::where('user_id', '=', Auth::user()->id)->where('year', '=', $year)->where('month', '=', $month)->get();
            $kpiall_id = count($kpiall) > 0 ? $kpiall->sortByDesc('created_at')->first()->id : '0';

            $total_score_master_past = KPIMaster_::where('user_id', '=', Auth::user()->id)->where('year', '=', $year)->where('month', '=', $month)->sum('skor_sebenar');
            $total_score_master_present = $skor_sebenar;
            $total_score_master = $total_score_master_past + $total_score_master_present;

            $grade = '';
            if ($total_score_master >= 80 ) {
                $grade = 'PLATINUM';
            }
            elseif ($total_score_master >= 75 && $total_score_master <= 79.99) {
                $grade = 'HIGH GOLD';
            }
            elseif ($total_score_master >= 70 && $total_score_master <= 74.99) {
                $grade = 'MID GOLD';
            }
            elseif ($total_score_master >= 65 && $total_score_master <= 69.99) {
                $grade = 'LOW GOLD';
            }
            elseif ($total_score_master >= 60 && $total_score_master <= 64.99) {
                $grade = 'HIGH SILVER';
            }
            elseif ($total_score_master >= 50 && $total_score_master <= 59.99) {
                $grade = 'LOW SILVER';
            }
            elseif ($total_score_master >= 1 && $total_score_master <= 49.99) {
                $grade = 'BRONZE';
            }
            else {
                $grade = 'NO GRED';
            }
            
            $weightage_master = KPIMaster_::where('fungsi', '=', $request->fungsi)->where('user_id', '=', Auth::user()->id)->where('year', '=', $year)->where('month', '=', $month)->value('percent_master');
            if ($weightage_master == NULL || $weightage_master == 0) {
                $weightage_past = KPIMaster_::where('user_id', '=', Auth::user()->id)->where('year', '=', $year)->where('month', '=', $month)->sum('percent_master');
                $weightage_present = $request->percent_master;
                $weightage = $weightage_past + $weightage_present;
            }
            else {
                $weightage_past = KPIMaster_::where('user_id', '=', Auth::user()->id)->where('year', '=', $year)->where('month', '=', $month)->sum('percent_master');
                $weightage_present = $request->percent_master;
                $weightage = $weightage_past + $weightage_present - $weightage_master;
            }
           
            $total_score_kecekapan = Kecekapan_::where('user_id', '=', Auth::user()->id)->where('year', '=', $year)->where('month', '=', $month)->sum('skor_sebenar');
            $total_score_nilai = Nilai_::where('user_id', '=', Auth::user()->id)->where('year', '=', $year)->where('month', '=', $month)->sum('skor_sebenar');
            $total_score_all = ($total_score_kecekapan*0.1) + (($total_score_nilai/1.2)*0.1) + ($total_score_master*0.8);

            $grade_all = '';
            if ($total_score_all >= 80 ) {
                $grade_all = 'PLATINUM';
            }
            elseif ($total_score_all >= 75 && $total_score_all <= 79.99) {
                $grade_all = 'HIGH GOLD';
            }
            elseif ($total_score_all >= 70 && $total_score_all <= 74.99) {
                $grade_all = 'MID GOLD';
            }
            elseif ($total_score_all >= 65 && $total_score_all <= 69.99) {
                $grade_all = 'LOW GOLD';
            }
            elseif ($total_score_all >= 60 && $total_score_all <= 64.99) {
                $grade_all = 'HIGH SILVER';
            }
            elseif ($total_score_all >= 50 && $total_score_all <= 59.99) {
                $grade_all = 'LOW SILVER';
            }
            elseif ($total_score_all >= 1 && $total_score_all <= 49.99) {
                $grade_all = 'BRONZE';
            }
            else {
                $grade_all = 'NO GRED';
            }

            KPIAll_::find($kpiall_id)->update([
                'total_score_master'=>  $total_score_master,
                'grade_master'=>  $grade,
                'weightage_master'=>  $weightage,
                'total_score_all'=>  $total_score_all,
                'grade_all'=>  $grade_all,
                'updated_at'=> Carbon::now(),
            ]);
        }
        else {
            KPIAll_::insert([              
                'user_id'=> Auth::user()->id,
                'created_at'=> Carbon::now(),
            ]);
        }

        // dd($skor_sebenar);
        // $total_score_master = KPIMaster_::where('user_id', '=', Auth::user()->id)->sum('skor_sebenar');
        // $grade = '';
        // if ($total_score_master >= 80 ) {
        //     $grade = 'PLATINUM';
        // }
        // elseif ($total_score_master >= 75 && $total_score_master <= 79.99) {
        //     $grade = 'HIGH GOLD';
        // }
        // elseif ($total_score_master >= 70 && $total_score_master <= 74.99) {
        //     $grade = 'MID GOLD';
        // }
        // elseif ($total_score_master >= 65 && $total_score_master <= 69.99) {
        //     $grade = 'LOW GOLD';
        // }
        // elseif ($total_score_master >= 60 && $total_score_master <= 64.99) {
        //     $grade = 'HIGH SILVER';
        // }
        // elseif ($total_score_master >= 50 && $total_score_master <= 59.99) {
        //     $grade = 'LOW SILVER';
        // }
        // elseif ($total_score_master >= 1 && $total_score_master <= 49.99) {
        //     $grade = 'BRONZE';
        // }
        // else {
        //     $grade = 'NO GRED';
        // }
        // $weightage = KPIMaster_::where('user_id', '=', Auth::user()->id)->sum('percent_master');

        $update = KPIMaster_::find($id)->update([
            // 'user_id'=> Auth::user()->id,
            // 'created_at'=> Carbon::now(),
            // 'updated_at'=> Carbon::now(),
            'objektif'=> $request->objektif,
            'link'=> $request->link,
            'percent_master'=> $request->percent_master,
            'pencapaian'=> $total_score,
            'skor_KPI'=> $skor_kpi,
            'skor_sebenar'=> $skor_sebenar,
            'updated_at'=> Carbon::now(),
            // 'total_score'=>  $total_score_master,
            // 'grade'=>  $grade,
            // 'weightage'=>  $weightage,
            // 'fungsi'=> 'Kad Skor Korporat',
        ]);
        // return redirect()->route('add-date')->with('message', 'KPI Master Updated Successfully');
        return redirect('employee/kpi/'.$date_id.'/'.$user_id.'/'.$year.'/'.$month)->with('message', 'KPI Master Updated Successfully');
    }
    
    public function kpi_save(Request $request, $date_id, $user_id, $year, $month){
       
        //check kat sini 
        $kadskor = KPI_::where('user_id', '=', auth()->user()->id)->where('fungsi', '=', 'Kad Skor Korporat')->where('year', '=', $year)->where('month', '=', $month)->get();
        // $kewangan = KPI_::where('user_id', '=', auth()->user()->id)->where('fungsi', '=', 'Kewangan')->where('year', '=', $year)->where('month', '=', $month)->get();
        $kewangan1 = KPI_::where('user_id', '=', auth()->user()->id)->where('fungsi', '=', 'Kewangan1')->where('year', '=', $year)->where('month', '=', $month)->get();
        $kewangan2 = KPI_::where('user_id', '=', auth()->user()->id)->where('fungsi', '=', 'Kewangan2')->where('year', '=', $year)->where('month', '=', $month)->get();
        $kewangan3 = KPI_::where('user_id', '=', auth()->user()->id)->where('fungsi', '=', 'Kewangan3')->where('year', '=', $year)->where('month', '=', $month)->get();
        $kewangan4 = KPI_::where('user_id', '=', auth()->user()->id)->where('fungsi', '=', 'Kewangan4')->where('year', '=', $year)->where('month', '=', $month)->get();
        $kewangan5 = KPI_::where('user_id', '=', auth()->user()->id)->where('fungsi', '=', 'Kewangan5')->where('year', '=', $year)->where('month', '=', $month)->get();
        $kewangan6 = KPI_::where('user_id', '=', auth()->user()->id)->where('fungsi', '=', 'Kewangan6')->where('year', '=', $year)->where('month', '=', $month)->get();
        $kewangan7 = KPI_::where('user_id', '=', auth()->user()->id)->where('fungsi', '=', 'Kewangan7')->where('year', '=', $year)->where('month', '=', $month)->get();
        $kewangan8 = KPI_::where('user_id', '=', auth()->user()->id)->where('fungsi', '=', 'Kewangan8')->where('year', '=', $year)->where('month', '=', $month)->get();
        $kewangan9 = KPI_::where('user_id', '=', auth()->user()->id)->where('fungsi', '=', 'Kewangan9')->where('year', '=', $year)->where('month', '=', $month)->get();
        $kewangan10 = KPI_::where('user_id', '=', auth()->user()->id)->where('fungsi', '=', 'Kewangan10')->where('year', '=', $year)->where('month', '=', $month)->get();
        $pelangganI = KPI_::where('user_id', '=', auth()->user()->id)->where('fungsi', '=', 'Pelanggan (Internal)')->where('year', '=', $year)->where('month', '=', $month)->get();
        $pelangganII = KPI_::where('user_id', '=', auth()->user()->id)->where('fungsi', '=', 'Pelanggan (External)')->where('year', '=', $year)->where('month', '=', $month)->get();
        $kecemerlangan1 = KPI_::where('user_id', '=', auth()->user()->id)->where('fungsi', '=', 'Kecemerlangan Operasi1')->where('year', '=', $year)->where('month', '=', $month)->get();
        $kecemerlangan2 = KPI_::where('user_id', '=', auth()->user()->id)->where('fungsi', '=', 'Kecemerlangan Operasi2')->where('year', '=', $year)->where('month', '=', $month)->get();
        $kecemerlangan3 = KPI_::where('user_id', '=', auth()->user()->id)->where('fungsi', '=', 'Kecemerlangan Operasi3')->where('year', '=', $year)->where('month', '=', $month)->get();
        $kecemerlangan4 = KPI_::where('user_id', '=', auth()->user()->id)->where('fungsi', '=', 'Kecemerlangan Operasi4')->where('year', '=', $year)->where('month', '=', $month)->get();
        $kecemerlangan5 = KPI_::where('user_id', '=', auth()->user()->id)->where('fungsi', '=', 'Kecemerlangan Operasi5')->where('year', '=', $year)->where('month', '=', $month)->get();
        $training = KPI_::where('user_id', '=', auth()->user()->id)->where('fungsi', '=', 'Manusia & Proses (Training)')->where('year', '=', $year)->where('month', '=', $month)->get();
        $ncr = KPI_::where('user_id', '=', auth()->user()->id)->where('fungsi', '=', 'Manusia & Proses (NCROFI)')->where('year', '=', $year)->where('month', '=', $month)->get();
        $kolaborasi = KPI_::where('user_id', '=', auth()->user()->id)->where('fungsi', '=', 'Kolaborasi')->where('year', '=', $year)->where('month', '=', $month)->get();

        $total_percent1 = 0;
        $total_percent2 = 0;
        $total_percent3 = 0;
        $total_percent4 = 0;
        $total_percent5 = 0;
        $total_percent6 = 0;
        $total_percent7 = 0;
        $total_percent8 = 0;
        $total_percent9 = 0;
        $total_percent10 = 0;
        $total_percent11 = 0;
        $total_percent12 = 0;
        $total_percent13 = 0;
        $total_percent14 = 0;
        $total_percent15 = 0;
        $total_percent16 = 0;
        $total_percent17 = 0;
        $total_percent18 = 0;
        $total_percent19 = 0;
        $total_percent20 = 0;
        $total_percent21 = 0;

        foreach ($kadskor as $key => $kpi1) {
            $total_percent1 = $total_percent1 + $kpi1->peratus;
        }
        // dd($total_percent1);
        foreach ($kewangan1 as $key => $kpi2) {
            $total_percent2 = $total_percent2 + $kpi2->peratus;
        }
        foreach ($pelangganI as $key => $kpi3) {
            $total_percent3 = $total_percent3 + $kpi3->peratus;
        }
        foreach ($pelangganII as $key => $kpi4) {
            $total_percent4 = $total_percent4 + $kpi4->peratus;
        }
        foreach ($kecemerlangan1 as $key => $kpi5) {
            $total_percent5 = $total_percent5 + $kpi5->peratus;
        }
        foreach ($training as $key => $kpi6) {
            $total_percent6 = $total_percent6 + $kpi6->peratus;
        }
        foreach ($ncr as $key => $kpi7) {
            $total_percent7 = $total_percent7 + $kpi7->peratus;
        }
        foreach ($kolaborasi as $key => $kpi8) {
            $total_percent8 = $total_percent8 + $kpi8->peratus;
        }
        foreach ($kecemerlangan2 as $key => $kpi9) {
            $total_percent9 = $total_percent9 + $kpi9->peratus;
        }
        foreach ($kecemerlangan3 as $key => $kpi10) {
            $total_percent10 = $total_percent10 + $kpi10->peratus;
        }
        foreach ($kecemerlangan4 as $key => $kpi11) {
            $total_percent11 = $total_percent11 + $kpi11->peratus;
        }
        foreach ($kecemerlangan5 as $key => $kpi12) {
            $total_percent12 = $total_percent12 + $kpi12->peratus;
        }
        foreach ($kewangan2 as $key => $kpi13) {
            $total_percent13 = $total_percent13 + $kpi13->peratus;
        }
        foreach ($kewangan3 as $key => $kpi14) {
            $total_percent14 = $total_percent14 + $kpi14->peratus;
        }
        foreach ($kewangan4 as $key => $kpi15) {
            $total_percent15 = $total_percent15 + $kpi15->peratus;
        }
        foreach ($kewangan5 as $key => $kpi16) {
            $total_percent16 = $total_percent16 + $kpi16->peratus;
        }
        foreach ($kewangan6 as $key => $kpi17) {
            $total_percent17 = $total_percent17 + $kpi17->peratus;
        }
        foreach ($kewangan7 as $key => $kpi18) {
            $total_percent18 = $total_percent18 + $kpi18->peratus;
        }
        foreach ($kewangan8 as $key => $kpi19) {
            $total_percent19 = $total_percent19 + $kpi19->peratus;
        }
        foreach ($kewangan9 as $key => $kpi20) {
            $total_percent20 = $total_percent20 + $kpi20->peratus;
        }
        foreach ($kewangan10 as $key => $kpi21) {
            $total_percent21 = $total_percent21 + $kpi21->peratus;
        }
        
        if($request->fungsi == 'Kad Skor Korporat'){
        if (($total_percent1 + $request->peratus) > 100) {
            return redirect()->back()->with('fail', 'Sorry, you have exceed the maximum of KPI for Kad Skor Korporat which is 100 percent only');
            }
        }
        if($request->fungsi == 'Kewangan1'){
        if (($total_percent2 + $request->peratus) > 100) {
            return redirect()->back()->with('fail', 'Sorry, you have exceed the maximum of KPI for Kewangan which is 100 percent only');
            }
        }
        if($request->fungsi == 'Pelanggan (Internal)'){
        if (($total_percent3 + $request->peratus) > 100) {
            return redirect()->back()->with('fail', 'Sorry, you have exceed the maximum of KPI for Pelanggan (Internal) which is 100 percent only');
            }
        }
        if($request->fungsi == 'Pelanggan (External)'){
        if (($total_percent4 + $request->peratus) > 100) {
            return redirect()->back()->with('fail', 'Sorry, you have exceed the maximum of KPI for Pelanggan (External) which is 100 percent only');
            }
        }
        if($request->fungsi == 'Kecemerlangan Operasi1'){
        if (($total_percent5 + $request->peratus) > 100) {
            return redirect()->back()->with('fail', 'Sorry, you have exceed the maximum of KPI for Kecemerlangan Operasi which is 100 percent only');
            }
        }
        if($request->fungsi == 'Manusia & Proses (Training)'){
        if (($total_percent6 + $request->peratus) > 100) {
            return redirect()->back()->with('fail', 'Sorry, you have exceed the maximum of KPI for Manusia & Proses (Training) which is 100 percent only');
            }
        }
        if($request->fungsi == 'Manusia & Proses (NCROFI)'){
        if (($total_percent7 + $request->peratus) > 100) {
            return redirect()->back()->with('fail', 'Sorry, you have exceed the maximum of KPI for Manusia & Proses (NCROFI) which is 100 percent only');
            }
        }
        if($request->fungsi == 'Kolaborasi'){
        if (($total_percent8 + $request->peratus) > 100) {
            return redirect()->back()->with('fail', 'Sorry, you have exceed the maximum of KPI for Kolaborasi which is 100 percent only');
            }
        }
        if($request->fungsi == 'Kecemerlangan Operasi2'){
            if (($total_percent9 + $request->peratus) > 100) {
                return redirect()->back()->with('fail', 'Sorry, you have exceed the maximum of KPI for Kecemerlangan Operasi which is 100 percent only');
            }
        }
        if($request->fungsi == 'Kecemerlangan Operasi3'){
        if (($total_percent10 + $request->peratus) > 100) {
            return redirect()->back()->with('fail', 'Sorry, you have exceed the maximum of KPI for Kecemerlangan Operasi which is 100 percent only');
            }
        }
        if($request->fungsi == 'Kecemerlangan Operasi4'){
            if (($total_percent11 + $request->peratus) > 100) {
                return redirect()->back()->with('fail', 'Sorry, you have exceed the maximum of KPI for Kecemerlangan Operasi which is 100 percent only');
            }
        }
        if($request->fungsi == 'Kecemerlangan Operasi5'){
            if (($total_percent12 + $request->peratus) > 100) {
                return redirect()->back()->with('fail', 'Sorry, you have exceed the maximum of KPI for Kecemerlangan Operasi which is 100 percent only');
            }
        }  
        if($request->fungsi == 'Kewangan2'){
        if (($total_percent13 + $request->peratus) > 100) {
            return redirect()->back()->with('fail', 'Sorry, you have exceed the maximum of KPI for Kewangan which is 100 percent only');
            }
        }
        if($request->fungsi == 'Kewangan3'){
        if (($total_percent14 + $request->peratus) > 100) {
            return redirect()->back()->with('fail', 'Sorry, you have exceed the maximum of KPI for Kewangan which is 100 percent only');
            }
        }
        if($request->fungsi == 'Kewangan4'){
        if (($total_percent15 + $request->peratus) > 100) {
            return redirect()->back()->with('fail', 'Sorry, you have exceed the maximum of KPI for Kewangan which is 100 percent only');
            }
        }
        if($request->fungsi == 'Kewangan5'){
        if (($total_percent16 + $request->peratus) > 100) {
            return redirect()->back()->with('fail', 'Sorry, you have exceed the maximum of KPI for Kewangan which is 100 percent only');
            }
        }
        if($request->fungsi == 'Kewangan6'){
        if (($total_percent17 + $request->peratus) > 100) {
            return redirect()->back()->with('fail', 'Sorry, you have exceed the maximum of KPI for Kewangan which is 100 percent only');
            }
        }
        if($request->fungsi == 'Kewangan7'){
        if (($total_percent18 + $request->peratus) > 100) {
            return redirect()->back()->with('fail', 'Sorry, you have exceed the maximum of KPI for Kewangan which is 100 percent only');
            }
        }
        if($request->fungsi == 'Kewangan8'){
        if (($total_percent19 + $request->peratus) > 100) {
            return redirect()->back()->with('fail', 'Sorry, you have exceed the maximum of KPI for Kewangan which is 100 percent only');
            }
        }
        if($request->fungsi == 'Kewangan9'){
        if (($total_percent20 + $request->peratus) > 100) {
            return redirect()->back()->with('fail', 'Sorry, you have exceed the maximum of KPI for Kewangan which is 100 percent only');
            }
        }
        if($request->fungsi == 'Kewangan10'){
        if (($total_percent21 + $request->peratus) > 100) {
            return redirect()->back()->with('fail', 'Sorry, you have exceed the maximum of KPI for Kewangan which is 100 percent only');
            }
        }

        $validatedData = $request->validate([

            'fungsi' => ['required'],
            // 'objektif' => ['required'],
            'bukti' => ['required'],
            'peratus' => ['required'],
            'ukuran' => ['required'],
            'threshold' => ['required'],
            'base' => ['required'],
            'stretch' => ['required'],
            'pencapaian' => ['required'],
            'skor_KPI' => ['required'],
            'skor_sebenar' => ['required'],

            // 'grade' => ['required'],
            // 'total_score' => ['required', 'numeric'],
            // 'weightage' => ['required', 'numeric'],
            
        ]);

        Date_::find($date_id)->update([
            'status'=> 'Not Submitted',
        ]);

        // $total_score1 = KPI_::where('fungsi','Kad Skor Korporat')->where('user_id', '=', Auth::user()->id)->sum('skor_sebenar');
        // $total_score2 = KPI_::where('fungsi','Kewangan')->where('user_id', '=', Auth::user()->id)->sum('skor_sebenar');
        // $total_score3 = KPI_::where('fungsi','Pelanggan (Internal)')->where('user_id', '=', Auth::user()->id)->sum('skor_sebenar');
        // $total_score4 = KPI_::where('fungsi','Pelanggan (External)')->where('user_id', '=', Auth::user()->id)->sum('skor_sebenar');
        // $total_score5 = KPI_::where('fungsi','Kecemerlangan Operasi')->where('user_id', '=', Auth::user()->id)->sum('skor_sebenar');
        // $total_score6 = KPI_::where('fungsi','Manusia & Proses (Training)')->where('user_id', '=', Auth::user()->id)->sum('skor_sebenar');
        // $total_score7 = KPI_::where('fungsi','Manusia & Proses (NCROFI)')->where('user_id', '=', Auth::user()->id)->sum('skor_sebenar');
        // $total_score8 = KPI_::where('fungsi','Kolaborasi')->where('user_id', '=', Auth::user()->id)->sum('skor_sebenar');
        // dd($total_score6);
        // $kpimaster1 = 0;
        // $id_kpimaster = DB::getPdo()->lastInsertId();
        // KPIALL 

        if (KPIAll_::where('user_id', '=', Auth::user()->id)->where('year', '=', $year)->where('month', '=', $month)->count() == 1) {
            $kpiall = KPIAll_::where('user_id', '=', Auth::user()->id)->where('year', '=', $year)->where('month', '=', $month)->get();
            $kpiall_id = count($kpiall) > 0 ? $kpiall->sortByDesc('created_at')->first()->id : '0';
            $total_score_master = KPIMaster_::where('user_id', '=', Auth::user()->id)->where('year', '=', $year)->where('month', '=', $month)->sum('skor_sebenar');
            $grade = '';
            if ($total_score_master >= 80 ) {
                $grade = 'PLATINUM';
            }
            elseif ($total_score_master >= 75 && $total_score_master <= 79.99) {
                $grade = 'HIGH GOLD';
            }
            elseif ($total_score_master >= 70 && $total_score_master <= 74.99) {
                $grade = 'MID GOLD';
            }
            elseif ($total_score_master >= 65 && $total_score_master <= 69.99) {
                $grade = 'LOW GOLD';
            }
            elseif ($total_score_master >= 60 && $total_score_master <= 64.99) {
                $grade = 'HIGH SILVER';
            }
            elseif ($total_score_master >= 50 && $total_score_master <= 59.99) {
                $grade = 'LOW SILVER';
            }
            elseif ($total_score_master >= 1 && $total_score_master <= 49.99) {
                $grade = 'BRONZE';
            }
            else {
                $grade = 'NO GRED';
            }
            $weightage = KPIMaster_::where('user_id', '=', Auth::user()->id)->where('year', '=', $year)->where('month', '=', $month)->sum('percent_master');
            $total_score_kecekapan = Kecekapan_::where('user_id', '=', Auth::user()->id)->where('year', '=', $year)->where('month', '=', $month)->sum('skor_sebenar');
            $total_score_nilai = Nilai_::where('user_id', '=', Auth::user()->id)->where('year', '=', $year)->where('month', '=', $month)->sum('skor_sebenar');
            $total_score_all = ($total_score_kecekapan*0.1) + (($total_score_nilai/1.2)*0.1) + ($total_score_master*0.8);
            $grade_all = '';
            if ($total_score_all >= 80 ) {
                $grade_all = 'PLATINUM';
            }
            elseif ($total_score_all >= 75 && $total_score_all <= 79.99) {
                $grade_all = 'HIGH GOLD';
            }
            elseif ($total_score_all >= 70 && $total_score_all <= 74.99) {
                $grade_all = 'MID GOLD';
            }
            elseif ($total_score_all >= 65 && $total_score_all <= 69.99) {
                $grade_all = 'LOW GOLD';
            }
            elseif ($total_score_all >= 60 && $total_score_all <= 64.99) {
                $grade_all = 'HIGH SILVER';
            }
            elseif ($total_score_all >= 50 && $total_score_all <= 59.99) {
                $grade_all = 'LOW SILVER';
            }
            elseif ($total_score_all >= 1 && $total_score_all <= 49.99) {
                $grade_all = 'BRONZE';
            }
            else {
                $grade_all = 'NO GRED';
            }
            KPIAll_::find($kpiall_id)->update([
                'total_score_master'=>  $total_score_master,
                'grade_master'=>  $grade,
                'weightage_master'=>  $weightage,
                'total_score_all'=>  $total_score_all,
                'grade_all'=>  $grade_all,
                'updated_at'=> Carbon::now(),
            ]);
        }
        else {
            KPIAll_::insert([              
                'user_id'=> Auth::user()->id,
                'created_at'=> Carbon::now(),
                'year'=>  $year,
                'month'=>  $month,
            ]);
        }
        // dd('john');
        if (KPIMaster_::where('fungsi', '=', $request->fungsi)->where('user_id', '=', Auth::user()->id)->where('year', '=', $year)->where('month', '=', $month)->count() == 1) {
            // dd('john');
            $kpimasters = KPIMaster_::where('fungsi', '=', $request->fungsi)->where('user_id', '=', Auth::user()->id)->where('year', '=', $year)->where('month', '=', $month)->get();
            $kpimasters_id = count($kpimasters) > 0 ? $kpimasters->sortByDesc('created_at')->first()->id : '0';
            $total_past = KPI_::where('fungsi', $request->fungsi)->where('user_id', '=', Auth::user()->id)->where('year', '=', $year)->where('month', '=', $month)->sum('skor_sebenar');
            $total_present = $request->skor_sebenar;
            $kpiall = KPIAll_::where('user_id', '=', Auth::user()->id)->where('year', '=', $year)->where('month', '=', $month)->get();
            // dd($kpiall);
            // $percent_master = $kpimasters->percent_master;
            // dd($percent_master);
            // $percent_master = DB::table('kpi_master')->where('fungsi', '=', $request->fungsi)->pluck('percent_master');
            // dd($kpimasters_id);
            // $percent_master = KPIMaster_::find($kpimasters_id)->value('percent_master');
            // $percent_master = KPIMaster_::select('percent_master')->where('id', $kpimasters_id)->get();
            // $percent_master2 =  $percent_master->percent_master;
            // $percent_master = DB::table('kpi_master')->select('percent_master')->where('id', $kpimasters_id)->first();
            $percent_master = DB::table('kpi_master')->where('id', '=', $kpimasters_id)->where('year', '=', $year)->where('month', '=', $month)->value('percent_master');
            // dd($percent_master);
            $total_score = $total_past + $total_present;
            // $percent_master1 = $percent_master + 1;
            // dd($percent_master1);
            $skor_kpi = 0;
            $skor_sebenar = 0;
            // dd($total_score);
            if ($total_score < 30 ) {
                $skor_kpi = 0;
                $skor_sebenar = 0;
            }
            elseif ($total_score >= 30 && $total_score < 65) {
                $value1 = $total_score - 30;
                $value2 = 65 - 30;
                $skor_kpi = ((($value1/$value2)*35)+30);
                $skor_sebenar = (($percent_master/100)*$skor_kpi);
                // dd($skor_kpi);
                // dd($skor_sebenar);
            }
            elseif ($total_score >= 65 && $total_score < 100) {
                $value1 = $total_score - 65;
                $value2 = 100 - 65;
                $skor_kpi = ((($value1/$value2)*35)+65);
                $skor_sebenar = (($percent_master/100)*$skor_kpi);
            }
            elseif ($total_score >= 100) {
                $skor_kpi = 100;
                $skor_sebenar = (($percent_master/100)*$skor_kpi);
            }

            // $skor_kpi = $total_score;
            // dd($skor_kpi);
            // $total_score_master = KPIMaster_::where('user_id', '=', Auth::user()->id)->sum('skor_sebenar');
            // $grade = '';
            // if ($total_score_master >= 80 ) {
            //     $grade = 'PLATINUM';
            // }
            // elseif ($total_score_master >= 75 && $total_score_master <= 79.99) {
            //     $grade = 'HIGH GOLD';
            // }
            // elseif ($total_score_master >= 70 && $total_score_master <= 74.99) {
            //     $grade = 'MID GOLD';
            // }
            // elseif ($total_score_master >= 65 && $total_score_master <= 69.99) {
            //     $grade = 'LOW GOLD';
            // }
            // elseif ($total_score_master >= 60 && $total_score_master <= 64.99) {
            //     $grade = 'HIGH SILVER';
            // }
            // elseif ($total_score_master >= 50 && $total_score_master <= 59.99) {
            //     $grade = 'LOW SILVER';
            // }
            // elseif ($total_score_master >= 1 && $total_score_master <= 49.99) {
            //     $grade = 'BRONZE';
            // }
            // else {
            //     $grade = 'NO GRED';
            // }
            // $weightage = KPIMaster_::where('user_id', '=', Auth::user()->id)->sum('percent_master');
            // dd($total_score_master);

            KPIMaster_::find($kpimasters_id)->update([
                'pencapaian'=>  $total_score,
                'skor_KPI'=>  $skor_kpi,
                'skor_sebenar'=>  $skor_sebenar,
                // 'total_score'=>  $total_score_master,
                // 'grade'=>  $grade,
                // 'weightage'=>  $weightage,
                'kpiall_id'=>  count($kpiall) > 0 ? $kpiall->sortByDesc('created_at')->first()->id : '0',
                'updated_at'=> Carbon::now(),
            ]);

            // dd($total_score_master);
            // dd($grade);
            // dd($kpimasters->id);
            // $total_score = KPIMaster_::where('fungsi', $request->fungsi)->where('user_id', '=', Auth::user()->id)->sum('skor_KPI');
            // dd($total_score);
        }
        else {
            // $kpimaster1 = KPIMaster_::get();
            $kpiall = KPIAll_::where('user_id', '=', Auth::user()->id)->where('year', '=', $year)->where('month', '=', $month)->get();
            $kpimaster = KPIMaster_::insert([
                'created_at'=> Carbon::now(),
                'fungsi'=> $request->fungsi,
                'user_id'=> Auth::user()->id,
                'pencapaian'=> $request->skor_sebenar,
                'kpiall_id'=>  count($kpiall) > 0 ? $kpiall->sortByDesc('created_at')->first()->id : '0',
                'year'=>  $year,
                'month'=>  $month,
                // $id1 = KPIMaster_::pluck('id'),
                // $id2 = KPIMaster_::all()->modelKeys(),
                // $id3 = DB::table('kpi_master')->insertGetId(
                //     [ 'fungsi' =>  $request->fungsi ],
                //     [ 'user_id' =>  Auth::user()->id ]
                // ),

                // $id_kpimaster = $kpimaster->id,
                // dd($id_kpimaster),
                // dd($kpimaster),
                // dd(KPIMaster_::where('fungsi', '=', 'Kad Skor Korporat')->where('user_id', '=', Auth::user()->id)->count()),
            ]);
            // dd('john');
            // dd($kpimaster);
            // $id_kpimaster = $kpimaster;
            // dd($id_kpimaster->id);
            // dd($id_kpimaster);

            // dd($id_kpimaster);

            // $id4 = KPIMaster_::where('fungsi', '=', $request->fungsi)->where('user_id', '=', Auth::user()->id)->getPdo()->lastInsertId();
            // $id4 = DB::getPdo()->lastInsertId();
            // dd($id4);
        }
        // dd('john');
        // KPIALL 
        if (KPIAll_::where('user_id', '=', Auth::user()->id)->where('year', '=', $year)->where('month', '=', $month)->count() == 1) {
            // dd('john');
            $kpiall = KPIAll_::where('user_id', '=', Auth::user()->id)->where('year', '=', $year)->where('month', '=', $month)->get();
            $kpiall_id = count($kpiall) > 0 ? $kpiall->sortByDesc('created_at')->first()->id : '0';
            $total_score_master = KPIMaster_::where('user_id', '=', Auth::user()->id)->where('year', '=', $year)->where('month', '=', $month)->sum('skor_sebenar');
            $grade = '';
            if ($total_score_master >= 80 ) {
                $grade = 'PLATINUM';
            }
            elseif ($total_score_master >= 75 && $total_score_master <= 79.99) {
                $grade = 'HIGH GOLD';
            }
            elseif ($total_score_master >= 70 && $total_score_master <= 74.99) {
                $grade = 'MID GOLD';
            }
            elseif ($total_score_master >= 65 && $total_score_master <= 69.99) {
                $grade = 'LOW GOLD';
            }
            elseif ($total_score_master >= 60 && $total_score_master <= 64.99) {
                $grade = 'HIGH SILVER';
            }
            elseif ($total_score_master >= 50 && $total_score_master <= 59.99) {
                $grade = 'LOW SILVER';
            }
            elseif ($total_score_master >= 1 && $total_score_master <= 49.99) {
                $grade = 'BRONZE';
            }
            else {
                $grade = 'NO GRED';
            }
            $weightage = KPIMaster_::where('user_id', '=', Auth::user()->id)->where('year', '=', $year)->where('month', '=', $month)->sum('percent_master');
            $total_score_kecekapan = Kecekapan_::where('user_id', '=', Auth::user()->id)->where('year', '=', $year)->where('month', '=', $month)->sum('skor_sebenar');
            $total_score_nilai = Nilai_::where('user_id', '=', Auth::user()->id)->where('year', '=', $year)->where('month', '=', $month)->sum('skor_sebenar');
            $total_score_all = ($total_score_kecekapan*0.1) + (($total_score_nilai/1.2)*0.1) + ($total_score_master*0.8);
            $grade_all = '';
            if ($total_score_all >= 80 ) {
                $grade_all = 'PLATINUM';
            }
            elseif ($total_score_all >= 75 && $total_score_all <= 79.99) {
                $grade_all = 'HIGH GOLD';
            }
            elseif ($total_score_all >= 70 && $total_score_all <= 74.99) {
                $grade_all = 'MID GOLD';
            }
            elseif ($total_score_all >= 65 && $total_score_all <= 69.99) {
                $grade_all = 'LOW GOLD';
            }
            elseif ($total_score_all >= 60 && $total_score_all <= 64.99) {
                $grade_all = 'HIGH SILVER';
            }
            elseif ($total_score_all >= 50 && $total_score_all <= 59.99) {
                $grade_all = 'LOW SILVER';
            }
            elseif ($total_score_all >= 1 && $total_score_all <= 49.99) {
                $grade_all = 'BRONZE';
            }
            else {
                $grade_all = 'NO GRED';
            }
            KPIAll_::find($kpiall_id)->update([
                'total_score_master'=>  $total_score_master,
                'grade_master'=>  $grade,
                'weightage_master'=>  $weightage,
                'total_score_all'=>  $total_score_all,
                'grade_all'=>  $grade_all,
                'updated_at'=> Carbon::now(),
            ]);
        }
        // $id_kpimaster = DB::getPdo()->lastInsertId();
        // $id_kpimaster = DB::getPdo()->lastInsertId();
        // dd( $kpimaster);
        // $id_kpimaster = $kpimaster->id;
        // dd($id_kpimaster);
        // dd($id4);
        // dd(Auth::user()->id);

        $kpimasters = KPIMaster_::where('fungsi', '=', $request->fungsi)->where('user_id', '=', Auth::user()->id)->where('year', '=', $year)->where('month', '=', $month)->get();
        // $kpiall = KPIAll_::where('user_id', '=', Auth::user()->id)->get();

        // dd($request->bukti_path);
        $this->bukti_path = $request->bukti_path;
        if ($this->bukti_path != NULL) {
            // $this->bukti_path = $request->bukti_path;
            $filenameWithExt = $this->bukti_path->getClientOriginalName();
            $extension = $this->bukti_path->getClientOriginalExtension();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $fileNameToStore = $filename . '_' . time() . '.' . $extension;
            $this->bukti_path->storeAs('public' . DIRECTORY_SEPARATOR . 'filebukti', $fileNameToStore);
            $path = '' . DIRECTORY_SEPARATOR . 'storage' . DIRECTORY_SEPARATOR . 'filebukti' . DIRECTORY_SEPARATOR . '' . $fileNameToStore;

            KPI_::insert([
            'user_id'=> Auth::user()->id,
            'created_at'=> Carbon::now(),
            'updated_at'=> Carbon::now(),
            // dd(Auth::user()->id),
            // 'grade'=> $request->grade,
            // 'weightage'=> $request->weightage,
            // 'total_score'=> $request->total_score,
            'year'=> $year,
            'month'=> $month,
            'fungsi'=> $request->fungsi,
            // 'objektif'=> $request->objektif,
            'bukti'=> $request->bukti,
            // 'link'=> $request->link,
            'ukuran'=> $request->ukuran,
            'peratus'=> $request->peratus,
            'threshold'=> $request->threshold,
            'base'=> $request->base,
            'stretch'=> $request->stretch,
            'pencapaian'=> $request->pencapaian,
            'skor_KPI'=> $request->skor_KPI,
            'skor_sebenar'=> $request->skor_sebenar,
            'bukti_path'=> $path,
            // 'kpimaster_id' => 3,
            'kpimaster_id' => count($kpimasters) > 0 ? $kpimasters->sortByDesc('created_at')->first()->id : '0',
            // dd($request->skor_sebenar),
            // 'kpimaster_id' => Auth::user()->id,
            ]);
        }else   {
            KPI_::insert([
            'user_id'=> Auth::user()->id,
            'created_at'=> Carbon::now(),
            'updated_at'=> Carbon::now(),
            'year'=> $year,
            'month'=> $month,
            'fungsi'=> $request->fungsi,
            'bukti'=> $request->bukti,
            'ukuran'=> $request->ukuran,
            'peratus'=> $request->peratus,
            'threshold'=> $request->threshold,
            'base'=> $request->base,
            'stretch'=> $request->stretch,
            'pencapaian'=> $request->pencapaian,
            'skor_KPI'=> $request->skor_KPI,
            'skor_sebenar'=> $request->skor_sebenar,
            'kpimaster_id' => count($kpimasters) > 0 ? $kpimasters->sortByDesc('created_at')->first()->id : '0',
            ]);
        }
        // dd($total_score);
        // Bukti::insert([
        
        //     'user_id'=> Auth::user()->id,
        //     'created_at'=> Carbon::now(),
        //     'updated_at'=> Carbon::now(),

        //     // TajuK Objektif - Bukti Form
        //     'bukti'=> $request->bukti,
        //     dd($request->id),
        //     'kpi_id'=> $request->id,
        //     'link'=> $request->link,
        //     'file_name'=> 'john',
        //     'file_path'=> 'john',
        //     'file_type'=> 'john',

        // ]);
        return redirect()->back()->with('message', 'KPI has been successfully inserted');
        // dd($total_score);
    } 
       
    public function kpi_edit($id, $date_id, $user_id, $year, $month) {
        $kpi = KPI_::find($id);
        $status = Date_::where('user_id', '=', Auth::user()->id)->where('year', '=', $year)->where('month', '=', $month)->value('status');
        return view('livewire.form_kpi' , compact('kpi', 'date_id', 'user_id', 'year', 'month', 'status'));
    }

    public function kpi_update(Request $request, $id, $date_id, $user_id, $year, $month) {
        $validatedData = $request->validate([
            'fungsi' => ['required'],
            // 'objektif' => ['required'],
            'bukti' => ['required'],
            'peratus' => ['required'],
            'ukuran' => ['required'],
            'threshold' => ['required'],
            'base' => ['required'],
            'stretch' => ['required'],
            'pencapaian' => ['required'],
            'skor_KPI' => ['required'],
            'skor_sebenar' => ['required'],
            // 'grade' => ['required'],
            // 'total_score' => ['required', 'numeric'],
            // 'weightage' => ['required', 'numeric'],
        ]);

        Date_::find($date_id)->update([
            'status'=> 'Not Submitted',
        ]);

        // dd($request->bukti_path);
        $this->bukti_path = $request->bukti_path;
        if ($this->bukti_path != NULL) {
            // $this->bukti_path = $request->bukti_path;
            $filenameWithExt = $this->bukti_path->getClientOriginalName();
            $extension = $this->bukti_path->getClientOriginalExtension();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $fileNameToStore = $filename . '_' . time() . '.' . $extension;
            $this->bukti_path->storeAs('public' . DIRECTORY_SEPARATOR . 'filebukti', $fileNameToStore);
            $path = '' . DIRECTORY_SEPARATOR . 'storage' . DIRECTORY_SEPARATOR . 'filebukti' . DIRECTORY_SEPARATOR . '' . $fileNameToStore;

            $update = KPI_::find($id)->update([
                'user_id'=> Auth::user()->id,
                'created_at'=> Carbon::now(),
                'updated_at'=> Carbon::now(),
                // 'grade'=> $request->grade,
                // 'weightage'=> $request->weightage,
                // 'total_score'=> $request->total_score,
                'year'=> $request->year,
                'month'=> $request->month,
                // 'objektif'=> $request->objektif,
                'fungsi'=> $request->fungsi,
                'bukti'=> $request->bukti,
                // 'link'=> $request->link,
                'ukuran'=> $request->ukuran,
                'peratus'=> $request->peratus,
                'threshold'=> $request->threshold,
                'base'=> $request->base,
                'stretch'=> $request->stretch,
                'pencapaian'=> $request->pencapaian,
                'skor_KPI'=> $request->skor_KPI,
                'skor_sebenar'=> $request->skor_sebenar,
                'bukti_path'=> $path,
            ]);
        }

        if ($this->bukti_path == NULL) {
            $update = KPI_::find($id)->update([
                'user_id'=> Auth::user()->id,
                'created_at'=> Carbon::now(),
                'updated_at'=> Carbon::now(),
                // 'grade'=> $request->grade,
                // 'weightage'=> $request->weightage,
                // 'total_score'=> $request->total_score,
                'year'=> $request->year,
                'month'=> $request->month,
                // 'objektif'=> $request->objektif,
                'fungsi'=> $request->fungsi,
                'bukti'=> $request->bukti,
                // 'link'=> $request->link,
                'ukuran'=> $request->ukuran,
                'peratus'=> $request->peratus,
                'threshold'=> $request->threshold,
                'base'=> $request->base,
                'stretch'=> $request->stretch,
                'pencapaian'=> $request->pencapaian,
                'skor_KPI'=> $request->skor_KPI,
                'skor_sebenar'=> $request->skor_sebenar,
            ]);
        }


        return redirect('employee/kpi/'.$date_id.'/'.$user_id.'/'.$year.'/'.$month)->with('message', 'KPI Updated Successfully');
        // return redirect()->route('add-kpi')->with('message', 'KPI Updated Successfully');

    }
    // public function kpi_delete($id) {
    //     $delete = KPI_::find($id)->forceDelete();
    //     return redirect()->back()->with('message', 'KPI deleted successfully');
    // }
    // public function bukti_main($id) {
    //     $kpi = KPI_::find($id);
    //     // dd($id);
    //     // $bukti = Bukti::find($id);
    //     // dd($bukti);
    //     return view('employee.main_bukti' , compact('kpi') );
    // }

    // public function bukti_update(Request $request, $id) { 
    //     //  dd($this->file_path);
    //     // if ($this->file_path) {
    //     //     // dd($this->file_path);
    //     //     // Get thumbnailname with the extension
    //     //     $filenameWithExt = $this->file_path->getClientOriginalName();
    //     //     $extension = $this->file_path->getClientOriginalExtension();
    //     //     // $target_path = $filenameWithExt;
    //     //     // Get just thumbnailname
    //     //     $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
    //     //     // thumbnailname to store
    //     //     $fileNameToStore = $filename . '_' . time() . '.' . $extension;
    //     //     // Upload Image
    //     //     $this->file_path->storeAs('public' . DIRECTORY_SEPARATOR . 'file_bukti', $fileNameToStore);
    //     // }

    //     // if($this->model_id)
    //     // {
    //     //     // $this->validate([
    //     //     //     'topic_name' => 'required|string|max:255',
    //     //     //     'id_lecturer' => 'required',
    //     //     // ]);
            
    //     //     $update = Bukti::find($this->model_id);
    //     //     $update->user_id = $this->user_id;
    //     //     $update->file_name = $this->file_name;
    //     //     $update->file_path = $this->file_path;
    //     //     $update->file_type = $this->file_type;
    //     //     $update->save();
    
    //     //     session()->flash('message', 'Topic successfully updated');
    //     // }
    //     // else
    //     // {
    //     //     $this->validate([
    //     //         'file_path' => 'required',
    //     //     ]);
        
    //     // $path = '' . DIRECTORY_SEPARATOR . 'storage' . DIRECTORY_SEPARATOR . 'file_bukti' . DIRECTORY_SEPARATOR . '' . $fileNameToStore;
    //     Bukti::find($id)->update([
    //         'user_id'=> Auth::user()->id,
    //         'link'=> $request->link,
    //         'bukti'=> $request->bukti,
    //         // 'file_name'=> $request->file_name,
    //         // 'file_path'=> $request->file_path,
    //         // 'file_type'=> $request->file_type,
    //     ]);
    //     // $post->body = $request->input('body');
    //     $update = Bukti::find($id);
    //         $update->user_id = Auth::user()->id;
    //         $update->link = $request->input('link');
    //         $update->bukti = $request->input('bukti');
    //     return redirect()->back()->with('message', 'bukti Updated Successfully');
    //     }
    
    // public function bukti_save(Request $request){
    //     // dd($request->bukti);
    // Bukti::insert([
        
    //         'user_id'=> Auth::user()->id,
    //         'created_at'=> Carbon::now(),
    //         'updated_at'=> Carbon::now(),
    //         'bukti'=> $request->bukti,
    //         'link'=> $request->link,
    //     ]);
    // }
    
    public function add_kpi($date_id, $user_id, $year, $month) {

        $kadskor = KPI_::where('fungsi', '=', 'Kad Skor Korporat')->Where('user_id', '=', auth()->user()->id)->where('year', '=', $year)->where('month', '=', $month)->orderBy('bukti','asc')->orderBy('created_at','asc')->get();
        $kewangan1 = KPI_::where('fungsi', '=', 'Kewangan1')->Where('user_id', '=', auth()->user()->id)->where('year', '=', $year)->where('month', '=', $month)->orderBy('bukti','asc')->orderBy('created_at','asc')->get();
        $kewangan2 = KPI_::where('fungsi', '=', 'Kewangan2')->Where('user_id', '=', auth()->user()->id)->where('year', '=', $year)->where('month', '=', $month)->orderBy('bukti','asc')->orderBy('created_at','asc')->get();
        $kewangan3 = KPI_::where('fungsi', '=', 'Kewangan3')->Where('user_id', '=', auth()->user()->id)->where('year', '=', $year)->where('month', '=', $month)->orderBy('bukti','asc')->orderBy('created_at','asc')->get();
        $kewangan4 = KPI_::where('fungsi', '=', 'Kewangan4')->Where('user_id', '=', auth()->user()->id)->where('year', '=', $year)->where('month', '=', $month)->orderBy('bukti','asc')->orderBy('created_at','asc')->get();
        $kewangan5 = KPI_::where('fungsi', '=', 'Kewangan5')->Where('user_id', '=', auth()->user()->id)->where('year', '=', $year)->where('month', '=', $month)->orderBy('bukti','asc')->orderBy('created_at','asc')->get();
        $kewangan6 = KPI_::where('fungsi', '=', 'Kewangan6')->Where('user_id', '=', auth()->user()->id)->where('year', '=', $year)->where('month', '=', $month)->orderBy('bukti','asc')->orderBy('created_at','asc')->get();
        $kewangan7 = KPI_::where('fungsi', '=', 'Kewangan7')->Where('user_id', '=', auth()->user()->id)->where('year', '=', $year)->where('month', '=', $month)->orderBy('bukti','asc')->orderBy('created_at','asc')->get();
        $kewangan8 = KPI_::where('fungsi', '=', 'Kewangan8')->Where('user_id', '=', auth()->user()->id)->where('year', '=', $year)->where('month', '=', $month)->orderBy('bukti','asc')->orderBy('created_at','asc')->get();
        $kewangan9 = KPI_::where('fungsi', '=', 'Kewangan9')->Where('user_id', '=', auth()->user()->id)->where('year', '=', $year)->where('month', '=', $month)->orderBy('bukti','asc')->orderBy('created_at','asc')->get();
        $kewangan10 = KPI_::where('fungsi', '=', 'Kewangan10')->Where('user_id', '=', auth()->user()->id)->where('year', '=', $year)->where('month', '=', $month)->orderBy('bukti','asc')->orderBy('created_at','asc')->get();
        $pelangganI = KPI_::where('fungsi', '=', 'Pelanggan (Internal)')->Where('user_id', '=', auth()->user()->id)->where('year', '=', $year)->where('month', '=', $month)->orderBy('bukti','asc')->orderBy('created_at','asc')->get();
        $pelangganII = KPI_::where('fungsi', '=', 'Pelanggan (External)')->Where('user_id', '=', auth()->user()->id)->where('year', '=', $year)->where('month', '=', $month)->orderBy('bukti','asc')->orderBy('created_at','asc')->get();
        $kecemerlangan1 = KPI_::where('fungsi', '=', 'Kecemerlangan Operasi1')->Where('user_id', '=', auth()->user()->id)->where('year', '=', $year)->where('month', '=', $month)->orderBy('bukti','asc')->orderBy('created_at','asc')->get();
        $kecemerlangan2 = KPI_::where('fungsi', '=', 'Kecemerlangan Operasi2')->Where('user_id', '=', auth()->user()->id)->where('year', '=', $year)->where('month', '=', $month)->orderBy('bukti','asc')->orderBy('created_at','asc')->get();
        $kecemerlangan3 = KPI_::where('fungsi', '=', 'Kecemerlangan Operasi3')->Where('user_id', '=', auth()->user()->id)->where('year', '=', $year)->where('month', '=', $month)->orderBy('bukti','asc')->orderBy('created_at','asc')->get();
        $kecemerlangan4 = KPI_::where('fungsi', '=', 'Kecemerlangan Operasi4')->Where('user_id', '=', auth()->user()->id)->where('year', '=', $year)->where('month', '=', $month)->orderBy('bukti','asc')->orderBy('created_at','asc')->get();
        $kecemerlangan5 = KPI_::where('fungsi', '=', 'Kecemerlangan Operasi5')->Where('user_id', '=', auth()->user()->id)->where('year', '=', $year)->where('month', '=', $month)->orderBy('bukti','asc')->orderBy('created_at','asc')->get();
        $training = KPI_::where('fungsi', '=', 'Manusia & Proses (Training)')->Where('user_id', '=', auth()->user()->id)->where('year', '=', $year)->where('month', '=', $month)->orderBy('bukti','asc')->orderBy('created_at','asc')->get();
        $ncr = KPI_::where('fungsi', '=', 'Manusia & Proses (NCROFI)')->Where('user_id', '=', auth()->user()->id)->where('year', '=', $year)->where('month', '=', $month)->orderBy('bukti','asc')->orderBy('created_at','asc')->get();
        $kolaborasi = KPI_::where('fungsi', '=', 'Kolaborasi')->Where('user_id', '=', auth()->user()->id)->where('year', '=', $year)->where('month', '=', $month)->orderBy('bukti','asc')->orderBy('created_at','asc')->get();

        $kadskorcount = $kadskor->count();
        $kewangan1count = $kewangan1->count();
        $kewangan2count = $kewangan2->count();
        $kewangan3count = $kewangan3->count();
        $kewangan4count = $kewangan4->count();
        $kewangan5count = $kewangan5->count();
        $kewangan6count = $kewangan6->count();
        $kewangan7count = $kewangan7->count();
        $kewangan8count = $kewangan8->count();
        $kewangan9count = $kewangan9->count();
        $kewangan10count = $kewangan10->count();
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

        $kadskormaster = KPIMaster_::where('fungsi', '=', 'Kad Skor Korporat')->Where('user_id', '=', auth()->user()->id)->where('year', '=', $year)->where('month', '=', $month)->orderBy('created_at','desc')->get();
        $kewangan1master = KPIMaster_::where('fungsi', '=', 'Kewangan1')->Where('user_id', '=', auth()->user()->id)->where('year', '=', $year)->where('month', '=', $month)->orderBy('created_at','desc')->get();
        $kewangan2master = KPIMaster_::where('fungsi', '=', 'Kewangan2')->Where('user_id', '=', auth()->user()->id)->where('year', '=', $year)->where('month', '=', $month)->orderBy('created_at','desc')->get();
        $kewangan3master = KPIMaster_::where('fungsi', '=', 'Kewangan3')->Where('user_id', '=', auth()->user()->id)->where('year', '=', $year)->where('month', '=', $month)->orderBy('created_at','desc')->get();
        $kewangan4master = KPIMaster_::where('fungsi', '=', 'Kewangan4')->Where('user_id', '=', auth()->user()->id)->where('year', '=', $year)->where('month', '=', $month)->orderBy('created_at','desc')->get();
        $kewangan5master = KPIMaster_::where('fungsi', '=', 'Kewangan5')->Where('user_id', '=', auth()->user()->id)->where('year', '=', $year)->where('month', '=', $month)->orderBy('created_at','desc')->get();
        $kewangan6master = KPIMaster_::where('fungsi', '=', 'Kewangan6')->Where('user_id', '=', auth()->user()->id)->where('year', '=', $year)->where('month', '=', $month)->orderBy('created_at','desc')->get();
        $kewangan7master = KPIMaster_::where('fungsi', '=', 'Kewangan7')->Where('user_id', '=', auth()->user()->id)->where('year', '=', $year)->where('month', '=', $month)->orderBy('created_at','desc')->get();
        $kewangan8master = KPIMaster_::where('fungsi', '=', 'Kewangan8')->Where('user_id', '=', auth()->user()->id)->where('year', '=', $year)->where('month', '=', $month)->orderBy('created_at','desc')->get();
        $kewangan9master = KPIMaster_::where('fungsi', '=', 'Kewangan9')->Where('user_id', '=', auth()->user()->id)->where('year', '=', $year)->where('month', '=', $month)->orderBy('created_at','desc')->get();
        $kewangan10master = KPIMaster_::where('fungsi', '=', 'Kewangan10')->Where('user_id', '=', auth()->user()->id)->where('year', '=', $year)->where('month', '=', $month)->orderBy('created_at','desc')->get();
        $pelangganImaster = KPIMaster_::where('fungsi', '=', 'Pelanggan (Internal)')->Where('user_id', '=', auth()->user()->id)->where('year', '=', $year)->where('month', '=', $month)->orderBy('created_at','desc')->get();
        $pelangganIImaster = KPIMaster_::where('fungsi', '=', 'Pelanggan (External)')->Where('user_id', '=', auth()->user()->id)->where('year', '=', $year)->where('month', '=', $month)->orderBy('created_at','desc')->get();
        $kecemerlangan1master = KPIMaster_::where('fungsi', '=', 'Kecemerlangan Operasi1')->Where('user_id', '=', auth()->user()->id)->where('year', '=', $year)->where('month', '=', $month)->orderBy('created_at','desc')->get();
        $kecemerlangan2master = KPIMaster_::where('fungsi', '=', 'Kecemerlangan Operasi2')->Where('user_id', '=', auth()->user()->id)->where('year', '=', $year)->where('month', '=', $month)->orderBy('created_at','desc')->get();
        $kecemerlangan3master = KPIMaster_::where('fungsi', '=', 'Kecemerlangan Operasi3')->Where('user_id', '=', auth()->user()->id)->where('year', '=', $year)->where('month', '=', $month)->orderBy('created_at','desc')->get();
        $kecemerlangan4master = KPIMaster_::where('fungsi', '=', 'Kecemerlangan Operasi4')->Where('user_id', '=', auth()->user()->id)->where('year', '=', $year)->where('month', '=', $month)->orderBy('created_at','desc')->get();
        $kecemerlangan5master = KPIMaster_::where('fungsi', '=', 'Kecemerlangan Operasi5')->Where('user_id', '=', auth()->user()->id)->where('year', '=', $year)->where('month', '=', $month)->orderBy('created_at','desc')->get();
        $trainingmaster = KPIMaster_::where('fungsi', '=', 'Manusia & Proses (Training)')->Where('user_id', '=', auth()->user()->id)->where('year', '=', $year)->where('month', '=', $month)->orderBy('created_at','desc')->get();
        $ncrmaster = KPIMaster_::where('fungsi', '=', 'Manusia & Proses (NCROFI)')->Where('user_id', '=', auth()->user()->id)->where('year', '=', $year)->where('month', '=', $month)->orderBy('created_at','desc')->get();
        $kolaborasimaster = KPIMaster_::where('fungsi', '=', 'Kolaborasi')->Where('user_id', '=', auth()->user()->id)->where('year', '=', $year)->where('month', '=', $month)->orderBy('created_at','desc')->get();

        $weightage_master = KpiAll_::where('user_id', '=', Auth::user()->id)->where('year', '=', $year)->where('month', '=', $month)->value('weightage_master');
        $weightage_kadskor = $kadskor->sum('peratus');
        $weightage_kewangan1 = $kewangan1->sum('peratus');
        $weightage_kewangan2 = $kewangan2->sum('peratus');
        $weightage_kewangan3 = $kewangan3->sum('peratus');
        $weightage_kewangan4 = $kewangan4->sum('peratus');
        $weightage_kewangan5 = $kewangan5->sum('peratus');
        $weightage_kewangan6 = $kewangan6->sum('peratus');
        $weightage_kewangan7 = $kewangan7->sum('peratus');
        $weightage_kewangan8 = $kewangan8->sum('peratus');
        $weightage_kewangan9 = $kewangan9->sum('peratus');
        $weightage_kewangan10 = $kewangan10->sum('peratus');
        $weightage_pelangganI = $pelangganI->sum('peratus');
        $weightage_pelangganII = $pelangganII->sum('peratus');
        $weightage_kecemerlangan1 = $kecemerlangan1->sum('peratus');
        $weightage_kecemerlangan2 = $kecemerlangan2->sum('peratus');
        $weightage_kecemerlangan3 = $kecemerlangan3->sum('peratus');
        $weightage_kecemerlangan4 = $kecemerlangan4->sum('peratus');
        $weightage_kecemerlangan5 = $kecemerlangan5->sum('peratus');
        $weightage_training = $training->sum('peratus');
        $weightage_ncr = $ncr->sum('peratus');
        $weightage_kolaborasi = $kolaborasi->sum('peratus');

        return view('livewire.KPI', compact('kadskor', 'kewangan1', 'kewangan2', 'kewangan3', 'kewangan4', 'kewangan5', 'kewangan6', 'kewangan7', 'kewangan8', 'kewangan9', 'kewangan10', 'pelangganI', 'pelangganII', 'kecemerlangan1', 'kecemerlangan2', 'kecemerlangan3', 'kecemerlangan4', 'kecemerlangan5', 
        'training', 'ncr', 'kolaborasi', 'kadskorcount', 'kewangan1count', 'kewangan2count', 'kewangan3count', 'kewangan4count', 'kewangan5count', 'kewangan6count', 'kewangan7count', 'kewangan8count', 'kewangan9count', 'kewangan10count',  'pelangganIcount', 'pelangganIIcount', 'kecemerlangan1count', 'kecemerlangan2count', 'kecemerlangan3count', 'kecemerlangan4count', 'kecemerlangan5count', 
        'trainingcount', 'ncrcount', 'kolaborasicount', 'kadskormaster', 'kewangan1master', 'kewangan2master', 'kewangan3master', 'kewangan4master', 'kewangan5master', 'kewangan6master', 'kewangan7master', 'kewangan8master', 'kewangan9master', 'kewangan10master', 'pelangganImaster', 'pelangganIImaster', 
        'kecemerlangan1master', 'kecemerlangan2master', 'kecemerlangan3master', 'kecemerlangan4master', 'kecemerlangan5master', 'trainingmaster', 'ncrmaster', 'kolaborasimaster' , 'weightage_master', 'year', 'month', 'date_id', 'user_id',
        'weightage_kadskor', 'weightage_kewangan1', 'weightage_kewangan2', 'weightage_kewangan3', 'weightage_kewangan4', 'weightage_kewangan5', 'weightage_kewangan6', 'weightage_kewangan7', 'weightage_kewangan8', 'weightage_kewangan9', 'weightage_kewangan10', 'weightage_pelangganI', 'weightage_pelangganII', 'weightage_kecemerlangan1', 'weightage_kecemerlangan2', 'weightage_kecemerlangan3', 'weightage_kecemerlangan4', 'weightage_kecemerlangan5',
        'weightage_training', 'weightage_ncr', 'weightage_kolaborasi'));
    }

        public function render()
    {
        $date_id = $this->date_id;
        $user_id = $this->user_id;
        $year = $this->year;
        $month = $this->month;

        // dd($id);
        // $kpi = KPI_::where('user_id', '=', auth()->user()->id)->orderBy('created_at','desc')->get();
        // $bukti = Bukti::where([[ 'kpi_id', '=', '30' ]])->get();
        // $bukti = KPI_::where('user_id', '=', auth()->user()->id)->Where('role' , 'employee')->orderBy('created_at','desc')->get();
        // $kpi = KPI_::where('user_id', '=', auth()->user()->id)->orderBy('fungsi')->get();
        // $questions = Question::where([[ 'kpi_id', '=', '19' ]])->get();
        // $kpi2 = KPI_::where('user_id', '=', auth()->user()->id);
        // $users = User::whereIn('position', ['Junior Non-Executive (NE1)','Senior Non-Executive (NE2)'])->Where('role' , 'employee')->get();
        // $hrs = User::Where('department' , 'Human Resource (HR) & Administration')->orWhere('role' , 'admin')->get();
        // $weightage_master = KpiAll_::where('user_id', '=', Auth::user()->id)->value('weightage_master');

        // $kadskor = KPI_::where('fungsi', '=', 'Kad Skor Korporat')->Where('user_id', '=', auth()->user()->id)->orderBy('bukti','asc')->orderBy('created_at','asc')->get();
        // $kewangan = KPI_::where('fungsi', '=', 'Kewangan')->Where('user_id', '=', auth()->user()->id)->orderBy('bukti','asc')->orderBy('created_at','asc')->get();
        // $pelangganI = KPI_::where('fungsi', '=', 'Pelanggan (Internal)')->Where('user_id', '=', auth()->user()->id)->orderBy('bukti','asc')->orderBy('created_at','asc')->get();
        // $pelangganII = KPI_::where('fungsi', '=', 'Pelanggan (External)')->Where('user_id', '=', auth()->user()->id)->orderBy('bukti','asc')->orderBy('created_at','asc')->get();
        // $kecemerlangan = KPI_::where('fungsi', '=', 'Kecemerlangan Operasi')->Where('user_id', '=', auth()->user()->id)->orderBy('bukti','asc')->orderBy('created_at','asc')->get();
        // $training = KPI_::where('fungsi', '=', 'Manusia & Proses (Training)')->Where('user_id', '=', auth()->user()->id)->orderBy('bukti','asc')->orderBy('created_at','asc')->get();
        // $ncr = KPI_::where('fungsi', '=', 'Manusia & Proses (NCROFI)')->Where('user_id', '=', auth()->user()->id)->orderBy('bukti','asc')->orderBy('created_at','asc')->get();
        // $kolaborasi = KPI_::where('fungsi', '=', 'Kolaborasi')->Where('user_id', '=', auth()->user()->id)->orderBy('bukti','asc')->orderBy('created_at','asc')->get();

        // $kadskorcount = $kadskor->count();
        // $kewangancount = $kewangan->count();
        // $pelangganIcount = $pelangganI->count();
        // $pelangganIIcount = $pelangganII->count();
        // $kecemerlangancount = $kecemerlangan->count();
        // $trainingcount = $training->count();
        // $ncrcount = $ncr->count();
        // $kolaborasicount = $kolaborasi->count();

        // $kadskormaster = KPIMaster_::where('fungsi', '=', 'Kad Skor Korporat')->Where('user_id', '=', auth()->user()->id)->orderBy('created_at','desc')->get();
        // $kewanganmaster = KPIMaster_::where('fungsi', '=', 'Kewangan')->Where('user_id', '=', auth()->user()->id)->orderBy('created_at','desc')->get();
        // $pelangganImaster = KPIMaster_::where('fungsi', '=', 'Pelanggan (Internal)')->Where('user_id', '=', auth()->user()->id)->orderBy('created_at','desc')->get();
        // $pelangganIImaster = KPIMaster_::where('fungsi', '=', 'Pelanggan (External)')->Where('user_id', '=', auth()->user()->id)->orderBy('created_at','desc')->get();
        // $kecemerlanganmaster = KPIMaster_::where('fungsi', '=', 'Kecemerlangan Operasi')->Where('user_id', '=', auth()->user()->id)->orderBy('created_at','desc')->get();
        // $trainingmaster = KPIMaster_::where('fungsi', '=', 'Manusia & Proses (Training)')->Where('user_id', '=', auth()->user()->id)->orderBy('created_at','desc')->get();
        // $ncrmaster = KPIMaster_::where('fungsi', '=', 'Manusia & Proses (NCROFI)')->Where('user_id', '=', auth()->user()->id)->orderBy('created_at','desc')->get();
        // $kolaborasimaster = KPIMaster_::where('fungsi', '=', 'Kolaborasi')->Where('user_id', '=', auth()->user()->id)->orderBy('created_at','desc')->get();

        // $kadskormastercount = KPIMaster_::where('fungsi', '=', 'Kad Skor Korporat')->Where('user_id', '=', auth()->user()->id)->orderBy('created_at','desc')->count();
        // $kewanganmastercount = KPIMaster_::where('fungsi', '=', 'Kewangan')->Where('user_id', '=', auth()->user()->id)->orderBy('created_at','desc')->count();
        // $pelangganImastercount = KPIMaster_::where('fungsi', '=', 'Pelanggan (Internal)')->Where('user_id', '=', auth()->user()->id)->orderBy('created_at','desc')->count();
        // $pelangganIImastercount = KPIMaster_::where('fungsi', '=', 'Pelanggan (External)')->Where('user_id', '=', auth()->user()->id)->orderBy('created_at','desc')->count();
        // $kecemerlanganmastercount = KPIMaster_::where('fungsi', '=', 'Kecemerlangan Operasi')->Where('user_id', '=', auth()->user()->id)->orderBy('created_at','desc')->count();
        // $trainingmastercount = KPIMaster_::where('fungsi', '=', 'Manusia & Proses (Training)')->Where('user_id', '=', auth()->user()->id)->orderBy('created_at','desc')->count();
        // $ncrmastercount = KPIMaster_::where('fungsi', '=', 'Manusia & Proses (NCROFI)')->Where('user_id', '=', auth()->user()->id)->orderBy('created_at','desc')->count();
        // $kolaborasimastercount = KPIMaster_::where('fungsi', '=', 'Kolaborasi')->Where('user_id', '=', auth()->user()->id)->orderBy('created_at','desc')->count();

        // $userscount = User::where('role', '=', 'employee')->count();

        // $users2 = User::where('id', '=', auth()->user()->id)->get();
        // $employees = User::where('role', 'employee')->get();
        // $users->(where(function ($query) {
        //     $query->where('position', 'Junior Non-Executive (NE1)')
        //         ->where('role', '>=', 'employee');
        // })->orWhere(function($query) {
        //     $query->where('position', 'Senior Non-Executive (NE2)')
        //         ->where('role', '>=', 'employee');	
        // }))

        // dd($kpi);
        // $courses = Course::orderBy('created_at','desc')->get();

        // return view('livewire.KPI', compact('kpi', 'users', 'hrs', 'kadskor', 'kewangan', 'pelangganI', 'pelangganII', 'kecemerlangan', 
        // 'training', 'ncr', 'kolaborasi', 'kadskorcount', 'kewangancount', 'pelangganIcount', 'pelangganIIcount', 'kecemerlangancount', 
        // 'trainingcount', 'ncrcount', 'kolaborasicount', 'kadskormaster', 'kewanganmaster', 'pelangganImaster', 'pelangganIImaster', 
        // 'kecemerlanganmaster', 'trainingmaster', 'ncrmaster', 'kolaborasimaster' ,'kadskormastercount', 'kewanganmastercount', 'pelangganImastercount', 
        // 'pelangganIImastercount', 'kecemerlanganmastercount', 'trainingmastercount', 'ncrmastercount', 'kolaborasimastercount', 'weightage_master'));
        // return view('livewire.KPI');

        $kadskor = KPI_::where('fungsi', '=', 'Kad Skor Korporat')->Where('user_id', '=', auth()->user()->id)->where('year', '=', $year)->where('month', '=', $month)->orderBy('bukti','asc')->orderBy('created_at','asc')->get();
        // $kewangan = KPI_::where('fungsi', '=', 'Kewangan')->Where('user_id', '=', auth()->user()->id)->where('year', '=', $year)->where('month', '=', $month)->orderBy('bukti','asc')->orderBy('created_at','asc')->get();
        $kewangan1 = KPI_::where('fungsi', '=', 'Kewangan1')->Where('user_id', '=', auth()->user()->id)->where('year', '=', $year)->where('month', '=', $month)->orderBy('bukti','asc')->orderBy('created_at','asc')->get();
        $kewangan2 = KPI_::where('fungsi', '=', 'Kewangan2')->Where('user_id', '=', auth()->user()->id)->where('year', '=', $year)->where('month', '=', $month)->orderBy('bukti','asc')->orderBy('created_at','asc')->get();
        $kewangan3 = KPI_::where('fungsi', '=', 'Kewangan3')->Where('user_id', '=', auth()->user()->id)->where('year', '=', $year)->where('month', '=', $month)->orderBy('bukti','asc')->orderBy('created_at','asc')->get();
        $kewangan4 = KPI_::where('fungsi', '=', 'Kewangan4')->Where('user_id', '=', auth()->user()->id)->where('year', '=', $year)->where('month', '=', $month)->orderBy('bukti','asc')->orderBy('created_at','asc')->get();
        $kewangan5 = KPI_::where('fungsi', '=', 'Kewangan5')->Where('user_id', '=', auth()->user()->id)->where('year', '=', $year)->where('month', '=', $month)->orderBy('bukti','asc')->orderBy('created_at','asc')->get();
        $kewangan6 = KPI_::where('fungsi', '=', 'Kewangan6')->Where('user_id', '=', auth()->user()->id)->where('year', '=', $year)->where('month', '=', $month)->orderBy('bukti','asc')->orderBy('created_at','asc')->get();
        $kewangan7 = KPI_::where('fungsi', '=', 'Kewangan7')->Where('user_id', '=', auth()->user()->id)->where('year', '=', $year)->where('month', '=', $month)->orderBy('bukti','asc')->orderBy('created_at','asc')->get();
        $kewangan8 = KPI_::where('fungsi', '=', 'Kewangan8')->Where('user_id', '=', auth()->user()->id)->where('year', '=', $year)->where('month', '=', $month)->orderBy('bukti','asc')->orderBy('created_at','asc')->get();
        $kewangan9 = KPI_::where('fungsi', '=', 'Kewangan9')->Where('user_id', '=', auth()->user()->id)->where('year', '=', $year)->where('month', '=', $month)->orderBy('bukti','asc')->orderBy('created_at','asc')->get();
        $kewangan10 = KPI_::where('fungsi', '=', 'Kewangan10')->Where('user_id', '=', auth()->user()->id)->where('year', '=', $year)->where('month', '=', $month)->orderBy('bukti','asc')->orderBy('created_at','asc')->get();
        $pelangganI = KPI_::where('fungsi', '=', 'Pelanggan (Internal)')->Where('user_id', '=', auth()->user()->id)->where('year', '=', $year)->where('month', '=', $month)->orderBy('bukti','asc')->orderBy('created_at','asc')->get();
        $pelangganII = KPI_::where('fungsi', '=', 'Pelanggan (External)')->Where('user_id', '=', auth()->user()->id)->where('year', '=', $year)->where('month', '=', $month)->orderBy('bukti','asc')->orderBy('created_at','asc')->get();
        $kecemerlangan1 = KPI_::where('fungsi', '=', 'Kecemerlangan Operasi1')->Where('user_id', '=', auth()->user()->id)->where('year', '=', $year)->where('month', '=', $month)->orderBy('bukti','asc')->orderBy('created_at','asc')->get();
        $kecemerlangan2 = KPI_::where('fungsi', '=', 'Kecemerlangan Operasi2')->Where('user_id', '=', auth()->user()->id)->where('year', '=', $year)->where('month', '=', $month)->orderBy('bukti','asc')->orderBy('created_at','asc')->get();
        $kecemerlangan3 = KPI_::where('fungsi', '=', 'Kecemerlangan Operasi3')->Where('user_id', '=', auth()->user()->id)->where('year', '=', $year)->where('month', '=', $month)->orderBy('bukti','asc')->orderBy('created_at','asc')->get();
        $kecemerlangan4 = KPI_::where('fungsi', '=', 'Kecemerlangan Operasi4')->Where('user_id', '=', auth()->user()->id)->where('year', '=', $year)->where('month', '=', $month)->orderBy('bukti','asc')->orderBy('created_at','asc')->get();
        $kecemerlangan5 = KPI_::where('fungsi', '=', 'Kecemerlangan Operasi5')->Where('user_id', '=', auth()->user()->id)->where('year', '=', $year)->where('month', '=', $month)->orderBy('bukti','asc')->orderBy('created_at','asc')->get();
        $training = KPI_::where('fungsi', '=', 'Manusia & Proses (Training)')->Where('user_id', '=', auth()->user()->id)->where('year', '=', $year)->where('month', '=', $month)->orderBy('bukti','asc')->orderBy('created_at','asc')->get();
        $ncr = KPI_::where('fungsi', '=', 'Manusia & Proses (NCROFI)')->Where('user_id', '=', auth()->user()->id)->where('year', '=', $year)->where('month', '=', $month)->orderBy('bukti','asc')->orderBy('created_at','asc')->get();
        $kolaborasi = KPI_::where('fungsi', '=', 'Kolaborasi')->Where('user_id', '=', auth()->user()->id)->where('year', '=', $year)->where('month', '=', $month)->orderBy('bukti','asc')->orderBy('created_at','asc')->get();

        $kadskorcount = $kadskor->count();
        $kewangan1count = $kewangan1->count();
        $kewangan2count = $kewangan2->count();
        $kewangan3count = $kewangan3->count();
        $kewangan4count = $kewangan4->count();
        $kewangan5count = $kewangan5->count();
        $kewangan6count = $kewangan6->count();
        $kewangan7count = $kewangan7->count();
        $kewangan8count = $kewangan8->count();
        $kewangan9count = $kewangan9->count();
        $kewangan10count = $kewangan10->count();
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

        $kadskormaster = KPIMaster_::where('fungsi', '=', 'Kad Skor Korporat')->Where('user_id', '=', auth()->user()->id)->where('year', '=', $year)->where('month', '=', $month)->orderBy('created_at','desc')->get();
        // $kewanganmaster = KPIMaster_::where('fungsi', '=', 'Kewangan')->Where('user_id', '=', auth()->user()->id)->where('year', '=', $year)->where('month', '=', $month)->orderBy('created_at','desc')->get();
        $kewangan1master = KPIMaster_::where('fungsi', '=', 'Kewangan1')->Where('user_id', '=', auth()->user()->id)->where('year', '=', $year)->where('month', '=', $month)->orderBy('created_at','desc')->get();
        $kewangan2master = KPIMaster_::where('fungsi', '=', 'Kewangan2')->Where('user_id', '=', auth()->user()->id)->where('year', '=', $year)->where('month', '=', $month)->orderBy('created_at','desc')->get();
        $kewangan3master = KPIMaster_::where('fungsi', '=', 'Kewangan3')->Where('user_id', '=', auth()->user()->id)->where('year', '=', $year)->where('month', '=', $month)->orderBy('created_at','desc')->get();
        $kewangan4master = KPIMaster_::where('fungsi', '=', 'Kewangan4')->Where('user_id', '=', auth()->user()->id)->where('year', '=', $year)->where('month', '=', $month)->orderBy('created_at','desc')->get();
        $kewangan5master = KPIMaster_::where('fungsi', '=', 'Kewangan5')->Where('user_id', '=', auth()->user()->id)->where('year', '=', $year)->where('month', '=', $month)->orderBy('created_at','desc')->get();
        $kewangan6master = KPIMaster_::where('fungsi', '=', 'Kewangan6')->Where('user_id', '=', auth()->user()->id)->where('year', '=', $year)->where('month', '=', $month)->orderBy('created_at','desc')->get();
        $kewangan7master = KPIMaster_::where('fungsi', '=', 'Kewangan7')->Where('user_id', '=', auth()->user()->id)->where('year', '=', $year)->where('month', '=', $month)->orderBy('created_at','desc')->get();
        $kewangan8master = KPIMaster_::where('fungsi', '=', 'Kewangan8')->Where('user_id', '=', auth()->user()->id)->where('year', '=', $year)->where('month', '=', $month)->orderBy('created_at','desc')->get();
        $kewangan9master = KPIMaster_::where('fungsi', '=', 'Kewangan9')->Where('user_id', '=', auth()->user()->id)->where('year', '=', $year)->where('month', '=', $month)->orderBy('created_at','desc')->get();
        $kewangan10master = KPIMaster_::where('fungsi', '=', 'Kewangan10')->Where('user_id', '=', auth()->user()->id)->where('year', '=', $year)->where('month', '=', $month)->orderBy('created_at','desc')->get();
        $pelangganImaster = KPIMaster_::where('fungsi', '=', 'Pelanggan (Internal)')->Where('user_id', '=', auth()->user()->id)->where('year', '=', $year)->where('month', '=', $month)->orderBy('created_at','desc')->get();
        $pelangganIImaster = KPIMaster_::where('fungsi', '=', 'Pelanggan (External)')->Where('user_id', '=', auth()->user()->id)->where('year', '=', $year)->where('month', '=', $month)->orderBy('created_at','desc')->get();
        $kecemerlangan1master = KPIMaster_::where('fungsi', '=', 'Kecemerlangan Operasi1')->Where('user_id', '=', auth()->user()->id)->where('year', '=', $year)->where('month', '=', $month)->orderBy('created_at','desc')->get();
        $kecemerlangan2master = KPIMaster_::where('fungsi', '=', 'Kecemerlangan Operasi2')->Where('user_id', '=', auth()->user()->id)->where('year', '=', $year)->where('month', '=', $month)->orderBy('created_at','desc')->get();
        $kecemerlangan3master = KPIMaster_::where('fungsi', '=', 'Kecemerlangan Operasi3')->Where('user_id', '=', auth()->user()->id)->where('year', '=', $year)->where('month', '=', $month)->orderBy('created_at','desc')->get();
        $kecemerlangan4master = KPIMaster_::where('fungsi', '=', 'Kecemerlangan Operasi4')->Where('user_id', '=', auth()->user()->id)->where('year', '=', $year)->where('month', '=', $month)->orderBy('created_at','desc')->get();
        $kecemerlangan5master = KPIMaster_::where('fungsi', '=', 'Kecemerlangan Operasi5')->Where('user_id', '=', auth()->user()->id)->where('year', '=', $year)->where('month', '=', $month)->orderBy('created_at','desc')->get();
        $trainingmaster = KPIMaster_::where('fungsi', '=', 'Manusia & Proses (Training)')->Where('user_id', '=', auth()->user()->id)->where('year', '=', $year)->where('month', '=', $month)->orderBy('created_at','desc')->get();
        $ncrmaster = KPIMaster_::where('fungsi', '=', 'Manusia & Proses (NCROFI)')->Where('user_id', '=', auth()->user()->id)->where('year', '=', $year)->where('month', '=', $month)->orderBy('created_at','desc')->get();
        $kolaborasimaster = KPIMaster_::where('fungsi', '=', 'Kolaborasi')->Where('user_id', '=', auth()->user()->id)->where('year', '=', $year)->where('month', '=', $month)->orderBy('created_at','desc')->get();

        $weightage_master = KpiAll_::where('user_id', '=', Auth::user()->id)->where('year', '=', $year)->where('month', '=', $month)->value('weightage_master');
        $weightage_kadskor = $kadskor->sum('peratus');
        $weightage_kewangan1 = $kewangan1->sum('peratus');
        $weightage_kewangan2 = $kewangan2->sum('peratus');
        $weightage_kewangan3 = $kewangan3->sum('peratus');
        $weightage_kewangan4 = $kewangan4->sum('peratus');
        $weightage_kewangan5 = $kewangan5->sum('peratus');
        $weightage_kewangan6 = $kewangan6->sum('peratus');
        $weightage_kewangan7 = $kewangan7->sum('peratus');
        $weightage_kewangan8 = $kewangan8->sum('peratus');
        $weightage_kewangan9 = $kewangan9->sum('peratus');
        $weightage_kewangan10 = $kewangan10->sum('peratus');
        $weightage_pelangganI = $pelangganI->sum('peratus');
        $weightage_pelangganII = $pelangganII->sum('peratus');
        $weightage_kecemerlangan1 = $kecemerlangan1->sum('peratus');
        $weightage_kecemerlangan2 = $kecemerlangan2->sum('peratus');
        $weightage_kecemerlangan3 = $kecemerlangan3->sum('peratus');
        $weightage_kecemerlangan4 = $kecemerlangan4->sum('peratus');
        $weightage_kecemerlangan5 = $kecemerlangan5->sum('peratus');
        $weightage_training = $training->sum('peratus');
        $weightage_ncr = $ncr->sum('peratus');
        $weightage_kolaborasi = $kolaborasi->sum('peratus');

        $status = Date_::where('user_id', '=', Auth::user()->id)->where('year', '=', $year)->where('month', '=', $month)->value('status');

        return view('livewire.KPI', compact('kadskor', 'kewangan1', 'kewangan2', 'kewangan3', 'kewangan4', 'kewangan5', 'kewangan6', 'kewangan7', 'kewangan8', 'kewangan9', 'kewangan10', 'pelangganI', 'pelangganII', 'kecemerlangan1', 'kecemerlangan2', 'kecemerlangan3', 'kecemerlangan4', 'kecemerlangan5', 
        'training', 'ncr', 'kolaborasi', 'kadskorcount', 'kewangan1count', 'kewangan2count', 'kewangan3count', 'kewangan4count', 'kewangan5count', 'kewangan6count', 'kewangan7count', 'kewangan8count', 'kewangan9count', 'kewangan10count', 'pelangganIcount', 'pelangganIIcount', 'kecemerlangan1count', 'kecemerlangan2count', 'kecemerlangan3count', 'kecemerlangan4count', 'kecemerlangan5count', 
        'trainingcount', 'ncrcount', 'kolaborasicount', 'kadskormaster', 'kewangan1master', 'kewangan2master', 'kewangan3master', 'kewangan4master', 'kewangan5master', 'kewangan6master', 'kewangan7master', 'kewangan8master', 'kewangan9master', 'kewangan10master', 'pelangganImaster', 'pelangganIImaster', 
        'kecemerlangan1master', 'kecemerlangan2master', 'kecemerlangan3master', 'kecemerlangan4master', 'kecemerlangan5master', 'trainingmaster', 'ncrmaster', 'kolaborasimaster' , 'weightage_master', 'year', 'month', 'date_id', 'user_id',
        'weightage_kadskor', 'weightage_kewangan1', 'weightage_kewangan2', 'weightage_kewangan3', 'weightage_kewangan4', 'weightage_kewangan5', 'weightage_kewangan6', 'weightage_kewangan7', 'weightage_kewangan8', 'weightage_kewangan9', 'weightage_kewangan10', 'weightage_pelangganI', 'weightage_pelangganII', 'weightage_kecemerlangan1', 'weightage_kecemerlangan2', 'weightage_kecemerlangan3', 'weightage_kecemerlangan4', 'weightage_kecemerlangan5',
        'weightage_training', 'weightage_ncr', 'weightage_kolaborasi', 'status'));
    }
}