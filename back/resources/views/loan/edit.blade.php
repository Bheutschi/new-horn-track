@extends('layouts.app')
@push('imports')
    @use('App\Models\{User, Computer}')
@endpush
@section('title', 'Retour du PC')
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
        <h1 class="text-5xl font-bold my-20">Retour de l'ordinateur</h1>
        @if(session('computer_uuid'))
            <fieldset class=" fieldset bg-base-200 border-base-300 rounded-box w-xs border p-4">
                <form action="{{route('loans.update', $loan->id)}}" method="POST">
                    @csrf
                    @method('PATCH')
                    <label class="floating-label !pointer-events-none py-7">
                        <input type="text" name="computer_uuid" value="{{session('computer_uuid')}}"
                               class=" input !outline-green-500  !outline-offset-0 outline-solid"/>
                        <span>UUID</span>
                    </label>
                    <label class="floating-label">
                        <livewire:user-autocomplete
                                :model="User::class"
                                :searchable="['email']"
                                display="email"
                                name="email"
                                :placeholder="'Email du bénéficiaire'"
                        />
                        <span>Email du bénéficiaire</span>
                    </label>
                    <input type="text" class="input" placeholder="Quel est l'état de retour ?" name="returnStatus" list="status"/>
                    <datalist id="status">
                        <option value="OK"></option>
                        <option value="Quelques marques"></option>
                        <option value="Déféctueux"></option>
                    </datalist>
                    <div class="flex flex-row-reverse">
                        <button type="submit" class="btn btn-neutral btn-xs mt-2">Ajouter</button>
                    </div>
                </form>
            </fieldset>
        @elseif(session('computer_name'))
            <fieldset class=" fieldset bg-base-200 border-base-300 rounded-box w-xs border p-4">
                <form action="{{route('loans.store')}}" method="POST">
                    @csrf
                    <label class="floating-label !pointer-events-none py-7">
                        <input type="text" name="computer_name" value="{{session('computer_name')}}"
                               class=" input !outline-green-500  !outline-offset-0 outline-solid"/>
                        <span>Numéro de l'ordinateurs</span>
                    </label>
                    <label class="floating-label">
                        <livewire:user-autocomplete
                                :model="User::class"
                                :searchable="['email']"
                                display="email"
                                name="email"
                                :placeholder="'Email du bénéficiaire'"
                        />
                        <span>Email du bénéficiaire</span>
                    </label>
                    <div class="flex flex-row-reverse">
                        <button type="submit" class="btn btn-neutral btn-xs mt-2">Ajouter</button>
                    </div>
                </form>
            </fieldset>
        @endif
        @if(session()->missing('computer_uuid') && session()->missing('computer_name'))

            <fieldset
                    class=" fieldset flex flex-col items-center justify-center bg-base-200 border-base-300 rounded-box w-xl border p-4">
                <form class="w-md" method="post" action="{{route('loans.return')}}">
                    @csrf
                    <input class="hidden" name="loan_id" value="{{$loan->id}}">
                    <label class="floating-label">
                        <input name="computer_uuid" type="text" class="input" placeholder="UUID"
                               autocomplete="off" autofocus/>
                        <span>UUID</span>
                    </label>
                    <button type="submit" class=" hidden btn btn-neutral mt-4">Ajouter</button>
                </form>
                <div class="divider">OU</div>
                <form action="{{route('loans.return')}}" method="POST">
                    @csrf
                    <div class="flex w-full flex-col">
                        <label class="floating-label">
                            <livewire:user-autocomplete
                                    :model="Computer::class"
                                    :searchable="['name']"
                                    display="name"
                                    name="computer_name"
                                    :placeholder="'Numéro de l\'ordinateur'"
                            />
                            <span>Numéro de l'ordinateur</span>
                        </label>
                    </div>
                    <div class="flex flex-row-reverse">
                        <button type="submit" class="btn btn-neutral btn-xs mt-2 ">Ajouter</button>
                    </div>
                </form>
            </fieldset>
        @endif
    </div>
@endsection
