    const menuWithSubmenu = document.querySelector('nav ul li a[href="#"]');

        menuWithSubmenu.addEventListener('click', function(e) {
            e.preventDefault();

            const submenu = document.querySelector('.submenu');

            submenu.classList.toggle('show');
        });