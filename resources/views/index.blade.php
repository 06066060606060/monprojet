@extends('layouts.app')

@section('main')
    <!-- BLOCK 1 -->
    <section id="full" class="m-4 text-gray-600 bckg">
        <div  class="max-w-[90%] flex flex-col items-center justify-center mx-auto pt-24 md:pt-4">
            <img id="logo" class="object-cover object-center w-[80vh] select-none" alt="hero" src="./img/Home_Logo.png">

            <img id= "paint" class="absolute select-none md:mt-4 w-[75%] md:w-auto" alt="hero" src="./img/paint.png">

            <img id="geograff" class="absolute -mt-2 w-[60%] md:w-auto md:p-8 select-none" alt="hero" src="./img/title.png">

            <img id="title" class="absolute -mt-2 w-[60%] md:w-auto md:p-8 select-none opacity-0" alt="hero" src="./img/title2.png">
  
            <img class="absolute select-none w-[80%] md:mt-8 md:w-auto" alt="hero" src="./img/bombe.png" id="bomb"  onclick="changepaint()">
   
            <img class="absolute mt-32  w-[60%] md:w-auto select-none z-50 animate__animated animate__fadeInUp animate__slow" alt="hero" src="./img/soustitre.png">
        </div>
    </section>

    
    <script>
        // function paint() {
        //     var opacity = document.getElementById("title").style.opacity;
        //     document.getElementById("title").style.opacity = opacity ? (parseFloat(opacity) + 0.05) : 0.1;
        // }
        // function changepaint() {
        //     setInterval(paint, 150);

        // }

// (function() {
//     // Add event listener
//     document.addEventListener("mousemove", parallax);
//     const elem = document.querySelector("#full")
//     // Magic happens here
//     function parallax(e) {
//         let _w = window.innerWidth/4;
//         let _h = window.innerHeight/4;
//         let _mouseX = e.clientX;
//         let _mouseY = e.clientY;
//         let _depthX = `${30 - (_mouseX - _w) * 0.001}`;
//         let _depthY = `${34 - (_mouseY - _h) * 0.001}`;
//         let _depth2 = `${50 - (_mouseX - _w) * 0.02}% ${50 - (_mouseY - _h) * 0.02}%`;
//         let _depth3 = `${50 - (_mouseX - _w) * 0.06}% ${50 - (_mouseY - _h) * 0.06}%`;
//        // let x = `${_depth3}, ${_depth2}, ${_depth1}`;
//         console.log(_depthY);
//         elem.style.top = _depthY + '%';
//         elem.style.marginleft = _depthX +'%';
//     }

// })();



    </script>
@endsection
