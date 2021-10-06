<?php

namespace App\Http\Livewire;
// namespace App\Models\KPI_;

use App\Models\KPI_;
use App\Models\Bukti;
use App\Models\User;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Carbon;
use Livewire\Component;

class KPI extends Component
{
    public function kpi() {

        $kpi = KPI_::latest()->get();

        return view('livewire.kpi', compact('kpi'));
    }

    public function kpi_save(Request $request){

        $validatedData = $request->validate([

            'fungsi' => ['required'],
            'objektif' => ['required'],
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

        KPI_::insert([
        
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

        return redirect()->back()->with('message', 'Bukti berjaya ditambah!');
    } 
       
    public function kpi_edit($id) {

        $kpi = KPI_::find($id);

        return view('livewire.form_kpi' , compact('kpi'));

    }

    public function kpi_update(Request $request, $id) {

        $validatedData = $request->validate([

            'fungsi' => ['required'],
            'objektif' => ['required'],
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

        return redirect()->route('kpi')->with('message', 'KPI Updated Successfully');

    }

    public function kpi_delete($id) {

        $delete = KPI_::find($id)->forceDelete();

        return redirect()->back()->with('message', 'KPI Deleted Successfully');
    }

    public function bukti_main($id) {

        $kpi = KPI_::find($id);
        // dd($id);
        $bukti = Bukti::find($id);
        // dd($bukti);
        
        return view('employee.main_bukti' , compact('kpi', 'bukti') );
    }


    public function bukti_update(Request $request, $id) { 
        // dd($request);
        $bukti = Bukti::find($id)->update([

            'user_id'=> Auth::user()->id,

            'link'=> $request->link,

        ]);

        return redirect()->back()->with('message', 'bukti Updated Successfully');

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
        $kpi = KPI_::latest()->get();

        return view('livewire.kpi', compact('kpi'));
        // return view('livewire.kpi');
    }
}