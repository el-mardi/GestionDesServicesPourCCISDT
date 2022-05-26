@extends('dashboard')

@section('dashboard')

<a href="{{route('ressortissant.create')}}" class="block p-2 bg-green-400 w-fit hover:cursor-pointer hover:bg-green-500 text-stone-700 hover:text-stone-900 mx-auto mr-6">Ajouter ressortissant</a>
<table class="border-collapse text-sm mt-5">
    <thead class="bg-blue-300">
      <tr class="">
        <th class="p-2 border border-indigo-300" >N fiche</th>
        <th class="p-2 border border-indigo-300" >Nom et Prenom</th>
        <th class="p-2 border border-indigo-300" >Cin</th>
        <th class="p-2 border border-indigo-300" >Qualité</th>
        <th class="p-2 border border-indigo-300" >N Contrat d'accompagmement</th>
        <th class="p-2 border border-indigo-300" >N Contrat d'adhesion</th>
        <th class="p-2 border border-indigo-300" >Activité</th>
        <th class="p-2 border border-indigo-300" >Consulter</th>
        <th class="p-2 border border-indigo-300" >Modifier</th>
        @if (Auth::user()->admin === 1)
        <th class="p-2 border border-indigo-300" >Supprimer</th>
        @endif
      </tr>
    </thead>
    <tbody>

        @foreach ($ressortissants as $ressortissant)
        <tr class="odd:bg-blue-50 even:bg-blue-100 border border-blue-300">
            <td  class="p-2 border-r border-indigo-300" >{{$ressortissant->num_fiche}}</td>
            <td  class="p-2 border-r border-indigo-300" >{{$ressortissant->nom}} {{$ressortissant->prenom}}</td>
            <td  class="p-2 border-r border-indigo-300" >{{$ressortissant->cin}}</td>
            <td  class="p-2 border-r border-indigo-300" >{{$ressortissant->qualite->qualite}}</td>
            @if(isset( $ressortissant->dernier_contrat_accom ))
            <td  class="p-2 border-r border-indigo-300" >{{$ressortissant->dernier_contrat_accom}}/{{$ressortissant->date_debut->date_debut}}</td>
            @else
              <td  class="p-2 border-r border-indigo-300 text-center" >--</td>
            @endif
            
            @if (isset($ressortissant->dernier_contrat_adh))
              <td  class="p-2 border-r border-indigo-300" >{{$ressortissant->dernier_contrat_adh}}/{{$ressortissant->date_debut_adh->date_debut}}</td>
            @else
              <td  class="p-2 border-r border-indigo-300 text-center" >--</td>
            @endif
            <td  class="p-2 border-r border-indigo-300" >{{$ressortissant->activite}}</td>
            <td class="p-2 border-r border-indigo-300 text-center" ><a href="ressortissant/{{$ressortissant->res_id}}"><i class="fa-solid fa-file-lines fa-lg" style="color: blue"></i></a></td>

            <td class="p-2 border-r border-indigo-300 text-center" ><a href="{{route('ressortissant.edit', $ressortissant->res_id)}}"><i class="fa-solid fa-file-pen fa-lg" style="color: green"></i></a></td>
            @if (Auth::user()->admin === 1)
            <th class="p-2 border-r border-indigo-300" >
              <form action="{{route('ressortissant.destroy', $ressortissant->res_id)}}" method="POST"   onsubmit="delete_form(event, 'ressortissant')">
              @csrf
              @method('DELETE')
              <button type="submit" ><i class="fa-solid fa-trash-can" style="color: red"></i></button>
              </form>
            </th>
            @endif
        </tr>
        @endforeach
    </tbody>
  </table>



@endsection