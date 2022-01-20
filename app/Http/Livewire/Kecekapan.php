<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Date_;
use App\Models\KpiAll_;
use App\Models\KPIMaster_;
use App\Models\KPI_;
use App\Models\Kecekapan_;
use App\Models\User;

use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;

class Kecekapan extends Component
{
    public $id_kecekapan;
    public $id_date;
    public $year;
    public $month;
    public $date_id;
    public $user_id;
    public $model_id;
    public $action;

    protected $listeners = [
        'delete',
        // "dd('john')"
    ];

    public function selectItem($id_kecekapan)
    {
        // dd('john');
        $this->id_kecekapan = $id_kecekapan;
        // dd($this->id_kecekapan);
    }

    public function delete()
    {
        $date_id = $this->date_id;
        $user_id = $this->user_id;
        $year = $this->year;
        $month = $this->month;
        // dd('john');
        $kecekapan = Kecekapan_::find($this->id_kecekapan);
        // dd($this->id_kecekapan);
        $kecekapan->delete();
        Date_::find($date_id)->update([
            'status'=> 'Not Submitted',
        ]);
        return redirect()->back()->with('message', 'Kecekapan deleted successfully');
    }

    public function mount($date_id, $user_id, $year, $month)
    { 
        $this->date_id = $date_id;
        $this->user_id = $user_id;
        $this->year = $year;
        $this->month = $month;
        // $this->questions = Question::find($this->id_questions);
    }

    // public function kecekapan() {
    //     $kecekapan = Kecekapan_::latest()->get();
    //     // $kpi2 = KPI_::where('user_id', '=', auth()->user()->id)->orderBy('created_at','desc')->get();
    //     // return view('livewire.create-kpi', compact('kpi', 'kpi2') );
    //     return view('livewire.create-kpi', compact('kecekapan') );
    // }

    // public function kecekapan() {
    //     $kecekapan = Kecekapan_::latest()->get();
    //     return view('livewire.add-kecekapan', compact('kecekapan') );
    // }

    public function kecekapan_save(Request $request, $date_id, $user_id, $year, $month){
        //check kat sini 
        $kecekapans = Kecekapan_::where('user_id', '=', auth()->user()->id)->where('year', '=', $year)->where('month', '=', $month)->get();
        $total_percent = 0;
        foreach ($kecekapans as $key => $kecekapan) {
            $total_percent = $total_percent + $kecekapan->peratus;
        }
        if ($total_percent > 99.99999) {
            return redirect()->back()->with('fail', 'Sorry, you have exceed the maximum of Kecekepan Teras which is 100 percent only');
        }

        $validatedData = $request->validate([
            'kecekapan_teras' => ['required'],
            // dd(Auth::user()->id),
            // 'jangkaan_hasil' => ['required'],
            // 'peratus' => ['required'],
            // 'ukuran' => ['required'],
            'skor_pekerja' => ['required'],
            // 'skor_penyelia' => ['required'],
            // 'user_id' => ['required'],

            // 'grade' => ['required'],
            // 'total_score' => ['required', 'numeric'],
            // 'weightage' => ['required', 'numeric'],
            // dd(Auth::user()->id),
        ]);

        Date_::find($date_id)->update([
            'status'=> 'Not Submitted',
        ]);

        // if (KPIAll_::where('user_id', '=', Auth::user()->id)->count() == 1) {
        //     $kpiall = KPIAll_::where('user_id', '=', Auth::user()->id)->get();
        //     $kpiall_id = count($kpiall) > 0 ? $kpiall->sortByDesc('created_at')->first()->id : '0';
        //     $total_score_kecekapan = Kecekapan_::where('user_id', '=', Auth::user()->id)->sum('skor_sebenar');
        //     $weightage = Kecekapan_::where('user_id', '=', Auth::user()->id)->sum('peratus');
        //     KPIAll_::find($kpiall_id)->update([
        //         'total_score_kecekapan'=>  $total_score_kecekapan,
        //         'weightage_kecekapan'=>  $weightage,
        //     ]);
        // }
        // else {
        //     KPIAll_::insert([              
        //         'user_id'=> Auth::user()->id,
        //     ]);
        // }

        // dd(Auth::user()->id);
        $kecekapanscount = Kecekapan_::where('user_id', '=', auth()->user()->id)->where('kecekapan_teras', '=', $request->kecekapan_teras)->where('year', '=', $year)->where('month', '=', $month)->count();
        // $past_weightage = Kecekapan_::where('user_id', '=', auth()->user()->id)->where('kecekapan_teras', '=', $request->kecekapan_teras)->sum('skor_sebenar');
        // $present_weightage = 20;
        // $total_weightage = $past_weightage + $present_weightage;
        // dd($total_weightage);
        // dd($kecekapanscount);

        // if ($kecekapanscount == 0 && $total_weightage <= 100 ) {
        if ($kecekapanscount == 0) {
            Kecekapan_::insert([
            'user_id'=> Auth::user()->id,
            // dd(Auth::user()->id),
            'created_at'=> Carbon::now(),
            'updated_at'=> Carbon::now(),
            // 'grade'=> $request->grade,
            // 'weightage'=> $request->weightage,
            'weightage'=> '20',
            // 'total_score'=> $request->total_score,
            // 'year'=> $request->year,
            // 'month'=> $request->month,
            'kecekapan_teras'=> $request->kecekapan_teras,
            // 'jangkaan_hasil'=> $request->jangkaan_hasil,
            // 'ukuran'=> $request->ukuran,
            // 'peratus'=> $request->peratus,
            'skor_pekerja'=> $request->skor_pekerja,
            'peratus'=> '20',
            'ukuran'=> 'Percentage (%)',
            'year'=> $year,
            'month'=> $month,
            // 'skor_penyelia'=> $request->skor_penyelia,
            ]);
        } else {
            return redirect()->back()->with('fail', 'Sorry, This type of Kecekapan Teras already exist');
        }
        return redirect()->back()->with('message', 'Kecekapan Teras has been successfully inserted');
    } 
       

