@extends('dashboard')

@section('dashboard')
{{-- 
<div class="class="grid gap-x-8 gap-y-4 grid-cols-2>
    
</div>
<table class="w-full text-left mt-5 mb-5">
   <tr class="border">
       <td>Nom et Prénom :  </td> <th class="p-2">{{$rep->nom}} {{$rep->prenom}} </th>
       <td>Numero de piéce d'identité : </td> <th class="p-2"> {{$rep->cin}} </th>
   </tr>
   
<tr class="border">
    <td>Nationalité :  </td> <th class="p-2">{{$rep->nationalite}} </th>
    <td>Sexe : </td> <th class="p-2">{{$rep->sexe}} </th>
</tr>
<tr class="border">
    <td>Adresse :  </td> <th class="p-2">{{$rep->adresse}} </th>
    <td>Tél :  </td> <th class="p-2">{{$rep->tel}} </th>
</tr>
<tr class="border">
</tr>
<tr class="border">
    <td>Mail : </td> <th class="p-2">{{$rep->mail}} </th>
    <td>Qualité : </td> <th class="p-2"> {{$rep->qualite->qualite}} </th>
</tr>

</table>

<div class= "mt-5">
    
    <table class="w-full text-left mt-3 cursor-pointer">
        <thead class="bg-orange-200">
            <th class="p-1">Type de demande</th>
            <th class="p-1">N contrat accompagnement</th>
            <th class="p-1">Date</th>
            <th class="p-1">Ressortissant (Cin) </th>
            <th class="p-1">Fonctionnaire</th>
        </thead>
        <tbody>
            @foreach ($services as $service)
            <tr class="odd:bg-orange-50 even:bg-orange-100 border border-orange-300">
                <td class="p-1 ">{{$service->type_demande}}</td>
                <td class="p-1 ">{{$service->num_contrat_accom}}</td>
                <td class="p-1 ">{{$service->date_debut}}</td>
                {{-- <td class="p-1 ">{{$service->province}}</td> --}}
                <td class="p-1 ">{{$service->ressortissant->nom}} {{$service->ressortissant->prenom}} <span class="text-md text-slate-700"> ({{$service->ressortissant->cin}})</span></td>
                <td class="p-1 ">{{$service->fonctionnaire->nom}} {{$service->fonctionnaire->prenom}}</td> 
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<div class= "mt-5 ">
        
    <table class="border w-full text-left mt-2 cursor-pointer">
        <thead class="bg-green-200">
            <th class="border p-1">N contrat d'adhesion</th>
            <th class="border p-1">Date debut</th>
            {{-- <th class="border p-1">Province</th> --}}
            <th class="p-1">Ressortissant (Cin) </th>
            <th class="border p-1">Fonctionnaire</th>
        </thead>
        <tbody>
            @foreach ($adhesions as $adhesion)
            <tr class="odd:bg-green-50 even:bg-green-100 border border-green-300">
                <td class="p-2 border">{{$adhesion->num_contrat_adh}}</td>
                <td class="p-2 border">{{$adhesion->date_debut}}</td>
                {{-- <td class="p-2 border">{{$adhesion->province}}</td> --}}
                <td class="p-1 ">{{$adhesion->ressortissant->nom}} {{$adhesion->ressortissant->prenom}} <span class="text-md text-slate-700"> ({{$adhesion->ressortissant->cin}})</span></td>
                <td class="p-2 border">{{$adhesion->fonctionnaire->nom}} {{$adhesion->fonctionnaire->prenom}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div> --}}

@endsection