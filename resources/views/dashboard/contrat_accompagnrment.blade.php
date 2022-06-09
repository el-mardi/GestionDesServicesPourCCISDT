@extends('dashboard')

@section('dashboard')

<form action="{{route('enregis_accompagnement')}}" method="POST" class="flex-col flex">
    @csrf
    
    <label for="num_contrat_accom" class="text-gray-700 mt-5 mb-0">Numero du contrat: </label>
    <input type="text" class="toDisableIt w-9/12 mx-auto block rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-5 "
    value="{{$lastElement}}/{{$date}}" disabled/>
    
    <input type="hidden" name="num_contrat_accom" value="{{$lastElement}}">

    <label for="selectservice" class="text-gray-700 mt-5 mb-0">Action: </label>
    <select id="selectservice"  class="toDisableIt w-9/12  mx-auto block rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 @error('services') border-pink-600  placeholder:text-pink-600 @enderror" value="{{ old('services') }}" >

        <option value="" >Sélectionner une action</option>
        @foreach ($services as $service)
        <option value="{{$service->service_id}}">{{$service->service}}</option>
        @endforeach
    </select>
    @if ($errors->has('services'))
    <span class="w-9/12  mx-auto text-pink-600">{{ $errors->first('services') }}</span>
    @endif
    <table class="border-separate border border-slate-400 w-8/12 mx-auto mt-5">
        <thead>
          <tr>
            <th class="border border-slate-300 ">Action</th>
            <th class="border border-slate-300  w-2/12">Supprimer</th>
          </tr>
        </thead>
        <tbody id="hiddenservices">
        </tbody>
    </table>

    <label for="ressortissant" class="text-gray-700 mt-5 mb-0">N° Pièce d’identité d'accompagné:</label>
    <input id="ressortissant" name="ressortissant" type="text" placeholder="N° Pièce d’identité d'accompagné" class="toDisableIt w-9/12  mx-auto block rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 @error('ressortissant') border-pink-600  placeholder:text-pink-600 @enderror " value="{{ old('ressortissant') }}" required />
     @if ($errors->has('ressortissant'))
        <span class="w-9/12  mx-auto text-pink-600">{{ $errors->first('ressortissant') }}</span>
        <a href="{{route('ressortissant.create')}}" class="mx-auto p-2 text-sm  bg-orange-200 rounded-sm w-fit hover:cursor-pointer hover:bg-orange-300">Ajouter ressortissant</a>
    @endif

    <label for="representant" class="text-gray-700 mt-5 mb-0">N° Pièce d’identité de représentant: </label>
    <input id="representant" name="representant" type="text" placeholder="N° Pièce d’identité de représentant" class="toDisableIt w-9/12  mx-auto block rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 @error('representant') border-pink-600  placeholder:text-pink-600 @enderror" value="{{ old('representant') }}"  />
     @if ($errors->has('representant'))
        <span class="w-9/12  mx-auto text-pink-600">{{ $errors->first('representant') }}</span>
        <a href="#" class="mx-auto p-2 text-sm  bg-orange-200 rounded-sm w-fit hover:cursor-pointer hover:bg-orange-300">Ajouter representant</a>
    @endif 

    <label for="province" class="text-gray-700 mt-5 mb-0">Province:</label>
    <select id="province" name="province"  class="toDisableIt w-9/12  mx-auto block rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 @error('province') border-pink-600  placeholder:text-pink-600 @enderror" value="{{ old('province') }}" >
        <option value="">Séléctionner le province</option>
        <option value="OUARZAZATE">OUARZAZATE</option>
        <option value="ERRACHIDIA">ERRACHIDIA</option>
        <option value="TINGHIR">TINGHIR</option>
        <option value="MIDELT">MIDELT</option>
        <option value="ZAGORA">ZAGORA</option>
    </select>
    @if ($errors->has('province'))
        <span class="w-9/12  mx-auto text-pink-600">{{ $errors->first('province') }}</span>
    @endif

    <label for="date_debut" class="text-gray-700 mt-5 mb-0">Date du debut:</label>
    <input id="date_debut" name="date_debut" type="date" class="toDisableIt w-9/12  mx-auto block rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 @error('date_debut') border-pink-600  placeholder:text-pink-600 @enderror" value="{{ $date }}" required/>
    @if ($errors->has('date_debut'))
    <span class="w-9/12  mx-auto text-pink-600">{{ $errors->first('date_debut') }}</span>
    @endif

    <label for="date_fin" class="text-gray-700 mt-5 mb-0">Date de la fin:</label>
    <input id="date_fin" name="date_fin" type="date" class="toDisableIt w-9/12  mx-auto block rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 "  @error('date_fin') border-pink-600  placeholder:text-pink-600 @enderror" value="{{ old('date_fin') }}" required />
    @if ($errors->has('date_fin'))
       <span class="w-9/12  mx-auto text-pink-600">{{ $errors->first('date_fin') }}</span>
   @endif

   <label for="duree" class="text-gray-700 mt-5 mb-0">Durée (min):</label>
   <input id="duree" name="duree" type="number"  placeholder = "durée"  class="toDisableIt w-9/12  mx-auto block rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 @error('duree') border-pink-600  placeholder:text-pink-600 @enderror" value="{{ old('duree') }}" required/>
    @if ($errors->has('duree'))
       <span class="w-9/12  mx-auto text-pink-600">{{ $errors->first('duree') }}</span>
   @endif

    <label for="remarque" class="text-gray-700 mt-5 mb-0">Remarque:</label>
    <textarea name="remarque" id="remarque" placeholder="remarques ..." class="toDisableIt h-20 w-9/12  mx-auto block rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 " value="{{ old('remarque') }}"></textarea>


    <div onclick="showSubmit()" id="leDiv" class="mx-auto p-2 m-5 bg-lime-200 rounded-sm shadow-lg w-fit hover:cursor-pointer hover:bg-lime-300 border border-lime-400">Vérifier votre contrat d'accompagnement</div>

        <div id='createBtn' class="mx-auto" style="display: none"> 
            <button id="submit" type="submit" class='mx-auto p-2 m-5 bg-green-300 rounded-md shadow-lg w-fit hover:cursor-pointer hover:bg-green-400'>Enregistrer & Imprimer le contrat</button>  
            
            <div onclick='cancelSubmitForm()' class='mx-auto p-2 m-5 bg-orange-300 rounded-md shadow- w-fit hover:cursor-pointer hover:bg-orange-400 ' style='display:inline-block'>   Annuler  </div> 
        </div>
</form>

<script>
    function suppservice($id){
        var el =document.getElementById($id).remove();
        var value = $id;
            $.ajax({    
             headers: {
                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
             },
 
             type:'POST',
             url:'suppservice',
             data:{id:value},
             success:function(data){
                //  console.log(data);
             },
             error:function(data){
                console.log(JSON.stringify(error));
             }

          });
        
}

function showSubmit (){

    alert("Vérifier votre contrat d'accompagnement");
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