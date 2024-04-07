// Show scrollbar on scroll
// document.addEventListener('scroll', function () {
//     this.style.scrollbarWidth = 'auto';
// });


const themeToggle = document.querySelector('.themes > button');
const currentTheme = document.querySelector('.themes > p');
let darkMode = true;

const setDarkmode = () => {
    darkMode = !darkMode;
    if (darkMode) {
        document.documentElement.style.setProperty('--color-bg-base', '#000');
        document.documentElement.style.setProperty('--color-txt-base', '#fff');
        currentTheme.innerText = 'dark'
        currentTheme.style.color = '#fff'
        currentTheme.parentNode.style.background = '#ffffff20'
    } else {
        document.documentElement.style.setProperty('--color-bg-base', '#fff');
        document.documentElement.style.setProperty('--color-txt-base', '#000');
        currentTheme.innerText = 'light'
        currentTheme.style.color = '#000'
        currentTheme.parentNode.style.background = '#00000020'
    }

}

themeToggle.addEventListener('click', setDarkmode);

window.addEventListener('DOMContentLoaded', () => {
    initApp()
})

function initApp() {

}

