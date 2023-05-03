<?php
session_start();
function error_msg ($msg = "We apologize for the inconvenience.", $session = "errorMsg") {
    $_SESSION[$session] = $msg; 
    if (!empty($_SERVER['HTTP_REFERER'])) {
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    } else {
        header('Location: ../index.php');
    } 
    exit();
}
?>