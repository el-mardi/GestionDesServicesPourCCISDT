<?php

namespace App\Http\Controllers\AjaxRequest;

use App\Models\Pack;
use App\Models\Domaine;
use App\Models\Service;
use App\Models\Activite;
use App\Models\Intervenant;
use App\Models\Representant;
use Illuminate\Http\Request;
use App\Models\Ressortissant;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AjaxController extends Controller
{
    public function getservice (Request $request){
        // echo'hi'; eit();
        $service = Service::where('service_id', '=', $request['service'])->firstOrfail();
        $id =$service ['service_id'];
        $nom =$service ['service'];
        $output = "
            <tr  id='$id' class=' border border-slate-300 border bg-slate-200'>
                <td value='$id'>$nom</td>
                <td onclick='suppservice($id)' class='w-2/12 text-center hover:cursor-pointer'> <i class='fa-solid fa-trash-can'></i> </td>
            </tr>

            ";
            // <input type='hidden' value='$id' name='services[]'>

        $request->session()->push('services', $id);
        echo $output;
    }

    public function suppservice (Request $request) {

        $id = $request['id'];
        $session = $request->session()->get('services');
       
       if (($key = array_search($id, $session)) !== false ) {
        unset($session[$key]);
        }

        $request->session()->put('services', $session);

        // echo 'supp '.$id;
    }


    public function getpack (Request $request) {

        $pack = Pack::where('pack_id', '=', $request['pack'])->first();
        $id =$pack ['pack_id'];
        $nom =$pack ['nom_pack'];
        $output = "
            <tr  id='$id' class=' border border-slate-300 border bg-slate-200'>
                <td value='$id'>$nom</td>
                <td onclick='supppack($id)' class='w-2/12 text-center hover:cursor-pointer'> <i class='fa-solid fa-trash-can'></i> </td>
            </tr>

            ";

            $request->session()->push('packs', $id);
            echo $output;
    }

    public function supppack (Request $request){

        $id = $request['id'];
        $session = $request->session()->get('packs');
       
       if (($key = array_search($id, $session)) !== false ) {
        unset($session[$key]);
        }

        $request->session()->put('packs', $session);
    }



    public function getactivite (Request $request){

        $secteur = $request['secteur'];

       
        $res= Activite::where('sect_id', '=', $secteur)->get();
        echo "<option>Sélectionner l'activité</option>";

        foreach ($res as $activite){
            
            $output= "<option value='$activite->act_id'> $activite->activite</option>    
            ";
            echo $output;
        }

    }

    public function getdomaine (Request $request){
        $secteur = $request['secteur'];

        $res= Domaine::where('sect_id', '=', $secteur)
        ->get();

        echo "<option>Sélectionner domaine</option>";
        foreach ($res as $domaine){
            
            $output = "<option value='$domaine->dom_id'> $domaine->domaine</option>   
            ";
            
            echo $output;
        }

    }

    public function chercher (Request $request){
        $cin = $request['cin'];
        $qualite = $request['qualite'];
        $table =  $request['table'];
        $nFiche = $request['nFiche'];

        if (empty($cin)) {
            echo 'vide';
            exit();
        }

        if ($table == 'representant' && $nFiche == 0) {
            if (!empty($qualite)) {
                $representants = Representant::where('qualite_id', '=', $qualite)->where('cin', 'like', $cin.'%')->get();
            }else {
                $representants = Representant::where('cin', 'like', $cin.'%')->get();
            }
            if (empty($representants[0])) {
                echo 'pas';
                exit();
            }
            foreach ($representants as $representant){
            echo "
            <tr class='bg-slate-100 hover:cursor-pointer hover:bg-slate-300 border border-indigo-400'>
            <td  class='p-1 '>{$representant->nom} {$representant->prenom}</td>
            <td  class='p-1 '>{$representant->cin}</td>
            <td  class='p-1 '>________________</td>
            <td  class='p-1 '>{$representant->qualite->qualite}</td>
            <td  class='p-1 '>{$representant->tel}</td>
            <td  class='p-1 '>{$representant->mail}</td>
            <td  class='p-1 '>{$representant->adresse}</td>
            <td class=' text-center' ><a href='representants/".$representant->rep_id."'><i class='fa-solid fa-file-lines fa-lg' style='color: blue'></i></a></td>

            <td class=' text-center' ><a href='representants/".$representant->rep_id."/edit'><i class='fa-solid fa-file-pen fa-lg' style='color: green'></i></a></td>
           
            </tr>
            ";
        } //end foreach representant
        } //end if representant

        else {
            if ($nFiche == 1) {
                if (!empty($qualite)) {
                    $ressortissants= Ressortissant::where('qualite_id', '=', $qualite)->where('num_fiche', 'like', $cin.'%')->get();
                }else {
                    $ressortissants= Ressortissant::where('num_fiche', 'like', $cin.'%')->get();
                } 

            }//end if nFiche 
            else {
                if (!empty($qualite)) {
                    $ressortissants= Ressortissant::where('qualite_id', '=', $qualite)->where('cin', 'like', $cin.'%')->get();
                }else {
                    $ressortissants= Ressortissant::where('cin', 'like', $cin.'%')->get();
                }

            } //end esle nFiche
            
            
            if (empty($ressortissants[0])) {
                echo 'pas';
                exit();
            }
                foreach ($ressortissants as $ressortissant){
                    echo "
                    <tr class='bg-slate-100 hover:cursor-pointer hover:bg-slate-300 border border-indigo-400'>
                    <td  class='p-1'>{$ressortissant->nom} {$ressortissant->prenom}</td>
                    <td  class='p-1 '>{$ressortissant->cin}</td>
                    <td  class='p-1 '>{$ressortissant->num_fiche}</td>
                    <td  class='p-1 '>{$ressortissant->qualite->qualite}</td>
                    <td  class='p-1 '>{$ressortissant->tel}</td>
                    <td  class='p-1 '>{$ressortissant->mail}</td>
                    <td  class='p-1 '>{$ressortissant->adresse}</td>
                    <td class=' text-center ' ><a href='ressortissant/".$ressortissant->res_id."'><i class='fa-solid fa-file-lines fa-lg' style='color: blue'></i></a></td>

                    <td class=' text-center ' ><a href='ressortissant/".$ressortissant->res_id."/edit'><i class='fa-solid fa-file-pen fa-lg' style='color: green'></i></a></td>
                
                    </tr>
                    ";
                }//end foreach Ressortissant
             } //ens else ressortissant

    } //end function



    public function getpartenaire (Request $request){

        $intervenants = Intervenant::where('part_id', '=', $request['partenaire'])->get();

        foreach ($intervenants as  $intervenant) {
            echo "<option value=".$intervenant->intervenant_id.">".$intervenant->intervenant."</option>";
        }
    } //End getpartenaire function
     


} //End class

