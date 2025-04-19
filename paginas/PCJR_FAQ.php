<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PCJR | Ayuda</title>
    <!-- Vinculación con Archivo CSS -->
    <link rel="stylesheet" href="../assets/css/faq.css">
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
                ¿Cómo puede actualizar mis datos?
            </div>
            <div class="faq-answer">
                Puede actualizar sus datos (teléfono, dirección o correo electrónico) en la sección 'Actualizar Datos', validando sus credenciales.
            </div>
            <div class="faq-item" onclick="toggleAnswer(event)">
                <i class="far fa-circle"></i>
                ¿Cómo puedo consultar mi balance?
            </div>
            <div class="faq-answer">
                Puede consultar su saldo y movimientos recientes en la sección 'Balance y Pagos', validando sus credenciales.
            </div>
            <div class="faq-item" onclick="toggleAnswer(event)">
                <i class="far fa-circle"></i>
                ¿Puedo realizar pagos en línea?
            </div>
            <div class="faq-answer">
                Sí, puede realizar pagos en línea mediante la plataforma del Banco Popular en la sección 'Pagos y Servicios', tras validar sus credenciales.
            </div>
            <div class="faq-item" onclick="toggleAnswer(event)">
                <i class="far fa-circle"></i>
                ¿Qué otros métodos de pago disponen?
            </div>
            <div class="faq-answer">
                Además de la plataforma en línea, ofrecemos pago por llamada al (809) 555-1234, pago por WhatsApp al (809) 555-6789, Internet Banking del Banco Popular y transferencias a nuestras cuentas en Banesco, Banco Popular, Banreservas y Scotiabank.
            </div>
            <div class="faq-item" onclick="toggleAnswer(event)">
                <i class="far fa-circle"></i>
                ¿Cuánto cuesta el servicio?
            </div>
            <div class="faq-answer">
                El uso de nuestros servicios en línea no tiene costo adicional; las transacciones pueden estar sujetas a comisiones de la entidad financiera.
            </div>
            <div class="faq-item" onclick="toggleAnswer(event)">
                <i class="far fa-circle"></i>
                ¿Cómo encuentro a mi conocido?
            </div>
            <div class="faq-answer">
                Puede buscar a su conocido utilizando la función de búsqueda en nuestra página principal.
            </div>
            <div class="faq-item">
                <i class="far fa-circle"></i>
                ¿No encuentra una respuesta a su pregunta? <a href="https://wa.me/18293451020/?text=Hola%2C%20deseo%20m%C3%A1s%20informaci%C3%B3n%20sobre%20sus%20servicios.%20%C2%BFMe%20pueden%20ayudar%3F" target="_blank">Escríbanos</a>
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