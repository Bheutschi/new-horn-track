@extends('layouts.app')
@section('title', 'Dashboard')
@section('content')
    <main class="container mx-auto pt-20 pb-30">
        <h1 class="text-3xl font-semibold text-gray-800">
            Dashboard
        </h1>
    </main>
    <div class="flex items-center mx-auto container flex-col">
        <div class="bg-white w-full border border-gray-200 rounded-lg shadow-sm p-6 relative">
            <header class="items-center py-3">
                <div class="flex justify-between p-4">
                    <h2 class="text-lg font-bold">PC en cours de prêt</h2>
                    <div class="gap-2">
                        <p class="">Total: {{count($loans)}}</p>
                    </div>
                </div>
            </header>
            <table class="table">
                <thead>
                <tr>
                    <th>Numéro</th>
                    <th>Marque</th>
                    <th>Bénéficiaire</th>
                    <th>Prêter par</th>
                    <th>Heure du prêt</th>
                </tr>
                </thead>
                <tbody>
                @foreach($loans as $loan)
                    @if($loan->start_at->diffInHours(now()) > 24)
                        <tr class=" border-2 border-solid border-red-500">
                            <td>{{$loan->computer->name}}</td>
                            <td>{{$loan->computer->brand}}</td>
                            <td>{{$loan->user->name}}</td>
                            <td>{{$loan->loaner->name}}</td>
                            <td>{{$loan->start_at->format('H:i:s d-m-Y')}}</td>
                            <td>
                                <a href="{{route('computers.show', $loan->computer->id)}}" class="btn btn-ghost btn-xs">détails</a>
                            </td>
                        </tr>
                    @else
                        <tr>
                            <td>{{$loan->computer->name}}</td>
                            <td>{{$loan->computer->brand}}</td>
                            <td>{{$loan->user->name}}</td>
                            <td>{{$loan->loaner->name}}</td>
                            <td>{{$loan->start_at->format('H:i:s d-m-Y')}}</td>
                            <td>
                                <a href="{{route('computers.show', $loan->computer->id)}}" class="btn btn-ghost btn-xs">détails</a>
                            </td>
                        </tr>
                    @endif
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="divider"></div>
    <div class="flex items-center mx-auto container flex-col">
        <div class="bg-white w-full border border-gray-200 rounded-lg shadow-sm p-6 relative">
            <header class="items-center py-3 ">
                <div class="flex justify-between p-4">
                    <h2 class="text-lg font-bold">PC libres</h2>
                    <div>
                        <p class="">Total: {{count($computers)}}</p>
                    </div>
                </div>
            </header>
            <table class="table">
                <thead>
                <tr>
                    <th>Numéro</th>
                    <th>Marque</th>
                    <th>Modèle</th>
                    <th>État du dernier retour</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($computers as $computer)
                    <tr>
                        <td>{{$computer->name}}</td>
                        <td>{{$computer->brand}}</td>
                        <td>{{$computer->model}}</td>
                        <td>{{$computer->lastLoan->return_status ?? 'Pas encore prêté' }}</td>
                        <td>
                            <a href="{{route('computers.show', $computer->id)}}"
                               class="btn btn-ghost btn-xs">détails</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
