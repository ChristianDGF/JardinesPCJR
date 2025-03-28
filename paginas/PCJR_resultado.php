<?php

include(__DIR__ . '\conexion\conexion.php');

$buscar = $_POST['search'];
$nombre = $_POST['search'];
$flag = 0;
if ((isset($_POST['search'])) && ($nombre == "")) {
    echo "<script>alert('Debe colocar el nombre o apellido del difunto');</script>";
    echo "<script language=\"JavaScript\" type=\"text/JavaScript\">";
    echo "</script>";
} else {
    $sql = "SELECT * FROM difuntos_web WHERE (Nombre LIKE '%" . $nombre . "%') ORDER BY Fec_Def";
    $result = odbc_exec($conn, $sql);
    $num = odbc_num_rows($result);
}
?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultados de Búsqueda</title>
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
        <h1>Resultados de Búsqueda</h1>
    </div>

    <div class="containa">
        <div style="overflow-x: auto;">
            <table id="dataTable">
                <thead>
                    <tr>
                        <th>Jardin</th>
                        <th>Lote</th>
                        <th>Parcela</th>
                        <th>Nombre</th>
                        <th>Fec Defuncion</th>
                    </tr>
                </thead>
                <tbody>

                    <?php if ($num > 0) { ?>
                        <?php while ($row = odbc_fetch_array($result)) {
                        ?>
                            <tr onclick="showDetails('James Jose de los Santos', '58 años', 'Jardín B, Lote 2, Parcela 222', '14 Febrero 1966', '24 Octubre 2024')">
                                <td><?php echo utf8_encode($row["jardin"]); ?></td>
                                <td align="center"><?php echo $row["Lote"]; ?></td>
                                <td align="center"><?php echo $row["Parcela"]; ?></td>
                                <td align="center"><?php echo utf8_encode($row["Nombre"]); ?></td>
                                <td align="center"><?php echo date_format(new DateTime($row["fec_def"]), "d-m-Y"); ?></td>
                            </tr>
                        <?php  } ?>
                    <?php } else { ?>
                        <script>alert('Sin resultados encontrados. Vuelve a intentarlo. Sugerencia: "Elimina segundos nombres o apellidos"');</script>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <div class="details" id="detailsCard">
            <span class="close-btn" onclick="closeDetails()">&times;</span>
            <h2 id="detailsName"></h2>
            <p><strong>Edad al fallecer:</strong> <span id="detailsAge"></span></p>
            <p><strong>Ubicación:</strong> <span id="detailsLocation"></span></p>
            <p><strong>Fecha Nacimiento:</strong> <span id="detailsBirthDate"></span></p>
            <p><strong>Fecha Fallecimiento:</strong> <span id="detailsDeathDate"></span></p>
            <a href="#" class="btn">Enviar Condolencia</a>
        </div>
    </div>


    <?php include(__DIR__ . '\piepagina2.html'); ?>

    <script>
        function showDetails(name, age, location, birthDate, deathDate) {
            document.getElementById("detailsName").innerText = name;
            document.getElementById("detailsAge").innerText = age;
            document.getElementById("detailsLocation").innerText = location;
            document.getElementById("detailsBirthDate").innerText = birthDate;
            document.getElementById("detailsDeathDate").innerText = deathDate;
            document.getElementById("detailsCard").style.display = "block";
        }

        function closeDetails() {
            document.getElementById("detailsCard").style.display = "none";
        }

        document.getElementById('menu-button').addEventListener('click', function() {
            document.getElementById('mobile-menu').classList.toggle('hidden');
        });

        document.getElementById('mobile-nosotros').addEventListener('click', function() {
            document.getElementById('mobile-nosotros-menu').classList.toggle('hidden');
        });

        document.getElementById('mobile-servicios').addEventListener('click', function() {
            document.getElementById('mobile-servicios-menu').classList.toggle('hidden');
        });
    </script>
</body>

</html>