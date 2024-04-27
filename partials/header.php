<?php 
    $baseURL = '/smc/smc/site/';

    include($_SERVER['DOCUMENT_ROOT'] . '/smc/smc/site/config/conn.php');

    if(isset($_SESSION['user'])){
        $user = $_SESSION['user'];
    }else{
        $user = '';
    }
?>

<!DOCTYPE html>
<html lang="en">