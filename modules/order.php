<?php
require_once "../includes/error_msg.php";

if (isset($_POST['btn_order'])) {
    extract($_POST);
    $ref = strtoupper((bin2hex(random_bytes(3)))); // génère une référence "aléatoire"
    if (isset($_SESSION["user_login"])) {
        if ((isset($rid_order) || (isset($productIdFromModal)))) {
            if (isset($productIdFromModal)) {$rid_order = $productIdFromModal;} // productIdFromModal : le rid issu du modal du supplément
            require_once('../db_config.php'); // connexion à la bdd
            $sql=$bdd->prepare('INSERT INTO commandes (ref, uid, rid, date) VALUES (:reference, :userId, :recetteId, NOW())');
            $sql->execute(array('reference'=> $ref, 'userId'=> $_SESSION["user_login"], 'recetteId' => $rid_order)) ;
            $sql->closeCursor();
            // requete sql pour le message de confirmation 
            $select_cmd = $bdd->query('SELECT commandes.cid, recettes.prix, recettes.nom FROM `commandes`, recettes WHERE ref ="'. $ref.'" AND recettes.rid = commandes.rid');
            $cmd= $select_cmd->fetch();
            // pour les commandes avec supplément
            if(!empty($check_list) && isset($productIdFromModal)) { 
                foreach($check_list as $selected){
                    $extra=$bdd->prepare('INSERT INTO extras (cid, sid) VALUES (:commandId, :suppId)');
                    $extra->execute(array('commandId' => $cmd["cid"], 'suppId' => $selected)) ;
                }
                // calcul du supplément total pour le message de confirmation 
                $select_supp = $bdd->query('SELECT SUM(supplements.prix) AS extra FROM `supplements`, `extras` WHERE `supplements`.`sid` = `extras`.`sid` AND `extras`.`cid` ='.$cmd["cid"].'');
                $supp= $select_supp->fetch();
                // session pour le message de confirmation avec supplément
                $totalPrice = ($cmd["prix"] + $supp["extra"]);
                $order = array($cmd["nom"], $totalPrice, $ref, "extra");
                $_SESSION["order"] = $order;
                header('Location: ' . $_SERVER['HTTP_REFERER']); // retour à la page précendante
                exit();
            }
            // session pour le message de confirmation sans supplément
            $order = array($cmd["nom"], $cmd["prix"], $ref);
            $_SESSION["order"] = $order;
            header('Location: ' . $_SERVER['HTTP_REFERER']);
            exit();
        } else error_msg();
    } else error_msg("visitor", "visitor");
} else error_msg();
?>