@extends('dashboard')

@section('dashboard')

<div class="class="grid gap-x-8 gap-y-4 grid-cols-2>
    <a class=" px-3 py-2 border-2 hover:border-slate-600 hover:bg-slate-200 rounded-md border-slate-400 bg-slate-100" href="{{route('fiche_res', $ressortissant->res_id)}}">Fiche Ressortissant</a>
</div>
<table class="w-full text-left mt-5 mb-5 p-2 rounded-md">
    <tr class="border  border-slate-400">
        <td class="p-3 text-right">Numero de fiche :</td> <th> {{$ressortissant->num_fiche}} </th>
    </tr>
   <tr class="border  border-slate-400">
       <td>Nom et Prénom :  </td> <th class="p-2">{{$ressortissant->nom}} {{$ressortissant->prenom}} </th>
       <td>Numero de piéce d'identité : </td> <th class="p-2"> {{$ressortissant->cin}} </th>
   </tr>
   
<tr class="border  border-slate-400">
    <td>Nationalité :  </td> <th class="p-2">{{$ressortissant->nationalite}} </th>
    <td>Sexe : </td> <th class="p-2">{{$ressortissant->sexe}} </th>
</tr>
<tr class="border  border-slate-400">
    <td>Date de naissance : </td> <th class="p-2"> {{$ressortissant->date_naissance}} </th>
    <td>Adresse :  </td> <th class="p-2">{{$ressortissant->adresse}} </th>
</tr>
<tr class="border  border-slate-400">
    <td>Lieu de reésidence :  </td> <th class="p-2">{{$ressortissant->residence}} </th>
    <td>Tél :  </td> <th class="p-2">{{$ressortissant->tel}} </th>
</tr>
<tr class="border  border-slate-400">
    <td>Mail : </td> <th class="p-2">{{$ressortissant->mail}} </th>
    <td>Formation : </td> <th class="p-2"> {{$ressortissant->formation}} </th>
</tr>
<tr class="border  border-slate-400">
    <td>Expérience professionnelle : </td> <th class="p-2"> {{$ressortissant->experience}} </th>
    <td>Qualité : </td> <th class="p-2"> {{$ressortissant->qualite->qualite}} </th>
</tr>
<tr class="border  border-slate-400">
    <td class="p-2">numero de contrat d'adhésion : </td> <th > {{$ressortissant->dernier_contrat_adh}} </th>
    <td class="p-2"> Année de derniére adhésion :  </td> <th >
        @isset($ressortissant->date_dernier_contrat->date_debut)
        {{$ressortissant->date_dernier_contrat->date_debut}} 
        @endisset
        </th>
</tr>
<tr class="border  border-slate-400">
    <td>numero de contrat d'accompagnement : </td> <th class="p-2"> {{$ressortissant->dernier_contrat_accom}} </th>
    <td>Forme juridique :  </td> <th class="p-2">{{$ressortissant->juridiqueForme->formeJur}} </th>
</tr>
<tr class="border  border-slate-400">
    <td>Raison social :  </td> <th class="p-2">{{$ressortissant->raison_social}} </th>
    <td>ICE :  </td> <th class="p-2">{{$ressortissant->ice}} </th>
</tr>
<tr class="border  border-slate-400">
</tr>
<tr class="border  border-slate-400">
    <td>RC :  </td> <th class="p-2">{{$ressortissant->rc}} </th>
    <td>Patente :  </td> <th class="p-2">{{$ressortissant->patente}} </th>
</tr>
<tr class="border  border-slate-400">
    <td>Secteur d'activité : </td> <th class="p-2"> {{$ressortissant->secteurs->secteur}} </th>
    <td>L'activité : </td> <th class="p-2"> {{$ressortissant->activites->activite}} </th>
</tr>

<tr class="border  border-slate-400">
    <td>Remarque : </td> <th class="p-2"> {{$ressortissant->remarque}} </th>
</tr>
</table>


