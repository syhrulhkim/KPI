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
use Illuminate\Http\Request;
use Livewire\WithFileUploads;
use Illuminate\Support\Carbon;

class KPI extends Component
{
    // public $fungsi = '';
    // public $bukti = '';

    // protected $rules = [
    //     'fungsi' => 'required|min:3',
    //     'bukti' => 'required|min:3',
    // ];

    // use WithFileUploads;
    // public $file_path;
    
    public function kpi() {

        $kpi = KPI_::latest()->get();
        // $kpi2 = KPI_::where('user_id', '=', auth()->user()->id)->orderBy('created_at','desc')->get();

        // return view('livewire.create-kpi', compact('kpi', 'kpi2') );
        return view('livewire.add-kpi', compact('kpi') );
    }

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

    public function kpi_master_edit1($id) {
        $kadskormastercount = KPIMaster_::where('fungsi', '=', 'Kad Skor Korporat')->Where('user_id', '=', auth()->user()->id)->orderBy('created_at','desc')->count();
        if ($kadskormastercount == 1) {
            $kpimaster = KPIMaster_::find($id);
            return view('livewire.form_kpimaster' , compact('kpimaster'));
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

    public function kpi_master_edit2($id) {
        $kewanganmastercount = KPIMaster_::where('fungsi', '=', 'Kewangan')->Where('user_id', '=', auth()->user()->id)->orderBy('created_at','desc')->count();
        if ($kewanganmastercount == 1) {
            $kpimaster = KPIMaster_::find($id);
            return view('livewire.form_kpimaster' , compact('kpimaster'));
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

    public function kpi_master_edit3($id) {
        $pelangganImastercount = KPIMaster_::where('fungsi', '=', 'Pelanggan (Internal)')->Where('user_id', '=', auth()->user()->id)->orderBy('created_at','desc')->count();
        if ($pelangganImastercount == 1) {
            $kpimaster = KPIMaster_::find($id);
            return view('livewire.form_kpimaster' , compact('kpimaster'));
        }
    }

    // public function kpi_master_save4(Request $request){
    //     $pelangganIImastercount = KPIMaster_::where('fungsi', '=', 'Pelanggan (Outer)')->Where('user_id', '=', auth()->user()->id)->orderBy('created_at','desc')->count();
    //     if ($pelangganIImastercount == 0) {
    //     KPIMaster_::insert([
    //         'user_id'=> Auth::user()->id,
    //         'created_at'=> Carbon::now(),
    //         'updated_at'=> Carbon::now(),
    //         'objektif'=> $request->objektif,
    //         'link'=> $request->link,
    //         'percent_master'=> $request->percent_master,
    //         'fungsi'=> 'Pelanggan (Outer)',
    //         ]);
    //         return redirect()->back()->with('message', 'KPI Master untuk Pelanggan (Outer) berjaya ditambah!');
    //     }
    //     return redirect()->back()->with('fail', 'You already have add KPI Master untuk Kad Skor Korporat!');
    // }

    public function kpi_master_edit4($id) {
        $pelangganIImastercount = KPIMaster_::where('fungsi', '=', 'Pelanggan (Outer)')->Where('user_id', '=', auth()->user()->id)->orderBy('created_at','desc')->count();
        if ($pelangganIImastercount == 1) {
            $kpimaster = KPIMaster_::find($id);
            return view('livewire.form_kpimaster' , compact('kpimaster'));
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

    public function kpi_master_edit5($id) {
        $kecemerlanganmastercount = KPIMaster_::where('fungsi', '=', 'Kecemerlangan Operasi')->Where('user_id', '=', auth()->user()->id)->orderBy('created_at','desc')->count();
        if ($kecemerlanganmastercount == 1) {
            $kpimaster = KPIMaster_::find($id);
            return view('livewire.form_kpimaster' , compact('kpimaster'));
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

    public function kpi_master_edit6($id) {
        $trainingmastercount = KPIMaster_::where('fungsi', '=', 'Manusia & Proses (Training)')->Where('user_id', '=', auth()->user()->id)->orderBy('created_at','desc')->count();
        if ($trainingmastercount == 1) {
            $kpimaster = KPIMaster_::find($id);
            return view('livewire.form_kpimaster' , compact('kpimaster'));
        }
    }

    // public function kpi_master_save7(Request $request){
    //     $ncrmastercount = KPIMaster_::where('fungsi', '=', 'Manusia & Proses (NCR/OFI)')->Where('user_id', '=', auth()->user()->id)->orderBy('created_at','desc')->count();
    //     if ($ncrmastercount == 0) {
    //     KPIMaster_::insert([
    //         'user_id'=> Auth::user()->id,
    //         'created_at'=> Carbon::now(),
    //         'updated_at'=> Carbon::now(),
    //         'objektif'=> $request->objektif,
    //         'link'=> $request->link,
    //         'percent_master'=> $request->percent_master,
    //         'fungsi'=> 'Manusia & Proses (NCR/OFI)',
    //         ]);
    //         return redirect()->back()->with('message', 'KPI Master untuk Manusia & Proses (NCR/OFI) berjaya ditambah!');
    //     }
    //     return redirect()->back()->with('fail', 'You already have add KPI Master untuk Kad Skor Korporat!');
    // }

    public function kpi_master_edit7($id) {
        $ncrmastercount = KPIMaster_::where('fungsi', '=', 'Manusia & Proses (NCR/OFI)')->Where('user_id', '=', auth()->user()->id)->orderBy('created_at','desc')->count();
        if ($ncrmastercount == 1) {
            $kpimaster = KPIMaster_::find($id);
            return view('livewire.form_kpimaster' , compact('kpimaster'));
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

    public function kpi_master_edit8($id) {
        $kolaborasimastercount = KPIMaster_::where('fungsi', '=', 'Kolaborasi')->Where('user_id', '=', auth()->user()->id)->orderBy('created_at','desc')->count();
        if ($kolaborasimastercount == 1) {
            $kpimaster = KPIMaster_::find($id);
            return view('livewire.form_kpimaster' , compact('kpimaster'));
        }
    }

    public function kpi_master_update(Request $request, $id) {
        $total_score = KPI_::where('fungsi', $request->fungsi)->where('user_id', '=', Auth::user()->id)->sum('skor_sebenar');
        $update = KPIMaster_::find($id)->update([
            // 'user_id'=> Auth::user()->id,
            // 'created_at'=> Carbon::now(),
            // 'updated_at'=> Carbon::now(),
            'objektif'=> $request->objektif,
            'link'=> $request->link,
            'percent_master'=> $request->percent_master,
            // 'fungsi'=> 'Kad Skor Korporat',
        ]);
        return redirect()->route('add-kpi')->with('message', 'KPI Master Updated Successfully');
    }
    
    public function kpi_save(Request $request){
       
        //check kat sini 
        $kadskor = KPI_::where('user_id', '=', auth()->user()->id)->where('fungsi', '=', 'Kad Skor Korporat')->get();
        $kewangan = KPI_::where('user_id', '=', auth()->user()->id)->where('fungsi', '=', 'Kewangan')->get();
        $pelangganI = KPI_::where('user_id', '=', auth()->user()->id)->where('fungsi', '=', 'Pelanggan (Internal)')->get();
        $pelangganII = KPI_::where('user_id', '=', auth()->user()->id)->where('fungsi', '=', 'Pelanggan (Outer)')->get();
        $kecemerlangan = KPI_::where('user_id', '=', auth()->user()->id)->where('fungsi', '=', 'Kecemerlangan Operasi')->get();
        $training = KPI_::where('user_id', '=', auth()->user()->id)->where('fungsi', '=', 'Manusia & Proses (Training)')->get();
        $ncr = KPI_::where('user_id', '=', auth()->user()->id)->where('fungsi', '=', 'Manusia & Proses (NCR/OFI)')->get();
        $kolaborasi = KPI_::where('user_id', '=', auth()->user()->id)->where('fungsi', '=', 'Kolaborasi')->get();

        $total_percent1 = 0;
        $total_percent2 = 0;
        $total_percent3 = 0;
        $total_percent4 = 0;
        $total_percent5 = 0;
        $total_percent6 = 0;
        $total_percent7 = 0;
        $total_percent8 = 0;

        foreach ($kadskor as $key => $kpi1) {
            $total_percent1 = $total_percent1 + $kpi1->peratus;
        }
        // dd($total_percent1);
        foreach ($kewangan as $key => $kpi2) {
            $total_percent2 = $total_percent2 + $kpi2->peratus;
        }
        foreach ($pelangganI as $key => $kpi3) {
            $total_percent3 = $total_percent3 + $kpi3->peratus;
        }
        foreach ($pelangganII as $key => $kpi4) {
            $total_percent4 = $total_percent4 + $kpi4->peratus;
        }
        foreach ($kecemerlangan as $key => $kpi5) {
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

        if($request->fungsi == 'Kad Skor Korporat'){
        if ($total_percent1 > 99.99999) {
            return redirect()->back()->with('fail', 'Maaf, anda telah melebihi had KPI untuk Kad Skor Korporat iaitu 100 peratus sahaja');
            }
        }
        if($request->fungsi == 'Kewangan'){
        if ($total_percent2 > 99.99999) {
            return redirect()->back()->with('fail', 'Maaf, anda telah melebihi had KPI untuk Kewangan iaitu 100 peratus sahaja');
        }
        }
        if($request->fungsi == 'Pelanggan (Internal)'){
        if ($total_percent3 > 99.99999) {
            return redirect()->back()->with('fail', 'Maaf, anda telah melebihi had KPI untuk Pelanggan (Internal) iaitu 100 peratus sahaja');
            }
        }
        if($request->fungsi == 'Pelanggan (Outer)'){
        if ($total_percent4 > 99.99999) {
            return redirect()->back()->with('fail', 'Maaf, anda telah melebihi had KPI untuk Pelanggan (Outer) iaitu 100 peratus sahaja');
            }
        }
        if($request->fungsi == 'Kecemerlangan Operasi'){
        if ($total_percent5 > 99.99999) {
            return redirect()->back()->with('fail', 'Maaf, anda telah melebihi had KPI untuk Kecemerlangan Operasi iaitu 100 peratus sahaja');
            }
        }
        if($request->fungsi == 'Manusia & Proses (Training)'){
        if ($total_percent6 > 99.99999) {
            return redirect()->back()->with('fail', 'Maaf, anda telah melebihi had KPI untuk Manusia & Proses (Training) iaitu 100 peratus sahaja');
            }
        }
        if($request->fungsi == 'Manusia & Proses (NCR/OFI)'){
        if ($total_percent7 > 99.99999) {
            return redirect()->back()->with('fail', 'Maaf, anda telah melebihi had KPI untuk Manusia & Proses (NCR/OFI) iaitu 100 peratus sahaja');
            }
        }
        if($request->fungsi == 'Kolaborasi'){
        if ($total_percent8 > 99.99999) {
            return redirect()->back()->with('fail', 'Maaf, anda telah melebihi had KPI untuk Kolaborasi iaitu 100 peratus sahaja');
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

            'grade' => ['required'],
            'total_score' => ['required', 'numeric'],
            'weightage' => ['required', 'numeric'],
            
        ]);

        // $total_score1 = KPI_::where('fungsi','Kad Skor Korporat')->where('user_id', '=', Auth::user()->id)->sum('skor_sebenar');
        // $total_score2 = KPI_::where('fungsi','Kewangan')->where('user_id', '=', Auth::user()->id)->sum('skor_sebenar');
        // $total_score3 = KPI_::where('fungsi','Pelanggan (Internal)')->where('user_id', '=', Auth::user()->id)->sum('skor_sebenar');
        // $total_score4 = KPI_::where('fungsi','Pelanggan (Outer)')->where('user_id', '=', Auth::user()->id)->sum('skor_sebenar');
        // $total_score5 = KPI_::where('fungsi','Kecemerlangan Operasi')->where('user_id', '=', Auth::user()->id)->sum('skor_sebenar');
        // $total_score6 = KPI_::where('fungsi','Manusia & Proses (Training)')->where('user_id', '=', Auth::user()->id)->sum('skor_sebenar');
        // $total_score7 = KPI_::where('fungsi','Manusia & Proses (NCR/OFI)')->where('user_id', '=', Auth::user()->id)->sum('skor_sebenar');
        // $total_score8 = KPI_::where('fungsi','Kolaborasi')->where('user_id', '=', Auth::user()->id)->sum('skor_sebenar');
       


        // dd($total_score6);
        // $kpimaster1 = 0;
        // $id_kpimaster = DB::getPdo()->lastInsertId();

        if (KPIMaster_::where('fungsi', '=', $request->fungsi)->where('user_id', '=', Auth::user()->id)->count() == 1) {
            // dd('john');
            $kpimasters = KPIMaster_::where('fungsi', '=', $request->fungsi)->where('user_id', '=', Auth::user()->id)->get();
            $kpimasters_id = count($kpimasters) > 0 ? $kpimasters->sortByDesc('created_at')->first()->id : '0';
            $total_score = KPI_::where('fungsi', $request->fungsi)->where('user_id', '=', Auth::user()->id)->sum('skor_sebenar');
            $total_score2 = $request->skor_sebenar;
            // $percent_master = $kpimasters->percent_master;
            // dd($percent_master);
            KPIMaster_::find($kpimasters_id)->update([
                'pencapaian'=> $total_score + $total_score2,
            ]);
            // dd($kpimasters->id);
            // $total_score = KPIMaster_::where('fungsi', $request->fungsi)->where('user_id', '=', Auth::user()->id)->sum('skor_KPI');
            // dd($total_score);
        }
        else {
            // $kpimaster1 = KPIMaster_::get();


            $kpimaster = KPIMaster_::insert([
                'fungsi'=> $request->fungsi,
                'user_id'=> Auth::user()->id,
                'pencapaian'=> $request->skor_sebenar,
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
            // dd($kpimaster);
            // $id_kpimaster = $kpimaster;
            // dd($id_kpimaster->id);
            // dd($id_kpimaster);

            // dd($id_kpimaster);

            // $id4 = KPIMaster_::where('fungsi', '=', $request->fungsi)->where('user_id', '=', Auth::user()->id)->getPdo()->lastInsertId();
            // $id4 = DB::getPdo()->lastInsertId();
            // dd($id4);
        }
        // $id_kpimaster = DB::getPdo()->lastInsertId();
        // $id_kpimaster = DB::getPdo()->lastInsertId();

        // dd( $kpimaster);
        // $id_kpimaster = $kpimaster->id;
        // dd($id_kpimaster);

        // dd($id4);
        // dd(Auth::user()->id);

        $kpimasters = KPIMaster_::where('fungsi', '=', $request->fungsi)->where('user_id', '=', Auth::user()->id)->get();
        KPI_::insert([
        'user_id'=> Auth::user()->id,
        'created_at'=> Carbon::now(),
        'updated_at'=> Carbon::now(),
        // dd(Auth::user()->id),
        'grade'=> $request->grade,
        'weightage'=> $request->weightage,

        'total_score'=> $request->total_score,
        'tahun'=> $request->tahun,
        'bulan'=> $request->bulan,

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
        // 'kpimaster_id' => 3,
        'kpimaster_id' => count($kpimasters) > 0 ? $kpimasters->sortByDesc('created_at')->first()->id : '0',
        // dd($request->skor_sebenar),
        // 'kpimaster_id' => Auth::user()->id,
        
        ]);
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

        return redirect()->back()->with('message', 'KPI berjaya ditambah!');
        // dd($total_score);
    } 
       
    public function kpi_edit($id) {

        $kpi = KPI_::find($id);

        return view('livewire.form_kpi' , compact('kpi'));

    }

    public function kpi_update(Request $request, $id) {

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

            'grade' => ['required'],
            'total_score' => ['required', 'numeric'],
            'weightage' => ['required', 'numeric'],
            
        ]);

        $update = KPI_::find($id)->update([

            'user_id'=> Auth::user()->id,
            'created_at'=> Carbon::now(),
            'updated_at'=> Carbon::now(),


            'grade'=> $request->grade,
            'weightage'=> $request->weightage,

            'total_score'=> $request->total_score,
            'tahun'=> $request->tahun,
            'bulan'=> $request->bulan,

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


        return redirect()->route('add-kpi')->with('message', 'KPI Updated Successfully');

    }

    public function kpi_delete($id) {

        $delete = KPI_::find($id)->forceDelete();

        return redirect()->back()->with('message', 'KPI Deleted Successfully');
    }

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
        public function render()
    {
        $kpi = KPI_::where('user_id', '=', auth()->user()->id)->orderBy('created_at','desc')->get();
        // $bukti = Bukti::where([[ 'kpi_id', '=', '30' ]])->get();
        // $bukti = KPI_::where('user_id', '=', auth()->user()->id)->Where('role' , 'employee')->orderBy('created_at','desc')->get();
        // $kpi = KPI_::where('user_id', '=', auth()->user()->id)->orderBy('fungsi')->get();
        // $questions = Question::where([[ 'kpi_id', '=', '19' ]])->get();
        // $kpi2 = KPI_::where('user_id', '=', auth()->user()->id);
        $users = User::whereIn('position', ['Junior Non-Executive (NE1)','Senior Non-Executive (NE2)'])->Where('role' , 'employee')->get();
        $hrs = User::Where('hr' , 'yes')->orWhere('role' , 'admin')->get();

        $kadskor = KPI_::where('fungsi', '=', 'Kad Skor Korporat')->Where('user_id', '=', auth()->user()->id)->orderBy('created_at','desc')->get();
        $kewangan = KPI_::where('fungsi', '=', 'Kewangan')->Where('user_id', '=', auth()->user()->id)->orderBy('created_at','desc')->get();
        $pelangganI = KPI_::where('fungsi', '=', 'Pelanggan (Internal)')->Where('user_id', '=', auth()->user()->id)->orderBy('created_at','desc')->get();
        $pelangganII = KPI_::where('fungsi', '=', 'Pelanggan (Outer)')->Where('user_id', '=', auth()->user()->id)->orderBy('created_at','desc')->get();
        $kecemerlangan = KPI_::where('fungsi', '=', 'Kecemerlangan Operasi')->Where('user_id', '=', auth()->user()->id)->orderBy('created_at','desc')->get();
        $training = KPI_::where('fungsi', '=', 'Manusia & Proses (Training)')->Where('user_id', '=', auth()->user()->id)->orderBy('created_at','desc')->get();
        $ncr = KPI_::where('fungsi', '=', 'Manusia & Proses (NCR/OFI)')->Where('user_id', '=', auth()->user()->id)->orderBy('created_at','desc')->get();
        $kolaborasi = KPI_::where('fungsi', '=', 'Kolaborasi')->Where('user_id', '=', auth()->user()->id)->orderBy('created_at','desc')->get();

        $kadskorcount = $kadskor->count();
        $kewangancount = $kewangan->count();
        $pelangganIcount = $pelangganI->count();
        $pelangganIIcount = $pelangganII->count();
        $kecemerlangancount = $kecemerlangan->count();
        $trainingcount = $training->count();
        $ncrcount = $ncr->count();
        $kolaborasicount = $kolaborasi->count();

        $kadskormaster = KPIMaster_::where('fungsi', '=', 'Kad Skor Korporat')->Where('user_id', '=', auth()->user()->id)->orderBy('created_at','desc')->get();
        $kewanganmaster = KPIMaster_::where('fungsi', '=', 'Kewangan')->Where('user_id', '=', auth()->user()->id)->orderBy('created_at','desc')->get();
        $pelangganImaster = KPIMaster_::where('fungsi', '=', 'Pelanggan (Internal)')->Where('user_id', '=', auth()->user()->id)->orderBy('created_at','desc')->get();
        $pelangganIImaster = KPIMaster_::where('fungsi', '=', 'Pelanggan (Outer)')->Where('user_id', '=', auth()->user()->id)->orderBy('created_at','desc')->get();
        $kecemerlanganmaster = KPIMaster_::where('fungsi', '=', 'Kecemerlangan Operasi')->Where('user_id', '=', auth()->user()->id)->orderBy('created_at','desc')->get();
        $trainingmaster = KPIMaster_::where('fungsi', '=', 'Manusia & Proses (Training)')->Where('user_id', '=', auth()->user()->id)->orderBy('created_at','desc')->get();
        $ncrmaster = KPIMaster_::where('fungsi', '=', 'Manusia & Proses (NCR/OFI)')->Where('user_id', '=', auth()->user()->id)->orderBy('created_at','desc')->get();
        $kolaborasimaster = KPIMaster_::where('fungsi', '=', 'Kolaborasi')->Where('user_id', '=', auth()->user()->id)->orderBy('created_at','desc')->get();

        $kadskormastercount = KPIMaster_::where('fungsi', '=', 'Kad Skor Korporat')->Where('user_id', '=', auth()->user()->id)->orderBy('created_at','desc')->count();
        $kewanganmastercount = KPIMaster_::where('fungsi', '=', 'Kewangan')->Where('user_id', '=', auth()->user()->id)->orderBy('created_at','desc')->count();
        $pelangganImastercount = KPIMaster_::where('fungsi', '=', 'Pelanggan (Internal)')->Where('user_id', '=', auth()->user()->id)->orderBy('created_at','desc')->count();
        $pelangganIImastercount = KPIMaster_::where('fungsi', '=', 'Pelanggan (Outer)')->Where('user_id', '=', auth()->user()->id)->orderBy('created_at','desc')->count();
        $kecemerlanganmastercount = KPIMaster_::where('fungsi', '=', 'Kecemerlangan Operasi')->Where('user_id', '=', auth()->user()->id)->orderBy('created_at','desc')->count();
        $trainingmastercount = KPIMaster_::where('fungsi', '=', 'Manusia & Proses (Training)')->Where('user_id', '=', auth()->user()->id)->orderBy('created_at','desc')->count();
        $ncrmastercount = KPIMaster_::where('fungsi', '=', 'Manusia & Proses (NCR/OFI)')->Where('user_id', '=', auth()->user()->id)->orderBy('created_at','desc')->count();
        $kolaborasimastercount = KPIMaster_::where('fungsi', '=', 'Kolaborasi')->Where('user_id', '=', auth()->user()->id)->orderBy('created_at','desc')->count();

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

        return view('livewire.kpi', compact('kpi', 'users', 'hrs', 'kadskor', 'kewangan', 'pelangganI', 'pelangganII', 'kecemerlangan', 
        'training', 'ncr', 'kolaborasi', 'kadskorcount', 'kewangancount', 'pelangganIcount', 'pelangganIIcount', 'kecemerlangancount', 
        'trainingcount', 'ncrcount', 'kolaborasicount', 'kadskormaster', 'kewanganmaster', 'pelangganImaster', 'pelangganIImaster', 
        'kecemerlanganmaster', 'trainingmaster', 'ncrmaster', 'kolaborasimaster' ,'kadskormastercount', 'kewanganmastercount', 'pelangganImastercount', 
        'pelangganIImastercount', 'kecemerlanganmastercount', 'trainingmastercount', 'ncrmastercount', 'kolaborasimastercount'));
        // return view('livewire.kpi');
    }
}