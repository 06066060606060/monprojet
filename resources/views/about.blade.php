@extends('layouts.app')

@section('main')
    <!-- BLOCK 2 -->
    <section class="z-10">
        <div class="max-w-screen-lg px-4 pt-1 mx-auto md:py-16 sm:px-6 lg:px-8">
            <div class="w-full px-5 py-12 mx-auto lg:px-32">
                <div class="flex flex-col p-8 bg-blue-900 shadow-xl lg:flex-row lg:space-x-12 rounded-xl">
                    <div class="order-last w-full max-w-screen-sm m-auto mt-0 md:mt-12 lg:w-1/4 lg:order-first">
                        <div class="p-4 transition duration-500 ease-in-out transform bg-blue-600 rounded-lg shadow-xl">
                            <div class="flex w-32">
                                <img src="/img/avatar.jpg" class="w-16 h-16 rounded-full">
                                <div class="pt-2 pr-4 ml-4">
                                    <p class="text-sm font-medium text-gray-900">{{ $user->name }}</p>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="w-full px-4 mt-8 prose text-white lg:px-0 lg:w-3/4">

                        <div class="mt-5 mb-5 border-b border-gray-200">
                            <div class="flex flex-row items-baseline justify-center -mt-2">
                                <p class="mt-1 mb-4 text-3xl font-bold text-white">Mon Projet de Recherche</p>
                            </div>
                        </div>
                        <div class="flex flex-col">
                            <p class="mb-8 leading-relaxed">{{ $about[2]->value }}</p>
                        </div>
                        <div class="flex justify-center pb-4 md:pb-0">
                            @include('parts.cv')
                        </div>
                    </div>
                </div>
            </div>

    </section>
@endsection
