
@extends('dashboard')

@section('dashboard')

<form action="{{route('ressortissant.update',  $ressortissant->res_id)}}" method="POST" class="flex-col flex"  enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <label for="img" class="text-gray-700 mt-5 mb-0">Image: </label>
    <input type="file" name="img" id="img" accept="image/*">
    
    <img src="" id="display-image" class="mx-auto" style="max-height: 11rem; max-width: 11rem">

    <label for="num_fiche" class="text-gray-700 mt-5 mb-0">Numero de fiche: </label>
    <input id="num_fiche" name="num_fiche" type="text" placeholder="Numero de fiche" class="w-9/12  mx-auto block rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 @error('num_fiche') border-pink-600  placeholder:text-pink-600 @enderror" value="{{ old('num_fiche', $ressortissant->num_fiche) }}"/>
    @if ($errors->has('num_fiche'))
        <span class="w-9/12  mx-auto text-pink-600">{{ $errors->first('num_fiche') }}</span>
    @endif
    
    <label for="cin" class="text-gray-700 mt-5 mb-0">N° Pièce d’identité du ressortissant:</label>
    <input id="cin" name="cin" type="text" placeholder="CIN du ressortissant" class="w-9/12  mx-auto block rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 @error('cin') border-pink-600  placeholder:text-pink-600 @enderror " value="{{ old('cin', $ressortissant->cin) }}" required />
     @if ($errors->has('cin'))
        <span class="w-9/12  mx-auto text-pink-600">{{ $errors->first('cin') }}</span>
    @endif

    <label for="nom" class="text-gray-700 mt-5 mb-0">Nom: </label>
    <input id="nom" name="nom" type="text" placeholder="Nom du ressortissant" class="w-9/12  mx-auto block rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 @error('nom') border-pink-600  placeholder:text-pink-600 @enderror" value="{{ old('nom', $ressortissant->nom) }}" required />
     @if ($errors->has('nom'))
        <span class="w-9/12  mx-auto text-pink-600">{{ $errors->first('nom') }}</span>
    @endif

    <label for="prenom" class="text-gray-700 mt-5 mb-0">Prénom:</label>
    <input id="prenom" name="prenom" type="text"  placeholder = "Prénom du ressortissant"  class="w-9/12  mx-auto block rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 @error('prenom') border-pink-600  placeholder:text-pink-600 @enderror" value="{{ old('prenom', $ressortissant->prenom) }}" required/>
     @if ($errors->has('prenom'))
        <span class="w-9/12  mx-auto text-pink-600">{{ $errors->first('prenom') }}</span>
    @endif

    <label for="date_naissance" class="text-gray-700 mt-5 mb-0">Date de la naissance: </label>
    <input id="date_naissance" name="date_naissance" type="date" class="w-9/12  mx-auto block rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 @error('date_naissance') border-pink-600  placeholder:text-pink-600 @enderror" value="{{ old('date_naissance', $ressortissant->date_naissance) }}"/>
    @if ($errors->has('date_naissance'))
        <span class="w-9/12  mx-auto text-pink-600">{{ $errors->first('date_naissance') }}</span>
    @endif

    <label for="mail" class="text-gray-700 mt-5 mb-0">Email:</label>
    <input id="mail" name="mail" type="text"  placeholder = "Email"  class="w-9/12  mx-auto block rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 @error('mail') border-pink-600  placeholder:text-pink-600 @enderror" value="{{ old('mail', $ressortissant->mail) }}" required/>
     @if ($errors->has('mail'))
        <span class="w-9/12  mx-auto text-pink-600">{{ $errors->first('mail') }}</span>
    @endif

    <label for="adresse" class="text-gray-700 mt-5 mb-0">L'adresse:</label>
    <input id="adresse" name="adresse" type="text"  placeholder = "L'adresse"  class="w-9/12  mx-auto block rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 @error('adresse') border-pink-600  placeholder:text-pink-600 @enderror" value="{{ old('adresse', $ressortissant->adresse) }}" required/>
     @if ($errors->has('adresse'))
        <span class="w-9/12  mx-auto text-pink-600">{{ $errors->first('adresse') }}</span>
    @endif

    <label for="nationalite" class="text-gray-700 mt-5 mb-0">Nationalité:</label>
    <select name="nationalite" id="nationalite" class="w-9/12  mx-auto block rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 @error('nationalite') border-pink-600  placeholder:text-pink-600 @enderror" value="{{ old('nationalite') }}"/>
        <option value="{{$ressortissant->nationalite}}">{{$ressortissant->nationalite}}</option>
        <option value="marocaine">Marocaine</option>
        <option value="etrangere">Etrangère</option>
    </select>
    @if ($errors->has('nationalite'))
    <span class="w-9/12  mx-auto text-pink-600">{{ $errors->first('nationalite') }}</span>
    @endif

    <label for="sexe" class="text-gray-700 mt-5 mb-0">Sexe:</label>
    <select name="sexe" id="sexe" class="w-9/12  mx-auto block rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 @error('sexe') border-pink-600  placeholder:text-pink-600 @enderror" value="{{ old('sexe') }}" required/>
        <option value="{{$ressortissant->sexe}}">
            {{$ressortissant->sexe}}
        </option>
        <option value="Homme">Homme</option>
        <option value="Femme">Femme</option>
    </select>
    @if ($errors->has('sexe'))
    <span class="w-9/12  mx-auto text-pink-600">{{ $errors->first('sexe') }}</span>
    @endif

    <label for="residence" class="text-gray-700 mt-5 mb-0">Lieu de la résidence:</label>
    <input id="residence" name="residence" type="text"  placeholder = "Lieu de la résidence"  class="w-9/12  mx-auto block rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 @error('residence') border-pink-600  placeholder:text-pink-600 @enderror" value="{{ old('residence', $ressortissant->residence) }}" required/>
     @if ($errors->has('residence'))
        <span class="w-9/12  mx-auto text-pink-600">{{ $errors->first('residence') }}</span>
    @endif

    <label for="tel" class="text-gray-700 mt-5 mb-0">Tél:</label>
    <input id="tel" name="tel" type="text"  placeholder = "Tél"  class="w-9/12  mx-auto block rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 @error('tel') border-pink-600  placeholder:text-pink-600 @enderror" value="{{ old('tel', $ressortissant->tel) }}" required/>
     @if ($errors->has('tel'))
        <span class="w-9/12  mx-auto text-pink-600">{{ $errors->first('tel') }}</span>
    @endif

   
    <label for="formation" class="text-gray-700 mt-5 mb-0">Formation:</label>
    <select name="formation" id="formation" class="w-9/12  mx-auto block rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 @error('formation') border-pink-600  placeholder:text-pink-600 @enderror" value="{{ old('formation') }}" required/>
        <option value="{{$ressortissant->formation}}">{{$ressortissant->formation}}</option>

        <option value="">Séléctionner la formation</option>
        <option value="Forme juridique 1">formation 1</option>
        <option value="Forme juridique 2">formation 2</option>
        <option value="Forme juridique 3">formation 3</option>
    </select>
    @if ($errors->has('formation'))
        <span class="w-9/12  mx-auto text-pink-600">{{ $errors->first('formation') }}</span>
    @endif

    <label for="experience" class="text-gray-700 mt-5 mb-0">Expérience:</label>
    <select name="experience" id="experience" class="w-9/12  mx-auto block rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 @error('experience') border-pink-600  placeholder:text-pink-600 @enderror" value="{{ old('experience') }}" required/>
        <option value="{{$ressortissant->experience}}">{{$ressortissant->experience}}</option>

        <option value="">Séléctionner l'expérience</option>
        <option value="Expérience 1">Expérience 1</option>
        <option value="Expérience 2">Expérience 2</option>
        <option value="Expérience 3">Expérience 3</option>
    </select>
    @if ($errors->has('experience'))
        <span class="w-9/12  mx-auto text-pink-600">{{ $errors->first('experience') }}</span>
    @endif

    <label for="qualite" class="text-gray-700 mt-5 mb-0">Qualité:</label>
    <select name="qualite" id="qualite" class="w-9/12  mx-auto block rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 @error('qualite') border-pink-600  placeholder:text-pink-600 @enderror" value="{{ old('qualite', $ressortissant->qualite) }}" />
        <option value="{{ $ressortissant->qualite->qualite_id}}">{{ $ressortissant->qualite->qualite}}</option>
        @foreach ($qualites as $qualite)
            <option value="{{$qualite->qualite_id}}"> {{$qualite->qualite}} </option>
        @endforeach
    </select>
    @if ($errors->has('qualite'))
    <span class="w-9/12  mx-auto text-pink-600">{{ $errors->first('qualite') }}</span>
    @endif

    <label for="raison_social" class="text-gray-700 mt-5 mb-0">Raison social:</label>
    <input id="raison_social" name="raison_social" type="text"  placeholder = "Raison social"  class="w-9/12  mx-auto block rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 @error('raison_social') border-pink-600  placeholder:text-pink-600 @enderror" value="{{ old('raison_social', $ressortissant->raison_social) }}" required/>
     @if ($errors->has('raison_social'))
        <span class="w-9/12  mx-auto text-pink-600">{{ $errors->first('raison_social') }}</span>
    @endif

    <label for="ice" class="text-gray-700 mt-5 mb-0">ICE:</label>
    <input id="ice" name="ice" type="text"  placeholder = "ICE"  class="w-9/12  mx-auto block rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 @error('ice') border-pink-600  placeholder:text-pink-600 @enderror" value="{{ old('ice', $ressortissant->ice) }}" required/>
     @if ($errors->has('ice'))
        <span class="w-9/12  mx-auto text-pink-600">{{ $errors->first('ice') }}</span>
    @endif

    <label for="rc" class="text-gray-700 mt-5 mb-0">RC:</label>
    <input id="rc" name="rc" type="text"  placeholder = "RC"  class="w-9/12  mx-auto block rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 @error('rc') border-pink-600  placeholder:text-pink-600 @enderror" value="{{ old('rc', $ressortissant->rc) }}" required/>
     @if ($errors->has('rc'))
        <span class="w-9/12  mx-auto text-pink-600">{{ $errors->first('rc') }}</span>
    @endif

    
    <label for="date_rc" class="text-gray-700 mt-5 mb-0">Date RC:</label>
    <input id="date_rc" name="date_rc" type="date" class="w-9/12  mx-auto block rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 @error('date_rc') border-pink-600  placeholder:text-pink-600 @enderror" value="{{ old('date_rc', $ressortissant->date_rc) }}" required/>
     @if ($errors->has('date_rc'))
        <span class="w-9/12  mx-auto text-pink-600">{{ $errors->first('date_rc') }}</span>
    @endif

    <label for="lieu_rc" class="text-gray-700 mt-5 mb-0">Lieu RC:</label>
    <input id="lieu_rc" name="lieu_rc" type="text"  placeholder = "Lieu RC"  class="w-9/12  mx-auto block rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 @error('lieu_rc') border-pink-600  placeholder:text-pink-600 @enderror" value="{{ old('lieu_rc', $ressortissant->lieu_rc) }}" required/>
     @if ($errors->has('lieu_rc'))
        <span class="w-9/12  mx-auto text-pink-600">{{ $errors->first('lieu_rc') }}</span>
    @endif

    <label for="id_f" class="text-gray-700 mt-5 mb-0">IF:</label>
    <input id="id_f" name="id_f" type="text"  placeholder = "IF"  class="w-9/12  mx-auto block rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 @error('id_f') border-pink-600  placeholder:text-pink-600 @enderror" value="{{ old('id_f', $ressortissant->id_f) }}" required/>
     @if ($errors->has('id_f'))
        <span class="w-9/12  mx-auto text-pink-600">{{ $errors->first('id_f') }}</span>
    @endif


    <label for="patente" class="text-gray-700 mt-5 mb-0">Patente:</label>
    <input id="patente" name="patente" type="text"  placeholder = "Patente"  class="w-9/12  mx-auto block rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 @error('patente') border-pink-600  placeholder:text-pink-600 @enderror" value="{{ old('patente', $ressortissant->patente) }}" required/>
     @if ($errors->has('patente'))
        <span class="w-9/12  mx-auto text-pink-600">{{ $errors->first('patente') }}</span>
    @endif

    <label for="fomeJur" class="text-gray-700 mt-5 mb-0">Forme Juriqides:</label>
    <select name="fomeJur" id="fomeJur" class="w-9/12  mx-auto block rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 @error('fomeJur') border-pink-600  placeholder:text-pink-600 @enderror" value="{{ old('fomeJur') }}"/>
        <option value="{{$ressortissant->juridiqueForme->formeJur_id}}">{{$ressortissant->juridiqueForme->formeJur}} </option>
        @foreach ($formesJur as $fomeJur)
            <option value="{{$fomeJur->formeJur_id}}">{{$fomeJur->formeJur}}</option>
        @endforeach
    </select>
    @if ($errors->has('fomeJur'))
        <span class="w-9/12  mx-auto text-pink-600">{{ $errors->first('fomeJur') }}</span>
    @endif

    <label for="SelectSecteur" class="text-gray-700 mt-5 mb-0">Secteur:</label>
    <select name="secteur" id="SelectSecteur" class="w-9/12  mx-auto block rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 @error('secteur') border-pink-600  placeholder:text-pink-600 @enderror" value="{{ old('secteur') }}" required/>
        <option value="{{$ressortissant->secteurs->sect_id}}">{{$ressortissant->secteurs->secteur}} </option>
        @foreach ($secteurs as $secteur)
            <option value="{{$secteur->sect_id}}">{{$secteur->secteur}}</option>
        @endforeach
    </select>
    @if ($errors->has('secteur'))
    <span class="w-9/12  mx-auto text-pink-600">{{ $errors->first('secteur') }}</span>
    @endif

    <label for="activite" class="text-gray-700 mt-5 mb-0">L'activité:</label>
    <input id="activite" name="activite" type="text"  placeholder = "L'activité"  class="w-9/12  mx-auto block rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 @error('activite') border-pink-600  placeholder:text-pink-600 @enderror" value="{{ old('activite', $ressortissant->activite) }}" required/>
     @if ($errors->has('activite'))
        <span class="w-9/12  mx-auto text-pink-600">{{ $errors->first('activite') }}</span>
    @endif

    <label for="domaine" class="text-gray-700 mt-5 mb-0">Domaine:</label>
    <select name="domaine" id="domaine" class="w-9/12  mx-auto block rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 @error('domaine') border-pink-600  placeholder:text-pink-600 @enderror" value="{{ old('domaine', $ressortissant->domaine) }}" required />
        <option value="{{$ressortissant->domaines->dom_id}}">{{$ressortissant->domaines->domaine}}</option>
      {{-- ajax output --}}
    </select>
    @if ($errors->has('domaine'))
    <span class="w-9/12  mx-auto text-pink-600">{{ $errors->first('domaine') }}</span>
    @endif

    <label for="cont_accom" class="text-gray-700 mt-5 mb-0">L'état de contrat d'accompagnement:</label>
    <select name="cont_accom" id="cont_accom" class="w-9/12  mx-auto block rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 @error('cont_accom') border-pink-600  placeholder:text-pink-600 @enderror" value="{{ old('cont_accom', $ressortissant->cont_accom) }}" required />
        @if ($ressortissant->accompagnement)
        <option value="1">Activé</option>
        @else
        <option value="0">désactivé</option>
        @endif
        <option value="1">Activé</option>
        <option value="0">désactivé</option>
    </select>

    <button type="submit" class="mx-auto p-2 m-5 rounded-sm w-fit bg-green-200 border border-slate-500  text-slate-600 hover:bg-green-300 hover:cursor-pointer">Modéfier le ressortissant</button>

</form>


<script>
document.getElementById('img').onchange = function () {
  var src = URL.createObjectURL(this.files[0])
  document.getElementById('display-image').src = src
}

</script>
@endsection
