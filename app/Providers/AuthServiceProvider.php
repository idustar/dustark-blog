<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Comment' => 'App\Policies\CommentPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
        Gate::define('admin-action', function ($user) {
            return $user->usergroup == "administrator";
        });

        Gate::define('comment-create', function ($user) {
            return $user->usergroup != "forbidden";
        });
        Gate::define('comment-delete', function($user) {
            return $user->usergroup=="administrator";
        });

    }
}
