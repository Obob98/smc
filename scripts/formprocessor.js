const subscribeForm = document.querySelector('.subscribe form') || document.createElement('div')
const profileEditForm = document.querySelector('.profile-edit > form') || document.createElement('div')


subscribeForm.addEventListener('submit', registerNewspaperSubscriber)
profileEditForm.addEventListener('submit', registerNewspaperSubscriber)

const form = document.querySelector('form') || document.createElement('div')
const mainSearchInput = document.getElementById('mainSearchInput') || document.createElement('div')
const searchResults = document.getElementById('searchResults') || document.createElement('div')

form.addEventListener('submit', e => {
    e.preventDefault()
    const defaultMessage = 'sorry something went wrong'

    var form = e.target;
    var formData = new FormData(form);

    fetch(form.action, {
        method: "POST",
        body: formData
    })
        .then(response => response.json())
        .then(data => {
            const searchValue = e.target.children[0].value

            if (data.length) {
                searchResults.innerHTML = `<h3>showing results for:  ${searchValue}</h3>`

                data.forEach(result => {
                    const li = document.createElement('li');
                    li.textContent = result.username;
                    searchResults.appendChild(li);
                });
                form.reset();
            }
            else {
                searchResults.innerHTML = `<h3>found zero results for: ${searchValue}</h3>`
            }

        })
        .catch(error => {
            console.error("Error:", error);
        });
})

function registerNewspaperSubscriber(e) {
    e.preventDefault()
    const defaultMessage = 'sorry something went wrong'

    var form = e.target;
    var formData = new FormData(form);

    fetch(form.action, {
        method: "POST",
        body: formData
    })
        .then(response => response.json())
        .then(data => {

            showOverlay('text', data.message || defaultMessage)
            setTimeout(() => {
                hideOverlay()
            }, 2000);
            form.reset();
        })
        .catch(error => {
            console.error("Error:", error);
        });

}

function updateUserInfo(e) {
    e.preventDefault()
    const defaultMessage = 'sorry something went wrong'

    var form = e.target;
    var formData = new FormData(form);

    fetch(form.action, {
        method: "POST",
        body: formData
    })
        .then(response => response.json())
        .then(data => {

            showOverlay('text', data.message || defaultMessage)
            setTimeout(() => {
                hideOverlay()
            }, 2000);
            form.reset();
            location.reload();
        })
        .catch(error => {
            console.error("Error:", error);
        });

}

function showOverlay(type, content) {
    const overlay = document.querySelector('.overlay')


    overlay.style.height = '100vh'
    if (type === 'text') {
        overlay.innerText = content
    } else if (type === 'element') {
        overlay.innerHTML = content
    }
}

function hideOverlay(type, content) {
    const overlay = document.querySelector('.overlay')

    overlay.style.height = '0vh'
    overlay.innerHTML = ''
}




















// const subscribeForm = document.querySelector('.subscribe form') || document.createElement('div')
// const profileEditForm = document.querySelector('.profile-edit > form') || document.createElement('div')


// subscribeForm.addEventListener('submit', registerNewspaperSubscriber)
// profileEditForm.addEventListener('submit', registerNewspaperSubscriber)

// function registerNewspaperSubscriber(e) {
//     e.preventDefault()
//     const defaultMessage = 'sorry something went wrong'

//     var form = e.target;
//     var formData = new FormData(form);

//     fetch(form.action, {
//         method: "POST",
//         body: formData
//     })
//         .then(response => response.json())
//         .then(data => {

//             showOverlay('text', data.message || defaultMessage)
//             setTimeout(() => {
//                 hideOverlay()
//             }, 2000);
//             form.reset();
//         })
//         .catch(error => {
//             console.error("Error:", error);
//         });

// }

// function updateUserInfo(e) {
//     e.preventDefault()
//     const defaultMessage = 'sorry something went wrong'

//     var form = e.target;
//     var formData = new FormData(form);

//     fetch(form.action, {
//         method: "POST",
//         body: formData
//     })
//         .then(response => response.json())
//         .then(data => {

//             showOverlay('text', data.message || defaultMessage)
//             setTimeout(() => {
//                 hideOverlay()
//             }, 2000);
//             form.reset();
//             location.reload();
//         })
//         .catch(error => {
//             console.error("Error:", error);
//         });

// }

// function showOverlay(type, content) {
//     const overlay = document.querySelector('.overlay')


//     overlay.style.height = '100vh'
//     if (type === 'text') {
//         overlay.innerText = content
//     } else if (type === 'element') {
//         overlay.innerHTML = content
//     }
// }

// function hideOverlay(type, content) {
//     const overlay = document.querySelector('.overlay')

//     overlay.style.height = '0vh'
//     overlay.innerHTML = ''
// }