<?php
session_start();
$_SESSION['SORTED'] = true;
function cmpid($a, $b)
{
    return $a['id'] <=> $b['id'];
}

function cmpfname($a, $b)
{
    return $a['name'] <=> $b['name'];
}

function cmplname($a, $b)
{
    return $a['surname'] <=> $b['surname'];
}

function cmpid_code($a, $b)
{
    return $a['id_code'] <=> $b['id_code'];
}

function cmpiban($a, $b)
{
    return $a['iban'] <=> $b['iban'];
}

function cmpbalance($a, $b)
{
    return $a['balance'] <=> $b['balance'];
}

$filePath = dirname(__DIR__, 1) . '/data/accounts.json';
$accounts = json_decode(file_get_contents($filePath), true);
$len = count($accounts);
$sort = $_GET['sortBy'];
$fnc = "cmp$sort";
usort($accounts, $fnc);
$accounts = array_values($accounts);
file_put_contents($filePath, json_encode($accounts, JSON_PRETTY_PRINT));
header('Location: http://localhost:8080/u2/views/main.php?i=accounts');
die;
?>