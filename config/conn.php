<?php
    try{
        $conn = mysqli_connect('localhost', 'root', '', 'smc');

        session_start();

        if(!isset($_SESSION['user'])){
            $_SESSION['user'] = ['username' => '', 'profile_img' => '', 'email' => ''];
        }
    }
    catch(Exception $error){
        // echo 'error connecting to database';
    }
?>