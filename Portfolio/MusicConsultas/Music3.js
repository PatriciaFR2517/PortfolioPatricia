const changeThemeButton = document.getElementById('cambiarTema');
let darkMode = false;

changeThemeButton.addEventListener('click', function() {
    const root = document.documentElement;

    if (!darkMode) {
        root.style.setProperty('--color-primario', '#232323'); 
        root.style.setProperty('--color-secundario', '#585858');

        darkMode = true;
    } else {
        root.style.setProperty('--color-primario', '#5E72E4'); 
        root.style.setProperty('--color-secundario', '#F9A825'); 

        darkMode = false;
    }
});
