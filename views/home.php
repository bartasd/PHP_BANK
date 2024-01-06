<?php 
session_start();
if(!isset($_SESSION['LOGGINED'])){
    $_SESSION['error'] = "You're not loggined! Please, login first.";
    header('Location: http://localhost:8080/u2');
    die;
}
?>

<div class="bckgr_image" id="bckgr_image"></div>