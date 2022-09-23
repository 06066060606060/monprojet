<h1 class="mb-4 text-3xl font-bold text-center text-black sm:text-4xl">Nord</h1>
<div class="max-w-screen-xl py-4 mx-auto text-center bg-blue-900 shadow-xl rounded-xl">
    <div class="flex flex-row">
        <div class="flex flex-col w-full">
            <div id="map" class="z-0 h-full mx-4">
            </div>
        </div>
        <div class="flex flex-col pr-4 overflow-y-auto md:h-[70vh] h-[60vh]">
            @foreach ($graffs as $graff)
                <div id="graff{{ $graff->id }}" onclick="centerMapOnPost({{ $graff->id }})"
                    class="my-2 transition-colors duration-100 transform bg-blue-600 rounded-lg hover:bg-green-800">
                    <h1 class="text-xs text-white font">{{ $graff->nom }}</h1>
                    <img src="/storage/miniatures/{{ $graff->image }}" alt=""
                        class="object-cover w-48 h-20 rounded-b-lg shadow-lg cryspy">
                </div>
            @endforeach
        </div>
    </div>
</div>
