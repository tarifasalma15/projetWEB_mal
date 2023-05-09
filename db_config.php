<?php
$db_name = 'phpmyadmin'; // config de la BDD à ouvrir
$db_host = '127.0.0.1:3307';
$db_user = 'root';
$db_passwd = '';

$displayError = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION); // facultatif
$dsn = 'mysql:dbname=' . $db_name . ';host=' . $db_host . ';charset=utf8';

try {
    $bdd = new PDO($dsn, $db_user, $db_passwd, $displayError);
} catch (Exception $e) {
    die('Erreur PDO : ' . $e->getMessage());
}
?>