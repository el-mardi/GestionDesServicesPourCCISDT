<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/app.css">

    <title>Contrat d'adhesion</title>
</head>
<body class="ThePdf">

   <div class="mx-8 " >
    <div class="mt-0 mb-8">
        <div class="text-center mb-0">
            <img src="images/hearder.png" class="head">
        </div>
        <div class="text-center mt-5">
            {{-- <span class="version text-left text-sm">CCISDT.LDA14.ContratAccompagnement.V1</span> --}}
            <p><b> CONTRAT D’ADHESION</b></p>
            <p><b>N° DE CONTRAT : <b>{{$res['dernier_contrat_accom']}}/{{date('Y', strtotime($date))}}</b></p>
         </div>
     </div>

     <table class="mt-5">
         <tbody>
             <tr class=" p-2">
                 <td class="border p-2 " style="border-color: black">
                     <p>ACCOMPAGNE : Ci-après nommé le bénéficiaire </p>
                     <p>Numéro de pièce d'identité :  <b> {{$res['cin']}}</b></p>
                     <p>NOM :  <b> {{$res['nom']}}</b></p>
                     <p>PRENOM : <b>{{$res['prenom']}}</b></p>
                     <p>QUALITE : <b> {{$res->qualite->qualite}}</b> </p>
                     <p>ORGANISME REPRESENTE : <b>{{$res->raison_social}}</b></p>
                     <p>ADRESSE :<b> {{$res['adresse']}}</b></p>
                     <p>TELEPHONE : </b> {{$res['tel']}}</b></p>
                     <p>E-MAIL : <b> {{$res['mail']}}</b></p>

                 </td>
                 <td class="border p-2 mt-0 pb-36" style="border-color: black">
                    <p class="mt-0 text-center">
                        Chambre de commerce, d’industrie et de services de DRAA TAFILALET <br>
                     Ci-après nommé : la CCIS DT <br>
                    </p>
                 </td>
             </tr>
         </tbody>
     </table>
     
  
     <ol type="1">
         <li class="mt-3" type="1"> <b>L’ADHESION : </b>
             <p  class="mt-2 ml-5">• Contrat L'adhésion d'un ressortissant à la CCIS DT est générée par la souscription d'un contrat qui détermine la mission de la CCIS DT et les services dont il est le bénéficiaire. Ce contrat est signé, d'une part, par l'Adhérent, après qu'il ait pris connaissance du statut de la CCIS DT et de son Règlement Intérieur et, d'autre part, par le représentant de la CCIS DT ;
             </p>
             
             <p class="mt-2 ml-5">
                •	Considéré adhérant toutes personnes tenant d’une carte professionnelle et/ou une attestation d’exercice ;
             </p>

             <p class="mt-2 ml-5">
                •	L’Adhérent entend adhérer à la CCIS DT, sous réserve d’acceptation par cette dernière. Il sera alors habilité, à bénéficier de tout ou partie des Services de la CCIS DT dans les limites et conditions spécifiques à chacun d’eux.
             </p>
         </li>
         
             <table class=" mt-2 w-full text-center text-sm" >
                 <thead>
                     <tr>
                         <td class="border px-2" style="border-color: black">PACK (S)</td>
                         <td class="border px-2" style="border-color: black">SERVICE (S)</td>
                         <td class="border px-2" style="border-color: black">TARIF</td>
                     </tr>
                 </thead>
                 <tbody>
                     <tr class="">
                         <td class="border px-2" style="border-color: black">
                            @foreach ($nom_pack as $pack)
                             {{$pack}} <br>
                             @endforeach
                        </td>
             
                         <td class="border pl-6 " style="border-color: black">
                             {{-- <p class="ml-5 h-11  mx-2 "> --}}
                                 @foreach ($services as $item)
                                 {{-- <li type="1" class=""> --}}
                                     <b>• {{$item->service}}</b> <br>
                                 @endforeach
                             {{-- </p> --}}
                         </td>
     
                         <td class="border px-2" style="border-color: black"> {{$pack_tarif}} DH</td>
                     </tr>
                 </tbody>
             </table>

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

         
         <li class="mt-2" type="1" style="border-color: black; page-break-before: always !important" ><b>L’OBJET DU CONTRAT :</b>
             <p class="mt-2  ml-5">
                •	Les présentes Conditions Générales de Prestation  s’appliquent à tous les services de la CCIS DT, que ces services soient réalisés à titre gratuit ou onéreux.
             </p>
             <p  class="mt-2 ml-5" >
                •	Le présent contrat est définitivement conclu dès acceptation expresse par la CCIS DT de la demande de l’Adhérent, rédigée conformément à l’offre de la CCIS DT. Dans le cas de services complémentaires, les prix et les délais seront précisés.
             </p>
             <p class="mt-2 ml-5">
                •	L’acceptation des présentes Conditions Générales par l’Adhérent est une condition essentielle de l’engagement de la CCIS DT. Aussi, tout commencement d’exécution du contrat acceptée par la CCIS DT implique l’acceptation des présentes Conditions Générales, quelles que soient les clauses.
             </p>
         </li>

        
         <li class="mt-3" type="1" > <b>L’OFFRE : </b>
            <p class="mt-2">
                Ce contrat d’adhésion donne accès aux services suivants 
            </p>
             <p  class="mt-2 ml-5">•	Participation aux formations organisées par la CCIS DT au profit de ses adhérents ; Participation aux journées d’orientation  économiques, commerciales et de sensibilisation ;
             </p>
             <p class="mt-2 ml-5">
                •	Recevoir un e-mail pour tout événement organisé ou toute nouvelle d'intérêt pour les personnes impliquées ;
             </p>
             <p class="mt-2 ml-5">
                •	Accès au magazine mensuel publié par la Chambre ;
             </p>
             <p class="mt-2 ml-5">
                •	Participation à des séminaires et tables rondes ;
            </p>
             <p class="mt-2 ml-5">
                •	Accompagnement technique pour la post création de l'entreprise ;
            </p>
            <p class="mt-2 ml-5">
                •	Informations sur les expositions organisées au niveau national et international.
            </p>
         </li>

         <li class="mt-3"  type="1">
            <b>OBLIGATIONS DE L’ADHERENT :</b>
            <p class="mt-2">
                L’adhérent s’engage à :
            </p>
             <p  class="mt-2 ml-5">
                •	Respecter les présentes conditions générales ;
             </p>
             <p class="mt-2 ml-5">
                •	Fournir les coordonnées personnelles et professionnelles valides et informer la CCIS DT des modifications éventuelles de ces coordonnées;
            </p>
            <p class="mt-2 ml-5">
                •	autoriser  la CCIS DT à l’inscrire dans la base de données électronique de la CCIS DT et autorise la CCIS DT à exploiter ses coordonnées ;
            </p>

            <p class="mt-2">
                L’Adhérent est informé que toute fausse déclaration pourrait avoir pour conséquence d’entraîner la résiliation de ce contrat, sans remboursement de sa cotisation. 
            </p>
         </li>

         <li class="mt-3"  type="1"  style=" page-break-before: always !important">
             <b>OBLIGATIONS DE LA CCIS DT :</b>
             <p class="mt-2">
                la CCIS DT s’engage à :
             </p>
              <p  class="mt-2 ml-5">
                •	Respecter les présentes conditions générales ;
              </p>
              <p class="mt-2 ml-5">
                •	La protection Les informations personnelles et professionnelles de l’adhérant ;
              </p>
              <p class="mt-2 ml-5">
                •	Prester l’ensemble de services mentionnés dans ce contrat.
            </p>
          </li>

         <li class="mt-3"  type="1">
             <b>LA DUREE :</b>
              <p  class="mt-2 ml-5">
                  •	La présente Adhésion est souscrite à compter de la date de signature du contrat pour une durée d’une année.
              </p>
          </li>

          <li class="mt-3"  type="1" >
            <b> Conditions de résiliation du présent contrat :</b>
             <p  class="mt-2 ml-5">
                 •La CCIS DT peut résilier le présent contrat d'adhésion lorsque l’adhèrent ne respecte pas sans motif légitime les engagements qui y sont stipulés. Dans ce cas, la CCIS DT notifie à l’adhèrent son intention de résilier le contrat par tout moyen permettant d'attester la réception de cette notification. L’adhèrent  peut présenter ses observations par écrit dans le cadre d'un entretien au cours duquel, il peut se faire assister d'une personne de son choix. La CCIS DT notifie sa décision finale a l’adhèrent par tout moyen permettant d'établir avec certitude la date de sa réception. 
             </p>
         </li>

     </ol>
     {{-- <p class="text-sm text-center mx-auto" id="footer">
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
     </p> --}}

     <p class=" mt-5"  style=" page-break-before: always !important">
        L’adhèrent déclare avoir pris connaissance des conditions du présent contrat et s'engagent à les respecter. Ils certifient l'exactitude des renseignements qui les concernent.
     </p>

     <div class="text-md mt-8 ">
         <div class="inline pr-4 mr-8">Fait à: <b>{{$province}}</b></div>
         <span class="mx-6 p-4"> </span> 
         <div class="inline pl-4 ml-8 ">Le: <b>{{$date}}</b></div>
         <p class="mt-5">
            Signature :
         </p>
     </div>


    
</body>
</html>