<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Planes</title>

  <!-- Fuentes y Estilos -->
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&family=Playfair+Display:wght@400;700&family=Lato:wght@300;400;700;900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
  <link rel="stylesheet" href="../assets/css/planes.css">
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>

  <?php include(__DIR__ . '\barramenu5.html'); ?>

  <div class="sec1">
    <img class="imgsec1" src="../assets/images/DSC_0636.JPG" alt="Planes header" />
    <h1>Planes</h1>
  </div>

  <div class="sec2">
    <h1>Plan de Previsión Familiar</h1>
    <div class="plan-container">
      <img src="../assets/images/PHOTO-2022-11-03-15-53-17.jpg" class="plan-img" alt="Plan 1">
      <div class="plan-text">
        <p>
          Anticípate a los momentos difíciles con nuestro Plan de Previsión Familiar, diseñado para brindarte tranquilidad y seguridad. Con facilidades de pago y sin costos iniciales, garantizamos que tus seres queridos estarán protegidos cuando más lo necesiten.
        </p>
        <button class="plan-btn">Más información</button>
      </div>
    </div>
  </div>

  <div class="sec2">
    <h1>Plan de Previsión Familiar 2</h1>
    <div class="plan-container reverse">
      <img src="../assets/images/lotefam_brillo1.jpg" class="plan-img" alt="Plan 2">
      <div class="plan-text">
        <p>
          Tu tranquilidad y la de tu familia es nuestra prioridad. Con el Plan de Previsión Familiar, puedes asegurar desde ya un espacio en nuestros hermosos jardines y mausoleos sin preocupaciones económicas.
        </p>
        <button class="plan-btn">Más información</button>
      </div>
    </div>
  </div>

  <?php include(__DIR__ . '\piepagina2.html'); ?>

  <script>
    document.getElementById('menu-button')?.addEventListener('click', () => {
      document.getElementById('mobile-menu')?.classList.toggle('hidden');
    });

    document.getElementById('mobile-nosotros')?.addEventListener('click', () => {
      document.getElementById('mobile-nosotros-menu')?.classList.toggle('hidden');
    });

    document.getElementById('mobile-servicios')?.addEventListener('click', () => {
      document.getElementById('mobile-servicios-menu')?.classList.toggle('hidden');
    });
  </script>
  <script src="../assets/js/showonscroll.js"></script>
</body>

</html>
