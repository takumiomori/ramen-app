<?php

namespace App\Http\Controllers;

use App\Models\Guest;

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
        $uploadedFile->storeAs('public/images',$fileName,);
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
}
