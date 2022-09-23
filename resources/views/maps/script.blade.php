<script src="https://unpkg.com/leaflet@1.9.1/dist/leaflet.js" integrity="sha256-NDI0K41gVbWqfkkaHj15IzU7PtMoelkzyKp8TOaFQ3s=" crossorigin=""></script>
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
            let marker = L.marker([graff.latitude, graff.longitude], {
                icon: greenIcon
            }).addTo(mymap).bindPopup('<div class="mappopup"><img class="mt-4" src="/storage/miniatures/' + pics +'" /><a href="/details/' + graff.id +'"><h1 class="py-2 hover:bg-green-800">Plus d\'info</h1></a></div>');
            markers[graff.id] = marker;
        }
    
    
      function centerMapOnPost(id){
            mymap.flyTo(markers[id].getLatLng(), 18);
            mymap.on("zoomend", () => { markers[id].openPopup(); });
            
    
        }
      
    </script>