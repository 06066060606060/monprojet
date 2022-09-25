<section class="relative w-full p-2 mx-auto bg-blue-900 body-font md:max-w-xl lg:max-w-3xl xl:max-w-5xl rounded-xl">
   
    <div class="flex justify-center h-12">
      
            <form action="" method="get" class="">
                <select name="region" class="h-8 px-2 py-1 mx-1 my-1 text-sm text-center text-white bg-blue-600 border border-transparent rounded-md appearance-none btnmenu hover:border-blue-100 ">
                    <option value="" class="px-2 mx-3 text-center" id="place-holder-center">Region </option>
                    <option value="" class="px-2 mx-3 text-center" id="place-holder-center">Nord </option>
                    <option value="" class="px-2 mx-3 text-center" id="place-holder-center">Sud </option>
                    <option value="" class="px-2 mx-3 text-center" id="place-holder-center">Est </option>
                    <option value="" class="px-2 mx-3 text-center" id="place-holder-center">Ouest </option>
                </option>
                </select>

                <select name="ville" class="h-8 px-2 py-1 mx-1 my-1 text-sm text-center text-white bg-blue-600 border border-transparent rounded-md appearance-none btnmenu hover:border-blue-100 ">
                    <option value="" class="px-2 mx-2 text-center" id="place-holder-center">Ville </option>
                </option>
                </select>

                <select name="Artiste" class="h-8 px-2 py-1 mx-1 my-1 text-sm text-center text-white bg-blue-600 border border-transparent rounded-md appearance-none btnmenu hover:border-blue-100 ">
                    <option value="" class="px-2 mx-2 text-center" id="place-holder-center">Artiste </option>
                </option>
                </select>
                <buuton name="proxi" class="h-8 px-2 py-1.5 mx-1 my-1 text-sm text-center text-white bg-blue-600 border border-transparent rounded-md appearance-none btnmenu hover:border-blue-100 ">
                   A proximité
                </button>
                </select>
                
            </form>
    
    </div>
    
    <div class="container flex flex-wrap mx-auto md:flex-nowrap">
        <div class="flex-col md:w-[85%] h-[45vh] md:h-[65vh] w-full bg-gray-300 rounded-lg overflow-hidden md:mr-4 p-10 flex items-end justify-start relative">
            <div class="absolute inset-0" id="map">
            </div>
        </div>

        <div class="flex rounded-lg md:flex-col">
            <div class="flex md:flex-col overflow-x-auto md:h-[65vh] mr-2 pr-1 max-w-[86vw]">
                @foreach ($graffs as $graff)
                <div class="flex py-1 md:flex-col">
                    <div class="py-2 my-2 transition-colors duration-100 transform bg-blue-600 rounded-lg hover:bg-green-800 w-[135px] mx-1 h-[130px] md:h-[90px]"
                        id="graff{{ $graff->id }}" onclick="centerMapOnPost({{ $graff->id }})">
                        <h1 class="h-3 text-xs text-white font mb-2 -mt-1 text-center w-[140px]">{{ $graff->nom }}</h1>
                        <div class="flex">
                            <img src="/storage/miniatures/{{ $graff->image }}" alt=""
                                class="w-48 h-20 rounded-b-lg shadow-lg object-f cryspy">
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
