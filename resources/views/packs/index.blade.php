@extends('dashboard')

@section('dashboard')
    
<a href="{{route('packs.create')}}" class="block p-2 bg-green-400 w-fit hover:cursor-pointer hover:bg-green-500 text-stone-700 hover:text-stone-900 mx-auto mr-6">Ajouter des packs</a>

@foreach ($packs as $pack)
<div class="border border-slate-500 rounded w-fit p-5 m-auto mb-5">

<table class="border-collapse  text-sm mt-2 mx-auto">
    <thead class="bg-blue-300">
      <tr class="">
        <th class="p-3 border border-indigo-300" > Nom </th>
        <th class="p-3 border border-indigo-300" > Code </th>
        <th class="p-3 border border-indigo-300" > Tarif </th>
        <th class="p-3 border border-indigo-300" > Statut </th>

        
        {{-- <th class="p-3 border border-indigo-300" >Consulter</th> --}}
        <th class="p-3 border border-indigo-300" >Modifer</th>
        @if (Auth::user()->admin === 1)
        <th class="p-3 border border-indigo-300" >Supprimer</th>
        @endif
      </tr>
    </thead>
    <tbody>

        <tr class="odd:bg-blue-50 even:bg-blue-100">
            <td  class="p-3 border border-indigo-300" >{{$pack->nom_pack}}</td>
            <td  class="p-3 border border-indigo-300" >{{$pack->code_pack}}</td>
            <td  class="p-3 border border-indigo-300" >{{$pack->pack_tarif}}</td>
            <td  class="p-3 border border-indigo-300" >
              @if ($pack->status)
                Activé
                @else 
                Désactivé
              @endif
            </td>

            {{-- <td class="p-3 border border-indigo-300 text-center" ><a href="formesJuridiques/{{$pack->dom_id}}"><i class="fa-solid fa-file-lines fa-lg" style="color: blue"></i></a></td> --}}
            
            <td class="p-3 border border-indigo-300 text-center" ><a href="{{route('packs.edit', $pack->pack_id)}}"><i class="fa-solid fa-file-pen fa-lg" style="color: green"></i></a></td>
            @if (Auth::user()->admin === 1)
            <th class="p-3 border border-indigo-300" ><i class="fa-solid fa-trash-can" style="color: red"></i></th>
            @endif
        </tr>
        
      </tbody>
    </table>

    <table class="border-collapse  text-sm mt-3 mx-auto">
      <thead>
        <tr>
          <th  class="p-3 border border-indigo-300">Service</th>
          <th  class="p-3 border border-indigo-300">Code du service</th>
        </tr>
      </thead>
      <tbody>
        <tr  class="odd:bg-blue-50 even:bg-blue-100">
          @foreach ($pack->services as $service)
              <td class="p-3 border border-indigo-300">{{ $service->service }} </td>
              <td class="p-3 border border-indigo-300">{{ $service->code_service }} </td>
          @endforeach
        </tr>
      </tbody>
    </table>
</div>

    @endforeach
  
@endsection
