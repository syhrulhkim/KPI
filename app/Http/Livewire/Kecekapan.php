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

        //check kat sini 
        $kecekapans = Kecekapan_::where('user_id', '=', auth()->user()->id)->get();

        $total_percent = 0;

        foreach ($kecekapans as $key => $kecekapan) {
            $total_percent = $total_percent + $kecekapan->peratus;
        }


        if ($total_percent > 99.99999) {
            return redirect()->back()->with('fail', 'Maaf, anda telah melebihi had Kecekapan Teras iaitu 100 peratus sahaja');
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

        // dd(Auth::user()->id);
        Kecekapan_::insert([
        
        'user_id'=> Auth::user()->id,
        // dd(Auth::user()->id),
        'created_at'=> Carbon::now(),
        'updated_at'=> Carbon::now(),

        'grade'=> $request->grade,
        // 'weightage'=> $request->weightage,
        'weightage'=> '20',

        'total_score'=> $request->total_score,
        // 'tahun'=> $request->tahun,
        // 'bulan'=> $request->bulan,

        'kecekapan_teras'=> $request->kecekapan_teras,
        // 'jangkaan_hasil'=> $request->jangkaan_hasil,

        // 'ukuran'=> $request->ukuran,

        // 'peratus'=> $request->peratus,
        'skor_pekerja'=> $request->skor_pekerja,
        'peratus'=> '20',
        'ukuran'=> 'Percentage (%)',
        // 'skor_penyelia'=> $request->skor_penyelia,

        ]);

        return redirect()->back()->with('message', 'Kecekapan berjaya ditambah!');
    } 
       

    public function kecekapan_edit($id) {

        $kecekapan = Kecekapan_::find($id);

        return view('livewire.form_kecekapan' , compact('kecekapan'));

    }

    public function kecekapan_update(Request $request, $id) {

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

        // if(Auth::user()->role == 'manager') {
        //     $validatedData = $request->validate([
        //         'kecekapan_teras' => ['required'],
        //         'skor_penyelia' => ['required'],
        //     ]);
        // }

        $update = Kecekapan_::find($id)->update([

            'user_id'=> Auth::user()->id,
            'created_at'=> Carbon::now(),
            'updated_at'=> Carbon::now(),

            'grade'=> $request->grade,
            'weightage'=> '20',

            'total_score'=> $request->total_score,
            // 'tahun'=> $request->tahun,
            // 'bulan'=> $request->bulan,

            'kecekapan_teras'=> $request->kecekapan_teras,
            // 'jangkaan_hasil'=> $request->jangkaan_hasil,

            // 'ukuran'=> $request->ukuran,

            // 'peratus'=> $request->peratus,
            'skor_pekerja'=> $request->skor_pekerja,
            'skor_penyelia'=> $request->skor_penyelia,
            'status'=> 'Not Submitted',

        ]);

        // $update = User::find(Auth::user()->id)->update([
        //     'status'=> 'Not Submitted',
        // ]);

        return redirect()->route('create-kecekapan')->with('message', 'Kecekapan Updated Successfully');

    }

    public function kecekapan_delete($id) {

        $delete = Kecekapan_::find($id)->forceDelete();

        return redirect()->back()->with('message', 'Kecekapan Deleted Successfully');
    }

        public function render()
    {
        $kecekapan = Kecekapan_::where('user_id', '=', auth()->user()->id)->orderBy('kecekapan_teras')->get();

        $userdepartment = auth()->user()->department;
        $users = User::where([['department', '=', $userdepartment] , ['role', '=', 'employee']])->orderBy('created_at','desc')->get();
        // dd($users);
        
        // $kecekapanemployee = Kecekapan_::where('user_id', '=', $users->id)->orderBy('created_at','desc')->get();



        return view('livewire.kecekapan', compact('kecekapan', 'users'));
        // return view('livewire.kpi', compact('kpi', 'users', 'hrs', 'bukti'));
    }
}