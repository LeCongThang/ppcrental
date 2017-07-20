<?php

namespace App\Providers;

use App\Models\PpcDistrict;
use App\Models\PpcPropertyCategory;
use App\Models\PpcSystemConfig;
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
        $menu = PpcPropertyCategory::where('parent_id',0)->orderBy('sort_order','asc')->get();
        $district = PpcDistrict::where('status',1)->orderBy('sort_order')->get();
        $info = PpcSystemConfig::find(1);
        view()->share('menu',$menu);
        view()->share('district',$district);
        view()->share('info',$info);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
