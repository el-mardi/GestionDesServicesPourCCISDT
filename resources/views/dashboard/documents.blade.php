@extends('dashboard')

@section('dashboard')

<form action="{{route('enregis_documents')}}" method="POST" class="flex-col flex">
    @csrf
    
    
    <label for="documents" class="text-gray-700 mt-5 mb-0">Document: </label>
    <select name="service" id="documents" class="toDisableIt w-9/12  mx-auto block rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 @error('service') border-pink-600  placeholder:text-pink-600 @enderror" value="{{ old('service') }}">

        <option value="">Sélectionner le document</option>
        @foreach ($documents as $document)
        <option value="{{$document->service_id}}">{{$document->service}}</option>
        @endforeach
    </select>
    @if ($errors->has('service'))
    <span class="w-9/12  mx-auto text-pink-600">{{ $errors->first('service') }}</span>
    @endif
    {{-- <table class="border-separate border border-slate-400 w-8/12 mx-auto mt-5">
        <thead>
          <tr>
            <th class="border border-slate-300 ">Service</th>
            <th class="border border-slate-300  w-2/12">Supprimer</th>
          </tr>
        </thead>
        <tbody id="hiddenservices-orientation">
        </tbody>
    </table> --}}

    <label for="ressortissant" class="text-gray-700 mt-5 mb-0">N° Pièce d’identité du ressortissant:</label>
    <input id="ressortissant" name="ressortissant" type="text" placeholder="N° Pièce d’identité du ressortissant" class="toDisableIt w-9/12  mx-auto block rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 @error('ressortissant') border-pink-600  placeholder:text-pink-600 @enderror " value="{{ old('ressortissant') }}" required />
     @if ($errors->has('ressortissant'))
        <span class="w-9/12  mx-auto text-pink-600">{{ $errors->first('ressortissant') }}</span>
    @endif

    <label for="representant" class="text-gray-700 mt-5 mb-0">N° Pièce d’identité du représentant: </label>
    <input id="representant" name="representant" type="text" placeholder="N° Pièce d’identité du représentant" class="toDisableIt w-9/12  mx-auto block rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 @error('representant') border-pink-600  placeholder:text-pink-600 @enderror" value="{{ old('representant') }}" />
     @if ($errors->has('representant'))
        <span class="w-9/12  mx-auto text-pink-600">{{ $errors->first('representant') }}</span>
    @endif

    <label for="province" class="text-gray-700 mt-5 mb-0">Province:</label>
    <select id="province" name="province"  class="toDisableIt w-9/12  mx-auto block rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 @error('province') border-pink-600  placeholder:text-pink-600 @enderror" value="{{ old('province') }}" >
        <option value="">Séléctionner le province</option>
        <option value="OUARZAZATE">OUARZAZATE</option>
        <option value="ERRACHIDIA">ERRACHIDIA</option>
        <option value="TINGHIR">TINGHIR</option>
        <option value="MIDELT">MIDELT</option>
        <option value="ZAGORA">ZAGORA</option>
    </select>
     @if ($errors->has('province'))
        <span class="w-9/12  mx-auto text-pink-600">{{ $errors->first('province') }}</span>
    @endif

    <label for="date_debut" class="text-gray-700 mt-5 mb-0">Date du debut:</label>
    <input id="date_debut" name="date_debut" type="date" class="toDisableIt w-9/12  mx-auto block rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 @error('date_debut') border-pink-600  placeholder:text-pink-600 @enderror" value="{{ old('date_debut') }}" required/>
    @if ($errors->has('date_debut'))
    <span class="w-9/12  mx-auto text-pink-600">{{ $errors->first('date_debut') }}</span>
    @endif

    <label for="date_fin" class="text-gray-700 mt-5 mb-0">Date de la fin:</label>
    <input id="date_fin" name="date_fin" type="date" class="toDisableIt w-9/12  mx-auto block rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 "  @error('date_fin') border-pink-600  placeholder:text-pink-600 @enderror" value="{{ old('date_fin') }}" />

    <label for="remarque" class="text-gray-700 mt-5 mb-0">Remarque:</label>
    <textarea name="remarque" id="remarque" placeholder="remarques ..." class="toDisableIt h-20 w-9/12  mx-auto block rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 " value="{{ old('remarque') }}"></textarea>
    
    
