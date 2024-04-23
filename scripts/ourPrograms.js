window.addEventListener('DOMContentLoaded', initApp)

const ourProgramsDiv = document.querySelector('.our-programs')
const content = document.querySelector('.our-programs .content')
const imgDivs = document.querySelectorAll('.our-programs .img')

// let lastScrollTop = ourProgramsDiv.offsetTop + content.offsetTop
let lastScrollTop = 0
let curentDiv = content

while (curentDiv) {
    if (typeof (curentDiv.offsetTop) !== 'number') break



    lastScrollTop += curentDiv.offsetTop

    curentDiv = curentDiv.parentNode
}

lastScrollTop -= document.querySelector('main').offsetTop

let totalScroll = 0

let x1, x2, y1, y2, currImgDiv, breakAmount, centerTop
content.style.paddingTop = `${centerTop}px`

window.addEventListener('scroll', () => {
    pauseImgDivs()

    if (content.getBoundingClientRect().top >= centerTop) return

    if (content.getBoundingClientRect().bottom <= window.innerHeight) {
        // totalScroll = 1300
        return
    }

    const currentScrollTop = window.scrollY

    const scrollDirection = currentScrollTop > lastScrollTop ? 'down' : 'up'

    // Calculate the scroll distance since last scroll event
    const scrollDistance = Math.abs(currentScrollTop - lastScrollTop)

    if (scrollDirection === 'down') {
        totalScroll += scrollDistance
    } else {
        totalScroll -= scrollDistance
    }

    let scrollPercentage = ((scrollDistance * 100) / breakAmount)



    // Calculate the amount to adjust clip path based on scroll distance
    // const clipAdjustment = scrollDistance * 0.1; // Adjust this value as needed

    // Calculate the new clip path based on scroll direction
    let newClipPath;

    if (scrollDirection === 'down') {
        x1 -= scrollPercentage
        x2 -= scrollPercentage
        y1 -= scrollPercentage
        y2 -= scrollPercentage

        newClipPath = `polygon(
            0% 0%, 
            0% 0%, 
            100% 0%, 
            100% 0%, 
            ${(x1)}% ${(y1)}%, 
            ${(x2)}% ${(y2)}%, 
            0% 100%, 
            0% 100%
        )`
    } else {
        x1 += scrollPercentage
        x2 += scrollPercentage
        y1 += scrollPercentage
        y2 += scrollPercentage

        newClipPath = `polygon(
            0% 0%, 
            0% 0%, 
            100% 0%, 
            100% 0%, 
            ${(x1)}% ${(y1)}%, 
            ${(x2)}% ${(y2)}%, 
            0% 100%, 
            0% 100%
        )`
    }

    if (totalScroll <= (breakAmount)) {

        if (currImgDiv === 1) {
            if (scrollDirection === 'down') {

                setHighest()
                foldsingle(imgDivs[1])
            }
            else {

                unfoldsingle(imgDivs[1])
                setLowest()
            }
        }

        imgDivs[2].style.clipPath = newClipPath

        currImgDiv = 0
    }
    else if (totalScroll <= (breakAmount * 2)) {

        if (currImgDiv === 0) {
            if (scrollDirection === 'down') {
                setHighest()
                // foldsingle(imgDivs[0])
            }
            else {
                setLowest()
                // unfoldsingle(imgDivs[0])
            }
        }

        imgDivs[1].style.clipPath = newClipPath

        currImgDiv = 1
    }
    else {

        // if (currImgDiv === 1) {
        //     if (scrollDirection === 'down') {
        //         setHighest()
        //         foldsingle(imgDivs[1])
        //     }
        //     else {
        //         setLowest()
        //         unfoldsingle(imgDivs[1])
        //     }
        // }
        // imgDivs[0].style.clipPath = newClipPath

        // currImgDiv = 2
    }

    // Update last scroll position for the next scroll event
    lastScrollTop = currentScrollTop
})

function setHighest() {
    x1 = 100
    x2 = 100
    y1 = 100
    y2 = 100
}

function setLowest() {
    x1 = 0
    x2 = 0
    y1 = 0
    y2 = 0
}

function pauseImgDivs() {

    if (content.getBoundingClientRect().bottom <= window.innerHeight || content.getBoundingClientRect().top >= 0) {

        for (const imgdiv of imgDivs) {
            imgdiv.style.position = 'absolute'
            imgdiv.style.top = `unset`
            imgdiv.style.right = `0`
            imgdiv.style.bottom = `0`

            if (content.getBoundingClientRect().top >= 0) {
                imgdiv.style.bottom = `unset`
                imgdiv.style.top = `0`
            }

            if (content.getBoundingClientRect().bottom <= window.innerHeight) {
                foldAll()
            } else if (content.getBoundingClientRect().top >= 0) {
                unfoldAll()
            }
        }
    } else if (content.getBoundingClientRect().top <= 0) {
        for (const imgdiv of imgDivs) {
            imgdiv.style.position = 'fixed'
            imgdiv.style.top = `${centerTop}px`
            imgdiv.style.right = `${(content.offsetLeft)}px`
        }
    }
}

function unfoldsingle(imgDiv) {
    imgDiv.style.clipPath = `polygon(
        0% 0%, 
        0% 0%, 
        100% 0%, 
        100% 0%,
        100% 100%,
        100% 100%,
        0% 100%,
        0% 100%
        )`
}

function foldsingle(imgDiv) {
    imgDiv.style.clipPath = `polygon(
        0% 0%, 
        0% 0%, 
        100% 0%, 
        100% 0%,
        0% 0%,
        0% 0%,
        0% 100%,
        0% 100%
    )`
}

function unfoldAll() {
    for (let i = 1; i < imgDivs.length; i++) {
        const imgDiv = imgDivs[i]



        imgDiv.style.clipPath = `polygon(
        0% 0%, 
        0% 0%, 
        100% 0%, 
        100% 0%,
        100% 100%,
        100% 100%,
        0% 100%,
        0% 100%
        )`
    }
}

function foldAll() {
    for (let i = 1; i < imgDivs.length; i++) {
        const imgDiv = imgDivs[i]



        imgDiv.style.clipPath = `polygon(
        0% 0%, 
        0% 0%, 
        100% 0%, 
        100% 0%,
        0% 0%,
        0% 0%,
        0% 100%,
        0% 100%
        )`
    }
}

function initApp() {
    setHighest()
    breakAmount = imgDivs[0].offsetHeight
    centerTop = (window.innerHeight - imgDivs[0].offsetHeight) / 2
}