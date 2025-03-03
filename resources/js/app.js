import './bootstrap';
    let scrolled = false;

    window.addEventListener('scroll', function () {
        const header = document.querySelector('.header');
        if (window.scrollY > 50 && !scrolled) {
            header.classList.add('animate');
            scrolled = true; // Evita que se dispare repetidamente
        } else if (window.scrollY <= 50 && scrolled) {
            header.classList.remove('animate');
            scrolled = false;
        }
    });
