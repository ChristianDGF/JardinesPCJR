<?php 
session_start();
include(__DIR__ . '\barramenu6.html');?>
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
				echo "<script>window.open('../servicios.php','_self')</script>";	
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


<style>
@import url('https://fonts.googleapis.com/css2?family=Playfair+Display&family=Lato&display=swap');

/* Solo estilos dentro de login-page */
.login-page {
  width: 90%;
  max-width: 520px;
  background: #ffffff;
  border-radius: 10px;
  box-shadow: 0 8px 30px rgba(0,0,0,0.12);
  padding: 40px 30px;
  margin: 50px auto;
  font-family: 'Lato', sans-serif;
  display: flex;
  flex-direction: column;
  align-items: center;
  padding: 60px;
}

/* Estilos responsivos para móviles */
@media (max-width: 768px) {
  .login-page {
    width: 95%;
    padding: 30px 20px;
    margin: 30px auto;
  }
  
  .login-page h1, 
  .login-page h2 {
    font-size: 24px;
    margin-bottom: 20px;
  }
  
  .login-page form input[type="email"],
  .login-page form input[type="password"],
  .login-page form input[type="text"] {
    padding: 12px 8px;
    font-size: 14px;
  }
  
  .login-page form input[type="submit"] {
    padding: 12px;
  }
  
  /* Estilos popup responsivos */
  .info-popup-content {
    width: 90%;
    margin: 15% auto;
    padding: 20px 15px;
    max-height: 90vh;
    overflow-y: auto;
  }
  
  .info-popup-content h3 {
    font-size: 18px;
    margin-bottom: 10px;
  }
  
  .info-popup-content p {
    font-size: 14px;
    margin-bottom: 15px;
  }
  
  .info-popup-button {
    padding: 8px 15px;
    font-size: 14px;
    margin: 5px;
    width: auto;
    display: inline-block;
  }
  
  .info-popup-close {
    top: 8px;
    right: 10px;
    font-size: 12px;
    padding: 4px 8px;
  }
}

/* Cada formulario */
.login-page #loginForm,
.login-page #registerForm {
  width: 100%;
  display: flex;
  flex-direction: column;
  align-items: center;
}

/* Títulos */
.login-page h1, 
.login-page h2 {
  font-family: 'Playfair Display', serif;
  color: #333;
  font-size: 30px;
  margin-bottom: 30px;
  text-align: center;
}

/* El formulario interno */
.login-page form {
  width: 100%;
  display: flex;
  flex-direction: column;
}

/* Inputs */
.login-page form input[type="email"],
.login-page form input[type="password"],
.login-page form input[type="text"] {
  background-color: #fff;
  border: none;
  border-bottom: 1px solid #ccc;
  width: 100%;
  padding: 14px 10px;
  margin-bottom: 20px;
  font-size: 16px;
  transition: border-color 0.3s;
}

/* Hover en inputs */
.login-page form input[type="email"]:hover,
.login-page form input[type="password"]:hover,
.login-page form input[type="text"]:hover {
  border-bottom: 1px solid #43b248;
}

/* Botones submit */
.login-page form input[type="submit"] {
  background-color: #43b248;
  color: white;
  font-weight: bold;
  border: none;
  border-radius: 25px;
  padding: 14px;
  width: 100%;
  margin-top: 10px;
  cursor: pointer;
  transition: background-color 0.3s;
}

.login-page form input[type="submit"]:hover {
  background-color: #36983b;
}

/* Link de olvidó contraseña centrado */
.login-page a {
  font-size: 14px;
  color: #333;
  text-align: center;
  margin: 10px 0;
  display: block;
  text-decoration: none;
}

.login-page a:hover {
  text-decoration: underline;
}

/* Checkbox contenedor */
.login-page .checkbox-container {
  display: flex;
  justify-content: center;
  align-items: center;
  gap: 8px;
  font-size: 14px;
  color: #666;
  margin-bottom: 25px;
}

