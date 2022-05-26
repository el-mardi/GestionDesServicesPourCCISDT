<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Username -->
            <div>
                <x-label for="username" :value="__('Username')" />

                <x-input id="username" class="block mt-1 w-full" type="text" name="username" :value="old('username')" required autofocus />
            </div>

            <!-- Nom -->
            <div class="mt-4">
                <x-label for="nom" :value="__('Nom')" />

                <x-input id="nom" class="block mt-1 w-full" type="text" name="nom" :value="old('nom')" required autofocus />
            </div>

            <!-- Prenom -->
            <div class="mt-4">
                <x-label for="prenom" :value="__('Prenom')" />

                <x-input id="prenom" class="block mt-1 w-full" type="text" name="prenom" :value="old('prenom')" required autofocus />
            </div>
            <!-- Cin -->
            <div class="mt-4">
                <x-label for="cin" :value="__('Cin')" />

                <x-input id="cin" class="block mt-1 w-full" type="text" name="cin" :value="old('cin')" required autofocus />
            </div>

                  <!-- Sexe -->
            <div class="mt-4">
                <x-label for="sexe" :value="__('Sexe')" />

                <select name="sexe" id="sexe" class='block w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50' >
                    <option value="F">Femme</option>
                    <option value="H">Homme</option>
                </select>
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Mot de passe')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Confirmer le mot de passe')" />

                <x-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required />
            </div>

              <!-- admin -->
              <div class="mt-4">
                <x-label for="admin" :value="__('Admin')" />

                <x-input id="admin" class="block w-5 h-5 rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 " type="checkbox" name="admin" :value="old('admin')"  />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-button class="ml-4">
                    {{ __('Créer un compt') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
