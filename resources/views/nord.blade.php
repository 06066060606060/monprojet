@extends('layouts.app')

@section('main')
    <section class="px-4 pt-12">
        <h1 class="mb-4 text-3xl font-bold text-center text-black sm:text-4xl">Nord</h1>
        <div class="max-w-screen-xl py-4 mx-auto text-center bg-blue-900 shadow-xl rounded-xl">
            <div class="flex flex-row">
                <div class="flex flex-col w-full">
                    <div id="map" class="z-0 h-full mx-4">
                    </div>
                </div>
                <div class="flex flex-col pr-4 overflow-y-auto md:h-[70vh] h-[60vh]">
                    @foreach ($graffs as $graff)
                        <div id="graff{{ $graff->id }}" onclick="centerMapOnPost( {{ $graff->id }} ), clear()"
                            class="my-2 transition-colors duration-100 transform bg-blue-600 rounded-lg hover:bg-green-800">
                            <h1 class="text-sm text-white font">{{ $graff->nom }}</h1>
                            <img src="/storage/miniatures/{{ $graff->image }}" alt=""
                                class="object-cover w-48 h-20 rounded-b-lg shadow-lg cryspy">
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <script>
        let data = {!! json_encode($graffs) !!};
        let mymap = L.map('map').setView([-21.30, 55.50], 12);
        let markers = {};
        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {}).addTo(mymap);

        let greenIcon = L.icon({
            iconUrl: '/img/icon.bomb.png',
            iconSize: [30, 45],
            iconAnchor: [0, 0],
            popupAnchor: [1, 1]
        });



        // Loop
        for (let i = 0; i < data.length; i++) {
            let graff = data[i];
            let pics = graff.image;
            let graffid = graff.id;
            let marker = L.marker([graff.latitude, graff.longitude], {
                icon: greenIcon
            }).addTo(mymap).bindPopup('<div class="mappopup"><a href="/details/' + graff.id +
                '"> <img class="mt-4" src="/storage/miniatures/' + pics +
                '" /><h1 class="py-2 hover:bg-green-800">Plus d\'info</h1></div>');
            markers[graff.id] = marker;
        }
 
        function centerMapOnPost(id) {
            mymap.flyTo(markers[id].getLatLng(), 18);
            mymap.on("zoomend", () => { markers[id].openPopup(); });
   
        }

    </script>
@endsection
