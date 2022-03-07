<?php

namespace App\Http\Livewire;
use App\Models\User;
use App\Models\Memo_;
use Livewire\Component;
use Illuminate\Http\Request;
use Livewire\WithFileUploads;
use Illuminate\Support\Carbon;
use App\Notifications\MemoNotification;
use Illuminate\Support\Facades\Notification;

class Memo extends Component
{
    use WithFileUploads;
    public $memo_path;
    public $id_memo;

    protected $listeners = [
        'delete'
    ];

    public function selectItem($id)
    {
        $this->id_memo = $id;
    }

    public function delete()
    {
        $memo = Memo_::find($this->id_memo);
        $memo->delete();

        return redirect()->back()->with('message', 'Memo deleted successfully');
    }

    public function create(Request $request)
    {
        $this->memo_path = $request->memo_path;
        $filenameWithExt = $this->memo_path->getClientOriginalName();
        $extension = $this->memo_path->getClientOriginalExtension();
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        $fileNameToStore = $filename . '_' . time() . '.' . $extension;
        $this->memo_path->storeAs('public' . DIRECTORY_SEPARATOR . 'filememo', $fileNameToStore);
        $path = '' . DIRECTORY_SEPARATOR . 'storage' . DIRECTORY_SEPARATOR . 'filememo' . DIRECTORY_SEPARATOR . '' . $fileNameToStore;

        Memo_::insert([
            'user_id'=> auth()->user()->id,
            'created_at'=> Carbon::now(),
            'updated_at'=> Carbon::now(),
            'title'=> $request->title,
            'description'=> $request->description,
            'memo_path' => $path,
            ]);
        $user = User::all();
        Notification::send($user, new MemoNotification($request->title));

        return redirect()->back()->with('message', 'Memo has been successfully inserted');
    }

    public function edit($id)
    {
        $memo = Memo_::where('id', '=', $id)->get();
        return view('livewire.memo.edit', compact('id', 'memo'));
    }

    public function update(Request $request, $id) 
    {
        if ($request->memo_path != NULL) 
        {
        $this->memo_path = $request->memo_path;
        $filenameWithExt = $this->memo_path->getClientOriginalName();
        $extension = $this->memo_path->getClientOriginalExtension();
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        $fileNameToStore = $filename . '_' . time() . '.' . $extension;
        $this->memo_path->storeAs('public' . DIRECTORY_SEPARATOR . 'filememo', $fileNameToStore);
        $path = '' . DIRECTORY_SEPARATOR . 'storage' . DIRECTORY_SEPARATOR . 'filememo' . DIRECTORY_SEPARATOR . '' . $fileNameToStore;

        Memo_::find($id)->update([
            'user_id'=> auth()->user()->id,
            'created_at'=> Carbon::now(),
            'updated_at'=> Carbon::now(),
            'title'=> $request->title,
            'description'=> $request->description,
            'memo_path' => $path,
            ]);
        } else {
            Memo_::find($id)->update([
                'user_id'=> auth()->user()->id,
                'created_at'=> Carbon::now(),
                'updated_at'=> Carbon::now(),
                'title'=> $request->title,
                'description'=> $request->description,
                ]);
        }

        return redirect('/memo')->with('message', 'Memo Updated Successfully');
    }


    public function render()
    {
        $memo = Memo_::all();
        return view('livewire.memo.all', compact('memo'));
    }
}
