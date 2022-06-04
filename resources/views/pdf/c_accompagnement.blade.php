<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <title>Contrat d'accompagnement</title>
    <link rel="stylesheet" href="css/app.css">
    {{-- <link rel="stylesheet" href="css/style.css"> --}}
</head>
<body class="ThePdf">
   <div class="mx-8 " >
       <div class="mt-0 mb-8">
           <div class="text-center mb-0">
               <img src="images/hearder.png" class="head">
           </div>
           <div class="text-center mt-5">
               {{-- <span class="version text-left text-sm">CCISDT.LDA14.ContratAccompagnement.V1</span> --}}
               <p><b>CONTRAT D’ACCOMPAGNEMENT</b></p>
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
                        Organisme d’accompagnement  <br>
                        Chambre de commerce, d’industrie et de services de DRAA TAFILALET <br>
                        Ci-après nommé : la CCIS DT <br>
                       </p>
                    </td>
                </tr>
            </tbody>
        </table>
        
     
        <ol type="1">
            <li class="mt-3" type="1"> <b>Objet du contrat d'accompagnement : </b>
                <p  class="mt-2 ml-5">•Le présent contrat d'accompagnement atteste de la décision de la CCIS DT d'accompagner le Bénéficiaire, à sa demande, dans le parcours d'accompagnement pour :
                </p>
            </li>
            
                <table class=" mt-2 w-full" >
                    <tbody>
                        <tr class="">
                            <td class="border px-2" style="border-color: black"> SERVICE(S):</td>
                            <td class="border pl-6 " style="border-color: black">
                                {{-- <p class="ml-5 h-11  mx-2 "> --}}
                                    @foreach ($services as $key => $item)
                                    {{-- <li type="1" class=""> --}}
                                        <b>• {{$item->service}}</b> <br>
                                    @endforeach

                                {{-- </p> --}}
                            </td>
        
                            <td class="border px-2" style="border-color: black">PRIX: {{$tarif}} DH</td>
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

            
            <li class="mt-2" type="1" style="border-color: black"><b>Engagements de la CCIS DT :</b>
                <p class="mt-2  ml-5">
                    •	La CCIS DT s'assure de la cohérence et de l'adéquation entre les compétences dont disposent ses intervenants (formation, expérience professionnelle) et les besoins du bénéficiaire, de manière à optimiser son accompagnement. L’opérateur d’accompagnement exécute les actions d'accompagnement qu'il a proposées au bénéficiaire dans le respect de la déontologie de son métier et des attentes qualité du parcours d'accompagnement. Il apporte au bénéficiaire une information actualisée relative aux diverses évolutions législatives notamment d'ordre fiscal, social et économique, utiles à son besoin d’accompagnement.
                </p>
                <p  class="mt-2 ml-5" style=" page-break-before: always !important">
                    •	La CCIS DT est chargé d'informer et d'orienter le bénéficiaire vers d'autres opérateurs d’accompagnement pouvant concourir à la bonne fin de son projet. A cet effet, l'opérateur d'accompagnement met à la disposition du bénéficiaire les coordonnées et les compétences et toutes informations relatives aux opérateurs d’accompagnement.
                </p>
            </li>

           
            <li class="mt-3" type="1" > <b>Engagements du Bénéficiaire : </b>
                <p  class="mt-2 ml-5">•	Le bénéficiaire  s'engage à participer de manière dynamique aux actions d'accompagnement proposées par la CCIS DT, à être à l'écoute des conseils qui lui sont donnés et à mettre en œuvre les préconisations qui lui sont faites.
                </p>
                <p class="mt-2 ml-5">
                    •	Le bénéficiaire s'engage à être présent aux rendez-vous de travail (entretien, séance collective, session d'information, etc.) fixés avec la CCIS DT dans le cadre du calendrier prévisionnel de réalisation des actions d'accompagnement individuel ou collectif dont ils ont convenu. Il s'engage également à une collaboration rapprochée avec la CCIS DT pour produire l'ensemble des pièces nécessaires à la finalisation de son accompagnement.
                </p>
                <p class="mt-2 ml-5">
                    •	Le bénéficiaire s'engage sur la véracité des informations qu'il déclare à l'opérateur d'accompagnement dans le cadre du suivi de son activité et du déroulement de son parcours. Le bénéficiaire s'engage à fournir dans les meilleurs délais les pièces justificatives demandées par l'opérateur d'accompagnement au cours des différentes phases d’accompagnement.
                </p>
            </li>
            <li class="mt-3"  type="1">
               <b>Traçabilité des données :</b>
                <p  class="mt-2 ml-5">
                    •	La CCIS DT enregistre l’ensemble des informations dans sa base de données  et conserve obligatoirement, ces documents relatifs au service d’accompagnement pendant les douze mois suivants la fin du parcours d’accompagnement. 
                </p>
            </li>

            <li class="mt-3"  type="1">
                <b>	La durée du contrat d’accompagnement :</b>
                 <p  class="mt-2 ml-5">
                     •	Ce contrat prend effet a partir de sa signature par les deux parties, et prend fin au moment de la réalisation de l’accompagnement ou de toute action de résiliation par cause valide.
                 </p>
             </li>

            <li class="mt-3"  type="1">
                <b> Conditions de résiliation du présent contrat :</b>
                 <p  class="mt-2 ml-5">
                     •	La CCIS DT peut résilier le présent contrat d'accompagnement lorsque le bénéficiaire ne respecte pas sans motif légitime engagements qui y sont stipulés. Dans ce cas, la CCIS DT notifie au bénéficiaire son intention de résilier le contrat par tout moyen permettant d'attester la réception de cette notification. Le bénéficiaire peut présenter ses observations par écrit dans le cadre d'un entretien au cours duquel, il peut se faire assister d'une personne de son choix la résiliation est confirmée, la CCIS DT notifie sa décision au bénéficiaire par tout moyen permettant d'établir avec certitude la date de sa réception. 
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

        <p class=" mt-5" style=" page-break-before: always !important">
            Les signataires déclarent avoir pris connaissance des conditions du présent contrat et s'engagent à les respecter. Ils certifient l'exactitude des renseignements qui les concernent.
        </p>

        <div class="text-md mt-8 ">
            <div class="inline pr-4 mr-8">Fait à: <b>{{$province}}</b></div>
            <span class="mx-6 p-4"> </span> 
            <div class="inline pl-4 ml-8 ">Le: <b>{{$date}}</b></div>
        </div>


        <table class="w-full mt-6" >
            <tbody>
                <tr class="">
                    <td class=" text-center text-sm h-1">
                        <span class="pb-10">Le bénéficiaire <br> {{$res['nom']}} {{$res['prenom']}}</span>
                    </td>
                    <td class=" text-center text-sm h-1">
                        <span class="pb-10">
                            La CCIS DT <br>
                            (nom et qualité du signataire, cachet de l’organisme)
                        </span>
                    </td>
                </tr>
              
            </tbody>
        </table>

            
        {{-- <div class="my-3 ml-5">
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
   </div> --}}


   {{-- <div class="res"  style="page-break-before: always;">
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
                        <p id="" class="text-xs  h-32 w-32 mt-2">
                            @if(!empty($res['img']))
                                <img src="storage/images/{{$res['img']}}" class="ml-32 mb-2  h-32 w-32 mt-2 rounded-sm">
                            @else
                                <p class="ml-32 mb-2  h-32 w-32 mt-2 border rounded-sm text-center"></p>
                            @endif
                        </p>
                            
                        <p class="mt-2">
                            <b>Numéro de fiche: </b>{{$res['num_fiche']}}
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
                        <p class="mt-2"><b>Année de dernière adhésion: </b>
                            @isset($adh->date_debut)
                            {{$adh->date_debut}}
                            @endisset </p>
                         <p class="mt-2"><b>Numéro de contrat d'adhesion: </b>
                            @isset($adh->date_debut)
                            {{$res['dernier_contrat_adh']}}/{{$adh->date_debut}}
                            @endisset</p>
                         <p class="mt-2"><b>Numéro contrat d'accompagnement: </b>
                            @isset($acc->date_debut)
                            {{$res['dernier_contrat_accom']}}/{{$acc->date_debut}}
                            @endisset</p>
                        <p class="mt-2"><b>Raison sociale: </b> {{$res['raison_social']}}</p>
                        <p class="mt-2"><b>ICE: </b> {{$res['ice']}}</p>
                        <p class="mt-2"><b>RC: </b> {{$res['rc']}} <span class="ml-24">  <b>Patente: </b> {{$res['patente']}}</span></p>
                        <p class="mt-2"><b>Forme juridique: </b> {{$res->juridiqueForme->formeJur}}</p>
                        <p class="mt-2"><b>Secteur d'activité</b> {{$res->secteurs->secteur}}</p>
                        <p class="mt-2"><b>Domaine d'activité</b>  {{$res->domaines->domaine}}</p>
                        <p class="mt-2"><b>Domaine d'activité</b>  {{$res->activite}}</p>
                        <p class="mt-2"><b>Tél: </b> {{$res['tel']}}</p>
                        <p class="mt-2"><b>Mail: </b> {{$res['mail']}}</p>
                        <p class="my-2"><b>Adresse: </b> {{$res['adresse']}}</p>
                    </td>
                </tr>
            </tbody>
        </table>
    </div> --}}

</body>
</html>