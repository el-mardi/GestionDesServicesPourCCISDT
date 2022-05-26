@extends('dashboard')

@section('dashboard')
    
<a href="{{route('partenaires.create')}}" class="block p-2 bg-green-400 w-fit hover:cursor-pointer hover:bg-green-500 text-stone-700 hover:text-stone-900 mx-auto mr-6">Ajouter des partenaires</a>
<table class="border-collapse  text-sm mt-5 mx-auto">
    <thead class="bg-blue-300">
      <tr class="">
        <th class="p-2 border border-indigo-300" >Partenaires</th>
        
        <th class="p-2 border border-indigo-300" >Consulter les intervenants</th>
        <th class="p-2 border border-indigo-300" >Modifer</th>
        @if (Auth::user()->admin === 1)
        <th class="p-2 border border-indigo-300" >Supprimer</th>
        @endif
      </tr>
    </thead>
    <tbody>

        @foreach ($partenaires as $partenaire)
        <tr class="odd:bg-blue-50 even:bg-blue-100">
            <td  class="p-2 border border-indigo-300" >{{$partenaire->partenaire}}</td>
            
            <td class="p-2 border border-indigo-300 text-center" ><a href="partenaires/{{$partenaire->part_id}}"><i class="fa-solid fa-file-lines fa-lg" style="color: blue"></i></a></td>
            <td class="p-2 border border-indigo-300 text-center" ><a href="{{route('partenaires.edit', $partenaire->part_id)}}"><i class="fa-solid fa-file-pen fa-lg" style="color: green"></i></a></td>
            @if (Auth::user()->admin === 1)
            <th class="p-2 border border-indigo-300" >
              <form action="{{route('partenaires.destroy',$partenaire->part_id)}}" method="POST"   onsubmit="delete_form(event, 'partenaire')">
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
