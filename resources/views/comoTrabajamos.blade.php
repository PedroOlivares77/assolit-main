@extends('baseUsuario')
@section('titulo', 'Como Trabajamos')
@section('contenido')

<section class="como-trabajamos-section py-5">
  <div class="container text-center">

    <!-- Título -->
    <h2 class="ct-title mb-3">Cómo Trabajamos</h2>
    <hr class="ct-separator mb-5">
    <p class="ct-intro mb-5">
      En ASSOLIT trabajamos siguiendo un enfoque integral, centrado en la persona.
      Nuestro modelo de intervención se organiza en tres grandes áreas: la persona, el hogar y el entorno comunitario.
      Cada área abarca diferentes aspectos de la vida de las personas, buscando su bienestar, desarrollo y participación social.
    </p>

    <!-- Círculos en triángulo -->
    <div class="ct-circles-triangle">
      <div class="ct-circle" data-target="persona">Área de la Persona</div>
      <div class="ct-circle" data-target="hogar">Área del Hogar</div>
      <div class="ct-circle" data-target="entorno">Área del Entorno Comunitario</div>
    </div>

    <!-- Modales de detalle -->
    <div class="ct-modal" id="modal-persona">
      <div class="ct-modal-content">
        <span class="ct-close">&times;</span>
        <h3>Área de la Persona</h3>
        <ul>
          <li>Bienestar físico y actividades día a día: AVDB</li>
          <li>Bienestar emocional</li>
          <li>Educación integral en sexualidad</li>
          <li>Psicoeducación</li>
          <li>Rehabilitación cognitiva</li>
        </ul>
      </div>
    </div>

    <div class="ct-modal" id="modal-hogar">
      <div class="ct-modal-content">
        <span class="ct-close">&times;</span>
        <h3>Área del Hogar</h3>
        <ul>
          <li>Relaciones interpersonales. Convivencia</li>
          <li>Desarrollo personal. AVDI: Actividades del hogar. Recursos comunitarios y aprendizajes funcionales</li>
          <li>Bienestar material. Gestión económica y derechos</li>
        </ul>
      </div>
    </div>

    <div class="ct-modal" id="modal-entorno">
      <div class="ct-modal-content">
        <span class="ct-close">&times;</span>
        <h3>Área del Entorno Comunitario</h3>
        <ul>
          <li>Inclusión social. Participación comunitaria, ocio, deporte y tiempo libre</li>
          <li>Intervención familiar</li>
        </ul>
      </div>
    </div>

  </div>
</section>
<section class="actividades-section py-5">
  <div class="container text-center">

    <!-- Título -->
    <h2 class="mv-title mb-3">Actividades y Deporte </h2>
    <hr class="mv-separator mb-5">

    <!-- Primera fila de imágenes -->

    <!-- Segunda fila de imágenes -->
    <div class="actividades-row d-flex flex-wrap justify-content-center gap-4 mb-4">
      <div class="actividad-img">
        <img src="{{ asset('assets/media/img/fitness.jpg') }}" alt="Deporte">
      </div>
      <div class="actividad-img">
        <img src="{{ asset('assets/media/img/senderismo.jpg') }}" alt="Senderismo">
      </div>
    </div>

    <!-- Descripción segunda fila -->
    <div class="actividades-desc mb-5">
      <p>
        Las actividades deportivas y de senderismo buscan mejorar la condición física, la coordinación,
        la resistencia y el bienestar emocional, fomentando hábitos de vida saludables y la integración social.
        Cada semana se realizan sesiones planificadas para promover la constancia y la motivación:
      </p>
      <ul class="text-start" style="max-width:900px; margin:1rem auto; text-align:justify;">
        <li><strong>Deporte:</strong> se realizan sesiones de fútbol, baloncesto adaptado,
          natación y gimnasia, adaptadas a las capacidades de cada persona, con énfasis en trabajo en equipo,
          habilidades motoras y diversión.</li>
        <li><strong>Senderismo:</strong> se organizan rutas por parques y entornos naturales cercanos,
          fomentando el contacto con la naturaleza, el ejercicio cardiovascular y la socialización. Las rutas se
          planifican según la dificultad y las capacidades de los participantes.</li>
        <li><strong>Actividades recreativas al aire libre:</strong> juegos cooperativos, orientación, picnics y dinámicas
          grupales que fortalecen la confianza, la colaboración y el disfrute del entorno.</li>
      </ul>
      <p>
        Todas estas actividades están diseñadas para que cada persona participe activamente según sus capacidades,
        reciba apoyo cuando sea necesario y pueda progresar a su ritmo. La combinación de talleres creativos,
        actividades de la vida diaria, deporte y senderismo permite un desarrollo integral, mejora la autoestima,
        fortalece la autonomía y promueve la inclusión social y comunitaria.
      </p>
    </div>

    <div class="actividades-row d-flex flex-wrap justify-content-center gap-4 mb-4">
      <div class="actividad-img">
        <img src="{{ asset('assets/media/img/pintura.jpg') }}" alt="Foto de una clase de pintura">
      </div>
      <div class="actividad-img">
        <img src="{{ asset('assets/media/img/coser.jpg') }}" alt="Foto tejiendo">
      </div>
    </div>

    <!-- Descripción primera fila -->
    <div class="actividades-desc mb-5">
      <p>
        Nuestras actividades de la vida cotidiana y talleres creativos están diseñadas para fomentar la autonomía,
        la creatividad y la socialización de cada participante. Cada semana se realizan talleres adaptados a las
        necesidades individuales, con un enfoque lúdico y educativo. Entre las actividades destacan:
      </p>
      <ul class="text-start" style="max-width:900px; margin:1rem auto; text-align:justify;">
        <li><strong>Manualidades:</strong> los participantes trabajan en pintura,
          cerámica, tejido y reciclaje creativo, estimulando la motricidad fina y la imaginación.</li>
        <li><strong>Cocina:</strong> se realizan talleres de cocina saludable, repostería y preparación
          de recetas típicas, fomentando la autonomía, el trabajo en equipo y hábitos de vida saludables.</li>
        <li><strong>Talleres de expresión artística:</strong> música, danza y teatro, realizados los viernes, para potenciar
          la comunicación, la autoestima y la expresión emocional.</li>
        <li><strong>Actividades de la vida diaria:</strong> compras, gestión de recursos personales,
          cuidado del hogar y organización de espacios, practicadas diariamente según el plan individual.</li>
      </ul>
      <p>
        Cada actividad se adapta al nivel y ritmo de cada participante, con apoyo personalizado y supervisión
        constante, para garantizar un desarrollo integral, la participación activa y la adquisición de habilidades
        prácticas que faciliten la independencia en su vida cotidiana.
      </p>
    </div>

  </div>
