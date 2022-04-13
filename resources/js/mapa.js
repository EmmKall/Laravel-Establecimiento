if( document.querySelector('#mapa') ){
    document.addEventListener('DOMContentLoaded', () => {

        const lat = 19.4130206;
        const lng = -98.9844038;

        const mapa = L.map('mapa').setView([lat, lng], 17);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(mapa);

        let marker;

        // agregar el pin
        marker = new L.marker([lat, lng], {
            draggable: true,
            autoPan: true,
        }).addTo(mapa);

        //Obtener coordenadas por pin
        marker.on('moveend', function(e){
            //Forma por e.target
            //const lat = e.target._latlng.lat;
            //const lng = e.target._latlng.lng;
            //Por método
            const posicion = marker.getLatLng();
            //Centrar al mover el ping
            mapa.panTo( new L.LatLng( posicion.lat, posicion.lng ) );
            console.log(  );
        });
    });
}
