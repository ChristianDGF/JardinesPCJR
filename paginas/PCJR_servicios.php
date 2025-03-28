<?php

session_start();

if (isset($_POST['buscar']) ){
	$buscar    = $_POST['buscar'];
	}
	else{
	}
if (isset($_POST['enviar']) ){
	$enviar    = $_POST['enviar'];
	}
	else{
	}
if (isset($_POST['contrato']) ){
	$contrato  = $_POST['contrato'];
	}
	else{
	}
if (isset($_POST['cedula']) ){
	$cedula    = $_POST['cedula'];
	}
	else{
	}
if (isset($_POST['nombre']) ){
	$nombre    = mb_convert_encoding($_POST['nombre'], "ISO-8859-1", "UTF-8");
	}
	else{
	}
if (isset($_POST['direccion']) ){
	$direccion = mb_convert_encoding($_POST['direccion'], "ISO-8859-1", "UTF-8");
	}
	else{
	}
if (isset($_POST['telefono']) ){
	$telefono  = $_POST['telefono'];
	}
	else{
	}
if (isset($_POST['correo']) ){
	$correo = mb_convert_encoding($_POST['correo'], "ISO-8859-1", "UTF-8");
	}
	else{
	}
$flag = 0;

if (isset($_POST['enviar'])){
   include(__DIR__ . '\..\..\conexion\conexion.php');
   $fecha = date("d-m-Y");
   $sql = "INSERT INTO TWebActDatos (CedulaRif,Nombre,Direccion,Telefono,Fecha,Email) VALUES ('".$cedula."','".$nombre."','".$direccion."','".$telefono."','".$fecha."','".$correo."')";
   $result = odbc_exec($conn,$sql);
   
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
            
            if($num == 0) {
                echo "<script>alert('Combinacion Cedula/Contrato No Existe. Intente de nuevo');</script>"; 
                echo "<script language=\"JavaScript\" type=\"text/JavaScript\">";
                echo "window.location.href= 'PCJR_servicios.php'";  
                echo "</script>";
            } else {
                $sql2 = "SELECT * FROM twebactdatos WHERE (CedulaRif = ?)";
                $stmt2 = odbc_prepare($conn, $sql2);
                
                if ($stmt2 && odbc_execute($stmt2, array($cedula))) {
                    $num2 = odbc_num_rows($stmt2);
                    
                    if($num2 == 1) {    
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
        
        if($num == 0) {
            echo "<script>alert('Combinacion Cedula/Contrato No Existe. Intente de nuevo');</script>"; 
            echo "<script language=\"JavaScript\" type=\"text/JavaScript\">";
            echo "window.location.href= 'PCJR_servicios.php'";  
            echo "</script>";
        } else {
            $sql2 = "SELECT * FROM twebactdatos WHERE (CedulaRif = ?)";
            $stmt2 = odbc_prepare($conn, $sql2);
            
            if ($stmt2 && odbc_execute($stmt2, array($cedula))) {
                $num2 = odbc_num_rows($stmt2);
                
                if($num2 == 1) {    
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

    <div class="sec1">
        <img class="imgsec1" src="../assets/images/DSC_0636.JPG" />
        <h1>Pagos</h1>
    </div>



    <div class="content">
        <h2>¿Qué te ofrecemos?</h2>
        <p style="margin-left: 10%; margin-right: 10%; text-align: left;">
            Entendemos que los momentos de pérdida pueden ser emocionalmente abrumadores. Por eso, te ofrecemos la posibilidad de gestionar algunos servicios en línea para que pueda concentrarse en lo que realmente importa: honrar la memoria de su ser querido.
        </p>
        <ul style="margin-left: 10%; margin-right: 10%; text-align: left;">
            <li>
                <i class="fas fa-home"></i>
                Realizar pagos cómodamente desde casa.
            </li>
            <li>
                <i class="fas fa-exchange-alt"></i>
                Completar transacciones de manera rápida y respetuosa.
            </li>
            <li>
                <i class="fas fa-user-shield"></i>
                Utilizar su cuenta con total tranquilidad.
            </li>
        </ul>
    </div>
    <div class="form-section">
        <h2>Datos</h2>
        <div class="tabs">
            <div class="active">Datos</div>
            <div>Balance</div>
            <div>Cuentas Bancarias</div>
            <div>Pagos en Línea</div>
        </div>
        <div class="form-content">
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
        <div class="form-content hidden">
            <p>Actualizar Datos</p>
            <p>Si desea actualizar algún dato, como el teléfono, la dirección o añadir su correo electrónico, puede hacerlo por esta vía.</p>
            <button class="verify-button">Antes de realizar el cambio es necesario que verifiquemos sus credenciales.</button>
            <form id="saldo" name="saldo" method="post" action="Online/saldo.php">
        <input placeholder="Cédula" name="cedula" type="text" id="cedula" onKeyPress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;"/>
        <input placeholder="Contrato" name="contrato" type="text" id="contrato" onKeyPress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;"/>
        <div class="button-container">
            <button name="consulta" type="submit" value="Consultar Balance">Validar credenciales</button>
        </div>
    </form>
        </div>
        <div class="form-content hidden">
            <p>Cuentas Bancarias</p>
            <div class="grid-container">
                <div class="grid-item">
                    <p>Banesco</p>
                    <p>RNC: 1-30-89531-7</p>
                    <p>Tipo de Cuenta: Cuenta Corriente RD$</p>
                    <p>Nro. de Cuenta: 99100003187</p>
                </div>
                <div class="grid-item">
                    <p>Banco Popular</p>
                    <p>RNC: 1-30-89531-7</p>
                    <p>Tipo de Cuenta: Cuenta Corriente RD$</p>
                    <p>Nro. de Cuenta: 99100003187</p>
                </div>
                <div class="grid-item">
                    <p>Banreservas</p>
                    <p>RNC: 1-30-89531-7</p>
                    <p>Tipo de Cuenta: Cuenta Corriente RD$</p>
                    <p>Nro. de Cuenta: 99100003187</p>
                </div>
                <div class="grid-item">
                    <p>Banesco</p>
                    <p>RNC: 1-30-89531-7</p>
                    <p>Tipo de Cuenta: Cuenta Corriente RD$</p>
                    <p>Nro. de Cuenta: 99100003187</p>
                </div>
                <div class="grid-item">
                    <p>Banco Popular</p>
                    <p>RNC: 1-30-89531-7</p>
                    <p>Tipo de Cuenta: Cuenta Corriente RD$</p>
                    <p>Nro. de Cuenta: 99100003187</p>
                </div>
                <div class="grid-item">
                    <p>Scotiabank</p>
                    <p>RNC: 1-30-89531-7</p>
                    <p>Tipo de Cuenta: Cuenta Corriente RD$</p>
                    <p>Nro. de Cuenta: 99100003187</p>
                </div>
                <div class="grid-item">
                    <p>Banesco</p>
                    <p>RNC: 1-30-89531-7</p>
                    <p>Tipo de Cuenta: Cuenta Corriente RD$</p>
                    <p>Nro. de Cuenta: 99100003187</p>
                </div>
                <div class="grid-item">
                    <p>Banreservas</p>
                    <p>RNC: 1-30-89531-7</p>
                    <p>Tipo de Cuenta: Cuenta Corriente RD$</p>
                    <p>Nro. de Cuenta: 99100003187</p>
                </div>
            </div>
        </div>
        <div class="form-content hidden">
            <p>Pagos en Línea</p>
            <div class="payment-grid">
                <div class="payment-item">
                    <h3>Internet Banking - Banco Popular</h3>
                    <p>Accede con tu usuario personal o empresarial a Popular en Línea.</p>
                    <p>En beneficiarios, ingresa a servicios y facturas y selecciona la opción adicionar servicio o factura.</p>
                    <p>Luego, elige la categoría de servicios y selecciona el beneficiario Jardines del Recuerdo. Completa los campos requeridos y presiona continuar.</p>
                    <p>Ingresa el código de tu token y presiona continuar.</p>
                    <p>Finalmente, te aparecerá el comprobante con el resultado de la adición del servicio o factura.</p>
                    <p>Enlace de pago: <a href="https://www.popularenlinea.com" target="_blank">www.popularenlinea.com</a></p>
                </div>
                <div class="payment-item">
                    <h3>PayPal</h3>
                    <p>Haga clic en nuestro enlace de PayPal.</p>
                    <p>Inicie sesión de forma segura.</p>
                    <p>Complete su pago con la tranquilidad que merece.</p>
                    <p>Enlace de pago: <a href="https://paypal.me/jardinesdelrecuerdo" target="_blank">paypal.me/jardinesdelrecuerdo</a></p>
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

</body>

</html>