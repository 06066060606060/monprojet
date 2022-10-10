<section
    class="relative w-full p-2 mx-auto bg-blue-900 bg-opacity-90 body-font md:max-w-xl lg:max-w-3xl xl:max-w-5xl rounded-xl">

    <div class="flex h-12 ">
        <div class="tooltip">
            <select name="region"
                class="h-8 px-2 py-1 mx-1 my-1 text-xs text-center text-white rounded appearance-none my_select md:text-sm focus:outline-none focus:border-transparent"
                id="selectfilter" onchange="myRegion(this.value),mymap.closePopup();">
                <option id="optionx" value="All" selected>Region</option>
                <option id="optionx" value="All">Toutes</option>
                <option id="optionx" value="nord">Nord</option>
                <option id="optionx" value="sud">Sud</option>
                <option id="optionx" value="est">Est</option>
                <option id="optionx" value="ouest">Ouest</option>
            </select>
      
        </div>
        <div class="tooltip">
            <select name="ville"
                class="h-8 px-2 py-1 mx-1 my-1 text-xs text-center text-white rounded appearance-none md:text-sm focus:outline-none focus:border-transparent"
                id="selectfilter2" onchange="myVille(this.value),mymap.closePopup();">
                <option id="optionx" value="All" selected>ville</option>
                <option id="optionx" value="Saint-Denis">Saint-Denis</option>
                <option id="optionx" value="Saint-Pierre">Saint-Pierre</option>
                <option id="optionx" value="Saint-Paul">Saint-Paul</option>
                <option id="optionx" value="Saint-Louis">Saint-Louis</option>
            </select>
         
        </div>
        <div class="tooltip">
            <select name="Layer"
                class="h-8 px-2 py-1 mx-1 my-1 text-xs text-center text-white rounded appearance-none md:text-sm focus:outline-none focus:border-transparent"
                id="selectfilter2" onchange="layer(this.value)">
                <option id="optionx" value="1" selected>MAP</option>
                <option id="optionx" value="2">OSM</option>
                <option id="optionx" value="3">GEO</option>
                <option id="optionx" value="4">TOPO</option>
                <option id="optionx" value="5">CyclOSM</option>
            </select>

        </div>
        <div class="tooltip">
            <button name="proxi" class="h-8 px-4 my-1 text-xs text-white appearance-none md:text-sm" id="selectbtn"
                onclick="getLocation()">A proximité</button>
               
        </div>

        <div class="tooltip">


            <button name="full" class="h-8 px-4 mx-1 my-1 text-center text-white appearance-none"
                id="selectbtn" onclick="fullscreen()">
                <img src="/img/fullscreen.png" alt="fullscreen" width="14" height="14">
              
            </button>
        </div>

    </div>

    <div class="container flex flex-wrap mx-auto md:flex-nowrap">
        <div
            class="flex-col md:w-[85%] h-[45vh] md:h-[65vh] w-full bg-gray-300 rounded-lg overflow-hidden md:mr-4 p-10 flex items-end justify-start relative">
            <div class="absolute inset-0 z-0" id="map"></div>
        </div>
        <div class="hidden"> {{ $graffs }}</div>
        <div class="hidden"> {{ $graffN }}</div>
        <div class="hidden"> {{ $graffS }}</div>
        <div class="hidden"> {{ $graffE }}</div>
        <div class="hidden"> {{ $graffO }}</div>
        <div class="flex rounded-lg md:flex-col">
            <div class="flex md:flex-col overflow-x-auto md:h-[65vh] mr-2 pr-1 max-w-[87vw] rounded-b-lg">
                <div id="flexUp" class="flex flex-col justify-between py-1 md:flex-row">
                    <h1 id="RegionData" class="px-2 text-white"></h1>
                    <h1 id="GraffData" class="px-2 text-white"></h1>
                </div>
                <div id="flexid" class="flex py-1 md:flex-col ">



                </div>

            </div>
        </div>
    </div>

    <div class="h-0">
        <div x-data="{ modelOpen: false }" class="z-50">
            <button @click="modelOpen =!modelOpen" id="secondary-button" class=""></button>

            <div x-cloak x-show="modelOpen" class="fixed inset-0 z-50 overflow-y-auto" aria-labelledby="modal-title"
                role="dialog" aria-modal="true">
                <div class="flex items-end justify-center px-4 text-center md:items-center sm:block sm:p-0">
                    <div x-cloak @click="modelOpen = false" x-show="modelOpen"
                        x-transition:enter="transition ease-out duration-300 transform"
                        x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                        x-transition:leave="transition ease-in duration-200 transform"
                        x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
                        class="fixed inset-0 transition-opacity bg-gray-900 bg-opacity-60" aria-hidden="true"></div>

                    <div x-cloak x-show="modelOpen" x-transition:enter="transition ease-out duration-300 transform"
                        x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                        x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                        x-transition:leave="transition ease-in duration-200 transform"
                        x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                        x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                        class="inline-block pt-8 overflow-hidden transition-all transform rounded-lg">
                        <div class="w-full py-4 text-gray-100 bg-blue-900 border border-blue-600 rounded-xl">
                            <div class="flex flex-row-reverse pr-4">
                                <img class="w-12 h-12 transition-colors duration-100 transform opacity-25 hover:opacity-100"
                                    src="/img/iconclose.png" @click="modelOpen = false">
                            </div>
                            <div class="container flex flex-col px-5 mx-auto">
                                <div class="flex flex-col items-center w-5xl">

                                    <h1 id="graffname"
                                        class="max-w-5xl text-4xl font-bold leading-none text-center text-white">
                                    </h1>
                                    <div class="flex flex-col items-center">
                                        <p id="descr" class="max-w-md pt-2 text-base text-white"></p>
                                        <i id="artiste" class="pt-2 mx-auto text-white text-md"></i>
                                    </div>

                                </div>
                                <div
                                    class="flex flex-col items-center justify-center pt-2 mx-auto rounded-lg max-w-7xl">
                                    <img id="graffimage"
                                        class="object-cover object-center w-auto  max-h-[600px] rounded-xl"
                                        alt="hero" src="">
                                    <i id="position" class="mx-auto mt-2 text-white text-md"></i>
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
<script>
    maxzoom = 16;
    maplayer = 1;
    latitudemap = {!! json_encode($region_map[0]->latitude) !!};
    longitudemap = {!! json_encode($region_map[0]->longitude) !!};
    zoom = {!! json_encode($region_map[0]->zoom) !!};
    data = {!! json_encode($graffs) !!};
    dataN = {!! json_encode($graffN) !!};
    dataS = {!! json_encode($graffS) !!};
    dataE = {!! json_encode($graffE) !!};
    dataO = {!! json_encode($graffO) !!};
    markers = {};
    mymap = L.map('map').setView([latitudemap, longitudemap], zoom);
    osmLayer = new L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {maxZoom: 19}).addTo(mymap);

    greenIcon = L.icon({
        iconUrl: '/img/icon.bomb.png',
        iconSize: [30, 45],
        iconAnchor: [0, 0],
        popupAnchor: [1, 1]
    });
    mymap.addLayer(osmLayer);
    Maps(0);




    // fin variable


    //map layer
    function layer(mylayer) {
        if (mylayer == 1) {
            mymap.removeLayer(osmLayer);
            osmLayer = new L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {maxZoom: 19}).addTo(mymap);
            mymap.addLayer(osmLayer);
            maplayer = 2;
            maxzoom = 19;
        } else if (mylayer == 2) {
            mymap.removeLayer(osmLayer);
            osmLayer = new L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}', {maxZoom: 19}).addTo(mymap);
            mymap.addLayer(osmLayer);
            maplayer = 1;
            maxzoom = 19;
        } else if (mylayer == 3) {
            mymap.removeLayer(osmLayer);
            osmLayer = L.tileLayer('https://wxs.ign.fr/{apikey}/geoportail/wmts?REQUEST=GetTile&SERVICE=WMTS&VERSION=1.0.0&STYLE={style}&TILEMATRIXSET=PM&FORMAT={format}&LAYER=ORTHOIMAGERY.ORTHOPHOTOS&TILEMATRIX={z}&TILEROW={y}&TILECOL={x}', {maxZoom: 19,apikey: 'choisirgeoportail',format: 'image/jpeg',style: 'normal'}).addTo(mymap);
            mymap.addLayer(osmLayer);
            maplayer = 3;
            maxzoom = 19;
        } else if (mylayer == 4) {
            mymap.removeLayer(osmLayer);
            osmLayer = L.tileLayer('https://{s}.tile.opentopomap.org/{z}/{x}/{y}.png', {maxZoom: 16,}).addTo(mymap);
            mymap.addLayer(osmLayer);
            maplayer = 4;
            maxzoom = 16;
        } else if (mylayer == 5) {
            mymap.removeLayer(osmLayer);
            osmLayer = L.tileLayer('https://{s}.tile-cyclosm.openstreetmap.fr/cyclosm/{z}/{x}/{y}.png', {maxZoom: 20,}).addTo(mymap);
            mymap.addLayer(osmLayer);
            maplayer = 5;
            maxzoom = 20;
        }
        console.log(maplayer);
        console.log(maxzoom);
    }




    //reset selector
    function reset() {
        document.getElementById("selectfilter").selectedIndex = 0;
        document.getElementById("selectfilter2").selectedIndex = 0; //1 = option 2
    }



    //full map


    function Maps(value) {
        document.getElementById("RegionData").innerHTML = "Total:";

        let count = 0;
        for (let i = 0; i < data.length; i++) {
            count = count + 1;
            graff = data[i];
            pics = graff.image;
            graffid = graff.id;
            theregion = graff.region;
            graffname = graff.nom;
            graffdesc = graff.description;
            graffartiste = graff.artiste;
            graffposition = [graff.latitude + "  " + graff.longitude];

            marker = L.marker([graff.latitude, graff.longitude], {
                icon: greenIcon
            }).addTo(mymap).bindPopup(
                '<div class="mappopup"><img class="mt-4" src="/storage/miniatures/' + pics +
                '" /><h1 onclick="myfunction(' + graff.id +
                ')" class="py-2" id="selectphoto0">Plus d\'info</h1></div><input type="text" class="hidden" id="graffposition" value="' +
                graffposition + '"><input type="text" class="hidden" id="graffnom" value="' + graffname +
                '"><input type="text" class="hidden" id="graffartiste" value="' + graffartiste +
                '"><input type="text" class="hidden" id="graffdesc" value="' + graffdesc +
                '"><img id="popup" class="hidden mt-4" src="/storage/' + pics +
                '" />'
            );
            markers[graff.id] = marker;
            flexbox();
            document.getElementById("GraffData").innerHTML = count;
        }
    }



    function MapN(value) {
        document.getElementById("RegionData").innerHTML = "Nord";
        reset();

        document.getElementById("flexid").innerHTML = "";



        let count = 0;

        for (let i = 0; i < dataN.length; i++) {
            count = count + 1;
            graff = dataN[i];
            pics = graff.image;
            graffid = graff.id;
            theregion = graff.region;
            graffname = graff.nom;
            graffdesc = graff.description;
            graffartiste = graff.artiste;
            graffposition = [graff.latitude + "  " + graff.longitude];

            marker = L.marker([graff.latitude, graff.longitude], {
                icon: greenIcon
            }).addTo(mymap).bindPopup(
                '<div class="mappopup"><img class="mt-4" src="/storage/miniatures/' + pics +
                '" /><h1 onclick="myfunction(' + graff.id +
                ')" class="py-2" id="selectphoto0">Plus d\'info</h1></div><input type="text" class="hidden" id="graffposition" value="' +
                graffposition + '"><input type="text" class="hidden" id="graffnom" value="' + graffname +
                '"><input type="text" class="hidden" id="graffartiste" value="' + graffartiste +
                '"><input type="text" class="hidden" id="graffdesc" value="' + graffdesc +
                '"><img id="popup" class="hidden mt-4" src="/storage/' + pics +
                '" />'
            );
            markers[graff.id] = marker;

            flexbox();
            document.getElementById("GraffData").innerHTML = count;
        }

    }

    function MapS(value) {
        document.getElementById("RegionData").innerHTML = "Sud";
        reset();

        document.getElementById("flexid").innerHTML = "";




        let count = 0;
        for (let i = 0; i < dataS.length; i++) {
            count = count + 1;
            graff = dataS[i];
            pics = graff.image;
            graffid = graff.id;
            theregion = graff.region;
            graffname = graff.nom;
            graffdesc = graff.description;
            graffartiste = graff.artiste;
            graffposition = [graff.latitude + "  " + graff.longitude];

            marker = L.marker([graff.latitude, graff.longitude], {
                icon: greenIcon
            }).addTo(mymap).bindPopup(
                '<div class="mappopup"><img class="mt-4" src="/storage/miniatures/' + pics +
                '" /><h1 onclick="myfunction(' + graff.id +
                ')" class="py-2" id="selectphoto0">Plus d\'info</h1></div><input type="text" class="hidden" id="graffposition" value="' +
                graffposition + '"><input type="text" class="hidden" id="graffnom" value="' + graffname +
                '"><input type="text" class="hidden" id="graffartiste" value="' + graffartiste +
                '"><input type="text" class="hidden" id="graffdesc" value="' + graffdesc +
                '"><img id="popup" class="hidden mt-4" src="/storage/' + pics +
                '" />'
            );
            markers[graff.id] = marker;
            flexbox();
            document.getElementById("GraffData").innerHTML = count;
        }
    }

    function MapE(value) {
        document.getElementById("RegionData").innerHTML = "Est";
        reset();

        document.getElementById("flexid").innerHTML = "";


        let count = 0;
        for (let i = 0; i < dataE.length; i++) {
            count = count + 1;
            graff = dataE[i];
            pics = graff.image;
            graffid = graff.id;
            theregion = graff.region;
            graffname = graff.nom;
            graffdesc = graff.description;
            graffartiste = graff.artiste;
            graffposition = [graff.latitude + "  " + graff.longitude];

            marker = L.marker([graff.latitude, graff.longitude], {
                icon: greenIcon
            }).addTo(mymap).bindPopup(
                '<div class="mappopup"><img class="mt-4" src="/storage/miniatures/' + pics +
                '" /><h1 onclick="myfunction(' + graff.id +
                ')" class="py-2" id="selectphoto0">Plus d\'info</h1></div><input type="text" class="hidden" id="graffposition" value="' +
                graffposition + '"><input type="text" class="hidden" id="graffnom" value="' + graffname +
                '"><input type="text" class="hidden" id="graffartiste" value="' + graffartiste +
                '"><input type="text" class="hidden" id="graffdesc" value="' + graffdesc +
                '"><img id="popup" class="hidden mt-4" src="/storage/' + pics +
                '" />'
            );
            markers[graff.id] = marker;
            flexbox();
            document.getElementById("GraffData").innerHTML = count;
        }
    }

    function MapO() {
        document.getElementById("RegionData").innerHTML = "Ouest";
        reset();

        document.getElementById("flexid").innerHTML = "";


        let count = 0;
        for (let i = 0; i < dataO.length; i++) {
            count = count + 1;
            graff = dataO[i];
            pics = graff.image;
            graffid = graff.id;
            theregion = graff.region;
            graffname = graff.nom;
            graffdesc = graff.description;
            graffartiste = graff.artiste;
            graffposition = [graff.latitude + "  " + graff.longitude];

            marker = L.marker([graff.latitude, graff.longitude], {
                icon: greenIcon
            }).addTo(mymap).bindPopup(
                '<div class="mappopup"><img class="mt-4" src="/storage/miniatures/' + pics +
                '" /><h1 onclick="myfunction(' + graff.id +
                ')" class="py-2" id="selectphoto0">Plus d\'info</h1></div><input type="text" class="hidden" id="graffposition" value="' +
                graffposition + '"><input type="text" class="hidden" id="graffnom" value="' + graffname +
                '"><input type="text" class="hidden" id="graffartiste" value="' + graffartiste +
                '"><input type="text" class="hidden" id="graffdesc" value="' + graffdesc +
                '"><img id="popup" class="hidden mt-4" src="/storage/' + pics +
                '" />'
            );
            markers[graff.id] = marker;

            flexbox();
            document.getElementById("GraffData").innerHTML = count;
        }
    }


    function flexbox() {

        flex = document.getElementById("flexid");
        h1 = document.createElement("h1");
        div = document.createElement("div");
        img = document.createElement("img");

        h1.setAttribute("class", "h-3 text-xs text-white font mb-2 mt-1 mx-auto text-center w-[140px]");
        h1.innerHTML = graffname;
        div.setAttribute("class", graff.region);
        div.setAttribute("id", "graff" + graff.id);
        div.setAttribute("onclick", "centerMapOnPost(" + graff.id + ")");
        div.setAttribute("id", "selectphoto");

        img.setAttribute("class", "object-cover w-48 h-20 rounded-b-lg shadow-lg object-f cryspy pl-0 pr-0");
        img.setAttribute("src", "/storage/miniatures/" + pics);

        div.appendChild(h1);

        flex.appendChild(div);
        div.appendChild(img);
    }

    //GET  MY LOCATION
    function getLocation() {
        console.log('get-location');

        navigator.geolocation.getCurrentPosition(function() {}, function() {}, {});
        //The working next statement.
        navigator.geolocation.getCurrentPosition(function(position) {
            lat = position.coords.latitude;
            long = position.coords.longitude;
            myLocation(lat, long);
        }, function(e) {

        }, {
            enableHighAccuracy: true
        });

    }


    // FULL SCREEN
    themap = document.getElementById('map');

    function fullscreen() {
        themap.requestFullscreen();
    }


    // JUMP TO GRAFF
    function centerMapOnPost(id) {
        mymap.closePopup();
        mymap.flyTo(markers[id].getLatLng(), maxzoom);
        markers[id].openPopup();
    }

    function myfunction(id) {

        markers[id].closePopup();
        console.log(id);
        document.getElementById("secondary-button").click();
        var img = document.getElementById("popup").src;
        document.getElementById("graffimage").src = img;

        var graffnom = document.getElementById("graffnom").value;
        document.getElementById("graffname").innerHTML = graffnom;

        var graffdesc = document.getElementById("graffdesc").value;
        document.getElementById("descr").innerHTML = graffdesc;

        var graffartiste = document.getElementById("graffartiste").value;
        document.getElementById("artiste").innerHTML = graffartiste;

        var graffposition = document.getElementById("graffposition").value;
        document.getElementById("position").innerHTML = graffposition;

        mymap.closePopup();

    }

    // FLY TO MY LOCATION
    function myLocation(lat, long) {


        if (lat < -21.20) {
            MapS();
        } else if (lat > -21.20 && lat < -20.99 && long < 55.50) {
            MapO();
        } else if (lat > -21.20 && lat < -20.99 && long > 55.50) {
            MapE();
        } else if (lat > -20.99) {
            MapN();
        } else {
            Maps();
        }

        mymap.flyTo([lat, long], 14);
        mymap.closePopup();
    }



    // JUMP TO REGION
    function myRegion(value) {
        if (value == "nord") {

            let zoom = {!! json_encode($region_map[1]->zoom) !!};
            let latitudemap = {!! json_encode($region_map[1]->latitude) !!};
            let longitudemap = {!! json_encode($region_map[1]->longitude) !!};
            MapN();
            mymap.flyTo([latitudemap, longitudemap], zoom);
            mymap.closePopup();
        } else if (value == "sud") {
            let zoom = {!! json_encode($region_map[2]->zoom) !!};
            let latitudemap = {!! json_encode($region_map[2]->latitude) !!};
            let longitudemap = {!! json_encode($region_map[2]->longitude) !!};
            MapS();
            mymap.flyTo([latitudemap, longitudemap], zoom);
            mymap.closePopup();
        } else if (value == "est") {
            let zoom = {!! json_encode($region_map[4]->zoom) !!};
            let latitudemap = {!! json_encode($region_map[4]->latitude) !!};
            let longitudemap = {!! json_encode($region_map[4]->longitude) !!};
            MapE();
            mymap.flyTo([latitudemap, longitudemap], zoom);
            mymap.closePopup();
        } else if (value == "ouest") {
            let zoom = {!! json_encode($region_map[3]->zoom) !!};
            let latitudemap = {!! json_encode($region_map[3]->latitude) !!};
            let longitudemap = {!! json_encode($region_map[3]->longitude) !!};
            MapO();
            mymap.flyTo([latitudemap, longitudemap], zoom);
            mymap.closePopup();
        } else if (value == "All") {
            let zoom = {!! json_encode($region_map[0]->zoom) !!};
            let latitudemap = {!! json_encode($region_map[0]->latitude) !!};
            let longitudemap = {!! json_encode($region_map[0]->longitude) !!};
            Maps();
            mymap.closePopup();
            mymap.flyTo([latitudemap, longitudemap], zoom);
        }
    }

    // JUMP TO VILLE
    function myVille(value) {
        if (value == "All") {
            let zoom = 10;
            let latitudemap = -21.10;
            let longitudemap = 55.50;
            Maps();
            mymap.flyTo([latitudemap, longitudemap], zoom);
            mymap.closePopup();
        }
        if (value == "Saint-Pierre") {
            let zoom = 15;
            let latitudemap = -21.35;
            let longitudemap = 55.48;
            MapS();
            mymap.flyTo([latitudemap, longitudemap], zoom);
            mymap.closePopup();
        } else if (value == "Saint-Denis") {
            let zoom = 14;
            let latitudemap = -20.88;
            let longitudemap = 55.45;
            MapN();
            mymap.flyTo([latitudemap, longitudemap], zoom);
            mymap.closePopup();
        } else if (value == "Saint-Louis") {
            let zoom = 14;
            let latitudemap = -21.29;
            let longitudemap = 55.42;
            MapS();
            mymap.flyTo([latitudemap, longitudemap], zoom);
            mymap.closePopup();
        } else if (value == "Saint-Paul") {
            let zoom = 14;
            let latitudemap = -21.00;
            let longitudemap = 55.278;
            MapO();
            mymap.flyTo([latitudemap, longitudemap], zoom);
            mymap.closePopup();
        }
    }
</script>

