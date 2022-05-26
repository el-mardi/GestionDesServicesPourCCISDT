@extends('dashboard')

@section('dashboard')
    
<a href="{{route('services.create')}}" class=" p-2 bg-indigo-200 rounded-md shadow-lg w-fit hover:cursor-pointer hover:bg-indigo-300">Ajouter des services</a>
<table class="border-collapse text-sm mt-5 ml-0 text-left w-full">

        <tr class="border border-slate-300"> 
            <th class="p-3 border" >Le nom de service : {{$service->service}} </th>
            <th class="p-3 border" >Résponsable de service : {{$service->fonctionnaire->nom}}  {{$service->fonctionnaire->prenom}} </th>
        </tr>    
        <tr class="border border-slate-300"> 
            <th class="p-3 border" >Code de service : {{$service->code_service}} </th>
            <th class="p-3 border" >Description : {{$service->description}} </th>
        </tr>   
        <tr class="border border-slate-300"> 
            <th class="p-3 border" >periodicite : {{$service->periodicite}} </th>
            <th class="p-3 border" >Public cible : {{$service->cible}} </th>
        </tr>    
        <tr class="border border-slate-300"> 
            <th class="p-3 border" >Lieu prestation : {{$service->lieu_prestation}} </th>
            <th class="p-3 border" >Tarif : {{$service->tarif}} </th>
        </tr>    
        <tr class="border border-slate-300"> 
            <th class="p-3 border" >Type de service : {{$service->typesIntervention->type}} </th>
            <th class="p-3 border" >Etat de service : 
                @if ($service->etat_service == 1)
                    Activé
                @else
                    Disactivé
                @endif    
                </th>
        </tr>   
        <tr class="border border-slate-300"> 
            <th class="p-3 border" >Ressource de service : {{$service->ressource_service}} </th>
            <th class="p-3 border" >Motif état service : {{$service->motif_etat_service}} </th>
        </tr>   
        <tr class="border border-slate-300"> 
            <th class="p-3 border" >Documentation : {{$service->documentation}} </th>
            <th class="p-3 border" >Action de communication : {{$service->action_communication}} </th>
        </tr>   
        <tr class="border border-slate-300"> 
            <th class="p-3 border" >Remarque : {{$service->remarque}} </th>
        </tr>   
       
  </table>

<span class="block my-5 px-3 pt-3 text-lg border-b-2 text-pink-500 w-fit">Liste des interveneants de ce service:</span>

  <table class="border-collapse text-sm mt-5 ml-0 text-left w-full">
      <thead class="bg-pink-300">
          <th class="p-2 border border-pink-300" >Les intervenants</th>
          <th class="p-2 border border-pink-300" >Le status</th>
          <th class="p-2 border border-pink-300" >Remarque</th>
      </thead>
      <tbody>
          @foreach ($service->servicesIntervenants as $item)
              <tr  class="odd:bg-pink-50 even:bg-pink-100 border">
                  <td  class="p-2 border border-pink-300" >{{ $item->intervenant }}</td>
                  <td  class="p-2 border border-pink-300"   class="p-2 border border-pink-300" >
                    @if ($item->pivot->satut == 1)
                        Activé
                    @else
                        désactivé
                    @endif
                  </td>
                  <td  class="p-2 border border-pink-300" >{{ $item->pivot->remarque }}</td>
              </tr>
          @endforeach
      </tbody>
  </table>
@endsection
