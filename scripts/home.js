// why us code starts here

const theWrapper = document.querySelector('.why-us')
const stickyDiv = document.querySelector('.sticky-div')
const childrenDivs = document.querySelectorAll('.why-us .card')
const titles = document.querySelector('.why-us .wraper .content .titles')

let lastScrollY = window.scrollY
let scrollDirection = null

const childrenState = {
    child1: {
        canTranslateUp: true,
        canTranslateDown: false,
        canScale: true
    },
    child2: {
        canTranslateUp: true,
        canTranslateDown: true,
        canScale: true
    },
    child3: {
        canTranslateUp: true,
        canTranslateDown: true,
        canScale: true
    }
}

const titlesState = {
    child1: {
        canTranslateRight: false,
        canTranslateLeft: true,
    },
    child2: {
        canTranslateRight: false,
        canTranslateLeft: true,
    },
    child3: {
        canTranslateRight: false,
        canTranslateLeft: true,
    }
}

window.addEventListener('scroll', function() {
    updateScrollDirection()

    const currentScrollY = window.scrollY || window.pageYOffset
    const stickyDivPosition = stickyDiv.getBoundingClientRect()

    if (stickyDivPosition.top <= 0 || (stickyDivPosition.bottom >= this.window.innerHeight && scrollDirection === 'up')) {

        for (let i = 0; i < childrenDivs.length; i++) {
            for (let j = i; j < childrenDivs.length; j++) {
                translateCards(i, j, currentScrollY)
                    // translateTitles(i, j, currentScrollY)
            }
        }
    }

    lastScrollY = currentScrollY;
});



function translateCards(i, j, currentScrollY) {
    const childStateKey = `child${i + 1}`

    const childDiv = childrenDivs[i]
    const parentDiv = childDiv.parentNode

    const parentDivPosition = parentDiv.getBoundingClientRect().top
    const childDivPosition = childDiv.getBoundingClientRect().top

    if (scrollDirection === 'down') {
        if (childrenState[childStateKey].canTranslateUp) {

            const childDivLastTranslatedAmount = getElementLastTranslatedAmount(childDiv, 'y')

            if (childDivPosition <= (parentDivPosition + ((i + 1) * (currentScrollY - lastScrollY) + (i * i * 10)))) {
                // console.log(i, ((i + 1) * (currentScrollY - lastScrollY) + (i * i * 10)))

                if (i === 0) {
                    childDiv.style.transform = 'translateY(20px) scale(0.93)'
                } else {
                    childDiv.style.transform = `translateY(-${(Math.abs((300 * i) - 20))}px) scale(0.9${(i + 1) * 3})`
                }

                if (i !== 2) {
                    childrenState['child' + (i + 1)].canTranslateDown = false
                }

                childrenState[childStateKey].canTranslateUp = false

                titles.children[i].style.left = `50%`
                if (i !== 0) {
                    titles.children[i - 1].style.left = `-50%`
                }

            } else {
                if (childrenState[childStateKey].canTranslateUp) {
                    childrenDivs[j].style.transform = `translateY(-${Math.abs(childDivLastTranslatedAmount) + (currentScrollY - lastScrollY)}px)`
                }
            }
        }
    } else {

        if (theWrapper.getBoundingClientRect().bottom >= this.window.innerHeight) {
            for (let i = 1; i < childrenDivs.length; i++) {
                const childDivLastTranslatedAmount = getElementLastTranslatedAmount(childDiv, 'y')

                if (childrenState['child' + (i + 1)].canTranslateDown) {

                    // titles.children[i - 1].style.left = `50%`

                    childrenDivs[i].style.transform = `translateY(-${Math.abs(childDivLastTranslatedAmount) + (currentScrollY - lastScrollY)}px)`

                    childrenState['child' + (i + 1)].canTranslateUp = true


                    let closestSiblingPosition

                    closestSiblingPosition = childrenDivs[i - 1].getBoundingClientRect().bottom

                    if (childDivPosition >= closestSiblingPosition + 60) {
                        childrenState['child' + (i)].canTranslateDown = true

                        titles.children[i].style.left = `50%`

                        if (i !== 2) {
                            titles.children[i + 1].style.left = `150%`
                        }
                    }
                }
            }

            if (childrenDivs[1].getBoundingClientRect().top >= childrenDivs[0].getBoundingClientRect().bottom + 10) {
                for (let i = 0; i < childrenDivs.length; i++) {
                    childrenDivs[i].style.transform = ''
                    childrenState['child' + (i + 1)].canTranslateUp = true
                    titles.children[0].style.left = `50%`
                    titles.children[1].style.left = `100%`
                }
            }
        }
    }
}

