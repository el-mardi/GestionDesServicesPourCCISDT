
@extends('dashboard')

@section('dashboard')

<form action="{{route('qualites.update', $qualite->qualite_id)}}" method="POST" class="flex-col flex">
    @csrf
    @method('PUT')
    <label for="qualite" class="text-gray-700 mt-5 mb-0">Le nom d la qualité :</label>
    <input id="qualite" name="qualite" type="text" placeholder="Le nom d'activitée " class="w-9/12  mx-auto block rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 @error('qualite') border-pink-600  placeholder:text-pink-600 @enderror " value="{{ old('qualite',  $qualite->qualite) }}" />
     @if ($errors->has('qualite'))
        <span class="w-9/12  mx-auto text-pink-600">{{ $errors->first('qualite',) }}</span>
    @endif

    

    <button type="submit" class="mx-auto p-2 m-5 rounded-sm w-fit bg-green-200 border border-slate-500  text-slate-600 hover:bg-green-300 hover:cursor-pointer">Modifier la qualité</button>

</form>


@endsection
