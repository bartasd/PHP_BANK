<?php
  session_start();
  if(!isset($_SESSION['LOGGINED'])){
      $_SESSION['error'] = "You're not loggined! Please, login first.";
      header('Location: http://localhost:8080/u2');
      die;
  }
  require dirname(__DIR__, 1).'/logic/generateIban.php';
  $filePath = dirname(__DIR__, 1) . '/data/accounts.json';
  $accounts = json_decode(file_get_contents($filePath), true);
  function ibanMapper($n)
  {
      return $n['iban'];
  }
  $allIbans = array_map('ibanMapper', $accounts);
  $iban = null;
  do {
    $iban = generateIban();
} while (in_array($iban, $allIbans));

?>
<?php require dirname(__DIR__, 1) . '/logic/msg.php' ?>
<form class="add_form" action="http://localhost:8080/u2/controls/store.php" method="post">
  <label class="add_label" for="fname">First Name:</label>
  <input class="add_input" type="text" id="fname" name="fname"/>
  <label class="add_label" for="lname">Last Name:</label>
  <input class="add_input"type="text" id="lname" name="lname"/>
  <label class="add_label" for="id_code">Identification Code:</label>
  <input class="add_input" type="text" id="id_code" name="id_code" />
  <label class="add_label" for="acc_no" >Account Number:</label>
  <input class="add_input" type="text" id="acc_no" name="acc_no" value=<?= $iban ?> readonly/>
  <button class="btn add_button" type="submit">SUBMIT</button>
</form>
