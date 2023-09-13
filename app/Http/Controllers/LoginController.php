<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //
    public function index()
    {
        return view('auth.login.index');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required|min:4',
            'password' => 'required|min:4',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('dashboard');
        }

        return back()->with('loginError', 'Login Gagal!');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login')->with('success', 'Berhasil logout!');
    }

    public function change_password(Request $request, User $user)
    {
        $data = $request->validate([
            'username' => 'required',
            'password' => 'required_with:password_confirmation|same:password_confirmation|min:4',
            'password_confirmation' => 'min:4'
        ]);

        $userData['password'] = bcrypt($data['password']);

        User::where('username', $data['username'])->update($userData);

        return redirect('/dashboard')->with('success', 'Berhasil ganti kata sandi! Harap ingat selalu kata sandi anda!');
    }

    public function show_change_password(Request $request)
    {
        return view('auth.password.index');
    }
}