<x-app-layout>  
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot> --}}

    <div class="pb-14 pt-5 ">
        <div class="max-w-7xl mx-auto">

            <div class=" border-b border-lime-100 flex gap-2 text-stone-800">  
                @if (Auth::user()->admin === 1 )
                <table class="mx-0 border-separate border border-gray-400  rounded h-full w-4/12">
                    <thead class="  ">
                        <tr class=" {{request()->routeIs('ressortissant.*') ? "bg-blue-500  text-gray-200 "  : " bg-blue-200 "}} hover:bg-blue-300 ">
                            <th class="border border-indigo-400 text-left text-sm border-separate">
                                <a href="{{route('ressortissant.index')}}" class=" block py-3 p-2"> <i class=" fa-solid fa-users  fa-lg px-1"></i> RESSORTISSANT</a>
                            </th>
                        </tr>
                        <tr class=" {{request()->routeIs('orientation') ? "bg-blue-500  text-gray-200 "  : " bg-blue-200 "}} hover:bg-blue-300 ">
                            <th class="border border-indigo-400 text-left text-sm border-separate">
                                <a href="{{route('orientation') }}" class=" block py-3 p-2"><i class=" fa-solid fa-handshake-angle  fa-lg px-1"></i> ORIENTATION</a>
                            </th>
                        </tr>
                        <tr class="hover:bg-blue-300 {{request()->routeIs('accompagnement') ? "bg-blue-500  text-gray-200 "  : " bg-blue-200"}} ">
                            <th class="border border-indigo-400 text-left text-sm border-separate">
                            <a href="{{route('accompagnement')}}" class=" block py-3 p-2"><i class=" fa-solid fa-file-signature  fa-lg px-1"></i> CONTRAT D'ACCOMPAGNEMENT</a>
                            </th>
                        </tr>
                       
                        <tr class=" {{request()->routeIs('documents') ? "bg-blue-500  text-gray-200 "  : " bg-blue-200 "}} hover:bg-blue-300 ">
                            <th class="border border-indigo-400 text-left text-sm border-separate">
                                <a href="{{route('documents')}}" class=" block py-3 p-2"><i class=" fa-solid fa-print  fa-lg px-1"></i> DELIVRENCE DE DOCUMENT</a>
                            </th>
                        </tr>
                        <tr class=" {{request()->routeIs('adhesion') ? "bg-blue-500  text-gray-200 "  : " bg-blue-200 "}} hover:bg-blue-300 ">
                            <th class="border border-indigo-400 text-left text-sm border-separate">
                                <a href="{{route('adhesion')}}" class=" block py-3 p-2"><i class=" fa-solid fa-address-card fa-lg"></i> CONTRAT D'ADHESION</a>
                            </th>
                        </tr>

                        <tr class=" {{request()->routeIs('representants.*') ? "bg-blue-500  text-gray-200 "  : " bg-blue-200 "}} hover:bg-blue-300 ">
                            <th class="border border-indigo-400 text-left text-sm border-separate">
                                <a href="{{route('representants.index')}} " class=" block py-3 p-2"><i class=" fa-solid fa-person fa-lg px-1"></i> REPRESENTANT</a>
                            </th>
                        </tr>
                        <tr class=" {{request()->routeIs('administation.*') ? "bg-blue-500  text-gray-200 "  : " bg-blue-200 "}} hover:bg-blue-300 ">
                            <th class="border border-indigo-400 text-left text-sm border-separate">
                                <a href="{{route('administation.index')}}" class=" block py-3 p-2"><i class=" fa-solid fa-users-line fa-lg px-1"></i> FONCTIONNAIRE</a>
                            </th>
                        </tr>
                        <tr class=" {{request()->routeIs('services.*') ? "bg-blue-500  text-gray-200 "  : " bg-blue-200 "}} hover:bg-blue-300 ">
                            <th class="border border-indigo-400 text-left text-sm border-separate">
                                <a href="{{route('services.index')}} " class=" block py-3 p-2"><i class=" fa-solid fa-money-check  fa-lg px-1"></i> ACTION</a>
                            </th>
                        </tr>
                        <tr class=" {{request()->routeIs('typesServices.*') ? "bg-blue-500  text-gray-200 "  : " bg-blue-200 "}} hover:bg-blue-300 ">
                            <th class="border border-indigo-400 text-left text-sm border-separate">
                                <a href="{{route('typesServices.index')}}" class=" block py-3 p-2"><i class=" fa-solid fa-money-check  fa-lg px-1"></i> SERVICE</a>
                            </th>
                        </tr>
                        
                        <tr class=" {{request()->routeIs('packs.*') ? "bg-blue-500  text-gray-200 "  : " bg-blue-200 "}} hover:bg-blue-300 ">
                            <th class="border border-indigo-400 text-left text-sm border-separate">
                                <a href="{{route('packs.index')}} " class=" block py-3 p-2"><i class=" fa-solid fa-money-check  fa-lg px-1"></i> PACK </a>
                            </th>
                        </tr>

                        <tr class=" {{request()->routeIs('formesJuridiques.*') ? "bg-blue-500  text-gray-200 "  : " bg-blue-200 "}} hover:bg-blue-300 ">
                            <th class="border border-indigo-400 text-left text-sm border-separate">
                                <a href="{{route('formesJuridiques.index')}}" class=" block py-3 p-2"><i class=" fa-solid fa-scale-balanced fa-lg px-1"></i> FORME JURIDIQUE</a>
                            </th>
                        </tr>
                        <tr class=" {{request()->routeIs('secteurs.*') ? "bg-blue-500  text-gray-200 "  : " bg-blue-200 "}} hover:bg-blue-300 ">
                            <th class="border border-indigo-400 text-left text-sm border-separate">
                                <a href="{{route('secteurs.index')}} " class=" block py-3 p-2"><i class=" fa-solid fa-briefcase fa-lg px-1"></i> SECTEUR</a>
                            </th>
                        </tr>
                        <tr class=" {{request()->routeIs('domaines.*') ? "bg-blue-500  text-gray-200 "  : " bg-blue-200 "}} hover:bg-blue-300 ">
                            <th class="border border-indigo-400 text-left text-sm border-separate">
                                <a href="{{route('domaines.index')}}" class=" block py-3 p-2"><i class=" fa-solid fa-briefcase fa-lg px-1"></i> DOMAINE</a>
                            </th>
                        </tr>
                        <tr class=" {{request()->routeIs('activites.*') ? "bg-blue-500  text-gray-200 "  : " bg-blue-200 "}} hover:bg-blue-300 ">
                            <th class="border border-indigo-400 text-left text-sm border-separate">
                                <a href="{{route('activites.index')}}" class=" block py-3 p-2"><i class=" fa-solid fa-briefcase fa-lg px-1"></i> ACTIVITE</a>
                            </th>
                        </tr>
                        <tr class=" {{request()->routeIs('qualites.*') ? "bg-blue-500  text-gray-200 "  : " bg-blue-200 "}} hover:bg-blue-300 ">
                            <th class="border border-indigo-400 text-left text-sm border-separate">
                                <a href="{{route('qualites.index')}}" class=" block py-3 p-2"><i class=" fa-solid fa-user-check fa-lg px-1"></i> QUALITE</a>
                            </th>
                        </tr>
                        
                        <tr class=" {{request()->routeIs('partenaires.*') ? "bg-blue-500  text-gray-200 "  : " bg-blue-200 "}} hover:bg-blue-300 ">
                            <th class="border border-indigo-400 text-left text-sm border-separate">
                                <a href="{{route('partenaires.index')}}" class=" block py-3 p-2"><i class=" fa-solid fa-users-line fa-lg px-1"></i> PARTENAIRE</a>
                            </th>
                        </tr>
                        <tr class=" {{request()->routeIs('intervenants.*') ? "bg-blue-500  text-gray-200 "  : " bg-blue-200 "}} hover:bg-blue-300 ">
                            <th class="border border-indigo-400 text-left text-sm border-separate">
                                <a href="{{route('intervenants.index')}}" class=" block py-3 p-2"><i class=" fa-solid fa-users-line fa-lg px-1"></i> INTERVENANT</a>
                            </th>
                        </tr>
                       
                    </thead>
                </table>

                @endif    
               
                <div class="container shadow-sm mx-auto rounded w-full mx-auto">
                    {{-- @if(! View::hasSection('dashboard')) --}}
                   
                    <div class="flex w-full mt-5">
                        <select name="" id="search-select" class="w-/12 mt-0 mb-4 ml-3 mr-0 block rounded-l-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-100 focus:ring-opacity-50 ">
                            <option value="ressortissant">Ressortissant</option>
                            <option value="representant">Representant</option>
                        </select>
                        <select name="" id="search-select-quality" class="w-/12 mt-0 mb-4 mx-0 block shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-100 focus:ring-opacity-50 ">
                            <option value="">La qualité</option>
                            @foreach ($qualites as $qualite)
                                <option value="{{$qualite->qualite_id}}" >{{$qualite->qualite}}</option>
                            @endforeach
                        </select>
                        <input id="cinSearch" type="text" placeholder="Rechercher en utilisant  CIN" class=" @if(Auth::user()->admin != 1) w-8/12 @else w-6/12  @endif mt-0 mb-4 mx-0 block rounded-r-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-100 focus:ring-opacity-50 " />
                        <div class="flex flex-col mt-0 my-auto ml-1 mr-3 ">
                            <input id="checkSearch" type="checkbox" class="h-5 w-4 mx-auto rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring-indigo-100" />
                            <span class="text-xs text-left">N de fiche de<br> reessortissant</span>
                        </div>

                    </div>
                      
                    <div class="block mx-auto w-full">
                        <span id="results" class="bg-orange-400 p-2 m-3 px-12 w-fit mx-auto  rounded-md" style="display: none">
                        </span>

                        <table id="SearchOutPutTable" class="border-collapse text-sm ml-2 mx-1 w-auto" style="display: none">
                            <thead class=" border border-indigo-400">
                              <tr class=" ">
                                <th class="py-2 px-1" >Nom et Prénom</th>
                                <th class="py-2 px-1" >CIN</th>
                                <th class="py-2 px-1" >N Fiche</th>
                                <th class="py-2 px-1" >Qualité</th>
                                <th class="py-2 px-1" >Tél</th>
                                <th class="py-2 px-1" >mail</th>
                                <th class="py-2 px-1" >Adresse</th>
                                <th class="py-2 px-1" >Consulter</th>
                                <th class="py-2 px-1" >Modifer</th>
                               
                              </tr>
                            </thead>
                            <tbody id="SearchOutPut" class="">
                              
                            </tbody>
                          </table>

                        @if (session('success'))
                        <div class="bg-lime-300 p-2 px-12 m-3 w-fit mx-auto rounded-md">
                            {{ session('success') }}
                        </div>
                        @endif
                        @if (session('error'))
                            <div class="bg-red-500 p-2 m-3 px-12 w-fit mx-auto  rounded-md" >
                                {{ session('error') }}
                            </div>
                        @endif
                       
                    </div>
                    {{-- @endif --}}

                    <div class="m-1 p-2 pl-3 pt-5 shadow-inner shadow-gray-300 rounded-lg border ">

                        @if(View::hasSection('dashboard'))
                        @yield('dashboard')                    
                        @else
                            
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function delete_form(event, table){
            var msg;
            if (table == 'qualite') {
                msg ="Les ressortissant doivent etre non associe au cette qualité ";
            }
            else if (table == 'domaine') {
                msg ="Les ressortissant doivent etre non associe au domaine ";
            }
            else if (table == 'secteur') {
                msg ="Le secteur, leurs activités et leurs domines seront supprimés ";
            }
            else if (table == 'ressortissant') {
                msg ="Les contrats, les services d'orientation, les documents de ressortissant seront supprimés ";
            }
            else if (table == 'service') {
                msg ="Les ressortissants doivent etre non associé au service ";
            }
            else if (table == 'partenaire') {
                msg ="Les partenaires et leurs intervenants seront supprimés ";
            }
            else if (table == 'intervenant') {
                msg ="L'intervenants sera supprimé ";
            }
            else if (table == 'representant') {
                msg ="Le représentant sera supprimé, et une value null sera donnée à tous les contrats ou se trouve";
            }
            else if (table == 'formeJuridique') {
                msg ="Les ressortissants doivent etre non liés au forme juridique";
            }
            else if (table == 'typeService') {
                msg =" Les services de ce type des services ne doivent etre lié avec des contrats";
            }

            var conf = confirm(msg);
            if (conf) {
                var pass = prompt("Tappez 'OK' confirmer votre action:");
                if (pass !== "OK") {
                    event.preventDefault();
                    return false;
                }
            
            }
            else{
                event.preventDefault();
                    return false;
            }
        }
          </script>
        
</x-app-layout>