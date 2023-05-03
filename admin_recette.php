<?php 
    session_start();
    if (!isset($_SESSION["user_login"]) || $_SESSION["user_role"] != "admin"){ 
        header('Location: 404.php');
        exit();
    }
    $page_title="Gestion des recettes"; 
    require_once "includes/header.php";
	require_once "db_config.php"; 
    $page = (!empty($_GET['page']) ? $_GET['page'] : 1); // pagination avec limite de 10 éléments
    $limite = 10;

    $debut = ($page - 1) * $limite;
    $select_sql = 'SELECT SQL_CALC_FOUND_ROWS *, cast(prix as decimal(10,2)) as prix FROM `recettes` LIMIT :limite OFFSET :debut';
    $select_sql = $bdd->prepare($select_sql);
    $select_sql->bindValue('debut', $debut, PDO::PARAM_INT);
    $select_sql->bindValue('limite', $limite, PDO::PARAM_INT);
    $select_sql->execute();
    
    $resultFoundRows = $bdd->query('SELECT found_rows()'); // récupère le nombre d'entrées
    $nombredElementsTotal = $resultFoundRows->fetchColumn();
    ?>
    
    <div class="wrapper">
        <?php require_once "includes/sidebar.php"; ?>
        <div class="main-panel">
            <!-- Navbar -->
            <?php require_once("includes/navbar.php"); ?>
            <!-- End Navbar -->
            <div class="container mt-5">
                <div class="table-wrapper">
                    <div class="table-title">
                        <div class="row">
                            <div class="col-sm-6">
                                <h2>Management <b>Recipes</b></h2>
                            </div>
                            <div class="col-sm-6">
                                <a href="#addModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i><span>Add a recipe</span></a>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">List of recipes</h4>
                                    <div class="input-group no-border">
                                        <input type="text" id="myInput" onkeyup="research()" class="form-control"
                                            placeholder="Rechercher une recette...">
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
                                            <thead class="text-primary">
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Price (€)</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php while ($donnees = $select_sql->fetch()){?>
                                                <tr>
                                                    <td id="prodName"><?php echo $donnees["nom"]; ?></td>
                                                    <td id="prodPrice"><?php echo $donnees["prix"]; ?></td>
                                                    <td>
                                                        <a href="#" class="edit" data-toggle="modal"
                                                            data-target="#editModal"
                                                            data-pid="<?php echo $donnees["rid"]; ?>"><i
                                                                class="material-icons" data-toggle="tooltip"
                                                                title="Modifier">&#xE254;</i></a>
                                                        <a href="#" class="delete" data-toggle="modal"
                                                            data-target="#deleteModal"
                                                            data-pid="<?php echo $donnees["rid"]; ?>"><i
                                                                class="material-icons" data-toggle="tooltip"
                                                                title="Supprimer">&#xE872;</i></a>
                                                    </td>
                                                </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="clearfix ">
                                <!-- nombre total d'éléments -->
                                <?php if ($nombredElementsTotal > 1){ ?>
                                <div class="hint-text">Total number of items : <b><?php echo $nombredElementsTotal; ?></b> recipes</div>
                                <?php } ?>
                                <!-- pagination -->
                                <ul class="pagination d-flex justify-content-end">
                                    <?php
                                    $nombreDePages = ceil($nombredElementsTotal / $limite);
                                    if (!isset ($_GET['page'])) $_GET['page']= 1;
                                    if ($page > 1):
                                        ?><li class="page-item"><a href="?page=<?php echo $page - 1; ?>" class="page-link">Previous
                                        page</a>
                                    <?php
                                    endif;
                                    if (1 < $nombreDePages){
                                        for ($i = 1; $i <= $nombreDePages; $i++):?>
                                    <li class="page-item <?php if ($_GET['page'] == $i) echo "active"; ?>"><a
                                        href="?page=<?php echo $i; ?>" class="page-link"><?php echo $i; ?></a></li>
                                    <?php
                                        endfor;
                                    }
                                    if ($page < $nombreDePages):?>
                                    <li class="page-item"><a href="?page=<?php echo $page + 1; ?>" class="page-link">Next
                                        page/a></li>
                                    <?php
                                    endif;
                                    ?>
                                </ul>
                            </div>
                        </div>
                        <footer class="container footer footer-black  footer-white ">
                            <div class=" ftDes">
                                <div class="col-lg-12"> © 2023 - <a href="index.php">Mario Pizza</a>.All rights reserved.
                                </div>
                            </div>
                        </footer>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Add Modal HTML -->
	<div id="addModal" class="modal fade">
        <div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
                <form action="modules/crud.php" method="POST">
                    <div class="modal-header">						
                        <h4 class="modal-title">Add a recipe</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Name/label>
                            <input type="text" name="name" class="form-control" maxlength=30 required autofocus>
                        </div>
                        <div class="form-group">
                            <label>Price</label>
                            <input type="number" name="price" class="form-control" min=0 max=100 step=".01" required>
                        </div>	
                    </div>			
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Annuler">
                        <input type="submit" name="btn_add_recette" class="btn btn-success" value="Ajouter">
                    </div>
                </form>    
            </div>
        </div>
    </div>
    <!-- Edit Modal HTML -->
	<div id="editModal" class="modal fade">
        <div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<form action="modules/crud.php" method="post">
					<div class="modal-header">						
						<h4 class="modal-title">Modify a recipe <span id="insertName_edit"></span></h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">					
						<div class="form-group">
							<label>Name</label>
							<input type="text" name="edit_name" id="productName_edit" class="form-control" maxlength=30 required autofocus>
						</div>
						<div class="form-group">
							<label>Price</label>
							<input type="number" name="edit_price" id="productPrice_edit" class="form-control" min=0 max=100 step=".01" required>
						</div>					
					</div>
					<div class="modal-footer">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Annuler">
                        <input type="hidden" name="productID_edit" id="productID_edit" >
						<input type="submit" name="btn_edit_recette" class="btn btn-info" value="Modifier">
					</div>
				</form>
			</div>
		</div>
	</div>
    <!-- Delete Modal HTML -->
	<div id="deleteModal" class="modal fade" tabindex='-1'>
        <div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<form action="modules/crud.php" method="POST">
					<div class="modal-header">						
						<h4 class="modal-title">Delete a recipe<div id=""></div></h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">					
						<p>Are you sure you want to delete <strong><span id="insertName_delete"></span></strong> ?</p>
						<p class="text-warning"><small>This action is irreversible.</small></p>
					</div>
					<div class="modal-footer">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Annuler">
                        <input type="hidden" name="productID_delete" id="productID_delete" >
						<input type="submit" name="btn_delete_recette" class="btn btn-danger" value="Supprimer">
					</div>
				</form>
			</div>
		</div>
	</div>


<script src="assets/jquery/jquery.min.js"></script>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>

<!-- Datatables JS -->
<script src="assets/datatables/js/jquery.dataTables.min.js"></script>
<script src="assets/scripts/datatable-product.js"></script>

<script type="text/javascript">
// modal passing values //
$('a[data-toggle="modal"]').click(function () {
    var userId = $(this).attr('data-pid')
    var productName = $(this).parent().siblings("#prodName").text();
    var productPrice = $(this).parent().siblings("#prodPrice").text();
    document.getElementById("productID_edit").value = userId;
    document.getElementById("productName_edit").value = productName;
    document.getElementById("productPrice_edit").value = productPrice;
    document.getElementById("productID_delete").value = userId;
    document.getElementById("insertName_edit").innerHTML = productName;
    document.getElementById("insertName_delete").innerHTML = productName;
});
// search bar
function research() {
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    table = document.getElementById("myTable");
    tr = table.getElementsByTagName("tr");
    for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[0];
        if (td) {
            txtValue = td.textContent || td.innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
            }
        }
    }
}
// autofocus modal input
$('.modal').on('shown.bs.modal', function() {
  $(this).find('[autofocus]').focus();
});
</script>
</body>
</html>

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