<?php

namespace App\Providers;

use App\Models\Pack;
use App\Models\Qualite;
use App\Models\Secteur;
use App\Models\Service;
use App\Models\JuridiqueForme;
use Illuminate\Support\Facades\View;
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
        $qualites = Qualite::all();
        $services = Service::where('type_id', '!=', 3)->get();
        $packs = Pack::all();
        $formesJur = JuridiqueForme::all();
        $secteurs= Secteur::all();
        View::share(['qualites'=> $qualites, 'services'=> $services, 'packs' =>$packs, 'formesJur' => $formesJur, 'secteurs' =>$secteurs]);
    }
}
