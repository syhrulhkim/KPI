<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\KPIAll_;
use App\Models\Date_;
use App\Models\KPI_;
use App\Models\User;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;

class Date extends Component
{
    public $id_date;
    public $year;
    public $month;
    public $model_id;
    public $action;

    protected $listeners = [
        'getModelId',
        'delete',
        // 'dd("date_save")'
    ];
    
    public function selectItem($id_date, $action)
    {
        $this->id_date = $id_date;
        $this->action = $action;
        if($action == "update")
        {
            $this->emit('getModelId' , $this->id_date);
        }
        // dd("john");
    }

    public function delete()
    {
        $date = Date_::find($this->id_date);
        $date->delete();
        return redirect()->back()->with('message', 'Date deleted successfully');
    }

    public function getModelId($model_id)
    {
        // dd($model_id);
        $date = Date_::find($model_id);
        $this->model_id = $date->id;
        $this->year = $date->year;
        $this->month = $date->month;
        // $this->emit('date_save' , $this->model_id);
        // dd($this->model_id);
    }

    // public function date_save(Request $request) {

    //     $validatedData = $request->validate([
    //         'year' => ['required'],
    //         'month' => ['required'],
    //     ]);

    //     Date_::insert([
    //         'user_id'=> Auth::user()->id,
    //         'year'=> $request->year,
    //         'month'=> $request->month,
    //         ]);
        
    //     return redirect()->back()->with('message', 'Date has been successfully inserted');
    // }

    public function date_save(Request $request)
    {
        $count_date = Date_::where('year', '=', $request->year)->where('month', '=', $request->month)->where('user_id', '=', auth()->user()->id)->count();
        // dd($count_date);
        // dd($this->model_id);
        if($this->model_id && $count_date == 0)
        {
            // dd('john1');
            $validatedData = $request->validate([
                'year' => ['required'],
                'month' => ['required'],
            ]);
            
            $update = Date_::find($this->model_id);
            $update->year = $request->year;
            $update->month = $request->month;
            $update->save();
    
            return redirect()->back()->with('message', 'Date has been successfully updated!');
        }
        elseif ($count_date == 0)
        {
            // dd('john2');
            $validatedData = $request->validate([
                'year' => ['required'],
                'month' => ['required'],
            ]);

            $add = New Date_;
            $add->year = $request->year;
            $add->month = $request->month;
            $add->user_id= Auth::user()->id;
            $add->status= 'Not Submitted';
            $add->save();

            return redirect()->back()->with('message', 'Date has been successfully inserted!');
        }else
        {
            return redirect()->back()->with('fail', 'Date has already exists!');
        }
        // $this->emit('refreshParent');
    }

    public function create_date($user_id)
    {
        $kpiall = KPIAll_::all();
        $user = User::where('id', '=', $user_id)->get();
        if (auth()->user()->role == "manager") {
            $date = Date_::where('user_id', '=', $user_id)->orderBy('year','desc')->orderBy('month','desc')->get();
            $kpi = KPI_::where('user_id', '=', $user_id)->get();
        } else if(auth()->user()->role == "hr"){
            $date = Date_::where('user_id', '=', $user_id)->orderBy('year','desc')->orderBy('month','desc')->get();
            $kpi = KPI_::where('user_id', '=', $user_id)->get();
        }

        return view('livewire.date2', compact('kpiall', 'date', 'kpi', 'user_id', 'user'));
    }
    
        public function render()
    {
        // $coursefiles = CourseFile::all();
        // dd($kpi);
     
            $date = Date_::where('user_id', '=', auth()->user()->id)->orderBy('year','desc')->orderBy('month','desc')->get();
            $kpi = KPI_::where('user_id', '=', auth()->user()->id)->get();


        return view('livewire.date', compact('date', 'kpi'));
    }
}