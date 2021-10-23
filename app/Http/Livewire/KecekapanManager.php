<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\KPI_;
use App\Models\Kecekapan_;
use App\Models\User;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Carbon;

class KecekapanManager extends Component
{
    // public function kecekapan() {

    //     $kecekapan = Kecekapan_::latest()->get();

    //     return view('livewire.create-kecekapan', compact('kecekapan') );
    // }

    public function kecekapan_save(Request $request){

        $validatedData = $request->validate([
            'skor_penyelia' => ['required'],
        ]);

        Kecekapan_::insert([
        'skor_penyelia'=> $request->skor_penyelia,
        ]);

        return redirect()->back()->with('message', 'Skor penyelia berjaya ditambah!');
    } 
       
    public function kecekapan_edit($id) {
        $kecekapan = Kecekapan_::find($id);
        return view('livewire.form_kecekapan_manager' , compact('kecekapan'));
    }

    public function kecekapan_update(Request $request, $id) {
        $validatedData = $request->validate([
            'skor_penyelia' => ['required'],
        ]);

        $update = Kecekapan_::find($id)->update([
            'skor_penyelia'=> $request->skor_penyelia,
        ]);
        return redirect()->route('kecekapan')->with('message', 'Skor penyelia Updated Successfully');
    }

        public function render()
    {
        $kecekapan = Kecekapan_::where('user_id', '=', auth()->user()->id)->orderBy('kecekapan_teras')->get();
        $userdepartment = auth()->user()->department;
        $users = User::where([['department', '=', $userdepartment] , ['role', '=', 'employee']])->orderBy('created_at','desc')->get();
        return view('livewire.kecekapan', compact('kecekapan', 'users'));
    }
}