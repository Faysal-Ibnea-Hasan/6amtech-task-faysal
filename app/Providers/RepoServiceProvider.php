<?php
namespace App\Providers;

use App\Repositories\Contracts\AuthRepoInterface;
use App\Repositories\Eloquent\AuthRepo;
use Illuminate\Support\ServiceProvider;


class RepoServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(
            AuthRepoInterface::class,
            AuthRepo::class
        );

        // Bind other repositories here
    }
}
