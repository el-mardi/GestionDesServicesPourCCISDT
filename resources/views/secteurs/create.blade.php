@extends('dashboard')

@section('dashboard')

<form class="flex-col flex" method="POST" action="{{route('secteurs.store')}}">
    @csrf

    <label for="nom" class="text-gray-700 mt-5 mb-0">Nom de secteur: </label>
    <input id="nom" name="nom" type="text" placeholder="Nom de type d'intervention" class="w-9/12  mx-auto block rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 @error('nom') border-pink-600  placeholder:text-pink-600 @enderror" value="{{ old('nom') }}"/>
    @if ($errors->has('nom'))
        <span class="w-9/12  mx-auto text-pink-600">{{ $errors->first('nom') }}</span>
    @endif

    <button type="submit" class="mx-auto p-2 m-5 bg-indigo-400 rounded-md  w-fit hover:cursor-pointer border border-indigo-500 hover:bg-inherit hover:text-indigo-600 hover:border-indigo-600">Créer un secteur</button>

</form>


@endsection