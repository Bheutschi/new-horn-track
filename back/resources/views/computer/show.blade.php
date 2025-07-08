@extends('layouts.app')
@section('title', 'Historique')
@section('content')
    <main class="container mx-auto pt-20 pl-30">
        <h1 class="text-3xl font-semibold text-gray-800">
            Historique des prêts
        </h1>
    </main>
        <div class="flex items-center mx-auto w-full flex-col p-30">
            <div class="bg-white w-7xl border border-gray-200 rounded-lg shadow-sm p-6 relative">
                <header class="items-center p-3 ">
                    <div class="flex justify-between  p-4">
                        <h2 class="text-lg font-bold">{{$computer->name}}</h2>
                    </div>
                </header>
                <table class="table">
                    <thead>
                    <tr>
                        <th>Bénéficiaire</th>
                        <th>Email du bénéficiaire</th>
                        <th>Préteur</th>
                        <th>État de retour</th>
                        <th>Début du prêt</th>
                        <th>Réceptionnaire</th>
                        <th>Retour du prêt</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($computerHistory as $computer)
                        <tr>
                            <td>{{$computer->user->name}}</td>
                            <td>{{$computer->user->email}}</td>
                            <td>{{$computer->loaner->name}}</td>
                            <td>{{$computer->return_status}}</td>
                            <td>{{$computer->start_at->format('H:i:s d-m-Y')}}</td>
                            <td>{{$computer->returnLoaner->name}}</td>
                            <td>{{$computer->end_at->format('H:i:s d-m-Y')}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
@endsection