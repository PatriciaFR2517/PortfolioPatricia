window.addEventListener('scroll', function() {
    var sections = document.querySelectorAll('section');
    var navLinks = document.querySelectorAll('.sidebar ul li a');
  
    sections.forEach(function(section, index) {
      var sectionTop = section.offsetTop;
      var sectionHeight = section.clientHeight;
      if (pageYOffset >= sectionTop - 50 && pageYOffset < sectionTop + sectionHeight - 50) {
        navLinks[index].classList.add('active');
      } else {
        navLinks[index].classList.remove('active');
      }
    });
  });

const changeThemeButton = document.getElementById('cambiarTema');
let darkMode = false;

changeThemeButton.addEventListener('click', function() {
    const root = document.documentElement;

    if (!darkMode) {
        root.style.setProperty('--color-primario', '#232323'); // Cambia el color principal a uno más oscuro
        root.style.setProperty('--color-secundario', '#585858'); // Cambia el color secundario a uno más oscuro
        // Aquí puedes cambiar otros colores si lo necesitas

        darkMode = true; // Cambia el estado a modo oscuro
    } else {
        root.style.setProperty('--color-primario', '#5E72E4'); // Restaura el color principal original
        root.style.setProperty('--color-secundario', '#F9A825'); // Restaura el color secundario original
        // Restaura otros colores si los modificaste anteriormente

        darkMode = false; // Cambia el estado a modo claro
    }
});
function toggleMenu() {
  const sidebar = document.querySelector('nav.sidebar');
  sidebar.classList.toggle('show');
}
