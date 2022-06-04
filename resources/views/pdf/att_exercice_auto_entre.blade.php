<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/app.css">
    <title>Attestation d'exercice</title>

</head>
<body class="ThePdf">>
    
    <div class="mx-8 " >
        <div class="mt-0 mb-8">
            <div class="text-center mb-0">
                <img src="images/hearder.png" class="head">
            </div>
            <p class="text-left mt-2">
                <b>
                    N° ........<br>
                    N° ........
                </b>
            </p>

            <div class="text-center mt-5">
                <img src="images/atte.png" alt="">
                <p class="mt-2"><b>( Dahir du 21 février 2013 )</b></p>
             </div>
         </div>


         <div class="mt-5">
             <p class="mt-2">
                <b>J</b>e  soussigné, Président  de  la Chambre  de  Commerce,  d’Industrie  et Services  de la  Région   Draa- Tafilalet
               
             </p>
             <p>
                <b>V</b>u  le  Dahir  n°1-13-09 du 10 rabii II 1434 (21 février 2013) portant promulgation de la loi n°38.12 portant statut des Chambres de Commerce,  d’industrie et de services.  
             </p>
             <p class="text-center mt-5 text-2xl">
                 <b>Atteste que, L’auto-entrepreneur:</b>
             </p>
             <table class="my-5">
                 <tbody>
                     <tr>
                         <td class="p-1 font-medium"">Raison sociale:</td>
                         <td class="p-1">{{$res->raison_social}}</td>
                     </tr>
                     <tr>
                         <td class="p-1 font-medium">Nom & Prénom:</td>
                         <td class="p-1"> {{$res->nom}} {{$res->prenom}} </td>
                     </tr>
                     <tr>
                         <td class="p-1 font-medium">Numéro de pièce d'identité::</td>
                         <td class="p-1">{{$res->cin}}</td>
                     </tr>
                     <tr>
                         <td class="p-1 font-medium">I.C.E</td>
                         <td class="p-1">
                            @if (empty($res->ice))
                                -----
                            @else
                                {{$res->ice}}
                             @endif
                         </td>
                     </tr>
                     <tr>
                         <td class="p-1 font-medium">N° de la Patente:</td>
                         <td class="p-1">{{$res->patente}}</td>
                     </tr>
                     <tr>
                         <td class="p-1 font-medium">Activités:</td>
                         <td class="p-1">{{$res->activite}}</td>
                     </tr>
                     <tr>
                         <td class="p-1 font-medium">Adresse:</td>
                         <td class="p-1">{{$res->adresse}}</td>
                     </tr>
                 </tbody>
             </table>
             <p>
        </div>

        <div class="mt-3">

            <p class="mt-2">
            <b>E</b>Est  bien   connu  de  nos  services  comme  exerçant  la  profession  sus-indiquée et ce en  vertu  de  son  inscription  au   Registre  national de l’auto-entrepreneur sous l’Identifiant  n° {{$res->id_f}} 
            </p>

            <p class="mt-2" >
            <b>C</b>Cette Attestation est délivrée à l’intéressée sur sa demande pour servir et valoir ce que de droit.
            </p>

            <p class="mt-4 text-left">
                {{$document->province}} Le: {{$document->date_debut}}
            </p>
        </div>

        <div class="mt-5 text-center">
            <p>SIGNE</p>
        </div>
    </div>

    <p class="text-sm text-center mx-auto" id="footer">
                <span class="text-xs text-center m-0 p-0">
                    AVENUE MOULAY ABDELLAH B.P 51 OUARZAZATE 45000 MAROC. <br>
                </span>
                <span class="text-xs text-center m-0 p-0">
                    Tel : +212 (0) 5 24 88 23 28 / 28 32 <br>
                </span>
                <span class="text-xs text-center m-0 p-0">
                    Fax : +212 (0) 5 24 88 54 00 <br>
                </span>
                <span class="text-xs text-center m-0 p-0">
                    E-mail: ccisouarzazate@gmail.com <br>
                </span>
                <span class="text-xs text-center m-0 p-0">
                    Site web: http:// ww.ccisdt.ma <br>
                </span>
            </p>
</body>
</html>