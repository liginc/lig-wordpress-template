import smoothscroll from 'smoothscroll-polyfill';

const buttons = [...document.querySelectorAll('a[href^="#"]')];

const $header = document.getElementById('header');

export default class smoothScroll {
    constructor() {

        smoothscroll.polyfill();

        this.smoothScroll = e => {

            const target = document.querySelector(e.currentTarget.getAttribute('href'));
            const position = target.getBoundingClientRect().top + window.scrollY - $header.clientHeight;

            e.preventDefault();

            window.scrollTo({
                top: position,
                behavior: 'smooth'
            });
        }
    }

    clickEvent() {
        buttons.forEach(button => {
            button.addEventListener('click', this.smoothScroll);
        })
    }
}