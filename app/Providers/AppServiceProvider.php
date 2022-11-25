<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
use Symfony\Component\HttpFoundation\Response;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Model::unguard();
        Gate::define('admin', function(User $user){
            return $user->isAdmin === 1;
        });

        Gate::define('user', function(User $user){
            return $user->isAdmin === 0 && $user->verified;
        });

        Blade::if('admin', function(){
            return request()->user()->can('admin');
        });

        Blade::if('user', function(){
            return request()->user()->can('user');
        });
    }
}
