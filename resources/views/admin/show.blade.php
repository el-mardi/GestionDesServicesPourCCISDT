@extends('dashboard')

@section('dashboard')

<h2>Responsable de:</h2>
<div class= "mt-5">
    <table class=" text-left mt-3 cursor-pointer w-2/4 mx-auto">
        <thead class="bg-blue-200">
            <th class="p-1">service</th>
            <th class="p-1">Code service</th>
        </thead>
        <tbody>
            @foreach ($responsable as $resp)
            <tr class="odd:bg-blue-50 even:bg-blue-100 border border-blue-300">
                <td class="p-1 ">
                    {{$resp->service}}
                </td>
                <td class="p-1 ">
                    {{$resp->code_service}}
                </td>
            </tr>
            @endforeach
        </tbody>
</table>

<div class= "mt-5">
    <h2>Liste contrats </h2>
    <table class="w-full text-left mt-3 cursor-pointer">
        <thead class="bg-orange-200">
            <th class="p-1">Type de demande</th>
            <th class="p-1">N contrat accompagnement</th>
            <th class="p-1">Date</th>
            <th class="p-1">Ressortissant (Cin) </th>
            <th class="p-1">Repressentant</th>
        </thead>
        <tbody>
            @foreach ($services as $service)
            <tr class="odd:bg-orange-50 even:bg-orange-100 border border-orange-300">
                <td class="p-1 ">{{$service->type_demande}}</td>
                <td class="p-1 w-6">{{$service->num_contrat_accom}}/{{$service->date_debut}}</td>
                <td class="p-1 ">{{$service->date_debut}}</td>
                {{-- <td class="p-1 ">{{$service->province}}</td> --}}
                <td class="p-1 ">{{$service->ressortissant->nom}} {{$service->ressortissant->prenom}} <span class="text-md text-slate-700"> ({{$service->ressortissant->cin}})</span></td>
                <td class="p-1 ">
                    @isset($service->representant->nom)
                    {{$service->representant->nom}} {{$service->representant->prenom}} <span class="text-md text-slate-700">({{$service->representant->cin}}) </span>
                    @endisset
                
                </td> 
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
                <td class="p-2 border">{{$adhesion->num_contrat_adh}}/{{$adhesion->date_debut}}</td>
                <td class="p-2 border">{{$adhesion->date_debut}}</td>
                {{-- <td class="p-2 border">{{$adhesion->province}}</td> --}}
                <td class="p-1 ">{{$adhesion->ressortissant->nom}} {{$adhesion->ressortissant->prenom}} <span class="text-md text-slate-700"> ({{$adhesion->ressortissant->cin}})</span></td>
                <td class="p-1 ">
                    @isset($adhesion->representant->nom)
                    {{$adhesion->representant->nom}} {{$adhesion->representant->prenom}} <span class="text-md text-slate-700">({{$adhesion->representant->cin}}) </span>
                    @endisset
                
                </td> 
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection