<?php
    session_start();
    if(!isset($_SESSION['LOGGINED'])){
        $_SESSION['error'] = "You're not loggined! Please, login first.";
        header('Location: http://localhost:8080/u2');
        die;
    }
    $filePath = dirname(__DIR__, 1) . '/data/accounts.json';
    $accounts = json_decode(file_get_contents($filePath), true);
    function cmp($a, $b)
    {
        return $a['surname'] <=> $b['surname'];
    }
    if(!isset($_SESSION['SORTED'])){
        usort($accounts, 'cmp');
        $accounts = array_values($accounts);
    }
    unset($_SESSION['SORTED']);
    $len = count($accounts);
?>
<?php require dirname(__DIR__, 1) . '/logic/msg.php' ?>
<table>
    <thead>
        <tr>
            <th class="sort" id="id">ID</th>
            <th class="sort" id="fname">Name</th>
            <th class="sort" id="lname">Surname</th>
            <th class="sort" id="id_code">ID Code</th>
            <th class="sort" id="iban">IBAN</th>
            <th class="sort" id="balance">Balance</th>
            <th colspan="3">Controls</th>
        </tr>
    </thead>
    <tbody>
        <?php for($i = 0; $i < $len; $i++): ?>
            <?php if($accounts[$i]['deleted'] == false): ?>
            <tr>
                <td><?= $accounts[$i]['id']?></td>
                <td><?= $accounts[$i]['name']?></td>
                <td><?= $accounts[$i]['surname']?></td>
                <td><?= $accounts[$i]['id_code']?></td>
                <td><?= $accounts[$i]['iban']?></td>
                <td><?= $accounts[$i]['balance']?> EUR</td>
                <td class="control add" id="add<?= $accounts[$i]['id'] ?>">+</td>
                <td class="control take" id="take<?= $accounts[$i]['id'] ?>">-</td>
                <td class="control close" id="close<?= $accounts[$i]['id'] ?>">x</td>
            </tr>
            <?php endif; ?>
        <?php endfor; ?>
    </tbody>
</table>
