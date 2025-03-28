<?php 
 session_start();
 include(__DIR__ . '\barramenu6.html');

?>

<?php


if (isset($_POST['buscar']) ){
	$buscar    = $_POST['buscar'];
	}
	else{
	}
if (isset($_POST['enviar']) ){
	$enviar    = $_POST['enviar'];
	}
	else{
	}
if (isset($_POST['contrato']) ){
	$contrato  = $_POST['contrato'];
	}
	else{
	}
if (isset($_POST['cedula']) ){
	$cedula    = $_POST['cedula'];
	}
	else{
	}
if (isset($_POST['nombre']) ){
	$nombre    = mb_convert_encoding($_POST['nombre'], "ISO-8859-1", "UTF-8");
	}
	else{
	}
if (isset($_POST['direccion']) ){
	$direccion = mb_convert_encoding($_POST['direccion'], "ISO-8859-1", "UTF-8");
	}
	else{
	}
if (isset($_POST['telefono']) ){
	$telefono  = $_POST['telefono'];
	}
	else{
	}
if (isset($_POST['correo']) ){
	$correo = mb_convert_encoding($_POST['correo'], "ISO-8859-1", "UTF-8");
	}
	else{
	}
$flag = 0;

if (isset($_POST['enviar'])){
   include(__DIR__ . '\..\..\conexion\conexion.php');
   $fecha = date("d-m-Y");
   $sql = "INSERT INTO TWebActDatos (CedulaRif,Nombre,Direccion,Telefono,Fecha,Email) VALUES ('".$cedula."','".$nombre."','".$direccion."','".$telefono."','".$fecha."','".$correo."')";
   $result = odbc_exec($conn,$sql);
   
    echo "<script>alert('Gracias Por Actualizar Sus Datos. Nuestros Ejecutivos Se Comunicaran Con Usted Para Confirmar Estos Cambios');</script>"; 
	echo "<script language=\"JavaScript\" type=\"text/JavaScript\">";   
	echo "</script>";	 
	}

// Modify the search section of your code like this:
	if (isset($_POST['buscar']) && !empty($cedula) && !empty($contrato)) {
		include(__DIR__ . '\..\..\conexion\conexion.php');
		
		// Validate and sanitize inputs
		$cedula = floatval($cedula);  // Convert to float
		$contrato = intval($contrato); // Convert to int
		
		// Use parameterized query to prevent SQL injection
		$sql = "SELECT * FROM PruebaWeb01 WHERE (Cedula = ?) AND (Contrato = ?)";
		$stmt = odbc_prepare($conn, $sql);
		
		if ($stmt && odbc_execute($stmt, array($cedula, $contrato))) {
			$num = odbc_num_rows($stmt);
			
			if($num == 0) {
				echo "<script>alert('Combinacion Cedula/Contrato No Existe. Intente de nuevo');</script>"; 
				echo "<script language=\"JavaScript\" type=\"text/JavaScript\">";
				echo "window.location.href= 'act_datos.php'";  
				echo "</script>";
			} else {
				$sql2 = "SELECT * FROM twebactdatos WHERE (CedulaRif = ?)";
				$stmt2 = odbc_prepare($conn, $sql2);
				
				if ($stmt2 && odbc_execute($stmt2, array($cedula))) {
					$num2 = odbc_num_rows($stmt2);
					
					if($num2 == 1) {    
						echo "<script>alert('Usted Ya Tiene una solicitud de actualizacion pendiente. Nuestros ejecutivos se pondran en contacto con usted para Verificar los cambios');</script>"; 
						echo "<script language=\"JavaScript\" type=\"text/JavaScript\">";
						echo "window.location.href= 'act_datos.php'";  
						echo "</script>";
					} else {
						$flag = 1;
						$row = odbc_fetch_array($stmt);
					}
				}
			}
		} else {
			echo "<script>alert('Error en la consulta. Por favor intente nuevamente.');</script>";
		}
	}
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
<title>Actualizar Datos</title>
<meta name="description" content="Actualice sus datos personales de manera comoda">
<meta name="keywords" content="actualizar, datos, parque, cementerio, jardines, recuerdo, funeraria, previsión">
<meta name="author" content="Sistemas PCJR">
<meta name="HandheldFriendly" content="True">
<meta name="MobileOptimized" content="320">
<meta name="viewport" content="width=device-width, initial-scale=1">
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
  gtag('config', 'AW-777997332');
