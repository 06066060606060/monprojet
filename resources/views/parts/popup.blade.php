<div x-data="{ modelOpen: false }" class="z-50">
    <button @click="modelOpen =!modelOpen" id="secondary-button" class=""></button>

    <div x-cloak x-show="modelOpen" class="fixed inset-0 z-50 overflow-y-auto" aria-labelledby="modal-title" role="dialog"
        aria-modal="true">
        <div class="flex items-end justify-center px-4 text-center md:items-center sm:block sm:p-0">
            <div x-cloak @click="modelOpen = false" x-show="modelOpen"
                x-transition:enter="transition ease-out duration-300 transform" x-transition:enter-start="opacity-0"
                x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-200 transform"
                x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
                class="fixed inset-0 transition-opacity bg-gray-900 bg-opacity-60" aria-hidden="true"></div>

            <div x-cloak x-show="modelOpen" x-transition:enter="transition ease-out duration-300 transform"
                x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                x-transition:leave="transition ease-in duration-200 transform"
                x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                class="inline-block pt-16 overflow-hidden transition-all transform rounded-lg">
                <section class=""  @click="modelOpen = false">
                    
                    <div class="w-full py-8 space-y-3 text-gray-100 bg-blue-900 shadow-xl rounded-xl">
                        <div class="container flex flex-col px-5 mx-auto">
                            <div class="flex flex-col w-5xl">
                               
                                <h1
                                    class="max-w-5xl pt-4 pb-2 text-2xl font-bold leading-none tracking-tighter text-white lg:text-4xl lg:max-w-7xl">
                                    {{ $graff->nom }}
                                </h1>
                                <div class="flex flex-col items-center">
                                <p class="max-w-md mt-2 text-base text-white md:max-w-xl">{{ $graff->description }}</p>
                                    <p class="max-w-md mt-2 text-xl text-white mx-auto">{{ $graff->artiste }}</p>
                                </div>
                            </div>
                                <div class="flex flex-col items-center justify-center pt-8 mx-auto rounded-lg max-w-7xl">
                                    <img class="object-cover object-center w-auto  max-h-[600px] rounded-xl" alt="hero" src="/storage/{{ $graff->image }}">
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</div>
