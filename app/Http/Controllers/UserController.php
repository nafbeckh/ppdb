<?php

namespace App\Http\Controllers;

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

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);
 
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
 
            return redirect()->intended('home');    
        }
 
        return back()->withErrors([
            'message' => 'Username atau password anda salah'
        ]);
    }

    public function register()
    {
        return view('auth.register')->with('title', 'Registrasi');
    }
    
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|max:100',
            'username' => 'required|max:100|unique:users',
            'password' => 'required|min:2|confirmed',
            'password_confirmation' => 'required|min:2'
        ]);

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
