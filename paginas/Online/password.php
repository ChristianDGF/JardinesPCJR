<?php include(__DIR__ . '\barramenu6.html');?>
<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

if (isset($_POST['respassemail']) ){
	$respassemail = mb_convert_encoding($_POST['respassemail'], "ISO-8859-1", "UTF-8");
	}
	else{
	}

$flag = 0;

if (isset($_POST['restpassword']) && filter_var($respassemail, FILTER_VALIDATE_EMAIL) == false)
{
	echo "<script>alert('Debe introducir correo electrónico registrado en Jardines del Recuerdo');</script>"; 
	echo "<script language=\"JavaScript\" type=\"text/JavaScript\">";   
	echo "</script>"; 
}
else{
	if (isset($_POST['restpassword']) ){
	include(__DIR__ . '\..\..\conexion\conexion.php');
	$sqlpass = "SELECT * FROM TWebUsuarios WHERE Email = '".$respassemail."' AND Activo='1'";
	$resultpass = odbc_exec($conn,$sqlpass);
	$numpass = odbc_num_rows($resultpass);
	if($numpass > 0)
	{		
		$CodigoValidacion = md5( mt_rand(10000,99000) );
		$sqlcodval = "UPDATE TWebUsuarios SET CodigoValidacion='".$CodigoValidacion."' WHERE Email='".$respassemail."' AND Activo='1'";
		$resultcodval = odbc_exec($conn,$sqlcodval);
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
			$mail->addAddress($respassemail);

			// Content
			$mail->isHTML(true);                                  // Set email format to HTML
			$mail->CharSet = 'UTF-8';
			$mail->Subject = 'Restablecer contraseña';
			$mail->Body    = '
			Por favor haga clic sobre el siguiente enlace para restablecer su contraseña:
			<a href="https://www.jardinesrecuerdo.com/paginas/Online/restablecerpassword.php?Email='.$respassemail.'&CodigoValidacion='.$CodigoValidacion.'" target="_blank">Restablecer</a>
			';

			$mail->send();
			echo "<script>alert('Se ha enviado un email, para restablecer su contraseña, a la dirección de correo electrónico indicada.');</script>";
			echo "<script language=\"JavaScript\" type=\"text/JavaScript\">";  
			echo "</script>";
			
	}
	else{
	echo "<script>alert('El correo electrónico introducido es incorrecto o aún no ha sido activado, si ya creo una cuenta con este correo en Jardines del Recuerdo, debe activarla, vaya a su bandeja de entrada y haga clic en el enlace de activación');</script>";
	echo "<script language=\"JavaScript\" type=\"text/JavaScript\">";  
	echo "window.location.href= 'password.php'";
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
<title>Restablecer Contraseña</title>
<meta name="description" content="Si olvido su contraseña, puede restablecerla.">
<meta name="keywords" content="restablecer,recuperar,contraseña,pagar,consultar,saldo,contrato,parque,cementerio,jardines,recuerdo,funeraria,previsión">
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
<div align="center">
<div class="contentflex">
<h2>Restablecer contraseña</h2>
<BR>
<div align="left">
<h7>Introduzca su correo electrónico registrado en Jardines del Recuerdo y le enviaremos un enlace de validación para restablecer su contraseña</h7>
</div>
<BR>
<form action="" method="post" name="respass" id="respass">
<input type="email" id="respassemail" name="respassemail" placeholder="Correo electrónico">
<input type="submit" name="restpassword" id="restpassword" value="Restablecer contraseña">
</form>
<BR>
<BR>
</div>
</div>
</body>
</html>
<?php include(__DIR__ . '\..\piepagina3.html');?>