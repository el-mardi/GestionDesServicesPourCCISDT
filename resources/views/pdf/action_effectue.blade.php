<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Action</title>
    <link rel="stylesheet" href="css/app.css">

</head>
<body class="ThePdf">

    <div class="mt-0 mb-8 actionHeader">
        <div class="m-0 ">
            <table class="w-full">
                <tbody>
                    <tr>
                        <td class="border text-left" style="border-color: black">
                            <p class=" ml-5">
                                N° DE RESSORTISSANT : <b>{{$res->ressortissant->num_fiche}}</b> <br>
                                Numéro de pièce d'identité: : <b>{{$res->ressortissant->cin}} </b><br>
                                N° DE CONTRAT :  <b>{{$res['num_contrat_accom']}}/{{date('Y', strtotime($res['date_debut']))}}</b> <br>
                                SERVICE(S) :  
                                @foreach ($services as $service)
                                <p class="text-center">
                                    <b>{{$service[0]->service}} </b>
                                </p>
                                @endforeach
                            </p>
                        </td>
                        <td class="mx-5  text-center " style="border-color: black">
                            <img src="images/hearder.png" class="">
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
            <p class="text-center mt-3 text-xl" ><b>ACTIONS EFFECTUEES</b></p>
     </div>


        <table class="w-full">
            <thead class="w-full">
                <th class="border p-1 " style="border-color: black; background-color:rgb(183, 183, 183);">DATE</th>
                <th class="border p-1 " style="border-color: black; background-color:rgb(183, 183, 183);">HEURE</th>
                <th class="border p-1 px-20 " style="border-color: black; background-color:rgb(183, 183, 183);">ACTION</th>
                <th class="border " style="border-color: black; background-color:rgb(183, 183, 183); width: 25px">DUREE D'INTERVENTION</th>
                <th class="border p-1 px-10" style="border-color: black; background-color:rgb(183, 183, 183);">REMARQUE</th>
            </thead>
            <tbody>
               @for ($i = 0; $i < 9; $i++)
                <tr class="" style="background-color:rgb(244, 244, 244)">
                    <td class="border h-11" style="border-color: black"></td>
                    <td class="border h-11" style="border-color: black"></td>
                    <td class="border h-11" style="border-color: black"></td>
                    <td class="border h-11" style="border-color: black"></td>
                    <td class="border h-11" style="border-color: black"></td> 
                </tr>
               @endfor
            </tbody>
        </table>

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
</body>
</html>