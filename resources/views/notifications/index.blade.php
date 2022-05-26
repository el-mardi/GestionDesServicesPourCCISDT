<x-app-layout>  

<div class="w-full p-3 mt-8 mx-auto border-b-2">
  <div id="N_acc" class="TheActiveLink inline hover:cursor-pointer hover:border-b-2 hover:border-b-zinc-400 mx-5 p-3 text-indigo-600 hover:text-indigo-600"> LES CONTRATS D'ACCOMPAGENEMENT</div>
  <div id="N_or" class="TheActiveLink inline hover:cursor-pointer hover:border-b-2 hover:border-b-zinc-400 mx-5 p-3  hover:text-indigo-600"> LES ORIENTATIONS</div>
  <div id="N_doc" class="TheActiveLink inline hover:cursor-pointer hover:border-b-2 hover:border-b-zinc-400 mx-5 p-3  hover:text-indigo-600"> DELIVRENCES DES DOCUMENTS</div>
  <div id="N_adh" class="TheActiveLink inline hover:cursor-pointer hover:border-b-2 hover:border-b-zinc-400 mx-5 p-3  hover:text-indigo-600"> LES CONTRATS D'ADHESIONS</div>
</div>
  
<table class=" text-sm mx-5 my-8 mx-auto">
    <thead class="p-2 bg-slate-500">
        <tr class="">
          <th class="p-2" id="c_adh" >N de contrat d'accompagnement</th> 
          <th class="p-2" id="N_recu" style="display: none">N du récu</th> 
          <th class="p-2" >Date du début</th> 
          <th class="p-2" >Date de la fin</th> 
          <th class="p-2" >Province</th> 
          <th class="p-2" >Durée</th> 
          <th class="p-2" >Cin du ressortissant</th> 
          <th class="p-2" >Cin du présentant</th> 
          <th class="p-2" >Nom et Prénom du fonctionnaire</th> 
          <th class="p-2" >CIN</th> 
          <th class="p-2" >Administration</th> 
        </tr>
    </thead>
    
    <tbody id="show_N_acc" style="display: table-row-group">
      @foreach ($accompagnements as $accompagnement)
      <tr class="even:bg-slate-200 ">
        <td class="p-2">{{$accompagnement->num_contrat_accom}}/{{$accompagnement->date_debut}}</td>
        <td class="p-2">{{$accompagnement->date_debut}}</td>
        <td class="p-2">{{$accompagnement->date_fin}}</td>
        <td class="p-2">{{$accompagnement->province}}</td>
        <td class="p-2">{{$accompagnement->duree}}</td>
        <td class="p-2">{{$accompagnement->ressortissant->cin}}</td>
        <td class="p-2">
          @isset($accompagnement->representant)
          {{$accompagnement->representant->cin}}
          @endisset
        </td>
        {{-- <td class="p-2">{{$accompagnement->}}</td> --}}

          <td class="p-2">{{$accompagnement->fonctionnaire->nom}} {{$accompagnement->fonctionnaire->prenom}}</td>
          <td class="p-2">{{$accompagnement->fonctionnaire->cin}}</td>
          <td class="p-2">
              @if ($accompagnement->fonctionnaire->admin == 1)
                  Administrateur
              @else
                  N'est pas administrateur
              @endif
          </td>
      </tr>
      @endforeach
    </tbody>

    <tbody id="show_N_or" style="display: none;">
      @foreach ($orientations as $orientation)
      <tr class="even:bg-slate-200">
        <td class="p-2 text-center">------</td>
        <td class="p-2">{{$orientation->date_debut}}</td>
        <td class="p-2">{{$orientation->date_fin}}</td>
        <td class="p-2">{{$orientation->province}}</td>
        <td class="p-2">{{$orientation->duree}}</td>
        <td class="p-2">{{$orientation->ressortissant->cin}}</td>
        <td class="p-2">
          @isset($orientation->representant)
          {{$orientation->representant->cin}}
          @endisset
        </td>
        {{-- <td class="p-2">{{$orientation->}}</td> --}}

          <td class="p-2">{{$orientation->fonctionnaire->nom}} {{$orientation->fonctionnaire->prenom}}</td>
          <td class="p-2">{{$orientation->fonctionnaire->cin}}</td>
          <td class="p-2">
              @if ($orientation->fonctionnaire->admin == 1)
                  Administrateur
              @else
                  N'est pas administrateur
              @endif
          </td>
      </tr>
      @endforeach
    </tbody>

    <tbody id="show_N_doc" style="display: none;">
      @foreach ($documents as $document)
      <tr class="even:bg-slate-200">
        <td class="p-2 text-center">------</td>
        <td class="p-2">{{$document->date_debut}}</td>
        <td class="p-2">{{$document->date_fin}}</td>
        <td class="p-2">{{$document->province}}</td>
        <td class="p-2">{{$document->duree}}</td>
        <td class="p-2">{{$document->ressortissant->cin}}</td>
        <td class="p-2">
          @isset($document->representant)
          {{$document->representant->cin}}
          @endisset
        </td>
        {{-- <td class="p-2">{{$document->}}</td> --}}

          <td class="p-2">{{$document->fonctionnaire->nom}} {{$document->fonctionnaire->prenom}}</td>
          <td class="p-2">{{$document->fonctionnaire->cin}}</td>
          <td class="p-2">
              @if ($document->fonctionnaire->admin == 1)
                  Administrateur
              @else
                  N'est pas administrateur
              @endif
          </td>
      </tr>
      @endforeach
    </tbody>

    <tbody id="show_N_adh" style="display: none;">
      @foreach ($adhesions as $adhesion)
      <tr class="even:bg-slate-200">
        <td class="p-2">{{$adhesion->num_contrat_adh}}/{{$adhesion->date_debut}}</td>
        <td class="p-2">{{$adhesion->num_recu}}</td>
        <td class="p-2">{{$adhesion->date_debut}}</td>
        <td class="p-2">{{$adhesion->date_fin}}</td>
        <td class="p-2">{{$adhesion->province}}</td>
        <td class="p-2">{{$adhesion->duree}}</td>
        <td class="p-2">{{$adhesion->ressortissant->cin}}</td>
        <td class="p-2">
          @isset($adhesion->representant)
          {{$adhesion->representant->cin}}
          @endisset
        </td>
        {{-- <td class="p-2">{{$adhesion->}}</td> --}}

          <td class="p-2">{{$adhesion->fonctionnaire->nom}} {{$adhesion->fonctionnaire->prenom}}</td>
          <td class="p-2">{{$adhesion->fonctionnaire->cin}}</td>
          <td class="p-2">
              @if ($adhesion->fonctionnaire->admin == 1)
                  Administrateur
              @else
                  N'est pas administrateur
              @endif
          </td>
      </tr>
      @endforeach
    </tbody>
</table>

</x-app-layout>
