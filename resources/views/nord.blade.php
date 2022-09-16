@extends('layouts.app')

@section('main')
<section class="px-4 mt-8">
    <h1 class="mb-4 text-3xl font-medium text-center text-black sm:text-4xl">Nord</h1>
    <div class="max-w-screen-xl py-4 mx-auto text-center bg-blue-200 rounded-xl ">

        <div class="flex flex-row">
            <div class="flex flex-col w-full">
                <div id="map" class="h-full mx-4 lg:mx-0 lg:ml-4">
                </div>

            </div>

            <div class="flex flex-col pr-4 overflow-y-auto h-[680px]">
                @foreach ($graffs as $graff)
                    <div id="graff{{ $graff->id }}" onclick="centerMapOnPost( {{ $graff->id }} )" class="my-2 bg-gray-400 rounded-lg">
                        <h1>{{ $graff->nom }}</h1>
                        <img src="/storage/{{ $graff->image }}" alt="" class="w-48 h-20 rounded-b-lg">

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
                    marker.bindPopup(graff.nom).openPopup();
                }
            }
        </script>
    @endsection
