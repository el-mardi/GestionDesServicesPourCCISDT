@extends('dashboard')

@section('dashboard')
    
<a href="{{route('services.create')}}" class=" p-2 bg-indigo-200 rounded-md shadow-lg w-fit hover:cursor-pointer hover:bg-indigo-300">Ajouter des services</a>
<table class="border-collapse text-sm mt-5 mx-auto">
    <thead class="bg-green-300">
      <tr class="">
        <th class="p-2 border border-green-300" >Le nom de service</th>
        <th class="p-2 border border-green-300" >Code de service</th>
        <th class="p-2 border border-green-300" >Tarif</th>
        <th class="p-2 border border-green-300" >Etat</th>
        <th class="p-2 border border-green-300" >Résponsable</th>

        
        <th class="p-2 border border-green-300" >Consulter</th>
        <th class="p-2 border border-green-300" >Modifer</th>
        @if (Auth::user()->admin === 1)
        <th class="p-2 border border-green-300" >Supprimer</th>
        @endif
      </tr>
    </thead>
    <tbody>

        @foreach ($services as $service)
        <tr class="odd:bg-green-50 even:bg-green-100 border">
            <td  class="p-2 border border-green-300" >{{$service->service}}</td>
            <td  class="p-2 border border-green-300" >{{$service->code_service}}</td>
            <td  class="p-2 border border-green-300" >{{$service->tarif}}</td>
            <td  class="p-2 border border-green-300" >
                @if ($service->etat_service == 1)
                    Activé
                @else
                    Disactivé
                @endif
            </td>
            <td  class="p-2 border border-green-300" >{{$service->fonctionnaire->nom }} {{$service->fonctionnaire->prenom}}</td>

            <td class="p-2 border border-green-300 text-center" ><a href="/dashboard/services/{{$service->service_id}}"><i class="fa-solid fa-file-lines fa-lg" style="color: blue"></i></a></td>
            <td class="p-2 border border-green-300 text-center" ><a href="/dashboard/services/{{$service->service_id}}/edit"><i class="fa-solid fa-file-pen fa-lg" style="color: green"></i></a></td>
            @if (Auth::user()->admin === 1)
            <th class="p-2 border border-green-300" ><i class="fa-solid fa-trash-can" style="color: red"></i></th>
            @endif
        </tr>
        @endforeach
      
      
    </tbody>
  </table>
@endsection
