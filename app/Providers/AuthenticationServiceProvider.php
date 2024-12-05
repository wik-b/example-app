<?php

namespace App\Providers;

use App\Policies\PostsPolicy;
use App\Models\Posts;
use App\Policies\CommentPolicy;
use App\Models\Comment;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthenticationServiceProvider extends ServiceProvider
{
    protected $policies = [
        Posts::class => PostsPolicy::class,
        Comment::class => CommentPolicy::class,
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
