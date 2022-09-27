<section class="relative w-full p-2 mx-auto bg-blue-900 body-font md:max-w-xl lg:max-w-3xl xl:max-w-5xl rounded-xl">

    <div class="flex justify-center h-12">
        <select name="region" class="h-8 px-2 py-1 mx-1 my-1 text-sm text-center text-white bg-blue-600 border border-transparent rounded-md appearance-none hover:bg-green-800 hover:border-blue-100" onchange="myRegion(this.value),mymap.closePopup();">
            <option value="All" class="pl-2 mr-3 text-center">Region</option>
            <option value="nord" class="pl-2 mr-3 text-center">Nord</option>
            <option value="sud" class="pl-2 mr-3 text-center">Sud</option>
            <option value="est" class="pl-2 mr-3 text-center">Est</option>
            <option value="ouest" class="pl-2 mr-3 text-center">Ouest</option>
            </option>
        </select>
        <select name="ville"
            class="h-8 px-2 py-1 mx-1 my-1 text-sm text-center text-white bg-blue-600 border border-transparent rounded-md appearance-none hover:bg-green-800 hover:border-blue-100 ">
            <option value="" class="pl-2 mx-2 text-center">Ville </option>
            </option>
        </select>
        <button name="proxi"
            class="h-8 px-2 py-1.5 mx-1 my-1 text-sm text-center text-white bg-blue-600 hover:bg-green-800 border border-transparent rounded-md appearance-none hover:border-blue-100 "
            onclick="getLocation()">
            A proximité
        </button>
    </div>

    <div class="container flex flex-wrap mx-auto md:flex-nowrap">
        <div
            class="flex-col md:w-[85%] h-[45vh] md:h-[65vh] w-full bg-gray-300 rounded-lg overflow-hidden md:mr-4 p-10 flex items-end justify-start relative">
            <div class="absolute inset-0 z-0" id="map">
            </div>
        </div>

        <div class="flex rounded-lg md:flex-col">
            <div class="flex md:flex-col overflow-x-auto md:h-[65vh] mr-2 pr-1 max-w-[86vw]">
                @foreach ($graffs as $graff)
                    <div class="flex py-1 md:flex-col">
                        <div class="py-2 my-2 transition-colors duration-100 transform bg-blue-600 rounded-lg hover:bg-green-800 w-[135px] mx-1 h-[130px] md:h-[90px]"
                            id="graff{{ $graff->id }}" onclick="centerMapOnPost({{ $graff->id }})">
                            <h1 class="h-3 text-xs text-white font mb-2 -mt-1 text-center w-[140px]">{{ $graff->nom }}
                            </h1>
                            <div class="flex">
                                <img src="/storage/miniatures/{{ $graff->image }}" alt=""
                                    class="object-cover w-48 h-20 rounded-b-lg shadow-lg object-f cryspy">
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="h-0">
        <div x-data="{ modelOpen: false }" class="z-50">
            <button @click="modelOpen =!modelOpen" id="secondary-button" class=""></button>
          
            <div x-cloak x-show="modelOpen" class="fixed inset-0 z-50 overflow-y-auto" aria-labelledby="modal-title" role="dialog"
                aria-modal="true">
                <div class="flex items-end justify-center px-4 text-center md:items-center sm:block sm:p-0">
                    <div x-cloak @click="modelOpen = false" x-show="modelOpen"
                        x-transition:enter="transition ease-out duration-300 transform" x-transition:enter-start="opacity-0"
                        x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-200 transform"
                        x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
                        class="fixed inset-0 transition-opacity bg-gray-900 bg-opacity-60" aria-hidden="true"></div>
        
                    <div x-cloak x-show="modelOpen" x-transition:enter="transition ease-out duration-300 transform"
                        x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                        x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                        x-transition:leave="transition ease-in duration-200 transform"
                        x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                        x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                        class="inline-block pt-16 overflow-hidden transition-all transform rounded-lg">
                        <div class=""  @click="modelOpen = false">
                 
                            <div class="w-full py-8 space-y-3 text-gray-100 bg-blue-900 shadow-xl rounded-xl">
                                <div class="container flex flex-col px-5 mx-auto">
                                    <div class="flex flex-col w-5xl">
                                 
                                        <h1 class="max-w-5xl pt-4 pb-2 text-2xl font-bold leading-none tracking-tighter text-white lg:text-4xl lg:max-w-7xl">
                                            {{ $graff->nom }}
                                        </h1>
                                        <div class="flex flex-col items-center">
                                        <p class="max-w-md mt-2 text-base text-white md:max-w-xl">{{ $graff->description }}</p>
                                            <p class="max-w-md mt-2 text-xl text-white mx-auto">{{ $graff->artiste }}</p>
                                        </div>
                                     
                                    </div>
                                        <div class="flex flex-col items-center justify-center pt-8 mx-auto rounded-lg max-w-7xl">
                                            <img id="graffimage" class="object-cover object-center w-auto  max-h-[600px] rounded-xl" alt="hero"  src="">
                                        </div>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script src="https://unpkg.com/leaflet@1.9.1/dist/leaflet.js"
    integrity="sha256-NDI0K41gVbWqfkkaHj15IzU7PtMoelkzyKp8TOaFQ3s=" crossorigin=""></script>
    <script src="https://peterolson.github.io/BigInteger.js/BigInteger.min.js"></script>
