const $burger = document.getElementById('burger');
const $headerMenu = document.getElementById('header-menu');

export default class Menu {
    constructor() {
        $burger.addEventListener('click',(e)=>{
            if ($headerMenu.classList.contains('is-open')) {
                $headerMenu.classList.remove('is-open');
                $burger.classList.remove('is-open');
            } else {
                $headerMenu.classList.add('is-open');
                $burger.classList.add('is-open');
            }
            e.preventDefault();
        });
    }
}