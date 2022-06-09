@extends('dashboard')

@section('dashboard')

<form class="flex-col flex" method="POST" action="{{route('services.store')}}">
    @csrf

    <label for="service" class="text-gray-700 mt-5 mb-0">Nom: </label>
    <input id="service" name="service" type="text" placeholder="Nom de service" class="w-9/12  mx-auto block rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 @error('service') border-pink-600  placeholder:text-pink-600 @enderror" value="{{ old('service') }}"/>
    @if ($errors->has('service'))
        <span class="w-9/12  mx-auto text-pink-600">{{ $errors->first('service') }}</span>
    @endif

    <label for="code" class="text-gray-700 mt-5 mb-0">Le code: </label>
    <input id="code" name="code" type="text" placeholder="Le code de service" class="w-9/12  mx-auto block rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 @error('code') border-pink-600  placeholder:text-pink-600 @enderror" value="{{ old('code') }}"/>
    @if ($errors->has('code'))
        <span class="w-9/12  mx-auto text-pink-600">{{ $errors->first('code') }}</span>
    @endif

    <label for="description" class="text-gray-700 mt-5 mb-0">Description: </label>
    <input id="description" name="description" type="text" placeholder="Description du service" class="w-9/12  mx-auto block rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 @error('description') border-pink-600  placeholder:text-pink-600 @enderror" value="{{ old('description') }}"/>
    @if ($errors->has('description'))
        <span class="w-9/12  mx-auto text-pink-600">{{ $errors->first('description') }}</span>
    @endif

    {{-- <label for="periodicite" class="text-gray-700 mt-5 mb-0">Periodicité: </label>
    <input id="periodicite" name="periodicite" type="number" placeholder="Periodicité du service" class="w-9/12  mx-auto block rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 @error('periodicite') border-pink-600  placeholder:text-pink-600 @enderror" value="{{ old('periodicite') }}"/>
    @if ($errors->has('periodicite'))
        <span class="w-9/12  mx-auto text-pink-600">{{ $errors->first('periodicite') }}</span>
    @endif --}}

    <label for="cible" class="text-gray-700 mt-5 mb-0">Public cible: </label>
    <input id="cible" name="cible" type="text" placeholder="Le public ciblé" class="w-9/12  mx-auto block rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 @error('cible') border-pink-600 placeholder:text-pink-600 @enderror" value="{{ old('cible') }}"/>
    @if ($errors->has('cible'))
        <span class="w-9/12  mx-auto text-pink-600">{{ $errors->first('cible') }}</span>
    @endif
    
    <label for="type_service" class="text-gray-700 mt-5 mb-0">Service:</label>
    <select name="type_service" id="type_service" class="w-9/12  mx-auto block rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 @error('type_service') border-pink-600  placeholder:text-pink-600 @enderror" value="{{ old('type_service') }}" required />
        <option value="">ls services </option>
    @foreach ($types as $type)
        <option value="{{$type->type_id}}">{{$type->type}}</option>
    @endforeach
    </select>
    @if ($errors->has('type_service'))
    <span class="w-9/12  mx-auto text-pink-600">{{ $errors->first('type_service') }}</span>
    @endif

    
    <label for="responsable" class="text-gray-700 mt-5 mb-0">Responsable:</label>
    <select name="responsable" id="responsable" class="w-9/12  mx-auto block rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 @error('responsable') border-pink-600  placeholder:text-pink-600 @enderror" value="{{ old('responsable') }}"/>
        <option value="">Responsable</option>
    @foreach ($resps as $resp)
        <option value="{{$resp->fonc_id}}">{{$resp->nom}} {{$resp->prenom}}</option>
    @endforeach
    </select>
    @if ($errors->has('responsable'))
    <span class="w-9/12  mx-auto text-pink-600">{{ $errors->first('responsable') }}</span>
    @endif

    <label for="lieu_prestation" class="text-gray-700 mt-5 mb-0">Lieu du prestation: </label>
    <input id="lieu_prestation" name="lieu_prestation" type="text" placeholder="Lieu du prestation" class="w-9/12  mx-auto block rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 @error('lieu_prestation') border-pink-600  placeholder:text-pink-600 @enderror" value="{{ old('lieu_prestation') }}"/>
    @if ($errors->has('lieu_prestation'))
        <span class="w-9/12  mx-auto text-pink-600">{{ $errors->first('lieu_prestation') }}</span>
    @endif

    <label for="tarif" class="text-gray-700 mt-5 mb-0">Tarif: </label>
    <input id="tarif" name="tarif" type="number" placeholder="Tarif" class="w-9/12  mx-auto block rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 @error('tarif') border-pink-600  placeholder:text-pink-600 @enderror" value="{{ old('tarif') }}"/>
    @if ($errors->has('tarif'))
        <span class="w-9/12  mx-auto text-pink-600">{{ $errors->first('tarif') }}</span>
    @endif

    <label for="ressource_service" class="text-gray-700 mt-5 mb-0"> Ressource du service: </label>
    <input id="ressource_service" name="ressource_service" type="text" placeholder="Ressource du service" class="w-9/12  mx-auto block rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 @error('ressource_service') border-pink-600  placeholder:text-pink-600 @enderror" value="{{ old('ressource_service') }}"/>
    @if ($errors->has('ressource_service'))
        <span class="w-9/12  mx-auto text-pink-600">{{ $errors->first('ressource_service') }}</span>
    @endif

    <label for="etat_service" class="text-gray-700 mt-5 mb-0">Etat de service:</label>
    <select name="etat_service" id="etat_service" class="w-9/12  mx-auto block rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 @error('etat_service') border-pink-600  placeholder:text-pink-600 @enderror" value="{{ old('etat_service') }}" required />
        <option value="">Etat de service</option>
        <option value="1">Activé</option>
        <option value="0">Disactivé</option>
    </select>
    @if ($errors->has('etat_service'))
    <span class="w-9/12  mx-auto text-pink-600">{{ $errors->first('etat_service') }}</span>
    @endif

    {{-- <label for="motif_etat_service" class="text-gray-700 mt-5 mb-0"> Motif d'état service: </label>
    <input id="motif_etat_service" name="motif_etat_service" type="text" placeholder="Motif d'état service" class="w-9/12  mx-auto block rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 @error('motif_etat_service') border-pink-600  placeholder:text-pink-600 @enderror" value="{{ old('motif_etat_service') }}"/>
    @if ($errors->has('motif_etat_service'))
        <span class="w-9/12  mx-auto text-pink-600">{{ $errors->first('motif_etat_service') }}</span>
    @endif --}}

    <label for="documentation" class="text-gray-700 mt-5 mb-0"> Documentation: </label>
    <input id="documentation" name="documentation" type="text" placeholder="Documentation" class="w-9/12  mx-auto block rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 @error('documentation') border-pink-600  placeholder:text-pink-600 @enderror" value="{{ old('documentation') }}"/>
    @if ($errors->has('documentation'))
        <span class="w-9/12  mx-auto text-pink-600">{{ $errors->first('documentation') }}</span>
    @endif

    <label for="action_communication" class="text-gray-700 mt-5 mb-0">Action du communication: </label>
    <textarea id="action_communication" name="action_communication" type="text" placeholder="Action du communication" class="w-9/12  mx-auto block rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 @error('action_communication') border-pink-600  placeholder:text-pink-600 @enderror" value="{{ old('action_communication') }}" rows="5"></textarea>
    @if ($errors->has('action_communication'))
        <span class="w-9/12  mx-auto text-pink-600">{{ $errors->first('action_communication') }}</span>
    @endif

    
    <label for="remarque" class="text-gray-700 mt-5 mb-0">Remarque: </label>
    <textarea id="remarque" name="remarque" type="text" placeholder="Remarque" class="w-9/12  mx-auto block rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 @error('remarque') border-pink-600  placeholder:text-pink-600 @enderror" value="{{ old('remarque') }}" rows="5"></textarea>
    @if ($errors->has('remarque'))
        <span class="w-9/12  mx-auto text-pink-600">{{ $errors->first('remarque') }}</span>
    @endif

    <div id="show_interv" class="mx-auto p-2 m-5 border-2 border-slate-500 bg-slate-200 rounded-sm shadow-sm w-fit hover:cursor-pointer hover:bg-slate-300 ">Ajouter des intervenants au service</div>
    
    <div id="interv" class="hidden p-3 border border-slate-400 rounded-lg">

        <label for="partenaire" class="text-gray-700 mt-5 mb-0">Les partenaires:</label>
        <select name="partenaire" id="partenaire" class="w-9/12  mx-auto block rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 @error('partenaire') border-pink-600  placeholder:text-pink-600 @enderror" value="{{ old('partenaire') }}"/>
            <option value="">Les partenaires</option>
           @foreach ($partenaires as $partenaire)
            <option value="{{$partenaire->part_id}}">{{$partenaire->partenaire}}</option>
           @endforeach
        </select>
        @if ($errors->has('partenaire'))
        <span class="w-9/12  mx-auto text-pink-600">{{ $errors->first('partenaire') }}</span>
        @endif

        <label for="select_intervenant"  class="text-gray-700 mt-5 mb-0">Les intervenants:</label>
        <select name="intervenant" id="select_intervenant" class="w-9/12  mx-auto block rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 @error('intervenant') border-pink-600  placeholder:text-pink-600 @enderror" value="{{ old('intervenant') }}"  />
            <option value="">Les intervenants</option>
        </select>
        @if ($errors->has('intervenant'))
        <span class="w-9/12  mx-auto text-pink-600">{{ $errors->first('intervenant') }}</span>
        @endif

        <label for="etat_interv" class="text-gray-700 mt-5 mb-0">Etat de intervenant de service</label>
        <select name="etat_interv" id="etat_interv" class="w-9/12  mx-auto block rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 @error('etat_interv') border-pink-600  placeholder:text-pink-600 @enderror" value="{{ old('etat_interv') }}" />
            <option value="">Etat</option>
            <option value="1">Activé</option>
            <option value="0">Disactivé</option>
        </select>
        @if ($errors->has('etat_interv'))
        <span class="w-9/12  mx-auto text-pink-600">{{ $errors->first('etat_interv') }}</span>
        @endif

        <label for="remarque_interv" class="text-gray-700 mt-5 mb-0">Remarque: </label>
    <textarea id="remarque_interv" name="remarque_interv" type="text" placeholder="Remarque" class="w-9/12  mx-auto block rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 @error('remarque_interv') border-pink-600  placeholder:text-pink-600 @enderror" value="{{ old('remarque_interv') }}" rows="5"></textarea>
    @if ($errors->has('remarque_interv'))
        <span class="w-9/12  mx-auto text-pink-600">{{ $errors->first('remarque_interv') }}</span>
    @endif

    </div>

    <button type="submit" class="mx-auto p-2 m-5 bg-indigo-400 rounded-md  w-fit hover:cursor-pointer border border-indigo-500 hover:bg-inherit hover:text-indigo-600 hover:border-indigo-600">Créer un service</button>

</form>


@endsection