window.addEventListener('DOMContentLoaded', () => {
    // consoleElementHeight(document.querySelector('.theWrapper'))
    // 
})

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

window.addEventListener('scroll', function () {
    updateScrollDirection()

    // 

    const currentScrollY = window.scrollY || window.pageYOffset
    const stickyDivPosition = stickyDiv.getBoundingClientRect()

    if (stickyDivPosition.top <= 0) {

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



                // console.log({ childrenState })
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
    // Get the computed style of the element
    const computedStyle = window.getComputedStyle(element);

    // Get the value of the transform property
    const transformValue = computedStyle.getPropertyValue('transform');

    // Convert the transform value to a DOMMatrix object
    const transformMatrix = new DOMMatrix(transformValue);

    // Extract the translateY component from the matrix 
    let elementLastTranslatedAmount

    if (axis === 'x') {
        elementLastTranslatedAmount = transformMatrix.m41;
    }
    else if (axis === 'y') {
        elementLastTranslatedAmount = transformMatrix.m42;
    }

    return elementLastTranslatedAmount
}


// utility functions

function consoleElementHeight(element) {
    console.log(element, element.getBoundingClientRect().height)
}





// function translateTitles(i, j, currentScrollY) {
//     const childStateKey = `child${i + 1}`

//     const childDiv = titles.children[i]
//     const parentDiv = childDiv.parentNode

//     const parentDivPosition = parentDiv.getBoundingClientRect().top
//     const childDivPosition = childDiv.getBoundingClientRect().top

//     if (scrollDirection === 'down') {
//         if (titlesState[childStateKey].canTranslateLeft) {

//             const childDivLastTranslatedAmount = getElementLastTranslatedAmount(childDiv, 'x')

//             const leftPosition = childDiv.offsetLeft;

//             const elementWidth = childDiv.offsetWidth;

//             const rightPosition = leftPosition + elementWidth;

//             // console.log("important", { childDiv }, '==>', ((leftPosition - window.innerWidth) + ((window.innerWidth / 2) + (elementWidth / 2))))
//             // console.log({ childDiv, childDivLastTranslatedAmount })
//             // console.log({ childDiv, is: leftPosition <= (window.innerWidth - rightPosition + (elementWidth / 2)), leftPosition, elementWidth, innerwidth: window.innerWidth })

//             if (childDivLastTranslatedAmount <= -((leftPosition - window.innerWidth) + ((window.innerWidth / 2) + (elementWidth / 2)))) {
//                 console.log('tili within')

//                 titles.children[i].style.transform = `translateX(-50%)`
//                 titles.children[i].style.left = `50%`

//                 // if (childDivLastTranslatedAmount <= -1400) alert('huya!')
//                 titlesState[childStateKey].canTranslateLeft = false
//             } else {
//                 titles.children[i].style.transform = `translateX(-${Math.abs(childDivLastTranslatedAmount) + ((window.innerWidth / 100) * (currentScrollY - lastScrollY))}px)`
//             }
//         }
//     } else {

//         if (theWrapper.getBoundingClientRect().bottom >= this.window.innerHeight) {
//             for (let i = 1; i < childrenDivs.length; i++) {

//                 const childDivLastTranslatedAmount = getElementLastTranslatedAmount(childDiv, 'x')

//                 if (i === 2) {
//                     // titles.children[2].style.left = `100%`
//                     console.log({ childDivLastTranslatedAmount })
//                 }

//                 if (childrenState['child' + (i + 1)].canTranslateDown) {
//                     console.log('in 11')

//                     titles.children[i].style.transform = `translateX(-${Math.abs(childDivLastTranslatedAmount) + ((window.innerWidth / 100) * (currentScrollY - lastScrollY))}px)`
//                 }
//             }
//             if (childrenDivs[1].getBoundingClientRect().top >= childrenDivs[0].getBoundingClientRect().bottom + 10) {
//                 for (let i = 0; i < childrenDivs.length; i++) {
//                     // childrenDivs[i].style.transform = ''
//                 }
//             }
//         }


//     }
// }