<?php

session_start();

if (!isset($_SESSION["varsessemail"])) {
    header("Location: Online/login.php");
    exit(); // Detener la ejecución del script
}

if (isset($_POST['buscar'])) {
    $buscar    = $_POST['buscar'];
} else {
}
if (isset($_POST['enviar'])) {
    $enviar    = $_POST['enviar'];
} else {
}
if (isset($_POST['contrato'])) {
    $contrato  = $_POST['contrato'];
} else {
}
if (isset($_POST['cedula'])) {
    $cedula    = $_POST['cedula'];
} else {
}
if (isset($_POST['nombre'])) {
    $nombre    = mb_convert_encoding($_POST['nombre'], "ISO-8859-1", "UTF-8");
} else {
}
if (isset($_POST['direccion'])) {
    $direccion = mb_convert_encoding($_POST['direccion'], "ISO-8859-1", "UTF-8");
} else {
}
if (isset($_POST['telefono'])) {
    $telefono  = $_POST['telefono'];
} else {
}
if (isset($_POST['correo'])) {
    $correo = mb_convert_encoding($_POST['correo'], "ISO-8859-1", "UTF-8");
} else {
}
$flag = 0;

if (isset($_POST['enviar'])) {
    include(__DIR__ . '\..\..\conexion\conexion.php');
    $fecha = date("d-m-Y");
    $sql = "INSERT INTO TWebActDatos (CedulaRif,Nombre,Direccion,Telefono,Fecha,Email) VALUES ('" . $cedula . "','" . $nombre . "','" . $direccion . "','" . $telefono . "','" . $fecha . "','" . $correo . "')";
    $result = odbc_exec($conn, $sql);

    echo "<script>alert('Gracias Por Actualizar Sus Datos. Nuestros Ejecutivos Se Comunicaran Con Usted Para Confirmar Estos Cambios');</script>";
    echo "<script language=\"JavaScript\" type=\"text/JavaScript\">";
    echo "</script>";
}

if (isset($_POST['buscar']) && !empty($cedula) && !empty($contrato)) {
    include(__DIR__ . '..\conexion\conexion.php');

    // Validate and sanitize inputs
    $cedula = floatval($cedula);  // Convert to float
    $contrato = intval($contrato); // Convert to int

    // Use parameterized query to prevent SQL injection
    $sql = "SELECT * FROM PruebaWeb01 WHERE (Cedula = ?) AND (Contrato = ?)";
    $stmt = odbc_prepare($conn, $sql);

    if ($stmt && odbc_execute($stmt, array($cedula, $contrato))) {
        $num = odbc_num_rows($stmt);

        if ($num == 0) {
            echo "<script>alert('Combinacion Cedula/Contrato No Existe. Intente de nuevo');</script>";
            echo "<script language=\"JavaScript\" type=\"text/JavaScript\">";
            echo "window.location.href= 'PCJR_servicios.php'";
            echo "</script>";
        } else {
            $sql2 = "SELECT * FROM twebactdatos WHERE (CedulaRif = ?)";
            $stmt2 = odbc_prepare($conn, $sql2);

            if ($stmt2 && odbc_execute($stmt2, array($cedula))) {
                $num2 = odbc_num_rows($stmt2);

                if ($num2 == 1) {
                    echo "<script>alert('Usted Ya Tiene una solicitud de actualizacion pendiente. Nuestros ejecutivos se pondran en contacto con usted para Verificar los cambios');</script>";
                    echo "<script language=\"JavaScript\" type=\"text/JavaScript\">";
                    echo "window.location.href= 'PCJR_servicios.php'";
                    echo "</script>";
                } else {
                    $flag = 1;
                    $row = odbc_fetch_array($stmt);

                    $_SESSION['flag'] = $flag;
                    $_SESSION['row'] = $row;

                    header("Location: Online/act_datos.php");
                    exit();
                }
            }
        }
    } else {
        echo "<script>alert('Error en la consulta. Por favor intente nuevamente.');</script>";
    }
}
?>

<?php

if (isset($_POST['consulta'])) {
    $consulta = $_POST['consulta'];
} else {
}
if (isset($_POST['cedula'])) {
    $cedula   = $_POST['cedula'];
} else {
}
if (isset($_POST['contrato'])) {
    $contrato = $_POST['contrato'];
} else {
}

$flag = 0;


