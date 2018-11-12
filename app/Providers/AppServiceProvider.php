<?php

namespace App\Providers;

use App\Channel;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        \View::composer('*',function($view){

                $channels = \Cache::rememberForever('channel',function(){


                    return Channel::all();
                });
        
            $view->with('channels',$channels);

        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
     
    }
}
