<?php
include(__DIR__ . '\..\..\conexion\conexion.php');
session_start();
date_default_timezone_set('America/Santo_Domingo');
$fechapagoexito = date("d/m/Y H:i:s");
$sql = "INSERT INTO TWebPagoExitoso(contrato,idtrx,fecha,idreg,monto) VALUES('".$_SESSION["varsesscontrato"]."','".$_SESSION ["vartrx"]."','".$fechapagoexito."','".$_SESSION["varcomprobbanco"]."','".$_SESSION["vartotal"]."')";
$result = odbc_exec($conn,$sql);
session_destroy();
include(__DIR__ . '\barramenu6.html');
?>
<html class=" js flexbox canvas rgba hsla multiplebgs backgroundsize borderimage borderradius boxshadow textshadow opacity cssanimations csscolumns cssgradients cssreflections csstransforms csstransforms3d csstransitions fontface generatedcontent" lang="es">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"> 
<meta charset="utf-8">		
<title>Pago realizado</title>
<meta name="description" content="Agradecimiento por realizar pago exitoso de su balance">
<meta name="keywords" content="promoción,descuento,asesoría,oferta,contacto,parque,cementerio,jardines,recuerdo,funeraria,previsión,amparo">
<meta name="author" content="Sistemas PCJR">
<meta name="HandheldFriendly" content="True">
<meta name="MobileOptimized" content="320">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="format-detection" content="telephone=no"> 
<meta name="format-detection" content="address=no">		
<!-- Mobile IE allows us to activate ClearType technology for smoothing fonts for easy reading -->
<meta http-equiv="cleartype" content="on">
<link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
<link rel="stylesheet" href="../../aos/dist/aos.css">
<link rel="stylesheet" href="../../css/estilo4_1_1.css">
</head> 
<body>
<div class="contenedorazul">
<div data-aos="fade-up" data-aos-duration="2000"><h2>¡PAGO REALIZADO EXITOSAMENTE!</h2></div>
<BR>
<div data-aos="fade-in" data-aos-duration="2000"><h2>Se ha enviado un email, con el comprobante de pago, a su dirección de correo electrónico.</h2></div>
</div>
<BR>
<BR>
<div align="center">
	<div data-aos="fade-up" data-aos-duration="2000"><buttontrans2 class="buttontrans2 button2" onclick="location.href='https://www.jardinesrecuerdo.com'">Cerrar</buttontrans></div>
</div>
<BR>
<script src="../../aos/dist/aos.js"></script>
<script>
  AOS.init();
</script>
</body>
</html>
<?php include(__DIR__ . '\..\piepagina3.html');?>
