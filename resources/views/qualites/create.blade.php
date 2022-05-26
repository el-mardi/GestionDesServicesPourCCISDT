
@extends('dashboard')

@section('dashboard')

<form action="{{route('qualites.store')}}" method="POST" class="flex-col flex">
    @csrf
    
    <label for="qualite" class="text-gray-700 mt-5 mb-0">Le nom de la qualité :</label>
    <input id="qualite" name="qualite" type="text" placeholder="Le nom du qualite " class="w-9/12  mx-auto block rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 @error('qualite') border-pink-600  placeholder:text-pink-600 @enderror " value="{{ old('qualite') }}" />
     @if ($errors->has('qualite'))
        <span class="w-9/12  mx-auto text-pink-600">{{ $errors->first('qualite') }}</span>
    @endif

    <button type="submit" class="mx-auto p-2 m-5 bg-indigo-400 rounded-md  w-fit hover:cursor-pointer border border-indigo-500 hover:bg-inherit hover:text-indigo-600 hover:border-indigo-600">Créer une qualité</button>

</form>


@endsection
