<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Certificat d'origine</title>
    <link rel="stylesheet" href="css/app.css">

    <style>
        *{
            margin: 0 0.5rem 0rem 0.5rem !important;
        }
        .Title{
            margin: 0.8rem 0 !important;
        }
    </style>
</head>
<body class="ThePdf" >
   <div class="BodY">
    <div class="text-center mb-0">
        <img src="images/hearder.png" class="head">
    </div>
    <div class="text-center Title">
        <p style="font-size: large;"><b>CERTIFICAT D’ORIGINE <br> ORIGIN CERTIFICAT
            </b> <br> N° : {{$document->id_num_contrat}}/{{date('Y', strtotime($demande->date_debut))}} </p>
     </div>
     
       <table class="w-full text-center text-sm">
           <tbody>
           
           <tr>
               <td class="m-0 p-0" style="border: 1px solid black" rowspan="1" colspan="2">  <span class=""> <b>1 -</b> EXPORTATEUR/EXPORTER </span> <p class="p-5 font-thin text-xl">{{$document->exportateur}}</p></td>
               <td class="m-0 p-0" style="border: 1px solid black" rowspan="1" colspan="2"><span> <b>2 - </b> DESTINATAIRE / CONSIGNEE</span> <p class="p-5 font-thin text-xl">{{$document->destinataire}}</p> </td>
           </tr>
           
           <tr>
            <td class="m-0 p-0" style="border: 1px solid black" rowspan="2" colspan="2"> <span><b>3 - </b>  Pays d'origine / Country of origin / Paie de origen</span> <p  class="p-6 font-thin text-xl">{{$document->pays_or}}</p></td>
            <td class="m-0 p-0" style="border: 1px solid black" rowspan="1" colspan="2"> <span><b>4 - </b> Date de la facture </span> <p class="p-3 font-thin text-xl">{{$document->date_facture}}</p></td>
           
         </tr>
         <tr>
             <td class="m-0 p-0" style="border: 1px solid black" rowspan="1" colspan="2"><span><b>5 - </b> N° de la facture </span> <p class="p-3 font-thin text-xl">{{$document->num_facture}}</p> </td>
         </tr>

           <tr>
               <td class="m-0 p-0" style="border: 1px solid black" rowspan="1" colspan="2"><span><b>6 - </b> Observations / Remarks </span> <p class="p-3 font-thin text-xl">{{$document->remarque}}</p> </td>
               <td class="m-0 p-0" style="border: 1px solid black" rowspan="1" colspan="2"><span><b>7 - </b> Mode de transport /Transport Mode</span><p class="p-5 font-thin text-xl">{{$document->transport}}</p> </td>
           </tr>
           <tr>
               <td class="" style="padding: 0 0 1.5rem; border: 1px solid black" rowspan="" colspan="1"><span><b> 8 - </b> N° de nomenclature <br> H.S. code </span>  <p class="py-5 font-thin text-xl">{{$document->nomenclature}} </p></td>
               <td class="" style="padding: 0 0 1.5rem; border: 1px solid black" rowspan="" colspan="2"><span><b> 9 - </b>  Désignation des marchandises, marques, nombre et nature des colis Description of goods, mark, number and nature of packages </span> <p class="py-5 font-thin text-xl">{{$document->details}} </p> </td>
               <td class="" style="padding: 0 0 1.5rem; border: 1px solid black" rowspan="" colspan="1"><span><b> 10 - </b>  Quantité / Quantity </span> <p class="py-5 font-thin text-xl">{{$document->quantite}} </p>  </td>
           </tr>
       
            <tr>
                <td class="m-0 py-1 text-left" style="border: 1px solid black" colspan="4">
                <span class="" style="font-size: 10px !important;">
                    - L'AUTORITE SOUSSIGNEE CERTIFIE QUE LES MARCHANDISES DESIGNEES CI-DESSUS SONT ORIGINAIRES DU PAYS FIGURANT DANS LA CASE N° 3. <br>
                    - THE UNDERSIGNED AUTHORITY CEERTIFIES THAT THE GOOD'S DESCRIBED ABOVE ORIGINATE lN THE COUNTRY SHOWN lN BOX N° 3. <br>
                    - LA AUTORIDAD INFRASCRITA CEERTIFICA QUE LAS MERGANCIAS DESIGNADAS SON ORIGINARIAS DEL PAIS INDICADO EN LA CASILLA N° 3.
                </span>
            </td>
        </tr>

        <tr>
            <td class="m-0 py-1 text-left" style="border: 1px solid black" colspan="4">
                <span class="" style="font-size: 12px !important;">
                    - Le demandeur du certificat est le seul responsable quant à l'exactitude des éléments de la facture. <br>
                    - The asker of the certificate is the unique responsable for the exactness of invoice elements.   
                </span>
            </td>
        </tr>

        <tr>
            <td class="m-0 py-2" style="border: 1px solid black" colspan="4">
            <span class="text-lg font-thin ">
                Cadre réservé à l Administration        
            </span>
        </td>
        </tr>
        <tr style="border: 1px solid black" >
            <td class="m-0 pb-5" colspan="2"></td>
            <td class="m-0 " colspan="2">
                <p class="text-left py-5 ">
                    Date: 
                    {{$demande->date_debut}} 
                </p>
                <p class="text-center pb-32">
                    Signature et cachet <br>
                    Signature and Stamp
                </p>
            </td>
        </tr>
    </tbody>
       </table>
   </div>
</body>
</html>