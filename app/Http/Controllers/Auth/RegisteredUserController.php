<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('guest.add');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required',
        'guest_name' => ['required','string','min:8','regex:/^[A-Za-z0-9!@#$%^&*()_+]+$/'],
        'icon' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        'email' => ['required','regex:/^[a-zA-Z0-9_.+-]+@([a-zA-Z0-9][a-zA-Z0-9-]*[a-zA-Z0-9]*\.)+[a-zA-Z]{2,}$/'],
        'tel' => ['required', 'regex:/^[0-9-]+$/'],
        'password' => ['required','string','min:8','regex:/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[!@#$%^&*()_+])[A-Za-z\d!@#$%^&*()_+]+$/']
        ]);

        $uploadedFile = $request->file('icon');
        if($uploadedFile){
            $fileName = $uploadedFile->getClientOriginalName();
        $uploadedFile->storeAs('public/images/icon',$fileName,);
        }else{
            $fileName = 'default.png';
        }
        
        $user = new User;
        $form = $request->all();
        unset($form['_token'],$form['icon'],$form['password']);
        $user->icon = $fileName;
        $user->status = 'ノーマル';
        $user->password = Hash::make($request->password);
        $user->fill($form)->save();

        event(new Registered($user));

        Auth::login($user);

        return redirect('/guest/guestpage')->with(['msg'=>'登録が完了しました']);
    }
}
