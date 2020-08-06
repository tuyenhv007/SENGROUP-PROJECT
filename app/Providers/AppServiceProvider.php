<?php

namespace App\Providers;

use App\Comment;
use Illuminate\Support\ServiceProvider;

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
        //

        view()->composer('houses.detail',function ($view){
            $comments=Comment::all();
            $view->with(['comments'=>$comments]);
        });
    }
}
