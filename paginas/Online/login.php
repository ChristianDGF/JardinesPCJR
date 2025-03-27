<?php include(__DIR__ . '\barramenu6.html');?>
<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

if (isset($_POST['crearcuentaemail']) ){
	$crearcuentaemail = mb_convert_encoding($_POST['crearcuentaemail'], "ISO-8859-1", "UTF-8");
	}
	else{
	}
if (isset($_POST['crearcuentanombres']) ){
	$crearcuentanombres = mb_convert_encoding($_POST['crearcuentanombres'], "ISO-8859-1", "UTF-8");
	}
	else{
	}
if (isset($_POST['crearcuentaapellidos']) ){
	$crearcuentaapellidos = mb_convert_encoding($_POST['crearcuentaapellidos'], "ISO-8859-1", "UTF-8");
	}
	else{
	}	
if (isset($_POST['crearcuentapassword']) ){
	$crearcuentapassword = mb_convert_encoding($_POST['crearcuentapassword'], "ISO-8859-1", "UTF-8");
	}
	else{
	}
if (isset($_POST['Telefono']) ){
	$Telefono = mb_convert_encoding($_POST['Telefono'], "ISO-8859-1", "UTF-8");
	$Telefono = preg_replace("/[^0-9]/", '', $Telefono);
	}
	else{
	}
if (isset($_POST['iniciarsesionemail']) ){
	$iniciarsesionemail = mb_convert_encoding($_POST['iniciarsesionemail'], "ISO-8859-1", "UTF-8");
	}
	else{
	}
if (isset($_POST['iniciarsesionpassword']) ){
	$iniciarsesionpassword = mb_convert_encoding($_POST['iniciarsesionpassword'], "ISO-8859-1", "UTF-8");
	}
	else{
	}

$flag = 0;