</section>
<section class="metodologia-section py-5">
  <div class="container">
    <h2 class="mv-title mb-4 text-center">Nuestros Objetivos y Principios Metodológicos</h2>
    <hr class="mv-separator mb-5">

    <div class="metodologia-container d-flex flex-wrap align-items-start justify-content-center gap-4">
      <!-- Imagen -->
      <div class="metodologia-image">
        <img src="{{ asset('assets/media/img/objetivos.png') }}" alt="Check enorme azul">
      </div>

      <!-- Panel de pestañas -->
      <div class="metodologia-tabs">
        <div class="tabs-buttons">
          <button class="tab-btn active" data-tab="principios">Principios Metodológicos</button>
          <button class="tab-btn" data-tab="objetivos1">Objetivos I</button>
          <button class="tab-btn" data-tab="objetivos2">Objetivos II</button>
        </div>
        <div class="tabs-content">
          <div class="tab-content" id="objetivos1">
            <ul>
              <li>Proporcionar un hogar que garantice un adecuado desarrollo personal y social, según sus necesidades y características.</li>
              <li>Ofrecer estabilidad, seguridad y equilibrio emocional en el grupo de convivencia.</li>
              <li>Favorecer habilidades para la vida autónoma y el desarrollo integral de cada persona.</li>
              <li>Facilitar la integración sociolaboral de personas con problemas de salud mental.</li>
              <li>Potenciar independencia, capacidad de elección y toma de decisiones.</li>
              <li>Fomentar normalización, integración y participación activa en la sociedad.</li>
              <li>Procurar relaciones familiares fluidas y positivas.</li>
              <li>Desarrollar la capacidad de dirigir la propia vida y de interpretar el entorno.</li>
            </ul>
          </div>
          <div class="tab-content" id="objetivos2">
            <ul>
              <li>Fortalecer sentido de control, validez y pertenencia a la comunidad.</li>
              <li>Adquirir habilidades necesarias para desenvolverse de forma autónoma en la vida diaria.</li>
              <li>Promover condiciones y estilo de vida saludable, red social adecuada y autodeterminación.</li>
              <li>Conocer y utilizar recursos comunitarios para potenciar recursos individuales.</li>
              <li>Desarrollar autoeficacia, creatividad y regulación emocional para adaptarse mejor a la vida diaria.</li>
              <li>Fomentar autocrítica, compromiso con la recuperación y mantenimiento de habilidades adquiridas.</li>
            </ul>
          </div>
          <div class="tab-content active" id="principios">
            <ul>
              <li><strong>Normalización:</strong> lo entendemos como el derecho de la persona con problemas de
                salud mental a desarrollar una vida lo más normalizada posible, pudiendo utilizar los
                servicios generales de su comunidad.</li>
              <li><strong>Integración:</strong> hacer referencia a la posibilidad de acceder a un ambiente normativo lo menos restrictivo posible.</li>
              <li><strong>Individualización:</strong> adaptar el trabajo a las capacidades y necesidades individuales de
                cada una de las personas usuarias, de forma que cada uno de ellos reciba la ayuda y
                los apoyos que sean necesarios, así como un plan de desarrollo adecuado a sus
                capacidades personales.</li>
              <li><strong>Optimización:</strong> nuestro trabajo debe ir encaminado la mejora de las posibilidades de
                adaptación de las personas usuarias con el entorno en el que se desenvuelven. Por
                muy lento que sea el aprendizaje de una tarea, deberemos enfocarla siempre hacia
                una mejora en su ejecución.</li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<section id="ingreso-tarifas" class="ingreso-section py-5">
  <div class="container text-center">

    <!-- Título -->
    <h2 class="mv-title mb-3">Ingreso en la Vivienda y Tarifas</h2>
    <hr class="mv-separator mb-5">

    <p class="ingreso-intro mb-5">
      Acceder a una de nuestras viviendas tuteladas es un proceso acompañado,
      personalizado y pensado para garantizar que la persona encuentra el lugar adecuado
      para su bienestar, autonomía y desarrollo personal.
    </p>

    <!-- Tarjetas -->
    <div class="ingreso-cards d-flex flex-wrap justify-content-center gap-4">
      <div class="ingreso-card" data-info="perfil">Perfil de la Persona</div>
      <div class="ingreso-card" data-info="requisitos">Requisitos</div>
      <div class="ingreso-card" data-info="ayudas">Cómo Solicitar Ayudas</div>
      <div class="ingreso-card" data-info="preingreso">Preingreso</div>
      <div class="ingreso-card" data-info="tarifas">Tarifas</div>
    </div>

    <!-- Panel de contenido dinámico -->
    <div class="ingreso-panel mt-5" id="ingreso-panel">
      <div class="ingreso-panel-content" id="ingreso-panel-content">
        <p class="text-muted">Haz clic en una de las categorías para ver más información.</p>
      </div>
    </div>

  </div>
