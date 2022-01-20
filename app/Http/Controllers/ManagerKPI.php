<?php

namespace App\Http\Controllers;

use App\Models\KPI_;
use App\Models\KPIAll_;
use App\Models\Kecekapan_;
use App\Models\KPIMaster_;
use App\Models\Nilai_;
use App\Models\User;
use App\Models\Date_;
use Illuminate\Http\Request;

class ManagerKPI extends Controller
{
    public $id_date;
    public $year;
    public $month;
    public $model_id;
    public $action;

    protected $listeners = [
        'delete',
    ];
    
    public function selectItem($model_id, $action)
    {
        // dd('johnselectItem');
        $this->id_date = $model_id;
        $this->action = $action;
        // dd( $this->id_date = $model_id);
    }

    public function delete()
    {
        // dd('johndelete');
        $date = Date_::find($this->id_date);
        $date->message_manager->delete();
        return redirect()->back()->with('message', 'Your message to this employee has been deleted!');
    }

    public function index($id, $date_id, $user_id, $year, $month)
    {
        // $alluser = User::all();
        // $employee = $alluser->id->$id;
        // $bukti = Bukti::where([[ 'kpi_id', '=', '19' ]])->get();
        // $userdepartment = auth()->user()->department;
        // dd($userdepartment);
        // $users = User::where([['department', '=', $userdepartment] , ['role', '=', 'employee']])->orderBy('created_at','desc')->get();
        // dd($kpi);
        // $userNE = User::whereIn('position', ['Junior Non-Executive (NE1)','Senior Non-Executive (NE2)'])->Where('role' , 'employee')->get();
        // $user = User::where('id', '=', $id)->get();
        // $id = $id;
        // dd($users);
        // $hrs = User::Where('hr' , 'yes')->orWhere('role' , 'admin')->get();
        // dd($hrs);
        // $kecekapan = Kecekapan_::where('user_id', '=', $id)->orderBy('created_at','desc')->get();
        // dd($kecekapan);
        // $nilai = Nilai_::where('user_id', '=', $id)->orderBy('created_at','desc')->get();
        // dd($nilai);

        $kadskor = KPI_::where('user_id', '=', $id)->where('fungsi', '=', 'Kad Skor Korporat')->where('year', '=', $year)->where('month', '=', $month)->orderBy('bukti','asc')->get();
        $kewangan = KPI_::where('user_id', '=', $id)->where('fungsi', '=', 'Kewangan')->where('year', '=', $year)->where('month', '=', $month)->orderBy('bukti','asc')->get();
        $pelangganI = KPI_::where('user_id', '=', $id)->where('fungsi', '=', 'Pelanggan (Internal)')->where('year', '=', $year)->where('month', '=', $month)->orderBy('bukti','asc')->get();
        $pelangganII = KPI_::where('user_id', '=', $id)->where('fungsi', '=', 'Pelanggan (Outer)')->where('year', '=', $year)->where('month', '=', $month)->orderBy('bukti','asc')->get();
        $kecemerlangan = KPI_::where('user_id', '=', $id)->where('fungsi', '=', 'Kecemerlangan Operasi')->where('year', '=', $year)->where('month', '=', $month)->orderBy('bukti','asc')->get();
        $training = KPI_::where('user_id', '=', $id)->where('fungsi', '=', 'Manusia & Proses (Training)')->where('year', '=', $year)->where('month', '=', $month)->orderBy('bukti','asc')->get();
        $ncr = KPI_::where('user_id', '=', $id)->where('fungsi', '=', 'Manusia & Proses (NCROFI)')->where('year', '=', $year)->where('month', '=', $month)->orderBy('bukti','asc')->get();
        $kolaborasi = KPI_::where('user_id', '=', $id)->where('fungsi', '=', 'Kolaborasi')->where('year', '=', $year)->where('month', '=', $month)->orderBy('bukti','asc')->get();

        $kadskorcount = $kadskor->count();
        $kewangancount = $kewangan->count();
        $pelangganIcount = $pelangganI->count();
        $pelangganIIcount = $pelangganII->count();
        $kecemerlangancount = $kecemerlangan->count();
        $trainingcount = $training->count();
        $ncrcount = $ncr->count();
        $kolaborasicount = $kolaborasi->count();

        $kpi = KPI_::where('user_id', '=', $id)->where('year', '=', $year)->where('month', '=', $month)->orderBy('created_at','desc')->get();
        $kpimaster = KPIMaster_::where('user_id', '=', $id)->where('year', '=', $year)->where('month', '=', $month)->orderBy('created_at','desc')->get();
        $user = User::where('id', '=', $id)->get();
        $kecekapan = Kecekapan_::where('user_id', '=', $id)->where('year', '=', $year)->where('month', '=', $month)->orderBy('created_at','desc')->get();
        $nilai = Nilai_::where('user_id', '=', $id)->where('year', '=', $year)->where('month', '=', $month)->orderBy('created_at','desc')->get();
        $kpiall = KPIAll_::where('user_id', '=', $id)->where('year', '=', $year)->where('month', '=', $month)->get();
        $date = Date_::where('user_id', '=', $id)->where('year', '=', $year)->where('month', '=', $month)->get();
        $weightage_master = KpiAll_::where('user_id', '=', $id)->where('year', '=', $year)->where('month', '=', $month)->value('weightage_master');
        $kecekapanscount2 = Kecekapan_::where('user_id', '=', $id)->where('year', '=', $year)->where('month', '=', $month)->count();
        $nilaiscount2 = Nilai_::where('user_id', '=', $id)->where('year', '=', $year)->where('month', '=', $month)->count();
        $kecekapan_master = $kecekapanscount2 * 20;
        $nilai_master = $nilaiscount2 * 20;

        return view('livewire.manager-kpi', compact('kpi', 'kpimaster', 'user', 'kecekapan' , 'nilai', 'kpiall', 'kadskor', 'kewangan', 
        'pelangganI', 'pelangganII', 'kecemerlangan', 'training', 'ncr', 'kolaborasi', 'id', 'date_id', 'user_id', 'year', 'month', 'date', 
        'weightage_master', 'kadskorcount', 'kewangancount', 'pelangganIcount', 'pelangganIIcount', 'kecemerlangancount', 'trainingcount',
        'ncrcount', 'kolaborasicount', 'kecekapan_master', 'nilai_master'));
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
    
    public function changeupmanager($date_id)
    {
        // dd($id);
        Date_::find($date_id)->update([
        // dd($update),
        'status'=> 'Signed By Manager',
        // 'age'=> '25',
        // dd('status'),
        ]);

        return redirect()->back()->with('message', 'The kpi has been signed & appraised!');
    }

    public function changedownmanager($date_id)
    {
        dd('john');
        Date_::find($date_id)->update([
        'status'=> 'Submitted',
        ]);
        return redirect()->back()->with('message', 'You have undo the signed & undo the appraised kpi!');
    }

    public function messageupmanager(Request $request, $date_id)
    {
        Date_::find($date_id)->update([
        'message_manager'=> $request->message_manager,
        ]);
        // dd($request->message_manager);

        return redirect()->back()->with('message', 'Your message has been submitted!');
    }

    // public function messagedownmanager($date_id)
    // {
    //     Date_::find($date_id)->update([
    //     'message_manager'=> 'Submitted',
    //     ]);
    //     return redirect()->back()->with('message', 'Your message to this employee has been deleted!');
    // }

    public function changeuphr($date_id)
    {
        Date_::find($date_id)->update([
        'status'=> 'Completed',
        ]);

        return redirect()->back()->with('message', 'The kpi has been signed & completed!');
    }

    public function changedownhr($date_id)
    {
        Date_::find($date_id)->update([
        'status'=> 'Signed By Manager',
        ]);
        return redirect()->back()->with('message', 'You have undo the signed & undo the completed kpi!');
    }

    public function messageuphr(Request $request, $date_id)
    {
        Date_::find($date_id)->update([
        'message_hr'=> $request->message_hr,
        ]);

        return redirect()->back()->with('message', 'Your message has been submitted!');
    }

    // public function messagedownhr($date_id)
    // {
    //     Date_::find($date_id)->update([
    //     'message_hr'=> 'Submitted',
    //     ]);
    //     return redirect()->back()->with('message', 'Your message to this employee has been deleted!');
    // }

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
