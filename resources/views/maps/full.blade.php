<section class="text-gray-600 body-font relative max-w-7xl mx-auto">
   
    <div class="flex bg-blue-900 my-2 h-12 w-4/4 mr-1 rounded-xl">
      
            <form action="" method="get" class="mt-1 ml-2">

                <select name="region" class="my-1 px-2 mx-1 appearance-none btnmenu h-8 text-center py-1 text-sm text-white bg-gray-600 border border-transparent rounded-md hover:border-emerald-500 apple">
                    <option value="" class="px-2 mx-2 text-center" id="place-holder-center">Region </option>
                </option>
                </select>

                <select name="ville" class="my-1 px-2 mx-1 appearance-none btnmenu h-8 text-center py-1 text-sm text-white bg-gray-600 border border-transparent rounded-md hover:border-emerald-500 apple">
                    <option value="" class="px-2 mx-2 text-center" id="place-holder-center">Ville </option>
                </option>
                </select>

                <select name="Artiste" class="my-1 px-2 mx-1 appearance-none btnmenu h-8 text-center py-1 text-sm text-white bg-gray-600 border border-transparent rounded-md hover:border-emerald-500 apple">
                    <option value="" class="px-2 mx-2 text-center" id="place-holder-center">Artiste </option>
                </option>
                </select>

                
            </form>
    
       </div>
    <div class="container mx-auto flex sm:flex-nowrap flex-wrap">
        <div class="flex-col md:w-[85%] h-[50vh] md:h-[70vh] w-full bg-gray-300 rounded-lg overflow-hidden md:mr-4 p-10 flex items-end justify-start relative">
            <div class="absolute inset-0" id="map">
            </div>
        </div>

        <div class=" bg-blue-900 flex md:flex-col mt-4 md:mt-0 rounded-lg">
            <div class="flex md:flex-col overflow-x-auto md:h-[70vh] mx-2 pr-1 max-w-[87vw]">
                @foreach ($graffs as $graff)
                <div class="flex md:flex-col py-1">
                    <div class="pt-2 pb-2 mt-2 mb-2 transition-colors duration-100 transform bg-blue-600 rounded-lg hover:bg-green-800 w-[135px] mx-1 h-[130px] md:h-[90px]"
                        id="graff{{ $graff->id }}" onclick="centerMapOnPost({{ $graff->id }})">
                        <h1 class="h-3 text-xs text-white font mb-2 -mt-1 text-center w-[140px]">{{ $graff->nom }}</h1>
                        <div class="flex">
                            <img src="/storage/miniatures/{{ $graff->image }}" alt=""
                                class="object-f w-48 h-20 rounded-b-lg shadow-lg cryspy">
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
