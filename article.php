<?php 
    include('./partials/header.php');

    $username = $_SESSION['user']['username'];

    $saved = false;

    
    if(isset($_GET['id'])){

        $id = $_GET['id'];

        $sql = "SELECT * FROM articles WHERE id='$id'";

        $query = mysqli_query($conn, $sql);
    
        $article = mysqli_fetch_assoc($query);

        $sql2 = "SELECT * FROM saved_articles WHERE article_id='$id' AND username='$username'";

        $query2 = mysqli_query($conn, $sql2);
    
        $saved_article = mysqli_fetch_assoc($query2);

        if($saved_article){
            $saved = true;
        }
    }


 ?>


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Instagram Profile</title>

    <link rel="stylesheet" href="./styles/utilities.css">
    <link rel="stylesheet" href="./profile.css">
    <link rel="stylesheet" href="./editprofile.css">
    <link rel="stylesheet" href="./styles/main.css">
    <link rel="stylesheet" href="./styles/article.css">

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
                <div class="profile-info">
                    <h2><?php echo $article['title']?></h2>
                    <div class="followers">
                        <small><?php echo '#' . $article['tag'] ?></small>
                    </div>
                </div>
            </div>
            <?php
            if($saved){
                echo '<button id="' . $saved_article['id'] .'"class="btn-primary unsave">unsave</button>';
            }
            else{
            echo '<button id="' . $article['id'] .'">save</button>';
            }
            ?>
        </div>
        <div class="profile-saved-items">
            <p>
                Lorem, ipsum dolor sit amet consectetur adipisicing elit. Aut praesentium nulla nobis necessitatibus
                deleniti obcaecati at iste blanditiis, laudantium neque corporis odit? Ipsam quis, voluptas quidem odio
                accusamus natus! Atque sed laudantium, distinctio odit suscipit accusantium quos nulla reiciendis ut
                eius saepe, modi ipsam labore. Omnis facilis aperiam molestiae dolorum sequi officiis nam similique
                magnam nihil, odio aliquam maiores beatae molestias ullam, veniam non eius nesciunt accusamus, quis a
                est? Dolorem ad incidunt itaque repudiandae optio, deserunt recusandae debitis. Officiis fugiat commodi
                ducimus iusto, aut illum repudiandae distinctio vel error enim recusandae, totam eos, odit voluptates
                corrupti optio aspernatur. Labore, nostrum blanditiis. Laborum aut dolore modi harum, necessitatibus hic
                ducimus numquam, recusandae dolorum eos reprehenderit atque ea perspiciatis blanditiis possimus adipisci
                non, nam eum? Assumenda veniam adipisci commodi aliquid quis! Incidunt, repudiandae in cumque, ipsum id
                nemo architecto blanditiis dignissimos, soluta numquam natus aspernatur voluptates harum sequi
                consequuntur veritatis tenetur adipisci voluptatum. Reiciendis, delectus illo. Ad provident vero
                voluptatem ipsam voluptas magnam distinctio quae, at ea quas illum possimus quos assumenda quidem sunt?
                Distinctio ducimus doloremque qui commodi molestias culpa quis, rem est architecto aut eius dolores iure
                placeat reiciendis, impedit necessitatibus officiis blanditiis voluptatem rerum id incidunt deserunt
                totam?
            </p>
        </div>
    </div>
</body>

<script>
const button = document.querySelector('button')

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
</script>

</html>