</script>
</head> 
<body>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-WV5K5NB"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
<?php 
$flag = isset($_SESSION['flag']) ? $_SESSION['flag'] : 0;
$row = isset($_SESSION['row']) ? $_SESSION['row'] : array();
if ($flag == 0){ ?>
<h1 align="center">Actualizar Datos</h1>
<BR>
<p align="center">Si desea actualizar algún dato, tal como el teléfono, dirección o agregar su email, lo puede hacer por esta vía.</p>
<p align="center">Nuestro personal se comunicará con usted a la brevedad posible para confirmar la información proporcionada.</p>
	<table class="art-article" border="0" cellspacing="0" cellpadding="0" style="max-width:671px;margin-left:auto;margin-right:auto;">
	<tbody>
	<tr>
	<td style="border-width: 0px; text-align: center; " rowspan="1">
    <form id="datos" name="datos" method="post" action="">
	<p>
		<input name="cedula" type="text" id="cedula" placeholder="Cédula" />
	</p>
	<p>
		<input name="contrato" type="text" id="contrato" placeholder="Contrato" />
	</p>
    <p>
        <input name="buscar" type="submit" value="Buscar" />
    </p>
    <p>&nbsp;</p>
    </form>
	<?php } ?>
    <?php  if ($flag == 1){
		echo '<p align="center">A continuación modifique los datos correspondientes y presione enviar</p>';
	?>
	<form id="datos" name="datos" method="post" action="">
    <table align="center" border="0" cellpadding="0" bordercolor="#FFFFFF" bgcolor="#FFFFFF">
    <tr bordercolor="#FFFFFF">
    <td width="30%" height="27" bordercolor="#FFFFFF"><div align="right" class="Estilo5"><font size="3">Nombre: </font></div></td>
    <td width="70%" bordercolor="#FFFFFF">
		<div align="left">
		<input name="nombre" type="text" id="nombre" value= "<?php echo utf8_encode(ucwords(strtolower($row["Nombres"].' '.$row["Apellidos"])));?>" size="70"/>
		</div>
	</td>
	</tr>
    <tr bordercolor="#FFFFFF">
	<td width="30%" height="27" bordercolor="#FFFFFF"><div align="right" class="Estilo5"><font size="3">Dirección: </font></div></td>
    <td width="70%" bordercolor="#FFFFFF">
		<div align="left">
        <input name="direccion" type="text" id="direccion" value= "<?php echo utf8_encode(ucwords(strtolower($row["Domicilio"])));?>" size="70"/>
        </div>
	</td>
    </tr>
    <tr bordercolor="#FFFFFF">
    <td width="30%" height="27" bordercolor="#FFFFFF"><div align="right" class="Estilo5"><font size="3">Teléfono: </font></div></td>
    <td width="70%" bordercolor="#FFFFFF">
		<div align="left">
		<?php
			if (($row["TlfHab"] == NULL or $row["TlfHab"] == 0) && ($row["Tlfcelular01"] == NULL or $row["Tlfcelular01"] == 0)){
				$telefono = "Sin Numeros Registrados. Por Favor Registre un Numero";
				}
				else
				{
					if (($row["TlfHab"] != NULL or $row["TlfHab"] != 0) && ($row["Tlfcelular01"] == NULL or $row["Tlfcelular01"] == 0)){
						$telefono = $row["TlfHab"];
						}else
						{
							if (($row["TlfHab"] == NULL or $row["TlfHab"] == 0) && ($row["Tlfcelular01"] != NULL or $row["Tlfcelular01"] != 0)){
								$telefono = $row["Tlfcelular01"]; 
								}else
								{
									if (($row["TlfHab"] != NULL or $row["TlfHab"] != 0) && ($row["Tlfcelular01"] != NULL or $row["Tlfcelular01"] != 0)){
										$telefono = strval($row["TlfHab"]) . " / " . strval($row["Tlfcelular01"]);
									}
								}
						}
				}
		?>
        <input name="telefono" type="text" id="telefono" value= "<?php echo $telefono; ?>" size="70"/>
		</div>
	</td>
	</tr>
	<tr>
	<td width="30%" height="27" bordercolor="#FFFFFF"><div align="right" class="Estilo5"><font size="3">Email: </font></div>
	</td>
    <td width="70%" bordercolor="#FFFFFF">
	<div align="left">
    <input name="correo" type="text" id="correo" value= "<?php echo utf8_encode(ucwords(strtolower($row["email"])));?>" size="70"/>
    </div>
	</td>
    </tr>
	<tr>
    <td bordercolor="#FFFFFF">
	<div>
		<input name="cedula" type="hidden" value="<?php echo $cedula; ?>" />
    </div>
	</td>
	</tr>
	</table>
        <p align="center"><input name="enviar" type="submit" value="Enviar" /></p>
        <p>&nbsp;</p>
     </form>
     <?php } ?>
	</td>
	</tr>
	</tbody>
	</table>	
<script src="//code.tidio.co/ob5hc9bnifowcno0apgutikshdkzxzuq.js" async></script>
</body>
</html>
<?php include(__DIR__ . '\..\piepagina3.html');?>