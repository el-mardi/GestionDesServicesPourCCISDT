<?php

declare(strict_types = 1);

namespace App\Charts;

use App\Models\Service;
use Chartisan\PHP\Chartisan;
use Illuminate\Http\Request;
use App\Models\DemandeService;
use ConsoleTVs\Charts\BaseChart;
use App\Models\TypesIntervention;

class DetailsChart extends BaseChart
{
    /**
     * Handles the HTTP request for the given chart.
     * It must always return an instance of Chartisan
     * and never a string or an array.
     */
    public function handler(Request $request): Chartisan
    {
        // $keys = [];
        // $data = [] ;
        $types = TypesIntervention::all();

        foreach ($types as $type) {
            // dd($type->type)
            $services[$type->type] = Service::where('type_id', '=', $type->type_id)->get();

            foreach ($services[$type->type] as $value) {
                $data[] = DemandeService::where('service_id', '=', $value->service_id)->count();
                $keys[] =   $value->service ;
                
            }
        }

            return Chartisan::build()
            ->labels($keys)
            ->dataset('Details', $data);           
    }
}