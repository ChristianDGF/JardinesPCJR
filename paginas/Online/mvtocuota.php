<?php
ini_set("memory_limit","512M");
$contrato  = isset($_POST['contrato'])  ? $_POST['contrato']  : null ;
$cedula    = isset($_POST["cedula"])    ? $_POST["cedula"]    : null ;

include(__DIR__ . '\..\..\conexion\conexion.php');
	
	$sql3 = "SELECT * FROM VMovCuotasWeb WHERE contrato = ".$contrato;
	$result3 = odbc_exec($conn,$sql3);
	$row = odbc_fetch_array($result3);
	$montoajuste = $row["MontoAjuste"];
	
require_once __DIR__ . '\mpdf\vendor\autoload.php';
$mpdf = new \Mpdf\Mpdf();
ob_start(); 	
?>
<html lang="es">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>.:: Movimiento de Cuotas - Jardines del Recuerdo::.</title>
<style type="text/css">
.Letra_9 {
	font-size: 9px;
}
.Letra_10 {
	font-size: 10px;
}
.diseno {
	text-align: center;
	font-size: 9px;
}
.diseno1 {
	font-size: 10px;
}
.diseno2 {
	font-size: 12px;
}
.Letra_12 {
	font-size: 12px;
}
td {vertical-align:middle;}
</style>
</head>

<body>
<table width="90%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td colspan="2" rowspan="2" valign="top"><p align="center"><img src="../../images/logo.jpg" width="420" height="102" alt="logo" longdesc="logo" /></p></td>
    <td width="657" height="42" valign="top" align="center"><h1 align="center"><strong>Movimiento de Cuotas</strong></h1></td>
  </tr>
  <tr>
    <td height="19" valign="top" align="center"><h3 align="center">Al dia  <?php $fecha = date("d-m-Y"); echo $fecha; ?></h3></td>
  </tr>
</table>
<BR>
<table width="90%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="232" valign="top">Contrato: <?php echo $row["Contrato"]; ?></td>
    <td width="381" valign="top">Fecha del Contrato: <?php echo date_format(new DateTime($row["FechaContrato"]),"d-m-Y"); ?></td>
    <td width="223" valign="top">Precio de Venta: <?php echo number_format($row["PrecioVenta"],2, ".", ","); ?></td>
    <td width="138" valign="top">% Interes: <?php echo $row["TasaInteres"]; ?></td>
  </tr>
  <tr>
    <td valign="top">Cedula/RNC: <?php echo trim(trim(strval($row["Cedula"]),0),'.'); ?></td>
    <td valign="top">Nombre: <?php echo utf8_encode(ucwords(strtolower($row["NombreApellido"]))); ?></td>
    <td valign="top">Nº de Cuotas: <?php echo $row["NroCuotas"]; ?></td>
  </tr>
</table>
<BR>
<table width="90%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td align="center" valign="top"><strong class="Letra_12">Detalle de Cuotas</strong></td>
  </tr>
</table>
<BR>
<table width="90%" border="1" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="10%" align="center"><p>Tipo</p></td>
    <td width="10%" align="center"><p>Vencimiento</p></td>
    <td width="5%" align="center"><p>Nro.</p></td>
    <td width="13%" align="center"><p>Monto</p></td>
    <td width="10%" align="center"><p>Mora</p></td>
    <td width="10%" align="center"><p>ITBIS</p></td>
	<td width="9%" align="center"><p>CargoCobro</p></td>
    <td width="13%" align="center"><p>SubTotal</p></td>
    <td width="10" align="center"><p>FechaPago</p></td>
    <td width="10%" align="center"><p>Comprobante</p></td>
  </tr>
 <?php do{ 
		
 ?>
  <tr>
    <td width="10%" align="center"><p><?php echo $row["DescripcionCuota"]; ?></p></td>
    <td width="10%" align="center"><p><?php echo date_format(new DateTime($row["FechaVenc"]), "d-m-Y"); ?></p></td>
    <td width="5%" align="center"><p><?php echo $row["Giro"]; ?></p></td>
    <td width="13%" align="center"><p><?php echo number_format($row["MontoCuota"],2, ".", ","); ?></p></td>
    <td width="10%" align="center"><p><?php echo number_format($row["Mora"],2, ".", ","); ?></p></td>
    <td width="10%" align="center"><p><?php echo number_format($row["Impuesto"],2, ".", ","); ?></p></td>
	<td width="9%" align="center"><p><?php echo number_format($row["ServCobro"],2, ".", ","); ?></p></td>
    <td width="13%" align="center"><p><?php echo number_format($row["Subtotal"],2, ".", ","); ?></p></td>
    <td width="10%" align="center"><p><?php if ($row["FechaPago"] > "01-01-1996") {echo date_format(new DateTime($row["FechaPago"]), "d/m/Y");} else {echo '-';} ?></p></td>
    <td width="10%" align="center"><p><?php if ($row["Caja"] == 121){$strserie = "B01";$numfactu = $row["NumeroFactura"];echo $strserie.str_pad($numfactu,8,"0",STR_PAD_LEFT);}else{echo $row["Caja"].'-'.$row["Recibo"];} ?></p></td>
  </tr>
<?php }while($row = odbc_fetch_array($result3)) ?>
</table>
</body>
</html>

<?php $html=ob_get_contents(); 
ob_end_clean(); 
$html = mb_convert_encoding($html, 'UTF-8', 'UTF-8');
$mpdf->WriteHTML($html);

$mpdf->Output("mvtocuota_$cedula.pdf",'D');
exit; 
?>