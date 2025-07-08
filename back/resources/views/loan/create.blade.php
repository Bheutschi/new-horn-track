@extends('layouts.app')
@push('imports')
    @use('App\Models\{User, Computer}')
@endpush
@section('title', 'Prêter un ordinateur')
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
    <div class="flex flex-col items-center ">
        @if(session('return_computer') && session('computer_uuid'))
            <main class="container mx-auto pt-20 pl-30 pb-30">
                <h1 class="text-3xl font-semibold text-gray-800">
                    Retour de l'ordinateur par son code
                </h1>
            </main>
            <fieldset class="fieldset flex flex-col items-center justify-center bg-base-200 border-base-300 rounded-box w-sm border p-4">
                <form class="w-full flex flex-col items-center" action="{{route('loans.update', session('return_computer'))}}" method="POST">
                    @csrf
                    @method('PATCH')
                    <label class="w-full max-w-md floating-label !pointer-events-none py-5">
                        <input type="text" name="computer_uuid" value="{{session('computer_uuid')}}"
                               class="w-full input !outline-green-500  !outline-offset-0 outline-solid"/>
                    </label>
                    <label class="floating-label w-full max-w-md pb-5">
                        <livewire:user-autocomplete
                                :model="User::class"
                                :searchable="['email']"
                                display="email"
                                name="email"
                                :placeholder="'Email du bénéficiaire'"
                                :loans="true"
                        />
                        <span>Email du bénéficiaire</span>
                    </label>
                    <label class="floating-label w-full max-w-md pb-4">
                        <input type="text" class="w-full input" placeholder="État de retour" name="returnStatus"/>
                        <span>État de retour</span>
                    </label>
                    <div class="w-full max-w-md flex justify-start">
                        <input type="checkbox" class="checkbox" name="defect"/>
                        <label class="label ml-2">Déféctueux ?</label>
                    </div>
                    <div class="w-full max-w-md flex justify-end">
                        <button type="submit" class="btn btn-neutral btn-xs">Ajouter</button>
                    </div>
                </form>
            </fieldset>
        @elseif(session('return_computer') && session('computer_name'))
            <main class="container mx-auto pt-20 pl-30 pb-30">
                <h1 class="text-3xl font-semibold text-gray-800">
                    Retour de l'ordinateur par son nom
                </h1>
            </main>
            <fieldset class="fieldset flex flex-col items-center justify-center bg-base-200 border-base-300 rounded-box w-sm border p-4">
                <form class="w-full flex flex-col items-center" action="{{route('loans.update', session('return_computer'))}}" method="POST">
                    @csrf
                    @method('PATCH')
                    <label class="w-full max-w-md floating-label !pointer-events-none py-7">
                        <input type="text" name="computer_name" value="{{session('computer_name')}}"
                               class="w-full input !outline-green-500  !outline-offset-0 outline-solid"/>
                        <span>Numéro de l'ordinateurs</span>
                    </label>
                    <label class="floating-label w-full max-w-md pb-5">
                        <livewire:user-autocomplete
                                :model="User::class"
                                :searchable="['email']"
                                display="email"
                                name="email"
                                :placeholder="'Email du bénéficiaire'"
                                :loans="true"
                        />
                        <span>Email du bénéficiaire</span>
                    </label>
                    <label class="floating-label w-full max-w-md pb-4">
                        <input type="text" class="w-full input" placeholder="État de retour" name="returnStatus"/>
                        <span>État de retour</span>
                    </label>
                    <div class="w-full max-w-md flex justify-start">
                        <input type="checkbox" class="checkbox" name="defect"/>
                        <label class="label ml-2">Déféctueux ?</label>
                    </div>
                    <div class="w-full max-w-md flex justify-end">
                        <button type="submit" class="btn btn-neutral btn-xs">Ajouter</button>
                    </div>
                </form>
            </fieldset>
        @else
            @if(session('computer_uuid'))
                <main class="container mx-auto pt-20 pl-30 pb-30">
                    <h1 class="text-3xl font-semibold text-gray-800">
                        Prêt de l'ordinateur par son code
                    </h1>
                </main>
                <fieldset class=" fieldset bg-base-200 border-base-300 rounded-box w-xs border p-4">
                    <form action="{{route('loans.store')}}" method="POST">
                        @csrf
                        <label class="w-full max-w-md floating-label !pointer-events-none py-7">
                            <input type="text" name="computer_uuid" value="{{session('computer_uuid')}}"
                                   class=" input !outline-green-500  !outline-offset-0 outline-solid"/>
                            <span>UUID</span>
                        </label>
                        <label class="floating-label w-full max-w-md pb-4" >
                            <livewire:user-autocomplete
                                    :model="User::class"
                                    :searchable="['email']"
                                    display="email"
                                    name="email"
                                    :placeholder="'Email du bénéficiaire'"
                            />
                            <span>Email du bénéficiaire</span>
                        </label>
                        <div class="w-full max-w-md flex justify-end">
                            <button type="submit" class="btn btn-neutral btn-xs">Ajouter</button>
                        </div>
                    </form>
                </fieldset>
            @elseif(session('computer_name'))
                <main class="container mx-auto pt-20 pl-30 pb-30">
                    <h1 class="text-3xl font-semibold text-gray-800">
                        Prêt de l'ordinateur par son nom
                    </h1>
                </main>
                <fieldset class="fieldset flex flex-col items-center justify-center bg-base-200 border-base-300 rounded-box w-sm border p-4">
                    <form class="w-full flex flex-col items-center" action="{{route('loans.store')}}" method="POST">
                        @csrf
                        <label class="w-full max-w-md floating-label !pointer-events-none py-7">
                            <input type="text" name="computer_name" value="{{session('computer_name')}}"
                                   class=" w-full input !outline-green-500  !outline-offset-0 outline-solid"/>
                            <span>Numéro de l'ordinateurs</span>
                        </label>
                        <label class="floating-label w-full max-w-md pb-4" >
                            <livewire:user-autocomplete
                                    :model="User::class"
                                    :searchable="['email']"
                                    display="email"
                                    name="email"
                                    :placeholder="'Email du bénéficiaire'"
                            />
                            <span>Email du bénéficiaire</span>
                        </label>
                        <div class="w-full max-w-md flex justify-end">
                            <button type="submit" class="btn btn-neutral btn-xs">Ajouter</button>
                        </div>
                    </form>
                </fieldset>
            @endif
            @if(session()->missing('computer_uuid') && session()->missing('computer_name'))
                <main class="container mx-auto pt-20 pl-30 pb-30">
                    <h1 class="text-3xl font-semibold text-gray-800">
                        Prêt et retour d’ordinateurs
                    </h1>
                </main>
                <fieldset
                        class=" fieldset flex flex-col items-center justify-center bg-base-200 border-base-300 rounded-box w-sm border p-4">
                    <form class="w-full flex flex-col items-center" action="{{route('loans.check')}}" method="POST">
                        @csrf
                        <label class="floating-label w-full max-w-md">
                            <input name="computer_uuid" type="text" class="input w-full" placeholder="UUID"
                                   autocomplete="off" autofocus/>
                            <span>UUID</span>
                        </label>
                        <div class="w-full max-w-md flex justify-end">
                            <button type="submit" class="hidden btn btn-neutral btn-xs mt-2">Ajouter</button>
                        </div>
                    </form>
                    <div class="divider">OU</div>
                    <form class="w-full flex flex-col items-center" action="{{route('loans.check')}}" method="POST">
                        @csrf
                            <label class="floating-label w-full max-w-md pb-4">
                                <input name="computer_name" type="text" class="input w-full" placeholder="Numéro de l'ordinateur"
                                       autocomplete="off" autofocus/>
                                <span>Numéro de l'ordinateur</span>
                            </label>
                        <div class="w-full max-w-md flex justify-end">
                            <button type="submit" class="btn btn-neutral btn-xs">Ajouter</button>
                        </div>
                    </form>
                </fieldset>
            @endif
        @endif
    </div>
@endsection
