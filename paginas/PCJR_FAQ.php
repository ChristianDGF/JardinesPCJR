<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PCJR | Ayuda</title>

    <!-- Favicon -->
    <link rel="icon" href="../assets/favicon/favicon.png" type="image/png" />
    <link rel="shortcut icon" href="../assets/favicon/favicon.png" type="image/png" />
    
    <!-- Vinculación con Archivo CSS -->
    <link rel="stylesheet" href="../assets/css/faq.css">
    <!-- Vinculación con librería de JS para el SCROLL -->
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
        <img class="imgsec1" src="../assets/images/ayu.jpg" />
        <h1>Ayuda</h1>
    </div>

    <div class="faq-section">
        <h2 class="tituloh2">Preguntas más Frecuentes</h2>
        <div class="faq-search">
            <input type="text" id="faq-search-input" placeholder="Buscar pregunta..." class="faq-search-input" />
        </div>
        <div class="faq">
            <div class="faq-item" onclick="toggleAnswer(event)">
                <i class="far fa-circle"></i>
                ¿Cómo puedo ingresar a "Servicios en Línea"?
            </div>
            <div class="faq-answer">
                Puede acceder a "Servicios en Línea" desde nuestra barra de navegación principal, dentro del menú "¿Qué te ofrecemos?". Allí encontrará todas las opciones para gestionar su cuenta y realizar diversas operaciones.
            </div>

            <div class="faq-item" onclick="toggleAnswer(event)">
                <i class="far fa-circle"></i>
                ¿Cómo puedo actualizar mis datos personales?
            </div>
            <div class="faq-answer">
                En la sección "Servicios en Línea", encontrará la opción para actualizar su información personal como teléfono, dirección o correo electrónico.
            </div>

            <div class="faq-item" onclick="toggleAnswer(event)">
                <i class="far fa-circle"></i>
                ¿Cómo verifico si estoy al día con mis pagos?
            </div>
            <div class="faq-answer">
                Dentro de "Servicios en Línea", puede verificar el estado actual de sus pagos, incluyendo si tiene algún saldo pendiente.
            </div>

            <div class="faq-item" onclick="toggleAnswer(event)">
                <i class="far fa-circle"></i>
                ¿Cómo consulto o imprimo mi estado de cuenta o movimiento de cuotas?
            </div>
            <div class="faq-answer">
                En "Servicios en Línea" encontrará opciones para visualizar e imprimir su estado de cuenta completo, así como ver el historial detallado de sus movimientos y cuotas.
            </div>

            <div class="faq-item" onclick="toggleAnswer(event)">
                <i class="far fa-circle"></i>
                ¿Cómo puedo pagar online?
            </div>
            <div class="faq-answer">
                Puede realizar pagos en línea mediante la plataforma del Banco Popular, Paypal Me, en "Servicios en Línea". También ofrecemos pago por llamada al (809) 555-1234, pago por WhatsApp al (809) 555-6789, y transferencias a nuestras cuentas en Banesco, Banco Popular, Banreservas y Scotiabank.
            </div>

            <div class="faq-item" onclick="toggleAnswer(event)">
                <i class="far fa-circle"></i>
                ¿Cómo puedo pagar con PayPal.Me?
            </div>
            <div class="faq-answer">
                En la sección "Servicios en Línea" encontrará la opción para realizar pagos mediante PayPal.Me, un método seguro y rápido para sus transacciones.
            </div>

            <div class="faq-item" onclick="toggleAnswer(event)">
                <i class="far fa-circle"></i>
                ¿Dónde encuentro información sobre sus cuentas bancarias?
            </div>
            <div class="faq-answer">
                La información sobre nuestras cuentas bancarias está disponible en "Servicios en Línea", donde podrá ver los detalles para realizar transferencias o depósitos.
            </div>

            <div class="faq-item" onclick="toggleAnswer(event)">
                <i class="far fa-circle"></i>
                ¿Cómo ubico a un familiar o amigo fallecido?
            </div>
            <div class="faq-answer">
                A través de la opción "Buscar Difunto" en nuestro menú principal o dentro de "Servicios en Línea", puede localizar a familiares o amigos fallecidos ingresando su nombre.
            </div>

            <div class="faq-item" onclick="toggleAnswer(event)">
                <i class="far fa-circle"></i>
                ¿Cómo solicito otros requerimientos específicos?
            </div>
            <div class="faq-answer">
                En "Servicios en Línea" encontrará formularios para solicitar diversos requerimientos o servicios adicionales. También puede contactarnos directamente para cualquier solicitud personalizada.
            </div>

            <div class="faq-item">
                <i class="far fa-circle"></i>
                ¿No encuentra una respuesta a su pregunta? Por favor escríbanos a <a href="mailto:jimmy@jardinesrecuerdo.com">jimmy@jardinesrecuerdo.com</a> o <a href="https://wa.me/18293451006/?text=Hola%2C%20deseo%20m%C3%A1s%20informaci%C3%B3n%20sobre%20sus%20servicios.%20%C2%BFMe%20pueden%20ayudar%3F" target="_blank">WhatsApp 8293451006</a>
            </div>
        </div>
    </div>

    <?php include(__DIR__ . '\piepagina2.html'); ?>

    <script>
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


        function toggleAnswer(event) {
            const item = event.currentTarget;
            const answer = item.nextElementSibling;
            const isOpen = answer.style.display === "block";
            if (!isOpen) {
                answer.style.display = "block";
                item.classList.add('active');
            } else {
                answer.style.display = "none";
                item.classList.remove('active');
            }
        }

        // Filtrar preguntas de FAQ
        document.getElementById('faq-search-input').addEventListener('input', function(e) {
            const filter = e.target.value.toLowerCase();
            document.querySelectorAll('.faq-item').forEach(item => {
                const text = item.textContent.toLowerCase();
                const answer = item.nextElementSibling;
                if (text.includes(filter)) {
                    item.style.display = '';
                    answer.style.display = 'none';
                } else {
                    item.style.display = 'none';
                    if (answer) answer.style.display = 'none';
                }
            });
        });
    </script>
    <script src="../assets/js/showonscroll.js"></script>
</body>

</html>