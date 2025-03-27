<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

if (isset($_POST['Email']) ){
	$Email = mb_convert_encoding($_POST['Email'], "ISO-8859-1", "UTF-8");
	}
	else{
	}
if (isset($_POST['Nombre']) ){
	$Nombre = mb_convert_encoding($_POST['Nombre'], "ISO-8859-1", "UTF-8");
	}
	else{
	}
if (isset($_POST['Apellido']) ){
	$Apellido = mb_convert_encoding($_POST['Apellido'], "ISO-8859-1", "UTF-8");
	}
	else{
	}	
if (isset($_POST['TelefonoCelular']) ){
	$TelefonoCelular = mb_convert_encoding($_POST['TelefonoCelular'], "ISO-8859-1", "UTF-8");
	$TelefonoCelular = preg_replace("/[^0-9]/", '', $TelefonoCelular);
	}
	else{
	}
$flag = 0;

if ((isset($_POST['mensajeasunto'])) && (filter_var($Email, FILTER_VALIDATE_EMAIL) == false || is_numeric($TelefonoCelular) == false || strlen($TelefonoCelular) != 10 || $Nombre == "" || $Apellido == "")){
	echo "<script>alert('Todos los datos son obligatorios y debe colocar un Email y Teléfono celular válidos');</script>"; 
	echo "<script language=\"JavaScript\" type=\"text/JavaScript\">";   
	echo "</script>";	 
}
else{
	if (isset($_POST['mensajeasunto']) ){
	include(__DIR__ . '\conexion\conexion.php');
	$sql0 = "SELECT * FROM TWebAfiliacion WHERE Email = '".$Email."'";
	$result0 = odbc_exec($conn,$sql0);
	$num0 = odbc_num_rows($result0);
	if($num0 == "" )
	{	
	$sql1 = "SELECT * FROM VAFAfiliacionesNo0Menos90Dias WHERE Celular = '".$TelefonoCelular."'";
	$result1 = odbc_exec($conn,$sql1);				    
	$num1 = odbc_num_rows($result1);
	if($num1 == "" ){
		$Asignado = 'No est&aacute; asignado a un Asesor';
		$Protegido = 0;
	}
	else{
		$Asignado = 'Est&aacute; asignado a un Asesor';
		$Protegido = 1;
	}

	
		
		$sql = "INSERT INTO TWebAfiliacion(Email,Nombre,Apellido,TelefonoCelular,Protegido) VALUES('".$Email."','".$Nombre."','".$Apellido."','".$TelefonoCelular."','".$Protegido."')";
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
	$mail->addAddress('afiliacion@jardinesrecuerdo.com');
	$mail->addAddress('jim.blan1@gmail.com');	
	$mail->addAddress('josesistemas@jardinesrecuerdo.com');

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'REGISTRO NUEVO EN PAGINA WEB';
    $mail->Body    = '<b>Nombre y Apellido: </b>' . $Nombre . " " . $Apellido . '<b>, Email: </b>' . $Email . '<b>, Tel&eacute;fono Celular: </b>' . $TelefonoCelular . '<b>, Asignado: </b>' . $Asignado;

    $mail->send();
		
		header('Location: https://www.jardinesrecuerdo.com/paginas/registroexitoso.php');

	}
	else{
	echo "<script>alert('Sus datos ya están registrados. Muchas gracias.');</script>"; 
	echo "<script language=\"JavaScript\" type=\"text/JavaScript\">";   
	echo "window.location.href= 'Index.php'";
	echo "</script>";
	}	
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
<title>Parque Cementerio Jardines del Recuerdo</title>
<meta name="description" content="Un cementerio, como ningún otro. Sea previsivo, garantice la tranquilidad presente y futura de su familia y deje un legado digno.">
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
<link rel="stylesheet" href="aos/dist/aos.css">
<link rel="stylesheet" href="css/estilo1_2.css">
<link rel="stylesheet" href="css/estilo6.css">
<link rel="stylesheet" href="css/estilo13_9_7_3.css">
<link rel="shortcut icon" type="image/x-icon" href="//www.jardinesrecuerdo.com/favicon.ico">
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
<!--VIEWPORT-->
<div class="contenedorvprincipal contenedorvprincipal--full-height">
<?php include(__DIR__ . '\paginas\barramenu5index.html');?>
<div class = "flex-container_hero">
<div class = "content_hero1">
<div align="center">
<div class="tituloinicial">AFILIESE<BR><span style="color:white;background-color:#106510;padding:5px;">GRATIS</span></div>
  <form action="" method="post" name="Contactenos" id="Contactenos">
	<input type="text" id="Nombre" name="Nombre" placeholder="Nombre">
    <input type="text" id="Apellido" name="Apellido" placeholder="Apellido">
    <input type="text" id="Email" name="Email" placeholder="Email">
	<input type="text" id="TelefonoCelular" name="TelefonoCelular" placeholder="Celular:  XXX-XXX-XXXX" onKeyPress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;">		
	<input type="submit" name="mensajeasunto" id="mensajeasunto" value="Estoy interesado">
  </form>
</div>
</div>
<div class = "content_hero2">
<div align="center">
<picture>
<source media="(max-width: 767px)" srcset="images/Capillas1Index_Mo.jpg">
<img src="images/Capillas1Index.jpg" alt="Funeraria en construcción" onclick="location.href='paginas/ComplejoFunerario.php'" style="cursor:pointer;">
</picture>
</div>
</div>
</div>
<div class = "subtitulo" onclick="location.href='#PayPalMe'"><div class="roundbutton">></div>Pague en línea con PayPal.Me</div>
</div>
<!--END VIEWPORT -->
<img class="sticky" src="images/whatsapp_chat.png" alt="Whatsapp Chat" onclick="location.href='https://api.whatsapp.com/send?phone=18294210760&text=Quiero%20ser%20previsivo.'">



<div class = "divbeneficios">
<div class = "divbeneficiosfont2">
<BR>
<div data-aos="fade-up" data-aos-duration="2000">
Con su afiliación GRATIS recibe las siguientes ventajas y beneficios:<BR><BR>
1. ESTE MES DESCUENTOS HASTA DEL 30%.<BR>
2. PLANES SIN INICIAL.<BR>
3. EL PLAZO QUE REQUIERA.<BR>
4. SIN INTERESES.<BR>
</div>
<BR>
</div>
<div align="center">
<div class="contenedorlogopromo">
<div data-aos="fade-in" data-aos-duration="2000"><img src="images/PromocionSeptiembre2022.png" alt="Logo"></div>
</div>
<BR>
<BR>
</div>
</div>

<div class="contenedorblanco" id="PayPalMe">
<BR>
<div align="center">
<div data-aos="fade-up" data-aos-duration="2000"><h2 style="text-align:center;font-weight:bold;color:#106510;">Pague en línea con PayPal.Me</h2></div>
</div>
<BR>
<div class="componentcontent_61" align="center">
<div data-aos="fade-up" data-aos-duration="2000"><h7>Nuestro nuevo link para recibir pagos en línea. Le ofrecemos la forma más sencilla y practica de hacer sus pagos.</h7></div>
<BR>
<div data-aos="fade-up" data-aos-duration="2000"><h7>Aproveche al máximo las ventajas de su cuenta PayPal.</h7></div>
<BR>
<div data-aos="fade-up" data-aos-duration="2000"><h7>Simplemente de clic en el link, inicie sesión en PayPal y complete el pago.</h7></div>
</div>
<BR>
<div align="center">
<div data-aos="fade-up" data-aos-duration="2000"><buttontrans class="buttontrans button4" onclick="location.href='https://www.paypal.com/paypalme/jardinesdelrecuerdo'">paypal.me/jardinesdelrecuerdo</buttontrans></div>
</div>
<BR>
</div>

<div class="contenedorazul">
<BR>
<div align="center">
<div data-aos="fade-up" data-aos-duration="2000"><h2 style="text-align:center;font-weight:bold;color:#106510;">NOS LLENA DE ORGULLO CONMEMORAR ESTE IMPORTANTE HITO EN LA HISTORIA<BR> DE NUESTRO AMADO Y HERMOSO PARQUE CEMENTERIO JARDINES DEL RECUERDO<BR> EN EL CORAZÓN DE SANTIAGO</h2></div>
</div>
<BR>
<div class="componentcontent_61">
<div data-aos="fade-up" data-aos-duration="2000"><h7>En este 9no aniversario, queremos expresar nuestro más sincero agradecimiento a todas las fuerzas vivas y a la población de Santiago de los Caballeros por su confianza al elegirnos como el destino final de descanso para sus seres queridos. Juntos, hemos construido un espacio de memoria, respeto y amor que nos une como ciudad...</h7></div>
</div>
<BR>
<div align="center">
<div data-aos="fade-up" data-aos-duration="2000"><buttontrans class="buttontrans button1" onclick="location.href='http://blog.jardinesrecuerdo.com/prevision/conmemoracion-9no-aniversario/'">Ver más</buttontrans></div>
</div>
<BR>
<BR>
<div class="componentcontent_61">
<div data-aos="fade-up" data-aos-duration="2000"><h2 style="text-align:left;">Solicite su <span style="font-weight:bold;">invitación especial</span> para visitar el <span style="font-weight:bold;">Parque Cementerio Jardines del Recuerdo</span> y compruebe los beneficios.</h2></div>
</div>
<BR>
<div align="center">
<div data-aos="fade-up" data-aos-duration="2000"><buttontrans class="buttontrans button1" onclick="location.href='https://api.whatsapp.com/send?phone=18293451020&text=Solicitar%20invitación.'">Solicitar invitación</buttontrans></div>
</div>
</div>
<div class="contenedorhero">
<div data-aos="fade-in" data-aos-duration="2000">
<picture>
<source media="(max-width: 767px)" srcset="images/Mausol2_Mo.jpg">
<img src="images/Mausol2.jpg" alt="Majestuoso Mausoleo" style="filter:brightness(70%);">
</picture>
</div>
<div class="contenedorheroh1">Majestuosos Mausoleos</div>
</div>

<div class="divdescripcion1">
<div align="center">
<div class="flex-container_b">
<div class="divdescripcion">
<div data-aos="fade-up" data-aos-duration="2000"><div class="divdescripcionh2">Mausoleos Familiares</div></div>
</div>
<div class="divdescripcion">
<div data-aos="fade-up" data-aos-duration="2000"><div class="divdescripcionh3">Ofrecemos los más sofisticados, elegantes y majestuosos, una exclusividad para familias tradicionales.</div></div>
</div>
</div>
</div>
<BR>
<BR>
<div align="center">
<div data-aos="fade-up" data-aos-duration="2000"><buttontrans class="buttontrans button1" onclick="topFunction()">Estoy interesado</buttontrans></div>
</div>
</div>

<div class="contenedorhero">
<div data-aos="fade-in" data-aos-duration="2000">
<picture>
<source media="(max-width: 767px)" srcset="images/Panteo2_Mo.jpg">
<img src="images/Panteo2.jpg" alt="Elegante Panteón" style="filter:brightness(70%);">
</picture>
</div>
<div class="contenedorheroh1">Elegantes Panteones</div>
</div>
<div class="divdescripcion1">
<div align="center">
<div class="flex-container_b">
<div class="divdescripcion">
<div data-aos="fade-up" data-aos-duration="2000"><div class="divdescripcionh2">Panteones Familiares</div></div>
</div>
<div class="divdescripcion">
<div data-aos="fade-up" data-aos-duration="2000"><div class="divdescripcionh3">Imponentes, con carácter privado al estilo americano.</div></div>
</div>
</div>
</div>
<BR>
<BR>
<div align="center">
<div data-aos="fade-up" data-aos-duration="2000"><buttontrans class="buttontrans button1" onclick="topFunction()">Estoy interesado</buttontrans></div>
</div>
</div>

<div class="contenedorhero">
<div data-aos="fade-in" data-aos-duration="2000">
<picture>
<source media="(max-width: 767px)" srcset="images/JarFam2_Mo.jpg">
<img src="images/JarFam2.jpg" alt="Jardín Familiar" style="filter:brightness(75%);">
</picture>
</div>
<div class="contenedorheroh1">Hermosos Jardines Familiares</div>
</div>
<div class="divdescripcion1">
<div align="center">
<div class="flex-container_b">
<div class="divdescripcion">
<div data-aos="fade-up" data-aos-duration="2000"><div class="divdescripcionh2">Jardines Familiares</div></div>
</div>
<div class="divdescripcion">
<div data-aos="fade-up" data-aos-duration="2000"><div class="divdescripcionh3">Conjunto de lotes anexos, ambientados en la naturaleza y con vista panorámica del parque.</div></div>
</div>
</div>
</div>
<BR>
<BR>
<div align="center">
<div data-aos="fade-up" data-aos-duration="2000"><buttontrans class="buttontrans button1" onclick="topFunction()">Estoy interesado</buttontrans></div>
</div>
</div>
<BR>
<BR>
<BR>
<div class="componentcontent_6">
<div class="flex-container">
<div class="componentcontent_5">
<div data-aos="fade-up" data-aos-duration="2000">
<img src="images/Acuerdo.png" alt="Acuerdo">
<h2 style="color:#106510;text-align:left;">¿Qué ofrecemos?</h2>
<h7>Un parque cementerio distinguido, pero discreto; sobrio, pero notable en los detalles; asequible, pero construido con los más altos estándares. Proporcionamos excelencia al alcance de todos. Tomar la mejor decisión, a tiempo, depende de usted.</h7>
</div>
</div>
<BR>
<BR>
<div class="componentcontent_5">
<div data-aos="fade-up" data-aos-duration="2000">
<img src="images/Tarjetas.png" alt="Tarjetas">
<h2 style="color:#106510;text-align:left;">¿Cuánto cuesta?</h2>
<h7>Contamos con planes adaptados a sus posibilidades, sin intereses, al alcance de cualquier presupuesto. Complete el formulario y nuestro personal se pondrá en contacto con usted.</h7>
</div>
<BR>
<BR>
<div data-aos="fade-up" data-aos-duration="2000"><buttontrans class="buttontrans button1" onclick="topFunction()">Llene el formulario</buttontrans></div>
</div>
</div>
<BR>
<BR>
<div class="flex-container">
<div class="componentcontent_7">
<!--Slide text and button-->
<div class="slideshow-container">  
    <div class="mySlides fade">
		<img src="images/Portal2.jpg" alt="Portal">
    </div>
    <div class="mySlides fade">
		<img src="images/Mausoleo_P.jpg" alt="Mausoleo 1">
    </div>
    <div class="mySlides fade">
		<img src="images/Mausoleo2_P.jpg" alt="Mausoleo 2">
    </div>
    <div class="mySlides fade">
		<img src="images/Mausoleo3_P.jpg" alt="Mausoleo 3">
    </div>
    <div class="mySlides fade">
		<img src="images/Panteon_P.jpg" alt="Panteon">
    </div>
    <div class="mySlides fade">
		<img src="images/JardinFamiliar_P.jpg" alt="Jardin Familiar">
    </div>
  </div>
<div style="text-align:center">
    <span class="dot" onclick="currentSlide(1)"></span>
    <span class="dot" onclick="currentSlide(2)"></span>
    <span class="dot" onclick="currentSlide(3)"></span>
	<span class="dot" onclick="currentSlide(4)"></span>
	<span class="dot" onclick="currentSlide(5)"></span>
	<span class="dot" onclick="currentSlide(6)"></span>
</div>
<script>
var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  if (n > slides.length) {
    slideIndex = 1
  }
  if (n < 1) {
    slideIndex = slides.length
  }
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex - 1].style.display = "block";
  dots[slideIndex - 1].className += " active";
}

