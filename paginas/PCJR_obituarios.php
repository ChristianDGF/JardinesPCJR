<?php
include(__DIR__ . '\conexion\conexion.php');
$d = strtotime("-1 Months");
$fecha = date("Y-m-d", $d);
$sql = "select * from VServiciosdia where fecha >= '2019-04-30 11:00:00.000'";
$resultado = odbc_exec($conn, $sql);
$totalregistros = odbc_num_rows($resultado);
$row = odbc_fetch_array($resultado);
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <script>
        (function(w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start': new Date().getTime(),
                event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s),
                dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src =
                'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-WV5K5NB');
    </script>

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-130811039-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-130811039-1');
        gtag('config', 'AW-777997332');
    </script>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/obituarios.css">
    <title>Obituarios</title>
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
        <h1>Obituarios</h1>
    </div>
    </div>

    <div class="containa">
        <?php
        if ($totalregistros > 0) {
        ?>
            <?php
            do {
            ?>
                <div class="text-area">
                    <h2><?php echo utf8_encode(ucwords(strtolower($row["NombresApellidos"]))); ?></h2>
                    <span><img src="../assets/images/calendar.png"><b>Fecha:</b><?php $hora = date_format(new DateTime($row["Fecha"]), "d/m/Y h:i a");
                                                                                echo $hora; ?></span>
                    <hr>
                    <span><img src="../assets/images/location (1).png"><b>Ubicación:</b><?php if (utf8_encode($row["Funeraria"]) <> "Cremación") { ?>Jardin <?php echo utf8_encode($row["Jardin"]); ?> Lote <?php echo utf8_encode($row["Lote"]); ?> Parcela <?php echo utf8_encode($row["Parcela"]);
                                                                                                                                                                                                                                                            } ?></span>
                    <hr>
                    <span><b>Servicio de inhumación</b><?php echo utf8_encode($row["Funeraria"]); ?></span>
                    <hr>
                </div>
            <?php
            } while ($row = odbc_fetch_array($resultado)); ?>
        <?php
        } else {
            echo "<span class='Estilo12'>No existen Obituarios para el día de hoy...</span>";
        }
        ?>

    </div>

    <?php include(__DIR__ . '\piepagina2.html'); ?>

    <script>
        document.getElementById('menu-button').addEventListener('click', function() {
            var menu = document.getElementById('mobile-menu');
            if (menu.classList.contains('hidden')) {
                menu.classList.remove('hidden');
            } else {
                menu.classList.add('hidden');
            }
        });
    </script>
</body>

</html>