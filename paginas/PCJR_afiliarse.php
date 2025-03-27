<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

if (isset($_POST['Email'])) {
    $Email = mb_convert_encoding($_POST['Email'], "ISO-8859-1", "UTF-8");
} else {
}
if (isset($_POST['Nombre'])) {
    $Nombre = mb_convert_encoding($_POST['Nombre'], "ISO-8859-1", "UTF-8");
} else {
}
if (isset($_POST['Apellido'])) {
    $Apellido = mb_convert_encoding($_POST['Apellido'], "ISO-8859-1", "UTF-8");
} else {
}
if (isset($_POST['TelefonoCelular'])) {
    $TelefonoCelular = mb_convert_encoding($_POST['TelefonoCelular'], "ISO-8859-1", "UTF-8");
    $TelefonoCelular = preg_replace("/[^0-9]/", '', $TelefonoCelular);
} else {
}
$flag = 0;

if ((isset($_POST['mensajeasunto'])) && (filter_var($Email, FILTER_VALIDATE_EMAIL) == false || is_numeric($TelefonoCelular) == false || strlen($TelefonoCelular) != 10 || $Nombre == "" || $Apellido == "")) {
    echo "<script>alert('Todos los datos son obligatorios y debe colocar un Email y Teléfono celular válidos');</script>";
    echo "<script language=\"JavaScript\" type=\"text/JavaScript\">";
    echo "</script>";
} else {
    if (isset($_POST['mensajeasunto'])) {
        include(__DIR__ . '\conexion\conexion.php');
        $sql0 = "SELECT * FROM TWebAfiliacion WHERE Email = '" . $Email . "'";
        $result0 = odbc_exec($conn, $sql0);
        $num0 = odbc_num_rows($result0);
        if ($num0 == "") {
            $sql1 = "SELECT * FROM VAFAfiliacionesNo0Menos90Dias WHERE Celular = '" . $TelefonoCelular . "'";
            $result1 = odbc_exec($conn, $sql1);
            $num1 = odbc_num_rows($result1);
            if ($num1 == "") {
                $Asignado = 'No est&aacute; asignado a un Asesor';
                $Protegido = 0;
            } else {
                $Asignado = 'Est&aacute; asignado a un Asesor';
                $Protegido = 1;
            }



            $sql = "INSERT INTO TWebAfiliacion(Email,Nombre,Apellido,TelefonoCelular,Protegido) VALUES('" . $Email . "','" . $Nombre . "','" . $Apellido . "','" . $TelefonoCelular . "','" . $Protegido . "')";
            $result = odbc_exec($conn, $sql);
            require 'PHPMailer/PHPMailer.php';
            require 'PHPMailer/SMTP.php';
            require 'PHPMailer/Exception.php';

            $mail = new PHPMailer(true);

            //Server settings
            $mail->SMTPDebug = 0;                                        // Enable verbose debug output
            $mail->isSMTP();                                            // Send using SMTP
            $mail->Host       = 'smtp.office365.com';                   // Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
            $mail->Username   = 'afiliacion@jardinesrecuerdo.com';     // SMTP username
            $mail->Password   = '';                             // SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
            $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

            //Recipients
            $mail->setFrom('afiliacion@jardinesrecuerdo.com');
            $mail->addAddress('afiliacion@jardinesrecuerdo.com');
            $mail->addAddress('jim.blan1@gmail.com');
            $mail->addAddress('josesistemas@jardinesrecuerdo.com');

            // Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = 'REGISTRO NUEVO EN PAGINA WEB';
            $mail->Body    = '<b>Nombre y Apellido: </b>' . $Nombre . " " . $Apellido . '<b>, Email: </b>' . $Email . '<b>, Tel&eacute;fono Celular: </b>' . $TelefonoCelular . '<b>, Asignado: </b>' . $Asignado;

            $mail->send();

            header('Location: https://www.jardinesrecuerdo.com/paginas/registroexitoso.php');
        } else {
            echo "<script>alert('Sus datos ya están registrados. Muchas gracias.');</script>";
            echo "<script language=\"JavaScript\" type=\"text/JavaScript\">";
            echo "window.location.href= 'Index.php'";
            echo "</script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PCJR - EMPLEOS</title>
    <!-- Vinculación con Archivo CSS -->
    <link rel="stylesheet" href="../assets/css/afiliarse.css">
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
        <img class="imgsec1" src="../assets/images/DSC_0636.JPG"/>
           <h1>Plan de Afiliación</h1>
           </div>
        </div>
    
    <div class="containera form-container">
        <h1>Afiliarse</h1>
        <form>
            <input name="nombre" placeholder="Nombre" style="width: 80%; background-color: #f5f5f5;" type="text"/>
            <input name="apellido" placeholder="Apellido" style="width: 80%; background-color: #f5f5f5;" type="text"/>
            <input name="correo" placeholder="Correo" style="width: 80%; background-color: #f5f5f5;" type="email"/>
            <input name="télefono" placeholder="télefono" style="width: 80%; background-color: #f5f5f5;" type="number"/>
                
            </select>
            <button type="submit" style="margin-top: 20px;">Enviar solicitud</button>
        </form>
    </div>
    <div class="containera benefits-container">
        <h2>Beneficios de ser Afiliado</h2>
        <div class="benefits-content">
            <img alt="Personas mayores usando una tablet" height="250" src="../assets/images/busi.webp" width="250"/>
            <ol class="olafil">
                <li>Descuentos especiales de hasta del 30%</li>
                <li>Planes flexibles sin pago inicial</li>
                <li>Plazos personalizados, respetando su ritmo y necesidades</li>
                <li>Sin intereses adicionales, transparencia y cuidado en cada detalle</li>
            </ol>
        </div>
    </div>
    <div class="containera testimonials-container">
        <h2>Opiniones de nuestros Afiliados</h2>
        <div class="testimonial">
            <iframe src="https://www.youtube.com/embed/YICvTJUI0es" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            
            <p>Deyanira Romero</p>
        </div>
        <div class="testimonial">
            <iframe src="https://www.youtube.com/embed/LbqAlF-PAEw" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            <p>José Luis Fernández</p>
        </div>
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