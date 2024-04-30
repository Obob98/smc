<?php 
    include('./partials/header.php');
 ?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SMC</title>
    <!-- <link rel="stylesheet" href="./animation.css"> -->
    <link rel="stylesheet" href="./styles/about-us.css">
    <link rel="stylesheet" href="./styles/home.css">
    <link rel="stylesheet" href="./styles/utilities.css">
    <link rel="stylesheet" href="./styles/main.css">

    <!-- <script src="./scripts/aboutus.js" defer></script>
    <script src="./scripts/main.js" defer></script> -->
</head>

<body>
    <header>
        <div class="hero">

            <?php include($_SERVER['DOCUMENT_ROOT'] . '/smc/smc/site/partials/nav.php');?>

    </header>

    <main>
        <form action="profile.php" method="POST" enctype="multipart/form-data">
            <label for="image">change profile pic</label>
            <input type="file" name="image" id="">
            <button type="submit" name="submit">upload</button>
        </form>
    </main>

    <?php 
        if(isset($_POST['submit'])){
            if($_FILES['image']['name']){
                print_r($_FILES['image']);
                $image_name = $_FILES['image']['name'];
                $ext = end(explode('.', $image_name));
                $image_name = 'profpic' . rand(0000000, 9999999) . '.' . $ext; 
                
                $source_path = $_FILES['image']['tmp_name'];

                $destination_path = './images/profiles/'.$image_name;
                $upload = move_uploaded_file($source_path, $destination_path);

                if($upload === false){
                    $_SESSION['upload'] = 'failed to upload';
                    // echo 'failed to oplad';
                    // header('Location: ./profile.php');
                    
                    die();
                }else{
                    // echo 'successfull';

                    $username = $_SESSION['user']['username'];

                    $sql = "UPDATE users 
                    SET profile_img = '$image_name'
                    WHERE username = '$username'
                    " ;

                    $res = mysqli_query($conn, $sql);

                    if($res === true){
                        echo 'succ';
                        $_SESSION['user']['profile_img'] = $image_name;

                        $_SESSION['profile-updated'] = true;
                    }
                }
            };
        }
        else{
            $image_name = '';
        }
    ?>

    <?php include('./partials/footer.php') ?>