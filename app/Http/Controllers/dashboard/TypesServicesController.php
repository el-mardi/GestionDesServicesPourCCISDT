<?php

namespace App\Http\Controllers\dashboard;

use App\Models\Service;
use Illuminate\Http\Request;
use App\Models\DemandeService;
use App\Models\DemandeAdhesion;
use App\Models\TypesIntervention;
use App\Models\DetailsServicesPack;
use App\Http\Controllers\Controller;
use App\Models\DetailsServicesIntervenant;

class TypesServicesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $typesServices = TypesIntervention::all();
        // dd($typesServices[0]->services);
        return view('typesServices.index', ['typesServices' => $typesServices]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('typesServices.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all()); 
        $request->validate([
            "nom" => 'required|',
            "code" => 'required|',
        ]);

        $check = TypesIntervention::where('code_type', '=', $request['code'])->first();
        if ($check) {
            return redirect()->back()
            ->withInput()
            ->withErrors(['code'  => 'This code is already exist']);
        } else {
            
            TypesIntervention::create([
                "type" => $request['nom'],
                "code_type" => $request['code'],
                "remarque" => $request['remarque'],

            ]);

            return redirect()->route('typesServices.index')->with('success','Vos données ont enregistrées avec succés');
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
        $services = Service::where('type_id', '=', $id)->get();
        return view('typesServices.show', ['services'  => $services]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $type = TypesIntervention::findOrFail($id);
        //  dd($type);
        return view('typesServices.edit', ['type'=>$type]);
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
        $el = TypesIntervention::findOrFail($id);

        $request->validate([
            "nom" => 'required|',
            "code" => 'required|',
        ]);

        $check = TypesIntervention::where('code_type', '=', $request['code'])
        ->count('type_id');
        // dd($check, $el['code_type']);
        if ($request['code'] ==  $el['code_type']) {
            TypesIntervention::where('type_id', '=', $id)
            ->update([
                "type" => $request['nom'],
                // "code_type" => $request['code'],
                "remarque" => $request['remarque'],
            ]);

        return redirect()->route('typesServices.index')->with('success','Vos données ont été mis à jour avec succés');
            
        } elseif($check == 0) {  
            TypesIntervention::where('type_id', '=', $id)
            ->update([
                "type" => $request['nom'],
                "code_type" => $request['code'],
                "remarque" => $request['remarque'],
            ]);
        }else {
            return redirect()->back()
            ->withInput()
            ->withErrors(['code'  => 'This code is already exist']);  
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $services = Service::where('type_id', '=', $id)->get();

        foreach ($services as $service) {
            $acc_or = DemandeService::where('service_id', '=', $service->service_id)->first();

            foreach ($service->packs as $pack){
                $adh = DemandeAdhesion::where('pack_id', '=', $pack->pack_id)->first();
            }
        }
        
        if (empty($acc_or) && empty($adh)) {
            foreach ($services as $service) {
                DetailsServicesIntervenant::where('service_id', '=', 'service_id');
            }
            TypesIntervention::where('type_id', '=', $id)->delete();
            return redirect()->back()->with('success', "Le type des services est supprimé");
        }
        else{

            return redirect()->back()->with('error', "Impossible, Les services de ce type des services sont lié avec des contrats");
        }
        // DemandeAdhesion::where('service_id', '=', $servcie->service_id)-first();
    }
}
