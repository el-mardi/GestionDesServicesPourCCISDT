@extends('dashboard')

@section('dashboard')

<table class="border-separate border border-slate-400 w-8/12 mx-auto mt-5">
    <thead class="bg-slate-300 border border-slate-300" >
        <tr>
            <td> Nom </td>
            <td> Prenom </td>
            <td> Cin </td>
            <td> Num contrat </td>
            <td> Date du debut </td>
        </tr>
    </thead>
    <tbody class="bg-slate-100 border border-slate-300">
        <tr>
            <td> {{ $ressortissants[0]->nom }}</td>
            <td> {{ $ressortissants[0]->prenom }}</td>
            <td> {{ $ressortissants[0]->cin }}</td>
            <td> {{ $ressortissants[0]->num_contrat_accom }}</td>
            <td> {{ $ressortissants[0]->date_debut }}</td>
        </tr>
    </tbody>
</table>

<table class="border-separate border border-slate-100 w-8/12 mx-auto mt-5">
    <thead class="bg-slate-300 border border-slate-300" >
            @foreach ($ressortissants as $ressortissant)
            <tr>
                <td> {{ $ressortissant->service }}</td>
            </tr>
            @endforeach
        </thead>
    </table>    
@endsection