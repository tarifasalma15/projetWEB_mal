<?php 
    session_start();
    if (!isset($_SESSION["user_login"]) || $_SESSION["user_role"] != "user"){ 
        header("location: login.php");
        exit();
    }
    $page_title="Mes commandes";
    require_once "includes/header.php";
    require_once "db_config.php";
    if (isset($_SESSION['user_login'])) {
    $select_view = $bdd->query('SELECT `commandes`.`cid`, `commandes`.`ref`, `recettes`.`nom`, DATE_FORMAT(commandes.date, \'%d/%m/%Y à %Hh%i\') AS date_fr, `commandes`.`statut`, `recettes`.`prix`
    FROM `commandes` 
        LEFT JOIN `recettes` ON `commandes`.`rid` = `recettes`.`rid`
    WHERE `commandes`.`rid` = `recettes`.`rid` AND `commandes`.`uid` = "'.$_SESSION['user_login'].'" ORDER BY date DESC');
    }
?>

<style>
body {display: block;}
footer {display: block;}
</style>

    <div class="wrapper ">
        <!-- Sidebar -->
        <?php require_once "includes/sidebar.php"; ?>
        <!-- End Sidebar -->
        <div class="main-panel">
            <!-- Navbar -->
            <?php require_once "includes/navbar.php"; ?>
            <!-- End Navbar -->
            <div class="container mt-5">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title"> My orders</h4>
                                <div class="input-group no-border">
                                    <input type="text" id="myInput" onkeyup="research()" class="form-control"
                                        placeholder="Rechercher un produit...">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <i class="nc-icon nc-zoom-split"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="myTable" class="table">
                                        <thead class=" text-primary">
                                            <th>
                                                Reference
                                            </th>
                                            <th>
                                                Product
                                            </th>
                                            <th>
                                                Date
                                            </th>
                                            <th>
                                                State
                                            </th>
                                            <th class="text-right">
                                                Amount
                                            </th>
                                        </thead>
                                        <tbody>
                                            <?php 
                                            if (isset($_SESSION['user_login'])) {
                                                while ($donnees = $select_view->fetch()) {
                                            ?>
                                            <tr>
                                                <td>
                                                    <?php echo $donnees["ref"]; ?>
                                                </td>
                                                <td>
                                                    <?php echo $donnees["nom"]; ?>
                                                </td>
                                                <td>
                                                    <?php echo $donnees["date_fr"]; ?>
                                                </td>
                                                <td>
                                                    <?php echo ucfirst($donnees["statut"]); ?>
                                                </td>
                                                <td class="text-right">
                                                    <?php 
                                                    $select_supp = $bdd->query('SELECT SUM(supplements.prix) AS extra FROM `supplements`, `extras` WHERE `supplements`.`sid` = `extras`.`sid` AND `extras`.`cid` ='.$donnees["cid"].'');
                                                    $supp= $select_supp->fetch();
                                                    echo (($donnees["prix"] + $supp["extra"]) . " €") 
                                                    ?>
                                                </td>
                                            </tr>
                                            <?php }} ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div>
                            <!-- compte le nombre de commandes -->
                            <?php
                            if (isset($_SESSION['user_login'])) {
                            $resultFoundRows = $bdd->query('SELECT COUNT(cid) FROM commandes WHERE uid="'.$_SESSION['user_login'].'"');
                            $nombredElementsTotal = $resultFoundRows->fetch();
                            if ($nombredElementsTotal > 1){ ?>
                            <div class="hint-text">Total number of orders: <b><?php echo $nombredElementsTotal[0]; ?></b></div>
                            <?php }} ?>
                        </div>
                    </div>
                </div>
    <?php require_once "includes/footer_gestion.php"; ?>
    <!-- Datatables date sorting -->
    <script type="text/javascript" src="assets/scripts/datatable-order.js"></script>

<?php /*
=========================================================
* Paper Dashboard 2 - v2.0.1
=========================================================

* Product Page: https://www.creative-tim.com/product/paper-dashboard-2
* Copyright 2020 Creative Tim (https://www.creative-tim.com)

Coded by www.creative-tim.com

 =========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
*/ ?>