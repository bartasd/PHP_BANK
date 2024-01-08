<?php

session_start();
// RESTRICT ACCESS FROM IF NOT LOGINED.
if(!isset($_SESSION['LOGGINED'])){
    $_SESSION['error'] = "You're not loggined! Please, login first.";
    header('Location: http://localhost:8080/u2');
    die;
}
// RESTRICT DIRECT ACCESS IF LOGINNED.
if(!isset($_GET['id'])){
    header('Location: http://localhost:8080/u2/views/main.php');
    die;
}

$filePath = dirname(__DIR__, 1) . '/data/accounts.json';
$accounts = json_decode(file_get_contents($filePath), true);
$id = $_GET['id'];
$action = $_GET['action'];
$ammount = $_POST['ammount'];

if($ammount < 0){
    header('Location: http://localhost:8080/u2/views/main.php?i=accounts');
    $_SESSION['error'] = "You cannot enter negative ammount.";
    die;
}

foreach ($accounts as &$account) {
    if ($account['id'] == $id) {
        $name = $account['name'];
        $surname = $account['surname'];
        if($action == "add"){
            $account['balance'] += $ammount;
            $_SESSION['success'] = "Funds ($ammount EUR) successfully added to $name $surname  account.";
        }
        else if ($action == "take" && $account['balance'] >= $ammount ){
            $account['balance'] -= $ammount;
            $_SESSION['success'] = "Funds ($ammount EUR) successfully discarded from $name $surname  account.";
        }
        else if ($action == "take" && $account['balance'] < $ammount ){
            $_SESSION['error'] = "There is insufficient funds in $name $surname  account.";
        }
        break;
    }
}

$accounts = array_values($accounts);
file_put_contents($filePath, json_encode($accounts, JSON_PRETTY_PRINT | JSON_NUMERIC_CHECK));
header('Location: http://localhost:8080/u2/views/main.php?i=accounts');
die;

?>
