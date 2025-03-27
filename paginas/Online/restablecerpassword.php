<?php include(__DIR__ . '\barramenu6.html');?>
<?php
if (isset($_GET['Email']) ){
	$respassemail = $_GET['Email'];
	}
	else{
	}
if (isset($_GET['CodigoValidacion']) ){
	$CodigoValidacion = $_GET['CodigoValidacion'];
	}
	else{
	}
if (isset($_POST['newpasspassword']) ){
	$newpasspassword = mb_convert_encoding($_POST['newpasspassword'], "ISO-8859-1", "UTF-8");
	}
	else{
	}

if(isset($_POST['newpassword'])){
		if(!empty($newpasspassword) AND strlen($newpasspassword) > 7 AND !empty($respassemail) AND !empty($CodigoValidacion)){
			include(__DIR__ . '\..\..\conexion\conexion.php');
			$newpasspassword = password_hash($newpasspassword,PASSWORD_DEFAULT);
			$sqlNP = "UPDATE TWebUsuarios SET Password='".$newpasspassword."' WHERE Email='".$respassemail."' AND CodigoValidacion='".$CodigoValidacion."' AND Activo='1'";
			$resultNP = odbc_exec($conn,$sqlNP);
			echo "<script>alert('Su contraseña ha sido restablecida, usted puede iniciar sesión con la nueva contraseña');</script>";
			echo "<script language=\"JavaScript\" type=\"text/JavaScript\">";
			echo "window.location.href= 'login.php'";
			echo "</script>";
		}
		else{
			echo "<script>alert('Debe introducir la nueva contraseña con 8 caracteres como mínimo');</script>";
			echo "<script language=\"JavaScript\" type=\"text/JavaScript\">";
			echo "</script>";			
		}
	}
	else{
	}
?>
<html class=" js flexbox canvas rgba hsla multiplebgs backgroundsize borderimage borderradius boxshadow textshadow opacity cssanimations csscolumns cssgradients cssreflections csstransforms csstransforms3d csstransitions fontface generatedcontent" lang="es">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"> 
<meta charset="utf-8">		
<title>Restablecer contraseña</title>
<meta name="description" content="Restablecer contraseña">
<meta name="keywords" content="restablecer,contraseña,pagar,consultar,saldo,contrato,parque,cementerio,jardines,recuerdo,funeraria,previsión">
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
<h7>Introduzca su nueva contraseña</h7>
<BR>
<form action="" method="post" name="newpass" id="newpass">
<input type="password" id="newpasspassword" name="newpasspassword" placeholder="Contraseña nueva">
<BR>
<label for="newpasspassword">Mínimo 8 caracteres</label>
<BR>
<input type="checkbox" onclick="FunShowPass()">Mostrar contraseña nueva
<BR>
<input type="submit" name="newpassword" id="newpassword" value="Restablecer contraseña">
</form>
<BR>
<BR>
</div>
</div>
<script>
function FunShowPass() {
  var x = document.getElementById("newpasspassword");
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