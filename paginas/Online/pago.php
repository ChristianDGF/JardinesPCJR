<?php include(__DIR__ . '\barramenu6.html');?>
<?php
include(__DIR__ . '\..\calendario\calendario.php');
if (isset($_POST['consulta']) ){
	$consulta = $_POST['consulta'];
	}
	else{
	}
if (isset($_POST['cedula']) ){
	$cedula = mb_convert_encoding($_POST['cedula'], "ISO-8859-1", "UTF-8");
	$cedula = preg_replace("/[^0-9]/", '', $cedula);
	}
	else{
	}
if (isset($_POST['contrato']) ){
	$contrato = $_POST['contrato'];
	}
	else{
	}

$flag = 0;

if (isset($_POST['consulta']) && is_numeric($cedula) == true && $contrato <> "" ){
    include(__DIR__ . '\..\..\conexion\conexion.php');
	$sql = 	"select * from PruebaWeb01 where ((cedula= ". $cedula .")) and ((contrato= ". $contrato ."))";
  	$result = odbc_exec($conn,$sql);
	$num = odbc_num_rows($result); 

	if($num == "" ){
		echo "<script>alert('Combinacion cedula y contrato no existe. Intente de nuevo');</script>"; 
		echo "<script language=\"JavaScript\" type=\"text/JavaScript\">";
		echo "window.location.href= 'pago.php'";  
		echo "</script>";}
	else{
	$flag = 1;
	}}
