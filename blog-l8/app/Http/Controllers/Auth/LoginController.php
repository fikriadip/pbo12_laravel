<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Auth\AuthRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Alert;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    public function showLoginForm()
    {
        return view('auth.login-register');
    }

    public function login(AuthRequest $request)
    {
        $validate = $request->validated();
        $remember = $request->remember == 'on' ? true : false; // rememberme
        if (Auth::attempt($request->only('username', 'password'), $remember)) {
            if (Auth()->user()->role == 'admin') {
                toast('Berhasil Login Welcome Admin','success');
                return redirect('/dashboard');
            } else if (Auth()->user()->role == 'creator') {
                toast('Berhasil Login Welcome Creator','success');
                return redirect('/blog');
            }
        } else {
            Alert::warning('GAGAL LOGIN', 'Periksa Kembali Username Dan Password Anda');
            return redirect('/')->withInput()->withErrors(['username' => 'Username yang anda masukkan salah','password' => 'Password yang anda masukkan salah']);
        }
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function logout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->flush();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
