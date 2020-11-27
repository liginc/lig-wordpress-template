import LazyLoad from 'lazyload';
import ViewportExtra from 'viewport-extra';
import Menu from './module/menu';
import SmoothScroll from './module/smooth-scroll';

new ViewportExtra(375)

window.addEventListener('load', function () {
    //Lazyload
    if (!('loading' in HTMLImageElement.prototype)) {
        new LazyLoad(document.querySelectorAll('img[loading="lazy"]'))
    }

    //smooth scroll
    new SmoothScroll().clickEvent()

    //menu
    new Menu()

});