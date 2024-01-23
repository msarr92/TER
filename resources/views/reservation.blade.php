<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Reservation') }}
        </h2>
    </x-slot>
    <div class="max-w-2xl mx-auto sm:px-3 lg:px-2">
        <div class="row-2">
            <form id="genererPrix" method="POST" action="{{ route('faire-reserve') }}">
                @csrf

                <div>
                    <x-input-label for="gareD" :value="__('Gare Depart')" />
                    <select name="gareD" class="block mt-1 w-full">
                        @foreach($trajet as $listetrajet)
                        <option id="gareD" value="{{$listetrajet->Nom}}"> {{$listetrajet->Nom}}</option>
                        @endforeach
                    </select>
                    <x-input-error :messages="$errors->get('gareD')" class="mt-2" />
                </div>

                <div>
                    <x-input-label for="gareA" :value="__('Gare Arriver')" />
                    <select name="gareA" class="block mt-1 w-full">
                        @foreach($trajet as $listetrajet)
                        <option id="gareA" value="{{$listetrajet->Nom}}">{{$listetrajet->Nom}}</option>
                        @endforeach
                    </select>
                    <x-input-error :messages="$errors->get('gareA')" class="mt-2" />
                </div>

                <div>
                    <x-input-label for="classeP" :value="__('Classe')" />
                    <select name="classeP" id="classeP" class="block mt-1 w-full">
                        @foreach($listeclasse as $Classe)
                        <option id="classeP" value="{{$Classe->NomClasse}}">{{$Classe->NomClasse}}</option>
                        @endforeach
                    </select>
                    <x-input-error :messages="$errors->get('classeP')" class="mt-2" />
                </div>

                <div class="mt-4">
                    <x-input-label for="date" :value="__('Date Reservation')" />
                    <x-text-input id="dateReservation" class="block mt-1 w-full" type="date" name="dateReservation" :value="old('dateReservation')" autocomplete="dateReservation" />
                    <x-input-error :messages="$errors->get('dateReservation')" class="mt-2" />
                </div>

                <div class="mt-4">
                    <x-input-label for="billet" :value="__('Nombre Billet')" />
                    <x-text-input id="billet" class="block mt-1 w-full" type="text" name="billet" :value="old('billet')" autocomplete="billet" type="number" />
                    <x-input-error :messages="$errors->get('billet')" class="mt-2" />
                </div>
                <!--
                <div class="mt-4">
                    <x-input-label for="tarif"/>
                    <x-text-input id="tarif" class="block mt-1 w-full" type="text" name="tarif" disabled />
                </div>
                -->

                <div class="flex items-center justify-end mt-4">
                    <x-primary-button type="submit" class="ms-4">
                        {{ __('Reservation') }}
                    </x-primary-button>
                </div>

            </form>
        </div>
    </div>
</x-app-layout>
