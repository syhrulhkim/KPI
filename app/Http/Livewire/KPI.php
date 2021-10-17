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
use Livewire\WithFileUploads;

class KPI extends Component
{
    // use WithFileUploads;
    // public $file_path;
    
    public function kpi() {

        $kpi = KPI_::latest()->get();
        // $kpi2 = KPI_::where('user_id', '=', auth()->user()->id)->orderBy('created_at','desc')->get();

        // return view('livewire.create-kpi', compact('kpi', 'kpi2') );
        return view('livewire.create-kpi', compact('kpi') );
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
        // dd(Auth::user()->id);
        KPI_::insert([
        
        'user_id'=> Auth::user()->id,
        'created_at'=> Carbon::now(),
        'updated_at'=> Carbon::now(),
        // dd(Auth::user()->id),
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
            'bukti'=> 'john',
            'file_name'=> 'john',
            'file_path'=> 'john',
            'file_type'=> 'john',

        ]);

        return redirect()->back()->with('message', 'KPI berjaya ditambah!');
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
        //  dd($this->file_path);
        // if ($this->file_path) {
        //     // dd($this->file_path);
        //     // Get thumbnailname with the extension
        //     $filenameWithExt = $this->file_path->getClientOriginalName();
        //     $extension = $this->file_path->getClientOriginalExtension();
        //     // $target_path = $filenameWithExt;
        //     // Get just thumbnailname
        //     $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        //     // thumbnailname to store
        //     $fileNameToStore = $filename . '_' . time() . '.' . $extension;
        //     // Upload Image
        //     $this->file_path->storeAs('public' . DIRECTORY_SEPARATOR . 'file_bukti', $fileNameToStore);
        // }

        // if($this->model_id)
        // {
        //     // $this->validate([
        //     //     'topic_name' => 'required|string|max:255',
        //     //     'id_lecturer' => 'required',
        //     // ]);
            
        //     $update = Bukti::find($this->model_id);
        //     $update->user_id = $this->user_id;
        //     $update->file_name = $this->file_name;
        //     $update->file_path = $this->file_path;
        //     $update->file_type = $this->file_type;
        //     $update->save();
    
        //     session()->flash('message', 'Topic successfully updated');
        // }
        // else
        // {
        //     $this->validate([
        //         'file_path' => 'required',
        //     ]);
        
        // $path = '' . DIRECTORY_SEPARATOR . 'storage' . DIRECTORY_SEPARATOR . 'file_bukti' . DIRECTORY_SEPARATOR . '' . $fileNameToStore;

        Bukti::find($id)->update([

            'user_id'=> Auth::user()->id,
            'link'=> $request->link,
            'bukti'=> $request->bukti,
            // 'file_name'=> $request->file_name,
            // 'file_path'=> $request->file_path,
            // 'file_type'=> $request->file_type,
        ]);
        // $post->body = $request->input('body');
        $update = Bukti::find($id);
            $update->user_id = Auth::user()->id;
            $update->link = $request->input('link');
            $update->bukti = $request->input('bukti');

        return redirect()->back()->with('message', 'bukti Updated Successfully');
        }
    

    // public function bukti_save(Request $request){
    //     // dd($request->bukti);
    // Bukti::insert([
        
    //         'user_id'=> Auth::user()->id,
    //         'created_at'=> Carbon::now(),
    //         'updated_at'=> Carbon::now(),
    
    //         'bukti'=> $request->bukti,
            
    //         'link'=> $request->link,
    
    //     ]);

    // }
        public function render()
    {
        // $kpi = KPI_::where('user_id', '=', auth()->user()->id)->orderBy('created_at','desc')->get();
        $bukti = Bukti::where([[ 'kpi_id', '=', '19' ]])->get();
        $kpi = KPI_::where('user_id', '=', auth()->user()->id)->orderBy('created_at','desc')->get();
        // $questions = Question::where([[ 'kpi_id', '=', '19' ]])->get();
        // $kpi2 = KPI_::where('user_id', '=', auth()->user()->id);
        $users = User::whereIn('position', ['Junior Non-Executive (NE1)','Senior Non-Executive (NE2)'])->Where('role' , 'employee')->get();
        $hrs = User::Where('hr' , 'yes')->orWhere('role' , 'admin')->get();
        // $users2 = User::where('id', '=', auth()->user()->id)->get();
        // $employees = User::where('role', 'employee')->get();
        // $users->(where(function ($query) {
        //     $query->where('position', 'Junior Non-Executive (NE1)')
        //         ->where('role', '>=', 'employee');
        // })->orWhere(function($query) {
        //     $query->where('position', 'Senior Non-Executive (NE2)')
        //         ->where('role', '>=', 'employee');	
        // }))

        // dd($kpi);
        // $courses = Course::orderBy('created_at','desc')->get();

        return view('livewire.kpi', compact('kpi', 'users', 'hrs', 'bukti'));
        // return view('livewire.kpi');
    }
}