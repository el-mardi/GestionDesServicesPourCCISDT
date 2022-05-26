<?php

namespace App\Http\Controllers\dashboard;

use App\Models\Domaine;
use App\Models\Secteur;
use App\Models\Activite;
use Illuminate\Http\Request;
use App\Models\Ressortissant;
use App\Http\Controllers\Controller;

class SecteurController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allSecteurs = Secteur::all();
        // dd($allSecteurs);
        $secteurs = [];
        foreach ($allSecteurs as $secteur) {
            $secteurs[$secteur->secteur]['secteur'] = $secteur;
            $secteurs[$secteur->secteur]['domaine'] = Domaine::where('sect_id', '=', $secteur->sect_id)
                                ->get();

            $secteurs[$secteur->secteur]['activite'] = Activite::where('sect_id', '=', $secteur->sect_id)
            ->get();

            $secteurs[$secteur->secteur]['ressortissant'] = Ressortissant::where('secteur', '=', $secteur->sect_id)
            ->get();
        }
          
        // foreach ($secteurs as $value) {
            
        //     dd($value);
        // }

        return view('secteurs.index', ['secteurs'=>$secteurs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('secteurs.create');
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
            'nom' => 'required|',
        ]);

        Secteur::create([
            'secteur' => $request->nom,
        ]);

        return redirect()->route('secteurs.index')->with('success', 'Secteur est bien enregistré');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $secteur = Secteur::findOrFail($id);
        return view('secteurs.edit', ['secteur' => $secteur]);
        
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
            'nom' => 'required|',
        ]);

        Secteur::where('sect_id', '=', $id)
                ->update([
                    'secteur' => $request->nom,
                ]);

        return redirect()->route('secteurs.index')->with('success', 'Vos données est bien enregistré');
   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $res = Ressortissant::where('secteur', '=', $id)->first();

        $act = Activite::where('sect_id', '=', $id)->get('act_id');
        $dom = Domaine::where('sect_id', '=', $id)->get('dom_id');
        
        if (!empty($act)) {
            foreach ($act as $value) {
                $acts = Ressortissant::where('act_id', '=', $value['act_id'])->first();
                if ($acts != null) {
                    return redirect()->back()->with('error', "Impossible de supprimer le secteur, des ressortissant sont lié à des activités de secteur !"); 
                }
            }
        }

        if (!empty($dom)) {
            foreach ($dom as $value) {
                $doms = Ressortissant::where('dom_id', '=', $value['dom_id'])->first();
                if ($doms != null) {
                    return redirect()->back()->with('error', "Impossible de supprimer le secteur, des ressortissant sont lié à des domaines de secteur !"); 
                }
            }
        }
        // dd($doms, $acts, $res);
        if (empty($res) && empty($acts) && empty($doms)){
        
            Domaine::where('sect_id', '=', $id)->delete();
            Activite::where('sect_id', '=', $id)->delete();
            Secteur::where('sect_id', '=', $id)->delete();

            return redirect()->back()->with('success', "Le Secteur été supprimer avec success");
            
        }
    }
}
