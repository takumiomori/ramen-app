<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class GuestLoginController extends Controller
{
    // ログイン画面呼び出し
    public function showLoginPage(): View
    {
        return view('guest.auth.login');
    }

    // ログイン実行
    public function login(LoginRequest $request): RedirectResponse
    {
        $credentials = $request->only(['mail', 'password']);

        if (Auth::guard('guest')->attempt($credentials)) {
            return redirect()->route('guest.guestpage')->with([
                'msg' => 'ログインしました。',
            ]);
        }

        return back()->withErrors([
            'msg' => ['ログインに失敗しました'],
        ]);
    }
}
