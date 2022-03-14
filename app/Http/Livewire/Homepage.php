<?php

namespace App\Http\Livewire;

use App\Models\User;
use App\Models\Memo_;
use Livewire\Component;
use Illuminate\Http\Request;
use App\Models\Announcement_;

class Homepage extends Component
{
    public $id_announcement;
    public $model_id;
    public $action;

    protected $listeners = [
        'delete',
    ];
    
    public function selectItem($model_id, $action)
    {
        $this->id_announcement = $model_id;
        $this->action = $action;
    }

    public function delete()
    {
        Announcement_::find($this->id_announcement)->update([
        'announcement'=> '',
        'user_id'=> '',
        ]);
        return redirect()->back()->with('message', 'Your message to this employee has been deleted!');
    }

    public function announcementuphr(Request $request, $id_announcement)
    {
        Announcement_::find($id_announcement)->update([
        'announcement'=> $request->announcement,
        'user_id'=> auth()->user()->id,
        ]);
        return redirect()->back()->with('message', 'Your message has been submitted!');
    }

    public function index()
    {
        $url = "http://www.lionpubpattaya.com/index.php/tv-guide";
        $html = file_get_html ( $url );
        
        $games = [];
        $i = 0;
        foreach ( $html->find ( 'h2' ) as $element ) {
            $games[$i]['gameTitle'] = trim( str_replace("\r\n","", $element->plaintext ) );  
            $games[$i]['gameList'] = explode("\r\n", $element->next_sibling()->plaintext);
            $i++;           
            flush();
        }
        
        unset($games[15]);
        unset($games[16]);
        
        $games = array_filter($games);
        
        return $games;
    }

    public function render()
    {
        $announcement = Announcement_::all();
        $memo = Memo_::orderBy('created_at','desc')->take(3)->get();
        $users = User::orderBy('created_at','desc')->get();
        $userscount = $users->count();
        return view('livewire.homepage')->with(compact('users', 'userscount', 'memo', 'announcement'));
    }
}
