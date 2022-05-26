<?php

namespace App\Http\Controllers\dashboard;

use App\Models\Domaine;
use Illuminate\Http\Request;
use App\Models\Ressortissant;
use App\Http\Controllers\Controller;

class DomaineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        $domaines = Domaine::all();
        return view('domaines.index', ['domaines' => $domaines]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('domaines.create');
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
            'domaine' => 'required|',
            'secteur' => 'required|',
        ]);

        Domaine::create([
            'domaine' => $request['domaine'],
            'sect_id' => $request['secteur'],
        ]);

        return redirect()->route('domaines.index')->with('success', "Vos données ont enregistrée avec success");
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
        $domaine = Domaine::findOrFail($id);
        return view('domaines.edit', ['domaine' => $domaine]);
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
            'domaine' => 'required|',
            'secteur' => 'required|',
        ]);

        Domaine::where('dom_id', '=', $id)
            ->update([
                'domaine' => $request['domaine'],
                'sect_id' => $request['secteur'],
            ]);

        return redirect()->route('domaines.index')->with('success', "Vos données ont modifiée avec success");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $res = Ressortissant::where('dom_id', '=', $id)->first();
        if ($res == null){
        
            $dom = Domaine::where('dom_id', '=', $id)->delete();
            return redirect()->back()->with('success', "Le domaine été suprimer avec success");

        }

        return redirect()->back()->with('error', "Impossible de supprimer le domaine, des ressortissant sont lié au domaine !");
    
    }
}
