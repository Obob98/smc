const vidContainer = document.querySelector('.video .vid') || document.createElement('div')
const vidPlayButton = document.querySelector('.video .vid span') || document.createElement('div')
const video = document.querySelector('.video .vid video') || document.createElement('div')

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

// ##########################################
// Set your API key

function youtubeContentWebService() {
    var apiKey = '';
    // Array of search queries
    var queries = ['facebook online safety tips', 'instagram online safety tips', 'tiktok online safety tips', 'messenger online safety'];

    // Select a random query from the array
    var randomQuery = queries[Math.floor(Math.random() * queries.length)];

    // Set the endpoint URL
    var endpoint = 'https://www.googleapis.com/youtube/v3/search';
    var params = {
        part: 'snippet',
        q: encodeURIComponent(randomQuery),
        key: apiKey,
        maxResults: 1, // Adjust as needed
        type: 'video'
    };

    // Make the API request
    var xhr = new XMLHttpRequest();
    xhr.open('GET', endpoint + '?' + new URLSearchParams(params), true);
    xhr.onload = function () {
        if (xhr.status === 200) {
            var response = JSON.parse(xhr.responseText);
            if (response.items.length > 0) {
                var videoId = response.items[0].id.videoId;
                var videoUrl = 'https://www.youtube.com/embed/' + videoId;

                // Create a video element
                var videoPlayer = document.getElementById('videoPlayer');
                video.src = videoUrl;
            } else {
                console.error('No videos found.');
            }
        } else {
            console.error('Error:', xhr.statusText);
        }
    };
    xhr.onerror = function () {
        console.error('Request failed.');
    };
    xhr.send();
}