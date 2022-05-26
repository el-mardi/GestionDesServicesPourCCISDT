@extends('dashboard')

@section('dashboard')

<form class="flex-col flex" method="POST" action="{{route('typesServices.store')}}">
    @csrf

    <label for="nom" class="text-gray-700 mt-5 mb-0">Nom: </label>
    <input id="nom" name="nom" type="text" placeholder="Nom du servcie" class="w-9/12  mx-auto block rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 @error('nom') border-pink-600  placeholder:text-pink-600 @enderror" value="{{ old('nom') }}"/>
    @if ($errors->has('nom'))
        <span class="w-9/12  mx-auto text-pink-600">{{ $errors->first('nom') }}</span>
    @endif

    <label for="code" class="text-gray-700 mt-5 mb-0">Le code: </label>
    <input id="code" name="code" type="text" placeholder="Code ddu service" class="w-9/12  mx-auto block rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 @error('code') border-pink-600  placeholder:text-pink-600 @enderror" value="{{ old('code') }}"/>
    @if ($errors->has('code'))
        <span class="w-9/12  mx-auto text-pink-600">{{ $errors->first('code') }}</span>
    @endif

    <label for="remarque" class="text-gray-700 mt-5 mb-0">Remarque: </label>
    <textarea id="remarque" name="remarque" type="text" placeholder="Remarque" class="w-9/12  mx-auto block rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 @error('remarque') border-pink-600  placeholder:text-pink-600 @enderror" value="{{ old('remarque') }}" rows="5"></textarea>
    @if ($errors->has('remarque'))
        <span class="w-9/12  mx-auto text-pink-600">{{ $errors->first('remarque') }}</span>
    @endif

    
    <button type="submit" class="mx-auto p-2 m-5 bg-indigo-400 rounded-md  w-fit hover:cursor-pointer border border-indigo-500 hover:bg-inherit hover:text-indigo-600 hover:border-indigo-600">Créer un type d'intervention</button>

</form>


@endsection