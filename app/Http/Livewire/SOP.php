<?php

namespace App\Http\Livewire;
use Livewire\Component;
use App\Models\SOP_;
use App\Models\User;
use App\Models\Department;
use Illuminate\Support\Carbon;
use Livewire\WithFileUploads;
use Illuminate\Http\Request;
use URL;

class SOP extends Component
{
    use WithFileUploads;
    public $sop_path;
    public $id_sop;

    protected $listeners = [
        'delete'
    ];

    public function selectItem($id)
    {
        $this->id_sop = $id;
    }

    public function delete()
    {
        $sop = SOP_::find($this->id_sop);
        $sop->delete();

        return redirect()->back()->with('message', 'Sop deleted successfully');
    }

    public function create(Request $request)
    {
        $request->validate([
            'departmentview' => 'required'
        ]);

        $input['departmentview'] = json_encode($request->all()['departmentview']);

        if ($request->sop_path != NULL) {
        $this->sop_path = $request->sop_path;
        $filenameWithExt = $this->sop_path->getClientOriginalName();
        $extension = $this->sop_path->getClientOriginalExtension();
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        $fileNameToStore = $filename . '_' . time() . '.' . $extension;
        $this->sop_path->storeAs('public' . DIRECTORY_SEPARATOR . 'filesop', $fileNameToStore);
        $path = '' . DIRECTORY_SEPARATOR . 'storage' . DIRECTORY_SEPARATOR . 'filesop' . DIRECTORY_SEPARATOR . '' . $fileNameToStore;

        SOP_::insert([
            'user_id'=> auth()->user()->id,
            'created_at'=> Carbon::now(),
            'updated_at'=> Carbon::now(),
            'title'=> $request->title,
            'department'=> $request->department,
            'departmentview'=> $input['departmentview'],
            'part'=> $request->part,
            'description'=> $request->description,
            'link' => $request->link,
            'sop_path' => ''.URL::to('').$path.'',
            ]);

        } else {
            SOP_::insert([
                'user_id'=> auth()->user()->id,
                'created_at'=> Carbon::now(),
                'updated_at'=> Carbon::now(),
                'title'=> $request->title,
                'department'=> $request->department,
                'departmentview'=> $input['departmentview'],
                'part'=> $request->part,
                'description'=> $request->description,
                'link' => $request->link,
                ]);
        }
        return redirect()->back()->with('message', 'Sop has been successfully inserted');
    }

    public function edit($id)
    {
        $sop = SOP_::where('id', '=', $id)->get();
        return view('livewire.sop.edit', compact('id', 'sop'));
    }

    public function update(Request $request, $id) 
    {
        $request->validate([
            'departmentview' => 'required'
        ]);

        $input['departmentview'] = json_encode($request->all()['departmentview']);

        if ($request->sop_path != NULL) 
        {
        $this->sop_path = $request->sop_path;
        $filenameWithExt = $this->sop_path->getClientOriginalName();
        $extension = $this->sop_path->getClientOriginalExtension();
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        $fileNameToStore = $filename . '_' . time() . '.' . $extension;
        $this->sop_path->storeAs('public' . DIRECTORY_SEPARATOR . 'filesop', $fileNameToStore);
        $path = '' . DIRECTORY_SEPARATOR . 'storage' . DIRECTORY_SEPARATOR . 'filesop' . DIRECTORY_SEPARATOR . '' . $fileNameToStore;

        SOP_::find($id)->update([
            'user_id'=> auth()->user()->id,
            'created_at'=> Carbon::now(),
            'updated_at'=> Carbon::now(),
            'title'=> $request->title,
            'department'=> $request->department,
            'departmentview'=> $input['departmentview'],
            'part'=> $request->part,
            'description'=> $request->description,
            'link' => $request->link,
            'sop_path' => ''.URL::to('').$path.'',
            ]);
        } else {
            SOP_::find($id)->update([
                'user_id'=> auth()->user()->id,
                'created_at'=> Carbon::now(),
                'updated_at'=> Carbon::now(),
                'title'=> $request->title,
                'department'=> $request->department,
                'departmentview'=> $input['departmentview'],
                'part'=> $request->part,
                'description'=> $request->description,
                'link' => $request->link,
                ]);
        }

        return redirect('/sop')->with('message', 'SOP Updated Successfully');
    }

    public function render()
    {
        $sop = SOP_::all();
        $sop1 = SOP_::where('part', '=', '01 FORM')->get();
        $sop2 = SOP_::where('part', '=', '02 PROCEDURE')->get();
        $sop3 = SOP_::where('part', '=', '03 WORK INSTRUCTION')->get();
        $sop4 = SOP_::where('part', '=', '04 GUIDELINE')->get();
        $sop5 = SOP_::where('part', '=', '05 QUALITY MANUAL')->get();
        $department = Department::all();
        $userdepartment = auth()->user()->department;
        $users = User::where('department', '=', $userdepartment)->get();
        return view('livewire.sop.all', compact('sop', 'department', 'sop1', 'sop2', 'sop3', 'sop4', 'sop5', 'userdepartment', 'users'));
    }
}