if ((isset($_POST['crecuenta'])) && (filter_var($crearcuentaemail, FILTER_VALIDATE_EMAIL) == false || is_numeric($Telefono) == false || strlen($Telefono) != 10 || $crearcuentanombres == "" || $crearcuentaapellidos == "" || $crearcuentapassword == "" || strlen($crearcuentapassword) < 8))
{
	echo "<script>alert('Todos los datos son obligatorios y debe colocar un Email y Teléfono válidos');</script>"; 
	echo "<script language=\"JavaScript\" type=\"text/JavaScript\">";   
	echo "</script>"; 
}
else{
	if (isset($_POST['crecuenta']) ){
	include(__DIR__ . '\..\..\conexion\conexion.php');
	$sql0 = "SELECT * FROM TWebUsuarios WHERE Email = '".$crearcuentaemail."'";
	$result0 = odbc_exec($conn,$sql0);
	$num0 = odbc_num_rows($result0);
	if($num0 == "" )
	{		
		$CodigoValidacion = md5( mt_rand(10000,99000) );
		$crearcuentapassword = password_hash($crearcuentapassword,PASSWORD_DEFAULT);
		$sql = "INSERT INTO TWebUsuarios(Email,CodigoValidacion,Nombres,Apellidos,Password,Telefono) VALUES('".$crearcuentaemail."','".$CodigoValidacion."','".$crearcuentanombres."','".$crearcuentaapellidos."','".$crearcuentapassword."','".$Telefono."')";
		$result = odbc_exec($conn,$sql);
		
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';
require 'PHPMailer/Exception.php';

$mail = new PHPMailer(true);

    //Server settings
    $mail->SMTPDebug = 0;                    				    // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.office365.com';                   // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'afiliacion@jardinesrecuerdo.com';     // SMTP username
    $mail->Password   = '';                             // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom('afiliacion@jardinesrecuerdo.com');
	$mail->addAddress($crearcuentaemail);

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Activar cuenta creada';
    $mail->Body    = 'Gracias por crear su cuenta!
	Por favor haga clic sobre el siguiente enlace para activarla:
	<a href="https://www.jardinesrecuerdo.com/paginas/Online/activacion.php?Email='.$crearcuentaemail.'&CodigoValidacion='.$CodigoValidacion.'" target="_blank">Activar</a>
	';

    $mail->send();
	header('Location: https://www.jardinesrecuerdo.com/paginas/Online/cuentacreada.php');
	}
	else{
	echo "<script>alert('Ya existe una cuenta asociada al correo electrónico proporcionado');</script>";
	echo "<script language=\"JavaScript\" type=\"text/JavaScript\">";  
	echo "window.location.href= 'login.php'";
	echo "</script>";
	}	
}
}
if ((isset($_POST['inisesion'])) && (filter_var($iniciarsesionemail, FILTER_VALIDATE_EMAIL) == false || $iniciarsesionpassword == "" || strlen($iniciarsesionpassword) < 8))
{
	echo "<script>alert('Correo electrónico o contraseña inválidos');</script>";
	echo "<script language=\"JavaScript\" type=\"text/JavaScript\">";   
	echo "</script>"; 
}
else
{
	if (isset($_POST['inisesion']))
	{
		include(__DIR__ . '\..\..\conexion\conexion.php');
		$sql0 = "SELECT * FROM TWebUsuarios WHERE Email = '".$iniciarsesionemail."' AND Activo='1'";
		$result0 = odbc_exec($conn,$sql0);
		$num0 = odbc_num_rows($result0);
		if($num0 > 0)
		{
			$fila0 = odbc_fetch_array($result0);
			if (password_verify($iniciarsesionpassword,$fila0["Password"]))
			{
				session_start();
				$_SESSION["varsessemail"] = $iniciarsesionemail;
				echo "<script>window.open('pago.php','_self')</script>";	
			}
			else
			{
				echo "<script>alert('Contraseña inválida');</script>";
				echo "<script language=\"JavaScript\" type=\"text/JavaScript\">";
				echo "</script>";
			}
		}
		else
		{
			echo "<script>alert('Correo electrónico inválido o su cuenta aun no ha sido activada, vaya a su bandeja de entrada del correo electrónico registrado en Jardines del Recuerdo y haga clic en el enlace de activación');</script>";
			echo "<script language=\"JavaScript\" type=\"text/JavaScript\">";
			echo "</script>";
		}	
	}
	else{}
}
?>
<html class=" js flexbox canvas rgba hsla multiplebgs backgroundsize borderimage borderradius boxshadow textshadow opacity cssanimations csscolumns cssgradients cssreflections csstransforms csstransforms3d csstransitions fontface generatedcontent" lang="es">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"> 
<meta charset="utf-8">		
<title>Login</title>
<meta name="description" content="Ingresar a pago en linea">
<meta name="keywords" content="pagar,consultar,saldo,contrato,parque,cementerio,jardines,recuerdo,funeraria,previsión">
<meta name="author" content="Sistemas PCJR">
<meta name="HandheldFriendly" content="True">
<meta name="MobileOptimized" content="320">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="format-detection" content="telephone=no"> 
<meta name="format-detection" content="address=no"> 		
<!-- Mobile IE allows us to activate ClearType technology for smoothing fonts for easy reading -->
<meta http-equiv="cleartype" content="on">
<link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
<link rel="stylesheet" href="../../css/estilo4_login.css">
</head> 
<body>
<BR>
<div class="flex-container">
<div align="center">
<div class="contentflex">
<h1>Iniciar sesión</h1>
<form action="" method="post" name="iniciarsesion" id="iniciarsesion">
<input type="email" id="iniciarsesionemail" name="iniciarsesionemail" placeholder="Correo electrónico">
<BR>
<a href="password.php" style="color:black;">¿Olvido su contraseña?</a>
<input type="password" id="iniciarsesionpassword" name="iniciarsesionpassword" placeholder="Contraseña">
<BR>
<input type="checkbox" onclick="FunShowPassLogin()">Mostrar contraseña
<BR>
<input type="submit" name="inisesion" id="inisesion" value="Iniciar sesión">
</form>
</div>
</div>
<div align="center">
<div class="contentflex">
<h2>¿Aún no tiene una cuenta?</h2>
<form action="" method="post" name="crearcuenta" id="crearcuenta">
<input type="email" id="crearcuentaemail" name="crearcuentaemail" placeholder="Correo electrónico">
<input type="text" id="crearcuentanombres" name="crearcuentanombres" placeholder="Nombres">
<input type="text" id="crearcuentaapellidos" name="crearcuentaapellidos" placeholder="Apellidos">
<input type="password" id="crearcuentapassword" name="crearcuentapassword" placeholder="Contraseña">
<BR>
<label for="crearcuentapassword">Mínimo 8 caracteres</label>
<BR>
<input type="checkbox" onclick="FunShowPass()">Mostrar contraseña
<BR>
<input type="text" id="Telefono" name="Telefono" placeholder="Teléfono  XXX-XXX-XXXX" onKeyPress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;">
<input type="submit" name="crecuenta" id="crecuenta" value="Crear cuenta" style="background-color:#0073E5;">
</form>
<BR>
</div>
</div>
</div>
<script>
function FunShowPass() {
  var x = document.getElementById("crearcuentapassword");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
function FunShowPassLogin() {
  var x = document.getElementById("iniciarsesionpassword");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>
</body>
</html>
<?php include(__DIR__ . '\..\piepagina3.html');?>