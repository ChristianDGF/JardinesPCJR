<?php include(__DIR__ . '\barramenu5.html');?>
<?php
   include(__DIR__ . '\conexion\conexion.php');
   $d=strtotime("-1 Months");	
   $fecha = date("d/m/Y",$d);
   $sql="select * from VServiciosdia where fecha >= '". $fecha. "'" ;
   $resultado = odbc_exec($conn,$sql);
   $totalregistros = odbc_num_rows($resultado);
   $row = odbc_fetch_array($resultado);
?>
<html class=" js flexbox canvas rgba hsla multiplebgs backgroundsize borderimage borderradius boxshadow textshadow opacity cssanimations csscolumns cssgradients cssreflections csstransforms csstransforms3d csstransitions fontface generatedcontent" lang="es">
<head>
<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-WV5K5NB');</script>
<!-- End Google Tag Manager -->
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"> 
<meta charset="utf-8">		
<title>Obituarios</title>
<meta name="description" content="Personas fallecidas recientemente">	
<meta name="keywords" content="obituarios,fallecidos,parque,cementerio,jardines,recuerdo,funeraria,previsión">
<meta name="author" content="Sistemas PCJR">
<meta name="HandheldFriendly" content="True">
<meta name="MobileOptimized" content="320">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="format-detection" content="telephone=no"> 
<meta name="format-detection" content="address=no"> 		
<!-- Mobile IE allows us to activate ClearType technology for smoothing fonts for easy reading -->
<meta http-equiv="cleartype" content="on">
<link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
<link rel="stylesheet" href="../css/estilo4_1.css">
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-130811039-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-130811039-1');
  gtag('config', 'AW-777997332');
</script>
</head> 
<body>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-WV5K5NB"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
<div class="containerjec_1">
<picture>
<source media="(max-width: 767px)" srcset="../images/Obituarios_Mo.jpg">
<img src="../images/Obituarios.jpg" alt="Obituarios">
</picture>
<div class="centeredjec_3">Obituarios</div>
<img class="sticky" src="../images/whatsapp_chat.png" alt="Whatsapp Chat" onclick="location.href='https://api.whatsapp.com/send?phone=18294210760&text=Quiero%20ser%20previsivo.'">
</div>
	<BR>
	<BR>
	<BR>
	<div class="componentcontent">
	<h2 align="center">En Jardines del Recuerdo expresamos nuestras más profundas condolencias por el fallecimiento de:</h2>
	</div>
	<BR>
	<BR>
	<BR>
	<table width='100%' height="117" cellpadding='0' cellspacing='0' border='1' align="center">
		<?php 
		    if ($totalregistros > 0){
		?>
			<?php 
				do{
			?>  
		        <tr>
                <td width="68%" height="46" align='center' valign="middle" class='side-small'>
				<p> <strong>Difunto:</strong> <?php echo utf8_encode(ucwords(strtolower($row["NombresApellidos"])));?></p>
				<p> <?php if (utf8_encode($row["Funeraria"]) <> "Cremación") { ?>
				Jardin <?php echo utf8_encode($row["Jardin"]);?> Lote <?php echo utf8_encode($row["Lote"]);?> Parcela <?php echo utf8_encode($row["Parcela"]);}?></p>
				<p><strong>Servicio de inhumación</strong> <?php echo utf8_encode($row["Funeraria"]);?></p>
				<p><strong>Fecha:</strong> <?php $hora= date_format(new DateTime($row["Fecha"]),"d/m/Y h:i a"); echo $hora;?></p>
				</td>
				</tr>
		        <tr>
		        <td align='left' valign="middle" class='side-small'>&nbsp;</td>
		        </tr>							   
				<?php 
				}while($row = odbc_fetch_array($resultado));?>      	
		    <?php 
		    }else{
			     echo"<span class='Estilo12'>No existen Obituarios para el día de hoy...</span>";
		         }
	        ?>                                                
    </table>	
	<BR>
	<BR>
	<BR>
	<div align="center">
		<buttontrans class="buttontrans button1" onclick="location.href='https://api.whatsapp.com/send?phone=18293451020&text=Contactar.'">Contáctenos</buttontrans>
	</div>				   
	<BR>
	<BR>
	<BR>
<script src="//code.tidio.co/ob5hc9bnifowcno0apgutikshdkzxzuq.js" async></script>
</body>
</html>
<?php include(__DIR__ . '\piepagina2.html');?>