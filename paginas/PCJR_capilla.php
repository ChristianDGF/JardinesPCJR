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
  <style>
        .plan-img {
  width: 100%;
  aspect-ratio: 1.3 / 1; /* ✅ Hace que la imagen sea cuadrada */
  object-fit: cover;   /* ✅ Corta la imagen para llenar el cuadro sin deformarla */
  border-radius: 8px;
  box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
}
      </style>
</head>

<body>

  <?php include(__DIR__ . '\barramenu5.html'); ?>

  <div class="sec1">
      <img class="imgsec1" src="../assets/images/DSC_0636.JPG"/>
         <h1>Planes de capilla</h1>
         </div>
      </div>
      
<div class="sec2">
  <h1>Plan Platinum</h1>
  <div class="plan-container">
    <img src="../assets/images/plat.jpg" class="plan-img">
    <div class="plan-text">
      <p>
        Este plan premium brinda acceso exclusivo a una capilla de lujo, equipada con servicios personalizados y atención prioritaria. Ideal para quienes buscan lo mejor en un entorno sereno y elegante.
      </p>
      <button class="plan-btn">Planes de Capilla</button>
    </div>
  </div>
</div>

<div class="sec2">
  <h1>Plan Zafiro</h1>
  <div class="plan-container">
    <img src="../assets/images/za.jpg" class="plan-img">
    <div class="plan-text">
      <p>
        Una opción que combina confort y distinción, el Plan Zafiro ofrece instalaciones de alta calidad y un servicio excepcional, garantizando una experiencia memorable para sus seres queridos.
      </p>
      
    </div>
  </div>
</div>

<div class="sec2">
  <h1>Plan Rubí</h1>
  <div class="plan-container">
    <img src="../assets/images/ru.png" class="plan-img">
    <div class="plan-text">
      <p>
        Este plan proporciona un equilibrio perfecto entre calidad y accesibilidad. Con servicios completos y un ambiente acogedor, el Plan Rubí es una elección acertada para honrar a quienes han partido.
      </p>
      
    </div>
  </div>
</div>

<div class="sec2">
  <h1>Plan Marfil</h1>
  <div class="plan-container">
    <img src="../assets/images/ma.png" class="plan-img">
    <div class="plan-text">
      <p>
        Diseñado para aquellos que buscan simplicidad y elegancia, el Plan Marfil ofrece un espacio tranquilo y bien cuidado, ideal para recordar a sus seres queridos con dignidad.
      </p>
      
    </div>
  </div>
</div>


<div class="sec2">
  <h1>Plan Ámbar</h1>
  <div class="plan-container">
    <img src="../assets/images/am.jpg" class="plan-img">
    <div class="plan-text">
      <p>
        Este plan es una opción accesible que brinda un servicio respetuoso y adecuado, asegurando que cada familia pueda conmemorar a sus seres queridos en un ambiente apropiado.

      </p>
      
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