    public function kecekapan_edit($id, $date_id, $user_id, $year, $month) {
        $kecekapan = Kecekapan_::find($id);
        return view('livewire.form_kecekapan' , compact('kecekapan', 'date_id', 'user_id', 'year', 'month'));
    }

    public function kecekapan_update(Request $request, $id, $date_id, $user_id, $year, $month) {
        if(Auth::user()->role == 'employee') {
            $validatedData = $request->validate([
                'kecekapan_teras' => ['required'],
                // dd(Auth::user()->id),
                // 'jangkaan_hasil' => ['required'],
                // 'peratus' => ['required'],
                // 'ukuran' => ['required'],
                'skor_pekerja' => ['required'],
                // 'skor_penyelia' => ['required'],
                // 'user_id' => ['required'],

                // 'grade' => ['required'],
                // 'total_score' => ['required', 'numeric'],
                // 'weightage' => ['required', 'numeric'],
                // dd(Auth::user()->id),
            ]);
        }

        Date_::find($date_id)->update([
            'status'=> 'Not Submitted',
        ]);

        // if(Auth::user()->role == 'manager') {
        //     $validatedData = $request->validate([
        //         'kecekapan_teras' => ['required'],
        //         'skor_penyelia' => ['required'],
        //     ]);
        // }

        $update = Kecekapan_::find($id)->update([
            // 'user_id'=> Auth::user()->id,
            // 'created_at'=> Carbon::now(),
            'updated_at'=> Carbon::now(),
            // 'grade'=> $request->grade,
            // 'weightage'=> '20',
            // 'total_score'=> $request->total_score,
            // 'year'=> $request->year,
            // 'month'=> $request->month,
            // 'kecekapan_teras'=> $request->kecekapan_teras,
            // 'jangkaan_hasil'=> $request->jangkaan_hasil,
            // 'ukuran'=> $request->ukuran,
            // 'peratus'=> $request->peratus,
            'skor_pekerja'=> $request->skor_pekerja,
            // 'skor_penyelia'=> $request->skor_penyelia,
            // 'status'=> 'Not Submitted',
        ]);
        // dd($year);
        // $update = User::find(Auth::user()->id)->update([
        //     'status'=> 'Not Submitted',
        // ]);
        // return redirect('pendaftaran-berjaya/' . $product_id );
        return redirect('employee/kecekapan/'.$date_id.'/'.$user_id.'/'.$year.'/'.$month)->with('message', 'Kecekapan Updated Successfully');
        // return redirect()->route('add-kecekapan')->with('message', 'Kecekapan Updated Successfully');
    }

    // public function kecekapan_delete($id) {
    //     $delete = Kecekapan_::find($id)->forceDelete();
    //     return redirect()->back()->with('message', 'Kecekapan deleted successfully');
    // }



    // public function add_kecekapan($date_id, $user_id, $year, $month) {
    //     // dd($year);
    //     $kecekapan = Kecekapan_::where('user_id', '=', auth()->user()->id)->where('year', '=', $year)->where('month', '=', $month)->orderBy('kecekapan_teras')->get();
    //     return view('livewire.kecekapan', compact('kecekapan', 'date_id', 'user_id', 'year', 'month'));
    // }

    public function render()
    {
        // dd($this->date_id);
        $date_id = $this->date_id;
        $user_id = $this->user_id;
        $year = $this->year;
        $month = $this->month;
        $status = Date_::where('user_id', '=', Auth::user()->id)->where('year', '=', $year)->where('month', '=', $month)->value('status');
        $kecekapan = Kecekapan_::where('user_id', '=', auth()->user()->id)->where('year', '=', $year)->where('month', '=', $month)->orderBy('kecekapan_teras')->get();
        return view('livewire.kecekapan', compact('kecekapan', 'date_id', 'user_id', 'year', 'month', 'status'));
    }
}