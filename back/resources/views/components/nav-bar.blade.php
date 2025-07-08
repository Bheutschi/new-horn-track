<div class="navbar bg-base-100 shadow-sm px-20">
    <div class="navbar-start">
            <a href="{{route('loans.create')}}" class="font-bold text-xl">HornTrack</a>
    </div>
    <div class="navbar-center">
        <div class="flex-none">
            <ul class="menu menu-horizontal px-1">
                <li><a class="text-base" href="{{route('loans.index')}}">Dashboard</a></li>
                <li><a class="text-base" href="{{route('loans.create')}}">Prêter un PC</a></li>
                <li><a class="text-base" href="{{route('computers.index')}}">Liste des PC</a></li>
            </ul>
        </div>
    </div>
    <div class="navbar-end">
        <a href="{{route('logout')}}" class="btn btn-ghost btn-circle">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0 0 13.5 3h-6a2.25 2.25 0 0 0-2.25 2.25v13.5A2.25 2.25 0 0 0 7.5 21h6a2.25 2.25 0 0 0 2.25-2.25V15M12 9l-3 3m0 0 3 3m-3-3h12.75" />
                </svg>
        </a>
    </div>
</div>
