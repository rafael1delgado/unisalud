<div>

    <a target="_blank" href="https://www.openstreetmap.org/?mlat={{ $latitude }}&mlon={{ $longitude }}&zoom=20">Ver mapa</a>
    
    <br><br>


    <input type="text" wire:model="latitude" id="latitude">
    <input type="text" wire:model="longitude" id="longitude">
    
    <script>

        var options = {
            enableHighAccuracy: true,
            timeout: 5000,
            maximumAge: 0
        };

        function success(pos) {
            var crd = pos.coords;

            @this.set('latitude', crd.latitude);
            @this.set('longitude', crd.longitude);
            @this.emit('storeLocation');

            // console.log('Your current position is:');
            // console.log('Latitude : ' + crd.latitude);
            // console.log('Longitude: ' + crd.longitude);
            // console.log('More or less ' + crd.accuracy + ' meters.');
        };

        function error(err) {
            console.warn('ERROR(' + err.code + '): ' + err.message);
        };

        function getLocation() {

            navigator.geolocation.getCurrentPosition(success, error, options);

            setTimeout(getLocation, 10000);
        }

        getLocation();



        // function showPosition(position) {
        //     @this.set('latitude', position.coords.latitude);
        //     @this.set('longitude', position.coords.longitude);

        //     // latitude.value = position.coords.latitude; 
        //     // longitude.value = position.coords.longitude;
        //     Livewire.emit('storeLocation');
        // }
    </script>

</div>
