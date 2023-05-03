<?php
switch($_GET['code'])
{
case '404':header('Location: 404.php');
break;
case '403':header('Location: 404.php');
break;
default:header('Location: index.php');
}
?>