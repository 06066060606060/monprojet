<!DOCTYPE html>
<html lang="fr">

<head>
    @include('parts.head')
</head>

<body>
    <header>
        @include('parts.header')
    </header>

    <main>
        @yield('main')
    </main>

    <footer class="px-4 py-8 text-gray-400">
        @include('parts.footer')
    </footer>
	
  @vite('resources/js/app.js')
</body>

</html>
