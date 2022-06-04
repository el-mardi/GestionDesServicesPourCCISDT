<?php

namespace App\Http\Controllers\dashboard;

use App\Models\Service;
use Illuminate\Http\Request;
use App\Models\Fonctionnaire;
use App\Models\DemandeService;
use App\Models\DemandeAdhesion;
use Illuminate\Validation\Rules;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fonctionnaires = Fonctionnaire::all();
        return view('admin.index', ['fonctionnaires'=> $fonctionnaires]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $admin = Fonctionnaire::findOrFail($id);
        // dd($admin);
        $services = DemandeService::where('fonc_id', '=', $id)
        ->distinct('num_contrat_accom')
        ->orderBy('type_demande')
        ->orderBy('num_contrat_accom', 'DESC')
        ->get(['num_contrat_accom', 'type_demande', 'res_id','rep_id','date_debut']);

            $adhesions = DemandeAdhesion::where('fonc_id', '=', $id)
            ->distinct('num_contrat_adh')
            ->get(['num_contrat_adh', 'res_id','rep_id','date_debut']);

        $responsable = Service::where('resp_id', '=', $id)->get();

        return view('admin.show', ['services' => $services, 'adhesions' => $adhesions, 'responsable' =>$responsable]);
        

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   $fonctionnaire = Fonctionnaire::findOrFail($id);
        // dd($fonctionnaire);
        return view('admin.edit', ['fonctionnaire'=>$fonctionnaire]);
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
            'nom' => ['required', 'string', 'max:255'],
            'prenom' => ['required', 'string', 'max:255'],
            'cin' => ['required', 'string', 'max:255'],
            'sexe' => ['required'],
            // 'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        ]);

        $fonctionnaire = Fonctionnaire::where('fonc_id', '=', $id)->update([
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'cin' => $request->cin,
            'sexe' => $request->sexe,
            'mot_de_passe' => Hash::make($request->password),
            'admin'=> $request->admin=='1' ? true : false,
        ]);

        // dd($request->all());
        if (!empty($request['username']) && !empty($request['password']) ) {
            // dd('username not empty');
        $request->validate([
            'password' => ['confirmed', Rules\Password::defaults()],
            'username' => [ 'string', 'max:255', 'unique:fonctionnaires,username'],
        ]);
        Fonctionnaire::where('fonc_id', '=', $id)->update([
            'username' => $request->username,
            'mot_de_passe' => Hash::make($request->password),

        ]);
    
        }
        return redirect()->route('administation.index')->with('success', "Le fonctionnaire est enregistré avec success");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $services = DemandeService::where('fonc_id', '=', $id)->first();
        $adhesions = DemandeAdhesion::where('fonc_id', '=', $id)->first();
        if (!empty($services) && !empty($adhesions)) {
            return redirect()->back()->with('error', "Impossible! Ce fonctionnaire est lié au contrat d'accompagnement, d'orientation ou d'adhsion. ");
        } else {
            Service::where('resp_id', '=', $id)->update([
                'resp_id' => null,
            ]);
            Fonctionnaire::where('fonc_id', '=', $id)->delete();
            return  redirect()->back()->with('success', "Le fonctionnaire a été supprimer avec success ");
        }
        
    }
}
