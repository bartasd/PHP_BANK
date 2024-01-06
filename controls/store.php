<?php
    session_start();
    require dirname(__dir__, 1).'/logic/validateId.php';
    $filePath = dirname(__DIR__, 1) . '/data/accounts.json';
    $accounts = json_decode(file_get_contents($filePath), true);
    $len = count($accounts);
    $name = $_POST['fname'];
    $lname = $_POST['lname'];
    $id_code = $_POST['id_code'];

    function idMapper($n)
    {
        return $n['id_code'];
    }
    $allIds = array_map('idMapper', $accounts);

    if(strlen($name) < 4 ){
        $_SESSION['error'] = "Cannot create an account for $name because name is too short.";
        header('Location: http://localhost:8080/u2/pages/main.php?i=add_accounts');
        die;
    }
    else if(strlen($lname) < 4){
        $_SESSION['error'] = "Cannot create an account for $lname because last name is too short.";
        header('Location: http://localhost:8080/u2/pages/main.php?i=add_accounts');
        die;
    }
    else if(in_array($id_code, $allIds)){
        $_SESSION['error'] = "Cannot create an account for $name $lname because your id already exists in our database.";
        header('Location: http://localhost:8080/u2/views/main.php?i=add_accounts');
        die;
    }
    else if(!validateId($id_code)){
        $_SESSION['error'] = "Cannot create an account for $name $lname because your id is invalid.";
        header('Location: http://localhost:8080/u2/views/main.php?i=add_accounts');
        die;
    }
    else{
        $accounts[] = [
        'id' => $len+1,
        'name' => $_POST['fname'],
        'surname' => $_POST['lname'],
        'id_code' => $_POST['id_code'],
        'iban' => $_POST['acc_no'],
        'balance' => 0,
        ];
        file_put_contents(dirname(__DIR__,1).'/data/accounts.json', json_encode($accounts, JSON_PRETTY_PRINT));
        $name = $_POST['fname'];
        $lname = $_POST['lname'];
        $_SESSION['success'] = "Account for $name $lname has been created.";
    }
    header('Location: http://localhost:8080/u2/views/main.php?i=add_accounts');
    die;
?>