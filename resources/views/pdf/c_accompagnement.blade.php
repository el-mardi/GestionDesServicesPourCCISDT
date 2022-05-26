<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <title>Contrat d'accompagnement</title>
    <link rel="stylesheet" href="css/app.css">
    {{-- <link rel="stylesheet" href="css/style.css"> --}}
</head>
<body class="ThePdf" >
   <div class="mx-8 " >
       <div class="mt-0 mb-8">
           <div class="text-center mb-0">
               <img src="images/hearder.png" class="head">
           </div>
           <div class="text-right mt-0">
               <span class="version text-left text-sm">CCISDT.LDA14.ContratAccompagnement.V1</span>
            </div>
        </div>

        <div class="my-3 ml-5">
        Je soussigné <span class="pb-1 "><b> {{$nom}} </b> </span>
        </div>
        <div class="mt-1 mb-3">
            titulaitre de la piéce d'identité Numéro <span class="pb-1 "><b> {{$cin}},</b> </span>
        </div>
        <div class="mt-1">
            déclare solliciter un accouplement de la<span class="text-lg"> <b>CCISDT: CHAMBRE DE COMMERCE, D'IDUSTRIE, ET DE SERVICE DE LA REGION DARAA TAFILALET </b>.</span>
        </div>
        <div class="mt-3">
             SERVICE:
        <div class="mt-2 ml-8 mb-3 ">
            @foreach ($services as $key => $item)
               <b>  {{$item->service}}</b><br>
            @endforeach
        </div>
        </div>

       <div class="mt-2">
           PRIX:<span class="mr-2">  {{$tarif}} DH</span>
       </div>

       <div class="mt-5">
           Je déclare avoir pris connaissances des status et réglements régissant de la CCISDT.
       </div>
       <div class="mt-2 mb-5">
           Je déclare m'engager à respecter toutes mes obligations envers la CCISDT et de fournir des réguiliérements des informations conformes concernant mon activité professionnells.
       </div>
       <div class="text-md mt-8 ">
           <div class="inline pr-4 mr-8">FAIT A: {{$province}}</div>
           <span class="mx-6 p-4"> </span>
           <div class="inline pl-4 ml-8 ">LE: {{$date}}</div>
       </div>
       <div class="mt-12 pb-12 text-right ">
           <b>Signature de {{$nom}} </b>
       </div>
       <div id="footer" class="text-xs ">
        <img src="images/footer.png" alt="">
       </div>
   </div>


   <div class="res"  style="page-break-before: always;">
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
     <div class="mt-2"><b>Numéro de fiche: </b>{{$res['num_fiche']}}</div>
     <div class="mt-2"><b>Numéro de pièce d'identité: </b> {{$res['cin']}}</div>
     <div class="mt-2"><b>Nom et Prénom: </b> {{$res['nom']}} {{$res['prenom']}}</div>
     <div class="mt-2"><b>Nationalité: </b> {{$res['nationalite']}}</div>
     <div class="mt-2"><b>Lieu de résidence: </b> {{$res['residence']}}</div>
     <div class="mt-2"><b>Date de naissance: </b> {{$res['date_naissance']}}</div>
     <div class="mt-2"><b>Sexe: </b> {{$res['sexe']}}</div>
     <div class="mt-2"><b>Année de dernière adhésion: </b>
        @isset($adh->date_debut)
        {{$adh->date_debut}}
        @endisset </div>
     <div class="mt-2"><b>Numéro de contrat d'adhesion: </b>
        @isset($adh->date_debut)
        {{$res['dernier_contrat_adh']}}/{{$adh->date_debut}}
        @endisset</div>
     <div class="mt-2"><b>Numéro contrat d'accompagnement: </b>
        @isset($acc->date_debut)
        {{$res['dernier_contrat_accom']}}/{{$acc->date_debut}}
        @endisset</div>
     <div class="mt-2"><b>Formation: </b> {{$res['formation']}}</div>
     <div class="mt-2"><b>Expérience proffessionnelle: </b> {{$res['experience']}}</div>
     <div class="mt-2"><b>Qualité: </b> {{$res->qualite->qualite}}</div>
     <div class="mt-2"><b>Raison sociale: </b> {{$res['raison_social']}}</div>
     <div class="mt-2"><b>ICE: </b> {{$res['ice']}}</div>
     <div class="mt-2"><b>Patente: </b> {{$res['patente']}}</div>
     <div class="mt-2"><b>Forme juridique: </b> {{$res->juridiqueForme->formeJur}}</div>
     <div class="mt-2"><b>Secteur d'activité</b> {{$res->secteurs->secteur}}</div>
     <div class="mt-2"><b>Domaine d'activité</b> {{$res->domaines->domaine}}</div>
     <div class="mt-2"><b>Tél: </b> {{$res['tel']}}</div>
     <div class="mt-2"><b>Mail: </b> {{$res['mail']}}</div>
     <div class="mt-2"><b>Adresse: </b> {{$res['adresse']}}</div>
   </div>

    <div id="footer" class="text-xs mt-24 ">
        <img src="images/footer.png" alt="">
    </div>
</body>
</html>