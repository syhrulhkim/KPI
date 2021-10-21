<?php

namespace App\Http\Livewire;
// namespace App\Models\KPI_;

use App\Models\Displaykpi_;
use App\Models\User;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Carbon;
use Livewire\Component;

class Displaykpi extends Component
{
    
        public function render()
    {
        $displaykpi = Displaykpi_::latest()->get();

        // 'user_id'=> Auth::user()->id,
        // 'created_at'=> Carbon::now(),
        // 'updated_at'=> Carbon::now(),

        // 'grade'=> $request->grade,
        // 'weightage'=> $request->weightage,

        // 'total_score'=> $request->total_score,
        // 'tahun'=> $request->tahun,
        // 'bulan'=> $request->bulan,

        // 'fungsi'=> $request->fungsi,
        // 'objektif'=> $request->objektif,
        
        // 'bukti'=> $request->bukti,
        // 'ukuran'=> $request->ukuran,

        // 'peratus'=> $request->peratus,
        // 'threshold'=> $request->threshold,

        // 'base'=> $request->base,
        // 'stretch'=> $request->stretch,
 
        // 'pencapaian'=> $request->pencapaian,
        // 'skor_KPI'=> $request->skor_KPI,
        // 'skor_sebenar'=> $request->skor_sebenar,


        return view('livewire.display-kpi', compact('displaykpi'));
    }
}