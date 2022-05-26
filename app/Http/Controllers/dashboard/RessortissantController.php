<?php

namespace App\Http\Controllers\dashboard;

use App\Models\Qualite;
use App\Models\Service;
use App\Models\Activite;
use Illuminate\Http\Request;
use App\Models\Ressortissant;
use App\Models\DemandeService;
use App\Models\JuridiqueForme;
use App\Models\DemandeAdhesion;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class RessortissantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dd(Auth::user()->username);
      $ressortissants = Ressortissant::all();
    //   dd($ressortissants);

foreach ($ressortissants as $ressortissant) {
     
    $ressortissant['date_debut'] = DemandeService::where('type_demande', '=', 'c_accompagnement')->where('num_contrat_accom', '=', $ressortissant->dernier_contrat_accom)->first('date_debut');
    
    $ressortissant['date_debut_adh'] = DemandeAdhesion::where('num_contrat_adh', '=', $ressortissant->dernier_contrat_adh)->first('date_debut');
      
    }
    // dd($ressortissant);
      return view('ressortissant.index', ['ressortissants' => $ressortissants]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ressortissant.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            // "img" => "required|",
            "num_fiche" => "required|",
            "cin" => "required|",
            "nom" => "required|",
            "prenom" => "required|",
            "date_naissance" => "required|",
            "mail" => "required|email",
            "adresse" => "required|",
            "nationalite" => "required|",
            "sexe" => "required|",
            "residence" => "required|",
            "formation" => "required|",
            "qualite" => "required|",
            "ice" => "required|",
            "rc" => "required|",
            "fomeJur" => "required|",
            "secteur" => "required|",
            "activite" => "required|",
            "domaine" => "required|",
        ]);

        // $img = $request->file('img');
        // dd($img);

        $res= Ressortissant::create([
        'num_fiche' => $request['num_fiche'],
        'nom' => $request['nom'],
        'prenom' => $request['prenom'],
        'cin' => $request['cin'],
        'nationalite' => $request['nationalite'],
        'adresse' => $request['adresse'],
        'residence' => $request['residence'],
        'date_naissance' => $request['date_naissance'],
        'sexe' => $request['sexe'],
        'tel' => $request['tel'],
        'mail' => $request['mail'],
        'formation' => $request['formation'],
        'experience' => $request['experience'],
        'img' => $request->file('img')->getClientOriginalName(),
        'raison_social' => $request['raison_social'],
        'ice' => $request['ice'],
        'rc' => $request['rc'],
        'patente' => $request['patente'],
        'dernier_contrat_adh' => null,
        'dernier_contrat_accom' => null,
        'accompagnement' => 0,
        'secteur' => $request['secteur'],
        // 'act_id' => $request['activite'],
        'activite' => $request['activite'],
        'dom_id' => $request['domaine'],
        'qualite_id' => $request['qualite'],
        'formeJur_id' => $request['fomeJur'],
        ]);

        if (!empty($res)) {
            $request->file('img')->storeAs('images',  $request['cin'].'.jpg');
            // $path = $request->file('img')->store('public/images');
        }

        if (!empty($request['remarque'])) {
            $service = Ressortissant::where('res_id', '=', $res->res_id)->update([
                'remarque' => $request['remarque'],
            ]);
        }

        return redirect()->route('ressortissant.index')->with('success', "Ressortissant est enregistré");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ressortissant = Ressortissant::findOrFail($id);
        // dd($ressortissant);
        
        $ressortissant['date_dernier_contrat'] = DemandeAdhesion::where('num_contrat_adh','=', $ressortissant->dernier_contrat_adh)->first('date_debut');
       
        $contrats = DemandeService::where('res_id', '=', $id)
                            ->where('type_demande', '=', 'c_accompagnement')
                            ->distinct('num_contrat_accom')
                            ->get(['num_contrat_accom', 'date_debut', 'date_fin', 'province', 'duree', 'fonc_id', 'rep_id', 'remarque' ]);

        $services = [];
        foreach ($contrats as $contrat) {
           $services[] = DemandeService::join('services','services.service_id', '=', 'demande_services.service_id')
                            ->where('num_contrat_accom', '=', $contrat->num_contrat_accom)
                            ->get();
        }
        
        $orient_doc = DemandeService::join('services', 'services.service_id', '=', 'demande_services.service_id')
        ->where('type_demande', '!=', 'c_accompagnement')
        ->where('res_id', '=', $id)
        ->get();

        $c_adhesions = DemandeAdhesion::where('res_id', '=', $id)
                                        ->distinct('num_contrat_adh')
                                        ->get('num_contrat_adh');
        $adhesions =[];
        foreach ($c_adhesions as  $adhesion) {
            $adhesions[] = DemandeAdhesion::join('packs', 'packs.pack_id', '=', 'demande_adhesions.pack_id')
            ->where('num_contrat_adh', '=', $adhesion->num_contrat_adh)
            ->get();
        }

        return view('ressortissant.show', ['ressortissant' => $ressortissant, 'services' => $services, 'orient_doc' =>$orient_doc, 'adhesions' =>$adhesions]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ressortissant = Ressortissant::findOrFail($id);
        // dd($ressortissant);

        return view('ressortissant.edit', ['ressortissant'=>$ressortissant]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // dd($request->all());

        $request->validate([
            // "img" => "required|",
            "num_fiche" => "required|",
            "cin" => "required|",
            "nom" => "required|",
            "prenom" => "required|",
            "date_naissance" => "required|",
            "mail" => "required|",
            "adresse" => "required|",
            "nationalite" => "required|",
            "sexe" => "required|",
            "residence" => "required|",
            "formation" => "required|",
            "qualite" => "required|",
            "ice" => "required|",
            "rc" => "required|",
            "fomeJur" => "required|",
            "secteur" => "required|",
            "activite" => "required|",
            "domaine" => "required|",
        ]);

        Ressortissant::where('res_id', '=', $id)
        ->update([
        'num_fiche' => $request['num_fiche'],
        'nom' => $request['nom'],
        'prenom' => $request['prenom'],
        'cin' => $request['cin'],
        'nationalite' => $request['nationalite'],
        'adresse' => $request['adresse'],
        'residence' => $request['residence'],
        'date_naissance' => $request['date_naissance'],
        'sexe' => $request['sexe'],
        'tel' => $request['tel'],
        'mail' => $request['mail'],
        'formation' => $request['formation'],
        'experience' => $request['experience'],
        // 'img' => $request->file('img')->store('public/images'),
        'img'=> 'path',
        'raison_social' => $request['raison_social'],
        'ice' => $request['ice'],
        'rc' => $request['rc'],
        'patente' => $request['patente'],
        'accompagnement' => $request['cont_accom'],
        'secteur' => $request['secteur'],
        'act_id' => $request['activite'],
        'qualite_id' => $request['qualite'],
        'formeJur_id' => $request['fomeJur'],
        ]);

    return redirect()->route('ressortissant.index')->with('success','Les informations du ressortissant ont mis à jour succés ');
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $services = DemandeService::where('res_id', '=', $id)->delete();
        $adhesions = DemandeAdhesion::where('res_id', '=', $id)->delete();
        $res = Ressortissant::where('res_id', '=', $id)->delete();

        // dd('controller');
        return redirect()->route('ressortissant.index')->with('success', 'La suppression est términé. ') ;
    }
}