@foreach ($services as $service)
<div class="border border-lime-300 p-2 rounded-md my-3">

    <table class="text-sm border w-full text-left mt-2 cursor-pointer">
        <thead class="bg-lime-200">
            <th class="border p-1 border-lime-200">N contrat accompagnement</th>
            <th class="border p-1 border-lime-200">Date debut</th>
            <th class="border p-1 border-lime-200">Date fin</th>
            <th class="border p-1 border-lime-200">Province</th>
            {{-- <th class="border p-1 border-lime-200">Durée</th> --}}
            <th class="border p-1 border-lime-200">Fonctionnaire</th>
            <th class="border p-1 border-lime-200">Representant</th>
            <th class="border p-1 border-lime-200">Remarque</th>
        </thead>
        <tbody>
            <tr class="bg-lime-50">
                <td class="p-1 border border-lime-200">{{$service[0]->num_contrat_accom}}</td>
                <td class="p-1 border border-lime-200">{{$service[0]->date_debut}}</td>
                <td class="p-1 border border-lime-200">{{$service[0]->date_fin}}</td>
                <td class="p-1 border border-lime-200">{{$service[0]->province}}</td>
                {{-- <td class="p-1 border border-lime-200">{{$service[0]->duree}}</td> --}}
                <td class="p-1 border border-lime-200">{{$service[0]->fonctionnaire->nom}} {{$service[0]->fonctionnaire->prenom}}</td>
                <td class="p-1 border border-lime-200">
                    @isset($service[0]->representant)        
                    {{$service[0]->representant->nom}} {{$service[0]->representant->prenom}}
                    @endisset
                </td>
                <td class="p-1 border border-lime-200">{{$service[0]->remarque}}</td>
            </tr>
        </tbody>
    </table>
    <table class="text-sm w-9/12 mx-auto text-left mt-2 cursor-pointer">
        <thead class="bg-lime-200">
            <th class="border border-lime-200 p-1">Service</th>
            <th class="border border-lime-200 p-1">Code service</th>
        </thead>
        <tbody>
            @foreach ($service as $item)
            <tr class="odd:bg-lime-50 even:bg-lime-100">
                <td class="p-1 border border-lime-200">{{$item->service}}</td>
                <td class="p-1 border border-lime-200">{{$item->code_service}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endforeach

@foreach ($orient_doc as $item)
<div class= "border border-orange-300 p-2 rounded-md my-3">

    <table class="text-sm border w-full text-left mt-2 cursor-pointer">
        <thead class="bg-orange-200 ">
            <th class="p-1 border border-orange-300">Type de service</th>
            <th class="p-1 border border-orange-300">Date debut</th>
            <th class="p-1 border border-orange-300">Date fin</th>
            <th class="p-1 border border-orange-300">Province</th>
            {{-- <th class="p-1 border border-orange-300">Durée</th> --}}
            <th class="p-1 border border-orange-300">Fonctionnaire</th>
            <th class="p-1 border border-orange-300">Representant</th>
            <th class="p-1 border border-orange-300">Remarque</th>
        </thead>
        <tbody>
            <tr class="odd:bg-orange-50">
                <td class="p-1 border border-orange-300">{{$item->type_demande}}</td>
                <td class="p-1 border border-orange-300">{{$item->date_debut}}</td>
                <td class="p-1 border border-orange-300">{{$item->date_fin}}</td>
                <td class="p-1 border border-orange-300">{{$item->province}}</td>
                {{-- <td class="p-1 border border-orange-300">{{$item->duree}}</td> --}}
                <td class="p-1 border border-orange-300">{{$item->fonctionnaire->nom}} {{$item->fonctionnaire->prenom}}</td>
                <td class="p-1 border border-orange-300">
                    @isset($item->representant)
                    {{$item->representant->nom}} {{$item->representant->prenom}}
                    @endisset
                </td>
                <td class="p-1 border border-orange-300">{{$item->remarque}}</td>
    
            </tr>
        </tbody>
    </table>
    <table class="text-sm w-9/12 mx-auto text-left mt-2 cursor-pointer">
        <thead class="bg-orange-200">
            <th class="border border-orange-300 p-1">Service</th>
            <th class="border border-orange-300 p-1">Code service</th>
        </thead>
        <tbody>
            {{-- @foreach ($service as $item) --}}
            <tr class="odd:bg-orange-50 even:bg-orange-100">
                <td class="p-1 border border-orange-300">{{$item->service}}</td>
                <td class="p-1 border border-orange-300">{{$item->code_service}}</td>
            </tr>
            {{-- @endforeach --}}
        </tbody>
    </table>
</div>
@endforeach

@foreach ($adhesions as $adhesion)
<div class= "border border-green-300p-2 rounded-md my-3">

    <table class="text-sm border w-full text-left mt-2 cursor-pointer">
        <thead class="bg-blue-300">
            <th class="border p-1">N contrat d'adhesion</th>
            <th class="border p-1">Date debut</th>
            <th class="border p-1">Date fin</th>
            <th class="border p-1">Province</th>
            <th class="border p-1">Fonctionnaire</th>
            <th class="border p-1">Representant</th>
            <th class="border p-1">Remarque</th>
        </thead>
        <tbody>
            <tr class="odd:bg-blue-50 even:bg-blue-100">
                <td class="p-2 border">{{$adhesion[0]->num_contrat_adh}}</td>
                <td class="p-2 border">{{$adhesion[0]->date_debut}}</td>
                <td class="p-2 border">{{$adhesion[0]->date_fin}}</td>
                <td class="p-2 border">{{$adhesion[0]->province}}</td>
                <td class="p-2 border">{{$adhesion[0]->fonctionnaire->nom}} {{$adhesion[0]->fonctionnaire->prenom}}</td>
                <td class="p-2 border">
                    @isset($adhesion[0]->representant)
                    {{$adhesion[0]->representant->nom}} {{$adhesion[0]->representant->prenom}}   
                    @endisset
                </td> 
                <td class="p-2 border">{{$adhesion[0]->remarque}}</td>
            </tr>
        </tbody>
    </table>
    <table class="text-sm w-9/12 mx-auto text-left mt-2 cursor-pointer">
        <thead class="bg-blue-300">
            <th class="border p-1">Pack</th>
            <th class="border p-1">Code Pack</th>
        </thead>
        <tbody>
            @foreach ($adhesion as $item)
            <tr class="odd:bg-blue-50 even:bg-blue-100">
                <td class="p-2 border">{{$item->nom_pack}}</td>
                <td class="p-2 border">{{$item->code_pack}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endforeach

@endsection