<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Home</title>

  <!-- Tu CSS principal -->
  <link rel="stylesheet" href="assets/css/home.css" />

  <!-- Íconos (Font Awesome) -->
  <link
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
    rel="stylesheet"
  />
  <!-- Fuente opcional -->
  <link
    href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap"
    rel="stylesheet"
  />

  <!-- Tailwind -->
  <script src="https://cdn.tailwindcss.com"></script>

  <!-- Evitar caché -->
  <meta http-equiv="cache-control" content="no-cache" />

  <!-- Slick Carousel CSS -->
  <link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"
  />
  <!-- Custom carousel styles -->
  <style>
    .offers-slider {
      width: 70%; /* Slider ocupa 70% */
      margin: 0 auto;
      position: relative;
    }
    .offers-slider .slick-prev {
      left: 0 !important;
      transform: translateX(-110%) !important; /* Flechas más afuera */
    }
    .offers-slider .slick-next {
      right: 0 !important;
      transform: translateX(110%) !important; /* Flechas más afuera */
    }
  </style>
</head>

<body>

  <!-- Barra de menú -->
  <?php include(__DIR__ . '/paginas/barramenu5index.html'); ?>

  <!-- Video de fondo -->
  <div class="youtube-background">
    <iframe
      src="https://www.youtube-nocookie.com/embed/J_b_MbI58jQ?controls=0&autoplay=1&mute=1&showinfo=0&rel=0&loop=1&playlist=J_b_MbI58jQ"
      frameborder="0"
      allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
      allowfullscreen
    ></iframe>
  </div>

  <!-- Sección Hero -->
  <div class="sec1 hiddenscroll">
    <div class="content">
      <h1 class="hiddenscroll">
        Propiedades y Planes de Previsión <br />
        Familiar al alcance de todos
      </h1>
      <!-- Subtítulo con líneas doradas -->
      <h3 class="hiddenscroll h3m">¡A 2 metros del Monumento!</h3>

      <p class="mainp hiddenscroll">
        Con más de 50 años brindando servicios exequiales y funerarios con un
        personal altamente motivado y enfocado en lograr alta calidad en la
        atención a las familias
      </p>
      <div class="links-b hiddenscroll">
        <a
          href="https://wa.me/18293451020/?text=Hola%2C%20deseo%20más%20información%20sobre%20sus%20servicios.%20%C2%BFMe%20pueden%20ayudar%3F"
          target="_blank"
        >
          <button class="specialbtn">
            Atención Urgente
            <div class="arrow">➜</div>
          </button>
        </a>
        <p class="button-2">
          <u><a href="paginas/servicios.php">Quiero Pagar</a></u>
        </p>
        <a href="paginas/planes.php">
          <p class="button-2"><u>Conocer Servicios</u></p>
        </a>
      </div>
    </div>
  </div>

  <!-- ¿Por qué elegirnos? -->
  <div class="section why-choose-us">
    <h2 class="hiddenscroll">¿Por qué elegirnos?</h2>
    <div class="features">
      <div class="feature hiddenscroll">
        <i class="fas fa-lightbulb"></i>
        <h3>Innovación</h3>
        <p>Somos un parque cementerio único gracias a nuestra avanzada arquitectura e ingeniería.</p>
      </div>
      <div class="feature hiddenscroll">
        <i class="fas fa-user-tie"></i>
        <h3>Atención profesional</h3>
        <p>Contamos con un equipo altamente capacitado, dedicado a ofrecer un servicio con un enfoque humano.</p>
      </div>
      <div class="feature hiddenscroll">
        <i class="fas fa-tree"></i>
        <h3>Entorno acogedor</h3>
        <p>La belleza, tranquilidad, paz y seguridad que ofrecemos invitan a las visitas de familiares y amigos.</p>
      </div>
      <div class="feature hiddenscroll">
        <i class="fas fa-home"></i>
        <h3>Propiedades y Planes de Previsión Familiar</h3>
        <p>Diseñamos opciones con las máximas facilidades para su tranquilidad.</p>
      </div>
      <div class="feature hiddenscroll">
        <i class="fas fa-chart-line"></i>
        <h3>Inversión segura</h3>
        <p>Adquiere una propiedad con una revalorización constante.</p>
      </div>
    </div>
  </div>

  <!-- SECCIÓN "WHAT WE OFFER" - carrusel Slick (3 visibles, avanza 1) -->
  <div class="section what-we-offer">
    <h2 class="hiddenscroll">¿Qué ofrecemos?</h2>

    <div class="offers-slider hiddenscroll">
      <div class="offer">
        <img
          alt="Jardines Familiares"
          src="assets/images/lotefam_brillo4.jpg"
        />
        <div class="description" style="text-align:center; padding:10px 5px;">
          <div style="background:#43b248; color:white; padding:8px 20px; border-radius:30px; display:inline-block; margin-bottom:8px; font-family:serif;">Jardines Familiares</div>
          <div>
            <a href="paginas/planes.php" style="color:#43b248; text-decoration:none; font-size:16px;">Más Información ›</a>
          </div>
        </div>
      </div>

      <div class="offer">
        <img alt="Mausoleos Familiares" src="assets/images/maus_noche2.jpg" />
        <div class="description" style="text-align:center; padding:10px 5px;">
          <div style="background:#43b248; color:white; padding:8px 20px; border-radius:30px; display:inline-block; margin-bottom:8px; font-family:serif;">Mausoleos Familiares</div>
          <div>
            <a href="paginas/planes.php" style="color:#43b248; text-decoration:none; font-size:16px;">Más Información ›</a>
          </div>
        </div>
      </div>

      <div class="offer">
        <img alt="Panteones Familiares" src="assets/images/panteon4.jpg" />
        <div class="description" style="text-align:center; padding:10px 5px;">
          <div style="background:#43b248; color:white; padding:8px 20px; border-radius:30px; display:inline-block; margin-bottom:8px; font-family:serif;">Panteones Familiares</div>
          <div>
            <a href="paginas/planes.php" style="color:#43b248; text-decoration:none; font-size:16px;">Más Información ›</a>
          </div>
        </div>
      </div>

      <div class="offer">
        <img alt="Mausoleos Majestuosos" src="assets/images/maus_garden1.jpg" />
        <div class="description" style="text-align:center; padding:10px 5px;">
          <div style="background:#43b248; color:white; padding:8px 20px; border-radius:30px; display:inline-block; margin-bottom:8px; font-family:serif;">Majestuosos Mausoleos</div>
          <div>
            <a href="paginas/planes.php" style="color:#43b248; text-decoration:none; font-size:16px;">Más Información ›</a>
          </div>
        </div>
      </div>

      <div class="offer">
        <img alt="Nuevos Osarios" src="assets/images/osa.jpeg" />
        <div class="description" style="text-align:center; padding:10px 5px;">
          <div style="background:#43b248; color:white; padding:8px 20px; border-radius:30px; display:inline-block; margin-bottom:8px; font-family:serif;">Nuevos Osarios</div>
          <div>
            <a href="paginas/planes.php" style="color:#43b248; text-decoration:none; font-size:16px;">Más Información ›</a>
          </div>
        </div>
      </div>
      <!-- Agrega más .offer si deseas más items -->
    </div>

    <!-- Botón CTA -->
    <a
      href="https://wa.me/18293451020/?text=Hola%2C%20deseo%20más%20información%20sobre%20sus%20servicios.%20%C2%BFMe%20pueden%20ayudar%3F"
      class="hiddenscroll"
    >
      <button>Quiero Comprar</button>
    </a>
  </div>

  <!-- Sección Contact / Mapa -->
  <div class="section contact">
    <iframe
      src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3761.9431463418705!2d-70.71865509999999!3d19.458017899999994!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8eb1c8aae93f862b%3A0xc4cb4a2de2a42bea!2sParque%20Cementerio%20Jardines%20del%20Recuerdo!5e0!3m2!1ses!2sdo!4v1738111481050!5m2!1ses!2sdo"
      style="border: 0"
      allowfullscreen
      loading="lazy"
      referrerpolicy="no-referrer-when-downgrade"
    ></iframe>
  </div>

  <!-- Testimonios (Reviews completas, sin "leer más") -->
  <div class="section testimonials">
    <h2 class="hiddenscroll">Testimonios de nuestros clientes</h2>
    <div class="carousel">
      <div class="carousel-inner hiddenscroll">
        <div class="testimonial">
          <p>
            "Cuando perdí a mi madre, sentí que el mundo se derrumbaba. Jardines
            del Recuerdo no solo nos dio un lugar hermoso para honrar su
            memoria, sino que nos acompañó en cada paso de nuestro dolor. Aquí,
            cada rincón habla de la importancia de la familia y la conexión que
            trasciende la vida. Estoy muy agradecida por su apoyo."
          </p>
          <h4>María González</h4>
          <span>52 años</span>
          <div class="stars">★★★★★</div>
        </div>
        <div class="testimonial">
          <p>
            "Nunca imaginé que un lugar dedicado a la despedida pudiera
            transmitir tanta paz. El personal nos trató con una sensibilidad
            que nunca olvidaremos. No es solo un cementerio, es un espacio donde
            los recuerdos siguen vivos, donde el amor continúa floreciendo. Un
            lugar que me permitió encontrar serenidad."
          </p>
          <h4>Carlos Rodríguez</h4>
          <span>43 años</span>
          <div class="stars">★★★★★</div>
        </div>
        <div class="testimonial">
          <p>
            "Después de perder a mi esposo, temía los lugares que recordarían mi
            dolor. Pero Jardines del Recuerdo fue diferente. Es un jardín de
            esperanza. Un lugar donde puedo sentirme cerca de él, recordarlo con
            una sonrisa y encontrar consuelo para el corazón. Siempre estaré
            agradecida con todo el equipo."
          </p>
          <h4>Elena Martínez</h4>
          <span>59 años</span>
          <div class="stars">★★★★★</div>
        </div>
        <div class="testimonial">
          <p>
            "En el momento más difícil de nuestra familia, cuando perdimos a
            nuestro hijo, Jardines del Recuerdo nos dio más que un lugar de
            descanso. Nos brindaron un santuario lleno de vida y esperanza, un
            lugar donde siempre podremos recordarlo con amor y sentir que su
            presencia nos acompaña. No hay palabras para describir lo que
            significa para nosotros."
          </p>
          <h4>Laura y Ricken Perez</h4>
          <span>33 y 31 años</span>
          <div class="stars">★★★★★</div>
        </div>
        <!-- Agrega más si quieres más testimonios -->
      </div>
    </div>
  </div>

  <!-- Footer -->
  <?php include(__DIR__ . '/paginas/piepagina1index.html'); ?>

  <!-- Popup Afiliación -->
  <div
    id="popup-afiliacion"
    class="fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center px-4"
    style="display: flex"
  >
    <div
      class="relative bg-white border border-green-600 p-4 w-full max-w-3xl shadow-2xl rounded-xl md:rounded-lg flex flex-col md:flex-row items-center gap-6 scale-90"
    >
      <!-- Botón cerrar -->
      <button
        onclick="document.getElementById('popup-afiliacion').style.display='none'"
        class="absolute top-2 right-3 text-gray-500 hover:text-red-500 text-2xl font-semibold"
      >
        &times;
      </button>

      <!-- Imagen lateral -->
      <div class="w-full md:basis-[62.5%] p-0 m-0">
        <img
          src="assets/images/fieldfam.jpeg"
          alt=""
          class="w-full h-[350px] rounded-lg object-cover object-left m-0 p-0"
        />
      </div>

      <!-- Contenido -->
      <div class="w-full md:basis-[55.0%] text-center md:text-left">
        <h3
          class="text-2xl md:text-3xl font-semibold text-green-700 leading-snug"
          style="font-family: 'Playfair Display', serif"
        >
          Tu tranquilidad y la de tu familia es lo más importante
        </h3>
        <p
          class="text-gray-700 mt-3 text-sm md:text-base"
          style="font-family: 'Lato', sans-serif"
        >
          Afíliate gratis hoy y disfruta de descuentos, ventajas y beneficios
          exclusivos.
        </p>
        <a href="paginas/afiliarse.php">
          <button
            class="mt-5 px-6 py-3 bg-[#43b248] hover:bg-green-600 text-white rounded-lg font-medium transition-all duration-300"
            style="font-family: 'Playfair Display', serif"
          >
            AFÍLIATE GRATIS
          </button>
        </a>
      </div>
    </div>
  </div>

  <!-- jQuery -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

  <!-- Slick Carousel JS -->
  <script src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

  <!-- Menú móvil -->
  <script>
    if (document.getElementById('menu-button')) {
      document
        .getElementById('menu-button')
        .addEventListener('click', function () {
          document.getElementById('mobile-menu').classList.toggle('hidden');
        });
    }
    if (document.getElementById('mobile-nosotros')) {
      document
        .getElementById('mobile-nosotros')
        .addEventListener('click', function () {
          document
            .getElementById('mobile-nosotros-menu')
            .classList.toggle('hidden');
        });
    }
    if (document.getElementById('mobile-servicios')) {
      document
        .getElementById('mobile-servicios')
        .addEventListener('click', function () {
          document
            .getElementById('mobile-servicios-menu')
            .classList.toggle('hidden');
        });
    }
  </script>

  <!-- Configuración de Slick -->
  <script>
    $(document).ready(function () {
      $('.offers-slider').slick({
        slidesToShow: 3, /* Default: intentar mostrar 3 */
        slidesToScroll: 1,
        variableWidth: false, /* Slick gestiona el ancho/espacio */
        infinite: true,
        autoplay: false,
        speed: 800,
        arrows: true,
        prevArrow:
          '<button class="my-arrow slick-prev"><i class="fas fa-chevron-left"></i></button>',
        nextArrow:
          '<button class="my-arrow slick-next"><i class="fas fa-chevron-right"></i></button>',
        responsive: [
          {
            breakpoint: 1240, /* Debajo de 1240px, mostrar 2 */
            settings: {
              slidesToShow: 2
            }
          },
          {
            breakpoint: 830,  /* Debajo de 830px, mostrar 1 */
            settings: {
              slidesToShow: 1
            }
          }
        ]
      });
    });
  </script>

  <!-- Efecto "show on scroll" -->
  <script src="assets/js/showonscroll.js"></script>
</body>
</html>
