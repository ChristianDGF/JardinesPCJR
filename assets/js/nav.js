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