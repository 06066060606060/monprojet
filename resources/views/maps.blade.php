@extends('layouts.app')

@section('main')
    <div class="max-w-screen-xl mx-auto text-center py-4">
 
        <div class="flex flex-row">
          <div class="flex flex-col w-full">
            <div id="map" class="h-96 w-3/4 px-8 mx-4">
            </div>

            @foreach ($sites as $site)
            <div class="flex flex-row py-8">
              {{ $thislatitude = $site->latitude }}
              {{ $thislongitude = $site->longitude }}
           
            </div>
            @endforeach
          </div>
            
            <div class="flex flex-col">
                <div id="graff1">
                    <h1>titre 1</h1>
                    <img src="https://picsum.photos/200" alt="graffiti" class="w-64 h-16 py-2">
                </div>
                <div id="graff2">
                    <h1>titre 1</h1>
                    <img src="https://picsum.photos/200" alt="graffiti" class="w-64 h-16 py-2">
                </div>
                <div id="graff3">
                    <h1>titre 1</h1>
                    <img src="https://picsum.photos/200" alt="graffiti" class="w-64 h-16 py-2">
                </div>
                <div id="graff4">
                    <h1>titre 1</h1>
                    <img src="https://picsum.photos/200" alt="graffiti" class="w-64 h-16 py-2">
                </div>
                <div id="graff5">
                    <h1>titre 1</h1>
                    <img src="https://picsum.photos/200" alt="graffiti" class="w-64 h-16 py-2">
                </div>
                <div id="graff6">
                    <h1>titre 1</h1>
                    <img src="https://picsum.photos/200" alt="graffiti" class="w-64 h-16 py-2">
                </div>
            </div>
        </div>

        <script>
            var $lat = {!! json_encode($thislatitude) !!};
            var $long = {!! json_encode($thislongitude) !!};
       
            var mymap = L.map('map').setView([-21.30, 55.50], 14);
            L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
                maxZoom: 15,
                attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
            }).addTo(mymap);

            coords = [
                [$lat, $long],
                [-21.3100, 55.4800],
                [-21.3000, 55.5000],
                [-21.2800, 55.4500],
                [-21.3000, 55.4500],
                [-21.3300, 55.4800]
            ];

            images = [
                "https://picsum.photos/200",
                "https://picsum.photos/200",
                "https://picsum.photos/200",
                "https://picsum.photos/200",
                "https://picsum.photos/200",
                "https://picsum.photos/200"
            ];

            let l = coords.length;

            var graff1 = document.querySelector('#graff1');
            var graff2 = document.querySelector('#graff2');
            var graff3 = document.querySelector('#graff3');
            var graff4 = document.querySelector('#graff4');
            var graff5 = document.querySelector('#graff5');
            var graff6 = document.querySelector('#graff6');

            graffs = [graff1, graff2, graff3, graff4, graff5, graff6];

            // while (i--) {
              for (let i = 0; i < l; i++) {

                var pop = L.popup({
                    closeOnClick: true,
                }).setContent('<h4>Titre</h4><img src="' + images[i] + '"/>');


                L.marker(coords[i]).addTo(mymap).bindPopup(pop);

                graffs[i].addEventListener("click", ()=> {
                    mymap.flyTo(coords[i], 14);
                    
            
                });

            }
        </script>
    @endsection
