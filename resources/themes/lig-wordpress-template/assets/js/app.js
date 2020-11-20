import LazyLoad from 'lazyload';
import ViewportExtra from 'viewport-extra';
import Menu from './module/menu';
import SmoothScroll from './module/smooth-scroll';

new ViewportExtra(375)

(function () {
    var ua = navigator.userAgent

    var sp = ua.indexOf('iPhone') > -1 ||
        (ua.indexOf('Android') > -1 && ua.indexOf('Mobile') > -1)

    var tab = !sp && (
        ua.indexOf('iPad') > -1 ||
        (ua.indexOf('Macintosh') > -1 && 'ontouchend' in document) ||
        ua.indexOf('Android') > -1
    )

    if (tab) new ViewportExtra(1024)
})()

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