session_start();
?>
<html class=" js flexbox canvas rgba hsla multiplebgs backgroundsize borderimage borderradius boxshadow textshadow opacity cssanimations csscolumns cssgradients cssreflections csstransforms csstransforms3d csstransitions fontface generatedcontent" lang="es">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"> 
<meta charset="utf-8">		
<title>Pago en Linea</title>
<meta name="description" content="Pago en Linea">
<meta name="keywords" content="pago,online,en linea,consultar,saldo,contrato,parque,cementerio,jardines,recuerdo,funeraria,previsión">
<meta name="author" content="Sistemas PCJR">
<meta name="HandheldFriendly" content="True">
<meta name="MobileOptimized" content="320">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="format-detection" content="telephone=no"> 
<meta name="format-detection" content="address=no"> 		
<!-- Mobile IE allows us to activate ClearType technology for smoothing fonts for easy reading -->
<meta http-equiv="cleartype" content="on">
<link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
<link rel="stylesheet" href="../../css/estilo4_pago.css">
</head> 
<body>
<?php	if ($flag == 0){	 ?>
<h1 align="center">Pago en Linea</h1>
<BR>
												
<table class="art-article" border="0" cellspacing="0" cellpadding="0" style="max-width:536px;margin-left:auto;margin-right:auto;">
<tbody>
<tr>
<td style="border-width: 0px; text-align: center; " rowspan="1">
<form id="saldo" name="saldo" method="post" action="">
<input type="text" name="cedula" id="cedula" placeholder="Cédula" onKeyPress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false; if(event.keyCode == 8 || event.Keycode == 9) event.returnValue = True;"/>
<p><input type="text" name="contrato" id="contrato" placeholder="Contrato" onKeyPress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;"/></p>
<p><input type="submit" name="consulta" id="consulta" value="Balance" /></p>
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
$_SESSION["varsesscontrato"] = $row["contrato"];
$_SESSION["varsesstitular"] = $row["NombreApellido"];
															
															?>

<BR>															
<table width="100%" border="0" align="center">
    <tr> 
      <td width="50%" align="right"><font color="#106510">Cédula:</font></td>
      <td width="50%"><div align="left"><font color="#000000"><?php echo trim(trim(strval(($row["cedula"])),0),'.'); ?></font></div></td>
    </tr>
    <tr> 
      <td><div align="right"><font color="#106510">Contrato:</font></div></td>
      <td><div align="left"><font color="#000000"><?php echo $row["contrato"]; ?></font></div></td>
    </tr>
    <tr> 
      <td><div align="right"><font color="#106510">Nombres y Apellidos:</font></div></td>
      <td><div align="left"><font color="#000000"><?php echo  utf8_encode(ucwords(strtolower($row["NombreApellido"]))); ?></font></div></td>
    </tr>
    <tr>   
	  <td><div align="right"><font color="#106510">Dirección:</font></div></td>
      <td><div align="left"><font color="#000000"><?php echo utf8_encode(ucwords(strtolower($row["Domicilio"]))); ?></font></div></td>
    </tr> 
	   <td><div align="right"><font color="#106510">Teléfonos:</font></div></td>
      <td><div align="left"><font color="#000000"><?php echo $row["Tlfcelular01"]. "/ ".$row["TlfHab"]  ?></font></div></td> 
	 </tr> 
      <td><div align="right"><font color="#106510">Producto:</font></div></td>
      <td><div align="left"><font color="#000000"><?php echo $row["CantidadParcela"]."  ".$row["Producto"]; ?></font></div></td>
    </tr> 
</table>

 
<?php if ($row["Giro"]!=NULL) {
$edocta = $row["Giro"]; ?>
<p align="center"><font color="#000000" size="4"><strong>Balance</strong></font></p>
  <div align="center">
  
    <table style="max-width:75%;" border="1" align="center" bgcolor="#d3e4f4">
      <tr>
        <td width="6%"><div align="center"><font color="#000000">Nro.</font></div></td>
        <td width="12%"><div align="center"><font color="#000000">Descripción</font></div></td>
        <td width="10%"><div align="center"><font color="#000000">Vencimiento</font></div></td>
        <td width="9%"><div align="center"><font color="#000000">Monto Cuota</font></div></td>
        <td width="6%"><div align="center"><font color="#000000">Mora</font></div></td>
        <td width="9%"><div align="center"><font color="#000000">Gastos Cobranza</font></div></td>
        <td width="6%"><div align="center"><font color="#000000">ITBIS</font></div></td>
        <td width="6%"><div align="center"><font color="#000000">Previfacil</font></div></td>
        <td width="11%"><div align="center"><font color="#000000">Subtotal</font></div></td>
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
$tasacambio = $row["TasaCambio"];
do {
	if($row["PreIva"] == 1){
		$calculo = ($row["CapInt"] + $row["MoraF"] + $row["Previtotal"] +$row["ServCobro"])*0.18;}
	else
	   {$calculo = 0.0;}
$subtotal = $row["CapInt"] + $row["MoraF"] + $row["ServCobro"] + $calculo + $row["Previtotal"]; ?>
      <tr>
		<td width="6%"><div align="center"><?php echo $row["Giro"]; ?></div></td> 
        <td width="12%"><div align="center"><?php echo $row["Descripcion"]; ?></div></td> 
        <td width="10%"><div align="center"><?php echo date_format(new DateTime($row["FechaVenc"]),"d-m-Y"); echo $fecha2; ?></div></td>
        <td width="9%"><div align="right"><?php echo number_format($row["CapInt"],2, ".", ","); ?></div></td>
        <td width="6%"><div align="right"><?php echo number_format($row["MoraF"],2, ".", ","); ?></div></td>
        <td width="9%"><div align="right"><?php echo number_format($row["ServCobro"],2, ".", ","); ?></div></td>
        <td width="6%"><div align="right"><?php echo number_format($calculo,2, ".", ","); ?></div></td>
        <td width="6%"><div align="right"><?php echo number_format($row["Previtotal"],2, ".", ","); ?></div></td>
        <td width="11%"><div align="right"><?php echo number_format($subtotal,2, ".", ","); ?></div></td>
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
    <td width="12%"><font color="#000000"><div align="center"><strong>SubTotales</strong></div></font>     </td>
	<td width="10%"><font color="#000000"><div align="center"></div></font>     </td>
    <td width="9%"><div align="right"><font color="#000000"><?php echo number_format($tmonto,2, ".", ","); ?></font></div></td>
    <td width="6%"><div align="right"><font color="#000000"><?php echo number_format($tmora,2, ".", ","); ?></font></div></td>
    <td width="9%"><div align="right"><font color="#000000"><?php echo number_format($tgcobranza,2, ".", ","); ?></font></div></td>  
    <td width="6%"><div align="right"><font color="#000000"><?php echo number_format($tiva,2, ".", ","); ?></font></div></td>
    <td width="6%"><div align="right"><font color="#000000"><?php echo number_format($tprevitotal,2, ".", ","); ?></font></div></td>
	<td width="11%"><div align="right"><font color="#000000"><?php echo number_format($totalg,2, ".", ","); ?></font></div></td>
  </tr>
  <tr>
	<td width="6%"><font color="#000000"><div align="center"></div></font>     </td>
	<td ><div align="center"><font color="#000000">Saldo a Favor</font></div></td>
	<td colspan="6"></td>
	<td width="10%"><div align="right"><font color="#000000"><?php echo number_format($ajuste,2, ".", ","); ?></font></div></td>
	
  </tr>
  <tr>
	<td width="6%"><font color="#000000"><div align="center"></div></font>     </td>
	<td ><font color="#000000"><div align="center"><strong>Total General US$</strong></div></font>     </td>
	<td colspan="6"></td>
	<td width="10%"><div align="right"><font color="#000000"><strong><?php $totalf = $totalg - $ajuste; echo number_format($totalf,2, ".", ","); ?></strong></font></div></td>
  </tr>
  <tr>
	<td width="6%"><font color="#000000"><div align="center"></div></font>     </td>
	<td ><font color="#000000"><div align="center"><strong>Tasa de Cambio</strong></div></font>     </td>
	<td colspan="6"></td>
	<td width="10%"><div align="right"><font color="#000000"><strong><?php echo number_format($tasacambio,2, ".", ","); ?></strong></font></div></td>
  </tr>
  <tr>
	<td width="6%"><font color="#000000"><div align="center"></div></font>     </td>
	<td ><font color="#000000"><div align="center"><strong>Total General RD$</strong></div></font>     </td>
	<td colspan="6"></td>
	<td width="10%"><div align="right"><font color="#000000"><strong><?php $totalfrd = $tasacambio * $totalf; echo number_format($totalfrd,2, ".", ","); ?></strong></font></div></td>
  </tr>

    </table>
<BR>
<?php $totalbdp = $tasacambio * $totalf;
$_SESSION["vartotal"] = number_format($totalbdp,2, ".", "");
$varcnv="397";
?>
<form id="pagar" name="pagar" method="post" action="firma.php">
<input name="cnv" type="hidden" value='<?php echo $varcnv; ?>'>
<input name="rec" type="hidden" value='BCO-POP'>
<input name="trx" type="hidden" value='9999'>
<input name="mda" type="hidden" value='DOP'>
<input name="nro" type="hidden" value='1'>
<input name="pre" type="hidden" value='<?php echo number_format($totalbdp,2, ".", ""); ?>'>
<input name="mto" type="hidden" value='<?php echo number_format($totalbdp,2, ".", ""); ?>'>
<input name="gls" type="hidden" value='Jardines del Recuerdo'>
<input name="adi" type="hidden" value='<?php echo $contrato; ?>'>
<input name="url" type="hidden" value='https://botondepago.bpd.com.do/bdp/index.html'>
<input name="verbose" type="hidden" value='false'>
<input type="submit" name="botonpagar" id="botonpagar" value="">
<BR>
<label for="botonpagar">Pague con sus cuentas</label>
</form>

<BR>
<?php
}else { ?>

<br />
    <h2 align="center"><span class="Estilo22">Cliente al dia con todos sus pagos</span></h2><br />
	<p></p>
<hr />

<?php } ?>
<?php } ?>
	</td>
	</tr>
	</tbody>
	</table>
	<BR>
	<BR>
</body>
</html>
<?php include(__DIR__ . '\..\piepagina3.html');?>