</section>
<script>
  const circles = document.querySelectorAll('.ct-circle');
  const modals = document.querySelectorAll('.ct-modal');
  const closes = document.querySelectorAll('.ct-close');

  circles.forEach(circle => {
    circle.addEventListener('click', () => {
      const targetId = circle.getAttribute('data-target');
      document.getElementById(`modal-${targetId}`).style.display = 'flex';
    });
  });

  closes.forEach(closeBtn => {
    closeBtn.addEventListener('click', () => {
      closeBtn.closest('.ct-modal').style.display = 'none';
    });
  });

  // Cerrar al hacer click fuera del contenido
  modals.forEach(modal => {
    modal.addEventListener('click', (e) => {
      if (e.target === modal) modal.style.display = 'none';
    });
  });

  const tabButtons = document.querySelectorAll('.tab-btn');
  const tabContents = document.querySelectorAll('.tab-content');

  tabButtons.forEach(btn => {
    btn.addEventListener('click', () => {
      // Botones
      tabButtons.forEach(b => b.classList.remove('active'));
      btn.classList.add('active');

      // Contenido
      tabContents.forEach(content => content.classList.remove('active'));
      document.getElementById(btn.dataset.tab).classList.add('active');
    });
  });

  const data = {
    perfil: `
        <h3>Perfil de la Persona</h3>
        <p>Podrán acceder a la vivienda aquellas personas adultas con un trastorno mental grave o una enfermedad mental de larga duración, 
        que cuenten con un buen nivel de autonomía y capacidad para desenvolverse de manera independiente. Se trata de personas que, 
        aun manteniendo un grado elevado de funcionalidad, necesitan ciertos apoyos o supervisión puntual para cubrir sus necesidades sociales. 
        </br></br>
        Nuestro objetivo es acompañarlas para que puedan alcanzar una autonomía suficiente que facilite su regreso al entorno familiar o 
        su vida independiente con los apoyos adecuados.
        </p>
    `,
    requisitos: `
        <h3>Requisitos</h3>
        <ul>
            <li>No presentar enfermedades físicas graves o crónicas que requieran atención médica o de enfermería especializada de manera constante.</li>
            <li>No mostrar conductas agresivas o que puedan suponer un riesgo para sí mismo o para otras personas, ni sufrir adicciones severas al alcohol u otras sustancias. En caso de haber tenido una dependencia, 
            será necesario acreditar que se ha completado el tratamiento de desintoxicación y que no existe consumo en la actualidad.</li>
            <li>Necesitar un lugar donde vivir y recibir apoyo, y no contar con un entorno familiar adecuado —ya sea por ausencia, dificultades o imposibilidad— que pueda proporcionar dichos apoyos. 
            También aplica para quienes desean vivir de forma independiente respecto a su familia.</li>
            <li>Contar con un nivel suficiente de autonomía personal y social que permita afrontar, de manera independiente o con apoyos, 
            las actividades básicas de la vida diaria, la convivencia y, en su caso, responsabilidades laborales u ocupacionales.</li>
        </ul>
    `,
    ayudas: `
        <h3>Cómo Solicitar Ayudas para Acceder a una Vivienda Tutelada</h3>
        <ul>
            <li>Contar con una Resolución de Grado de Dependencia. A partir del Grado 1 es posible acceder a este recurso.</li>
            <li>Entregar toda la documentación correctamente cumplimentada para solicitar la PVS Garantía. Es importante recordar que, en el documento “Modelo para solicitar nuevas preferencias de servicios o prestaciones, 
            ampliación o revisión del PIA”, únicamente debe marcarse la opción Servicio de Atención Residencial.</li>
            <li>El/la trabajador/a social de dependencia del municipio debe actualizar en el sistema ADA las nuevas preferencias 
            indicando Servicio de Atención Residencial.</li>
        </ul>
    `,
    preingreso: `
        <h3>Proceso de Preingreso</h3>
        <p>
        Antes del ingreso, se realiza una entrevista entre la persona interesada y/o propuesta y el/la coordinador/a o responsable de la vivienda.
        </br>
        Durante este encuentro se presenta el proyecto del recurso, 
        se explica su funcionamiento y se valora la idoneidad del ingreso, considerando tanto las necesidades de la persona como la dinámica del grupo convivencial.
        </br></br>
        Durante la visita, se introduce al futuro usuario/a al equipo profesional y a los residentes que estén presentes, mostrándole las estancias comunes y la que será su habitación (cama, armario y demás elementos). 
        También se ofrece información sobre los servicios disponibles, los horarios y las normas básicas de convivencia.
        </br></br>
        Este espacio sirve igualmente para resolver dudas, aclarar cualquier aspecto relevante e intercambiar teléfonos de contacto u otros datos necesarios para formalizar el proceso de alta.
        </br></br>
        Para efectuar el ingreso, deberá aportarse la siguiente documentación:
        </p>
        <ul>
            <li>Pauta farmacológica actual, junto con la medicación correspondiente.</li>
            <li>Informes médicos, psicológicos y sociales disponibles.</li>
            <li>Certificado del grado de diversidad funcional (se realizará copia).</li>
            <li>Documentación relacionada con la incapacidad, en caso de existir (se realizará copia).</li>
            <li>DNI (se realizará copia).</li>
            <li>Tarjeta sanitaria o SIP (se realizará copia).</li>
            <li>Cartilla bancaria, si procede.</li>
            <li>Cualquier otro documento relevante que sea necesario conservar.</li>
        </ul>
        <p>Además, se podrá entregar el Pliego de Condiciones Generales  Reglamento de Régimen Interno.</p>
    `,
    tarifas: `
        <h3>Tarifas</h3>
        <p>
            La cuota mensual de la Vivienda Tutelada es de 2.500 € (IVA incluido) e incorpora los siguientes servicios:
        </p>
        <ul>
            <li>Alojamiento.</li>
            <li>Entrenamiento y refuerzo de habilidades adaptativas en un entorno cotidiano, con el objetivo de favorecer la mayor autonomía posible y una adecuada integración social. 
            Esto incluye apoyo en tareas de restauración, higiene, limpieza, acompañamiento social, así como actividades ocupacionales y de ocio.</li>
            <li>Promoción de la convivencia, mediante propuestas socioculturales y acciones que faciliten la integración y la participación activa en la comunidad.</li>
        </ul>
        <p>Los Servicios Complementarios hacen referencia a todas aquellas prestaciones que 
        no estén contempladas dentro de la Cartera de Servicios de la Vivienda Tutelada (según el Art. 2.2.1. del R.R.I.).</p>
    `
  };

  const tarjetas = document.querySelectorAll(".ingreso-card");
  const panel = document.getElementById("ingreso-panel");
  const panelContent = document.getElementById("ingreso-panel-content");

  let tarjetaActiva = null; // Guarda cuál está abierta

  tarjetas.forEach(card => {
    card.addEventListener("click", () => {
      const infoKey = card.dataset.info;

      // Si la misma tarjeta se vuelve a pulsar → cerrar panel
      if (tarjetaActiva === infoKey) {
        panel.style.display = "none";
        tarjetaActiva = null;
        return;
      }

      // Mostrar contenido
      panel.style.display = "block";
      panelContent.innerHTML = data[infoKey];

      // Actualizar activa
      tarjetaActiva = infoKey;
    });
  });
</script>
@endsection