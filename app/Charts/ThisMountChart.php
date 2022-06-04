<?php

declare(strict_types = 1);

namespace App\Charts;

use Chartisan\PHP\Chartisan;
use Illuminate\Http\Request;
use App\Models\DemandeService;
use App\Models\DemandeAdhesion;
use ConsoleTVs\Charts\BaseChart;

class ThisMountChart extends BaseChart
{
    /**
     * Handles the HTTP request for the given chart.
     * It must always return an instance of Chartisan
     * and never a string or an array.
     */
    public function handler(Request $request): Chartisan
    {
        $date = date('y-m-d');
        // dd($date);
        // $test = DemandeService::find(2);
        $mounth = date('F', strtotime ($date));
        $year = date('Y', strtotime ($date));
        $mydate=date_format(date_create($year."-".$mounth."-1"), 'y-m-d');

        // dd();
        // ->whereBetween('votes', [1, 100])
        $c_acc = DemandeService::where('type_demande', '=', 'c_accompagnement')->distinct(['num_contrat_accom'])->whereBetween('date_debut', [$mydate, $date])->orderBy('num_contrat_accom')->count();

        $orientation=  DemandeService::where('type_demande', '=', 'orientation')->distinct(['num_contrat_accom'])->whereBetween('date_debut', [$mydate, $date])->orderBy('num_contrat_accom')->count();

        $document=  DemandeService::where('type_demande', '=', 'documents')->distinct(['num_contrat_accom'])->whereBetween('date_debut', [$mydate, $date])->orderBy('num_contrat_accom')->count();
        
        $adhesion=  DemandeAdhesion::distinct(['num_contrat_adh'])->whereBetween('date_debut', [$mydate, $date])->orderBy('num_contrat_adh')->count();
        
        $data =[$c_acc, $orientation, $document, $adhesion];

        return Chartisan::build()
            ->labels(['Accompagnement', 'Orientation', 'Document', 'Adhesion'])
            ->dataset('Ce mois ', $data);
    }
}