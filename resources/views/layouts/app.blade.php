<!DOCTYPE html>
<html lang="fr">

<head>
    @include('parts.head')
</head>

<body class="bg-blue-900">
    <div id="cloud1" class="-z-20 animate__animated animate__fadeInLeftBig">
        <div class="shadow-xl obl obl1 "></div>
         <div class="obl obl2"></div>
         <div class="obl obl3"></div>
     </div>
     <div id="cloud2" class="hidden -z-20 animate__animated animate__fadeInLeftBig md:block ">
        <div class="shadow-xl obl obl1"></div>
         <div class="obl obl2"></div>
         <div class="obl obl3"></div>
     </div>
     <div id="sun" class="animate__animated animate__fadeInDown">
        <div class="shadow-xl objsun"></div>
     </div>
     {{-- <img src="/img/dolphin.png" alt="" id="dolphin" class="absolute bottom-10"> --}}
    <img class="treeleft absolute w-1/4 max-h-full -ml-2 md:-ml-6 max-w-[459px] pt-24 md:pt-2 -z-10" src="/img/left.png" alt="cover">
    <img class="treeright absolute right-0 w-1/4 max-w-[459px] max-h-full mt-32 -z-10" src="/img/right.png" alt="cover">
    <header>
        @include('parts.header')
    </header>

    <main>
        @yield('main')
    </main>

    <footer>  
        @include('parts.footer')
    </footer>
	<script>
        function myFunction() {
         document.getElementById("dolphin").style.animation = "dolphinus 4s ease-in-out";
      
        }
        </script>
  @vite('resources/js/app.js')
</body>

</html>
