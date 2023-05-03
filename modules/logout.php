<?php
session_start();
setcookie('b', '', time()-3600, '/');
setcookie('a', '', time()-3600, '/');
$_SESSION = array();
session_destroy();
header("Location: ../index.php");
exit();
?>
