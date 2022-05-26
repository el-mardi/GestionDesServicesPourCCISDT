
@extends('dashboard')

@section('dashboard')

<form action="{{route('packs.update', $pack->pack_id)}}" method="POST" class="flex-col flex">
    @csrf
    @method('PUT')

    <label for="pack" class="text-gray-700 mt-5 mb-0">Nom du pack :</label>
    <input id="pack" name="pack" type="text" placeholder="Nom du pack " class="w-9/12  mx-auto block rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 @error('pack') border-pink-600  placeholder:text-pink-600 @enderror " value="{{ old('pack', $pack->nom_pack) }}" />
     @if ($errors->has('pack'))
        <span class="w-9/12  mx-auto text-pink-600">{{ $errors->first('pack') }}</span>
    @endif

    <label for="code" class="text-gray-700 mt-5 mb-0">Code :</label>
    <input id="code" name="code" type="text" placeholder="Code du pack" class="w-9/12  mx-auto block rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 @error('code') border-pink-600  placeholder:text-pink-600 @enderror " value="{{ old('code', $pack->code_pack) }}" />
     @if ($errors->has('code'))
        <span class="w-9/12  mx-auto text-pink-600">{{ $errors->first('code') }}</span>
    @endif

    <label for="tarif" class="text-gray-700 mt-5 mb-0">Nom du tarif :</label>
    <input id="tarif" name="tarif" type="number" placeholder="Nom du tarif " class="w-9/12  mx-auto block rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 @error('tarif') border-pink-600  placeholder:text-pink-600 @enderror " value="{{ old('tarif', $pack->pack_tarif) }}" />
     @if ($errors->has('tarif'))
        <span class="w-9/12  mx-auto text-pink-600">{{ $errors->first('tarif') }}</span>
    @endif

    <label for="statut" class="text-gray-700 mt-5 mb-0">Statut:</label>
    <select name="statut" id="statut" class="w-9/12  mx-auto block rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 @error('statut') border-pink-600  placeholder:text-pink-600 @enderror" value="{{ old('statut') }}" />
       @if ($pack->status == 1)
        <option value="1" selected>Activé</option>
       @else
        <option value="0" selected>désactivé</option>
       @endif
        <option value="1">Activé</option>
        <option value="0">désactivé</option>
    </select>
    @if ($errors->has('statut'))
    <span class="w-9/12  mx-auto text-pink-600">{{ $errors->first('statut') }}</span>
    @endif
    
    <label for="selectservice" class="text-gray-700 mt-5 mb-0">List des services:</label>
    <table class="border-collapse border border-blue-400 w-8/12 mx-auto mt-3">
        <thead class="bg-blue-300">
          <tr>
            <th class="">Service</th>
            <th class="">Code</th>
            <th class=" w-2/12">Supprimer</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($pack->services as $item)
                <tr  id="tr-{{ $item->service_id }}">
                    <td class="border border-blue-200 bg-slate-200 ">{{ $item->service }}</td>
                    <td class="border border-blue-200 bg-slate-200 ">{{ $item->code_service }}</td>
                    <td onclick="suppserviceTable({{ $item->service_id }})" class="border border-blue-200 bg-slate-200 hover:cursor-pointer"><i class='fa-solid fa-trash-can mx-10'></i></td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <label for="selectservice" class="text-gray-700 mt-5 mb-0">Service:</label>
    <select name="selectservice" id="selectservice" class="w-9/12  mx-auto block rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 @error('selectservice') border-pink-600  placeholder:text-pink-600 @enderror" value="{{ old('selectservice') }}" />
        <option value="">Secteur</option>
        @foreach ($services as $service)
            <option value="{{$service->service_id}}">{{$service->service}}</option>
        @endforeach
    </select>
    @if ($errors->has('selectservice'))
    <span class="w-9/12  mx-auto text-pink-600">{{ $errors->first('selectservice') }}</span>
    @endif

    <table class="border-separate border border-slate-400 w-8/12 mx-auto mt-5">
        <thead>
          <tr>
            <th class="border border-slate-300 ">Service</th>
            <th class="border border-slate-300  w-2/12">Supprimer</th>
          </tr>
        </thead>
        <tbody id="hiddenPackServicesEdit">
        </tbody>
    </table>

    <button type="submit" class="mx-auto p-2 m-5 bg-indigo-400 rounded-md  w-fit hover:cursor-pointer border border-indigo-500 hover:bg-inherit hover:text-indigo-600 hover:border-indigo-600">Créer une activité</button>

</form>

<script>
       function suppserviceTable($id){
        //    console.log($id);
        var el =document.getElementById('tr-'+$id).remove();
        var value = $id;
            $.ajax({    
             headers: {
                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
             },
 
             type:'POST',
             url:'suppservice',
             data:{id:value},
             success:function(data){
                 console.log(data);
             },
             error:function(data){
                console.log(JSON.stringify(error));
             }

          });
        
}

function suppservice($id){
        //    console.log($id);
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
                 console.log(data);
             },
             error:function(data){
                console.log(JSON.stringify(error));
             }

          });
        
}
</script>
@endsection
