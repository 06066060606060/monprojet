<section class="text-gray-600 body-font relative max-w-7xl mx-auto">
    <div class="container mx-auto flex sm:flex-nowrap flex-wrap">

        <div
            class="md:w-[80%] h-[50vh] md:h-[70vh] w-full bg-gray-300 rounded-lg overflow-hidden md:mr-4 p-10 flex items-end justify-start relative">
            <div width="100%" height="100%" class="absolute inset-0" frameborder="0" id="map" marginheight="0"
                marginwidth="0" scrolling="no">
            </div>
        </div>

        <div class=" bg-blue-900 flex md:flex-col mt-4 md:mt-0 rounded-lg">
            <div class="flex md:flex-col overflow-y-auto overflow-x-auto md:h-[70vh] mx-2 pr-1 max-w-[85vw]">
                @foreach ($graffs as $graff)
                    <div class="flex flex-col py-2 my-2 transition-colors duration-100 transform bg-blue-600 rounded-lg hover:bg-green-800 w-[135px] mx-1 h-[130px] md:h-[90px]" id="graff{{ $graff->id }}" onclick="centerMapOnPost({{ $graff->id }})">
                        <h1 class=" text-xs text-white font pb-1 text-center w-[140px]">{{ $graff->nom }}</h1>
                        <img src="/storage/miniatures/{{ $graff->image }}" alt="" class="object-cover w-48 h-20 rounded-b-lg shadow-lg cryspy">
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
