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
use Illuminate\Support\Facades\Storage;

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
    // dd($ressortissants[0]->date_debut_adh->date_debut);
      return view('ressortissant.index', ['ressortissants' => $ressortissants]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $lastElement = Ressortissant::orderBy('res_id', 'DESC')->pluck("res_id")->first();
        // dd($lastElement);
        if ( $lastElement === null) {
            $lastElement= 1;
        }else{
            $lastElement = $lastElement ++;
        }
        return view('ressortissant.create', ['lastElement' => $lastElement]);
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
            // "rc" => "required|",
            // "date_rc" => "required|",
            // "lieu_rc" => "required|",
            // "id_f" => "required|",
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
        'img' => "",
        'raison_social' => $request['raison_social'],
        'ice' => $request['ice'],
        'rc' => $request['rc'],
        'date_rc' => $request['date_rc'] ,
        'lieu_rc' => $request['lieu_rc'] ,
        'id_f' => $request['id_f'] ,
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

        if (!empty($res) && !empty($request['img'])) {

            $extension = $request->file('img')->getClientOriginalExtension();
            $res->img =   $request['cin'].".".$extension ;
            $res->save();
            
            $request->file('img')->storeAs('public/images',  $request['cin'].".".$extension);
            // $path = $request->file('img')->store('public/images');
            // $res->img =  $request->file('img')->getClientOriginalName();
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

        $ressortissant['date_dernier_contrat_adh'] = DemandeAdhesion::where('num_contrat_adh','=', $ressortissant->dernier_contrat_adh)->first('date_debut');

        $ressortissant['date_dernier_contrat_acc'] = DemandeService::where('type_demande', '=', 'c_accompagnement')->where('num_contrat_accom','=', $ressortissant->dernier_contrat_accom)->first('date_debut');
       
        $contrats = DemandeService::where('res_id', '=', $id)
                            ->where('type_demande', '=', 'c_accompagnement')
                            ->distinct('num_contrat_accom')
                            ->orderBy('num_contrat_accom', 'DESC')
                            ->get(['num_contrat_accom', 'date_debut', 'date_fin', 'province', 'duree', 'fonc_id', 'rep_id', 'remarque' ]);

                            // dd($contrats);
        $services = [];
        foreach ($contrats as $contrat) {
           $services[] = DemandeService::join('services','services.service_id', '=', 'demande_services.service_id')
                            ->where('type_demande', '=', 'c_accompagnement')
                            ->where('num_contrat_accom', '=', $contrat->num_contrat_accom)
                            ->orderBy('num_contrat_accom', 'DESC')
                            ->get();
        }
        
        // Orientation
        $contrats_or = DemandeService::where('res_id', '=', $id)
                            ->where('type_demande', '=', 'orientation')
                            ->distinct('num_contrat_accom')
                            ->orderBy('num_contrat_accom', 'DESC')
                            ->get(['num_contrat_accom', 'date_debut', 'date_fin', 'province', 'duree', 'fonc_id', 'rep_id', 'remarque' ]);

         $orientations = [];
        foreach ($contrats_or as $contrat) {
           $orientations[] = DemandeService::join('services','services.service_id', '=', 'demande_services.service_id')
                            ->where('type_demande', '=', 'orientation')
                            ->where('num_contrat_accom', '=', $contrat->num_contrat_accom)
                            ->orderBy('num_contrat_accom', 'DESC')
                            ->get();
        }

        // Documents

        $contrats_doc = DemandeService::where('res_id', '=', $id)
                            ->where('type_demande', '=', 'documents')
                            ->distinct('num_contrat_accom')
                            ->orderBy('num_contrat_accom', 'DESC')
                            ->get(['num_contrat_accom', 'date_debut', 'date_fin', 'province', 'duree', 'fonc_id', 'rep_id', 'remarque' ]);

         $documents = [];
        foreach ($contrats_doc as $contrat) {
           $documents[] = DemandeService::join('services','services.service_id', '=', 'demande_services.service_id')
                            ->where('type_demande', '=', 'documents')
                            ->where('num_contrat_accom', '=', $contrat->num_contrat_accom)
                            ->orderBy('num_contrat_accom', 'DESC')
                            ->get();
        }


        // $orient_doc = DemandeService::join('services', 'services.service_id', '=', 'demande_services.service_id')
        // ->where('type_demande', '!=', 'c_accompagnement')
        // ->where('res_id', '=', $id)
        // ->get();

        $c_adhesions = DemandeAdhesion::where('res_id', '=', $id)
                                        ->distinct('num_contrat_adh')
                                        ->get('num_contrat_adh');
        $adhesions =[];
        foreach ($c_adhesions as  $adhesion) {
            $adhesions[] = DemandeAdhesion::join('packs', 'packs.pack_id', '=', 'demande_adhesions.pack_id')
            ->where('num_contrat_adh', '=', $adhesion->num_contrat_adh)
            ->get();
        }

        // dd($orientations, $documents);
        return view('ressortissant.show', ['ressortissant' => $ressortissant, 'services' => $services, 'documents' =>$documents, 'orientations' =>$orientations, 'adhesions' =>$adhesions]);
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
            // "rc" => "required|",
            // "date_rc" => "required|",
            // "lieu_rc" => "required|",
            // "id_f" => "required|",
            "fomeJur" => "required|",
            "secteur" => "required|",
            "activite" => "required|",
            "domaine" => "required|",
        ]);

        $res = Ressortissant::where('res_id', '=', $id)
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
        // 'img'=> 'path',
        'raison_social' => $request['raison_social'],
        'ice' => $request['ice'],
        'rc' => $request['rc'],
        'date_rc' => $request['date_rc'] ,
        'lieu_rc' => $request['lieu_rc'] ,
        'id_f' => $request['id_f'] ,
        'patente' => $request['patente'],
        'accompagnement' => $request['cont_accom'],
        'secteur' => $request['secteur'],
        'activite' => $request['activite'],
        'qualite_id' => $request['qualite'],
        'formeJur_id' => $request['fomeJur'],
        ]);

        if( !empty($request['img'])) {
            // dd($request->file('img')->getClientOriginalExtension());
            if(Storage::exists('/images/'.$request['img'])) {
                Storage::delete('file.jpg');
            }
            $extension = $request->file('img')->getClientOriginalExtension();
            Ressortissant::where('res_id', '=', $id)
                ->update([
                    'img' =>  $request['cin'].".".$extension ,
                ]);
            // $res->
            // $res->save();
            
            $request->file('img')->storeAs('public/images',  $request['cin'].".".$extension);
            // $path = $request->file('img')->store('public/images');
            // $res->img =  $request->file('img')->getClientOriginalName();
        }

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
