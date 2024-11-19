<?php

namespace App\Providers;

use App\Models\User;

use Cache;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use View;

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
    public function boot(): void
    {
        Paginator::useBootstrapFive();

        \Debugbar::enable();


        $Suggestions = Cache::remember('Suggestions',10,function(){
            return User::withCount('idea')->orderBy('idea_count', 'DESC')->limit(5)->get();
        });

        View::share('Suggestions',$Suggestions);
    }
}