<script>

    let region = {!! json_encode($region) !!};
    let latitudemap = {!! json_encode($region_map[0]->latitude) !!};
    let longitudemap = {!! json_encode($region_map[0]->longitude) !!};
    let zoom = {!! json_encode($region_map[0]->zoom) !!};
    //console.log(latitudemap)
    let data = {!! json_encode($graffs) !!};
    let mymap = L.map('map').setView([latitudemap, longitudemap], zoom);
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
        var hex =  pics.split('\\').pop().split('/').pop().split('.').slice(0, -1).join('.');


        let marker = L.marker([graff.latitude, graff.longitude], {
        icon: greenIcon
        }).addTo(mymap).bindPopup('<div class="mappopup"><img class="mt-4" src="/storage/miniatures/' + pics +
            '" /><h1 onclick="myfunction(' + graff.id +')" class="py-2 hover:bg-green-800">Plus d\'info</h1></div><img id="popup" class="mt-4 hidden" src="/storage/' + pics +
            '" />'
            );
        markers[graff.id] = marker;
    }

    function getLocation() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(showPosition);
        } else {
            alert("Geolocation is not supported by this browser.");
        }
    }

    function showPosition(position) {
        lat = position.coords.latitude;
        long = position.coords.longitude;
        myLocation(lat, long);
      
        
    }


    function centerMapOnPost(id) {
        mymap.closePopup();
        mymap.flyTo(markers[id].getLatLng(), 18);
       markers[id].openPopup();
       
         
    }

    function myfunction(id) {

        markers[id].closePopup();
        console.log(id);
        document.getElementById("secondary-button").click();
       var img = document.getElementById("popup").src;
        document.getElementById("graffimage").src = img;

        mymap.closePopup();
       
    }

    function myfunction2(img) {
        console.log(img);
       
    }


    function myLocation(lat, long) {
        mymap.flyTo([lat, long], 14);
        mymap.closePopup();
    }

    function myRegion(value) {
    if (value == "nord") {
        let zoom = {!! json_encode($region_map[1]->zoom) !!};
        let latitudemap = {!! json_encode($region_map[1]->latitude) !!};
        let longitudemap = {!! json_encode($region_map[1]->longitude) !!};
        mymap.flyTo([latitudemap, longitudemap], zoom);
        mymap.closePopup();
    } else if (value == "sud") {
        let zoom = {!! json_encode($region_map[2]->zoom) !!};
        let latitudemap = {!! json_encode($region_map[2]->latitude) !!};
        let longitudemap = {!! json_encode($region_map[2]->longitude) !!};
        mymap.flyTo([latitudemap, longitudemap], zoom);
        mymap.closePopup();
    }  else if (value == "est") {
        let zoom = {!! json_encode($region_map[4]->zoom) !!};
        let latitudemap = {!! json_encode($region_map[4]->latitude) !!};
        let longitudemap = {!! json_encode($region_map[4]->longitude) !!};
        mymap.flyTo([latitudemap, longitudemap], zoom);
        mymap.closePopup();
    }
    else if (value == "ouest") {
        let zoom = {!! json_encode($region_map[3]->zoom) !!};
        let latitudemap = {!! json_encode($region_map[3]->latitude) !!};
        let longitudemap = {!! json_encode($region_map[3]->longitude) !!};
        mymap.flyTo([latitudemap, longitudemap], zoom);
        mymap.closePopup();
    }
    else if (value == "All") {
        let zoom = {!! json_encode($region_map[0]->zoom) !!};
        let latitudemap = {!! json_encode($region_map[0]->latitude) !!};
        let longitudemap = {!! json_encode($region_map[0]->longitude) !!};
        
        mymap.closePopup();
        mymap.flyTo([latitudemap, longitudemap], zoom);
    }
}

</script>
