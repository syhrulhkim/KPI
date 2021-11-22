<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\KPI_;
use App\Models\Kecekapan_;
use App\Models\Nilai_;
use App\Models\KPIMaster_;
use App\Models\User;
use Auth;
use Illuminate\Support\Carbon;

class ManagerKPI extends Controller
{

    public function index($id)
    {
        // $alluser = User::all();
        // $employee = $alluser->id->$id;
        // $bukti = Bukti::where([[ 'kpi_id', '=', '19' ]])->get();
        // $userdepartment = auth()->user()->department;
        // dd($userdepartment);
        // $users = User::where([['department', '=', $userdepartment] , ['role', '=', 'employee']])->orderBy('created_at','desc')->get();
        $kpi = KPI_::where('user_id', '=', $id)->orderBy('created_at','desc')->get();
        // dd($kpi);
        $userNE = User::whereIn('position', ['Junior Non-Executive (NE1)','Senior Non-Executive (NE2)'])->Where('role' , 'employee')->get();
        // $user = User::where('id', '=', $id)->get();
        $id = $id;
        // dd($users);
        // $hrs = User::Where('hr' , 'yes')->orWhere('role' , 'admin')->get();
        // dd($hrs);
        // $kecekapan = Kecekapan_::where('user_id', '=', $id)->orderBy('created_at','desc')->get();
        // dd($kecekapan);
        // $nilai = Nilai_::where('user_id', '=', $id)->orderBy('created_at','desc')->get();
        // dd($nilai);

        $kadskor = KPI_::where('user_id', '=', $id)->where('fungsi', '=', 'Kad Skor Korporat')->orderBy('bukti','asc')->get();
        $kewangan = KPI_::where('user_id', '=', $id)->where('fungsi', '=', 'Kewangan')->orderBy('bukti','asc')->get();
        $pelangganI = KPI_::where('user_id', '=', $id)->where('fungsi', '=', 'Pelanggan (Internal)')->orderBy('bukti','asc')->get();
        $pelangganII = KPI_::where('user_id', '=', $id)->where('fungsi', '=', 'Pelanggan (Outer)')->orderBy('bukti','asc')->get();
        $kecemerlangan = KPI_::where('user_id', '=', $id)->where('fungsi', '=', 'Kecemerlangan Operasi')->orderBy('bukti','asc')->get();
        $training = KPI_::where('user_id', '=', $id)->where('fungsi', '=', 'Manusia & Proses (Training)')->orderBy('bukti','asc')->get();
        $ncr = KPI_::where('user_id', '=', $id)->where('fungsi', '=', 'Manusia & Proses (NCROFI)')->orderBy('bukti','asc')->get();
        $kolaborasi = KPI_::where('user_id', '=', $id)->where('fungsi', '=', 'Kolaborasi')->orderBy('bukti','asc')->get();

        $kadskorcount = $kadskor->count();
        $kewangancount = $kewangan->count();
        $pelangganIcount = $pelangganI->count();
        $pelangganIIcount = $pelangganII->count();
        $kecemerlangancount = $kecemerlangan->count();
        $trainingcount = $training->count();
        $ncrcount = $ncr->count();
        $kolaborasicount = $kolaborasi->count();

        $users = User::whereIn('position', ['Junior Non-Executive (NE1)','Senior Non-Executive (NE2)'])->Where('role' , 'employee')->get();
        $hrs = User::Where('hr' , 'yes')->orWhere('role' , 'admin')->get();
        $user = User::where('id', '=', $id)->get();
        $kecekapan = Kecekapan_::where('user_id', '=', $id)->orderBy('created_at','desc')->get();
        $nilai = Nilai_::where('user_id', '=', $id)->orderBy('created_at','desc')->get();

        $kadskormaster = KPIMaster_::where('fungsi', '=', 'Kad Skor Korporat')->Where('user_id', '=', $id)->orderBy('created_at','desc')->get();
        $kewanganmaster = KPIMaster_::where('fungsi', '=', 'Kewangan')->Where('user_id', '=', $id)->orderBy('created_at','desc')->get();
        $pelangganImaster = KPIMaster_::where('fungsi', '=', 'Pelanggan (Internal)')->Where('user_id', '=', $id)->orderBy('created_at','desc')->get();
        $pelangganIImaster = KPIMaster_::where('fungsi', '=', 'Pelanggan (Outer)')->Where('user_id', '=', $id)->orderBy('created_at','desc')->get();
        $kecemerlanganmaster = KPIMaster_::where('fungsi', '=', 'Kecemerlangan Operasi')->Where('user_id', '=', $id)->orderBy('created_at','desc')->get();
        $trainingmaster = KPIMaster_::where('fungsi', '=', 'Manusia & Proses (Training)')->Where('user_id', '=', $id)->orderBy('created_at','desc')->get();
        $ncrmaster = KPIMaster_::where('fungsi', '=', 'Manusia & Proses (NCROFI)')->Where('user_id', '=', $id)->orderBy('created_at','desc')->get();
        $kolaborasimaster = KPIMaster_::where('fungsi', '=', 'Kolaborasi')->Where('user_id', '=', $id)->orderBy('created_at','desc')->get();

        $kadskormastercount = KPIMaster_::where('fungsi', '=', 'Kad Skor Korporat')->Where('user_id', '=', $id)->orderBy('created_at','desc')->count();
        $kewanganmastercount = KPIMaster_::where('fungsi', '=', 'Kewangan')->Where('user_id', '=', $id)->orderBy('created_at','desc')->count();
        $pelangganImastercount = KPIMaster_::where('fungsi', '=', 'Pelanggan (Internal)')->Where('user_id', '=', $id)->orderBy('created_at','desc')->count();
        $pelangganIImastercount = KPIMaster_::where('fungsi', '=', 'Pelanggan (Outer)')->Where('user_id', '=', $id)->orderBy('created_at','desc')->count();
        $kecemerlanganmastercount = KPIMaster_::where('fungsi', '=', 'Kecemerlangan Operasi')->Where('user_id', '=', $id)->orderBy('created_at','desc')->count();
        $trainingmastercount = KPIMaster_::where('fungsi', '=', 'Manusia & Proses (Training)')->Where('user_id', '=', $id)->orderBy('created_at','desc')->count();
        $ncrmastercount = KPIMaster_::where('fungsi', '=', 'Manusia & Proses (NCROFI)')->Where('user_id', '=', $id)->orderBy('created_at','desc')->count();
        $kolaborasimastercount = KPIMaster_::where('fungsi', '=', 'Kolaborasi')->Where('user_id', '=', $id)->orderBy('created_at','desc')->count();

        return view('livewire.manager-kpi', compact('kpi', 'userNE', 'nilai', 'user' , 'id', 'kadskor', 'users', 'hrs', 'kecekapan', 'nilai', 'user', 'kewangan', 'pelangganI', 'pelangganII', 'kecemerlangan', 'training', 'ncr', 'kolaborasi', 'kadskorcount', 'kewangancount', 'pelangganIcount', 'pelangganIIcount', 'kecemerlangancount', 'trainingcount', 'ncrcount', 'kolaborasicount'));
    }

