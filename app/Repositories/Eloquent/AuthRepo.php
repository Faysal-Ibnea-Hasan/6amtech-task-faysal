<?php

namespace App\Repositories\Eloquent;

use App\Enums\Role;
use App\Models\User;
use App\Repositories\Contracts\AuthRepoInterface;
use App\Traits\CustomApiResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthRepo implements AuthRepoInterface
{
    use CustomApiResponse;
    public function login(Request $request, bool $api = false)
    {
        if ($api) {
            $credentials = $request->only('email', 'password');
            $hasToken = Auth::guard('api')->attempt($credentials);
            if (!$hasToken) {
                return $this->errorResponse([], __('auth.failed'), 401);
            }
            return $this->responseWithToken($hasToken);
        }
        $credentials = $request->only(['email', 'password']);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/dashboard')->with('success', __('success.login_success', ['attribute' => Auth::user()->name]));
        }

        return back()->withErrors([
            'error' => __('auth.failed')
        ])->onlyInput('email');
    }

    public function register(Request $request, bool $api = false)
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

    public function logout(Request $request, bool $api = false)
    {
        if ($api) {
            Auth::guard('api')->logout();
            return $this->successResponse(__('success.logout_success'));
        }
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/')->with('success', __('success.logout_success'));
    }
}
