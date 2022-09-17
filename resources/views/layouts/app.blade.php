<!DOCTYPE html>
<html lang="fr">

<head>
    @include('parts.head')
</head>

<body class="bg-blue-900">
    <div id="cloud1" class="-z-20">
        <div class="shadow-xl obl obl1 "></div>
         <div class="obl obl2"></div>
         <div class="obl obl3"></div>
     </div>
     <div id="cloud2" class="-z-20">
        <div class="shadow-xl obl obl1"></div>
         <div class="obl obl2"></div>
         <div class="obl obl3"></div>
     </div>
     <div id="sun">
        <div class="shadow-xl objsun"></div>
     </div>
    <img class="absolute w-1/4 max-h-full max-w-[479px] pt-8 md:pt-2 -z-10" src="./img/left.png" alt="cover">
    <img class="absolute right-0 w-1/4 max-w-[479px] max-h-full mt-48 -z-10" src="./img/right.png" alt="cover">
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
