<div x-data="{ modelOpen: false }">
    <button @click="modelOpen =!modelOpen"
        class="p-3 pl-4 pr-4 mt-4 font-bold text-white transition duration-500 ease-in-out bg-blue-600 rounded-lg shadow-xl hover:bg-blue-900">CV
        Académique</button>

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
                class="inline-block pt-16 overflow-hidden transition-all transform rounded-lg 2xl:max-w-2xl">
                <section class="">
                    {{-- @click="modelOpen = false" --}}
                    <div class="w-full px-20 py-8 space-y-3 text-gray-100 bg-blue-900 shadow-xl rounded-xl">
                        <div class="container flex flex-col px-5 mx-auto">
                            <div class="mx-auto lg:max-w-5xl">
                                <h1 class="mb-4 text-3xl font-medium text-center text-white sm:text-4xl">Mon CV
                                    Académique</h1>

                                <p class="p-4 text-base text-black bg-gray-300 rounded-xl h-96">Raclette knausgaard
                                    hella meggs normcore williamsburg enamel pin sartorial venmo tbh hot chicken
                                    gentrify portland.</p>
              
                            </div>
                        </div>
                    </div>
            </section>
        </div>
    </div>
</div>
</div>