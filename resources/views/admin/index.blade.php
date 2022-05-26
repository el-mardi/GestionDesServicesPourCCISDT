@extends('dashboard')

@section('dashboard')
    
<a href="{{route('register')}}" class="block p-2 bg-green-400 w-fit hover:cursor-pointer hover:bg-green-500 text-stone-700 hover:text-stone-900 mx-auto mr-6">Ajouter des fonctionnaires</a>

<table class="border-collapse  text-sm mt-5 mx-auto">
    <thead class="bg-lime-300">
      <tr class="">
        <th class="p-2 border border-indigo-300" >Username</th>
        <th class="p-2 border border-indigo-300" >Nom et Prénom</th>
        <th class="p-2 border border-indigo-300" >CIN</th>
        <th class="p-2 border border-indigo-300" >Sexe</th>
        <th class="p-2 border border-indigo-300" >Administration</th>

        
        <th class="p-2 border border-indigo-300" >Consulter</th>
        <th class="p-2 border border-indigo-300" >Modifer</th>
        @if (Auth::user()->admin === 1)
        <th class="p-2 border border-indigo-300" >Supprimer</th>
        @endif
      </tr>
    </thead>
    <tbody>

        @foreach ($fonctionnaires as $fonctionnaire)
        <tr class="odd:bg-lime-50 even:bg-lime-100">
            <td  class="p-2 border border-indigo-300" > {{$fonctionnaire->username[0]}}{{$fonctionnaire->username[1]}}*******</td>
            <td  class="p-2 border border-indigo-300" >{{$fonctionnaire->nom}} {{$fonctionnaire->prenom}}</td>
            <td  class="p-2 border border-indigo-300" >{{$fonctionnaire->cin}}</td>
            <td  class="p-2 border border-indigo-300" >{{$fonctionnaire->sexe}}</td>
            <td  class="p-2 border border-indigo-300" >
                @if ($fonctionnaire->admin == 1)
                    Administrateur
                @else
                    ---------------
                @endif
            </td>

            <td class="p-2 border border-indigo-300 text-center" ><a href="administation/{{$fonctionnaire->fonc_id}}"><i class="fa-solid fa-file-lines fa-lg" style="color: blue"></i></a></td>
            
            <td class="p-2 border border-indigo-300 text-center" ><a href="{{route('administation.edit', $fonctionnaire->fonc_id)}}"><i class="fa-solid fa-file-pen fa-lg" style="color: green"></i></a></td>
            @if (Auth::user()->admin === 1)
            <td class="p-2 border border-indigo-300 text-center">
            <form action="{{route('administation.destroy',$fonctionnaire->fonc_id)}}" method="POST"   onsubmit="delete_form(event, 'fonctionnaire')">
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
