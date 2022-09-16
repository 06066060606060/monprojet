@extends('layouts.app')

@section('main')
    <div class="max-w-screen-xl py-4 mx-auto text-center">

        <div class="flex flex-row">
            <div class="flex flex-col w-full">
                <div id="map" class="h-[700px]">
                </div>

            </div>

            <div class="flex flex-col ml-4 overflow-y-auto h-[700px]">
                @foreach ($graffs as $graff)
                    <div id="graff{{ $graff->id }}" onclick="centerMapOnPost( {{ $graff->id }} )">
                        <h1>{{ $graff->nom }}</h1>
                        <img src="/storage/{{ $graff->image }}" alt="" class="w-64 h-16 py-2">

                    </div>
                @endforeach
                
            </div>
        </div>

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
