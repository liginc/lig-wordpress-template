// vewport-extraを有効にする場合はコメントアウト消してね
// import './module/viewport'

import Menu from './module/menu'
import SmoothScroll from './module/smooth-scroll'

window.addEventListener('load', function () {

    //smooth scroll
    new SmoothScroll().clickEvent()

    //menu
    new Menu()
});