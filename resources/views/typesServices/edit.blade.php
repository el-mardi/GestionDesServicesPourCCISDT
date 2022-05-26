@extends('dashboard')

@section('dashboard')

<form class="flex-col flex" method="POST" action="{{route('typesServices.update', $type->type_id)}}">
    @csrf
    @method('PUT')

    <label for="nom" class="text-gray-700 mt-5 mb-0">Nom: </label>
    <input id="nom" name="nom" type="text" placeholder="Nom de type d'intervention" class="w-9/12  mx-auto block rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 @error('nom') border-pink-600  placeholder:text-pink-600 @enderror" value="{{ old('nom', $type->type ) }}"/>
    @if ($errors->has('nom'))
        <span class="w-9/12  mx-auto text-pink-600">{{ $errors->first('nom') }}</span>
    @endif

    <label for="code" class="text-gray-700 mt-5 mb-0">Le code: </label>
    <input id="code" name="code" type="text" placeholder="Le code de type d'intervention" class="w-9/12  mx-auto block rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 @error('code') border-pink-600  placeholder:text-pink-600 @enderror" value="{{ old('code', $type->code_type ) }}"/>
    @if ($errors->has('code'))
        <span class="w-9/12  mx-auto text-pink-600">{{ $errors->first('code') }}</span>
    @endif

    <label for="remarque" class="text-gray-700 mt-5 mb-0">Remarque: </label>
    <input id="remarque" name="remarque" type="text" placeholder="Remarque" class="w-9/12 mx-auto block rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 @error('remarque') border-pink-600  placeholder:text-pink-600 @enderror" value="{{ old('remarque', $type->remarque) }}" rows="5"></textarea>
    @if ($errors->has('remarque'))
        <span class="w-9/12  mx-auto text-pink-600">{{ $errors->first('remarque') }}</span>
    @endif

    
    <button type="submit" class="mx-auto p-2 m-5 rounded-sm w-fit bg-green-200 border border-slate-500  text-slate-600 hover:bg-green-300 hover:cursor-pointer">Enregistrer les modifications</button>

</form>


@endsection