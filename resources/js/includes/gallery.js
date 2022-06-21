import { tns } from 'tiny-slider/src/tiny-slider';

let galleryHave = document.querySelectorAll("div.gallery");

if(galleryHave.length !== 0) {
    const gallery = tns({
        container: '.gallery__main',
        navContainer: '.gallery__thumbs',
        controlsContainer: '.gallery__controls',
        navAsThumbnails: true,
        controls: true,
        items: 1,
        autoplay: false,
        mouseDrag: true,
        slideBy: 'page',
        loop: false,
        lazyload: false,
        autoHeight: true,
        gutter: 0,
        controlsPosition: 'bottom',
        navPosition: 'bottom',
    });

    const thumbs = tns({
        container: '.gallery__thumbs',
        items: 4,
        autoplay: false,
        mouseDrag: true,
        slideBy: 'page',
        loop: false,
        lazyload: false,
        autoHeight: false,
        gutter: 0,
        nav: false,
        controls: false,
    });

    gallery.events.on('indexChanged', function (event) {
        thumbs.goTo(event.index);
    });
}


