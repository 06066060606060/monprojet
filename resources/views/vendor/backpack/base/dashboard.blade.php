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
        <div class="container">
            <h1 class="mb-3 text-2xl font-medium text-gray-900 title-font sm:text-3xl">Statistiques</h1>
            <div class="flex flex-wrap">
                <div class="p-2 lg:w-1/4 min-w-[130px]">
                    <div class="relative h-12 px-8 pt-8 pb-24 overflow-hidden text-center bg-gray-100 bg-opacity-75 rounded-lg">
                        <h1 class="mb-1 text-xl font-medium text-gray-900 title-font sm:text-2xl">Nord</h1>
                        <div class="leading-relaxed">Total:<h2 class="mb-1 text-xs font-medium tracking-widest text-gray-400 title-font">{{ count($textN) }}</h2></div>
                    </div>
                </div>
                <div class="p-2 lg:w-1/4 min-w-[130px]">
                    <div
                        class="relative h-12 px-8 pt-8 pb-24 overflow-hidden text-center bg-gray-100 bg-opacity-75 rounded-lg">
                        <h1 class="mb-1 text-xl font-medium text-gray-900 title-font sm:text-2xl">Sud</h1>
                        <div class="leading-relaxed">Total:<h2 class="mb-1 text-xs font-medium tracking-widest text-gray-400 title-font">{{ count($textS) }}</h2></div>
                        

                    </div>
                </div>
                <div class="p-2 lg:w-1/4 min-w-[130px]">
                    <div
                        class="relative h-12 px-8 pt-8 pb-24 overflow-hidden text-center bg-gray-100 bg-opacity-75 rounded-lg">
                        <h1 class="mb-1 text-xl font-medium text-gray-900 title-font sm:text-2xl">Est</h1>
                        <div class="leading-relaxed">Total:<h2 class="mb-1 text-xs font-medium tracking-widest text-gray-400 title-font">{{ count($textE) }}</h2></div>
                        

                    </div>
                </div>
                <div class="p-2 lg:w-1/4 min-w-[130px]">
                    <div
                        class="relative h-12 px-8 pt-8 pb-24 overflow-hidden text-center bg-gray-100 bg-opacity-75 rounded-lg">
                        <h1 class="mb-1 text-xl font-medium text-gray-900 title-font sm:text-2xl">Ouest</h1>
                        <div class="leading-relaxed">Total: <h2 class="mb-1 text-xs font-medium tracking-widest text-gray-400 title-font">{{ count($textO) }}</h2></div>
                       

                    </div>
                </div>

            </div
            <div class="flex flex-col w-full ">
                <div id="map" class="mx-2 mt-4 rounded h-[500px] l">
                </div>
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
            }).addTo(mymap).bindPopup('<div class="mappopup"><a href="/admin/graff/ '+ graff.id +' /edit"> <img class="mt-4" src="/storage/miniatures/' + pics +
                '" /><h1 class="py-2 hover:bg-green-800">Modifier</h1></div>');
            markers[graff.id] = marker;
        }
 
        function centerMapOnPost(id) {
            mymap.flyTo(markers[id].getLatLng(), 18);
            mymap.on("zoomend", () => { markers[id].openPopup(); });
   
        }

    </script>

@endsection
