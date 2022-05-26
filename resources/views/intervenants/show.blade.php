@extends('dashboard')

@section('dashboard')
    
<div class="w-fit mx-auto p-2 " >Le partenaire: 
    @isset($serv_inter[0])
       <span class="m-3 pb-1 border-b border-b-rose-800 rounded-sm text-rose-800 font-bold"> {{$serv_inter[0]->intervenant}}</span>
    @endisset
</div>

<table class="border-collapse text-sm mt-5 mx-auto">
    <thead class="bg-rose-300">
      <tr class="">
        <th class="p-2 border border-rose-300" >Les services</th>
        <th class="p-2 border border-rose-300" >Le statut</th>
        <th class="p-2 border border-rose-300" >Remarque</th>
        
        <th class="p-2 border border-rose-300" >Consulter</th>
      </tr>
    </thead>
    <tbody>

        @foreach ($serv_inter as $services)
        @foreach ($services->intervenantsServices as $service)
        <tr class="odd:bg-rose-50 even:bg-rose-100 border">
            <td  class="p-2 border border-rose-300" >{{$service->service}}</td>
            <td  class="p-2 border border-rose-300" >
              @if ($service->pivot->satut == 1)
                  Activé
              @else
                  désactivé
              @endif
            </td>
            <td  class="p-2 border border-rose-300" >{{$service->pivot->remarque}}</td>
           
            <td class="p-2 border border-rose-300 text-center" ><a 
                href="services/{{$service->service_id}}"
                ><i class="fa-solid fa-file-lines fa-lg" style="color: blue"></i></a></td>
        </tr>
        @endforeach
        @endforeach
      
    </tbody>
  </table>
@endsection
