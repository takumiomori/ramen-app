<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\Guest;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class GuestRegisterController extends Controller
{
    // 登録画面呼び出し
    public function create(): View
    {
        return view('guest.add');
    }

    // 登録実行
    public function store(Request $request): RedirectResponse
    {
        $this->validate($request,Guest::$rules);
        $request->validate([
            'icon' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

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
        unset($form['_token'],$form['icon'],$form['password']);
        $guest->icon = $fileName;
        $guest->status = 'ノーマル';
        $guest->password = Hash::make($request->password);
        $guest->fill($form)->save();


        event(new Registered($guest));


        return redirect('/guest/guestpage');
    }
}
