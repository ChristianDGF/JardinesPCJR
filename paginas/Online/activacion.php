<?php include(__DIR__ . '\barramenu6.html');?>
<?php
if (isset($_GET['Email']) ){
	$crearcuentaemail = $_GET['Email'];
	}
	else{
	}
if (isset($_GET['CodigoValidacion']) ){
	$CodigoValidacion = $_GET['CodigoValidacion'];
	}
	else{
	}

if(!empty($crearcuentaemail) AND !empty($CodigoValidacion)){
	include(__DIR__ . '\..\..\conexion\conexion.php');
    $sql1 = "SELECT Email, CodigoValidacion, Activo FROM TWebUsuarios WHERE Email='".$crearcuentaemail."' AND CodigoValidacion='".$CodigoValidacion."' AND Activo='0'"; 
    $result1 = odbc_exec($conn,$sql1);
	$num1 = odbc_num_rows($result1);
                 
    if($num1 > 0){
        $sql2 = "UPDATE TWebUsuarios SET Activo='1' WHERE Email='".$crearcuentaemail."' AND CodigoValidacion='".$CodigoValidacion."' AND Activo='0'";
		$result2 = odbc_exec($conn,$sql2);
        echo "<script>alert('Su cuenta ha sido activada, usted ahora puede iniciar sesión');</script>";
		echo "<script language=\"JavaScript\" type=\"text/JavaScript\">";
		echo "window.location.href= 'login.php'";
		echo "</script>";
		
    }else{
        echo "<script>alert('El url es invalido o su cuenta ya ha sido activada');</script>";
		echo "<script language=\"JavaScript\" type=\"text/JavaScript\">";
		echo "window.location.href= 'login.php'";
		echo "</script>";		
    }
                 
}else{
    echo "<script>alert('Intento invalido, por favor usar el enlace que ha sido enviado a su email');</script>";
		echo "<script language=\"JavaScript\" type=\"text/JavaScript\">";
		echo "window.location.href= 'login.php'";
		echo "</script>";	
}

?>
<html class=" js flexbox canvas rgba hsla multiplebgs backgroundsize borderimage borderradius boxshadow textshadow opacity cssanimations csscolumns cssgradients cssreflections csstransforms csstransforms3d csstransitions fontface generatedcontent" lang="es">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"> 
<meta charset="utf-8">		
<title>Activación</title>
<meta name="description" content="Activación de Cuenta">
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
<BR>
</body>
</html>
<?php include(__DIR__ . '\..\piepagina3.html');?>