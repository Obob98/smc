window.addEventListener('DOMContentLoaded', () => {
    initApp()
})

let checkHeader = true
let checkWhyUs = true

const themeToggle = document.querySelector('.themes > button');
const currentTheme = document.querySelector('.themes > p');

const whyUsSectionDiv = document.getElementById('why-us');
const toWhyUsButton = document.getElementById('towhyus')
const whyUsCards = document.querySelector('main section.why-us .container .cards')

// task one
let darkMode = true;


window.addEventListener('scroll', e => {
    positionThemeDiv(e)
})


themeToggle.addEventListener('click', setDarkmode);

function setDarkmode() {
    darkMode = !darkMode;
    if (darkMode) {
        document.documentElement.style.setProperty('--color-bg-primary', '#272829');
        document.documentElement.style.setProperty('--color-bg-secondary', '#1E293B');
        document.documentElement.style.setProperty('--color-accent', '#79A8A9');
        document.documentElement.style.setProperty('--color-secondary', '#D8D9DA');
        document.documentElement.style.setProperty('--color-text-primary', '#FFF6E0');

        currentTheme.innerText = 'dark'
        currentTheme.style.color = '#fff'
        currentTheme.parentNode.style.background = '#ffffff20'
    } else {
        document.documentElement.style.setProperty('--color-bg-primary', '#AACFD0');
        document.documentElement.style.setProperty('--color-bg-secondary', '#F4F7F7');
        document.documentElement.style.setProperty('--color-accent', '#5a8383');
        document.documentElement.style.setProperty('--color-secondary', '#1F4E5F');
        document.documentElement.style.setProperty('--color-text-primary', '#111119');

        currentTheme.innerText = 'light'
        currentTheme.style.color = '#000'
        currentTheme.parentNode.style.background = '#00000020'
    }
}

function positionThemeDiv(e) {
    themeDiv = themeToggle.parentNode.parentNode
    header = document.querySelector('header')
    headerPosition = header.getBoundingClientRect().bottom

    if (headerPosition < 0) {

        if (checkHeader) {
            themeDiv.classList.add('fixed')
            themeDiv.style.top = '16px'
            themeDiv.style.bottom = 'unset'
        }
        checkHeader = false
    }
    else {

        themeDiv.classList.remove('fixed')
        themeDiv.style.top = 'unset'
        themeDiv.style.bottom = '16px'
        checkHeader = true
    }
}

function positionWhyUsDiv(e) {
    let whyUsSectionDivCurrentPosition = whyUsSectionDiv.getBoundingClientRect().top



    if (whyUsSectionDivCurrentPosition <= 0) {



        // document.body.style.overflow = 'hidden'

        // toWhyUsButton.click()

        // if (checkHeader) {
        // whyUsSectionDiv.classList.add('fixed')
        // whyUsSectionDiv.style.top = '0px'
        // themeDiv.style.bottom = 'unset'
        // }
        // checkHeader = false
    }
    else {

        themeDiv.classList.remove('fixed')
        themeDiv.style.top = 'unset'
        themeDiv.style.bottom = '16px'
        checkHeader = true
    }
}








function initApp() {

}




