<?php include(__DIR__ . '\barramenu6.html');?>
<?php 
$cedula   = $_POST['cedula'];
$contrato = $_POST['contrato'];
$tipo     = $_POST['tipo'];

if ($tipo == 1){ 
	$action = "saldopdf.php";
	$nombre = "Estado de Cuenta";} 
else { 
	$action = "mvtocuota.php";
	$nombre = "Movimiento de Cuotas";}
?>
<html class=" js flexbox canvas rgba hsla multiplebgs backgroundsize borderimage borderradius boxshadow textshadow opacity cssanimations csscolumns cssgradients cssreflections csstransforms csstransforms3d csstransitions fontface generatedcontent" lang="es">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"> 
		<meta charset="utf-8">
		<title>Descargar</title>
		<meta name="keywords" content="parque, cementerio, jardines, recuerdo, funeraria, previsión">
		<meta name="description" content="Un cementerio, como ningún otro. Sea previsivo, garantice la tranquilidad presente y futura de su familia y deje un legado digno.">	
		<meta name="author" content="Sistemas PCJR">
		<meta name="HandheldFriendly" content="True">
	  	<meta name="MobileOptimized" content="320">
	  	<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta content="True" name="HandheldFriendly">
	
	    <meta name="format-detection" content="telephone=no"> 
	    <meta name="format-detection" content="address=no">  
		
		<!-- Mobile IE allows us to activate ClearType technology for smoothing fonts for easy reading -->
		<meta http-equiv="cleartype" content="on">       
<link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
<link rel="stylesheet" href="../../css/estilo4.css">
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-130811039-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-130811039-1');
</script>
</head> 
	<body class="body 	  "> 
			<div style="margin:5px">
			<h1 align="center"><?php echo $nombre; ?></h1>
			</div>
			<p align="center">Se descargar&aacute; en formato PDF. Necesita tener instalado Adobe Reader</p>
			<div align="center"></div>
            <form id="saldo" name="saldo" method="post" action='<?php echo $action ?>' target="_blank">
				<input name="contrato" type="hidden" value='<?php echo $contrato; ?>' >
				<input name="cedula" type="hidden" value='<?php echo $cedula ?>' >
				<p align="center"><input id="submit" type="image" src="../../images/descargar.jpg" value="Descargar"></p>
            </form>
			<p>&nbsp;</p>
			<p>&nbsp;</p>
		<div align="center">
		<buttontrans class="buttontrans button1" onclick="location.href='https://api.whatsapp.com/send?phone=18293451020&text=Contactar.'">Contactenos</buttontrans>
		</div>
			
		<BR>
		<BR>
</body>
</html>
<?php include(__DIR__ . '\..\piepagina3.html');?>