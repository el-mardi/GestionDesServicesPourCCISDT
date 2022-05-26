<?php

namespace App\Http\Controllers\dashboard;

use App\Models\Pack;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\DetailsServicesPack;
use App\Http\Controllers\Controller;

class PackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $packs = Pack::all();
// dd($packs[0]->services);
        return view('packs.index', ['packs' => $packs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $request->session()->put('services');
        $services = Service::all();
        return view('packs.create', ['services' => $services]);
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd(! empty( $request->session()->get('services')));
// dd($request->all());

        if (! empty( $request->session()->get('services'))) {

            $codes_obj  = Pack::get('code_pack');
            $codes = array();
            foreach ($codes_obj as $code_obj) {
                array_push($codes, $code_obj->code_pack);
            }
            if (in_array($request['code'], $codes)) {
                return back()
                        ->withInput()
                        ->withErrors(['code' => 'Code est déjà existé']);
        
            } else {
               
            $validated = $request->validate([
                'pack' => 'required',
                'code' => 'required',
                'tarif' => 'required',
                'statut' => 'required',
            ]);
            $pack = Pack::create([
                'nom_pack' => $request['pack'],
                'code_pack' => $request['code'],
                'pack_tarif' => $request['tarif'],
                'status' => $request['statut'],
            ]);

            foreach ($request->session()->get('services') as  $value) {
                DetailsServicesPack::create([
                    'pack_id' => $pack->pack_id,
                    'service_id' => $value,
                ]);
            }
                $request->session()->put('services');
                return  redirect()->route('packs.index')->with('success', 'Pack est enregistré avec succès');

            }
        
        }else{
            return back()
            ->withInput()
            ->withErrors(['selectservice' => 'Services are required']);
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
    public function edit(Request $request, $id)
    {
        $request->session()->put('services');
        $pack = Pack::find($id);

        foreach ($pack->services as $code_serv) {
            $request->session()->push('services', $code_serv->service_id);
        }

        return view('packs.edit', ['pack' => $pack]);
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
        // dd($request->session()->get('services'));

        if (! empty( $request->session()->get('services'))) {

            $myElem = Pack::findOrFail($id);

            $codes_obj  = Pack::get('code_pack');
            $codes = array();
            foreach ($codes_obj as $code_obj) {
                array_push($codes, $code_obj->code_pack);
            }

            if ($request['code'] == $myElem->code_pack || in_array($request['code'], $codes) == false ) {
                
                $validated = $request->validate([
                    'pack' => 'required',
                    'code' => 'required',
                    'tarif' => 'required',
                    'statut' => 'required',
                ]);
                $pack = Pack::where('pack_id', '=', $id)->update([
                    'nom_pack' => $request['pack'],
                    'code_pack' => $request['code'],
                    'pack_tarif' => $request['tarif'],
                    'status' => $request['statut'],
                ]);
    
                DetailsServicesPack::where('pack_id', '=', $id)->delete();

                foreach ($request->session()->get('services') as  $value) {
                    DetailsServicesPack::create([
                        'pack_id' => $myElem->pack_id,
                        'service_id' => $value,
                    ]);
                }
                    $request->session()->put('services');
                    return  redirect()->route('packs.index')->with('success', 'Pack est modifié avec succès');
    
                }else{
                    return back()
                        ->withInput()
                        ->withErrors(['code' => 'Code est déjà existé']);
        }
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
        //
    }
}
