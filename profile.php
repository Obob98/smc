<?php 
    include('./partials/header.php');

    $username = $user['username'];

    $sql = "SELECT * FROM users WHERE username='$username'";

    $query = mysqli_query($conn, $sql);

    $info = mysqli_fetch_assoc($query);

    $sql2 = "SELECT articles.*, saved_articles.id AS saved_article_id, saved_articles.username as username
    FROM articles
    INNER JOIN saved_articles ON articles.id = saved_articles.article_id
    WHERE username = '$username'";

    $query2 = mysqli_query($conn, $sql2);
    
    $articles = mysqli_fetch_all($query2, MYSQLI_ASSOC);

 ?>


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Instagram Profile</title>

    <link rel="stylesheet" href="./styles/utilities.css">
    <link rel="stylesheet" href="./profile.css">
    <link rel="stylesheet" href="./editprofile.css">
    <link rel="stylesheet" href="./styles/main.css">

    <link rel="stylesheet" href="./styles/about-us.css">
    <link rel="stylesheet" href="./styles/home.css">
    <link rel="stylesheet" href="./styles/utilities.css">
    <link rel="stylesheet" href="./partials/extra-nav.css">
    <link rel="stylesheet" href="./styles/articles.css">

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
                    <img src="<?php echo $baseURL .'images/profiles/' . $info['profile_img'] ?>" alt="profile imae">
                    <?php else: ?>
                    <p><?php echo $user['profile_img'] ?></p>
                    <?php endif ?>
                </div>
                <div class="profile-info">
                    <h1><?php echo $info['firstname']. ' ' . $info['lastname'] ?></h1>
                    <div class="followers">
                        <small><?php echo '@' . $info['username'] ?></small>
                    </div>
                </div>
            </div>
            <button id="edit-account">
                edit account
            </button>
        </div>

        <main class="">
            <section class="latest-articles">
                <div class="container">
                    <div class="articles">
                        <?php foreach($articles as $article): ?>
                        <div class="card glass ">
                            <a href="<?php echo $baseURL . 'article.php?id=' . $article['id'];?>" class="img">
                                <img src="./assets/imgs/1671595495693.jpeg" alt="">
                            </a>
                            <div class="typography">
                                <a href="<?php echo $baseURL . 'article.php?id=' . $article['id']; ?>"
                                    class="blog-title  ">
                                    <p class="f-bold text-ellipsis"><?php echo $article['title'] ?></p>
                                </a>
                                <div class="additional-information">
                                    <a href="<?php echo $baseURL . 'article.php?id=' . $article['id'];?>">
                                        <span>#</span>
                                        <?php echo $article['tag'] ?>
                                    </a>

                                    <button href="#" id="<?php echo $article['saved_article_id'] ?>"
                                        class="btn glass unsave btn-primary">unsave</button>
                                </div>
                            </div>
                        </div>
                        <?php endforeach ?>
                    </div>
                </div>
            </section>

            <script>
            const articles = document.querySelectorAll('.articles > div')

            articles.forEach(article => {
                const button = article.querySelector('button')

                button.addEventListener('click', function() {
                    const id = this.id

                    const username =
                        '<?php echo isset($_SESSION['user']['username']) ? $_SESSION['user']['username'] : ''; ?>';

                    console.log({
                        id,
                        username
                    })

                    const formData = new FormData()

                    formData.append('id', id)

                    let url

                    console.log('classlist', this.classList, this.classList.contains('unsave'))

                    if (this.classList.contains('unsave')) {
                        url = './unsave-article.php'
                    } else {
                        url = './save-article.php'
                        formData.append('username', username)
                    }

                    console.log({
                        url
                    })

                    fetch(url, {
                            method: "POST",
                            body: formData
                        })
                        .then(response => {
                            return response.json()
                        })
                        .then(data => {

                            console.log({
                                data
                            })

                            if (data.success) {
                                console.log({
                                    data
                                })
                                window.location.reload()
                            } else {
                                console.log('failed')
                            }

                        })
                        .catch(error => {
                            console.error("Error:", error);
                        });
                })

            })
            </script>
        </main>
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
                    <img src="<?php echo $baseURL .'images/profiles/' . $info['profile_img'] ?>" alt="profile imae">
                    <?php else: ?>
                    <p><?php echo $info['profile_img'] ?></p>
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
                        <input type="text" id="username" name="username" value="<?php echo $info['username'] ?>"  required>
                        <label for="email">change Email:</label>
                        <input type="email" id="email" name="email" value="<?php echo $info['email'] ?>" required>
                        <label for="profile-picture">change Profile Picture:</label>
                        <input type="file" id="profile-picture" name="image" accept="image/*">
                        <button class="success" type='submit' name='submit'>update account</button>
                        </form>
                        <form method="GET" action="deleteuser.php">
                        <input type="hidden" name="user_id" value="<?php echo $info['username'] ?>" />    
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