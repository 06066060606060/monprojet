@php   use \App\Http\Controllers\MapsController; @endphp
@extends(backpack_view('blank'))
@section('content')
    @php
        $allGraffs = MapsController::getFullMaps();
        $textX = MapsController::dashboard();
        $textN = $textX['graffN'];
        $textS = $textX['graffS'];
        $textE = $textX['graffE'];
        $textO = $textX['graffO'];
    @endphp
    @foreach ($allGraffs as $graff)
        @php
            $graffs = $graff;
        @endphp
    @endforeach
    <section class="text-gray-600 body-font">
            <div class="flex">
                    <div class="relative py-4 h-auto px-8 overflow-hidden text-center bg-gray-100 bg-opacity-75 rounded-lg">
                        <h1 class="mb-1 text-xl font-medium text-gray-900 title-font">Nombres de Graffs</h1>
                        <div class="flex flex-col text-sm">
                            <i>Nord: {{ count($textN) }}  Sud: {{ count($textS) }} </i>
                            <i> Est: {{ count($textE) }}  Ouest: {{ count($textO) }} </i>
                        </div>
                       
                    </div>
                    </div>
       
            </div>
            <div class="flex mx-4">
                <div id="map" class="mx-2 mt-4 rounded h-[550px] w-full">
                </div>
            </div>
      


    </section>

    <script type="module">
      let data = {!! json_encode($graffs) !!};
    //   console.log(data);
      let mymap = L.map('map').setView([-21.100, 55.500], 10);
        let markers = {};
        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {}).addTo(mymap);

        let greenIcon = L.icon({
            iconUrl: '/img/icon.bomb.png',
            iconSize: [30, 45],
            iconAnchor: [0, 0],
            popupAnchor: [1, 1]
        });

        // Loop
        for (var i = 0; i < data.length; i++) {
            let graff = data[i];
            let pics = graff.image;
            let graffid = graff.id;
            console.log(graffid);
            let marker = L.marker([graff.latitude, graff.longitude], {
                icon: greenIcon
            }).addTo(mymap).bindPopup('<div class="mappopup"><h1>'+ graff.nom + '</h1><img class="mt-4" src="/storage/miniatures/' + pics +'" /><a href="/admin/graff/ '+ graff.id +' /edit"><h1 class="py-2 hover:bg-green-800">Modifier</h1></a></div>');
            markers[graff.id] = marker;
        }
 
        function centerMapOnPost(id) {
            mymap.flyTo(markers[id].getLatLng(), 18);
            mymap.on("zoomend", () => { markers[id].openPopup(); });
   
        }

    </script>
@endsection
