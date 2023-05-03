<?php if (!isset($_SESSION)) session_start(); ?> 
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?php if (isset($page_title)){ echo $page_title;} else {echo "Mario Pizza";}?></title>

    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="media/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="media/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="media/favicon/favicon-16x16.png">
    <link rel="manifest" href="media/favicon/site.webmanifest">
    <link rel="shortcut icon" href="media/favicon/favicon.ico">
    <meta name="theme-color" content="#ffffff">

    <!-- Bootstrap core CSS -->
    <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- CSS Files -->
    <?php if (!isset($_COOKIE["acceptCookies"])){?><link href="assets/cookies/cookiealert.css" rel="stylesheet"> <?php }
    if (isset($page_title) && (($page_title != "Mario Pizza") && ($page_title != "To connect") && ($page_title != "Login"))){ ?>
    <link href="assets/datatables/css/jquery.dataTables.css" rel="stylesheet">
    <link href="assets/style/crud.min.css" rel="stylesheet"> <?php } else echo "\n" ?>
    <link href="assets/paper-dashboard/css/paper-dashboard.min.css" rel="stylesheet" />
    <link href="assets/style/style.min.css" rel="stylesheet">
    <!-- Fonts and icons -->
    <link href="assets/fonts/materialicons/materialicons.css" rel="stylesheet">
    <link href="assets/fonts/montserrat/montserrat.css" rel="stylesheet" />

</head>

<body>
    