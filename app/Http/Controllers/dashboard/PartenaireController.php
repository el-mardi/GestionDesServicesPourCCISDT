<?php

namespace App\Http\Controllers\dashboard;

use App\Models\Partenaire;
use App\Models\Intervenant;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PartenaireController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $partenaires  = Partenaire::all();
        return view('partenaires.index', ['partenaires' => $partenaires]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('partenaires.create');
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
            'partenaire' => 'required',
        ]);

        Partenaire::create([
                    'partenaire' => $request['partenaire'],
                ]);

        return redirect()->route('partenaires.index')->with('success', "Vos données ont été bien enregistrer");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $intervenants = Intervenant::where('part_id', '=', $id)->get();
        // dd($intervenants[0]->partenaire->partenaire);
        return view('partenaires.show', ['intervenants' => $intervenants]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $partenaire = Partenaire::findOrFail($id);
        return view('partenaires.edit', ['partenaire' => $partenaire]);
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
            'partenaire' => 'required',
        ]);

        Partenaire::where('part_id', '=', $id)
                ->update([
                    'partenaire' => $request['partenaire'],
                ]);

        return redirect()->route('partenaires.index')->with('success', "Vos données ont été bien enregistrer");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $intervenants = Intervenant::where('part_id' ,'=', $id)->get('intervenant_id');

        if (!empty($intervenants)) {
            // dd(isset($intervenants[0]->intervenantsServices[0]));
            foreach ($intervenants as $intervenant) {
                if(isset($intervenant->intervenantsServices[0])){
                    return redirect()->back()->with('error' , "Impossible, un ou plusieurs services liés aux intervenants de ce partenaire.");
                }
            }
            // dd("end foeach with inter");
            
        }
        Intervenant::where('part_id' ,'=', $id)->delete();
        Partenaire::where('part_id' ,'=', $id)->delete();

        return redirect()->back()->with('success', "Le partenaire a été supprimé avec succes");

    }
}
