const LATITUDE_MAP = -20.249956245793552;
const LONGITUDE_MAP = -70.12817358465354;
let urlCalls = '/api/calls';
let urlMobiles = '/api/mobiles';
let mobileMarkers = [];
let calls = [];
let mobiles = [];

let iconCall = {
    iconUrl: '/images/icons/phone-call.png',
    iconSize: [20, 20],
    iconAnchor: [20, 20],
};

let iconAmbulance = {
    iconUrl: '/images/icons/ambulance.png',
    iconSize: [20, 20],
    iconAnchor: [20, 20],
};

let mapOptions = {
    center: [LATITUDE_MAP, LONGITUDE_MAP],
    zoom: 14
};

let map = new L.map('map' , mapOptions);
let layer = new L.TileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png');
map.addLayer(layer);

async function addCallMarkers() {
    try {
        const response = await axios.get(urlCalls);
        calls = response.data.calls;
        calls.map((call) => {
            if(call.latitude != null && call.longitude != null) {
                let icon = new L.icon(iconCall);
                let latLng = [call.latitude, call.longitude];
                let marker = new L.marker(latLng, {icon: icon});
                marker.bindTooltip(`ID: ${call.id}`).openTooltip();
                marker.addTo(map);
            }
        });
    } catch (error) {
        console.error(error);
    }
}

async function addMobileMarkers() {
    try {
        const response = await axios.get(urlMobiles);
        mobiles = response.data.mobiles;

        
        mobiles.map((mobile) => {
            if(mobile.last_location != null) {
                if(mobile.last_location.latitude != null && mobile.last_location.longitude != null) {
                    let icon = new L.icon(iconAmbulance);
                    let latLng = [mobile.last_location.latitude, mobile.last_location.longitude];
                    let marker = new L.marker(latLng, {icon: icon});
                    mobileMarkers.push(marker);
                    marker.bindTooltip(`${mobile.code} ${mobile.name}`).openTooltip();
                    marker.addTo(map);
                }
            }
        });
    } catch (error) {
        console.error(error);
    }
}

function deleteMobileMarkers() {
    mobileMarkers.map((mobileMarker) => {
        map.removeLayer(mobileMarker);
    });
}

addMobileMarkers();
addCallMarkers();

setInterval(() => {
    deleteMobileMarkers();
    addMobileMarkers();
}, 30000);
