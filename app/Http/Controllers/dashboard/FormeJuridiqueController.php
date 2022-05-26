<?php

namespace App\Http\Controllers\dashboard;

use Illuminate\Http\Request;
use App\Models\Ressortissant;
use App\Models\JuridiqueForme;
use App\Http\Controllers\Controller;

class FormeJuridiqueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $f_Jur = JuridiqueForme::all();
        return view('formesJuridiques.index', ['formes' => $f_Jur]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('formesJuridiques.create');
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
            'forme' => 'required|',
            'code' => 'required|',
        ]);
        $forme = JuridiqueForme::where('code_forme', '=', $request['code'])->first();

        if (!empty($forme)) {
            return redirect()->back()
            ->withInput()
            ->withErrors(['code'=>"This code already exist"]);
        } else {
            JuridiqueForme::create([
                'formeJur' => $request['forme'],
                'code_forme' => $request['code'],
            ]);
            return redirect()->route('formesJuridiques.index')->with('success', 'La forme juridique est bien enregistrée');
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
        $forme = JuridiqueForme::findOrFail($id);
        return view('formesJuridiques.edit', ['forme' => $forme]);
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
            'forme' => 'required|',
            'code' => 'required|',
        ]);
        $newForme = JuridiqueForme::where('code_forme', '=', $request['code'])->first();
        $forme = JuridiqueForme::findOrFail($id);
        if (!empty($newForme) && $forme->code_forme != $newForme->code_forme  ) {
            return redirect()->back()
            ->withInput()
            ->withErrors(['code'=>"This code already exist"]);
        } else {
            JuridiqueForme::where('formeJur_id', '=', $id)
                ->update([
                    'formeJur' => $request['forme'],
                    'code_forme' => $request['code'],
                ]);
            return redirect()->route('formesJuridiques.index')->with('success', 'La forme juridique est bien enregistrée');
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
        $res = Ressortissant::where('formeJur_id', '=', $id)->first();
        // dd(empty($res));
        if (empty($res)) {
            JuridiqueForme::where('formeJur_id', '=', $id)->delete();
            return redirect()->back()->with('success', "La forme juridique est supprimé ");

        }else{
            return redirect()->back()->with('error', "Impossible, des ressortissant sont liés au forme juridique");

        }
    }
}
