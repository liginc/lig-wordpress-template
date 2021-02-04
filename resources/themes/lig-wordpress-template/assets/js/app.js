import './module/viewport'

import LazyLoad from 'lazyload'
import Menu from './module/menu'
import SmoothScroll from './module/smooth-scroll'

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