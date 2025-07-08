@extends('layouts.app')
@section('title', 'Ordinateurs')
@section('content')
    <main class="container mx-auto pt-20 pl-30">
        <h1 class="text-3xl font-semibold text-gray-800">
            Liste des pc
        </h1>
    </main>
        <div class="flex items-center mx-auto container flex-col p-30">
            <div class="bg-white w-full  border border-gray-200 rounded-lg shadow-sm p-6 relative">
                <table class="table">
                    <thead>
                    <tr>
                        <th>Disponibilité</th>
                        <th>Numéro</th>
                        <th>Marque</th>
                        <th>Modèle</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($computers as $computer)
                        <tr>
                            <td>
                                @if($computer->available)
                                    <div aria-label="status" class="status status-xl status-success"></div>
                                @else
                                    <div aria-label="status" class="status status-xl status-error"></div>
                                @endif
                            </td>
                            <td>{{$computer->name}}</td>
                            <td>{{$computer->brand}}</td>
                            <td>{{$computer->model}}</td>
                            <th>
                                <a href="{{route('computers.show', $computer->id)}}" class="btn btn-ghost btn-xs">détails</a>
                            </th>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <a href="{{ route('computers.create') }}" class="btn btn-neutral mt-4">Ajouter un PC</a>
        </div>
@endsection