<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function login()
    {
        return view('auth.login')->with('title', 'Log in');
    }

    public function authenticate(LoginRequest $request)
    {
        $credentials = $request->validated();
 
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            if ($request->user()->role == 'admin') {
                return redirect()->intended('admin/dashboard');
            } else {
                return redirect()->intended('home');
            }
        }
 
        return back()->withErrors([
            'message' => 'Username atau password anda salah'
        ]);
    }

    public function register()
    {
        return view('auth.register')->with('title', 'Registrasi');
    }
    
    public function store(RegisterRequest $request)
    {
        $data = $request->validated();

        $user = User::create($data);
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect('login')->with([
            'success' => 'Registrasi berhasil, silahkan login'
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
    
        $request->session()->invalidate();
        $request->session()->regenerateToken();
    
        return redirect()->route('login');
    }
}
