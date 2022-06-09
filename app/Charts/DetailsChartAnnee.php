<?php

declare(strict_types = 1);

namespace App\Charts;

use App\Models\Service;
use Chartisan\PHP\Chartisan;
use Illuminate\Http\Request;
use App\Models\DemandeService;
use ConsoleTVs\Charts\BaseChart;
use App\Models\TypesIntervention;

class DetailsChartAnnee extends BaseChart
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
        $mydateDebut=date_format(date_create($year."-1-1"), 'y-m-d');
        $mydateFin=date_format(date_create($year."-12-31"), 'y-m-d');

        $types = TypesIntervention::all();

        foreach ($types as $type) {
            // dd($type->type)
            $services[$type->type] = Service::where('type_id', '=', $type->type_id)->get();

            foreach ($services[$type->type] as $value) {
                $data[] = DemandeService::where('service_id', '=', $value->service_id)->whereBetween('date_debut', [$mydateDebut, $mydateFin])->count();
                $keys[] =   $value->service ;
                
            }
        }

            return Chartisan::build()
            ->labels($keys)
            ->dataset('Details', $data);           
    }
}