function updateScrollDirection() {
    const currentScrollY = window.scrollY || window.pageYOffset

    if (currentScrollY > lastScrollY) {
        scrollDirection = 'down'
    } else if (currentScrollY < lastScrollY) {
        scrollDirection = 'up'
    }
}

function getElementLastTranslatedAmount(element, axis) {
    const computedStyle = window.getComputedStyle(element);

    const transformValue = computedStyle.getPropertyValue('transform');

    const transformMatrix = new DOMMatrix(transformValue);

    let elementLastTranslatedAmount

    if (axis === 'x') {
        elementLastTranslatedAmount = transformMatrix.m41;
    } else if (axis === 'y') {
        elementLastTranslatedAmount = transformMatrix.m42;
    }

    return elementLastTranslatedAmount
}

// why us code ends here

// testimonials section code starts here

const testimonialCards = document.querySelectorAll('.feedback .card')
const testimonialCardsDots = document.querySelectorAll('.feedback .dots > div')

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

// testimonials code ends here

// our programs code starts here

const ourProgramsDiv = document.querySelector('.our-programs')
const content = document.querySelector('.our-programs .content')
const imgDivs = document.querySelectorAll('.our-programs .img')

// let lastScrollTop = ourProgramsDiv.offsetTop + content.offsetTop
let lastScrollTop = 0
let curentDiv = content

while (curentDiv) {
    if (typeof(curentDiv.offsetTop) !== 'number') break

    lastScrollTop += curentDiv.offsetTop

    curentDiv = curentDiv.parentNode
}

lastScrollTop -= document.querySelector('main').offsetTop

let totalScroll = 0

let x1, x2, y1, y2, currImgDiv, breakAmount, centerTop
content.style.paddingTop = `${centerTop}px`

window.addEventListener('scroll', () => {
    positionImgDivs()

    if (content.getBoundingClientRect().top >= centerTop) return

    if (content.getBoundingClientRect().bottom <= window.innerHeight) {
        // totalScroll = 1300
        return
    }

    const currentScrollTop = window.scrollY

    const scrollDirection = currentScrollTop > lastScrollTop ? 'down' : 'up'

    const scrollDistance = Math.abs(currentScrollTop - lastScrollTop)

    if (scrollDirection === 'down') {
        totalScroll += scrollDistance
    } else {
        totalScroll -= scrollDistance
    }

    let scrollPercentage = ((scrollDistance * 100) / breakAmount)

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
            } else {

                unfoldsingle(imgDivs[1])
                setLowest()
            }
        }

        imgDivs[2].style.clipPath = newClipPath

        currImgDiv = 0
    } else if (totalScroll <= (breakAmount * 2)) {

        if (currImgDiv === 0) {
            if (scrollDirection === 'down') {
                setHighest()
                    // foldsingle(imgDivs[0])
            } else {
                setLowest()
                    // unfoldsingle(imgDivs[0])
            }
        }

        imgDivs[1].style.clipPath = newClipPath

        currImgDiv = 1
    }

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

function positionImgDivs() {

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

        unfoldsingle(imgDiv)
    }
}

function foldAll() {
    for (let i = 1; i < imgDivs.length; i++) {
        const imgDiv = imgDivs[i]

        foldsingle(imgDiv)
    }
}

// our programs code ends here