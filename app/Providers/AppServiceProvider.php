<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Routing\UrlGenerator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(UrlGenerator $url): void
    {
        if(config('app.env') === 'production') {
            $url->forceScheme('https');
        }        
        Gate::define('admin', function($user){
            return $user->role_id === User::ADMIN_ROLE_ID;
        });
    }
}
