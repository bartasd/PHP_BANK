<?php 
session_start();
$filePath = dirname(__DIR__, 1) . '/data/accounts.json';
$accounts = json_decode(file_get_contents($filePath), true);
$action = $_GET['action'];
$id = $_GET['id'];
$name = null;
$lname = null;
$balance = null;

foreach ($accounts as $account) {
    if ($account['id'] == $id) {
        $name = $account['name'];
        $lname = $account['surname'];
        $balance = $account['balance'];
        break;
    }
}

?>
<div class="edit_container">
    <p class="edit_title">Editing amount of an account: #<?= $id ?></p>
    <p class="edit_title">Account holder:  <?= $name." ".$lname ?></p>
    <p class="edit_title">Balance:  <?= $balance ?></p>
    <form class="edit_form" action="../controls/update.php?id=<?= $id ?>&action=<?= $action ?>" method="post">
        <label class="edit_label" for="ammount">Please, enter an ammount to <?= $action == 'add' ? "add" : "take away"  ?>:</label>
        <input class="edit_input" type="text" id="ammount" name="ammount"/>
        <button class="btn edit_amount" type="submit">SUBMIT</button>
    </form>
</div>