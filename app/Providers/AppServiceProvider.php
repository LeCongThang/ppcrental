<?php

namespace App\Providers;

use App\Models\PpcDistrict;
use App\Models\PpcProperty;
use App\Models\PpcPropertyCategory;
use App\Models\PpcSystemConfig;
use App\Models\PpcSearch;
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
        $property= PpcProperty::where('status',1)->orderBy('updated_at','desc')->take(2)->get();
        $bed = PpcSearch::where('type', 1)->get();
        $min = PpcSearch::where('type', 2)->get();
        $max = PpcSearch::where('type', 3)->get();
        view()->share('menu',$menu);
        view()->share('district',$district);
        view()->share('info',$info);
        view()->share('property2',$property);
        view()->share('bed',$bed);
        view()->share('min',$min);
        view()->share('max',$max);

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
