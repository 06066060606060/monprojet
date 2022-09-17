@extends('layouts.app')

@section('main')
<section class="px-4 pt-12">
    <h1 class="mb-4 text-3xl font-medium text-center text-black sm:text-4xl">Nord</h1>
    <div class="max-w-screen-xl py-4 mx-auto text-center shadow-xl mapbck rounded-xl">

        <div class="flex flex-row">
            <div class="flex flex-col w-full">
                <div id="map" class="z-0 h-full mx-4">
                </div>

            </div>

            <div class="flex flex-col pr-4 overflow-y-auto md:h-[70vh] h-[60vh]">
                @foreach ($graffs as $graff)
                    <div id="graff{{ $graff->id }}" onclick="centerMapOnPost( {{ $graff->id }} )" class="my-2 transition-colors duration-100 transform bg-blue-900 rounded-lg hover:bg-blue-600">
                        <h1 class="text-sm text-white font">{{ $graff->nom }}</h1>
                        <img src="/storage/{{ $graff->image }}" alt="" class="object-cover w-48 h-20 rounded-b-lg shadow-lg cryspy">
                    </div>
                @endforeach
                
            </div>
        </div>
    </div>

    </section>
        <script>
            var data = {!! json_encode($graffs) !!};
            console.log(data);
            var mymap = L.map('map').setView([-21.30, 55.50], 12);
            L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {}).addTo(mymap);
            var markers = {};

            // Loop through the data
            for (var i = 0; i < data.length; i++) {
                var graff = data[i];
                var marker = L.marker([graff.latitude, graff.longitude]).addTo(mymap);
                markers[graff.id] = marker;
               

                function centerMapOnPost(id) {
                    mymap.flyTo(markers[id].getLatLng(), 18);
                    //marker.bindPopup(graff.nom).openPopup();
                }
            }
           
        </script>
    @endsection
