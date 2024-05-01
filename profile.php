<?php 
    include('./partials/header.php');
 ?>


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Instagram Profile</title>

    <link rel="stylesheet" href="./styles/utilities.css">
    <link rel="stylesheet" href="./profile.css">
    <link rel="stylesheet" href="./editprofile.css">
    <link rel="stylesheet" href="./styles/main.css">

    <script src='./scripts/formprocessor.js'></script>

</head>

<body>
    <div class="overlay"></div>
    <nav class="container">
        <div class="logo">
            <a href="<?php echo $baseURL?>" class="h1 f-bold">
                <img src="<?php echo $baseURL . 'assets/imgs/360_F_479093143_1ypd13XBPiPtBJcsprzEhhxflcfqEGna.jpg' ?>"
                    alt="">
            </a>
        </div>
        <!-- <button id="mode-toggle">
            theme
        </button> -->
    </nav>
    <div class="profile">
        <div class="profile-header">
            <div>
                <div class="profile-picture glass">
                    <?php if(strlen($user['profile_img']) > 2): ?>
                    <img src="<?php echo $baseURL .'images/profiles/' . $user['profile_img'] ?>" alt="profile imae">
                    <?php else: ?>
                    <p><?php echo $user['profile_img'] ?></p>
                    <?php endif ?>
                </div>
                <div class="profile-info">
                    <h1><?php echo $user['username'] ?></h1>
                    <div class="followers">
                        <small>subscribed</small>
                    </div>
                </div>
            </div>
            <button id="edit-account">
                edit account
            </button>
        </div>
        <div class="profile-saved-items">
            <div class="saved-item_card glass">
                <img src="./assets/imgs/1671595495693.jpeg" alt="Saved Item 1">
                <small>saved item title</small>
                <button class="btn btn-primary unsave-btn">Unsave</button>
            </div>
            <div class="saved-item_card glass">
                <img src="./assets/imgs/9a882aad67ae7150f1255d40968f6c74.png" alt="Saved Item 2">
                <small>saved item title</small>
                <button class="btn btn-primary unsave-btn">Unsave</button>
            </div>
        </div>
    </div>
</body>

<script>
const editAccountBtn = document.getElementById('edit-account')

editAccountBtn.addEventListener('click', e => {

    showOverlay()
})

function showOverlay(type, content) {
    const overlay = document.querySelector('.overlay')

    // const name = <?php echo $user['username'] ?>;


    overlay.style.height = '100vh'
    // if (type === 'text') {
    //     overlay.innerText = content
    // } else if (type === 'element') {
    overlay.innerHTML = `<div class="edit-profile_container">
        <div class="profile">
            <div class="profile-header">
                <div class="profile-picture glass">
                    <?php if(strlen($user['profile_img']) > 2): ?>
                    <img src="<?php echo $baseURL .'images/profiles/' . $user['profile_img'] ?>" alt="profile imae">
                    <?php else: ?>
                    <p><?php echo $user['profile_img'] ?></p>
                    <?php endif ?>
                </div>
                <div class="profile-info">
                    <h1>Aubrey</h1>
                </div>
            </div>
            <div class="profile-body">
                <div class="profile-edit">
                <form action="./editprofile.php" method="POST" enctype="multipart/form-data">
                        <label for="username">change Username:</label>
                        <input type="text" id="username" name="username" value="<?php echo $user['username'] ?>"  required>
                        <label for="email">change Email:</label>
                        <input type="email" id="email" name="email" value='<?php echo $user['email'] ?> ' required>
                        <label for="profile-picture">change Profile Picture:</label>
                        <input type="file" id="profile-picture" name="image" accept="image/*">
                        <button class="success" type='submit' name='submit'>update account</button>
                        </form>
                        <form method="GET" action="deleteuser.php">
                        <input type="hidden" name="user_id" value="<?php echo $user['username'] ?>" />    
                        <button id="delete-account">Delete Account</button>
                        </form>
                </div>
            </div>
        </div>
    </div>`
    // }
}

function hideOverlay(type, content) {
    const overlay = document.querySelector('.overlay')

    overlay.style.height = '0vh'
    overlay.innerHTML = ''
}

const deleteBtn = document.querySelector('.overlay #delete-account') || document.createElement('div')

deleteBtn.addEventListener('click', () => {
    alert('failed to delete user')
    hideOverlay()
})
</script>

</html>