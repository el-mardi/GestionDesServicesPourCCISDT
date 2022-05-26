<?php

namespace App\Http\Controllers\dashboard;

use App\Models\Activite;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ActiviteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $activites = Activite::all();
        return view('activites.index', ['activites' => $activites]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('activites.create');
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
            'activite' => 'required|',
            'secteur' => 'required|',
        ]);

        Activite::create([
            'activite' => $request['activite'],
            'sect_id' => $request['secteur'],
        ]);

        return redirect()->route('activites.index')->with('success', "Vos données ont enregistrée avec success");
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
        $activite = Activite::findORFail($id);
        return view('activites.edit', ['activite' => $activite]);
        
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
            'activite' => 'required|',
            'secteur' => 'required|',
        ]);

        Activite::where('act_id', '=', $id)
            ->update([
                'activite' => $request['activite'],
                'sect_id' => $request['secteur'],
            ]);

        return redirect()->route('activites.index')->with('success', "Vos données ont enregistrée avec success");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
