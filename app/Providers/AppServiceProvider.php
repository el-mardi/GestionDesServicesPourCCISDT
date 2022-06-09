<?php

namespace App\Providers;

use App\Models\Pack;
use App\Models\Qualite;
use App\Models\Secteur;
use App\Models\Service;
use App\Models\JuridiqueForme;
use App\Models\TypesIntervention;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use ConsoleTVs\Charts\Registrar as Charts;

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
    public function boot(Charts $charts)
    {
        $charts->register([
            \App\Charts\SexeChart::class,
            \App\Charts\HomeChart::class,
            \App\Charts\DetailsChart::class,
            \App\Charts\ThisMountChart::class,
            \App\Charts\ThisYearChart::class,
            \App\Charts\DetailsChartAnnee::class,
            
        ]);
        if (Schema::hasTable('types_interventions')){

            $typeServ = TypesIntervention::where('code_type', '=', 'ACC DSR')->first();
            $services = Service::where('type_id', '=', $typeServ->type_id)->get();
            
            $typeOr = TypesIntervention::where('code_type', '=', 'OR DSR')->first();
            $action = Service::where('type_id', '=', $typeOr->type_id)->get();
            
            $qualites = Qualite::all();
            $packs = Pack::all();
            $formesJur = JuridiqueForme::all();
            $secteurs= Secteur::all();
            View::share(['qualites'=> $qualites, 'services'=> $services, 'packs' =>$packs, 'action' =>$action, 'formesJur' => $formesJur, 'secteurs' =>$secteurs]);
        }
    }

}
