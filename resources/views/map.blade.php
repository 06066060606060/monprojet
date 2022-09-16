@extends('layouts.app')

@section('main')

   <!-- BLOCK CARTE -->
  <section>
    <div class="container flex flex-col items-center justify-center px-5 pt-4 mx-auto">

      <div class="relative top-32 md:top-18 lg:top-32 xl:top-48"><a href="/nord"  class="p-2 bg-blue-400 rounded-full shadow-xl">Nord</a></div>
      <div class="relative top-48 md:top-64 xl:top-80 xl:left-32 left-20"><a href="/est"  class="p-2 bg-blue-400 rounded-full shadow-xl">Est</a></div>
      <div class="relative top-48 xl:top-64 md:top-52 right-24 md:right-32 lg:right-32 xl:right-48"><a href="/ouest"  class="p-2 bg-blue-400 rounded-full shadow-xl">Ouest</a></div>
      <img class="object-cover object-center w-5/6 p-4 rounded xl:w-3/6 lg:w-3/6 md:w-4/6" alt="hero" src="./img/mapregion.png">
      <div class="relative bottom-24 md:bottom-32 xl:bottom-48"><a href="/sud"  class="p-2 bg-blue-400 rounded-full shadow-xl">sud</a></div>

      <div class="w-full text-center lg:w-2/3">
        <h1 class="mb-4 text-3xl font-medium text-gray-900 title-font sm:text-4xl">Séléctionnez la zone à explorer</h1>
        <p class="mb-4 leading-relaxed">Meggings kinfolk echo park stumptown DIY, kitsch vice godard disrupt ramps hexagon mustache umami snackwave tilde chillwave ugh. Pour-over meditation PBR&amp;B pickled ennui celiac mlkshk freegan photo booth af fingerstache pitchfork.</p>
       
      </div>
    </div>
  </section>
@endsection