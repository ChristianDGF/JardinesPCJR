<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PCJR PROJECT | QUIENES SOMOS</title>
    <!-- Vinculación con Archivo CSS -->
    <link rel="stylesheet" href="../assets/css/quienes.css">
    <!-- Vinculación con librexría de JS para el SCROLL -->
    <script src="https://cdn.jsdelivr.net/npm/locomotive-scroll@4.0.6/dist/locomotive-scroll.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&amp;display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <META HTTP-EQUIV="CACHE-CONTROL" CONTENT="NO-CACHE">
</head>

<body>

    <?php include(__DIR__ . '\barramenu5.html'); ?>
    
    <div class="sec1">
        <img class="imgsec1" src="../assets/images/DSC_0636.JPG" />
        <h1>¿Quiénes Somos?</h1>
    </div>
    </div>
    <div class="section">
        <div class="content">
            <img alt="A modern building with green surroundings" src="../assets/images/DSC_0621.JPG" />
            <div class="text">
                <h2 class="green">¿Quiénes Somos?
                </h2>
                <p>
                    Una organización con una experiencia de más de 50 años, en los cuales hemos tenido el privilegio de lograr que más de un millón de familias, en diferentes países, se motivaran a tomar una de las decisiones más importantes, como lo es contar con un Plan de Previsión Familiar, adquiriendo antes, sin angustia ni presión, propiedades indispensables para afrontar dignamente la partida de un ser querido.
                </p>
            </div>
        </div>
    </div>
    <div class="section">
        <div class="content">
            <div class="text">
                <h2>Misión</h2>
                <p>Asesorar y facilitar al máximo que todos los hogares de República Dominicana, SIN EXCEPCIÓN, adquieran el PLAN DE PREVISIÓN FAMILIAR de Jardines del Recuerdo; como solución inteligente y económica para garantizar la tranquilidad presente y futura de la familia cuando fallece un ser querido
                    .</p>
            </div>
            <img alt="A group of happy elderly people smiling together" src="../assets/images/DSC_0606.JPG" />
        </div>
    </div>
    <div class="section">
        <div class="content">
            <img alt="A group of serious looking young professionals" src="../assets/images/DJI_0288.JPG" />
            <div class="text">
                <h2>Visión</h2>
                <p>Construir y manejar instalaciones arquitectónicamente bellas y avanzadas, protegiendo y mejorando el ambiente; prestar servicios exequiales y funerarios, con un personal altamente motivado y enfocado a lograr alta calidad en la atención a las familias con gran sentido de solidaridad y respeto.
                </p>
            </div>
        </div>
    </div>


    <?php include(__DIR__ . '\piepagina2.html'); ?>



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