if (isset($_POST['consulta']) && !empty($cedula) && !empty($contrato)) {
    include(__DIR__ . '..\conexion\conexion.php');

    // Validate and sanitize inputs
    $cedula = floatval($cedula);  // Convert to float
    $contrato = intval($contrato); // Convert to int

    // Use parameterized query to prevent SQL injection
    $sql = "SELECT * FROM PruebaWeb01 WHERE (Cedula = ?) AND (Contrato = ?)";
    $stmt = odbc_prepare($conn, $sql);

    if ($stmt && odbc_execute($stmt, array($cedula, $contrato))) {
        $num = odbc_num_rows($stmt);

        if ($num == 0) {
            echo "<script>alert('Combinacion Cedula/Contrato No Existe. Intente de nuevo');</script>";
            echo "<script language=\"JavaScript\" type=\"text/JavaScript\">";
            echo "window.location.href= 'PCJR_servicios.php'";
            echo "</script>";
        } else {
            $sql2 = "SELECT * FROM twebactdatos WHERE (CedulaRif = ?)";
            $stmt2 = odbc_prepare($conn, $sql2);

            if ($stmt2 && odbc_execute($stmt2, array($cedula))) {
                $num2 = odbc_num_rows($stmt2);

                if ($num2 == 1) {
                    echo "<script>alert('Usted Ya Tiene una solicitud de actualizacion pendiente. Nuestros ejecutivos se pondran en contacto con usted para Verificar los cambios');</script>";
                    echo "<script language=\"JavaScript\" type=\"text/JavaScript\">";
                    echo "window.location.href= 'PCJR_servicios.php'";
                    echo "</script>";
                } else {
                    $flag = 1;
                    $row = odbc_fetch_array($stmt);

                    $_SESSION['flag'] = $flag;
                    $_SESSION['row'] = $row;

                    header("Location: Online/saldo.php");
                    exit();
                }
            }
        }
    } else {
        echo "<script>alert('Error en la consulta. Por favor intente nuevamente.');</script>";
    }
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PCJR | PAGOS</title>
    
    <!-- Favicon -->
    <link rel="icon" href="../assets/favicon/favicon.png" type="image/png" />
    <link rel="shortcut icon" href="../assets/favicon/favicon.png" type="image/png" />
    
    <!-- Vinculación con Archivo CSS -->
    <link rel="stylesheet" href="../assets/css/pagos.css">
    <!-- Vinculación con librexría de JS para el SCROLL -->
    <script src="https://cdn.jsdelivr.net/npm/locomotive-scroll@4.0.6/dist/locomotive-scroll.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&amp;display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <META HTTP-EQUIV="CACHE-CONTROL" CONTENT="NO-CACHE">
</head>

<body>

    <?php include(__DIR__ . '\barramenu5.html'); ?>

    <div class="sec1 hiddenscroll">
        <img class="imgsec1" src="../assets/images/pi.jpg" />
        <h1 class="hiddenscroll">Servicios en Línea</h1>
    </div>



    <div class="content">
        <h2 class="hiddenscroll">¿Qué ofrecemos?</h2>
        <p class="hiddenscroll" style="margin-left: 10%; margin-right: 10%; text-align: left;">Ofrecemos Previsión Familiar a través de la inversión en propiedades y planes de capillas diseñados para brindar a la familia tranquilidad y seguridad en momentos difíciles. Estas son sus ventajas al tomar su Previsión Familiar:</p>
        <ul class="hiddenscroll" style="margin-left: 10%; margin-right: 10%; text-align: left;">
            <li class="flex items-center pl-4 mb-2" style="color: #666;">
                <i class="fas fa-shield-alt text-green-600 mr-2"></i>
                <b>PROTECCIÓN:</b>&nbsp;Amparo total y permanente de la familia, no más angustias.
            </li>
            <li class="flex items-center pl-4 mb-2" style="color: #666;">
                <i class="fas fa-chart-line text-green-600 mr-2"></i>
                <b>INVERSIÓN:</b>&nbsp;Propiedades y servicios con revalorización constante.
            </li>
            <li class="flex items-center pl-4" style="color: #666;">
                <i class="fas fa-money-bill-wave text-green-600 mr-2"></i>
                <b>FACILIDADES DE PAGO:</b>&nbsp;Adaptados a su presupuesto.
            </li>
        </ul>
    </div>
    <div class="form-section">
        <h2 class="hiddenscroll">Servicios en Línea</h2>
        <div class="tabs hiddenscroll">
            <div class="active ">Actualizar Datos</div>
            <div>Balance y Pagos</div>
            <div>Pagos y Servicios</div>
            <div>Cuentas Bancarias</div>
            <div>Popular - Internet Banking</div>
        </div>
        <div class="form-content hiddenscroll">
            <p>Actualizar Datos</p>
            <p>Si desea actualizar algún dato, como el teléfono, la dirección o añadir su correo electrónico, puede hacerlo por esta vía.</p>
            <button class="verify-button">Antes de realizar el cambio es necesario que verifiquemos sus credenciales.</button>
            <form id="datos" name="datos" method="post" action="">
                <input placeholder="Cédula" name="cedula" type="text" id="cedula" />
                <input placeholder="Contrato" name="contrato" type="text" id="contrato" />
                <div class="button-container">
                    <button name="buscar" type="submit">Validar credenciales</button>
                </div>
            </form>
        </div>
        <div class="form-content hidden hiddenscroll">
            <p>Ver Saldo</p>
            <p>Si necesita revisar el saldo de su cuenta, así como verificar movimientos recientes, puede hacerlo por esta vía.</p>
            <button class="verify-button">Antes de ver su saldo es necesario que verifiquemos sus credenciales.</button>
            <form id="saldo" name="saldo" method="post" action="Online/saldo.php">
                <input placeholder="Cédula" name="cedula" type="text" id="cedula" onKeyPress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" />
                <input placeholder="Contrato" name="contrato" type="text" id="contrato" onKeyPress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" />
                <div class="button-container">
                    <button name="consulta" type="submit" value="Consultar Balance">Validar credenciales</button>
                </div>
            </form>
        </div>
        <div class="form-content hidden hiddenscroll">
            <p>Realizar pagos</p>
            <p>Si desea realizar algun pago a travez de la plataforma del Banco Popular</p>
            <button class="verify-button">Antes de realizar el pago es necesario que verifiquemos sus credenciales.</button>
            <form id="saldo" name="saldo" method="post" action="Online/pago.php">
                <input placeholder="Cédula" name="cedula" type="text" id="cedula" onKeyPress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" />
                <input placeholder="Contrato" name="contrato" type="text" id="contrato" onKeyPress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" />
                <div class="button-container">
                    <button name="consulta" type="submit" value="Consultar Balance">Validar credenciales</button>
                </div>
            </form>
        </div>
        <div class="form-content hidden hiddenscroll">
            <p>Cuentas Bancarias</p>
            <div class="grid-container">
                <div class="grid-item" style="text-align: center;">
                    <img src="../assets/images/banesco.png" alt="Logo Banesco" style="width: 120px; height: 40px; object-fit: contain; margin: 0 auto;">
                    <br>
                    <p><b>Banesco</b></p>
                    <p>RNC: 1-30-89531-7</p>
                    <p>Tipo de Cuenta: Cuenta Corriente RD$</p>
                    <p>Nro. de Cuenta: 99100003187</p>
                </div>
                <div class="grid-item" style="text-align: center;">
                    <img src="../assets/images/popular.png" alt="Logo Banco Popular" style="width: 120px; height: 40px; object-fit: contain; margin: 0 auto;">
                    <br>
                    <p><b>Banco Popular</b></p>
                    <p>RNC: 1-30-89531-7</p>
                    <p>Tipo de Cuenta: Cuenta Corriente RD$</p>
                    <p>Nro. de Cuenta: 99100003187</p>
                </div>
                <div class="grid-item" style="text-align: center;">
                    <img src="../assets/images/Banreservas.webp" alt="Logo Banreservas" style="width: 120px; height: 40px; object-fit: contain; margin: 0 auto;">
                    <br>
                    <p><b>Banreservas</b></p>
                    <p>RNC: 1-30-89531-7</p>
                    <p>Tipo de Cuenta: Cuenta Corriente RD$</p>
                    <p>Nro. de Cuenta: 99100003187</p>
                </div>
                <div class="grid-item" style="text-align: center;">
                    <img src="../assets/images/scotiabank.webp" alt="Logo Scotiabank" style="width: 120px; height: 40px; object-fit: contain; margin: 0 auto;">
                    <br>
                    <p><b>Scotiabank</b></p>
                    <p>RNC: 1-30-89531-7</p>
                    <p>Tipo de Cuenta: Cuenta Corriente RD$</p>
                    <p>Nro. de Cuenta: 99100003187</p>
                </div>
            </div>
        </div>

        <div class="form-content hidden hiddenscroll">
            <p>Pagos y Servicios</p>
            
            <div class="payment-grid">

  <!-- Primera fila completa: Pagar por llamada y WhatsApp -->
  <div class="payment-buttons-row">
    <div class="payment-item small-item">
      <h3>Pagar por llamada</h3>
      <p>Para realizar tu pago por llamada, presiona el siguiente botón:</p>
      <p class="btn-pl">
        <a href="tel:+1 809 971 7222">
            <i class="fas fa-phone"></i> Pago por llamada
        </a>
      </p>
    </div>

    <div class="payment-item small-item">
      <h3>Pagar por WhatsApp</h3>
      <p>Gestiona tu pago fácilmente vía WhatsApp:</p>
      <p class="btn-pl">
        <a href="https://api.whatsapp.com/send?phone=18294210760&text=Quiero%20ser%20previsivo." target="_blank">
            <i class="fab fa-whatsapp"></i> Pago por WhatsApp
        </a>
      </p>
    </div>
  </div>

  <!-- Segunda fila: Banco Popular y columna de PayPal + Estafetas -->
  <div class="payment-item">
    <h3>Internet Banking - Banco Popular</h3>

    <p>1. Accede con tu usuario personal o empresarial a <b>www.popularenlinea.com</b></p>
    <p>2. En beneficiarios, ingresa a servicios y facturas y selecciona la opción adicionar servicio o factura.</p>
    <p>3. Luego, elige la categoría de servicios y selecciona el beneficiario <b>Jardines del Recuerdo.</b> Completa los campos requeridos y presiona continuar.</p>
    <p>4. Ingresa el código de tu token y presiona <b>continuar.</b></p>
    <p>5. Finalmente, te aparecerá el <b>comprobante</b> con el resultado de la adición del servicio o factura.</p>
    
    <br>

    <h3>Una vez agregado el beneficiario podrás realizar pagos</h3>

    <p>1. Ingresa a pagos de <b>servicios y facturas</b> y selecciona la categoría de <b>servicios</b>.</p>
    <p>2. Escoge el beneficiario <b>Jardines del Recuerdo</b> y consulta tu <b>número de contrato.</b></p>
    <p>3. Elige la cuenta desde la cual realizarás el pago, confirma los datos y presiona <b>continuar.</b></p>
    <p>4. Se presentará el <b>comprobante</b> y has finalizado el pago.</p>
    
    <br>

    <h3>Para realizar pagos en las sucursales del Banco Popular Dominicano</h3>

    <p>1. Al visitar la sucursal del banco más cercana, comunica al cajero que deseas realizar un <b>pago de servicio</b> en la nueva plataforma de <b>Jardines del Recuerdo.</b> Indica al cajero tu <b>número de contrato.</b></p>
    <p>2. Verifica lo pagado y los datos en tu <b>comprobante</b> de pago.</p>

    <br>

    <p class="btn-pl">
      Enlace de pago: 
      <a href="https://www.popularenlinea.com" target="_blank">www.popularenlinea.com</a>
    </p>
  </div>

  <!-- Derecha: PayPal + Estafetas en columna -->
  <div class="payment-column-right">

    <div class="payment-item">
      <h3>PayPal</h3>

      <p>1. Haga clic en nuestro enlace de PayPal.</p>
      <p>2. Inicie sesión de forma segura.</p>
      <p>3. Complete su pago con la tranquilidad que merece.</p>

      <p class="btn-pl">
        Enlace de pago: 
        <a href="https://paypal.me/jardinesdelrecuerdo" target="_blank">paypal.me/jardinesdelrecuerdo</a>
      </p>
    </div>

    <div class="payment-item">
      <h3>Listado de Estafetas - Paga Todo</h3>

      <p>Paga tus servicios de Jardines del Recuerdo de forma rápida y segura en cualquiera de nuestras estafetas disponibles en Santiago. Contamos con más de 90 puntos de pago estratégicamente ubicados.</p>

      <p class="btn-pl">
        Listado completo: 
        <a href="../assets/doc/paga.pdf" target="_blank">Descargar listado</a>
      </p>
    </div>

  </div>

</div>


  </div>
</div>

    </div>

    <?php include(__DIR__ . '\piepagina2.html'); ?>


    <script>
        // Toggle principal del menú móvil
        document.getElementById('menu-button').addEventListener('click', function() {
            document.getElementById('mobile-menu').classList.toggle('hidden');
        });

        // Toggle del submenú "Nosotros" en mobile
        document.getElementById('mobile-nosotros').addEventListener('click', function() {
            document.getElementById('mobile-nosotros-menu').classList.toggle('hidden');
        });

        // Toggle del submenú "Servicios" en mobile
        document.getElementById('mobile-servicios').addEventListener('click', function() {
            document.getElementById('mobile-servicios-menu').classList.toggle('hidden');
        });
        document.addEventListener('DOMContentLoaded', function() {
            const tabs = document.querySelectorAll('.tabs div');
            const sections = document.querySelectorAll('.form-content');

            tabs.forEach((tab, index) => {
                tab.addEventListener('click', () => {
                    tabs.forEach(t => t.classList.remove('active'));
                    tab.classList.add('active');

                    sections.forEach(section => section.classList.add('hidden'));
                    sections[index].classList.remove('hidden');
                });
            });
        });
    </script>
    <script src="../assets/js/showonscroll.js"></script>
</body>

</html>