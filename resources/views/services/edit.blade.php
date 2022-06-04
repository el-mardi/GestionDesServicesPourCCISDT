@extends('dashboard')

@section('dashboard')

<form class="flex-col flex" method="POST" action="{{route('services.update', $service->service_id)}}">
    @csrf
    @method('PUT')
    <label for="service" class="text-gray-700 mt-5 mb-0">Nom: </label>
    <input id="service" name="service" type="text" placeholder="Nom de service" class="w-9/12  mx-auto block rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 @error('service') border-pink-600  placeholder:text-pink-600 @enderror" value="{{ old('service', $service->service) }}"/>
    @if ($errors->has('service'))
        <span class="w-9/12  mx-auto text-pink-600">{{ $errors->first('service') }}</span>
    @endif

    <label for="code" class="text-gray-700 mt-5 mb-0">Le code: </label>
    <input id="code" name="code" type="text" placeholder="Le code de service" class="w-9/12  mx-auto block rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 @error('code') border-pink-600  placeholder:text-pink-600 @enderror" value="{{ old('code', $service->code_service) }}"/>
    @if ($errors->has('code'))
        <span class="w-9/12  mx-auto text-pink-600">{{ $errors->first('code') }}</span>
    @endif

    <label for="description" class="text-gray-700 mt-5 mb-0">Description: </label>
    <input id="description" name="description" type="text" placeholder="Description du service" class="w-9/12  mx-auto block rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 @error('description') border-pink-600  placeholder:text-pink-600 @enderror" value="{{ old('description', $service->description) }}"/>
    @if ($errors->has('description'))
        <span class="w-9/12  mx-auto text-pink-600">{{ $errors->first('description') }}</span>
    @endif


    <label for="cible" class="text-gray-700 mt-5 mb-0">Public cible: </label>
    <input id="cible" name="cible" type="text" placeholder="Le public ciblé" class="w-9/12  mx-auto block rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 @error('cible') border-pink-600  placeholder:text-pink-600 @enderror" value="{{ old('cible', $service->cible) }}"/>
    @if ($errors->has('cible'))
        <span class="w-9/12  mx-auto text-pink-600">{{ $errors->first('cible') }}</span>
    @endif
    
    <label for="type_service" class="text-gray-700 mt-5 mb-0">Service:</label>
    <select name="type_service" id="type_service" class="w-9/12  mx-auto block rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 @error('type_service') border-pink-600  placeholder:text-pink-600 @enderror" value="{{ old('type_service') }}" required />
        <option value="{{$service->type_id}}">{{$service->typesIntervention->type}}</option>
    @foreach ($types as $type)
        <option value="{{$type->type_id}}">{{$type->type}}</option>
    @endforeach
    </select>
    @if ($errors->has('type_service'))
    <span class="w-9/12  mx-auto text-pink-600">{{ $errors->first('type_service') }}</span>
    @endif

    
    <label for="responsable" class="text-gray-700 mt-5 mb-0">Responsable:</label>
    <select name="responsable" id="responsable" class="w-9/12  mx-auto block rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 @error('responsable') border-pink-600  placeholder:text-pink-600 @enderror" value="{{ old('responsable') }}" required />
        <option value="{{$service->Fonctionnaire->fonc_id}}">{{$service->fonctionnaire->nom}} {{$service->fonctionnaire->prenom}}</option>
    @foreach ($resps as $resp)
        <option value="{{$resp->fonc_id}}">{{$resp->nom}} {{$resp->prenom}}</option>
    @endforeach
    </select>
    @if ($errors->has('responsable'))
    <span class="w-9/12  mx-auto text-pink-600">{{ $errors->first('responsable') }}</span>
    @endif

    <label for="lieu_prestation" class="text-gray-700 mt-5 mb-0">Lieu du prestation: </label>
    <input id="lieu_prestation" name="lieu_prestation" type="text" placeholder="Lieu du prestation" class="w-9/12  mx-auto block rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 @error('lieu_prestation') border-pink-600  placeholder:text-pink-600 @enderror" value="{{ old('lieu_prestation', $service->lieu_prestation) }}"/>
    @if ($errors->has('lieu_prestation'))
        <span class="w-9/12  mx-auto text-pink-600">{{ $errors->first('lieu_prestation') }}</span>
    @endif

    <label for="tarif" class="text-gray-700 mt-5 mb-0">Tarif: </label>
    <input id="tarif" name="tarif" type="number" placeholder="Tarif" class="w-9/12  mx-auto block rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 @error('tarif') border-pink-600  placeholder:text-pink-600 @enderror" value="{{ old('tarif', $service->tarif) }}"/>
    @if ($errors->has('tarif'))
        <span class="w-9/12  mx-auto text-pink-600">{{ $errors->first('tarif') }}</span>
    @endif

    <label for="ressource_service" class="text-gray-700 mt-5 mb-0"> Ressource du service: </label>
    <input id="ressource_service" name="ressource_service" type="text" placeholder="Ressource du service" class="w-9/12  mx-auto block rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 @error('ressource_service') border-pink-600  placeholder:text-pink-600 @enderror" value="{{ old('ressource_service', $service->ressource_service) }}"/>
    @if ($errors->has('ressource_service'))
        <span class="w-9/12  mx-auto text-pink-600">{{ $errors->first('ressource_service') }}</span>
    @endif

    <label for="etat_service" class="text-gray-700 mt-5 mb-0">Etat de service:</label>
    <select name="etat_service" id="etat_service" class="w-9/12  mx-auto block rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 @error('etat_service') border-pink-600  placeholder:text-pink-600 @enderror" value="{{ old('etat_service') }}" required />
        <option value="{{$service->etat_service}}">
        @if ($service->etat_service == 1)
        Activé
        @else
        Disactivé
        @endif
    </option>
        <option value="1">Activé</option>
        <option value="1">Disactivé</option>
    </select>
    @if ($errors->has('etat_service'))
    <span class="w-9/12  mx-auto text-pink-600">{{ $errors->first('etat_service') }}</span>
    @endif

    <label for="motif_etat_service" class="text-gray-700 mt-5 mb-0"> Motif d'état service: </label>
    <input id="motif_etat_service" name="motif_etat_service" type="text" placeholder="Motif d'état service" class="w-9/12  mx-auto block rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 @error('motif_etat_service') border-pink-600  placeholder:text-pink-600 @enderror" value="{{ old('motif_etat_service', $service->motif_etat_service) }}"/>
    @if ($errors->has('motif_etat_service'))
        <span class="w-9/12  mx-auto text-pink-600">{{ $errors->first('motif_etat_service') }}</span>
    @endif

    <label for="documentation" class="text-gray-700 mt-5 mb-0"> Documentation: </label>
    <input id="documentation" name="documentation" type="text" placeholder="Documentation" class="w-9/12  mx-auto block rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 @error('documentation') border-pink-600  placeholder:text-pink-600 @enderror" value="{{ old('documentation', $service->documentation) }}"/>
    @if ($errors->has('documentation'))
        <span class="w-9/12  mx-auto text-pink-600">{{ $errors->first('documentation') }}</span>
    @endif

    <label for="action_communication" class="text-gray-700 mt-5 mb-0">Action du communication: </label>
    <input id="action_communication" name="action_communication" type="text" placeholder="Action du communication" class="w-9/12  mx-auto block rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 @error('action_communication') border-pink-600  placeholder:text-pink-600 @enderror" value="{{ old('action_communication', $service->action_communication) }}" rows="5"></input>
    @if ($errors->has('action_communication'))
        <span class="w-9/12  mx-auto text-pink-600">{{ $errors->first('action_communication') }}</span>
    @endif

    
    <label for="remarque" class="text-gray-700 mt-5 mb-0">Remarque: </label>
    <input id="remarque" name="remarque" type="text" placeholder="Remarque" class="w-9/12  mx-auto block rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 @error('remarque') border-pink-600  placeholder:text-pink-600 @enderror" value="{{ old('remarque', $service->remarque) }}" rows="5"></input>
    @if ($errors->has('remarque'))
        <span class="w-9/12  mx-auto text-pink-600">{{ $errors->first('remarque') }}</span>
    @endif

    
    <button type="submit" class="mx-auto p-2 m-5 rounded-sm w-fit bg-green-200 border border-slate-500  text-slate-600 hover:bg-green-300 hover:cursor-pointer">Modifier le service</button>

</form>


@endsection