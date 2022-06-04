<?php

namespace App\Http\Controllers\dashboard;

use App\Models\Qualite;
use Illuminate\Http\Request;
use App\Models\Ressortissant;
use App\Http\Controllers\Controller;

class QualiteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('qualites.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('qualites.create');
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
            'qualite' => 'required',
        ]);

        Qualite::create([
            'qualite' => $request['qualite'],
        ]);

        return redirect()->route('qualites.index')->with('success', "Vos données ont été bien enregistrer");
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
        $qualite = Qualite::findORFail($id);
        return view('qualites.edit', ['qualite' => $qualite]);
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
            'qualite' => 'required',
        ]);

        Qualite::where('qualite_id', '=', $id)
                ->update([
                    'qualite' => $request['qualite'],
                ]);

        return redirect()->route('qualites.index')->with('success', "Vos données ont été bien enregistrer");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $res = Ressortissant::where('qualite_id', '=', $id)->first();
        if ($res == null){
            $dom = Qualite::where('qualite_id', '=', $id)->delete();
            return redirect()->back()->with('success', "La qualité été supprimer avec success");

        }

        return redirect()->back()->with('error', "Impossible de supprimer la qualité, des ressortissant sont lié à cette qualité !");
    
    }
}
