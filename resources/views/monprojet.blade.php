@extends('layouts.app')

@section('main')
 <!-- BLOCK 2 -->
 <section class="z-10">
  <div class="h-18"></div>
  <div class="max-w-screen-lg px-4 pt-1 mx-auto md:pt-8 md:py-16 sm:px-6 lg:px-16">
    <div class="grid grid-cols-1 gap-8 lg:gap-16 lg:grid-cols-2">
      <div class="relative h-64 overflow-hidden rounded-lg sm:h-80 lg:h-full lg:order-last">
        <img class="absolute inset-0 object-cover w-1/2 h-full mx-auto rounded-lg md:w-[80%] shadow-lg" src="https://www.hyperui.dev/photos/man-1.jpeg"
          alt="" />
      </div>

      <div class="lg:py-24 md:mx-16">
        <h2 class="text-3xl font-bold sm:text-4xl">Mon projet de recherche</h2>
        <p class="mt-2">
          Lorem ipsum dolor, sit amet consectetur adipisicing elit. Aut qui hic
          atque tenetur quis eius quos ea neque sunt, accusantium soluta minus
          veniam tempora deserunt? Molestiae eius quidem quam repellat.
        </p>
        <button class="px-4 py-2 mt-2 font-bold text-white bg-blue-600 rounded shadow-lg hover:bg-blue-700"><a href="/moncv">CV Académique</a></button>
      </div>
    </div>
  </div>

</section>

   
@endsection