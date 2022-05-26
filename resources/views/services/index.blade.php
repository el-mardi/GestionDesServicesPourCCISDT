@extends('dashboard')

@section('dashboard')
    
<a href="{{route('services.create')}}" class="block p-2 bg-green-400 w-fit hover:cursor-pointer hover:bg-green-500 text-stone-700 hover:text-stone-900 mx-auto mr-6">Ajouter des actions</a>
<table class="border-collapse  text-sm mt-5 mx-auto">
    <thead class="bg-blue-300">
      <tr class="">
        <th class="p-2 border border-indigo-300" >Type</th>
        <th class="p-2 border border-indigo-300" >Le nom de service</th>
        <th class="p-2 border border-indigo-300" >Code de service</th>
        <th class="p-2 border border-indigo-300" >Tarif</th>
        <th class="p-2 border border-indigo-300" >Etat</th>
        <th class="p-2 border border-indigo-300" >Résponsable</th>

        
        <th class="p-2 border border-indigo-300" >Consulter</th>
        <th class="p-2 border border-indigo-300" >Modifer</th>
        @if (Auth::user()->admin === 1)
        <th class="p-2 border border-indigo-300" >Supprimer</th>
        @endif
      </tr>
    </thead>
    <tbody>

        @foreach ($services as $service)
        <tr class="odd:bg-blue-50 even:bg-blue-100">
            <td  class="p-2 border border-indigo-300" >{{$service->typesIntervention->type}}</td>
            <td  class="p-2 border border-indigo-300" >{{$service->service}}</td>
            <td  class="p-2 border border-indigo-300" >{{$service->code_service}}</td>
            <td  class="p-2 border border-indigo-300" >{{$service->tarif}}</td>
            <td  class="p-2 border border-indigo-300" >
                @if ($service->etat_service == 1)
                    Activé
                @else
                    Disactivé
                @endif
            </td>
            <td  class="p-2 border border-indigo-300" >
              @isset($service->fonctionnaire)
              {{$service->fonctionnaire->nom }} {{$service->fonctionnaire->prenom}}</td>
              @endisset

            <td class="p-2 border border-indigo-300 text-center" ><a href="services/{{$service->service_id}}"><i class="fa-solid fa-file-lines fa-lg" style="color: blue"></i></a></td>
            <td class="p-2 border border-indigo-300 text-center" ><a href="{{route('services.edit', $service->service_id)}}"><i class="fa-solid fa-file-pen fa-lg" style="color: green"></i></a></td>
            @if (Auth::user()->admin === 1)
            <th class="p-2 border border-indigo-300" >
              <form action="{{route('services.destroy',$service->service_id)}}" method="POST"   onsubmit="delete_form(event, 'service')">
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
