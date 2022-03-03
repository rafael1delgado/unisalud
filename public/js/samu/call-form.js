const URL_COMMUNES = '/api/region/1/communes';
const LATITUDE_MAP = -20.26945979;
const LONGITUDE_MAP = -70.10122776;
const ZOOM = 15;
let communes = [];
let inputLatitude = document.getElementById("latitude");
let inputLongitude = document.getElementById("longitude");
let inputCommune = document.getElementById('for-commune');
let latitude = (inputLatitude.value === '') ? LATITUDE_MAP : inputLatitude.value;
let longitude = (inputLongitude.value === '')? LONGITUDE_MAP : inputLongitude.value;

let mapOptions = {
    center: [latitude, longitude],
    zoom: ZOOM
}

let map = new L.map('map' , mapOptions);
let layer = new L.TileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png');
map.addLayer(layer);

let marker = new L.Marker([latitude, longitude], { 
    draggable: true,
});

getCommunes();
marker.addTo(map);

async function getCommunes() {
    try {
        const response = await axios.get(URL_COMMUNES);
        communes = response.data.communes;
    } catch (error) {
        console.error(error);
    }
}

function findCommune(idCommune) {
    return communes.findIndex((commune) => commune.id == idCommune);
}

marker.on('drag', (e) => {
    var marker = e.target;
    var latLang = marker.getLatLng();

    let valueLatitude = latLang.lat;
    let valueLongitude = latLang.lng;
    
    inputLatitude.setAttribute('value', valueLatitude.toFixed(8));
    inputLongitude.setAttribute('value', valueLongitude.toFixed(8));

    marker.setLatLng(latLang);
});

inputCommune.addEventListener('change', (event) => {
    let idCommune = event.target.value;
    let newLatitude = LATITUDE_MAP;
    let newLongitude = LONGITUDE_MAP;

    if(idCommune != '') {
        let indexCommune = findCommune(idCommune);
        let commune = communes[indexCommune];
        newLatitude = commune.latitude;
        newLongitude = commune.longitude;
    }

    marker.setLatLng([newLatitude, newLongitude]);
    map.setView([newLatitude, newLongitude], ZOOM);
    
    inputLatitude.setAttribute('value', newLatitude);
    inputLongitude.setAttribute('value', newLongitude);
});
