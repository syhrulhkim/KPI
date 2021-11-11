<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\KPI_;
use App\Models\Kecekapan_;
use App\Models\Nilai_;
use App\Models\User;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Carbon;

class NilaiManager extends Component
{
    // public function kecekapan() {

    //     $kecekapan = Kecekapan_::latest()->get();

    //     return view('livewire.create-kecekapan', compact('kecekapan') );
    // }

    public function nilai_save(Request $request){

        $validatedData = $request->validate([
            'skor_penyelia' => ['required'],
        ]);

        Nilai_::insert([
        'skor_penyelia'=> $request->skor_penyelia,
        'skor_sebenar' => $request->skor_sebenar,
        ]);

        return redirect()->back()->with('message', 'Skor penyelia berjaya ditambah!');
    } 
       
    public function nilai_edit($id_user, $id) {
        $nilai = Nilai_::find($id);
        $user = User::find($id_user);
        return view('livewire.form_nilai_manager' , compact('nilai', 'user'));
    }

    public function nilai_update(Request $request,$id_user, $id) {
        $validatedData = $request->validate([
            'skor_penyelia' => ['required'],
        ]);

        $update = Nilai_::find($id)->update([
            'skor_penyelia'=> $request->skor_penyelia,
            'skor_sebenar' => $request->skor_sebenar,
        ]);
        // return redirect()->route('kecekapan-manager')->with('message', 'Skor penyelia Updated Successfully');
        // return redirect()->back()->with('message', 'Skor penyelia Updated Successfully');
        // return redirect()->route('create-nilai')->with('message', 'Skor penyelia Updated Successfully');
        return redirect('manager/view/kpi/'.$id_user)->with('message', 'Skor penyelia Updated Successfully');
    }

        public function render()
    {
        $nilai = Nilai_::where('user_id', '=', auth()->user()->id)->orderBy('nilai_teras')->get();
        $userdepartment = auth()->user()->department;
        $users = Nilai::where([['department', '=', $userdepartment] , ['role', '=', 'employee']])->orderBy('created_at','desc')->get();
        return view('livewire.nilai', compact('nilai', 'users'));
    }
}