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
  <link rel="stylesheet" href="../assets/css/capilla.css"> <!-- Specific styles for this page -->
</head>

<body>

  <?php include(__DIR__ . '\barramenu5.html'); ?>

  <div class="sec1">
    <img class="imgsec1" src="../assets/images/DSC_4010.JPG" />
    <h1>Planes de capilla</h1>
  </div>

  <!-- Card Grid Container -->
  <div class="plans-grid-container">
    <!-- Card 1: Plan Platinum -->
    <div class="plan-card">
      <img src="../assets/images/plat.jpg" class="plan-img" alt="Plan Platinum">
      <div class="plan-card-content">
        <h2>Plan Platinum</h2>
        <p>Este plan premium brinda acceso exclusivo a una capilla de lujo, equipada con servicios personalizados y atención prioritaria. Ideal para quienes buscan lo mejor en un entorno sereno y elegante.</p>
        <div class="plan-card-buttons">
          <a href="https://wa.me/18293451020/?text=Hola%2C%20deseo%20más%20información%20sobre%20sus%20servicios.%20%C2%BFMe%20pueden%20ayudar%3F" target="_blank" class="btn-whatsapp"><i class="fab fa-whatsapp"></i> Comprar por WhatsApp</a>
          <a href="tel:+1-809-555-1234" class="btn-call"><i class="fas fa-phone-alt"></i> Comprar por Llamada</a>
        </div>
      </div>
    </div>

    <!-- Card 2: Plan Zafiro -->
    <div class="plan-card">
      <img src="../assets/images/za.jpg" class="plan-img" alt="Plan Zafiro">
      <div class="plan-card-content">
        <h2>Plan Zafiro</h2>
        <p>Una opción que combina confort y distinción, el Plan Zafiro ofrece instalaciones de alta calidad y un servicio excepcional, garantizando una experiencia memorable para sus seres queridos.</p>
        <div class="plan-card-buttons">
          <a href="https://wa.me/18293451020/?text=Hola%2C%20deseo%20más%20información%20sobre%20sus%20servicios.%20%C2%BFMe%20pueden%20ayudar%3F" target="_blank" class="btn-whatsapp"><i class="fab fa-whatsapp"></i> Comprar por WhatsApp</a>
          <a href="tel:+1-809-555-1234" class="btn-call"><i class="fas fa-phone-alt"></i> Comprar por Llamada</a>
        </div>
      </div>
    </div>

    <!-- Card 3: Plan Rubí -->
    <div class="plan-card">
      <img src="../assets/images/ru.png" class="plan-img" alt="Plan Rubí">
      <div class="plan-card-content">
        <h2>Plan Rubí</h2>
        <p>Este plan proporciona un equilibrio perfecto entre calidad y accesibilidad. Con servicios completos y un ambiente acogedor, el Plan Rubí es una elección acertada para honrar a quienes han partido.</p>
        <div class="plan-card-buttons">
          <a href="https://wa.me/18293451020/?text=Hola%2C%20deseo%20más%20información%20sobre%20sus%20servicios.%20%C2%BFMe%20pueden%20ayudar%3F" target="_blank" class="btn-whatsapp"><i class="fab fa-whatsapp"></i> Comprar por WhatsApp</a>
          <a href="tel:+1-809-555-1234" class="btn-call"><i class="fas fa-phone-alt"></i> Comprar por Llamada</a>
        </div>
      </div>
    </div>

    <!-- Card 4: Plan Marfil -->
    <div class="plan-card">
      <img src="../assets/images/ma.png" class="plan-img" alt="Plan Marfil">
      <div class="plan-card-content">
        <h2>Plan Marfil</h2>
        <p>Diseñado para aquellos que buscan simplicidad y elegancia, el Plan Marfil ofrece un espacio tranquilo y bien cuidado, ideal para recordar a sus seres queridos con dignidad.</p>
        <div class="plan-card-buttons">
          <a href="https://wa.me/18293451020/?text=Hola%2C%20deseo%20más%20información%20sobre%20sus%20servicios.%20%C2%BFMe%20pueden%20ayudar%3F" target="_blank" class="btn-whatsapp"><i class="fab fa-whatsapp"></i> Comprar por WhatsApp</a>
          <a href="tel:+1-809-555-1234" class="btn-call"><i class="fas fa-phone-alt"></i> Comprar por Llamada</a>
        </div>
      </div>
    </div>

    <!-- Card 5: Plan Ámbar -->
    <div class="plan-card">
      <img src="../assets/images/am.jpg" class="plan-img" alt="Plan Ámbar">
      <div class="plan-card-content">
        <h2>Plan Ámbar</h2>
        <p>Este plan es una opción accesible que brinda un servicio respetuoso y adecuado, asegurando que cada familia pueda conmemorar a sus seres queridos en un ambiente apropiado.</p>
        <div class="plan-card-buttons">
          <a href="https://wa.me/18293451020/?text=Hola%2C%20deseo%20más%20información%20sobre%20sus%20servicios.%20%C2%BFMe%20pueden%20ayudar%3F" target="_blank" class="btn-whatsapp"><i class="fab fa-whatsapp"></i> Comprar por WhatsApp</a>
          <a href="tel:+1-809-555-1234" class="btn-call"><i class="fas fa-phone-alt"></i> Comprar por Llamada</a>
        </div>
      </div>
    </div>
  </div> <!-- End Card Grid Container -->

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
