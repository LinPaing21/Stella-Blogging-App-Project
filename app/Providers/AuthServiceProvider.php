<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Blade;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('author', function (User $user) {
            return $user->role === 'author';
        });

        Gate::define('admin', function (User $user) {
            return $user->role === 'admin';
        });

        Blade::if('author', function () {
            return request()->user()?->can('author');
        });

        Blade::if('admin', function () {
            return request()->user()?->can('admin');
        });
    }
}
