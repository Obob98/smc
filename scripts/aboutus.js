const vidContainer = document.querySelector('.video .vid')
const vidPlayButton = document.querySelector('.video .vid span')
const video = document.querySelector('.video .vid video')

vidContainer.addEventListener('mousemove', e => {

    console.log()
    if (e.toElement.classList.value === 'glass') return
    const { clientX, offsetY } = e
    const top = offsetY
    const left = clientX

    followCursor(left, top)
})

vidContainer.addEventListener('mouseenter', e => {

    const { clientX, offsetY } = e
    const top = offsetY
    const left = clientX

    followCursor(left, top)
})

vidContainer.addEventListener('mouseleave', e => {
    vidPlayButton.style.top = `50%`
    vidPlayButton.style.left = `50%`
})

vidPlayButton.addEventListener('click', e => {
    if (vidPlayButton.innerText === 'PAUSE') {
        document.body.style.overflowY = 'auto'
        vidContainer.style.position = 'relative'
        vidContainer.style.top = 'unset'
        vidContainer.style.left = 'unset'
        vidContainer.style.height = '80svh'
        video.pause()
        vidPlayButton.innerText = 'PLAY'
        fixedNav.style.display = 'flex'
    } else {
        document.body.style.overflowY = 'hidden'
        vidContainer.style.position = 'fixed'
        vidContainer.style.top = '0'
        vidContainer.style.left = '0'
        vidContainer.style.height = '100svh'
        video.play()
        vidPlayButton.innerText = 'PAUSE'
        fixedNav.style.display = 'none'
    }
})

function followCursor(left, top) {
    vidContainer.style.transform = 'translate(0px)'
    vidPlayButton.style.top = `${top}px`
    vidPlayButton.style.left = `${left}px`
}

let int

function debounce(callback) {
    clearTimeout(int)
    int = setTimeout(() => {
        callback()
    }, 50);
}

function initApp() {

}