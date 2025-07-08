@extends('layouts.app')
@section('title', 'Ajouter un ordinateur')
@section('content')
    @if ($errors->any())
        <div role="alert" class="alert alert-error">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 shrink-0 stroke-current" fill="none"
                 viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"/>
            </svg>
            @foreach ($errors->all() as $error)
                <span>{{ $error }}</span>
            @endforeach
        </div>
    @endif
    <main class="max-w-7xl mx-auto pt-20 px-4 lg:px-8">
        <h1 class="text-xl sm:text-2xl xl:text-3xl font-semibold text-gray-800">
            Ajouter un nouvel ordinateur
        </h1>
    </main>
    <div class="flex flex-col items-center p-16 xl:p-20">
        <fieldset class="fieldset flex flex-col items-center justify-center bg-base-200 border-base-300 rounded-box w-sm xl:w-md border p-4">
            <form class="w-full" action="{{route('computers.store')}}" method="POST">
                @csrf
                <label class="floating-label w-full max-w-md pb-5">
                    <input type="text" class="w-full input" placeholder="UUID" name="id" required autofocus autocomplete="off"/>
                    <span>UUID</span>
                </label>

                <label class="floating-label w-full max-w-md pb-5">
                    <input type="text" class="w-full input" placeholder="Numéro de l'ordinateur" name="name" required autocomplete="off"/>
                    <span>Numéro de l'ordinateur</span>
                </label>
                <label class="floating-label w-full max-w-md pb-5">
                    <input type="text" class="w-full input" placeholder="Marque de l'ordinateur" name="brand" required autocomplete="off"/>
                    <span>Marque de l'ordinateur</span>
                </label>
                
                <label class="floating-label w-full max-w-md pb-4">
                    <input type="text" class="w-full input" placeholder="Modèle de l'ordinateur" name="model" required autocomplete="off"/>
                    <span>Modèle de l'ordinateur</span>
                </label>

                <div class="w-full max-w-md flex justify-end">
                    <button type="submit" class="btn btn-neutral btn-xs">Ajouter</button>
                </div>
            </form>

        </fieldset>
    </div>
@endsection