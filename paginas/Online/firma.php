<?php
 //$i=0;
 //$tot=0;
 if(isset($_REQUEST['verbose'])) $verbose=$_REQUEST['verbose'];
 else $verbose="false";
 $detalle ="";
 $detalle = "<CARRO>";
 //foreach($_REQUEST['nro'] as $nro) {
 	$detalle.= "<DET>";
 	$detalle.= "<NRO>" . $_REQUEST['nro'] . "</NRO>";
	$detalle.= "<PRE>" . $_REQUEST['pre'] . "</PRE>";
	$detalle.= "<MTO>" . $_REQUEST['mto'] . "</MTO>";
	//$detalle.= "<GLS>" . htmlentities($_REQUEST['gls'][$i]) . "</GLS>";
	//$detalle.= "<ADI>" . htmlentities($_REQUEST['adi'][$i]) . "</ADI>";
	$detalle.= "<GLS>" . str_replace('<','&lt;', str_replace('>', '&gt;', str_replace('&', '', $_REQUEST['gls']))) . "</GLS>";
	$detalle.= "<ADI>" . str_replace('<','&lt;', str_replace('>', '&gt;', str_replace('&', '', $_REQUEST['adi']))) . "</ADI>";
 	$detalle.="</DET>";
	$tot=$_REQUEST['mto'];
 	//$i++;
// }
 $detalle.= "</CARRO>";

 $mpini   = "<MPINI>";
 $mpini  .= "<CNV>" . $_REQUEST['cnv'] . "</CNV>";
 $mpini  .= "<REC>" . $_REQUEST['rec'] . "</REC>";
 include(__DIR__ . '\..\..\conexion\conexion.php');
 $sqlfirm = "Update TWebTRX Set numtrx = numtrx + 1";
 $resultfirm = odbc_exec($conn,$sqlfirm);
 $sqltrx = "Select * From TWebTRX";
 $resulttrx = odbc_exec($conn,$sqltrx);
 $rowtrx = odbc_fetch_array($resulttrx);
 $mpini  .= "<TRX>" . $rowtrx["numtrx"] . "</TRX>";
 $mpini  .= "<TOT>" . $tot             . "</TOT>";
 $mpini  .= "<MDA>" . $_REQUEST['mda'] . "</MDA>";
 $mpini  .= "<NROPGO>" . $_REQUEST['nro'] . "</NROPGO>";
 $mpini  .= $detalle;
 $mpini  .= "</MPINI>";

 $data   =   $mpini;
 $secret = trim(file_get_contents("secret/secret.key"));
 $signature = hash_hmac('sha512', $data, $secret);
 session_start();
 $_SESSION ["vartrx"] = $rowtrx["numtrx"];
?>
<html>
	<head>
		<title>Firmador</title>
		<style>
			td{background-color:#CCCCCC; font-family:Arial, Verdana, Tahoma; font-size:13px; border-left:1px solid #AAAAAA; border-top:1px solid #AAAAAA;}
			body{font-family:Arial, Verdana, Tahoma; font-size:13px;}
		</style>
	<body <?php if($verbose!="true") echo "style=\"display:none;\" onload=\"document.formulario.submit();\"" ?>>
		Destino: <?php echo $_REQUEST['url']; ?></br></br>
		Mpini:<br><textarea cols=75 rows=5><?php echo $data; ?></textarea>
		<form method="post" action="<?php echo $_REQUEST['url']; ?>" name="formulario">
			Base64:<br>
			<textarea cols=75 rows=10 name="data"><?php echo base64_encode("<enveloment>".$data."<firma>".base64_encode($signature)."</firma></enveloment>");?></textarea>
			<br><br><input type='submit' value="Enviar datos a boton de pago"/>
		</form>
	</body>
</html>

