<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function loginForm()
    {

        if (session('admin_id')) {
            return redirect()->route('admin.dashboard');
        }
        return view('auth.login');
    }

    public function login(Request $r)
    {
        $credentials = $r->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $user = User::where('email', $r->email)->first();
        if ($user && Hash::check($r->password, $user->password)) {
            session(['admin_id' => $user->id, 'admin_nama' => $user->nama]);
            return redirect()->route('admin.dashboard');
        }
        return back()->with('error', 'Email atau password salah');
    }

    public function logout()
    {
        session()->flush();
        return redirect()->route('login.form')->with('success', 'Anda telah logout');
    }
}
