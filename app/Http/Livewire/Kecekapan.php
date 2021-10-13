<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\KPI_;
use App\Models\Kecekapan_;
use App\Models\Bukti;
use App\Models\User;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Carbon;

class Kecekapan extends Component
{
    public function kpi() {

        $kecekapan = Kecekapan_::latest()->get();
        // $kpi2 = KPI_::where('user_id', '=', auth()->user()->id)->orderBy('created_at','desc')->get();

        // return view('livewire.create-kpi', compact('kpi', 'kpi2') );
        return view('livewire.create-kpi', compact('kecekapan') );
    }

    public function kecekapan_save(Request $request){

        $validatedData = $request->validate([

            'grade' => ['required'],
            'weightage' => ['required', 'numeric'],

            'total_score' => ['required', 'numeric'],
            'tahun' => ['required'],
            'bulan' => ['required'],

            'objektif' => ['required'],
            'fungsi' => ['required'],

            'bukti' => ['required'],
            'ukuran' => ['required'],

            'peratus' => ['required'],
            'threshold' => ['required'],

            'base' => ['required'],
            'stretch' => ['required'],

            'pencapaian' => ['required'],
            'skor_KPI' => ['required'],
            'skor_sebenar' => ['required'],
            
        ]);


        kecekapan_::insert([
        
        'user_id'=> Auth::user()->id,
        'created_at'=> Carbon::now(),
        'updated_at'=> Carbon::now(),

        'grade'=> $request->grade,
        'weightage'=> $request->weightage,

        'total_score'=> $request->total_score,
        'tahun'=> $request->tahun,
        'bulan'=> $request->bulan,

        'fungsi'=> $request->fungsi,
        'objektif'=> $request->objektif,
        
        'bukti'=> $request->bukti,
        'ukuran'=> $request->ukuran,

        'peratus'=> $request->peratus,
        'threshold'=> $request->threshold,

        'base'=> $request->base,
        'stretch'=> $request->stretch,
 
        'pencapaian'=> $request->pencapaian,
        'skor_KPI'=> $request->skor_KPI,
        'skor_sebenar'=> $request->skor_sebenar,
        

        ]);


        Bukti::insert([
        
            'user_id'=> Auth::user()->id,
            'created_at'=> Carbon::now(),
            'updated_at'=> Carbon::now(),

            // TajuK Objektif - Bukti Form
            'bukti'=> $request->bukti,

        ]);

        

        return redirect()->back()->with('message', 'Pencapaian berjaya ditambah!');
    } 
       

    public function pencapaian_edit($id) {

        $pencapaian = Pencapaian::find($id);

        return view('staff.form_pencapaian' , compact('pencapaian'));

    }


    public function pencapaian_update(Request $request, $id) {

        $validatedData = $request->validate([

            'grade' => ['required'],
            'weightage' => ['required', 'numeric'],

            'total_score' => ['required', 'numeric'],
            'tahun' => ['required'],
            'bulan' => ['required'],

            'objektif' => ['required'],
            'fungsi' => ['required'],

            'bukti' => ['required'],
            'ukuran' => ['required'],

            'peratus' => ['required'],
            'threshold' => ['required'],

            'base' => ['required'],
            'stretch' => ['required'],

            'pencapaian' => ['required'],
            'skor_KPI' => ['required'],
            'skor_sebenar' => ['required'],
            
        ]);

        $update = KPI::find($id)->update([

            'user_id'=> Auth::user()->id,
            'created_at'=> Carbon::now(),
            'updated_at'=> Carbon::now(),


            'grade'=> $request->grade,
            'weightage'=> $request->weightage,

            'total_score'=> $request->total_score,
            'tahun'=> $request->tahun,
            'bulan'=> $request->bulan,

            'objektif'=> $request->objektif,
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

        ]);

        return redirect()->route('staff_master')->with('message', 'Pencapaian Updated Successfully');

    }

    public function pencapaian_delete($id) {

        $delete = KPI::find($id)->forceDelete();

        return redirect()->back()->with('message', 'Pencapaian Deleted Successfully');
    }

    public function bukti_main($id) {

        $kpi = KPI::find($id);
        $bukti = Bukti::find($id);
        
        return view('staff.main_bukti' , compact('kpi', 'bukti') );
    }


    public function bukti_update(Request $request, $id) { 

        $bukti = Bukti::find($id)->update([

            'user_id'=> Auth::user()->id,

            'link'=> $request->link,

        ]);

        return redirect()->back()->with('message', 'Profile Updated Successfully');

    }

    public function bukti_save(Request $request){
     
    Bukti::insert([
        
            'user_id'=> Auth::user()->id,
            'created_at'=> Carbon::now(),
            'updated_at'=> Carbon::now(),
    
            'bukti'=> $request->bukti,

            'link'=> $request->link,
    
        ]);

}
        public function render()
    {
        return view('livewire.kecekapan');
    }
}