<?php

namespace App\Services;

use App\Repositories\Contracts\AuthRepoInterface;
use Illuminate\Http\Request;

class AuthService
{
    protected $authRepo;

    public function __construct(AuthRepoInterface $authRepo)
    {
        $this->authRepo = $authRepo;
    }

    public function login(Request $request, $api = false)
    {
        return $this->authRepo->login($request, $api);
    }

    public function register(Request $request, $api = false)
    {
        return $this->authRepo->register($request, $api);
    }

    public function logout(Request $request, $api = false)
    {
        return $this->authRepo->logout($request, $api);
    }
}
