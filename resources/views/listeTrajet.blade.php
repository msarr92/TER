<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Liste Trajet') }}
        </h2>

    </x-slot>
    <a href="/ajoutTrajet" class="btn btn-sm btn-primary float-end" >Ajouter des Trajets</a>
    <div class="card-body">
        <table id="datatablesSimple" class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Gare Depart</th>
                    <th>Gare D'arriver</th>
                    <th>Place Disponible</th>
                    <th>Tarif</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @php
                $id=1;
            @endphp
                     @foreach ($trajet as $listetrajet)
                     <tr>
                        <td>{{$id}}</td>
                        <td>{{$listetrajet->gareDepart}}</td>
                        <td>{{$listetrajet->gareAriver}}</td>
                        <td>{{$listetrajet->placeDispo}}</td>
                        <td>{{$listetrajet->tarif}}</td>
                        <td>
                            <a href="" class="btn btn-sm btn-success">Faire une Reservation</a>
                        </td>
                    </tr>
                    @php
                    $id+=1;
                @endphp
                     @endforeach
            </tbody>
        </table>
    </div>




</x-app-layout>
