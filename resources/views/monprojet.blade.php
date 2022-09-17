@extends('layouts.app')

@section('main')
 <!-- BLOCK 2 -->
 <section class="z-10">
  <div class="h-18"></div>
  <div class="max-w-screen-lg px-4 pt-1 mx-auto md:pt-16 md:py-16 sm:px-6 lg:px-8">
    <div class="grid grid-cols-1 gap-1 md:gap-1 lg:gap-2 lg:grid-cols-2">
      <div class="relative h-64 overflow-hidden rounded-lg sm:h-80 lg:h-full lg:order-last">
        <img class="absolute inset-0 object-cover h-full mx-auto rounded-lg" src="/img/vent.png"
          alt="" />
      </div>

      <div class="lg:py-24 md:mx-16">
        <h2 class="text-3xl font-bold sm:text-4xl">Mon projet de recherche</h2>
        <p class="mt-2">
          Lorem ipsum dolor, sit amet consectetur adipisicing elit. Aut qui hic
          atque tenetur quis eius quos ea neque sunt, accusantium soluta minus
          veniam tempora deserunt? Molestiae eius quidem quam repellat.
        </p>
       @include('parts.modal')
      </div>
    </div>
  </div>

</section>

   
@endsection