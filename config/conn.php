<?php
    try{
        $conn = mysqli_connect('localhost', 'root', '', 'smc');

        session_start();

        if(!isset($_SESSION['user'])){
            $_SESSION['user'] = ['username' => '', 'profile_img' => '', 'email' => ''];
        }

        $protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http';

        $serverName = $_SERVER['SERVER_NAME'];

        $port = $_SERVER['SERVER_PORT'] != '80' ? ':' . $_SERVER['SERVER_PORT'] : '';

        $baseURL = $protocol . '://' . $serverName . $port . '/smc/smc/site/';

    }
    catch(Exception $error){
        // echo 'error connecting to database';
    }
?>