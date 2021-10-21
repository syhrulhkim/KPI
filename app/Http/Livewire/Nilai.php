<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\KPI_;
use App\Models\Nilai_;
use App\Models\User;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Carbon;

class Nilai extends Component
{
    // public function kecekapan() {

    //     $kecekapan = Kecekapan_::latest()->get();
    //     // $kpi2 = KPI_::where('user_id', '=', auth()->user()->id)->orderBy('created_at','desc')->get();

    //     // return view('livewire.create-kpi', compact('kpi', 'kpi2') );
    //     return view('livewire.create-kpi', compact('kecekapan') );
    // }

    public function nilai() {

        $nilai = Nilai_::latest()->get();

        return view('livewire.create-nilai', compact('nilai') );
    }

    public function nilai_save(Request $request){

        $validatedData = $request->validate([

            'nilai_teras' => ['required'],
            // dd(Auth::user()->id),
            'jangkaan_hasil' => ['required'],
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

        // dd(Auth::user()->id);
        Nilai_::insert([
        
        'user_id'=> Auth::user()->id,
        // dd(Auth::user()->id),
        'created_at'=> Carbon::now(),
        'updated_at'=> Carbon::now(),

        'grade'=> $request->grade,
        'weightage'=> $request->weightage,

        'total_score'=> $request->total_score,
        // 'tahun'=> $request->tahun,
        // 'bulan'=> $request->bulan,

        'nilai_teras'=> $request->nilai_teras,
        'jangkaan_hasil'=> $request->jangkaan_hasil,

        // 'ukuran'=> $request->ukuran,

        // 'peratus'=> $request->peratus,
        'skor_pekerja'=> $request->skor_pekerja,
        // 'skor_penyelia'=> $request->skor_penyelia,

        ]);

        return redirect()->back()->with('message', 'Nilai berjaya ditambah!');
    } 
       

    public function nilai_edit($id) {

        $nilai = Nilai_::find($id);

        return view('livewire.form_nilai' , compact('nilai'));

    }

    public function nilai_update(Request $request, $id) {

        $validatedData = $request->validate([

            'nilai_teras' => ['required'],
            'jangkaan_hasil' => ['required'],
            // 'peratus' => ['required'],
            // 'ukuran' => ['required'],
            'skor_pekerja' => ['required'],
            'skor_penyelia' => ['required'],
            'user_id' => ['required'],

            'grade' => ['required'],
            'total_score' => ['required', 'numeric'],
            'weightage' => ['required', 'numeric'],
            
        ]);

        $update = Nilai_::find($id)->update([

            'user_id'=> Auth::user()->id,
            'created_at'=> Carbon::now(),
            'updated_at'=> Carbon::now(),

            'grade'=> $request->grade,
            'weightage'=> $request->weightage,

            'total_score'=> $request->total_score,
            // 'tahun'=> $request->tahun,
            // 'bulan'=> $request->bulan,

            'nilai_teras'=> $request->nilai_teras,
            'jangkaan_hasil'=> $request->jangkaan_hasil,

            // 'ukuran'=> $request->ukuran,

            // 'peratus'=> $request->peratus,
            'skor_pekerja'=> $request->skor_pekerja,
            'skor_penyelia'=> $request->skor_penyelia,

        ]);

        return redirect()->route('nilai')->with('message', 'Nilai Updated Successfully');

    }

    public function nilai_delete($id) {

        $delete = Nilai_::find($id)->forceDelete();

        return redirect()->back()->with('message', 'Nilai Deleted Successfully');
    }

        public function render()
    {
        $nilai = Nilai_::where('user_id', '=', auth()->user()->id)->orderBy('nilai_teras')->get();

        return view('livewire.nilai', compact('nilai'));
        // return view('livewire.kpi', compact('kpi', 'users', 'hrs', 'bukti'));
    }
}