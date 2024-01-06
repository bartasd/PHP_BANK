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
$posibleToDelete = null;
$name = null;
$lname = null;
foreach ($accounts as $account) {
    if ($account['id'] == $id) {
        $posibleToDelete = $account['balance'] ? false : true;
        $name = $account['name'];
        $lname = $account['surname'];
        break;
    }
}


?>
<?php if($posibleToDelete): ?>
    <h1>Are you sure to delete an account for <?=$name?> <?=$lname?> whose ID is: <?= $_GET['id'] ?></h1>
    <?php // JUST PUT AN ERROR MESSAGE IF I ABORT THE DELETION. IF NO, ERROR SESSION COOKIE TO BE DESTROYED LATER STEP  ?>
    <?php $_SESSION['error'] = "You have aborted the deletion of $name $lname account."; ?>
<?php else: ?>
    <?php
    $_SESSION['error'] = "You cannot delete an account which is not empty.";
        header('Location: http://localhost:8080/u2/views/main.php?i=accounts');
        die;
    ?>
<?php endif; ?>   
<div class="delete">
    <form action="../controls/destroy.php" method="post">
        <input type="hidden" name="id" value="<?= $_GET['id'] ?>" style="display: none;">
        <button class="btn" type="submit">Yes</button>
    </form>
    <button class="btn" onclick="window.location.href='http://localhost:8080/u2/views/main.php?i=accounts';">
      No
    </button>
</div>

