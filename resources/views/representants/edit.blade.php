
@extends('dashboard')

@section('dashboard')

<form action="{{route('representants.update', $representnat->rep_id)}}" method="POST" class="flex-col flex">
    @csrf
    @method('PUT')

    <label for="cin" class="text-gray-700 mt-5 mb-0">CIN de representant:</label>
    <input id="cin" name="cin" type="text" placeholder="le cin de representant" class="w-9/12  mx-auto block rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 @error('cin') border-pink-600  placeholder:text-pink-600 @enderror " value="{{ old('cin', $representnat->cin )}}" required />
     @if ($errors->has('cin'))
        <span class="w-9/12  mx-auto text-pink-600">{{ $errors->first('cin') }}</span>
    @endif

    <label for="nom" class="text-gray-700 mt-5 mb-0">Nom: </label>
    <input id="nom" name="nom" type="text" placeholder="le nom de representant" class="w-9/12  mx-auto block rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 @error('nom') border-pink-600  placeholder:text-pink-600 @enderror" value="{{ old('nom' , $representnat->nom) }}" required />
     @if ($errors->has('nom'))
        <span class="w-9/12  mx-auto text-pink-600">{{ $errors->first('nom') }}</span>
    @endif

    <label for="prenom" class="text-gray-700 mt-5 mb-0">Prénom:</label>
    <input id="prenom" name="prenom" type="text"  placeholder = "le prenom de representant"  class="w-9/12  mx-auto block rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 @error('prenom') border-pink-600  placeholder:text-pink-600 @enderror" value="{{ old('prenom', $representnat->prenom )}}" required/>
     @if ($errors->has('prenom'))
        <span class="w-9/12  mx-auto text-pink-600">{{ $errors->first('prenom') }}</span>
    @endif

    <label for="mail" class="text-gray-700 mt-5 mb-0">Email:</label>
    <input id="mail" name="mail" type="text"  placeholder = "Email"  class="w-9/12  mx-auto block rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 @error('mail') border-pink-600  placeholder:text-pink-600 @enderror" value="{{ old('mail', $representnat->mail) }}" required/>
     @if ($errors->has('mail'))
        <span class="w-9/12  mx-auto text-pink-600">{{ $errors->first('mail') }}</span>
    @endif

    <label for="nationalite" class="text-gray-700 mt-5 mb-0">Nationalité:</label>
    <select name="nationalite" id="nationalite" class="w-9/12  mx-auto block rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 @error('nationalite') border-pink-600  placeholder:text-pink-600 @enderror" value="{{ old('nationalite')  }}" required/>
        <option value="{{$representnat->nationalite}}">{{$representnat->nationalite}}</option>
        <option value="marocaine">Marocaine</option>
        <option value="etrangere">Etrangère</option>
    </select>
    @if ($errors->has('nationalite'))
    <span class="w-9/12  mx-auto text-pink-600">{{ $errors->first('nationalite') }}</span>
    @endif

    <label for="sexe" class="text-gray-700 mt-5 mb-0">Sexe:</label>
    <select name="sexe" id="sexe" class="w-9/12  mx-auto block rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 @error('sexe') border-pink-600  placeholder:text-pink-600 @enderror" value="{{ old('sexe') }}" required/>
        <option value="{{$representnat->sexe}}">{{$representnat->sexe}}</option>
        <option value="Homme">Homme</option>
        <option value="Femme">Femme</option>
    </select>
    @if ($errors->has('sexe'))
    <span class="w-9/12  mx-auto text-pink-600">{{ $errors->first('sexe') }}</span>
    @endif

    <label for="adresse" class="text-gray-700 mt-5 mb-0">L'adresse:</label>
    <input id="adresse" name="adresse" type="text"  placeholder = "L'adresse"  class="w-9/12  mx-auto block rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 @error('adresse') border-pink-600  placeholder:text-pink-600 @enderror" value="{{ old('adresse', $representnat->adresse )}}" required/>
     @if ($errors->has('adresse'))
        <span class="w-9/12  mx-auto text-pink-600">{{ $errors->first('adresse') }}</span>
    @endif

    <label for="tel" class="text-gray-700 mt-5 mb-0">Tél:</label>
    <input id="tel" name="tel" type="text"  placeholder = "Tél"  class="w-9/12  mx-auto block rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 @error('tel') border-pink-600  placeholder:text-pink-600 @enderror" value="{{ old('tel', $representnat->tel )}}" required/>
     @if ($errors->has('tel'))
        <span class="w-9/12  mx-auto text-pink-600">{{ $errors->first('tel') }}</span>
    @endif

    <label for="qualite" class="text-gray-700 mt-5 mb-0">Qualité:</label>
    <select name="qualite" id="qualite" class="w-9/12  mx-auto block rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 @error('qualite') border-pink-600  placeholder:text-pink-600 @enderror" value="{{ old('qualite')}}" required/>
        <option value="{{$representnat->qualite_id}}">{{$representnat->qualite->qualite}}</option>
        @foreach ($qualites as $qualite)
            <option value="{{$qualite->qualite_id}}"> {{$qualite->qualite}} </option>
        @endforeach
    </select>
    @if ($errors->has('qualite'))
    <span class="w-9/12  mx-auto text-pink-600">{{ $errors->first('qualite') }}</span>
    @endif

    <button type="submit" class="mx-auto p-2 m-5 rounded-sm w-fit bg-green-200 border border-slate-500  text-slate-600 hover:bg-green-300 hover:cursor-pointer">Modifier le representant</button>

</form>


@endsection
