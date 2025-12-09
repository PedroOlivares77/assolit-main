@extends('baseUsuario')
@section('titulo', 'Viviendas Tuteladas')
@section('contenido')

<section>
  <div id="map" style="height: 500px; border-radius: 10px;"></div>
</section>
<script>
    document.addEventListener("DOMContentLoaded", function () {

        // Coordenadas aproximadas iniciales (centro de la ciudad que quieras)
        let map = L.map('map').setView([40.4167, -3.70325], 13); // Madrid ejemplo

        // Carga del mapa (sin API key)
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19
        }).addTo(map);

        // Ejemplo de viviendas (sustituir por tus datos)
        let viviendas = [
            {
                nombre: "Vivienda Tutelada 1",
                direccion: "Calle Ejemplo 12",
                lat: 40.417,
                lng: -3.703
            },
            {
                nombre: "Vivienda Tutelada 2",
                direccion: "Avenida Paz 22",
                lat: 40.420,
                lng: -3.706
            },
            {
                nombre: "Vivienda Tutelada 3",
                direccion: "Calle Luna 9",
                lat: 40.415,
                lng: -3.699
            }
        ];

        // Poner marcadores en el mapa
        viviendas.forEach(v => {
            L.marker([v.lat, v.lng]).addTo(map)
                .bindPopup(`<b>${v.nombre}</b><br>${v.direccion}`);
        });

    });
</script>
@endsection