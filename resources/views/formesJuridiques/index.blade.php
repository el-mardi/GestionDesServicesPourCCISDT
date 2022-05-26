@extends('dashboard')

@section('dashboard')
    
<a href="{{route('formesJuridiques.create')}}" class="block p-2 bg-green-400 w-fit hover:cursor-pointer hover:bg-green-500 text-stone-700 hover:text-stone-900 mx-auto mr-6">Ajouter des forme juridiques</a>
<table class="border-collapse  text-sm mt-5 mx-auto">
    <thead class="bg-blue-300">
      <tr class="">
        <th class="p-2 border border-indigo-300" >Le nom de forme juridique</th>
        <th class="p-2 border border-indigo-300" >Code de forme</th>

        
        {{-- <th class="p-2 border border-indigo-300" >Consulter</th> --}}
        <th class="p-2 border border-indigo-300" >Modifer</th>
        @if (Auth::user()->admin === 1)
        <th class="p-2 border border-indigo-300" >Supprimer</th>
        @endif
      </tr>
    </thead>
    <tbody>

        @foreach ($formes as $forme)
        <tr class="odd:bg-blue-50 even:bg-blue-100">
            <td  class="p-2 border border-indigo-300" >{{$forme->formeJur}}</td>
            <td  class="p-2 border border-indigo-300" >{{$forme->code_forme}}</td>

            {{-- <td class="p-2 border border-indigo-300 text-center" ><a href="formesJuridiques/{{$forme->formeJur_id}}"><i class="fa-solid fa-file-lines fa-lg" style="color: blue"></i></a></td> --}}
            
            <td class="p-2 border border-indigo-300 text-center" ><a href="{{route('formesJuridiques.edit', $forme->formeJur_id)}}"><i class="fa-solid fa-file-pen fa-lg" style="color: green"></i></a></td>
            @if (Auth::user()->admin === 1)
            <th class="p-2 border border-indigo-300" >
              <form action="{{route('formesJuridiques.destroy',$forme->formeJur_id)}}" method="POST"  onsubmit="delete_form(event, 'formeJuridique')">
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
