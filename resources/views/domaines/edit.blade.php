
@extends('dashboard')

@section('dashboard')

<form action="{{route('domaines.update', $domaine->dom_id)}}" method="POST" class="flex-col flex">
    @csrf
    @method('PUT')
    <label for="domaine" class="text-gray-700 mt-5 mb-0">Le nom du domaine :</label>
    <input id="domaine" name="domaine" type="text" placeholder="Le nom du domaine " class="w-9/12  mx-auto block rounded-md shadow-sm text-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 @error('domaine') border-pink-600  placeholder:text-pink-600 @enderror " value="{{ old('domaine',  $domaine->domaine) }}" />
     @if ($errors->has('domaine'))
        <span class="w-9/12  mx-auto text-pink-600">{{ $errors->first('domaine',) }}</span>
    @endif

    <label for="secteur" class="text-gray-700 mt-5 mb-0">Secteur:</label>
    <select name="secteur" id="secteur" class="w-9/12  mx-auto block rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 @error('secteur') border-pink-600  placeholder:text-pink-600 @enderror" value="{{ old('secteur') }}" />
    <option value="{{$domaine->secteur->sect_id}}">{{$domaine->secteur->secteur}}</option>
    @foreach ($secteurs as $secteur)
            <option value="{{$secteur->sect_id}}">{{$secteur->secteur}}</option>
        @endforeach
    </select>
    @if ($errors->has('secteur'))
    <span class="w-9/12  mx-auto text-pink-600">{{ $errors->first('secteur') }}</span>
    @endif


    <button type="submit" class="mx-auto p-2 m-5 rounded-sm w-fit bg-green-200 border border-slate-500  text-slate-600 hover:bg-green-300 hover:cursor-pointer">Modifier le domaine</button>

</form>


@endsection
