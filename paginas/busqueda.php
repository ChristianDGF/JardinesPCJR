<?php

   include(__DIR__ . '\conexion\conexion.php');

   $buscar = $_POST['search'];
   $nombre = $_POST['search'];
   $flag = 0;
if ((isset($_POST['search'])) && ($nombre == "")){
	echo "<script>alert('Debe colocar el nombre o apellido del difunto');</script>"; 
	echo "<script language=\"JavaScript\" type=\"text/JavaScript\">";   
	echo "</script>";
}
else{
	$sql = "SELECT * FROM difuntos_web WHERE (Nombre LIKE '%". $nombre . "%') ORDER BY Fec_Def";
	$result = odbc_exec($conn,$sql);
	$num = odbc_num_rows($result);
}
?>

<?php include(__DIR__ . '\barramenu5.html');?>
<html class=" js flexbox canvas rgba hsla multiplebgs backgroundsize borderimage borderradius boxshadow textshadow opacity cssanimations csscolumns cssgradients cssreflections csstransforms csstransforms3d csstransitions fontface generatedcontent" lang="es">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"> 
<meta charset="utf-8">
<title>Resultados de Busqueda</title>
<meta name="description" content="Conozca la ubicación exacta de un difunto">	
<meta name="keywords" content="servicios, buscar, difunto, parque, cementerio, jardines, recuerdo, funeraria, previsión">
<meta name="author" content="Sistemas PCJR">
<meta name="HandheldFriendly" content="True">
<meta name="MobileOptimized" content="320">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="format-detection" content="telephone=no"> 
<meta name="format-detection" content="address=no"> 		
<!-- Mobile IE allows us to activate ClearType technology for smoothing fonts for easy reading -->
<meta http-equiv="cleartype" content="on">
<link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
<link rel="stylesheet" href="../css/estilo4.css">
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-130811039-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-130811039-1');
</script>
</head>
<body> 
<h1 align="center">Resultados de Busqueda</h1>
<BR>
<BR>
			<?php if ($num > 0) { ?>
			<table width="100%" border="1" align="center">
                                                              <tr>
                                                                
                                                                <td><strong>Jardin</strong></td>
                                                                <td><strong>Lote</strong></td>
                                                                <td><strong>Parcela</strong></td>
                                                                <td align="center"><strong>Nombre</strong></td>
                                                                <td><strong>Fec Defuncion</strong></td>
                                                              </tr>
                                                            <?php while($row = odbc_fetch_array($result)){
															  		?>
                                                                  <tr>
                                                                
                                                                <td align="center"><?php echo utf8_encode ($row["jardin"]); ?></td>
                                                                <td align="center"><?php echo $row["Lote"]; ?></td>
                                                                <td align="center"><?php echo $row["Parcela"]; ?></td>
                                                                <td align="center"><?php echo utf8_encode ($row["Nombre"]); ?></td>
                                                                <td align="center"><?php echo date_format(new DateTime($row["fec_def"]),"d-m-Y"); ?></td>
                                                              </tr>
                                                              <?php  } ?>  
                                                            </table>
    <?php }else{ ?>
	   <p align="center">Sin resultados encontrados. Vuelve a intentarlo. Sugerencia: "Elimina segundos nombres o apellidos" </p>
	 <?php } ?>
		<BR>
		<BR>
		<div align="center">
		<buttontrans class="buttontrans button1" onclick="location.href='https://api.whatsapp.com/send?phone=18293451020&text=Contactar.'">Contactenos</buttontrans>
		</div>
	 <BR>
	 <BR>
</body>
</html>
<?php include(__DIR__ . '\piepagina2.html');?>