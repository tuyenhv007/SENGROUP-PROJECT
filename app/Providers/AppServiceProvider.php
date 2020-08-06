<?php

namespace App\Providers;

<<<<<<< HEAD
use Illuminate\Support\Facades\Schema;
=======
use App\Comment;
>>>>>>> c2c6b79e587b7f4f4430fc0b65b7efd34507833c
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
<<<<<<< HEAD
=======
        //

        view()->composer('houses.detail',function ($view){
            $comments=Comment::all();
            $view->with(['comments'=>$comments]);
        });
>>>>>>> c2c6b79e587b7f4f4430fc0b65b7efd34507833c
    }
}
