@extends('dashboard')

@section('dashboard')
    
<a href="{{route('secteurs.create')}}" class="block p-2 bg-green-400 w-fit hover:cursor-pointer hover:bg-green-500 text-stone-700 hover:text-stone-900 mx-auto mr-6">Ajouter un secteur</a>

@foreach ($secteurs as $secteur)
<div class="p-2 my-3 border-2 rounded-lg border-slate-400 overflow-x-auto">
  
<table class="border-separate border border-indigo-400 text-sm mt-5 mx-auto">
    <thead class="p-2 border border-indigo-400">
        <tr class="">
          <th class="p-2 border border-r border-indigo-400" >Le secteur</th> 
          <td class="border border-indigo-400">{{$secteur['secteur']->secteur}}</td>
        </tr>

        <tr class="">
          <th class="p-2 border border-r border-indigo-400" >Les domaines du secteur</th>    
          @foreach ($secteur['domaine'] as $domaine)
            @isset($domaine)
              <td  class="p-1 border border-indigo-400" >{{$domaine->domaine}}</td>
            @endisset
          @endforeach
        </tr>

        <tr class="">
          <th class="p-2 border border-r border-indigo-400" >Les activités du secteur</th>
            @foreach ($secteur['activite'] as $activite)
              @isset($activite)
                  <td  class="p-1 border border-indigo-400" >{{$activite->activite}}</td>
              @endisset
            @endforeach
        </tr>   


    </thead>
  </table>
<div class="text-center mt-2">
  <a href="{{route('secteurs.edit', $secteur['secteur']->sect_id)}} " class="inline-block w-fit mx-auto p-1 border border-indigo-300 bg-indigo-200 hover:cursor-pointer hover:bg-indigo-300">Modifier le secteur</a>
  
  <div class="inline-block w-fit mx-auto p-1 border border-orange-300 bg-orange-200 hover:cursor-pointer hover:bg-orange-300">
    <form action="{{route('secteurs.destroy',$secteur['secteur']->sect_id)}}" method="POST"   onsubmit="delete_form(event, 'secteur')">
      @csrf
      @method('DELETE')
      <button type="submit" >Supprimer le secteur</button>
    </form>
  </div>

  
  <button onclick="showRes({{$secteur['secteur']->sect_id}})" id="btn-{{$secteur['secteur']->sect_id}}" class="block p-2 mt-4 mx-auto border border-slate-300 bg-slate-200 hover:bg-slate-300 hover:shadow-sm ">
   Afficher les Ressortissants
  </button>

</div>

  
  <div id="showRes-{{$secteur['secteur']->sect_id}}" class="hidden">
    <table class="border-separate border border-indigo-400 text-sm mt-1 mx-auto" >
        <thead class="bg-gray-400 text-white">
            <tr class="">
              <th class="p-2 border border-indigo-400" >Nom et Prénom</th>
              <th class="p-2 border border-indigo-400" >Cin</th>
              <th class="p-2 border border-indigo-400" >Numero de fiche</th>
              <th class="p-2 border border-indigo-400" >Résidence</th>
              <th class="p-2 border border-indigo-400" >Tél</th>
              <th class="p-2 border border-indigo-400" >Email</th>
          </tr>
        </thead>
        <tbody class="bg-slate-50">
    
            @foreach ($secteur['ressortissant'] as $ressortissant)
            @isset($ressortissant)
            <tr>
              <td  class="p-1 border border-indigo-400" >{{$ressortissant->nom}} {{$ressortissant->prenom}}</td>
              <td  class="p-1 border border-indigo-400" >{{$ressortissant->cin}}</td>
              <td  class="p-1 border border-indigo-400" >{{$ressortissant->num_fiche}}</td>
              <td  class="p-1 border border-indigo-400" >{{$ressortissant->residence}}</td>
              <td  class="p-1 border border-indigo-400" >{{$ressortissant->tel}}</td>
              <td  class="p-1 border border-indigo-400" >{{$ressortissant->mail}}</td>
              
          </tr>
            @endisset
            
            @endforeach
        </tbody>
      </table>
    
  </div>
  
</div>
@endforeach


<script>
  function showRes (id){
            var btn = document.querySelector('#btn-'+id);
            
            var showRes = document.querySelector('#showRes-'+id);
            if (showRes.classList.contains('hidden')) {
              showRes.classList.remove('class', "hidden");
              btn.innerText = "Masquer les ressortissants"
            } else {
              showRes.classList.add('class', "hidden");
              btn.innerText = "Afficher les ressortissants"
            }
    }
</script>
@endsection
