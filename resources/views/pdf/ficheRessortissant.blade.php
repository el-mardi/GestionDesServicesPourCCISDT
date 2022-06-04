<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Fiche Ressortissant</title>
    <link rel="stylesheet" href="css/app.css">

</head>
<body class="ThePdf">
    
   <div class="res">
    <div class="mt-0 mb-8">
        <div class="text-center mb-0">
            <img src="images/hearder.png" class="head">
        </div>

        <div class="text-right mt-0">
            <span class="version text-left text-sm">CCISDT.LDA14.ContratAccompagnement.V1</span>
         </div>
     </div>

     <div class="res-title w-full text-center text-xl mb-5" >
         <b>FICHE DE RESSORTISSANT</b>
     </div>
     <table class="w-full h-auto">
         <tbody class="m-0">
             <tr class="m-0">
                 <td class=" border border-black px-5">
                    <p id="" class="text-xs ">
                        @if(!empty($res['img']))
                            <img src="storage/images/{{$res['img']}}" class="ml-32 mb-2  h-32 w-32 mt-2 rounded-sm">
                        @else
                            <p class="ml-32 mb-2  h-32 w-32 mt-2 border rounded-sm text-center"></p>
                        @endif
                    </p>
                        
                    <p class="mt-2">
                        <b> N° de ressortissant : </b>{{$res['num_fiche']}}
                       <span class=" ml-10">  <b>La date: </b>.........</span>
                    </p>
                   
                    <p class="mt-2"><b>Numéro de pièce d'identité: </b> {{$res['cin']}}</p>
                    <p class="mt-2"><b>Nom et Prénom: </b> {{$res['nom']}} {{$res['prenom']}}</p>
                    <p class="mt-2"><b>Nationalité: </b> {{$res['nationalite']}}</p>
                    <p class="mt-2"><b>Lieu de résidence: </b> {{$res['residence']}}</p>
                    <p class="mt-2"><b>Date de naissance: </b> {{$res['date_naissance']}}</p>
                    <p class="mt-2"><b>Sexe: </b> {{$res['sexe']}}</p>
                    <p class="mt-2"><b>Expérience proffessionnelle: </b> {{$res['experience']}}</p>
                    <p class="my-2"><b>Qualité: </b> {{$res->qualite->qualite}}</p>
                   
                 </td>
                 <td class=" border border-black px-5">
                    {{-- <p class="mt-2"><b>Formation: </b> {{$res['formation']}}</p> --}}
                    <p class="mt-2"><b>Année de dernière adhésion: </b>
                        @isset($adh->date_debut)
                        {{$adh->date_debut}}
                        @endisset </p>
                     <p class="mt-2"><b>Numéro de contrat d'adhesion: </b>
                        @isset($adh->date_debut)
                        {{$res['dernier_contrat_adh']}}/{{date('Y', strtotime($adh->date_debut))}}
                        @endisset</p>
                     <p class="mt-2"><b>Numéro contrat d'accompagnement: </b>
                        @isset($acc->date_debut)
                        {{$res['dernier_contrat_accom']}}/{{date('Y', strtotime($acc->date_debut))}}
                        @endisset</p>
                    <p class="mt-2"><b>Raison sociale: </b> {{$res['raison_social']}}</p>
                    <p class="mt-2"><b>ICE: </b> {{$res['ice']}}</p>
                    <p class="mt-2"><b>RC: </b> {{$res['rc']}} <span class="ml-24">  <b>T.P: </b> {{$res['patente']}}</span></p>
                    {{-- <p class="mt-2"></p> --}}
                    <p class="mt-2"><b>Forme juridique: </b> {{$res->juridiqueForme->formeJur}}</p>
                    <p class="mt-2"><b>Secteur d'activité</b> {{$res->secteurs->secteur}}</p>
                    <p class="mt-2"><b>Domaine d'activité</b>  {{$res->domaines->domaine}}</p>
                    <p class="mt-2"><b>L'activité</b>  {{$res->activite}}</p>
                    <p class="mt-2"><b>Tél: </b> {{$res['tel']}}</p>
                    <p class="mt-2"><b>Mail: </b> {{$res['mail']}}</p>
                    <p class="my-2"><b>Adresse: </b> {{$res['adresse']}}</p>
                 </td>
             </tr>
         </tbody>
     </table>
    
   
   </div>

   

</body>
</html>