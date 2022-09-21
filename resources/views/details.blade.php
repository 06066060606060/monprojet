@extends('layouts.app')

@section('main')
    <section class="px-4 pt-24">
        <div class="max-w-screen-xl py-4 mx-auto text-center bg-blue-900 shadow-xl rounded-xl">
            <div class="relative items-center px-5 pt-4 mx-auto">
                <div class="flex flex-col md:flex-row w-5xl">
                    <div class="px-8">
                    <h1
                        class="max-w-5xl py-4 text-2xl font-bold leading-none tracking-tighter text-white lg:text-5xl lg:max-w-7xl">
                        {{ $graff->nom }}
                    </h1>
                    <p class="max-w-md mt-4 text-base text-center text-white md:max-w-xl lg:mt-0">  {{ $graff->description }}
                    </p>
                    <div class="sm:max-w-lg sm:flex md:mx-auto">
                        <p class="mt-3 text-xs text-gray-400">
                            {{ $graff->artiste }}
                        
                        </p>
                    </div>
                </div>
                    <div class="flex flex-col items-center justify-center pt-8 mx-auto rounded-lg max-w-7xl">
                        <img class="object-cover object-center w-auto  max-h-[600px] rounded-xl" alt="hero" src="/storage/{{ $graff->image }}">
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
