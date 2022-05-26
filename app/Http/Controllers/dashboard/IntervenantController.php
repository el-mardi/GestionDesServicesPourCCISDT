<?php

namespace App\Http\Controllers\dashboard;

use App\Models\Partenaire;
use App\Models\Intervenant;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\DetailsServicesIntervenant;

class IntervenantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $intervenants = Intervenant::orderBy('part_id', 'ASC')->get();
        return view('intervenants.index', ['intervenants' => $intervenants]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $partenaires = Partenaire::all();

        return view('intervenants.create', ['partenaires' => $partenaires]);
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
            'intervenant' =>'required',
            'partenaire' =>'required',
        ]);
        Intervenant::create([
            'intervenant' =>$request->intervenant,
            'part_id' =>$request->partenaire,
        ]);

        return redirect()->route('intervenants.index')->with('success', "Vos données ont été bien enregistrer");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $services_intervenants = Intervenant::where('intervenant_id', '=', $id)->get();

        // dd($services_intervenants[0]->intervenantsServices[0]->pivot->satut);
        // dd($services_intervenants[0]->intervenantsServices[0]->service);

        return view('intervenants.show', ['serv_inter' => $services_intervenants]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $intervenant = Intervenant::findOrFail($id); 
        $partenaires = Partenaire::all();

        return view('intervenants.edit', ['intervenant'=>$intervenant, 'partenaires' => $partenaires]);
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
            'intervenant' =>'required',
            'partenaire' =>'required',
        ]);
        Intervenant::where('intervenant_id', '=', $id)
                    ->update([
                        'intervenant' =>$request->intervenant,
                        'part_id' =>$request->partenaire,
                    ]);

        return redirect()->route('intervenants.index')->with('success', "Vos données ont été bien enregistrer");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $intervenant = Intervenant::find($id);
        if (isset ($intervenant->intervenantsServices[0])) {
            return redirect()->back()->with('error', "Impossible, l'intervenant est lié à un ou plusieurs services");
        }
        else{

            Intervenant::where('intervenant_id', '=', $id)->delete();
            return redirect()->back()->with('success', "L'intervenant est supprimé");
        }

    }
}
