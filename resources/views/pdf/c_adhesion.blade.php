<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Contrat d'accompagnement</title>
</head>
<body>
   <div class="container">
       Je sousigné {{$nom}} <br>
       titulaitre de la piéce d'identité Numero {{$cin}} <br>
       déclare solliciter un accompagnement de la <b> CCISDT: CHAMBRE DE COMMERCE, D'INDUSTRIE ET DE SERVICE LA REGION DARAA TAFILALET </b>. <br> <br>
       NOM DE PACK : 
       @foreach ($nom_pack as $pack)
           {{$pack}} <br>
          
       @endforeach

       SERVICES:
       @foreach ($service as $item)
       {{$item}} <br>
       @endforeach
       <br>
       TARIF: {{$pack_tarif}}


   </div>
</body>
</html>