<!DOCTYPE html>
<html lang="fr">

<head>
    @include('parts.head')
</head>

<body class="bg-blue-900" onmousemove="myFunction(event)" onmouseout="clearCoor()">
    <div id="cloud1" class="-z-20 animate__animated animate__fadeInLeftBig">
        <div class="shadow-xl obl obl1 "></div>
         <div class="obl obl2"></div>
         <div class="obl obl3"></div>
     </div>
     <div id="cloud2" class="-z-20 animate__animated animate__fadeInLeftBig hidden md:block ">
        <div class="shadow-xl obl obl1"></div>
         <div class="obl obl2"></div>
         <div class="obl obl3"></div>
     </div>
     <div id="sun" class="animate__animated animate__fadeInDown">
        <div class="shadow-xl objsun"></div>
     </div>
    <img class="treeleft absolute w-1/4 max-h-full -ml-2 md:-ml-6 max-w-[459px] pt-24 md:pt-2 -z-10" src="./img/left.png" alt="cover">
    <img class="treeright absolute right-0 w-1/4 max-w-[459px] max-h-full mt-32 -z-10" src="./img/right.png" alt="cover">
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
