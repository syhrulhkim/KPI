<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\KPI_;
use App\Models\Kecekapan_;
use App\Models\User;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Carbon;

class Kecekapan extends Component
{
    // public function kecekapan() {

    //     $kecekapan = Kecekapan_::latest()->get();
    //     // $kpi2 = KPI_::where('user_id', '=', auth()->user()->id)->orderBy('created_at','desc')->get();

    //     // return view('livewire.create-kpi', compact('kpi', 'kpi2') );
    //     return view('livewire.create-kpi', compact('kecekapan') );
    // }

    public function kecekapan() {

        $kecekapan = Kecekapan_::latest()->get();

        return view('livewire.create-kecekapan', compact('kecekapan') );
    }

    public function kecekapan_save(Request $request){

        $validatedData = $request->validate([

            'kecekapan_teras' => ['required'],
            // dd(Auth::user()->id),
            'jangkaan_hasil' => ['required'],
            // 'peratus' => ['required'],
            // 'ukuran' => ['required'],
            'skor_pekerja' => ['required'],
            // 'skor_penyelia' => ['required'],
            'user_id' => ['required'],

            'grade' => ['required'],
            'total_score' => ['required', 'numeric'],
            'weightage' => ['required', 'numeric'],
            // dd(Auth::user()->id),
        ]);

        dd(Auth::user()->id);
        Kecekapan_::insert([
        
        'user_id'=> Auth::user()->id,
        dd(Auth::user()->id),
        'created_at'=> Carbon::now(),
        'updated_at'=> Carbon::now(),

        'grade'=> $request->grade,
        'weightage'=> $request->weightage,

        'total_score'=> $request->total_score,
        // 'tahun'=> $request->tahun,
        // 'bulan'=> $request->bulan,

        'kecekapan_teras'=> $request->kecekapan_teras,
        'jangkaan_hasil'=> $request->jangkaan_hasil,

        // 'ukuran'=> $request->ukuran,

        // 'peratus'=> $request->peratus,
        'skor_pekerja'=> $request->skor_pekerja,
        'skor_penyelia'=> $request->skor_penyelia,

        ]);

        return redirect()->back()->with('message', 'Kecekapan berjaya ditambah!');
    } 
       

    public function kecekapan_edit($id) {

        $kecekapan = Kecekapan_::find($id);

        return view('livewire.form_kecekapan' , compact('kecekapan'));

    }

    public function kecekapan_update(Request $request, $id) {

        $validatedData = $request->validate([

            'kecekapan_teras' => ['required'],
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

        $update = Kecekapan_::find($id)->update([

            'user_id'=> Auth::user()->id,
            dd(Auth::user()->id),
            'created_at'=> Carbon::now(),
            'updated_at'=> Carbon::now(),

            'grade'=> $request->grade,
            'weightage'=> $request->weightage,

            'total_score'=> $request->total_score,
            // 'tahun'=> $request->tahun,
            // 'bulan'=> $request->bulan,

            'kecekapan_teras'=> $request->kecekapan_teras,
            'jangkaan_hasil'=> $request->jangkaan_hasil,

            // 'ukuran'=> $request->ukuran,

            // 'peratus'=> $request->peratus,
            'skor_pekerja'=> $request->skor_pekerja,
            'skor_penyelia'=> $request->skor_penyelia,

        ]);

        return redirect()->route('kecekapan')->with('message', 'Pencapaian Updated Successfully');

    }

    public function kecekapan_delete($id) {

        $delete = Kecekapan_::find($id)->forceDelete();

        return redirect()->back()->with('message', 'Pencapaian Deleted Successfully');
    }

        public function render()
    {
        $kecekapan = Kecekapan_::where('user_id', '=', auth()->user()->id)->orderBy('created_at','desc')->get();

        return view('livewire.kecekapan', compact('kecekapan'));
        // return view('livewire.kpi', compact('kpi', 'users', 'hrs', 'bukti'));
    }
}