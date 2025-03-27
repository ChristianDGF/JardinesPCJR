<?php
ini_set("memory_limit","256M");
$cedula   = $_POST['cedula'];
$contrato = $_POST['contrato'];

include(__DIR__ . '\..\..\conexion\conexion.php');
	
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

	//$fechacierre= date_format($row["FechaCierre"],"d-m-Y");
	
require_once __DIR__ . '\mpdf\vendor\autoload.php';
$mpdf = new \Mpdf\Mpdf();
ob_start(); 	
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>.:: Estado de Cuenta - Jardines del Recuerdo::.</title>
<style type="text/css">
.diseno {
	text-align: center;
}
.diseno {
	font-size: 9px;
}
.diseno1 {
	font-size: 10px;
}
.diseno2 {
	font-size: 12px;
}
</style>
</head>

<body>
<p align="center"><img src="../../images/logo.jpg"  width="500" height="121" alt="logo" longdesc="logo" /></p>
<h2 align="center"><u>Estado de Cuenta</u></h2>
<p align="center">Saldos proyectados a la fecha: <?php $fecha2=date("d-m-Y"); echo $fecha2; ?></p>

<table width="90%" border="0" align="center">
    <tr> 
      <td width="28%"><div align="left"><font color="#3366CC" size="3"><font color="#0C3EB4">Cédula:</font></font></div></td>
      <td width="72%"><div align="left"><?php echo $row["cedula"]; ?></div></td>
  </tr>
    <tr> 
      <td><div align="left"><font color="#0C3EB4" size="3">Contrato</font><font color="#0C3EB4">:</font></div></td>
      <td><div align="left"><?php echo $row["contrato"]; ?></div></td>
    </tr>
    <tr> 
      <td><div align="left"><font color="#0C3EB4" size="3">Nombres y Apellidos:</font></div></td>
      <td><div align="left"><?php echo utf8_encode(ucwords(strtolower($row["NombreApellido"]))); ?></div></td>
    </tr>
    <tr>   
	  <td><div align="left"><font color="#0C3EB4" size="3">Dirección:</font></div></td>
      <td><div align="left"><font size="1"><?php echo utf8_encode(ucwords(strtolower($row["Domicilio"]))); ?></font></div></td> 
    </tr>
     <tr>   
	  <td><div align="left"><font color="#0C3EB4" size="3">Dirección Cobro:</font></div></td>
      <td><div align="left"><font size="1"><?php if ($row["DireccionCobro"]== '' ) { echo "Misma Direccion del Cliente";} else {echo utf8_encode(ucwords(strtolower($row["DireccionCobro"])));} ?></font></div></td> 
    </tr>
	<tr>
	   <td><div align="left"><font color="#0C3EB4" size="3">Teléfonos:</font></div></td>
      <td><div align="left"></div><?php echo $row["TlfHab"]. ", ".$row["Tlfcelular01"];  ?></td> 
	 
</table>
<h3 class="style2" align="center"><strong><u>Balance</u></strong></h3>
  <div align="center">
    <table width="90%" border="1" align="center">
      <tr>
        <td width="6%"  align="center"><font color="#0C3EB4" size="2">Nro</font></td>
        <td width="17%" align="center"><font color="#0C3EB4" size="2">Descripcion</font></td>
        <td width="15%" align="center"><font color="#0C3EB4" size="2">Vencimiento</font></td>
        <td width="12%" align="center"><font color="#0C3EB4" size="2">Monto Cuota</font></td>
        <td width="10%" align="center"><font color="#0C3EB4" size="2">Mora</font></td>
        <td width="11%" align="center"><font color="#0C3EB4" size="2">Gastos Cobranza</font></td>
        <td width="10%" align="center"><font color="#0C3EB4" size="2">ITBIS</font></td>
        <td width="9%"  align="center"><font color="#0C3EB4" size="2">Previfacil</font></td>
        <td width="10%" align="center"><font color="#0C3EB4" size="2">Subtotal</font></td>
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
$subtotal = $row["CapInt"] + $row["MoraF"] + $row["ServCobro"] + $calculo + $row["Previtotal"];   ?>

      <tr>
		<td width="6%"  align="center"><font color="#000000" size="2"><?php echo $row["Giro"]; ?></font></td> 
        <td width="17%" align="center"><font color="#000000" size="2"><?php echo $row["Descripcion"]; ?></font></td> 
        <td width="15%" align="center"><font color="#000000" size="2"><?php echo date_format(new DateTime($row["FechaVenc"]),"d-m-Y"); ?></font></td>
        <td width="12%" align="center"><font color="#000000" size="2"><?php echo number_format($row["CapInt"],2, ".", ","); ?></font></td>
        <td width="10%" align="center"><font color="#000000" size="2"><?php echo number_format($row["MoraF"],2, ".", ","); ?></font></td>
        <td width="11%" align="center"><font color="#000000" size="2"><?php echo number_format($row["ServCobro"],2, ".", ","); ?></font></td>
        <td width="10%" align="center"><font color="#000000" size="2"><?php echo number_format($calculo,2, ".", ","); ?></font></td>
        <td width="9%"  align="center"><font color="#000000" size="2"><?php echo number_format($row["Previtotal"],2, ".", ","); ?></font></td>
        <td width="10%" align="center"><font color="#000000" size="2"><?php echo number_format($subtotal,2, ".", ","); ?></font></td>
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
    <td width="6%"  align="center"><font color="#000000" size="2"></font></td>
    <td width="20%" align="center"><font color="#000000" size="2"><strong>SubTotales</strong></font>     </td>
	<td width="10%" align="center"><font color="#000000" size="2"></font></td>
    <td width="12%" align="center"><font color="#000000" size="2"><?php echo number_format($tmonto,2, ".", ","); ?></font></td>
    <td width="10%" align="center"><font color="#000000" size="2"><?php echo number_format($tmora,2, ".", ","); ?></font></td>
    <td width="13%" align="center"><font color="#000000" size="2"><?php echo number_format($tgcobranza,2, ".", ","); ?></font></td>  
    <td width="10%" align="center"><font color="#000000" size="2"><?php echo number_format($tiva,2, ".", ","); ?></font></td>
    <td width="9%"  align="center"><font color="#000000" size="2"><?php echo number_format($tprevitotal,2, ".", ","); ?></font></td>
	<td width="10%" align="center"><font color="#000000" size="2"><?php echo number_format($totalg,2, ".", ","); ?></font></td>
  </tr>
  <tr>
	<td width="6%" align="center"><font color="#000000"></font></td>
	<td align="center"><font color="#000000" size="2">Saldo a Favor</font></td>
	<td colspan="6" align="center"><font color="#000000"></font></td>
	<td width="10%" align="center"><font color="#000000" size="2"><?php echo number_format($ajuste,2, ".", ","); ?></font></td>
	
  </tr>
  <tr>
	<td width="6%" align="center"><font color="#000000"></font></td>
	<td align="center"><font color="#000000" size="2"><strong>Total General</strong></font></td>
	<td colspan="6" align="center"><font color="#000000"></font></td>
	<td width="10%" align="center"><font color="#000000" size="2"><strong><?php $totalf = $totalg - $ajuste; echo number_format($totalf,2, ".", ","); ?></strong></font></td>
  </tr>
    </table>
  </div>
