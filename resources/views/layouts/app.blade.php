<!DOCTYPE html>
<html lang="fr">

<head>
    @include('parts.head')
</head>

<body class="bg-blue-900">
    <img class="absolute w-1/4 max-h-full max-w-[479px] -z-10" src="./img/left.png" alt="cover">
    <img class="absolute right-0 w-1/4 max-w-[479px] max-h-full mt-8 -z-10" src="./img/right.png" alt="cover">
    <header>
        @include('parts.header')
    </header>

    <main>
        @yield('main')
    </main>

    <footer>
        @include('parts.footer')
    </footer>
	
  @vite('resources/js/app.js')
</body>

</html>
