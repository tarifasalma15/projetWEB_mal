<?php

require_once "../includes/error_msg.php";

// add recette
if (isset($_POST['btn_add_recette'])) {
    extract($_POST);
    if (!empty($name) && !empty($price)) {
        $name = htmlspecialchars($name); // vérification injections
        $price = strip_tags($price);
        $name = ucfirst($name);
        if ($price >= 0 && $price <= 100) {
            require_once('../db_config.php');
            $sql=$bdd->prepare('INSERT INTO recettes (nom, prix) VALUES (:nom, :prix)');
            $sql->execute(array('nom'=> $name, 'prix'=> $price)) ;
            $sql->closeCursor();
            header('Location: ' . $_SERVER['HTTP_REFERER']); // retour à la page précédante
            exit();
        } else error_msg ('Erreur plage de prix');
    } else error_msg ('Veuillez renseigner tous les champs.');
}
// edit recette
if (isset($_POST['btn_edit_recette'])) {
    extract($_POST);
    if (!empty($edit_name) && !empty($edit_price) && isset($productID_edit)) {
        $edit_name = htmlspecialchars($edit_name);
        $edit_price = strip_tags($edit_price);
        $edit_name = ucfirst($edit_name);
        if ($edit_price >= 0 && $edit_price <= 100) {
            require_once('../db_config.php');
            $sql=$bdd->prepare('UPDATE `recettes` SET `nom` = :nom, `prix` = :prix WHERE `recettes`.`rid` = :productID');
            $sql->execute(array('nom'=> $edit_name, 'prix'=> $edit_price, 'productID'=> $productID_edit)) ;
            $sql->closeCursor();
            header('Location: ' . $_SERVER['HTTP_REFERER']);
            exit();
        } else error_msg ('Erreur plage de prix');
    } else error_msg ('Veuillez renseigner tous les champs.');
}
// delete recette
if (isset($_POST['btn_delete_recette']) ) {
    extract($_POST);
    if (isset($productID_delete)) {
        require_once('../db_config.php');
        $sql=$bdd->prepare('DELETE FROM `recettes` WHERE `recettes`.`rid` = :id_prod');
        $sql->execute(array('id_prod'=> $productID_delete)) ;
        $sql->closeCursor();
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit();
    } else error_msg();
}


// add supplément
if (isset($_POST['btn_add_supplement'])) {
    extract($_POST);
    if (!empty($name) && !empty($price)) {
        $name = htmlspecialchars($name);
        $price = strip_tags($price);
        $name = ucfirst($name);
        if ($price >= 0 && $price <= 100) {
            require_once('../db_config.php'); // connexion à la bdd
            $sql=$bdd->prepare('INSERT INTO supplements (nom, prix) VALUES (:nom, :prix)');
            $sql->execute(array('nom'=> $name, 'prix'=> $price)) ;
            $sql->closeCursor();
            header('Location: ' . $_SERVER['HTTP_REFERER']);
            exit();
        } else error_msg ('Erreur plage de prix');
    } else error_msg ('Veuillez renseigner tous les champs.');
}
// edit supplément
if (isset($_POST['btn_edit_supplement'])) {
    extract($_POST);
    if (!empty($edit_name) && !empty($edit_price) && isset($productID_edit)) {
        $edit_name = htmlspecialchars($edit_name);
        $edit_price = strip_tags($edit_price);
        $edit_name = ucfirst($edit_name);
        if ($edit_price >= 0 && $edit_price <= 100) {
            require_once('../db_config.php'); // connexion à la bdd
            $sql=$bdd->prepare('UPDATE `supplements` SET `nom` = :nom, `prix` = :prix WHERE `supplements`.`sid` = :productID');
            $sql->execute(array('nom'=> $edit_name, 'prix'=> $edit_price, 'productID'=> $productID_edit)) ;
            $sql->closeCursor();
            header('Location: ' . $_SERVER['HTTP_REFERER']);
            exit();
        } else error_msg ('Erreur plage de prix');
    } else error_msg ('Veuillez renseigner tous les champs.');
}
// delete supplément
if (isset($_POST['btn_delete_supplement']) ) {
    extract($_POST);
    if (isset($productID_delete)) {
        require_once('../db_config.php'); // connexion à la bdd
        $sql=$bdd->prepare('DELETE FROM `supplements` WHERE `supplements`.`sid` = :id_prod');
        $sql->execute(array('id_prod'=> $productID_delete)) ;
        $sql->closeCursor();
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit();
    } else error_msg();
}