<!--<p align="center" class="diseno"><strong>Puede realizar el deposito de sus pagos en efectivo en algunas de nuestras cuentas corriente de los siguientes bancos, e
    identificarlo con número de C.I. del titular del contrato y reportarlo inmediatamente a nuestros números de atención al público o
    a tráves de nuestro portal www.jardinesdelorinoco.com.ve en la Sección Servicios en Linea.</strong></p>
  <p class="diseno">Banco Caroni 0128-0001-10-0109754-10-1;Banco Del Sur 0157-0011-47-39-11-000135
    Banco Mercantil 0105-0047-81-1047408740;Banco Banesco 0134-0266-3-5-266-1021740;Banco Provincial 0108-0093-53-0100006542
    BOD 0116-0094-88-0010616594; Banco Caroni 0128-0504-75-0420015-69-0; Portal https://mispagos.provincial.com/</p>
  <hr>
<p align="center" class="diseno2"><strong> Horarios de Atención al Público </strong></p>
  <p class="diseno">Parque Cementerio Vía carretera vieja de Cambalache: Lunes a Jueves: de 7:30 am a 12:00 m y de 1:00 pm a 5:15 pm - Viernes: de 7:30 am a
    12:00 m y de 1:00 pm a 5:30 pm. Sabado y Domingo: de 7:30 am a 12:00 m y de 1:00 pm a 4:30 pm; Tlfs: 0286-7179647 Fax 7173618.</p>
  <p class="diseno">C. C. La Cariñosa 1er Piso local 8-9 Av. Moreno de Mendoza, El Roble, San Felix: Lunes a Viernes: de 8:00 am a 12:00 m y de 1:00 pm a 5:00
    pm - Sabado: de 9:00 am a 1:00 pm ;Tlfs: 0286-9314186-9322800 - Fax 9322266.</p>
  <p class="diseno">Via Caracas, C.C. Maria Luisa 1er Piso local A-1 (Frente al Hosptal de la Ferrominera): Lunes a Viernes: de 8:00 am a 6:00 pm (horario corrido);Tlfs: 0286-9237048-9236749-9232180-080052734637- Fax 9235586.</p>
  <p class="diseno">Av. Paseo Caroni, C.C. Gran Sabana 1er local 7 Piso : Lunes a Jueves: de 8:00 am a 12:00 m y de 1:00 pm a 6:00 pm. Viernes: de 8:00 am a 12:00 m y de 1:00 pm a 5:00 pm;Tlfs: 0286-9528464-7196036-6117261- Fax 9528464. </p>
  <p class="diseno">C.C. Orinokia Nivel Oro local N-45 (Diagonal al Banco B.O.D): Lunes a Sabado: de 10:00 am a 9:00 pm, Domingo y Feriado: de 12:00 m a 8:00 pm ;Tlfs: 0286-6003573-6003572-6003571</p> -->
<p></p>
</body>
</html>

<?php $html=ob_get_contents(); 
ob_end_clean(); 
$mpdf->WriteHTML($html);

$mpdf->Output("edocuenta_$cedula.pdf",'D');
exit; 
?>