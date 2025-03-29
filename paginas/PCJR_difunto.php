<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buscar Difunto</title>
    <link rel="stylesheet" href="../assets/css/buscardif.css">
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
        <h1>Buscar Difunto</h1>
    </div>

    <div class="containa">

        <form action="PCJR_resultado.php" method="post">
            <div class="search-bar">
                <i class="fa fa-search"></i>
                <input id="search" type="text" min="1" name="search" placeholder="Digite el nombre de quien desea buscar">
                <button class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700 ml-2">Buscar</button>
            </div>
        </form>

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