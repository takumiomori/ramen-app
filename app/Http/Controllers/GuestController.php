<?php

namespace App\Http\Controllers;

use App\Models\Guest;
use App\Models\Post;
use App\Models\Favorite;

use Illuminate\Http\Request;
use Illuminate\View\View;



class GuestController extends Controller
{
    public function index(Request $request):View{
        $items = Guest::all();
        $msg = session('msg');
        return view('guest.index',['items' => $items,'msg'=>$msg,]);
    }

    public function add(Request $request):View{
        $msg = session('msg');
        return view('guest.add',['msg'=>$msg]);
    }

    public function create(Request $request){
        $this->validate($request,Guest::$rules);
        $request->validate([
            'icon' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        $uploadedFile = $request->file('icon');
        if($uploadedFile){
            $fileName = $uploadedFile->getClientOriginalName();
        $uploadedFile->storeAs('public/images/icon',$fileName,);
        }else{
            $fileName = 'default.png';
        }
        
        $guest = new Guest;
        $form = $request->all();
        unset($form['_token'],$form['icon']);
        $guest->icon = $fileName;
        $guest->fill($form)->save();

        return view('guest.add',['msg'=>'登録が完了しました']);

    }

    public function delete(Request $request){
        $guest=Guest::find($request->id);
        return view('guest.del',['form'=>$guest]);
    }

    public function remove(Request $request){
        Guest::find($request->id)->delete();
        return  redirect('/guest/index')->with(['msg'=>'削除が完了しました']);
    }

    public function edit(Request $request){
        $guest=Guest::find($request->id);
        return view('guest.edit',['form'=>$guest]);
    }

    public function update(Request $request){
        $this->validate($request,Guest::$rules);
        $request->validate([
            'icon' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        $uploadedFile = $request->file('icon');
        if($uploadedFile){
            $fileName = $uploadedFile->getClientOriginalName();
        $uploadedFile->storeAs('public/images/icon',$fileName,);
        }else{
            $fileName = 'default.png';
        }
        
        $id = $request->id;

        $guest = Guest::find($id);
        $form = $request->all();
        unset($form['_token'],$form['icon']);
        $guest->icon = $fileName;
        $guest->fill($form)->save();

        return redirect('/guest/guestpage')->with(['msg'=>'更新が完了しました']);

    }

    public function show(Request $request){
        $msg = session('msg');
        $guest_id = $request->id;
        $guest = Guest::find($guest_id);
        $favorites = Favorite::where('guest_id', '=', $guest_id)->with('shop')->get();
        $posts = Post::where('guest_id', '=', $guest_id)->get();
        return view('guest.guestpage',['item'=>$guest,'favorites'=>$favorites,'posts'=>$posts,'msg'=>$msg]);
    }
}
