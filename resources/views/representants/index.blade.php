@extends('dashboard')

@section('dashboard')

<a href="{{route('representants.create')}}" class="block p-2 bg-green-400 w-fit hover:cursor-pointer hover:bg-green-500 text-stone-700 hover:text-stone-900 mx-auto mr-6">Ajouter des representants</a>
<table class="border-collapse text-sm mt-5">
    <thead class="bg-blue-300">
      <tr class="">
        <th class="p-1 border border-indigo-300" >Nom et Prénom</th>
        <th class="p-1 border border-indigo-300" >CIN</th>
        <th class="p-1 border border-indigo-300" >Qualité</th>
        <th class="p-1 border border-indigo-300" >Sexe</th>
        <th class="p-1 border border-indigo-300" >Nationalité</th>
        <th class="p-1 border border-indigo-300" >Tél</th>
        <th class="p-1 border border-indigo-300" >mail</th>
        <th class="p-1 border border-indigo-300" >Adresse</th>
        <th class="p-1 border border-indigo-300" >Consulter</th>
        <th class="p-1 border border-indigo-300" >Modifer</th>
        @if (Auth::user()->admin === 1)
        <th class="p-1 border border-indigo-300" >Supprimer</th>
        @endif
      </tr>
    </thead>
    <tbody>

        @foreach ($representants as $representant)
        <tr class="odd:bg-blue-50 even:bg-blue-100">
            <td  class="p-1 border border-indigo-300" >{{$representant->nom}} {{$representant->prenom}}</td>
            <td  class="p-1 border border-indigo-300" >{{$representant->cin}}</td>
            <td  class="p-1 border border-indigo-300" >{{$representant->qualite->qualite}}</td>
            <td  class="p-1 border border-indigo-300" >{{$representant->sexe}}</td>
            <td  class="p-1 border border-indigo-300" >{{$representant->nationalite}}</td>
            <td  class="p-1 border border-indigo-300" >{{$representant->tel}}</td>
            <td  class="p-1 border border-indigo-300" >{{$representant->mail}}</td>
            <td  class="p-1 border border-indigo-300" >{{$representant->adresse}}</td>
            <td class="p-1 border border-indigo-300 text-center" ><a href="representants/{{$representant->rep_id}}"><i class="fa-solid fa-file-lines fa-lg" style="color: blue"></i></a></td>

            <td class="p-1 border border-indigo-300 text-center" ><a href="{{route('representants.edit', $representant->rep_id)}}"><i class="fa-solid fa-file-pen fa-lg" style="color: green"></i></a></td>
            @if (Auth::user()->admin === 1)
            <th class="p-1 border border-indigo-300" >
              <form action="{{route('representants.destroy',$representant->rep_id)}}" method="POST"   onsubmit="delete_form(event, 'representant')">
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