const hamburger = document.querySelector('#hamburger');
const header = document.querySelector('#main-header');
let showing = false;

hamburger.addEventListener('click', function () {
    if (showing) {
        header.classList.remove('open');
    } else {
        header.classList.add('open');
    }

    showing = !showing;
});

const carosel = document.querySelector('#project-carosel');
if (carosel) {
    const dots = carosel.querySelectorAll('.nav-dots .dot');
    dots.forEach((dot) => {
        dot.addEventListener('click', (e) => {
            e.preventDefault();
            e.stopPropagation();

            const index = dot.getAttribute('data-index');
            const isActive = dot.classList.contains('active');

            if (isActive) {
                return true;
            }

            const activeDot = carosel.querySelector('.nav-dots .active');
            activeDot.classList.remove('active');
            dot.classList.add('active');

            const activeProject = carosel.querySelector('.project.active');
            activeProject.classList.remove('active');

            const newProject = carosel.querySelector('#project-' + index);
            newProject.classList.add('active');

            const activeBackdrop = carosel.querySelector('.backdrop.active');
            activeBackdrop.classList.remove('active');

            const newBackdrop = carosel.querySelector('#backdrop-' + index);
            newBackdrop.classList.add('active');

            return false;
        });
    })
}
