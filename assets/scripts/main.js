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