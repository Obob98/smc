<?php
include('../config/conn.php');

$_SESSION['sign-up'] = '';

$firstname = '';
$lastname = '';
$username = '';
$email = '';
$password = '';
$birthday = '';

if(isset($_POST['submit'])){
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $birthday = $_POST['birthday'];
    
    if(!empty($firstname) && !empty($lastname) && !empty($username) && !empty($email) && !empty($password) && !empty($birthday)){
        $sql = "INSERT INTO users values(DEFAULT, '$firstname', '$lastname', '$username', '$email', NULL, '$password', '$birthday', DEFAULT)"; 

        try{
            $res = mysqli_query($conn, $sql);

            if (!$res) {
                throw new Exception(mysqli_error($conn));
            }

            $_SESSION['user']['username'] = $username;
            $_SESSION['sign-up'] = 'created account successfully';
            echo 'redirecting';
            header("Location: ../on-boarding.php");
        }
        catch (Exception $error){
            $_SESSION['sign-up'] = 'failed to create account ' . $error -> getMessage();
        }
    }else{
        $_SESSION['sign-up'] = 'please fill the required fields';
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log-In</title>
    <link rel="stylesheet" href="../styles/main.css">
    <link rel="stylesheet" href="../styles/utilities.css">
    <link rel="stylesheet" href="../styles/signup.css">
</head>

<body>
    <div class="wrapper">
        <div class="img">
            <img src="../assets/imgs/login/social-security-abstract-concept-vector-illustration_107173-24849.avif"
                alt="">
        </div>
        <div class="form-container">
            <h2>Sign up to SMC</h2>

            <?php if($_SESSION['sign-up']): ?>
            <p class="danger"><?php echo $_SESSION['sign-up']; ?></p>
            <?php endif ?>

            <form action="./sign-up.php" method="POST">

                <input type="text" name="firstname" placeholder="firstname" value="<?php echo $firstname ?>" class="">
                <input type="text" name="lastname" placeholder="lastname" value="<?php echo $lastname ?>" class="">
                <input type="text" name="username" placeholder="username" value="<?php echo $username ?>" class="">
                <input type="date" name="birthday" value="<?php echo $birthday ?>">
                <input type="email" name="email" placeholder="email" value="<?php echo $email ?>" class="">
                <input type="password" name="password" placeholder="password" class="">
                <input type="password" name="confirm_password" placeholder="confirm password" class="">
                <button type="submit" name="submit" class="btn-primary">
                    register
                </button>
            </form>
        </div>
    </div>
</body>

</html>