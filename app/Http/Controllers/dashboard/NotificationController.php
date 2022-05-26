<?php

namespace App\Http\Controllers\dashboard;

use Illuminate\Http\Request;
use App\Models\Fonctionnaire;
use App\Models\DemandeService;
use App\Models\DemandeAdhesion;
use App\Http\Controllers\Controller;

class NotificationController extends Controller
{
    public function notifications (){

        $accompagnements = [];
        $c_acc = DemandeService::where('type_demande', '=', 'c_accompagnement')->distinct(['num_contrat_accom'])->orderBy('num_contrat_accom', 'DESC')->get(['num_contrat_accom', 'type_demande']);
        foreach ($c_acc as  $c_contrat) {
            $accompagnements[] = DemandeService::where('type_demande', '=', 'c_accompagnement')->where('num_contrat_accom', '=', $c_contrat->num_contrat_accom)->first();
        }
        $orientations =[];
        $orientation=  DemandeService::where('type_demande', '=', 'orientation')->distinct(['num_contrat_accom'])->orderBy('num_contrat_accom', 'DESC')->get(['num_contrat_accom', 'type_demande']);
        foreach ($orientation as  $o_contrat) {
            $orientations[] = DemandeService::where('type_demande', '=', 'orientation')->where('num_contrat_accom', '=', $o_contrat->num_contrat_accom)->first();
        }

        $documents = [];
        $document=  DemandeService::where('type_demande', '=', 'documents')->distinct(['num_contrat_accom'])->orderBy('num_contrat_accom', 'DESC')->get(['num_contrat_accom', 'type_demande']);
        foreach ($document as  $d_contrat) {
            $documents[] = DemandeService::where('type_demande', '=', 'documents')->where('num_contrat_accom', '=', $d_contrat->num_contrat_accom)->first();
        }
       
        $adhesions = [];
        $adhesion=  DemandeAdhesion::distinct(['num_contrat_adh'])->orderBy('num_contrat_adh', 'DESC')->get(['num_contrat_adh']);
        foreach ($adhesion as  $a_contrat) {
            $adhesions[] = DemandeAdhesion::where('num_contrat_adh', '=', $a_contrat->num_contrat_adh)->first();
        }
        // dd($c_acc, $orientation, $document);

        // dd($accompagnements, $orientations, $documents, $adhesions);

        return view('notifications.index', ['accompagnements'=> $accompagnements, 'orientations'=> $orientations, 'documents'=> $documents, 'adhesions'=> $adhesions,]);

    }
}
