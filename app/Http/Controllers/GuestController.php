<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Post;
use App\Models\Favorite;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;



class GuestController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin')->only(['guest.index','guest.del']);

        $this->middleware('auth')->only(['guest.edit', 'guest.page']);
        $this->middleware('user')->only(['guest.edit', 'guest.page']);
    }

    public function index(Request $request):View{
        $items = User::all();
        $msg = session('msg');
        return view('guest.index',['items' => $items,'msg'=>$msg,]);
    }

    public function add(Request $request):View{
        $msg = session('msg');
        return view('guest.add',['msg'=>$msg]);
    }

    public function create(Request $request){
        $this->validate($request,User::$rules);
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
        
        $guest = new User;
        $form = $request->all();
        unset($form['_token'],$form['icon']);
        $guest->icon = $fileName;
        $guest->status = 'ノーマル';
        $guest->fill($form)->save();

        return view('guest.add',['msg'=>'登録が完了しました']);

    }

    public function delete(Request $request){
        $guest=User::find($request->id);
        return view('guest.del',['form'=>$guest]);
    }

    public function remove(Request $request){
        User::find($request->id)->delete();
        return  redirect('/guest/index')->with(['msg'=>'削除が完了しました']);
    }

    public function edit(Request $request){
        $guest=User::find($request->id);
        return view('guest.edit',['form'=>$guest]);
    }

    public function update(Request $request){
        $this->validate($request,User::$rules);
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

        $user = User::find($id);
        $form = $request->all();
        unset($form['_token'],$form['icon']);
        $user->icon = $fileName;
        $user->fill($form)->save();

        return redirect('/guest/guestpage')->with(['msg'=>'更新が完了しました']);

    }

    public function show(Request $request){
        $msg = session('msg');
        $user_id = Auth::id();
        $user = User::find($user_id);
        $favorites = Favorite::where('user_id', '=', $user_id)->with('shop')->get();
        $posts = Post::where('user_id', '=', $user_id)->get();
        return view('guest.guestpage',['item'=>$user,'favorites'=>$favorites,'posts'=>$posts,'msg'=>$msg]);
    }
}
