@extends('baseUsuario')
@section('titulo', 'Viviendas Tuteladas')
@section('contenido')

<section class="map-section" style="height: 500px; margin-bottom: 4rem;">
    <div id="map" style="height: 100%; width: 100%;"></div>
</section>

<div class="container py-5">

    <!-- Vivienda 1 -->
    <section id="hogar-olivo" class="vivienda-section">
        <h2 class="vivienda-title">Hogar Olivo (Sagunto)</h2>
        <p class="vivienda-description">
            Ubicado en el corazón de Sagunto, Hogar Olivo ofrece un entorno seguro y acogedor, pensado para favorecer la autonomía y la comodidad de sus residentes. Sus instalaciones cuentan con habitaciones adaptadas, amplios espacios comunes y zonas de descanso, garantizando bienestar y tranquilidad.</br>
            </br>
            En los alrededores, los residentes disponen de farmacias, centros de salud, supermercados y cafeterías para cubrir todas sus necesidades básicas de manera fácil y accesible. Además, pueden disfrutar de paseos tranquilos por el Castillo de Sagunto, el Teatro Romano o el Parque Natural de la Sierra Calderona, proporcionando un entorno que combina historia, naturaleza y cultura.</br>
            </br>
            Hogar Olivo organiza actividades diarias adaptadas a cada necesidad, incluyendo talleres de manualidades, clases de cocina, gimnasia suave y sesiones de memoria, fomentando tanto la socialización como la estimulación cognitiva. También se programan excursiones cortas y visitas culturales, ofreciendo experiencias enriquecedoras y seguras para los residentes.</br>
        </p>

        <div class="vivienda-photos d-flex flex-wrap gap-2 mb-5">
            <img src="{{asset('assets/media/img/olivo_1.png')}}" alt="Hogar Olivo" class="vivienda-img" style="max-width:200px; cursor:pointer;">
            <img src="{{asset('assets/media/img/olivo_2.png')}}" alt="Hogar Olivo" class="vivienda-img" style="max-width:200px; cursor:pointer;">
            <img src="{{asset('assets/media/img/olivo_3.png')}}" alt="Hogar Olivo" class="vivienda-img" style="max-width:200px; cursor:pointer;">
            <img src="{{asset('assets/media/img/olivo_4.png')}}" alt="Hogar Olivo" class="vivienda-img" style="max-width:200px; cursor:pointer;">
            <img src="{{asset('assets/media/img/olivo_5.jpg')}}" alt="Hogar Olivo" class="vivienda-img" style="max-width:200px; cursor:pointer;">
            <img src="{{asset('assets/media/img/olivo_5.jpg')}}" alt="Hogar Olivo" class="vivienda-img" style="max-width:200px; cursor:pointer;">
        </div>
    </section>

    <!-- Vivienda 2 -->
    <section id="hogar-encina" class="vivienda-section">
        <h2 class="vivienda-title">Hogar Encina (Segorbe)</h2>
        <p class="vivienda-description">
            Hogar Encina se encuentra en Segorbe, ofreciendo un espacio acogedor y seguro para sus residentes. Las instalaciones incluyen habitaciones adaptadas, zonas comunes amplias y accesibles, y áreas de descanso, pensadas para el confort y la seguridad.</br>
            </br>
            El hogar está rodeado de servicios esenciales como centros de salud, farmacias, supermercados y transporte público, asegurando que todo lo necesario esté cerca y sea de fácil acceso. Para el ocio y la recreación, los residentes pueden dar paseos por la Catedral de Segorbe, disfrutar de la Plaza del Agua Limpia o explorar la Sierra de Espadán, en rutas tranquilas y adaptadas.</br>
            </br>
            Las actividades del hogar están diseñadas para favorecer la participación y el bienestar, incluyendo talleres de jardinería, sesiones de musicoterapia, gimnasia adaptada, grupos de lectura y manualidades. También se organizan pequeñas excursiones y visitas culturales, promoviendo un estilo de vida activo y seguro dentro de un ambiente familiar.
        </p>

        <div class="vivienda-photos d-flex flex-wrap gap-2 mb-5">
            <img src="{{asset('assets/media/img/olivo_1.png')}}" alt="Hogar Olivo" class="vivienda-img" style="max-width:200px; cursor:pointer;">
            <img src="{{asset('assets/media/img/olivo_2.png')}}" alt="Hogar Olivo" class="vivienda-img" style="max-width:200px; cursor:pointer;">
            <img src="{{asset('assets/media/img/olivo_3.png')}}" alt="Hogar Olivo" class="vivienda-img" style="max-width:200px; cursor:pointer;">
            <img src="{{asset('assets/media/img/olivo_4.png')}}" alt="Hogar Olivo" class="vivienda-img" style="max-width:200px; cursor:pointer;">
            <img src="{{asset('assets/media/img/olivo_5.jpg')}}" alt="Hogar Olivo" class="vivienda-img" style="max-width:200px; cursor:pointer;">
            <img src="{{asset('assets/media/img/olivo_5.jpg')}}" alt="Hogar Olivo" class="vivienda-img" style="max-width:200px; cursor:pointer;">
        </div>
    </section>

    <!-- Vivienda 3 -->
    <section id="hogar-sauce" class="vivienda-section">
        <h2 class="vivienda-title">Hogar Sauce (Castellón)</h2>
        <p class="vivienda-description">
            En Castellón, Hogar Sauce proporciona un entorno tranquilo y espacioso, pensado para el bienestar físico, emocional y social de sus residentes. Las instalaciones incluyen habitaciones adaptadas, zonas de convivencia y espacios de descanso, todas accesibles y seguras.</br>
            </br>
            En las cercanías se encuentran supermercados, farmacias, cafés y librerías, así como espacios culturales como el Museo de Bellas Artes o el Parque Ribalta, perfectos para paseos adaptados a todas las necesidades. La proximidad al centro urbano permite combinar tranquilidad con actividades de ocio y culturales.</br>
            </br>
            Hogar Sauce propone un programa de actividades variadas, incluyendo clases de gimnasia suave, talleres de manualidades, música y baile adaptado, excursiones a la playa o al parque, fomentando tanto la socialización como la estimulación cognitiva y física. El objetivo es crear un entorno seguro y activo, donde cada residente pueda disfrutar de la vida diaria con autonomía y compañía.
        </p>
        <div class="vivienda-photos d-flex flex-wrap gap-2 mb-5">
            <img src="{{asset('assets/media/img/olivo_1.png')}}" alt="Hogar Olivo" class="vivienda-img" style="max-width:200px; cursor:pointer;">
            <img src="{{asset('assets/media/img/olivo_2.png')}}" alt="Hogar Olivo" class="vivienda-img" style="max-width:200px; cursor:pointer;">
            <img src="{{asset('assets/media/img/olivo_3.png')}}" alt="Hogar Olivo" class="vivienda-img" style="max-width:200px; cursor:pointer;">
            <img src="{{asset('assets/media/img/olivo_4.png')}}" alt="Hogar Olivo" class="vivienda-img" style="max-width:200px; cursor:pointer;">
            <img src="{{asset('assets/media/img/olivo_5.jpg')}}" alt="Hogar Olivo" class="vivienda-img" style="max-width:200px; cursor:pointer;">
            <img src="{{asset('assets/media/img/olivo_5.jpg')}}" alt="Hogar Olivo" class="vivienda-img" style="max-width:200px; cursor:pointer;">
        </div>
    </section>

    <!-- Vivienda 4 -->
    <section id="hogar-cerezo" class="vivienda-section">
        <h2 class="vivienda-title">Hogar Cerezo (Moncada)</h2>
        <p class="vivienda-description">
            Ubicado en Moncada, Hogar Cerezo ofrece un hogar seguro y acogedor, con instalaciones diseñadas para el bienestar integral de sus residentes. Dispone de habitaciones adaptadas, áreas comunes accesibles y espacios de descanso, creando un entorno confortable y protector.</br>
            </br>
            La zona alrededor cuenta con parques, farmacias, pequeños comercios y centros médicos, permitiendo que los residentes puedan acceder fácilmente a todo lo necesario. Además, se pueden organizar paseos tranquilos por el centro histórico o rutas suaves por el Parque de la Constitución, fomentando el contacto con la naturaleza y la vida comunitaria.</br>
            </br>
            El hogar organiza actividades adaptadas, como talleres de memoria, gimnasia ligera, clases de cocina, cine adaptado y música, buscando estimular tanto el cuerpo como la mente. Las excursiones cortas y las actividades culturales completan una rutina enriquecedora y segura, que respeta los ritmos y capacidades de cada persona.
        </p>
        <div class="vivienda-photos d-flex flex-wrap gap-2 mb-5">
            <img src="{{asset('assets/media/img/olivo_1.png')}}" alt="Hogar Olivo" class="vivienda-img" style="max-width:200px; cursor:pointer;">
            <img src="{{asset('assets/media/img/olivo_2.png')}}" alt="Hogar Olivo" class="vivienda-img" style="max-width:200px; cursor:pointer;">
            <img src="{{asset('assets/media/img/olivo_3.png')}}" alt="Hogar Olivo" class="vivienda-img" style="max-width:200px; cursor:pointer;">
            <img src="{{asset('assets/media/img/olivo_4.png')}}" alt="Hogar Olivo" class="vivienda-img" style="max-width:200px; cursor:pointer;">
            <img src="{{asset('assets/media/img/olivo_5.jpg')}}" alt="Hogar Olivo" class="vivienda-img" style="max-width:200px; cursor:pointer;">
            <img src="{{asset('assets/media/img/olivo_5.jpg')}}" alt="Hogar Olivo" class="vivienda-img" style="max-width:200px; cursor:pointer;">
        </div>
    </section>

    <!-- Vivienda 5 -->
    <section id="hogar-almendro" class="vivienda-section">
        <h2 class="vivienda-title">Hogar Almendro (Puzol)</h2>
        <p class="vivienda-description">
            Hogar Almendro, situado en Puzol, combina confort, seguridad y atención personalizada, ofreciendo un entorno pensado para la vida activa y autónoma de sus residentes. Sus instalaciones incluyen habitaciones adaptadas, zonas comunes confortables y espacios de descanso, todo con accesibilidad plena.</br>
            </br>
            En los alrededores se encuentran farmacias, supermercados, cafeterías y la playa, proporcionando posibilidades de ocio accesible y tranquilo. Paseos por el Puerto de Puzol o actividades al aire libre permiten disfrutar de la naturaleza y la comunidad de manera segura.</br>
            </br>
            El hogar propone un completo programa de actividades adaptadas: talleres de cocina, gimnasia suave, sesiones de musicoterapia, juegos de mesa y excursiones cortas, fomentando la interacción social, la estimulación cognitiva y el bienestar emocional. Todo está diseñado para que cada residente pueda sentirse seguro, acompañado y activo, disfrutando de un hogar cálido y acogedor.
        </p>
        <div class="vivienda-photos d-flex flex-wrap gap-2 mb-5">
            <img src="{{asset('assets/media/img/olivo_1.png')}}" alt="Hogar Olivo" class="vivienda-img" style="max-width:200px; cursor:pointer;">
            <img src="{{asset('assets/media/img/olivo_2.png')}}" alt="Hogar Olivo" class="vivienda-img" style="max-width:200px; cursor:pointer;">
            <img src="{{asset('assets/media/img/olivo_3.png')}}" alt="Hogar Olivo" class="vivienda-img" style="max-width:200px; cursor:pointer;">
            <img src="{{asset('assets/media/img/olivo_4.png')}}" alt="Hogar Olivo" class="vivienda-img" style="max-width:200px; cursor:pointer;">
            <img src="{{asset('assets/media/img/olivo_5.jpg')}}" alt="Hogar Olivo" class="vivienda-img" style="max-width:200px; cursor:pointer;">
            <img src="{{asset('assets/media/img/olivo_5.jpg')}}" alt="Hogar Olivo" class="vivienda-img" style="max-width:200px; cursor:pointer;">
        </div>
    </section>

