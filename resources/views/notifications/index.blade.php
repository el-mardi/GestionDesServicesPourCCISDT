<x-app-layout>  

<div class="w-full p-3 mt-8 mx-auto border-b-2">
  <div id="N_acc" class="TheActiveLink inline hover:cursor-pointer hover:border-b-2 hover:border-b-zinc-400 mx-5 p-3 text-indigo-600 hover:text-indigo-600"> LES CONTRATS D'ACCOMPAGENEMENT</div>
  <div id="N_or" class="TheActiveLink inline hover:cursor-pointer hover:border-b-2 hover:border-b-zinc-400 mx-5 p-3  hover:text-indigo-600"> LES ORIENTATIONS</div>
  <div id="N_doc" class="TheActiveLink inline hover:cursor-pointer hover:border-b-2 hover:border-b-zinc-400 mx-5 p-3  hover:text-indigo-600"> DELIVRENCES DES DOCUMENTS</div>
  <div id="N_adh" class="TheActiveLink inline hover:cursor-pointer hover:border-b-2 hover:border-b-zinc-400 mx-5 p-3  hover:text-indigo-600"> LES CONTRATS D'ADHESIONS</div>
</div>
  
<table class=" text-sm mx-5 my-10">
    <thead class="p-2 text-center bg-slate-500">
        <tr class="">
          <th class="p-2 text-center" id="c_adh" >N de contrat d'accompagnement</th> 
          <th class="p-2 text-center" id="N_recu" style="display: none">N du récu</th> 
          <th class="p-2 text-center" >Date du début</th> 
          <th class="p-2 text-center" >Date de la fin</th> 
          <th class="p-2 text-center" >Province</th> 
          <th class="p-2 text-center" >Durée (Min) </th> 
          <th class="p-2 text-center" >Cin du ressortissant</th> 
          <th class="p-2 text-center" >Cin du présentant</th> 
          <th class="p-2 text-center" >Nom et Prénom du fonctionnaire</th> 
          <th class="p-2 text-center" >CIN</th> 
          <th class="p-2 text-center" >Administration</th> 
        </tr>
    </thead>
    
    <tbody id="show_N_acc" style="display: table-row-group">
      @foreach ($accompagnements as $accompagnement)
      <tr class="even:bg-slate-200 ">
        <td class="p-2 text-center">{{$accompagnement->num_contrat_accom}}/{{date('Y', strtotime($accompagnement->date_debut))}}</td>
        <td class="p-2 text-center">{{$accompagnement->date_debut}}</td>
        <td class="p-1 m-1 text-center">{{$accompagnement->date_fin}}</td>
        <td class="p-2 text-center">{{$accompagnement->province}}</td>
        <td class="p-2 text-center">
          @if (empty($accompagnement->duree))
              ----
          @else
          {{$accompagnement->duree}}</td>
              
          @endif
        <td class="p-2 text-center">{{$accompagnement->ressortissant->cin}}</td>
        <td class="p-2 text-center">
          @isset($accompagnement->representant)
          {{$accompagnement->representant->cin}}
          @endisset
        </td>
        {{-- <td class="p-2 text-center">{{$accompagnement->}}</td> --}}

          <td class="p-2 text-center">{{$accompagnement->fonctionnaire->nom}} {{$accompagnement->fonctionnaire->prenom}}</td>
          <td class="p-2 text-center">{{$accompagnement->fonctionnaire->cin}}</td>
          <td class="p-2 text-center">
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
        <td class="p-2 text-center">{{$orientation->date_debut}}</td>
        <td class="p-2 text-center">-----</td>
        <td class="p-2 text-center">{{$orientation->province}}</td>
        <td class="p-2 text-center">{{$orientation->duree}}</td>
        <td class="p-2 text-center">{{$orientation->ressortissant->cin}}</td>
        <td class="p-2 text-center">
          @isset($orientation->representant)
          {{$orientation->representant->cin}}
          @endisset
        </td>
        {{-- <td class="p-2 text-center">{{$orientation->}}</td> --}}

          <td class="p-2 text-center">{{$orientation->fonctionnaire->nom}} {{$orientation->fonctionnaire->prenom}}</td>
          <td class="p-2 text-center">{{$orientation->fonctionnaire->cin}}</td>
          <td class="p-2 text-center">
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
        <td class="p-2 text-center text-center">------</td>
        <td class="p-2 text-center">{{$document->date_debut}}</td>
        <td class="p-2 text-center">{{$document->date_fin}}</td>
        <td class="p-2 text-center">{{$document->province}}</td>
        <td class="p-2 text-center">{{$document->duree}}</td>
        <td class="p-2 text-center">{{$document->ressortissant->cin}}</td>
        <td class="p-2 text-center">
          @isset($document->representant)
          {{$document->representant->cin}}
          @endisset
        </td>
        {{-- <td class="p-2 text-center">{{$document->}}</td> --}}

          <td class="p-2 text-center">{{$document->fonctionnaire->nom}} {{$document->fonctionnaire->prenom}}</td>
          <td class="p-2 text-center">{{$document->fonctionnaire->cin}}</td>
          <td class="p-2 text-center">
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
        <td class="p-2 text-center">{{$adhesion->num_contrat_adh}}/{{date('Y', strtotime($adhesion->date_debut))}}</td>
        <td class="p-2 text-center">{{$adhesion->num_recu}}</td>
        <td class="p-2 text-center">{{$adhesion->date_debut}}</td>
        <td class="p-2 text-center">{{$adhesion->date_fin}}</td>
        <td class="p-2 text-center">{{$adhesion->province}}</td>
        <td class="p-2 text-center">{{$adhesion->duree}}</td>
        <td class="p-2 text-center">{{$adhesion->ressortissant->cin}}</td>
        <td class="p-2 text-center">
          @isset($adhesion->representant)
          {{$adhesion->representant->cin}}
          @endisset
        </td>
        {{-- <td class="p-2 text-center">{{$adhesion->}}</td> --}}

          <td class="p-2 text-center">{{$adhesion->fonctionnaire->nom}} {{$adhesion->fonctionnaire->prenom}}</td>
          <td class="p-2 text-center">{{$adhesion->fonctionnaire->cin}}</td>
          <td class="p-2 text-center">
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
