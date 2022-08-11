<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login() {
        return view('pages.auth.sign-in');
    }
    public function register() {
        return view('pages.auth.sign-up');
    }

    public function loginProcess(Request $request)
    {
        request()->validate(
            [
                'email' => 'required',
                'password' => 'required',
            ]
        );

        $credential = $request->only('email', 'password');

        if (Auth::attempt($credential)) {
            return redirect()->intended('/');
        }

        return redirect()->back()
            ->withInput()
            ->withErrors(['login_gagal' => 'These credentials do not match our records.']);
    }
    public function registerProcess(Request $request)
    {
        request()->validate(
            [
                'name' => 'required',
                'email' => 'required|unique:users,email',
                'password' => 'required',
            ]
        );

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ])->id;

        Auth::loginUsingId($user);
        return to_route('home');
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('login');
    }
}
