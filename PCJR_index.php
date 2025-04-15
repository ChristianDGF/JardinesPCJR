<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1.0" />
  <title>Home</title>

  <!-- CSS principal -->
  <link rel="stylesheet" href="assets/css/home.css" />

  <!-- Íconos (Font Awesome) -->
  <link
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
    rel="stylesheet"
  />
  <!-- Fuentes -->
  <link
    href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap"
    rel="stylesheet"
  />

  <!-- Tailwind -->
  <script src="https://cdn.tailwindcss.com"></script>

  <!-- Evitar caché -->
  <meta http-equiv="cache-control" content="no-cache" />
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
      <h1 class="hiddenscroll">Planes de Previsión <br />Familiar Flexibles</h1>
      <h3 class="hiddenscroll h3m">¡A 2 metros del Monumento!</h3>
      <p class="mainp hiddenscroll">
        Con más de 50 años brindando servicios exequiales y funerarios con un
        personal altamente motivado y enfocado en lograr alta calidad en la
        atención a las familias
      </p>
      <div class="links-b hiddenscroll">
        <a
          href="https://wa.me/18293451020/?text=Hola%2C%20deseo%20más%20información%20sobre%20sus%20servicios.%20¿Me%20pueden%20ayudar?"
          target="_blank"
          ><button class="specialbtn">
            Atención Urgente
            <div class="arrow">➜</div>
          </button></a
        >
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
        <i class="fas fa-hand-holding-heart"></i>
        <h3>Atención Profesional</h3>
        <p>
          Ofrecemos un abrazo silencioso, acompañándote con sensibilidad en cada
          paso.
        </p>
      </div>
      <div class="feature hiddenscroll">
        <i class="fas fa-home"></i>
        <h3>Consuelo y Respeto</h3>
        <p>
          Un lugar donde honres la vida de nuestros seres queridos con dignidad
          y amor.
        </p>
      </div>
      <div class="feature hiddenscroll">
        <i class="fas fa-users"></i>
        <h3>Planes Familiares</h3>
        <p>
          Ofrecemos soluciones flexibles, porque entendemos lo importante que es
          la familia.
        </p>
      </div>
      <div class="feature hiddenscroll">
        <i class="fas fa-seedling"></i>
        <h3>Inversión con Significado</h3>
        <p>
          Ofrecemos un lugar de memoria permanente que crece en valor
          sentimental.
        </p>
      </div>
      <div class="feature hiddenscroll">
        <i class="fas fa-tree"></i>
        <h3>Espacio para los Recuerdos</h3>
        <p>
          Ofrecemos un ambiente de belleza y tranquilidad para conectar con
          familiares y amigos.
        </p>
      </div>
      <div class="feature hiddenscroll">
        <i class="fas fa-church"></i>
        <h3>Refugio de Paz</h3>
        <p>
          Santuario diseñado con innovación arquitectónica e ingeniería avanzada
          para darte el espacio que necesitas.
        </p>
      </div>
    </div>
  </div>

  <!-- SECCIÓN "WHAT WE OFFER" - 3 VISIBLES, DESLIZA 1 CON FLECHAS PERSONALIZADAS -->
  <div class="section what-we-offer">
    <h2 class="hiddenscroll">¿Qué ofrecemos?</h2>

    <!-- Contenedor general del carrusel -->
    <div class="carousel-container hiddenscroll">
      <!-- Flecha Izquierda -->
      <button class="arrow arrow-left">
        <i class="fas fa-chevron-left"></i>
      </button>

      <!-- Ventana que "oculta" el sobrante -->
      <div class="carousel-track-container">
        <!-- Pista que agrupa todas las ofertas en línea -->
        <div class="carousel-track">
          <!-- Cada "offer" es un item del carrusel -->
          <div class="offer">
            <img
              alt="Jardines Familiares"
              src="assets/images/lotefam_brillo4.jpg"
            />
            <div class="description">
              <h3>Jardines Familiares</h3>
              <p class="btnmasinfo">
                <a href="paginas/planes.php">Más Información</a>
              </p>
            </div>
          </div>
          <div class="offer">
            <img
              alt="Mausoleos Familiares"
              src="assets/images/maus_noche2.jpg"
            />
            <div class="description">
              <h3>Mausoleos Familiares</h3>
              <p class="btnmasinfo">
                <a href="paginas/planes.php">Más Información</a>
              </p>
            </div>
          </div>
          <div class="offer">
            <img alt="Panteones Familiares" src="assets/images/panteon4.jpg" />
            <div class="description">
              <h3>Panteones Familiares</h3>
              <p class="btnmasinfo">
                <a href="paginas/planes.php">Más Información</a>
              </p>
            </div>
          </div>
          <div class="offer">
            <img alt="Majestuosos Mausoleos" src="assets/images/maus_garden1.jpg" />
            <div class="description">
              <h3>Majestuosos Mausoleos</h3>
              <p class="btnmasinfo">
                <a href="paginas/planes.php">Más Información</a>
              </p>
            </div>
          </div>
          <div class="offer">
            <img alt="Nuevos Osarios" src="assets/images/lotefam_brillo1.jpg" />
            <div class="description">
              <h3>Nuevos Osarios</h3>
              <p class="btnmasinfo">
                <a href="paginas/planes.php">Más Información</a>
              </p>
            </div>
          </div>
          <!-- Si tienes más, agrega más .offer -->
        </div>
      </div>

      <!-- Flecha Derecha -->
      <button class="arrow arrow-right">
        <i class="fas fa-chevron-right"></i>
      </button>
    </div>

    <!-- Botón CTA fuera del carrusel -->
    <a href="pages/Afiliarse.html" class="hiddenscroll">
      <button>Quiero Comprar</button>
    </a>
  </div>

  <!-- Mapa / Contacto -->
  <div class="section contact">
    <iframe
      src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3761.9431463418705!2d-70.71865509999999!3d19.458017899999994!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8eb1c8aae93f862b%3A0xc4cb4a2de2a42bea!2sParque%20Cementerio%20Jardines%20del%20Recuerdo!5e0!3m2!1ses!2sdo!4v1738111481050!5m2!1ses!2sdo"
      style="border: 0"
      allowfullscreen=""
      loading="lazy"
      referrerpolicy="no-referrer-when-downgrade"
    ></iframe>
  </div>

  <!-- Testimonios -->
  <div class="section testimonials">
    <h2 class="hiddenscroll">Testimonios de nuestros clientes</h2>
    <div class="carousel">
      <div class="carousel-inner hiddenscroll">
        <div class="testimonial">
          <p>
            "Cuando perdí a mi madre... (leer más)"
          </p>
          <h4>María González</h4>
          <span>52 años</span>
          <div class="stars">★★★★★</div>
        </div>
        <div class="testimonial">
          <p>
            "Nunca imaginé que... (leer más)"
          </p>
          <h4>Carlos Rodríguez</h4>
          <span>43 años</span>
          <div class="stars">★★★★★</div>
        </div>
        <div class="testimonial">
          <p>
            "Después de perder a mi esposo... (leer más)"
          </p>
          <h4>Elena Martínez</h4>
          <span>59 años</span>
          <div class="stars">★★★★★</div>
        </div>
        <div class="testimonial">
          <p>
            "En el momento más difícil... (leer más)"
          </p>
          <h4>Laura y Ricken Perez</h4>
          <span>33 y 31 años</span>
          <div class="stars">★★★★★</div>
        </div>
        <!-- y etc, duplicar para infinito -->
      </div>
    </div>
  </div>

  <!-- Footer -->
  <?php include(__DIR__ . '/paginas/piepagina1index.html'); ?>

  <!-- Popup Afiliación -->
  <div
    id="popup-afiliacion"
    class="fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center px-4"
    style="display: none"
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

  <!-- jQuery (opcional, si usas otras cosas con jQuery) -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

  <!-- Menú móvil (ajusta según tus IDs reales) -->
  <script>
    if(document.getElementById('menu-button')){
      document.getElementById('menu-button').addEventListener('click', function() {
        document.getElementById('mobile-menu').classList.toggle('hidden');
      });
    }
    if(document.getElementById('mobile-nosotros')){
      document.getElementById('mobile-nosotros').addEventListener('click', function() {
        document.getElementById('mobile-nosotros-menu').classList.toggle('hidden');
      });
    }
    if(document.getElementById('mobile-servicios')){
      document.getElementById('mobile-servicios').addEventListener('click', function() {
        document.getElementById('mobile-servicios-menu').classList.toggle('hidden');
      });
    }
  </script>

  <!-- Carrusel JS (mueve 3 simultáneas, flecha = 1 item) -->
  <script>
    const track = document.querySelector('.carousel-track');
    const slides = Array.from(track.children);
    const leftArrow = document.querySelector('.arrow-left');
    const rightArrow = document.querySelector('.arrow-right');

    // Número de tarjetas visibles a la vez
    let slidesToShow = 3;

    // Ancho de una sola tarjeta (lo calculamos después que cargue la página)
    let slideWidth = slides[0].getBoundingClientRect().width;
    let currentIndex = 0; 
    // Máximo índice inicial (cuando ya no podamos mover + a la derecha):
    //   totalSlides - slidesToShow
    let maxIndex = slides.length - slidesToShow;

    // Acomoda cada slide en posición horizontal (CSS transform no es suficiente
    // si las .offer tienen margin, etc. Ajustamos con left = i * slideWidth)
    slides.forEach((slide, i) => {
      slide.style.left = (slideWidth + 20) * i + 'px'; 
      // +20 si tienes un margen horizontal de 20px, ajusta según tu gusto
    });

    // Función para actualizar la posición de track
    function moveCarousel(){
      track.style.transform = `translateX(-${(slideWidth + 20) * currentIndex}px)`;
    }

    // Flecha izquierda
    leftArrow.addEventListener('click', () => {
      // retrocedemos 1
      currentIndex = Math.max(0, currentIndex - 1);
      moveCarousel();
    });

    // Flecha derecha
    rightArrow.addEventListener('click', () => {
      // avanzamos 1
      currentIndex = Math.min(maxIndex, currentIndex + 1);
      moveCarousel();
    });

    // Ajuste responsive: si detectas que la pantalla es menor, 
    // podrías recalcular slidesToShow = 1 o 2 y maxIndex = slides.length - slidesToShow, etc.
    // (Para hacerlo simple, lo omito. Pero si gustas, se puede meter un listener de 'resize'.)
    
  </script>

  <!-- Efecto show on scroll -->
  <script src="assets/js/showonscroll.js"></script>
</body>
</html>
