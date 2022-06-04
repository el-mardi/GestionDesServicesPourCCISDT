<?php

namespace App\Http\Controllers\dashboard;

use PDF;
use App\Models\Pack;
use App\Models\Service;
use Illuminate\Http\Request;
use App\Models\Ressortissant;
use App\Models\DemandeService;
use App\Models\DemandeAdhesion;
use App\Http\Controllers\Controller;
use App\Models\DetailsCertifictOrigine;

class PdfController extends Controller
{
    public function fiche_res(Request $request , $id){

        $res = Ressortissant::where('res_id', '=', $id)->first();
       $data['adh'] = DemandeAdhesion::where('num_contrat_adh', '=', $res->dernier_contrat_adh)->first();
        $data['acc'] = DemandeService::where('num_contrat_accom', '=', $res->dernier_contrat_accom)->where('type_demande', '=', 'c_accompagnement') ->first();
        $data['res']=$res;

        $pdf = PDF::loadView('pdf.ficheRessortissant', $data);
        return $pdf->setPaper('a4', 'landscape')->stream();

    }
    public function action_effectue (Request $request, $id){

        $data['res'] = DemandeService::where('num_contrat_accom', '=', $id)->where('type_demande', '=', 'c_accompagnement')->firstOrFail();

        $services = DemandeService::where('num_contrat_accom', '=', $id)->where('type_demande', '=', 'c_accompagnement')->get('service_id');
        
        foreach ($services as  $value) {
            $data['services'][] = Service::find($value);
        }
        // dd($data['services']);
        $pdf = PDF::loadView('pdf.action_effectue', $data);
        return $pdf->setPaper('a4', 'landscape')->stream();

    }

    public function contratAccompagnement(Request $request, $id){

        $demandes = DemandeService::where('num_contrat_accom', '=', $id)
        ->where('type_demande', '=', 'c_accompagnement') ->get();
        $data['res'] = Ressortissant::where('res_id', '=', $demandes[0]->res_id)->first();
        $data['date'] = $demandes[0]->date_debut;
        $data['province'] = $demandes[0]->province;
        $data['tarif'] = 0;
// dd($demandes[0]->service_id);
        foreach ($demandes as $demande) {
            $data['services'][$demande->service_id] = Service::findOrFail($demande->service_id);
            $data['tarif'] = $data['tarif'] + $data['services'][$demande->service_id]['tarif'];
        }

        // dd($data);
        $pdf = PDF::loadView('pdf.c_accompagnement', $data);
        return $pdf->setPaper('a4')->stream();
    }

    public function orientation (Request $request, $id){
        
        $demandes = DemandeService::where('num_contrat_accom', '=', $id)
        ->where('type_demande', '=', 'orientation') ->get();
        $data['res'] = Ressortissant::where('res_id', '=', $demandes[0]->res_id)->first();
        $data['date'] = $demandes[0]->date_debut;
        $data['province'] = $demandes[0]->province;
        $data['tarif'] = 0;
    // dd($demandes[0]->service_id);
        foreach ($demandes as $demande) {
            $data['services'][$demande->service_id] = Service::findOrFail($demande->service_id);
            $data['tarif'] = $data['tarif'] + $data['services'][$demande->service_id]['tarif'];
        }
        $data['contrat'] = $demandes[0];

        // dd($data);
        $pdf = PDF::loadView('pdf.c_orientation', $data);
        return $pdf->setPaper('a4', 'landscape')->stream();

    }
    
    
    public function documents (Request $request, $action, $id){

        $demande=  DemandeService::where('num_contrat_accom', '=', $id)
        ->where('type_demande', '=', 'documents') ->first();

        $res= Ressortissant::where('res_id', '=', $demande->res_id)->first();

        $data = [
            'res' => $res,
            'document' => $demande,
        ];
        
        if ($action === 'CP')  {
            $pdf =PDF::loadView('pdf.carte_pro', $data);
            return $pdf->setPaper(array(0, 0, 238, 153), 'portrait')->stream();

        } 
        else if($action === 'CO') {
            $details = DetailsCertifictOrigine::where('id_num_contrat', '=', $id)->first();
            $data = [
                'res' => $res,
                'demande' => $demande,
                'document' => $details,
            ];
            
            $pdf = PDF::loadView('pdf.certificat_origine', $data);
            return $pdf->setPaper('a4')->stream();
        }
        else if($action === 'AP') {
            // dd($res->juridiqueForme->code_forme);
            if ($res->juridiqueForme->code_forme === "PP") {
                $pdf = PDF::loadView('pdf.att_exercice_pers_physique', $data);
                return $pdf->setPaper('a4')->stream();
            } 
            else if ($res->juridiqueForme->code_forme === "AE") {
                $pdf = PDF::loadView('pdf.att_exercice_auto_entre', $data);
                return $pdf->setPaper('a4')->stream();
            }
            else if ($res->juridiqueForme->code_forme === "SARL") {
                $pdf = PDF::loadView('pdf.att_exercice_societe', $data);
                return $pdf->setPaper('a4')->stream();
            }
            else if ($res->juridiqueForme->code_forme === "COOP") {
                $pdf = PDF::loadView('pdf.att_exercice_cooperative', $data);
                return $pdf->setPaper('a4')->stream();
            }
        }


    }

    public function adhesion(Request $request, $id){

        $demandes = DemandeAdhesion::where('num_contrat_adh', '=', $id)->get();
        $res = Ressortissant::where('res_id', '=', $demandes[0]->res_id)->first();
        $data['res']  = $res;
        $data['date'] = $demandes[0]->date_debut;
        $data['province'] = $demandes[0]->province;
        $data['pack_tarif'] = 0;
        $data['nom'] = $res->nom . ' ' . $res->prenom;
        $data['cin'] = $res->cin;

        foreach ($demandes as $demande) {
            $myPackDetails = Pack::join('details_services_packs', 'details_services_packs.pack_id', '=', 'packs.pack_id')
            ->join('services', 'services.service_id', '=', 'details_services_packs.service_id')
            ->where('details_services_packs.pack_id', '=', $demande->pack_id)
            ->get(['nom_pack','service' ,'pack_tarif']);

            $data['nom_pack'][]=  $myPackDetails[0]['nom_pack'];
            $data['pack_tarif'] = $data['pack_tarif'] + $myPackDetails[0]['pack_tarif'];

            foreach (  $myPackDetails as $key => $value) {
                $data['service'][] =  $value['service'];
            }
        }

        $pdf = PDF::loadView('pdf.c_adhesion', $data);
            return $pdf->setPaper('a4')->stream();
    }

}
