<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Carte Pro</title>
    <link rel="stylesheet" href="css/app.css">
    <style>
       *{
        margin: 0px 0px 0px 0px !important;
        font-family: 'Times New Roman', Times, serif;
       }
       body{
        width: 238pt !important;
        height: 153pt !important;
       }
       .Carte{
            margin: 0.3rem !important;
            width: 100% !important;
            font-size: smaller !important;

       }
       .mrDiv{
           margin-top: 2px !important;
       }
       span{
           padding: 1px 2px !important;
       }
       .The_Head{
           display: flex !important;
           width: 100% !important;
           margin: 16px  16px 0px 16px !important;
           /* margin-left: 16px !important; */
           /* justify-content: space-evenly !important; */
           /* align-items: center !important; */
       }
       #signature{
            position: absolute !important;
            width: 1.1cm !important; 
            height:1cm !important;
            bottom: 1rem !important;
            right: 0.7rem;
       }

       .back{
           padding: 1.5rem 1.5rem 0rem 1.5rem !important;
       }
    </style>

</head>
<body class=" text-sm" >
   <div class="Carte">
           <div class=" The_Head ">
               <div class="inline-block">  <img src="images/logo_ccis_dt_2-removebg-preview.png"   class=" block " style=" width: 1.3cm; height:1.5cm;"> </div>
               <div class="inline-block text-center">
                   <div class="" style="width: 4.8cm !important; margin: 0 2px !important;  border: solid 1px black !important;"> <span>N° : {{$res->num_carte}}/{{date('Y', strtotime($document->date_debut))}} </span> <br></div>
                   <div class="" style="width: 4.8cm !important; margin: 3px 2px 0 2px !important;  border: solid 1px black !important;"><span>{{$res->nom}} {{$res->prenom}}</span></div>
               </div>
               @if(!empty($res->img))
                   
               <div class="inline-block ">  <img id="Logo" src="storage/images/{{$res['img']}}"    class=" block "  style=" width: 1.3cm; height:1.5cm;"> </div>
               @else
               <div class="inline-block  border">  <img id="Logo" src="images/logo_ccis_dt_2-removebg-preview.png"  style=" width: 1.3cm; height:1.5cm;"> </div>
               @endif
           </div>

           <div class="w-full mrDiv">
               <div class=" inline-block "  style="min-width: 5cm !important;  border: solid 1px black !important;"> <span>N° Pièce d’identité : {{$res->cin}}</span> </div>
               @if (!empty($res->rc))
                @if ($res->juridiqueForme->code_forme == 'COOP')
                <div class=" inline-block " style="min-width: 2.8cm !important;  border: solid 1px black !important;"> <span class="">RLC: {{$res->rc}}
                </span> </div>
                @else
                <div class=" inline-block " style="min-width: 2.8cm !important;  border: solid 1px black !important;"> <span class="">RC: {{$res->rc}}
                </span> </div>
                    @endif
                   
                @else
                <div class=" inline-block " style="min-width: 2.8cm !important;  border: solid 1px black !important;"> <span class="">RC: {{$res->id_f}}
                </span> </div>
                @endif

           </div>

           <div class="w-full mrDiv">
                <div class=" inline-block "  style="min-width: 5cm !important;  border: solid 1px black !important;"><span class=" "> ICE : {{$res->ice}}</span></div>
                <div class=" inline-block "  style="min-width: 2.8cm !important;  border: solid 1px black !important;"><>T.P : {{$res->patente}}</span></div>
            </div>

            <div class="w-full mrDiv" >
                <div class=" inline-block "  style="min-width: 7.97cm !important;  border: solid 1px black !important;"><span> Adresse : {{$res->adresse}}</span> </div>
            </div>

            <div class="w-full mrDiv">
                    <div class=""  style="max-width: 6.7cm !important;  border: solid 1px black !important;"><span> Activité : {{$res->activite_carte}} </span> </div>

                    <div class=" inline-block"  style="min-width: 6.7cm !important;  border: solid 1px black !important; margin-top:2px !important;"><span>  Valable jusqu’au :{{$document->date_fin}}</span> </div>
            </div>
                <div class=""><img id="signature" src="images/cacher.jpg" class="" alt="">
                </div>
   </div>

   <div class="back" style="break-after: always ">
        <img src="images/hearder.png" alt="">
        
        <div style="padding: 1rem 0 !important">
            <H2 class="text-center"><b>CARTE PROFESSIONNELLE</b></H2>
        </div>

        <div class="border-t-2 pt-2" style="border-color: black;">
            <p style="font-size: 9px !important; line-height: 1 !important; text-align: center !important; font-weight: 600 !important  ">
                <span class="block">
                    AVENUE MOULAY ABDELLAH B.P 51 OUARZAZATE 45000 MAROC.            
                </span>
                <span class="block">
                    Tel : +212 (0) 5 24 88 23 28 / 28 32 <br>
                    Fax : +212 (0) 5 24 88 54 00
                </span>
                <span class="block">
                    E-mail: ccisouarzazate@gmail.com <br>
                    Site web: http:// ww.ccisdt.ma
                </span>
            </p>
           
        </div>
   </div>
</body>
</html>