    // public function changeStatus($id_answer)
    // {
    //     foreach ($this->Question->answer  as $key => $answer_no) {
    //        if ($answer_no->id == $id_answer)
    //        {
    //            $answer_no->status_answer=1;
    //            $answer_no->save();}
    //        else 
    //        {$answer_no->status_answer=0;
    //        $answer_no->save();}
    //     }
    // }

    // public function selectItem($modelid , $action)
    // {
    //     // dd($modelid);
    //     $this->id_answer = $modelid;
    //     $this->action = $action;
    //     if($action == "update")
    //     {
    //         $this->emit('getModelId' , $this->id_answer);
    //     }  
    // }

    // public function change($id)
    // {  
    //     // dd('john');
    //     $user = User::find($id);
    //     // dd($user);
    //     // dd($this->id_question);
    //     $user->status == 'Signed By Manager';
    //     dd( $user->status);
    // }
    
    public function changeup($id)
    {
        // dd($id);
    $update = User::find($id)->update([
        // dd($update),
        'status'=> 'Signed By Manager',
        // 'age'=> '25',
        // dd('status'),
        ]);

        return redirect()->back()->with('message', 'The kpi has been signed!');
    }

    public function changedown($id)
    {
    $update = User::find($id)->update([
        'status'=> 'Submitted',
        ]);
        return redirect()->back()->with('message', 'You have undo the signed kpi!');
    }

    // public function change($id)
    // {
    // User::insert([
    // $update = User::find($id)->update([
       
    //     'status'=> 'Signed By Manager',
    //     // 'age'=> '25',
    //     // dd('status'),
    //     ]);

    //     if($id)
    //     {
    //         // dd($id);
    //         $update = User::find($id);
    //         $status = 'Signed By Manager';
    //         $update->status = $status;
    //         // $update->status = 'Signed By Manager';
    //         $update->save();
            
    //         // dd($update->save());
    
    //         // session()->flash('message', 'The kpi has been signed!');
    //         // dd($id);
    //     }
    //     else
    //     {
    //         // $this->validate([
    //         //     'status' => 'required',
    //         // ]);
    //         dd($id);
    //         $add = New User();
    //         $add->status = 'signed By Manager';
    //         $add->save();
    //     }

    //     return redirect()->back()->with('message', 'The kpi has been signed!');
    // }
}
