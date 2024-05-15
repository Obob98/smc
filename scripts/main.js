window.addEventListener('DOMContentLoaded', () => {
    if (typeof initApp === 'undefined') return
    initApp()
})

let checkHeader = true

const header = document.querySelector('header')
const fixedNav = document.querySelector('nav.fixed')
const menuBtn = document.querySelector('nav.mobile ') || document.createElement('div')

const themeDiv = document.querySelector('.floater')
const themes = document.querySelector('.themes');
const profile = document.querySelector('nav.fixed .profile');
const themeToggle = document.querySelector('.themes > button');
const currentTheme = document.querySelector('.themes > p');

const searchInput = document.querySelector('.floater input')
const searchImg = document.querySelector('.floater .img')

// task one
let darkMode = true;
let lastScrollTop2

window.addEventListener('scroll', e => {

    positionNav(e)

})

menuBtn.addEventListener('click', function () {
    const ul = document.querySelector('.mobile ul')
    console.log({ ul })

    if (ul.style.display === 'block') {
        ul.style.display = 'none'
    } else {
        ul.style.display = 'block'
    }
})

themeToggle.addEventListener('click', setDarkmode);

searchImg.addEventListener('click', () => {
    themeDiv.style.flexDirection = 'row'
    themeToggle.style.display = 'none'
    searchInput.focus()
    openInput()
})

let timer

searchInput.addEventListener('keyup', e => {
    if (timer) clearTimeout(timer)

    const value = e.target.value
    if (value?.length) {
        timer = setTimeout(() => {
            window.location.href = './search.php?value=' + value
        }, 500)
    }
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

function positionNav(e) {

    headerPosition = header.getBoundingClientRect().bottom

    const currentScrollTop = window.scrollY
    const scrollDirection = currentScrollTop > lastScrollTop2 ? 'down' : 'up'

    const rightmost = document.querySelector('.rightmost')

    if (headerPosition < 0 && scrollDirection === 'up') {

        if (checkHeader) {


            fixedNav.style.display = 'flex'

            themeDiv.removeChild(themes)
            // themeDiv.style.position = 'fixed'

            // fixedNav.children[0].insertBefore(themes, profile)
            rightmost.insertBefore(themes, rightmost.children[0])

        }
        checkHeader = false
    } else {
        fixedNav.style.display = 'none'

        if (!checkHeader) {
            rightmost.removeChild(themes)
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