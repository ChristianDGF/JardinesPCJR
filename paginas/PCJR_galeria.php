<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>PCJR - GALERÍA</title>

  <!-- CSS externo -->
  <link rel="stylesheet" href="../assets/css/galeria.css">

  <!-- Librerías -->
  <script src="https://cdn.jsdelivr.net/npm/locomotive-scroll@4.0.6/dist/locomotive-scroll.min.js"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet"/>
  <script src="https://cdn.tailwindcss.com"></script>
  <meta http-equiv="CACHE-CONTROL" content="NO-CACHE">
</head>

<body>

  <!-- Header/menu -->
  <?php include(__DIR__ . '/barramenu5.html'); ?>

  <!-- Título de sección -->
  <div class="sec1">
    <img class="imgsec1" src="../assets/images/maus_garden1.jpg" alt="Imagen principal de la galería"/>
    <h1>Galería</h1>
  </div>

  <!-- Galería en formato grid -->
  <section>
    <div class="gallery-grid">
      <div class="gallery-item big"><img src="../assets/images/maus_noche2.jpg" alt="Imagen 1"></div>
      <div class="gallery-item"><img src="../assets/images/DSC_0621.JPG" alt="Imagen 2"></div>
      <div class="gallery-item tall"><img src="../assets/images/panteon_brillo5.jpg" alt="Imagen 3"></div>
      <div class="gallery-item"><img src="../assets/images/DSC_1708.JPG" alt="Imagen 4"></div>
      <div class="gallery-item tall"><img src="../assets/images/lotefam_brillo3.jpg" alt="Imagen 5"></div>
      <div class="gallery-item"><img src="../assets/images/panteon_brillo1.jpg" alt="Imagen 6"></div>
      <div class="gallery-item big"><img src="../assets/images/panteon4.jpg" alt="Imagen 7"></div>
      <div class="gallery-item"><img src="../assets/images/PHOTO-2022-11-03-15-53-17.jpg" alt="Imagen 8"></div>
      <div class="gallery-item big"><img src="../assets/images/DSC_4073.jpg" alt="Imagen 9"></div>
      <div class="gallery-item"><img src="../assets/images/DSC_4174.JPG" alt="Imagen 10"></div>
      <div class="gallery-item tall"><img src="../assets/images/DSC_4423.jpg" alt="Imagen 11"></div>
      <div class="gallery-item"><img src="../assets/images/DSC_4415.JPG" alt="Imagen 12"></div>
      <div class="gallery-item tall"><img src="../assets/images/verjaperim_brillo2.jpg" alt="Imagen 13"></div>
      <div class="gallery-item"><img src="../assets/images/DSC_1676.jpg" alt="Imagen 14"></div>
      <div class="gallery-item big"><img src="../assets/images/DSC_1613.jpg" alt="Imagen 15"></div>
      <div class="gallery-item"><img src="../assets/images/DSC_0629.jpg" alt="Imagen 16"></div>
    </div>
  </section>

  <!-- Lightbox (Galería expandida) -->
  <div id="lightbox" style="display:none; position:fixed; top:0; left:0; width:100%; height:100%; background: rgba(0,0,0,0.9); align-items: center; justify-content: center; z-index: 9999;">
    <span id="closeBtn" style="position:absolute; top:20px; right:30px; font-size:40px; color:white; cursor:pointer;">&times;</span>
    <img id="lightboxImg" src="" style="max-width:90%; max-height:80%; object-fit:contain; border-radius:10px;"/>
    <div id="prevBtn" style="position:absolute; top:50%; left:20px; transform:translateY(-50%); font-size:50px; color:white; cursor:pointer;">&#10094;</div>
    <div id="nextBtn" style="position:absolute; top:50%; right:20px; transform:translateY(-50%); font-size:50px; color:white; cursor:pointer;">&#10095;</div>
  </div>

  <!-- Footer -->
  <?php include(__DIR__ . '/piepagina2.html'); ?>

  <!-- JS para menú responsive -->
  <script>
    document.getElementById('menu-button')?.addEventListener('click', function () {
      document.getElementById('mobile-menu')?.classList.toggle('hidden');
    });

    document.getElementById('mobile-nosotros')?.addEventListener('click', function () {
      document.getElementById('mobile-nosotros-menu')?.classList.toggle('hidden');
    });

    document.getElementById('mobile-servicios')?.addEventListener('click', function () {
      document.getElementById('mobile-servicios-menu')?.classList.toggle('hidden');
    });
  </script>

  <!-- Lightbox JavaScript -->
  <script>
    document.addEventListener('DOMContentLoaded', function () {
      const images = document.querySelectorAll('.gallery-item img');
      const lightbox = document.getElementById('lightbox');
      const lightboxImg = document.getElementById('lightboxImg');
      const closeBtn = document.getElementById('closeBtn');
      const prevBtn = document.getElementById('prevBtn');
      const nextBtn = document.getElementById('nextBtn');

      let currentIndex = 0;

      images.forEach((img, index) => {
        img.addEventListener('click', () => {
          currentIndex = index;
          openLightbox();
        });
      });

      function openLightbox() {
        lightboxImg.src = images[currentIndex].src;
        lightbox.style.display = 'flex';
      }

      function closeLightbox() {
        lightbox.style.display = 'none';
      }

      closeBtn.addEventListener('click', closeLightbox);

      nextBtn.addEventListener('click', () => {
        currentIndex = (currentIndex + 1) % images.length;
        openLightbox();
      });

      prevBtn.addEventListener('click', () => {
        currentIndex = (currentIndex - 1 + images.length) % images.length;
        openLightbox();
      });

      lightbox.addEventListener('click', (e) => {
        if (e.target === lightbox) {
          closeLightbox();
        }
      });

      document.addEventListener('keydown', function (e) {
        if (e.key === "Escape") {
          closeLightbox();
        }
      });
    });
  </script>

  <!-- Scroll reveal -->
  <script src="../assets/js/showonscroll.js"></script>

</body>
</html>
