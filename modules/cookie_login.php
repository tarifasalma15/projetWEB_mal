<?php
if (!isset($_SESSION['user_login']) && isset($_COOKIE['b'], $_COOKIE['a']) && !empty($_COOKIE['b']) && !empty($_COOKIE['a'])) {
    require_once '../db_config.php';
    $select_sql = $bdd->prepare("SELECT * FROM users WHERE login=:uname"); 
    $select_sql->execute(array(':uname' => $_COOKIE['b'])); 
    $row = $select_sql->fetch(PDO::FETCH_ASSOC);
    if ($select_sql->rowCount() > 0) { // vérifie si ce login existe
        if ($_COOKIE['a'] === $row["mdp"]){
            $_SESSION["user_login"] = $row["uid"];
            $_SESSION["user_name"] = $row["prenom"];
            $_SESSION["user_role"] = $row["role"];
            header("Location: index.php");   // rediriger vers la page index
            exit();
        } 
    }
}
?>