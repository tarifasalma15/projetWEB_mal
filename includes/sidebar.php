<div class="sidebar" style="margin-top: 4.5em;" data-color="white" data-active-color="danger">
    <div class="sidebar-wrapper mt-4">
        <ul class="nav">
            <li>
                <a href="#" title="fictif">
                    <i class="nc-icon nc-bank"></i>
                    <p>Dashboard</p>
                </a>
            </li>
            <?php if ($_SESSION["user_role"] == "admin"){ ?>
            <li class="<?php if($page_title == "Gestion des recettes") echo 'active'; ?>">
                <a href="./admin_recette.php">
                    <i class="nc-icon nc-tile-56"></i>
                    <p>Recipes</p>
                </a>
            </li>
            <li class="<?php if($page_title == "Gestion des suppléments") echo 'active'; ?>">
                <a href="./admin_supplement.php">
                    <i class="nc-icon nc-tile-56"></i>
                    <p>Supplements</p>
                </a>
            </li>
            <li class="<?php if($page_title == "Affichage des commandes reçues") echo 'active'; ?>">
                <a href="./admin_commande.php">
                    <i class="nc-icon nc-paper"></i>
                    <p>Orders</p>
                </a>
            </li>
            <li class="<?php if($page_title == "Gestion des utilisateurs") echo 'active'; ?>">
                <a href="#" title="fictif">
                    <i class="nc-icon nc-single-02"></i>
                    <p>Users</p>
                </a>
            </li>
            <?php } else { ?>
                <li>
                <a href="#" title="fictif">
                    <i class="nc-icon nc-single-02"></i>
                    <p>My profile</p>
                </a>
            </li>
            <li class="<?php if($page_title == "Mes commandes") echo 'active'; ?>">
                <a href="./commandes.php">
                    <i class="nc-icon nc-tile-56"></i>
                    <p>Orders</p>
                </a>
            </li>
            <?php } ?>
            <li>
                <a href="#" title="fictif">
                    <i class="nc-icon nc-bell-55"></i>
                    <p>Notifications</p>
                </a>
            </li>
            <li>
                <a href="./modules/logout.php">
                    <i class="nc-icon nc-simple-remove"></i>
                    <p>Log Out</p>
                </a>
            </li>
        </ul>
    </div>
</div>