window.addEventListener('DOMContentLoaded', () => {
    initApp()
})

let checkHeader = true

const header = document.querySelector('header')
const fixedNav = document.querySelector('nav.fixed')

const themeDiv = document.querySelector('.floater')
const themes = document.querySelector('.themes');
const themeToggle = document.querySelector('.themes > button');
const currentTheme = document.querySelector('.themes > p');

const searchInput = document.querySelector('.floater input')
const searchImg = document.querySelector('.floater .img')

const testimonialCards = document.querySelectorAll('.feedback .card')
const testimonialCardsDots = document.querySelectorAll('.feedback .dots > div')

// task one
let darkMode = true;
let lastScrollTop2

window.addEventListener('scroll', e => {

    positionThemeDiv(e)

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
        document.documentElement.style.setProperty('--color-bg-secondary', '#0c1013');
        document.documentElement.style.setProperty('--color-accent', '#6d4bbb');
        document.documentElement.style.setProperty('--color-secondary', '#D8D9DA');
        document.documentElement.style.setProperty('--color-text-primary', '#FFF6E0');

        currentTheme.innerText = 'dark'
        currentTheme.style.color = '#fff'
        currentTheme.parentNode.style.background = '#ffffff20'
    } else {
        document.documentElement.style.setProperty('--color-bg-primary', '#bbb');
        document.documentElement.style.setProperty('--color-bg-secondary', '#ccc');
        document.documentElement.style.setProperty('--color-accent', '#000');
        document.documentElement.style.setProperty('--color-secondary', '#1F4E5F');
        document.documentElement.style.setProperty('--color-text-primary', '#111119');

        currentTheme.innerText = 'light'
        currentTheme.style.color = '#000'
        currentTheme.parentNode.style.background = '#00000070'
    }
}

function positionThemeDiv(e) {

    headerPosition = header.getBoundingClientRect().bottom

    const currentScrollTop = window.scrollY
    const scrollDirection = currentScrollTop > lastScrollTop2 ? 'down' : 'up'


    if (headerPosition < 0 && scrollDirection === 'up') {

        if (checkHeader) {

            fixedNav.style.display = 'flex'

            themeDiv.removeChild(themes)
            fixedNav.children[0].appendChild(themes)

        }
        checkHeader = false
    }
    else {
        fixedNav.style.display = 'none'

        if (!checkHeader) {
            fixedNav.children[0].removeChild(themes)
            themeDiv.appendChild(themes)
        }

        checkHeader = true
    }
    lastScrollTop2 = currentScrollTop
}

function openInput() {
    searchInput.parentNode.parentNode.style.flexDirection = 'row'
    searchInput.style.width = '400px'
    searchInput.style.opacity = '1'
    searchImg.style.display = 'none'
}

function closeInput() {
    searchInput.parentNode.parentNode.style.flexDirection = 'column'
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
    if (!testimonialCards.length) return
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

    testimonialCardsAnimation()

    testimonialCardsAnimationInterval = setInterval(() => {
        testimonialCardsAnimation()
    }, 5000);
}