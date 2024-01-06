<?php
    session_start();
    if(!isset($_SESSION['LOGGINED'])){
        $_SESSION['error'] = "You're not loggined! Please, login first.";
        header('Location: http://localhost:8080/u2');
        die;
    }
?>
<!DOCTYPE html>
<head>
    <meta charset=UTF-8>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PIGS&PIGGIES BANKING LIMITED</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/accounts.css">
    <link rel="stylesheet" href="../css/add_accounts.css">
    <link rel="stylesheet" href="../css/delete.css">
    <link rel="stylesheet" href="../css/edit.css">
    <link rel="stylesheet" href="../css/msg.css">
    <script src="../js/index.js" defer></script>
</head>
<body>
    <aside>
        <a href="./main.php?i=home" class="container" id="list">
            <img src = "../assets/house-solid.svg" alt="home"/>
            <p>Home</p>
        </a>

        <a href="./main.php?i=accounts" class="container accounts" id="edit">
            <img src = "../assets/sack-dollar-solid.svg" alt="sack"/>
            <p>Accounts</p>
        </a>
        <a href="./main.php?i=add_accounts" class="container add_acc" id="add">
            <img src = "../assets/square-plus-solid.svg" alt="add"/>
            <p>Add Account</p>
        </a>
    </aside>
    <div class="main">
        <div class="userArea">
            <?php 
                $user = ucfirst($_SESSION['USER']);
                echo "<p class=\"welcome\">Hello, {$user}</p>"; 
            ?>
            <a href="../logic/logout.php">
                <img src = "../assets/logOff.svg" alt="logoff"/>
            </a>
        </div>
        <div class="workArea">
                <?php
                    if(isset($_GET['i'])) {
                        $i = $_GET['i'];
                    }
                    else{
                        $i = "home";
                    }
                    require __dir__."/{$i}.php";
                ?>
        </div>
    </div>
</body>
</head>
