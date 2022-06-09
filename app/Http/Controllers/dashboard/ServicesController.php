<?php

namespace App\Http\Controllers\dashboard;

use App\Models\Service;
use App\Models\Partenaire;
use Illuminate\Http\Request;
use App\Models\Fonctionnaire;
use App\Models\Ressortissant;
use App\Models\DemandeService;
use App\Models\DemandeAdhesion;
use App\Models\TypesIntervention;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\DetailsServicesIntervenant;

class ServicesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $services = Service::orderBy('type_id', 'ASC')->get();
        return view('services.index', ['services'  => $services]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $resps = Fonctionnaire::all();
        $types = TypesIntervention::all();
        $partenaires = Partenaire::all();
        
        return view('services.create', ['types' => $types, 'resps' => $resps, 'partenaires' => $partenaires]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd('Edit Save intervenant', $request->all());

        $request->validate([
            'service' => 'required|',
            'code' => 'required|',
            'description' => 'required|',
            // 'periodicite' => 'required|',
            // 'cible' => 'required|',
            'type_service' => 'required|',
            // 'responsable' => 'required|',
            // 'lieu_prestation' => 'required|',
            'tarif' => 'required|',
            // 'ressource_service' => 'required|',
            'etat_service' => 'required|',
            // 'motif_etat_service' => 'required|',
            // 'documentation' => 'required|',
            // 'action_communication' => 'required|',
            // 'remarque' => 'required|',
        ]);
        $check = Service::where('code_service' , '=', $request['code'])->first();
        // dd($check);
        if (!empty($check)) {
            return redirect()->back()
            ->withInput()
            ->withErrors(['code'=>'This code is already exist !']);
        }else{

            $service = Service::create([
                'service' => $request['service'],
                'code_service' => $request['code'],
                'description' => $request['description'],
                // 'periodicite' => $request['periodicite'],
                'cible' => $request['cible'],
                'lieu_prestation' => $request['lieu_prestation'],
                'tarif' => $request['tarif'],
                'ressource_service' => $request['ressource_service'],
                'etat_service' => $request['etat_service'],
                // 'motif_etat_service' => $request['motif_etat_service'],
                'documentation' => $request['documentation'],
                'action_communication' => $request['action_communication'],
                'remarque' => $request['remarque'],
                'type_id' => $request['type_service'],
    
            ]);
            if (!empty($request['responsable'])) {
                $service = Service::where('service_id', '=', $service->service_id)->update([
                    'resp_id' => $request['responsable'],
                ]);
            }


            if (!empty($request['etat_interv']) && !empty($request['intervenant']) ) {
                DetailsServicesIntervenant::create([
                    'service_id' => $service->service_id,
                    'intervenant_id' => $request['intervenant'],
                    'satut' => $request['etat_interv'],
                    'remarque' => $request['remarque'],
                    ]);
                }
            return  redirect()->route('services.index')->with('success','Votre service est enregistrées avec succés');
       
    }
}

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $service = Service::findOrFail($id);
        // dd($service->servicesIntervenants[0]->intervenant);
        return view('services.show', ['service' => $service]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $service = Service::findOrFail($id);
        $resps = Fonctionnaire::all();
        $types = TypesIntervention::all();
        return view('services.edit', ['service' => $service, 'types' => $types, 'resps' => $resps]);
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
        $request->validate([
            'service' => 'required|',
            'code' => 'required|',
            'description' => 'required|',
            // 'cible' => 'required|',
            'type_service' => 'required|',
            // 'responsable' => 'required|',
            // 'lieu_prestation' => 'required|',
            'tarif' => 'required|',
            // 'ressource_service' => 'required|',
            'etat_service' => 'required|',
            // 'motif_etat_service' => 'required|',
            // 'documentation' => 'required|',
            // 'action_communication' => 'required|',
            // 'remarque' => 'required|',
        ]);

        $el = Service::findOrFail($id);
        $check = Service::where('code_service', '=', $request['code'])->first();
        // dd($el);
        if ($el->code_service != $request['code']) {
            if (!empty($check)) {
                return redirect()->back()
                ->withInput()
                ->withErrors(['code'=>'This code is already exist !']);
            }
        }
            Service::where('service_id', '=', $id)
                    ->update([
                        'service' => $request['service'],
                        'code_service' => $request['code'],
                        'description' => $request['description'],
                        'cible' => $request['cible'],
                        'lieu_prestation' => $request['lieu_prestation'],
                        'tarif' => $request['tarif'],
                        'ressource_service' => $request['ressource_service'],
                        'etat_service' => $request['etat_service'],
                        // 'motif_etat_service' => $request['motif_etat_service'],
                        'documentation' => $request['documentation'],
                        'action_communication' => $request['action_communication'],
                        'remarque' => $request['remarque'],
                        'resp_id' => $request['responsable'],
                        'type_id' => $request['type_service'],
            
                    ]);
    
            return  redirect()->route('services.index')->with('success','Vos informations ont été enregistrées avec succés');
        
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $service =DemandeService::where('service_id', '=', $id)->first();
        $pack = DB::table('details_services_packs')->where('service_id', '=', $id)->first();
        if (!empty($pack)) {
            $adhesion =DemandeAdhesion::where('pack_id', '=', $pack->pack_id)->first();
        }
       
       if (empty($service) && empty($pack) && empty($adhesion)) {
            DetailsServicesIntervenant::where('service_id', '=', $id)->delete();
            Service::where('service_id', '=', $id)->delete();
           return  redirect()->back()->with('success', "Le service à ete supprimer avec success ");
       }else{
        return  redirect()->back()->with('error', "Impossible! Ce service est utilisé dans une contrat d'accompagnement, d'orientation, adhesion ou dans un pack");
       }

    }
}
