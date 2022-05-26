
@extends('dashboard')

@section('dashboard')

<form action="{{route('intervenants.update', $intervenant->intervenant_id)}}" method="POST" class="flex-col flex">
    @csrf
    @method('PUT')
    <label for="intervenant" class="text-gray-700 mt-5 mb-0">Le nom d'intervenant :</label>
    <input id="intervenant" name="intervenant" type="text" placeholder="Le nom d'intervenant " class="w-9/12  mx-auto block rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 @error('intervenant') border-pink-600  placeholder:text-pink-600 @enderror " value="{{ old('intervenant', $intervenant->intervenant) }}" />
     @if ($errors->has('intervenant'))
        <span class="w-9/12  mx-auto text-pink-600">{{ $errors->first('intervenant') }}</span>
    @endif

    <label for="partenaire" class="text-gray-700 mt-5 mb-0">Partenaire:</label>
    <select name="partenaire" id="partenaire" class="w-9/12  mx-auto block rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 @error('partenaire') border-pink-600  placeholder:text-pink-600 @enderror" value="{{ old('partenaire') }}" />
    <option value="{{$intervenant->partenaire->part_id}}">{{$intervenant->partenaire->partenaire}}</option>
    @foreach ($partenaires as $partenaire)
            <option value="{{$partenaire->part_id}}">{{$partenaire->partenaire}}</option>
        @endforeach
    </select>
    @if ($errors->has('partenaire'))
    <span class="w-9/12  mx-auto text-pink-600">{{ $errors->first('partenaire') }}</span>
    @endif


    <button type="submit" class="mx-auto p-2 m-5 rounded-sm w-fit bg-green-200 border border-slate-500  text-slate-600 hover:bg-green-300 hover:cursor-pointer">Modifier l'intervenant</button>

</form>


@endsection
