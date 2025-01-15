const mapa = document.querySelector('.ubicacion .mapa');
const tipologias = document.querySelector('.tipologias');

document.addEventListener('DOMContentLoaded', function () {

    navegacionResponsive();
    proyectosScroll();
    mostrarImagen();
    iniciarSlider();
    formContacto();
    if (mapa) {
        mostrarMapa();
    }
    if (tipologias) {
        mostrarTipologias();
    }
});

function navegacionResponsive() {
    const menuToggle = document.querySelector('.menu-toggle');
    const menuMovil = document.querySelector('.menu-movil');
    const body = document.body;

    // Mueve la lógica de alternar clases a una función separada para mayor claridad
    const toggleMenu = () => {
        const isMenuActive = menuMovil.classList.contains('active');
        const isOverflowHidden = body.classList.contains('overflow-hidden');

        if (isMenuActive && isOverflowHidden) {
            menuMovil.classList.remove('active');
            body.classList.remove('overflow-hidden');
        } else {
            menuMovil.classList.add('active');
            body.classList.add('overflow-hidden');
        }
    };

    menuToggle.addEventListener('click', () => {
        const barra1 = document.querySelector('.menu-toggle__barra1');
        const barra2 = document.querySelector('.menu-toggle__barra2');
        const barra3 = document.querySelector('.menu-toggle__barra3');

        barra1.classList.toggle('activo');
        barra2.classList.toggle('activo');
        barra3.classList.toggle('activo');

        toggleMenu();
    });
}

function manejoMenuDesplegable() {
    document.addEventListener('click', function (e) {
        const navegacionPrincipal = document.querySelector('.navegacion-principal');
        const menuMovil = document.querySelector('.menu-movil');

        if (!navegacionPrincipal.contains(e.target) && !menuMovil.contains(e.target)) {
            if (navegacionPrincipal.classList.contains('mostrar')) {
                navegacionPrincipal.classList.remove('mostrar');
                const icono = document.querySelector('.menu-movil img');
                icono.src = 'build/img/menu.svg';
            }
        }
    });
}

function proyectosScroll() {
    const btnProyectos = document.querySelector('.contenido-header a');

    if (btnProyectos) {
        btnProyectos.addEventListener('click', e => {
            e.preventDefault();

            const proyectosSeccion = document.querySelector('#proyectos');

            proyectosSeccion.scrollIntoView({ behavior: 'smooth' });
        });
    }
};

function mostrarImagen() {
    const body = document.body;

    document.querySelectorAll('img.imagen-galeria').forEach(imagen => {
        imagen.addEventListener('click', () => {
            const modal = crearModal(imagen.src);
            body.appendChild(modal);
            body.classList.add('overflow-hidden');
        });
    });
}

function crearModal(rutaImagen) {
    const modal = document.createElement('div');
    modal.classList.add('modal');
    modal.onclick = cerrarModal;

    const img = document.createElement('img');
    img.src = rutaImagen;
    modal.appendChild(img);

    const btnCerrar = document.createElement('p');
    btnCerrar.textContent = 'X';
    btnCerrar.classList.add('btnCerrar');
    btnCerrar.onclick = cerrarModal;
    modal.appendChild(btnCerrar);

    return modal;
}

function cerrarModal() {
    const modal = document.querySelector('.modal');
    modal.classList.add('fade-out');

    setTimeout(() => {
        modal?.remove();
        const body = document.querySelector('body');
        body.classList.remove('overflow-hidden');
    }, 500);
}

function crearSlider(sliderContainer) {
    const slides = sliderContainer.querySelectorAll('.slide');
    const nextBtn = sliderContainer.querySelector('.nextBtn');
    const prevBtn = sliderContainer.querySelector('.prevBtn');
    let currentIndex = 0;
    const autoplayInterval = 3000; // Intervalo en milisegundos (3 segundos)

    // Mostrar la diapositiva actual
    function showSlide(index) {
        slides.forEach((slide, i) => {
            slide.style.display = (i === index) ? 'block' : 'none';
        });
    }

    // Función para mostrar la siguiente diapositiva
    function showNextSlide() {
        currentIndex = (currentIndex + 1) % slides.length;
        showSlide(currentIndex);
    }

    // Función para mostrar la diapositiva anterior
    function showPrevSlide() {
        currentIndex = (currentIndex - 1 + slides.length) % slides.length;
        showSlide(currentIndex);
    }

    // Asignar eventos a los botones
    nextBtn.addEventListener('click', showNextSlide);
    prevBtn.addEventListener('click', showPrevSlide);

    // Inicializar la primera diapositiva
    showSlide(currentIndex);

    // Funcionalidad de autoplay
    const autoplay = setInterval(showNextSlide, autoplayInterval);

    // Detener el autoplay si el usuario interactúa con los botones
    nextBtn.addEventListener('click', () => {
        clearInterval(autoplay);
    });

    prevBtn.addEventListener('click', () => {
        clearInterval(autoplay);
    });
}

function iniciarSlider() {
    // Inicializar sliders para todos los contenedores con la clase .slider-container
    document.querySelectorAll('.contenedor-slider').forEach(sliderContainer => {
        crearSlider(sliderContainer);
    });
}

function formContacto() {
    const btnAyuda = document.querySelector('.boton-ayuda');
    const formContacto = document.querySelector('.form-contactar');
    const btnCerrar = document.querySelector('.btn-cerrar');

    if (!btnAyuda || !formContacto || !btnCerrar) return;

    const toggleFormContacto = () => formContacto.classList.toggle('activo');

    const closeFormContacto = () => formContacto.classList.remove('activo');

    btnAyuda.addEventListener('click', toggleFormContacto);
    btnCerrar.addEventListener('click', closeFormContacto);
}

function mostrarMapa() {
    const map = L.map('map').setView([4.631430, -74.465675], 15);

    // Cargar el mapa de OpenStreetMap
    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '© OpenStreetMap contributors'
    }).addTo(map);

    L.control.scale({ imperial: true, metric: true }).addTo(map);

    // Agregar un marcador en el mapa
    const marker = L.marker([4.6314, -74.4622]).addTo(map);
    marker.bindPopup("<b>Hola!</b><br>Conjunto Residencial Macondo Sunset").openPopup();
}

function mostrarTipologias() {
    const btnTipo1 = document.querySelector('#tipo1');
    const tipologia1 = document.querySelector('.tipologia1')
    const btnTipo2 = document.querySelector('#tipo2');
    const tipologia2 = document.querySelector('.tipologia2');

    tipologia1.style.display = 'flex';

    btnTipo1.addEventListener('click', () => {
        tipologia1.style.display = 'flex';
        tipologia2.style.display = 'none';
    });

    btnTipo2.addEventListener('click', () => {
        tipologia2.style.display = 'flex';
        tipologia1.style.display = 'none';
    });


}

window.onscroll = function () {
    const scrollY = window.scrollY;
    const barraNav = document.querySelector('.barra');

    if (scrollY > 500) {
        barraNav.classList.add('fixed-top');
    } else {
        barraNav.classList.remove('fixed-top');
    }
}