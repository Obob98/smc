<?php 
    $baseURL = '/smc/smc/site/';

    include($_SERVER['DOCUMENT_ROOT'] . '/smc/smc/site/config/conn.php');

    if(isset($_SESSION['user'])){
        $user = $_SESSION['user'];
    }else{
        $user = '';
    }

    if(!isset($_SESSION['current-page'])){
        $_SESSION['current-page'] = 'Home';
    }
?>

<!DOCTYPE html>
<html lang="en">