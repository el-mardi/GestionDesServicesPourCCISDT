@extends('dashboard')

@section('dashboard')

<form action="{{route('enregis_adhesion')}}" method="POST" class="flex-col flex">
    @csrf
    
    <label for="num_contrat_adhesion" class="text-gray-700 mt-5 mb-0">Numero du contrat: </label>
    <input type="text" class="toDisableIt w-9/12 mx-auto block rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-5 "
    value="{{$lastElement}}" disabled/>
    
    <input type="hidden" name="num_contrat_adhesion" value="{{$lastElement}}">

    
    <label for="num_recu" class="text-gray-700 mt-5 mb-0">Numero de recu:</label>
    <input id="num_recu" name="num_recu" type="text" placeholder="numero de recu" class="toDisableIt w-9/12  mx-auto block rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 @error('num_recu') border-pink-600  placeholder:text-pink-600 @enderror " value="{{ old('num_recu') }}" required />
     @if ($errors->has('num_recu'))
        <span class="w-9/12  mx-auto text-pink-600">{{ $errors->first('num_recu') }}</span>
        
    @endif

    <label for="selectpack" class="text-gray-700 mt-5 mb-0">Services: </label>
    <select id="selectpack"  class="toDisableIt w-9/12  mx-auto block rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 @error('selectpack') border-pink-600  placeholder:text-pink-600 @enderror" value="{{ old('selectpack') }}" >

        <option value="" >Sélectionner un pack</option>
        @foreach ($packs as $pack)
        <option value="{{$pack->pack_id}}">{{$pack->nom_pack}}</option>
        @endforeach
    </select>
    @if ($errors->has('selectpack'))
    <span class="w-9/12  mx-auto text-pink-600">{{ $errors->first('selectpack') }}</span>
    @endif
    <table class="border-separate border border-slate-400 w-8/12 mx-auto mt-5">
        <thead>
          <tr>
            <th class="border border-slate-300 ">Service</th>
            <th class="border border-slate-300  w-2/12">Supprimer</th>
          </tr>
        </thead>
        <tbody id="hiddenpacks">
        </tbody>
    </table>

    <label for="ressortissant" class="text-gray-700 mt-5 mb-0">CIN d'accompagné:</label>
    <input id="ressortissant" name="ressortissant" type="text" placeholder="le cin d'accompagné" class="toDisableIt w-9/12  mx-auto block rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 @error('ressortissant') border-pink-600  placeholder:text-pink-600 @enderror " value="{{ old('ressortissant') }}" required />
     @if ($errors->has('ressortissant'))
        <span class="w-9/12  mx-auto text-pink-600">{{ $errors->first('ressortissant') }}</span>
        <a href="{{route('ressortissant.create')}}" class="mx-auto p-2 text-sm  bg-orange-200 rounded-sm w-fit hover:cursor-pointer hover:bg-orange-300">Ajouter ressortissant</a>
    @endif

    <label for="representant" class="text-gray-700 mt-5 mb-0">CIN de représentant: </label>
    <input id="representant" name="representant" type="text" placeholder="le cin de représentant" class="toDisableIt w-9/12  mx-auto block rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 @error('representant') border-pink-600  placeholder:text-pink-600 @enderror" value="{{ old('representant') }}" required />
     @if ($errors->has('representant'))
        <span class="w-9/12  mx-auto text-pink-600">{{ $errors->first('representant') }}</span>
        <a href="#" class="mx-auto p-2 text-sm  bg-orange-200 rounded-sm w-fit hover:cursor-pointer hover:bg-orange-300">Ajouter représentant</a>
    @endif 

    <label for="province" class="text-gray-700 mt-5 mb-0">Province:</label>
    <input id="province" name="province" type="text"  placeholder = "province"  class="toDisableIt w-9/12  mx-auto block rounded-md border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 @error('province') border-pink-600  placeholder:text-pink-600 @enderror" value="{{ old('province') }}" required/>
     @if ($errors->has('province'))
        <span class="w-9/12  mx-auto text-pink-600">{{ $errors->first('province') }}</span>
    @endif

    <label for="date_debut" class="text-gray-700 mt-5 mb-0">Date du debut:</label>
    <input id="date_debut" name="date_debut" type="date" class="toDisableIt w-9/12  mx-auto block rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 @error('date_debut') border-pink-600  placeholder:text-pink-600 @enderror" value="{{ old('date_debut') }}" required/>
    @if ($errors->has('date_debut'))
    <span class="w-9/12  mx-auto text-pink-600">{{ $errors->first('date_debut') }}</span>
    @endif

    <label for="date_fin" class="text-gray-700 mt-5 mb-0">Date de la fin:</label>
    <input id="date_fin" name="date_fin" type="date" class="toDisableIt w-9/12  mx-auto block rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 "  @error('date_fin') border-pink-600  placeholder:text-pink-600 @enderror" value="{{ old('date_fin') }}" required />
    @if ($errors->has('date_fin'))
       <span class="w-9/12  mx-auto text-pink-600">{{ $errors->first('date_fin') }}</span>
   @endif


    <label for="remarque" class="text-gray-700 mt-5 mb-0">Remarque:</label>
    <textarea name="remarque" id="remarque" placeholder="remarques ..." class="toDisableIt h-20 w-9/12  mx-auto block rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 " value="{{ old('remarque') }}"></textarea>


    <div onclick="showSubmit()" id="leDiv" class="mx-auto p-2 m-5 bg-indigo-200 rounded-md shadow-lg w-fit hover:cursor-pointer hover:bg-indigo-300">Vérifier votre contrat d'adhesion</div>

        <div id='createBtn' class="mx-auto" style="display: none"> 
            <button id="submit" type="submit" class='mx-auto p-2 m-5 bg-green-300 rounded-md shadow-lg w-fit hover:cursor-pointer hover:bg-green-400'>Enregistrer Imprimer le contrat</button>  
            
            <div onclick='cancelSubmitForm()' class='mx-auto p-2 m-5 bg-orange-300 rounded-md shadow- w-fit hover:cursor-pointer hover:bg-orange-400 ' style='display:inline-block'>   Annuler  </div> 
        </div>
</form>

<script>
    function supppack($id){
        var el =document.getElementById($id).remove();
        var value = $id;
            $.ajax({    
             headers: {
                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
             },
 
             type:'POST',
             url:'supppack',
             data:{id:value},
             success:function(data){
                 console.log(data);
             },
             error:function(data){
                console.log(JSON.stringify(error));
             }

          });
        
}

function showSubmit (){

        $('#leDiv').css('display', 'none');
        $('#createBtn').css('display', 'block');
        $(".toDisableIt").prop("readonly", true);
}

    function cancelSubmitForm () {
        $('#createBtn').css('display', 'none');
        $('#leDiv').css('display', 'block');
        $(".toDisableIt").prop("readonly", false);
}

  
    
</script>
@endsection