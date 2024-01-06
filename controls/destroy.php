<?php

session_start();
// RESTRICT ACCESS FROM IF NOT LOGINED.
if(!isset($_SESSION['LOGGINED'])){
    $_SESSION['error'] = "You're not loggined! Please, login first.";
    header('Location: http://localhost:8080/u2');
    die;
}
// RESTRICT DIRECT ACCESS IF LOGINNED.
if(!isset($_POST['id'])){
    header('Location: http://localhost:8080/u2/views/main.php');
    die;
}
unset($_SESSION['error']);
$filePath = dirname(__DIR__, 1) . '/data/accounts.json';
$accounts = json_decode(file_get_contents($filePath), true);
$id = $_POST['id'];
$name = null;
$lname = null;

foreach ($accounts as &$account) {
    if ($account['id'] == $id) {
        $account['deleted'] = true;
        $name = $account['name'];
        $lname = $account['surname'];
        break;
    }
}
$_SESSION['success'] = "The account for $name $lname was deleted successfully.";
// Re-index the array to remove gaps in numeric keys
$accounts = array_values($accounts);
// Write the modified array back to the JSON file with file locking
file_put_contents($filePath, json_encode($accounts, JSON_PRETTY_PRINT));
// Redirect to the main page
header('Location: http://localhost:8080/u2/views/main.php?i=accounts');
die;

?>
