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

let checkHeader = true

window.addEventListener('scroll', e => {
    themeDiv = themeToggle.parentNode.parentNode
    header = document.querySelector('header')
    headerPosition = header.getBoundingClientRect().bottom


    if (headerPosition < 0) {
        console.log('setting themer position')
        console.log(themeDiv)
        if (checkHeader) {
            console.log('setting success')
            themeDiv.classList.add('fixed')
            themeDiv.style.top = '16px'
            themeDiv.style.bottom = 'unset'
        }
        checkHeader = false
    }
    else {
        console.log('unsetting success')
        themeDiv.classList.remove('fixed')
        themeDiv.style.top = 'unset'
        themeDiv.style.bottom = '16px'
        checkHeader = true
    }
})

function initApp() {

}

