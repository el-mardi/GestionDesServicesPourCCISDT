@extends('dashboard')

@section('dashboard')
    
<a href="{{route('activites.create')}}" class="block p-2 bg-green-400 w-fit hover:cursor-pointer hover:bg-green-500 text-stone-700 hover:text-stone-900 mx-auto mr-6">Ajouter des activites</a>
<table class="border-collapse  text-sm mt-5 mx-auto">
    <thead class="bg-blue-300">
      <tr class="">
        <th class="p-2 border border-indigo-300" >Le nom du domaine</th>
        <th class="p-2 border border-indigo-300" >Le Secteur</th>

        
        {{-- <th class="p-2 border border-indigo-300" >Consulter</th> --}}
        <th class="p-2 border border-indigo-300" >Modifer</th>
        @if (Auth::user()->admin === 1)
        <th class="p-2 border border-indigo-300" >Supprimer</th>
        @endif
      </tr>
    </thead>
    <tbody>

        @foreach ($activites as $activite)
        <tr class="odd:bg-blue-50 even:bg-blue-100">
            <td  class="p-2 border border-indigo-300" >{{$activite->activite}}</td>
            <td  class="p-2 border border-indigo-300" >{{$activite->secteur->secteur}}</td>

            {{-- <td class="p-2 border border-indigo-300 text-center" ><a href="formesJuridiques/{{$activite->dom_id}}"><i class="fa-solid fa-file-lines fa-lg" style="color: blue"></i></a></td> --}}
            
            <td class="p-2 border border-indigo-300 text-center" ><a href="{{route('activites.edit', $activite->act_id)}}"><i class="fa-solid fa-file-pen fa-lg" style="color: green"></i></a></td>
            @if (Auth::user()->admin === 1)
            <th class="p-2 border border-indigo-300" ><i class="fa-solid fa-trash-can" style="color: red"></i></th>
            @endif
        </tr>
        @endforeach
      
      
    </tbody>
  </table>
@endsection
