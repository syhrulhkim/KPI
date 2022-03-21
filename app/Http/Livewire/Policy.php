<?php

namespace App\Http\Livewire;
use Livewire\WithFileUploads;
use Illuminate\Http\Request;
use App\Models\Policy_;
use Illuminate\Support\Carbon;
use Livewire\Component;
use URL;

class Policy extends Component
{
    use WithFileUploads;
    public $policy_path;
    public $id_policy;

    protected $listeners = [
        'delete'
    ];

    public function selectItem($id)
    {
        $this->id_policy = $id;
    }

    public function delete()
    {
        $policy = Policy_::find($this->id_policy);
        $policy->delete();

        return redirect()->back()->with('message', 'Policy deleted successfully');
    }

    public function create(Request $request)
    {
        $this->policy_path = $request->policy_path;
        $filenameWithExt = $this->policy_path->getClientOriginalName();
        $extension = $this->policy_path->getClientOriginalExtension();
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        $fileNameToStore = $filename . '_' . time() . '.' . $extension;
        $this->policy_path->storeAs('public' . DIRECTORY_SEPARATOR . 'filepolicy', $fileNameToStore);
        $path = '' . DIRECTORY_SEPARATOR . 'storage' . DIRECTORY_SEPARATOR . 'filepolicy' . DIRECTORY_SEPARATOR . '' . $fileNameToStore;

        Policy_::insert([
            'user_id'=> auth()->user()->id,
            'created_at'=> Carbon::now(),
            'updated_at'=> Carbon::now(),
            'title'=> $request->title,
            'description'=> $request->description,
            'policy_path' => ''.URL::to('').$path.'',
            ]);

        return redirect()->back()->with('message', 'Policy has been successfully inserted');
    }

    public function edit($id)
    {
        $policy = Policy_::where('id', '=', $id)->get();
        return view('livewire.policy.edit', compact('id', 'policy'));
    }

    public function update(Request $request, $id) 
    {
        if ($request->policy_path != NULL) 
        {
        $this->policy_path = $request->policy_path;
        $filenameWithExt = $this->policy_path->getClientOriginalName();
        $extension = $this->policy_path->getClientOriginalExtension();
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        $fileNameToStore = $filename . '_' . time() . '.' . $extension;
        $this->policy_path->storeAs('public' . DIRECTORY_SEPARATOR . 'filepolicy', $fileNameToStore);
        $path = '' . DIRECTORY_SEPARATOR . 'storage' . DIRECTORY_SEPARATOR . 'filepolicy' . DIRECTORY_SEPARATOR . '' . $fileNameToStore;

        Policy_::find($id)->update([
            'user_id'=> auth()->user()->id,
            'created_at'=> Carbon::now(),
            'updated_at'=> Carbon::now(),
            'title'=> $request->title,
            'description'=> $request->description,
            'policy_path' => ''.URL::to('').$path.'',
            ]);
        } else {
            Policy_::find($id)->update([
                'user_id'=> auth()->user()->id,
                'created_at'=> Carbon::now(),
                'updated_at'=> Carbon::now(),
                'title'=> $request->title,
                'description'=> $request->description,
                ]);
        }

        return redirect('/policy')->with('message', 'Policy Updated Successfully');
    }

    public function render()
    {
        $policy = Policy_::all();
        
        return view('livewire.policy.all', compact('policy'));
    }
}
