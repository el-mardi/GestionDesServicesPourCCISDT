@extends('dashboard')

@section('dashboard')
    
<div class="w-fit mx-auto p-2 " >Le partenaire: 
    @isset($intervenants[0])
       <span class="m-3 pb-1 border-b border-b-rose-800 rounded-sm text-rose-800 font-bold"> {{$intervenants[0]->partenaire->partenaire}}</span>
    @endisset
</div>

<table class="border-collapse text-sm mt-5 mx-auto">
    <thead class="bg-rose-300">
      <tr class="">
        <th class="p-2 border border-rose-300" >Les intervenants</th>

        
        <th class="p-2 border border-rose-300" >Consulter</th>
        <th class="p-2 border border-rose-300" >Modifer</th>
        @if (Auth::user()->admin === 1)
        <th class="p-2 border border-rose-300" >Supprimer</th>
        @endif
      </tr>
    </thead>
    <tbody>

        @foreach ($intervenants as $intervenant)
        <tr class="odd:bg-rose-50 even:bg-rose-100 border">
            <td  class="p-2 border border-rose-300" >{{$intervenant->intervenant}}</td>
           
            <td class="p-2 border border-rose-300 text-center" ><a 
                {{-- href="intervenants/{{$intervenant->intervenant_id}}" --}}
                ><i class="fa-solid fa-file-lines fa-lg" style="color: blue"></i></a></td>
            <td class="p-2 border border-rose-300 text-center" ><a 
                {{-- href="{{route('intervenants.edit', $intervenant->intervenant_id)}}" --}}
                ><i class="fa-solid fa-file-pen fa-lg" style="color: green"></i></a></td>
            @if (Auth::user()->admin === 1)
            <th class="p-2 border border-rose-300" ><i class="fa-solid fa-trash-can" style="color: red"></i></th>
            @endif
        </tr>
        @endforeach
      
      
    </tbody>
  </table>
@endsection
