let openMenuBtn = document.querySelector('.mobile-menu__open');
let closeMenuBtn = document.querySelector('.mobile-menu__close');
let menu = document.querySelector('.mobile-menu');
let menuOverlay = document.querySelector('.mobile-menu__overlay');

openMenuBtn.addEventListener('click', function () {
    menu.style.right = '0';
    menuOverlay.style.right = '85%';
})

closeMenuBtn.addEventListener('click', function () {
    menu.style.right = '-100%';
    menuOverlay.style.right = '-85%';
})

menuOverlay.addEventListener('click', function () {
    menu.style.right = '-100%';
    menuOverlay.style.right = '-85%';
})
