<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Fiche d'orientation</title>
    <link rel="stylesheet" href="css/app.css">

</head>
<body class="ThePdf" >
    <div class="mx-8 " >
        <div class="">
            <div class="mt-0 mb-8">
                <div class="text-center mb-0">
                    <img src="images/hearder.png" class="head">
                </div>
                <div class="mt-2 w-full text-center"> 
                    <span class="text-2xl mb-5">
                        <B>FICHE D'ORTIENTATION</B>
                    </span>
                </div>
            </div>

         <table class="w-full">
             <tbody>
                <tr class="mt-5">
                    <td class="border rounded-sm " style="border-color: black">
                        <p id="" class="text-xs ">
                            @if(!empty($res['img']))
                                <img src="storage/images/{{$res['img']}}" class="ml-32 mb-2  h-32 w-32 mt-2 rounded-sm">
                            @else
                                <p class="ml-32 mb-2  h-32 w-32 mt-2 border rounded-sm text-center"></p>
                            @endif
                        </p>
                        <p class="block p-2 text-lg"><b>Numéro de fiche: </b>{{$res['num_fiche']}}</p>
                        <p class="block p-2 text-lg"><b>Numéro de pièce d'identité: </b> {{$res['cin']}}</p>
                        <p class="block p-2 text-lg"><b>Prénom & Nom: </b>
                            @if ($res['sexe'] == "Homme")
                                Mr. {{$res['nom']}} {{$res['prenom']}}
                            @else
                                Mme. {{$res['nom']}} {{$res['prenom']}}
                            @endif
                        </p>
                        <p class="block p-2 text-lg"><b>Nationalité: </b> {{$res['nationalite']}}</p>
                        <p class="block p-2 text-lg"><b>Lieu de résidence: </b> {{$res['residence']}}</p>
                        <p class="block p-2 text-lg"><b>Date de naissance: </b> {{$res['date_naissance']}}</p>
                        <p class="block p-2 text-lg"><b>Sexe: </b> {{$res['sexe']}}</p>
                        <p class="block p-2 text-lg"><b>Expérience proffessionnelle: </b> {{$res['experience']}}</p>
                    </td>
                        
                        
                    <td class="border rounded-sm flex-1" style="border-color: black">
                        <p class="block p-2 text-lg"><b>Qualité: </b> {{$res->qualite->qualite}}</p>
                        <p class="block p-2 text-lg"><b>Raison sociale: </b> {{$res['raison_social']}}</p>
                        <p class="block p-2 text-lg"><b>ICE: </b> {{$res['ice']}}</p>
                        <p class="block p-2 text-lg"><b>RC: </b> {{$res['rc']}}</p>
                        <p class="block p-2 text-lg"><b>Forme juridique: </b> {{$res->juridiqueForme->formeJur}}</p>
                        <p class="block p-2 text-lg"><b>Secteur d'activité</b> {{$res->secteurs->secteur}}</p>
                        <p class="block p-2 text-lg"><b>Activité axercée: </b> {{$res->activite}}</p>
                        <p class="block p-2 text-lg"><b>Tél: </b> {{$res['tel']}}</p>
                        <p class="block p-2 text-lg"><b>Mail: </b> {{$res['mail']}}</p>
                        <p class="block p-2 text-lg"><b>Adresse: </b> {{$res['adresse']}}</p>
                    </td>
                </tr>
             </tbody>
         </table>
    </div>
</div>    


<div class="mt-0 mb-8"  style="page-break-before: always;">
    <div class="text-center mb-0">
        <img src="images/hearder.png" class="head">
    </div>
    <div class="my-5 w-full text-center"> 
        <p class="text-center text-xl" ><b>ACTIONS EFFECTUEES</b></p>
    </div>
   
    <table class="w-full">
        <thead class="w-full">
            <th class="border p-1 " style="border-color: black; background-color:rgb(183, 183, 183);">DATE</th>
            <th class="border p-1 " style="border-color: black; background-color:rgb(183, 183, 183);">DUREE(min) </th>
            <th class="border p-1 px-20 " style="border-color: black; background-color:rgb(183, 183, 183);">ACTION</th>
            <th class="border " style="border-color: black; background-color:rgb(183, 183, 183); width: 25px">DUREE D'INTERVENTION</th>
            <th class="border p-1 px-10" style="border-color: black; background-color:rgb(183, 183, 183);">REMARQUE</th>
        </thead>
        <tbody>
           @foreach ($services as $service)
            <tr class="" style="background-color:rgb(244, 244, 244)">
                <td class="border h-8 text-center" style="border-color: black">{{$contrat->date_debut}} </td>
                <td class="border h-8 text-center" style="border-color: black">{{$contrat->duree}}</td>
                <td class="border h-8 text-center" style="border-color: black">{{$service->service}} </td>
                <td class="border h-8 text-center" style="border-color: black">{{$service->typesIntervention->type}} </td> 
                <td class="border h-8 text-center" style="border-color: black">{{$contrat->remarque}} </td>
            </tr>
           @endforeach
          
        </tbody>
    </table>

 </div>


</body>
</html>