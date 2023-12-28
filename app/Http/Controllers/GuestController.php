<?php

namespace App\Http\Controllers;

use App\Models\Guest;

use Illuminate\Http\Request;
use Illuminate\View\View;



class GuestController extends Controller
{
    public function index(Request $request):View{
        $items = Guest::all();
        return view('guest.index',['items' => $items]);
    }

    public function add(Request $request):View{
        $msg = session('msg');
        return view('guest.add',['msg'=>$msg]);
    }

    public function create(Request $request){
        $this->validate($request,Guest::$rules);
        $request->validate([
            'icon' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        $uploadedFile = $request->file('icon');
        $fileName = $uploadedFile->getClientOriginalName();
        $uploadedFile->storeAs('public/images',$fileName,);
        
        $guest = new Guest;
        $form = $request->all();
        unset($form['_token'],$form['icon']);
        $guest->icon = $fileName;
        $guest->fill($form)->save();

        return view('guest.add',['msg'=>'登録が完了しました']);

    }
}
