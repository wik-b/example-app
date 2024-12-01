<?php

namespace App\Providers;

use App\Policies\PostsPolicy;
use App\Models\Posts;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthenticationServiceProvider extends ServiceProvider
{
    protected $policies = [
        Posts::class => PostsPolicy::class,
    ];
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot()
    {
        $this->registerPolicies();
    }
}
