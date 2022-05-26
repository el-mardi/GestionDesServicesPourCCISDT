<?php

namespace App\Http\Controllers\dashboard;

use PDF;
use Illuminate\Http\Request;
use App\Models\Ressortissant;
use App\Models\DemandeService;
use App\Models\DemandeAdhesion;
use App\Http\Controllers\Controller;

class PdfController extends Controller
{
    public function fiche_res(Request $request , $id){

        $res = Ressortissant::where('res_id', '=', $id)->first();
       $data['adh'] = DemandeAdhesion::where('num_contrat_adh', '=', $res->dernier_contrat_adh)->first();
        $data['acc'] = DemandeService::where('num_contrat_accom', '=', $res->dernier_contrat_accom)->where('type_demande', '=', 'c_accompagnement') ->first();
        $data['res']=$res;

        $pdf = PDF::loadView('pdf.ficheRessortissant', $data);
        return $pdf->setPaper('a4')->stream();

    }
}
