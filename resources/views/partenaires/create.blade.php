
@extends('dashboard')

@section('dashboard')

<form action="{{route('partenaires.store')}}" method="POST" class="flex-col flex">
    @csrf
    
    <label for="partenaire" class="text-gray-700 mt-5 mb-0">Le partenaire :</label>
    <input id="partenaire" name="partenaire" type="text" placeholder="Le nom du partenaire " class="w-9/12  mx-auto block rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 @error('partenaire') border-pink-600  placeholder:text-pink-600 @enderror " value="{{ old('partenaire') }}" />
     @if ($errors->has('partenaire'))
        <span class="w-9/12  mx-auto text-pink-600">{{ $errors->first('partenaire') }}</span>
    @endif

    <button type="submit" class="mx-auto p-2 m-5 bg-indigo-400 rounded-md  w-fit hover:cursor-pointer border border-indigo-500 hover:bg-inherit hover:text-indigo-600 hover:border-indigo-600">Créer un Partenaire</button>

</form>


@endsection
