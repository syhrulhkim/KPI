<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\KPI_;
use App\Models\Nilai_;
use App\Models\User;
use App\Models\Date_;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Carbon;

class Nilai extends Component
{
    public $id_nilai;
    public $action;

    protected $listeners = [
        'delete'
    ];

    public function selectItem($id_nilai)
    {
        // dd('john');
        $this->id_nilai = $id_nilai;
        // dd($this->id_kecekapan);
    }

    public function delete()
    {
        $date_id = $this->date_id;
        $user_id = $this->user_id;
        $year = $this->year;
        $month = $this->month;
        // dd('john');
        $nilai = Nilai_::find($this->id_nilai);
        $nilai->delete();
        Date_::find($date_id)->update([
            'status'=> 'Not Submitted',
        ]);
        return redirect()->back()->with('message', 'Nilai deleted successfully');
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

    // public function nilai() {
    //     $nilai = Nilai_::latest()->get();
    //     return view('livewire.add-nilai', compact('nilai') );
    // }

    public function nilai_save(Request $request, $date_id, $user_id, $year, $month){
        //check kat sini 
        $nilais = Nilai_::where('user_id', '=', auth()->user()->id)->where('year', '=', $year)->where('month', '=', $month)->get();
        $total_percent = 0;
        foreach ($nilais as $key => $nilai) {
            $total_percent = $total_percent + $nilai->peratus;
        }
        if ($total_percent > 119.99999) {
            return redirect()->back()->with('fail', 'Sorry, you have exceed the maximum of Nilai Teras which is 100 percent only');
        }
        $validatedData = $request->validate([
            'nilai_teras' => ['required'],
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

        $nilaiscount = Nilai_::where('user_id', '=', auth()->user()->id)->where('nilai_teras', '=', $request->nilai_teras)->where('year', '=', $year)->where('month', '=', $month)->count();
        if ($nilaiscount == 0) {
            Nilai_::insert([
            'user_id'=> Auth::user()->id,
            // dd(Auth::user()->id),
            'created_at'=> Carbon::now(),
            'updated_at'=> Carbon::now(),
            // 'grade'=> $request->grade,
            'weightage'=> '20',
            // 'total_score'=> $request->total_score,
            // 'year'=> $request->year,
            // 'month'=> $request->month,
            'nilai_teras'=> $request->nilai_teras,
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
            return redirect()->back()->with('fail', 'Sorry, This type of Nilai Teras already exist');
        }
        return redirect()->back()->with('message', 'Nilai Teras has been successfully inserted');
    } 
       
    // public function nilai_edit($id, $year, $month) {
    public function nilai_edit($id, $date_id, $user_id, $year, $month) {
        $nilai = Nilai_::find($id);
        $status = Date_::where('user_id', '=', Auth::user()->id)->where('year', '=', $year)->where('month', '=', $month)->value('status');
        return view('livewire.form_nilai' , compact('nilai', 'date_id', 'user_id', 'year', 'month', 'status'));
    }

    // public function nilai_update(Request $request, $id, $year, $month) {
    public function nilai_update(Request $request, $id, $date_id, $user_id, $year, $month) {
        if(Auth::user()->role == 'employee') {
            $validatedData = $request->validate([
                'nilai_teras' => ['required'],
                'skor_pekerja' => ['required'],
            ]);
        }
        // dd('john');
        // if(Auth::user()->role == 'manager') {
        //     $validatedData = $request->validate([
        //         'nilai_teras' => ['required'],
        //         'skor_penyelia' => ['required'],
        //     ]);
        // }

        Date_::find($date_id)->update([
            'status'=> 'Not Submitted',
        ]);

        $update = Nilai_::find($id)->update([
            'user_id'=> Auth::user()->id,
            'created_at'=> Carbon::now(),
            'updated_at'=> Carbon::now(),
            // 'grade'=> $request->grade,
            'weightage'=> '20',
            // 'total_score'=> $request->total_score,
            // 'year'=> $request->year,
            // 'month'=> $request->month,
            'nilai_teras'=> $request->nilai_teras,
            // 'jangkaan_hasil'=> $request->jangkaan_hasil,
            // 'ukuran'=> $request->ukuran,
            // 'peratus'=> $request->peratus,
            'skor_pekerja'=> $request->skor_pekerja,
            'skor_penyelia'=> $request->skor_penyelia,
        ]);
        // dd('john');
        // return redirect()->route('add-nilai')->with('message', 'Nilai Updated Successfully');
        return redirect('employee/nilai/'.$date_id.'/'.$user_id.'/'.$year.'/'.$month)->with('message', 'Nilai Updated Successfully');
    }

    // public function selectItem($id_nilai , $action)
    // {
    //     // dd($id_nilai);
    //     $this->id_nilai = $id_nilai;
    //     // dd($this->id_nilai);
    //     $this->action = $action;
    //     // dd($this->action);
    //     // $this->emit('refreshParent');
    // }

    // public function delete()
    // {
    //     // dd('john');
    //     $nilai = Nilai_::find($this->id_nilai);
    //     $nilai->delete();
    //     return redirect()->back()->with('message', 'Nilai deleted successfully');
    // }

    // public function add_nilai($date_id, $user_id, $year, $month) {
    //     $nilai = Nilai_::where('user_id', '=', auth()->user()->id)->where('year', '=', $year)->where('month', '=', $month)->orderBy('nilai_teras')->get();
    //     return view('livewire.nilai', compact('nilai', 'date_id', 'user_id', 'year', 'month'));
    // }

    // public function nilai_delete($id) {
    //     $delete = Nilai_::find($id)->forceDelete();
    //     return redirect()->back()->with('message', 'Nilai deleted successfully');
    // }

        public function render()
    {
        $date_id = $this->date_id;
        $user_id = $this->user_id;
        $year = $this->year;
        $month = $this->month;
        $status = Date_::where('user_id', '=', Auth::user()->id)->where('year', '=', $year)->where('month', '=', $month)->value('status');
        $nilai = Nilai_::where('user_id', '=', auth()->user()->id)->where('year', '=', $year)->where('month', '=', $month)->orderBy('nilai_teras')->get();
        return view('livewire.nilai', compact('nilai', 'date_id', 'user_id', 'year', 'month', 'status'));
        // return view('livewire.kpi', compact('kpi', 'users', 'hrs', 'bukti'));
    }
}