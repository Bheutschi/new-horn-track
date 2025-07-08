<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> @yield('title') </title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('imports')
    @livewireStyles
    @production
        <script defer src={{config('services.umami.script_url')}} data-website-id={{config('services.umami.website-id')}}></script>
    @endproduction
</head>
<body>
@section('navbar')
    <x-nav-bar/>
@show

@yield('content')
@livewireScripts
</body>
</html>
