<?php include(__DIR__ . '\barramenu6.html');?>
<?php
include(__DIR__ . '\..\calendario\calendario.php');
if (isset($_POST['consulta']) ){
	$consulta = $_POST['consulta'];
	}
	else{
	}
if (isset($_POST['cedula']) ){
	$cedula   = $_POST['cedula'];
	}
	else{
	}
if (isset($_POST['contrato']) ){
	$contrato = $_POST['contrato'];
	}
	else{
	}

$flag = 0;

if (isset($_POST['consulta']) && $cedula <> "" && $contrato <> "" ){
    include(__DIR__ . '\..\..\conexion\conexion.php');
	$sql = 	"select * from PruebaWeb01 where ((cedula= ". $cedula .")) and ((contrato= ". $contrato ."))";
  	$result = odbc_exec($conn,$sql);
	$num = odbc_num_rows($result); 

	if($num == "" ){
		echo "<script>alert('Combinacion Cedula Y Contrato No Existe. Intente de nuevo');</script>"; 
		echo "<script language=\"JavaScript\" type=\"text/JavaScript\">";
		echo "window.location.href= 'saldo.php'";  
		echo "</script>";}
	else{
	$flag = 1;
	}}

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
<title>Consultar Balance</title>
<meta name="description" content="Consulte el balance de su cuenta">
<meta name="keywords" content="consultar,balance,saldo,contrato,parque,cementerio,jardines,recuerdo,funeraria,previsión">
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
		<?php	if ($flag == 0){	 ?>
			<h1 align="center">Consultar Balance</h1>
			<BR>
			<p align="center">Puede verificar si sus pagos están al día, emitir estado de cuenta o movimiento de cuotas.</p>
												
										  <table class="art-article" border="0" cellspacing="0" cellpadding="0" style="max-width:671px;margin-left:auto;margin-right:auto;">
													<tbody>
														<tr>
															<td style="border-width: 0px; text-align: center; " rowspan="1">
<form id="saldo" name="saldo" method="post" action="">
<input type="text" name="cedula" id="cedula" placeholder="Cédula" onKeyPress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false; if(event.keyCode == 8 || event.Keycode == 9) event.returnValue = True;"/>
<p><input type="text" name="contrato" id="contrato" placeholder="Contrato" onKeyPress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;"/></p>
<p><input type="submit" name="consulta" id="consulta" value="Consultar Balance" /></p>
<p align="left"></form>
<?php } ?>
<?php  if ($flag == 1){																
	//Borramos Por si Hay restos en la BD del Contrato.
	$sql0 = "DELETE FROM contratoweb WHERE contrato = ".$contrato;
	$resultad0 = odbc_exec($conn,$sql0);
	//Insertamos la informacion que sera procesada por la vista
	$sql = "INSERT INTO contratoweb (contrato) VALUES ( ".$contrato.")";
	$resultado = odbc_exec($conn,$sql);
	//Buscamos la informacion ya procesada por la vista
	$sql3 = "SELECT * FROM VConsultaSaldoWebPago WHERE contrato = ".$contrato;
	$result3 = odbc_exec($conn,$sql3);
	$row = odbc_fetch_array($result3);
	

$cedula = $row["cedula"];
$contrato = $row["contrato"];															
															
															?>

<BR>															
<BR>
<table width="100%" border="0" align="center">
    <tr> 
      <td width="50%" align="right"><font color="#000000" size="3"><font color="#000000">Cédula:</font></font></td>
      <td width="50%"><div align="left"><font color="#000000" size="2"><?php echo trim(trim(strval(($row["cedula"])),0),'.'); ?></font></div>
    </tr>
    <tr> 
      <td><div align="right"><font color="#000000" size="3">Contrato:</font></div></td>
      <td><div align="left"><font color="#000000" size="2"><?php echo $row["contrato"]; ?></font></div></td>
    </tr>
    <tr> 
      <td><div align="right"><font color="#000000" size="3">Nombres y Apellidos:</font></div></td>
      <td><div align="left"><font color="#000000" size="2"><?php echo  utf8_encode(ucwords(strtolower($row["NombreApellido"]))); ?></font></div></td>
    </tr>
    <tr>   
	  <td><div align="right"><font color="#000000" size="3">Dirección:</font></div></td>
      <td><div align="left"><font color="#000000" size="2"><?php echo utf8_encode(ucwords(strtolower($row["Domicilio"]))); ?></font></div></td>
    </tr>
	<tr>
	  <td><div align="right"><font color="#000000" size="3">Teléfono:</font></div></td>
      <td><div align="left"><font color="#000000" size="2"><?php echo $row["TlfHab"]. ", ".$row["Tlfcelular01"]  ?></font></div></td> 
	</tr>
	<tr>
      <td><div align="right"><font color="#000000" size="3">Producto:</font></div></td>
      <td><div align="left"><font color="#000000" size="2"><?php echo $row["CantidadParcela"]."  ".$row["Producto"]; ?></font></div></td>
    </tr>
    <tr> 
      <td><div align="right"><font color="#000000" size="3"><strong>Tasa dólar:</strong></font></div></td>
      <td><div align="left"><font color="#000000" size="2"><strong><?php echo $row["TasaCambio"]; ?></strong></font></div></td>
    </tr>	
</table>

<p>&nbsp;</p>
  <div align="left" class="style12">
    <!--<div align="center">Saldos proyectados a la fecha: <?php echo $fechacierre; ?></div>-->
  </div>
 
<br />
<?php if ($row["Giro"]!=NULL) {
$edocta = $row["Giro"]; ?>
<p align="center"><font color="#000000" size="4"><strong><u>Balance</u></strong></font></p>
  <div align="center">
  
  <br />
    <table width="90%" border="1" align="center" bgcolor="#DAD7D6">
      <tr>
        <td width="6%"><div align="center"><font color="#000000" size="2">Nro.</font></div></td>
        <td width="25%"><div align="center"><font color="#000000" size="2">Descripción</font></div></td>
        <td width="13%"><div align="center"><font color="#000000" size="2">Vencimiento</font></div></td>
        <td width="16%"><div align="center"><font color="#000000" size="2">Monto Cuota</font></div></td>
        <td width="10%"><div align="center"><font color="#000000" size="2">Mora</font></div></td>
        <td width="19%"><div align="center"><font color="#000000" size="2">Gastos Cobranza</font></div></td>
        <td width="10%"><div align="center"><font color="#000000" size="2">ITBIS</font></div></td>
        <td width="9%"><div align="center"><font color="#000000" size="2">Previfacil</font></div></td>
        <td width="10%"><div align="center"><font color="#000000" size="2">Subtotal</font></div></td>
      </tr>
	  
<?php
$tmonto = null;
$tmora = null;
$tgcobranza = null;
$tiva = null;
$tprevitotal = null;
$totalg = null;
$vencidas = null;
$ajuste = null;
$subtotal = null;
$fecha2 = null;
do {
	if($row["PreIva"] == 1){
		$calculo = ($row["CapInt"] + $row["MoraF"] + $row["Previtotal"] +$row["ServCobro"])*0.18;}
	else
	   {$calculo = 0.0;}
$subtotal = $row["CapInt"] + $row["MoraF"] + $row["ServCobro"] + $calculo + $row["Previtotal"]; ?>
      <tr>
		<td width="6%"><div align="center"><?php echo $row["Giro"]; ?></div></td> 
        <td width="25%"><div align="center"><?php echo $row["Descripcion"]; ?></div></td> 
        <td width="13%"><div align="center"><?php echo date_format(new DateTime($row["FechaVenc"]),"d-m-Y"); echo $fecha2; ?></div></td>
        <td width="12%"><div align="center"><?php echo number_format($row["CapInt"],2, ".", ","); ?></div></td>
        <td width="10%"><div align="center"><?php echo number_format($row["MoraF"],2, ".", ","); ?></div></td>
        <td width="13%"><div align="center"><?php echo number_format($row["ServCobro"],2, ".", ","); ?></div></td>
        <td width="10%"><div align="center"><?php echo number_format($calculo,2, ".", ","); ?></div></td>
        <td width="9%"><div align="center"><?php echo number_format($row["Previtotal"],2, ".", ","); ?></div></td>
        <td width="10%"><div align="center"><?php echo number_format($subtotal,2, ".", ","); ?></div></td>
      </tr>
<?php $tmonto     = $tmonto + $row["CapInt"];
$tmora      = $tmora + $row["MoraF"];
$tgcobranza = $tgcobranza + $row["ServCobro"];
$tiva       = $tiva + $calculo;
$tprevitotal= $tprevitotal + $row["Previtotal"];
$totalg     = $totalg + $subtotal;
$vencidas   = $vencidas + 1;
$ajuste     = $row["MontoAjuste"];
$subtotal   = 0	  ;}while($row = odbc_fetch_array($result3));
?>
  <tr>
    <td width="6%"><font color="#000000"><div align="center"></div></font>     </td>
    <td width="20%"><font color="#000000"><div align="center"><strong>SubTotales</strong></div></font>     </td>
	<td width="10%"><font color="#000000"><div align="center"></div></font>     </td>
    <td width="12%"><div align="center"><font color="#000000"><?php echo number_format($tmonto,2, ".", ","); ?></font></div></td>
    <td width="10%"><div align="center"><font color="#000000"><?php echo number_format($tmora,2, ".", ","); ?></font></div></td>
    <td width="13%"><div align="center"><font color="#000000"><?php echo number_format($tgcobranza,2, ".", ","); ?></font></div></td>  
    <td width="10%"><div align="center"><font color="#000000"><?php echo number_format($tiva,2, ".", ","); ?></font></div></td>
    <td width="9%"><div align="center"><font color="#000000"><?php echo number_format($tprevitotal,2, ".", ","); ?></font></div></td>
	<td width="10%"><div align="center"><font color="#000000"><?php echo number_format($totalg,2, ".", ","); ?></font></div></td>
  </tr>
  <tr>
	<td width="6%"><font color="#000000"><div align="center"></div></font>     </td>
	<td ><div align="center"><font color="#000000">Balance a Favor</font></div></td>
	<td colspan="6"><font color="#000000"><div align="center"></div>___________________________________________________________</font>     </td>
	   </td>
	<td width="10%"><div align="center"><font color="#000000"><?php echo number_format($ajuste,2, ".", ","); ?></font></div></td>
	
  </tr>
  <tr>
	<td width="6%"><font color="#000000"><div align="center"></div></font>     </td>
	<td ><font color="#000000"><div align="center"><strong>Total General</strong></div></font>     </td>
	<td width="6%"><font color="#000000"><div align="center"></div></font>     </td>
	<td width="6%"><font color="#000000"><div align="center"></div></font>     </td>
	<td width="6%"><font color="#000000"><div align="center"></div></font>     </td>
	<td width="6%"><font color="#000000"><div align="center"></div></font>     </td>
	<td width="6%"><font color="#000000"><div align="center"></div></font>     </td>
	<td width="6%"><font color="#000000"><div align="center"></div></font>     </td>
	<td width="10%"><div align="center"><font color="#000000"><strong><?php $totalf = $totalg - $ajuste; echo number_format($totalf,2, ".", ","); ?></strong></font></div></td>
  </tr>
    </table>
<BR>
<form id="saldo" name="saldo" method="post" action="descargar.php" target="_blank">
<input name="contrato" type="hidden" value='<?php echo $contrato; ?>' >
<input name="cedula" type="hidden" value='<?php echo $cedula; ?>' >
<input name="tipo" type="hidden" value='1' >
<input type="submit" name="consulta" id="consulta" value="Imprimir Estado de Cuenta" />
</form>
<BR>
<?php
}else { ?>

<br />
    <h2 align="center"><span class="Estilo22">Cliente al dia con todos sus pagos</span></h2><br />
	<p></p>
<hr />

<?php } ?>
<div align="center">
<form id="mvtocuota" name="mvtocuota" method="post" action="descargar.php" target="_blank">
<input name="contrato" type="hidden" value='<?php echo $contrato; ?>' />
<input name="cedula" type="hidden" value='<?php echo $cedula; ?>' />
<input name="tipo" type="hidden" value='2' />
<input type="submit" name="consulta" id="consulta" value="Ver Movimiento de Cuotas en Pdf" />
</form>
</div>
<?php } ?></td>
													  </tr>
													</tbody>
												</table>
		<BR>
		<BR>
<script src="//code.tidio.co/ob5hc9bnifowcno0apgutikshdkzxzuq.js" async></script>
</body>
</html>
<?php include(__DIR__ . '\..\piepagina3.html');?>