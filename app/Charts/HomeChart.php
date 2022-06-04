<?php

declare(strict_types = 1);

namespace App\Charts;

use Chartisan\PHP\Chartisan;
use Illuminate\Http\Request;
use App\Models\Ressortissant;
use App\Models\DemandeService;
use App\Models\DemandeAdhesion;
use ConsoleTVs\Charts\BaseChart;

class HomeChart extends BaseChart
{
    /**
     * Handles the HTTP request for the given chart.
     * It must always return an instance of Chartisan
     * and never a string or an array.
     */
    public function handler(Request $request): Chartisan
    {
        $c_acc = DemandeService::where('type_demande', '=', 'c_accompagnement')->distinct(['num_contrat_accom'])->orderBy('num_contrat_accom')->get(['num_contrat_accom', 'type_demande']);

        $orientation=  DemandeService::where('type_demande', '=', 'orientation')->distinct(['num_contrat_accom'])->orderBy('num_contrat_accom')->get(['num_contrat_accom', 'type_demande']);

        $document=  DemandeService::where('type_demande', '=', 'documents')->distinct(['num_contrat_accom'])->orderBy('num_contrat_accom')->get(['num_contrat_accom', 'type_demande']);
        
        $adhesion=  DemandeAdhesion::distinct(['num_contrat_adh'])->orderBy('num_contrat_adh')->get(['num_contrat_adh']);
        
        $data = [ $c_acc->count(), $orientation->count(), $document->count(), $adhesion->count() ];

        // $sexe = Ressortissant::pluck("sexe");
        
        return Chartisan::build()
            ->labels(['Accompagnement', 'Orientation', 'Document', 'Adhesion'])
            ->dataset('Total ', $data);
            // ->dataset('Sample', [3, 2, 1, 2]);
    }
}