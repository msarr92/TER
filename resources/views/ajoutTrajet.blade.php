<x-guest-layout>
    <form method="POST" action="{{ route('ajout-trajet') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="gareDepart" :value="__('Gare Depart')" />
            <x-text-input id="gareDepart" class="block mt-1 w-full" type="text" name="gareDepart" :value="old('gareDepart')" required autofocus autocomplete="gareDepart" />
            <x-input-error :messages="$errors->get('gareDepart')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="gareAriver" :value="__('Gare Arriver')" />
            <x-text-input id="gareAriver" class="block mt-1 w-full" type="text" name="gareAriver" :value="old('gareAriver')" required autofocus autocomplete="gareAriver" />
            <x-input-error :messages="$errors->get('gareAriver')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="date" :value="__('Date Depart')" />
            <x-text-input id="dateDepart" class="block mt-1 w-full" type="date" name="dateDepart" :value="old('dateDepart')" required autocomplete="dateDepart" />
            <x-input-error :messages="$errors->get('dateDepart')" class="mt-2" />
        </div>

        <!-- Password -->
        <div>
            <x-input-label for="placeDispo" :value="__('Place Disponible')" />
            <x-text-input id="placeDispo" class="block mt-1 w-full" type="number" name="placeDispo" :value="old('placeDispo')" required autofocus autocomplete="placeDispo" />
            <x-input-error :messages="$errors->get('placeDispo')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div>
            <x-input-label for="tarif" :value="__('Tarif')" />
            <x-text-input id="tarif" class="block mt-1 w-full" type="text" name="tarif" :value="old('tarif')" required autofocus autocomplete="tarif" />
            <x-input-error :messages="$errors->get('tarif')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            

            <a href="/listeTrajet" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-dark focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Revenir a la liste</a>
            <x-primary-button class="ms-4">
                {{ __('Ajouter') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
