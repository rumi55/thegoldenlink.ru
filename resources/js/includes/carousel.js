import {tns} from 'tiny-slider/src/tiny-slider';

document.querySelectorAll('.carousel').forEach(element => {
    const reviews = tns(Object.assign({
        container: element.querySelector('.carousel__list'),
        controlsContainer: element.querySelector('.carousel__controls'),
        nav: true,
        autoplay: false,
        mouseDrag: true,
        slideBy: 'page',
        loop: false,
        lazyload: true,
        gutter: 20,
        controlsPosition: 'bottom',
        navPosition: 'bottom',

        responsive: {
            768: {
                items: 4,
                nav: false,
            }
        }
    }, JSON.parse(element.dataset.carousel || '{}')));

    reviews.events.on('indexChanged', function (event) {
        let left = null;
        let currentLeft = event.navContainer.querySelector('button').style.marginLeft.replace(/\D+/g, '') || 0;

        if (event.index > 2) {
            left = -(event.index * 20 - 5) + 'px'
        }

        if (Number(currentLeft) > 5 && event.index <= 2) {
            left = 5 + 'px';
        }

        if (left !== null) {
            event.navContainer.querySelector('button').style.marginLeft = left;
        }
    });
});
