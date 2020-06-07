<?php

namespace App\Providers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
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
        View::composer('layouts.navbars.navs.auth', function($view){
            $authAdmin = Auth::user()->getAuthIdentifier();

            $uavatar = DB::table('canvas_user_meta')
                ->select('avatar')
                ->where('user_id', '=', $authAdmin)
                ->first();

            $data = [
                'avatar' => optional($uavatar)->avatar && !empty(optional($uavatar)->avatar) ? $uavatar->avatar : "https://secure.gravatar.com/avatar/"
            ];

            $view->with('data', $data);
        });

        View::composer('head.navs.*', function($view){
            $sos = DB::table('social_media')
                ->select('socmed', 'link')
                ->get();

            $view->with('sos', $sos);
        });
    }
}
