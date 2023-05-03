<?php

require_once "../includes/error_msg.php";

if (isset($_SESSION["user_login"])){ 
    header("location: ../index.php");
    exit();
}

if (isset($_REQUEST['btn_login'])){
    extract($_POST);
    $username = strip_tags($pseudo);
    $password = strip_tags($password);

    if (empty($username)) {
        error_msg("Veuillez saisir votre pseudo.");
    } else if (empty($password)) {
        error_msg("Veuillez saisir votre mot de passe.");
    } else {
        require_once '../db_config.php';
        $select_sql = $bdd->prepare("SELECT * FROM users WHERE login=:uname"); 
        $select_sql->execute(array(':uname' => $username)); 
        $row = $select_sql->fetch(PDO::FETCH_ASSOC);

        if ($select_sql->rowCount() > 0) { // vérifie si ce login existe
            if (password_verify($password, $row["mdp"])){

                $_SESSION["user_login"] = $row["uid"]; // == user connecté
                $_SESSION["user_name"] = $row["prenom"];
                $_SESSION["user_role"] = $row["role"];
                /*création cookies se souvenir de moi*/  
                if (!empty($remember)) {
                    $hashpassword = $row["mdp"];
                    setcookie('b', $username, time() + 30*24*3600, "/", null, false, true);
                    setcookie('a', $hashpassword, time() + 30*24*3600, "/", null, false, true);
                }
                if (isset($_SESSION["visitor"])) unset($_SESSION['visitor']);
                header("Location: ../index.php");   // rediriger vers la page index
                exit();
            } else {
                error_msg("Votre mot de passe est incorrect.");
            }
        } else {
            error_msg("Il semblerait que ce compte n'existe pas.");
        }
    }  
}
if (isset($_POST['btn_register'])) {
    extract($_POST);
    if (!empty($last_name) && !empty($first_name) && !empty($pseudo)) {
        $last_name = strip_tags($last_name);
        $first_name = strip_tags($first_name);
        $pseudo = strip_tags($pseudo);
        if (preg_match("#^[a-z0-9\-\._]{4,30}$#", $pseudo)) {
            if (preg_match("#^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?!.*\s).{6,254}$#", $password)) { // expression regex mdp
                if ($password == $password_confirmation) {
                    $password = strip_tags($password);
                    $hashpass = password_hash($password, PASSWORD_DEFAULT);
                    require_once('../db_config.php'); // connexion à la bdd
                    $select_login = $bdd->prepare("SELECT login FROM users WHERE login=:username");
                    $select_login->execute(array(':username' => $pseudo));
                    $row = $select_login->fetch();
                    if ($pseudo != $row["login"]) {
                        $sql = $bdd-> prepare('INSERT INTO users (nom, prenom, login, mdp, role) VALUES(:nom, :prenom, :login, :pass, :role)');
                        $sql-> execute(array('nom' => $last_name,
                            'prenom' => $first_name,
                            'login' => $pseudo,
                            'pass' => $hashpass,
                            'role' => 'user'
                        ));
                        $sql-> closeCursor();
                        $_SESSION["registered"] = $first_name; // pour le message de confirmation
                        header('Location: ../login.php');
                        exit();
                    } else error_msg("Ce pseudo a déjà été pris.");
                } else error_msg('Les mots de passent ne correspondent pas.');
            } else error_msg("Veuillez saisir un mot de passe valide.");
        } else error_msg("Veuillez saisir un pseudo valide.");
    } else error_msg('Veuillez renseigner tous les champs.');
}