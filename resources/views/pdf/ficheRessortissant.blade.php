<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Fiche Ressortissant</title>
    <link rel="stylesheet" href="css/app.css">

</head>
<body>
    
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
     <div class="mt-2"><b>Domaine d'activité</b> *** </div>
     <div class="mt-2"><b>Tél: </b> {{$res['tel']}}</div>
     <div class="mt-2"><b>Mail: </b> {{$res['mail']}}</div>
     <div class="mt-2"><b>Adresse: </b> {{$res['adresse']}}</div>
   </div>

    <div id="footer" class="text-xs mt-24 ">
        <img src="images/footer.png" alt="">
    </div>

</body>
</html>