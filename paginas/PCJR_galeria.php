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
  <META HTTP-EQUIV="CACHE-CONTROL" CONTENT="NO-CACHE">
</head>
<body>

  <!-- Header/menu -->
  <?php include(__DIR__ . '/barramenu5.html'); ?>

  <!-- Título de sección -->
  <div class="sec1">
    <img class="imgsec1" src="../assets/images/maus_garden1.jpg"/>
    <h1>Galería</h1>
  </div>

  <!-- Galería en formato grid -->
  <section>
  <div class="gallery-grid">
    <div class="gallery-item big"><img src="../assets/images/maus_noche2.jpg" alt=""></div>
    <div class="gallery-item"><img src="../assets/images/DSC_0621.JPG" alt=""></div>

    <div class="gallery-item tall"><img src="../assets/images/panteon_brillo5.jpg" alt=""></div>
    <div class="gallery-item"><img src="../assets/images/DSC_1708.JPG" alt=""></div>
    <div class="gallery-item tall"><img src="../assets/images/lotefam_brillo3.jpg" alt=""></div>

    <div class="gallery-item"><img src="../assets/images/panteon_brillo1.jpg" alt=""></div>
    <div class="gallery-item big"><img src="../assets/images/panteon4.jpg" alt=""></div>
    <div class="gallery-item"><img src="../assets/images/PHOTO-2022-11-03-15-53-17.jpg" alt=""></div>

  </div>
</section>

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

  <!-- Scroll reveal -->
  <script src="../assets/js/showonscroll.js"></script>
</body>
</html>
