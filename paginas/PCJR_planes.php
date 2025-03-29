<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/planes.css">
    <title>Planes</title>
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
        <h1>Planes</h1>
    </div>
    </div>
    <div class="sec2">
        <h1>Plan de Prevision Familiar</h1>
        <div class="plan-container">
            <img src="../assets/images/PHOTO-2022-11-03-15-53-17.jpg" class="plan-img">
            <div>
                <p>
                    Anticípate a los momentos difíciles con nuestro Plan de Previsión Familiar, diseñado para brindarte tranquilidad y seguridad. Con facilidades de pago y sin costos iniciales, garantizamos que tus seres queridos estarán protegidos cuando más lo necesiten.
                </p>
                <button class="plan-btn">Más información</button>
            </div>
        </div>
    </div>

    <div class="sec2">
        <h1>Plan de Prevision Familiar 2</h1>
        <div class="plan-container">
            <img src="../assets/images/lotefam_brillo1.jpg" class="plan-img">
            <div>
                <p>
                    Tu tranquilidad y la de tu familia es nuestra prioridad. Con el Plan de Previsión Familiar, puedes asegurar desde ya un espacio en nuestros hermosos jardines y mausoleos sin preocupaciones económicas.
                </p>
                <button class="plan-btn">Más información</button>
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