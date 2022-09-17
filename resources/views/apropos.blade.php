@extends('layouts.app')

@section('main')
     <!-- BLOCK apropos -->
     <section class="text-gray-600 body-font">
      <div class="container flex flex-col px-5 pt-16 mx-auto md:pt-24">
        <div class="mx-auto lg:max-w-5xl">
          <h1 class="mb-4 text-3xl font-medium text-center text-black sm:text-4xl">A propos de moi</h1>
          <div class="flex flex-col mt-10 sm:flex-row">
            <div class="text-center sm:w-1/3 sm:pr-8 sm:py-8">
              <div class="inline-flex items-center justify-center w-20 h-20 bg-gray-200 rounded-full ">
                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-10 h-10" viewBox="0 0 24 24">
                  <path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"></path>
                  <circle cx="12" cy="7" r="4"></circle>
                </svg>
              </div>
              <div class="flex flex-col items-center justify-center text-center text-black">
                <h2 class="mt-4 text-lg font-medium">Phoebe Caulfield</h2>
                <div class="w-12 h-1 mt-2 mb-4 bg-blue-800 rounded"></div>
                <p class="text-base">Raclette knausgaard hella meggs normcore williamsburg enamel pin sartorial venmo tbh hot chicken gentrify portland.</p>
              </div>
            </div>
            <div class="pt-4 mt-4 text-center border-t border-gray-200 sm:w-2/3 sm:pl-8 sm:py-8 sm:border-l sm:border-t-0 sm:mt-0 sm:text-left">
              <p class="mb-2 text-lg leading-relaxed text-black">Meggings portland fingerstache lyft, post-ironic fixie man bun banh mi umami everyday carry hexagon locavore direct trade art party.
                man bun banh mi umami everyday carry hexagon locavore direct trade art party.
              </p>
              <a class="inline-flex items-center text-blue-800">Learn More
                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-2" viewBox="0 0 24 24">
                  <path d="M5 12h14M12 5l7 7-7 7"></path>
                </svg>
              </a>
            </div>
          </div>
        </div>
      </div>
    </section>
   
@endsection