<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('administation.update', $fonctionnaire->fonc_id) }}">
            @csrf
            @method('PUT')
            <!-- Old -->
           <div class=" mb-5 border rounded-md shadow-sm p-3">
                <div>
                    <x-label for="oldUsername" :value="__('Courant Username')" />
                    <x-input id="oldUsername" class="block mt-1 w-full" type="text" name="oldUsername" :value="old('oldUsername')" required  autocomplete="off"/>
                </div>

                <div class="mt-4">
                    <x-label for="oldPassword" :value="__('Courant Mot de passe')" />

                    <x-input id="oldPassword" class="block mt-1 w-full"
                                    type="Password"
                                    name="oldPassword"
                                    required />
                </div>

                <div class="mt-4 pt-2 border-t-4">
                    <x-label for="newusername" :value="__('Username')" />
    
                    <x-input id="newusername" class="block mt-1 w-full" type="text" name="newusername" :value="old('newusername')" required autocomplete="off"/>
                </div>
    
                 <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Mot de passe')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required  />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Confirmer le mot de passe')" />

                <x-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required />
            </div>

           </div>

           
            <!-- Nom -->
            <div class="mt-4">
                <x-label for="nom" :value="__('Nom')" />

                <x-input id="nom" class="block mt-1 w-full" type="text" name="nom" :value="old('nom', $fonctionnaire->nom)" required />
            </div>

            <!-- Prenom -->
            <div class="mt-4">
                <x-label for="prenom" :value="__('Prenom')" />

                <x-input id="prenom" class="block mt-1 w-full" type="text" name="prenom" :value="old('prenom', $fonctionnaire->prenom)" required />
            </div>
            <!-- Cin -->
            <div class="mt-4">
                <x-label for="cin" :value="__('Cin')" />

                <x-input id="cin" class="block mt-1 w-full" type="text" name="cin" :value="old('cin', $fonctionnaire->cin)" required />
            </div>

                  <!-- Sexe -->
            <div class="mt-4">
                <x-label for="sexe" :value="__('Sexe')" />

                <select name="sexe" id="sexe" class='block w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50' >
                    @if ($fonctionnaire->sexe == "H")     
                    <option value="H">Homme</option>
                    @else
                    <option value="F">Femme</option>
                    @endif
                    <option value="H">Homme</option>
                    <option value="F">Femme</option>
                </select>
            </div>

           
              <!-- admin -->
              <div class="mt-4">
                <x-label for="admin" :value="__('Admin')" />

                <select name="sexe" id="sexe" class='block w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50' >
                    @if ($fonctionnaire->admin == 1)
                        <option value="1">Admin</option>
                        @else
                        <option value="0">N'est pas admin</option>
                        @endif
                        <option value="1">Admin</option>
                        <option value="0">N'est pas admin</option>
                </select>
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-button class="ml-4">
                    {{ __('Enregistrer les modification') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
