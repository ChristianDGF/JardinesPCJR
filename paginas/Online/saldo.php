<?php include(__DIR__ . '\barramenu6.html'); ?>
<?php
include(__DIR__ . '\..\calendario\calendario.php');

// Recuperar los parámetros del formulario
$consulta = isset($_POST['consulta']) ? $_POST['consulta'] : "";
$cedula   = isset($_POST['cedula']) ? $_POST['cedula'] : "";
$contrato = isset($_POST['contrato']) ? $_POST['contrato'] : "";

$flag = 0;

if ($consulta && $cedula <> "" && $contrato <> "") {
    include(__DIR__ . '\..\..\conexion\conexion.php');
    
    // Establece el formato de fecha a día-mes-año
    odbc_exec($conn, "SET DATEFORMAT dmy");
    
    $sql = "SELECT * FROM PruebaWeb01 WHERE cedula = " . $cedula . " AND contrato = " . $contrato;
    $result = odbc_exec($conn, $sql);
    $num = odbc_num_rows($result);

    if (!$num) {
        echo "<script>alert('Combinación Cédula y Contrato No Existe. Intente de nuevo');</script>";
        echo "<script language=\"JavaScript\" type=\"text/JavaScript\">
              window.location.href= 'saldo.php'
              </script>";
    } else {
        $flag = 1;
    }
}
?>
<html lang="es">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"> 
  <meta charset="utf-8">    
  <title>Consultar Balance</title>
  <meta name="description" content="Consulte el balance de su cuenta">
  <meta name="keywords" content="consultar,balance,saldo,contrato">
  <meta name="author" content="Sistemas PCJR">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../../css/estilo4.css">
  <!-- Otros metatags y scripts -->
