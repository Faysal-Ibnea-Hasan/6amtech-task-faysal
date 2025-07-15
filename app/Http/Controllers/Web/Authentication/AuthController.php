<?php

namespace App\Http\Controllers\Web\Authentication;

use App\Enums\Role;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Inertia\Inertia;

class AuthController extends Controller
{
    public function renderLoginForm()
    {
        return Inertia::render('Auth/Login', [
            'canResetPassword' => true,
            'status' => session('status'),
        ]);
    }

    public function login(LoginRequest $request)
    {
        $credentials = $request->only(['email', 'password']);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/dashboard')->with('success', __('success.login_success', ['attribute' => Auth::user()->name]));
        }

        return back()->withErrors([
            'error' => __('auth.failed')
        ])->onlyInput('email');
    }

    public function renderRegisterForm()
    {
        return Inertia::render('Auth/Register', []);
    }

    public function register(RegisterRequest $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => Role::User,
        ]);

        Auth::login($user);
        return redirect('/dashboard')->with('success', __('success.register_success', ['attribute' => Auth::user()->name]));
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/')->with('success', __('success.logout_success'));
    }
}
