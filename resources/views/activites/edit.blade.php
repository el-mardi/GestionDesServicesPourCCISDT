
@extends('dashboard')

@section('dashboard')

<form action="{{route('activites.update', $activite->act_id)}}" method="POST" class="flex-col flex">
    @csrf
    @method('PUT')
    <label for="activite" class="text-gray-700 mt-5 mb-0">Le nom d'activitée :</label>
    <input id="activite" name="activite" type="text" placeholder="Le nom d'activitée " class="w-9/12  mx-auto block rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 @error('activite') border-pink-600  placeholder:text-pink-600 @enderror " value="{{ old('activite',  $activite->activite) }}" />
     @if ($errors->has('activite'))
        <span class="w-9/12  mx-auto text-pink-600">{{ $errors->first('activite',) }}</span>
    @endif

    <label for="secteur" class="text-gray-700 mt-5 mb-0">Secteur:</label>
    <select name="secteur" id="secteur" class="w-9/12  mx-auto block rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 @error('secteur') border-pink-600  placeholder:text-pink-600 @enderror" value="{{ old('secteur') }}" />
    <option value="{{$activite->secteur->sect_id}}">{{$activite->secteur->secteur}}</option>
    @foreach ($secteurs as $secteur)
            <option value="{{$secteur->sect_id}}">{{$secteur->secteur}}</option>
        @endforeach
    </select>
    @if ($errors->has('secteur'))
    <span class="w-9/12  mx-auto text-pink-600">{{ $errors->first('secteur') }}</span>
    @endif


    <button type="submit" class="mx-auto p-2 m-5 rounded-sm w-fit bg-green-200 border border-slate-500  text-slate-600 hover:bg-green-300 hover:cursor-pointer">Modifier l'activité</button>

</form>


@endsection