/* Botón de cambiar entre login y registro como link */
.login-page .switch-button {
  margin-top: 20px;
  background: none;
  border: none;
  color: #43b248;
  font-size: 15px;
  cursor: pointer;
  text-decoration: underline;
  transition: color 0.3s;
}

.login-page .switch-button:hover {
  color: #36983b;
}

/* Labels */
.login-page label {
  font-size: 12px;
  color: #666;
  margin-bottom: 5px;
}

/* Forzar botón crear cuenta */
.login-page #crecuenta {
  background-color: #43b248 !important;
  color: white !important;
  font-weight: bold;
  border-radius: 25px;
  padding: 14px;
  width: 100%;
  margin-top: 10px;
  border: none;
  cursor: pointer;
  transition: background-color 0.3s;
}

.login-page #crecuenta:hover {
  background-color: #36983b !important;
}

.login-page .switch-button {
  margin-top: 20px;
  background: none;
  border: none;
  color: #43b248;
  font-size: 15px;
  cursor: pointer;
  text-decoration: underline;
  transition: color 0.3s;
  text-align: center; /* CENTRAR EL TEXTO */
  display: block;     /* Hacerlo como un bloque para que respete el ancho */
  width: 100%;        /* Ocupar todo el ancho del form */
}

/* Logo Emblema ODS */
.logo-container {
  text-align: center;
  margin-bottom: 20px;
}
.logo-container img.emblema-ods {
  max-width: 100px;
  width: 100%;
  height: auto;
}

/* Estilos para el popup informativo */
.info-popup {
  display: none;
  position: fixed;
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0, 0, 0, 0.6);
  z-index: 1000;
  overflow: auto;
}

.info-popup-content {
  background-color: #fff;
  margin: 10% auto;
  padding: 25px;
  border: 1px solid #43b248;
  border-radius: 10px;
  width: 70%;
  max-width: 550px;
  box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
  position: relative;
  font-family: 'Lato', sans-serif;
  animation: fadeIn 0.4s;
}

@keyframes fadeIn {
  from {opacity: 0; transform: translateY(-20px);}
  to {opacity: 1; transform: translateY(0);}
}

.info-popup-content h3 {
  color: #43b248;
  font-family: 'Playfair Display', serif;
  margin-bottom: 15px;
  font-size: 22px;
  text-align: center;
}

.info-popup-content p {
  margin-bottom: 20px;
  line-height: 1.6;
  color: #333;
  text-align: center;
}

.info-popup-close {
  position: absolute;
  top: 10px;
  right: 15px;
  color: #777;
  font-size: 14px;
  font-weight: bold;
  cursor: pointer;
  transition: color 0.3s;
  padding: 2px 6px;
  border-radius: 3px;
}

.info-popup-close:hover {
  color: #43b248;
  background-color: #f5f5f5;
}

.info-popup-button {
  background-color: #43b248;
  color: white;
  border: none;
  padding: 10px 25px;
  border-radius: 25px;
  font-size: 15px;
  cursor: pointer;
  display: inline-block;
  transition: background-color 0.3s;
}

.info-popup-button:hover {
  background-color: #36983b;
}
</style>



</head> 
<body>
<BR>

<!-- Popup Informativo -->
<div id="info-popup" class="info-popup">
  <div class="info-popup-content">
    <span class="info-popup-close" onclick="closeInfoPopup()">Cerrar</span>
    
    <!-- Ícono de laptop -->
    <div class="flex justify-center mb-3">
      <i class="fas fa-laptop text-3xl text-green-600"></i>
    </div>
    
    <h3>Bienvenido a nuestros servicios en línea</h3>
    <p>Apreciado cliente, para disfrutar de los servicios en línea le invitamos a crear una cuenta registrándose con sus datos personales; si ya está registrado puede ingresar con su correo y contraseña.</p>
    <div style="text-align: center;">
      <button class="info-popup-button" style="margin-right:5px;" onclick="closeInfoPopup()">Entendido</button><button class="info-popup-button" style="margin-left:5px;" onclick="closeInfoPopup(); toggleForms();">Crear cuenta</button>
    </div>
  </div>
