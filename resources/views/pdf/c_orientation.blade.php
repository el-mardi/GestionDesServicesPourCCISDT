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
                        Fiche d'orientation
                    </span>
                </div>
            </div>

         <div class="mt-5">
            <div class="border rounded-sm ">
                <span class="block p-2 text-lg"><b>Numéro de fiche: </b>{{$res['num_fiche']}}</span>
                <span class="block p-2 text-lg"><b>Numéro de pièce d'identité: </b> {{$res['cin']}}</span>
                <span class="block p-2 text-lg"><b>Prénom & Nom: </b> {{$res['nom']}} {{$res['prenom']}}</span>
                <span class="block p-2 text-lg"><b>Nationalité: </b> {{$res['nationalite']}}</span>
                <span class="block p-2 text-lg"><b>Lieu de résidence: </b> {{$res['residence']}}</span>
                <span class="block p-2 text-lg"><b>Date de naissance: </b> {{$res['date_naissance']}}</span>
                <span class="block p-2 text-lg"><b>Sexe: </b> {{$res['sexe']}}</span>
                <span class="block p-2 text-lg"><b>Expérience proffessionnelle: </b> {{$res['experience']}}</span>
            </div>
                
                
            <div class="border rounded-sm flex-1">
                <span class="block p-2 text-lg"><b>Qualité: </b> {{$res->qualite->qualite}}</span>
                <span class="block p-2 text-lg"><b>Raison sociale: </b> {{$res['raison_social']}}</span>
                <span class="block p-2 text-lg"><b>ICE: </b> {{$res['ice']}}</span>
                <span class="block p-2 text-lg"><b>RC: </b> {{$res['rc']}}</span>
                <span class="block p-2 text-lg"><b>Forme juridique: </b> {{$res->juridiqueForme->formeJur}}</span>
                <span class="block p-2 text-lg"><b>Secteur d'activité</b> {{$res->secteurs->secteur}}</span>
                <span class="block p-2 text-lg"><b>Activité axercée: </b> {{$res->activite}}</span>
                <span class="block p-2 text-lg"><b>Tél: </b> {{$res['tel']}}</span>
                <span class="block p-2 text-lg"><b>Mail: </b> {{$res['mail']}}</span>
                <span class="block p-2 text-lg"><b>Adresse: </b> {{$res['adresse']}}</span>
            </div>
        </div>
    </div>
</div>    


<div class="mt-0 mb-8"  style="page-break-before: always;">
    <div class="text-center mb-0">
        <img src="images/hearder.png" class="head">
    </div>
   
    <table class="table w-full mt-5">
        <thead class="bg-slate-300">
            <th class="p-2 border w-12">Date l'intervention</th>
            <th class="p-2 border">Motif d'intervention</th>
            <th class="p-2 border">Service Offert</th>
            <th class="p-2 border w-14">Durée de l'intervention</th>
            <th class="p-2 border">Remarque</th>
        </thead>

        <tbody>

        </tbody>
    </table>
 </div>


</body>
</html>