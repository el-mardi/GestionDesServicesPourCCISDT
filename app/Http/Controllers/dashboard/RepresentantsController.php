<?php

namespace App\Http\Controllers\dashboard;

use App\Models\Representant;
use Illuminate\Http\Request;
use App\Models\DemandeService;
use App\Models\DemandeAdhesion;
use App\Http\Controllers\Controller;

class RepresentantsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $representants = Representant::all();
        // dd($representants);
        return view('representants.index', ['representants' => $representants]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('representants.create');
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
        'cin' => 'required|',
        'nom' => 'required|',
        'prenom' => 'required|',
        'mail' => 'required|email',
        'nationalite' => 'required|',
        'sexe' => 'required|',
        'adresse' => 'required|',
        'tel' => 'required|',
        'qualite' => 'required|',
       ]);

       Representant::create([
        'cin' => $request['cin'],
        'nom' => $request['nom'],
        'prenom' => $request['prenom'],
        'mail' => $request['mail'],
        'nationalite' => $request['nationalite'],
        'sexe' => $request['sexe'],
        'adresse' => $request['adresse'],
        'tel' => $request['tel'],
        'qualite_id' => $request['qualite'],
       ]);

       return  redirect()->route('representants.index')->with('success','Vos informations ont été enregistrées avec succés');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $rep = Representant::findOrFail($id);
        
        $services = DemandeService::where('rep_id', '=', $id)
                                ->distinct('num_contrat_accom')
                                ->orderBy('type_demande')
                                ->orderBy('num_contrat_accom', 'DESC')
                                ->get(['num_contrat_accom', 'type_demande', 'res_id','fonc_id','date_debut']);

        $adhesions = DemandeAdhesion::where('rep_id', '=', $id)
                                    ->distinct('num_contrat_adh')
                                    ->get(['num_contrat_adh', 'res_id','fonc_id','date_debut']);

        return view('representants.show', ['rep' => $rep ,'services' => $services, 'adhesions' => $adhesions]);
    
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $representnat = Representant::findOrFail($id);
        return view('representants.edit', ['representnat' => $representnat]);
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
    //  dd($request->all());
        $request->validate([
            'cin' => 'required|',
            'nom' => 'required|',
            'prenom' => 'required|',
            'mail' => 'required|email',
            'nationalite' => 'required|',
            'sexe' => 'required|',
            'adresse' => 'required|',
            'tel' => 'required|',
            'qualite' => 'required|',
           ]);
    
           Representant::where('rep_id', '=', $id)
           ->update([
            'cin' => $request['cin'],
            'nom' => $request['nom'],
            'prenom' => $request['prenom'],
            'mail' => $request['mail'],
            'nationalite' => $request['nationalite'],
            'sexe' => $request['sexe'],
            'adresse' => $request['adresse'],
            'tel' => $request['tel'],
            'qualite_id' => $request['qualite'],
           ]);
    
           return  redirect()->route('representants.index')->with('success','Vos informations ont été enregistrées avec succés');
          
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DemandeAdhesion::where('rep_id', '=', $id)->update(['rep_id' => null]);
        DemandeService::where('rep_id', '=', $id)->update(['rep_id' => null]);
        Representant::where('rep_id', '=', $id)->delete();
        
        return redirect()->back()->with('success', "Le représentant est supprimé");
    }
}