setInterval(function() {
  slideIndex++;
  showSlides(slideIndex);
}, 3000);
</script>
<!-- slide text and button-->

</div>
<BR>
<div class="componentcontent_5_1">
<div data-aos="fade-up" data-aos-duration="2000">
<img src="images/Elegir.png" alt="Elegir">
<h2 style="color:#106510;text-align:left;">¿Por qué elegir Jardines del Recuerdo?</h2>
</div>
<BR>
<div data-aos="fade-up" data-aos-duration="2000">
<img src="images/Logo24.png" alt="Logo">
<h7>Es un parque cementerio como ningún otro, gracias a la innovación en su arquitectura e ingeniería avanzada.</h7>
</div>
<BR>
<div data-aos="fade-up" data-aos-duration="2000">
<img src="images/Logo24.png" alt="Logo">
<h7>Recibe atención profesional de alta calidad, con un personal enfocado en proporcionar un servicio con sentido humano.</h7>
</div>
<BR>
<div data-aos="fade-up" data-aos-duration="2000">
<img src="images/Logo24.png" alt="Logo">
<h7>La belleza, tranquilidad, paz y seguridad que proporcionamos invitan y motivan las visitas de familiares y amigos.</h7>
</div>
<BR>
<div data-aos="fade-up" data-aos-duration="2000">
<img src="images/Logo24.png" alt="Logo">
<h7>Ideamos Planes de Previsión Familiar con las máximas facilidades posibles.</h7>
</div>
<BR>
<div data-aos="fade-up" data-aos-duration="2000">
<img src="images/Logo24.png" alt="Logo">
<h7>Obtiene una propiedad con revalorización constante.</h7>
</div>
<BR>
<BR>
<div data-aos="fade-up" data-aos-duration="2000"><buttontrans class="buttontrans button1" onclick="topFunction()">De el primer paso</buttontrans></div>
</div>
</div>
</div>
<script>
function topFunction() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}
</script>
<BR>
<BR>
<BR>
<script src="//code.tidio.co/ob5hc9bnifowcno0apgutikshdkzxzuq.js" async></script>
<script src="aos/dist/aos.js"></script>
<script>
  AOS.init();
</script>
</body>
</html>
<?php include(__DIR__ . '\paginas\piepagina1index.html');?>
