@extends('layouts.app')

@section('main')
    <!-- BLOCK 1 -->
    <section class="m-4 text-gray-600 bckg">
        <div class="max-w-[90%] flex flex-col items-center justify-center mx-auto pt-24 md:pt-4">
            <img class="object-cover object-center w-[80vh] select-none" alt="hero" src="./img/Home_Logo.png">
            <img class="absolute select-none md:mt-4 w-[80%] md:w-auto" alt="hero" src="./img/paint.png">
            <img id="" class="absolute -mt-2 w-[60%] md:w-auto md:p-8 select-none" alt="hero"
                src="./img/title.png">
            <img id="title" class="absolute -mt-2 w-[60%] md:w-auto md:p-8 select-none opacity-0" alt="hero"
                src="./img/title2.png">
            <img class="absolute select-none w-[80%] md:mt-8 md:w-auto" alt="hero" src="./img/bombe.png" id="bomb"
                onclick="changepaint();">
            <img class="absolute mt-32  w-[60%] md:w-auto select-none" alt="hero" src="./img/soustitre.png">
        </div>
    </section>

    <script>
        function paint() {
            var opacity = document.getElementById("title").style.opacity;
            document.getElementById("title").style.opacity = opacity ? (parseFloat(opacity) + 0.05) : 0.1;
        }
        function changepaint() {
            setInterval(paint, 200);

        }
    </script>
@endsection
