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
      <img class="imgsec1" src="../assets/images/lotefam_brillo4.jpg"/>
         <h1>Productos</h1>
         </div>
      </div>
      
<div class="sec2">
  <h1>Modernas Capillas</h1>
  <div class="plan-container">
    <img src="../assets/images/PHOTO-2022-11-03-15-53-17.jpg" class="plan-img">
    <div class="plan-text">
      <p>
        La Capilla es un espacio sagrado y elegante, destinado a rendir homenaje a la vida y a proporcionar consuelo a las familias en momentos de despedida. Con un diseño moderno y acogedor, la capilla está equipada con todas las comodidades necesarias para ofrecer un ambiente de respeto y solemnidad. Sus grandes ventanales permiten la entrada de luz natural, creando una atmósfera de paz que invita a la meditación y al recuerdo. Aquí, las familias pueden reunirse para celebrar la vida de sus seres queridos en un entorno que refleja amor y dignidad.
      </p>
      <a href="../pages/capilla.html">
      <button  class="plan-btn">Planes de Capilla</button></a>
    </div>
  </div>
</div>

<div class="sec2">
  <h1>Hermosos Jardines Familiares</h1>
  <div class="plan-container">
    <img src="../assets/images/lotefam_brillo4.jpg" class="plan-img">
    <div class="plan-text">
      <p>
        Descubre la tranquilidad y la intimidad que ofrecen nuestros Jardines Familiares, donde cada lote nicho de 2 puestos está diseñado para honrar la memoria de sus seres queridos en un entorno sereno y natural. Rodeados de vegetación exuberante y coloridas flores, estos espacios permiten que las familias se reúnan para recordar y celebrar la vida en un ambiente de paz.
      </p>
      
    </div>
  </div>
</div>

<div class="sec2">
  <h1>Nuevos Osarios</h1>
  <div class="plan-container">
    <img src="../assets/images/lotefam_brillo1.jpg" class="plan-img">
    <div class="plan-text">
      <p>
        Nuestros osarios son una opción digna y elegante para traslados y el descanso eterno del ser querido. Diseñados con un estilo contemporáneo la belleza del mármol y los detalles arquitectónicos crean un ambiente que invita a la contemplación, permitiendo que las familias honren a sus seres queridos en un lugar de paz y serenidad, donde sus memorias pueden perdurar para siempre.

      </p>
      
    </div>
  </div>
</div>

<div class="sec2">
  <h1>Panteones Familiares</h1>
  <div class="plan-container">
    <img src="../assets/images/panteon4.jpg" class="plan-img">
    <div class="plan-text">
      <p>
        Nuestros Panteones Familiares son la opción perfecta para aquellos que desean mantener la unidad familiar incluso en el descanso eterno. Con espacios amplios y jardines privados, estos panteones ofrecen un ambiente exclusivo y acogedor para recordar y honrar a los seres queridos. Cada panteón está diseñado para ser un refugio de paz, donde las familias pueden compartir momentos de reflexión y cariño en un entorno que celebra la vida y la memoria de quienes han partido.


      </p>
      
    </div>
  </div>
</div>


<div class="sec2">
  <h1>Majestuosos Mausoleos</h1>
  <div class="plan-container">
    <img src="../assets/images/Maus_ident1.jpg" class="plan-img">
    <div class="plan-text">
      <p>
        Los Mausoleos son la expresión máxima de elegancia y privacidad, pensados para aquellos que buscan un refugio exclusivo para sus seres queridos. Con un diseño único, moderno y minimalista, estos espacios ofrecen un ambiente sereno, rodeado de naturaleza y tranquilidad. Cada mausoleo destaca por sus acabados de lujo y la atención al detalle, creando un lugar donde las familias pueden reunirse en un entorno íntimo y digno, asegurando que el legado de sus seres queridos permanezca intacto.


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