</div>

<!-- JS de Leaflet -->
<script>
    // Inicializar mapa centrado en España
    var map = L.map('map').setView([39.7, -0.35], 9);

    // Añadir capa base
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '© OpenStreetMap',
        maxZoom: 19
    }).addTo(map);

    // Datos de las viviendas (coordenadas aproximadas)
    const viviendas = [{
            id: 'hogar-olivo',
            name: 'Hogar Olivo',
            coords: [39.679874, -0.271047]
        },
        {
            id: 'hogar-encina',
            name: 'Hogar Encina',
            coords: [39.849956, -0.485267]
        },
        {
            id: 'hogar-sauce',
            name: 'Hogar Sauce',
            coords: [39.982443, -0.048763]
        },
        {
            id: 'hogar-cerezo',
            name: 'Hogar Cerezo',
            coords: [39.545364, -0.392489]
        },
        {
            id: 'hogar-almendro',
            name: 'Hogar Almendro',
            coords: [39.614971, -0.302527]
        }
    ];

    var viviendaIcon = L.icon({
        iconUrl: 'assets/media/img/favicon.png', // tu imagen de marcador
        iconSize: [40, 40], // tamaño del icono
        iconAnchor: [20, 40], // punto del icono que se coloca en las coordenadas
        popupAnchor: [0, -40] // punto donde aparecerá el popup relativo al icono
    });

    // Crear marcadores
    viviendas.forEach(v => {
        const marker = L.marker(v.coords, {
                icon: viviendaIcon
            }).addTo(map)
            .bindPopup(`<b>${v.name}</b>`);

        marker.on('click', function() {
            document.getElementById(v.id).scrollIntoView({
                behavior: 'smooth'
            });
        });
    });

    const imgs = document.querySelectorAll('.vivienda-img');

    imgs.forEach(img => {
        img.addEventListener('click', () => {
            // Crear overlay
            const overlay = document.createElement('div');
            overlay.classList.add('img-zoom-overlay');

            // Crear imagen grande
            const imgZoom = document.createElement('img');
            imgZoom.src = img.src;

            overlay.appendChild(imgZoom);
            document.body.appendChild(overlay);

            // Cerrar al hacer clic en overlay
            overlay.addEventListener('click', () => {
                document.body.removeChild(overlay);
            });
        });
    });
</script>
@endsection