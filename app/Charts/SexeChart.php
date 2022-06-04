<?php

declare(strict_types = 1);

namespace App\Charts;

use Chartisan\PHP\Chartisan;
use Illuminate\Http\Request;
use App\Models\Ressortissant;
use ConsoleTVs\Charts\BaseChart;

class SexeChart extends BaseChart
{
    /**
     * Handles the HTTP request for the given chart.
     * It must always return an instance of Chartisan
     * and never a string or an array.
     */
    public function handler(Request $request): Chartisan
    {
        $homme = Ressortissant::where('sexe', '=', 'Homme')->pluck("sexe");
        $femme = Ressortissant::where('sexe', '=', 'Femme')->pluck("sexe");
        $sexe = Ressortissant::pluck("sexe");
        $data = [ $homme->count(), $femme->count()];
        
        return Chartisan::build()
            ->labels([ 'Homme', 'Femme'])
            ->dataset('Sexe', $data);
    }
}