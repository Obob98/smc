window.addEventListener('DOMContentLoaded', () => {
    initApp()
})

let checkHeader = true

const header = document.querySelector('header')
// const headerLogo = document.querySelector('.logo')

const themeDiv = document.querySelector('.floater')
const themeToggle = document.querySelector('.themes > button');
const currentTheme = document.querySelector('.themes > p');

const searchInput = document.querySelector('.floater input')
const searchImg = document.querySelector('.floater .img')

const testimonialCards = document.querySelectorAll('.feedback .card')
const testimonialCardsDots = document.querySelectorAll('.feedback .dots > div')

// task one
let darkMode = true;


window.addEventListener('scroll', e => {
    // positionThemeDiv(e)
})

themeToggle.addEventListener('click', setDarkmode);

searchImg.addEventListener('click', () => {
    themeDiv.style.flexDirection = 'row'
    themeToggle.style.display = 'none'
    searchInput.focus()
    openInput()
})

searchInput.addEventListener('blur', () => {
    const isThemeDivFixed = themeDiv.classList.contains('fixed')

    if (!isThemeDivFixed) {
        themeDiv.style.flexDirection = 'column'
        themeToggle.style.display = 'block'
        closeInput()
    }
})

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

    headerPosition = header.getBoundingClientRect().bottom

    if (headerPosition < 0) {

        if (checkHeader) {
            // headerLogo.classList.add('fixed')
            // headerLogo.classList.add('glass')

            themeDiv.classList.add('fixed')
            themeDiv.classList.add('container')
            themeDiv.style.top = '16px'
            themeDiv.style.bottom = 'unset'
            themeDiv.style.right = 'unset'
            themeDiv.style.flexDirection = 'row'

            // searchInput.parentNode.classList.add('absolute-center')

            openInput()

        }
        checkHeader = false
    }
    else {
        // headerLogo.classList.remove('fixed')
        // headerLogo.classList.remove('glass')

        themeDiv.classList.remove('fixed')
        themeDiv.classList.remove('container')
        themeDiv.style.top = 'unset'
        themeDiv.style.bottom = '16px'
        themeDiv.style.right = '16px'
        themeDiv.style.flexDirection = 'column'

        // searchInput.parentNode.classList.remove('absolute-center')

        closeInput()

        checkHeader = true
    }
}

function openInput() {
    searchInput.style.width = '400px'
    searchInput.style.opacity = '1'
    searchImg.style.display = 'none'
}

function closeInput() {
    searchInput.style.width = '0px'
    searchInput.style.opacity = '0'
    searchImg.style.display = 'inline-block'
}



let curr = 0
let testimonialCardsAnimationInterval

function addFlexOne(element) {
    element.style.flex = '1'
}

function removeFlex(element) {
    element.style.flex = 'none'
}

function focusTestimonialCard(i) {
    clearInterval(testimonialCardsAnimationInterval)
    curr = i
    testimonialCardsAnimation()

    testimonialCardsAnimationInterval = setInterval(() => {
        testimonialCardsAnimation()
    }, 5000);
}

testimonialCards.forEach((testimonialCard, i) => {
    testimonialCard.addEventListener('click', () => {
        focusTestimonialCard(i)
    })
})

testimonialCardsDots.forEach((testimonialCardsDot, i) => {
    testimonialCardsDot.addEventListener('click', () => {
        focusTestimonialCard(i)
    })
})

function testimonialCardsAnimation() {
    for (let i = 0; i < testimonialCards.length; i++) {
        addFlexOne(testimonialCards[i])
        testimonialCards[i].classList.add('img-only')
        testimonialCardsDots[i].classList.remove('active')
    }

    testimonialCards[curr].classList.remove('img-only')
    testimonialCardsDots[curr].classList.add('active')
    removeFlex(testimonialCards[curr])
    if (curr === testimonialCards.length - 1) {
        curr = 0
    } else {
        curr++
    }
}


function initApp() {
    console.log('initiating app')

    testimonialCardsAnimation()

    testimonialCardsAnimationInterval = setInterval(() => {
        testimonialCardsAnimation()
    }, 5000);
}