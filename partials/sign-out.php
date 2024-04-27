<?php
    include($_SERVER['DOCUMENT_ROOT'] . '/smc/smc/site/config/conn.php');

    $_SESSION['user'] = ['username' => '', 'profile_img' => ''];

    header('Location: ../index.php');
?>