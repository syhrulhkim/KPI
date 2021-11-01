<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\KPI_;
use App\Models\Kecekapan_;
use App\Models\Nilai_;
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
        $user = User::where('id', '=', $id)->get();
        $id = $id;
        // dd($users);
        $hrs = User::Where('hr' , 'yes')->orWhere('role' , 'admin')->get();
        // dd($hrs);
        $kecekapan = Kecekapan_::where('user_id', '=', $id)->orderBy('created_at','desc')->get();
        // dd($kecekapan);
        $nilai = Nilai_::where('user_id', '=', $id)->orderBy('created_at','desc')->get();
        // dd($nilai);
        return view('livewire.manager-kpi', compact('kpi', 'userNE', 'hrs', 'kecekapan', 'nilai', 'user' , 'id'));
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
    //     $user->status == 'Appraised By Manager';
    //     dd( $user->status);
    // }
    
    public function changeup($id)
    {
        // dd($id);
    $update = User::find($id)->update([
        // dd($update),
        'status'=> 'Appraised By Manager',
        // 'age'=> '25',
        // dd('status'),
        ]);

        return redirect()->back()->with('message', 'The kpi has been appraised!');
    }

    public function changedown($id)
    {
    $update = User::find($id)->update([
        'status'=> 'Submitted',
        ]);
        return redirect()->back()->with('fail', 'You have undo the appraised kpi!');
    }

    // public function change($id)
    // {
    // User::insert([
    // $update = User::find($id)->update([
       
    //     'status'=> 'Appraised By Manager',
    //     // 'age'=> '25',
    //     // dd('status'),
    //     ]);

    //     if($id)
    //     {
    //         // dd($id);
    //         $update = User::find($id);
    //         $status = 'Appraised By Manager';
    //         $update->status = $status;
    //         // $update->status = 'Appraised By Manager';
    //         $update->save();
            
    //         // dd($update->save());
    
    //         // session()->flash('message', 'The kpi has been appraised!');
    //         // dd($id);
    //     }
    //     else
    //     {
    //         // $this->validate([
    //         //     'status' => 'required',
    //         // ]);
    //         dd($id);
    //         $add = New User();
    //         $add->status = 'Appraised By Manager';
    //         $add->save();
    //     }

    //     return redirect()->back()->with('message', 'The kpi has been appraised!');
    // }
}
