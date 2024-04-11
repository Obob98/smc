window.addEventListener('DOMContentLoaded', () => {
    // consoleElementHeight(document.querySelector('.theWrapper'))
    // 
})

const theWrapper = document.querySelector('.why-us')
const stickyDiv = document.querySelector('.sticky-content')
const childrenDivs = document.querySelectorAll('.why-us .card')

console.log({ theWrapper, stickyDiv, childrenDivs })

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

window.addEventListener('scroll', function () {
    updateScrollDirection()

    // 

    const currentScrollY = window.scrollY || window.pageYOffset
    const stickyDivPosition = stickyDiv.getBoundingClientRect()

    if (stickyDivPosition.top <= 0) {

        for (let i = 0; i < childrenDivs.length; i++) {
            const childStateKey = `child${i + 1}`

            const childDiv = childrenDivs[i]
            const parentDiv = childDiv.parentNode

            const parentDivPosition = parentDiv.getBoundingClientRect().top
            const childDivPosition = childDiv.getBoundingClientRect().top

            if (scrollDirection === 'down') {
                if (childrenState[childStateKey].canTranslateUp) {
                    for (let j = i; j < childrenDivs.length; j++) {
                        const childDivLastTranslatedAmount = getElementLastTranslatedAmount(childDiv)

                        if (childDivPosition <= (parentDivPosition + ((i + 1) * (currentScrollY - lastScrollY) + (i * i * 10)))) {
                            if (i === 0) {
                                childDiv.style.transform = 'translateY(20px) scale(0.93)'
                            } else {
                                childDiv.style.transform = `translateY(-${(Math.abs((300 * i) - 20))}px) scale(0.9${(i + 1) * 3})`
                            }

                            if (i !== 2) {
                                childrenState['child' + (i + 1)].canTranslateDown = false
                            }

                            childrenState[childStateKey].canTranslateUp = false
                        } else {
                            if (childrenState[childStateKey].canTranslateUp) {
                                childrenDivs[j].style.transform = `translateY(-${Math.abs(childDivLastTranslatedAmount) + (currentScrollY - lastScrollY)}px)`
                            }
                        }
                    }
                }
            } else {

                console.log('in 1')
                if (theWrapper.getBoundingClientRect().bottom >= this.window.innerHeight) {
                    console.log('in 2')
                    for (let i = 1; i < childrenDivs.length; i++) {
                        const childDivLastTranslatedAmount = getElementLastTranslatedAmount(childDiv)

                        if (childrenState['child' + (i + 1)].canTranslateDown) {
                            childrenDivs[i].style.transform = `translateY(-${Math.abs(childDivLastTranslatedAmount) + (currentScrollY - lastScrollY)}px)`

                            childrenState['child' + (i + 1)].canTranslateUp = true

                            let closestSiblingPosition

                            closestSiblingPosition = childrenDivs[i - 1].getBoundingClientRect().bottom

                            if (childDivPosition >= closestSiblingPosition + 60) {
                                childrenState['child' + (i)].canTranslateDown = true
                            }
                        }
                    }
                    if (childrenDivs[1].getBoundingClientRect().top >= childrenDivs[0].getBoundingClientRect().bottom + 10) {
                        for (let i = 0; i < childrenDivs.length; i++) {
                            childrenDivs[i].style.transform = ''
                            childrenState['child' + (i + 1)].canTranslateUp = true
                        }
                    }
                }


            }
        }
    }

    lastScrollY = currentScrollY;
});

function updateScrollDirection() {
    const currentScrollY = window.scrollY || window.pageYOffset

    if (currentScrollY > lastScrollY) {
        scrollDirection = 'down'
    } else if (currentScrollY < lastScrollY) {
        scrollDirection = 'up'
    }
}

function getElementLastTranslatedAmount(element) {
    // Get the computed style of the element
    const computedStyle = window.getComputedStyle(element);

    // Get the value of the transform property
    const transformValue = computedStyle.getPropertyValue('transform');

    // Convert the transform value to a DOMMatrix object
    const transformMatrix = new DOMMatrix(transformValue);

    // Extract the translateY component from the matrix 
    const elementLastTranslatedAmount = transformMatrix.m42;

    return elementLastTranslatedAmount
}


// utility functions

function consoleElementHeight(element) {
    console.log(element, element.getBoundingClientRect().height)
}