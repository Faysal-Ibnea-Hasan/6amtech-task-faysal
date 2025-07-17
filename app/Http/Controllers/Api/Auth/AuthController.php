<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Traits\CustomApiResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    use CustomApiResponse;

    public function login(LoginRequest $request)
    {
        $credentials = $request->only('email', 'password');
        $hasToken = Auth::guard('api')->attempt($credentials);
        if (!$hasToken) {
            return $this->errorResponse([],__('auth.failed'), 401);
        }
        return $this->responseWithToken($hasToken);
    }

    public function logout()
    {
        Auth::guard('api')->logout();
        return $this->successResponse(__('success.logout_success'));
    }
}
