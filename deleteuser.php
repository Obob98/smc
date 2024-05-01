<?php
include('./config/conn.php');

if(isset($_GET['user_id'])) {
    $user_id = mysqli_real_escape_string($conn, $_GET['user_id']);

    $sql = "DELETE FROM users WHERE username = '$user_id'";

    if(mysqli_query($conn, $sql)) {
        echo "User deleted successfully.";
        $_SESSION['user'] = ['username' => '', 'profile_img' => '', 'email' => ''];
        header('Location: ./index.php');
    } else {
        echo "Error: " . mysqli_error($conn);
    }
} else {
    echo "User ID not provided.";
}
?>