<?php

namespace App\Http\Controllers\dashboard;

use PDF;
use App\Models\Pack;
use App\Models\Qualite;
use App\Models\Service;
use App\Models\Representant;
use Illuminate\Http\Request;
use App\Models\Ressortissant;
use App\Models\DemandeService;
use App\Models\DemandeAdhesion;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    function _construct (){

    }

    public function dashboard () {
        // dd($this->date);
        return view('dashboard');
    }

    public function accompagnement (Request $request){
        $request->session()->put('services');
        $lastElement = DemandeService::where('type_demande', '=', 'c_accompagnement')->orderBy('num_contrat_accom', 'DESC')->First();
        if ( $lastElement === null) {
            $lastElement= 1;
        }else{
            $lastElement->num_contrat_accom ++ ;
            $lastElement = $lastElement->num_contrat_accom;
        }
        // dd($lastElement);

        $date = date('Y-m-d');
        // dd($lastElement); exit();
        return view('dashboard.contrat_accompagnrment', ['lastElement' => $lastElement, 'date' => $date]);
    }

    public function enregis_accompagnement (Request $request){

        if (! empty( $request->session()->get('services'))) {
           
        $validated = $request->validate([
            'ressortissant' => 'required|exists:ressortissants,cin',
            'province' => 'required',
            'date_debut' => 'required|date',
            'date_fin' => 'required|date',
        ]);
        $rep = new Representant;

        if (!empty($request['representant']) ) {
            $validated = $request->validate([
            'representant' => 'required|exists:representants,cin',
            ]);
      
            $rep = Representant::where('cin', '=', $request->representant)->first();
        }
        

        $res = Ressortissant::where('cin', '=', $request->ressortissant)->first();
       $data['adh'] = DemandeAdhesion::where('num_contrat_adh', '=', $res->dernier_contrat_adh)->first();
        
        $data['acc'] = DemandeService::where('num_contrat_accom', '=', $res->dernier_contrat_accom)->where('type_demande', '=', 'c_accompagnement') ->first();
        $data['res'] = $res;
        $data['nom'] = $res->nom . ' ' . $res->prenom;
        $data['cin'] = $res->cin;
        $data['tarif'] = 0;
        $data['date'] = $request->date_debut;
        $data['province'] = $request->province;
        foreach ($request->session()->get('services') as $service) {

        $data['services'][$service] = Service::findOrFail($service);
        $data['tarif'] = $data['tarif'] + $data['services'][$service]['tarif'];

            $demande= DemandeService::create([
                'num_contrat_accom' =>   $request->num_contrat_accom,
                'type_demande'=> 'c_accompagnement',
                'service_id' => $service,
                'province' => $request->province,
                'date_debut' =>$request->date_debut,
                'date_fin' =>$request->date_fin,
                'res_id' => $res->res_id,
                'rep_id' => $rep->rep_id,
                'fonc_id' => Auth::user()->fonc_id,
                'remarque' => $request->remarque ? $request->remarque : ".....",
    
            ]);
           
        }
        if ($demande) {
            $res->accompagnement = 1;
            $res->dernier_contrat_accom =  $request->num_contrat_accom;
            $res->save();
        }
        
        // dd($request->all()); 

        // dd($data['acc']->date_debut);

        $request->session()->put('services');
        $pdf = PDF::loadView('pdf.c_accompagnement', $data);
        return $pdf->setPaper('a4')->stream();
        // $pdf->setPaper('A4', 'landscape');
        // return $pdf->download($res->cin.'-contrat_accm.pdf');
    }else {
        return back()
            ->withInput()
            ->withErrors(['services' => 'Services are required']);
    }

    }
    

    public function orientation (Request $request){

        $request->session()->put('services');
        return view('dashboard.orientation');
    }

   public function enregis_orientation (Request $request){

    if (! empty( $request->session()->get('services'))) {
        
        $lastElement = DemandeService::where('type_demande', '=', 'orientation')->orderBy('num_contrat_accom', 'DESC')->First();
        if ( $lastElement === null) {
            $lastElement= 1;
        }else{
            $lastElement->num_contrat_accom ++ ;
            $lastElement = $lastElement->num_contrat_accom;
        }

        $validated = $request->validate([
            'ressortissant' => 'required|exists:ressortissants,cin',
            'province' => 'required',
            'duree' => 'required',
            'date_debut' => 'required|date',
            
        ]);
        $rep = new Representant;

        if (!empty($request['representant']) ) {
            $validated = $request->validate([
            'representant' => 'required|exists:representants,cin',
            ]);
      
            $rep = Representant::where('cin', '=', $request->representant)->first();
        }
        
        $res = Ressortissant::where('cin', '=', $request->ressortissant)->firstOrFail();
        $data['res'] = $res;

        foreach ($request->session()->get('services') as $service) {
        // dd(service);exit();
            $demande= DemandeService::create([
                'num_contrat_accom' => $lastElement,
                'service_id' => $service,
                'type_demande'=> 'orientation',
                'province' => $request->province,
                'duree' => $request->duree,
                'date_debut' =>$request->date_debut,
                // 'date_fin' => null,
                'res_id' => $res->res_id,
                'rep_id' => $rep->rep_id,
                'fonc_id' => Auth::user()->fonc_id,
                'remarque' => $request->remarque ? $request->remarque : "...",
            ]);
           
        }
        $ser = DemandeService::where('num_contrat_accom', '=', 2)->get();
        $data['ser']= $ser;
        // dd($data);
        // $request->session()->put('services');
        $pdf = PDF::loadView('pdf.c_orientation', $data);
        // $pdf->setPaper('A4', 'landscape'); 
        return $pdf->setPaper('a4', 'landscape')->stream();
    
        // return redirect('/dashboard/ressortissant/'.$demande->num_contrat_accom);
    }else {
        return back()
            ->withInput()
            ->withErrors(['services' => 'Services are required']);
    }
   }


   public function documents(Request $request) {
    $documents = Service::where('type_id', '=', 3)->get();
    $request->session()->put('services');
    return view('dashboard.documents', ['documents' => $documents]);
   }

   public function enregis_documents (REquest $request){
                //   dd($request->all());
        $validated = $request->validate([
            'service' => 'required|',
            'ressortissant' => 'required|exists:ressortissants,cin',
            'province' => 'required',
            'date_debut' => 'required|date',
            'date_fin' => 'date',
        ]);
        $rep = new Representant;

        if (!empty($request['representant']) ) {
            $validated = $request->validate([
            'representant' => 'required|exists:representants,cin',
            ]);
      
            $rep = Representant::where('cin', '=', $request->representant)->first();
        }
        
        $lastElement = DemandeService::where('type_demande', '=', 'documents')->orderBy('num_contrat_accom', 'DESC')->First();
        if ( $lastElement === null) {
            $lastElement= 1;
        }else{
            $lastElement->num_contrat_accom ++ ;
            $lastElement = $lastElement->num_contrat_accom;
        }

        $res = Ressortissant::where('cin', '=', $request->ressortissant)->firstOrFail();
       
        // dd(service);exit();
            $demande= DemandeService::create([
                'num_contrat_accom' => $lastElement,
                'service_id' => $request->service,
                'type_demande'=> 'documents',
                'province' => $request->province,
                'date_debut' =>$request->date_debut,
                'date_fin' =>$request->date_fin,
                'res_id' => $res->res_id,
                'rep_id' => $rep->rep_id,
                'fonc_id' => Auth::user()->fonc_id,
                'remarque' => $request->remarque ? $request->remarque : "...",
    
            ]);
           
        // return redirect('/dashboard/ressortissant/'.$demande->num_contrat_accom);
        return 'Done';
   }


   public function adhesion (Request $request){
        $request->session()->put('packs');
        $lastElement = DemandeAdhesion::orderBy('adh_id', 'DESC')->first();
        // dd($lastElement);
        if ( $lastElement === null) {
            $lastElement= 1;
        }else{
            $lastElement->num_contrat_adh ++ ;
            $lastElement = $lastElement->num_contrat_adh;
        }
       return view('dashboard.contrat_adhesion', ['lastElement' => $lastElement]);
   }

   public function enregis_adhesion(Request $request) {

        if (!empty($request->session()->get('packs'))) {

            $request->validate([
                'ressortissant' => 'required|exists:ressortissants,cin',
                'representant' => 'required|exists:representants,cin',
                'province' => 'required',
                'date_debut' => 'required|date',
                'date_fin' => 'required|date',
            ]);
            // dd($request->all(), $request->session()->get('packs'));
            $res = Ressortissant::where('cin', '=', $request->ressortissant)->firstOrFail();
            $res->dernier_contrat_adh =  $request->num_contrat_adhesion;
            $res->save();
            $rep = Representant::where('cin', '=', $request->representant)->firstOrFail();

            $data['nom'] = $res->nom . ' ' . $res->prenom;
            $data['cin'] = $res->cin;
            $data['pack_tarif'] = 0;
            foreach ($request->session()->get('packs') as $pack) {
                $myPackDetails = Pack::join('details_services_packs', 'details_services_packs.pack_id', '=', 'packs.pack_id')
                ->join('services', 'services.service_id', '=', 'details_services_packs.service_id')
                ->where('details_services_packs.pack_id', '=', $pack)
                ->get(['nom_pack','service' ,'pack_tarif']);
                
                $data['nom_pack'][]=  $myPackDetails[0]['nom_pack'];
                $data['pack_tarif'] = $data['pack_tarif'] + $myPackDetails[0]['pack_tarif'];

                foreach (  $myPackDetails as $key => $value) {
                    $data['service'][] =  $value['service'];
                }
                
               
            DemandeAdhesion::create([
                'num_contrat_adh' => $request->num_contrat_adhesion,
                'num_recu' => $request->num_recu,
                'province' => $request->province,
                'date_debut' =>$request->date_debut,
                'date_fin' =>$request->date_fin,
                'pack_id' => $pack,
                'res_id' => $res->res_id,
                'rep_id' => $rep->rep_id,
                'fonc_id' => Auth::user()->fonc_id,
                'remarque' => $request->remarque ? $request->remarque : "...",
            ]);

            
        }
        } else {
           return back()
           ->withInput()
           ->withErrors(['selectpack'=> 'Packages are required']);
        }
    
        $request->session()->put('packs');
            $pdf = PDF::loadView('pdf.c_adhesion', $data);
            return $pdf->setPaper('a4')->stream();
   }
}
