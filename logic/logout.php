<?php
    session_start();
    unset($_SESSION['LOGGINED']);
    header('Location: http://localhost:8080/u2');
    $_SESSION['success'] = "You have successfully logged out!";
    die;
