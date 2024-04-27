<?php
include($_SERVER['DOCUMENT_ROOT'] . '/smc/smc/site/config/conn.php');

if(isset($_SESSION['user'])) {
    $username = $_SESSION['user']['username'];
    
    $sql = "SELECT * FROM users WHERE username='$username'";

    $res = mysqli_query($conn, $sql);

    if(mysqli_num_rows($res) > 0){
        $user = mysqli_fetch_assoc($res);

        if($user['profile_img']){
            $_SESSION['user']['profile_img'] = $user['profile_img'];
        }
        else{
            $initials = '';

            foreach(explode('_', $user['username']) as $var){
                $initials .= $var[0]; 
            }
            
            $_SESSION['user']['profile_img'] = strtoupper($initials);
        }

        header('Location: ./index.php');
    }
    else{
        echo 'user noot found';
    }
} else {
    echo "User not logged in.";
}
?>