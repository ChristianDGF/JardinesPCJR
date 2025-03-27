<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PCJR | FAQ</title>
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
        <img class="imgsec1" src="../assets/images/DSC_0636.JPG" />
        <h1>FAQ</h1>
    </div>

    <div class="faq-section">
        <h2 class="tituloh2">Preguntas más Frecuentes</h2>
        <div class="faq">
            <div class="faq-item" onclick="toggleAnswer(event)">
                <i class="far fa-circle"></i>
                Como puede actualizar mis datos?
            </div>
            <div class="faq-answer">
                Puede actualizar sus datos accediendo a su cuenta y seleccionando la opción "Actualizar datos".
            </div>
            <div class="faq-item" onclick="toggleAnswer(event)">
                <i class="far fa-circle"></i>
                Como puedo consultar mi balance?
            </div>
            <div class="faq-answer">
                Puede consultar su balance en la sección "Mi cuenta" después de iniciar sesión.
            </div>
            <div class="faq-item" onclick="toggleAnswer(event)">
                <i class="far fa-circle"></i>
                Puedo realizar pagos en línea?
            </div>
            <div class="faq-answer">
                Sí, puede realizar pagos en línea a través de nuestra plataforma segura.
            </div>
            <div class="faq-item" onclick="toggleAnswer(event)">
                <i class="far fa-circle"></i>
                Que otros métodos de pago disponen?
            </div>
            <div class="faq-answer">
                Aceptamos tarjetas de crédito, débito y transferencias bancarias.
            </div>
            <div class="faq-item" onclick="toggleAnswer(event)">
                <i class="far fa-circle"></i>
                Cuanto cuesta el servicio?
            </div>
            <div class="faq-answer">
                El costo del servicio varía según el plan seleccionado. Consulte nuestra página de precios para más detalles.
            </div>
            <div class="faq-item" onclick="toggleAnswer(event)">
                <i class="far fa-circle"></i>
                Como encuentro a mi conocido?
            </div>
            <div class="faq-answer">
                Puede buscar a su conocido utilizando la función de búsqueda en nuestra página principal.
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
            const answer = event.currentTarget.nextElementSibling;
            if (answer.style.display === "none" || answer.style.display === "") {
                answer.style.display = "block";
            } else {
                answer.style.display = "none";
            }
        }
    </script>
</body>

</html>