<div id="show_act" class="mx-auto p-2 mt-5 border-2 border-slate-500 bg-slate-200 rounded-sm shadow-sm w-fit hover:cursor-pointer hover:bg-slate-300 ">Activité abrégée (Pour la carte pro)</div>
    
<div id="act_abrege" class="hidden p-3 mt-3 border border-slate-400 rounded-lg">

        <label for="activite_carte" class="text-gray-700 mt-5 mb-0">Activité (Pour la carte Professionnelle):</label>
        <input id="activite_carte" name="activite_carte" type="text"  placeholder = "Activité "  class="toDisableIt w-9/12  mx-auto block rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 @error('activite_carte') border-pink-600  placeholder:text-pink-600 @enderror" value="{{ old('activite_carte') }}" />
        @if ($errors->has('activite_carte'))
        <span class="w-9/12  mx-auto text-pink-600">{{ $errors->first('activite_carte') }}</span>
        @endif
</div>

<div id="show_interv" class="mx-auto p-2 m-5 border-2 border-slate-500 bg-slate-200 rounded-sm shadow-sm w-fit hover:cursor-pointer hover:bg-slate-300 ">Details de certificat d'origine</div>
    
<div id="interv" class="hidden p-3 border border-slate-400 rounded-lg">

<h3 class="mb-5 mx-auto border-b-2 w-fit">Details pour certificat d'origine</h3>

    <label for="exportateur" class="text-gray-700 mt-5 mb-0">L'exportateur:</label>
    <input id="exportateur" name="exportateur" type="text"  placeholder = "L'exportateur"  class="toDisableIt w-9/12  mx-auto block rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 @error('exportateur') border-pink-600  placeholder:text-pink-600 @enderror" value="{{ old('exportateur') }}"/>
     @if ($errors->has('exportateur'))
        <span class="w-9/12  mx-auto text-pink-600">{{ $errors->first('exportateur') }}</span>
    @endif

    <label for="destinataire" class="text-gray-700 mt-5 mb-0">Destinataire:</label>
    <input id="destinataire" name="destinataire" type="text"  placeholder = "Destinataire"  class="toDisableIt w-9/12  mx-auto block rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 @error('destinataire') border-pink-600  placeholder:text-pink-600 @enderror" value="{{ old('destinataire') }}" required/>
     @if ($errors->has('destinataire'))
        <span class="w-9/12  mx-auto text-pink-600">{{ $errors->first('destinataire') }}</span>
    @endif

    <label for="pays" class="text-gray-700 mt-5 mb-0">Pays d'origine:</label>
    <input id="pays" name="pays" type="text"  placeholder = "Pays d'origine"  class="toDisableIt w-9/12  mx-auto block rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 @error('pays') border-pink-600  placeholder:text-pink-600 @enderror" value="{{ old('pays') }}" required/>
     @if ($errors->has('pays'))
        <span class="w-9/12  mx-auto text-pink-600">{{ $errors->first('pays') }}</span>
    @endif

    <label for="transport" class="text-gray-700 mt-5 mb-0">Mode de transport:</label>
    <input id="transport" name="transport" type="text"  placeholder = "Mode de transport"  class="toDisableIt w-9/12  mx-auto block rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 @error('transport') border-pink-600  placeholder:text-pink-600 @enderror" value="{{ old('transport') }}" required/>
     @if ($errors->has('transport'))
        <span class="w-9/12  mx-auto text-pink-600">{{ $errors->first('transport') }}</span>
    @endif

    <label for="num_fact" class="text-gray-700 mt-5 mb-0">Numero de facture:</label>
    <input id="num_fact" name="num_fact" type="text"  placeholder = "Mode de num_fact"  class="toDisableIt w-9/12  mx-auto block rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 @error('num_fact') border-pink-600  placeholder:text-pink-600 @enderror" value="{{ old('num_fact') }}" required/>
     @if ($errors->has('num_fact'))
        <span class="w-9/12  mx-auto text-pink-600">{{ $errors->first('num_fact') }}</span>
    @endif

    <label for="date_fact" class="text-gray-700 mt-5 mb-0">Date de la facture:</label>
    <input id="date_fact" name="date_fact" type="date"  placeholder = "Mode de date_fact"  class="toDisableIt w-9/12  mx-auto block rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 @error('date_fact') border-pink-600  placeholder:text-pink-600 @enderror" value="{{ old('date_fact') }}" required/>
     @if ($errors->has('date_fact'))
        <span class="w-9/12  mx-auto text-pink-600">{{ $errors->first('date_fact') }}</span>
    @endif

    <label for="hs_code" class="text-gray-700 mt-5 mb-0">N de nemenclature H.S code:</label>
    <input id="hs_code" name="hs_code" type="text"  placeholder = "N de nemenclature H.S code"  class="toDisableIt w-9/12  mx-auto block rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 @error('hs_code') border-pink-600  placeholder:text-pink-600 @enderror" value="{{ old('hs_code') }}" required/>
     @if ($errors->has('hs_code'))
        <span class="w-9/12  mx-auto text-pink-600">{{ $errors->first('hs_code') }}</span>
    @endif

    <label for="details" class="text-gray-700 mt-5 mb-0">Details:</label>
    <input id="details" name="details" type="text"  placeholder = "Details"  class="toDisableIt w-9/12  mx-auto block rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 @error('details') border-pink-600  placeholder:text-pink-600 @enderror" value="{{ old('details') }}" required/>
     @if ($errors->has('details'))
        <span class="w-9/12  mx-auto text-pink-600">{{ $errors->first('details') }}</span>
    @endif

    <label for="quantite" class="text-gray-700 mt-5 mb-0">Quantité:</label>
    <input id="quantite" name="quantite" type="text"  placeholder = "Quantité"  class="toDisableIt w-9/12  mx-auto block rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 @error('quantite') border-pink-600  placeholder:text-pink-600 @enderror" value="{{ old('quantite') }}" required/>
     @if ($errors->has('quantite'))
        <span class="w-9/12  mx-auto text-pink-600">{{ $errors->first('quantite') }}</span>
    @endif

</div>

    <div onclick="showSubmit()" id="leDiv" class="mx-auto p-2 m-5 bg-lime-200 rounded-sm shadow-lg w-fit hover:cursor-pointer hover:bg-lime-300 border border-lime-400">Vérifier vos informations</div>

    <div id='createBtn' class="mx-auto" style="display: none"> 
        <button id="submit" type="submit" class='mx-auto p-2 m-5 bg-green-300 rounded-md shadow-lg w-fit hover:cursor-pointer hover:bg-green-400'>Enregistrer & Imprimer le contrat</button>  
        
        <div onclick='cancelSubmitForm()' class='mx-auto p-2 m-5 bg-orange-300 rounded-md shadow- w-fit hover:cursor-pointer hover:bg-orange-400 ' style='display:inline-block'>   Annuler  </div> 
    </div>

</form>

<script>
    

function showSubmit (){

    alert("Vérifier vos informations");
$('#leDiv').css('display', 'none');
$('#createBtn').css('display', 'block');
$(".toDisableIt").prop("readonly", true);
}

function cancelSubmitForm () {
    
$('#createBtn').css('display', 'none');
$('#leDiv').css('display', 'block');
$(".toDisableIt").prop("readonly", false);
}

</script>
@endsection
