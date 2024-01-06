<?php
    session_start();
    $filePath = dirname(__DIR__, 1) . '/data/login.json';
    $admins = json_decode(file_get_contents($filePath), true);
    $username = $_POST['user'];
    $password = md5($_POST['pass']);

    print_r($admins);
    foreach ($admins as $admin) {
        if ($admin['user'] == $username && $admin['pass'] == $password) {
            $_SESSION['LOGGINED'] = true;
            $_SESSION['USER'] = $username;
            header('Location: http://localhost:8080/u2/views/main.php');
            die;
        }
    }

    header('Location: http://localhost:8080/u2');
    $_SESSION['error'] = "Please check your credentials.";
    die;