</head>
<body>
  <!-- Google Tag Manager, etc. -->

  <?php if ($flag == 0) { ?>
      <h1 align="center">Consultar Balance</h1>
      <br>
      <p align="center">Puede verificar si sus pagos están al día, emitir estado de cuenta o movimiento de cuotas.</p>
      <table class="art-article" border="0" cellspacing="0" cellpadding="0" style="max-width:671px;margin:auto;">
        <tbody>
          <tr>
            <td style="text-align: center;">
              <form id="saldo" name="saldo" method="post" action="">
                <input type="text" name="cedula" id="cedula" placeholder="Cédula" onKeyPress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;"/>
                <p>
                  <input type="text" name="contrato" id="contrato" placeholder="Contrato" onKeyPress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;"/>
                </p>
                <p>
                  <input type="submit" name="consulta" id="consulta" value="Consultar Balance" />
                </p>
              </form>
            </td>
          </tr>
        </tbody>
      </table>
  <?php } ?>

  <?php if ($flag == 1) {
      // Borramos por si hay restos en la BD del Contrato.
      $sql0 = "DELETE FROM contratoweb WHERE contrato = " . $contrato;
      odbc_exec($conn, $sql0);

      // Insertamos la información para procesarla en la vista
      $sql = "INSERT INTO contratoweb (contrato) VALUES (" . $contrato . ")";
      odbc_exec($conn, $sql);

      // Buscamos la información procesada por la vista
      $sql3 = "SELECT * FROM VConsultaSaldoWebPago WHERE contrato = " . $contrato;
      $result3 = odbc_exec($conn, $sql3);

      // Verificar que la consulta se ejecutó correctamente
      if (!$result3) {
          die("Error en la consulta SQL: " . odbc_errormsg($conn));
      }

      $row = odbc_fetch_array($result3);

      $cedula = $row["cedula"];
      $contrato = $row["contrato"];
  ?>

  <br><br>
  <table width="100%" border="0" align="center">
      <tr> 
          <td width="50%" align="right"><strong>Cédula:</strong></td>
          <td width="50%"><?php echo trim(strval($row["cedula"])); ?></td>
      </tr>
      <tr> 
          <td align="right"><strong>Contrato:</strong></td>
          <td><?php echo $row["contrato"]; ?></td>
      </tr>
      <tr> 
          <td align="right"><strong>Nombres y Apellidos:</strong></td>
          <td><?php echo utf8_encode(ucwords(strtolower($row["NombreApellido"]))); ?></td>
      </tr>
      <tr>   
          <td align="right"><strong>Dirección:</strong></td>
          <td><?php echo utf8_encode(ucwords(strtolower($row["Domicilio"]))); ?></td>
      </tr>
      <tr>
          <td align="right"><strong>Teléfono:</strong></td>
          <td><?php echo $row["TlfHab"] . ", " . $row["Tlfcelular01"]; ?></td> 
      </tr>
      <tr>
          <td align="right"><strong>Producto:</strong></td>
          <td><?php echo $row["CantidadParcela"] . " " . $row["Producto"]; ?></td>
      </tr>
      <tr> 
          <td align="right"><strong>Tasa dólar:</strong></td>
          <td><?php echo $row["TasaCambio"]; ?></td>
      </tr>  
  </table>

  <br>
  <?php if ($row["Giro"] != NULL) {
      $edocta = $row["Giro"]; ?>
      <p align="center"><strong><u>Balance</u></strong></p>
      <br>
      <table width="90%" border="1" align="center" bgcolor="#DAD7D6">
          <tr>
              <th>Nro.</th>
              <th>Descripción</th>
              <th>Vencimiento</th>
              <th>Monto Cuota</th>
              <th>Mora</th>
              <th>Gastos Cobranza</th>
              <th>ITBIS</th>
              <th>Previfacil</th>
              <th>Subtotal</th>
          </tr>
          <?php
          $tmonto = $tmora = $tgcobranza = $tiva = $tprevitotal = $totalg = $vencidas = 0;
          $ajuste = 0;
          do {
              if ($row["PreIva"] == 1) {
                  $calculo = ($row["CapInt"] + $row["MoraF"] + $row["Previtotal"] + $row["ServCobro"]) * 0.18;
              } else {
                  $calculo = 0.0;
              }
              $subtotal = $row["CapInt"] + $row["MoraF"] + $row["ServCobro"] + $calculo + $row["Previtotal"];
          ?>
          <tr>
              <td align="center"><?php echo $row["Giro"]; ?></td>
              <td align="center"><?php echo $row["Descripcion"]; ?></td>
              <td align="center">
                  <?php 
                  // Se asume que FechaVenc viene en un formato compatible con DateTime después del SET DATEFORMAT
                  echo date_format(new DateTime($row["FechaVenc"]), "d-m-Y"); 
                  ?>
              </td>
              <td align="center"><?php echo number_format($row["CapInt"], 2, ".", ","); ?></td>
              <td align="center"><?php echo number_format($row["MoraF"], 2, ".", ","); ?></td>
              <td align="center"><?php echo number_format($row["ServCobro"], 2, ".", ","); ?></td>
              <td align="center"><?php echo number_format($calculo, 2, ".", ","); ?></td>
              <td align="center"><?php echo number_format($row["Previtotal"], 2, ".", ","); ?></td>
              <td align="center"><?php echo number_format($subtotal, 2, ".", ","); ?></td>
          </tr>
          <?php 
              $tmonto     += $row["CapInt"];
              $tmora      += $row["MoraF"];
              $tgcobranza += $row["ServCobro"];
              $tiva       += $calculo;
              $tprevitotal+= $row["Previtotal"];
              $totalg     += $subtotal;
              $vencidas  ++;
              $ajuste      = $row["MontoAjuste"];
          } while($row = odbc_fetch_array($result3));
          ?>
          <tr>
              <td colspan="3" align="center"><strong>SubTotales</strong></td>
              <td align="center"><?php echo number_format($tmonto, 2, ".", ","); ?></td>
              <td align="center"><?php echo number_format($tmora, 2, ".", ","); ?></td>
              <td align="center"><?php echo number_format($tgcobranza, 2, ".", ","); ?></td>
              <td align="center"><?php echo number_format($tiva, 2, ".", ","); ?></td>
              <td align="center"><?php echo number_format($tprevitotal, 2, ".", ","); ?></td>
              <td align="center"><?php echo number_format($totalg, 2, ".", ","); ?></td>
          </tr>
          <tr>
              <td colspan="7" align="center">Balance a Favor</td>
              <td colspan="2" align="center"><?php echo number_format($ajuste, 2, ".", ","); ?></td>
          </tr>
          <tr>
              <td colspan="8" align="center"><strong>Total General</strong></td>
              <td align="center">
                  <?php 
                  $totalf = $totalg - $ajuste; 
                  echo number_format($totalf, 2, ".", ","); 
                  ?>
              </td>
          </tr>
      </table>
      <br>
      <form id="saldo" name="saldo" method="post" action="descargar.php" target="_blank">
          <input name="contrato" type="hidden" value="<?php echo $contrato; ?>">
          <input name="cedula" type="hidden" value="<?php echo $cedula; ?>">
          <input name="tipo" type="hidden" value="1">
          <input type="submit" name="consulta" id="consulta" value="Imprimir Estado de Cuenta">
      </form>
      <br>
  <?php } else { ?>
      <br>
      <h2 align="center">Cliente al día con todos sus pagos</h2><br>
      <hr>
  <?php } ?>
  
  <div align="center">
      <form id="mvtocuota" name="mvtocuota" method="post" action="descargar.php" target="_blank">
          <input name="contrato" type="hidden" value="<?php echo $contrato; ?>">
          <input name="cedula" type="hidden" value="<?php echo $cedula; ?>">
          <input name="tipo" type="hidden" value="2">
          <input type="submit" name="consulta" id="consulta" value="Ver Movimiento de Cuotas en Pdf">
      </form>
  </div>
  <?php } ?>
  
  <br><br>
  <script src="//code.tidio.co/ob5hc9bnifowcno0apgutikshdkzxzuq.js" async></script>
</body>
</html>
<?php include(__DIR__ . '\..\piepagina3.html'); ?>