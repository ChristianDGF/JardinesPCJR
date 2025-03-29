<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PCJR - EMPLEOS</title>
    <!-- Vinculación con Archivo CSS -->
    <link rel="stylesheet" href="../assets/css/empleos.css">
    <script src="https://cdn.jsdelivr.net/npm/locomotive-scroll@4.0.6/dist/locomotive-scroll.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&amp;display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <META HTTP-EQUIV="CACHE-CONTROL" CONTENT="NO-CACHE">
</head>

<body>

    <?php include(__DIR__ . '\barramenu5.html'); ?>

    
    <div class="sec1 hiddenscroll">
        <img class="imgsec1" src="../assets/images/DSC_0636.JPG"/>
           <h1 class="hiddenscroll">Empleos</h1>
           </div>
        </div>

    <div class="content">
        <div class="job hiddenscroll">
            <div class="job-title">Especialista en marketing y ventas</div>
            <div class="job-description">
                Buscamos personas con una perspectiva única y experiencia en marketing y ventas. Buscamos profesionales interesados en mejorar su potencial de ingresos.
            </div>
            <ul class="job-requirements">
                <li>Mayores de 28 años.</li>
                <li>Responsable</li>
                <li>Excelentes referencias</li>
                <li>Ganas de mejorar su calidad de vida.</li>
            </ul>
            <div class="job-contact">
                Si está interesado en presentar su candidatura, envíe su CV al correo
                <a href="mailto:vacantespcjr@gmail.com">vacantespcjr@gmail.com</a>.
            </div>
        </div>
        <hr/>
        <br>
        <br>
        <div class="job hiddenscroll">
            <div class="job-title">Analista en marketing y ventas</div>
            <div class="job-description">
                Buscamos personas con una perspectiva única y experiencia en marketing y ventas. Buscamos profesionales interesados en mejorar su potencial de ingresos.
            </div>
            <ul class="job-requirements">
                <li>Mayores de 28 años.</li>
                <li>Responsable</li>
                <li>Excelentes referencias</li>
                <li>Ganas de mejorar su calidad de vida.</li>
            </ul>
            <div class="job-contact">
                Si está interesado en presentar su candidatura, envíe su CV al correo
                <a href="mailto:vacantespcjr@gmail.com">vacantespcjr@gmail.com</a>.
            </div>
        </div>
    </div>

    <?php include(__DIR__ . '\piepagina2.html'); ?>

    <script>
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