
@extends('dashboard')

@section('dashboard')

<form action="{{route('formesJuridiques.update', $forme->formeJur_id)}}" method="POST" class="flex-col flex">
    
    @csrf
    @method('PUT')

    <label for="forme" class="text-gray-700 mt-5 mb-0">Le nom de la forme Juridique:</label>
    <input id="forme" name="forme" type="text" placeholder="Le nom de la forme Juridique" class="w-9/12  mx-auto block rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 @error('forme') border-pink-600  placeholder:text-pink-600 @enderror " value="{{ old('forme', $forme->formeJur) }}" required />
     @if ($errors->has('forme'))
        <span class="w-9/12  mx-auto text-pink-600">{{ $errors->first('forme') }}</span>
    @endif

    <label for="code" class="text-gray-700 mt-5 mb-0">Le code de la forme : </label>
    <input id="code" name="code" type="text" placeholder="le code de la forme" class="w-9/12  mx-auto block rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 @error('code') border-pink-600  placeholder:text-pink-600 @enderror" value="{{ old('code', $forme->code_forme) }}" required />
     @if ($errors->has('code'))
        <span class="w-9/12  mx-auto text-pink-600">{{ $errors->first('code') }}</span>
    @endif


    <button type="submit" class="mx-auto p-2 m-5 rounded-sm w-fit bg-green-200 border border-slate-500  text-slate-600 hover:bg-green-300 hover:cursor-pointer">Modifier la forme juridique</button>

</form>


@endsection