</div>

<div class="login-page">
  <div class="logo-container" style="text-align: center; margin-bottom: 20px;"><img src="../../assets/images/Logo.png" alt="Logo de Parque Cementerio Jardines del Recuerdo" class="emblema-ods" style="height: auto; max-height: 80px; width: auto; max-width: 100%; object-fit: contain;" /></div>
    <!-- FORMULARIO DE INICIAR SESIÓN -->
        <div id="loginForm">
          <h1>Iniciar sesión</h1>
          <form action="" method="post" name="iniciarsesion" id="iniciarsesion">
            <input type="email" id="iniciarsesionemail" name="iniciarsesionemail" placeholder="Correo electrónico">
            <br>
            <a href="password.php" style="color:black;">¿Olvidó su contraseña?</a>
            <input type="password" id="iniciarsesionpassword" name="iniciarsesionpassword" placeholder="Contraseña">
			<p>
            <input class="mos" type="checkbox" onclick="FunShowPassLogin()"> Mostrar contraseña</p>
            <br>
            <input type="submit" name="inisesion" id="inisesion" value="Iniciar sesión">
          </form>
          
          <button class="switch-button" onclick="toggleForms()">¿No tienes cuenta? Crear cuenta</button>
        </div>

        <!-- FORMULARIO DE CREAR CUENTA -->
        <div id="registerForm" style="display: none;">
          <h2>Crear cuenta</h2>
          <form action="" method="post" name="crearcuenta" id="crearcuenta">
            <input type="email" id="crearcuentaemail" name="crearcuentaemail" placeholder="Correo electrónico">
            <input type="text" id="crearcuentanombres" name="crearcuentanombres" placeholder="Nombres">
            <input type="text" id="crearcuentaapellidos" name="crearcuentaapellidos" placeholder="Apellidos">
            <input type="password" id="crearcuentapassword" name="crearcuentapassword" placeholder="Contraseña">
            
            <label for="crearcuentapassword">Mínimo 8 caracteres</label>
            <p>
            <input type="checkbox" onclick="FunShowPass()"> Mostrar contraseña</p>
            <br>
            <input type="text" id="Telefono" name="Telefono" placeholder="Teléfono XXX-XXX-XXXX" onkeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;">
            <input type="submit" name="crecuenta" id="crecuenta" value="Crear cuenta">
          </form>
          <br>
          <button class="switch-button" onclick="toggleForms()">¿Ya tienes una cuenta? Iniciar sesión</button>
        </div>

      
   

</div>

<script>
function toggleForms() {
  var loginForm = document.getElementById('loginForm');
  var registerForm = document.getElementById('registerForm');
  
  if (loginForm.style.display === "none") {
    loginForm.style.display = "block";
    registerForm.style.display = "none";
  } else {
    loginForm.style.display = "none";
    registerForm.style.display = "block";
  }
}

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

// Mostrar popup informativo al cargar la página
window.onload = function() {
  document.getElementById('info-popup').style.display = 'block';
  
  // Verificar si la URL contiene #registerForm para mostrar automáticamente el formulario de registro
  if(window.location.hash === '#registerForm') {
    var loginForm = document.getElementById('loginForm');
    var registerForm = document.getElementById('registerForm');
    
    if(loginForm && registerForm) {
      loginForm.style.display = "none";
      registerForm.style.display = "block";
    }
  }
}

// Cerrar popup informativo
function closeInfoPopup() {
  document.getElementById('info-popup').style.display = 'none';
}
</script>



</body>
</html>
<?php include(__DIR__ . '\..\piepagina3.html');?>