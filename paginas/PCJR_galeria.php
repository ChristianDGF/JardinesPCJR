<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PCJR - EMPLEOS</title>
    <!-- Vinculación con Archivo CSS -->
    <link rel="stylesheet" href="../assets/css/galeria.css">
    <script src="https://cdn.jsdelivr.net/npm/locomotive-scroll@4.0.6/dist/locomotive-scroll.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&amp;display=swap" rel="stylesheet"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <META HTTP-EQUIV="CACHE-CONTROL" CONTENT="NO-CACHE">
</head>
<body>
    <section>
      
    <?php include(__DIR__ . '\barramenu5.html'); ?>
    
    <div class="sec1">
        <img class="imgsec1" src="../assets/images/maus_garden1.jpg"/>
           <h1>Galeria</h1>
           </div>
        </div>
    </section>
    <section>
        <div class="external">
            <div class="horizontal-scroll-wrapper">
              <div class="img-wrapper slower">

                <a>
                    <img src="../assets/images/maus_noche2.jpg" alt="">
                </a>
              </div>
          
              <div class="img-wrapper faster">
                <a>
                  <img src="../assets/images/DSC_0621.JPG" alt="">
                </a>
              </div>
          
              <div class="img-wrapper slower vertical">
                <a>
                  <img src="../assets/images/DJI_0291.JPG" alt="">
                </a>
              </div>
          
              <div class="img-wrapper slower slower-down">
                <a>
                  <img src="../assets/images/panteon_brillo5.jpg" alt="">
                </a>
              </div>
          
              <div class="img-wrapper">
                <a>
                  <img src="../assets/images/DSC_1708.JPG" alt="">
                </a>
              </div>
          
              <div class="img-wrapper slower">
                <a>
                  <img src="../assets/images/lotefam_brillo3.jpg" alt="">
                </a>
              </div>
          
              <div class="img-wrapper faster1">
                <a>
                  <img src="../assets/images/DSC_4401.JPG" alt="">
                </a>
              </div>
              
              <div class="img-wrapper slower slower2">
                <a>
                  <img src="../assets/images/panteon_brillo1.jpg" alt="">
                </a>
              </div>
              
              <div class="img-wrapper">
                <a>
                  <img src="../assets/images/panteon4.jpg" alt="">
                </a>
              </div>
              
              <div class="img-wrapper slower">
                <a>
                  <img src="../assets/images/PHOTO-2022-11-03-15-53-17.jpg" alt="">
                </a>
              </div>
              
              <div class="img-wrapper slower last">
                <a>
                  <img src="../assets/images/panteonessm1.jpg" alt="">
                </a>
              </div>
            </div>
            
            
          </div>
        </section>
          
    <section>

    <?php include(__DIR__ . '\piepagina2.html'); ?>


      
</section>
<script>
      // Toggle principal del menú móvil
  document.getElementById('menu-button').addEventListener('click', function() {
    document.getElementById('mobile-menu').classList.toggle('hidden');
  });
  
  // Toggle del submenú "Nosotros" en mobile
  document.getElementById('mobile-nosotros').addEventListener('click', function() {
    document.getElementById('mobile-nosotros-menu').classList.toggle('hidden');
  });
  
  // Toggle del submenú "Servicios" en mobile
  document.getElementById('mobile-servicios').addEventListener('click', function() {
    document.getElementById('mobile-servicios-menu').classList.toggle('hidden');
  });
 </script>
 <script src="../assets/js/showonscroll.js"></script>
</body>
</html>