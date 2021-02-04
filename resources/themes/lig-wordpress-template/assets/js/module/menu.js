const $hamburger = document.getElementById('hamburger');
const $headerMenu = document.getElementById('header-menu');

export default class Menu {
    constructor() {
        $hamburger.addEventListener('click',(e)=>{
            if ($headerMenu.classList.contains('is-open')) {
                $headerMenu.classList.remove('is-open');
                $hamburger.classList.remove('is-open');
            } else {
                $headerMenu.classList.add('is-open');
                $hamburger.classList.add('is-open');
            }
            e.preventDefault();
        });
    }
}