<?php

namespace App\Repositories\Contracts;

use Illuminate\Http\Request;

interface AuthRepoInterface
{
    public function login(Request $request, bool $api = false);

    public function register(Request $request, bool $api = false);

    public function logout(Request $request, bool $api = false);
}
