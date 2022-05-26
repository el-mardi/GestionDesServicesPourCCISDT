@extends('dashboard')

@section('dashboard')
    
<a href="{{route('domaines.create')}}" class="block p-2 bg-green-400 w-fit hover:cursor-pointer hover:bg-green-500 text-stone-700 hover:text-stone-900 mx-auto mr-6">Ajouter des domaines</a>
<table class="border-collapse  text-sm mt-5 mx-auto">
    <thead class="bg-blue-300">
      <tr class="">
        <th class="p-2 border border-indigo-300" >Le nom du domaine</th>
        <th class="p-2 border border-indigo-300" >Le secteur</th>

        
        {{-- <th class="p-2 border border-indigo-300" >Consulter</th> --}}
        <th class="p-2 border border-indigo-300" >Modifer</th>
        @if (Auth::user()->admin === 1)
        <th class="p-2 border border-indigo-300" >Supprimer</th>
        @endif
      </tr>
    </thead>
    <tbody>

        @foreach ($domaines as $domaine)
        <tr class="odd:bg-blue-50 even:bg-blue-100">
            <td  class="p-2 border border-indigo-300" >{{$domaine->domaine}}</td>
            <td  class="p-2 border border-indigo-300" >{{$domaine->secteur->secteur}}</td>

            {{-- <td class="p-2 border border-indigo-300 text-center" ><a href="formesJuridiques/{{$domaine->dom_id}}"><i class="fa-solid fa-file-lines fa-lg" style="color: blue"></i></a></td> --}}
            
            <td class="p-2 border border-indigo-300 text-center" ><a href="{{route('domaines.edit', $domaine->dom_id)}}"><i class="fa-solid fa-file-pen fa-lg" style="color: green"></i></a></td>
            @if (Auth::user()->admin === 1)
            <td class="p-2 border border-indigo-300 text-center">
            <form action="{{route('domaines.destroy',$domaine->dom_id)}}" method="POST"   onsubmit="delete_form(event, 'domaine')">
              @csrf
              @method('DELETE')
              <button type="submit" ><i class="fa-solid fa-trash-can" style="color: red"></i></button>
              </form>
            @endif
          </td>

        </tr>
        @endforeach
      
    </tbody>
  </table>
@endsection
